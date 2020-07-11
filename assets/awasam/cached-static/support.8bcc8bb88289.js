(function($) {
  if ($("#show_support_button").length > 0) {
    $("#supportform").hide();

    $("#show_support_button").click(function() {
      $("#supportform").show('slow');
      $("#id_msg").focus();
    });
  }
})(jQuery);
