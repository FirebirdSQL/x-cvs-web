<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Under development</H4>
<li>Backporting of FB 1 changes to FB 2 source tree.
<p>
<H4>Future plans</H4>
<li>Move all development to new Firebird2 source tree.
<p>
<H4>Activities so far</H4>
<li>Final release of Firebird 1.0.
<li>New memory management and error handling (exceptions) implemented for Firebird 2.
<li>The first full release (Firebird 1) for all platforms is in QA now, with some significant replacement of long-standing limitations, fixes for security problems and some language enhancements.
<li>Firebird 2 development has already begun (May 2001). In the process, the source code is being converted to C++ and rigorously streamlined to improve its cross-platform conformance to standards and remove ambiguity
<li>Tarballs and beta builds have been in release since December 2000 
<li>New platform ports have appeared for Solaris, FreeBSD, MacOS-Darwin, and HP-UX.
<li>The source code efforts for the first months focused primarily on cleaning up the build scripts and repairing obvious faults in the code.  
  <ul>
    <li>Firebird source code can now be &quot;boot-built&quot; on most platforms
    <li>Code-cleaning continues to be an ongoing process as the bug list grows
  </ul>
<p>
<?php
$action="topics";
$fid=1;
require('tf.actions.php');

?>
<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>