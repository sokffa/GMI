<?php
require_once '../lib/config.php';
require_once '../lib/functions.php';
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
global $connect;
$sql = "SELECT id, nom as lnom, salle, etage, batiment FROM departement";
$results = $connect->query($sql);
$uid =(int)$_GET["id"];
$sql_u = "SELECT * FROM responsable WHERE id = $uid";
$results_u = $connect->query($sql_u);
//echo $sql_u;
?> 
<div class="prepend-1 span-12">
<p align="center"><strong><font color="#660000"><?php echo $errorMessage; ?></font></strong></p>
<?php
if($results_u->num_rows == 1){
while($d = $results_u->fetch_assoc())  {
  extract($d);
?>
<form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr align="center" id="listTableHeader">
      <td colspan="2">Editer Personnel</td><input type="hidden" name="id" value="<?php echo $uid; ?>">
    </tr>
    <tr>
      <td class="label">Email</td>
      <td class="content"><input name="txtEmail" type="text" id="txtEmail"  size="25" value="<?php echo $email; ?>" required/></td>
    </tr>
    <tr>
      <td class="label">Nom </td>
      <td class="content"><input name="txtFname" type="text" id="txtFname"  size="25" value="<?php echo $fname; ?>" required/></td>
    </tr>
    <tr>
      <td class="label">Prénom </td>
      <td class="content"><input name="txtLname" type="text" id="txtLname" value="<?php echo $lname; ?>" size="25" maxlength="20" required/></td>
    </tr>
    <tr>
      <td class="label">Travaille à</td>
      <td class="content"><select name="did" >
        <?php
while($row = $results->fetch_assoc())  {
		extract($row);
	?>
        <option value="<?php echo $id; ?>"><?php echo $lnom." (".$salle. ", ".$etage." )"; ?></option>
        <?php
	}
	?>
      </select>
      </td>
    </tr>
  </table>
  <p align="center">
    <input name="btnAddUser" type="submit"   class="button" id="btnAddUser" value="Editer" class="box">
    &nbsp;&nbsp;
    <input name="btnCancel" type="button" id="btnCancel" class="button"  value="Annuler" onClick="window.location.href='<?php echo WEB_ROOT;?>/menu.php?v=USER';" class="box">
  </p>
</form>
<?php 
}//while
}else {
?>
<p> Personnel non trouvé.</p>
<?php 
} 
?>
</div>