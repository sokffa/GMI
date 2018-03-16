<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';
require_once '../class/class_HardUnite.php';
checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$hardware = new Hardware();
switch ($action) {
	
	case 'add' :
		$hardware->addHardware();
		break;
		
	case 'modify' :
		$hardware->modifyHardware();
		break;
		
	case 'delete' :
		$hardware->deleteHardware();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
Function used to add entry in tbl_hardwares table.
*/

?>