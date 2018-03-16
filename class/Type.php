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

 class Type {
     private $nom ;   

    public function __construct($nom){         
            $this->nom = $nom;
        }
              
        
    public function getNom(){
            return $this->nom;
        }

}
