<?php
if (eregi("page_fb1_faq.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>This is a collection of notes concerning issues that have arisen subsequent
to the release of Firebird V1.0 final.</H4>
<H4 CLASS="green">When can we expect to see the fixes for the issues raised in this document?
</H4>
<P> Work is underway to address issues as they are raised. No decision has yet
been taken on how to make the fixes available or what the likely timescale will
be. Watch this space. </P>
<H4 CLASS="green">The Win32 install says it is build 796. The binaries return build number
794. Which is correct?</H4>
<P>Paul Reeves writes:</P>
<P> <CITE>796. </CITE></P>
<P> Actually this is one of those Aarghh! moments. A single change was made
between build 794 and 796, to fix a multi-file backup problem. The binaries
were rebuilt. Every part of the build picks up new files and refreshes as
appropriate - except for one thing. Resource files do not get refreshed, even
if the resource script has been changed (which it was). </P>
<P> This has bitten me before and seems to have bitten everyone at some time or
other who has (re)built the Win32 source for Firebird. I guess this will be the
first item in a FAQ about the final release. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - To be fixed.<br>
Severity (0-5) - 0</FONT></H5>
<H4 CLASS="green">Until now it was legal to have statements like: </H4>
<PRE>
INSERT INTO MYTABLE ( MYTABLE.MY_ID, MYTABLE.MY_INTEGER )
VALUES ( 1, 2  );
</PRE>

<P>Now this won't work unless I omit the MYTABLE in front of the fieldnames.
Some tools and middleware (including IB_SQL) generate insert statements that
use table names to qualify column names. Firebird 1.0 final seems to have
decided that it doesn't like this, but failed to tell anyone. An error similar
to the following appears:</P>
<PRE><CODE>
Statement failed, SQLCODE = -104

Dynamic SQL Error
-SQL error code = -104
-Token unknown - line 1, char 28
-.</CODE></PRE>

<P>Interpretation of the SQL standard is equivocal on the issue of using
tablenames to qualify column names. Strictly speaking they are unnecessary
because the standard for INSERT only supports inserting into a single table.
However, using qualified column names has long been allowed in InterBase and
Firebird and as it doesn't grossly violate ANSI SQL rules it has been decided
to re-instate this 'feature'. </P>
<P> There is a fix available for IB_SQL users from
<A
 HREF="http://users.tpg.com.au/helebor/">http://users.tpg.com.au/helebor/</A>. 
</P>
<P> IBObjects users can apply a simple fix. Jason Wharton writes:</P>
<P> <CITE>The quick fix in the IBO code is very simple. Here it is: </CITE></P>
<P> In the file IBA_UpdateSQL.IMP there is the place where it generates the SQL
for doing inserts. (Search for INSERT INTO and look above that. Around line
530.) There is a string variable 'ss' that is storing the text for the columns
in the list. It is using the table name and a period prefixing the column name.
Simply remove the two places where it is doing this. The property being read
for the table name is RelName. </P>
<P> In the meantime, the only workaround for other users is to not qualify
columns with the tablename in an insert query.</P>
<P> The problem largely affects applications that have already been deployed.
This has been the motivating factor in providing a fix to the engine itself. 
</P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Fixed internally. Awaiting testing.<br>
Severity (0-5) - 3</FONT></H5>
<H4 CLASS="green">I've installed Firebird WI-V6.2.794 Firebird 1.0 (Final release) on Win 98 but i can't start ibguard. I get this error message:<BR>
'The registry information is missing. Please run the Firebird Server
Configuration Utility.'</H4>
<P> The short answer is that no work has been done to support installing the
guardian on Win9x. No-one on the Firebird project seems to be using Win95 or
Win98. If they are, they are keeping quiet about it. </P>
<P> The guardian will run as an application under Win9x. Check the registry for
entries like this: </P>
<PRE>
[HKEY_LOCAL_MACHINE\SOFTWARE\Borland\InterBase\CurrentVersion]
&quot;RootDirectory&quot;=&quot;v:\\firebird\\&quot;
&quot;Version&quot;=&quot;WI-V6.2.794 Firebird 1.0&quot;
&quot;ServerDirectory&quot;=&quot;v:\\firebird\\bin\\&quot;
&quot;GuardianOptions&quot;=&quot;1&quot;
</PRE>

<P>You need to add the last entry - GuardianOptions. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - To be fixed<br>
Severity (0-5) - 1</FONT></H5>
<H4 CLASS="green">Installing Firebird over an existing InterBase install or InterBase over an existing Firebird install makes a muddle of things.</H4>
<P>This is true. It is not recommended to do that. Preferably you should
uninstall one before installing the other. If you can't or don't want to do
that it is advisable to at least install them to different directories.</P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - Not a bug.<br>
Severity (0-5) - Not relevant</FONT></H5>
<H4 CLASS="green">Help - I can't restore my database! I get </H4>
<PRE>
<CODE>
   gbak: ERROR: Implementation limit exceeded
   gbak: ERROR:     block size exceeds implementation restriction
   gbak: Exiting before completion due to errors</CODE></PRE>

<P> Firebird 1.0 now tests that expressions do not exceed the maximum size of a
column (32,767 bytes). Previously no checks were made. This could lead to the
server crashing so the decision was taken to apply this test. However, if a
stored procedure contains such an expression the restore will fail. Currently
we are considering raising this limit to the maximum size of a row (65,535
bytes).</P>
<P> Here is an example of code that will cause this error: </P>
<PRE><CODE>
DECLARE EXTERNAL FUNCTION TRIM
    CSTRING(32767)
    RETURNS CSTRING(32767) FREE_IT
    ENTRY_POINT 'IB_UDF_rtrim' MODULE_NAME 'ib_udf';

CREATE PROCEDURE sp_getgeneratorname(TABLENAME VARCHAR(31))
    RETURNS (GENERATORNAME VARCHAR(31))
  AS
  begin
    select RDB$GENERATOR_NAME
    from RDB$GENERATORS
    where RDB$GENERATOR_NAME='GEN_ID_'||UPPER(TRIM(:tablename))
    into :generatorname;
    suspend;
  end
</CODE></PRE>

<P>Even with the proposed fix it is still possible that an expression may
exceed the limit. </P>
<H5 CLASS="blue"><FONT COLOR="#0000FF">Status - An enhancement is under consideration<br>
Severity (0-5) - 5. Serious for those affected but not a bug.</FONT></H5>

<p>
Back to <A href=index.php?op=files&amp;id=fb10>Firebird 1.0</A> downloads.