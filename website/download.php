<?php


if (!isset($mainfile)) { include("mainfile.php"); }

function main() {
  global $PHP_SELF, $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2;
  include("header.php");
  include("topmenu.php");
  include("sidemenu.php");
  echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor3\"><tr><td>\n";
  echo "<H4>Download Files</H4>
  If you are looking for files available from this server, you have to go to our
  <A href=index.php?op=files>Download</A> area.
  ";
  echo "</td></tr></table>";
  include("footer.php");
}

function transferfile($id) {
  global $PHP_SELF, $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2;
  if (file_exists("downloads/$id")) {
    Header("Location: downloads/$id");
  } 
  else {
    include("header.php");
    include("topmenu.php");
    include("sidemenu.php");
    echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=8 bgcolor=\"$bgcolor3\"><tr><td>\n";
    echo "<H4>Error</H4>
    We are very sorry, but the requested file <b>$id</b> was not found at the server.
    Please, inform the <A href=mailto:pcisar@users.sourceforge.net>webmaster</A> about this problem.
    ";
    echo "</td></tr></table>";
    include("footer.php");
  }
}

switch($op) {

        case "main":
                main();
                break;

        case "file":
                transferfile($id);
                break;

        default:
                main();
                break;
}

?>
