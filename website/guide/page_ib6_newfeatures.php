<?php
if (eregi("page_ib6_newfeatures.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>What is Firebird RDBMS ?</H4>
<UL>
<LI> <A HREF="#IBConsole">IBConsole</A> </LI>
<LI> <A HREF="#Dialects">Dialects</A> </LI>
<LI> <A HREF="#Delim ID">Delimited Identifiers</A> </LI>
<LI> <A HREF="#IBX">InterBase Express (IBX) for Delphi 5</A> </LI>
<LI> <A HREF="#int64">Large Exact Numerics</A> </LI>
<LI> <A HREF="#datetime">SQL DATE, TIME, and TIMESTAMP datatypes</A> </LI>
<LI> <A HREF="#current">New operators for retrieving current time, date, and
timestamp</A> </LI>
<LI> <A HREF="#extract">New operator to extract information from datetime
datatypes</A> </LI>
<LI> <A HREF="#alter">ALTER COLUMN and ALTER DOMAIN statements</A> </LI>
<LI> <A HREF="#read-only">Read-only databases</A> </LI>
<LI> <A HREF="#keywords">New SQL Keywords</A> </LI>
<LI> <A HREF="#warnings">Updated status vector and SQL Warnings</A> </LI>
<LI> <A HREF="#gbak">New <B>gbak</B> functionality</A> </LI>
<LI> <A HREF="#services api">Services API</A> </LI>
<LI> <A HREF="#install api">Install API</A> </LI>
<LI> <A HREF="#unix client">InterBase Client for Unix</A> </LI>
</UL>
<DIV>
<H5><A NAME="IBConsole"></A>IBConsole</H5>
<P> InterBase provides an integrated graphical user interface called IBConsole.
Using IBConsole, you can configure and maintain an InterBase server, create and
administer databases on the server, and execute interactive SQL, manage users,
and administer security. </P>
<P> IBConsole is a GUI front end for interBase's command-line tools. It
replaces the Server Manager and InterBase Windows ISQL interfaces found in
earlier versions of InterBase. </P>
<P> IBConsole runs on Windows, but can manage databases on any InterBase server
on the local network, and on UNIX, Linux, and NetWare. </P>
<P> You can use IBConsole to: </P>
<UL>
<LI> Perform data entry and manipulation </LI>
<LI> Configure and maintain a server </LI>
<LI> Enter and execute interactive SQL </LI>
<LI> Manage server security </LI>
<LI> Backup and restore a database </LI>
<LI> View database and server statistics </LI>
<LI> Validate the integrity of a database </LI>
<LI> Sweep a database </LI>
<LI> Recover &quot;in limbo&quot; transactions </LI>
</UL>
<H5> <A NAME="Dialects"></A> Dialects </H5>
<P> InterBase 6 introduces the concept of dialects to allow users to move ahead
with new features that are incompatible with older versions of InterBase:
delimited identifiers, large exact numerics, and the SQL DATE, TIME, and
TIMESTAMP datatypes. </P>
<P> As InterBase moves forward in complying with SQL standards, some new
features and usages are incompatible with older usage. Dialects assist in this
transition. Dialect 1 guarantees compatibility with older databases and
clients. Dialect 3 allows full access to new features. There is also a dialect
2 available for clients. It is a diagnostic mode only. </P>
<P> <B>Transition features:</B> <BR>
Features that behave differently in dialect 1 and dialect 3 are called
transition features. The transition features are: </P>
<UL>
<LI> Anything delimited by double quotes </LI>
<LI> Date/time datatypes </LI>
<LI> Large exact numerics (DECIMAL and NUMERIC datatypes with precision greater
than 9) </LI>
</UL>
<P>Both clients and databases must be assigned a dialect. Databases are created
in dialect 3 by default. The isql client takes on the dialect of the database
to which it is attached unless you specify a different dialect. </P>
<P> The following section describes the differences between dialects. </P>
<P> <B>Features that are the same in all dialects</B> <BR>
The following InterBase 6 features are available in both dialect 1 and dialect
3: </P>
<UL>
<LI> IBConsole </LI>
<LI> The ALTER COLUMN clause of the ALTER TABLE statement </LI>
<LI> The TIMESTAMP datatype, which is the equivalent of the DATE datatype in
earlier versions of InterBase </LI>
<LI> The EXTRACT() function and CURRENT_TIMESTAMP </LI>
<LI> Read-only databases </LI>
<LI> SQL warnings </LI>
<LI> The Services API, Install API, and Licensing API </LI>
<LI> InterBase Express (IBX) components in Delphi 5 </LI>
</UL>
<P> <B>DIALECT 1</B> <BR>
In version 6 dialect 1, the transition features behave in the InterBase 5
manner: </P>
<UL>
<LI> String constants can be delimited by either single or doubles quotes.
Dialect 1 does not recognize delimited identifiers. </LI>
<LI> The DATE datatype is not available, but is replaced by the TIMESTAMP
datatype, which contains both date and time information. When an InterBase
version 5 database is restored as version 6, datatypes that were formerly DATE
are restored as TIMESTAMP. </LI>
<LI> DECIMAL and NUMERIC datatypes with precision larger than 9 are stored as
floating point numbers. </LI>
</UL>
<P> <B>DIALECT 2</B> <BR>
Clients can be assigned dialect 2. In this mode, they issue errors whenever
they encounter double quotes, DATE datatypes, or NUMERIC/DECIMAL datatypes with
precision greater than 9. This behavior is intended to alert the developer to
potential problem areas during migration and is not useful for production
purposes. To detect problem areas in the metadata of a database that you are
migrating, extract the metadata and run it through a version 2 client, which
will report all instances of transition features. For example: </P>
<PRE>

isql -i v5metadata.sql

</PRE>

<P>Do not assign dialect 2 to databases. </P>
<P> <B>DIALECT 3</B> <BR>
The following features are unique to dialect 3 and are incompatible with
dialect 1 and all older InterBase databases and clients: </P>
<UL>
<LI> String constants must be delimited by single quotes. Double quotes are
used only for delimited identifiers. </LI>
<LI> The DATE datatype holds only date information. Two new datatypes are
available: a TIME datatype that holds only time information, and a TIMESTAMP
datatype that holds the whole timestamp. TIMESTAMP replaces the functionality
of the DATE datatype in earlier versions of InterBase. In addition, dialect 3
provides the CURRENT_DATE, CURRENT_TIME, and CURRENT_TIMESTAMP functional
operators. </LI>
<LI> DECIMAL and NUMERIC datatypes with precision larger than 9 are stored as
64-bit exact numerics if they are created in dialect 3. Note that columns that
have such datatypes are still stored as floating point if they are migrated
from an earlier version. See the migration chapter in Getting Started for more
information on migrating columns to INT64 exact numerics. </LI>
</UL>
<H5> <A NAME="Delim ID"></A> SQL Delimited Identifiers </H5>
<P> InterBase now supports SQL delimited identifiers. Delimited identifiers are
database object names that are delimited by double quotes. SQL delimited
identifiers are permitted only in InterBase 6 clients and databases using
dialect 3. </P>
<P> In InterBase 6 clients and databases using dialect 3, a string constant is
delimited by single quotes, and an SQL delimited identifier is delimited by
double quotes. Because the quotes delimit the boundaries of the name, the
possibilities for object names are greatly expanded from previous versions of
InterBase. </P>
<P> InterBase object names can now: </P>
<UL>
<LI> Be a keyword </LI>
<LI> Use spaces, except for trailing spaces </LI>
<LI> Use non-ASCII characters </LI>
<LI> Be case sensitive </LI>
</UL>
<H5> <A NAME="IBX"></A>InterBase Express (IBX) for Delphi &amp; C++Builder</H5>
<P> Borland Delphi 5 users can now use the InterBase Express (IBX) components
to build InterBase database applications without the overhead of using the
Borland Database Engine (BDE). IBX accesses the InterBase API directly,
allowing increased speed and control within InterBase applications. </P>
<P> The version of IBX that comes with Delphi 5 addresses only InterBase 5
features. The IBX version that is available with InterBase 6 addresses all
InterBase 6 features, using calls to the new Service API, Install API, and
Licensing API, as well as the newest InterBase API. </P>
<P> The InterBase 5 version of IBX provides one additional tab in Delphi,
labelled InterBase, that contains the IBX components for InterBase 5. The
InterBase 6 version of IBX provides two tabs in Delphi: the InterBase tab is
the same as in version 5 IBX; in addition there is an InterBase Admin tab. The
InterBase Admin tab contains components that address the Services API, Install
API, and Licensing API. It contains configuration, backup, restore, licensing,
statistics, logging, and install, and uninstall components. The InterBase Admin
tab is found at the extreme right of the tabs in Delphi 5. You will have to
scroll to find it. </P>
<H5><A NAME="int64"></A>Large Exact Numerics </H5>
<P> In dialect 3, InterBase 6 conforms with the SQL92 standard by storing
NUMERIC and DECIMAL datatypes with 10 to 18 digits of precision as 64-bit
integers (INT64 datatype). InterBase has always implemented NUMERIC and DECIMAL
datatypes with precision less than 10 as exact numerics, but those with
precision of 10 thorugh 15 were implemented as DOUBLE PRECISION. Now, NUMERIC
and DECIMAL datatypes are all stored as exact numerics. They are 16, 32, or 64
bit, depending on the precision. NUMERIC and DECIMAL datatypes with precision
greater than 9 are referred to as &quot;large exact numerics&quot; in this
discussion. </P>
<UL>
<LI> These new 64-bit integer types are available in all contexts where
datatypes are defined or used. </LI>
<LI> NUMERIC and DECIMAL datatypes with a precision of 9 and scale S that
caused arithmetic error messages in InterBase 5 return correct 64-bit results
in InterBase 6. </LI>
<LI> When an arithmetic operation on exact numeric types overflows, InterBase 6
reports an overflow error, rather than returning an incorrect value. </LI>
<LI> If one operand is an approximate numeric, then the result of any dyadic
operation (addition, subtraction, multiplication, division) is DOUBLE
PRECISION. </LI>
<LI> Any value that can be stored in a DECIMAL(18,S) can also be specified as
the default value for a column or a domain. </LI>
</UL>
<H5> <A NAME="datetime"></A> SQL DATE, TIME, and TIMESTAMP datatypes </H5>
<P> The old InterBase DATE datatype, which contains both date and time
information, is being replaced with the SQL92 standard TIMESTAMP, DATE, and
TIME datatypes in dialect 3. </P>
<UL>
<LI> In dialect 1, only TIMESTAMP is available. TIMESTAMP is the equivalent of
the DATE datatype in previous versions. When you back up an older database and
restore it in version 6, all the DATE columns and domains are automatically
restored as TIMESTAMP. </LI>
<LI> In dialect 3, TIMESTAMP functions as in dialect 1, but two additional
datatypes are available: DATE and TIME. These datatypes function as their names
suggest: DATE holds only date information and TIME holds only time. </LI>
</UL>
<P>TIMESTAMP is a 64-bit datatype and DATE and TIME are 32-bit datatypes. </P>
<H5> <A NAME="current"></A> New operators for retrieving current time, date,
and timestamp </H5>
<P> The CURRENT_DATE, CURRENT_TIME, and CURRENT_TIMESTAMP functional operators
return the date and time values based on the moment of execution of an SQL
statement using the server's clock and time zone. It is no longer necessary to
cast TODAY or NOW as DATE to obtain the current date, time, or timestamp. </P>
<P> For a single SQL statement, the same value is used for each evaluation of
CURRENT_DATE, CURRENT_TIME, and CURRENT_TIMESTAMP within that statement. This
means that if multiple rows are updated, as in the following statement, each
data row will have the same value in the aTime column. </P>
<PRE>

UPDATE aTable SET aTime = CURRENT_TIME;

</PRE>

<P>Similarly, if row buffering occurs in a fetch via the remote protocol, then
the CURRENT_TIME is based on the time of the OPEN of the cursor from the
database engine, and not the time of delivery to the client. </P>
<H5> <A NAME="extract"></A> New operator to extract information from datetime
datatypes </H5>
<P> The EXTRACT() function extracts date and time information from databases. 
</P>
<P> EXTRACT() has the following syntax: </P>
<PRE>

EXTRACT ( part FROM value)

</PRE>

<P>The value passed to the EXTRACT() expression must be DATE, TIME, or
TIMESTAMP. Extracting a part that doesn't exist in a datatype results in an
error. For example: </P>
<PRE>

EXTRACT (TIME FROM aTime)

</PRE>

<P>A statement such as EXTRACT (YEAR from aTime) would fail. </P>
<H5> <A NAME="alter"></A> ALTER COLUMN and ALTER DOMAIN statements </H5>
<P> You can now alter the name, datatype, and position of a column using the
ALTER COLUMN clause of the ALTER TABLE statement. Extensions to the ALTER
DOMAIN statement allow you to alter the name and datatype of a domain. This
functionality is available in InterBase 6 dialects 1 and 3. </P>
<P> The new ALTER COLUMN clause of the ALTER TABLE statement allows you to
change: </P>
<UL>
<LI> The datatype of a field </LI>
<LI> The name of a field </LI>
<LI> The position of a field with respect to the other fields </LI>
</UL>
<P>The ALTER DOMAIN statement has new options that allow you to change the name
and datatype of a domain. </P>
<P> The ALTER COLUMN clause of ALTER TABLE and the TYPE clause of ALTER DOMAIN
do not allow you to make datatype conversions that could lead to data loss. For
example, they do not allow you to change the number of characters in a column
to be less than the largest value in the column. </P>
<H5> <A NAME="read-only"></A> Read-only Databases </H5>
<P> You can now change InterBase databases to read-only mode. This provides
enhanced security for databases by protecting them from accidental or malicious
updates. Databases are always in read-write mode at creation time. You can
change any InterBase 6 database, regardless of dialect, to read-only mode using
gbak or gfix. </P>
<P> An InterBase 5 or older client can select from a read-only database.
However, these older clients cannot distinguish between a read-only and
read-write database. If an older client attempts to do anything other than
select from an read-only database, the attempt fails with an error. </P>
<H5> <A NAME="keywords"></A> New SQL Keywords </H5>
<P> InterBase 6 introduces the following new keywords: </P>
<TABLE BORDER="0">
<TR>
<TD><P>COLUMN</P>
</TD>
<TD><P>SECOND</P>
</TD>
</TR>
<TR>
<TD><P>CURRENT_DATE</P>
</TD>
<TD><P>SQL</P>
</TD>
</TR>
<TR>
<TD><P>CURRENT_TIME</P>
</TD>
<TD><P>TIME</P>
</TD>
</TR>
<TR>
<TD><P>CURRENT_TIMESTAMP</P>
</TD>
<TD><P>TIMESTAMP</P>
</TD>
</TR>
<TR>
<TD><P>DAY</P>
</TD>
<TD><P>TYPE</P>
</TD>
</TR>
<TR>
<TD><P>EXTRACT</P>
</TD>
<TD><P>WEEKDAY</P>
</TD>
</TR>
<TR>
<TD><P>HOUR</P>
</TD>
<TD><P>YEAR</P>
</TD>
</TR>
<TR>
<TD><P>MINUTE</P>
</TD>
<TD><P>YEARDAY</P>
</TD>
</TR>
<TR>
<TD><P>MONTH</P>
</TD>
</TR>
</TABLE>
<P> If you want to use these keywords as object names in databases using
dialect 3, then you must delimit them with double quotes. </P>
<H5> <A NAME="warnings"></A> Updated status vector and SQL Warnings </H5>
<P> The InterBase status vector is a mechanism that holds information about the
current operation, where it is accessed via API calls. In previous versions of
InterBase, the status vector contained only the error code, but in InterBase 6
it also contains the information about the source of the error message, and the
error message type, one of error, warning, or informational. Warning and
informational messages do not impede normal client/server operations, but may
advise the client of a problem that needs investigation. </P>
<P> Warnings can be issued for the following conditions: </P>
<UL>
<LI> SQL statements with no effect </LI>
<LI> SQL expressions that produce different results in InterBase 5 versus
InterBase 6 </LI>
<LI> API calls which will be replaced in future versions of the product </LI>
<LI> Pending database shutdown </LI>
</UL>
<H5> <A NAME="gbak"></A> New gbak functionality </H5>
<P> The InterBase 6 gbak command incorporates the functionality of the version
5 gsplit utility, allowing the database owner or SYSDBA to back up to and
restore from multiple files. </P>
<P> gbak now allows you to set databases to read-only with the -mode read_only
switch. </P>
<P> You can use gbak's new -service switch to perform server-side backups. In
this mode, gbak uses the new Services API and performs the backups on the
server, incurring significantly less network traffic. Previously, backups were
all performed on the client. </P>
<P> When using the -service switch, make sure that all path names to databases
and backup files must be given relative to the server. </P>
<P> When backing up without using the Services API, backups are performed on
the client platform where gbak is running. All pathnames to databases and
backup files must be given relative to the client. </P>
<H5> <A NAME="services api"></A> Services API </H5>
<P> The InterBase 6 Services API allows you to write applications that monitor
and control InterBase servers and databases. Tasks that you can perform with
this API include: </P>
<UL>
<LI> Performing database maintenance tasks such as database backup and restore,
shutdown and restart, garbage collection, and scanning for invalid data
structures </LI>
<LI> Creating, modifying, and removing user entries in the security database 
</LI>
<LI> Administering software activation certificates </LI>
<LI> Requesting information about the configuration of databases and the server
</LI>
</UL>
<P>The features that you can exercise with the Services API include those of
the command-line tools gbak, gfix, gsec, gstat, and iblicense. The Services API
can also perform other functions that are not provided by these tools. </P>
<H5> <A NAME="install api"></A> Install API </H5>
<P> InterBase provides developers with a new group of functions that facilitate
the process of silently installing InterBase as part of an application install
on the Win32 platform. In addition, it allows you to interact with users if
desired, to gather information from them and to report progress and messages
back to them. </P>
</DIV>
<p>
Back to <A href=index.php?op=guide&amp;id=rdbms>Guide to Firebird RDBMS</A>
