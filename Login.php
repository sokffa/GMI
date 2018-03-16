
<?php 

require_once 'lib/config.php';
	require_once 'lib/functions.php';
	$errorMessage="";
if(isset($_POST["btnLogin"]) ){
	$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
	$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	$query="select * from login where ndc='".$username."' and mdp='".$password."'";	
	$results = $connect->query($query);
	if ($results->num_rows > 0) {
		$row = $results->fetch_assoc();
        $_SESSION["statut"]=$row["statut"];  
    	header("location: index.php");
    	exit;
} else {
	$errorMessage="Username ou Mot de passe incorrect";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GMI - Login</title>
<link href="<?php echo WEB_ROOT;?>css/screen.css" rel="stylesheet" type="text/css">
<link href="<?php echo WEB_ROOT;?>css/menu.css" rel="stylesheet" type="text/css">


<style>
body{ margin-top:20px; background-color:#EEEEEE;}

</style>
</head>

<body>
<div class="container" style="border: 1px solid #999999;width:1500px;">

<div class="span-24">
<img src="<?php echo WEB_ROOT; ?>image/Sanstitre.png" width="1500" height="200"/>
</div>
<p align="center"><strong><font color="#660000"><?php echo $errorMessage; ?></font></strong></p>
<div class="span-6">&nbsp;</div>
<div class="span-12" style="margin:50px 0px;width:25%;margin-left: 500px;">
<table style="" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<img width="80px" src="image/test.png" />	</td>
    <td>
	<h2 style="font-size:18px;">Authentification</h2>
		<form style="float:left;" method="post" name="frmLogin" id="frmLogin">
         <strong>Nom d'utilisateur : </strong><input name="username" type="text" id="txtUserName"  size="10" maxlength="20"><br/>
         <strong>Password : </strong><input name="password" type="password"  id="txtPassword"  size="10"><br/>
         <br/>  <input name="btnLogin" type="submit" id="btnLogin" value="Login" class="button">

      </form>

	</td>
  </tr>
</table>

</div>  
</div>
</body>
</html>