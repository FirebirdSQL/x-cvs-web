<?php
if (eregi("page_fbrc1_BugsOpen.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<table>
<tr><td width="100%" valign=top><font face="Verdana">
<h4>RC1 - Open Bugs</h4>
<b> Category: Build Issues                   </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=479041&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
479041
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=479041&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Binary files not marked as such in CVS
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I've noticed that some files in client-java are not marked as binary in CVS, resulting in corrupt files being checked out on Windows. All *.jar files in client-java/lib and client-java/src/lib are affected.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=420205&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
420205
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=420205&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
FirebirdCS 9-4 p1 hostname sensitivity
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The server process exit on signal 11 depending on the host name causing client software to stop functionning correctly :<br>
- IBaccess 0.98 with database properties on filename tab for exemple report | instead of the real filename /home/data/file.gdb for example<br>
- IB_wisSQL doesn't work correctly.<br>
<br>
I have find this problem with hostname such as : easduerne.xxxfrance.com. Seems to work better with shorter hostname such : easxx.xxxfrance.com.  Seem's like string overflow depending on the hostname.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category:                                </b><p> <table>
              Client/GDS32
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=428605&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
428605
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=428605&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Cannot dlopen libgds under Linux
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When php interbase extension used as module, it links libgds dynamicaly with dlopen and unloads libgds with dlclose (dlfcn.h). Because libgds registers in init() gds__cleanup with atexit(), when program exits, it calls gds_cleanup, but gds_cleanup is not in program (libgds was freeed by dlclose()). Under Linux problem may be fixed by using _init and _fini functions exported by libgds. Example is appended. Function _init is called, when shared library is loaded (by dlopen or when library is linked with compiler when linking) and function _fini is called when shared library is unloaded (as _init). By exporting and using this functions, libgds needs not use atexit to register gds__cleanup.<br>
<br>
This interface works in Linux and Solaris, under Windows may be used dllmain function for similarily functionality.</font><font face="Courier New" size=2><pre>
DllMain (HANDLE hInst,
ULONG ul_reason_for_call,
LPVOID lpReserved);</pre></font><font face="Verdana" size=1>
ul_reason_for_call may be:</font><font face="Courier New" size=2><pre>
 DLL_PROCESS_ATTACH:
 DLL_THREAD_ATTACH:
 DLL_THREAD_DETACH:
 DLL_PROCESS_DETACH:</pre></font><font face="Verdana" size=1>
but I don't know what is shared by all process when linking the same library.<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=426607&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
426607
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=426607&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
'Starting with' and empty parameter
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When Starting with ?param is used and param='' and optimizer uses an index, no one record appeares in result data set.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=479483&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
479483
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=479483&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Bad treatment of FIRST/SKIP in subselect
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Commands like:</font><font face="Courier New" size=2><pre>
delete from table where col in (select col first 5 from table);</pre></font><font face="Verdana" size=1>
doesn't delete up to five rows, but whole table.  Obviously subselect is executed for each row in master table, but it should not when FIRST is in game.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221960&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
221960
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221960&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Classic Wrong Page Type Error
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
In testing classic 6.01 on Linux (pressing it pretty hard), I get:<br>
<br>
database file appears corrupt ()<br>
-wrong page type<br>
-page xxxx is of wrong type (expected 7, found 5)<br>
<br>
I cannot give you any details to really help reproduce the bug, apart from the fact that there were 5 clients attached and hammering the server, and a backup taking place about half the time.<br>
<br>
I have, however, managed to get the error twice in a 48 hour period. Both times I was unable to get the database into a state where I could successfully back it up using gfix, and had to start the testing again with a fresh (empty) database.<br>
<br>
Looking at the log file, I have an INET/inet_error: read errno=104. I'm not sure if this is the cause or result.<br>
<br>
I also have another page xxx is of wrong type (expected 7, found 5) error reported in the log file for a different page, with the following additional information:<br>
internal gds software consistency check (record disappeared (186))<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=461712&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
461712
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=461712&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Computed field crashes server
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If I have a stored procedure which computes a debtor's account balance at a specified date eg:</font><font face="Courier New" size=2><pre>
create procedure debtor_balance_at(
  account_id integer,
  balance_date date )
returns (
  balance_total numeric(18,2),
  balance_outstanding numeric(18,2))
as
begin
  /* the real procedure is more complex, but this works as an example */
  select balance_total, balance_outstanding
  from debtor_balance
  where (account_id = :account_id) and (balance_date = :balance_date)
  into :balance_total, :balance_outstanding;

  suspend;
end</pre></font><font face="Verdana" size=1>
and I create a computed field on the debtor_account table:</font><font face="Courier New" size=2><pre>
alter table debtor_account add balance_outstanding
computed by (( select balance_outstanding
   from
   debtor_balance_at(
debtor_account.account_id, 'today' )));</pre></font><font face="Verdana" size=1>
The next time I connect to the DB and access the computed field, the server crashes!<br>
<br>
There's a fix/workaround.  Change the computed field to use current_date instead of 'today'.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=431381&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
431381
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=431381&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Connection Lost when creating a trigger
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When I try to create a Before insert trigger on a view I get a connection lost.  After I made some test I found the problem.  It has something to do with the fact that I use 2 times the same table  column name in the view.<br>
<br>
The syntax for the trigger is :</font><font face="Courier New" size=2><pre>
CREATE TRIGGER BI_VW_RESERVATIONS FOR VW_RESERVATIONS ACTIVE
BEFORE INSERT POSITION 0
AS
BEGIN
  NEW.ZIP_CODE = ''; /* Not Null field */
  IF (NEW.LOCATION_ID IS NULL) THEN
  BEGIN
    IF (NEW.RESERVATION_LOCATION_CODE IS NULL) THEN
    BEGIN
      SELECT SUPPORT$LOCATIONS.LOCATION_ID
        FROM SUPPORT$LOCATIONS
       WHERE (SUPPORT$LOCATIONS.CODE = NEW.RESERVATION_LOCATION_CODE )
        INTO NEW.LOCATION_ID;
    END ELSE
    BEGIN
      NEW.LOCATION_ID = 5;
    END
  END
  INSERT INTO RENTING$RESERVATIONS (RESERVATION_ID, MEMBER_ID, OBJECT_ID, LOCATION_ID)
       VALUES (NEW.RESERVATION_ID, NEW.MEMBER_ID, NEW.OBJECT_ID, NEW.LOCATION_ID);
END</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=449312&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
449312
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=449312&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Create External Table with relative path segfault
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The following:</font><font face="Courier New" size=2><pre>
  create table foo external file 'foo.dat' (bar char(10));</pre></font><font face="Verdana" size=1>
Results in: Segmentation fault<br>
<br>
An external file without an absolute path doesn't make sense, but we should not segfault.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224810&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
224810
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224810&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
DISTINCT propagates outside a VIEW
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Given these two views:</font><font face="Courier New" size=2><pre>
CREATE VIEW VDISTIDX (RDB$RELATION_NAME) AS
 select distinct rdb$relation_name from rdb$indices
 
CREATE VIEW VDISTIDX2 (RDB$RELATION_NAME) AS
 select rdb$relation_name from rdb$indices
group by rdb$relation_name</pre></font><font face="Verdana" size=1>
Then</font><font face="Courier New" size=2><pre>
select count(*) from vdistidx v
join rdb$relation_fields rf on v.rdb$relation_name = rf.rdb$relation_name</pre></font><font face="Verdana" size=1>
with the optimizer reporting PLAN SORT (JOIN (V RDB$INDICES NATURAL,RF INDEX (RDB$INDEX_4))) produces a different result than</font><font face="Courier New" size=2><pre>
select count(*) from vdistidx2 v
join rdb$relation_fields rf on v.rdb$relation_name = rf.rdb$relation_name</pre></font><font face="Verdana" size=1>
with the optimizer reporting PLAN MERGE (SORT (RF NATURAL),SORT (SORT (V RDB$INDICES NATURAL)))<br>
<br>
Notice both JOIN statements produce different query plans but both views alone produce the same plan. I think that the first case is a bug: the DISTINCT clause is propagating outside the VIEW; just change the fist case to become</font><font face="Courier New" size=2><pre>
select rdb$relation_name
from VDISTIDX v
join rdb$relation_fields rf on v.rdb$relation_name = rf.rdb$relation_name</pre></font><font face="Verdana" size=1>
and you'll observe that effectively, the DISTINCT applied to the result of the JOIN, leaving each table name only once.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=428903&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
428903
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=428903&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Exception Handling Bug
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If you raise user defined exception (by EXCEPTION command) and it is handled by WHEN ANY DO or WHEN EXCEPTION ... DO then changes made by that SP are NOT undone !!<br>
<br>
Here is an example:</font><font face="Courier New" size=2><pre>
CREATE TABLE tab (i INTEGER);
CREATE EXCEPTION e 'abcd';
 
/* Division by zero in this SP will cause INSERT to be undone */
 
CREATE PROCEDURE proc1
AS
DECLARE VARIABLE x INTEGER;
BEGIN
  INSERT INTO tab VALUES (123);
  x=1/0;
  WHEN ANY DO EXIT;
END
 
/* Calling EXCEPTION and handling it by WHEN ANY in 
   this procedure does NOT undo INSERTed row !! */
 
CREATE PROCEDURE proc2
AS
BEGIN
  INSERT INTO tab VALUES (456);
  EXCEPTION e;
  WHEN ANY DO EXIT;
END
 
/* Here is called EXCEPTION, but it is not handled 
   by WHEN ANY, so inserted row will be correctly removed. */
 
CREATE PROCEDURE proc3
AS
BEGIN
  INSERT INTO tab VALUES (789);
  EXCEPTION e;
END
 
EXECUTE PROCEDURE proc1;
EXECUTE PROCEDURE proc2;
EXECUTE PROCEDURE proc3;
 
SELECT * FROM tab;
I
=======
456</pre></font><font face="Verdana" size=1>
Error!!! Table should be empty.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=435238&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
435238
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=435238&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Firebird 0.9.5.156 memory leaks
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
this build has some problem with memory (server occupies too much memory and then hangs) on heavily loaded Database.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228030&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
228030
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228030&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Float problems.
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I found some problems with float type decimal part.  For example, write to field: FLOAT 0.35 physicaly it writes 0.349999994039536.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=442140&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
442140
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=442140&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Grant for Roles on Views not working
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The system is reporting that I don't have select rights on a table, when I select from a view which has select rights on the table.<br>
<br>
1. Restore the DB<br>
2. Create a new user<br>
3. Make the user member off CALS_USER<br>
4. Login with that user and the role CALS_USER<br>
5. Execute the following statement.</font><font face="Courier New" size=2><pre>
SELECT * FROM VW_OBJECTS.</pre></font><font face="Verdana" size=1>
Generates the error: "No Select/Read rights on table catalog$lookup_info."<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222376&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
222376
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222376&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Horrible plan with a lot of OR conditions
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
select distinct doc.id docID, doc.directory directoryID
from documents doc, DOC_APPLICATION docAppl
where (docAppl.DOC_ID=doc.ID) and
(docAppl.SITE_ID=2 or docAppl.SITE_ID=7 or docAppl.SITE_ID=25 or ....)</pre></font><font face="Verdana" size=1>
the corresponding plan is:<br>
   PLAN SORT (JOIN (DOC NATURAL,DOCAPPL INDEX (RDB$FOREIGN122,RDB$FOREIGN123,RDB$FOREIGN123,RDB$FOREIGN123,RDB$FOREIGN123...)))<br>
<br>
And an RDB$FOREIGN123 is added for each additionnal  or docAppl.SITE_ID= in the query. In one particular circumstance the query gets particularly long and the corresponding plan as well... In that case I'm getting the unknown error in ISQL (the records are fetched and presented in the dbgrid, statistics are here, but plan is empty).<br>
<br>
And yes, IB does a very poor job at generating the plan in this particular case, the optimal plan is just:<br>
   PLAN SORT (JOIN (DOC NATURAL,DOCAPPL INDEX (RDB$FOREIGN122,RDB$FOREIGN123))<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223514&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223514
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223514&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
IB crashes with two procedures intermixed.
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
These two procedures expect an order and an order-line number. The following will make IB crash:<br>
<br>
Show all possible parties on stock, with the same characteristics</font><font face="Courier New" size=2><pre>
select * from GET_ORDVRD(258,1)</pre></font><font face="Verdana" size=1>
Show the status of the stock (matched, alternatives etc)</font><font face="Courier New" size=2><pre>
select * from INKORDVRDSTATUS(258,1)</pre></font><font face="Verdana" size=1>
First one</font><font face="Courier New" size=2><pre>
select * from GET_ORDVRD(258,1)</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=217042&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
217042
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=217042&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
IB doesn't validate weird constructions
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
1)</font><font face="Courier New" size=2><pre>
create table t0(check(0=0))</pre></font><font face="Verdana" size=1>
   How can a table constraint be made without any field? I thought at least one field should be defined.<br>
<br>
2)</font><font face="Courier New" size=2><pre>
create table tgen2(a computed by(0))
create table tgen3(a computed by(0/(0)))
create table tgen4(a computed by(rdb$db_key))</pre></font><font face="Verdana" size=1>
Do you see any value in accepting this declaration? A computed field alone? I can never have a row.<br>
<br>
3)</font><font face="Courier New" size=2><pre>
create table tgen5(a int, b computed by(rdb$db_key))</pre></font><font face="Verdana" size=1>
Insert values in field a and then try to select = string truncation or arithmetic overflow.<br>
<br>
4)</font><font face="Courier New" size=2><pre>
create domain dint int default 'hello' not null</pre></font><font face="Verdana" size=1>
This is only a small example. IB never validates the default for any type of field. I can insert any kind of crap as default for domains of any datatype and also for fields defined inside a table.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=419065&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
419065
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=419065&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Join on diffrent datatypes
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
 I have the same field, in one table as char(10) (named FZDNR) and in the second table as NUMERIC (HNR). I need the following select expression:</font><font face="Courier New" size=2><pre>
SELECT * FROM WA WHERE HNR NOT IN (SELECT FZDNR FROM H)</pre></font><font face="Verdana" size=1>
In the pre-6 Versions of Interbase it was working fine, but now I get the whole table WA, so I think the join on HNR-FZDNR doesnt work. Tell me pls, is it a bug or is it an feature?<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=422240&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
422240
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=422240&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Left join with stored procedure
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
We have two stored procedures and want to do:</font><font face="Courier New" size=2><pre>
select * from proc1('AAA') p1
left join proc2('AAA') p2 on (p1.id=p2.id)</pre></font><font face="Verdana" size=1>
if execute this query - server crashes.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221925&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
221925
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221925&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Left joining table to SP: ORDER BY makes fields NULL
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
CREATE DOMAIN JOBCODETYPE AS VARCHAR(20);
CREATE DOMAIN STOCKCODETYPE AS VARCHAR(30);
 
create table Submit (
  jobid jobcodetype		not null primary key,
  completeby timestamp
);
 
create table Faults (
  id stockcodetype		not null,
  whenreported timestamp		default 'Now' not null,
  whendone timestamp,
  jmsref jobcodetype		not null,
 
  primary key (id,whenreported),
  foreign key (jmsref) references Submit(jobid) on update cascade
);
 
create view xAllFaults(jobid) as
  select distinct jmsref from Faults;
 
create view xWaitingFaults(jobid) as
  select distinct jmsref from Faults where whendone is null;
 
create view AllFaults(jobid,waiting) as
  select XAllFaults.jobid,XWaitingFaults.jobid from XAllFaults left join 
  XWaitingFaults on XAllFaults.jobid = XWaitingFaults.jobid;</pre></font><font face="Verdana" size=1>
All jobid's with faults, and 'f' or 'F' according to if any are undone</font><font face="Courier New" size=2><pre>
set term !! ;
create procedure JobFaults returns
  (jobid varchar(20), fault varchar(1))
as
declare variable waiting varchar(20);
begin
  for select
    XAllFaults.jobid,XWaitingFaults.jobid
    from XAllFaults
      left join XWaitingFaults on XWaitingFaults.jobid = XAllFaults.jobid
      into :jobid,:waiting
  do
  begin
    if (waiting is null) then
      fault = 'f';
    else
      fault = 'F';
 
    suspend;
  end
end!!
set term ; !!
 
insert into Submit values ('A',cast('Now' as timestamp));
insert into Submit values ('B',cast('Now' as timestamp));
 
insert into Faults(id,whenreported,jmsref) values 
  ('item A',cast('Now' as timestamp),'A');
insert into Faults(id,whenreported,whendone,jmsref) 
  values ('item B',cast('Now' as timestamp),cast('Now' as timestamp),'A');</pre></font><font face="Verdana" size=1>
Now try the following:</font><font face="Courier New" size=2><pre>
select * from Submit
  join JobFaults on Submit.jobid = JobFaults.jobid
  order by Submit.completeby;</pre></font><font face="Verdana" size=1>
Here there appear to be no faults joined to the Submit table</font><font face="Courier New" size=2><pre>
select * from Submit
  join JobFaults on Submit.jobid = JobFaults.jobid</pre></font><font face="Verdana" size=1>
Yet here the fault is shown correctly joined!!<br>
<br>
This report is very similar/identical to SFID 228716.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223058&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223058
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223058&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Multi-hop server ability broken
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The feature that allows you to connect to IB server through several other IB servers, like:<br>
   alpha:beta:\\gamma\delta:C:\InterBase\db.gdb<br>
does not work, if one of the relay servers (i.e. alpha, beta, gamma from above example) is IB6.<br>
<br>
IB6 will allow connection, but when trying to execute any command you will get<br>
  Dynamic SQL Error<br>
  -SQL error code = -901<br>
  -feature is not supported<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228135&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
228135
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228135&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
NULL is returned as zero through a left join in simple VIEW
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Consider:</font><font face="Courier New" size=2><pre>
select pvb.project, pvb.mjr, pvb.mnr, pvb.rls, pvb.bld, 
  b.id, b.priority, b.entered_by, b.closed, b.status
from bug b
left outer join project_version_bug pvb on (pvb.bug = b.id)
where b.assigned_to = user;
 
PROJECT   MJR   MNR   RLS   BLD  ID PRIORITY ENTERED_BY CLOSED STATUS
======= ===== ===== ===== ===== === ======== ========== ====== ======

      1     0     0     0     0   1        1 SYSDBA          N      A
      1     0     1     0     0   1        1 SYSDBA          N      A
   null  null  null  null  null   2        1 SYSDBA          N      A</pre></font><font face="Verdana" size=1>
This is correct, you can see the null values where there are no records in project_version_bug for bug id 2. However, using the BUG_ASSIGNED view (which is defined with exactly the same SQL statement) I get the following:</font><font face="Courier New" size=2><pre>
select * from bug_assigned;
 
PROJECT  MJR  MNR  RLS  BLD  ID PRIORITY ENTERED_BY CLOSED STATUS
======= ==== ==== ==== ==== === ======== ========== ====== ======

      1    0    0    0    0   1        1 SYSDBA          N      A
      1    0    1    0    0   1        1 SYSDBA          N      A
      0    0    0    0    0   2        1 SYSDBA          N      A</pre></font><font face="Verdana" size=1>
or even this:</font><font face="Courier New" size=2><pre>
select * from bug_assigned where project is null;
 
PROJECT  MJR  MNR  RLS  BLD  ID PRIORITY ENTERED_BY CLOSED STATUS
======= ==== ==== ==== ==== === ======== ========== ====== ======

      0    0    0    0    0   2        1 SYSDBA          N      A</pre></font><font face="Verdana" size=1>
Here all the null values as a result of the left outer join are presented as zeros. This is a case using one column to demonstrate even clearer the bug:</font><font face="Courier New" size=2><pre>
select project
from bug_assigned
where project is null;</pre></font><font face="Verdana" size=1>
Produces a zero as the result. The engine seems to recognize that the value is NULL so it honors the WHERE clause, but it returns zero. The view is very simple to be considered a boundary case.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=225218&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
225218
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=225218&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
NULLs always at the tail
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
According to the standard, it's up to the db vendor where NULLs should be, either at the tail or at the head of an ordered recordset. In IB, when you order ASC (default) on a field with NULLs, they go to the tail. That's a vendor decision. However, the engine must be consistent and in this case, it doesn't: if you order DESC on the same fields, NULLs will appear at the tail, too. One of the answers should be changed.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=219525&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
219525
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=219525&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
No current record for fetch operation
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
SELECT * FROM view_det
INNER JOIN view_inv ON view_det.invcod=view_inv.invcod</pre></font><font face="Verdana" size=1>
DOESN'T WORK - No current record for fetch operation. ... and neither will:</font><font face="Courier New" size=2><pre>
SELECT * FROM view_det, view_inv
WHERE view_det.invcod=view_inv.invcod</pre></font><font face="Verdana" size=1>
If you watch the query plan generated by the failing statement, you'll notice it's really big... no surprise since it involves a join of views that in turn are based on other joins. The workaround is to convert</font><font face="Courier New" size=2><pre>
SELECT * FROM view_det
JOIN view_inv ON view_det.invcod=view_inv.invcod</pre></font><font face="Verdana" size=1>
to become</font><font face="Courier New" size=2><pre>
SELECT * FROM view_det
JOIN view_inv ON view_det.invcod-view_inv.invcod=0</pre></font><font face="Verdana" size=1>
or</font><font face="Courier New" size=2><pre>
SELECT * FROM view_det
JOIN view_inv ON view_det.invcod+0=view_inv.invcod</pre></font><font face="Verdana" size=1>
or other variations that fool the optimizer by forcing it to a full scan to do the join. The original statement should work, so this is a bug and the same kind of bug that IB5.X suffered from.<br>
<br>
&amp;lt;For full details see original bug report&amp;gt;<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221921&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
221921
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221921&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ORDER BY has no effect
</a></b></td><td width="15%"><font face="Verdana"><b>
Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Take the following example of a self-referential table and a sproc that returns the children of a specified item:</font><font face="Courier New" size=2><pre>
create table ExampleTable (
code integer			not null primary key,
name varchar(100)		not null unique,
parent integer,

foreign key (parent) references ExampleTable(code)
);

/* Children result is not null if this item has it's own children */
set term !! ;
create procedure ChildrenOfItem(par integer) 
  returns (code integer,children integer) as
begin
for select
MainTypes.code, Min(ChildTypes.code)
from ExampleTable MainTypes
left join ExampleTable ChildTypes on MainTypes.code = ChildTypes.parent
where MainTypes.parent = :par
   or (MainTypes.parent is null and :par is null)
 group by MainTypes.code
 into :code,:children
do
suspend;
end!!
set term ; !!

insert into ExampleTable values (0,'A',null);
insert into ExampleTable values (1,'AA',0);
insert into ExampleTable values (3,'AB',0);
insert into ExampleTable values (4,'AC',0);
insert into ExampleTable values (2,'AD',0);

select * from ChildrenOfItem(0);</pre></font><font face="Verdana" size=1>
Gives: 1,2,3,4 as you would expect</font><font face="Courier New" size=2><pre>
select * from ChildrenOfItem(0) inner join 
  ExampleTable on ChildrenOfItem.code = ExampleTable.code
order by name;</pre></font><font face="Verdana" size=1>
Gives: 'AA','AD','AB','AC' even though it is order on name!! Codes are still 1,2,3,4<br>
HOWEVER, in this example, changing it to ORDER BY NAME DESC correctly returns AD,AC,AB,AA<br>
<br>
In my real system however, neither ORDER BY NAME or ORDER BY NAME DESC has any effect<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=225283&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
225283
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=225283&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ORDER BY on a VIEW turns values in fields into NULL
</a></b></td><td width="15%"><font face="Verdana"><b>
Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Consider a database with 5 tables and a couple of views, one of those views is called v_observation.  Consider two queries</font><font face="Courier New" size=2><pre>
select * from v_observation
select * from v_observation order by iobservationagree desc</pre></font><font face="Verdana" size=1>
These two queries return different (!) results. And not just the order.... It seems Firebird has trouble dealing with NULL values that are returned and, in the second case, completely omit the infomation retrieved from the database.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=430509&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
430509
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=430509&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ORDER BY works wrong with collate PT_PT
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Consider,</font><font face="Courier New" size=2><pre>
CREATE TABLE STOCKS (
  MNEN	        INTEGER NOT NULL,
  ACTIVO	VARCHAR(50) CHARACTER SET ISO8859_1 COLLATE PT_PT,
  CONSTRAINT PK_STOCKS PRIMARY KEY (MNEN) );</pre></font><font face="Verdana" size=1>
having the values:<br>
<br>
1, BA<br>
2, BES<br>
3, BCP<br>
4, BA Pref.<br>
5, Banif<br>
<br>
doing</font><font face="Courier New" size=2><pre>
SELECT ACTIVO FROM STOCKS ORDER BY ACTIVO</pre></font><font face="Verdana" size=1>
gives:<br>
<br>
BA<br>
Banif<br>
BA Pref.<br>
BCP<br>
BES<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447002&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
447002
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=447002&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Optimisation on subselects
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The InterBase Optimizer does not properly utilize indexes on sub-selects containing IN.  Example: (Using - Employee.gdb)</font><font face="Courier New" size=2><pre>
 select *  from employee
   where dept_no in
    (select dept_no from department where department = Marketing);</pre></font><font face="Verdana" size=1>
Produces the plan:<br>
   PLAN (DEPARTMENT INDEX (RDB$4,RDB$PRIMARY5))<br>
   PLAN (EMPLOYEE NATURAL)<br>
<br>
You can fool the optimizer into using the appropriate index by using the following trick.</font><font face="Courier New" size=2><pre>
 select *   from employee
   where dept_no  0 /* something that is always true */
   and dept_no in
     (select dept_no from department where department = Marketing);</pre></font><font face="Verdana" size=1>
Produces the correct plan:<br>
   PLAN (DEPARTMENT INDEX (RDB$4,RDB$PRIMARY5))<br>
   PLAN (EMPLOYEE INDEX (RDB$FOREIGN8))<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213460&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
213460
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213460&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Registering Events w/certain configuration crashes IB Server
</a></b></td><td width="15%"><font face="Verdana"><b>
 As Designed/Pitfall
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
With a certain server network configuration, registering an event will lock up the client and lockup the server (requiring a reboot if it runs as a service, or a process kill if it runs as an application (the guardian does not detect it's lockup)) *if* the client is accessing the server through the internet (if it comes through the local lan, then it's fine).<br>
<br>
Configuration Description To Cause Bug<br>
<br>
The above system has only one nic card in it. This card was assigned two IP's, the first being a 192.168.0.x (local network), and the second being it's internet address. A gateway for the NIC card was also set, in addition to IP Forwarding (which was removed later).<br>
<br>
This configuration, while not considered the best, is perfectly legal, and works effectively with all the different servers run on it (MS SQL Server, ftp and web servers, etc.), both accessed from the internet and the local intranet.<br>
<br>
It is only when a client attempts to register events when connected through the internet to the server system that the lockups occur. Otherwise, if the system is on the intranet, the access runs fine.<br>
<br>
Fix<br>
<br>
By setting the internet IP first, then having the intranet ip set in the advanced screen (under the internet IP), the problem is resolved (a reboot will be required after changing the configuration).<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233025&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
233025
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233025&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Server hangs when executing Stored Proc more than once
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When executing a SP inside a loop that accepts input parameters, the server hangs on the second iteration if the statement is not unprepared and re-prepared between iterations.  This is an old bug which goes back to v. 5.x as well.<br>
<br>
Note that, if you add a SUSPEND statement at the end of the SP and return a dummy parameter, you can multi-call the SP with SELECT instead of EXECUTE without the need to do the unprepare/prepare when passing subsequent sets of inputs.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223060&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223060
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223060&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Slow processing of GREATER-THAN operator
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Suppose you have table</font><font face="Courier New" size=2><pre>
  CREATE TABLE tab (field INTEGER  CHECK(field=0) );
  CREATE INDEX idx ON tab (field);</pre></font><font face="Verdana" size=1>
with lots of rows where field=0.<br>
When you execute these two statements</font><font face="Courier New" size=2><pre>
  SELECT * FROM tab WHERE field = 1
  SELECT * FROM tab WHERE field  0</pre></font><font face="Verdana" size=1>
they both will return the same result set, they both will use the same plan, however the second one (with ) will be much slower. The difference is caused by internal processing of = and  clauses when using indexes.<br>
<br>
When you execute</font><font face="Courier New" size=2><pre>
  SELECT * FROM tab WHERE field = 1</pre></font><font face="Verdana" size=1>
IB will use index to locate all values =1, o.k.<br>
<br>
When you execute</font><font face="Courier New" size=2><pre>
  SELECT * FROM tab WHERE field  0</pre></font><font face="Verdana" size=1>
IB will use index to locate all values =0 !!!<br>
i.e. ALL rows from our test table !!!<br>
<br>
Why nobody noticed it ?<br>
- for columns with more even distribution of values the speed difference is minimal<br>
- IB usually evaluates condition twice<br>
  1. it first locates row by index (not always correctly as you can see)<br>
  2. after fetching row it evaluates the condition again (in this case it discards rows where field=0, that should have been filtered out by index)<br>
<br>
How can you verify this theory ?<br>
- start (W)ISQL and update one row where value is 0.<br>
  Do not commit.<br>
<br>
- start another (W)ISQL and start transaction<br>
  SET TRANSACTION READ COMMITTED NO RECORD_VERSION NO WAIT<br>
<br>
Now, first execute faster query (where field = 1). You will get correct answer. Then execute slow query (where field  0). You will get lock conflict error.<br>
<br>
It means that IB tries to internally fetch row that does not meet criteria (value0) and that should have been skipped when using index properly.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213859&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
213859
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213859&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Subquery connected with 'IN' clause
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Given a table test which has the colums id integer (unique) and num integer. Insert some records (~40.000 in my case). Most of the numbers in column num are distinct, only some are two ore three times repeated.<br>
<br>
The following query fails:</font><font face="Courier New" size=2><pre>
Select id, num from test where num in (select num from test group by num having count(num  1))</pre></font><font face="Verdana" size=1>
What is expected: those numbers WITH ID's which occur more than one time in the database.<br>
<br>
Note: * Each query for it's own succeeds.<br>
         * Preparing column num in a way that select num from test group by num having count(num  1) would return only one row and rewritting the statement as Select id, num from test where num = (select num from test group by num having count(num  1)) succeeds too.<br>
<br>
Tested with MS Access, MS-Sql, Oracle using the same data, the query finished within three seconds.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=409769&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
409769
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=409769&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
UDF argument can't be query-parameter
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
  SELECT
     Field1, Field2, ... , UDF1(Field1, ?Param1)
  FROM
     TABLE1</pre></font><font face="Verdana" size=1>
doesn't work - message is unknown data type<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221649&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
221649
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=221649&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Unique index allowed on NULLABLE field
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
create table mau(a int);
commit;
create UNIQUE index idx_mau on mau(a);
commit;</pre></font><font face="Verdana" size=1>
Whether this was left as a transition from Paradox (that accepts NULL PKs) or it's an oversight is what I want to confirm.<br>
<br>
As a comparation, you cannot declarate a PK or UNIQUE constraint if you don't include the NOT NULL clause on the affected field(s), so the underlying automatic index for such constraint will be always on non-nullable column(s).<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=211781&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
211781
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=211781&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Win32: Server don't close thread handles
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Allocation location is in SVC_start, last param 'service-svc_handle'.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233644&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
233644
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233644&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
cannot specify PLAN in UPDATE statement
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I need to set FULLNAME=NAME for all records in company where fullname IS NULL or fullname = '', so I wrote the following statement:</font><font face="Courier New" size=2><pre>
UPDATE company cp
  SET fullname= (SELECT name FROM contact ct WHERE ct.id=cp.contactkey)
  WHERE cp.fullname IS NULL OR cp.fullname = '';</pre></font><font face="Verdana" size=1>
Both tables contains ~40K records so the request hangs my machine. After reboot I checked the plan and it was PLAN(company NATURAL, contact NATURAL).<br>
<br>
I tried to set PLAN for entire UPDATE statement or only for SELECT sub-query but in both cases I received error message Invalid SQL or something like this.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=459059&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
459059
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=459059&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
index breaks = ANY result
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Using Martin Gruber's book, I've found that index can break returning result of ANY subquery.</font><font face="Courier New" size=2><pre>
CREATE TABLE CUSTOMERS (
    CNUM INTEGER,
    CNAME CHAR(10),
    CITY CHAR(10),
    RATING INTEGER,
    SNUM INTEGER);
 
INSERT INTO CUSTOMERS VALUES (2001, 'Hoffman', 'London', 100, 1001);
INSERT INTO CUSTOMERS VALUES (2002, 'Giovanni', 'Rome', 200, 1003);
INSERT INTO CUSTOMERS VALUES (2003, 'Lui', 'San Jose', 200, 1002);
INSERT INTO CUSTOMERS VALUES (2004, 'Grass', 'Berlin', 300, 1002);
INSERT INTO CUSTOMERS VALUES (2006, 'Clemens', 'London', NULL, 1001);
INSERT INTO CUSTOMERS VALUES (2008, 'Cisneros', 'San Jose', 300, 1007);
INSERT INTO CUSTOMERS VALUES (2007, 'Pereira', 'Rome', 100, 1004);
 
SELECT *
FROM Customers c
WHERE not c.rating  = any
   (SELECT r.rating
   FROM Customers r
   WHERE r.city = 'San Jose');</pre></font><font face="Verdana" size=1>
When there is no index on RATING field all OK, and result is the same when not c.rating = ANY is changed to c.rating  ALL (this is normal behavior according to the book and SQL standard).</font><font face="Courier New" size=2><pre>
CNUM	CNAME	CITY	RATING	SNUM
2001	Hoffman	London	100	1001
2007	Pereira	Rome	100	1004</pre></font><font face="Verdana" size=1>
But if index on RATING is added</font><font face="Courier New" size=2><pre>
CREATE INDEX BYRATING ON CUSTOMERS (RATING);</pre></font><font face="Verdana" size=1>
things goes wrong, and not c.rating = any starts using index and producing wrong results:<br>
PLAN (R INDEX (BYRATING))<br>
PLAN (C NATURAL)</font><font face="Courier New" size=2><pre>
CNUM	CNAME	CITY	RATING	SNUM
2001	Hoffman	London	100	1001
2006	Clemens	London		1001
2007	Pereira	Rome	100	1004</pre></font><font face="Verdana" size=1>
middle record have RATING value = NULL.<br>
<br>
Workaround is only one - use c.rating  ALL instead of ANY. It does not use index and returns correct result. But this is not applicable for all cases.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=408272&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
408272
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=408272&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
infinite insertion cycle
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The execution of the following query will result in the engine going into an infinite insertion cycle:</font><font face="Courier New" size=2><pre>
insert into MyTable select * from MyTable</pre></font><font face="Verdana" size=1>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=452120&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
452120
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=452120&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
CREATE VIEW ignores PLAN
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When you include an explicit plan in a CREATE VIEW statement, the plan is silently ignored.</font><font face="Courier New" size=2><pre>
create table a (
	b integer not null
);
create index a_b on a(b);
 
create view view_a(b) as
  select b
  from a
  where b  2
  plan (a natural);
commit;
 
set plan;
set echo;
select * from view_a;
select b from a where b  2
  plan (b natural);
commit;</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=444763&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
444763
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=444763&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Empty column names with aggregate funcs
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
If you execute this statement the column name of the inner select is empty:</font><font face="Courier New" size=2><pre>
select (select count(1) from rdb$database) from rdb$database</pre></font><font face="Verdana" size=1>
I don't know if this is a bug or just a limitation but it seems that this bug(limitation) is somehow related to #222476. The difference is that it happen with all aggregate functions(count, min, max, sum, avg) and also in dialect 1.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=444081&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
444081
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=444081&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
FOR SELECT firs SUB SELECT is wrong
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
</font><font face="Courier New" size=2><pre>
 FOR SELECT
  DO BEGIN
    SELECT xxx FROM WHERE yyy in (SELECT xxx)...; - It's wrong
  END</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223516&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223516
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223516&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Missing types in rdb$types.
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The Language Reference describes rdb$fields.rdb$field_type values which are missing from the the RDB$Types table, the missing values are:<br>
   D_FLOAT = 11<br>
   GROUP = 12<br>
   ROLE = 13<br>
   INT64 = 16<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=451944&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
451944
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=451944&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Trigger Activate/Deactivate increases meta counter
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Activating/Deactivating trigger should not increment the metadata counter.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=449011&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
449011
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=449011&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Unique key and char type in SQLDialect 3
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Unique key and char type in SQL Dialect 3 If to create a database with use SQL Dialects 3, to the line data there is a following:<br>
<br>
Example of the table:</font><font face="Courier New" size=2><pre>
CREATE TABLE LABELS (
  CODE VARCHAR (13) NOT NULL,
  VALUT SMALLINT NOT NULL,
  PRIMARY KEY (CODE));</pre></font><font face="Verdana" size=1>
Both columns should not be equaled NULL and primary (unique!) key - CODE.<br>
<br>
At addition in a database of a line (for example CODE = ABC and VALUT=1) all is normal,<br>
<br>
But if to remember changes, then it is possible to appropriate(give) to a field CODE=NULL!!! - and it NOT a ZERO INDEX, and primary!<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=458863&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
458863
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=458863&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Default column(s) for REFERENCES
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
In Language Reference, there is written for REFERENCES keyword used in CREATE TABLE and ALTER TABLE commands:</font><font face="Courier New" size=2><pre>
col_constraint = [CONSTRAINT constraint] ...
  REFERENCES other_table [( other_col [,
other_col ...])] ...</pre></font><font face="Verdana" size=1>
REFERENCES Specifies that the column values arederived from column values in another table; if you do not specify column names, InterBase looks for a column with the same name as the referencing column in the referenced table.<br>
<br>
Current (and I think that correct) behaviour is that if you do not specify column names, primary key from referenced table is used.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: GBAK                           </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=471674&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
471674
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=471674&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Direct file access with SuperServer
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
command report:<br>
  lock manager error<br>
  inconsistent lock table version number; found 114, expected 14<br>
<br>
After reading documentation about Security on CS and SS I thing, that SS not support direct file access, but why gbak (and other command line utilities) report lock manager error.<br>
<br>
When FirebirdSS start, it does not create IPC semaphores. After execute gbak with direct file access, IPC semaphores is created, but not removed.<br>
<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=429594&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
429594
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=429594&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
GBAK  UDF in 'COMPUTED BY' field
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
GBAK restores tables and views before UDFs. If table or view contains an UDF in 'COMPUTED BY' filed, GBAK can't restore it.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=417567&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
417567
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=417567&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
GBAK can't restore database after backup
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Sometimes GBAK can't restore database from successfull backup. It can't resolve dependecies between triggered views.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=424307&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
424307
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=424307&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
GBAK overwrites BK file
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
GBAK overwrites BK file before starting back up process. So if you have database with valuable data  and backup copy of it. And your database file gets corrupted so GBAK cannot proceed and you will execute command gbak -b database backup<br>
<br>
gbak will erase backup file then checks database file and after encountering error will stop process so you will loose your backup file forever.<br>
<br>
In my example I had GDB file and BK. GDB file was in 5.6 format and server was of 6.0. I forgot for version of GDB file and run gbak. It deleted my BK file and raises error message that GDB of wrong ODS version.<br>
<br>
The right behavior would be to overwrite BK file only after successfull process is done.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228431&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
228431
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=228431&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
gbak cannot restore backup made by IB v5
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
gbak under Linux is coredumping while loading a database backup made by gbak v5. the bug is deterministic and does not concern the official borland gbak for v6 and is related to the database content - only one of 3 different database backups generated the bug.<br>
<br>
Database in question:<br>
  about 150MB, no triggers, no stored procedures - pure data but about a dozen of generators.<br>
<br>
Returning to official gbak the bug disappeared.<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=416228&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
416228
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=416228&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
gpre generates invalid isc_vtov calls
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
gpre generates the following incorrect code for tan.e in TCS (line 6303+):</font><font face="Courier New" size=2><pre>
      isc_vtov (isc_342.isc_345, run_name, sizeof (run_name));
      run_count = isc_342.isc_343;
      isc_vtov (isc_342.isc_346, max_date, sizeof (max_date));
      isc_vtov (isc_342.isc_347, min_date, sizeof (min_date));</pre></font><font face="Verdana" size=1>
The second parameter to isc_vtov is the incorrect type.  This causes the compiler in Darwin to generate an error message and not compile the tan.c file.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category: IBConsole (No Longer Used)     </b><p> <table>
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=457230&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
457230
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=457230&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Aritmetic Exception on Object Exception
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When a Exception have � or another Brasilian language symbol and select object Exceptions on IBConsole under Database raise a exception Arithmetic exception, numeric overflow, or string truncation Cannot transliterate character between character sets<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223513&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223513
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223513&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Ambiguity between tables and views in isql's SHOW commands.
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Consider,</font><font face="Courier New" size=2><pre>
SQL create table t(a int);
SQL create view v as select a from t;
SQL show tables;
       T                 V</pre></font><font face="Verdana" size=1>
Notice both T and V are shown, but only T should be shown. One can argue that a view is a virtual table, etc.<br>
<br>
Now the next item, this shouldn't work:</font><font face="Courier New" size=2><pre>
SQL show table v;
A                               INTEGER Nullable
View Source:
==== ======
 select a from t</pre></font><font face="Verdana" size=1>
This also shouldn't work:</font><font face="Courier New" size=2><pre>
SQL show view t;
A                               INTEGER Nullable</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223126&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223126
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223126&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Misplaced collation when extracting metadata with isql
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
There is a bug that if you override a domain's constraints or default and also override the collate the collate will be  extracted before the default or constraint.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=225219&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
225219
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=225219&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql -a: wrong order with domains based on table's fields
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
According to the documentation: �The CHECK constraint in a domain definition sets a dom_search_condition that must be true for data entered into columns based on the domain. The CHECK constraint cannot reference any domain or column.�<br>
<br>
So, this should be banned:</font><font face="Courier New" size=2><pre>
create domain d_ontable int
check(value(select rdb$relation_id from rdb$database))</pre></font><font face="Verdana" size=1>
Now what happens with a restore if the domain's check constraint is based on a user table? (And not a system table, where it could work eventually.)<br>
<br>
Markus Kemper discovered this issue initially but he wrote that isql was unable to extract info from it, because he though it was an isql limitation. This is only geeky detail or joke, a bit unrelated with the previous: please see how useful is this domain:</font><font face="Courier New" size=2><pre>
create domain value_gt_value int check(valuevalue)</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450404&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
450404
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=450404&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
isql uppercases role in the command line
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I think example should be enough clear: when isql is invoked and the role is passed in the command line, it always uppercases the role:<br>
<br>
H:\ibdev\fbbuild\interbase\dsqlisql<br>
c:/proy/fbtest.gdb -u cvc -p pw -r for cvc<br>
Database:  c:/proy/fbtest.gdb, User: cvc, Role: FOR CVC<br>
SQL<br>
<br>
As you can see, isql puts the message with the role in uppercase and indeed the engine received it uppercased. Notice that double quotes weren't interpreted as don't change the input parameter.<br>
<br>
However, when doing the connection as a command, the role is processed correctly:<br>
<br>
H:\ibdev\fbbuild\interbase\dsqlisql<br>
Use CONNECT or CREATE DATABASE to specify a database<br>
SQL connect c:/proy/fbtest.gdb user cvc password pw<br>
role for cvc;<br>
Database:  c:/proy/fbtest.gdb, User: cvc, Role: for cvc<br>
SQL<br>
<br>
Now, isql reflects the unchanged role and the engine receives it correctly.<br>
<br>
Whether this anomaly exists for some purpose I don't know, but I consider it a bug. Both ways to work with isql should be equivalent when facing identifiers surrounded by double quotes.<br>
<hr size=1>
</td></tr>
 </table>
<b> Category:                                </b><p> <table>
              Installation - Server
<tr><td width="10%"><font face="Verdana"><b>
SF ID
</b></td><td width="75%"><font face="Verdana"><b>
Description
</b></td><td width="15%"><font face="Verdana"><b>
Group/Status
</b>&nbsp;</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224130&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
224130
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224130&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Install conflict with Interbase
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
I had previously installed the ib_client package. I installed firebird. Things got very confused. For example here are the registry entries:<br>
<br>
[HKEY_LOCAL_MACHINE\Software\Borland\InterBase\CurrentVersion]<br>
UseCount=dword:00000001<br>
RootDirectory=C:\\Program Files\\Borland\\InterBase\\<br>
Version=WI-V6.0.0<br>
DefaultMode=-r<br>
ServerDirectory=:\\Program Files\\firebird\\<br>
GuardianOptions=1<br>
<br>
Notice that it was installed into C:\Program Files\Firebird but the root directory is C:\Program Files\Borland\Interbase. The RootDirectory entry was apparently left over from my install of ib_client. After I thoroughly uninstall Firebird and Interbase and re-install Firebird, the RootDirectory is C:\\Program Files\\firebird\\ which is probably correct.<br>
<br>
The normal procedures of installing software under Windows is that either [a] Firebird is Interbase so I should be able to install over an old version, or [b] Firebird is not Interbase so I should have no problem installing both on the same machine. But in may ways Firebird still thinks it is named InterBase and gets confused.<br>
<br>
We should anyone installing Firebird to uninstall any version of InterBase, server or client, before installing Firebird. If possible, the Firebird install should check to see if InterBase is installed, and halt with an error message if so.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=230361&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
230361
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=230361&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Install erases all users and passwords
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Installing Firebird over top of an existing installation of Firebird replaces ISC4.GDB, thereby wiping out the existing list of usernames and passwords.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224333&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
224333
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=224333&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
xinitd in Mandrake 7.2
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Mandrake 7.2 can be setup to use xinetd instead of the regular inetd in which case the /etc/inetd.conf file is not the right way to setup the server.  Instead a file needs to be placed in /etc/xinet.d with basically the same information as goes in inetd.conf.<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212656&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212656
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212656&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
ResultSet ignores column labels
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
- applies to InterClient1.6 and InterClient2.0<br>
 <br>
- details and a fix are here:<br>
http://www.egroups.com/message/IB-Java/42<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233063&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
233063
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=233063&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Scale error in getBigDecimal
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
1) In IBConsole</font><font face="Courier New" size=2><pre>
create table bug(bug integer)
insert into bug values (10)</pre></font><font face="Verdana" size=1>
2) In Java</font><font face="Courier New" size=2><pre>
conn = DriverManager.getConnection(......);
statement = conn.createStatement();
resultSet = statement.executeQuery(select * from bug);
while (resultSet.next()) {
    System.out.println(resultSet.getBigDecimal(1, 5));
}</pre></font><font face="Verdana" size=1>
Output is 0.00010 !<br>
<br>
Explanation:<br>
Bug in class ResultSet, method getBigDecimal</font><font face="Courier New" size=2><pre>
synchronized public java.math.BigDecimal 
  getBigDecimal (int column, int scale) 
  throws java.sql.SQLException
  {
................................
    case IBTypes.INTEGER__:
      return java.math.BigDecimal.valueOf ((long) getRowData_int (column-1), scale); 
      // !!! but first parameter is unscaled(!) value !!!
................................</pre></font><font face="Verdana" size=1>
Solution:</font><font face="Courier New" size=2><pre>
return java.math.BigDecimal.valueOf (
  (long) getRowData_int (column-1)).setScale(scale, 
  java.math.BigDecimal.ROUND_HALF_EVEN);</pre></font><font face="Verdana" size=1>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227414&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
227414
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=227414&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Sometimes Interbase/Interserver stop grant connections
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
Sometimes I have this problem while asking for Interbase connection, sometimes releasing it. I cannot understand the exact way to reproduce it, but I attached a simple java program that loops until the error presents. If you want to try to reproduce it execute three of four instances of the program at the same time.<br>
<br>
The error is java.lang.VerifyError.<br>
<br>
I'm using:<br>
- Interbase 6.0.1<br>
- Interclient 2.0 beta (I tried IC1.6 but with the same result...)<br>
- Windows 2000 Professional<br>
- Sun JVM 1.3<br>
<br>
The same program works fine, without any error, for hours and hours, if I use the latest trial version of Easysoft ODBC driver<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212653&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212653
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212653&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Statement.getFetchSize not supported
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
- applies to InterClient1.6 and InterClient2.0<br>
<br>
- Statement.getFetchSize throws a DriverNotCapableException while Statement.setFetchSize _is_ supported.<br>
<br>
- how to fix: &amp;lt;sniped, see bug report for details&amp;gt;<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212651&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
212651
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=212651&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Statement.setMaxRows has no effect if fetchSize==0 (default)
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
- applies to InterClient1.6 and InterClient2.0<br>
<br>
- Statement.setMaxRows (PreparedStatement.setMaxRows respectively) have no effect if no fetchSize has been defined (fetchSize is 0 by default). In this case a ResultSet will return all rows of a query, even if the rowcount exceeds maxRows.<br>
<br>
- how to fix: &amp;lt;sniped, see bug report for details&amp;gt;<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=466553&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
466553
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=466553&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
UnavailableInterBaseServerException
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
There is a serious bug in Interclient when getting a connection to Interbase/Firebird, the bug has been reported in various IB/FB newsgroupst.<br>
<br>
The bug is that in a multi connection enviorement after some time Interclient throws UnavailableDatabaseExceptions. Than no new connection can be established. Users that have connections can work as normal.<br>
<br>
If some connections are closed than new connections are established again -- at the moment IB/Firebird with Interclient is not usable with multi-connections.<br>
<br>
I have written a test program that shows the bug after some time.  I tested it on Win2000SP2 and on WinNTSP6 with FirebirdBeta2/OpenSourceInterbase and Interclient 2.0.2 from the trail with the patch.<br>
<br>
The exception is thrown in the method remote_ATTACH_DATABASE() of the Class Connection where recvMsg.get_SUCCESS () returns false and so the following exception is thrown.<br>
(interbase.interclient.UnavailableInterBaseServerException: [interclient][interbase] unavailable database)<br>
<br>
&amp;lt;For test code see original bug report&amp;gt;<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=425880&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
425880
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=425880&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
build.xml bug on Solaris 7
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
When you try to build the InterClient 2.0 with ANT, you get the linker problem:</font><font face="Courier New" size=2><pre>
link.cpp:
[execon] Undefined first referenced
[execon]  symbol in file
   
[execon] /home/r/src/ic/20/build/interserver/NetTCP.o  
  (symbol belongs to implicit dependency /usr/lib/libsocket.so.1)
[execon] /home/r/src/ic/20/build/interserver/NetTCP.o
  (symbol belongs to implicit dependency /usr/lib/libsocket.so.1)
[execon] /home/r/src/ic/20/build/interserver/NetTCP.o
  (symbol belongs to implicit dependency /usr/lib/libsocket.so.1)
[execon] /home/r/src/ic/20/build/interserver/NetTCP.o
  (symbol belongs to implicit dependency /usr/lib/libsocket.so.1)
[execon] /home/r/src/ic/20/build/interserver/NetTCP.o
  (symbol belongs to implicit dependency /usr/lib/libsocket.so.1)</pre></font><font face="Verdana" size=1>
This can be solved by adding the argument arg value=-lsocket/ to the execon ... command in the link.cpp target.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213428&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
213428
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=213428&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
timeout in ib doesn't notify interclient
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
After a connection has been idle for a certain amount of time Interbase disconnects without InterClient being notified.<br>
<br>
This causes an exception the next time any kind of remote operation is performed, and makes the Connection worthless ( for obvious reasons ).  I think would should implement a 'reconnect' parameter in the Connections parameters to specify whether or not we want it to automatically reconnect if a dead connection is detected.  This is already being done in MySQL's JDBC driver.  Since JDBC doesn't have a detection method to check the validity of the connection, this is the only option I see as pheasible.<br>
<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=469572&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
469572
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=469572&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
1.0/Beta 2: inst.script broken for Linux
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The install scripts (install.sh, and scripts/CS*.sh) are broken.<br>
<br>
1) The have the /opt/... path hardcoded. This directory is not part of the linux standard filesystem and many distributions (including slackware 8.0) don't create /opt. Won't it be better to simply ask the user for the install root directory - which you should be doing even if /opt existed ?<br>
<br>
2) One of the scripts has '/usr/bin/mkpasswd' harcoded. That command is under /usr/sbin/ in linux. Why not just use 'mkpasswd', since we are installing under root, we get both /usr/bin and /usr/sbin, so you don't have to hardcode either.<br>
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
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229237&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
229237
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229237&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Blank passwords poorly supported
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The tools like isql poorly support having a user with a blank password.  You are allowed to create one but then you can't ever connect using isql if you create the user that way.  The obvious option of trying -p  for the password doesn't work and is thrown out by the argument parser.  Not supplying a password also doesn't work.<br>
<br>
The isql tool should allow -p  for the password and try to connect using a blank password in that case.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229894&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
229894
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=229894&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Client program can log on as any user.
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
The client program by manipulation of the user_string property can log onto the server as any user including sysdba.<br>
<br>
The usage of the user_string passed from the client to the server in the form name:uid:gid and is used as the default logon userid if no explicit user name/password is supplied.  This field is accepted without question by the server.<br>
<br>
If the user_string is blank when passed to the server (as apparently is the case for BDE), then (linux surver anyway) defaults the user to the geteuid() of the server process.<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222375&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
222375
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=222375&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
Grants overwrite previous rdb$security_classes entries
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
First, let me say that a clarification is need. If Firebird can rely solely on rdb$user_privileges, then this report is not critical. Otherwise, the results of records being overwritten silently on rdb$security_classes is an issue. The following is an almost unedited copy from an article I wrote on the NG:<br>
<br>
- Create a table with 31-byte name.<br>
- Create a second table with the same name, except that it differs only in the last, 31th character.<br>
- Grant permissions to userA on the first table and to userB on the second table.<br>
- Go to see rdb$user_privileges and you'll see your entries as they should be.<br>
- Go to rdb$security_classes: with rdb$ as a prefix, 31-4=27, oh what a brilliant person I am.<br>
Here's your 27-byte limitation: what happened to this table?<br>
Both entries were mapped to the same record, same security class! As a result of that, the second GRANT overwrote the information for the first one, because rdb$security_classes.rdb$security_class used sql$table_name hence the last 4 bytes were ignored. Feature? Undocumented limitation? Bug?<br>
<br>
So, what LangRef says could be refurbished as:  "Some objects, such as security class names, are restricted in practice to 27 bytes in length."<br>
<br>
The final part comes from Ivan Prenosil: Or perhaps something like "Table names should not exceed 27 bytes, otherwise you can expect problems with privileges...."<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223128&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
223128
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=223128&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
SYSDBA can grant non existent roles
</a></b></td><td width="15%"><font face="Verdana"><b>
 Confirmed Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
IB doesn't check the user in a GRANT statement probably because the db can be moved to another server where such user is defined, since the information is stored in isc4.gdb only.<br>
<br>
But why would IB allow SYSDBA to grant no existent roles to users? For example, this is accepted:</font><font face="Courier New" size=2><pre>
grant anything to alice</pre></font><font face="Verdana" size=1>
However, anything doesn't exist in rdb$roles but rdb$user_privileges logs a role granted to alice.<br>
<br>
In contrast, a non-privileged user can't grant a role that doesn't exists. So I wonder is this is a bug or a feature. Why would SYSDBA need to bypass role checking when grating roles to users?<br>
<hr size=1>
</td></tr>
<tr><td width="10%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=423810&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
423810
</a></b></td><td width="75%"><font face="Verdana"><b>
<a href="http://sourceforge.net/tracker/?func=detail&amp;atid=109028&amp;aid=423810&amp;group_id=9028" style="text-decoration:none;color:#4169e1;">
User Password length
</a></b></td><td width="15%"><font face="Verdana"><b>
 Initial Bug
</b></td></tr>
<tr><td width="10%"><font face="Verdana">&nbsp;
</td><td colspan=2><font face="Verdana">
<br>
try to connect to a database with user=SYSDBA and passord=masterke It seems that password legth is truncated to 8 char. Looking in isc4.gdb, PASSWD ( in table users) is defined as PASSWD AS VARCHAR(32) CHARACTER SET OCTETS;.<br>
<hr size=1>
</td></tr>
 </table>
</td></tr>
<tr><td><hr size=1></td></tr>
</table>