<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, salle, etage, batiment FROM departement";
$results = $connect->query($sql);

$vsql = "SELECT id, vname FROM vendeurs";
$vresults = $connect->query($vsql);

$csql = "SELECT cid, cnom, ctype FROM categorie WHERE cnom != 'Software'";
$cresults = $connect->query($csql);


?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="hardware/processHardware.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Hardware </td>
   </tr>
  <tr> 
   <td width="150" class="label">Modele </td>
   <td class="content"> <input name="txtHname" type="text" id="txtHname" size="20" maxlength="20" required></td>
  </tr>
   <tr> 
   <td width="150" class="label">Numero d'inventaire</td>
   <td class="content"> <input name="txtNumInventaire" type="text" id="txtNumInventaire" size="20" maxlength="20" required></td>
  </tr>
  <tr> 
   <td width="150" class="label">Quantité</td>
   <td class="content"> <input name="txtQty" type="text" id="txtQty" value="" size="10" maxlength="10" onKeyUp="checkNumber(this);" required> 
   (Integer) </td>
  </tr>
  <tr>
    <td class="label">Vendeur </td>
    <td class="content">
	<select name="txtVname" id="txtVname" >
	<?php
while($row = $vresults->fetch_assoc())  {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo $vname; ?></option>
	<?php
	}
	?>
	</select>
	
	</td>
  </tr>
  <tr>
    <td class="label">Date d'Achat </td>
    <td class="content"><input name="txtDp" type="date" id="txtDp" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Prix d'unité </td>
    <td class="content"><input name="txtPrice" type="text" id="txtPrice" value="" size="10" maxlength="20" onKeyUp="checkNumber(this);"/>
    (Integer)</td>
  </tr>
  <tr>
    <td class="label">Categorie</td>
    <td class="content">
	<select name="txtCategory" id="txtCategory">
	<?php
while($row = $cresults->fetch_assoc()) {
		extract($row);
	?>
	<option value="<?php echo $cid; ?>"><?php echo $cnom. " -> ".$ctype; ?></option>
	<?php
	}
	?>
	</select>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit"   class="button" id="btnAddUser" value="Ajouter Hardware (+)" ">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Annuler " onClick="window.location.href='javascript:history.back()';">  
 </p>
</form>
</div>