<?php

include 'connexion.php';

if(isset($_POST['lastname']) AND isset($_POST['firstname']) AND isset($_POST['birthdate']) AND isset($_POST['phone']) AND isset($_POST['mail'])){
    

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    

    $insertNewPatient = $bdd->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail)  
                                        VALUES (?,?,?,?,?)");

    $insertNewPatient->execute([$lastname, $firstname, $birthdate, $phone, $mail]);

}
?>