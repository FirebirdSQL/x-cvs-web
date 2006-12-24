<?php
if (eregi("page_whitepapers.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>White Papers</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<!-- ------------------------------------------------------------------- -->
<tr>
<td bgcolor="lightsteelblue" width="40%"><font face="Verdana"><b>Title</b></td>
<td bgcolor="lightsteelblue" width="35%"><font face="Verdana"><b>Author</b></td>
<td bgcolor="lightsteelblue" width="15%"><font face="Verdana"><b>Format</b></td>
<td bgcolor="lightsteelblue"  width="10%"><font face="Verdana"><b>Size</b></td>
</tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td  width="40%"><font face="Verdana"><b>The Power of Firebird Events</b></td>
<td width="35%"><font face="Verdana">Milan Babuskov</td>
<td width="15%"><font face="Verdana">PDF</td>
<td width="10%"><font face="Verdana">505 Kb</td>
</tr>

<tr><td colspan=4><font face="Verdana">This paper, presented at the 2005 Firebird Conference in Prague, discusses the inner and outer workings of the Firebird events mechanism.
</td>

</tr>
<td width="20%" bgcolor="lavender" align=center><font face="Verdana"></td>
<td colspan=3 align=left><font face="Verdana"><a href="doc/whitepapers/events_paper.pdf">Download (right-click) or view (left-click)</a> as a PDF file</a>. </td>
</tr>
<tr><td colspan=4><hr size=1></td></tr>
<!-- ------------------------------------------------------------------- -->
<tr>
<td  width="40%"><font face="Verdana"><b>Firebird Databases as the Back-end
to Enterprise Software Systems</b></td>
<td width="35%"><font face="Verdana">Helen Borrie/IBPhoenix</td>
<td width="15%"><font face="Verdana">HTML &amp; PDF</td>
<td width="10%"><font face="Verdana">70 Kb &amp; 122Kb</td>
</tr>

<tr><td colspan=4><font face="Verdana">This paper was prepared in February 2006 for a customer of IBPhoenix
in Australia. The customer has kindly allowed its release to
the Firebird community as an open document for translation and other
uses by the community for informing the public about the capabilities
of Firebird for enterprise use.
</td>

</tr>
<td width="20%" bgcolor="lavender" align=center><font face="Verdana"><a href="devel/doc/papers/html/paper-fbent.html">VIEW AS HTML</a></td>
<td colspan=3 align=left><font face="Verdana"><a href="devel/doc/papers/pdf/paper-fbent.pdf">Download (right-click) or view (left-click)</a> as a PDF file</a>. </td>
</tr>
<tr><td colspan=4><hr size=1></td></tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td  width="40%"><font face="Verdana"><b>A
not-so-very technical discussion of Multi Version Concurrency
Control</b></td>
<td width="35%"><font face="Verdana">Roman Rokytskyy</td>
<td width="15%"><font face="Verdana">HTML &amp; PDF</td>
<td width="10%"><font face="Verdana">40 Kb</td>
</tr>

<tr><td colspan=4><font face="Verdana">In February 2002 Oracle published a “Technical Comparison of Oracle Database vs. IBM DB2 UDB: Focus on Performance” white paper where they claimed to have better architecture in Oracle 9i compared to IBM DB2 UDB V7.2. In August 2002 IBM published “A Technical Discussion of Multi Version Read Consistency” white paper claiming that Oracle multi-version concurrency required a lot of workarounds to be as good as the approach used in IBM DB2.<p>Roman Rokytskyy explores multi-version concurrency as natively designed into Firebird's ancestry, years before it was ever injected into Oracle.
</td>
</tr>
<td width="20%" bgcolor="lavender" align=center><font face="Verdana"><a href="doc/whitepapers/fb_vs_ibm_vs_oracle.htm">VIEW AS HTML</a></td>
<td colspan=3 align=left><font face="Verdana"><a href="doc/whitepapers/fb_vs_ibm_vs_oracle.piz">Download</a> as a zipped (WinZip, 7zip, etc.) PDF file</a>. </td>
</tr>
<tr><td colspan=4><hr size=1></td></tr>

<!-- ------------------------------------------------------------------- -->
<tr>
<td  width="40%"><font face="Verdana"><b>Firebird File and Metadata Security</b></td>
<td width="35%"><font face="Verdana">Geoff Worboys</td>
<td width="15%"><font face="Verdana">HTML &amp; PDF</td>
<td width="10%"><font face="Verdana">67 KB</td>
</tr>

<tr><td colspan=4><font face="Verdana">A discussion of security on Firebird, 
  with emphasis on the ways developers go about trying to hide their metadata 
  from people who can get access to it.</td>
</tr>
<td width="20%" bgcolor="lavender" align=center><font face="Verdana">VIEW/DOWNLOAD</td>
<td colspan=3 align=left><font face="Verdana"><A HREF="/manual/fbmetasecur.html">View as multi-page HTML</a><br>
<A HREF="/pdfmanual/Firebird-Security.pdf">View/download as PDF</a></td>
</tr>
<tr><td colspan=4><hr size=1></td></tr>

<!-- ------------------------------------------------------------------- -->





<!-- END OF PAGE CONTENT -->
</table>

<p>
Back to <A href=index.php?op=doc>Firebird Documentation Index</A>
<p>
