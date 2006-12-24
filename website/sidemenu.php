<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<!-- START SIDEMENU CHUNK -->
<table border="0" width="100%" cellspacing="0"><tr><td valign="top">
<?PHP

  # permanent sidebar
if ($no_menu == 1) 
  $no_op = "";
else
  {
  # Place any sidebox that should appear on all pages here
  }
if (IsSet($op)) {

  # Sidebar for web section

  if (file_exists($op."/sidemenu.php")) {
    include($op."/sidemenu.php") ;
  }
  else {

    # Default sidebar

    $title = "Sidebar";
    $content = "
    This is a sample sidekick for this section. It's shown on each page that
    belongs to this site area. You can change it's content in sidemenu.php.
    <p>
    You can create different sidekicks for any second-level pages as well, but
    that require addition of nested 'if' or 'switch' structure for \$id parameter.
    <br>";
    sidebox($title,$content);
  }

}
else {

# Sidebar for main page
  $title = "New visitors";
  $content = "
<img src=\"images/clearpixel.gif\" width=\"15\">
<a href=\"index.php?op=guide#facts\">
<img src=\"images/fbg-facts.gif\" border=\"0\"></a>
<br><br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=guide\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">Novice's Guide</A>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">  
  <A href=\"index.php?op=faq\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">Frequently Asked Questions</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">  
  <A HREF=\"/pdfmanual/Firebird-2.0-QuickStart.pdf\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">Firebird 2.0 Quick Start Guide</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">  
  <A HREF=\"/pdfmanual/Firebird-1.5-QuickStart.pdf\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">Firebird 1.5 Quick Start Guide</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"http://www.yahoogroups.com/groups/firebird-support\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Firebird-support email list</a>
  <br>";
  sidebox($title,$content);

  $title = "Users";
  $content = "
  <img src=\"images/clearpixel.gif\" width=\"15\">
    <A href=\"index.php?op=doc\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">More
    Documentation</A>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
    <A href=\"index.php?op=lists\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">More Lists &amp; Newsgroups</A>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=useful\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">Tips &amp;
  Tricks</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A HREF=\"index.php?op=devel&id=bugdb\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Report a Bug</a>
  <br>";
  sidebox($title,$content);

  $title = "Downloads";
  $content = "
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=files\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Firebird Released kits </a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"download/prerelease\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Pre-release kits (testing)</a>
  <br>";
  sidebox($title,$content);
  
  $title = "Developers";
  $content = "

  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=devjournal\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
<img src=\"images/devjournal_logo.gif\" width=\"165\" border=\"0\">
</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=devel\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Developers' Corner</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"https://lists.sourceforge.net/lists/listinfo/firebird-devel\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Firebird-devel email list</a>
  <br><br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"http://tracker.firebirdsql.org\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
<img src=\"images/fbtracker.gif\" width=\"165\" border=\"0\">
</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"http://www.yahoogroups.com/groups/firebird-architect\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Firebird-Architect email list</a>
    <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <span style=\"font-size:8pt;\">
  No support questions <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  in these lists please!!</span>
  <br>";
  sidebox($title,$content);


  $title = "Community";
  $content = "
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=umbrella\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Under the Firebird Umbrella</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=newsportal\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  News Portal</a>
<br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"http://www.yahoogroups.com/groups/firebird-job-board\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Firebird Job Board</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=ffoundation&sub=connect\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  CONNECT!</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"index.php?op=ffoundation\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  The Firebird Foundation</a>
  <br>
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"http://www.ibphoenix.com\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  IBPhoenix Resource Site</a>
  <br>";
  sidebox($title,$content);

  $title = "Admin Tools";
  $content = "
    <img src=\"images/clearpixel.gif\" width=\"15\">
  <A href=\"http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_admin_tools\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
  Catalogue of Admin Tools</a>
  <br><center>. . . . . . . . . . . . . . . </center><br>
  <a href=\"http://www.flamerobin.org\">
<img src=\"images/flamerobin3.gif\" alt=\"FlameRobin Project\" width=\"139\" height=\"30\" border=0></a>
<a href=\"http://www.flamerobin.org\" style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">
is a project to build a cross-platform, lightweight GUI admin tool for Firebird completely</a>
<span style=\"text-decoration:none;color:#6a5acd;font-size:8pt;\">with open source components.
Alpha builds for Linux, Mac OS X and FreeBSD are available.</span>
  <br>";
  sidebox($title, $content);

  $alice = GetRabbitSafeEMailLink("firebirds","Contact us");
  $title = "Feedback";
  $content = "
  <img src=\"images/clearpixel.gif\" width=\"15\">
  <span style=\"color:#6a5acd;font-size:8pt;\">
  Comments ? Suggestions ? 
  <br><center>".$alice." !</center>
  <p class=\"centre\">
  <!-- a href=\"http://www.opensource.org/docs/definition.php\">
  <img src=\"images/opensource.gif\" alt=\"Open Source Logo\" border=\"0\" width=\"75\" height=\"65\"></a -->
  </p>
  <br>";
  sidebox($title,$content);
  
  
}

?>

</td><td width="100%" valign="top">

<!-- END SIDEMENU CHUNK -->
