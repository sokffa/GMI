	<?php 
	session_start();
	

	$host = "localhost";
	$user="root";
	$password="sokffaquasar1797";
	$db="gmi2";
	$thisFile = str_replace('\\', '/', __FILE__);
	$docRoot = $_SERVER['DOCUMENT_ROOT'];

	$webRoot  = str_replace(array($docRoot, 'lib/config.php'), '', $thisFile);
	$srvRoot  = str_replace('lib/config.php', '', $thisFile);

	define('WEB_ROOT', $webRoot);
	define('SRV_ROOT', $srvRoot);
require_once 'db_conn.php';
	?>