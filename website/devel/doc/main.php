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
and PDF.
<p>
If you are curious why we do it this way, or if you're interested in
helping us, have a look at the Documentation
for Firebird Docwriters (see links below).
<p>
If you want to contact us, please post a message to the
<a
href="http://lists.sourceforge.net/lists/listinfo/firebird-docs">firebird-docs
list</a>.
<p>

<h4>Latest</h4>

<a href="/manual/fr/index.html">French</a> and
<a href="/manual/es/index.html">Spanish</a> HTML docs are now up. 
PDF versions to follow shortly. With thanks to translators Philippe 
Makowski and Ernesto Cullen.
<p>

<h4>Online documentation</h4>

Links to the HTML documentation we have produced so far:
<ul>
<li><a href="/manual/index.html">Overall table of contents</a>
<p>
</li>
<li><a href="/manual/qsg15.html">Firebird 1.5 Quick Start Guide</a></li>
<li><a href="/manual/qsg10.html">Firebird 1.0 Quick Start Guide</a></li>
<li><a href="/manual/migration-mssql.html">MS SQL to Firebird Migration Guide</a></li>
<li><a href="/manual/ibfbcoex.html">Coexistence of Firebird 1.5 and InterBase</a>
<p>
</li>
<li><a href="/manual/firebird-docwriters-info.html">Documentation for Firebird Docwriters:</a>
<ul>
<li><a href="/manual/docbuildhowto.html">Docbuilding Howto</a></li>
<li><a href="/manual/docwritehowto.html">Docwriting Howto</a></li>
</ul>
</li>
</ul>
<p>
And these are the PDF versions:
<ul>
<li><a href="/pdfmanual/Firebird-1.5-QuickStart.pdf">Firebird 1.5 Quick Start Guide</a></li>
<li><a href="/pdfmanual/Firebird-1.0-QuickStart.pdf">Firebird 1.0 Quick Start Guide</a></li>
<li><a href="/pdfmanual/MSSQL-to-Firebird.pdf">MS SQL to Firebird Migration Guide</a></li>
<li><a href="/pdfmanual/InterBase-Firebird-Coexist.pdf">Coexistence of Firebird 1.5 and InterBase</a></li>
<li><a href="/pdfmanual/Firebird-Docwriters-Info.pdf">Documentation for Firebird Docwriters</a></li>
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
<li>More improvement of PDF rendering</li>
<li>Additions to IB+Fb coexistence doc</li>
<li>Reserved words list + glossary</li>
</ul>
<p>

<h4>Future plans</h4>
<ul>
<li>More IBPhoenix docs will be coming our way. They need conversion to DocBook and updating to 1.5</li>
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
