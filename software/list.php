
        <div style="display: none;" id="tab2" class="tab_content">
      <p>Liste des Licences valables en stock</p>
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Software</td>
   <td>Prix</td>
   <td>Vendeur</td>
   <td>Categorie</td>
   <td>DOP/DOE</td>
   <td>Supprimer/Editer</td>
  </tr>
<?php
while($row = $results1->fetch_assoc()) {
  extract($row);
  
  if ($i%2) {
    $class = 'row1';
  } else {
    $class = 'row2';
  }
  if($thumb) {$img = WEB_ROOT . "image/vendors/".$thumb;}
  else {$img = "image/no-image-small.png";} 
  $i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $sw_name; ?></td>
   <td align="center"><?php echo $price." $"; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $cname.", ".$ctype; ?></td>
   <td align="center"><?php echo $dop." / ".$exp_date; ?></td>
   <td align="center"><a href="javascript:deleteSw(<?php echo $id; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddSoftware" type="button" id="btnAddSoftware" value="Ajouter Software (+)" class="button" onClick="addSoftware()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
  
    </div>