<?php
if (eregi("page_bugdb.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>Firebird ODBC Driver Downloads</h4>
<TR>
<TD>

<h5>Last Installable Windows Snapshot</h5>
<p>
<ul>
<li>8th Jan 2004 V1.1
<A HREF="http://www.ibphoenix.com/downloads/SetupOdbcJdbc.exe">Installable Windows Snapshot</A> (.exe) (526k)
<li>29th Mar 2004 V1.2 (Beta2 V1.02.0059)
<A HREF="http://www.ibphoenix.com/downloads/SetupOdbcJdbcBeta2.exe">Installable Windows Snapshot</A> (.exe) (549k)
</ul>
</p>

<h5>V1.1 Latest Libraries</h5>

<p>
<ul>
<li>8th Jan 2004
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_Snapshot.tar.gz">Linux Shared Libraries</A> (.tar.gz) (176k)
<li>8th Jan 2004
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_Snapshot.zip">Windows Dll's</A> (.zip) (168k)
<LI>8th Jan 2004
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_Snapshot_src.zip">Source Code</A> (.zip) (400k)
</ul>
</p>

<h5>V1.2 (Beta2 V1.02.0059) Latest Libraries</h5>
<p>
<ul>
<li>29th Mar 2004
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbcBeta2.tar.gz">Linux Shared Libraries</A> (.tar.gz) (209k)
<li>29th Mar 2004
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_Beta2.zip">Windows Dll's</A> (.zip) (189k)
<LI>29th Mar 2004
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_Beta2_src.zip">Source Code</A> (.zip) (431k)
</ul>

</p>

<p>
To install the snapshot on Windows:<br>
<ul>
<li>Download the last installable snapshot
<li>Install
<li>Update the Windows&#92;System32 files:
 <ul>
  <li>OdbcJdbcSetup.dll
  <li>OdbcJdbc.dll
  <li>IscDbc.dll
 </ul>
</ul>

</p>

<p>Or<br>
<ul>
<li> Run regsvr32.exe ./OdbcJdbcSetup.dll
</ul>
</p>

<p>
To install the snapshot on Linux/Unix:<br>
</p>
<ul>
<li>Download a copy of ODBCConfig from <a href="http://www.unixodbc.org">unixodbc.org</a>

</ul>
</p>
<p>Or<br>
<ul>
<li>Read the instructions located in the source at<br> OdbcJdbc&#92;Builds&#92;Gcc.lin&#92;readme.linux<br>
to manually set up the driver.
</ul>
</p>
<h5>Examples</h5>

<ul>
<li>22nd Feb 2003 
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_Examples.zip">Examples</a>  (.zip) (27k) <br>
Use SQLPutData and SQLGetData, SQLBindCol, SQLBindParam (for blob TEXT and blob BLR), insert procedure, select data from procedure (suspend), select data from execute procedure (1 row). Using multiple threads over a single connection. Two phase commit.
</ul>

<h5>Examples Using ADO (VB)</h5>
<ul>
<li>17th Dec 2003 
<A HREF="http://www.ibphoenix.com/downloads/OdbcJdbc_ExamplesAdo.zip">Examples</a>  (.zip) (7k) <br>

This sample demonstrates the use of ADO from VBScript and HTML, and shows how VBScript and HTML on the client can be used to build a two tier web application for an Intranet.</ul>

