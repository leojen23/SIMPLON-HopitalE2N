<?php

include 'connexion.php';

// Je récupére les données du tableau Client
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $request = $bdd->prepare('SELECT * FROM patients WHERE id= ?');
    $request->execute([$_GET["id"]]);
    $patient = $request->fetch();
}


// Je récupère nom prénom datehour and idPatient de client et appointments
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

?>


<!-- // echo '<pre>' . var_export($patients, true) . '</pre>'; -->


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
                <p class="lead">Informations Patient</p>
            </div>
        </div>
    </header>


    <section class="container container-infos" style="color:black">
        

<!--CONTACT INFO PART----------------------------------- -->
        <div class="profile-details" >
            <h2>Coordonnées du patient</h2>
            <h3><?=$patient['lastname']. ' ' . $patient['firstname']?> </h3>

            <p><strong>Date de naissance : </strong><?= $patient['birthdate']?></p>
            <p><strong>Téléphone : </strong><?= $patient['phone']?></p>
            <p><strong>Email : </strong><?= $patient['mail']?></p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">Modifier</button>
            <a href="patients-list.php"><button type="button" class="btn btn-outline-secondary">Retour</button></a>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalCenterTitle">Modifier les coordonnées</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="update-patient-data.php" method="POST" class="form-profile-mod">
                                <div class="row">
                                    
                                    <input type="hidden" class="form-control" id="" name="id" value="<?= $_GET['id']?>">
                                    <div class="col">
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $patient['lastname']?>">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $patient['firstname']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" id="dob" name="birthdate" value="<?= $patient['birthdate']?>">
                                    </div>
                                    <div class="col">
                                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $patient['phone']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="email" class="form-control" id="email" name="mail" value="<?= $patient['mail']?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-info">Enregistrer</button>
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fermer</button>
                            
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- RENDEZ VOUS INFO PART----------------------------------- -->

    <div class= 'bookingInfo'>
        <h2>Rendez-vous du patient</h2>

        <? foreach ($appointments as $appointment): ?>

            <? if($patient['id']!== $appointment['idPatients']): ?>
                <h3> Aucun Rendez-vous de prévus</h3>
            <? else: ?>
                <h3> Rendez-vous prévu le :</h3>
                <?= ' ' . $appointment['dateHour']?></p>
                <br>
                <br>
                <br>
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter1">Modifier</button>
            <a href="patients-list.php"><button type="button" class="btn btn-outline-secondary">Retour</button></a>
            <? endif; ?>

        <?php endforeach;?> 
        <br>
        <br>
        <br>
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalCenterTitle1">Modifier un rendez-vous</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="rendezvous-modif-data.php" method="POST" class="form-profile-mod">
                            <div class="row">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $_GET['id']?>">
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $patient['lastname']?>">
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $patient['firstname']?>">
                                <input type="datetime-local" name="dateHour" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-outline-info">Enregistrer</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fermer</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
            









    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>