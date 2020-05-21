<?php

include 'connexion.php';

 if(isset($_POST['idPatients']) AND isset($_POST['dateHour'])){

    $idPatient = $_POST['idPatients'];
    $dateHour = $_POST['dateHour'];

    $request = $bdd->prepare("INSERT INTO appointments (dateHour, idPatients) VALUES (?,?)");
    $request->execute([$dateHour, $idPatient]);

    header('location: rendezvous-list.php');

}


  
