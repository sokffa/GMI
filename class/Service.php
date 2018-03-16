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
require "Local.php";
 class Service {
     private $nom ;
     private $ID; 
     private $local ;

    public function __construct($nom,$local){         
            $this->nom = $nom;
            $this->local = $local;
        }
    public function setID($ID){
        $this->ID->$ID;
    }        
        
    public function getNom(){
            return $this->nom;
        }

}
