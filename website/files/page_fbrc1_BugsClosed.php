<?php
if (eregi("page_fbrc1_BugsClosed.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<table>
<tr><td width="100%" valign=top><font face="Verdana">
<h4>RC1- Closed Bugs</h4>
<b> Category: Build Issues                   </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=440543&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
440543
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=440543&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Cannot create tables 0.9.5.260
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
After installing Linux SS version 0.9.5.260 on Mandrake 8.0, when creating new tables:</font><font face="Courier New" size=2><pre>
create table T1( F1 INTEGER NOT NULL PRIMARY KEY);</pre></font><font face="Verdana" size=1>
ERROR:<br>
unsuccessful metadata update<br>
-STORE RDB$RELATIONS failed<br>
-attempt to store duplicate value (visible to active transactions) in unique index RDB$INDEX_1<br>
-null segment of UNIQUE KEY<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=456411&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
456411
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=456411&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
build problem on Solaris 8/AIX 4.3.3
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Hello!<br>
<br>
I have a problem with build some cvs version firebird on Solaris 8/Forte 6U2 and AIX 4.3.3/xlc 5.0.<br>
<br>
1. In generated scl.c file function SCL_init not have latest parameter.<br>
<br>
2. LOCKSMIT _USER/_PASSWORD :)<br>
<br>
3.<br>
  sh -c 'cd source/dsql; make CFLAGS=-xO1 -DHADES -DSOLARIS -DSOLARIS26 -DBSD_COMP<br>
  cc -c -xO1 -DHADES -DSOLARIS -DSOLARIS26 -DBSD_COMP -DEXACT_NUMERICS -Isource/inte<br>
  ./../dsql/keywords.h, line 56: undefined symbol: KW_BREAK<br>
  ./../dsql/keywords.h, line 56: non-constantinitializer: op NAME<br>
  ./../dsql/keywords.h, line 78: undefined symbol: CURRENT_ROLE<br>
  ./../dsql/keywords.h, line 78: non-constant initializer: op NAME<br>
  ./../dsql/keywords.h, line 81: undefined symbol: CURRENT_USER<br>
  ./../dsql/keywords.h, line 81: non-constant initializer: op NAME<br>
  ./../dsql/keywords.h, line 94: undefined symbol: KW_DESCRIPTOR<br>
  ./../dsql/keywords.h, line 94: non-constant initializer: op NAME<br>
  ./../dsql/keywords.h, line 112: undefined symbol: FIRST<br>
  ./../dsql/keywords.h, line 112: non-constant initializer: op NAME<br>
  ./../dsql/keywords.h, line 194: undefined symbol: RECREATE<br>
  ./../dsql/keywords.h, line 194: non-constant initializer: op NAME<br>
  ./../dsql/keywords.h, line 215: undefined symbol: SKIP<br>
  ./../dsql/keywords.h, line 215: non-constant initializer: op NAME<br>
  ./../dsql/keywords.h, line 225: undefined symbol: SUBSTRING<br>
  ./../dsql/keywords.h, line 225: non-constant initializer: op NAME<br>
  parse.c, line 457: cannot recover from previous errors<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: Core Engine                    </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213708&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
213708
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213708&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
-502 Declared cursor already exists
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When connecting to IB60, microfocus COBOL programs receive:<br>
<br>
Dynamic SQL Error<br>
-SQL error code = -502<br>
-Declared cursor already exists<br>
<br>
Host system AIX 4.2.1.0<br>
<br>
The program fails when connecting:<br>
- locally to IB60 on AIX (CLASSIC configuration)<br>
- remotely to IB60 on WINNT (SUPERSERVER configuration)<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=478648&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
478648
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=478648&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Ambiguous fields in UNIONS SELECTS in 1.0.0.338
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Unions that work with earlier versions and use same tables usually get this errors  for example (employee.gdb):</font><font face="Courier New" size=2><pre>
SELECT J.PROJ_ID,J.PROJ_NAME,1
FROM PROJECT J
UNION
SELECT J.PROJ_ID,J.PROJ_NAME,2
FROM PROJECT J

Dynamic SQL Error
SQL error code = -204
Ambiguous field name between table/view PROJECT and
table/view PROJECT PROJ_ID.</pre></font><font face="Verdana" size=1>
In fact,  there is not ambiguity here because each select is independent and has his aliases or tables, traditionally because this ORDER BY clause in UNION must use numbers instead of field names.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223133&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223133
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223133&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Ambiguous self join produce bizarre results
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Doing a self join without assigning alias to both occurrences of the table can be a fatal trap for newbies. I will use a contrives, useless example:</font><font face="Courier New" size=2><pre>
select rdb$relation_name from rdb$relations r
join rdb$relations on rdb$relation_id = r.rdb$relation_id
order by 1</pre></font><font face="Verdana" size=1>
produces a listing of tables, ordered as expected. The first table in the sample db is called A.<br>
<br>
Observe that only one occurrence of rdb$relations is qualified with an alias. Now, by simply assigning the alias to the second occurrence instead of the first one, we force the server to yield incredible results:</font><font face="Courier New" size=2><pre>
select rdb$relation_name from rdb$relations
join rdb$relations r on rdb$relation_id = r.rdb$relation_id
order by 1</pre></font><font face="Verdana" size=1>
produces:<br>
   A<br>
   A<br>
   A<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222476&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
222476
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222476&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Avg and sum return empty field names in dialect 3
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
select avg(1), sum(1) from rdb$database</pre></font><font face="Verdana" size=1>
Using Dialect 1, things work as expected: the first field is named AVG and the second, SUM.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460621&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
460621
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460621&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Blob API v/s embedded blanks in names
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The following API calls will fail if a dialect 3 name with embedded blanks is presented:<br>
<br>
isc_blob_default_desc<br>
isc_blob_lookup_desc<br>
isc_blob_set_desc<br>
<br>
Culprit is get_name() in blob.e.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=476708&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
476708
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=476708&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Blob fileld in where = server crash
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Firebird 1.0.0.338 (Beta 2) Win32 - server crash when in select statement in where section are BLOB fields.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223056&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223056
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223056&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Blob-IDs are sometimes shared between more rows
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
In SP, when you copy record (from/to the same table) by</font><font face="Courier New" size=2><pre>
  INSERT INTO tab SELECT ... FROM tab WHERE ...;</pre></font><font face="Verdana" size=1>
or by</font><font face="Courier New" size=2><pre>
  SELECT ... FROM ... INTO _local_variables_;
  INSERT INTO tab VALUES (_local_variables_);</pre></font><font face="Verdana" size=1>
and the record contains BLOB, then _sometimes_newly created row will not contain its own copy of the BLOB, but instead it will use the same blob-id as the original record. (i.e. single blob is shared among more rows)<br>
<br>
This is really severe bug, because it will cause data lost - when you delete one of these rows, and then try to read the other one, you will get BLOB not found error !!!<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=421260&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
421260
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=421260&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Character length not filled for UDFs
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The case for ODS10 was only written as an stub.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=463596&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
463596
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=463596&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Connection extremely slow in XP
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When making a connection, or disconnection, to local server in Windows XP, it is found that such actions are very very slow! :- (more than 10 sec normally). It was not encountered in using the server in other version of Windows. (I have used it in Win2k, Win98, WinMe). Other things are Ok and fast.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233124&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
233124
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233124&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Connection lost during the bad SQL code execution
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If I try to alter domain with a bit wrong syntax like:</font><font face="Courier New" size=2><pre>
alter domain domain_name set type smallint;</pre></font><font face="Verdana" size=1>
where 'set' is illegal, the connection between server and client is lost with the following well-known error:<br>
<br>
Unable to complete network request to host host_name.<br>
Error writing data to the connection.<br>
unknown Win32 error 10054<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223512&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223512
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223512&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
DROP VIEW shouldn't drop a table.
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Consider:</font><font face="Courier New" size=2><pre>
SQL create table t(a int);
SQL create view v as select a from t;</pre></font><font face="Verdana" size=1>
Then,</font><font face="Courier New" size=2><pre>
SQL drop table v;
SQL drop view t;</pre></font><font face="Verdana" size=1>
This is incorrect behavior, according to SQL standards. A view cannot be dropped as a table and vice versa.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=425949&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
425949
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=425949&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Engine CRASH Error
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
select count(*),adresy.rdb$db_key from adresy</pre></font><font face="Verdana" size=1>
adresy-this is any table<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212406&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212406
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212406&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
FOREIGN KEY is unknown token
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
create table t1 (p1 integer not null primary key);
create table t2 (f2 integer foreign key references t1.p1 on 
  update cascade on delete set null);</pre></font><font face="Verdana" size=1>
SQL error code = -104<br>
Token unknown: foreign<br>
<br>
IB 6.0 SuperServer beta/final, Linux, isql and DSQL API.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227758&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227758
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227758&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Field names with spaces cannot be used in VIEWS
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The following DDL exemplifies more completely the problem I've been encountering with accessing views.</font><font face="Courier New" size=2><pre>
 CREATE DOMAIN IDINTEGER AS INTEGER NOT NULL;
 CREATE DOMAIN IDVARCHAR AS VARCHAR(31) NOT NULL;
 
 CREATE TABLE Company List (
 Company Name  IDVARCHAR NOT NULL PRIMARY KEY,
 Company ID   IDINTEGER NOT NULL UNIQUE );
 
 CREATE TABLE Vendor List (
 Company ID   IDINTEGER NOT NULL PRIMARY KEY,
 Days to Quote Expiration SMALLINT );</pre></font><font face="Verdana" size=1>
The following view is inaccessible.</font><font face="Courier New" size=2><pre>
   CREATE VIEW Vendor Name List (Company ID, Company Name) AS
   SELECT Company ID, Company Name
   FROM Company List CL
   WHERE EXISTS (SELECT * FROM Vendor List VL
     WHERE VL.Company ID = CL.Company ID);</pre></font><font face="Verdana" size=1>
This is a bug in IB: views based on tables whose fields carry spaces in dialect 3 don't work because they can't access those table's fields.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447377&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
447377
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447377&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
GDS error ...can't find tip
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
There is a bug in InterBase 5.6, 6.01, and the current Firebird 0.9-5 beta that causes the lookup of a transaction inventory page to fail if there are more than 32767 transaction pages.  That makes the maximum safe transaction id for a database with:</font><font face="Courier New" size=2><pre>
   1024 byte pages   131,596,287.
   2048 byte pages   265,814,016.
   4096 byte pages   534,249,472.
   8192 byte pages 1,071,120,384.</pre></font><font face="Verdana" size=1>
Although those are large numbers, there was a  particular database exceeded 131 million transactions in six months.  Attempts to attach to the database failed with the error gds internal consistency check, can't find tip.<br>
<br>
Suggestions:<br>
     1) don't use a 1024 byte page size.<br>
     2) do check your next transaction number from time to time.<br>
     3) if you see the next transaction number approaching the limit, backup and restore the database.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227375&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227375
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227375&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Grouping on derived fields processing NULL data kills IB
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The database has the following table:</font><font face="Courier New" size=2><pre>
  CREATE TABLE TWODATE(
    TWODATEID   INTEGER NOT NULL,
    DATEBEGIN   DATE,
    DATEEND     DATE,
  CONSTRAINT PK_TWODATE PRIMARY KEY (TWODATEID));</pre></font><font face="Verdana" size=1>
The table contains several records. Some of the values in the two date fields are null. Furthermore the database has the following view:</font><font face="Courier New" size=2><pre>
  CREATE VIEW CALCDIFF (TWODATEID, DIFFYEAR) AS
    select TwoDateID, extract(year from datebegin) - extract(year from dateend)
    from twodate;</pre></font><font face="Verdana" size=1>
The following Select statement causes a lost connection to database - error:</font><font face="Courier New" size=2><pre>
SELECT DiffYear, count(*) FROM CalcDiff Group by DiffYear;</pre></font><font face="Verdana" size=1>
The error occures only, when<br>
 - there are null values in the database<br>
 - there is a subtraction between the two extract statements<br>
 - the select has a group by statement<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216464&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
216464
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216464&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
IB6 can't connect database placed in non-ASCII directory
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Can't connect to database placed in directory contains non-ASCII characters, such as russian WIN1251.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=217138&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
217138
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=217138&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
JOIN including a complex view kills the server
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The SQL is as follows:</font><font face="Courier New" size=2><pre>
Select distinct fm.code, fm.Description, fm.link
from fullmenu fm join menu_groups mg on fm.code = mg.menu_id</pre></font><font face="Verdana" size=1>
When I try and prepare this I get: "Unable to complete network request to host 10.0.0.200.  Error reading data from the connection and the connection is lost."<br>
<br>
&amp;lt;For full details see original bug report&amp;gt;<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=414833&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
414833
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=414833&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Join Procedure Bug
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
CREATE TABLE TEST_TABLE (
    ID INTEGER NOT NULL,
    DATEBEGIN DATE,
    DATEEND DATE);
 
INSERT INTO TEST_TABLE (ID, DATEBEGIN, DATEEND) VALUES 
  (1, '01/01/2001 00:00:00', '02/01/2000 00:00:00');
 
COMMIT WORK;
 
SET TERM ^ ;
 
CREATE PROCEDURE TEST1 (
    BEGIN_DATE DATE,
    END_DATE DATE)
RETURNS (
    RESULT INTEGER)
AS
begin
   RESULT=0;
   suspend;
end
^
SET TERM ; ^</pre></font><font face="Verdana" size=1>
and try to execute following statement</font><font face="Courier New" size=2><pre>
Select
 h.datebegin,h.dateend
from
 test_table h,
 TEST1(h.datebegin,h.dateend) g</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=456358&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
456358
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=456358&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Long Execution Time of COUNT
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I create a Table 'Transaction_Details' with ~680000 records. When I try to run the following SQL, I find that I must wait the result for a long time (first time ONLY).</font><font face="Courier New" size=2><pre>
SELECT COUNT(*) FROM Transaction_Details;</pre></font><font face="Verdana" size=1>
Execution Time: 36.0850 seconds.<br>
<br>
I suggest that the Total No. of Records of the Table should be calculated and stored in Database. So the above result can be shown at once. (I think it's quit difficult to implement.)<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447535&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
447535
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447535&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
NUMERIC(18,0) as unique index problem
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If you try to execute this script on a firebird server on linux it will report you that there are duplicate values in the index.this also affects primary keys. if you put the CREATE UNIQUE INDEX statement before the INSERT INTO statements everything will work if you don't dereactivate the index or backuprestore the database. it's extremely problematic if you try to backuprestore a database on linux, since you can't restore it if you have used a numeric(18,0) as primary key without deactivating all indexes. and they cannot be reactivated! It seems as the server is using DOUBLE values in some places resulting in rounding of the exact values. the same script, however, works without problems with the win32 version of firebird.</font><font face="Courier New" size=2><pre>
CREATE TABLE BACK_ME_UP (
  ID	NUMERIC(18, 0) NOT NULL);
 
INSERT INTO BACK_ME_UP (ID) VALUES (123456789012345678);
INSERT INTO BACK_ME_UP (ID) VALUES  (123456789012345679);
 
CREATE UNIQUE INDEX IDX_BACK_ME_UP_ID ON BACK_ME_UP(ID);</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=462800&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
462800
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=462800&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Not unique pair in RDB$FORMATS
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
There are following records appeared in RDB$FORMATS table:</font><font face="Courier New" size=2><pre>
RDB$RELATION_ID    RDB$FORMAT
 
232    5
232    5</pre></font><font face="Verdana" size=1>
e.g. query:</font><font face="Courier New" size=2><pre>
select a.rdb$relation_id, a.rdb$format from
rdb$formats a
group by a.rdb$relation_id, a.rdb$format
having  count(a.rdb$format)1</pre></font><font face="Verdana" size=1>
returns records !!!<br>
<br>
Also in RDB$RELATIONS table the field RDB$RELATION_ID = 232, field RDB$FORMAT = 4 !<br>
<br>
e.g. query:</font><font face="Courier New" size=2><pre>
select a.rdb$format, a.rdb$relation_name from rdb$relations a
where exists (select * from rdb$formats b 
  where b.rdb$relation_id = a.rdb$relation_id 
  and b.rdb$format  a.rdb$format)</pre></font><font face="Verdana" size=1>
returns records too!<br>
<br>
I've tried to create FOREIGN KEY of table to itself:</font><font face="Courier New" size=2><pre>
CREATE TABLE COMPL_GROUP (
    ID_COMPL_GROUP INTEGER NOT NULL,
    ID_PARENT INTEGER,
    TLEVEL INTEGER NOT NULL,
    NAME VARCHAR(16) NOT NULL);
 
ALTER TABLE COMPL_GROUP ADD PRIMARY KEY (ID_COMPL_GROUP);</pre></font><font face="Verdana" size=1>
Execution of ...</font><font face="Courier New" size=2><pre>
alter table COMPL_GROUP
  add constraint FK_COMPL_GROUP_TREE3 foreign key (ID_PARENT) 
    references COMPL_GROUP(ID_COMPL_GROUP) on delete CASCADE</pre></font><font face="Verdana" size=1>
... rises following error set:<br>
<br>
violation of FK constraint .<br>
violation of FK constraint INTEG_331 on table COMPL_GROUP.<br>
<br>
There are following record appeared in RDB$FORMATS table:<br>
<br>
RDB$RELATION_ID = 232, RDB$FORMATS = 5<br>
<br>
Though, RDB$FORMATS equals 4 in RDB$RELATIONS record with RDB$RELATION_ID == 232 .  Second attempt do add constraint rises:<br>
<br>
Invalid insert or update value(s): object columns are constrained - no 2 table rows can have duplicate column values. attempt to store duplicat value (visible to active transactions) in unique index RDB$INDEX_16.<br>
<br>
But now there are TWO records in table RDB$FORMATS; RDB$RELATION_ID = 232, and RDB$FORMATS = 5<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=458888&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
458888
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=458888&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
REFERENCES privilege
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
First, here is quote from Diane Brown: InterBase's implementation of REFERENCES doesn't quite follow SQL92 rules. In SQL92, the REFERENCES privilege is required only to create (or alter) a constraint (such as a foreign key or check constraint) that refers to another table. In SQL92, the REFERENCES privilege is not required at 'run-time' in order to insert or update data in the table that has that constraint, so is not typically a privilege you would grant to most users.<br>
<br>
or another one: In SQL92, REFERENCE is a privilege (along with SELECT, INSERT, UPDATE, etc.) that can be granted to or revoked from other users.  The REFERENCE privilege controls what kinds of constraints someone can define, rather than what kind of data he can see or update directly.<br>
<br>
Therefore, the current FB/IB behaviour is quite different and buggy. So options are either<br>
  - change implementation to conform SQL standard, or<br>
  - stick with current style and fix bugs.<br>
<br>
Here is script to demonstrate the bug:</font><font face="Courier New" size=2><pre>
SET TERM ^ ;
 
CREATE TRIGGER TR FOR TAB BEFORE UPDATE AS
BEGIN
  NEW.I = 10 * NEW.I;
END^
 
CREATE PROCEDURE PROC AS
BEGIN
  UPDATE TAB SET I=456;
END^
 
SET TERM ; ^
 
GRANT ALL     ON TAB            TO PROCEDURE PROC;
GRANT EXECUTE ON PROCEDURE PROC TO PUBLIC;
 
EXECUTE PROCEDURE PROC;</pre></font><font face="Verdana" size=1>
Then you get "Statement failed, SQLCODE = -551 no permission for references access to table TAB"<br>
<br>
In short - user has rights to execute procedure, the procedure has all rights on table, the table has trigger.  The error will not raise if you add this privilege:</font><font face="Courier New" size=2><pre>
  GRANT REFERENCES ON TAB TO TRIGGER TR;</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=425799&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
425799
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=425799&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Renamed domain leaves behind dimensions
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
With a domain being an array, renaming the domain causes rdb$field_dimensions to be left unchanged; hence the connection between a domain and its dimensions specification is broken.<br>
<br>
Example:</font><font face="Courier New" size=2><pre>
create domain dunno int[0];
commit;
alter domain dunno to ditto;
commit;
select * from rdb$field_dimensions;</pre></font><font face="Verdana" size=1>
will show that the referenced domain is still DUNNO instead of DITTO. System tables are out of sync.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=436462&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
436462
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=436462&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Rows affected incorrect with trigger
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I'm having troubles with updatable views that have before update triggers. When i update just one record (using the PK), it returns 3 rows affected.<br>
<br>
When i update this view using IBO it gives the error: 'MULTIPLE ROWS AFFECTED', because the number of rows affected is giving 3 rows!<br>
<br>
PS: I can't put the before update in the table, because i have several view on one table and i expect that each view have an specific behavior.<br>
<br>
Try this:<br>
</font><font face="Courier New" size=2><pre>
/* CREATE A TABLE */
create table test (
  test_id integer not null primary key,
  name varchar(30),
  address varchar(30) );
 
/* CREATE A VIEW */
create view v_test as
select test_id, name, address from test;
 
/* INSERT A RECORD */
insert into v_test values (1, 'name1', 'address1');
/* ROWS AFFECTED: 1 */
 
/* UPDATE THIS RECORD */
update v_test set name = 'name1' where test_id = 1;
/* ROWS AFFECTED: 1 */
 
/* CREATE A TRIGGER FOR THE VIEW */
set term !! ;
create trigger trg_v_test for v_test
before update
as
begin
  new.name = 'name1';
end !!
set term ; !!
 
/* UPDATE THE RECORD AGAIN - SAME AS ABOVE*/
update v_test set name = 'name1' where test_id = 1;
/* ROWS AFFECTED: 3 !!!!!!!!!!!!!!!!!!!!!!! */</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=226456&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
226456
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=226456&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
SELECT/PLAN does not understand delimited SQL index names
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When I have an index, for example: idx_asc_History_Stamp and try to use this index in my SELECT statement:<br>
...<br>
   PLAN (History ORDER idx_asc_History_Stamp)<br>
<br>
I get an error with ISC ERROR CODE = 335544343:<br>
<br>
invalid request BLR at offset 112 there is no index IDX_ASC_HISTORY_STAMP for table History<br>
<br>
But if I have an index named IDX_ASC_HISTORY_STAMP or both of them, this SELECT statement with my plan works fine, but uses the upper-cased one.<br>
<br>
So it looks like PLAN cannot recognize an index name, which is SQL delimited identifier.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450301&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
450301
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450301&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
SUBSTRING doesnt work
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The syntax for SUBSTRING is:</font><font face="Courier New" size=2><pre>
    SUBSTRING( s FROM start [FOR length] )</pre></font><font face="Verdana" size=1>
s is a string, start is 1-based. The command should extracts from the string s starting at position start a substring with at most length chars. If length isn't given, then the command should extract the full string after the start position.<br>
<br>
The SUBSTRING keyword isnt available in early firebird-versions (e.g. 0.9.4) or in the interbase-versions.<br>
<br>
I have tested the command in FireBird 1.0.0 Beta 2, Build 324 Classic on Linux 2.2.16 (SuSE 7.0).<br>
<br>
When I use the command in the where-clause (e.g. with in or =) it doesnt work, when I use it with string-concatenation, it doesnt work, either.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=214298&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
214298
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=214298&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Select count(*) expression anomaly when table is empty
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
select count(*) + 1 returns zero when table has no rows but returns correct result if count(*)  0.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212129&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212129
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212129&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Server doesn't support NFS/mapped paths
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If you try to access a database file that's mounted via NFS, but you specify its path in the filesystem as if it were local, InterBase would normally change that into a network request to prevent file corruption by multiple clients.<br>
<br>
Example: Pretend our system mounts /home from the root directory of a machine named simpsons.  Now pretend you request to connect to the database /home/marge/groceries.gdb.  InterBase _should_ turn the request into a connection to simpsons:/marge/groceries.gdb and let simpsons handle reads and writes to the file on its own.<br>
<br>
The FreeBSD port of InterBase doesn't do that.  So don't go connecting to databases mounted via NFS unless you know what you're getting into or file corruption doesn't bother you a bit.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229121&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
229121
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229121&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
TEMP directory filling up
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
This has started to happen since moving from Interbase 6 to firebird 0.94-1 on Linux.  Same hardware, same data, same application.<br>
<br>
There are no visible files in the /tmp direcory, but this is the output you get from lsof:</font><font face="Courier New" size=2><pre>
COMMAND     PID      USER FD  TYPE DEVICE    SIZE NODE NAME
gds_inet_ 16911 interbase  5u  REG    8,8 4160000   14 /tmp/gds_sort__0ckHHn (deleted)</pre></font><font face="Verdana" size=1>
etc....<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212340&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212340
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212340&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Token unknown in simple SELECT with GROUP BY and ORDER BY
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
This simple SELECT statement does not work:</font><font face="Courier New" size=2><pre>
select country, count(country)
from customer
group by country
order by count(country)</pre></font><font face="Verdana" size=1>
I'm getting SQL error code = -104, Token unknown count.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216733&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
216733
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216733&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Too Many Generators Can Corrupt Database
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The number of generators you can have is dependant on (page size - unknown overhead) / size of generator.  IB allows you to create generators past this limit with no complaint, but these generators will return random data and corrupt the database if incremented.<br>
<br>
IB seems to limit generators to one page, but no range checking is done.  This is particularly bad on databases with small page sizes which migrate from ODS 9 to ODS 10, since the size of generates doubles from 32 bit to 64 bit, seriously reducing the limit.  On a 1024 page size, this limit is somewhere less than 128 generators.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450405&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
450405
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450405&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Tricky role defeats basic SQL security
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
In this example t t is any table. Here, it doesn't matter that its name has an embedded space, it could be named T0 or mytable as well. SYSDBA does:</font><font face="Courier New" size=2><pre>
SQL create role for cvc;
SQL create role for;
SQL grant for cvc to user cvc;
SQL grant select on table t t to for;</pre></font><font face="Verdana" size=1>
Now, cvc has ONLY the role for cvc.<br>
<br>
However, sysdba assigned role for the right to select from the table. No user has been granted such role. Also, no rights have been given to the role granted to cvc, so it's useless.<br>
<br>
If cvc tries to use role for, it will be changed internally to NONE because that user hasn't been granted such role. However, cvc can play with the legitim assigned role and do:<br>
<br>
H:\ibdev\fbbuild\interbase\dsqlisql<br>
Use CONNECT or CREATE DATABASE to specify a database<br>
SQL connect c:/proy/fbtest.gdb user cvc password pw role for cvc;<br>
Database:  c:/proy/fbtest.gdb, User: cvc, Role: for cvc<br>
SQL select * from t t;<br>
SQL<br>
<br>
Whoops! The engine allowed the request! Internally when the ACL is checked, the ACL and the role are compared at some time, and since the ACL is length-counted, it will stop at the third position, since the role that has legitim rights is for. At this time, check_string() queries the next character in the current role. In the case of for cvc, it's a blank, so the routine decides that both roles are the same and accept the credentials. It didn't check that there may be more valid characters after a couple of embedded blanks.<br>
<br>
The example is convoluted, but relying on the admin doing always the sensible decision is risky.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=412201&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
412201
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=412201&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Trigger update limit
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I have a trigger which autogenerate a reference.<br>
<br>
When I exchange data between two databases (replication) I need to desactivate this trigger when there is insert clauses . I reactivate it after the exchange.<br>
<br>
After 255 alter trigger XXX active/incative I have a two many version problem and I need to backup/restore database....<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223059&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223059
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223059&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Updating VARCHAR does not clear old data
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When IB updates VARCHAR string, it does not zero rest of the string. (when the row is decompressed in the buffer).</font><font face="Courier New" size=2><pre>
  CREATE TABLE t ( a VARCHAR(50) );
  INSERT INTO t
    VALUES ('abcdefghijklmnopqrstuvwxyz1234567890abcdefghijklmn');
  COMMIT;</pre></font><font face="Verdana" size=1>
When you update it by</font><font face="Courier New" size=2><pre>
  UPDATE t SET a='XYZ';</pre></font><font face="Verdana" size=1>
then IB creates new version of the row that should contain string:<br>
  'XYZ' + zero filled rest but it stores (in gdb file) this string instead:<br>
  'XYZdefghijklmnopqrstuvwxyz1234567890abcdefghijklmn'<br>
<br>
Because VARCHARs contain length of the string, client application will never notice any problem (i.e. it will always get correct result), but the gdb file can grow faster than expected (because such additional data can't be rle compressed), and database can get slower (because less useful data fit onto page).<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213462&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
213462
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213462&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Win 32 Open database file exclusive accect/accepts ambiguous connect strings
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Win 32 allows clients to connect with either servername:c:localpathname or servername:c:\localpathname.<br>
<br>
If connected clients have connected with a mixture of these string formats, the database is treated as if it were multiple databases and corruptions occur.<br>
<br>
Opening the database file using exclusive access will ensure that access is controlled.<br>
<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227760&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227760
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227760&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Zero-length db object names shouldn't be allowed
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Zero-length field names aren't valid and should be banned. Currently, IB in dialect 3 allows constructions like these:</font><font face="Courier New" size=2><pre>
create table  ( int);
commit;
create index  on ();
 
set term ^;
create procedure p returns( int)
as begin
   for select  from  into : do
   begin
       = : * :;
      suspend;
   end
end ^
set term ^;
commit;
create role ;
grant select on  to ;
grant execute on procedure p to ;
 
insert into  values(1);
insert into  values(2);
insert into  values(3);
commit;</pre></font><font face="Verdana" size=1>
Then the following works,</font><font face="Courier New" size=2><pre>
select * from p</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=428889&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
428889
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=428889&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
alter column col position pos zero-based
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The syntax</font><font face="Courier New" size=2><pre>
alter table tbl
   alter column col position pos;</pre></font><font face="Verdana" size=1>
is zero-based. Since it's SQL command, it should be in sync with SQL positions starting at one.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=444463&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
444463
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=444463&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
before triggers are firing after checks
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Before triggers (insert and update) allows to change field values that they will not pass table check constraints. Before triggers are firing after check constraints, which is wrong and can make data unrestorable.<br>
<br>
to test what is firing first - triggers or checks - we can create triggers that violate checks:</font><font face="Courier New" size=2><pre>
CREATE TABLE TEST1 (I INTEGER
  check (i between 1 and 5));
 
CREATE TRIGGER TEST1_BI FOR TEST1
ACTIVE BEFORE INSERT POSITION 0
as begin
 new.i=6;
end
 
CREATE TRIGGER TEST1_BU FOR TEST1
ACTIVE BEFORE UPDATE POSITION 0
as begin
 new.i=7;
end</pre></font><font face="Verdana" size=1>
then,</font><font face="Courier New" size=2><pre>
INSERT INTO TEST1 VALUES (2);
select * from test1;
 
           I
============
 
           6
 
UPDATE TEST1 SET I=2 WHERE I = 6;
select * from test1;
 
           I
============
 
           7</pre></font><font face="Verdana" size=1>
As can be seen, check constraint is performed BEFORE before triggers. Than if such database will be restored from backup, it will give error that field data violates check constraint. If triggers position will be changed to 5 or greater (64K position was not tested) it does not affect test results. Correct logic, when checks are applied after before triggers, will give exceptions running this test cript.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=419964&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
419964
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=419964&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
buffer overflow in remote/interface.c li
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The version string is too long for the sprintf on line 933.  Here is the string: UP-T0.9.4.101 Firebird Test1/tcp (cse-air-dhcp-153.ucsd.edu)/P10.  The buffer allocated is only 64 bytes long.  Looking at the string I feel the buffer needs to be bigger.  The version includes the dns name, which is in no way constrained to 64 characters.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=453686&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
453686
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=453686&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
create db w. dialect 3
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When creating or registering a new database on FirebirdSS-1.0.0 Beta2 Linux, with IBConsole or IBExpert, the database is always in SQL Dialect 1.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212177&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212177
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212177&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
error with non-english column defaults
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
create table bug_bugbase (
  s varchar(20) character set win1251 collate win1251 default 'XXXX' not null);</pre></font><font face="Verdana" size=1>
Note: win1251 code page, is for belarusian language and the default value above 'XXXX' is a cyrrilic (belarusian) text.<br>
<br>
Database works well, it can insert records, update, and delete them. After backup, the restore raises:<br>
<br>
gbak: restore failed for record in table BUG_BUGBASE<br>
gbak: ERROR: arithmetic exception, numeric overflow, or string truncation<br>
gbak: ERROR:     Cannot transliterate character between character sets<br>
<br>
it seems that IB supports default values only in standard (english) code page.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216579&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
216579
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216579&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
generators in computed by columns will return wrong results
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Using generators in computed by columns will return wrong results and create an unusable database.</font><font face="Courier New" size=2><pre>
create table t0 (a integer, genid_field computed by (a + gen_id(gen1, 1)));
show table t0;
insert into t0(a) values(10);
insert into t0(a) values(12);
select * from t0;</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223793&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223793
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223793&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isc_add_user() allows adding 32-char usernames
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
In the file interbase\jrd\alt.c, function:</font><font face="Courier New" size=2><pre>
isc_add_user() (and also isc_modify_user, isc_delete_user)</pre></font><font face="Verdana" size=1>
there is line</font><font face="Courier New" size=2><pre>
    if (strlen (user_data-user_name)  32)</pre></font><font face="Verdana" size=1>
so this function allows adding usernames 32 characters long!<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221589&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
221589
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221589&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
numeric fields and mathematical operations
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
example:</font><font face="Courier New" size=2><pre>
select field1 * field2 from mytable</pre></font><font face="Verdana" size=1>
or</font><font face="Courier New" size=2><pre>
select field1 * (1+field2/100) from mytable</pre></font><font face="Verdana" size=1>
and both fields are numeric type (interger) like numeric(9,2), the result are incorrect.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229231&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
229231
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229231&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
revoke is case sensitive
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If I create a user called admin and then grant all privileges on a table to them, the revoke command doesn't work unless I use the admin name in upper case.  Here is an example:</font><font face="Courier New" size=2><pre>
grant all on config to admin;
revoke all on config from admin;</pre></font><font face="Verdana" size=1>
You would think this would result is admin having no privilege on config but a select on the RDB$USER_PRIVILEGE table shows the admin user still has full access!  In order to remove the privileges, you need to do:</font><font face="Courier New" size=2><pre>
revoke all on config from ADMIN</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228467&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
228467
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228467&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
security bug with a hardcoded user with full rights to isc4
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Look at this URL: https://www.kb.cert.org/vuls/id/247371<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212899&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212899
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212899&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
skywalker commit for jrd/cmp.c rev 1.3 buggy
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
http://cvs.sourceforge.net/cgi-bin/cvsweb.cgi/interbase/jrd/cmp.c.diff?r1=1.2r2=1.3cvsroot=firebird<br>
<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=215169&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
215169
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=215169&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
stored procedure gets off sync on the server
</a></b></td><td width="15%"><font face="Verdana"><b>
 Irreproducible Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Sometimes a prepared stored procedure appears to get off sync on the server ....This code is meant to try to work around the problem simply by retrying.  It is in IBSQL.PAS, in the TIBSQL.ExecQuery:</font><font face="Courier New" size=2><pre>
SQLExecProcedure: begin
 fetch_res := Call( isc_dsql_execute2(StatusVector, 
     TRHandle, @FHandle, Database.SQLDialect,
     FSQLParams.AsXSQLDA, FSQLRecord.AsXSQLDA), False);
 if (fetch_res  0) and (fetch_res  isc_deadlock) then
 begin
{ Sometimes a prepared stored procedure appears to get off 
  sync on the server ....This code is meant to try
  to work around the problem simply by retrying. This need to 
  be reproduced and fixed.
    }
   isc_dsql_prepare(StatusVector, TRHandle, @FHandle, 
      0, PChar(FProcessedSQL.Text), 1, nil);
   Call( isc_dsql_execute2(StatusVector, TRHandle, 
     @FHandle, Database.SQLDialect,
     FSQLParams.AsXSQLDA, FSQLRecord.AsXSQLDA), True);
 end;
end</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=226614&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
226614
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=226614&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
temp buffer in FUNCTIONS_entrypoint too small
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The temp buffer in FUNCTIONS_entrypoint is 128 characters, but when it is called by ISC_lookup_entrypoint which is called by obj_init (intl.c) it is passed a path with MAX_PATH_LEN  128, and a name with no length limit (currently  20).  If the length of the path and name were less than 128, everything was fine.  If it was greator you get a segfault.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: DSQL                           </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=448062&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
448062
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=448062&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ALTER DOMAIN leaves CONSTRAINT word
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I noticed that if you alter domain drop constraint and then do this:</font><font face="Courier New" size=2><pre>
alter domain .... add constraint check ...</pre></font><font face="Verdana" size=1>
that the token constraint gets added into the blob containing the check text.<br>
<br>
It is possible to do this</font><font face="Courier New" size=2><pre>
alter domain .... add check ...</pre></font><font face="Verdana" size=1>
and thereby omitting the constraint token altogether.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229009&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
229009
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229009&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
CREATE VIEW not returning syntax error
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
IB will allow CREATE VIEW command where number of view columns does not correspond to number of columns in select statement, e.g. you can create</font><font face="Courier New" size=2><pre>
  CREATE VIEW v (xx) AS
    SELECT a,b,c FROM tab;</pre></font><font face="Verdana" size=1>
and it will create view that looks like</font><font face="Courier New" size=2><pre>
  CREATE VIEW v (xx,b,c) AS
    SELECT a,b,c FROM tab;</pre></font><font face="Verdana" size=1>
According to SQL92 rules, such statement should return syntax error.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229860&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
229860
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229860&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Error in error message
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I have just found one very minor bug when issuing this statement:</font><font face="Courier New" size=2><pre>
alter table drawings add F1 date, add F2 image;</pre></font><font face="Verdana" size=1>
You see it contains word IMAGE that was copied by mistake from MS SQL script. Of course this command did not pass but the error message was misleading:<br>
<br>
SQL error code = -607<br>
Invalid command<br>
Specified domain or source column does not exist<br>
SQL warning code = 301<br>
DATE data type is now called TIMESTAMP<br>
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^<br>
Statement: alter table drawings add F1 date, add F2 image<br>
<br>
I played a little with the command and found that, if adding new DATE column when there is some mistake in a SQL sentence, the same error statement always appears.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=451798&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
451798
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=451798&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
FIRST is applied before aggregation
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When using the new FIRST clause, the result set is truncated before aggregation like group by or count.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=451810&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
451810
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=451810&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
SKIP is off by one
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The skip-count in the new SKIP clause is off by one. Additionally the skip-count can't be zero.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=457133&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
457133
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=457133&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Single line comments (--) defeat lexer
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Some combinations of single line comments using the double hyphen marker defeat the lexer. Specially in batch files, where one can comment several lines one by one while developing an app, this example will fail:</font><font face="Courier New" size=2><pre>
GRANT ALL ON DEPARTAMENTO                    TO DEPTO
GRANT ALL ON CARRERA                         TO DEPTO
GRANT ALL ON PROFESOR                        TO DEPTO
GRANT ALL ON POSTITULO                       TO DEPTO;</pre></font><font face="Verdana" size=1>
The server won't recognize the last GRANT as valid and will reject the whole input. Also, having two newlines before a single line comment can cause a message saying that -- is unrecognized command. Things like<br>
<br>
SQL select<br>
CON --<br>
CON 1<br>
CON --<br>
CON --<br>
CON<br>
CON --<br>
CON from<br>
CON --<br>
CON rdb$database<br>
CON<br>
CON ---<br>
CON ---------------<br>
CON ;<br>
<br>
should be accepted. I have the patch to parse.y working and expect to commit it to CVS this weekend.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=412417&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
412417
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=412417&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
altering from CHAR to VARCHAR
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Altering CHAR to VARCHAR column adds 2 bytes to field length. How to reproduce:</font><font face="Courier New" size=2><pre>
CREATE TABLE TEST( N CHAR(40));</pre></font><font face="Verdana" size=1>
then,</font><font face="Courier New" size=2><pre>
ALTER TABLE TEST ALTER N TYPE VARCHAR(40);</pre></font><font face="Verdana" size=1>
after that RDB$FIELD_LENGTH will be 42, not 40 as it should be.  RDB$CHARACTER_LENGTH is Ok, i.e. it stays 40 after ALTER.<br>
<br>
The '40' is not a magic number - same addition of 2 bytes will be for any altering from char to varchar. For example, altering char(40) to varchar(50) will give the resulting varchar field 52 characters length.<br>
<br>
Real varchar storage size is 2 bytes greater than char. But, column length definition (RDB$FIELD_LENGTH) does not store physical field lenght - it stores column length.  So, altering char to varchar must keep the same column size.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228526&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
228526
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228526&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ambiguous statements return unpredictable results
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I noticed that IB happily executes an ambiguous query of the form:</font><font face="Courier New" size=2><pre>
select ...
from orders o
left join customers c1 on (o.customer_id1 = c1.id)
left join customers c2 on (o.customer_id2 = c2.id)
where somefield = 'somevalue'</pre></font><font face="Verdana" size=1>
Assuming somefield exists in both the customers and the orders table, the query is ambiguous unless the reference in the where clause is qualified.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: Data Types/On-Disk Struc(ODS)  </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233304&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
233304
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233304&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
computed field and TIME datatype
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
create table a
(workstart time,
 workend   time,
 duration computed by (workend - workstart));</pre></font><font face="Verdana" size=1>
field duration will be of numeric type, not TIME as it supposed to be.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=231998&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
231998
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=231998&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
space before CASTed numeric expression in dialect 1
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Andrew Velikoredchanin found interesting behavior in dialect 1(Dialect 3 does not have this problem), when numeric expression is being casted to a varchar.<br>
<br>
For example:</font><font face="Courier New" size=2><pre>
select cast(22 / 7 as varchar(20)) from rdb$database</pre></font><font face="Verdana" size=1>
will give</font><font face="Courier New" size=2><pre>
' 3.142857142857143'</pre></font><font face="Verdana" size=1>
as a result (note that there is a space before first digit).<br>
<br>
If not an expression, but numeric value is casted, all is ok, i.e. no space before casted result.  There is no difference between integer and numeric values - 22.0 / 7.0 will give space before first digit.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: Documentation                  </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223789&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223789
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223789&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Ib 6.0.1 and UDF ascii_char error
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If you declare the function ascii_char like stated in the documentation or in the example provided in InterBase\examples\Udf\ib_udf.sql, i.e.:</font><font face="Courier New" size=2><pre>
DECLARE EXTERNAL FUNCTION ascii_char INTEGER
	RETURNS CHAR(1) FREE_IT
	ENTRY_POINT 'IB_UDF_ascii_char' MODULE_NAME 'ib_udf';</pre></font><font face="Verdana" size=1>
if you use it, i.e.:</font><font face="Courier New" size=2><pre>
     select ascii_char(65) from rdb$database</pre></font><font face="Verdana" size=1>
You will receive the error "arithmetic exception, numeric overflow, or string truncation".  That's because the declaration has to be different:</font><font face="Courier New" size=2><pre>
DECLARE EXTERNAL FUNCTION ascii_char INTEGER
        RETURNS CSTRING(1) FREE_IT
        ENTRY_POINT 'IB_UDF_ascii_char' MODULE_NAME 'ib_udf';</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
 </table>
<b> Category: FreeBSD port                   </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216778&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
216778
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=216778&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
FreeBSD port should be linked with -ldescrypt
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
FreeBSD port should be linked with -ldescrypt, not -lcrypt, because libcrypt.so can be symlink to libscrypt.so or it should have DES inside.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: GPRE                           </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227717&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227717
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227717&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
COBOL programs randomly return a -901 request sync. error
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
COBOL programs randomly return a -901 request synchronization error. Alternate title:  COBOL programs lose SQLCODE values during UPDATE:</font><font face="Courier New" size=2><pre>
UPDATE SET ... WHERE x=..</pre></font><font face="Verdana" size=1>
('Mass Update') error codes returned by the update are not returned to the program, instead the program will see a -901 request synchronization error.  The error is caused by bad code generated by GPRE.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: IBGuardian                     </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=211790&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
211790
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=211790&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Year 2000 incompliance in guardian
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Guardian window shows dates of 2000 year as dd/mm/100 instead of dd/mm/00.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212328&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212328
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212328&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
iscGuard (ibguard) still leaks handles
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
An internal test release of IBGuard with the name of iscGuard (by Mike) presents a decent date and time formatting in the crash report. No more Y2K problems in the report (IBGuard's properties). This test program closed two handle leaks, but there are still two more, probably produced when IB crashes and it's restarted by the Guardian, because the old handles are not released.<br>
(IMHO, some parts of IBGuard that I reviewed through the web interface, seems to have been done by a sophomore and not by a professional developer.)<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: ISQL                           </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460630&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
460630
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460630&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
-x and -a options always use double quotes
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When extracting object names for an script with either option -x or -a, isql always takes the easy path and put double quotes around identifiers. This has been deemed annoying by several users. It should use dquotes only if the name cannot be expressed without them. An identifier doesn't need to be surrounded in double quotes if it contains:<br>
a) Only ASCII A-Z (uppercase only)<br>
b) 0..9 digits<br>
c) underscore (_) and $ provided that in the first position, only a) is met.<br>
<br>
Blank and zero length identifiers always need double quotes.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=458855&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
458855
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=458855&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Extracting metadata for GRANT command
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The syntax of GRANT command is:</font><font face="Courier New" size=2><pre>
GRANT  privileges ON [TABLE] { tablename | viewname} TO 
   { object | userlist | GROUP UNIX_group} ...</pre></font><font face="Verdana" size=1>
I do not know proper usage of GROUPs, but if you execute these two commands</font><font face="Courier New" size=2><pre>
GRANT SELECT ON T TO       ALPHA;
GRANT SELECT ON T TO GROUP BETA;</pre></font><font face="Verdana" size=1>
and then extract database metadata, you get</font><font face="Courier New" size=2><pre>
GRANT SELECT ON T TO ALPHA
GRANT SELECT ON T TO BETA</pre></font><font face="Verdana" size=1>
i.e. GROUP keyword is missing.<br>
<br>
The information is stored correctly in system table:</font><font face="Courier New" size=2><pre>
SELECT RDB$USER, RDB$USER_TYPE
  FROM RDB$USER_PRILILEGES
 WHERE RDB$RELATION_NAME='T'
 
RDB$USER   RDB$USER_TYPE
========== =============
ALPHA                  8
BETA                  12</pre></font><font face="Verdana" size=1>
(The keyword GROUP is also missing in RDB$TYPES)<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=448613&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
448613
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=448613&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ISQL corrupts memory
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Simple ISQL commands, such as:</font><font face="Courier New" size=2><pre>
  CREATE DATABASE c:\home\bar.gdb user builder password builder;</pre></font><font face="Verdana" size=1>
cause the debug build to GPF in gds__free on the win32 platfrom.  This seems to be caused by corruption of the client memory pool. There is a small chance that this is a client library bug.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=421262&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
421262
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=421262&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ISQL reports UDF BLOB parameter BY VALUE
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
It's obviously wrong. BLOBs can't be passed by value and a mechanism should not be specified in an script. Internally, BY DESCRIPTOR is used. This is only a bug when reporting metadata information.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460786&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
460786
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460786&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Show Procedures command fails
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Show Procedures command fails with a segmentation error when any stored procedures contain generator commands<br>
<br>
eg. ThisID = GEN_ID(GenNewId,1).<br>
<br>
Show Procedures works when generator related code is removed.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212263&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212263
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212263&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
command line isql ignores -user / -password with -a or -x
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Workaround is to set ISC_USER / ISC_PASSWORD beforehand, or use unix authentication<br>
<br>
To reproduce (using windows):<br>
unset ISC_USER and ISC_PASSWORD<br>
isql -x {some database} -user {some valid user} -password {some valid password}<br>
<br>
This apears to be a logic bug, rather than an option parsing bug. In isql.e -a and -x are handled differently from other cases which call newdb from do_isql<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227473&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227473
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227473&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql always ignores charset NONE in metadata extraction
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
This is a rather subtle bug that might cause a db to change its original meaning if the metadata is extracted as an script and later a new db is created from such script. It seems that isql was planned with charset NONE in mind.<br>
<br>
Example, let's assume a database whose default character set is not NONE but WIN1250, namely, one whose rdb$database's rdb$character_set_name field is WIN1250 instead of NULL. Then given 
this declaration,</font><font face="Courier New" size=2><pre>
   CREATE TABLE none(n char character set none);</pre></font><font face="Verdana" size=1>
ISQL extracts information as:</font><font face="Courier New" size=2><pre>
   SET SQL DIALECT 3;
   CREATE DATABASE 'D:\users\cvalde\proy\1252.gdb' PAGE_SIZE 1024 
     DEFAULT CHARACTER SET WIN1252;
   [snip]
 
   /* Table: NONE, Owner: SYSDBA */
   CREATE TABLE NONE (
     N	CHAR(1) );</pre></font><font face="Verdana" size=1>
So, it's evident isql swallowed the charset specification, because it's NONE, so it assumed NONE is always the default. However, next time the script is submitted through the same isql.exe, since the db-wide charset is WIN1252, the table N will have a field named N whose charset will be WIN1252 and not NONE as initially created, because fields without charset specification assume the charset of the whole db.<br>
<br>
Solution: isql shouldn't discard charset NONE blindly when extracting metadata. The safe way is to query rdb$database and skip (for being redundant) the fields that use the same charset than the whole db (and only if rdb$database contains no charset specification, the utility can behave as it behaves currently) so the script can rebuild the db as it was originally, without subtle changes. This bug affects not only isql and IBConsole but third party tools, too.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460624&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
460624
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=460624&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql extraction of stored procedure parameters in dialect 3
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Isql won't extract procedure parameters' names correctly in dialect 3: even if the names require double quotes, they won't be put. Also, the routine that does the double quotes has one incorrect parameter declaration.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222563&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
222563
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222563&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql extracts wrong sproc's parameters with UNICODE
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
This is a bug involving metadata extraction. Given the following declaration:</font><font face="Courier New" size=2><pre>
CREATE PROCEDURE p
   (inparam  CHAR(10) CHARACTER SET unicode_fss)
RETURNS
   (outparam CHAR(10) CHARACTER SET unicode_fss)
AS
DECLARE VARIABLE
   var CHAR(10) CHARACTER SET unicode_fss;
BEGIN
   EXIT;
END</pre></font><font face="Verdana" size=1>
The macro-command SHOW PROCEDURE P will output:</font><font face="Courier New" size=2><pre>
Parameters:
  INPARAM INPUT CHAR(30)  CHARACTER SET UNICODE_FSS
  OUTPARAM OUTPUT CHAR(30)  CHARACTER SET UNICODE_FSS</pre></font><font face="Verdana" size=1>
As you can see, CHAR(10) becomes CHAR(30), because the tool is reading rdb$field_length instead of rdb$character_length for procedure's parameters. In the case of table's fields, the correct information is read and presented. The following command confirms that the engine itself is doing the right thing:</font><font face="Courier New" size=2><pre>
SELECT rdb$field_length, rdb$character_length
  FROM rdb$fields
 WHERE rdb$field_name IN (
   select rdb$field_source from rdb$procedure_parameters
   where rdb$procedure_name = 'P' )
 
rdb$field_length rdb$character_length
================ ====================
              30                   10
              30                   10</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=436085&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
436085
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=436085&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql internal error on SS0.9.4
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
After installing Firebird 0.9.4 on a Linix RHat 7.1 i386 system isql gave the following error message:<br>
Use CONNECT or CREATE DATABASE to specify a database<br>
SQL connect examples/employee.gdb;<br>
Internal error: Unexpected isc_info_value 0<br>
Database:  examples/employee.gdb, User: sysdba<br>
Server version too old to support the isql command<br>
SQL<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450667&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
450667
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450667&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql needs update to cope with FB enhancements
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
We forgot ISQL with some modifications to the core engine.<br>
<br>
For example, I previously coded a workaround to inform that BLOBs are returned by descriptor in the SHOW TABLE command, since they were reported as returned by VALUE, that's impossible. This by descriptor info is strictly speaking, an error. BLobs are returned normally by blob struct, unless they really were requested by descriptor.<br>
<br>
Second, ISQL knows nothing in the SHOW TABLE and in the [full] metadata script command (-x|-a) about descriptors in DSQL, so once a UDF declaration using the new syntax parameter BY DESCRIPTOR has been issued, isql won't be able to rebuild properly the script from the live database.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: Installation - Server          </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223327&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223327
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223327&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
FireBird 0.9 (fbinst_prod_110300-2.exe) reg. error
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Installed fbinst_prod_110300-2.exe on a clean machine (WIN2000) in D:\Program Files\FireBird.<br>
<br>
Tried to connect via IBConsole, got "couldn't attach to password  db".<br>
<br>
Checked with regedit and found:<br>
<br>
HKEY_LOCAL_MACHINE\SOFTWARE\Borland\InterBase\CurrentVersion\RootDirectory = :\Program Files\FireBird\<br>
and<br>
HKEY_LOCAL_MACHINE\SOFTWARE\Borland\InterBase\CurrentVersion\ServerDirectory = c:\Program Files\FireBird\<br>
<br>
corrected both to the installed path (d:\Program Files\FireBird\), restarted the InterBase Server service and everything was ok.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224129&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
224129
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224129&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Windows 98 Install Fails
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I downloaded fbinst_prod_110300-2.exe from SourceForge. I ran the .exe it on my computer, which is Windows 98. It is unsuccessful; it has errors. I suspect that the cause of the error is that whoever packaged fbinst_prod_110300-2.exe assumed Windows NT.<br>
<br>
(Previously I had installed ib_client on my machine, and found out the hard way that one must uninstall any InterBase package before installing Firebird; Firebird has an identity problem and gets confused. The errors here refer to after I thoroughly removed both Interbase and Firebird from my system and then tried to install Firebird again).<br>
<br>
The install left an error message n a DOS window named Finished - net: Error 2185: The service name is invalid. Make sure you are specifying a valid service name, and then try again.<br>
<br>
I ran IBConsole. When I try to contact the local server, it gives this error message: Error logging into the requested server. Cannot attach to services manager. Ctrl+Alt+Del does not show a server running.<br>
<br>
The documentation says To start a server that has been shut down, run InterBase Server from the InterBase 5 Start menu. There is no Interase Server on the Windows 98 Start menu; under Programs / Firebird there are only IBConsole and License Agreement. MSCONFIG does not show any database server to be run upon startup. I presume that the command to start the server has been lost. I go to C:\Program Files\Filebird\bin and double click on ibserver.exe and now I have an icon on my task bar.<br>
<br>
I run IBConsole again and try to log in to the local server; now things seem to be OK.<br>
<br>
So the problem is that Firebird, in order to set the server to start automatically at boot, is trying to contact a services manager, which fails under Windows 98. The Firebird install needs to check the Windows version, and use an alternative method - e.g. add C:\Program Files\Firebird\bin\ibserver.exe to the StartUp menu - for Windows 95/98/ME.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: InterClient                    </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=230245&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
230245
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=230245&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Interclient 2.0 DatabaseMetadata problems
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Firebird SS on Linux rh 7.0, interclient 2.0, java compiled with Sun jdk 1.3, interserver compiled with makefile.</font><font face="Courier New" size=2><pre>
calling getTables (null,  null, null, [])</pre></font><font face="Verdana" size=1>
generates an invalid query and an exception.<br>
<br>
calling getTables often (always??) crashes interserver. None of the methods accepting parameters of the form  namePattern treat excaped wildcards  properly.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447462&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
447462
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447462&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
memory leak problem in Statement.java
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v1.0
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
There is a showstopping bug in the interclient.jar files that are distributed with all binaries. It results in exhaustive memory usage when opening statements, then inserting data and then closing statements. it can result in such memory blow up that interbase simply stops working and even starts to corrupt the database.<br>
<br>
Some code that will let you reproduce the bug:</font><font face="Courier New" size=2><pre>
for(int i=0;i1000;i++)
{
  Statement st=aConn.createStatement();
  st.executeUpdate(insert into myTable values
(+i+));
  st.close();
}</pre></font><font face="Verdana" size=1>
you'll see memory growing on IBServer.exe and it is never freed. however, there is a very simple solution to this problem. in excuteUpdate() in Statement.java there is a variable called openOnServer_ set to false, but it should be set to true! after i made this change and recompiled the interclient.jar file everything works perfectly as expected.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: Linux ports                    </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=430311&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
430311
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=430311&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Firebird under Redhat 7.x
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Firebird 9.4xxx cannot be run in redhat 7.0. i had try to install on a redhat 7 both copies did not fire up properly. it did start for a while, but then shutdown by itself. when I do a ps -ae i can see that there are a few ibserver been started. but all process did not run. because the cpu usage is 0%. is it not compactable with redhat7 or what??<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224332&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
224332
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224332&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
mkpasswd on Mandrake 7.2 fails
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
There are two mkpasswd programs on Mandrake 7.2 and the RPM install script ends up using the wrong one.  The script does not specify a path for mkpasswd so it uses the one in /usr/sbin which doesn't work the same way or do the same thing as the one in /usr/bin.  The /usr/sbin one comes from the shadowutils package and while the desired one comes from the expect package.<br>
<br>
The rpm install script should specify the full pathname for mkpasswd or in some way verify which one gets used.  If this doesn't work, the idea should be dropped as being too frail to work in all cases.  Perhaps it should check for mkpasswd in /usr/bin and if it doesn't exist, it could just default to a password of masterkey like it used to.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227647&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227647
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227647&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
the disk space is not freed after the sort file is deleted
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-4
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The disk space is not freed (reported to the OS as free) after the sort file is deleted in the temp directory until the whole task finishes successfully (like gbak restore) or the IB server restarts. As a result running a gbak restore on 600MB db produces 1GB sort files and exhausts the available disk space.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: Security Issues                </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=416477&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
416477
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=416477&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Malfunction of permissions/privileges
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
In V6.0, we will grant permissions for a procedure and ONLY execution of the procedure to a user (users don't have direct access to data).<br>
<br>
In new V6.0.1, is not possible to the user's schema to execute procedures or select views, because the user must have ALL permissions on tables (and execute permissions on procedure) to execute a procedure.<br>
<br>
The documentation say in Data Definition Guide, page 205: 'Tip: As a security measure, privileges to tables can be granted to a procedure instead of to individual users. If a user has EXECUTE privilege on a procedure that accesses a table, then the user does not need privileges to the table.'. This is not possible in V6.0.1.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: UDF/Built-In Functions         </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=421263&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
421263
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=421263&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
UDF substr gives NULL if slice  input
</a></b></td><td width="15%"><font face="Verdana"><b>
 Fixed v0.9-5
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The substr UDF that comes with FB returns NULL when the final position is greater than the last position in the input string argument. This causes any kind of problems. Hence, two solutions have been provided:<br>
<br>
- Fix substr so it will return NULL when provided with NULL, but it will report the full string if the final position of the slice is greater than the strig.<br>
<br>
- Add substrlen that will have the argument most people are used to: starting position plus length of the slice instead of starting and final position.<br>
<hr size=1>
</td></tr>
 </table>
</td></tr>
<tr><td><hr size=1></td></tr>
</table>