$(document).ready(function() {
    $.getJSON('../php/taloyhtiot.json', function(taloyhtiot){
        console.log('taloyhtiot', taloyhtiot) //debugging rivi - miksi ei tulosta konsoliin?
      // laitetaan taloyhtiot dropdowniin
      taloyhtiot.forEach(function(taloyhtio) {
        $('#taloyhtio').append(`<option value="${taloyhtio.taloyhtio_id}">${taloyhtio.osoite}</option>`);
      });
    });
  
    $.getJSON('../php/tilat.json', function(tilat) {
        console.log('tilat', tilat) //debugging rivi - miksi ei tulosta konsoliin?
      // muutetaan tila dropdownin sisältöä aina kun taloyhtio vaihtuu
      $('#taloyhtio').on('change', function() {
        var selectedTaloyhtioId = $(this).val();
        $('#tila').html('<option value="#">&nbsp;tilat&nbsp;</option>');
  
        if (selectedTaloyhtioId !== '#') {
          tilat.filter(function(tila) {
            return tila.taloyhtio_id === parseInt(selectedTaloyhtioId);
          }).forEach(function(tila) {
            $('#tila').append(`<option value="${tila.tila_id}">${tila.nimi}</option>`);
          });
        }
      });
    });
  });
  
  