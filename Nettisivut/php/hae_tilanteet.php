<?php include "config.php";

// Haetaan tilanteet tietokannasta ja muutetaan ne JSON-muotoon
$tilanteet = array();
$stmt = $yhteys->query('SELECT tehtavan_tilanne_id, tehtavan_tilanne FROM tehtavan_tilanne');
while ($row = $stmt->fetch()) {
  $tilanne = array(
    'tehtavan_tilanne_id' => $row['tehtavan_tilanne_id'],
    'tehtavan_tilanne' => $row['tehtavan_tilanne']
  );
  array_push($tilanteet, $tilanne);
}
$JSON_tilanteet = json_encode($tilanteet);

?>