<?php 
require "config.php";

$query = "SELECT t.tehtava_id, tt.tehtavan_tilanne, t.kuvaus, CONCAT(u.etunimi, ' ', u.sukunimi) AS Jattaja, th.osoite, a.rappu, t.yleisavaimen_kaytto, t.numero, ti.nimi AS tilan_nimi, ty.etunimi AS tyontekijan_etunimi, ty.sukunimi AS tyontekijan_sukunimi 
          FROM tehtavat t
          JOIN kayttajat k ON t.kayttaja_id = k.kayttaja_id
          JOIN (
                SELECT asukas_id AS id, kayttaja_id, etunimi, sukunimi FROM asukkaat
                UNION ALL
                SELECT tyontekija_id AS id, kayttaja_id, etunimi, sukunimi FROM tyontekijat
                UNION ALL
                SELECT isannoitsija_id AS id, kayttaja_id, etunimi, sukunimi FROM isannoitsijat
               ) u ON k.kayttaja_id = u.kayttaja_id
          JOIN taloyhtiot th ON t.taloyhtio_id = th.taloyhtio_id
          JOIN tehtavan_tilanne tt ON t.tehtavan_tilanne_id = tt.tehtavan_tilanne_id
          LEFT JOIN tilat ti ON t.tila_id = ti.tila_id
          LEFT JOIN tyontekijat ty ON t.tyontekija_id = ty.tyontekija_id
          LEFT JOIN asukkaat a ON u.kayttaja_id = a.kayttaja_id
          WHERE t.tehtavan_tilanne_id <> 4 
          ORDER BY t.tehtava_id"; // CONCAT yhdistää etunimen ja sukunimen yhdeksi nimeksi - UNION ALL yhdistää kolme taulua yhdeksi tauluksi, jossa on kaikki kolmen taulun tiedot

$data = $yhteys->query($query);

$JSON_vika = '{"tehtavat":[';
$laskuri = 0;
$rivit = $data->rowCount();

while ($rivi = $data->fetch(PDO::FETCH_ASSOC)) {
  $laskuri++;
  $tilan_nimi = $rivi['tilan_nimi'] ? $rivi['tilan_nimi'] : 'Ei määritelty';
  $tyontekijan_etunimi = $rivi['tyontekijan_etunimi'] ? $rivi['tyontekijan_etunimi'] : 'Ei määritelty';
  $tyontekijan_sukunimi = $rivi['tyontekijan_sukunimi'] ? $rivi['tyontekijan_sukunimi'] : '';

  $rappu_tilan_nimi = $rivi['rappu'] ? $rivi['rappu'] : ($tilan_nimi ? $tilan_nimi : 'Ei määritelty'); // näytä joko rappu tai tilan nimi, jos kumpikaan ei ole määritelty, näytä "Ei määritelty"

  $JSON_vika .= '{"ID":"' . $rivi['tehtava_id'] . '","Viankuvaus":"' . $rivi['kuvaus'] . '","Jattaja":"' . $rivi['Jattaja'] . '","Rappu_tilan_nimi":"' . $rappu_tilan_nimi . '","Osoite":"' . $rivi['osoite'] . '","Yleisavaimen_kaytto":"' . $rivi['yleisavaimen_kaytto'] . '","Numero":"' . $rivi['numero'] . '","Tilanne":"' . $rivi['tehtavan_tilanne'] . '","Tyontekija":"' . $tyontekijan_etunimi . ' ' . $tyontekijan_sukunimi . '"}';
  if ($laskuri < $rivit) {
      $JSON_vika .= ',';
  }
}
$JSON_vika .= ']}';
?>

