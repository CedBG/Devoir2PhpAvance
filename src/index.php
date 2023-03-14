<?php

require '../vendor/autoload.php';

use App\classes\Discuss;

require './functions/config.php';
require './functions/readCsv.php';

$pathCsv = 'paris.csv';

$discuss = new Discuss();

$conn = $discuss->connection($host, $dbname, $user, $password);

$discuss->createTable($conn);

$datas = read($pathCsv);


$meteo = $discuss->takeData($conn, $_GET['date']);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Devoir2PhpAvance</title>
</head>
<body>


        <?php 
        foreach ($meteo as $value){
            
            if ($value['date'] == $_GET['date']) {
                $date = $_GET['date'];
               header("Location:formulaire_meteo_paris.php?date=$date");
            }
            // elseif ($date == '2100-12-07') {
            //    echo ;
            // }
            // if ($ville == 'paris') {
            //    echo ;
            // }
            // elseif ($ville != 'paris') {
            //    echo ;
            // }
            // else {
            //     echo 'veuillez sélectionner vos choix';
            // }

        
           
           }
            ?>      
     <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Sélectionnez votre ville
  </button>
  <ul class="dropdown-menu">
    <li><button class="dropdown-item" type="button"><a href="">Paris</a></button></li>
    <li><button class="dropdown-item" type="button"><a href="">Biarritz</a></li>
    <li><button class="dropdown-item" type="button"><a href="">Arcachon</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Sélectionnez votre date
  </button>
  <ul class="dropdown-menu">
    <li><button class="dropdown-item" type="button"><a href="index.php?date=2100-12-06">2100-12-06</a></button></li>
    <li><button class="dropdown-item" type="button"><a href="index.php?date=2100-12-07">2100-12-07</a></button></li>
  </ul>
</div>     
          
          <div class="card" style="width: 18rem;">        
          <i class="fa-solid fa-cloud"></i>
  <div class="card-body">
    <h5 class="card-title">VILLE : <?php echo $value['ville']; ?></h5>
    <p class="card-text"><?php echo $value['comment']; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Date : <?php echo $value['date']; ?></li>
    <li class="list-group-item">PERIODE : <?php echo $value['periode']; ?></li>
    <li class="list-group-item"><?php echo $value['resume']; ?></li>
    <li class="list-group-item">TEMPERATURE Min : <?php echo $value['tempMin']; ?></li>
    <li class="list-group-item">TEMPERATURE Max : <?php echo $value['tempMax']; ?></li>
    <li class="list-group-item"><?php echo $value['idResume']; ?></li>
  </ul> 
</div>
 <?php

    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


   



