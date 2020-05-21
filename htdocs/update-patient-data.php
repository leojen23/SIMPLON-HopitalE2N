<?php

include 'connexion.php';

if(isset($_POST['lastname']) AND isset($_POST['firstname']) AND isset($_POST['birthdate']) AND isset($_POST['phone']) AND isset($_POST['mail']) AND ($_POST['id'])){
    

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $id = $_POST['id'];


$updatePatient = $bdd->prepare('UPDATE patients SET lastname = :lastname, firstname= :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id =:id');
$updatePatient->execute(array('lastname' => $lastname, 'firstname' => $firstname, 'birthdate' => $birthdate, 'phone' => $phone, 'mail' => $mail, 'id' => $id ));
    
    header('location: profil-patients.php?id='.$id.'');
}