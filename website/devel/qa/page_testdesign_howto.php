<?php
if (eregi("page_testdesign_howto.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>How to design new tests</H4>

<H5>Where to start</H5>
First, it's important to identify what you want to test. To avoid collision with others, take a look at our <a href="index.php?op=devel&amp;sub=qa&amp;id=testlist">list of tests</a>, and check if your beloved one is not already created ! Then let us know about your intention in <a href="index.php?op=lists#fb-test">firebird-test</a> mailing list or newsgroup.
<p>
What we need most right now are SQL compliance tests, so you'll need a copy of Firebird SQL Reference Guide. Unfortunately, there isn't any freely available Firebird-specific SQL reference documentation right now, but you can use <a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_download_documentation">InterBase 6.0 SQL reference</a> together with <a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_download_15">Release Notes</a>, or <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/firebird2/src/dsql/parse.y?rev=HEAD&content-type=text/vnd.viewcvs-markup">parse.y</a> source file.

<H5>The Golden Rule</H5>
<p class="redsmallcaps">
<b>Test case should be really simple, and should cover only one aspect of single feature / command in discrete conditions.</b> 
</p>
Lets take the SELECT statement as an example. SELECT statement is quite complex, so you'll need to break it into clauses and choose one, for example the FIRST/SKIP. Then you need to identify all the features of that statement you want to test.
<ol>
<li>SKIP only</li>
<li>FIRST only</li>
<li>FIRST and SKIP together</li>
</ol>
<p>
Then you can go to design test cases that would cover these features. Focus on testing all legal paths first (positive test) - i.e. does it work correctly as specified ? If there are any behaviour-switching value boundaries, concentrate your work around them !
<p>
For example positive test cases for FIRST .. SKIP for feature "3. FIRST and SKIP together" could be defined as checking result from "select skip 10 first 5..." in next conditions:
<ol>
<li>with no data -- No data is important condition for all DML commands</li>
<li>with 10 rows -- Behaviour-switching value boundary for SKIP</li>
<li>with 11 rows -- Behaviour-switching value boundary for SKIP and FIRST</li>
<li>with 16 rows -- Behaviour-switching value boundary for FIRST</li>
</ol>
When you have these basic test cases, you can specify various work conditions and combine these test cases with them to produce final set of test cases:
<ol>
<li>Data taken from single table without WHERE predicate, i.e. table contains specified number of rows</li>
<li>Data taken from single table, larger resultset narrowed by WHERE predicate to specified number of rows</li>
<li>Data taken from joined tables, where result of this join has required number of rows</li>
<li>Data taken from stored procedure that generates required number of rows</li>
<li>SORTED result from any source of data listed above (there is no need to spawn another dimension in the matrix, as dependancy on source of data is already covered in other groups)</li>
</ol>
<p>
When legal paths are explored and covered, look at important illegal paths (negative tests) - does it correctly signal an error when wrong values are submitted ? Because negative tests are endless, focus only on most important / expected points of failure. For example:
<p>
<ol>
<li>Negative value for SKIP</li>
<li>Negative value for FIRST</li>
</ol>
<p>
You should also define test cases for special "bizarre" values that are legal (so they do not raise an error), but are not "right" in common sense. They are used rarely, so they are often overlooked by test designers, but as they are typically  behaviour-switching boundary values, their verification is very important. In case of FIRST and SKIP, this "bizarre" parameter value is zero.
<p>
Each test case has its own requirements for running environment: database schema and content, tools etc. These requirements must be a part of test case specification.
<p>
All tests have common basic structure:
<ol>
<li><b>Requirements</b> for running environment: database schema and content, tools etc.</li>
<li><b>Tested command(s)</b>. If test cases are well defined, then each has one and only one directly tested command. Its outcome is verified by expected output (if any), and /or with additional checks (check for right content in system tables for example).</li>
<li><b>Expected output</b> from tested command(s). It could be standard command output or error message. The best way to describe it is as standard ISQL output when command(s) is executed (You can use ISQL OUTPUT command to grab it). But you can define it in any other way you see fit for you and the purpose.</li>
<li><b>Additional checks</b>. If the direct output from tested command is not enough to verify its correctness (some commands even don't produce any "visible" output), you must use additional means (check the content in system tables, check presence of file on disk etc.)</li>
</ol>
<H5>Making test cases into tests</H5>

In ideal world, each test case would be implemented as single test. This setup would provide most value for QA team, as test's failure could be easily analyzed, and broken part of the engine (or in test itself) could be tracked down more precisely. Unfortunately, test implementation could require a lot of work, because each test needs its own running environment created independently from other tests. So if several test cases are closely related and use the same working environment, it could be more practical to give up on fine-grained evidence in test outcome in favour of simplified implementation, and merge them into single test.
<p>
In case of "FIRST 5 SKIP 10" we crumbled before into approx. 20 test cases we can implement some groups of test cases that use the same database and source of data in single test. For example group of test cases that take data from single table, with larger resultset narrowed by WHERE predicate to none, 10, 11 and 16 rows can easily use the same setup (database, table and table content), so we can create it as single test.
<p>
When you decide to wrap up several test cases into single test, keep clear what are individual test cases, i.e. don't try to make any "shortcuts" or "optimizations" in them. They should share only the common environment, nothing more. It should be also clearly stated and documented, that this paricular test contains multiple tests cases, and which they are.
<p>

<H5>From drawing board to production</H5>

Once the test design is finished, it's time to implement it. If you do not want to mess up with QMTest and <a href="index.php?op=devel&sub=qa&id=testimplementation_howto">implement it yourself</a>, you can simply write the specification for test and <a href="index.php?op=lists#fb-test">send it over to us</a>. 
<p>
In this case, the test specification document should contain next information:

<ol>
<li><b>Test ID</b><br>
Tests have hierarchical, dot-separated names / ID's, that must be <b>unique</b> in  whole Firebird test suite. For samples, take a look at test IDs in Firebird test suite. It would be great if test ID would conform to common schema used by Firebird QA team so it could persist, but don't worry too much about it, as it could be easily adjusted later, and the main purpose for Test ID in specification document is to have a tag that could be used to refer on test in communication between you and the QA team.</li>
<li><b>Author</b><br>
Your name and e-mail</li>
<li><b>Description</b><br>
Clear specification what is checked by this test. If test contains more than one test case (see above), then all test cases should be described separately.</li>
<li><b>Dependencies</b><br>
Your test would very likely depend on other SQL commands, tools or Firebird features beside tested ones, so they must work correctly if the test outcome should not be spoiled. Because these features are checked by other tests, we can simply run tests in dependancy order to get unspoiled results. Of course, we could extract this information from other parts of specification, but separate list of dependencies would make the whole specification more clear and concise, and save us some time we would need to figure it out. You can simply describe these dependencies by words, or you can look up IDs for tests that must be run before this one (but it's not necessary)</li>
<li><b>Prerequisites</b><br>
Any special conditions, tools or environment required for this test (except the test database and standard tools). Most tests do not have any special requirement beyond single work database and availability of standard Firebird command-line tools, so these requirements are fulfiled automatically. But if your test needs anything else beyond that, you must enlist it here.</li>
<li><b>Database specification</b><br>
It's very likely that your test works with a database. You can give us a backup file for it (if the schema is complex or database must contain a lot of data), or you can specify how it could be created. By default, each test can get a new dialect 3 database owned by SYSDBA, with character set NONE and with page size 4K, so you don't need to specify these parameters if they are not different. If you would need this database with certain schema and populated with data, provide an ISQL script for it here. You can also refer to a database/script used in another test by test ID</li>
<li><b>Test command(s)</b>.<br></li>
<li><b>Expected result</b> from tested command (returned data or error code etc.)</li>
<li><b>Additional checks</b><br>
(if any) - verification from database content (for INSERT statement and the likes). DDL commands are checked against system tables. Check may query more than one table, but it's necessary to list each command and its expected output (captured output from ISQL is enough).</li>
</ol>
<p>
<b>Example:</b>
<table border="0" width="100%">
<pre class="code">
<b>Test ID:</b> domain.alter.02 
<b>Author:</b> Slavomir Skopalik (skopalik at hlubocky.del.cz)

<b>Description:</b> 
Checks ALTER DOMAIN...DROP DEFAULT for VARCHAR defaults

<b>Dependencies:</b>

CREATE DOMAIN
Simple SELECT

<b>Prerequisites:</b> NONE

<b>Database specification:</b> Standard.
Initialization:
CREATE DOMAIN test VARCHAR(63) DEFAULT 'test string';

<b>Tested command:</b>  ALTER DOMAIN test DROP DEFAULT;
<b>Expected result:</b> No stdout or stderr.

<b>Additional checks:</b> 
command:
SELECT RDB$FIELD_NAME, RDB$DEFAULT_SOURCE FROM rdb$fields WHERE RDB$FIELD_NAME = 'TEST';
Output:
RDB$FIELD_NAME                  RDB$DEFAULT_SOURCE
=============================== ==================

TEST                                          null
</pre>


<hr>
<p>
If you have any suggestions or criticism please drop us an e-mail in <a href="index.php?op=lists#fb-test">firebird-test</a> mailing list.</p>
<p>
Back to <A href="index.php?op=devel&amp;sub=qa">Firebird QA</A>.
<p>