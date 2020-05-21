<?php 


include 'connexion.php';

if (isset($_GET['id'])){

$deleteRendezvous = $bdd->prepare('DELETE FROM appointments WHERE id=?');
$deleteRendezvous->execute(array($_GET["id"]));


} 
                        
                                

                    
                    