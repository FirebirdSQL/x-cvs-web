<?php
if (eregi("page_bugdb.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Bug/Issue Database</H4>

<b><font color='red'>We would like encourage you to take a look at <a href="index.php?op=devel&sub=qa&id=bugreport_howto">How to Report Bugs Effectively</a>, before you log any new bug report.</font></b>
<p>
We use several tracking groups to separate different kinds of issues. Please, investigate the Tracker site thoroughly if you are not used to it, and choose the proper tracker.  Life is too short to 'clean up' all invalid/redundant entries.<p>
<p>
<img src="images/clearpixel.gif" width="80" height="45"></a>
<a href="http://tracker.firebirdsql.org">
<img src="images/fbtracker.gif" border="0"></a>
<p>
If you're planning to work with JIRA extensively, you may appreciate the <a href="http://almworks.com/jiraclient/overview.html">JIRA Client</a> that integrates seamlessly with it and brings more searching power and interactivity to frequent JIRA users. It's a commercial product with 30-day evaluation, but you may use our <a href="devel/qa/jiraclient_firebird.license ">unlimited open-source licence</a> that's "locked" to work only with Firebird JIRA tracker.
<p>

Thank you!<br>
<i>Your Firebird Team</i>


