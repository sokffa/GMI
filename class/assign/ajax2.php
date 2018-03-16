<?php
require_once '../lib/config.php' ;
$id = $_GET['id'];
$sql = "SELECT hu.code as code 
		 FROM hardwares h, hard_unite hu
		 WHERE h.id = hu.hid AND h.id=$id AND hu.etat='En stock'";


$results = $connect->query($sql);
$data = "<select name=\"codesel\">";
while($row = $results->fetch_assoc()){
	extract($row);
	$data .= "<option selected value=\"$code\">".$code."</option>";
}
$data .="</select>";
echo $data;

?>