<?php

if (eregi("page_qaff200409.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">

  <tr>
    <td class="centre" colspan=2>
<h4>Developer's Report for September 2004</h4>
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
<li>All outstanding issues with new test class were resolved (well, all issues known so far), and all remaining old tests were reimplemented in this new class. From this point on, old class is deprecated. New test class is not finished yet, as its continually improved, but is fully usable now for wide range of tests.
<p>
<li>Added direct support for isc_database_info calls to test class for easy use of db_info in Python-based tests (this request originate from optimizer tests made by Arno). Our solution was accepted by David Rushby, and should appear as standard feature in future versions of kinterbasdb.
<p>
<li>David Rushby sent me his partial solution for unicode issue and much improved test class. Unfortunatelly, it's based on old class and older QMTest, so manual merge is needed (and some issues that his code solves were already addressed in new class). Anyway, it's good start for definitive solution for unicode issue and it also contains some gems that are worth of merge. I'm half-way through this merge.
<p>
<li>Now our test suite can fully handle tests varsions for different target engine versions or platforms. qmdbm CLI tool is available to build runnable test suite for particular target engine and platform from test database. I've also created such engine and/or platform specific test versions where necessary (for about 40 tests). For more detail see documentation at our website.
<p>
<li>New QA documentation uploaded at QA section of our website:
<ul>
<li>Methodology and tools used in Firebird QA.
<li>How to report bugs effectively.
<li>How to use Firebird test suite.
<li>How to design new tests for Firebird
<li>How to implement new tests for Firebird
<li>List of tests (only those that use new test class) 
</ul>
<p>
<li>New developments: Testsbed for development of tests in Python. It creates a sandbox to run python-based tests in the same environment as they would be run in QMTest, but without QMTest. It will simplify debugging anf speed up development of complex tests. Not finished yet.
<p>
<li>All-in-one QA setup and update package. The goal is to provide easy to use, all-in-one setup package to create QA test environment, and keep it up to date (automatic download of new tests from our website). As it has lower priority than other QA related stuff, it's still work in progress.
</ol>
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
