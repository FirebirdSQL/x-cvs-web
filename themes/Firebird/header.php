<?php

?>
 
<body onload=init() background="images/fine_line_bg.gif" bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" topmargin=5 leftmargin=0 rightmargin=0 marginheight=5>
<?php
if ($banners) {
    include("banners.php");
}
?>
<table border="0" cellspacing="0" cellpadding="3" width="100%" bgcolor="FFFFFF">
<tr><td>

<a href="<?php echo $nuke_url; ?>"><img src="themes/Firebird/firebird_header.png" alt="<?php echo "".translate("Welcome to").""; ?> <?php echo $sitename; ?>" border=0></a>

</td><td align=right>
<form action="search.php" method=post>
<input type=text name=query width=20 size=15 length=20>
</td>
<td width=60 align=right><input type=image src=<?php echo "$uimages"; ?>/search.gif border=0 align=middle></td>
</form>
</td></tr></table>

<TABLE border=0 cellPadding=0 cellSpacing=0 width="100%" bgcolor=000000>
 <TR>
   <TD bgColor=#CE383D align=left valign=middle>
   <font color=FFFFFF><H2>&nbsp;&nbsp;&nbsp;<?php echo "$slogan"; ?></H2></font></TD>
 </TR>
</TABLE>
<table border=0 width=100% cellspacing=5><tr><td valign=top>

<?php
global $admin;

  mainblock();
  category();
  userblock();
  adminblock();
  leftblocks();
  online();

//echo "<img src=images/pix.gif border=0 width=150 height=1>";
echo "</td><td width=100% valign=top>";
 ?>

