<?php
if (eregi("sidemenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<table border="0" width="100%" cellspacing="0"><tr><td valign="top">
<?PHP

  # permanent sidebar

  $title = "User Login";
  $content = tpl_get_login_form();
  sidebox($title,$content);

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
  If you're new to the Firebird, you may find the 
  <A href=\"index.php?op=guide\">Novice's Guide</A> a quite helpful ! 
  <p>
  <A href=\"index.php?op=guide\">Novice's Guide</A> provide you with basic
  information about Firebird project, and about Firebird relational database 
  engine (including it's predecessor - InterBase).
  <p>
  Additionally, you may check our <A href=\"index.php?op=faq\">FAQ</A>, <A href=\"index.php?op=history\">history</A> records and...
  <p class=centre>
  <A HREF=\"/pdfmanual/Firebird-1.5-QuickStart.pdf\"><IMG SRC=\"images/NF4_7.gif\" ALT=\"Firebird Quickstart Guide\" BORDER=\"0\"></A>
  </p>
  A collection of tips for the Firebird \"newbie\" to help you get underway with your newly-downloaded Firebird kit.
  <br>";
  sidebox($title,$content);

  $title = "Users";
  $content = "
  If you're looking for help with your problems, please visit our 
  <A href=\"index.php?op=faq\">FAQ</A> and check our <A href=\"index.php?op=devel&id=bugdb\">Bug database</A> first,
  as it's possible that you may find answers there.
  <p>
  Additionally, you can find help in various <A href=\"index.php?op=lists\">Lists and Newsgroups</A>.
  <p>
  Looking for <A href=\"index.php?op=doc\">documentation</A> ? Don't miss our collection
  of <A href=\"index.php?op=useful\">really useful</A> articles, tips and tricks !
  <br>";
  sidebox($title,$content);

  $title = "Developers";
  $content = "
  Do you want to keep up with Firebird's development ? Or even better, do you
  want to join or support our efforts ? Check out the <A href=\"index.php?op=devel\">Developer's corner</A> !
  <br>";
  sidebox($title,$content);

  $alice = GetRabbitSafeEMailLink("firebirds","contact us");
  $title = "Feedback";
  $content = "
  Comments ? Suggestions ? Questions ? Feel free to ".$alice." !
  <p class=\"centre\">
  <a href=\"http://www.opensource.org/docs/definition.php\"><img src=\"http://www.opensource.org/trademarks/opensource/web/opensource-75x65.png\" alt=\"Open Source Logo\" border=\"0\" width=\"75\" height=\"65\"></a>
  </p>
  <br>";
  sidebox($title,$content);
  
  
}

?>

</td><td width="100%" valign="top">

