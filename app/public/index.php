<?php
    include 'ReadRegister.php';
    include 'ReadCoil.php';
    require '../vendor/autoload.php';
    $file = 'config_client.json';
    $donnees = file_get_contents($file);
    $decode = json_decode($donnees);
    $test_coil =new ReadCoil();
    $test_coil->setIp($decode->{'serveur'}->{'ip'});
    $test_register =new ReadRegister();
    $test_register->setIp($decode->{'serveur'}->{'ip'});
    $test_register->setUnitID($decode->{'serveur'}->{'unitId'});
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Coils An Registers</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<center><h2>Coils</h2></center>
<div class="row">
    <?php

        for($i=0; $i < count($decode->{'bit'});$i++){
            $test_coil->setConnection($decode->{'bit'}[$i]->{'adresse'},$decode->{'bit'}[$i]->{'id'});
            $test_coil->getReponse();
    ?>
        <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header badge badge-primary" style="color: brown"><?='L adresse : '.$decode->{'bit'}[$i]->{'adresse'}; ?></div>
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold"><?= $decode->{'bit'}[$i]->{'id'}; ?></h6>
                                <h6 class="card-subtitle"><?= 'la valeur est   '.$test_coil->reponse_data[$decode->{'bit'}[$i]->{'id'}]  ?></h6>
                </div>

                </div>
        </div>

   <?php
    }
        ?>

    <br><br>
    <center><h2>Registers</h2></center>
<div class="row">
    <?php

        for($i=0; $i < count($decode->{'mot'});$i++){
            $test_register->connection($decode->{'mot'}[$i]->{'adresse'},$decode->{'mot'}[$i]->{'id'});
            $test_register->getResponse();
    ?>
        <div class="col-sm-4">
            <div class="card text-center">
                <div class="card-header badge badge-primary" style="color: brown"><?='L adresse : '.$decode->{'mot'}[$i]->{'adresse'}; ?></div>
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold"><?= $decode->{'mot'}[$i]->{'id'}; ?></h6>
                        <h6 class="card-subtitle"><?= 'la valeur est   '.$test_register->reponse_data[$decode->{'mot'}[$i]->{'id'}]  ?></h6>
                    </div>


            </div>
        </div>

        <?php
    }
    ?>

</body>
</html>








