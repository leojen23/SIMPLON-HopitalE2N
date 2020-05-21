<?php

include 'connexion.php';

if(isset($_POST['id']) AND isset($_POST['lastname']) AND isset($_POST['firstname']) AND isset($_POST['dateHour'])){

    $id = intval($_POST['id']);
    $updateAppointment = $bdd->prepare('UPDATE appointments SET dateHour = :dateHour WHERE idPatients =:idPatients');
    $updateAppointment->execute(array('dateHour' => $_POST['dateHour'], 'idPatients' => $_POST['id']));
    
    header('location: profil-patients.php?id='.$id.'');
}


