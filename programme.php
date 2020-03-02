
<?php

class programme
{
    //Propiétés
    private $_iduser;
    private $_idprog;
    private $_typeProg;


    //Construc   

    // public function __construct($_idprog,$_typeProg, $_iduser){
    //   $this->_iduser = $_iduser;
    // $this->_idprog = $_idprog;
    //$this->_typeProg = $_typeProg; 
    //}

    //Methodes


    public function AddProg($idprog, $iduser)
    {
        try {
            $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', '');
            $AddUserProg = $Base->query('INSERT INTO `assos_user_prog`(`id_user`, `id_prog`) VALUES ("' . $idprog . '","' . $iduser . '")');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
    }

    public function getIdProg()
    {
        return $this->_idprog;
    }

    public function AfficheTypeProg()
    {
        try {
            $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', '');
            $affiche = $Base->query('SELECT `id_user`, `id_prog` FROM `assos_user_prog`');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $this->_typeProg;
    }

    public function AfficheProg($prog)
    {

        $BddPhpexo = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', '');
        $requete = $BddPhpexo->query('SELECT `id_user`,`id_prog` FROM `assos_user_prog`');

        while ($resultat = $requete->fetch()) {
            echo  $resultat['id_user'];
            echo  " a le programe numero " . $resultat['id_prog'];
            
        }
    }
}
?>