<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>About Firebird QA (Quality Assurance)</H4>
<p>
As you may know, quality is not an easy target, and although there are many books about techniques how to achieve it in software projects, no single one is a complete cure for all quality problems faced in software development. On that account, Firebird project use several methods at once. Some are closely related to actual development, some are separated into detached Firebird QA subproject, and some act as a glue between both groups. Although all methods combined forms a complex QA process, no single one is too difficult to learn and use, and anyone can find his/her best place to excercise personal skills.
<p>
Learn more about:
<ul>
<li><a href="index.php?op=devel&sub=qa&id=methods">Methodology and tools</a> used in Firebird QA.</li>
<li><a href="index.php?op=devel&sub=qa&id=bugreport_howto">How to report bugs</a>.</li>
<li><a href="index.php?op=devel&sub=qa&id=qmtest_howto">Firebird test suite</a>.</li>
</ul>
<p>
<?php
$action="topics";
$fid=6;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>