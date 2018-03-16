<?php
function checkUser()
{
	
	if (!isset($_SESSION["statut"]) || isset($_GET["logout"])) {
		session_unset();
		header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}
}
?>