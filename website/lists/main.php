<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}

function EmitList($descfile) {
global $textcolor1, $textcolor2, $bgcolor1;
    $list_id = "" ;
    $list_name = "" ;
    $list_address = "" ;
    $list_purpose = "" ;
    $list_subscribe = "" ;
    $list_comment = "" ;
    $list_archive = "" ;
    $list_unsubscribe = "" ;
    include ($descfile);
    echo "
<tr>
<td bgcolor=\"skyblue\" width=\"34%\"><a name=\"$list_id\"></A><b>List</b></td>
<td bgcolor=\"skyblue\" width=\"33%\"><b>Purpose</b></td>
<td bgcolor=\"skyblue\" width=\"33%\"><b>Subscribe</b></td></tr>
<tr>
<td width=\"34%\"><font color=\"indianred\"><b>$list_address</b></td>
<td width=\"33%\">$list_purpose</td>
<td width=\"33%\">$list_subscribe</td></tr>
<tr>
<td colspan=3>$list_comment
</td></tr>
<tr>
<td bgcolor=\"gainsboro\" align=right><b>ARCHIVES</b></td>
<td colspan=2 align=left>$list_archive</td></tr>
<tr><td bgcolor=\"gainsboro\" align=right><b>UNSUBSCRIBE</b></td>
<td colspan=2 bgcolor=\"$bgcolor1\" align=left>$list_unsubscribe</td></tr>
<tr><td colspan=3><hr size=1></td><tr>
";

}

function EmitNewsgroups($descfile) {
    $ng_id = "" ;
    $ng_name = "";
    $ng_address = "" ;
    $ng_description = "" ;
    include ($descfile);
    echo "
<tr>
<td bgcolor=\"gold\" width=\"34%\"><a name=\"#$ng_id\"></A><b>Server</b></td>
<td bgcolor=\"gold\" width=\"33%\"><b>Description</b></td>
<td bgcolor=\"gold\" width=\"33%\"><b>URL</b></td></tr>
<tr>
<td width=\"34%\"><font color=\"indianred\"><b>$ng_name</b></td>
<td width=\"33%\">$ng_description</td>
<td width=\"33%\">$ng_address</td></tr>
<tr><td colspan=3><hr size=1></td><tr>
";

}

?>

<H4>Usage Guidelines</H4>
<A href="#top"></A>
<!-- THIS TABLE CONTAINS THE PAGE CONTENT -->
<tr><td colspan=3>
<b>Many of these forums are NOT for support.  Please refer to <a href="#ibsupport
">firebird-support</a> for support.</b>
<p>
We don't moderate the lists prescriptively but we do operate on a rule of &quot;three strikes and you're out&quot;.  Reasonable &quot;flak&quot; is acceptable but NO FLAMING, monopolisation or excessive requoting.  Please move specialised or off-topic threads into suggested other lists when requested by a moderator.
<p>
Many mailing lists listed here has a newsgroup mirror at <a href="#ng-atkin">Atkin server</a>, so you do not need to subscribe to high-traffic lists just to occasionally watch discussed topics. But if you want post messages to a newsgroup of mirrored mailing lists, you must be subsribed to this list (even with no-mail/web access only option), otherwise your messages doesn't pass through news/mail gate and mailing list users don't get it.
<hr size=1>
</td></tr>

<!-- ------------------------------------------------------------------- -->
<?php

# Support lists

$filelist = GetFileList($op."/data","R","^sup-.*\.dat") ;
if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=\"darkblue\"><font size=\"+1\" color=\"FFFFFF\"><b>Support Lists</a></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Firebird lists

$filelist = GetFileList($op."/data","R","^fb-.*\.dat") ;

if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=\"darkblue\"><font size=\"+1\" color=\"FFFFFF\"><b>Firebird Project Lists</a></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Other lists

$filelist = GetFileList($op."/data","R","^gen-.*\.dat") ;
if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=\"darkblue\"><font size=\"+1\" color=\"FFFFFF\"><b>Other Firebird/InterBase related Lists</a></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Newsgroup servers

$filelist = GetFileList($op."/data","R","^ng-.*\.dat") ;
if ($filelist) {
  asort($filelist);
  echo "<tr><td colspan=3 bgcolor=\"darkblue\"><font size=\"+1\" color=\"FFFFFF\"><b>Newsgroup Servers</a></td></tr>";
  foreach ($filelist as $file) 
    EmitNewsgroups($op."/data/".$file);
}

?>

<!-- ------------------------------------------------------------------- -->
<tr><td colspan=3><a href="#top">BACK TO TOP OF PAGE</A></td><tr>

<!-- END OF PAGE CONTENT -->
