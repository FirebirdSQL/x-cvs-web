<?php

/*
Welcome to PHP-NUKE

This is the language module with "all" the system messages without any order.

If you made a translation, please sent to me (fburzi@ncc.org.ve) the translated
file and I'll include it in the next release.

To make a translation use the lang-TEMPLATE.php file.
English doesn't need to translate into English anymore (speed increase).
Thanks to Joel (jllawhead@sunherald.com) for this tip.
*/

function translate($phrase) {
    
    switch($phrase) {

	case "datestring":		$tmp = "%A, %B %d @ %T %Z"; break;
	case "linksdatestring":		$tmp = "%d-%b-%Y"; break;
	case "datestring2":		$tmp = "%A, %B %d"; break;
	case "datestring3":		$tmp = "%B %d"; break;
	default: 			$tmp = "$phrase"; break;
    
    }
    return $tmp;
}
?>
