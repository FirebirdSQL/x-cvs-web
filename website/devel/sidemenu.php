<?php
if (eregi("sidemenuphp",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

  if (!IsSet($sub)) {
    $title = "Developer's Corner";
    $content = "
    This is not a support area for Firebird users !
    If you're looking for support, please refer to <A href=index.php?op=lists#fbsupport>FB-Support</A> mailing list / newgroup.
    <p>
    If you'd like <b>report a bug</b> or see what bugs are known, fixed or open, or if
    you want to <b>submit a feature request</b>, please refer to our 
    <A href=\"http://tracker.firebirdsql.org\">Bug Database</A>.
    <br>";

    sidebox($title,$content,1);
  }
  else {

  # Read project description
  
    include ($op."/".$sub."/project.dat") ;
  
  # Subproject Specific Sidekick
  
    $title = $project_title;
    if (file_exists($op."/".$sub."/sidemenu.php")) 
      include($op."/".$sub."/sidemenu.php") ;

  # Leaders

    $title = "Sub-Project details" ;
    $content = "<b>Leaders:</b><br>" ;
    $leaders = explode(":",$leaders) ;
    foreach ($leaders as $leader) {
      if ($leader == "") $leader = "firebirds" ;
        $content .= "<li>".GetRabbitInfoLink($leader)."<br>" ;
    }
  # Members
  
    $filelist = GetFileList("rabbits","R","^.*\.dat") ;
    if ($filelist) {
      $content .= "<p><b>Members:</b><br>" ;
  
      asort($filelist);
      foreach ($filelist as $file) 
        if (IsRabbitInProject ($file,$sub))
          $content .= "<li>".GetRabbitInfoLink($file)."<br>" ;
    }
  
  # Mailing lists
  
    $content .= "<p><b>Mail traffic:</b><br>" ;
    $lists = explode(":",$lists) ;
    foreach ($lists as $list) {
      if ($list == "") {
        $content .= "<li>Direct e-mails" ;
      }
      else {
        include ("lists/data/".$list.".dat") ;
        $content .= "<li><A href=\"index.php?op=lists#$list_id\">$list_name</A><br>" ;
      }
    }

  # SVN Repositories
  # Added by Jiri Cincura (jiri@cincura.net) [21.05.2008]

    if (!empty($svn_repositories))
    {
      $content .= '<p><b>SVN repositories:</b><br>';
      $repos = explode(':', $svn_repositories);
      foreach ($repos as $repo)
      {
        $content .= sprintf('<li><a href="http://firebird.svn.sourceforge.net/svnroot/firebird/%1$s/">%1$s</a><br>', $repo);
      }
    }
  
  # CVS Modules
    if (!empty($cvs_modules))
    { 
      $content .= "<p><b>CVS Modules:</b><br>" ;
      $modules = explode(":",$cvs_modules) ;
      foreach ($modules as $module) {
        $content .= "<li><A href=\"http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/$module\">$module</A><br>" ;
      }
    }
  
    sidebox($title,$content,$isempty);

  }

  $dirlist = GetDirectoryList($op) ;
  if ($dirlist) {
    $title = "Firebird Sub-projects";
    $content = "" ;
    asort($dirlist);
    foreach ($dirlist as $dir) {
      if (file_exists($op."/".$dir."/project.dat")) {
        include ($op."/".$dir."/project.dat");
        $content .= "<li><A href=index.php?op=devel&amp;sub=$dir>$project_title</A>" ;
      }
    }
    $content .= "<br>" ;
  }
  
  sidebox($title,$content,2);

?>
