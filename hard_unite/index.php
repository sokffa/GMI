 		
<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		

		break;

	case 'edit' :
		$content 	= 'edit.php';		

		break;

	default :
		$content 	= 'list.php';

}

$script    = array('hardware.js','hardunite.js');

require_once '../Global.php';
?>
