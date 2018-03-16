<!--<?php print_r($script);?>-->
<style>
ul.tabs {margin:0;padding:0;float:left;list-style: none;height: 50px;border-bottom: 1px solid #999;border-left: 1px solid #999;width: 102%;}
ul.tabs li {float: left;margin: 0px;padding: 0;height: 49px;line-height: 49px;border: 1px solid #CCCCCC;border-left: none;margin-bottom: -1px;background: #e0e0e0;overflow: hidden;position: relative;}
ul.tabs li a {	text-decoration: none;color:#000000;display: block;font-size: 1.2em;padding: 0 20px;font-size:12px;border: 1px solid #fff;outline: none;}
ul.tabs li a:hover {background-color:#0094DB;color:#FFFFFF;}	
html ul.tabs li.active, html ul.tabs li.active a:hover  {background: #fff;border-bottom: 1px solid #fff;color:#000000;}
.tab_container {border: 1px solid #FFFFFF;border-top: none;clear: both;float: left; background: #fff;}
.tab_content {padding: 5px;font-size: 1.0em;width:670px;}
.tab_content img {float: left;margin: 0 15px 5px 0;border: 1px solid #ddd;padding: 2px;}
.tab_content h2 {color:#0094DB;padding:5px;padding-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;	text-decoration:underline;}
.tab_content p {font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;padding:5px;color:#333333;padding-top:-5px;line-height:20px;}
.tab_content a {font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;padding-top:-5px;line-height:20px;}
</style>
<div class="prepend-1 span-17">
<div class="container1" id="fix">
	<ul class="tabs">
        <li class=""><a href="#" onclick='display("tab1","tab2");return false'><img src="<?php echo WEB_ROOT; ?>image/hw.png"  width="36" height="36" style="padding-top:5px; padding-right:5px;"/>Hardware Stocks</a></li>
        <li class=""><a href="#" onclick='display("tab2","tab1");return false'><img src="<?php echo WEB_ROOT; ?>image/software.png"  style="padding-top:5px; padding-right:5px;"/>Software Stocks</a></li>
    </ul>

</div>
<br/><br/><br/>
</div>