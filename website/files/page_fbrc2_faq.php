<?php
if (eregi("page_fbrc2_faq.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4 CLASS="blue">A collection of notes relating to RC2</H4>
<P>Just in time for Christmas. This is a bugfix release for many of the issues
you may have experienced with RC1. With the added bonus of SuperServer with
64-bit I/O support for Linux.</P>
<H4 CLASS="green">Problem with the 64bit integers, Dialect1 and SELECT FIRST
</H4>
<P>The following query:</P>
<PRE>SELECT FIRST(?Param1)  Field1, Field2, ... , 
FROM TABLE1
doesn't prepare with isc_dsql_prepare()

message :
&quot;Dynamic SQL error.
SQL error code = -804
Data type unknown.
Client SQL dialect 1 does not support reference
to 64-bit numeric datatype.&quot;

[...]</PRE>

<H4 CLASS="green">Prblem with the RECREATE PROCEDURE statement.</H4>
<P>I'm running the following command on a Firebird RC1 server: </P>
<PRE>SET TERM ^! ;
RECREATE PROCEDURE USP_TEST
AS
DECLARE VARIABLE TEST2 INTEGER;
BEGIN
TEST2 = GEN_ID(USER_ID, 1);
END ^!
set term ;^!</PRE>

<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fix pending for 1.0</FONT></H5>
<P>The generator USER_ID exists, but the command fails with the following
message:</P>
<PRE>SQL&gt; input c:\databases\test.sql;
Statement failed, SQLCODE = -206

Dynamic SQL Error
-SQL error code = -206
-Column unknown
-TEST2
-At line 5, column 3.
SQL&gt;</PRE>

<P>This error only happens when you use input params or local variables.</P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed, but not in RC2, fix will
appear in 1.0</FONT></H5>
<H4 CLASS="green">Problems with Gbak restore and metadata with long names.</H4>
<P>If you were restoring tables with names that were 32 characters, these were
being incorrectly truncated to 31 characters.</P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2</FONT></H5>
<H4 CLASS="green">Unecessary UDF library log messages appearing in the log
file.</H4>
<P>The following log entries were being generated in the log file unecessarily.
</P>
<PRE>linux (Server)  Mon Dec 10 17:33:54 2001
GDS_A: not in a valid UDF directory</PRE>

<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2 - Moved to DEV
BUILD only</FONT></H5>
<H4 CLASS="green">The original Win32 binary snapshot had the wrong FILEVERSION
number.</H4>
<P>FILEVERSION is a hidden version resource stored as an integer. It is not
visible from File | Properties. However, it is used by installation scripts to
determine the version number of executables and dlls. The original release of
the Win32 RC1 binary snapshot carried a FILEVERSION of 7.2. If these files are
left in place it may confuse subsequent attempts to install new versions of
Firebird or InterBase. </P>
<P> If you have been using the original release of RC1 (dated around 13-NOV-01)
it is recommended that you manually delete the files in the \bin directory and,
if necessary, gds32.dll from the %system32% directory, before installing an
installable version of Firebird.</P>
<P> If you are installing from the RC1a binary snapshot then just copy the new
binaries over the old ones (ie, exactly as you did when you first installed
RC1.) </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2</FONT></H5>
<H4 CLASS="green">I thought that Firebird created new databases with Forced
Writes=ON under Win32.</H4>
<P> So did we. This is being looked at. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2</FONT></H5>
<H4 CLASS="green">I have a query which used to work fine. Now I get this error:
</H4>
<PRE>SQL error code = -204 
Ambiguous field name between table/view TOKEN and table/view 
</PRE>

<P> Firebird RC1 rejects queries that reference column names that are
duplicated across table joins. The old behaviour could (and often would)
generate a different result if the table order was inverted. </P>
<P>To simplify migration RC2 now allows ambiguous field names in queries if the
database client is using Dialect 1. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed and Enhanced in
RC2</FONT></H5>
<H4 CLASS="green">Is this why the InterSolv ODBC driver is having trouble
working with RC1?</H4>
<P> Unfortunately, yes. The driver uses ambiguous queries to extract metadata.
RC2 provides a fix for this. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2</FONT></H5>
<H4 CLASS="green">I heard that there is a bug with using Delete and the new
FIRST statement.</H4>
<P>Yes. This is true. And it is worth repeating again, because it is an easy
way to accidentally delete all the data from a table. Delete and Commands like:
</P>
<PRE>delete from table where col in (select col first 5 from table);</PRE>

<P>don't delete up to five rows, but the whole table. Obviously the subselect
is executed for each row in master table. FIRST should put a brake on that but
currently it is not. </P>
<H5 CLASS="red">Status - Outstanding. Not fixed in RC2</H5>
<H4 CLASS="green">When I put -- comments anywhere into an SQL script I get
something like </H4>
<PRE>-SQL error code = -104
-Token unknown - line N, char X
</PRE>

<P>However, it seems to be OK in the sub-scripts. </P>
<P> Yes, ISQL has trouble with -- style comments out. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2</FONT></H5>
<H4 CLASS="green">Are you sure that the Linux build is 64bit? I tried to
restore database and gbak terminated on 2Gb size.</H4>
<P> No, the Linux build does not yet have 64-bit file i/o. The code has been
added to the source tree, but we have not yet compiled and tested it properly
for Linux. Currently the only platforms it is working on are Win32 and Darwin. 
</P>
<P> When it is available it will probably be as a separately compiled binary
and will be marked as such. This is because 64-bit file i/o support is not
ubiquitous on Linux. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Fixed in RC2</FONT></H5>
<H4 CLASS="green"> The Release Notes have very little information about the
Firebird open bug list. Where can I find out more? </H4>
<P> More details are available in the <A
HREF="FirebirdBugsOpen.html" tppabs="http://www.ibphoenix.com/FirebirdBugsOpen.html">FirebirdBugsOpen.html</A>. This is in the doc
directory of the Windows zipped binary release. You can then click on the
Sourceforge ID and jump straight to the original reports and any subsequent
comments at the Firebird site on Sourceforge. </P>
<P> Alternatively go to the
<A
 HREF="http://sourceforge.net/tracker/?atid=109028&amp;group_id=9028&amp;func=browse">Sourceforge</A>
to browse the Bug Tracker database. </P>
<H4 CLASS="green">The release notes mention FBUDF.DLL. I can't find it. </H4>
<P> Good point. It got missed from the build process. Expect to see it posted
soon. </P>
<H4 CLASS="green">Trigger Position is ignored in RC1.</H4>
<P> Beware if you have a database that relies on the trigger position value to
control the firing sequence. It is currently ignored. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed in RC2</FONT></H5>
<H4 CLASS="green">The following query worked fine under beta 2 but doesn't work
under RC1: </H4>
<PRE>SELECT X.CUST_NO, ABS(SUM(X.TOTAL_VALUE))
FROM SALES X
GROUP BY X.CUST_NO;
</PRE>

<P>InterBase has never allowed group by statements on user-defined functions
(UDFs). Firebird added that capability but the results are not yet consistent,
so the feature has been withdrawn. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Possibly fixed and
re-introduced in RC2 - but feature has not been fully tested.</FONT></H5>

<p>
Back to <A href=index.php?op=files&amp;id=fbrc2>Firebird 1.0 RC2</A> downloads.