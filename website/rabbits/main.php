<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<?php

if (IsSet($info) && file_exists($op."/".$info.".dat")) {

# Show Rabbit Info Page

  $title = "" ; $login = "" ; $sfuid = "" ; $name = "" ; $email = "" ;
  $function = "" ; $subprojects = ""; $mainpage = "" ;  

  include ($op."/".$info.".dat") ;
  if ($email == "") $email = $login."@users.sourceforge.net" ;
  if ($function == "") $function = "Unassigned" ;
  if ($mainpage == "") $mainpage = "NONE" ;

  $projectlinks = "" ;
  $projects = explode(":",$subprojects);
  foreach ($projects as $project) {
    if (file_exists("devel/".$project."/project.dat")) {
      $project_title = "" ;
      include ("devel/".$project."/project.dat") ;
      $projectlinks .= "<A href=\"index.php?op=devel&amp;sub=$project\">$project_title</A><br>" ;
    }
  }
  if ($projectlinks == "") $projectlinks = "Unspecified" ;

  echo "<H4>$name</H4>" ;
  echo "<table border=0 width=100% cellspacing=0 cellpadding=5>
        <tr><td width=120 align=right bgcolor=\"paleturquoise\">Callsign:</td><td>$login</td></tr>
        <tr><td width=120 align=right>E-Mail:</td><td><A href=\"http://sourceforge.net/sendmessage.php?touser=$sfuid\">$login at users.sourceforge.net</A></td></tr>
        <tr><td width=120 align=right bgcolor=\"paleturquoise\">Function:</td><td>$function</td></tr>
        <tr><td width=120 align=right>Personal page:</td><td>$mainpage</td></tr>
        <tr><td width=120 align=right bgcolor=\"paleturquoise\">Other Links:</td>
          <td>
            <li><A href=\"http://sourceforge.net/users/$login/\">SourceForge Personal Page</A>
            <li><A href=\"http://sourceforge.net/people/viewprofile.php?user_id=$sfuid\">Skills Profile</A>
            <li><A href=\"http://sourceforge.net/developer/diary.php?diary_user=$sfuid\">Diary &amp; Notes</A>
          </td></tr>
        <tr><td width=120 align=right>Subproject(s):</td><td>$projectlinks</td></tr>
        </table>";

}
else {

# Awards

#  echo "<H4>Rabbits Honour Board</H4>" ;
#  echo "<p>" ;

# CVS commit statistics

  echo "<H4>Rabbits at Work</H4>" ;
  $projects = GetDirectoryList("devel") ;
  foreach ($projects as $project) {
    if (file_exists("devel/".$project."/project.dat")) {
      $project_title = "" ; $cvs_modules = "" ;
      include ("devel/".$project."/project.dat") ;
      echo "<H5>$project_title</H5>" ;
      $cvs_modules = explode(":",$cvs_modules) ;
      foreach ($cvs_modules as $cvs_module) {
        if (file_exists("rabbits/".$cvs_module.".stat")) {
          $stat_change = date ("dS, F Y h:i", filemtime("rabbits/".$cvs_module.".stat")) ;
          echo "<table border=0 width=100% cellspacing=0 cellpadding=0>
          <tr><td colspan=2>Commits to module <B>$cvs_module</B> ($stat_change)</td></tr>
          <tr bgColor=\"#000000\"><td colspan=2><img alt height=\"2\" src=\"images/1x1.gif\" width=\"1\"></td></tr>" ;

          $fcontents = file ("rabbits/".$cvs_module.".stat");
          $position = 1 ;
          foreach ($fcontents as $line) {
            $statline = explode("\t",rtrim(ltrim($line))) ;
            $userlink = GetRabbitInfoLink($statline[1]) ;
            echo "<tr><td width=%10>$position.</td><td width=%90>$userlink ($statline[0])</td></tr>" ;
            $position++ ;
          }

          echo "</table><p>" ;
        }
        else echo "<i>Commit statistic for module <B>$cvs_module</B> is not available</i><p>" ;
      }
    }    
  }

  echo "<p>" ;

# List of personal pages

  $dirlist = GetDirectoryList($op) ;
  if ($dirlist) {
    echo "<p>&nbsp;</p><H4>Personal Rabbit Dens</H4>" ;
    asort($dirlist);
    echo "<table border=0 cellspacing=0 cellpadding=8>";
    foreach ($dirlist as $dir) {
      if (file_exists($op."/".$dir.".dat")) {
        $name = "" ; $title = "" ; 
        $function = "" ; $mainpage = "" ;
        include ($op."/".$dir.".dat");
        if ($title == "") $title = "<b>".$name."</b> - ".$function ;
        if ($mainpage == "") {
          if (file_exists($op."/".$dir."/main.php")) { 
            $mainpage = "index.php?op=".$op."&amp;sub=".$dir ;
          } 
          else  $mainpage = $op."/".$dir."/" ; 
        } 
        echo "<tr><td><A href=\"$mainpage\">
        <img src=\"images/rabbithole.png\" alt=\"Down to rabbit hole\" border=0></A></td>
        <td valign=\"center\">" ;
        echo $title ;
      }
      echo "</td></tr>" ;
    }
    echo "</table><p>" ;
  } 
  else {
    echo "<b>We're very sorry, but there are no personal dens at this time.</b>" ;
  }

  $filelist = GetFileList($op,"R","^q.*\.dat") ;
  if ($filelist) {
    echo "<table border=0 cellspacing=0 cellpadding=0>";
    foreach ($filelist as $file) {
      $question = "" ; $answer = "" ;
      include ($op."/".$file);
      echo "<tr><td width=10><a href=\"#$file\"><img src=\"images/icon_go2.gif\" width=21 height=10 border=0></a></td><td>$question</td></tr>
      " ;
    }
    echo "</table><p>" ;
  }
}

?>