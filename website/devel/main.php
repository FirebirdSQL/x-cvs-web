<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Welcome to the Firebird's Forge !</H4>
This site area is devoted to Firebird development efforts, and you are at the right place if you are interested to learn more about our current developments, future plans or organization structure.
<p>
Firebird project web site and other development facilities are provided by <A href=http://sourceforge.net/>SourceForge</A>.
<p>
Project Admins: <?php GetRabbitInfoLink("awharrison",true) ?> · <?php GetRabbitInfoLink("pcisar",true) ?> · <?php GetRabbitInfoLink("bellardo",true) ?> · <?php GetRabbitInfoLink("skywalker",true) ?> · 
<?php GetRabbitInfoLink("d_jencks",true) ?> · 
<?php GetRabbitInfoLink("dimitr",true) ?> · 
<?php GetRabbitInfoLink("seanleyne",true) ?>
<P>
Developers: 67 [ <A href="http://sourceforge.net/project/memberlist.php?group_id=9028">View Members</A> · <A href="index.php?op=rabbits">Rabbit Holes</A> ]
<p>
<IMG height=20 alt="Activity statistics" src="images/statistic16b.png" width=20 border=0>&nbsp;Project activity <A href="http://sourceforge.net/project/stats/?group_id=9028">statistics</A> · <A href="index.php?op=rabbits">Rabbits at Work</A>.
<p>
<IMG height=20 alt="Surveys" src="images/survey16b.png" width=20 border=0>&nbsp;Project and community <A href=index.php?op=survey>surveys</A>.
<p>
<IMG height=20 alt="Contacts and Mailing lists" src="images/mail16b.png" width=20 border=0>&nbsp;Project <A href=index.php?op=devel&amp;id=contacts>contacts</A> · Development related <A href=index.php?op=lists>Lists and Newsgroups</A>.
<p>
<IMG height=20 alt="Source code" src="images/cvs16b.png" width=20 border=0>&nbsp;<A href=index.php?op=devel&amp;id=cvs_howto>How to</A> access CVS · Download <A href=http://cvs.sourceforge.net/cvstarballs/firebird-cvsroot.tar.gz>Nightly CVS tree tarball</A> · <A href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird">Browse CVS</A>
<p>
<hr>
<?php
if (!IsSet($action))
	$action="forums";
require('tf.actions.php');

?>