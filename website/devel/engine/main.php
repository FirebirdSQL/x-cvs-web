<?php

if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">
<tr>
<td>
<center>
<h1>Future Versions of Firebird</h1>
Last updated :: 20 August 2004
</center>
<br>
This draft emanates from recent discussion in the reformed Admin group regarding the future direction of Firebird.  Feedback from the developers has been merged into the tentative plan and now it is time to throw open the discussion to a wider audience for feedback and comments.
The proposed development Roadmap that follows is not cast in stone. It will be updated and expanded in response to further feedback from other Firebird developers and informed members of the user community.
<p>
At present we have three branches of Firebird code:
<ul>
<li>the current 1.5.1 code base
<li>Firebird HEAD, the basis for the next major release
<li>Vulcan
</ul>
Also:<ul>
<li>there is a placeholder for a V1.5.2 release if any regressions are found in the V1.5.1 release
<li>the Yaffil code currently in the process of being merged in a private branch.
</ul>
<h2>Current Plan</h2>
The current plan is to tag the HEAD branch as 2.0, freeze development and use the code as the basis of the Firebird 2.0 release. Firebird 2.0 will require a change to the on-disk structure (ODS).
<p>
Beyond that, Firebird 2.0 would be merged with Vulcan for release as Firebird 3.0.
<p>
The rationale for this two-step plan is the realisation that trying to combine all three development streams in one hit (2.0 = HEAD + Yaffil + Vulcan) would extend the release date for  the next major version of Firebird to an unacceptable degree.
<h3>The <a href="#head">HEAD</a> branch</h3>
HEAD is the currently-active development branch of the Firebird CVS tree on Sourceforge. The feature freeze should happen as soon as possible. HEAD would be tagged as 2.0 and all incomplete features would be finished. Merger of the Yaffil features for inclusion in Firebird 2.0 is to be considered a "must-do".
<p>
The aim would be a first alpha release in September with final release by the end of 2004.
<h3><a href="#vulcan">Vulcan</a></h3>
Vulcan is an experimental branch that Jim Starkey took from HEAD about 6 months ago to implement fine grained multi-threading, and to provide support for shared memory multi-processor (SMP) machines and 64bit operating systems.  The Vulcan requirements stem from an open source development contract that IBPhoenix has with a large software supplier.
<p>
Initial alpha release is to happen soon with further beta releases as and when available. Final release is targeted at the end of 2004.

<h3><a href="#yaffil">Yaffil</a></h3>
Yaffil was a closed-source fork from the Firebird 1.0 beta codebase, that is no longer considered maintainable by its Russian developers. These developers have presented their modifications to the project for merging into the main Firebird codebase.

<h3>FIREBIRD 3.0</h3>
Merger of Firebird 2.0 and Vulcan, aiming for first alpha release April/May 2005 and full release towards the end of 2005.

<h2>Field testing</h2>
Both Firebird 2.0 and Vulcan are likely to be available at around the same time as binary builds that users can install and experiment with simultaneously.    That means you, as field-testers, will have a period during which you can choose (and jump) between Vulcan's new capabilities-including SMP support--and Firebird 2.0 features.
<h2>Outline plan</h2>
The target dates are estimates, with no guarantee that any is achievable.  However, we will be trying to keep on target by improving our self-discipline with regard to "feature creep", QA and code scrutiny during the alpha and beta cycles.  Large-scale code cleanup during the freeze would be forbidden.
<p>
The project is now in the fortunate position of having one full-time core developer and a number of part-timers positioned to remain available consistently, thanks to grants, or to accommodations made by employers.<br>
As more detail comes to hand and we get a better handle on sequence, we will expand the following outline into a roadmap.

<h2>Planned features</h2>
The following list summarises the features currently complete or under some degree of development.
<a name="head"></a>
<h3>HEAD</h3>
<h4><i>Derived Tables</i></h4>
Proposed Release: Firebird 2.0
<p>
A derived table (not to be confused with "temporary tables") is one that is created on-the-fly using the SELECT statement, and referenced just like a regular table or view. Derived tables exist in memory and can only be referenced by the outer SELECT in which they are created.
<blockquote>
* SQL Standard: A derived table is a table derived directly or indirectly from one or more other tables by the evaluation of a <query expression> whose result has an element type that is a row type. The values of a derived table are derived from the values of the underlying tables when the <query expression> is evaluated.
</blockquote>
For example, this query lists managers whose departments have more than 25 employees.  The query specification includes a subquery that generates a derived table (aliased as "d") which is joined to the employee table:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>

<font face="Courier" size="+1">
<pre>
Select
  e.name,
  d.department
from employees e
  join
    (select d1.department,
            d1.mgr_id
     from departments d1
       join employees e1
       on (d1.dept_id = e1.dept_id)
     group by
       d1.department,
       e1.emp_id
       having count (*) > 25) d
  on (d.mgr_id = e.emp_id)
</pre></font>
</td></tr></table>
</td></tr></table>
<h4><i>New index structure</i></h4>
Proposed Release: 2.0
<p>
The current work on enhancements to indexing introduces a new B-tree page layout.  This makes a major change to the on-disk structure unavoidable.  The work is considered critical for the next Firebird release. The strategy for implementing the ODS change still needs work.

<h4><i>Segment-level index selectivity</i></h4>
Proposed Release: 2.0
<p>
Arno Brinkman and Dmitry Yemanov have done all the necessary ODS changes to enable index selectivity to be computed segment-by-segment.  Amendment of the optimizer subsystem to to properly use the per-segment selectivity statistics is still to be completed. 

<h4><i>New record number encoding</i></h4>
Proposed Release: 2.0
<p>
An enhanced system for record number encoding will be implemented for the new ODS by Nickolay Samofatov, to remove the existing upper limit on table rowcount. 

<h4><i>Automatic casting in unions</i></h4>
Proposed Release: 2.0
<p>
Existing rules require an explicit CAST of all corresponding columns to a single data type in a union of two different data types into the same output column.
<br>
Example:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>

<font face="Courier" size="+1">
<pre>
SELECT CAST(VarCharField30 AS VARCHAR(30)) FROM Table1
UNION ALL
SELECT CAST(VarCharField10 AS VARCHAR(30)) FROM Table1
</pre></font>
</td></tr></table>
</td></tr></table>
<br>
Arno Brinkman proposes to implement "union auto-cast", whereby the contributing columns would be cast automatically to the length of the longest column.  No explicit casting would be needed. This more closely follows the SQL standard (9.3 Data types of results of aggregations). For determining the output data type, union auto-cast would use a function already implemented for COALESCE and CASE.

<h4><i>EXECUTE BLOCK syntax</i></h4>
Proposed Release: 2.0
<p>
Vlad Horsun and others are developing a syntax to allow DSQL execution of an unnamed block of procedural language code, consisting of a BEGIN...END block headed by an EXECUTE BLOCK statement.
<br>
Syntax pattern:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>
<font face="Courier" size="+1">
<pre>
EXECUTE BLOCK [ (param datatype = ?, param datatype = ?, ...) ]
  [ RETURNS (param datatype, param datatype, ...) }  AS
 [DECLARE VARIABLE var datatype; ...]
 BEGIN
   ...
 END
</pre></font>
</td></tr></table>
</td></tr></table>

<h4><i>Re-implementation of cursor syntax in PSQL</i></h4>
Proposed Release: 2.0
<p>
Completed by Dmitry Yemanov, this syntax re-implements the dormant cursor syntax for positioned updates in PSQL.  Existing code using the older implementation is still supported.

<h4><i>CANCEL STATEMENT syntax</i></h4>
Proposed Release: 2.0
<p>
A design proposal has been done (D. Yemanov) but a final decision about implementation is yet to be made, pending related decisions in Vulcan.  A full implementation would ideally be done through the API;  some degree of implementation will be available in the Firebird 2.0 release.

<h4><i>Correct handling of table-aliases</i></h4>
Proposed Release: 2.0
<p>
In Firebird 1.5, the following statement correctly raises an "Ambiguous field name..." exception, due to the missing alias and column name qualifiers:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>
<font face="Courier" size="+1">
<pre>
SELECT
  RDB$RELATION_NAME
FROM
  RDB$RELATIONS r
  JOIN RDB$RELATIONS ON (r.RDB$RELATION_ID = RDB$RELATION_ID)
</pre></font>
</td></tr></table>
</td></tr></table>
<br>
However, the following statement, where identifiers are present but the natural table name is used for one table and its fully-qualified columns, throws the same exception:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>
<font face="Courier" size="+1">
<pre>
SELECT
  RDB$RELATIONS.RDB$RELATION_NAME
FROM
  RDB$RELATIONS r
  JOIN RDB$RELATIONS ON
    (r.RDB$RELATION_ID = RDB$RELATIONS.RDB$RELATION_ID)
</pre></font>
</td></tr></table>
</td></tr></table>
<br>
The HEAD code has been corrected to permit use of the natural table name as the qualifier.
<p>
Another example that will be tolerated by the corrected qualifier handling is this one with UPDATE:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>
<font face="Courier" size="+1">
<pre>
UPDATE TableA
SET
  FieldA =
  (SELECT b.FieldB FROM TableA b WHERE b.ID = TableA.ID)
</pre></font>
</td></tr></table>
</td></tr></table>

<h4><i>Implement physical and multi-level incremental backup</i></h4>
Proposed Release: 2.0
<p>
The new Nbackup utility (Nickolay Samofatov) needs to be confirmed as complete, documented and tested.

<h4><i>New database shutdown modes</i></h4>
Proposed Release: 2.0
<p>
This enhancement adds a single-user database maintenance mode and a complete database shutdown multi-user maintenance mode to the existing modes for gfix -shut.
<ul>
<li>&quot;Single-user&quot; shutdown mode reinstates shutdown as it was in Firebird 1.0.x, viz., only SYSDBA is permitted access to the database and garbage-collection is inhibited.
<li>&quot;Complete&quot; shutdown mode denies all connections except a gfix -online command to bring the database back on-line after a shutdown.
</ul>
Suggested names for the new switches are:
<br>&nbsp;&nbsp;&nbsp;
gfix -shut -complete ...
<br>&nbsp;&nbsp;&nbsp;
gfix -shut -single ...
<p>
The -single/-complete switches can be used in combination with the existing shutdown flags and parameters.

<h4><i>Low disk space conditions</i></h4>
Proposed Release: 2.0
<p>
The Page Manager is a point of failure under certain conditions where disk space is low and careful write is not working properly.  If there is not enough space to store a new page, then the database may become corrupted. Implementation of the changes needed to handle the exceptional conditions is not completed yet.
<p>
The Temporary File Manager behaves correctly.

<h4><i>Windows &quot;local connect&quot;</i></h4>
Proposed Release: 2.0
<p>
The IPServer protocol on Windows is being transformed to use the XNET protocol layer instead of the current model whereby the server and client share IPC space.

<h4><i>Context pools</i></h4>
Alex Peshkov will complete the work to implement context pools and ensure that the class library (string, vectors, stack) requires no more rework.

<h4><i>Security enhancements </i></h4>
Proposed Release: 2.0 and/or 3.0<p>
&quot;What?&quot; and &quot;When?&quot; are still under consideration. Refer to current discussions in the firebird-security list.
<ul>
<li>Password encryption. Technically, a simple replacement of ENC_enc() with an appropriate PluginManager instance might automatically enhance encryption of passwords over the network. However, it breaks protocol and it is uncertain whether HEAD is ready for it.  Accompanying issues:  Configuration parameter required? With what default?</li>
<li>A complete user authentication process may be implemented as one more PluginManager instance in the security database.  Implementation options could include LDAP, PAM, storing users in any database.</li>
<li>Global user access parameters for creating, backing up and restoring databases?</li>
<li>Login retry configuration?</li>
<li>Disable default PUBLIC access to system tables? 
<li>User privileges to support CREATE rights?</i>
</ul>

<h4><i>Bug-fixes</i></h4>

To be finished by D. Yemanov. 

<a name="yaffil"></a>
<h3>YAFFIL</h3>
<h4><i>Optimizer improvements</i></h4>
Proposed Release: 2.0
<ol>
<li>Optimized execution of multiple ORed equality searches, including IN (&lt;list&gt;) queries
<li>Allow WHERE A = &lt;value&gt; ORDER BY B to use the same compound index (A, B) for both the search and the sort.
<li>A number of other optimizer bugfixes
</ol>

<h4><i>Expression Indices</i></h4>
Proposed Release: 2.0
<p>
Enable the creation of an index whose nodes are derived from an expression.

<h4><i>Scale reduction for numerics and decimals</i></h4>
Proposed Release: 2.0
<p>
When the precision of a result is greater than the MAX_PRECISION, the corresponding scale is reduced to prevent the integral part of a result from being truncated.
<br>
Currently:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>
<font face="Courier" size="+1">
<pre>
D(18, 1) * D(18, 17) = D(18, 18) // Integral part of zero or one digit!?</pre>
</font>
</td></tr></table>
</td></tr></table>
Becomes:
<table bgcolor=#dcdcdc cellpadding=1>
  <tr>
    <td>
      <table bgcolor=#f5fffa cellpadding=5>
        <tr>
          <td>
<font face="Courier" size="+1">
<pre>
D(18, 1) * D(18, 17) = D(18, FIXED_PRECISION)</pre>
</font>
</td></tr></table>
</td></tr></table>
<br>
FIXED_PRECISION is either hardcoded or configurable. MSSQL and Sybase set it to 6 (but their MAX_PRECISION is 38).
<p>
Yaffil implements this feature in two ways: via a DPB flag and by implementing a non-standard __MONEY data type. Our own implementation is still the subject of a separate discussion.

<h4><i>Incorporate 40 internal function implementations</i></h4>
Proposed Release: 3.0
<p>
Functions include everything from ib_udf, fbudf, including SQL-compliant TRIM/PAD/CHAR_LENGTH etc., other conversion routines and even regular expression matching.
<p>
The Firebird 2 implementation is currently under discussion among the architects, with a view to implementing a blr verb subtype.

<h4><i>Configurable statement timeout</i></h4>
Proposed Release: 2.0
<p>
An SQL feature for configuring statement timeouts will be considered alongside existing design issues regarding CANCEL STATEMENT.
<a name="vulcan"></a>
<h3>VULCAN</h3>
(Notes to be expanded by Team Harrison & Starkey)
<p>
At this point, Vulcan is something of a "black box".  However, the features expected are:
<h4><i>64-bit Platform Support</i></h4>
64 bit Linux, and other operating system releases.
<h4><i>SMP and Hyper Threading support on Windows</i></h4>
Superserver is to be fully multi-threaded and SMP-friendly.
<h4><i>Windows local connect</i></h4>
Another IPC to XNET to transformation.
<h4><i>Unified engine (superserver/classic/embedded)</i></h4>
including full support for concurrently running engines
<h4><i>Extensible architecture (providers)</i></h4>
Details required.

<h4><i>Clean shutdowns for Classic processes</i></h4>
On Win32, implement mutexes so that we can easily close Classic server and processes from application programs. We can then integrate control of the Classic server into the cpl applet.
<p>
Clean shutdown for Classic processes on POSIX -- currently, only kill is available.
<h4><i>Per-database configuration files</i></h4>
<h4><i>Gateways to InterBase and legacy Firebird Servers</i></h4>
<h4><i>Internal SQL</i></h4>
More explanation required
<h4><i>Compiled statement cache</i></h4>
Groundwork is done.
<h4><i>Layerable system tables</i></h4>
More explanation required

<h3>Other</h3>

<h4><i>Tools interface</i></h4>
Implement an MMC console service to allow the project and third parties to create Win32 management tools for Firebird and have a place to drop them in.
<br>
Ditto for Linux?

<h4><i>Support for complex installs</i></h4>
Extend Win32 installer to facilitate straightforward installs for complex configurations.
<br>Olivier Mascia and Paul Reeves have been asked to provide a draft design specification SAP for the work need to complete the "instancing" stuff, from the both the installation and administration perspectives.<p>
Ditto for Linux?<br>
Also for Linux, proposed solutions to the problems currently experienced from ---
<ul>
<li>users being unable to install ".i686" rpm packages on 486 and 586 machines.</li>
<li>the distro-specific character of the setup scripts</li>
<li>lack of reliable How-to documentation for installing .tar kits on platforms that don't support rpm</li>
<li>OS groups and users permissions problems not addressed by the installers
</ul>

<h3>EXTERNAL DEVELOPMENT</h3>
Proposed Release: 2.0
<p>
Simple cross-platform GUI interface tool
<p>
Regards<br>
Firebird Project
</td></tr></table>
<p>
<?php
$action="topics";
$fid=1;
require('tf.actions.php');

?>
<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>

