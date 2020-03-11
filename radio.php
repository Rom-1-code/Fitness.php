<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="radio">
        <h1 class="nav justify-content-center">Choissisez votre programme !</h1>
        <form action="index.php" method="POST">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Forme
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2">
                <label class="form-check-label" for="exampleRadios2">
                    Tonic
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="3">
                <label class="form-check-label" for="exampleRadios3">
                    Esthetique
                </label>
            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-danger">Valider</button>
            </div>
        </form>
    </div>

    <?php // Début du php pour le traitement des checkbox

    if (empty($_POST['exampleRadios'])) {
    } else {
        $ajouteProg = new programme();
        $ajouteProg->AddProg($_SESSION['id_user'], $_POST['exampleRadios']);
        echo " <p>Vous avez choisie le programme " . $_POST['exampleRadios'] . " vous pouvez maintenant " ?> <a href="profil.php">visité votre profile.</a> <?php "</p> ";
    }
    ?>

    <?php 
    

    
    
    ?>

</body>

</html>