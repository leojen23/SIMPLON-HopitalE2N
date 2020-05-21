
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">HOSPITAL E2N</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patients-list.php">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rendezvous-list.php">Rendez-vous</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid jumbotron-main">
            <div class="container text-center">
                <h1 class="display-4 text-center">HOSPITAL E2N</h1>
                <p class="lead">Un enregistrement simple et efficace des coordonnées de vos patients</p>
            </div>
        </div>
    </header>
    
    
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

    echo 
    '<section class=" container container-validationMsg">
        <div class="validationMsg">
            <h2>Message de validation</h2>
            <p>Votre Patient a été ajouté avec succès !</p>
            <a href="patients-list.php" type="button" class="btn btn-outline-secondary">Liste des patients</a>
        </div>
    </section>';
}
else
{
    echo 
    '<section class=" container container-addClientForm">
    <form action="ajout-patient-form.php" method="POST" class="addClientForm">
    <h2>Forumulaire d\'enregistrement</h2>
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
    </div>
    <div class="form-group">
        <label for="birthdate">Date de naissance</label>
        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="00/00/0000">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Numéro de téléphone">
    </div>
    <div class="form-group">
        <label for="mail">Email</label>
        <input type="email" class="form-control" id="mail" name="mail" placeholder="address@email.com">
    </div>
    <button type="submit" class="btn btn-info">Valider</button>
</form>
</section>';
}
?>

    
    
       
</body>
</html>