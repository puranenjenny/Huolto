
function updateTyontekijanTila() {
    var checkbox = document.getElementById("tyontekijan_tilanne_checkbox");
    var isChecked = checkbox.checked ? 2 : 1;
    var kayttaja_id = checkbox.getAttribute('data-kayttaja-id');

    $.ajax({
        type: "POST",
        url: "php/tyontekijan_tilan_paivitys.php",
        data: {
            tyontekijan_tilanne_id: isChecked,
            kayttaja_id: kayttaja_id,
        },
        success: function(response) {
            console.log("Työntekijän tila päivitetty!");
        },
        error: function() {
            console.log("Virhe päivitettäessä työntekijän tilaa.");
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var checkbox = document.getElementById("tyontekijan_tilanne_checkbox");
    if (checkbox) {
        checkbox.addEventListener('change', updateTyontekijanTila);
    }
});

