
<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$self = WEB_ROOT . 'index.php';
?>
<html>
<head>
<title>GMI-Acceuil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo WEB_ROOT;?>css/screen.css" rel="stylesheet" type="text/css">
<link href="<?php echo WEB_ROOT;?>css/menu.css" rel="stylesheet" type="text/css">

<!--<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>lib/lab.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>lib/software.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>lib/assignment.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo WEB_ROOT;?>lib/jquery.min.js" ></script>-->

<?php
$script[]='common.js';
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'lib/' . $script[$i]. '"></script>';

	}
}
?>
<style>
body{margin-top:10px; background-color:#EEEEEE;}
a {text-decoration:none;}
</style>
</head>
<body>
<div class="container" style="border: 1px solid #999999; margin-bottom:20px;width:1500px;">
<div class="span-24">
<img src="<?php echo WEB_ROOT; ?>image/Sanstitre.png" width="1500" height="200"/>
</div>

<div class="span-24" style="width:100%">
	<?php include_once("mymenu.php"); ?>
</div>
<div class="span-5 border" >
	<?php include_once("left.php"); ?>
</div>
<div class="span-19 last" style="margin-left: 16%">
<?php
require_once $content;	 
?>
</div>

</div>
</body>
</html>