<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addLabs();
		break;
		
	case 'delete' :
		deleteLab();
		break;
    case 'edit' :
    	modifyLab();
    	break;
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
this function will add lab entry in tbl_depts table. 
if the lab with given name is already exist, it shows error message to user.
*/
function addLabs()
{
	global $connect;
 	$nom= filter_var($_POST['txtLname'],FILTER_SANITIZE_STRING);
	$salle = filter_var($_POST['txtRoom'],FILTER_SANITIZE_STRING);
	$etage = filter_var($_POST['txtFloor'],FILTER_SANITIZE_STRING);
	$batiment = filter_var($_POST['txtBuilding'],FILTER_SANITIZE_STRING);
	
	$sql = "SELECT nom
	        FROM departement
			WHERE nom = '$nom'";
	$results = $connect->query($sql);
	
	if ($results->num_rows == 1) {
		header('Location: ../view.php?v=addlab&error=' . urlencode('Département déjà existant'));	
	} else {			
		$sql   = "INSERT INTO departement (nom, salle, etage, batiment)
		          VALUES ('$nom', '$salle', '$etage', '$batiment')";
	
		if ($connect->query($sql) === TRUE) {
    header('Location: ../menu.php?v=LABS');
		}
	}
}
function modifyLab()
{

		global $connect;
 	$id = $_POST["lid"];
 	$nom= filter_var($_POST['txtLname'],FILTER_SANITIZE_STRING);
	$salle = filter_var($_POST['txtRoom'],FILTER_SANITIZE_STRING);
	$etage = filter_var($_POST['txtFloor'],FILTER_SANITIZE_STRING);
	$batiment = filter_var($_POST['txtBuilding'],FILTER_SANITIZE_STRING);
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken
		$sql   = "UPDATE departement  
			SET nom = '$nom', 
				salle = '$salle', 
				etage = '$etage', 
				batiment = '$batiment'
				WHERE id = $id";
	
		if ($connect->query($sql) === TRUE) {
				echo"mama";
    header('Location: ../menu.php?v=LABS');
		}
			
	//}

	
}
/*
function used to delete Lab
*/
function deleteLab()
{
	global $connect;
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	$sql = "DELETE FROM departement 
	        WHERE id = $id";
	if ($connect->query($sql) === TRUE) {
header('Location: ../menu.php?v=LABS');
		}
	
	
}
?>