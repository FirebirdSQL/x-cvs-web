<?php
if (eregi("page_testdesign_howto.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>How to design new test cases</H4>

What we need most right now are SQL compliance tests, so you'll need a copy of <a href="http://www.ibphoenix.com/ibp_download.html#DOCS">Firebird/InterBase SQL reference guide</a> or <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/firebird2/src/dsql/parse.y?rev=HEAD&content-type=text/vnd.viewcvs-markup">parse.y</a> source file.

<H5>Where to start</H5>
First, it's important to identify what you want to test. To avoid collision with others, take a look at our list of <a href="index.php?op=devel&amp;sub=qa&amp;id=testlist">tests in development</a>, and check if your beloved statement is not already taken by someone ! Then let us know about your intention to claim a statement for yourself in <a href="index.php?op=lists#fb-test">firebird-test</a> mailing list or newsgroup.

<H5>The Golden Rule</H5>
<p class="redsmallcaps">
<b>Test cases should be really simple, each test should cover only one aspect of single command in discrete conditions.</b> 
</p>
Lets take the SELECT statement as an example. SELECT statement is quite complex, so you'll need to break it into clauses and choose one, for example the FIRST/SKIP. Then you need to identify all the features of that statement you want to test.
<ol>
<li>range at start</li>
<li>range at end</li>
<li>range with subselect</li>
<li>range with no/incomplete data</li>
<li>illegal ranges</li>
<li>range with sort</li>
</ol>
etc.
<p>
Then you design the tests to cover the above features, say "4. no incomplete data" as "select skip 10 first 5..."
<p>
4a - with zero data.<br>
4b - with 1 row<br>
4c - with 2 rows<br>
4d - with 7 rows<br>
4e - with 10 rows<br>
etc...
<p>
That will give a bit more structure to you test process.  Focus on testing all the legal paths first - does it work correctly as specified (positive test). Then revisiting the important illegal or negative test cases - does it screw up when given wrong stuff (negative test). But negative tests are endless, so complete coverage here is not necessary.
<p>
<H5>Test structure</H5>
When you're done with test design, it's time to write it down for implementation. Each test case description consists from next parts:
<ol>
<li>Author - Your name and e-mail</li>
<li>Unique test ID (your nickname + your own sequence number)</li>
<li>Test type (positive or negative)</li>
<li>Test description</li>
<li>Dependencies, i.e. what tests must be run before this test. Use test IDs or 
description</li>
<li>Prerequisites - any special condition required for this test (beside the test database).</li>
<li>Database content/ISQL initialization script (you can also refer to a database/script used in another 
test by test ID)</li>
<li>Tested command</li>
<li>Expected result from tested command (server return code or returned data)</li>
<li>Additional checks (if any) - verification from database content (for INSERT statement and the likes). DDL commands are checked against system tables. Check may query more than one table, but it's necessary to list each command and its expected output (captured output from ISQL is enough).</li>
</ol>
<p>
<b>Example:</b>
<table border="0" width="100%">
<tr class="YLineA cl">
  <td>
<b>Author:</b> Slavomir Skopalik (skopalik at hlubocky.del.cz)
<p>
<b>Test ID:</b> skopalik_0005
<p>
<b>Test type:</b> POSITIVE
<p>
<b>Description:</b> ALTER DOMAIN - DROP DEFAULT - VARCHAR
<p>
<b>Dependencies:</b>
<p>
CREATE DOMAIN<br>
Simple SELECT
<p>
<b>Prerequisites:</b> NONE
<p>
<b>Initialization script:</b>
<p>
   CREATE DOMAIN test VARCHAR(63) DEFAULT 'test string';
<p>
<b>Tested command:</b>   ALTER DOMAIN test DROP DEFAULT;
<p>
<b>Expected result:</b> No error.
<p>
<b>Additional checks:</b> 
<p>
SELECT RDB$FIELD_NAME, RDB$DEFAULT_SOURCE FROM rdb$fields WHERE RDB$FIELD_NAME = 'TEST';
<pre>
RDB$FIELD_NAME                  RDB$DEFAULT_SOURCE
=============================== ==================

TEST                                          null
</pre>
</td>
</tr>
</table>


<H5>Test dependencies</H5>
Because test cases are very simple while SQL is quite complex, it's clear that some tests will depend on functionality covered by other tests. So, although you can pick up any SQL statement or functionality, you'll see your test designs implemented faster, when you will start with those that will not end "in the air", i.e. their validity will not depend on not yet tested features. For example, test case for INSERT statement will depend at least on tests for CREATE TABLE, simple form of SELECT and work with various datatypes. On the other side, when you'll start with more complex statements, you'll help us map all those dependencies.
<p>

<p>
If you have any suggestions or criticism please drop us an e-mail in <a href="index.php?op=lists#fb-test">firebird-test</a> mailing list.</p>
<p>
Back to <A href="index.php?op=devel&amp;sub=qa">Firebird QA</A>.
<p>