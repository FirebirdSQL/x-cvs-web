<?php
if (eregi("page_rdbms.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>What is Firebird RDBMS ?</H4>
As it's stands today, Firebird 1.0 is basically the InterBase® 6.0 engine released by Borland with a lot of bug fixes and some improvements. So, if you want to know what Firebird can do for you, you have to look at InterBase 6.0 first...

<H5>About InterBase®, the Firebird's predecessor</H5>
InterBase® is an open source relational database that runs on Linux, Windows, and a variety of Unix platforms. It is the same commercial database that Motorola, Nokia, Boeing, and the Boston Stock Exchange have used for many years. InterBase® offers excellent concurrency, high performance, and a powerful language for stored procedures and triggers. Since 1985 InterBase® has provided the strength of a powerful, high performance, proven architecture with the sophisticated technology applications need to be successful.
<p>
<ul>
<li>If you never met InterBase before, please read the <A href="index.php?op=guide&amp;id=ib6_overview">InterBase 6.0 Overview</A>.
<li>If you're InterBase pre-version 6.0 user, you may be interested in <A href="index.php?op=guide&amp;id=ib6_newfeatures">new features</A> introduced in version 6.0
<li>Additionally, you may find <A href="index.php?op=guide&amp;id=ib6_techspec">InterBase Technical Specification</A> very appealing.
<li>A small collection of documented <A href="index.php?op=guide&amp;id=ib_casestudies">case studies</A> of sites where InterBase is deployed.
</ul>
InterBase® was released by Borland under <A href="index.php?op=doc&amp;id=ipl">InterBase Public Licence</A>, a variant of <A href="http://www.mozilla.org/MPL/MPL-1.1.html">Mozilla Public Licence</A> (MPL).
<H5>About Firebird, the InterBase's successor</H5>
In contrast to the open source InterBase 6 and new InterBase provided by Borland that both runs only on Windows, Linux and Solaris, Firebird was successfully built and run on additional platforms like MacOS X (Darwin), FreeBSD and OpenBSD, HP-UX and AIX as well. Currently, Firebird project regularly release Firebird builds for Linux i386, Win32, Solaris Sparc and i386, FreeBSD, MacOS X and HP-UX.
<p>
But Firebird 1.0 exceeds InterBase® in more ways than just the count of platforms where you can run it. First of all, Firebird excels in how bugs (and some bugs always appear in any piece of software) are handled. As in any other Open Source project, the whole development is transparent to anyone, so you can know the exact state a bug you've reported (or anyone else), when it's fixed and how, and get the fixed product as soon as possible. Although bugs are found and squashed by development team almost every day, you too can have an influence on the development process, by your feedback, your cooperation or money.
<p>
Of course, the Firebird development team doesn't concentrate solely on bug fixes, but on new features and improvements as well. Because Firebird developers are also Firebird everyday users, they are focused on features and improvements that really "scratch an itch", rather than on features for features sake like in many commercial products.
<p>
Next: <A href="index.php?op=guide&amp;id=project">Firebird project</A>
<p>