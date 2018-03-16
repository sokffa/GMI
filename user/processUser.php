<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'edit' :
		modifyUser();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to create single user in table tbl_users
*/
function addUser()
{
	global $connect;
 
	$email = filter_var($_POST['txtEmail'],FILTER_VALIDATE_EMAIL);
	$fname = filter_var($_POST['txtFname'],FILTER_SANITIZE_STRING);
	$lname = filter_var($_POST['txtLname'],FILTER_SANITIZE_STRING);
	$did = (int)$_POST['did'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
		
	// check if the username is taken
	$sql = "SELECT uname
	        FROM tbl_users
			WHERE uname = '$userName'";
	$result = dbQuery($sql);
	*/
	if ($email===FALSE ) {
		header('Location: ../view.php?v=adduser&error=' . urlencode('Format d\'Email incorrect'));	
	} else {			
		$sql   = "INSERT INTO responsable (email, fname, lname, bdate, did)
		          VALUES ('$email', '$fname', '$lname', NOW(), $did)";
	
		if ($connect->query($sql) === TRUE) {
    header('Location: ../menu.php?v=USER');
		}
			
	//}
}
}
/*
	Modify a user, it will mdify, edit user and able to update user details
*/
function modifyUser()
{
		global $connect;
 	$uid = $_POST["id"];
	$email = filter_var($_POST['txtEmail'],FILTER_VALIDATE_EMAIL);
	$fname = filter_var($_POST['txtFname'],FILTER_SANITIZE_STRING);
	$lname = filter_var($_POST['txtLname'],FILTER_SANITIZE_STRING);
	$did = (int)$_POST['did'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken
		if ($email===FALSE ) {
		header('Location: ../user/index.php?view=edit&id='.$uid.'&error=Format d\'Email incorrect');
		exit;	
	} else {
		$sql   = "UPDATE responsable  
			SET email = '$email', 
				fname = '$fname', 
				lname = '$lname', 
				did = $did
				WHERE id = $uid";
	
		if ($connect->query($sql) === TRUE) {
    header('Location: ../menu.php?v=USER');
		}
			
	//}
}
	
}

/*
	Remove a user
*/
function deleteUser()
{
	global $connect;
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM responsable 
	        WHERE id = $userId";
	if ($connect->query($sql) === TRUE) {
    header('Location: ../menu.php?v=USER');
		}
}
?>