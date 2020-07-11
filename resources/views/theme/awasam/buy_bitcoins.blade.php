@extends('theme.awasam.layout.main')

@section('main')
<div class="container">
    <div class="search-form-wrap">
      <ul class="nav nav-tabs search-form-nav" role="tablist">
        <li role="presentation" class="active"><a href="#orange_form_buy" class="tab-buy" aria-controls="orange_form_buy" role="tab" data-toggle="tab">QUICK BUY</a></li>
        <li role="presentation" class=""><a href="#orange_form_sell" class="tab-sell" aria-controls="orange_form_sell" role="tab" data-toggle="tab">QUICK SELL</a></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="orange_form_buy">
<form  action="index.html" class="search-form" method="post" > <input type='hidden' name='csrfmiddlewaretoken' value='4ejEx5bE8fV2bjbFpHpNKdl4cTRxFPUbwBdnPBAWGxis3M9fyIWKK8tRgSnMwGii' /> <div  
    class="search-form-fields" > <input type="hidden" name="action" value="buy" id="id_action" /> <input type="hidden" name="location_string" value="San Jose, United States" id="id_location_string" /> <div id="div_id_amount" class="form-group"> <div class="controls "> <input type="text" name="amount" placeholder="Amount" class="search-form-amount textinput textInput form-control" id="id_amount" /> </div> </div> <div id="div_id_currency" class="form-group"> <div class="controls "> <select name="currency" class="search-form-currency select form-control" id="id_currency"> <option value="AED">AED</option> <option value="AFN">AFN</option> <option value="ALL">ALL</option> <option value="AMD">AMD</option> <option value="ANG">ANG</option> <option value="AOA">AOA</option> <option value="ARS">ARS</option> <option value="AUD">AUD</option> <option value="AWG">AWG</option> <option value="AZN">AZN</option> <option value="BAM">BAM</option> <option value="BBD">BBD</option> <option value="BDT">BDT</option> <option value="BGN">BGN</option> <option value="BHD">BHD</option> <option value="BIF">BIF</option> <option value="BMD">BMD</option> <option value="BND">BND</option> <option value="BOB">BOB</option> <option value="BRL">BRL</option> <option value="BSD">BSD</option> <option value="BTN">BTN</option> <option value="BWP">BWP</option> <option value="BYN">BYN</option> <option value="BZD">BZD</option> <option value="CAD">CAD</option> <option value="CDF">CDF</option> <option value="CHF">CHF</option> <option value="CLF">CLF</option> <option value="CLP">CLP</option> <option value="CNH">CNH</option> <option value="CNY">CNY</option> <option value="COP">COP</option> <option value="CRC">CRC</option> <option value="CUC">CUC</option> <option value="CUP">CUP</option> <option value="CVE">CVE</option> <option value="CZK">CZK</option> <option value="DASH">DASH</option> <option value="DJF">DJF</option> <option value="DKK">DKK</option> <option value="DOP">DOP</option> <option value="DZD">DZD</option> <option value="EGP">EGP</option> <option value="ERN">ERN</option> <option value="ETB">ETB</option> <option value="ETH">ETH</option> <option value="EUR">EUR</option> <option value="FJD">FJD</option> <option value="FKP">FKP</option> <option value="GBP">GBP</option> <option value="GEL">GEL</option> <option value="GGP">GGP</option> <option value="GHS">GHS</option> <option value="GIP">GIP</option> <option value="GMD">GMD</option> <option value="GNF">GNF</option> <option value="GTQ">GTQ</option> <option value="GYD">GYD</option> <option value="HKD">HKD</option> <option value="HNL">HNL</option> <option value="HRK">HRK</option> <option value="HTG">HTG</option> <option value="HUF">HUF</option> <option value="IDR">IDR</option> <option value="ILS">ILS</option> <option value="IMP">IMP</option> <option value="INR">INR</option> <option value="IQD">IQD</option> <option value="IRR">IRR</option> <option value="ISK">ISK</option> <option value="JEP">JEP</option> <option value="JMD">JMD</option> <option value="JOD">JOD</option> <option value="JPY">JPY</option> <option value="KES">KES</option> <option value="KGS">KGS</option> <option value="KHR">KHR</option> <option value="KMF">KMF</option> <option value="KPW">KPW</option> <option value="KRW">KRW</option> <option value="KWD">KWD</option> <option value="KYD">KYD</option> <option value="KZT">KZT</option> <option value="LAK">LAK</option> <option value="LBP">LBP</option> <option value="LKR">LKR</option> <option value="LRD">LRD</option> <option value="LSL">LSL</option> <option value="LTC">LTC</option> <option value="LYD">LYD</option> <option value="MAD">MAD</option> <option value="MDL">MDL</option> <option value="MGA">MGA</option> <option value="MKD">MKD</option> <option value="MMK">MMK</option> <option value="MNT">MNT</option> <option value="MOP">MOP</option> <option value="MRU">MRU</option> <option value="MUR">MUR</option> <option value="MVR">MVR</option> <option value="MWK">MWK</option> <option value="MXN">MXN</option> <option value="MYR">MYR</option> <option value="MZN">MZN</option> <option value="NAD">NAD</option> <option value="NGN">NGN</option> <option value="NIO">NIO</option> <option value="NOK">NOK</option> <option value="NPR">NPR</option> <option value="NZD">NZD</option> <option value="OMR">OMR</option> <option value="PAB">PAB</option> <option value="PEN">PEN</option> <option value="PGK">PGK</option> <option value="PHP">PHP</option> <option value="PKR">PKR</option> <option value="PLN">PLN</option> <option value="PYG">PYG</option> <option value="QAR">QAR</option> <option value="RON">RON</option> <option value="RSD">RSD</option> <option value="RUB">RUB</option> <option value="RWF">RWF</option> <option value="SAR">SAR</option> <option value="SBD">SBD</option> <option value="SCR">SCR</option> <option value="SDG">SDG</option> <option value="SEK">SEK</option> <option value="SGD">SGD</option> <option value="SHP">SHP</option> <option value="SLL">SLL</option> <option value="SOS">SOS</option> <option value="SRD">SRD</option> <option value="SSP">SSP</option> <option value="STN">STN</option> <option value="SVC">SVC</option> <option value="SYP">SYP</option> <option value="SZL">SZL</option> <option value="THB">THB</option> <option value="TJS">TJS</option> <option value="TMT">TMT</option> <option value="TND">TND</option> <option value="TOP">TOP</option> <option value="TRY">TRY</option> <option value="TTD">TTD</option> <option value="TWD">TWD</option> <option value="TZS">TZS</option> <option value="UAH">UAH</option> <option value="UGX">UGX</option> <option value="USD" selected>USD</option> <option value="UYU">UYU</option> <option value="UZS">UZS</option> <option value="VES">VES</option> <option value="VND">VND</option> <option value="VUV">VUV</option> <option value="WST">WST</option> <option value="XAF">XAF</option> <option value="XAG">XAG</option> <option value="XAR">XAR</option> <option value="XAU">XAU</option> <option value="XCD">XCD</option> <option value="XDR">XDR</option> <option value="XMR">XMR</option> <option value="XOF">XOF</option> <option value="XPD">XPD</option> <option value="XPF">XPF</option> <option value="XPT">XPT</option> <option value="XRP">XRP</option> <option value="YER">YER</option> <option value="ZAR">ZAR</option> <option value="ZMW">ZMW</option> <option value="ZWL">ZWL</option>
</select> </div> </div> <div id="div_id_country_code" class="form-group"> <div class="controls "> <select name="country_code" class="search-form-country-code select form-control" id="search-form-country-code"> <option value="AF">Afghanistan</option> <option value="AL">Albania</option> <option value="DZ">Algeria</option> <option value="AS">American Samoa</option> <option value="AD">Andorra</option> <option value="AO">Angola</option> <option value="AI">Anguilla</option> <option value="AQ">Antarctica</option> <option value="AG">Antigua and Barbuda</option> <option value="AR">Argentina</option> <option value="AM">Armenia</option> <option value="AW">Aruba</option> <option value="AU">Australia</option> <option value="AT">Austria</option> <option value="AZ">Azerbaijan</option> <option value="BS">Bahamas</option> <option value="BH">Bahrain</option> <option value="BD">Bangladesh</option> <option value="BB">Barbados</option> <option value="BY">Belarus</option> <option value="BE">Belgium</option> <option value="BZ">Belize</option> <option value="BJ">Benin</option> <option value="BM">Bermuda</option> <option value="BT">Bhutan</option> <option value="BO">Bolivia</option> <option value="BQ">Bonaire, Sint Eustatius and Saba</option> <option value="BA">Bosnia and Herzegovina</option> <option value="BW">Botswana</option> <option value="BV">Bouvet Island</option> <option value="BR">Brazil</option> <option value="IO">British Indian Ocean Territory</option> <option value="BN">Brunei Darussalam</option> <option value="BG">Bulgaria</option> <option value="BF">Burkina Faso</option> <option value="BI">Burundi</option> <option value="CV">Cabo Verde</option> <option value="KH">Cambodia</option> <option value="CM">Cameroon</option> <option value="CA">Canada</option> <option value="KY">Cayman Islands</option> <option value="CF">Central African Republic</option> <option value="TD">Chad</option> <option value="CL">Chile</option> <option value="CN">China</option> <option value="CX">Christmas Island</option> <option value="CC">Cocos (Keeling) Islands</option> <option value="CO">Colombia</option> <option value="KM">Comoros</option> <option value="CG">Congo</option> <option value="CD">Congo, The Democratic Republic of the</option> <option value="CK">Cook Islands</option> <option value="CR">Costa Rica</option> <option value="HR">Croatia</option> <option value="CU">Cuba</option> <option value="CW">Curaçao</option> <option value="CY">Cyprus</option> <option value="CZ">Czechia</option> <option value="CI">Côte d&#39;Ivoire</option> <option value="DK">Denmark</option> <option value="DJ">Djibouti</option> <option value="DM">Dominica</option> <option value="DO">Dominican Republic</option> <option value="EC">Ecuador</option> <option value="EG">Egypt</option> <option value="SV">El Salvador</option> <option value="GQ">Equatorial Guinea</option> <option value="ER">Eritrea</option> <option value="EE">Estonia</option> <option value="ET">Ethiopia</option> <option value="FK">Falkland Islands (Malvinas)</option> <option value="FO">Faroe Islands</option> <option value="FJ">Fiji</option> <option value="FI">Finland</option> <option value="FR">France</option> <option value="GF">French Guiana</option> <option value="PF">French Polynesia</option> <option value="TF">French Southern Territories</option> <option value="GA">Gabon</option> <option value="GM">Gambia</option> <option value="GE">Georgia</option> <option value="DE">Germany</option> <option value="GH">Ghana</option> <option value="GI">Gibraltar</option> <option value="GR">Greece</option> <option value="GL">Greenland</option> <option value="GD">Grenada</option> <option value="GP">Guadeloupe</option> <option value="GU">Guam</option> <option value="GT">Guatemala</option> <option value="GG">Guernsey</option> <option value="GN">Guinea</option> <option value="GW">Guinea-Bissau</option> <option value="GY">Guyana</option> <option value="HT">Haiti</option> <option value="HM">Heard Island and McDonald Islands</option> <option value="VA">Holy See (Vatican City State)</option> <option value="HN">Honduras</option> <option value="HK">Hong Kong</option> <option value="HU">Hungary</option> <option value="IS">Iceland</option> <option value="IN">India</option> <option value="ID">Indonesia</option> <option value="IR">Iran, Islamic Republic of</option> <option value="IQ">Iraq</option> <option value="IE">Ireland</option> <option value="IM">Isle of Man</option> <option value="IL">Israel</option> <option value="IT">Italy</option> <option value="JM">Jamaica</option> <option value="JP">Japan</option> <option value="JE">Jersey</option> <option value="JO">Jordan</option> <option value="KZ">Kazakhstan</option> <option value="KE">Kenya</option> <option value="KI">Kiribati</option> <option value="KP">Korea, Democratic People&#39;s Republic of</option> <option value="KR">Korea, Republic of</option> <option value="KW">Kuwait</option> <option value="KG">Kyrgyzstan</option> <option value="LA">Lao People&#39;s Democratic Republic</option> <option value="LV">Latvia</option> <option value="LB">Lebanon</option> <option value="LS">Lesotho</option> <option value="LR">Liberia</option> <option value="LY">Libya</option> <option value="LI">Liechtenstein</option> <option value="LT">Lithuania</option> <option value="LU">Luxembourg</option> <option value="MO">Macao</option> <option value="MK">Macedonia, Republic of</option> <option value="MG">Madagascar</option> <option value="MW">Malawi</option> <option value="MY">Malaysia</option> <option value="MV">Maldives</option> <option value="ML">Mali</option> <option value="MT">Malta</option> <option value="MH">Marshall Islands</option> <option value="MQ">Martinique</option> <option value="MR">Mauritania</option> <option value="MU">Mauritius</option> <option value="YT">Mayotte</option> <option value="MX">Mexico</option> <option value="FM">Micronesia, Federated States of</option> <option value="MD">Moldova</option> <option value="MC">Monaco</option> <option value="MN">Mongolia</option> <option value="ME">Montenegro</option> <option value="MS">Montserrat</option> <option value="MA">Morocco</option> <option value="MZ">Mozambique</option> <option value="MM">Myanmar</option> <option value="NA">Namibia</option> <option value="NR">Nauru</option> <option value="NP">Nepal</option> <option value="NL">Netherlands</option> <option value="NC">New Caledonia</option> <option value="NZ">New Zealand</option> <option value="NI">Nicaragua</option> <option value="NE">Niger</option> <option value="NG">Nigeria</option> <option value="NU">Niue</option> <option value="NF">Norfolk Island</option> <option value="MP">Northern Mariana Islands</option> <option value="NO">Norway</option> <option value="OM">Oman</option> <option value="PK">Pakistan</option> <option value="PW">Palau</option> <option value="PS">Palestine, State of</option> <option value="PA">Panama</option> <option value="PG">Papua New Guinea</option> <option value="PY">Paraguay</option> <option value="PE">Peru</option> <option value="PH">Philippines</option> <option value="PN">Pitcairn</option> <option value="PL">Poland</option> <option value="PT">Portugal</option> <option value="PR">Puerto Rico</option> <option value="QA">Qatar</option> <option value="RO">Romania</option> <option value="RU">Russian Federation</option> <option value="RW">Rwanda</option> <option value="RE">Réunion</option> <option value="BL">Saint Barthélemy</option> <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option> <option value="KN">Saint Kitts and Nevis</option> <option value="LC">Saint Lucia</option> <option value="MF">Saint Martin (French part)</option> <option value="PM">Saint Pierre and Miquelon</option> <option value="VC">Saint Vincent and the Grenadines</option> <option value="WS">Samoa</option> <option value="SM">San Marino</option> <option value="ST">Sao Tome and Principe</option> <option value="SA">Saudi Arabia</option> <option value="SN">Senegal</option> <option value="RS">Serbia</option> <option value="SC">Seychelles</option> <option value="SL">Sierra Leone</option> <option value="SG">Singapore</option> <option value="SX">Sint Maarten (Dutch part)</option> <option value="SK">Slovakia</option> <option value="SI">Slovenia</option> <option value="SB">Solomon Islands</option> <option value="SO">Somalia</option> <option value="ZA">South Africa</option> <option value="GS">South Georgia and the South Sandwich Islands</option> <option value="SS">South Sudan</option> <option value="ES">Spain</option> <option value="LK">Sri Lanka</option> <option value="SD">Sudan</option> <option value="SR">Suriname</option> <option value="SJ">Svalbard and Jan Mayen</option> <option value="SZ">Swaziland</option> <option value="SE">Sweden</option> <option value="CH">Switzerland</option> <option value="SY">Syrian Arab Republic</option> <option value="TW">Taiwan</option> <option value="TJ">Tajikistan</option> <option value="TZ">Tanzania</option> <option value="TH">Thailand</option> <option value="TL">Timor-Leste</option> <option value="TG">Togo</option> <option value="TK">Tokelau</option> <option value="TO">Tonga</option> <option value="TT">Trinidad and Tobago</option> <option value="TN">Tunisia</option> <option value="TR">Turkey</option> <option value="TM">Turkmenistan</option> <option value="TC">Turks and Caicos Islands</option> <option value="TV">Tuvalu</option> <option value="UG">Uganda</option> <option value="UA">Ukraine</option> <option value="AE">United Arab Emirates</option> <option value="GB">United Kingdom</option> <option value="US" selected>United States</option> <option value="UM">United States Minor Outlying Islands</option> <option value="UY">Uruguay</option> <option value="UZ">Uzbekistan</option> <option value="VU">Vanuatu</option> <option value="VE">Venezuela</option> <option value="VN">Vietnam</option> <option value="VG">Virgin Islands, British</option> <option value="VI">Virgin Islands, U.S.</option> <option value="WF">Wallis and Futuna</option> <option value="EH">Western Sahara</option> <option value="YE">Yemen</option> <option value="ZM">Zambia</option> <option value="ZW">Zimbabwe</option> <option value="AX">Åland Islands</option>
</select> </div> </div> <div id="div_id_online_provider" class="form-group"> <div class="controls "> <select name="online_provider" class="search-form-online-provider select form-control" id="id_online_provider"> <option value="NATIONAL_BANK">National bank transfer</option> <option value="SEPA">SEPA (EU) bank transfer</option> <option value="SPECIFIC_BANK">Transfers with specific bank</option> <option value="INTERNATIONAL_WIRE_SWIFT">International Wire (SWIFT)</option> <option value="OTHER">Other online payment</option> <option value="CASH_DEPOSIT">Cash deposit</option> <option value="ECOCASH">EcoCash</option> <option value="HAL_CASH">Hal-cash</option> <option value="SWISH">Swish</option> <option value="VIPPS">Vipps</option> <option value="MOBILEPAY_DANSKE_BANK">MobilePay FI</option> <option value="QIWI">QIWI</option> <option value="TELE2">TELE2</option> <option value="BANK_TRANSFER_IMPS">IMPS Bank Transfer India</option> <option value="UPI_TRANSFER">UPI Transfer</option> <option value="PAYTM">PayTM</option> <option value="LYDIA">Lydia</option> <option value="INTERAC">Interac e-transfer</option> <option value="PINGIT">Pingit</option> <option value="PAYM">Paym</option> <option value="PYC">PYC</option> <option value="ALIPAY">Alipay</option> <option value="SUPERFLASH">Superflash</option> <option value="CHASE_QUICKPAY">Chase Quickpay</option> <option value="CHIPPER_CASH">Chipper Cash</option> <option value="OKPAY">OKPay</option> <option value="PAYPAL">Paypal</option> <option value="WEBMONEY">WebMoney</option> <option value="MONEYBOOKERS">Moneybookers / Skrill</option> <option value="NETELLER">Neteller</option> <option value="APPLE_PAY">Apple Pay</option> <option value="TWINT">TWINT</option> <option value="WU">Western Union</option> <option value="PostePay">PostePay</option> <option value="MONEYGRAM">Moneygram</option> <option value="CASHIERS_CHECK">Cashier&#39;s check</option> <option value="VENMO">Venmo</option> <option value="ZELLE">Zelle</option> <option value="DWOLLA">Dwolla</option> <option value="PERFECT_MONEY">Perfect Money</option> <option value="CASHU">CashU</option> <option value="PAYZA">Payza</option> <option value="BLUEBIRD_CARD">Bluebird Card</option> <option value="REVOLUT">Revolut</option> <option value="GREENDOT_CARD">GreenDot Card</option> <option value="ASTROPAY">AstroPay</option> <option value="MPESA_KENYA">M-PESA Kenya (Safaricom)</option> <option value="MPESA_TANZANIA">M-PESA Tanzania (Vodacom)</option> <option value="PAYID">PayID</option> <option value="OTHER_ONLINE_WALLET">Other Online Wallet</option> <option value="OTHER_ONLINE_WALLET_GLOBAL">Other Online Wallet (Global)</option> <option value="OTHER_REMITTANCE">Other Remittance</option> <option value="BITMAIN_COUPON">Bitmain Coupon</option> <option value="GOOGLEWALLET">Google Pay</option> <option value="TRANSFERWISE">Transferwise</option> <option value="RIA">RIA Money Transfer</option> <option value="XOOM">Xoom</option> <option value="MOBILEPAY_DANSKE_BANK_DK">MobilePay</option> <option value="PAYEER">Payeer</option> <option value="ADVCASH">advcash</option> <option value="HYPERWALLET">hyperWALLET</option> <option value="MOBILEPAY_DANSKE_BANK_NO">MobilePay NO</option> <option value="TIGOPESA_TANZANIA">Tigo-Pesa Tanzania</option> <option value="ALTCOIN_XRP">Ripple altcoin</option> <option value="PAYONEER">Payoneer</option> <option value="SQUARE_CASH">Cash App</option> <option value="PAXUM">Paxum</option> <option value="CASH_AT_ATM">Cash at ATM</option> <option value="ALTCOIN_LTC">Litecoin altcoin</option> <option value="CREDITCARD">Credit card</option> <option value="WECHAT">WeChat</option> <option value="WALMART2WALMART">Walmart 2 Walmart</option> <option value="EASYPAISA">Easypaisa</option> <option value="SERVE2SERVE">Serve2Serve</option> <option value="WORLDREMIT">Worldremit</option> <option value="ALTCOIN_ETH">Ethereum altcoin</option> <option value="YANDEXMONEY">Yandex Money</option> <option value="ALL_ONLINE" selected>All online offers</option>
</select> </div> </div> <div class="form-group"> <div class="controls "> <input type="submit"
    name="find-offers"
    value="Search"
        class="btn btn-primary search-form-button"
        id="submit-id-find-offers"
    /> </div>
</div>
</div>
<div class="form-group"> <div class="controls "> <input type="submit"
    name="find-offers"
    value="Search"
        class="btn btn-primary search-form-button search-form-button-advanced"
        id="submit-id-find-offers"
    /> </div>
</div> </form>
        </div>
        <div role="tabpanel" class="tab-pane " id="orange_form_sell">
<form  action="index.html" class="search-form" method="post" > <input type='hidden' name='csrfmiddlewaretoken' value='4ejEx5bE8fV2bjbFpHpNKdl4cTRxFPUbwBdnPBAWGxis3M9fyIWKK8tRgSnMwGii' /> <div  
    class="search-form-fields" > <input type="hidden" name="action" value="sell" id="id_action" /> <input type="hidden" name="location_string" value="San Jose, United States" id="id_location_string" /> <div id="div_id_amount" class="form-group"> <div class="controls "> <input type="text" name="amount" placeholder="Amount" class="search-form-amount textinput textInput form-control" id="id_amount" /> </div> </div> <div id="div_id_currency" class="form-group"> <div class="controls "> <select name="currency" class="search-form-currency select form-control" id="id_currency"> <option value="AED">AED</option> <option value="AFN">AFN</option> <option value="ALL">ALL</option> <option value="AMD">AMD</option> <option value="ANG">ANG</option> <option value="AOA">AOA</option> <option value="ARS">ARS</option> <option value="AUD">AUD</option> <option value="AWG">AWG</option> <option value="AZN">AZN</option> <option value="BAM">BAM</option> <option value="BBD">BBD</option> <option value="BDT">BDT</option> <option value="BGN">BGN</option> <option value="BHD">BHD</option> <option value="BIF">BIF</option> <option value="BMD">BMD</option> <option value="BND">BND</option> <option value="BOB">BOB</option> <option value="BRL">BRL</option> <option value="BSD">BSD</option> <option value="BTN">BTN</option> <option value="BWP">BWP</option> <option value="BYN">BYN</option> <option value="BZD">BZD</option> <option value="CAD">CAD</option> <option value="CDF">CDF</option> <option value="CHF">CHF</option> <option value="CLF">CLF</option> <option value="CLP">CLP</option> <option value="CNH">CNH</option> <option value="CNY">CNY</option> <option value="COP">COP</option> <option value="CRC">CRC</option> <option value="CUC">CUC</option> <option value="CUP">CUP</option> <option value="CVE">CVE</option> <option value="CZK">CZK</option> <option value="DASH">DASH</option> <option value="DJF">DJF</option> <option value="DKK">DKK</option> <option value="DOP">DOP</option> <option value="DZD">DZD</option> <option value="EGP">EGP</option> <option value="ERN">ERN</option> <option value="ETB">ETB</option> <option value="ETH">ETH</option> <option value="EUR">EUR</option> <option value="FJD">FJD</option> <option value="FKP">FKP</option> <option value="GBP">GBP</option> <option value="GEL">GEL</option> <option value="GGP">GGP</option> <option value="GHS">GHS</option> <option value="GIP">GIP</option> <option value="GMD">GMD</option> <option value="GNF">GNF</option> <option value="GTQ">GTQ</option> <option value="GYD">GYD</option> <option value="HKD">HKD</option> <option value="HNL">HNL</option> <option value="HRK">HRK</option> <option value="HTG">HTG</option> <option value="HUF">HUF</option> <option value="IDR">IDR</option> <option value="ILS">ILS</option> <option value="IMP">IMP</option> <option value="INR">INR</option> <option value="IQD">IQD</option> <option value="IRR">IRR</option> <option value="ISK">ISK</option> <option value="JEP">JEP</option> <option value="JMD">JMD</option> <option value="JOD">JOD</option> <option value="JPY">JPY</option> <option value="KES">KES</option> <option value="KGS">KGS</option> <option value="KHR">KHR</option> <option value="KMF">KMF</option> <option value="KPW">KPW</option> <option value="KRW">KRW</option> <option value="KWD">KWD</option> <option value="KYD">KYD</option> <option value="KZT">KZT</option> <option value="LAK">LAK</option> <option value="LBP">LBP</option> <option value="LKR">LKR</option> <option value="LRD">LRD</option> <option value="LSL">LSL</option> <option value="LTC">LTC</option> <option value="LYD">LYD</option> <option value="MAD">MAD</option> <option value="MDL">MDL</option> <option value="MGA">MGA</option> <option value="MKD">MKD</option> <option value="MMK">MMK</option> <option value="MNT">MNT</option> <option value="MOP">MOP</option> <option value="MRU">MRU</option> <option value="MUR">MUR</option> <option value="MVR">MVR</option> <option value="MWK">MWK</option> <option value="MXN">MXN</option> <option value="MYR">MYR</option> <option value="MZN">MZN</option> <option value="NAD">NAD</option> <option value="NGN">NGN</option> <option value="NIO">NIO</option> <option value="NOK">NOK</option> <option value="NPR">NPR</option> <option value="NZD">NZD</option> <option value="OMR">OMR</option> <option value="PAB">PAB</option> <option value="PEN">PEN</option> <option value="PGK">PGK</option> <option value="PHP">PHP</option> <option value="PKR">PKR</option> <option value="PLN">PLN</option> <option value="PYG">PYG</option> <option value="QAR">QAR</option> <option value="RON">RON</option> <option value="RSD">RSD</option> <option value="RUB">RUB</option> <option value="RWF">RWF</option> <option value="SAR">SAR</option> <option value="SBD">SBD</option> <option value="SCR">SCR</option> <option value="SDG">SDG</option> <option value="SEK">SEK</option> <option value="SGD">SGD</option> <option value="SHP">SHP</option> <option value="SLL">SLL</option> <option value="SOS">SOS</option> <option value="SRD">SRD</option> <option value="SSP">SSP</option> <option value="STN">STN</option> <option value="SVC">SVC</option> <option value="SYP">SYP</option> <option value="SZL">SZL</option> <option value="THB">THB</option> <option value="TJS">TJS</option> <option value="TMT">TMT</option> <option value="TND">TND</option> <option value="TOP">TOP</option> <option value="TRY">TRY</option> <option value="TTD">TTD</option> <option value="TWD">TWD</option> <option value="TZS">TZS</option> <option value="UAH">UAH</option> <option value="UGX">UGX</option> <option value="USD" selected>USD</option> <option value="UYU">UYU</option> <option value="UZS">UZS</option> <option value="VES">VES</option> <option value="VND">VND</option> <option value="VUV">VUV</option> <option value="WST">WST</option> <option value="XAF">XAF</option> <option value="XAG">XAG</option> <option value="XAR">XAR</option> <option value="XAU">XAU</option> <option value="XCD">XCD</option> <option value="XDR">XDR</option> <option value="XMR">XMR</option> <option value="XOF">XOF</option> <option value="XPD">XPD</option> <option value="XPF">XPF</option> <option value="XPT">XPT</option> <option value="XRP">XRP</option> <option value="YER">YER</option> <option value="ZAR">ZAR</option> <option value="ZMW">ZMW</option> <option value="ZWL">ZWL</option>
</select> </div> </div> <div id="div_id_country_code" class="form-group"> <div class="controls "> <select name="country_code" class="search-form-country-code select form-control" id="search-form-country-code"> <option value="AF">Afghanistan</option> <option value="AL">Albania</option> <option value="DZ">Algeria</option> <option value="AS">American Samoa</option> <option value="AD">Andorra</option> <option value="AO">Angola</option> <option value="AI">Anguilla</option> <option value="AQ">Antarctica</option> <option value="AG">Antigua and Barbuda</option> <option value="AR">Argentina</option> <option value="AM">Armenia</option> <option value="AW">Aruba</option> <option value="AU">Australia</option> <option value="AT">Austria</option> <option value="AZ">Azerbaijan</option> <option value="BS">Bahamas</option> <option value="BH">Bahrain</option> <option value="BD">Bangladesh</option> <option value="BB">Barbados</option> <option value="BY">Belarus</option> <option value="BE">Belgium</option> <option value="BZ">Belize</option> <option value="BJ">Benin</option> <option value="BM">Bermuda</option> <option value="BT">Bhutan</option> <option value="BO">Bolivia</option> <option value="BQ">Bonaire, Sint Eustatius and Saba</option> <option value="BA">Bosnia and Herzegovina</option> <option value="BW">Botswana</option> <option value="BV">Bouvet Island</option> <option value="BR">Brazil</option> <option value="IO">British Indian Ocean Territory</option> <option value="BN">Brunei Darussalam</option> <option value="BG">Bulgaria</option> <option value="BF">Burkina Faso</option> <option value="BI">Burundi</option> <option value="CV">Cabo Verde</option> <option value="KH">Cambodia</option> <option value="CM">Cameroon</option> <option value="CA">Canada</option> <option value="KY">Cayman Islands</option> <option value="CF">Central African Republic</option> <option value="TD">Chad</option> <option value="CL">Chile</option> <option value="CN">China</option> <option value="CX">Christmas Island</option> <option value="CC">Cocos (Keeling) Islands</option> <option value="CO">Colombia</option> <option value="KM">Comoros</option> <option value="CG">Congo</option> <option value="CD">Congo, The Democratic Republic of the</option> <option value="CK">Cook Islands</option> <option value="CR">Costa Rica</option> <option value="HR">Croatia</option> <option value="CU">Cuba</option> <option value="CW">Curaçao</option> <option value="CY">Cyprus</option> <option value="CZ">Czechia</option> <option value="CI">Côte d&#39;Ivoire</option> <option value="DK">Denmark</option> <option value="DJ">Djibouti</option> <option value="DM">Dominica</option> <option value="DO">Dominican Republic</option> <option value="EC">Ecuador</option> <option value="EG">Egypt</option> <option value="SV">El Salvador</option> <option value="GQ">Equatorial Guinea</option> <option value="ER">Eritrea</option> <option value="EE">Estonia</option> <option value="ET">Ethiopia</option> <option value="FK">Falkland Islands (Malvinas)</option> <option value="FO">Faroe Islands</option> <option value="FJ">Fiji</option> <option value="FI">Finland</option> <option value="FR">France</option> <option value="GF">French Guiana</option> <option value="PF">French Polynesia</option> <option value="TF">French Southern Territories</option> <option value="GA">Gabon</option> <option value="GM">Gambia</option> <option value="GE">Georgia</option> <option value="DE">Germany</option> <option value="GH">Ghana</option> <option value="GI">Gibraltar</option> <option value="GR">Greece</option> <option value="GL">Greenland</option> <option value="GD">Grenada</option> <option value="GP">Guadeloupe</option> <option value="GU">Guam</option> <option value="GT">Guatemala</option> <option value="GG">Guernsey</option> <option value="GN">Guinea</option> <option value="GW">Guinea-Bissau</option> <option value="GY">Guyana</option> <option value="HT">Haiti</option> <option value="HM">Heard Island and McDonald Islands</option> <option value="VA">Holy See (Vatican City State)</option> <option value="HN">Honduras</option> <option value="HK">Hong Kong</option> <option value="HU">Hungary</option> <option value="IS">Iceland</option> <option value="IN">India</option> <option value="ID">Indonesia</option> <option value="IR">Iran, Islamic Republic of</option> <option value="IQ">Iraq</option> <option value="IE">Ireland</option> <option value="IM">Isle of Man</option> <option value="IL">Israel</option> <option value="IT">Italy</option> <option value="JM">Jamaica</option> <option value="JP">Japan</option> <option value="JE">Jersey</option> <option value="JO">Jordan</option> <option value="KZ">Kazakhstan</option> <option value="KE">Kenya</option> <option value="KI">Kiribati</option> <option value="KP">Korea, Democratic People&#39;s Republic of</option> <option value="KR">Korea, Republic of</option> <option value="KW">Kuwait</option> <option value="KG">Kyrgyzstan</option> <option value="LA">Lao People&#39;s Democratic Republic</option> <option value="LV">Latvia</option> <option value="LB">Lebanon</option> <option value="LS">Lesotho</option> <option value="LR">Liberia</option> <option value="LY">Libya</option> <option value="LI">Liechtenstein</option> <option value="LT">Lithuania</option> <option value="LU">Luxembourg</option> <option value="MO">Macao</option> <option value="MK">Macedonia, Republic of</option> <option value="MG">Madagascar</option> <option value="MW">Malawi</option> <option value="MY">Malaysia</option> <option value="MV">Maldives</option> <option value="ML">Mali</option> <option value="MT">Malta</option> <option value="MH">Marshall Islands</option> <option value="MQ">Martinique</option> <option value="MR">Mauritania</option> <option value="MU">Mauritius</option> <option value="YT">Mayotte</option> <option value="MX">Mexico</option> <option value="FM">Micronesia, Federated States of</option> <option value="MD">Moldova</option> <option value="MC">Monaco</option> <option value="MN">Mongolia</option> <option value="ME">Montenegro</option> <option value="MS">Montserrat</option> <option value="MA">Morocco</option> <option value="MZ">Mozambique</option> <option value="MM">Myanmar</option> <option value="NA">Namibia</option> <option value="NR">Nauru</option> <option value="NP">Nepal</option> <option value="NL">Netherlands</option> <option value="NC">New Caledonia</option> <option value="NZ">New Zealand</option> <option value="NI">Nicaragua</option> <option value="NE">Niger</option> <option value="NG">Nigeria</option> <option value="NU">Niue</option> <option value="NF">Norfolk Island</option> <option value="MP">Northern Mariana Islands</option> <option value="NO">Norway</option> <option value="OM">Oman</option> <option value="PK">Pakistan</option> <option value="PW">Palau</option> <option value="PS">Palestine, State of</option> <option value="PA">Panama</option> <option value="PG">Papua New Guinea</option> <option value="PY">Paraguay</option> <option value="PE">Peru</option> <option value="PH">Philippines</option> <option value="PN">Pitcairn</option> <option value="PL">Poland</option> <option value="PT">Portugal</option> <option value="PR">Puerto Rico</option> <option value="QA">Qatar</option> <option value="RO">Romania</option> <option value="RU">Russian Federation</option> <option value="RW">Rwanda</option> <option value="RE">Réunion</option> <option value="BL">Saint Barthélemy</option> <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option> <option value="KN">Saint Kitts and Nevis</option> <option value="LC">Saint Lucia</option> <option value="MF">Saint Martin (French part)</option> <option value="PM">Saint Pierre and Miquelon</option> <option value="VC">Saint Vincent and the Grenadines</option> <option value="WS">Samoa</option> <option value="SM">San Marino</option> <option value="ST">Sao Tome and Principe</option> <option value="SA">Saudi Arabia</option> <option value="SN">Senegal</option> <option value="RS">Serbia</option> <option value="SC">Seychelles</option> <option value="SL">Sierra Leone</option> <option value="SG">Singapore</option> <option value="SX">Sint Maarten (Dutch part)</option> <option value="SK">Slovakia</option> <option value="SI">Slovenia</option> <option value="SB">Solomon Islands</option> <option value="SO">Somalia</option> <option value="ZA">South Africa</option> <option value="GS">South Georgia and the South Sandwich Islands</option> <option value="SS">South Sudan</option> <option value="ES">Spain</option> <option value="LK">Sri Lanka</option> <option value="SD">Sudan</option> <option value="SR">Suriname</option> <option value="SJ">Svalbard and Jan Mayen</option> <option value="SZ">Swaziland</option> <option value="SE">Sweden</option> <option value="CH">Switzerland</option> <option value="SY">Syrian Arab Republic</option> <option value="TW">Taiwan</option> <option value="TJ">Tajikistan</option> <option value="TZ">Tanzania</option> <option value="TH">Thailand</option> <option value="TL">Timor-Leste</option> <option value="TG">Togo</option> <option value="TK">Tokelau</option> <option value="TO">Tonga</option> <option value="TT">Trinidad and Tobago</option> <option value="TN">Tunisia</option> <option value="TR">Turkey</option> <option value="TM">Turkmenistan</option> <option value="TC">Turks and Caicos Islands</option> <option value="TV">Tuvalu</option> <option value="UG">Uganda</option> <option value="UA">Ukraine</option> <option value="AE">United Arab Emirates</option> <option value="GB">United Kingdom</option> <option value="US" selected>United States</option> <option value="UM">United States Minor Outlying Islands</option> <option value="UY">Uruguay</option> <option value="UZ">Uzbekistan</option> <option value="VU">Vanuatu</option> <option value="VE">Venezuela</option> <option value="VN">Vietnam</option> <option value="VG">Virgin Islands, British</option> <option value="VI">Virgin Islands, U.S.</option> <option value="WF">Wallis and Futuna</option> <option value="EH">Western Sahara</option> <option value="YE">Yemen</option> <option value="ZM">Zambia</option> <option value="ZW">Zimbabwe</option> <option value="AX">Åland Islands</option>
</select> </div> </div> <div id="div_id_online_provider" class="form-group"> <div class="controls "> <select name="online_provider" class="search-form-online-provider select form-control" id="id_online_provider"> <option value="NATIONAL_BANK">National bank transfer</option> <option value="SEPA">SEPA (EU) bank transfer</option> <option value="SPECIFIC_BANK">Transfers with specific bank</option> <option value="INTERNATIONAL_WIRE_SWIFT">International Wire (SWIFT)</option> <option value="OTHER">Other online payment</option> <option value="CASH_DEPOSIT">Cash deposit</option> <option value="ECOCASH">EcoCash</option> <option value="HAL_CASH">Hal-cash</option> <option value="SWISH">Swish</option> <option value="VIPPS">Vipps</option> <option value="MOBILEPAY_DANSKE_BANK">MobilePay FI</option> <option value="QIWI">QIWI</option> <option value="TELE2">TELE2</option> <option value="BANK_TRANSFER_IMPS">IMPS Bank Transfer India</option> <option value="UPI_TRANSFER">UPI Transfer</option> <option value="PAYTM">PayTM</option> <option value="LYDIA">Lydia</option> <option value="INTERAC">Interac e-transfer</option> <option value="PINGIT">Pingit</option> <option value="PAYM">Paym</option> <option value="PYC">PYC</option> <option value="ALIPAY">Alipay</option> <option value="SUPERFLASH">Superflash</option> <option value="CHASE_QUICKPAY">Chase Quickpay</option> <option value="CHIPPER_CASH">Chipper Cash</option> <option value="OKPAY">OKPay</option> <option value="PAYPAL">Paypal</option> <option value="WEBMONEY">WebMoney</option> <option value="MONEYBOOKERS">Moneybookers / Skrill</option> <option value="NETELLER">Neteller</option> <option value="APPLE_PAY">Apple Pay</option> <option value="TWINT">TWINT</option> <option value="WU">Western Union</option> <option value="PostePay">PostePay</option> <option value="MONEYGRAM">Moneygram</option> <option value="CASHIERS_CHECK">Cashier&#39;s check</option> <option value="VENMO">Venmo</option> <option value="ZELLE">Zelle</option> <option value="DWOLLA">Dwolla</option> <option value="PERFECT_MONEY">Perfect Money</option> <option value="CASHU">CashU</option> <option value="PAYZA">Payza</option> <option value="BLUEBIRD_CARD">Bluebird Card</option> <option value="REVOLUT">Revolut</option> <option value="GREENDOT_CARD">GreenDot Card</option> <option value="ASTROPAY">AstroPay</option> <option value="MPESA_KENYA">M-PESA Kenya (Safaricom)</option> <option value="MPESA_TANZANIA">M-PESA Tanzania (Vodacom)</option> <option value="PAYID">PayID</option> <option value="OTHER_ONLINE_WALLET">Other Online Wallet</option> <option value="OTHER_ONLINE_WALLET_GLOBAL">Other Online Wallet (Global)</option> <option value="OTHER_REMITTANCE">Other Remittance</option> <option value="BITMAIN_COUPON">Bitmain Coupon</option> <option value="GOOGLEWALLET">Google Pay</option> <option value="TRANSFERWISE">Transferwise</option> <option value="RIA">RIA Money Transfer</option> <option value="XOOM">Xoom</option> <option value="MOBILEPAY_DANSKE_BANK_DK">MobilePay</option> <option value="PAYEER">Payeer</option> <option value="ADVCASH">advcash</option> <option value="HYPERWALLET">hyperWALLET</option> <option value="MOBILEPAY_DANSKE_BANK_NO">MobilePay NO</option> <option value="TIGOPESA_TANZANIA">Tigo-Pesa Tanzania</option> <option value="ALTCOIN_XRP">Ripple altcoin</option> <option value="PAYONEER">Payoneer</option> <option value="SQUARE_CASH">Cash App</option> <option value="PAXUM">Paxum</option> <option value="CASH_AT_ATM">Cash at ATM</option> <option value="ALTCOIN_LTC">Litecoin altcoin</option> <option value="CREDITCARD">Credit card</option> <option value="WECHAT">WeChat</option> <option value="WALMART2WALMART">Walmart 2 Walmart</option> <option value="EASYPAISA">Easypaisa</option> <option value="SERVE2SERVE">Serve2Serve</option> <option value="WORLDREMIT">Worldremit</option> <option value="ALTCOIN_ETH">Ethereum altcoin</option> <option value="YANDEXMONEY">Yandex Money</option> <option value="ALL_ONLINE" selected>All online offers</option>
</select> </div> </div> <div class="form-group"> <div class="controls "> <input type="submit"
    name="find-offers"
    value="Search"
        class="btn btn-primary search-form-button"
        id="submit-id-find-offers"
    /> </div>
</div>
</div>
<div class="form-group"> <div class="controls "> <input type="submit"
    name="find-offers"
    value="Search"
        class="btn btn-primary search-form-button search-form-button-advanced"
        id="submit-id-find-offers"
    /> </div>
</div> </form>
        </div>
      </div>
    </div>
<script>
    window.quickForm = {
        currencyData: {"BD": "BDT", "BE": "EUR", "BF": "XOF", "BG": "BGN", "BA": "BAM", "BB": "BBD", "WF": "XPF", "BL": "EUR", "BM": "BMD", "BN": "BND", "BO": "BOB", "BH": "BHD", "BI": "BIF", "BJ": "XOF", "BT": "INR", "JM": "JMD", "BV": "NOK", "BW": "BWP", "WS": "WST", "BQ": "USD", "BR": "BRL", "BS": "BSD", "JE": "GBP", "BY": "BYN", "BZ": "BZD", "RU": "RUB", "RW": "RWF", "RS": "RSD", "TL": "USD", "RE": "EUR", "TM": "TMT", "TJ": "TJS", "RO": "RON", "TK": "NZD", "GW": "XOF", "GU": "USD", "GT": "GTQ", "GS": "GBP", "GR": "EUR", "GQ": "XAF", "GP": "EUR", "JP": "JPY", "GY": "GYD", "GG": "GBP", "GF": "EUR", "GE": "GEL", "GD": "XCD", "GB": "GBP", "GA": "XAF", "SV": "USD", "GN": "GNF", "GM": "GMD", "GL": "DKK", "GI": "GIP", "GH": "GHS", "OM": "OMR", "TN": "TND", "JO": "JOD", "HR": "HRK", "HT": "HTG", "HU": "HUF", "HK": "HKD", "HN": "HNL", "HM": "AUD", "VE": "VES", "PR": "USD", "PS": "ILS", "PW": "USD", "PT": "EUR", "SJ": "NOK", "PY": "PYG", "IQ": "IQD", "PA": "PAB", "PF": "XPF", "PG": "PGK", "PE": "PEN", "PK": "PKR", "PH": "PHP", "PN": "NZD", "PL": "PLN", "PM": "EUR", "ZM": "ZMW", "EH": "MAD", "EE": "EUR", "EG": "EGP", "ZA": "ZAR", "EC": "USD", "IT": "EUR", "VN": "VND", "SB": "SBD", "ET": "ETB", "SO": "SOS", "ZW": "USD", "SA": "SAR", "ES": "EUR", "ER": "ERN", "ME": "EUR", "MD": "MDL", "MG": "MGA", "MF": "EUR", "MA": "MAD", "MC": "EUR", "UZ": "UZS", "MM": "MMK", "ML": "XOF", "MO": "MOP", "MN": "MNT", "MH": "USD", "MK": "MKD", "MU": "MUR", "MT": "EUR", "MW": "MWK", "MV": "MVR", "MQ": "EUR", "MP": "USD", "MS": "XCD", "MR": "MRU", "IM": "GBP", "UG": "UGX", "TZ": "TZS", "MY": "MYR", "MX": "MXN", "IL": "ILS", "FR": "EUR", "IO": "USD", "SH": "SHP", "FI": "EUR", "FJ": "FJD", "FK": "FKP", "FM": "USD", "FO": "DKK", "NI": "NIO", "NL": "EUR", "NO": "NOK", "NA": "ZAR", "VU": "VUV", "NC": "XPF", "NE": "XOF", "NF": "AUD", "NG": "NGN", "NZ": "NZD", "NP": "NPR", "NR": "AUD", "NU": "NZD", "CK": "NZD", "CI": "XOF", "CH": "CHF", "CO": "COP", "CN": "CNY", "CM": "XAF", "CL": "CLP", "CC": "AUD", "CA": "CAD", "CG": "XAF", "CF": "XAF", "CD": "CDF", "CZ": "CZK", "CY": "EUR", "CX": "AUD", "CR": "CRC", "CW": "ANG", "CV": "CVE", "CU": "CUP", "SZ": "SZL", "SY": "SYP", "SX": "ANG", "KG": "KGS", "KE": "KES", "SS": "SSP", "SR": "SRD", "KI": "AUD", "KH": "KHR", "KN": "XCD", "KM": "KMF", "ST": "STN", "SK": "EUR", "KR": "KRW", "SI": "EUR", "KP": "KPW", "KW": "KWD", "SN": "XOF", "SM": "EUR", "SL": "SLL", "SC": "SCR", "KZ": "KZT", "KY": "KYD", "SG": "SGD", "SE": "SEK", "SD": "SDG", "DO": "DOP", "DM": "XCD", "DJ": "DJF", "DK": "DKK", "VG": "USD", "DE": "EUR", "YE": "YER", "DZ": "DZD", "US": "USD", "UY": "UYU", "YT": "EUR", "UM": "USD", "LB": "LBP", "LC": "XCD", "LA": "LAK", "TV": "AUD", "TW": "TWD", "TT": "TTD", "TR": "TRY", "LK": "LKR", "LI": "CHF", "LV": "EUR", "TO": "TOP", "LT": "EUR", "LU": "EUR", "LR": "LRD", "LS": "ZAR", "TH": "THB", "TF": "EUR", "TG": "XOF", "TD": "XAF", "TC": "USD", "LY": "LYD", "VA": "EUR", "VC": "XCD", "AE": "AED", "AD": "EUR", "AG": "XCD", "AF": "AFN", "AI": "XCD", "VI": "USD", "IS": "ISK", "IR": "IRR", "AM": "AMD", "AL": "ALL", "AO": "AOA", "AQ": "USD", "AS": "USD", "AR": "ARS", "AU": "AUD", "AT": "EUR", "AW": "AWG", "IN": "INR", "AX": "EUR", "AZ": "AZN", "IE": "EUR", "ID": "IDR", "UA": "UAH", "QA": "QAR", "MZ": "MZN"},
        paymentMethodData: {"ALIPAY": {"national": false, "currencies": ["AUD", "CAD", "CHF", "CNY", "DKK", "EUR", "GBP", "HKD", "JPY", "KRW", "NOK", "NZD", "SEK", "SGD", "THB", "USD"], "homepage": "http://global.alipay.com/", "description": "Alipay is a major Chinese online payment system.", "name": "Alipay"}, "BITMAIN_COUPON": {"homepage": "https://bitmain.com/", "description": "Coupon given out by Bitmain that you can use to purchase their products.", "name": "Bitmain Coupon"}, "MPESA_TANZANIA": {"homepage": "http://www.vodacom.co.tz/mpesa", "name": "M-PESA Tanzania (Vodacom)", "description": "Send and receive money with mobile phone in Africa."}, "SWISH": {"national": false, "homepage": "https://www.getswish.se/", "description": "Send and receive Swedish Kroner to and from mobile phone numbers.", "name": "Swish"}, "PAYID": {"currencies": ["AUD"], "homepage": "https://payid.com.au/", "description": "Enables customers of different banks to make and receive real-time payments.", "name": "PayID"}, "MOBILEPAY_DANSKE_BANK": {"national": false, "homepage": "https://www.danskebank.fi/mobilepay", "description": "Easy way to send money with phone numbers, works with all Finnish banks.", "name": "MobilePay FI"}, "NATIONAL_BANK": {"national": true, "description": "Wire transfer within a specific country", "name": "National bank transfer"}, "CASHIERS_CHECK": {"homepage": "https://en.wikipedia.org/wiki/Cashier%27s_check", "name": "Cashier's check", "description": "Checks signed by cashiers."}, "PAYZA": {"homepage": "https://www.payza.com/", "name": "Payza", "description": "Send and receive money online. Fund your account with wire transfer or credit card."}, "XOOM": {"homepage": "https://www.xoom.com/", "description": "Xoom Corporation is a digital money transfer company based in San Francisco. It provides consumer remittance services to Europe, Canada, Australia, Latin America, the Philippines and India.", "name": "Xoom"}, "WEBMONEY": {"homepage": "http://www.wmtransfer.com/", "description": "Secure and immediate transactions online.", "name": "WebMoney"}, "PAYPAL": {"homepage": "http://paypal.com", "description": "Transfer money to anybody with an email address.", "name": "Paypal"}, "GOOGLEWALLET": {"homepage": "https://pay.google.com/about/", "description": "Online payment method to transfer funds between two Google Pay users.", "name": "Google Pay"}, "OTHER_ONLINE_WALLET": {"national": true, "description": "Other online wallets that do not have their own category. The advertiser gives payment details in the advertisement description.", "name": "Other Online Wallet"}, "WU": {"homepage": "http://www.westernunion.com/", "description": "Send and receive money internationally. The receiver can redeem the transfer as cash.", "name": "Western Union"}, "OTHER_ONLINE_WALLET_GLOBAL": {"national": false, "description": "International online wallets that do not have their own category.. The advertiser gives payment details in the advertisement descirption", "name": "Other Online Wallet (Global)"}, "ASTROPAY": {"homepage": "http://www.astropaycard.com/", "name": "AstroPay", "description": "AstroPay Card is an easy and safe way to make payments online in latin american countries."}, "PAYTM": {"homepage": "https://paytm.com/", "description": "Indian mobile payment method (Pay Through Mobile).", "name": "PayTM"}, "PERFECT_MONEY": {"homepage": "https://perfectmoney.com/", "description": "Instant payments and confidential money transfers online.", "name": "Perfect Money"}, "HYPERWALLET": {"currencies": ["CAD"], "homepage": "http://www.hyperwallet.com/", "description": "hyperWALLET is online payment solution which offers instant bank transfer funding in Canada.", "name": "hyperWALLET"}, "GREENDOT_CARD": {"currencies": ["USD"], "homepage": "https://www.greendot.com/", "description": "Green Dot Corporation is an issuer of prepaid MasterCard and Visa cards in the United States. Card to card transfers.", "name": "GreenDot Card"}, "ECOCASH": {"currencies": ["USD", "ZAR"], "homepage": "https://www.ecocash.co.zw", "description": "Send money to and receive money in Zimbabwe with your mobile phone.", "name": "EcoCash"}, "VENMO": {"homepage": "https://venmo.com/", "description": "Send money to friends using a mobile app in US. Can be funded using a credit card.", "name": "Venmo"}, "CASH_AT_ATM": {"national": true, "name": "Cash at ATM", "description": "Cash at ATM is a service some banks that lets you withdraw or deposit money from/to ATMs with a PIN code."}, "SPECIFIC_BANK": {"national": true, "description": "Transfers to and from other customers with the same bank as you.", "name": "Transfers with specific bank"}, "CASH_DEPOSIT": {"national": true, "description": "Go to a bank / ATM and deposit cash directly to the bank account", "name": "Cash deposit"}, "PAYONEER": {"homepage": "https://www.payoneer.com/", "name": "Payoneer", "description": "Payoneer is a financial services business that provides online money transfer and e-commerce payment services."}, "ADVCASH": {"homepage": "https://www.advcash.com", "name": "advcash", "description": "Advanced cash is an online wallet service that lets you send and receive money."}, "QIWI": {"national": false, "homepage": "https://qiwi.ru/", "description": "Send money to anyone with a Qiwi account. All you need to know is their phone number, simple easy and fast.", "name": "QIWI"}, "SEPA": {"currencies": ["BGN", "CHF", "CZK", "DKK", "EUR", "GBP", "GIP", "HRK", "HUF", "ISK", "NOK", "PLN", "RON", "SEK"], "homepage": "http://en.wikipedia.org/wiki/Single_Euro_Payments_Area", "name": "SEPA (EU) bank transfer", "description": "Single Euro Payments Area (SEPA) wire transfers. Usually recallable up to 10 days."}, "ALTCOIN_XRP": {"national": false, "currencies": ["XRP"], "description": "Altcoins are other cryptocurrencies than Bitcoin.", "name": "Ripple altcoin"}, "CHIPPER_CASH": {"currencies": ["GHS", "UGX", "KES", "TZS", "RWF", "ZAR", "NGN"], "homepage": "https://chippercash.com/", "description": "Chipper is a mobile cross-border money transfer platform in Africa.", "name": "Chipper Cash"}, "DWOLLA": {"homepage": "https://www.dwolla.com/", "description": "Send money online using Dwolla.", "name": "Dwolla"}, "CASHU": {"homepage": "https://www.cashu.com/", "description": "Pay online securely without bank account or credit card and fund your account using variety of methods.", "name": "CashU"}, "BANK_TRANSFER_IMPS": {"currencies": ["INR"], "homepage": "http://www.npci.org.in/bankmember.aspx/", "description": "IMPS bank transfers in India.", "name": "IMPS Bank Transfer India"}, "WALMART2WALMART": {"homepage": "http://www.walmart.com/cp/Online-Money-Transfers/1089406", "description": "Send and receive money between two Walmart locations. The receiver can redeem the transfer as cash.", "name": "Walmart 2 Walmart"}, "MONEYGRAM": {"homepage": "https://www.moneygram.com/", "description": "Send and receive money internationally. The receiver can redeem the transfer as cash.", "name": "Moneygram"}, "BLUEBIRD_CARD": {"currencies": ["USD"], "homepage": "https://www.bluebird.com", "description": "Card to card payments offered by American Express.", "name": "Bluebird Card"}, "ALL_ONLINE": {"name": "All online offers"}, "MPESA_KENYA": {"homepage": "http://www.safaricom.co.ke/", "description": "Send and receive money with your mobile phone in Africa.", "name": "M-PESA Kenya (Safaricom)"}, "SQUARE_CASH": {"homepage": "https://cash.app/", "description": "Send money to friends using a mobile app in US. Can be funded with debit cards.", "name": "Cash App"}, "MONEYBOOKERS": {"homepage": "https://www.skrill.com/", "description": "The simple and secure way to send and receive money.", "name": "Moneybookers / Skrill"}, "RIA": {"homepage": "https://www.riamoneytransfer.com/", "description": "Send and receive money internationally. The receiver can redeem the transfer as cash.", "name": "RIA Money Transfer"}, "PINGIT": {"homepage": "http://www.fasterpayments.org.uk/", "description": "Barclays mobile payments in UK.", "name": "Pingit"}, "APPLE_PAY": {"currencies": ["USD"], "homepage": "https://www.apple.com/apple-pay/", "description": "Online payment method to transfer funds between two Apple Pay users.", "name": "Apple Pay"}, "SERVE2SERVE": {"national": true, "homepage": "https://www.serve.com/", "description": "Reloadable debit cards and transfers between them.", "name": "Serve2Serve"}, "OTHER_REMITTANCE": {"national": true, "description": "Remittance vendors not already on the list. The advertiser gives payment details in the advertisement message", "name": "Other Remittance"}, "MOBILEPAY_DANSKE_BANK_DK": {"national": false, "currencies": ["DKK"], "homepage": "http://www.mobilepay.dk/", "description": "Easy way to send money with phone numbers, works with all Danish banks.", "name": "MobilePay"}, "WORLDREMIT": {"homepage": "https://www.worldremit.com", "name": "Worldremit", "description": "Send money anywhere in the world."}, "TRANSFERWISE": {"homepage": "http://transferwise.com/", "name": "Transferwise", "description": "Transfer money online internationally"}, "ALTCOIN_ETH": {"national": false, "currencies": ["ETH"], "description": "Altcoins are other cryptocurrencies than Bitcoin.", "name": "Ethereum altcoin"}, "UPI_TRANSFER": {"currencies": ["INR"], "homepage": "https://www.npci.org.in/product-overview/upi-product-overview", "description": "Transfer money between bank accounts in India.", "name": "UPI Transfer"}, "OTHER": {"national": true, "description": "The advertiser gives payment details in the advertisement message", "name": "Other online payment"}, "PAXUM": {"homepage": "https://www.paxum.com/", "name": "Paxum", "description": "Send money anywhere in the world with just an email address."}, "INTERAC": {"currencies": ["CAD"], "homepage": "http://www.interac.ca/en/", "description": "Canadian online transfers", "name": "Interac e-transfer"}, "PAYM": {"homepage": "http://www.paym.co.uk/", "description": "Pay your friends and family using just their mobile number.", "name": "Paym"}, "SUPERFLASH": {"national": false, "homepage": "http://www.intesasanpaolo.com/", "name": "Superflash", "description": "Italian debit card with an IBAN number."}, "INTERNATIONAL_WIRE_SWIFT": {"homepage": "http://en.wikipedia.org/wiki/Society_for_Worldwide_Interbank_Financial_Telecommunication", "description": "International wire transfer with SWIFT code", "name": "International Wire (SWIFT)"}, "MOBILEPAY_DANSKE_BANK_NO": {"national": false, "currencies": ["NOK"], "homepage": "www.danskebank.no/nb-no/mobilepay", "description": "Easy way to send money with phone numbers, works with all Norwegian banks.", "name": "MobilePay NO"}, "VIPPS": {"national": false, "homepage": "https://www.vipps.no/", "description": "Send money to anyone who has a Norwegian phone number.", "name": "Vipps"}, "ZELLE": {"homepage": "https://www.zellepay.com/", "name": "Zelle", "description": "Send money to friends and family"}, "TIGOPESA_TANZANIA": {"homepage": "http://www.tigo.co.tz/tigo-pesa", "name": "Tigo-Pesa Tanzania", "description": "Send and receive money with mobile phone in Africa."}, "PostePay": {"homepage": "http://www.postepay.it/", "description": "Italian online payments.", "name": "PostePay"}, "TELE2": {"national": false, "homepage": "https://msk.tele2.ru/", "description": "Send money to anyone with a Tele2 account. All you need to know is their phone number. Simple, easy, and fast.", "name": "TELE2"}, "PAYEER": {"homepage": "https://payeer.com/", "name": "Payeer", "description": "Send money anywhere in the world, receiver does not need be registered."}, "YANDEXMONEY": {"national": false, "homepage": "https://money.yandex.ru", "description": "Mobile payment solution.", "name": "Yandex Money"}, "NETELLER": {"homepage": "https://www.neteller.com/", "description": "Instant deposits, withdrawals and payouts online.", "name": "Neteller"}, "REVOLUT": {"currencies": ["EUR", "USD", "GBP", "AUD", "CAD", "AED", "BGN", "CHF", "CZK", "DKK", "HKD", "HRK", "HUF", "ILS", "ISK", "JPY", "MAD", "MXN", "NOK", "NZD", "PLN", "QAR", "RON", "RSD", "RUB", "SAR", "SEK", "SGD", "THB", "TRY", "ZAR"], "homepage": "https://www.revolut.com/", "description": "An electronic money institution providing online wallet. Not the same as a traditional bank. Funds with Revolut remain safeguarded in accounts with a tier-one UK bank, as per our obligations under the e-money regulations.", "name": "Revolut"}, "CHASE_QUICKPAY": {"homepage": "https://www.chase.com/online-banking/quickpay", "description": "Person-to-person payments through Chase's quickpay system.", "name": "Chase Quickpay"}, "CREDITCARD": {"national": false, "homepage": "https://en.wikipedia.org/wiki/Credit_card", "description": "Buy Bitcoins using your credit card.", "name": "Credit card"}, "TWINT": {"currencies": ["CHF"], "homepage": "https://www.twint.ch/en/", "description": "Online payment method to transfer funds between two Twint users.", "name": "TWINT"}, "HAL_CASH": {"homepage": "http://www.halcash.com/en/welcome/", "description": "Hal-Cash is a bank service that allows you to send money to any mobile phone, and be withdrawn instantly at an ATM of any of the financial institutions associated with the worldwide system, anytime and anywhere without needing a credit card.", "name": "Hal-cash"}, "LYDIA": {"national": false, "homepage": "https://lydia-app.com/en/", "description": "French mobile payment method.", "name": "Lydia"}, "OKPAY": {"homepage": "https://www.okpay.com/", "description": "OKPAY allows you to accept bank wire and cash money transfers and all e-currencies quickly and affordably. Currently OKPay advertises as irreversible payment.", "name": "OKPay"}, "EASYPAISA": {"national": false, "homepage": "https://easypaisa.com.pk/", "description": "Send money to other people in Pakistan using your mobile phone.", "name": "Easypaisa"}, "WECHAT": {"homepage": "https://pay.weixin.qq.com/", "description": "WeChat Pay is a digital wallet service incorporated into WeChat, which allows users to perform mobile payments and send money between contacts.", "name": "WeChat"}, "PYC": {"homepage": "http://personal.natwest.com/personal/ways-to-bank-with-us/pay-your-contacts.html", "description": "Pay your contacts - mobile payments by Natwest / Royal Bank of Scotland", "name": "PYC"}, "ALTCOIN_LTC": {"national": false, "currencies": ["LTC"], "description": "Altcoins are other cryptocurrencies than Bitcoin.", "name": "Litecoin altcoin"}},
        countrySpecificPaymentForms: {"NATIONAL_BANK": ["AU", "FI", "GB"]},
        recommendedPaymentMethods: {"RU": ["SPECIFIC_BANK", "QIWI", "CASH_DEPOSIT", "YANDEXMONEY", "TELE2"], "VE": ["SPECIFIC_BANK", "OTHER", "NATIONAL_BANK", "PAYPAL", "ASTROPAY", "XOOM"], "CO": ["SPECIFIC_BANK", "NATIONAL_BANK", "CASH_DEPOSIT", "OTHER", "ASTROPAY", "XOOM"], "US": ["CASH_DEPOSIT", "ZELLE", "SPECIFIC_BANK", "PAYPAL", "GOOGLEWALLET", "VANILLA", "PAYPALMYCASH", "XOOM", "VENMO", "DWOLLA", "NETSPEND", "POSTAL_ORDER", "CHASE_QUICKPAY", "BLUEBIRD_CARD", "CASHIERS_CHECK", "APPLE_PAY", "SQUARE_CASH", "PAYSAFECARD", "RELOADIT", "WALMART2WALMART", "GIFT_CARD_CODE_WALMART", "SERVE2SERVE"], "GB": ["NATIONAL_BANK", "SEPA", "SPECIFIC_BANK", "PAYPAL", "PINGIT", "PYC", "POSTAL_ORDER", "PAYM", "PAYSAFECARD"], "NG": ["NATIONAL_BANK", "SPECIFIC_BANK", "OTHER", "CASH_DEPOSIT", "CHIPPER_CASH"], "CN": ["NATIONAL_BANK", "ALIPAY", "SPECIFIC_BANK", "WECHAT"], "ZA": ["NATIONAL_BANK", "SPECIFIC_BANK", "OTHER", "CASH_DEPOSIT", "ECOCASH", "CHIPPER_CASH"], "IN": ["BANK_TRANSFER_IMPS", "NATIONAL_BANK", "OTHER", "OTHER_ONLINE_WALLET", "GOOGLEWALLET", "XOOM", "PAYTM", "UPI_TRANSFER"], "PE": ["SPECIFIC_BANK", "NATIONAL_BANK", "OTHER", "PAYPAL", "ASTROPAY", "XOOM"], "ES": ["SPECIFIC_BANK", "SEPA", "NATIONAL_BANK", "CASH_DEPOSIT", "PAYSAFECARD", "HAL_CASH"], "KE": ["MPESA_KENYA", "OTHER", "SPECIFIC_BANK", "NATIONAL_BANK", "CHIPPER_CASH"], "AU": ["SPECIFIC_BANK", "CASH_DEPOSIT", "CASHU", "OTHER", "PAYID", "VANILLA", "XOOM", "BPAY", "PAYSAFECARD"], "AR": ["NATIONAL_BANK", "SPECIFIC_BANK", "OTHER", "CASH_DEPOSIT", "ASTROPAY", "XOOM", "PAYSAFECARD"], "TH": ["NATIONAL_BANK", "SPECIFIC_BANK", "CASH_DEPOSIT", "OTHER"], "FI": ["SEPA", "NATIONAL_BANK", "SPECIFIC_BANK", "OTHER", "MOBILEPAY_DANSKE_BANK", "PAYSAFECARD"], "SE": ["SWISH", "OTHER", "CREDITCARD", "PAYPAL", "SEPA", "PAYSAFECARD"], "CA": ["INTERAC", "SPECIFIC_BANK", "CASH_DEPOSIT", "PAYPAL", "XOOM", "HYPERWALLET", "PAYSAFECARD"], "UA": ["SPECIFIC_BANK", "NATIONAL_BANK", "MONEYBOOKERS", "WEBMONEY", "QIWI", "YANDEXMONEY"], "CL": ["NATIONAL_BANK", "SPECIFIC_BANK", "PAYPAL", "CASH_DEPOSIT", "ASTROPAY", "XOOM"], "BR": ["SPECIFIC_BANK", "NATIONAL_BANK", "PAYONEER", "WEBMONEY", "ASTROPAY", "XOOM"], "HK": ["NATIONAL_BANK", "CASH_DEPOSIT", "PAYPAL", "SPECIFIC_BANK"], "MY": ["NATIONAL_BANK", "SPECIFIC_BANK", "CASH_DEPOSIT", "MONEYBOOKERS"], "PA": ["SPECIFIC_BANK", "CASH_DEPOSIT", "NATIONAL_BANK", "MONEYBOOKERS"], "MX": ["NATIONAL_BANK", "SPECIFIC_BANK", "CASH_DEPOSIT", "OTHER", "PAYSAFECARD"], "PT": ["SEPA", "SPECIFIC_BANK", "CASH_DEPOSIT", "NATIONAL_BANK", "PAYSAFECARD"], "EC": ["SPECIFIC_BANK", "NATIONAL_BANK", "CASH_DEPOSIT", "PAYONEER", "ASTROPAY", "XOOM"], "BY": ["SPECIFIC_BANK", "NATIONAL_BANK", "MONEYBOOKERS", "WEBMONEY", "QIWI", "YANDEXMONEY"], "RO": ["SPECIFIC_BANK", "MONEYBOOKERS", "NATIONAL_BANK", "OTHER", "SEPA", "PAYSAFECARD"]},
        paymentMethodAjaxUrl: "/payment_method_ajax_list",
        paymentMethodChoicesBuy: [{"methods": ["CASH_DEPOSIT", "MONEYGRAM", "PAYPAL", "SERVE2SERVE", "WU"], "name": "Popular in your country"}, {"methods": ["ALL_ONLINE", "ADVCASH", "ALTCOIN_ETH", "ALTCOIN_LTC", "ALTCOIN_XRP", "APPLE_PAY", "CASHIERS_CHECK", "CASHU", "CASH_AT_ATM", "CASH_DEPOSIT", "CHASE_QUICKPAY", "CREDITCARD", "EASYPAISA", "GOOGLEWALLET", "INTERNATIONAL_WIRE_SWIFT", "MONEYBOOKERS", "MONEYGRAM", "NATIONAL_BANK", "NETELLER", "OKPAY", "OTHER", "OTHER_ONLINE_WALLET", "OTHER_REMITTANCE", "PAXUM", "PAYEER", "PAYONEER", "PAYPAL", "PAYZA", "PERFECT_MONEY", "REVOLUT", "RIA", "SERVE2SERVE", "SPECIFIC_BANK", "SQUARE_CASH", "TRANSFERWISE", "VENMO", "WALMART2WALMART", "WEBMONEY", "WECHAT", "WORLDREMIT", "WU", "XOOM", "ZELLE"], "name": "All payment methods"}, {"methods": ["ALTCOIN_XRP", "ALTCOIN_LTC", "ALTCOIN_ETH"], "name": "Altcoins"}],
        paymentMethodChoicesSell: [{"methods": ["CASH_DEPOSIT", "MONEYGRAM", "SERVE2SERVE", "WU"], "name": "Popular in your country"}, {"methods": ["ALL_ONLINE", "ADVCASH", "ALTCOIN_ETH", "ALTCOIN_LTC", "ALTCOIN_XRP", "CASHIERS_CHECK", "CASHU", "CASH_DEPOSIT", "CHASE_QUICKPAY", "CREDITCARD", "GOOGLEWALLET", "INTERNATIONAL_WIRE_SWIFT", "MONEYBOOKERS", "MONEYGRAM", "NATIONAL_BANK", "NETELLER", "OKPAY", "OTHER", "OTHER_ONLINE_WALLET", "OTHER_REMITTANCE", "PAXUM", "PAYEER", "PAYONEER", "PAYPAL", "PAYZA", "PERFECT_MONEY", "REVOLUT", "RIA", "SERVE2SERVE", "SPECIFIC_BANK", "SQUARE_CASH", "TRANSFERWISE", "VENMO", "WALMART2WALMART", "WEBMONEY", "WECHAT", "WORLDREMIT", "WU", "ZELLE"], "name": "All payment methods"}, {"methods": ["ALTCOIN_XRP", "ALTCOIN_LTC", "ALTCOIN_ETH"], "name": "Altcoins"}],
        searched: false
    };
</script>
<div class="row bitcoinlist">
<div id="purchase-bitcoins-online" class="col-md-12">
  <h3>Buy bitcoins online in United States</h3>
<table class="table table-striped table-condensed table-bitcoins ">
    <tr>
        <th>
Seller
        </th>
            <th title='Payment method'>Payment method</th>
        <th class="header-price" title='Current price of this ad'>Price / BTC</th>
        <th class="header-limit" title='Trade amount in fiat currency'>Limits</th>
        <th></th>
    </tr>
        <tr class="clickable">
            <td class="column-user">
                <a href="index.html">Saulgoodman13 (3000+; 100%)</a>
    <span title="Typically replies within minutes" class="online-status online-status-online">
        <i class="fa fa-circle"></i>
    </span>
            </td>
                <td>
<a href="index.html">
                    Chase Quickpay
                    </a>
                </td>
            <td class="column-price">
                9,833.13 USD
            </td>
            <td class="column-limit">
                    300 - 1,000 USD
            </td>
            <td class="column-button">
        <a class="btn btn-default megabutton" href="index.html">
            Buy
        </a>
            </td>
        </tr>
        <tr class="clickable">
            <td class="column-user">
                <a href="index.html">abitofcoin (3000+; 100%)</a>
    <span title="Typically replies within minutes" class="online-status online-status-online">
        <i class="fa fa-circle"></i>
    </span>
            </td>
                <td>
<a href="index.html">
                    Cash deposit:
                    </a>
                    CO-OP Credit Union⭐️Comerica⭐️BankOZK⭐️SANTANDER
                </td>
            <td class="column-price">
                9,975.78 USD
            </td>
            <td class="column-limit">
                    200 - 4,529 USD
            </td>
            <td class="column-button">
        <a class="btn btn-default megabutton" href="index.html">
            Buy
        </a>
            </td>
        </tr>
        <tr class="clickable">
            <td class="column-user">
                <a href="index.html">Dengey (100+; 99%)</a>
    <span title="Typically takes more than 30 minutes to reply" class="online-status online-status-offline">
        <i class="fa fa-circle"></i>
    </span>
            </td>
                <td>
<a href="index.html">
                    Paypal
                    </a>
                </td>
            <td class="column-price">
                9,985.29 USD
            </td>
            <td class="column-limit">
                    150 - 998 USD
            </td>
            <td class="column-button">
        <a class="btn btn-default megabutton" href="index.html">
            Buy
        </a>
            </td>
        </tr>
        <tr class="clickable">
            <td class="column-user">
                <a href="index.html">Prosto87 (70+; 96%)</a>
    <span title="Typically takes more than 30 minutes to reply" class="online-status online-status-offline">
        <i class="fa fa-circle"></i>
    </span>
            </td>
                <td>
<a href="index.html">
                    Cash deposit:
                    </a>
                    **USA BANKS**CHINA**HK*TURKEY* SINGAPORE**TAIWAN*
                </td>
            <td class="column-price">
                9,985.29 USD
            </td>
            <td class="column-limit">
                    0 - 483 USD
            </td>
            <td class="column-button">
        <a class="btn btn-default megabutton" href="index.html">
            Buy
        </a>
            </td>
        </tr>
        <tr class="clickable">
            <td class="column-user">
                <a href="index.html">endopay (100+; 100%)</a>
    <span title="Typically replies within 30 minutes" class="online-status online-status-recent">
        <i class="fa fa-circle"></i>
    </span>
            </td>
                <td>
<a href="index.html">
                    Cash deposit:
                    </a>
                    ✅ WoodForest, Capital One ✅**Instant Release**
                </td>
            <td class="column-price">
                10,080.39 USD
            </td>
            <td class="column-limit">
                    200 - 3,451 USD
            </td>
            <td class="column-button">
        <a class="btn btn-default megabutton" href="index.html">
            Buy
        </a>
            </td>
        </tr>
        <tr class="clickable">
            <td class="column-user">
                <a href="index.html">emmanueljc89 (20 000+; 100%)</a>
    <span title="Typically replies within minutes" class="online-status online-status-online">
        <i class="fa fa-circle"></i>
    </span>
            </td>
                <td>
<a href="index.html">
                    Paypal
                    </a>
                </td>
            <td class="column-price">
                10,080.39 USD
            </td>
            <td class="column-limit">
                    400 - 900 USD
            </td>
            <td class="column-button">
        <a class="btn btn-default megabutton" href="index.html">
            Buy
        </a>
            </td>
        </tr>
</table>
<div class="popular-payment-methods pull-right">
    <ul id="dropdown-/buy-bitcoins-online/" class="popular-methods-dropdown">
        <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Show more…
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="index.html">
                            All in US Dollar (USD)</a>
                    </li>
                <li>
                    <a href="index.html">
                        All in United States</a>
                </li>
          <li class="divider"></li>
                    <li>
                        <a href="index.html">
                            Cash deposit
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            CashU
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Cashier&#39;s check
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Chase Quickpay
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            International Wire (SWIFT)
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Moneybookers / Skrill
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Moneygram
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            National bank transfer
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Other online payment
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Paypal
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Serve2Serve
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Transfers with specific bank
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Venmo
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Walmart 2 Walmart
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Western Union
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            WebMoney
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Payeer
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Credit card
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            Neteller
                        </a>
                    </li>
                <li class="divider"></li>
          <li>
            <a href="index.html">
        Bank Transfers in United States
      </a>
    </li>
          <li>
            <a href="index.html">
        Online Wallets in United States
      </a>
    </li>
          <li>
            <a href="index.html">
        Pre-Paid Debit Cards in United States
      </a>
    </li>
          <li>
            <a href="index.html">
        Remittance in United States
      </a>
    </li>
          <li>
            <a href="index.html">
        Other Payments in United States
      </a>
    </li>
            </ul>
        </li>
    </ul>
</div>
<div style="clear: both"><!-- --></div>
</div>
</div>

@endsection

@section('page-js')
 
@endsection