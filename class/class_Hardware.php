
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

require_once 'class_HardUnite.php';
 class Hardware {
    
    protected $hid;
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
    function getHid(){
        global $connect;
        $idsql="SELECT id FROM hardwares WHERE numInventaire='$this->numInventaire'";
             $results=$connect->query($idsql)  or die($connect->error);;
             while($row = $results->fetch_assoc())  {
                 extract($row);
             }
            return (int)$id;
        }
    static function setAvblQty($hid){
        $sql=   "UPDATE hardwares 
                SET avbl_qty=avbl_qty-1
                WHERE id = $hid";
    }

function addHardware()
{
    global $connect;
    
    if($this->qty ===FALSE || $this->price ===FALSE )
            echo "Donnés Incorrectes <br> <a href='javascript:history.back()'>Réessayer</a>";
            else{
            
        $sql   = "INSERT INTO hardwares (modele, numInventaire,qty, avbl_qty,vid, dop, price, cid)
                  VALUES ('$this->hname','$this->numInventaire',$this->qty, $this->qty,$this->vid, '$this->dop', $this->price, $this->catid)";
        $connect->query($sql);
            $unite =array();
                for($i=0;$i<$this->qty;$i++){
                $unite[]=new HardUnite();
            $unite[$i]->addHardUnite($this->getHid());
        }
        header('Location: ../menu.php?v=STCK'); 
    }
    }
        
function modifyHardware()
{
    global $connect;
    $this->id = (int)$_POST['hid'];
    $this->avbl_qty = filter_var($_POST['txtAvblQty'],FILTER_VALIDATE_INT);
    
        if($this->qty ===FALSE || $this->avbl_qty===FALSE || $this->price ===FALSE || $this->qty < $this->avbl_qty)
            echo "Donnés Incorrectes <br> <a href='javascript:history.back()'>Réessayer</a>";
            else{

        $sql   = "UPDATE hardwares 
                SET 
                    modele='$this->hname',
                    numInventaire='$this->numInventaire',
                    qty='$this->qty',
                    avbl_qty='$this->avbl_qty',
                    vid=$this->vid,
                    dop='$this->dop',
                    price='$this->price',
                    cid=$this->catid
                 WHERE id = $this->id";
      
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
        $this->id = (int)$_GET['id'];
    } else {
        header('Location: index.php');
    }
    
    
    $sql = "DELETE FROM Hardwares
            WHERE id = $this->id";
            if ($connect->query($sql) === TRUE) {
   header('Location: ../menu.php?v=STCK');  
        }
}
}
