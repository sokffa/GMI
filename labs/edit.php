<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
$id = $_GET["id"];
$sql = "SELECT * FROM departement WHERE id = $id";
$results = $connect->query($sql);

?> 
<div class="prepend-1 span-12">
<?php
if($results->num_rows == 1){
while($row = $results->fetch_assoc()) {
extract($row);
?>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>labs/processLab.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Editer Département </td>
   </tr>
  <tr> 
   <td width="150" class="label">Département </td>
   <td class="content">
    <input type="hidden" name="lid" value="<?php echo $id; ?>" />
	<input name="txtLname" type="text" id="txtLname" size="25" value="<?php echo $nom; ?>" required></td>
  </tr>
  <tr> 
   <td width="150" class="label">Salle </td>
   <td class="content"> <input name="txtRoom" type="text" id="txtRoom"  size="25" value="<?php echo $salle; ?>" ></td>
  </tr>
  <tr>
    <td class="label">Etage</td>
    <td class="content"><input name="txtFloor" type="text" id="txtFloor" size="25"  value="<?php echo $etage; ?>" /></td>
  </tr>
  <tr>
    <td class="label">Batiment</td>
    <td class="content"><input name="txtBuilding" type="text" id="txtBuilding" size="30" value="<?php echo $batiment; ?>" ></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td class="content">&nbsp;</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit"   class="button" id="btnAddUser" value="Editer Département " class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Annuler" onClick="window.location.href='index.php';" class="box">  
 </p>

</form>
<?php
}
}
else {
?>
<p>Not Valid Lab Selected.</p>
<?php
}
?>
</div>