<?php
error_reporting(0);
echo '
<style>
body {
	color: white;
	}
</style>';
echo '<body bgcolor="black"><div align=center style="margin: 40px"><font color=white size=5 face="comic sans ms">';
if($_SERVER['HTTP_REFERER'] !='')
{
echo 
'Hello user, your REFERER URL is -> '.urldecode($_SERVER['HTTP_REFERER']);
}
else 
{
	
	echo "no referer :)";
}
?>
