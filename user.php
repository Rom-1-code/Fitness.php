<?php

class user{

    //Propiétés
    private $_idprog;
    private $_idUser;
    private $_pseudo;
    private $_mdp;
    
    //Construc

    // public function __construct($_idUser,$_idprog,$_pseudo,$_mdp)
    //{
      //  $this->_idUser = $_idUser;
        //$this->_idprog = $_idprog;
        //$this->_pseudo = $_pseudo;
        //$this->_Mdp = $_mdp; 
    //}

    //Methodes
    public function Inscription($pseudo, $mdp){//Fonction qui creer un nouvelle utiliateur

        try
        {
            $Base=new PDO('mysql:host=localhost; dbname=applisportive; charset=utf8','root', '');
            $insUser=$Base->query('INSERT INTO `user`(`pseudo`, `mdp`) VALUES ("'.$pseudo.'","'.$mdp.'")') ;
        }    
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
        
    }

    public function getIdUser(){
        return $this->_idUser;
    }
    
    public function getPseudo(){
        return $this->_pseudo;
    }

    public function getMdp(){
        return $this->_mdp;

    }
}













































?>