<?php 

include("config.php"); 

$JSON_paivita_taloyhtio = file_get_contents("valittuTaloyhtio.json");
$users = json_decode($JSON_paivita_taloyhtio, true);

                                if(count($users) != 0){
                                    foreach($users as $key1){
                                        foreach($key1 as $user){
                                            $taloyhtio_id = $user['ID'];

                                            $query = "SELECT tila_id, nimi
                                            FROM tilat
                                            WHERE taloyhtio_id = '$taloyhtio_id'";
                                            $data = $yhteys->query($query);

                                            $JSON_tilat = '{"Tilat":[';
                                                $laskuri = 0; 
                                                $riveja = $data->rowCount(); 
                                                
                                                while($rivi = $data->fetch(PDO::FETCH_ASSOC)){ 
                                                    $laskuri++; 
                                                    $JSON_tilat.= '{"ID":"' .$rivi['tila_id'] . '", "Tila":"' . $rivi['nimi'] .'"}';
                                                    if($laskuri < $riveja) $JSON_tilat.= ","; 
                                                }
                                                
                                                $JSON_tilat.= ']}'; 

                                                $yhteys = null;
                                            
                                                $handler = fopen("tila_listaus.json", "w");
                                                fwrite($handler, $JSON_tilat);
                                                fclose($handler);
                                    }           
                                }
                            }
                    
        header("location:../lisaa_yleisiatiloja.php");
    exit;
    
$yhteys = null;
?>