<?PHP
$rootDir="./";
require_once("mainfile.php");
$userid = "";

include_once("header.php");

?>


<body bgcolor="#FFFFFF">

<tr>
<td>
<?PHP
	include_once("topmenu.php");
?>
</td>
</tr>

<tr>
<td>

<table border=0 width=100% cellspacing=5><tr><td valign=top>
<tbody>
<tr>

<td>
<?PHP

        if (!IsSet($nosb))
        include_once("sidemenu.php");

?>
</td>

<td width=100% valign=top>

<?PHP

        $page = "" ;

        # Construct URL for requested page

        if(!IsSet($id))
              $page = "main.php" ;
              #  $page = "index.html" ;

        elseif (strpos($id,"/"))
        	$page=$id;
	else
        	$page = "page_".$id.".php" ;

        if(IsSet($sub))
        $page = $sub."/".$page ;
        if(IsSet($op))
        $page = $op."/".$page ;

        # If page exists, show it, otherwise report an error

        if (file_exists("$page")) {
        echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=3 bgcolor=\"$bgcolor3\"><tr><td>\n";

        include("$page");
        }
        else {
        echo "<table width=\"100%\" border=0 cellspacing=1 cellpadding=3 bgcolor=\"$bgcolor3\"><tr><td>\n";
        echo "<H4>Error</H4>
        We are very sorry, but the requested page was not found at the server.
        Please, inform the <A href=mailto:pcisar@users.sourceforge.net>webmaster</A> about this problem.
        ";
        }

?>
</td>
</tr>
</tbody>
</table>

</td>
</tr>


<tr>
</td></tr></tbody></table>

<?PHP

        include_once("footer.php");

?>

</body>
</html>
