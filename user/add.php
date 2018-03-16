<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, nom, salle, etage, batiment FROM departement";
$results = $connect->query($sql);

?> 

<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Ajouter Personnel</td>
   </tr>
  <tr>
    <td class="label" >Email</td>
    <td class="content"><input name="txtEmail" type="text" id="txtEmail" value="" size="25" maxlength="35" required/></td>
  </tr>
  <tr>
    <td class="label" >Nom </td>
    <td class="content"><input name="txtFname" type="text" id="txtFname" value="" size="25" maxlength="20" required/></td>
  </tr>
  <tr>
    <td class="label" >Prénom </td>
    <td class="content"><input name="txtLname" type="text" id="txtLname" value="" size="25" maxlength="20" required/></td>
  </tr>
  <tr>
    <td class="label" >Travaille à</td>
    <td class="content">
	<select name="did" >
	<?php
while($row = $results->fetch_assoc())  {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo $nom." (".$salle. ", ".$etage." )"; ?></option>
	<?php
	}
	?>
	</select>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit"   class="button" id="btnAddUser" value="Ajouter" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Annuler" onClick="window.location.href='<?php echo WEB_ROOT;?>menu.php?v=USER';" class="box">  
 </p>
</form>
</div>