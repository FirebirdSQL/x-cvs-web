<?php

if (eregi("page_securff200409.php",$PHP_SELF)) {
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
    <td><h5>Firebird Security Design &amp; Enhancements</h5>
    </td>
  </tr>
  <tr>
    <td>Developer: 
    </td>
    <td>Alex Peshkoff
    </td> 
  </tr>

  <tr>
    <td colspan=2>
<hr size=1>
I've started with a number of security fixes for firebird. They will be included in 2.0. After end of discussion, 
concerning them, I'll apply them to CVS. <p>
Brief list of fixes/improvements:  <ol>
<li>Make security database completely invisible to the users. Drop
    service "anonymous", which reports real security database location.<p>
<li>Add SQL commands to manage users' accounts -
    CREATE/MODIFY/UPDATE/DROP USER.<p>
<li>Use services to implement backwards compatibility for isc_*_user()
    functions and GSEC. GSEC's switch -database is deprecated
    completely, added new one -server to manage security database on
    remote server. <p>
<li>Add server's salt, that is used in some combination with user name
    to build salt for SHA-1. Initialization is done during server installation with
    random value. <p>
<li>Let users modify their own passwords.<p>
<li>Always use SHA-1 to calculate passwords hashes, without ability to
    use old crypt for password validation.<p>
    </ol>
Almost all of the list (except SQL support for accounts management) is almost ready.
But to say that list complete and correct, it's necessary to wait for the end of discussions.
<p>

Other work done: <ol>
<li>Fixed problems with thread priorities scheduler.<p>
<li>Fixed messages sql-scripts build for posix in win32 terminals.<p>
<li>Added firebird.conf parameter UsePriorityScheduler (to be able to turn it completely off when needed).<p>
<li>Fixed problems with DatabaseAccess verification during Create Database (also affected database restore). <p>
<li>Fixed a number of errors in Firebird::string.<p>
<li>Prepared HEAD codebase to automatically allocate memory for internals of automatic variables<p>
(like Firebird::Stack or Firebird::string content) from thread's (not proces's) default pool.
Because this preparation required a lot of modifications of code all over the tree, I've decided to delay
a bit final switch in order to not to mix those changes related bugs (mistyping, etc) with potential real
thread sync problems.
<p>
<i>Alex Peshkoff<br>
Yaroslavl, Russia</i>
<hr size=1>
    </td>
  </tr>
</table>
<p>
Back to <A href="index.php?op=devel&sub=engine">Core Engine index page</A>.
<p>
