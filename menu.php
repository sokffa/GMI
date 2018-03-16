<?php
require_once 'lib/config.php';
require_once 'lib/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';
$script    = array();
switch ($view) {
	case 'USER' :
		$content 	= 'user/list.php';		
		$pageTitle 	= 'GMI - Liste Utilisateurs';
		$script[]='user.js';
		break;

	case 'HRWR' :
		$content 	= 'hardware/list.php';		
		$pageTitle 	= 'GMI - Liste Hardwares';
		$script[]='hardware.js';
		break;

	case 'SFWR' :
		$content 	= 'software/list.php';		
		$pageTitle 	= 'GMI - Liste Softwares ';
		$script[]='software.js';
		break;

	case 'LABS' :
		$content 	= 'labs/list.php';		
		$pageTitle 	= 'GMI - Liste Département';
	 	$script[]='lab.js';
		break;

	case 'STCK' :
		$content 	= 'stock/index.php';		
		$pageTitle 	= 'GMI - Liste Stock';
		$script[]='hardware.js';
		$script[]='software.js';
		break;

}



require_once 'Global.php';

?>