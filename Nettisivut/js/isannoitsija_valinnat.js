// tämä toiminto näyttää vain valitun taloyhtiön tilat
$(document).ready(function() { // kun sivu on ladattu
  $('#taloyhtio').on('change', function() { // kun taloyhtiö valinta muuttuu
      var taloyhtio_id = $(this).val(); // haetaan valitun taloyhtiön id
      $('#tila option').each(function() { // käydään läpi kaikki tila valinnat
          if ($(this).data('taloyhtio-id') == taloyhtio_id || $(this).val() == '') { // jos taloyhtiö id on sama kuin valitun taloyhtiön id tai valinta on tyhjä
              $(this).show(); // näytetään valinta
          } else {
              $(this).hide(); // muuten piilotetaan valinta
          }
      });
      $('#tila').val(''); // tyhjennetään valinta
  });
});