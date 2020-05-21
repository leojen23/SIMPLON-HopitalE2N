<?php

include 'connexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $request = $bdd->prepare('SELECT patients.lastname, patients.firstname, appointments.dateHour,appointments.idPatients
    FROM patients
    INNER JOIN appointments
    ON patients.id = appointments.idPatients
    WHERE idPatients = ?;
    ');
$request->execute([$_GET['id']]);
$appointments = $request->fetchAll();

}

 if(isset($_POST['dateHour'])) {

    $idPatients = $_POST['idPatients'];
    $dateHour = $_POST['dateHour'];
    
    
    $request = $bdd->prepare('UPDATE appointments SET dateHour = :dateHour WHERE idPatients =:idPatients');
    $request->execute(array('dateHour' => $dateHour, 'idPatients' => $idPatients));
    
    
    } 
// echo '<pre>' . var_export($appointments, true) . '</pre>';
?>

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
                <p class="lead">Modifiez vos rendez-vous en ligne</p>
            </div>
        </div>
    </header>

    <section class="container container-infos" style="color:black">
        
        <div class= 'container-fluid bookingInfo'>
            <h2>Rendez-vous du patient</h2>
            <h3><?=$appointments[0]['lastname']. ' ' . $appointments[0]['firstname']?> </h3>
            
            <? foreach ($appointments as $appointment): ?> 
                <p><strong>Vous avez rendez-vous le :</strong><?= ' ' . $appointment['dateHour']?></p>
            <?php endforeach;?>
        </div>
        

        <form action="rendezvous-modif-data.php" method="POST" class="form-bookingMod">
            <h2>Modifier un rendez-vous</h2>
            
            <?php if(isset($_POST['dateHour'])){
            $request = $bdd->prepare('SELECT patients.lastname, patients.firstname, appointments.dateHour,appointments.idPatients
            FROM patients
            INNER JOIN appointments
            ON patients.id = appointments.idPatients
            WHERE dateHour = ?;
            ');
            $request->execute($_POST['dateHour']);
            $appointments = $request->fetchAll();
            }?>

            <input type="hidden" class="form-control" id="" name="id" value="<?= $appointments[0]['idPatients']?>">           
            <input type="text" class="form-control" id="" name="idPatients" value="<?= $appointments[0]['idPatients']?>">
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $appointments[0]['lastname']?>">
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $appointments[0]['firstname']?>">
            <input type="datetime-local" name="dateHour" class="form-control">
            <button type="submit" name="submit" class="btn btn-outline-info">Enregistrer</button>
        </form>

     </section>



        
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>