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
As from 2005, all our documentation is released under the open-source
<a href="http://www.firebirdsql.org/pdfmanual/Public-Documentation-License.pdf">Public Documentation License</a>.
<p>

<h4>Latest</h4>

New manual: <cite>Firebird's nbackup tool</cite>. See links below. 
Please note that the nbackup utility only comes with Firebird 2,
not with earlier versions.
<p>
Existing manaul docbooked and added to our collection: <cite>Firebird 
File and Metadata Security</cite> by Geoff Worboys.
<p>

<h4>Online documentation</h4>

Links to the HTML documentation we have produced so far:
<ul>
<li><a href="/manual/index.html">Overall table of contents</a>
    (also in <a href="/manual/fr/index.html">French</a>,
     <a href="/manual/ru/index.html">Russian</a>,
     <a href="/manual/nl/index.html">Dutch</a>,
     <a href="/manual/es/index.html">Spanish</a> - content may vary)
<p>
</li>
<li><a href="/manual/qsg15.html">Firebird 1.5 Quick Start Guide</a>
    (also in <a href="/manual/fr/qsg15-fr.html">French</a>,
     <a href="/manual/ru/qsg15-ru.html">Russian</a>,
     <a href="/manual/es/qsg15-es.html">Spanish</a>)</li>
<li><a href="/manual/qsg10.html">Firebird 1.0 Quick Start Guide</a></li>
<li><a href="/manual/fbmetasecur.html">Firebird File and Metadata Security</a></li>
<li><a href="/manual/nullguide.html">Firebird Null Guide</a>
    (also in <a href="/manual/fr/nullguide-fr.html">French</a>,
     <a href="/manual/es/nullguide-es.html">Spanish</a>)</li>
<li><a href="/manual/migration-mssql.html">MS SQL to Firebird Migration Guide</a></li>
<li><a href="/manual/ibfbcoex.html">Coexistence of Firebird 1.5 and InterBase</a></li>
<li><a href="/manual/nbackup.html">Firebird's nbackup tool</a>
    (also in <a href="/manual/nl/nbackup-nl.html">Dutch</a>)</li>
<li><a href="/manual/fbutils.html">Firebird Commandline Utilities</a> (Work in progress)
<p>
</li>
<li><a href="/manual/firebird-docwriters-info.html">Documentation for Firebird Docwriters:</a>
<ul>
<li><a href="/manual/docbuildhowto.html">Docbuilding Howto</a>
    (also in <a href="/manual/es/docbuildhowto-es.html">Spanish</a>)</li>
<li><a href="/manual/docwritehowto.html">Docwriting Howto</a></li>
</ul>
</li>
</ul>
<p>
And these are the PDF versions:
<ul>
<li><a href="/pdfmanual/Firebird-1.5-QuickStart.pdf">Firebird 1.5 Quick Start Guide</a>
    (also in <a href="/pdfmanual/fr/Firebird-1.5-Demarrage.pdf">French</a>,
     <a href="/pdfmanual/ru/Firebird-1.5-BystryjStart.pdf">Russian</a>,
     <a href="/pdfmanual/es/Firebird-1.5-Arranque.pdf">Spanish</a>)</li>
<li><a href="/pdfmanual/Firebird-1.0-QuickStart.pdf">Firebird 1.0 Quick Start Guide</a></li>
<li><a href="/pdfmanual/Firebird-Security.pdf">Firebird File and Metadata Security</a></li>
<li><a href="/pdfmanual/Firebird-Null-Guide.pdf">Firebird Null Guide</a>
    (also in <a href="/pdfmanual/fr/Firebird-et-Null.pdf">French</a>,
     <a href="/pdfmanual/es/Null-en-Firebird.pdf">Spanish</a>)</li>
<li><a href="/pdfmanual/MSSQL-to-Firebird.pdf">MS SQL to Firebird Migration Guide</a></li>
<li><a href="/pdfmanual/InterBase-Firebird-Coexist.pdf">Coexistence of Firebird 1.5 and InterBase</a></li>
<li><a href="/pdfmanual/Firebird-nbackup.pdf">Firebird's nbackup tool</a>
    (also in <a href="/pdfmanual/nl/Firebird-nbackup-nl.pdf">Dutch</a>)</li>
<li><a href="/pdfmanual/Firebird-Utils-WIP.pdf">Firebird Commandline Utilities</a> (Work in progress)
<li><a href="/pdfmanual/Firebird-Docwriters-Info.pdf">Documentation for Firebird Docwriters</a>
    (Docbuilding Howto also in <a href="/pdfmanual/es/Construir-los-docs-Firebird.pdf">Spanish</a>)</li>
</ul>

<p>
These are by no means all the Firebird docs available. Other good
starting places are:
<ul>
<li><a href="http://firebird.sourceforge.net/index.php?op=doc">The
documentation index page on this site</a> (what you're looking at now
is the documentation <i>development</i> homepage)</li>
<li><a
href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_download_documentation">The IBPhoenix
documentation page</a></li>
</ul>
<p>

<h4>Under development</h4>
<ul>
<li>Conversion of <cite>Using Firebird</cite> to DocBook XML</li>
<li>Further improvement of PDF rendering</li>
<li>Support for more non-Western languages</li>
<li>Integration of Release Notes in our build system</li>
</ul>
<p>

<h4>Future plans</h4>
<ul>
<li>Additions to IB+Fb coexistence doc, wrt running IB+Fb
simultaneously</li>
<li>Reserved words list + glossary (if still useful after we've 
published <cite>Using Firebird</cite>)</li>
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
