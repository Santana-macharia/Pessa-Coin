/**
 * Advertisement edit page specific JS
 *
 */

(function($) {

    "use strict";

    // http://stackoverflow.com/a/646643/315168
    if (typeof String.prototype.startsWith != 'function') {
      // see below for better implementation!
      String.prototype.startsWith = function (str){
        return this.indexOf(str) === 0;
      };
    }

    /**
     * Show / hide field rules
     */
    function installRules() {
        var ruleset = $.deps.createRuleset();
        var creating = $("input[name='ad-trade_type']").length;

        if (creating) {
            var onlineRule = ruleset.createRule("input[name='ad-trade_type']", "any", ["ONLINE_SELL"]);
            onlineRule.include("#online_sell_fieldset");
            onlineRule.include("#row_id_ad-display_reference");
            onlineRule.include("#row_id_ad-reference_type");
            onlineRule.include("#row_id_ad-require_trade_volume");
            onlineRule.include("#row_id_ad-require_feedback_score");
            onlineRule.include("#row_id_ad-first_time_limit_btc");
            onlineRule.include("#row_id_ad-volume_coefficient_btc");
            onlineRule.include("#row_id_ad-real_name_required");
            onlineRule.include("#row_id_ad-require_p2p_identification");

            var onlineRule2 = ruleset.createRule("input[name='ad-trade_type']", "any", ["ONLINE_SELL", "ONLINE_BUY"]);
            onlineRule2.include("#row_id_ad-online_provider");

            var onlineBuyRule = ruleset.createRule("input[name='ad-trade_type']", "any", ["ONLINE_BUY"]);
            onlineBuyRule.include("#online_buy_fieldset");
            onlineBuyRule.include("#row_id_ad-payment_time_window");

            // var buyRule = ruleset.createRule("input[name='ad-trade_type']", "any", ["ONLINE_BUY", "LOCAL_BUY", "LOCAL_SELL"]);
            // buyRule.include("#row_id_ad-track_max_amount");
            // buyRule.include("#buy_fieldset");

        }

        ruleset.install({log: true});
    }

    /**
     * Chooce currency by active country.
     */
    function chooceCurrency(cc) {
        if(!cc) {
            return;
        }
        cc = cc.toUpperCase();
        var cur = window.currencyData[cc];
        if(!cur) {
            return;
        }

        $("#id_ad-currency").val(cur);

        // Update simple equation
        recreateFormula();

        updateMinMaxCurrency();
        updatePriceAJAX();
    }

    /**
     * Use trade type and online provider to select proper currency choices.
     */
    function updateCurrencyChoices() {
        var trade_type = getAdType();

        var new_options = [];
        var online_provider = $("#id_ad-online_provider").val();
        var online_provider_data = window.paymentMethods[online_provider];

        // In case of online trades that have no currencies defined, allow traditional currencies.
        if (online_provider_data && !online_provider_data['currencies']) {
            new_options = window.traditionalCurrenciesExceptBtc.slice();
        } else {
            new_options = online_provider_data['currencies'].slice();
        }

        // Sort and apply new options to currency select
        var selected = $("#id_ad-currency").val();
        new_options.sort();
        $("#id_ad-currency").empty();
        for (var option_i = 0; option_i < new_options.length; ++ option_i) {
            var curr = new_options[option_i];
            $("#id_ad-currency").append('<option value="' + curr + '">' + curr + '</option>');
        }

        // Select same currency, if possible
        if (new_options.indexOf(selected) >= 0) {
            $("#id_ad-currency").val(selected);
        }
        // If the old currency could not be selected, then some other
        // is selected. Recreate formula so old one is not used.
        else {
            recreateFormula();
            updateMinMaxCurrency();
            updatePriceAJAX();
        }
    }

    /**
     * Getter that works in both "add" and "edit" views
     */
    function getCurrency() {
        if (window.advertisementCurrency) {
            return window.advertisementCurrency;
        }
        return $("#id_ad-currency").val();
    }

    /**
     * Set up the location widget magic
     */
    function makeGooglePlaces() {
        var input = document.getElementById('id_ad-place');
        var autocomplete = window.createPlaceAutocompleteSelectFirst(input);

        // When user selects an entry in the list kick in the magic
        google.maps.event.addListener(autocomplete, 'place_changed', function() {

            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            var location = window.splitLocation(place);

            chooceCurrency(location.countryCode);

            var form = $("#ad-form");
            form.find("#id_ad-lat").val(place.geometry.location.lat());
            form.find("#id_ad-lon").val(place.geometry.location.lng());
            form.find("#id_ad-location_string").val(location.locationString);
            form.find("#id_ad-countrycode").val(location.countryCode);
            form.find("#id_ad-countrycode").change();
            form.find("#id_ad-city").val(location.city);

        });
    }

    /**
     * Disable premature form submission by keys
     */
    function noSubmitOnEnter() {
        $('#ad-form input, #ad-form select').keypress(function(event) { return event.keyCode != 13; });
    }

    /**
     * Register handlers when dynamic price information must be updated
     */
    function handlePriceInputChanges() {
        $("#id_ad-currency, #id_ad-price_equation, #id_ad-commission").on("change input", function() {
            updatePriceAJAX();
        });
    }


    /**
     * Min and max amounts are in fiat currency. Update them when currency changes.
     */
    function updateMinMaxCurrency() {
        var currency = getCurrency();
        $("#row_id_ad-min_amount .input-group-addon, #row_id_ad-max_amount .input-group-addon").text(currency);
    }

    /**
     * Trigger the update of real-time price information on the page
     */
    function _updatePriceAJAX() {

        var equ = $('#id_ad-price_equation').val().replace(/ /g,'');

        $('.price-info').html("<i class='fa fa-spin fa-spinner'></i> calculating price");

        $.ajax({url: "/equation/" + equ}).done(function(data) {
            var price = addThousandsSeparator(data) + " " + getCurrency() + " / BTC";
            if(data) {
                $('.price-info').html(price);
            } else {
                $('.price-info').html("<strong class='warning'>Could not calculate price. Make sure you don't have error in the equation.</strong>");
            }
        });
    }

    function addThousandsSeparator(x) {

        if(typeof(x) === 'string') {
            var parts = x.split(".");
        } else {
            var parts = x.toString().split(".");
        }
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    var updatePriceAJAX = debounce(_updatePriceAJAX, 500);
    /**
     * Apply payment method specific defaults on the settings.
     */
    function applyPaymentMethodDefaults(paymentProviderInfo, countryCode) {

        // Clear the defaults, but only clear ones
        $("#id_ad-real_name_required").removeAttr("checked");
        $("#id_ad-sms_verification_required").removeAttr("checked");
        $("#id_ad-require_trade_volume").val("0.0");
        $("#id_ad-require_feedback_score").val("0");
        $("#id_ad-first_time_limit_btc").val("");

        var defaults = paymentProviderInfo.defaults;
        if(!defaults) {
            // No default risk values provides
            return;
        }

        // Choose between country-specific defaults or
        // global defaults
        defaults = defaults[countryCode] || defaults.all;

        if(!defaults) {
            throw new Error("Default ad settings missing for " + paymentProviderInfo.name);
        }

        if(defaults.sms_verification_required) {
            $("#id_ad-sms_verification_required").prop("checked", true);
        }

        if(defaults.real_name_required) {
            $("#id_ad-real_name_required").prop("checked", true);
        }

        if(defaults.require_trade_volume || defaults.require_trade_volume === 0) {
            $("#id_ad-require_trade_volume").val(defaults.require_trade_volume);
        }

        if(defaults.require_feedback_score || defaults.require_feedback_score === 0) {
            $("#id_ad-require_feedback_score").val(defaults.require_feedback_score);
        }

        if(defaults.first_time_limit_btc || defaults.first_time_limit_btc === 0) {
            $("#id_ad-first_time_limit_btc").val(defaults.first_time_limit_btc);
        }

    }

    /**
     * Update risk level et. al.
     */
    function updatePaymentMethodInfo() {

        var method = $("#id_ad-online_provider").val();
        var type = getAdType();
        var info = window.paymentMethods[method];

        var popup = $("#online-payment-method-description");

        popup.find("#payment-method-name").text(info.name);
        popup.find("#payment-method-description").text(info.description);

        // Show online risks
        if(type == "ONLINE_SELL" || type == "ONLINE_BUY") {
            popup.slideDown();
            if(type == "ONLINE_SELL") {
                var risk = info.seller_risk || "???";
                popup.find("#risk-level").text(risk);
                popup.find("#online-sell-risk").show();
                popup.find("#online-buy-risk").hide();
                if(risk == "high") {
                    popup.find("#online-sell-risk").addClass("high-risk");
                } else {
                    popup.find("#online-sell-risk").removeClass("high-risk");
                }

                applyPaymentMethodDefaults(info);

                $("#row_id_ad-account_info").show();

                // Django 1.11 sets this `required` but it messes with how
                // the UI works, so don't do that.
                $("#id_ad-place").attr('required', false);
            } else {
                popup.find("#online-sell-risk").hide();
                popup.find("#online-buy-risk").show();
                $("#row_id_ad-account_info").hide();
            }
            if(info.maximum_payment_time) {
                $("#id_ad-payment_window_minutes").val(info.maximum_payment_time);
            }
            $(".online_sell_additional_fields").hide();
            if (type == "ONLINE_SELL" && $('#online_sell_additional_fields-' + method).length) {
                $("#row_id_ad-account_info").hide();

                // Django sets these `required` even if they will never be bound. Compensate.
                $('input[id^="id_additional-"]').each(function(idx, elem) {elem.required = false;});
                // Except what's really required
                $('input[id^=id_additional-' + method + ']').each(function(idx, elem) {elem.required = true;});

                $("#online_sell_additional_fields-" + method).show();
            } else {
                $('input[id^="id_additional-"]').each(function(idx, elem) {elem.required = false;});
            }
            if (info.namefield) {
                $('#row_id_ad-bank_name .two-col-help-text').text(info.namefield_help);
                $('label[for=id_ad-bank_name]').text(info.namefield);
                $("#row_id_ad-bank_name").show();
            } else {
                $("#row_id_ad-bank_name").hide();
            }
            if (info.bank_name_choices) {
                var options = '<option value="">---</option>';
                for (var option_i = 0; option_i < info.bank_name_choices.length; ++ option_i) {
                    var option = info.bank_name_choices[option_i];
                    options += '<option value="' + option + '">' + option + '</option>';
                }
                $('#id_ad-bank_name').replaceWith('<select class="select form-control" id="id_ad-bank_name" name="ad-bank_name">' + options + '</select>')
            } else if ($('#id_ad-bank_name').prop('tagName').toUpperCase() != 'INPUT') {
                $('#id_ad-bank_name').replaceWith('<input class="textinput textInput form-control" id="id_ad-bank_name" name="ad-bank_name" type="text" autocomplete="off">')
            }

        } else {
            // LOCAL_BUY, LOCAL_SELL
            $("#row_id_ad-bank_name").hide();
            $("#row_id_ad-account_info").hide();
            popup.slideUp();
        }

    }

    /**
     * Get ad type both create and edit screens.
     *
     * @return {String} ONLINE_SELL, ONLINE_BUY
     */
    function getAdType() {
        var val = $("input[name='ad-trade_type']:checked").val();
        if(!val) {
            // Edit form
            val = $("input[name='ad-trade_type']").val();
        }
        return val;

    }

    /**
     * Return "buy" or "sell" based on current choices
     */
    function getTradeType() {
        var val = getAdType();
        if(val == "ONLINE_SELL" || val == "LOCAL_SELL") {
            return "sell";
        } else {
            return "buy";
        }
    }

    /**
     * Build simple selling formula based on commission % and selected currency.
     *
     * @return {[type]} [description]
     */
    function recreateFormula() {

        var type = getTradeType();
        var val = $("#id_ad-commission").val();
        var equ = $("#id_ad-price_equation");
        var currency = getCurrency();
        var formula;

        if(val) {
            if(val.trim) {
                // IE8 does some kind of numeric value=
                val = val.trim();
            }
        }

        if(type == "sell") {
            val = 1+(parseFloat(val) / 100);
        } else {
            val = 1-(parseFloat(val) / 100);
        }

        if(isNaN(val)) {
            equ.val("");
            return;
        }

        // Temporary solution for altcoins
        if (currency == 'ETH') {
            formula = "btc_in_eth";
        } else if (currency == 'LTC') {
            formula = "btc_in_ltc";
    	} else if (currency == 'DASH'){
            formula = "btc_in_dash";
        } else if (currency == 'XMR') {
            formula = "btc_in_xmr";
        } else if (currency == 'XRP') {
            formula = "btc_in_xrp";
        } else {
            formula = "btc_in_usd";
            if(currency && currency != "USD") {
                formula += "*USD_in_" + currency;
            }
        }

        formula += "*" + val;

        equ.val(formula);
    }

    /**
     * Update price info every time you hit a key in the input.
     */
    function handleCommissionChanges() {
        $("#id_ad-commission").on("change input", function() {
            recreateFormula();
        });
    }

    function handleCurrencyChanges() {
        $("#id_ad-currency").on("change", function() {
            recreateFormula();
            updateMinMaxCurrency();
            updatePriceAJAX();
        });
    }

    // fire when trade type radio button toggles
    function handleTypeChanges() {
        $("input[name='ad-trade_type']").on("change", function() {
            var val = $("input[name='ad-trade_type']:checked").val();
            recreateFormula();
            updateMinMaxCurrency();
            updatePriceAJAX();
            if (val == "ONLINE_SELL" || val == "ONLINE_BUY") {
                $("#row_id_ad-bank_name").show();
            } else {
                $("#row_id_ad-bank_name").hide();
            }
            if (val == "ONLINE_BUY") {
                $("#identification_hint").show();
            } else {
                $("#identification_hint").hide();
            }
        });
    }

    // fire when trade type radio button toggles
    function handlePaymentMethodChanges() {
        $("input[name='ad-trade_type'], select[name='ad-online_provider']").on("change", function() {
            updatePaymentMethodInfo();
            updateCurrencyChoices();
        });
    }

    /**
     * When the country code changes (location search), update the
     * available options for payment method
     */
    function filterPaymentMethods() {

        // vanilla payment options
        var payment_options = $("#id_ad-online_provider-clone").children().clone();

        $("#id_ad-countrycode").on("change", function(e) {

            // store value before filtering out
            var val = $("#id_ad-online_provider").val();

            var country_code = $("#id_ad-countrycode").val();

            // nuke the payment options
            $("#id_ad-online_provider").empty();

            // create and add a new set of payment options
            var new_options = payment_options.clone().filter(function() {
                var info = paymentMethods[$(this).val()];

                if (info.deprecated) {
                    return false;
                }

                if(info.countrycodes) {
                    // This payment method can be filtered by country codes
                    if ($.inArray(country_code, info.countrycodes) >= 0) {
                        return true;
                    } else {
                        return false;
                    }
                }

                // Available to all countries
                return true;
            });

            $("#id_ad-online_provider").append(new_options);

            // Try restore old value if still in the list
            $("#id_ad-online_provider").val(val);
        });
    }

    /**
     * Read out premium data from the saved price equation and put it to commission field.
     *
     * If the user has entered the simple commission equation, then reparse
     * commission % from the saved equation.
     */
    function reparseCommission() {

        var type = getTradeType();
        var priceEqu = $("#id_ad-price_equation").val();
        var parts = priceEqu.split("*");
        var commission;
        if(priceEqu.startsWith("btc_in_usd*USD_in_")) {

            if(parts.length < 3) {
                $("#row_id_ad-commission").hide();
                return;
            }
            commission = parseFloat(parts[2]);
        } else if (priceEqu.startsWith("btc_in_usd*")) {
            if (parts.length < 2) {
                $("#row_id_ad-commission").hide();
                return;
            }
            commission = parseFloat(parts[1]);
        } else {
            // Custom/unknown equation
            $("#row_id_ad-commission").hide();
            return;
        }


        if(isNaN(commission)) {
            $("#row_id_ad-commission").hide();
            return;
        }

        if(type == "sell") {
            commission = (commission * 100) - 100;
        } else {
            commission = 100 - (commission * 100);
        }

        $("#id_ad-commission").val(commission);
    }

    /**
     * Anon user cannot edit the creation form.
     */
    function disableAll() {
        if($("#submit-id-submit").attr("disabled")) {
            var form = $("#ad-form");
            form.find("input, textarea, select").attr("disabled", "disabled").addClass("disabled");
            // $("#ad-form input").addClass("disabled");
        }
    }

    /**
     * Execute logic which only concerns edit page (not add page)
     */
    function onEditOpen() {
        // If creating ad, then do nothing
        if($("#edit-advertisement").size() === 0) {
            return;
        }

        reparseCommission();
        updatePriceAJAX();

        // Hide bank name when editing LOCAL_BUY, LOCAL_SELL
        var type = getAdType();
        if(type == "LOCAL_BUY" || type == "LOCAL_SELL") {
            $("#row_id_ad-bank_name").hide();
        }

        // If there are additional fields in ONLINE_SELL ad, then they replace the payment details.
        if (type == "ONLINE_SELL") {
            var method = $("#id_ad-online_provider").val();
            if ($('#online_sell_additional_fields-' + method).length) {
                // If user has some obsolete text data there, then display it as readonly, so user can copy it to new fields
                var old_account_info = $('#id_ad-account_info').val();
                if (old_account_info) {
                    $('#id_ad-account_info').attr('disabled', true);
                } else {
                    $("#row_id_ad-account_info").hide();
                }
            }
        }
    }

    /**
     * Execute logic which only concerns add page (not edit page)
     */
    function onAddOpen() {
        // If editing ad, then do nothing
        if($("#edit-advertisement").size() !== 0) {
            return;
        }
        updateCurrencyChoices();
        updatePaymentMethodInfo();
    }

    /**
     * We need to keep a copy of this object around, as we modify it in-place for payment method filtering.
     */
    function prepareOnlineProviders() {
        var clone = $("#id_ad-online_provider").clone();
        clone.attr("id", "id_ad-online_provider-clone");
        clone.css("display", "none");
        $(document.body).append(clone);
    }

    function bankNameAutocomplete() {
      /* Sets up autocomplete for ad create form */

      if (typeof $("#id_ad-bank_name").autocomplete === "undefined") {
        /* No relevant code loaded (edit form) */
        return;
      }

      $("#id_ad-bank_name").autocomplete({
	serviceUrl: function() {
	  return "/advertise/bank_names/?payment_method=" + $("#id_ad-online_provider").val() + "&countrycode=" + $("#id_ad-countrycode").val();
	},
	formatResult: function(suggestion, currentValue) {
	  return (suggestion.value + " (" + suggestion.data.count + ")").replace(currentValue, "<strong>" + currentValue + "</strong>");
	}
      });
      var autocomplete_reset = function() {
        /* resets the autocomplete's cache when search scope changes */
        $("#id_ad-bank_name").autocomplete().clearCache();
      }
      $("#id_ad-online_provider").change(autocomplete_reset);
      $("#id_ad-countrycode").change(autocomplete_reset);
    }

    function relocateAdditionalFields() {
        // Move possible additional sell fields to correct location
        var fields = $('.online_sell_additional_fields').detach();
        $('#row_id_ad-account_info').after(fields);
    }

    $(function() {
        updateMinMaxCurrency();
        relocateAdditionalFields();
        onEditOpen();
        prepareOnlineProviders();
        makeGooglePlaces();
        noSubmitOnEnter();
        handlePriceInputChanges();
        filterPaymentMethods();
        updatePriceAJAX();
        handleCommissionChanges();
        handleCurrencyChanges();
        handleTypeChanges();
        disableAll();
        handlePaymentMethodChanges();
        installRules();
        bankNameAutocomplete();
        onAddOpen();
    });

})(jQuery);
