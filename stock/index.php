<?php
require_once 'lib/config.php';
require_once 'lib/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Shop Admin Control Panel - View Users';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Shop Admin Control Panel - Add Users';
		break;

	case 'edit' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Shop Admin Control Panel - Modify Users';
		break;

}
require_once 'Global.php';
require_once 'list.php';
 require_once 'hardware/list.php' ;
 require_once 'software/list.php' ;
$script    = array('hardware.js');


?>
