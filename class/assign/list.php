<script type="text/javascript"> 
function deleteAssignment(id,code,hid)
    {
        if (confirm('Supprimer ce tuple?')) {
            window.location.href = 'process.php?action=delete&id='+id+'&code='+code+'&hid='+hid ;
        }
    }</script><?php

if (!defined('WEB_ROOT')) {
  exit;
}
$hsql = "SELECT a.id, h.modele, c.cnom, c.ctype,  a.doa, a.doe, u.fname, u.lname, v.vname, v.thumb ,hu.code,h.id as hid
         FROM hardwares h, categorie c, affectation a, responsable u, vendeurs v,hard_unite hu
     WHERE h.id = a.type AND h.cid = c.cid AND a.uid = u.id AND h.vid = v.id AND a.entity = 1 and hu.hid=h.id and a.code=hu.code
     ORDER BY  a.doa desc";
    
$ssql = "SELECT a.id, s.sw_name, c.cnom, c.ctype, a.doa, a.doe, u.fname, u.lname, v.vname, v.thumb,s.id as sid
         FROM softwares s, categorie c, affectation a, responsable u, vendeurs v
     WHERE s.id = a.type AND s.cid = c.cid AND a.uid = u.id AND s.vid = v.id AND a.entity = 2
     ORDER BY  a.doa desc";
        
$result = $connect->query($hsql);
$results = $connect->query($ssql);
 include_once '../tabs.php'; 
?> 
<div class="prepend-1 span-17">
<div  id="tab1" class="tab_content">
<p>&nbsp;</p>
<strong>Liste des hardwares Affectés.</strong>
<br/><br/>
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Hardware</td>
   <td>Marque</td>
   <td>Code</td>
   <td>Categorie</td>
   <td>D.Assignement/D.Retour</td>
   <td>Affécté à</td>
   <td>Supprimer</td>
  </tr>
<?php
while($row = $result->fetch_assoc()) {
  extract($row);
  
  if ($i%2) {
    $class = 'row1';
  } else {
    $class = 'row2';
  }
  if($thumb) {$img = WEB_ROOT . "image/vendors/".$thumb;}
  else {$img = "images/no-image-small.png";} 
  $i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $modele; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
      <td align="center"><?php echo $code; ?></td>
   <td align="center"><?php echo $cnom.", ".$ctype; ?></td>
   <td align="center"><?php echo $doa." / ".$doe; ?></td>
   <td align="center"><?php echo $lname.", ".$fname; ?></td>

 <td align="center"><a  style="font-weight:normal;" href="javascript:deleteAssignment(<?php echo $id; ?>,<?php echo "'".$code."'"; ?>,<?php echo $hid; ?>);" >Delete</a></td>
</td>   
<?php
} // end while

?>
 </table>
 <p>&nbsp;</p>
</div>
<div  id="tab2" style="display: none;" class="tab_content">
<strong>Liste des Softwares affécté.</strong>
<br/><br/>

 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Hardware</td>
   <td>Marque</td>
   <td>Categorie</td>
   <td>D.O.A./D.O.E</td>
   <td>Affécté à</td>
   <td>Supprimer</td>
  </tr>
<?php
while($row = $results->fetch_assoc()) {
  extract($row);
  
  if ($i%2) {
    $class = 'row1';
  } else {
    $class = 'row2';
  }
  if($thumb) {$img = WEB_ROOT . "image/vendors/".$thumb;}
  else {$img = "images/no-image-small.png";} 
  $i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $sw_name; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $cnom.", ".$ctype; ?></td>
   <td align="center"><?php echo $doa." / ".$doe; ?></td>
   <td align="center"><?php echo $lname.", ".$fname; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteAssignment(<?php echo $id; ?>,<?php echo "'".$code."'"; ?>,<?php echo $hid; ?>);" >Delete</a></td>
  </tr>
<?php
} // end while

?>
</table>
</div>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Affecter Matériel au Personnel (+)" class="button" onClick="assignAsset()"></td>
  </tr>
 
 <p>&nbsp;</p>
</div>



