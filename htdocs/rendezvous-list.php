<?php
session_start();
include 'connexion.php';

$request = $bdd->query('SELECT appointments.id, patients.lastname, patients.firstname, appointments.dateHour,appointments.idPatients
                      FROM patients
                      INNER JOIN appointments
                      ON patients.id = appointments.idPatients
                      ORDER BY dateHour DESC;
                      ');
$appointments = $request->fetchAll();





// $sql = 'SELECT id,dateHour FROM appointments,';
// $request = $bdd->query($sql);
// $appointmentIDs = $request->fetchAll();


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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patients-list.php">Patients</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="rendezvous-list.php">Rendez-vous<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid jumbotron-main">
            <div class="container text-center">
                <h1 class="display-4 text-center">HOSPITAL E2N</h1>
                <p class="lead"> Consultez la liste de vos rendez-vous</p>
            </div>
        </div>
    </header>

    
    <section class="container-fluid container-list">
        <div class="listHeader">
            <h2>La liste de vos rendez-vous!</h2>
            <a href="ajout-rendezvous-form.php" type="button" class="btn btn-outline-info addPatient">Ajout RDV</a>
        </div>
        <table class="table list-bookings">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date et heure</th>
                <th scope="col">Modification</th>
                <th scope="col">Annulation</th>
                </tr>
            </thead>
            
            <tbody>
            
            <?php foreach($appointments as $appointment): ?>
                
                    <?php $rendezvousID = $appointment['id'];?>
            <tr>
                <td ><?= $appointment['idPatients']?></td>
                <td ><?= $appointment['lastname']?></td>
                <td ><?= $appointment['firstname']?></td>
                <td ><?= $appointment['dateHour']?></td>
                <td><a href="rendezvous-modif.php?id=<?= $appointment['idPatients']?>" type="button" class="btn btn-outline-info">Modifier</a></td>
                <td><a href="delete-patient-data.php?id=<?= $rendezvousID?>" type="button" class="btn btn-outline-danger">Annuler</a></td>
            </tr>
            
            <?php endforeach;?>
            </tbody>
        </table>
    </section>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

