<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT * FROM departement ORDER BY nom";
$results = $connect->query($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">Gestion des départements</h2>

<form action="processLab.php?action=add" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Département </td>
   <td>Salle</td>
   <td>Etage</td>
   <td>Batiment</td>
   <td>Supprimer&nbsp;/&nbsp;Editer</td>
  </tr>
<?php
while($row = $results->fetch_assoc())  {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $nom; ?></td>
   <td align="center"><?php echo $salle; ?></td>
   <td align="center"><?php echo $etage; ?></td>
   <td align="center"><?php echo $batiment; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteLab(<?php echo $id; ?>);">Supprimer</a>&nbsp;/&nbsp;<a  style="font-weight:normal;" href="javascript:editLab(<?php echo $id; ?>);">Editer</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Ajouter Département"  class="button" onClick="addLab()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>