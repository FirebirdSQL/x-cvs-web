<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h1>Firebird documentation subproject</h1>

<b><font color="red">Note:</font></b> This page is undergoing some
changes at the moment, so check back here soon.

<p>

You can join discussion in <A href="index.php?op=lists#fb-doc">firebird-docs</A> mailing list.

<H4>Under development</H4>
<ul>
<li>Improvement of PDF rendering</li>
<li>Additions to IB+Fb coexistence doc</li>
<li>Reserved words list + glossary</li>
</ul>
<p>
<H4>Future plans</H4>
<ul>
<li>API reference</li>
<li>SQL and UDF reference</li>
</ul>
<p>
<H4>Activities so far</H4>
<ul>
<li>DocBook setup and guidelines.</li>
<li>Introduction to Firebird manuals (by David Jencks).</li>
<li>Preface to Firebird manuals.</li>
<li><a href="/devel/doc/manual/defaulthtml/migration-mssql.html">MS SQL
            to Firebird Migration Guide</a>
    (by Marcelo Lopez Ruiz).</li>
<li><a href="/devel/doc/manual/defaulthtml/ibfbcoex.html">Coexistence
             of Firebird 1.5 and InterBase</a></li>
<li><a href="/devel/doc/manual/defaulthtml/docbuildhowto.html">Docbuilding Howto</a></li>
<li><a href="/devel/doc/manual/defaulthtml/docwritehowto.html">Docwriting Howto</a></li>
</ul>
<p>
<?php
$action="topics";
$fid=2;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>
