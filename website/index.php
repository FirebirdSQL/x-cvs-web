<?PHP
$rootDir="./";

include_once('tf.conf.php');
require_once("mainfile.php"); 
# first we load file, which contains all txtForum functions
require_once('tf.func.php');
# now we start counting xpage generation time
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


$userid = "";

include_once("header.php");

# login/logout
if (IsSet($action)){
	$settings = get_settings();
	switch ($action)
	{
		case 'add_user':
			add_user();
			die("");
		break;

		case 'login':
			do_login($f['user'],$f['pass'],$f['remember_me']);
			die("");
		break;

		case 'logout':
			do_logout();
			die("");
		break;
	}
}

include_once("topmenu.php");

if (!IsSet($nosb)) 
include_once("sidemenu.php");

$xpage = "" ;

# Construct URL for requested xpage

# A hack to handle TXT forum that also use ID...
if (IsSet($action) && !IsSet($op)) 
 $xpage = "tf.actions.php" ;
else
  if(!IsSet($id)) 
   $xpage = "main.php" ;
  else
   $xpage = "page_".$id.".php" ;
  if(IsSet($sub)) 
   $xpage = $sub."/".$xpage ;
  if(IsSet($op)) 
   $xpage = $op."/".$xpage ;


# If xpage exists, show it, otherwise report an error

if (file_exists("$xpage")) {
  echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=3 bgcolor=\"$bgcolor3\"><tr><td>\n";

  include("$xpage");
  echo "</td></tr></table>";
} 
else {
  echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=3 bgcolor=\"$bgcolor3\"><tr><td>\n";
  echo "<H4>Error</H4>
  We are very sorry, but the requested page was not found at the server.
  Please, inform the <A href=mailto:pcisar@users.sourceforge.net>webmaster</A> about this problem.
  ";
  echo "</td></tr></table>";
}

include_once("footer.php");

?>