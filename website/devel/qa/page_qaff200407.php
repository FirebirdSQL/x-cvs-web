<?php

if (eregi("page_qaff200407.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">

  <tr>
    <td class="centre" colspan=2>
<h4>Developer's Report for June 2004</h4>
    </td>
  <tr>
  <tr>
    <td>Project:
    </td>
    <td><h5>Firebird QA Development</h5>
    </td>
  </tr>
  <tr>
    <td>Developer: 
    </td>
    <td>Pavel Cisar
    </td> 
  </tr>
  <tr> 
    <td colspan=2>
<hr size=1>
<ol>
<li>At the end of May, Moe Aboulkheir sent me a new qmtest Test class he created in accordance to my specification. This new class is far more sophisticated than the old one:
<ul>
<li>Has special support for database creation (direct, from backup, connect to existing -&gt; created by qmtest resource for example).

<li>Has special support for database initialization (with isql script, Python code or Python data tuple).

<li>Tests could be written as isql scripts, Python expressions or Python programs.

<li>Some built-in functions for use in tests written in Python.
</ul>
<p>
<li>Of course, I had to tweak this class a lot, as not all things worked as needed, and many things were revealed in the course of test rewrite (see below), but he provided a sound foundation for further work.

<li>I also added support for "test versioning", so we can create multiple tests (with the same test ID) for different engine versions and platforms. This works together with qaver.py tool I wrote to create test suite for specified version. Right now, qaver.py supports only engine versions, but I'm going to add platform support this month.

<li>I rewrote all qmtest tests we have (except these created recently by Nickolay) in new class. It had to be done manually, one by one, as the structure of tests was changed significantly. Some tests were rewriten completely to python code. I converted all tests against FB 1.0, and continued over all official releases (1.0.1-1.0.3 and 1.5) and added new test versions to accommodate differences between these FB versions and platforms (Win32 and Linux) where necessary. All these tests works except three, as they need non-trivial change in new test class in connection handling that I deferred after full conversion. I'm going to fix it this month.

<li>All new code and tests are in our CVS.
</ol>
<p>
<h4>What's next</h4>
<ol>
<li>Change in test class db-connection handling -> this will also fix three now failing tests.

<li>Platform handling in qaver.py tool. next I'd like convert this tool to a  full-featured test-db manager.

<li>Documentation for new class, tool(s) etc. Update web QA pages.

<li>New tests, if time permits.
</ol>
<p>
Due to a HDD crash I had recently, all listed above was delayed, but I still believe that it could be finished this month <img src="images/smiley.gif">
<p>
<i>Pavel Cisar<br>
Prague, Czech Republic</i>
<hr size=1>
    </td>
  </tr>
</table>
<!-- ------------------------------------------- -->
    </td>
  </tr>
</table>
<p>
Back to <A href="index.php?op=devel&sub=qa">QA page</A>
<p>

