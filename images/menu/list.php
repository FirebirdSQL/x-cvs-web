<?php
$handle=opendir('images/menu');
while ($file = readdir($handle)) {
	if ( (!ereg("[.]",$file)) ) {
		$languageslist .= "$file ";
	}
}
closedir($handle);
?>
