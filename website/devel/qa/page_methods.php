<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H3>Methodology and Tools used in Firebird QA</H3>
<a name="peerreview"></a><H4>Peer Review</H4>
Peer review is most often cited asset of Open Source development model, especially in relation to quality. So it's only natural that Peer review has it's place in Firebird Project.
<p>
<b>How it works in Firebird project:</b><br>
Changes in CVS are reviewed as they appear (see <a href="index.php?op=lists#fb-checkins">firebird-checkins</a> mailing list and newsgroup) by other developers. All problems are immediately reported and discussed in <a href="index.php?op=lists#fb-devel">firebird-devel</a>. 
<p>
Firebird Foundation issued a grant to secure a dedicated person (currently Claudio Valderrama C.) to that task. Currently, only changes in core engine (modules interbase and firebird2) are reviewed, and although changes to other modules are often reviewed by other developers, due to time contraints, it may happen that some changes slip in unnoticed. So if you're interested to follow closely the development of particular subproject, we'd like encourage you to watch changes in firebird-chekins and immediately report anything you'll find suspicious in <A href="index.php?op=lists">appropriate mailing list or newsgroup</A>.


<a name="codeaudit"></a><H4>Code Audit</H4>
Code audit is just a form of Peer Review. But while peer review can address only code changes and small parts 
of codebase that's being work on, Code audit extends the peer review to the whole codebase. 
<p>
This QA method is not used regularly (except for critical systems) because it's very expensive in terms of human labour and required knowledge. But Firebird project is in unusual situation, because we inherited aprox. 35MB of source code, where most of it was not touched by Firebird developers. There are large portions of code that only few (if anyone at all) knows in detail, and this knowledge is mostly a by-product of learning, so these developers read it just to decipher what's it supposed to do, not to check it's correctness. Of course, some bugs were found that way (like famous "politically correct" security hole), but it's mostly an exception. 
<p>
<b>How it works in Firebird project:</b><br>
We haven't had resources to do a full "stop everything" code review in the past, but forthcoming merge of Firebird with Vulcan is a great opportunity to start it, because both codebases must be entirely examined. Source code after this merge should be also more clean, and well-structured to document it. That mean both, <a href="http://www.stack.nl/~dimitri/doxygen/">doxygen</a> documentation from in-line comments and separate FB internals document, where major data structures and subsystems would be documented, including their mutual relations.
<p>
This task is huge and will take time, so we would appreciate any help, especially with documentation part. All source code already contains in-line comments and descriptions for all public functions (although is a little bit short in documentation for data structures), so we only need to format them for <a href="http://www.stack.nl/~dimitri/doxygen/">doxygen</a>. If you'd like volunteer for this task, don't hesitate to <?php GetRabbitSafeEMailLink("firebirds","contact us",true) ?> !
<p>
Each source file that has been reviewed in full should be marked as such in header, with auditor's nickname and date of full review.


<a name="devtestcases"></a><H4>Development Test Cases</H4>
Developers often use home-made test applications to test basic functionality of parts they're working on. They are not always developed nor complete, but if they are developed, they are not deleted afterwards and could be reused in test system or by QA group. They don't need to be so extreme like in eXtreme programming, and developed *before* any real development take place (although XP approach would be nice :), but *any* such application has its value. 
<p>
<b>How it works in Firebird project:</b><br>
Right now, development test cases are used only in "JDBC type 4 driver" and ".NET Data Provider" development groups. These tests are based on UnitTest frameworks for Java and .NET. 
<p>
Due to internal structure of Firebird, it's not practical to start development of Unit tests for Firebird codebase, but wWe have initiated a subproject to create test cases based on C++ XP Unit test framework for Vulcan codebase, because Vulcan heavily use C++ classes and their subsystems are better separated. These Unit tests would be also important for forthcoming Vulcan merge with Firebird, and should be included into Firebird codebase after that.
<p>
These tests should verify correctness of various basic subsystems, like memory management, utility functions, parser etc. If you're interested to help us with development of Unit tests, don't hesitate to <?php GetRabbitSafeEMailLink("firebirds","contact us",true) ?>.

<a name="blackbox"></a><H4>Automated Black-box Testing</H4>

The purpose is to verify correctness and limits of final product. That mean:  
<ol>
<li>Correct input produce correct result.</li>
<li>Incorrect input produce correct error result.</li>
<li>Product reacts correctly to limit conditions and values (memory, disk space, file size, values at behaviour-switching boundary etc.)</li>
<li>Product reacts correctly to unexpected conditions (power failure, low-memory, I/O error)</li>
<li>Consistency. Test results from 1)-4) are consistent in time and with different order of execution. This also means concurrency tests.</li>
<li>Usability (performance, ergonomy, documentation)</li>
</ol>
If possible, automated test systems are used to do 1),2),3) and 5) tests. 4) and 6) usually depends completely on manual labour. 

All bugs and issues detected by QA department are tracked in some sort of Problem resolution system. This system is a crucial part of whole QA/development cycle, and any implemented QA procedure can't work successfully for long time without it. 
<p>
<b>How it works in Firebird project:</b><br>
We inherited an automated test system called TCS that was released by Borland together with around 390 tests when InterBase code was released. Because TCS is hard to operate and extend, we decided to use another system called QMTest. You can learn more about QMTest and our new test suite in this <a href="index.php?op=devel&sub=qa&id=qmtest_howto">document</a>.
<p>
Our current QA efforts in this area are focused on development of new test cases, especially on full SQL reference tests. It's a lot of work, and we'll appreciate any help, especially with correct test design which is the most time consuming part of this task. To help us, you don't need any special skills or tools, just the good will, time and a text editor. You can learn more about our requirements for new test cases in our <a href="index.php?op=devel&sub=qa&id=testdesign_howto">Test design How-To</a>.
<p>

<a name="trackers"></a><H4>Issue Tracking System</H4>
Right now, we use several trackers to keep different kind of problems separately. Please, use the proper tracker (Life is too short to 'clean up' invalid/redundant entries).<p>
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
Because we're not very satisfied with trackers on SourceForge, we investigate possibility to move our trackers over to <a href="http://www.atlassian.com/software/jira/">JIRA</a>.
<p>
Back to <A href="index.php?op=devel&amp;sub=qa">Firebird QA</A>.
<p>