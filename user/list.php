<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT u.id, u.email, u.fname, u.lname, d.nom AS dname
        FROM responsable u,
		departement d
		WHERE  u.did = d.id
		ORDER BY u.fname";
$results = $connect->query($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">Gestion des personels</h2>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>E-mail</td>
   <td>Nom complet</td>
   <td>Département</td>
   <td>Supprimer&nbsp;/&nbsp;Editer</td>
  </tr>
<?php
$i=0;
while($row = $results->fetch_assoc()) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td align="center"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
   <td align="center"><?php echo ucfirst($fname.", ".$lname); ?></td>
   <td align="center"><?php echo $dname; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteUser(<?php echo $id; ?>);">Supprimer</a>/<a  style="font-weight:normal;" href="javascript:editUser(<?php echo $id; ?>);">Editer</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Ajouter Personnel"  class="button" onClick="addUser()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>