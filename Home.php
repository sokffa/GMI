    <?php
    if (!defined('WEB_ROOT')) {
        exit;
    }
    $self = WEB_ROOT . 'index.php';
    ?>
<style>
.catBox {
    border:#094080 solid 1px;
    float:left;
    background-color:#D2E1E6;
    width:300px;
    margin-right:20px;
    margin-bottom:20px;
    margin-left:20px;
    padding-left:10px;
    padding-top:10px;
    border-radius:10px;
    border-radius:10px;
}

.catBox img.cImage {
    border:0px;
    float:left;
    padding:4px;
}
  a {
    font-size:14px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-weight:bold;
    color:#094080;
}

  a:hover {color:#FF9966;}
.catBox p {
    font-size:12px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    line-height:18px;
}
</style>

<div style="prepend-1 span-18 last">
<p>&nbsp;</p>
<p align="center" style="font-size:16px;font-weight:bold;">Bienvenue au Gestionnaire des Matériels Informatiques</p>
<p align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px;"></p>

<div class="span-18">
<a href="<?php echo WEB_ROOT; ?>menu.php?v=HRWR">
<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>image/hw.png"  class="cImage" />
Informations sur Hardware
</div>
</a>
<a href="<?php echo WEB_ROOT; ?>menu.php?v=SFWR">
<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>image/software.png"  height="43" width="39" class="cImage" />
Informations sur Software
</div>
</a>
</div>

<div class="span-18">

<a href="<?php echo WEB_ROOT; ?>menu.php?v=STCK">
<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>image/search.png" class="cImage" />
Matériels en Stock
</div>
</a>

<a href="<?php echo WEB_ROOT; ?>menu.php?v=USER">
<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>image/users.png" class="cImage" />
Liste des Matériels Affectés
</div>
</a>

</div>


</div>
<p>&nbsp;</p><p>&nbsp;</p>
