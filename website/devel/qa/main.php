<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<b>Thank you for your interest in Firebird QA efforts!</b>
<p>
As you may know, quality is not an easy target, and although there are many books about techniques how to achieve it in software projects, no single one is a complete cure for all quality problems faced in software development. On that account, Firebird project use several methods at once. Some are closely related to actual development, some are separated into detached Firebird QA subproject, and some act as a glue between both groups. Although all methods combined forms a complex QA process, no single one is too difficult to learn and use, and anyone can find his/her best place to excercise personal skills.


<H3>Methods used in Firebird QA</H3>
<a name="peerreview"></a><H4>Peer Review</H4>
Peer review is most often cited asset of Open Source development model, especially in relation to quality. So it's only natural that Peer review has it's place in Firebird Project.
<p>
<b>How it works in Firebird project:</b><br>
Changes in CVS are reviewed as they appear (see <a href="index.php?op=lists#fb-checkins">firebird-checkins</a> mailing list and newsgroup) by other developers. All problems are immediately reported and discussed in <a href="index.php?op=lists#fb-devel">firebird-devel</a>. 
<p>
Although changes are regularly reviewed by other core developers, we haven't a dedicated person to that task, and each development subproject is free to set up it's own routine for code review. Due to time contraints, it may happen that some changes slip in unnoticed, so if you're interested to follow closely the development of particular subproject, we'd like encourage you to watch changes in firebird-chekins and immediately report anything you'll find suspicious in <A href="index.php?op=lists">appropriate mailing list or newsgroup</A>.


<a name="codeaudit"></a><H4>Code Audit</H4>
Code audit is just a form of Peer Review. But while peer review can address only code changes and small parts 
of codebase that's being work on, Code audit extends the peer review to the whole codebase. 
<p>
This QA method is not used regularly (except for critical systems) because it's very expensive in terms of human labour and required knowledge. But Firebird project is in unusual situation, because we inherited aprox. 35MB of source code, where most of it was not touched by Firebird developers. There are large portions of code that only few (if anyone at all) knows in detail, and this knowledge is mostly a by-product of learning, so these developers read it just to decipher what's it supposed to do, not to check it's correctness. Of course, some bugs were found that way (like famous "politically correct" security hole), but it's mostly an exception. 
<p>
<b>How it works in Firebird project:</b><br>
We don't have the resources to do a full "stop everything" code review, so we do it incrementally as the various engine subsystems are examined in detail. In the course of development, every source file in Firebird2 module (29MB) would be reviewed. We'd like also document these files. That mean both, in-line comments in <a href="http://www.stack.nl/~dimitri/doxygen/">doxygen</a> format and separate FB internals document, where major data structures and subsystems would be documented, including their mutual relations.
<p>
This task is huge and will take time, so we would appreciate any help, especially with documentation part. All source code already contains in-line comments and descriptions for all public functions (although is a little bit short in documentation for data structures), so we only need to format them for <a href="http://www.stack.nl/~dimitri/doxygen/">doxygen</a>. If you'd like volunteer for this task, don't hesitate to <?php GetRabbitSafeEMailLink("firebirds","contact us",true) ?> !
<p>
Each source file that has been reviewed in full should be marked as such in header, with auditor's nickname and date of full review.


<a name="devtestcases"></a><H4>Development Test Cases</H4>
Developers often use home-made test applications to test basic functionality of parts they're working on. They are not always developed nor complete, but if they are developed, they are not deleted afterwards and could be reused in test system or by QA group. They don't need to be so extreme like in eXtreme programming, and developed *before* any real development take place (although XP approach would be nice :), but *any* such application has its value. 
<p>
<b>How it works in Firebird project:</b><br>
Right now, development test cases are used only in "JDBC type 4 driver" development group. These tests use JUnit XP framework. 
<p>
We'd like initiate a subproject to create test cases based on C++ XP Unit test framework for Firebird2 codebase. These tests should verify correctness of various basic subsystems, like memory management, utility functions, parser etc. Because this task was not yet picked up by anyone, you're free to <?php GetRabbitSafeEMailLink("firebirds","contact us",true) ?> about this position.

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
If possible, automated test systems are used to do 1),2),3) and 5) tests. 4) and 6) usually depends completely on manual labour. All bugs and issues detected by QA department are tracked in some sort of Problem resolution system. This system is a crucial part of whole QA/development cycle, and any implemented QA procedure can't work successfully for long time without it. 
<p>

<b>How it works in Firebird project:</b><br>
We have a Problem tracking system, but it's not directly connected to TCS and QA cycle. We also have an automated TCS released by Borland with around 390 tests. Tests are written in mixture of shell script, arcane TCS commands, environment variables (both OS and TCS), C/C++, ESQL etc. with use of various external tools (all are standard, free or part of TCS suite), all packed in single text BLOB field in FB database. TCS is hard to operate, and writing new tests require almost the same skills (or more in certain areas) for QA people as for core developers. The entry barrier for any apprentice QA developer is very high. Anyway, TCS is used regularly by developers, packagers and port maintainers to perform basic checks of core engine before any public release. Additionally to internal testing, each release is tested in real world applications by early adopters and testers, and all problems are reported, tracked and resolved through our Problem tracking system at SourceForge.
<p>
Although this procedure works for 1.0 release, we work on improvements that will allow us to perform complex internal pre-release testing, and keep track of pending issues more efficiently. Our current QA efforts are focused on development of new test cases, especially on full SQL reference tests. It's a lot of work, and we'll appreciate any help, especially with correct test design which is the most time consuming part of this task. To help us, you don't need any special skills or tools, just the good will, time and a text editor. You can learn more about our requirements for new test cases in our <a href="index.php?op=devel&sub=qa&id=testdesign_howto">Test design How-To</a>.
<p>

Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>