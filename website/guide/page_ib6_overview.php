<?php
if (eregi("page_ib6_overview.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>InterBase 6.0 Overview</H4>
<P>InterBase is the open source relational database that combines ease of use,
low maintenance costs, and enterprise power. Since 1985 InterBase has provided
the strength of a powerful, high performance, proven architecture with the
sophisticated technology applications need to be successful. Today, InterBase
leads the industry again, offering free development and distribution rights and
moving database use to the centre of all application development.</P>
<UL>
<LI>Versioning Architecture for ultimate concurrency - readers never block
writers </LI>
<LI>Active database, including the most full featured trigger and stored
procedure implementation. </LI>
<LI>Event Alerters - React to database changes without polling. Exceptional 
</LI>
<LI>ANSI SQL-92 compliance and full UNICODE support. </LI>
<LI>Rich data types - BLObs, multi-dimensional arrays. </LI>
<LI>InterClient - all-Java JDBC driver for low maintenance </LI>
<LI>Designed for business critical distributed database environments, InterBase
provides power and flexibility for Internet, mobile, and embedded database
applications. </LI>
<LI>Scalable from Windows 95/98, Windows NT, Windows 2000, Linux, HP/UX,
Solaris, and other UNIX operating systems </LI>
</UL>
<P>In August 2000, Inprise released that the new version of the InterBase
database - InterBase 6.0 - as open source. This is your chance to read about
what InterBase is, and what it does. </P>
<P> Business-critical tasks like stock trading, pharmaceuticals, network
management, and aerospace demand performance. InterBase delivers their
performance and remains practical and easy to deploy for small applications.
Developers who want a sophisticated database with a small footprint, low
maintenance cost, and high reliability choose InterBase. They depend on
InterBase to manage their customers' data without the services of a highly
trained and compensated DBA. </P>
<P>InterBase offers the best features of the database world - triggers, stored
procedures, blobs, event alerters, user defined functions, multi-dimensional
arrays, two-phase commit, referential integrity, constraints, and a flexible
set of transaction options. These features reduce development time and improve
reliability. </P>
<H5>Sophisticated Architecture Delivers Performance</H5>
<P>The InterBase server implements a Multi-Generational Architecture [MGA].
This MGA provides unique 'versioning' capabilities that result in high data
availability for transaction processing users and decision-support users
simultaneously. </P>
<P>Traditional database servers support the On-Line Transaction Processing
(OLTP) model of database interaction, with many short, simple transactions. The
InterBase MGA engine performs well on short OLTP-style transactions, but it
excels in real world applications, outperforming other databases because
concurrent long-duration, decision-support transactions do not degrade its
performance.</P>
<P><I>&quot;InterBase&#133; out performed all other SQL databases that we
tested; nothing else came close. Its speed and small footprint, combined with
its ability to handle data-intensive client/server applications, made it an
easy choice for us.&quot; <BR>
- Russ LeMaster, Dover Elevator Systems </I></P>
<P>The versioning engine eliminates the need for transactions to lock the
records they read, making them contention-free - readers never block writers.
Unlike other databases, InterBase provides a time-consistent, repeatable result
for every query, without special programming. Because long and short duration
transactions can coexist, the InterBase versioning engine maximises throughput
for all transactions. </P>
<H6>Multi-threaded Architecture</H6>
<P>The InterBase server adds a multi-threaded architecture to the MGA,
improving performance and optimising the use of system resources, especially
for large numbers of users. A shared server supports more clients on the same
hardware and still improves the system responsiveness. </P>
<P>The multi-threaded architecture provides a shared data cache, reducing the
amount of disk I/O for each application request. The server's shared metadata
cache reduces the compilation costs for requests and make procedures and
triggers more efficient. User and database statistics kept by the server are
useful for diagnosing application hot spots. </P>
<H5>Java Enablement</H5>
<P>Java and InterBase are a natural pair. Features that make Java intriguing -
simplicity, robustness, portability, and flexibility - are also characteristic
of InterBase. Java applications access InterBase through InterClient, a high
performance JDBC driver. </P>
<P>InterClient is an all-Java driver, which can be an applet - nothing is
installed on the client. Deployment is simple, since configuring machines with
client libraries is unnecessary. InterClient makes upgrading easier as well,
because database upgrades on the server never make your client obsolete.</P>
<H5>Easy To Manage And Maintain</H5>
<P><I>&quot;The database we picked had to perform searches on millions of
records. It had to scale to meet our projected requirements well into the
future. Since our staffing levels are such that no one person can act as a
full-time database administrator, we also needed an application that was
largely self-maintaining. Finally, as a city agency, we were under strict
budget and management constraints. Taking all of this into consideration, and
after looking at every major database on the market, there was only one clear
choice - InterBase&quot; <BR>
- Al Porco Division of Disease Intervention, City of New York </I></P>
<P>M ost SQL database server products require expensive MIS staffs to install,
tune, and manage them. The InterBase design doesn't require hours of
maintenance or a PhD in InterBase tuning. When your applications must run
without constant supervision or when your desktop database runs out of steam,
InterBase is the clear choice. </P>
<H5>Installs In Minutes</H5>
<P>InterBase is simple to install. It has a small footprint, so you do not need
a lot of free disk space. InterBase is self-tuning, so you won't be required to
set hundreds of incomprehensible parameters. InterBase optimises itself for
you. </P>
<P><I>&quot;As powerful as [InterBase] is, it's not hard to learn, and it's
easy to set up and install.&quot; <BR>
- Peter Miller, Hospitality Data Systems </I></P>
<H5>Lower Life Cycle Costs</H5>
<P>When estimating the all costs over a product life cycle, remember the
following: </P>
<UL>
<LI>InterBase requires less memory than most database systems, so you will buy
less RAM to for high performance.</LI>
<LI>Because of InterBase's tight code with its small footprint, you need less
disk space.</LI>
<LI>You will be productive quickly because InterBase adheres to industry
standards. </LI>
<LI>If you upgrade to a new operating system such as UNIX, you can redeploy
without rewriting any of your database objects by backing up and restoring your
database.</LI>
</UL>
<P>The life cycle of a product made with InterBase - from conception to
end-of-life - has minimal cost, no matter how your application changes. </P>
<H5>High Reliability For All Of Your Applications</H5>
<P>I nterBase pioneered the concept of an active database, building advanced
automation technology into the server's kernel. InterBase's active database
features include our patented event alerters, stored procedures, triggers, User
Defined Functions, and Binary Large Object (BLOb) filters. Together they move
data processing steps to the server - where they are fastest most reliable.
Complementing this strong support for built-in business rules, InterBase
ensures data reliability with declarative referential integrity, including
cascading operations. </P>
<H5>Event Alerters Automate Your Applications</H5>
<P>Event alerters notify &quot;interested parties&quot; when specific changes
occur in the database. An application registers interest in an event then waits
without polling the database, until it is notified that the event has occurred.
By eliminating polling, event alerters save system resources and make
applications scale better. </P>
<H5>Triggers - Reusable Business Objects</H5>
<P>Triggers store and enforce a company's business rules on the server. The
server itself guarantees that every application using corporate data adheres to
these rules. InterBase triggers automate responses to events on the server, and
validate input data whenever a row is inserted, updated, or deleted from a
table.</P>
<P><I>&quot;InterBase...has the best implementation of modular,
optionally-ordered, pre- and post-operation triggers.&quot; <BR>
DBMS, July 1996</I></P>
<H5>Stored Procedures - Reusable Business Processes</H5>
<P>Stored procedures off-load common business tasks from the client to the
server, causing major performance gains. Any InterBase application can use
stored procedures. They encourage modular design, and make reuse and
maintenance easier. </P>
<H5>User Defined Functions (UDFs) - Reusable Custom Features</H5>
<P>UDFs give developers a means of extending InterBase's analytical
capabilities. They are reusable code, accessed from the server, and ensure data
reliability and integrity. UDFs can process data themselves or call external
services. InterBase provides a default library of User Defined Functions that
offers commonly used functions. This library includes: </P>
<UL>
<LI>Maths and trigonometry Functions, including cos, sin, base, log, and more. 
</LI>
<LI>String functions: difference, insert, substring, and more.</LI>
</UL>
<H5>Declaritive Referential Integrity Constraints</H5>
<P>Declarative referential integrity constraints maintain relationships between
records in your database efficiently and reliably. InterBase supports four
categories of constraints: </P>
<UL>
<LI><B>Unique and primary key:</B> No two rows in a table have the same value
for the set of key columns. </LI>
<LI><B>Referential Integrity:</B> Parent-child relationships between tables are
synchronised. The declaration can include cascading updates and deletes.</LI>
<LI><B>Check: </B>The associated condition will be valid for every row in the
table.</LI>
<LI><B>Domain:</B> Create a new subtype and specify a range of acceptable
values, enumerate a list of values, provide default values, and set a data
type. Any column declaration may reference a defined domain as an alias for a
more sophisticated data type.</LI>
</UL>
<H5>Powerful Data Types Increase Flexibility</H5>
<P>Unstructured data is an essential element for an increasing number of
applications. InterBase meets this need with multidimensional arrays and BLObs.
They make InterBase the best choice for multimedia and scientific applications.
</P>
<H5>Binary Large Objects (BLObs)</H5>
<P>In 1986 InterBase set the industry standard by storing sound, image,
graphic, and binary information directly in the database using its BLOb data
types. Internet and telephony applications use of BLObs and BLOb filters to
store and manage multimedia data. BLOb filters are custom routines that
transform the contents of a blob from one state to another. Filters are ideal
for compression and translation and add nothing to the processing load on the
client. </P>
<H5>Multidimensional Arrays</H5>
<P>InterBase provides direct support for the multidimensional arrays used in
scientific and financial applications. A single field in the database can hold
an array of sixteen dimensions. For data that is inherently organised as
arrays, InterBase simplifies database design and increases performance. </P>
<H5>Distributed Database - Application Flexibility</H5>
<P>When you need to move your desktop database to something more sophisticated
or enlarge a small workgroup application so that several departments can use
it, InterBase is ideal. It was designed for distributed database environments. 
</P>
<H6>Multi-Database Access</H6>
<P>InterBase is a truly distributed SQL database server that lets each database
system query and return information to any other InterBase server.</P>
<H6>Automatic Two-Phase Commit</H6>
<P>Multi-database transactions require more than just the ability to connect to
two databases. To be transactions, they must be consistent and atomic.
InterBase includes a two-phase commit that ensures that distributed updates are
consistent, automatically. </P>
<H6>Distributed Two-Phase Commit Recovery</H6>
<P>InterBase goes beyond a simple two-phase commit. It was the first database
to provide distributed recovery from a failure during a two-phase commit. This
ensures full recovery with no single point of failure, since the co-ordination
of the commit is distributed among all the servers. A transaction that cannot
commit across all servers, is automatically rolled back on all servers.</P>
<H5>Database Shadows</H5>
<P>InterBase allows you to keep an exact duplicate of the original database,
called a database shadow. This copy is maintained in real time by the InterBase
server, and provides an immediately available backup in case of hardware
failure. The shadow runs automatically, and adds a minimal performance penalty.
Your control over the shadow includes its use of hard disk space and
distribution across available devices. </P>
<H5>ANSI SQL-92</H5>
<P> Training developers is expensive and time consuming. Because InterBase
delivers exceptional SQL-92 compatibility, it reduces the learning curve
dramatically for new programmers moving to InterBase. Because InterBase uses
SQL in all its features - stored procedures, triggers, constraints, and
declarative Referential Integrity - you benefit from your developers' prior
exposure to an industry standard language. InterBase is SQL 92 entry-level
compliant, with many intermediate level features and some SQL 3 features such
as ROLES for group-level security. </P>
<H5>International Character Set Support - UNICODE</H5>
<P>InterBase supports UNICODE, the universal character code, and many
international character sets for data storage and manipulation. Columns in the
same table can be created with different character sets, allowing easy
worldwide deployment. Languages supported by InterBase include Big 5 (Chinese),
Korean, and all major European languages. </P>
<H5>InterBase Can Grow With You</H5>
<P>With InterBase, you not only have optimised performance across the most
popular Windows, Linux and UNIX platforms, but also across your company needs.
InterBase crosses the spectrum from single-user databases to workgroups, to
enterprise systems. As your business grows, InterBase grows with you. </P>
<H5>InterBase Specifications</H5>
<P><B>INTEGRITY</B></P>
<UL>
<LI>Declarative Primary Key.</LI>
<LI>Declarative Foreign Key.</LI>
<LI>Cascade Declarative Referential Integrity.</LI>
<LI>Domain and column-level Check constraints.</LI>
<LI>Trigger procedures with the following features: <BR>
- Unlimited triggers per record change. <BR>
- Invoked before or after record insertion, deletion, or update. <BR>
- Multiple triggers per action, optionally ordered. <BR>
- Forward-chaining (cascading triggers). </LI>
</UL>
<P><B>CONCURRENCY CONTROL</B></P>
<UL>
<LI>Optimistic locking.</LI>
<LI>Data isolation levels: read consistency, read committed, and cursor
stability.</LI>
<LI>Shared, and protected lock types for explicit table-level locking.</LI>
</UL>
<P><B>AVAILABILITY</B></P>
<UL>
<LI>Online backups.</LI>
<LI>Immediate recovery after failure.</LI>
</UL>
<P><B>DISTRIBUTED DATABASE</B></P>
<UL>
<LI>Simultaneously connected databases - limited only by hardware.</LI>
<LI>Automatic distributed transaction processing via two-phase commit.</LI>
</UL>
<P><B>DATATYPES</B></P>
<UL>
<LI>Character (fixed/variable length): up to 64Kb per field.</LI>
<LI> Integer (8, 16, 32 &amp; 64 bit).</LI>
<LI> Floating point: single and double precision.</LI>
<LI> Date &amp; time: Jan. 1, 100 to Dec. 11, 5491.</LI>
<LI> Date, Time, and Timestamp.</LI>
<LI> Fully Year 2000 compliant.</LI>
<LI> Multidimensional arrays; up to 16 dimensions per column.</LI>
<LI> BLOb: unlimited size.</LI>
<LI> Import and export of ASCII fixed-length data.</LI>
<LI> BLOb filters for compressing or translating BLOb field data. </LI>
</UL>
<P><B>STANDARDS</B></P>
<UL>
<LI>ANSI SQL-92 entry-level conformant.</LI>
<LI> ODBC rev. 2.0 (16-bit).</LI>
<LI> ODBC rev. 3.0 (32-bit).</LI>
<LI> UNICODE compliant.</LI>
</UL>
<P><B>DATABASE CAPACITY</B></P>
<UL>
<LI>Maximum number of rows per table: approximately 2 billion.</LI>
<LI> Maximum size of a table: limited by system resources.</LI>
<LI> Maximum number of databases per system: limited by system resources.</LI>
<LI> Maximum number of active users possible per system: limited by system
resources.</LI>
<LI> Maximum number of tables per database: 64Kb.</LI>
<LI> Maximum row size (excluding BLOb): 64Kb.</LI>
</UL>
<P><B>SYSTEM REQUIREMENTS</B></P>
<UL>
<LI>Minimum RAM and disk space varies with operating system platform.</LI>
<LI> Networking hardware and software dependent on operating system platform. 
</LI>
</UL>
<H5>New In InterBase 6.0</H5>
<P><B>SQL DELIMITED IDENTIFIERS</B></P>
<P>Delimited identifiers are database object names that are delimited by double
quotes, eliminating restrictions on database object names.</P>
<P><B>INTERBASE EXPRESS (IBX)</B></P>
<P>Borland Delphi and C++Builder developers can now use the InterBase Express
(IBX) components to build application with InterBase through the InterBase API,
improving performance and capabilities.</P>
<P><B>LARGE EXACT NUMERICS</B></P>
<P>Provides conformance with the SQL92 Standard for Numeric and Decimal
datatypes with 10 to 18 digits of precision as a native 64bit integer.</P>
<P><B> SQL DATE, TIME and TIMESTAMP </B></P>
<P>The standard DATE, TIME and TIMESTAMP datatypes replace the old DATE data
type. The new types include new operators, such as CURRENT_TIMESTAMP
CURRENT_DATE, CURRENT_TIME, and EXTRACT() allowing the return of specific date
and time values.</P>
<P><B>READ ONLY DATABASE</B></P>
<P>InterBase databases can now be created as read only, either for security
purposes, or for storage and access via read only media such as a CD-ROM.</P>
<P><B>SERVICES API</B></P>
<P>A new API that allows developers to write applications that access and
monitor the database server and its management functions.</P>
<H5>Open Source</H5>
<P><B>INTERBASE FREE OF CHARGE</B></P>
<P>Starting with the release of Version 6.0, Borland will no longer be charging
a license, usage, or copying fee for InterBase Open Edition (Borland offers commercial version of InterBase too).</P>
<P><B>INTERBASE FREE TO USE</B></P>
<P>The Free Software Foundation says &quot;think of 'free speech,' not 'free
beer.' In addition to the binary versions, the full source of InterBase will be
on-line and available for download. You may read it to understand the product,
use it for debugging, or modify it to suit your needs.</P>
<P><B>INTERBASE PUBLIC LICENSE</B></P>
<P>InterBase has adopted a clone of the Mozilla Public License V1.1. The
primary requirement of the license is that if you change the code and offer it
to others, you must also offer the source of the changes, for free or for a
minimal charge. The IPL License is available from:
<A
 HREF="http://www.borland.com/devsupport/interbase/opensource/IPL.html">http://www.borland.com/devsupport/interbase/opensource/IPL.html</A>
</P>
<P><B>THE INTERBASE COMMUNITY</B></P>
<P>The source of InterBase, its interfaces, and the utilities are available
through a CVS tree. You are invited to assist in the on-going development of
InterBase by contributing fixes and extensions to any of those products. Go to:
<A
 HREF="http://sourceforge.net/projects/firebird/">http://sourceforge.net/projects/firebird/</A>
</P>
<P><B>IBPHOENIX</B></P>
<P>IBPhoenix offers a variety of support, consulting, and training packages. Go
to <A HREF="hrrp://www.ibphoenix.com/ibp_services.html">IBPhoenix site</A> for more details.</P>
<p>
Back to <A href=index.php?op=guide&amp;id=rdbms>Guide to Firebird RDBMS</A>
