<?php
include("config.php");

$tyontekijat = [];
$rooli_id = '2';

$query = "SELECT kayttaja_id 
FROM kayttajat WHERE rooli_id = :rooli_id";
//echo $kayttaja_id;
$data = $yhteys->prepare($query);
$data->bindParam(':rooli_id', $rooli_id);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $kayttaja_id = $result['kayttaja_id'];

    $query2 = "SELECT tyontekija_id, etunimi, sukunimi FROM tyontekijat WHERE kayttaja_id = :kayttaja_id";
    //echo $isannoitsija_id;
    $data2 = $yhteys->prepare($query2);
    $data2->bindParam(':kayttaja_id', $kayttaja_id);
    $data2->execute();

    while ($result2 = $data2->fetch(PDO::FETCH_ASSOC)) {
        $tyontekijat[] = [
            'etunimi' => $result2['etunimi'],
            'sukunimi' => $result2['sukunimi']
        ];
        
        
        $tyontekija_id = $result2['tyontekija_id'];
        
    }}

?>