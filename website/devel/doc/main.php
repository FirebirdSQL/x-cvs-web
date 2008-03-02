<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h1>Firebird documentation subproject</h1>

On this page:
<a href="#act">Activities</a> |
<a href="#latest">Latest</a> |
<a href="#docmatrix">Links for docwriters</a> |
<a href="#other">Other stuff</a>

<h4>Welcome</h4>

<p>Hello, and welcome to the Firebird Documentation Subproject
homepage. If you're a Firebird user and looking for documentation,
visit 
<a href="http://www.firebirdsql.org/?op=doc">http://www.firebirdsql.org/?op=doc</a>
(or choose <cite> Documentation</cite> -> <cite>Firebird
Documentation Index</cite> from the top menu).</p>

<p>If you're interested in how we write and produce our manuals, read
on.</p>


<a name="act"></a>
<h4>Subproject activities</h4>

Our goal is to produce a fully cross-linked documentation set for Firebird.
We author the docs in DocBook XML format and then render them to HTML
and PDF with a combination of tools. For details, you can have a look
at our doc writer's manuals - see the links further below.
<p>
Do you want to help us on a regular basis, or do you have a one-time
contribution to make? We can use all the help we can get, and we are
always happy to publish useful documentation or link to it from our website.
Firebird is a great product, but it still lacks sufficient documentation!
<p>
If you want to contact us, please post a message to the
<a
href="http://lists.sourceforge.net/lists/listinfo/firebird-docs">firebird-docs
list</a> or email to paul at vinkenoog dot nl.
<p>
As from 2005, all our documentation is released under the open-source
<a href="http://www.firebirdsql.org/pdfmanual/Public-Documentation-License.pdf">Public Documentation License</a>.
<p>


<a name="latest"></a>
<h4>Latest developments</h4>

<dl>

<dt><i>2 March 2008</i></dt>
<dd><p>Fabio Codebue joined us as a documentation translator. Welcome, Fabio!</p></dd>

<dt><i>28 January 2008</i></dt>
<dd><p>Norman Dunbar has added a chapter on gfix to the Firebird Command-Line Utilities book.</p></dd>

<dt><i>25 January 2008</i></dt>
<dd><p>Italian version of the Firebird 2 Quick Start Guide available,
       translated by Umberto Masotti.</p></dd>

<dt><i>October 2007</i></dt>
<dd><p>An initiative of Holger Klemt, Frank Ingermann and others: set up a database to gather content for
       a Firebird SQL Reference - one record per keyword/function. This makes it easy for everyone to contribute
       even small amounts of text. We'll worry about XML markup later. Meanwhile the database is functional and
       there's a lot of content to write and update. Would-be contributors, please subscribe to
       <a href="http://lists.sourceforge.net/lists/listinfo/firebird-docs">firebird-docs</a>
       and make yourselves known!</p></dd>

<dt><i>5 May 2007</i></dt>
<dd><p>Important updates and additions to the DocBuilding Howto and Docwriting
       Guide, mainly to do with our recent transition to FOP 0.93-patched.</p></dd>

<dt><i>18 April 2007</i></dt>
<dd><p>Rodney Gedda has joined our team, and as his first contribution
       he has just delivered the <cite>Setting up Firebird on Ubuntu
       Linux</cite> guide.</p></dd>

<dt><i>April 2007</i></dt>
<dd><p>The latest (patched) Apache FOP code shows a lot of improvements.
       No more endless FO hacking to prevent widowed headers in our PDFs!</p></dd>

</dl>


<a name="docmatrix"></a>
<h4>Docwriters' documentation</h4>


<p>The links in the HTML and PDF columns point to the different
language versions available for each document.</p>

<!--
  TODO:
  Make this a PHP script reading the category file so it will
  automagically stay up-to-date.
-->

<table width="100%" border="1" cellpadding="2" cellspacing="2">
  <tr valign="top">
    <th "width="60%">Title</th>
    <th "width="20%">HTML</th>
    <th "width="20%">PDF</th>
  </tr>
  <tr valign="top">
    <td>Overall Table of Contents<br>
        (only for our DocBook-based manuals!)</td>
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
  <tr valign="top">
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
  <tr valign="top">
    <td>Docwriting Guide</td>
    <td><a href="/manual/docwritehowto.html">en</a>
        <a href="/manual/it/docwritehowto-it.html">it</a>
        <a href="/manual/pt_br/docwritehowto-pt_br.html">pt-br</a></td>
    <td><a href="/pdfmanual/Firebird-Docwriting-Guide.pdf">en</a>
        <a href="/pdfmanual/it/Scrivere-Documenti-Firebird.pdf">it</a>
        <a href="/pdfmanual/pt_br/Guia-Escrita-Firebird.pdf">pt-br</a></td>
  </tr>
  <tr valign="top">
    <td style='padding-bottom: 5px; border-bottom: 1px solid #848D84'>Using non-Western fonts in your Firebird docs</td>
    <td style='padding-bottom: 5px; border-bottom: 1px solid #848D84'><a href="/manual/fontembed.html">en</a></td>
    <td style='padding-bottom: 5px; border-bottom: 1px solid #848D84'><a href="/pdfmanual/Fbdocs-Non-Western-Fonts.pdf">en</a></td>
  </tr>
</table>
<p>


<a name="other"></a>

<h4>Under development</h4>
<ul>
<li>Firebird SQL Reference - currently writing and updating content. Still a long way to go till publication.</li>
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
