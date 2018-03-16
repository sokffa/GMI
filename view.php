<?php
require_once 'lib/config.php';
require_once 'lib/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'adduser' :
		$content 	= 'user/add.php';		
		$pageTitle 	= 'GMI - Add Users';
		break;

	case 'addvendor' :
		$content 	= 'vendor/add.php';		
		$pageTitle 	= 'GMI - Add Vendor';
		break;
		
	case 'addcat' :
		$content 	= 'category/add.php';		
		$pageTitle 	= 'GMI - Add category';
		break;	

	case 'search' :
		$content 	= 'search/search.php';		
		$pageTitle 	= 'GMI - Search Asset';
		break;	

	case 'addlab' :
		$content 	= 'labs/add.php';		
		$pageTitle 	= 'GMI - Add Laboratory';
		break;	

	case 'assign' :
		$content 	= 'assign/add.php';		
		$pageTitle 	= 'GMI - Assign Asset';
		break;	

	case 'addhardware' :
		$content 	= 'hardware/add.php';		
		$pageTitle 	= 'GMI - Add Hardware';
		break;	

	case 'addsoftware' :
		$content 	= 'software/add.php';		
		$pageTitle 	= 'GMI - Add New Software';
		break;	

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Shop Admin Control Panel - View Users';
}

$script    = array('user.js','category.js','hardware.js');

require_once 'Global.php';

?>