
<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';


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
		$content 	= 'edit.php';		
		$pageTitle 	= 'Shop Admin Control Panel - Modify Users';
		break;

}

$script    = array('hardware.js');

require_once '../Global.php';
?>
