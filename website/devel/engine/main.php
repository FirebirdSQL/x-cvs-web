<?php

if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">

  <tr>
    <td class="centre">
<h1>Firebird Core Engine Development</h1>
    </td>
  </tr>

  <tr>
    <td> 
<h4>General</h4> 
<blockquote>
<a href="index.php?op=devel&sub=engine&id=roadmap">Roadmap</a> :: a draft of where we are headed for Firebird 2 and 3
<p>
Developer progress reports :: Project Coordination
<ul>
<li><!-- a href="index.php?op=devel&sub=engine&id=coordff200409" -->Dmitry Yemanov, 2004-10-01<!-- /a -->
<li>(earlier reports to be retrieved from archives)
</ul>
</blockquote>

<h4>Backup</h4> 
<blockquote>
<a href="index.php?op=devel&sub=engine&id=nbackup">NBackup</a> :: overview of the new incremental backup utility that is proposed for inclusion in Firebird 2
</blockquote>

<h4>Security</h4> 
<blockquote>
<a href="index.php?op=devel&sub=engine&id=security">Security</a> :: overview of security enhancements under consideration for Firebird 2 and 3
<p>
Developer progress reports :: periodic reports from developers
<ul>
<li><a href="index.php?op=devel&sub=engine&id=securff200407">Alex Peshkov, 2004-07-28</a>
<li>(earlier reports to be retrieved from archives)
</ul>
</blockquote>


    </td>
  </tr>
</table>
<p>
<?php
$action="topics";
$fid=1;
require('tf.actions.php');

?>
<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>

