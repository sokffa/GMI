<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Materiel
 *
 * @author hp
 */
 class Local {
     private $nom ;
     private $etage ;   
     private $batiment ;
     private $ID ;

    public function __construct($nom,$prenom,$fonction){         
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->fonction = $fonction;
            $this->code = $code;
        }
    public function setID($ID){
        $this->ID->$ID;
    }        
        
    public function getNom(){
            return $this->nom;
        }

}
