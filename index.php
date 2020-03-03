<?php session_start(); ?>
<?php require("user.php"); ?>
<?php require("programme.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/identification.css">
    <title>Fitness</title>
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
                <a class="nav-link active" href="#">Acceuil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
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

        <!-- Pop-up d'inscription -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Identifiant</label>
                                <input type="text" class="form-control" name="username_ins" required />
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mot de passe :</label>
                                <input type="password" class="form-control" name="password_ins" required></input>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Confirmez le mot de passe :</label>
                                <input type="password" class="form-control" name="password2_ins" required></input>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" />
                    </div>
                    </form>
                </div>
            </div>
        </div> <!-- fin du Pop-up d'inscription -->

        <?php // Début du PHP pour l'inscriptuion
        if (empty($_POST['username_ins']) && empty($_POST['password_ins']) && empty($_POST['password2_ins'])) {
        } else {
            $user = new user(); //les mots de passe sont corrects, on crée l'objet user
            $user->Inscription($_POST['username_ins'], $_POST['password_ins']);
            echo " <p>Nous vous remercion de votre inscription ! Vous pouvez vous connecter</p>";
        }
        ?>
        <!-- fin php insciption -->

        <!-- Pop-up de connexion -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Identifiant</label>
                                <input type="text" class="form-control" name="username_co" required />
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Mot de passe :</label>
                                <input type="password" class="form-control" name="password_co" required></input>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" />
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php // Début du PHP pour la connection

        $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');

        if (isset($_POST['username_co']) && isset($_POST['password_co'])) {
            $pseudoconnect = $_POST['username_co'];
            $mdpconnect = $_POST['password_co'];
            $requser = $Base->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
            $requser->execute(array($pseudoconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                echo "Vous être connecté en tant que " . $userinfo['pseudo'];
                echo "<p>Vous pouvez maintenant choisir votre programme ou visité votre profile</p>";
            } else {
                echo "<p>Identifiant ou mot de passe incorrect !</p>";
            }
        }
        ?>

        <?php // recuperation de l'id user 
        if (!empty($_SESSION['pseudo'])) {
            $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');
            $username = $_SESSION['pseudo'];
            $recupid = $Base->query("SELECT `id_user` FROM `user` WHERE pseudo= '" . $username . "'");
            $userid = $recupid->fetch();
            $_SESSION['id_user'] = $userid['id_user'];
        }
        ?>
        <?php // affichage btn radio si l'utilisateur est connecter

        if (!empty($_SESSION['pseudo'])) {
            include("radio.php");
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