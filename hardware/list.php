       
        <div  id="tab1" class="tab_content">
        <p>Liste des Hardwares valables en stock</p>
    

 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Hardware</td>
   <td>Qty en Stock /Qty</td>
   <td>Prix Unité</td>
   <td>Vendeur</td>
   <td>Category</td>
   <td>Date_Achat</td>
   <td>Supprimer/Editer</td>
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
  else {$img = "image/no-image-small.png";} 
  $i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $modele; ?></td>
   <td align="center"><?php echo $avbl_qty." / ".$qty; ?></td>
   <td align="center"><?php echo $price." $"; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $ctype; ?></td>
   <td align="center"><?php echo $dop; ?></td>
   <td align="center"><a href="javascript:deleteHw(<?php echo $id; ?>);">Supprimer</a>/<a href="javascript:editHardware(<?php echo $id; ?>);">Editer</a></td>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddHardware" type="button" id="btnAddHardware" value="Ajouter Hardware (+)" class="button" onClick="addHardware()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>


    
        </div>