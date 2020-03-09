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
    <link rel="stylesheet" href="css/style.css">
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
                <a class="nav-link" href="profil.php">Profil</a>
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
    <!-- FIN HEADER -->

    <div class="container">
        <!-- liste deroulante pour les users-->
        <?php // recuperation des users
        try {
            $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');
            $DonneeBruteUser = $Base->query('SELECT * from user');
            $TabUserIndex = 0;

            while ($tab = $DonneeBruteUser->fetch()) {
                $TabUser[$TabUserIndex] = new user();
                $TabUser[$TabUserIndex]->log($tab['id_user'], $tab['pseudo'], $tab['mdp']);
                $TabUser[$TabUserIndex++];
            }
        } catch (Exception $erreurs) {
            echo "echec de la connexion à la base";
        }

        ?>
        <form action="liste.php" method="POST">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <select class="custom-select mr-sm-2" name="users" id="inlineFormCustomSelect">
                        <?php // affichage des users
                        foreach ($TabUser as $objetUser) //les valeurs des objets sont bonnes
                        {
                            echo '<option value="' . $objetUser->getIdUser() . '">' . $objetUser->getPseudo() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-danger">Valider</button>
                </div>
            </div>
        </form>
        <?php // traitement du formulaire deroulant pour les users

        if (isset($_POST["users"])) {
            foreach ($TabUser as $objetUser) {
                if ($objetUser->getIdUser() == $_POST["users"]) {
                    $objetUser->afficheruser();
                }
            }
        } else {
            echo "<p>Aucun user selectionné</p>";
        }
        ?>
        <!-- fin de la liste deroulante pour les programmes-->

        <!-- liste deroulante pour les programmes-->

        <?php // recuperation des Programmes
        try {
            $DonneeBruteProg = $Base->query('SELECT * from programme');
            $TabProgIndex = 0;

            while ($tab = $DonneeBruteProg->fetch()) {
                $TabProg[$TabProgIndex] = new programme();
                $TabProg[$TabProgIndex]->log($tab['id_prog'], $tab['typeprogramme']);
                $TabProg[$TabProgIndex++];
            }
        } catch (Exception $erreurs) {
            echo "echec de la connexion à la base";
        }

        ?>
        <form action="liste.php" method="POST">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <select class="custom-select mr-sm-2" name="prog" id="inlineFormCustomSelect">
                        <?php // affichage des users
                        foreach ($TabProg as $objetProg) //les valeurs des objets sont bonnes
                        {
                            echo '<option value="' . $objetProg->getidprog() . '">' . $objetProg->getTypeProg() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
        <?php // traitement du formulaire deroulant pour les users

        if (isset($_POST["prog"])) {
            foreach ($TabProg as $objetProg) {
                if ($objetProg->getidprog() == $_POST["prog"]) {
                    $objetProg->afficheProgramme();
                }
            }
        } else {
            echo "<p>Aucun programme selectionné</p>";
        }
        ?>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>