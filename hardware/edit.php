<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, salle, etage, batiment FROM departement";
$results = $connect->query($sql);

$vsql = "SELECT id, vname FROM vendeurs";
$vresults = $connect->query($vsql);

$csql = "SELECT cid as ccid, cnom, ctype FROM categorie WHERE cnom != 'Software'";
$cresults = $connect->query($csql);

$hid =(int)$_GET["id"];
$sql_h = "SELECT * FROM hardwares WHERE id = $hid";
$results_h = $connect->query($sql_h);
?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<?php
if($results_h->num_rows == 1){
while($d = $results_h->fetch_assoc())  {
  extract($d);
?>
<form action="processHardware.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Hardware </td><input type="hidden" name="hid" value="<?php echo $hid; ?>">
   </tr>
  <tr> 
   <td width="150" class="label">Hardware Name</td>
   <td class="content"> <input name="txtHname" type="text" id="txtHname" size="20" maxlength="20" value="<?php echo $modele; ?>" required></td>
  </tr>
  <tr> 
   <td width="150" class="label">Numero d'inventaire</td>
   <td class="content"> <input name="txtNumInventaire" type="text" id="txtNumInventaire" size="20" maxlength="20" value="<?php echo $numInventaire; ?>" required></td>
  </tr>
  <tr> 
   <td width="150" class="label">Quantité</td>
   <td class="content"> <input name="txtQty" type="text" id="txtQty" size="10" maxlength="10" onKeyUp="checkNumber(this);" value="<?php echo $qty; ?>" readonly> 
    </td>
  </tr>
    <tr> 
   <td width="150" class="label">Quantité en stock</td>
   <td class="content"> <input name="txtAvblQty" type="text" id="txtAvblQty" size="10" maxlength="10" value="<?php echo $avbl_qty; ?>" readonly> 
    </td>
  </tr>
  <tr>
    <td class="label">Vendeur </td>
    <td class="content">
	<select name="txtVname" id="txtVname" >

	<?php
while($row = $vresults->fetch_assoc())  {
		extract($row);
    if($id===$vid){
      ?>
    
    <option selected value="<?php echo $vid; ?>"> <?php echo $vname; ?></option>
    <?php
    continue;
  }
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
    <td class="content"><input name="txtDp" type="date" id="txtDp" size="20" maxlength="20" value="<?php echo $dop; ?>"/></td>
  </tr>
  <tr>
    <td class="label">Prix d'unité </td>
    <td class="content"><input name="txtPrice" type="text" id="txtPrice"  size="10" maxlength="20" onKeyUp="checkNumber(this); " value="<?php echo $price; ?>" />
    (Integer)</td>
  </tr>
  <tr>
    <td class="label">Categorie</td>
    <td class="content">
	<select name="txtCategory" id="txtCategory">
	<?php
while($row = $cresults->fetch_assoc()) {
		extract($row);
        if($ccid===$cid){
          ?>
          <option selected value="<?php echo $cid; ?>"><?php echo $ctype; ?></option>
          <?php
      continue;
    }
	?>
	<option value="<?php echo $ccid; ?>"><?php echo $ctype; ?></option>
	<?php
	}
	?>
    
	</select>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit"   class="button" id="btnEditHardware" value="Editer" >
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Annuler " onClick="window.location.href='javascript:history.back()';">  
 </p>
</form>
<?php 
}//while
}else {
?>
<p> Matériel non trouvé.</p>
<?php 
} 
?>
</div>