<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Future Versions of Firebird...</H4>
<p>
There has been some discussion re. The future direction of Firebird within the admin group, based on the comments and feedback there, we believe its now time to throw open the discussion to a wider audience for their feedback and comments.
<p>
The proposed development Roadmap is as follows, note this is not cast in stone, and can be modified and amended based on your opinions.
<p>
Currently we have three branches of Firebird code, the current 1.5 code base, Firebird HEAD, the basis for the next major release and Vulcan.
<p>
There is a placeholder to release a V1.5.2 if any regressions are found via the release of V1.5.1.
<p>
We would like to freeze new development on HEAD, and use the code to create a Firebird 1.6. Then merge Firebird 1.6 with Vulcan to create 2.0
<p>
For those of you who don't know all the details, HEAD is the current development branch of Firebird within CVS on sourceforge. Vulcan is an experimental branch that Jim Starkey took from HEAD about 6 months ago to implement fine grained multi-threading (SMP support) and support for 64bit operating systems based on a development contract that IBPhoenix have with a large software supplier.
<p>
Both Firebird 1.6 and Vulcan are likely to be available for  testing  at around the same time, i.e. There are likely to be builds that users can install, use and play with simultaneously. Essentially during this time i.e. Pre merge users would be choosing between SMP capability and Firebird 2.0 features.
<p>
The rationale for this, is that there is a realisation, that if we tried to do all of the above in one go (2.0 = HEAD+Vulcan), its going to be a long time before the project can release the next version of Firebird, and this is considered to be not a good thing.
<p>
The outline plan is to
<p>
HEAD - feature freeze. Should happen as soon as possible. HEAD tagged as 1.6
<p>
All incomplete features to be finished. 2.0 Feature must haves to be implemented as soon as possible to include YAFFIL features and Paul Ruizendaal's work.
<p>
<b>HEAD</b><br>
Initial alpha release to happen approximately in September. Full Release end of the year?<br>
<b>VULCAN</b><br>
Initial alpha release to happen in the near future. Futher beta releases as and when available. Final release end of this year?<br>
<b>FIREBIRD 2.0</b><br>
Merge 1.6, with Vulcan, alpha release April/May 2005, with full release towards the end of 2005.
<p>
All dates are estimates, there is no guarentee that any date mentioned above is achievable. But we can try.
<p>
1.6 will require an upwards compatible ODS version....
<p>
So whats in HEAD, YAFFIL and  Vulcan? And what is the work that Paul Ruizendaal has done?
<p>
<H5>HEAD</H5>
<p>
Derived Tables<br>
A derived table is one that is created on-the-fly using the SELECT statement, and referenced just like a regular table or view. Derived tables exist in memory and can only be referenced by the outer SELECT in which they are created. These are not temporary tables, an example would be:<br>
e.g. listing managers whose departments have more than 25 employees...
<pre class=code>
Select e.name, d.department
from employees e
join (select d1.department, d1.mgr_id
from departments d1
join employees e1
on (d1.dept_id = e1.dept_id)
group by d1.department, e1.emp_id
having count (*) > 25) d
on (d.mgr_id = e.emp_id)
</pre>
Proposed Release: 1.6
<p>
New index-structure<br>
Opinion:<br>
The index work declares a new B-tree page layout, this typically would mean a major ODS change. But we consider this work critical for the next Firebird release. So we will need to find a solution for this.<br>
Proposed Release: 1.6
<p>
Auto union-cast<br>
Proposed Release: 1.6
<p>
Segment based index selectivity<br>
Arno Brinkman and Dmitry Yemanov have done all the necessary ODS changes.  Optimizer to be amended to accommodate the new
statistics. Not complete.<br>
Proposed Release: 1.6
<p>
EXECUTE BLOCK syntax<br>
Proposed Release: 1.6
<p>
Re-implementation of cursor syntax in PSQL<br>
Proposed Release: 1.6
<p>
CANCEL STATEMENT syntax<br>
NOT COMPLETE<br>
Proposed Release: 1.6
<p>
Implement physical and multi-level incremental backup<br>
Nbackup needs to be confirmed as complete, documented and tested.<br>
Proposed Release: 1.6
<p>
Single-user database maintenance mode and full database shutdown<br>
Two new database shutdown modes:<br>
multi-user maintenance mode   only SYSDBA may access database, GC activities are inhibited (shutdown as it was in Firebird 1.0.x) single-user maintenance mode   only single SYSDBA connection is allowed to database.<br>
complete database shutdown   all connections are denied except to bring database online.<br> 
Suggested names for switches:<br>
<pre>
gfix  shut -complete ...
gfix  shut -single ...
</pre>
-single/-complete may be used in combinations with all currently allowed shutdown flags.<br>
Proposed Release: 1.6
<p>
Low disk space conditions<br>
The Temporary File Manager behaves correctly, but the Page Manager is a point of failure. If there is not enough space to store a new page, then the database may become corrupted. If careful write is working properly   this should not be a problem <br>
NOT COMPLETE<br>
Proposed Release: 1.6
<p>
Windows local connect<br>
IPC to XNET<br>
Proposed Release: 1.6
<p>
<H5>YAFFIL</H5>

Yaffill optimizer improvements
<ol>
<li>Optimized execution of IN (<list>) queries (and multiple ORed
equalities,
of course)
<li>Allow WHERE A = <value> ORDER BY B to use compound index (A, B)
<li>A number of other optimizer bugfixes
</ol>
Proposed Release: 1.6
<p>
Expression Indices<br>
Proposed Release: 1.6
<p>
Scale reduction for numerics and decimals<br>
When a result precision is greater than the MAX_PRECISION, the corresponding scale is reduced to prevent the integral part of a result from being truncated.
<pre>
Now: D(18, 1) * D(18, 17) = D(18, 17) // Integral part of one digit!?
Should be: D(18, 1) * D(18, 17) = D(18, FIXED_PRECISION) // FIXED_PRECISION
</pre>
is either hardcoded or configurable. MSSQL and Sybase have it equal to 6 (but their MAX_PRECISION is 38). Yaffil implements this feature in two ways: DPB flag and non-standard __MONEY datatype. Our own implementation is still the subject of the
separate discussion.<br>
Proposed Release: 1.6
<p>
Incorporate list of 40 internal function implementations<br>
Functions include everything from ib_udf, fbudf, including SQL compliant TRIM/PAD/CHAR_LENGTH etc., other conversion routines and even regular expression matching.<br>
Opinion:<br>
Will they be available through blr? If so, will they use up 40 more blr values?<br>
Proposed Release: 2.0
<p>
Configurable statement timeouts<br>
Proposed Release: 1.6
<p>
<H5>VULCAN</H5>

64-bit Platform Support<br>
64 bit Linux, and other operating system releases.
<p>
SMP and Hyper Threading support on Windows<br>
Details:<br>
Make the SS engine fully multi-threaded and SMP-friendly.
<p>
Windows local connect<br>
IPC to XNET
<p>
Implement full support for concurrently running engines, Extend Win installer.<br>
Implement an MMC console service to allow the project and third parties to create management tools for Firebird and
have a place to drop them into
<p>
Ditto for Linux?<br>
Is it possible to do the equivalent on Linux? Yes
<p>
Clean shutdown for Classic servers and processes on Win32<br>
Implement mutexes so that we programmatically and easily close Classic servers. We can then integrate control of the Classic server into the cpl applet.
<p>
Clean shutdown for Classic processes on POSIX<br>
Currently, only kill is available.
<p>
Per-database configuration files
<p>
Gateways to InterBase and legacy Firebird Servers
<p>
Internal SQL
<p>
Compiled statement cache (groundwork is in place)
<p>
Layerable system tables
<p>
Unified engine (superserver/classic/embedded)
<p>
Extensible architecture (providers)
<p>
<H5>OTHER</H5>

Simple cross-platform GUI interface tool<br>
Proposed Release: 1.6
<p>
Regards<br>
Firebird Project
<p>
<?php
$action="topics";
$fid=1;
require('tf.actions.php');

?>
<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>