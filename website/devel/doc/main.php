<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h1>Firebird documentation subproject</h1>

On this page:
<a href="#docmatrix">Online documentation</a> |
<a href="#act">Activities</a> |
<a href="#latest">Latest</a> |
<a href="#other">Other stuff</a>


<a name="docmatrix"></a>
<h4>Online documentation</h4>

<p>This is the documentation we've produced so far. The links in the HTML and
  PDF columns point to the different language versions available for each document.</p>
<table width="100%" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th>Title</th>
    <th>HTML</th>
    <th>PDF</th>
  </tr>
  <tr>
    <td><em>Firebird user documentation:</em></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Overall table of contents</td>
    <td><a href="/manual/de/index.html">de</a>
        <a href="/manual/index.html">en</a>
        <a href="/manual/es/index.html">es</a>
        <a href="/manual/fr/index.html">fr</a>
        <a href="/manual/it/index.html">it</a>
        <a href="/manual/ja/index.html">ja</a>
        <a href="/manual/nl/index.html">nl</a>
        <a href="/manual/pt_br/index.html">pt-br</a>
        <a href="/manual/ru/index.html">ru</a></td>
    <td><a href="/pdfmanual/de/">de</a>
        <a href="/pdfmanual/">en</a>
        <a href="/pdfmanual/es/">es</a>
        <a href="/pdfmanual/fr/">fr</a>
        <a href="/pdfmanual/it/">it</a>
        <a href="/pdfmanual/ja/">ja</a>
        <a href="/pdfmanual/nl/">nl</a>
        <a href="/pdfmanual/pt_br/">pt-br</a>
        <a href="/pdfmanual/ru/">ru</a></td>
  </tr>
  <tr>
    <td>Using Firebird (work in progress)</td>
    <td><a href="/manual/ufb.html">en</a></td>
    <td><a href="/pdfmanual/Using-Firebird_(wip).pdf">en</a></td>
  </tr>
  <tr>
    <td>Firebird 2.0 Quick Start Guide</td>
    <td><a href="/manual/de/qsg2-de.html">de</a>
        <a href="/manual/qsg2.html">en</a></td>
    <td><a href="/pdfmanual/de/Firebird-2.0-Schnellanleitung.pdf">de</a>
        <a href="/pdfmanual/Firebird-2.0-QuickStart.pdf">en</a></td>
  </tr>
  <tr>
    <td>Firebird 1.5 Quick Start Guide</td>
    <td><a href="/manual/qsg15.html">en</a>
        <a href="/manual/es/qsg15-es.html">es</a>
        <a href="/manual/fr/qsg15-fr.html">fr</a>
        <a href="/manual/ja/qsg15-ja.html">ja</a>
        <a href="/manual/ru/qsg15-ru.html">ru</a></td>
    <td><a href="/pdfmanual/Firebird-1.5-QuickStart.pdf">en</a>
        <a href="/pdfmanual/es/Firebird-1.5-Arranque.pdf">es</a>
        <a href="/pdfmanual/fr/Firebird-1.5-Demarrage.pdf">fr</a>
        <a href="/pdfmanual/ja/Firebird-1.5-QuickStart-Jap.pdf">ja</a>
        <a href="/pdfmanual/ru/Firebird-1.5-BystryjStart.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Firebird 1.0 Quick Start Guide</td>
    <td><a href="/manual/qsg10.html">en</a></td>
    <td><a href="/pdfmanual/Firebird-1.0-QuickStart.pdf">en</a></td>
  </tr>
  <tr>
    <td>Firebird File and Metadata Security</td>
    <td><a href="/manual/fbmetasecur.html">en</a>
        <a href="/manual/ru/fbmetasecur-ru.html">ru</a></td>
    <td><a href="/pdfmanual/Firebird-Security.pdf">en</a>
        <a href="/pdfmanual/ru/Firebird-Bezopasnost-Meta.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Firebird Null Guide</td>
    <td><a href="/manual/nullguide.html">en</a>
        <a href="/manual/es/nullguide-es.html">es</a>
        <a href="/manual/fr/nullguide-fr.html">fr</a>
        <a href="/manual/ru/nullguide-ru.html">ru</a></td>
    <td><a href="/pdfmanual/Firebird-Null-Guide.pdf">en</a>
        <a href="/pdfmanual/es/Null-en-Firebird.pdf">es</a>
        <a href="/pdfmanual/fr/Firebird-et-Null.pdf">fr</a>
        <a href="/pdfmanual/ru/Firebird-PovedeniyeNULL.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Firebird Generator Guide</td>
    <td><a href="/manual/de/generatorguide-de.html">de</a>
        <a href="/manual/generatorguide.html">en</a>
        <a href="/manual/ru/generatorguide-ru.html">ru</a></td>
    <td><a href="/pdfmanual/de/Firebird-Generatoren.pdf">de</a>
        <a href="/pdfmanual/Firebird-Generator-Guide.pdf">en</a>
        <a href="/pdfmanual/ru/Firebird-Generatori.pdf">ru</a></td>
  </tr>
  <tr>
    <td>MS SQL to Firebird Migration Guide</td>
    <td><a href="/manual/migration-mssql.html">en</a>
        <a href="/manual/ru/migration-mssql-ru.html">ru</a></td>
    <td><a href="/pdfmanual/MSSQL-to-Firebird.pdf">en</a>
        <a href="/pdfmanual/ru/Firebird-Perehod-s-MSSQL.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Coexistence of Firebird 1.5 and InterBase</td>
    <td><a href="/manual/ibfbcoex.html">en</a>
        <a href="/manual/pt_br/ibfbcoex-pt_br.html">pt-br</a>
        <a href="/manual/ru/ibfbcoex-ru.html">ru</a></td>
    <td><a href="/pdfmanual/InterBase-Firebird-Coexist.pdf">en</a>
        <a href="/pdfmanual/pt_br/Coexistencia-Firebird-InterBase.pdf">pt-br</a>
        <a href="/pdfmanual/ru/Firebird-IB-i-FB-Vmeste.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Firebird's nbackup tool</td>
    <td><a href="/manual/de/nbackup-de.html">de</a>
    	  <a href="/manual/nbackup.html">en</a>
        <a href="/manual/fr/nbackup-fr.html">fr</a>
        <a href="/manual/nl/nbackup-nl.html">nl</a>
        <a href="/manual/ru/nbackup-ru.html">ru</a></td>
    <td><a href="/pdfmanual/de/Firebird-nbackup-de.pdf">de</a>
        <a href="/pdfmanual/Firebird-nbackup.pdf">en</a>
        <a href="/pdfmanual/fr/Firebird-nbackup-fr.pdf">fr</a>
        <a href="/pdfmanual/nl/Firebird-nbackup-nl.pdf">nl</a>
        <a href="/pdfmanual/ru/Firebird-nbackup-ru.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Firebird Commandline Utilities (work in progress)</td>
    <td><a href="/manual/fbutils.html">en</a>
        <a href="/manual/pt_br/fbutils-pt_br.html">pt-br</a>
        <a href="/manual/ru/fbutils-ru.html">ru</a></td>
    <td><a href="/pdfmanual/Firebird-Utils-WIP.pdf">en</a>
        <a href="/pdfmanual/pt_br/Firebird-Utilitarios.pdf">pt-br</a>
        <a href="/pdfmanual/ru/Firebird-Utiliti.pdf">ru</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><em>Papers and other material:</em></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Firebird Enterprise White Paper</td>
    <td><a href="/devel/doc/papers/html/paper-fbent.html">en</a>
        <a href="/devel/doc/papers/html/fr/paper-fbent-fr.html">fr</a></td>
    <td><a href="/devel/doc/papers/pdf/paper-fbent.pdf">en</a>
        <a href="/devel/doc/papers/pdf/fr/Firebird-en-Entreprise.pdf">fr</a></td>
  </tr>
  <tr>
    <td>Firebird Database Server on MacOSX</td>
    <td><a href="/devel/doc/papers/html/paper-fb-macosx.html">en</a></td>
    <td><a href="/devel/doc/papers/pdf/paper-fb-macosx.pdf">en</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><em>Manuals for Firebird docwriters:</em></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Docbuilding Howto</td>
    <td><a href="/manual/docbuildhowto.html">en</a>
        <a href="/manual/es/docbuildhowto-es.html">es</a>
        <a href="/manual/it/docbuildhowto-it.html">it</a>
        <a href="/manual/pt_br/docbuildhowto-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/Firebird-Docbuilding-Howto.pdf">en</a>
        <a href="/pdfmanual/es/Construir-los-docs-Firebird.pdf">es</a>
        <a href="/pdfmanual/it/Fare-i-Manuali-Firebird.pdf">it</a>
        <a href="/pdfmanual/pt_br/Gerando-Manuais-Firebird.pdf">pt-br</a></td>
  </tr>
  <tr>
    <td>Docwriting Guide</td>
    <td><a href="/manual/docwritehowto.html">en</a>
        <a href="/manual/it/docwritehowto-it.html">it</a>
        <a href="/manual/pt_br/docwritehowto-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/Firebird-Docwriting-Guide.pdf">en</a>
        <a href="/pdfmanual/it/Scrivere-Documenti-Firebird.pdf">it</a>
        <a href="/pdfmanual/pt_br/Guia-Escrita-Firebird.pdf">pt-br</a></td>
  </tr>
  <tr>
    <td>Using non-Western fonts in your Firebird docs</td>
    <td><a href="/manual/fontembed.html">en</a></td>
    <td><a href="/pdfmanual/Fbdocs-Non-Western-Fonts.pdf">en</a></td>
  </tr>
</table>
<p>
These are by no means all the Firebird docs available. Other good
starting places are:
<ul>
<li><a href="http://www.firebirdsql.org/index.php?op=doc">The documentation index page on this site</a><br>
(what you're looking at now is the documentation <i>development</i> homepage)</li>
<li><a
href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_download_documentation">The IBPhoenix
documentation page</a></li>
<li><a href="http://www.janus-software.com/fbmanual/">The Firebird 2 Online Manual at Janus Software</li>
</ul>
<p>


<a name="act"></a>
<h4>Subproject activities</h4>

Our goal is to produce a fully cross-linked documentation set for Firebird.
We author the docs in DocBook XML format and then render them to HTML and PDF.
<p>
If you are curious why we do it this way, or if you're interested in
helping us, have a look at the manuals for Firebird doc writers (see table above).
<p>
If you want to contact us, please post a message to the
<a
href="http://lists.sourceforge.net/lists/listinfo/firebird-docs">firebird-docs
list</a>.
<p>
As from 2005, all our documentation is released under the open-source
<a href="http://www.firebirdsql.org/pdfmanual/Public-Documentation-License.pdf">Public Documentation License</a>.
<p>


<a name="latest"></a>
<h4>Latest additions</h4>

<dl>

<dt><i>4 December 2006</i></dt>
<dd><p>Thomas Steinmaurer has translated the Firebird's nbackup tool manual into German.</p></dd>

<dt><i>4 December 2006</i></dt>
<dd><p>Frank Ingermann has translated his Firebird Generator Guide back to German.</p></dd>

<dt><i>28 November 2006</i></dt>
<dd><p>Sergey Kovalev, Alexandr Karpeykin and Vasiliy Ovchinnikov have translated
  the Commandline Utilities manual into Russian. Corrections, supervision and
  HTML + PDF building: Pavel Menshchikov.</p></dd>

<dt><i>28 November 2006</i></dt>
<dd><p>Finally a German translation! Of the Firebird 2.0 Quick Start Guide,
       by Thomas Steinmaurer.</p></dd>

<dt><i>28 November 2006</i></dt>
<dd><p>Helen Borrie has updated the Firebird Enterprise Whitepaper.</p></dd>

<dt><i>12 November 2006</i></dt>
<dd><p>On the day that Firebird 2 is released, the first two chapters of
       <cite>Using Firebird</cite> go online, as well as the <cite>Firebird 2
       Quick Start Guide</cite>.</p></dd>

<dt><i>7 November 2006</i></dt>
<dd><p>Russian translation of the Generator Guide by Sergei Kovalev (translator)
       and Pavel Menshchikov (editor).</p></dd>

</dl>


<a name="other"></a>

<h4>Under development</h4>
<ul>
<li>Update &amp; publication of more <cite>Using Firebird</cite> chapters</li>
<li>Further improvement of PDF rendering</li>
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
