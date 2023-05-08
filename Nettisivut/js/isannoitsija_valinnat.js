// tämä toiminto näyttää vain valitun taloyhtiön tilat
$(document).ready(function() { 
  $('#taloyhtio').on('change', function() {
      var taloyhtio_id = $(this).val();
      $('#tila option').each(function() {
          if ($(this).data('taloyhtio-id') == taloyhtio_id || $(this).val() == '') {
              $(this).show();
          } else {
              $(this).hide();
          }
      });
      $('#tila').val('');
  });
});