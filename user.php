<?php
class user{

    //Propiétés
    private $_idprog;
    private $_idUser;
    private $_pseudo;
    private $_mdp;
    
    //Construc

   // public function __construct($idUser, $idprog, $pseudo, $mdp,)
    //{
      //  $this->_idUser = $idUser;
        //$this->_idprog = $idprog;
        //$this->_pseudo = $pseudo;


    //Methodes
    public function bdd()
    {
        try {
            $bdd = new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8', 'root', 'root');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
        return $bdd;
    }

    public function Inscription($pseudo, $mdp , $bdd)
    { //Fonction qui creer un nouvelle utiliateur

        try {
            $bdd->query('INSERT INTO `user`(`pseudo`, `mdp`) VALUES ("' . $pseudo . '","' . $mdp . '")');
        } catch (Exception $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
    }
    public function AfficherUser()
    {
        echo "Vous avez affaire à l'utilisateur numéro  " . $this->_idUser . " il s'appelle " . $this->_pseudo . " et a choisi le programme numéro " . $this->_idprog . "";
    }

    public function Connexion($pseudo, $mdp , $bdd)
    {
            $requser = $bdd->prepare('SELECT * FROM user WHERE "'.$pseudo.'"=`pseudo` && "'.$mdp.'"=`mdp');
            $requser->execute(array($pseudo, $mdp));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                echo "Vous être connecté en tant que " . $userinfo['pseudo'] . ".";
                echo "<p>Vous pouvez maintenant choisir votre programme ou "; ?><a href="profil.php">visité votre profile.</a><?php
            } else {
             echo "<p>Identifiant ou mot de passe incorrect !</p>";
            }
    }

    public function MiniConstruct($iduser, $pseudo, $mdp) //sorte de second constructeur
    {
        $this->_idUser = $iduser;
        $this->_pseudo = $pseudo;
        $this->_mdp = $mdp;
    }

    public function getIdUser()
    {
        return $this->_idUser;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function getMdp()
    {
        return $this->_mdp;
    }
}
