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

<p>If you are interested in how we write and produce our manuals, read
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

<dt><i>3 January 2009</i></dt>
<dd><p>German translation of the Firebird File and Metadata Security paper,
       by Daniel Albuschat.</p></dd>

<dt><i>2 October 2008</i></dt>
<dd><p>Frank Ingermann's conference session - a hands-on introduction to Firebird docwriting and docbuilding -
     is now available for download in PDF format.</p></dd>

<dt><i>24 September 2008</i></dt>
<dd><p>The Firebird 2.0 Language Reference Update is out, just in time for the Firebird Conference.</p></dd>

<dt><i>4 July 2008</i></dt>
<dd><p>Published the Firebird 1.5 Language Reference Update. This is our first step toward a
       complete Firebird Language Reference. Sergey Mereutsa is going to help us with this, using
       some resources of the company he co-owns.</p></dd>

<dt><i>4 March 2008</i></dt>
<dd><p>Brazilian Portuguese translation of the Firebird File and Metadata Security paper,
       by Gabriel Frones.</p></dd>

<dt><i>2 March 2008</i></dt>
<dd><p>Fabio Codebue joined us as a documentation translator. Welcome, Fabio!</p></dd>

<dt><i>28 January 2008</i></dt>
<dd><p>Norman Dunbar has added a chapter on gfix to the Firebird Command-Line Utilities book.</p></dd>

<dt><i>25 January 2008</i></dt>
<dd><p>Italian version of the Firebird 2 Quick Start Guide available,
       translated by Umberto Masotti.</p></dd>

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

  </tr>
  <tr valign='top'>
    <td>Intro to Writing Firebird Docs (conference session)</td>
    <td>&nbsp;</td>
    <td><a href="/pdfmanual/Writing-Firebird-Docs-Intro.pdf">en</a></td>
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
<li>Firebird SQL Reference - currently working on the Firebird 2.1 Language Update Reference</li>
<li>Further improvement of PDF rendering</li>
</ul>
<p>

<h4>Future plans</h4>
<ul>
<li>Update &amp; publication of more <cite>Using Firebird</cite> chapters</li>
<li>Additions to IB+Fb coexistence doc, wrt running IB+Fb
simultaneously</li>
<li>Reserved words list + glossary (if still useful after we've
published <cite>Using Firebird</cite> and the <cite>Language Reference</cite>)</li>
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
