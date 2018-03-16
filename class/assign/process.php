<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		assignUser();
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
functaion is used to assign Hardware, software to user, lab.
if the given qualtity is greater then available quantity then it shows error message to user.
*/
function assignUser()
{
	global $connect;
    $entity = $_POST['entity'];
	$type = $_POST['typesel'];
	$code = $_POST['codesel'];
	$dop = $_POST['txtDp'];
	$dor = $_POST['txtDr'];
	$uid = $_POST['txtUid'];
	if(empty($dor))
		$dor='0000-00-00';
	if($entity == 1){
		
			//update avbl_qty
			$sql = "UPDATE hardwares 
					SET avbl_qty = avbl_qty - 1
					WHERE id = $type";
			$connect->query($sql);
			//update etat
			$sql = "UPDATE hard_unite 
					SET etat = 'Affecté'
					WHERE code = $code";
			$connect->query($sql);
			//
			$sql = "INSERT INTO affectation (entity, type, uid, doa, doe, bdate ,code)
					VALUES($entity, $type, $uid, '$dop', '$dor', NOW() ,'$code')";
			$connect->query($sql);
			header('Location: ../assign');				
		
	}else {
		//echo "SW";
		$sql = "INSERT INTO affectation (entity, type, uid, doa, doe, bdate)
					VALUES($entity, $type, $uid, '$dop', '$dor', NOW() )";
			$connect->query($sql);
		header('Location: ../assign');				
	}
	
}
function deleteUser(){
	global $connect;
	if (isset($_GET['id']) && (int)$_GET['id'] > 0 && isset($_GET['code']) && !empty($_GET['code'] )  && isset($_GET['hid']) && $_GET['hid'] > 0 ){
		$id = (int)$_GET['id'];
		$code = $_GET['code'];
		$hid = (int)$_GET['hid'];
	} else {
		header('Location: index.php');
	}
	
	
			$sql = "UPDATE hardwares 
					SET avbl_qty = avbl_qty + 1
					WHERE id = $hid";
			$connect->query($sql);
			//update etat
			$sql = "UPDATE hard_unite 
					SET etat = 'En stock'
					WHERE code = $code";
			$connect->query($sql);
			//
			$sql = "DELETE FROM affectation 
	        WHERE id = $id";
			$connect->query($sql) ;
		}
?>