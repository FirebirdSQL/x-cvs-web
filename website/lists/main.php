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
  <td colspan=\"3\"><a name=\"$list_id\"></a></td>
<tr>
  <td valign=\"top\" width=\"34%\">
    <table width=\"100%\" border=1 cellpadding=5>
      <tr bgcolor=#d3fde2>
        <td valign=\"middle\"><small><b>$list_name</b></small></td>
      </tr>
    </table>
  </td>
  <td colspan=\"2\"><small>$list_purpose</small></td>
</tr>

<tr>
  <td colspan=3><small>$list_comment</small>
  </td>
</tr>
<tr>
  <td width=\"34%\"><small><b>ARCHIVES</b></small></td>
  <td width=\"33%\"><small><b>SUBSCRIBE</b></small></td>
  <td width=\"33%\"><small><b>UNSUBSCRIBE</b></small></td>
</tr>
<tr>
  <td valign=\"top\"><small>$list_archive</small></td>
  <td valign=\"top\"><small>$list_subscribe</small></td>
  <td valign=\"top\"><small>$list_unsubscribe</small></td>
</tr>

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
<td bgcolor=#bdecd0 width=\"25%\"><a name=\"#$ng_id\"></A><b>Server</b></td>
<td bgcolor=#bdecd0 width=\"35%\"><b>Description</b></td>
<td bgcolor=#bdecd0 width=\"40%\"><b>URL</b></td></tr>
<tr>
<td width=\"25%\"><font color=\"indianred\"><b>$ng_name</b></td>
<td width=\"35%\">$ng_description</td>
<td width=\"40%\">$ng_address</td></tr>
<tr><td colspan=3><hr size=1></td><tr>
";

}

?>
<!-- THIS TABLE CONTAINS THE PAGE CONTENT -->
<A href="#top"></A>
<table>
  <tr>
    <td colspan=3 valign="top">

<h4>Usage Guidelines for Our Lists</h4>

We don't moderate the lists prescriptively but we do operate on a rule of &quot;three strikes and you're out&quot;.  No whining, no flaming, monopolisation or excessive requoting.  It is considered polite to sign your messages and to use your own first name, not a nickname.  Users posting with offensive nicknames or email addresses are likely to be bumped off and banned.
<p>Please move specialised or off-topic threads into suggested other lists when requested by a moderator.
<p>Advertisements of any kind will result in immediate banning.</p>  
<hr size=1>
    </td>
  </tr>

  <tr>
    <td colspan="3">
      <table>
        <tr>
          <td width="15%">
            <table cellpadding=5 border=1>
              <tr bgcolor="papayawhip">
                <td class="centre">
<a href="http://www.catb.org/~esr/faqs/smart-questions.html" style="color:darkred;text-decoration:none;font-weight:bold;"> 
ASK SMART QUESTIONS!</A>
<p class="centre"><a href="http://www.catb.org/~esr/faqs/smart-questions.html" style="color:darkred;text-decoration:none;">PLEASE READ THIS ARTICLE BEFORE SUBSCRIBING TO ANY LIST</a></p>
                </td>
              </tr>
            </table  
          </td>
          <td>
<p>The people who help you in the lists are volunteers.  Please don't waste their time by not providing enough information.  As a minimum, provide:
<ul>
  <li>a smart Subject for your message.  &quot;Problem&quot; or &quot;Bug&quot; are not smart.
  <li>the version and model (Classic/Superserver/embedded) of the server you are using
  <li> the operating system the server is running on, including version
  <li> what language and data access interface you are using for your client application
</ul>
          </td>
        </tr> 
     </table>
   </td>
</tr>

<!-- ------------------------------------------------------------------- -->


<?php

# Support lists English

$filelist = GetFileList($op."/data","R","^sup-.*\.dat") ;
if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=#9fe3bb><font size=\"+1\" color=\"000000\"><b>Support Lists (English)</b></font></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Support lists non-English

$filelist = GetFileList($op."/data","R","^lng-.*\.dat") ;
if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=#9fe3bb><font size=\"+1\" color=\"000000\"><b>Support Lists (Non-English)</b></font></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Driver lists

$filelist = GetFileList($op."/data","R","^drv-.*\.dat") ;
if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=#9fe3bb><font size=\"+1\" color=\"000000\"><b>Driver Support Lists</b></font></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Firebird lists

$filelist = GetFileList($op."/data","R","^fb-.*\.dat") ;

if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=#9fe3bb><font size=\"+1\" color=\"000000\"><b>Firebird Project Lists</b></font></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Other lists

$filelist = GetFileList($op."/data","R","^gen-.*\.dat") ;
if ($filelist) {
  echo "<tr><td colspan=3 bgcolor=#9fe3bb><font size=\"+1\" color=\"000000\"><b>Other Firebird-Related Lists</b></font></td></tr>";
  foreach ($filelist as $file) 
    EmitList($op."/data/".$file);
}

# Newsgroup servers

$filelist = GetFileList($op."/data","R","^ng-.*\.dat") ;
if ($filelist) {
  asort($filelist);
  echo "<tr><td colspan=3 bgcolor=#9fe3bb><font size=\"+1\" color=\"000000\"><b>Newsgroup Servers</b></font></td></tr>";
  foreach ($filelist as $file) 
    EmitNewsgroups($op."/data/".$file);
}

?>

<!-- ------------------------------------------------------------------- -->
<tr><td colspan=3><a href="#top">BACK TO TOP OF PAGE</A></td><tr>

<!-- END OF PAGE CONTENT -->
</table>

