<?php



include 'connexion.php';

$request = $bdd->query('SELECT * FROM patients');
$patients = $request->fetchAll();


   

// echo '<pre>' . var_export($patients, true) . '</pre>';
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
                <p class="lead">Prise de rendez-vous facile en ligne</p>
            </div>
        </div>
    </header>
    
    <section class="container-fluid container-bookings">
        <div class="bg-booking-opacity"></div>
        <h2>J'enregistre mes rendez-vous</h2>
        <p>Merci de remplir tous les champs du formulaire</p>
        <form action="ajout-rendezvous-data.php" method="POST" class="form-bookings">
            
            <select id="" class="form-control" name="idPatients" >
                <?php foreach($patients as $patient): ?>
                    <option  value="<?= $patient['id']?>"><?= $patient['id']?> - <?=$patient["firstname"]?> <?= $patient["lastname"]?></option>
                <?php endforeach; ?>
            </select>

            <input type="datetime-local" name="dateHour" class="form-control">
            <button type="submit" name="submit" class="btn btn-outline-info">Enregistrer</button>
            <a href="rendezvous-list.php"><button type="button" class="btn btn-outline-secondary">Liste RDV</button></a>
        </form> 
    </section>
        
    </body>
    </html>


<?php
