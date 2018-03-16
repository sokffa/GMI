<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
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
		$pageTitle 	= 'Asset Management - Edit User';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Shop Admin Control Panel - View Users';
}

$script    = array('user.js');
	
require_once '../Global.php';
?>
