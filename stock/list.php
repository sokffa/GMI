<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT h.id, h.modele,h.avbl_qty ,h.qty, h.dop,  v.vname as vname, v.thumb AS thumb, c.cnom AS cname, c.ctype AS ctype, h.price
        FROM hardwares h, categorie c, vendeurs v
		WHERE h.vid = v.id AND h.cid = c.cid AND avbl_qty>0 
		ORDER BY modele";
$results = $connect->query($sql);

$sql1 = "SELECT s.id, s.sw_name, s.dop, s.exp_date, v.vname as vname, v.thumb AS thumb, c.cnom AS cname, c.ctype AS ctype, s.price
        FROM softwares s, categorie c, vendeurs v
		WHERE s.vid = v.id AND s.cid = c.cid
		ORDER BY sw_name";
$results1 = $connect->query($sql1);

?> 
<p>&nbsp;</p>
<?php include_once 'tabs.php'; ?>
