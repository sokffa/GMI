<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>lib/jquery.min.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>lib/jquery.ui.core.js" language="javascript"></script>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$csql = "SELECT r.id, r.fname,r.lname ,d.nom 
		FROM responsable r, departement d
		WHERE r.did = d.id";
$cresults = $connect->query($csql);


?> 
<script language="javascript">
	function showType(id){
		$.get("assign/ajax.php",
			{id: id},
			function(data){
				$("div#type").html(data);
			},
			"html");
	}
	function showCode(){

		$.get("assign/ajax2.php",
			{id: document.getElementById("typesel").value},
			function(data){
				$("div#code").html(data);
			},
			"html");
	}
	function compare(){

		var d1 = txtDp.value;
		var d2 = txtDr.value;
		if (new Date(d1) > new Date(d2)) {alert('Date Invalide')}
			else $( "form:first" ).find('[type="submit"]').trigger('click');
			
	}

</script>
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="assign/process.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Assign Asset to Users </td>
   </tr>
  <tr> 
   <td width="150" class="label">Entity </td>
   <td class="content"> <select name="entity"  onchange="showType(this.value);"  required>
   	<option disabled selected value> -- Selectionner option -- </option>
		<option value="1">&nbsp;Hardware&nbsp;</option>
		<option value="2">&nbsp;Software&nbsp;</option>
	</select></td>
  </tr>
  <tr>
    <td class="label">Assignment Type </td>
    <td class="content">
	<div id="type" onchange="showCode();" ></div>
	</td>
  </tr>
  <tr>
    <td class="label">Code du matériel </td>
    <td class="content">
	<div id="code"></div>
	</td>
  </tr>
  <tr>
    <td class="label">Date of Assign </td>
    <td class="content"><input name="txtDp" type="Date" id="txtDp" value="" size="20" maxlength="20" required /></td>
  </tr>
  <tr>
    <td class="label">Date of Return </td>
    <td class="content"><input name="txtDr" type="date" id="txtDr" value="" size="20" maxlength="20"/></td>
  </tr>
  <tr>
    <td class="label">Assign to User/Lab </td>
    <td class="content">
	<select name="txtUid" id="txtUid" required>
	<?php
	while($row = $cresults->fetch_assoc()) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo ucfirst($fname). " , ".$lname; ?></option>
	<?php
	}
	?>
	</select>	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Assing (+)" onclick="compare();">
  <button type="submit" class="hide"></button>
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Cancel " onClick="window.location.href='javascript:history.back()';">  
 </p>
</form>
</div>