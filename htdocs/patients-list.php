<?php

include 'connexion.php';

// echo '<pre>' . var_export($data, true) . '</pre>';
$request = $bdd->query('SELECT * FROM patients');
$patients = $request->fetchAll();

$request = $bdd->query('SELECT patients.lastname, patients.firstname, appointments.dateHour,appointments.idPatients
                      FROM patients
                      INNER JOIN appointments
                      ON patients.id = appointments.idPatients
                      ORDER BY dateHour DESC;
                      ');
$appointments = $request->fetchAll();




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
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Accueil </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="patients-list.php">Patients<span class="sr-only">(current)</span></a>
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
                <p class="lead"> Consultez la liste de vos patients en temps réel</p>
            </div>
        </div>
    </header>

    
    <section class="container-fluid container-list">
    
        <div class="listHeader">
            <h2>La liste de vos patients!</h2>
            <a href="ajout-patient-form.php" type="button" class="btn btn-outline-info addPatient">Ajout Patient</a>
        </div>
   
      <table class="table list-patients">
         
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Profile</th>
              <th scope="col">Suppression</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($patients as $patient) : ?>
          
          <tr>
              <td ><?= $patient['id']?></td>
              <td ><?= $patient['lastname']?></td>
              <td ><?= $patient['firstname']?></td>
              <td ><a href="./profil-patients.php?id=<?=$patient['id']?>"><button type="button" class="btn btn-outline-info">Profile</button></a></td>
              <td >
             
             <!-- Button trigger modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
                Supprimer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Souhaitez vous supprimer ce contact?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <form action="patients-list.php">
                            <input type="hidden" name='id' value="<?= $patient['id']?>">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            
                        </form>
                    </div>
                    </div>
                </div>
                </div>
              </td>
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
