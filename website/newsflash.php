<?php
if (eregi("newsflash.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<hr size=2>
<b><font color="red">1-Oct-2002</font> Firebird 1.5 Alpha 1</b><br>

After a month of semi-public testing, the first public Alpha release of Firebird 1.5 is available for download. As you may know, the 1.5 release is the first version based on new, cleaned and improved C++ source code tree with many new features and bugs fixed. Complete list of major changes beyond the 1.0 version is quite long, and you can read it <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/firebird2/doc/WhatsNew?rev=1.7&content-type=text/vnd.viewcvs-markup">here</a> (and it's just a starter for what's in pipeline :-).
<p>
<b>Don't forget that this release is an Alpha!</b> It may blow up to your face, but it may also work better than you expect from an alpha-quality release (our measures are quite hard, so an Alpha may work better than many production versions). Anyway, use it only for testing, not for production systems. Although this release have not (yet) an installer and the documentation is brief, you should not have any problems to get it running and taste the flavour of new version.
<p>
We'd like release new alpha builds often, so check our web site regularly for updates.
<p>
We're eager to hear from you about your experience (good or bad) with it. Please send your reports to the <?php GetMailingListPageLink("fb-devel","",true) ?> mailing list (or newsgroup). Don't forget that your feedback will help us to move forward faster!
<p>
<i>Your Firebird Development Team</i>
