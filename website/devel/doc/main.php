<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h1>Firebird documentation subproject</h1>

<h4>Activities</h4>

Welcome to the documentation subproject homepage. Our goal is
to produce a fully cross-linked documentation set for Firebird. We
author the docs in DocBook XML format and then render them to HTML
and PDF (note: PDF not online yet).
<p>
If you are curious why we do it this way, or if you're interested in
helping us, have a look at the <a
href="http://firebird.sourceforge.net/devel/doc/manual/defaulthtml/firebird-docwriters-info.html">Documentation
for Firebird Docwriters</a>.
<p>
If you want to write documentation for Firebird but you <i>really</i>
can't or won't do it in DocBook XML, please post a message to the
<a
href="http://lists.sourceforge.net/lists/listinfo/firebird-docs">firebird-docs
list</a>.
<p>

<h4>Online documentation</h4>

Links to the documentation we have produced so far:
<ul>
<li><a href="devel/doc/manual/defaulthtml/index.html">Overall table
of contents</a>
<p>
</li>
<li><a href="devel/doc/manual/defaulthtml/migration-mssql.html">MS SQL
            to Firebird Migration Guide</a></li>
<li><a href="devel/doc/manual/defaulthtml/ibfbcoex.html">Coexistence
             of Firebird 1.5 and InterBase</a>
<p>
</li>
<li><a href="devel/doc/manual/defaulthtml/firebird-docwriters-info.html">Documentation
for Firebird Docwriters:</a>
<ul>
<li><a href="devel/doc/manual/defaulthtml/docbuildhowto.html">Docbuilding Howto</a></li>
<li><a href="devel/doc/manual/defaulthtml/docwritehowto.html">Docwriting Howto</a></li>
</ul
</li>
</ul>
<p>
These are by no means all the Firebird docs available. Other good
starting places are the <a href="http://firebird.sourceforge.net/index.php?op=doc">
documentation index page on this site</a> (what you're looking at now
is the documentation <i>development</i> homepage) and the
<a
href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_download_documentation">IBPhoenix
documentation page</a>.
<p>

<h4>Under development</h4>
<ul>
<li>Improvement of PDF rendering</li>
<li>Additions to IB+Fb coexistence doc</li>
<li>Reserved words list + glossary</li>
</ul>
<p>

<h4>Future plans</h4>
<ul>
<li>API reference</li>
<li>SQL and UDF reference</li>
</ul>
<p>

<h4>Feedback</h4>

If you have any comments or ideas, please share them with us
through the <a
href="http://lists.sourceforge.net/lists/listinfo/firebird-docs">firebird-docs
list</a>. We appreciate your feedback!
<p>
&nbsp;<br>
<i>The Firebird Documentation team</i>
<p>


<?php
$action="topics";
$fid=2;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>
