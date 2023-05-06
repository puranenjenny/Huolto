<?php
include 'config.php';

$kayttaja_id = $_POST['kayttaja_id'];
$tyontekijan_tilanne_id = $_POST['tyontekijan_tilanne_id'];

$sql = "UPDATE tyontekijat SET tyontekijan_tilanne_id = ? WHERE kayttaja_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $tyontekijan_tilanne_id, $kayttaja_id);

if ($stmt->execute()) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
