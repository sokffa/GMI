
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


 class Hardware {
     
    protected $hname;
    protected $numInventaire ;
    protected $qty;
    protected $avbl_qty;
    protected $vid;
    protected $dop;
    protected $price;
    protected $catid;



    function __construct(){
        global $connect;
            $this->hname = filter_var($_POST['txtHname'],FILTER_SANITIZE_STRING);
            $this->numInventaire = filter_var($_POST['txtNumInventaire'],FILTER_SANITIZE_STRING);
            $this->qty = filter_var($_POST['txtQty'],FILTER_VALIDATE_INT) ;
            $this->vid = (int)$_POST['txtVname'];
            $this->dop = $_POST['txtDp'];
            $this->price = filter_var($_POST['txtPrice'],FILTER_VALIDATE_FLOAT) ;
            $this->catid = (int)$_POST['txtCategory'];  }   

   function getNumInventaire(){
            return $this->numInventaire;
        }

function addHardware()
{
    global $connect;
    $hname = filter_var($_POST['txtHname'],FILTER_SANITIZE_STRING);
    $numInventaire = filter_var($_POST['txtNumInventaire'],FILTER_SANITIZE_STRING);
    $qty = filter_var($_POST['txtQty'],FILTER_VALIDATE_INT) ;
    $vid = (int)$_POST['txtVname'];
    $dop = $_POST['txtDp'];
    $price = filter_var($_POST['txtPrice'],FILTER_VALIDATE_FLOAT) ;
    $catid = (int)$_POST['txtCategory'];
    
    if($qty ===FALSE || $price ===FALSE )
            echo "Donnés Incorrectes <br> <a href='javascript:history.back()'>Réessayer</a>";
            else{
            
        $sql   = "INSERT INTO hardwares (modele, numInventaire,qty, avbl_qty,vid, dop, price, cid)
                  VALUES ('$hname','$numInventaire',$qty, $qty,$vid, '$dop', $price, $catid)";
    
        if ($connect->query($sql) === TRUE) {
   header('Location: ../menu.php?v=STCK');  
        }
    }
    }
        
function modifyHardware()
{
    global $connect;
    $id = (int)$_POST['hid'];
    $hname = filter_var($_POST['txtHname'],FILTER_SANITIZE_STRING);
    $numInventaire = filter_var($_POST['txtNumInventaire'],FILTER_SANITIZE_STRING);
    $qty = filter_var($_POST['txtQty'],FILTER_VALIDATE_INT) ;
    $avbl_qty = filter_var($_POST['txtAvblQty'],FILTER_VALIDATE_INT);
    $vid = (int)$_POST['txtVname'];
    $dop = $_POST['txtDp'];
    $price = filter_var($_POST['txtPrice'],FILTER_VALIDATE_FLOAT);
    $catid = (int)$_POST['txtCategory'];
    
        if($qty ===FALSE || $avbl_qty===FALSE || $price ===FALSE || $qty < $avbl_qty)
            echo "Donnés Incorrectes <br> <a href='javascript:history.back()'>Réessayer</a>";
            else{

        $sql   = "UPDATE hardwares 
                SET 
                    modele='$hname',
                    numInventaire='$numInventaire',
                    qty='$qty',
                    avbl_qty='$avbl_qty',
                    vid=$vid,
                    dop='$dop',
                    price='$price',
                    cid=$catid
                 WHERE id = $id";
      
        if ($connect->query($sql) === TRUE) {

   header('Location: ../menu.php?v=STCK');  
        }
        }
    }

/*
    Remove a Hardware
*/
function deleteHardware()
{
    global $connect;
    if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
        $id = (int)$_GET['id'];
    } else {
        header('Location: index.php');
    }
    
    
    $sql = "DELETE FROM Hardwares
            WHERE id = $id";
            if ($connect->query($sql) === TRUE) {
   header('Location: ../menu.php?v=STCK');  
        }
}
}
