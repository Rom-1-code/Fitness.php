
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
            $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');
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
            $Base = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');
            $affiche = $Base->query('SELECT `id_user`, `id_prog` FROM `assos_user_prog`');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $this->_typeProg;
    }

    public function AfficheProg($iduser)

    {

        $Base= new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');
        $requete = $Base->query('SELECT pseudo FROM user INNER JOIN assos_user_prog ON user.id_user = assos_user_prog.id_user WHERE user.id_user="'.$iduser.'"');
        $requete2 = $Base->query('SELECT id_prog  FROM  assos_user_prog WHERE id_user="'.$iduser.'"');
        $TabIdProg = $requete2->fetch();
        $idprog = $TabIdProg[0];
        $requete3 = $Base->query('SELECT typeprogramme FROM programme INNER JOIN assos_user_prog ON programme.id_prog = assos_user_prog.id_prog WHERE programme.id_prog="'.$idprog.'"');
       // echo 'SELECT typeprogramme FROM programme INNER JOIN assos_user_prog ON programme.id_prog = assos_user_prog.id_prog WHERE programme.id_prog="'.$idprog.'"';
        // SELECT * FROM table1 INNER JOIN table2 ON table1.id = table2.fk_id

        $resultat3 = $requete3->fetch();
            echo  "Votre programme est " . $resultat3[0];       
           
            
        
     }
}
?>