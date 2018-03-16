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
 class Responsable {
     private $nom ;
     private $prenom ;   
     private $fonction ;
     private $code ;

    public function __construct($nom,$prenom,$fonction,$code){         
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->fonction = $fonction;
            $this->code = $code;
        }
              
        
    public function getNom(){
            return $this->nom;
        }

}
