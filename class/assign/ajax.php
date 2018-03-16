<?php
require_once '../lib/config.php' ;
$id = (int)$_GET['id'];

$hsql = "SELECT h.id AS id, h.modele AS name, v.vname AS vname 
		 FROM hardwares h, vendeurs v
		 WHERE h.vid = v.id";

$ssql = "SELECT s.id AS id, s.sw_name AS name, v.vname AS vname 
		 FROM softwares s, vendeurs v
		 WHERE s.vid = v.id";

$results = $connect->query($id == 1 ? $hsql : $ssql);
$data = "<select name=\"typesel\" id=\"typesel\">";
while($row = $results->fetch_assoc()){
	extract($row);
	$data .= "<option value=\"$id\">".$name." ( VENDEUR : ".$vname." )</option>";
}
$data .="</select>";
echo $data;

?>