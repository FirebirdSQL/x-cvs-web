<?php
	# popup window functions for txtForum 0.7.1

	include('tf.func.php');
	include_once(get_langfile_path());
	
	$style = '<style>body {margin:1cm}</style>';
	$css_path = get_css_path();

	switch ($action)
	{
		case 'avatars': 
			$title = 'txtForum : '.$l['Choose_avatar'];
			$contents = tpl_get_avatarpage($myavatar);
		break;

		case 'bbhelp':
			$title = 'txtForum : '.$l['Bb_code'];
			$contents = bb_code_help();
		break;
	}

	print parse_tpl(get_template(get_template_path().'popup_window.htm'));
?>