// javascript jolla päivitetään työntekijän tilanne nappia painettaessa
document.addEventListener("DOMContentLoaded", function() {
    function updateTyontekijanTila(kayttaja_id) {
        console.log("updateTyontekijanTila called with kayttaja_id:", kayttaja_id);
        
        var button = document.getElementById("tyontekijan_tilanne_button");

        $.ajax({ //AJAX kutsu php tiedostoon joka päivittää työntekijän tilan
            type: "POST", //tietojen lähetys POST metodilla
            url: "php/tyontekijan_tilan_paivitys.php", //php tiedosto joka käsittelee tiedot
            data: {
                kayttaja_id: kayttaja_id, //lähetetään työntekijän id
            },
            success: function(response) { //jos AJAX kutsu onnistuu
                console.log("AJAX success:", response); //tulostetaan konsoliin vastaus
                button.innerText = response === "1" ? "VAPAA" : "VARATTU"; //vaihdetaan nappulan teksti vastauksen perusteella
            },
            error: function(jqXHR, textStatus, errorThrown) { //jos AJAX kutsu epäonnistuu
                console.log("AJAX error:", textStatus, errorThrown); //tulostetaan konsoliin virheilmoitus
            }
        });
    };

    var button = document.getElementById("tyontekijan_tilanne_button"); //haetaan nappi
    if (button) { //jos nappi löytyy
        var kayttaja_id = button.getAttribute("data-kayttaja-id"); //haetaan työntekijän id
        button.addEventListener("click", function() { //lisätään nappiin kuuntelija klikkausta varten
            updateTyontekijanTila(kayttaja_id); // ja kutsutaan funktiota joka päivittää työntekijän tilan
        });
    }
});


