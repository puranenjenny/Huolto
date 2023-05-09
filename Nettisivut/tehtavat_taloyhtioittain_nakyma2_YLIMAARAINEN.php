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
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Avoimet tehtävät</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            // Hae kaikki taloyhtiöt tietokannasta
            try {
                $sql = "SELECT * FROM taloyhtiot";
                $stmt = $yhteys->prepare($sql);
                $stmt->execute();
                $taloyhtiot = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Virhe: " . $e->getMessage();
            }
        ?>
    
        <!-- Luo taloyhtiöiden valikko -->
        <form method="POST">
            <label for="taloyhtio">Valitse taloyhtiö:</label>
            <select name="taloyhtio" id="taloyhtio">
                <?php foreach ($taloyhtiot as $taloyhtio) { ?>
                    <option value="<?php echo $taloyhtio['taloyhtio_id']; ?>"><?php echo $taloyhtio['nimi']; ?></option>
                <?php } ?>
            </select>
            <button type="submit">Hae tehtävät</button>
        </form>
    
        <?php if(isset($tehtavat)) {
        $valittu_taloyhtio = '';
        foreach ($taloyhtiot as $taloyhtio) {
        if($taloyhtio['taloyhtio_id'] == $_POST['taloyhtio']) {
            $valittu_taloyhtio = $taloyhtio['nimi'];
            break;
        }
    }
?>
            <!-- Luo lista avaamattomista tehtävistä -->
            <h2>Taloyhtiön <?php echo $valittu_taloyhtio ?> avoimet tehtävät</h2>
            <ul>
                <?php foreach ($tehtavat as $tehtava) { ?>
                    <li><?php echo $tehtava['tehtava_id']; ?></li>
                    <li><?php echo $tehtava['tila_nimi']; ?></li>
                    <li><?php echo $tehtava['kuvaus']; ?></li>
                    <li><?php echo $tehtava['tehtavan_tilanne']; ?></li>
                    <li><?php echo $tehtava['yleisavaimen_kaytto']; ?><br><br></li>
<?php }} ?>

</ul>