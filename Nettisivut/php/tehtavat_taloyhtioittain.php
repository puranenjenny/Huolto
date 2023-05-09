<?php include "php/config.php" ?>
	<?php
	if(isset($_POST['taloyhtio'])) {
        $taloyhtio_id = $_POST['taloyhtio'];
        $query = "SELECT tehtavat.*, tilat.nimi AS tila_nimi, tehtavan_tilanne.tehtavan_tilanne AS tehtavan_tilanne, yleisavaimen_kaytto AS yleisavaimen_kaytto FROM tehtavat 
            JOIN tilat ON tehtavat.tila_id = tilat.tila_id 
            JOIN taloyhtiot ON tilat.taloyhtio_id = taloyhtiot.taloyhtio_id
            JOIN tehtavan_tilanne ON tehtavat.tehtavan_tilanne_id = tehtavan_tilanne.tehtavan_tilanne_id
            WHERE taloyhtiot.taloyhtio_id = ? AND (tehtavan_tilanne.tehtavan_tilanne = 'Avoin' OR tehtavan_tilanne.tehtavan_tilanne = 'Käsittelemättä')";
        $stmt = $yhteys->prepare($query);
        $stmt->execute([$taloyhtio_id]);
        $tehtavat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    try {
        $sql = "SELECT * FROM taloyhtiot";
        $stmt = $yhteys->prepare($sql);
        $stmt->execute();
        $taloyhtiot = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Virhe: " . $e->getMessage();
    }
    ?>