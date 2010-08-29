<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>


<table background="images/top_banner6.gif" cellspacing=0 cellpadding=0 width="700">
  <tr>
    <td height="64" width="87"></td>

    <td height="64" width="215">
<img src="images/clearpixel.gif" width=215 height=20><br>
      <table style="background-color:transparent;">
        <tr>
          <td>

<a href="index.php?op=devel&sub=engine&id=fb213_release"
 style="font-size:24pt;font-weight:bold;color:darkslategray;text-decoration:none;">
v.2.1.3</a>

          </td>
        </tr>
      </table>
    </td>  
<!-- img src="images/latest-v211.gif" width=140 height=61 border=0 -->

    <td height="64" width="216">
<img src="images/clearpixel.gif" width=216 height=24><br>
      <table style="background-color:transparent;">
        <tr>
          <td class="right"  valign="bottom">
<a href="index.php?op=events" 
 style="font-size:8pt;font-weight:bold;color:darkslategray;text-decoration:none;">
<!-- Firebird Day in Paris<br>1 October, France -->
Firebird/InterBase Conf.<br>29 Sept., Moscow</a>

          </td>
        </tr>
      </table>
    </td>  

    <td height="64">
<img src="images/clearpixel.gif" width=182 height=28><br>
      <table style="background-color:transparent;">
        <tr>
          <td class="right"  valign="bottom">
<a href="index.php?op=devel&sub=engine&id=roadmap&nosb=1"
 style="font-size:10pt;font-weight:bold;color:darkslategray;text-decoration:none;">
from February 2010</a>
          </td>
        </tr>
      </table>
    </td> 

  </tr>
</table>
    
<table cellpadding=4>
  <tr><td colspan="2"><hr size=1></td></tr>
  <tr>
    <td width=166 valign="top">
<a href="http://tracker.firebirdsql.org">
<img src="images/fbtracker.gif" width="166" height="45" border="0" alt="Firebird Tracker"></a>
    </td>
    <td>
<p>Did you know that you can report bugs directly to the Project developers?<br>
<small>There is a common-sense procedure to follow, so that your report is useful to us:  we do ask that you read the article <a href="index.php?op=devel&sub=qa&id=bugreport_howto" style="font-size:small;color:teal;text-decoration:none;font-weight:bold;">How to Report Bugs Effectively</a> (available in several languages) before you proceed.</a>  Then, post your bug report to the <a href="index.php?op=lists#fbsupport" style="font-size:small;color:teal;text-decoration:none;font-weight:bold;">firebird-support</a> or the <a href="index.php?op=lists#fb-devel" style="font-size:small;color:teal;text-decoration:none;font-weight:bold;">firebird-devel</a> list and ask if you need to post it to Tracker.</small></p>
<p/>
    </td>
  </tr>
  <tr>
    <td  valign="top">
<p><strong>Is there a feature you would like to request?</strong></p>
    </td>
    <td>
<p><small>Maybe it is already in Firebird's development programme.  You can check up at the Tracker site using the <strong>Find Issues</strong> search tool.  You can even vote on it!  And if there is a feature YOU want that nobody else has registered yet, write up a good description and add it as a Feature Request.</small></p>
    </td>
    </tr>
    <tr>
      <td valign="top"><b>Sign up!</td>
      <td>
<p><small>You will need to create an account in Tracker to report bugs, request features or vote. It is simple!  Just go there and follow the sign-up instructions.</small></p>
    </td>
  </tr>

</table>

<?php

//$action="news";

//require('tf.actions.php');
//include("newsflash.php");
include("news.php");
?>
