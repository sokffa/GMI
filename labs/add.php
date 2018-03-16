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
<form action="labs/processLab.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Ajouter Département </td>
   </tr>
  <tr> 
   <td width="150" class="label">Département* </td>
   <td class="content"> <input name="txtLname" type="text" id="txtLname" size="25" maxlength="20" required></td>
  </tr>
  <tr> 
   <td width="150" class="label">Salle* </td>
   <td class="content"> <input name="txtRoom" type="text" id="txtRoom" value="" size="25" maxlength="40" required></td>
  </tr>
  <tr>
    <td class="label">Etage</td>
    <td class="content"><input name="txtFloor" type="text" id="txtFloor" value="" size="25" maxlength="40" /></td>
  </tr>
  <tr>
    <td class="label">Batiment </td>
    <td class="content"><input name="txtBuilding" type="text" id="txtBuilding" value="" size="30" maxlength="40" /></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td class="content">&nbsp;</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit"   class="button" id="btnAddUser" value="Ajouter Département (+)" " class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Annuler" onClick="window.location.href='javascript:history.back()';"> 
 </p>
</form>
</div>