<?php
if (eregi("page_development.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Development</H4>

<p>This page contains informations and instructions on how-to setup your environment if you want to contribute to the Firebird Documentation Project.</p>

<p><H5><a name="tools"></a>Used tools</H5>

If you want to contribute to the Firbird Documentation Project, there are several tools that you have to install and configure. The first program you need is an CVS client which allows you to check out the latest version of the manual (if you want to actively contribute please ask in the <a href="index.php?op=lists#fb-doc" target="_blank" title="Firebird-docs Mailinglist">&quot;firebird-docs&quot;</a> mailing list for CVS write access). Next you need the Java 2 SDK (Standard Edition) and a XML editor. That's almost everything you need to check out, modify and compile the Firebird documentation.<br>The good news at last: All the tools presented in the next section are free.<br></p>

<H5><a name="environment"></a>Environment setup</H5>

Here are the steps you need to perform before actually can check out, edit and compile the Firebird documentation:
<ul>
  <li>Download and install your favorite CVS utility. I recommend <a href="http://www.wincvs.org/download.html" target="_blank" title="WinCVS download">WinCVS</a>. For Linux you don't need any client software because CVS support should be included in your distribution.</li>
  <li>Download and install the <a href="http://java.sun.com/j2se" target="_blank" title="Java 2 SDK (Standard Edition) download">Java 2 SDK(Standard Edition)</a> from Sun Microsystems.</li>
  <li>Download and install your favorite XML editor. I recommend the Windows text editor <a href="http://www.fixedsys.com/context/download.html" title="ConTEXT download">ConTEXT</a>. ConTEXT isn't actually a true XML editor but it supports syntax highlighting and that is enough for me. If you want an free XML editor which also supports XML syntax checking, try <a href="http://www.gnu.org/software/emacs/windows/NT-Emacs" target="_blank" title="NT-Emacs download">NT-Emacs</a>. For Linux you can use Emacs which ships with nearly all distributions. If you want to use Emacs you have to check out <a href="http://www.snee.com/bob/sgmlfree/emcspsgm.html" target="_blank" title="PSGML Tricks">PSGML Tricks</a> and <a href="http://www.cs.uni-frankfurt.de/doc/texi/psgml.html" target="_blank" title="Editing SGML with Emacs and PSGML">Editing SGML with Emacs and PSGML</a> to enable syntax highlighting and checking.</li>
</ul>
<p>After you are done with the installations create an environment variable called &quot;JAVA_HOME&quot; and point to the folder where you installed the Java SDK. Next you have to start your CVS client and check-out the modul "manual" from the Sourceforge CVS repository. Please refer to our <A href="index.php?op=devel&id=cvs_howto">CVS How To</A> for detailed instructions.
</p>

<p><H5><a name="compiling"></a>Compiling the documentation</H5>
Now open the prompt(terminal window) and change to the folder where you checked out the &quot;manual&quot; module. Next change to the folder &quot;src\build&quot; and execute the following command: &quot;build defaulthtml&quot;(there is a &quot;build.bat&quot; and &quot;build.sh&quot; files for both OS's in place). The compile process starts and you can watch the the generation of the output HTML files.<br></p>

<p>
<H5><a name="deploying"></a>Deploying the compiled files</H5>

Open the prompt(terminal window) and change to the folder where you checked out the &quot;manual&quot; module. Go on and change to the folder &quot;dist\docs\defaulthtml&quot;. In this directory you can see the whole compiled Firebird Documentation in HTML format. Open &quot;index.html&quot; in your browser and you can see what already has been done by the Firebird Documentation Project.<br></p>

<H5><a name="contribute"></a>Contribute to the Firebird Documentation Project</H5>

If you want to join the documentation team you have to do 2 things:<br>
<ol>
  <li>
    Post in the in the <a href="index.php?op=lists#fb-doc" target="_blank" title="Firebird-docs Mailinglist">&quot;firebird-docs&quot;</a> mailing list and ask for CVS write access. This allows you to check-in your modified files.
  </li>
  <li>
    Choose your working area:
    <table cellpadding=3 cellspacing=0 border=1 width="90%">
      <tr>
        <th>Job</th>
        <th>File</th>
        <th>Status</th>
        <th>Taker</th>
      </tr>
      <tr>
        <td>The API Guide(&quot;APIGuide.pdf&quot;) has to be converted by copy+pasting to the XML file. During the copy+paste process the text has to be adjusted according to the <a href="#guidelines" title="Rules for creating and modifying DocBook files">guidelines</a>.</td>
        <td>APIGuide.pdf -> APIGuide.xml</td>
        <td>unassigned</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>The DataDefintion Guide(&quot;DataDef.pdf&quot;) has to be converted by copy+pasting to the XML file. During the copy+paste process the text has to be adjusted according to the <a href="#guidelines" title="Rules for creating and modifying DocBook files">guidelines</a>.</td>
        <td>DataDef.pdf -> DataDefintion.xml</td>
        <td>assigned</td>
        <td><a href="mailto:tmuetze@alanti.net?subject=DataDefintion Guide" title="Tilo Muetze">Tilo Muetze</a></td>
      </tr>
      <tr>
        <td>The Embedded SQL Guide(&quot;EmbedSQL.pdf&quot;) has to be converted by copy+pasting to the XML file. During the copy+paste process the text has to be adjusted according to the <a href="#guidelines" title="Rules for creating and modifying DocBook files">guidelines</a>.</td>
        <td>EmbedSQL.pdf -> EmbeddedSQLGuide.xml</td>
        <td>unassigned</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>The Language Reference(&quot;LangRef.pdf&quot;) has to be converted by copy+pasting to the XML file. During the copy+paste process the text has to be adjusted according to the <a href="#guidelines" title="Rules for creating and modifying DocBook files">guidelines</a>.</td>
        <td>LangRef.pdf -> LanguageReference.xml</td>
        <td>unassigned</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>The Operations Guide(&quot;OpGuide.pdf&quot;) has to be converted by copy+pasting to the XML file. During the copy+paste process the text has to be adjusted according to the <a href="#guidelines" title="Rules for creating and modifying DocBook files">guidelines</a>.</td>
        <td>OpGuide.pdf -> OperationsGuide.xml</td>
        <td>unassigned</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </li>
</ol>

<H5><a name="guidelines"></a>Docbook documentation guidelines</H5>

This guideline is written by David Jencks and can also be found in the Firebird documentation.<br>
<ul>
  <li>Use tags to indicate the logical structure of the content, not to attempt to specify appearance.<br>To reiterate, attempts to use the structural DocBook tags to influence presentation appearance are unlikely to produce useable results on all presentation platforms (html and pdf).</li>
  <li>Do what you can to ensure you turn in a valid DocBook file.<br>If you notice any parser errors during documentation build, correct them to ensure XML validity. If you get absolutely stuck notify one of the documentation leads. The reviewers will correct any DocBook errors you create, but please try to reduce the number of errors.<br>Constructing valid Docbook xml is much easier with the use of a xml-dtd aware editor such as emacs + psgml.</li>
  <li>All &lt;chapter&gt; and major &lt;section&gt; tags must have an id attribute. The id must be all lower case, with dashes seperating words: &lt;section id=&quot;migration-mssql&quot;&gt;<br>This is very important since it allows other documentation writers to refer to your chapters and sections.</li>
  <li>When trying to decide between an ordered and unordered list, simply ask yourself the following question: &quot;Does the order of the listed items matter?&quot; or &quot;If I change the order of the listed items, does that change the meaning of the list?&quot;. If you answer &quot;No&quot; to either question, then an unordered list is likely the logical choice.</li>
  <li>When referring to chapters, sections, code samples, figures and other parts of documentation use either &lt;link&gt; or &lt;xref&gt; element.<br>&lt;xref&gt; element is more powerful since it creates both link and link text. You should use it whenever possible.<br>For example: If there is a figure somewhere in the documentation &lt;figure id=&quot;mssql-to-firebird-data-types&quot;> then using &lt;xref linkend=&quot;mssql-to-firebird-data-types&quot;/&gt; creates both the link to that figure as well as link text. Link text is usually autogenerated (in case of figures - figure number) or assigned by the author of that link target.<br>&lt;link&gt; element also creates links, but you assign link text. For example: &lt;link linkend=&quot;mssql-to-firebird-data-types&quot;&gt;mapping MSSQL to Firebird data types&lt;/link&gt;.</li>
  <li>Use &lt;ulink&gt; element to create links to other URLs. For example: &lt;ulink url=&quot;http://www.oasis-open.org&quot;&gt;OASIS, the home of Docbook.&lt;/ulink&gt;.</li>
</ul>

<p><H5><a name="faq"></a>Frequently Asked Questions</H5>

They will follow as soon as someone has asked something.</p>

<p><H5><a name="additional"></a>Additional informations and resources</H5>

The first version of the DocBook setup was created by David Jencks for the Firebird Documentation Project. After the setup was created the writing process has started. In the moment you better call it transfering process, because we just copy+paste things from the old Firebird PDF files to the new XML standard.<br></p>

<p>If you have any suggestions, bug reports or criticism please drop me an <a href="mailto:tmuetze@alanti.net?subject=Firebird Installation" title="Firebird Installation">E-Mail</a>.</p>

<p>
Back to <A href="index.php?op=devel&amp;sub=doc">Documentation Project</A>.
<p>