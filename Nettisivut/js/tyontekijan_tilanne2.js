

$(document).ready(function() {
  $("#tyontekijan_tilanne_checkbox").on("change", function() {
    let kayttaja_id = $(this).data("kayttaja-id");
    let tyontekijan_tilanne_id = this.checked ? 2 : 1;

    $.ajax({
      url: "../php/tyontekijan_tilan_paivitys2.php",
      type: "POST",
      data: {
        kayttaja_id: kayttaja_id,
        tyontekijan_tilanne_id: tyontekijan_tilanne_id
      },
      success: function(response) {
        console.log(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error(textStatus, errorThrown);
      }
    });
  });
});


