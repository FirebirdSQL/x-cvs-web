<?php
#
# txtForum version 0.7.1
#
#	here is defined all txtForum actions.
#
# CopyLeft (C) 2001-2003 Lauri Kasvandik, lauri_k@mail.ru
#
#	This program is free software; you can redistribute it and/or modify it under the
#	terms of the GNU General Public License as published by the Free Software Foundation;
#	either version 2 of the License, or (at your option) any later version.
#
#	This program is distributed in the hope that it will be useful, but WITHOUT ANY
#	WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
#	PARTICULAR PURPOSE. See the GNU General Public License for more details.
#
#	YOU MUST RETAIN COPYRIGHT NOTICE!
#
#	http://www.gnu.org/copyleft/
#
#

# if this file is not included by any other file then: yeah! yeah! die! die!
basename(__FILE__) == basename($PHP_SELF) ? die('tf.actions.php, contains actions definitions for <a href="http://zone.ee/txtforum/">txtForum</a>. <h2><a href="index.php">Local forum is here</a></h2>') : '';

include_once('tf.conf.php');
include_once('tf.func.php');
isset($time_start) == false ? $time_start = getmicrotime() : '';

# if register_globals=off we register them automagically!
#register_globals();

# get_langfile_path() seeks for language file from 3 places,
# if did not find any then: yeah! yeah! die! die! (death metal symphony in deep C)
$t['lang_file_path'] = get_langfile_path();
if (!file_exists($t['lang_file_path']))
{
	die('<h2>Unable to load LANGUAGE FILE "'.$t['lang_file_path'].'"</h2>');
}

require_once($t['lang_file_path']);


# if there arenot settings file yet (nobody yet visited board)
# then first visitor creates new settingsfile. if data dir havent
# permissions for writing then: yeah! yeah! die! die!
if (!file_exists(f_settings))
{
	if (create_settings_file()==false)
	{
		die($l['Error'].' : '.$l['Unable_write_file'] . '<br>' . $l['Chmod_datadir'] . '<p>' . $l['Rtfm']);
	}
}


$settings = get_settings();
$t['board_name']=stripslashes($settings[0]);
$t['template_path']=get_template_path();
$t['forum_version']=forum_version;
$t['login_bar'] = tpl_get_login_form();
$t['navigation_linkbar'] = get_linkbar();
$t['lang'] = get_lang($t['lang_file_path']);

# we show page header only for these actions:
$actions = array('forums','reg','profile','new','bb_code','topics','view','reply','viewprofile','loginpage','members','modify','admin');
# (not for savings etc)
if (isset($action)==false||in_array($action,$actions))
{
	print tpl_get_header();
}

if (online_users==true)
{
	who_is_online();
}

switch ($action)
{
	case 'reg':
		if (!file_exists(f_users)){ print $l['Create_admin']; }
		form_add_user();
	break;

	case 'add_user':
		add_user();
	break;

	case 'login':
		do_login($f['user'],$f['pass'],$f['remember_me']);
	break;

	case 'logout':
		do_logout();
	break;

	case 'profile':
		$tf = ${'tf'.get_cookid()};
	
		if ($user=='') {
			$user = $tf['user'];
		}
		$user = urldecode($user);

		form_modify_profile($user);
	break;

	case 'save_profile':
		$tf = ${'tf'.get_cookid()};
		$user = urldecode($user);
		if ((strtolower($user)==strtolower($tf['user']) && user_pass_match($tf['user'],$tf['pass'])) || admin_in()) {
			save_profile($user);
		}
		else {
			print $l['Not_for_your_eyes'];
		}
	break;

	case 'new':
		form_new_posting($fid);
	break;

	case 'bb_code':
		print bb_code_help();
	break;

	case 'send':
		save_new_posting($fid);
	break;

	case 'send_news':
		save_new_posting($fid,1);
	break;

	case 'topics':
		show_topics($fid);
	break;

	case 'news':
		show_news();
	break;

	case 'view_item':
		view_news_item($topic);
	break;

	case 'new_item':
		form_new_news_item($fid);
	break;

	case 'modify_item':
		form_modify_item($topic, $id);
	break;

	case 'savemodifyitem':
		save_modify_item($topic, $id);
	break;

	case 'view':
		view_topic($topic);
	break;

	case 'reply':
		form_reply($topic, '', $id);
	break;

	case 'send_reply':
		save_reply($topic,$id);
	break;

	case 'viewprofile':
		view_profile($user);
	break;

	case 'loginpage':
		login_page();
	break;

	case 'delete':
		delete_posting($topic, $id);
	break;

	case 'modify':
		form_modify($topic, $id);
	break;

	case 'savemodify':
		save_modify($topic, $id);
	break;

	case 'members':
		members_list();
	break;

	case 'forums':
		print_categories_list();
	break;

	# moderator and administrator stuff
	case 'mode':
		if (mode_in()||admin_in())
		{
			if ($censor==1)
			{
				if ($move==$l['Move'])
				{
					move_topics($f_check, $forums_list);
					break;
				}

				if ($delete==$l['Delete'])
				{
					delete_topics($f_check);
					break;
				}
			}

			if ($sticky==1)
			{
				set_sticky_flag($topic);
				break;
			}

			if ($deletetopics==1)
			{
				$a[$topic] = $topic;
				delete_topics($a);
				break;
			}

			if ($lock==1)
			{
				set_lock_flag($topic);
				break;
			}
		}
		else
		{
			print $l['Not_for_your_eyes'];
			break;
		}
	break;


	# only admin stuff...
	case 'admin':
		if (!admin_in())
		{
			print $l['Not_for_your_eyes'];
			break;
		}
		if ($new_cat==1)
		{
			form_add_cat();
			break;
		}
		if ($add_cat==1)
		{
			add_cat();
			break;
		}
		if (!file_exists(f_categories)||count(file(f_categories))==0)
		{
			goto_url($PHP_SELF.'?action=admin&new_cat=1');
			break;
		}
		if ($main_settings==1)
		{
			form_admin_main_settings();
			break;
		}
		if ($save_settings==1)
		{
			save_main_settings();
			break;
		}
		if ($cats==1)
		{
			form_admin_cats_settings();
			break;
		}
		if ($move_cat==1)
		{
			move_cat($oid,$dir);
			break;
		}
		if ($delete_cat==1)
		{
			delete_cat($cid);
			break;
		}
		if ($modify_cat==1)
		{
			form_admin_modify_cat($cid);
			break;
		}
		if ($save_cat_modify==1)
		{
			admin_save_cat_modify($cid);
			break;
		}
		if ($upgrade==1)
		{
			form_admin_upgrade();
			break;
		}
		if ($upgradenow==1)
		{
			upgrade();
			break;
		}
		if ($backup==1)
		{
			form_admin_backup();
			break;
		}
		if ($tar==1)
		{
			tar_data();
			break;
		}
		if ($untar==1)
		{
			if (isset($uncompress))
			{
				untar_data();
			}
			if (isset($delete))
			{
				delete_archive();
			}
			break;
		}
		if ($fixcats==1)
		{
			fix_categories_file();
			break;
		}
		if ($deluser==1)
		{
			delete_user($user);
			break;
		}
		if ($changegroup==1)
		{
			change_usergroup($f['username'], $f['usersgroups']);
			break;
		}
		form_admin_control_panel();
	break;

	default:
		# if there arent users file then we create new admin-user
		if (!file_exists(f_users))
		{
			goto_url($PHP_SELF.'?action=reg');
			die();
		}
		# if there arent categories file we made one
		if (count(@file(f_categories))==0 || file_exists(f_categories)==false)
		{
			goto_url($PHP_SELF.'?action=admin&new_cat=1');
			die();
		}

		# if there are only one category then we show
		# automatically postings from this category
		if (count(file(f_categories))==1)
		{
			show_topics(0);
		}
		# else categorries list
		else
		{
			print_categories_list();
		}

		if (online_users==true)
		{
			$t['online_users'] = get_online_users();
		}
}


$time_end = getmicrotime();
$t['generating_time'] = number_format($time_end - $time_start,3);

# and here we show footer, again, not for all pages but only for these which are in $actions array
if (isset($action)==false||in_array($action,$actions))
{
	print tpl_get_footer();
}


#
#   Feel free to send me water, bread and nonrepayable credit :-)
#
#	             ---->>> lauri_k@mail.ru <<<-----
#
#         I wrote miraculous scripts for next to nothing!
#
#                          - call me -

?>