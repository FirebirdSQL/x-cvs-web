<?php
if (eregi("newsflash.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<hr size=2>
<b><font color="red">30-December-2002</font> Firebird 1.5 Beta 1</b>
<p>
The development of Firebird 1.5 release reached it's first beta release ! Along with fixed bugs, this new build has also some new features and enhancements - new runtime action checks (INSERTING/UPDATING/DELETING predicates) for triggers, expressions in the ORDER BY clause, EXECUTE VARCHAR was renamed to EXECUTE STATEMENT and better optimizations of "complex" JOIN queries. We made a lot of progress with it thanks to your feedback.
<p>
The first public Beta is out, and we are eager to hear about your experience (good or bad) with it. Please send your reports to the <?php GetMailingListPageLink("fb-devel","",true) ?> mailing list (or newsgroup). Don't forget that your feedback will help us to move forward faster!
<p>
<i>Background information:</i><br>
The 1.5 release is the first version based on new, cleaned and improved C++ source code tree with many new features and bugs fixed. Complete list of major changes beyond the 1.0 version is quite long, and you can read the up-to-date version <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/firebird2/doc/WhatsNew?rev=HEAD&content-type=text/vnd.viewcvs-markup">here</a> (and it's just a starter for what's in pipeline :-).
<p>
<b>Don't forget that this release is still a Beta!</b> It may blow up to your face, but it may also work better than you expect from an alpha-quality release (our measures are quite hard, so an Alpha may work better than many production versions). Anyway, use it only for testing, not for production systems. Although this release have not (yet) an installer and the documentation is brief, you should not have any problems to get it running and taste the flavour of new version.
<p>
We'd like release new builds often, so check our web site regularly for updates.
<p>
<i>Your Firebird Development Team</i>
<p>
<hr size=2>
<b><font color="red">19-December-2002</font> Firebird v1.0.2 Update Released (a gift for the holidays)</b>
<p>
The Firebird team is very please to announce the release of the Firebird
v1.0.2 update for Win32 and Linux.  
<p>
This release represents the first maintenance update following the
release of the v1.0 product, and includes the following bugs fixes (for
all platforms):
<ul>
<li>64-bit file i/o is now properly supported under Linux</li>
<li>There was problem with connection strings on Unix platforms that could
lead to database corruption.</li>
<li>Table name aliases are now allowed in INSERT statements.</li>
<li>String expression evaluation now throws an error if the expression
could be greater than 64k. Previously an error was thrown if the
expression evaluated to a possible size of greater than 32k.</li>
<li>Minor problems with Two-Phase commit were fixed.</li>
<li>INT64 datatype now supported correctly in Arrays.</li>
<li>SF Bug #545725 - internal connections to database now reported as
user.</li>
<li>SF Bug #538201 - crash with extract from null date.</li>
<li>SF Bug #534208 - select failed when udf was returning blob.</li>
<li>SF Bug #533915 - Deferred work trashed the contents of RDB$RUNTIME.</li>
<li>SF Bug #526204 - GPRE Cobol Variable problems fixed.</li>
</ul>
<p>
Please note:  There was no official Firebird 1.0.1 release for any
platform except Mac OS X. That release was made to cater for an
operating system upgrade.
<p>
All install packages are available for immediate <a href="http://sourceforge.net/project/showfiles.php?group_id=9028">download</a>.
<p>
Install packages for other platforms (Mac OS, Solaris, FreeBSD) are
expected to be made available shortly (as time permits for the port
maintainers), please consult the project web site (at
www.FirebirdSQL.org) for their release announcements.
<p>
Thank You,<br>
<i>The Firebird Project Team</i>
<hr size=2>
<b><font size=+1><font color="red">11-December-2002</font> FirebirdSQL Foundation </font></b>
<p>
We are very pleased to announce the formation of <a href="http://www.firebirdsql.org/ff/foundation/">"The FirebirdSQL Foundation"</a>, a non-profit association with the objectives of supporting and advancing the development of the open source FirebirdSQL relational database engine.
<p>
[ <a href="http://www.firebirdsql.org/ff/foundation/index.php?id=introMessage.html">Read more</a> ]
<p>
