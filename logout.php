<?php
session_start();
session_unset();
if(!isset($_SESSION["statut"])){
    header("location:Login.php");
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

