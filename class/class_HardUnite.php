<?php
require_once 'class_Hardware.php';
class HardUnite {
		 private $id;
		 private $etat;
		 private $code;


	function __construct(){
		global $connect;
		 do
        {
         $this->code = $this->genererCode();
         $query = "select * from hard_unite where '.$this->code.'=code";
         $results =  $connect->query($query);
    }while ($results->num_rows > 0);

	}

	function addHardUnite($hid){
		global $connect;
		
		$sql   = "INSERT INTO hard_unite (hid, code)
                  VALUES ('$hid','$this->code')";    
        $connect->query($sql);
	}
	 function modifyHardUnite($etat,$id){
	 	global $connect;
	 	$this->etat=$etat;
	 	$this->id=$id;
		 $sql   = "UPDATE hard_unite 
                SET 
                    etat='$this->etat',
                 WHERE id = $this->id";
      
     $connect->query($sql) ;
	}
	static function deleteHardUnite($id,$hid){
		global $connect;
		$this->id=$id;
		$dsql   = "DELETE FROM  hard_unite 
                WHERE id = $this->id'";                    
    		 $connect->query($dsql);
    		 Hardware::setAvblQty($hid);
	}
	function genererCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < 5; $i++) {
        $code .= $characters[rand(0, $charactersLength - 1)];
    }
        return $code;
}
}
?>