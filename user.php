<?php

class user
{

    //Propiétés
    private $_idprog;
    private $_idUser;
    private $_pseudo;
    private $_mdp;
    


    //Construc

   // public function __construct($idUser, $idprog, $pseudo, $mdp, $bdd)
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
    public function afficheruser()
    {
        echo "Vous avez affaire à l'utilisateur numéro  " . $this->_idUser . " il s'appelle " . $this->_pseudo . " et a choisi le programme numéro " . $this->_idprog . "";
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

    public function log($iduser, $pseudo, $mdp) //sorte de second constructeur
    {
        $this->_idUser = $iduser;
        $this->_pseudo = $pseudo;
        $this->_mdp = $mdp;
    }
}
