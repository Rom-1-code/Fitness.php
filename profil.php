<?php session_start(); ?>
<?php require("user.php"); ?>
<?php require("programme.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/identification.css">
    <title>Profil</title>
</head>

<body>
    <!-- HEADER -->
    <nav>
        <div class="w-100 p-3" style="background-color: #eee;">
            <ul class=" nav justify-content-center">
                <li class="nav-item">
                    <a>
                        <h1>FITNESS<span class="tld">.php</span></h1>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav justify-content-center ">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Acceuil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Identification
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">S'inscrire</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal2">Se connecter</a>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Deconnexion</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <!-- FIN HEADER -->
        <?php 
        if (!empty($_SESSION['pseudo'])) {

        echo " <h1> Bonjour " . $_SESSION['pseudo'] . " !" . "</h1>";
        ?>

        <p> Voici votre profil vous y retrouverez votre programme ainsi que vos informations personnelles</p>

        <?php

        $prog = new programme();
        $prog->AfficheProg($_SESSION['id_user']);
        }
        ?>
        
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>