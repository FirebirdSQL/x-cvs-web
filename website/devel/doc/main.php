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

Brazilian Portuguese translations by Fabr&iacute;cio Ara&uacute;jo added. (31-12-2005 &ndash; 1-1-2006)
<p>
New manual for non-Western Firebird docwriters: <cite>Using non-Western fonts
in your Firebird docs</cite>. With our extended build framework, we should now
be able to generate docs in <em>any</em> of the world's languages &#8211; at least
theoretically. (22 Dec 2005)
<p> Several new Russian and French translations by Pavel Menshchikov and Philippe Makowski. (Dec 2005)
<p>
Existing manual docbooked and added to our collection: <cite>Firebird
File and Metadata Security</cite> by Geoff Worboys. (7 Dec 2005)
<p>

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
    <td><a href="/manual/index.html">en</a> 
      <a href="/manual/es/index.html">es</a>
      <a href="/manual/fr/index.html">fr</a>
      <a href="/manual/nl/index.html">nl</a>
      <a href="/manual/pt_br/index.html">pt-br</a>
      <a href="/manual/ru/index.html">ru</a></td>
    <td><a href="/pdfmanual/">en</a>
      <a href="/pdfmanual/es/">es</a>
      <a href="/pdfmanual/fr/">fr</a>
      <a href="/pdfmanual/nl/">nl</a>
      <a href="/pdfmanual/pt_br/">pt-br</a>
      <a href="/pdfmanual/ru/">ru</a></td>
  </tr>
  <tr>
    <td>Firebird 1.5 Quick Start Guide</td>
    <td><a href="/manual/qsg15.html">en</a> 
      <a href="/manual/es/qsg15-es.html">es</a>
      <a href="/manual/fr/qsg15-fr.html">fr</a> 
      <a href="/manual/ru/qsg15-ru.html">ru</a></td>
    <td><a href="/pdfmanual/Firebird-1.5-QuickStart.pdf">en</a>
      <a href="/pdfmanual/es/Firebird-1.5-Arranque.pdf">es</a>
      <a href="/pdfmanual/fr/Firebird-1.5-Demarrage.pdf">fr</a>
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
      <a href="/manual/fr/nullguide-fr.html">fr</a></td>
    <td><a href="/pdfmanual/Firebird-Null-Guide.pdf">en</a> 
      <a href="/pdfmanual/es/Null-en-Firebird.pdf">es</a>
      <a href="/pdfmanual/fr/Firebird-et-Null.pdf">fr</a> </td>
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
      <a href="/manual/pt_br/ibfbcoex-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/InterBase-Firebird-Coexist.pdf">en</a>
      <a href="/pdfmanual/pt_br/Coexistencia-Firebird-InterBase.pdf">pt-br</a></td>
  </tr>
  <tr> 
    <td>Firebird's nbackup tool</td>
    <td><a href="/manual/nbackup.html">en</a> 
      <a href="/manual/fr/nbackup-fr.html">fr</a>
      <a href="/manual/nl/nbackup-nl.html">nl</a> 
      <a href="/manual/ru/nbackup-ru.html">ru</a></td>
    <td><a href="/pdfmanual/Firebird-nbackup.pdf">en</a> 
      <a href="/pdfmanual/fr/Firebird-nbackup-fr.pdf">fr</a>
      <a href="/pdfmanual/nl/Firebird-nbackup-nl.pdf">nl</a>
      <a href="/pdfmanual/ru/Firebird-nbackup-ru.pdf">ru</a></td>
  </tr>
  <tr>
    <td>Firebird Commandline Utilities (work in progress)</td>
    <td><a href="/manual/fbutils.html">en</a>
      <a href="/manual/pt_br/fbutils-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/Firebird-Utils-WIP.pdf">en</a>
      <a href="/pdfmanual/pt_br/Firebird-Utilitarios.pdf">pt-br</a></td>
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
      <a href="/manual/pt_br/docbuildhowto-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/Firebird-Docwriters-Info.pdf">en</a>
      <a href="/pdfmanual/es/Construir-los-docs-Firebird.pdf">es</a>
      <a href="/pdfmanual/pt_br/Gerando-Manuais-Firebird.pdf">pt-br</a></td>
  </tr>
  <tr> 
    <td>Docwriting Guide</td>
    <td><a href="/manual/docwritehowto.html">en</a>
      <a href="/manual/pt_br/docwritehowto-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/Firebird-Docwriters-Info.pdf">en</a>
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
