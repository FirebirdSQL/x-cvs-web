<?php
if (eregi("page_bugdb.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Bug/Issue Database</H4>
We use several trackers to keep different kind of problems separately. Please, use the proper tracker (Life is too short to have to 'clean up' invalid/redundant entries).<p>
<p>
<ul>
<li>Use the <a
href="http://sourceforge.net/tracker/?group_id=9028&atid=109028">Bug tracker</a> to report an issue with any <b><font color='red'>stable build</font></b>.</li>
<li>Use the <a
href="http://sourceforge.net/tracker/?group_id=9028&atid=593943">Field-test issue tracker</a> to report an issue with any <b><font color='red'>development build</font></b> (alpha/beta/RC).</li>
<li>Use the <a
href="http://sourceforge.net/tracker/?group_id=9028&atid=359028">Feature request tracker</a> to ask for <b><font color='red'>enhancements or new features</font></b>.</li>
</ul>
<p>
Thank you!<br>
<i>Your Firebird Team</i>
