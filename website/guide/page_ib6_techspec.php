<?php
if (eregi("page_ib6_techspec.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>InterBase Technical Specification</H4>
<H5> Database Statistics (Upper Limits) </H5>
<P> <B>Maximum size of database:</B> 32TB using multiple files; largest
recorded InterBase database in production is over 200GB </P>
<P> <B>Maximum size of one file:</B> 4GB on most platforms; 2GB on some
platforms </P>
<P> <B>Maximum number of tables:</B> 64K Tables </P>
<P> <B>Maximum size of one table:</B> 32TB </P>
<P> <B>Maximum number of rows per table:</B> 4GB Rows </P>
<P> <B>Maximum row size:</B> 64K </P>
<P> <B>Maximum number of columns per table:</B> Depends on the datatypes you
use. (Example: 16,384 INTEGER (4 byte) values per row.) </P>
<P> <B>Maximum number of indexes per table:</B> 64KB indexes </P>
<P> <B>Maximum number of indexes per database:</B> 4G indexes </P>
<H5> InterBase Datatype Specifics </H5>
<TABLE BORDER="0" CELLSPACING="10" WIDTH="85%">
<TR>
<TD WIDTH="10%" ALIGN="CENTER" BGCOLOR="#FFFFFF"><B>Name</B></TD>
<TD WIDTH="10%" ALIGN="CENTER" BGCOLOR="#FFFFFF"><B>Size</B></TD>
<TD WIDTH="30%" ALIGN="CENTER" BGCOLOR="#FFFFFF"><B>Range/Precision</B></TD>
<TD WIDTH="50%" ALIGN="CENTER" BGCOLOR="#FFFFFF"><B>Description</B></TD>
</TR>
<TR>
<TD WIDTH="10%">Varchar(n)</TD>
<TD WIDTH="10%">n chars</TD>
<TD WIDTH="30%">1 to 32767 bytes</TD>
<TD WIDTH="50%">Variable length char or text string</TD>
</TR>
<TR>
<TD WIDTH="10%">Smallint</TD>
<TD WIDTH="10%">16 bits</TD>
<TD WIDTH="30%">-2^15 to 2^15-1</TD>
<TD WIDTH="40%">Signed short (word)</TD>
</TR>
<TR>
<TD WIDTH="10%">Integer</TD>
<TD WIDTH="10%">32 bits</TD>
<TD WIDTH="30%">-2^31 to 2^31-1</TD>
<TD WIDTH="50%">Signed long (longword)</TD>
</TR>
<TR>
<TD WIDTH="10%">Float</TD>
<TD WIDTH="10%">32 bits</TD>
<TD WIDTH="30%">3.4 x 10^-38 to 3.4 x 10^38</TD>
<TD WIDTH="50%">7 digit precision</TD>
</TR>
<TR>
<TD WIDTH="10%">Double Precision</TD>
<TD WIDTH="10%">64 bits</TD>
<TD WIDTH="30%">1.7 x 10^-308 to 1.7 x 10^308</TD>
<TD WIDTH="50%">15 digit precision</TD>
</TR>
<TR>
<TD WIDTH="10%">*Timestamp</TD>
<TD WIDTH="10%">64 bits</TD>
<TD WIDTH="30%">1 Jan 100 a.d. to 28 Feb 32768 a.d.</TD>
<TD WIDTH="50%">Includes time and date</TD>
</TR>
<TR>
<TD WIDTH="10%">**Date</TD>
<TD WIDTH="10%">32 bits</TD>
<TD WIDTH="30%">1 Jan 100 a.d. to 29 Feb 32768 a.d.</TD>
<TD WIDTH="50%"></TD>
</TR>
<TR>
<TD WIDTH="10%">*Time</TD>
<TD WIDTH="10%">32 bits</TD>
<TD WIDTH="30%">0:00 AM to 23:59.9999 PM</TD>
<TD WIDTH="50%"></TD>
</TR>
<TR>
<TD WIDTH="10%">Blob</TD>
<TD WIDTH="10%">&lt;32GB</TD>
<TD WIDTH="30%"></TD>
<TD WIDTH="50%">Stores data of variable indeterminate size</TD>
</TR>
<TR>
<TD WIDTH="10%">***Numeric (<I>precision, scale</I>)</TD>
<TD WIDTH="10%">Variable (16, 32, or 64)</TD>
<TD WIDTH="30%">specifies exactly <I>precision</I> digits of precision</TD>
<TD WIDTH="50%">Example: <B>Numeric(10,3)</B> holds numbers accurately in the
following format: <B>ppppppp.sss</B></TD>
</TR>
<TR>
<TD WIDTH="10%">***Decimal (<I>precision, scale</I>)</TD>
<TD WIDTH="10%">Variable (16, 32, or 64)</TD>
<TD WIDTH="30%">specifies at least <I>precision</I> digits of precision</TD>
<TD WIDTH="50%">Example: <B>Decimal(10,3)</B> holds numbers accurately in the
following format: <B>ppppppp.sss</B></TD>
</TR>
</TABLE>
<P> * New to InterBase V6.0<BR>
** Date datatype holds both date and time information in versions prior to V6.0
<BR>
*** precisions greater than 9 are stored as exact numerics in V6.0 and
non-exact double precision in previous versions.</P>
<p>
Back to <A href=index.php?op=guide&amp;id=rdbms>Guide to Firebird RDBMS</A>
