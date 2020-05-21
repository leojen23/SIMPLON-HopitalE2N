<?php

include './connexion.php';

// echo '<pre>' . var_export($data, true) . '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                <p class="lead">Gérer les données de vos patients en toute sécurité</p>
            </div>
        </div>

    </header>

    <section class="container-choices">
       
        <div class="card" style="width: 20rem">
            <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">L'enregistrement</h4>
                <p class="card-text">Créer votre base de données Patients</p>
                <br>
                <a href="./ajout-patient-form.php" class="btn btn-outline-info stretched-link">Ajout patient</a>
            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <img src="https://images.unsplash.com/photo-1515847049296-a281d6401047?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">Prise de rendez-vous</h4>
                <p class="card-text">Enregistrer vos rendez-vous en quelques clicks</p>
                <a href="ajout-rendezvous-form.php" class="btn btn-outline-info stretched-link">Prendre Rendez-vous</a>
            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">Gestion des patients</h4>
                <p class="card-text">Consultez la liste de vos patient et de vos rendez-vous</p>
                <a href="./patients-list.php" class="btn btn-outline-info stretched-link">Consulter</a>
            </div>
        </div>


    </section>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>