<?php 

	#
	# txtForum 0.7.1 by Lauri Kasvandik
	#

	# first we load file, which contains all txtForum functions
	require_once('tf.func.php');

	# now we start counting page generation time
	$time_start = getmicrotime();

	# here we check that current user lang file exists, if not we 
	# use board default language file. if there arent default
	# language file too we resign...
	if (!file_exists(get_langfile_path()))
	{
		die('<h1>error: Unable to load LANGUAGE FILE "'.get_langfile_path().'"</h1>');
	}
	# now we include current user or board default language
	include_once(get_langfile_path());
?>
<html>
<head>
<title>txtForum</title>
<meta http-equiv="content-type" content="text/html; charset=<?php 

# here we print current langfile encoding
# if this isnt correct, u can change it from /tf.lang/??.php,
# where ?? is your lang code (english->en etc)

print $l['ENCODING'];

?>" />
<meta name="author" content="Lauri Kasvandik" />
<meta name="generator" content="txtForum 0.7.1" />
<link rel="stylesheet" href="<?php

# if there are user logged in we get him/her personal template css-file
# else we use current board one. css file should be in template dir
# with same name as template (default/default.css) or with name "style.css"

print get_css_path();
?>" type="text/css" />
<script language="JavaScript" type="text/javascript" src="<?php
	# here we load javascript. javascript should be in template dir with name tf.js
	print get_template_path().'tf.js';
?>"></script>
<?php
if (get_favicon_path() != false)
{
	print '<link rel="shortcut icon" href="'.get_favicon_path().'" />'."\n";
}
?>
</head>

<body>
<!-- of course, you may add here menus, pictures and text too -->

<!-- forum begins here -->
<?php require('tf.actions.php'); ?>
<!-- and here is end -->

</body>
</html>