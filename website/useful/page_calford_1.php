<?php
if (eregi("page_calford_1.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Some Solutions to Old Problems</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<td align=left>
<b>Dalton Calford</b> shares his real-life solutions to
some implementation problems<hr size=1></td>
</tr>

<tr>
<td colspan=2>

<p><b><font face="Verdana"><font size=-1>Introduction</font></font></b>
<p><font face="Verdana"><font size=-1>Please don't look upon this as the
only approach to all problems. I identify some common situations that you
might face and show how we approached the solutions.</font></font>
<p><font face="Verdana"><font size=-1>If, after reading this, a few of
you come up with better ways to accomplish the same thing, SHARE THE IDEAS.
We all benefit and your overall karma will be improved.....</font></font>
<p><font face="Verdana"><font size=-1>1. <a href="#approaching">Approaching
24 X 7 Service</a></font></font>
<p><font face="Verdana"><font size=-1>2. <a href="#hardware">Hardware Configuration</a></font></font>
<p><font face="Verdana"><font size=-1>3. <a href="#server">Server Configuration</a></font></font>
<p><font face="Verdana"><font size=-1>4. <a href="#methods">Methods for
Backing up your Data</a></font></font>
<p><font face="Verdana"><font size=-1>5. <a href="#rollforward">Roll-Forward
Logging in Detail</a></font></font>
<p><font face="Verdana"><font size=-1>6. <a href="#replication">Replication</a></font></font>
<p><font face="Verdana"><font size=-1>7. <a href="#reversing">Reversing
User Actions</a></font></font>
<p><font face="Verdana"><font size=-1>8. <a href="#advanced">Advanced Techniques</a></font></font>
<p><a NAME="approaching"></a><b><font face="Verdana">1. Approaching 24
X 7 Service</font></b>
<p><b><font face="Verdana"><font size=-1>1.1 Overview</font></font></b>
<p><font face="Verdana"><font size=-1>Many people have seen the term '24x7'
- a shorthand label for 'a requirement to keep database available at all
times' - and think that the solution will be found on either the database
software or the hardware platform. The truth is, no software or hardware
vendor could create a package that would begin to approach the particular
needs of any one installation. Vendors make tradeoffs in order to satisfy
the largest target market. This means that a developer has to really analyse
requirements and design the best solution for his own installation.</font></font>
<p><font face="Verdana"><font size=-1>The first question a developer needs
to ask is this: are the tools at hand versatile enough to create a solution
that can handle all the identified requirements?</font></font>
<p><font face="Verdana"><font size=-1>Because of a design approach that
was radical at the time, InterBase is extremely well suited to a 24x7 configuration,
as long as the developer understands the server and the tools available.</font></font>
<p><font face="Verdana"><font size=-1>With a proper database design, anyone
can create a 24x7 system, regardless of the hardware, operating system
or even the server software.</font></font>
<p><font face="Verdana"><font size=-1>As for the hardware design issue,
failures will occur even with the most expensive systems money can buy.</font></font>
<p><b><font face="Verdana"><font size=-1>1.2 Our Assumptions</font></font></b>
<p><font face="Verdana"><font size=-1>Our decisions about the basic design
approach and coding were based on these assumptions:</font></font>
<ol>
<li>
<font face="Verdana"><font size=-1><i>Hardware is cheap</i> and is getting
cheaper all the time.</font></font></li>

<li>
<font face="Verdana"><font size=-1><i>Time is precious and expensive</i>.
You want to be able to fix a problem in the least possible time.</font></font></li>

<li>
<font face="Verdana"><font size=-1><i>Pay now or Pay later</i>. It is my
philosophy that time spent up front is time saved later. If you fail to
design it right the first time, you will end up doing three times the work
when faced with the problems of your poorly thought-out design.</font></font></li>

<li>
<font face="Verdana"><font size=-1><i>Everything Fails</i>. No matter how
well you plan, you will have problems. If this isn't self-explanatory,
do a MAN or INFO lookup on 'Murphy' and 'entropy'.</font></font></li>
</ol>
<font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<p><a NAME="hardware"></a><b><font face="Verdana">2. Hardware Configuration</font></b>
<p><font face="Verdana"><font size=-1>This is a very high level view of
the hardware configuration to give you ideas on how to set a system up
with the sort of reliability we are addressing here.</font></font>
<p><b><font face="Verdana"><font size=-1>2.1 CPU(s)</font></font></b>
<p><font face="Verdana"><font size=-1>If you are on a Superserver configuration,
the current InterBase design will not help you to benefit from using multiple
CPUs. That is not due to the operating system, as has been supposed by
some people. It stems from design decisions made to optimize the multi-threading
version of InterBase on single CPU servers. The design does not scale well
to multiple CPUs. The new API was written mainly to support the threading
model.</font></font>
<p><font face="Verdana"><font size=-1>Do not waste your money on a SMP
system if you want to use the Superserver version. If you need a lot of
processing power, classic is the way to go. Personally, I have had no need
for the new services provided by the Superserver model and I definitely
prefer the classic version. I use multi-processor systems extensively and
will not upgrade to any Superserver version that does not fully support
multiple CPUs.</font></font>
<p><b><font face="Verdana"><font size=-1>2.2 MEMORY</font></font></b>
<p><font face="Verdana"><font size=-1>The Classic and Superserver configurations
each use memory differently:</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>SuperServer has a shared memory cache,
very good for conserving memory. It loads the metadata with the first connection
to the database.</font></font></li>

<li>
<font face="Verdana"><font size=-1>With Classic, every connection starts
a new instance of the program on the server. The program loads, then the
metadata loads. This makes Classic slower on the initial connection than
Superserver.</font></font></li>
</ul>
<font face="Verdana"><font size=-1>If you have enough memory and a good
configuration, you will not notice the speed difference. Here are the numbers
I use for best performance:</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>50 Mb are allocated for a RAM disk and
isc_config is configured to use it for the first temp area. The physical
temp drive is allocated once the RAM drive is full.</font></font></li>

<li>
<font face="Verdana"><font size=-1>150 Mb are allocated for OS and other
miscellaneous items (less for Linux,</font></font></li>

<li>
<font face="Verdana"><font size=-1>more for NT)</font></font></li>

<li>
<font face="Verdana"><font size=-1>15 Mb are allocated per process for
Superserver, 30 Mb per process for Classic.</font></font></li>
</ul>
<font face="Verdana"><font size=-1>That means I would use 500 Mb for a
system optimized for speed to service 20 connections (150 for OS, 50 for
RAMDISK, 300 for Super Server) or 800 Mb for Classic.</font></font>
<p><font face="Verdana"><font size=-1>You can use less than this. I have
seen connections use as little as 10 Mb and as much as 50 Mb each under
the classic configuration, but, with 30 Mb set aside for each connection,
the server can handle short term high loads without a noticable effect.
The whole reason for this design is to allow for extra capability when
another member of the system fails.</font></font>
<p><b><font face="Verdana"><font size=-1>2.3 DRIVES</font></font></b>
<p><b><font face="Verdana"><font size=-1>The entire concept here is that
you can lose one entire system or its support equipment without your clients
realizing what has happened.</font></font></b>
<p><font face="Verdana"><font size=-1>People often do not take into consideration
the physical properties of the drives they use. They buy an extremely fast
drive and put everything (OS, SWAP, TEMP and DATA) all on the one drive.
The drive-thrashing alone will slow down almost everything you do.</font></font>
<p><b><font face="Verdana"><font size=-1>It is better to buy multiple cheaper
drives and separate them for specific uses.</font></font></b>
<p><font face="Verdana"><font size=-1>The next thing to think about is
how those drives connect to your computer.</font></font>
<p><font face="Verdana"><font size=-1>Simple IDE drives can transfer a
lot of data and they can be extremely fast. They can also take up to 20%
of your CPU's processing power because the IDE interface is totally controlled
by the CPU.</font></font>
<p><font face="Verdana"><font size=-1>SCSI drives are extremely good but,
remember, the SCSI bus operates at the speed of its slowest member.
If you go out and spend 80% of your budget on high-end controllers and
extremely fast drives, then put in a tape drive on the same SCSI channel,
you will make the entire unit operate as if it was designed in the 1980's.</font></font>
<p><b><font face="Verdana"><font size=-1>The best configuration I found
is a mixed system.</font></font></b>
<p><font face="Verdana"><font size=-1>I put in <b>two IDE drives</b> on
the first IDE channel. I fit them into hot-swap bays (around 16 bucks at
your local corner computer store). I use these drives as my boot/OS drives.</font></font>
<p><font face="Verdana"><font size=-1>The concept is that if I misconfigure
the OS in any way, I can quickly shut down or swap the drives and restart
in as little time as possible. This saves you when a faulty service pack
or kernel update goes wrong.</font></font>
<p><font face="Verdana"><font size=-1>With NT it is difficult to copy configurations
to a second drive but there is software (I use a package called Ghost)
that will allow you to copy an NT boot drive onto a second drive. With
Linux you can simply copy the files you need.</font></font>
<p><font face="Verdana"><font size=-1>I put the CDROM onto the second IDE
channel and leave it at that.</font></font>
<p><font face="Verdana"><font size=-1>Next, I approach <b>the SCSI configuration</b>.</font></font>
<p><font face="Verdana"><font size=-1>You can get a motherboard with onboard
SCSI controllers, usually split into two channels. One channel will handle
the older 50-pin connectors (such as CDROM or TAPE units usually have)
while the other channel handles an ultra-wide fast connector.</font></font>
<p><font face="Verdana"><font size=-1>If your motherboard does not have
an onboard controller, pick up a controller, with or without onboard cache
ram. The maximum RAM I would have on a controller like this is 32 Mb. This
controller would host your SWAP and TEMP areas (preferably on separate
channels, desirable but not essential).</font></font>
<p><font face="Verdana"><font size=-1><b>Now to your data.</b> I prefer
a RAID configuration. I refuse to use software-based raid. Why? Often,
problem situations are due to bugs in the OS. It does not make sense to
make your data's safety net depend on the very item that may be crashing
around your ears.</font></font>
<p><font face="Verdana"><font size=-1>I like to use an intelligent SCSI
controller with multiple channels. I limit my configuration to <b>three
drives per channel</b>. I try to use a controller that has at least three
channels and a hardware cache that is expandable to at least 256 Mb.</font></font>
<p><font face="Verdana"><font size=-1>With this, you can create three RAIDs,
each consisting of three drives, and separate each drive onto its own channel.
You can even go so far as to have multiple controllers, each with the same
configuration.</font></font>
<p><font face="Verdana"><font size=-1>If you have your database on one
drive controller and its shadow on another, you effectively have a situation
where you could lose 60% of your drives, including one drive controller,
and still not have any downtime for your clients.</font></font>
<p><font face="Verdana"><font color="#FF0000"><font size=-1>[I will post
the CPU cases and hot swap bays we use in another posting.]</font></font></font>
<p><font face="Verdana"><font size=-1>A tape backup device, while valuable,
does not match having a second system that can be replicated to.</font></font>
<p><font face="Verdana"><font size=-1>If you are doing direct replication,
I suggest having <b>two network cards in each machine</b>. If replication
is between two machines, you can use a null Ethernet cable to connect the
to servers while you connect to your internal network via the other network
cable.</font></font>
<p><font face="Verdana"><font size=-1>If you are using multiple servers,
use a dedicated Etherswitch for the servers and a second concentrator for
the client connection. You need to be good at setting up your routing,
but this will increase your operational/replication speed. If one concentrator
or switch dies, the servers can still communicate with each other and with
the client.</font></font>
<p><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<p><a NAME="server"></a><b><font face="Verdana">3. Server Configuration</font></b>
<p><font face="Verdana"><font size=-1>In case you wonder what changes I
have made to the IB Server's cache buffers, etc., the truth is that, except
for bumping up to an 8096 default page size, I make absolutely no changes
to the basic configuration of IB.</font></font>
<p><font face="Verdana"><font size=-1>Here is what I do.</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>I put the operating system on one drive.</font></font></li>

<li>
<font face="Verdana"><font size=-1>I place the swap space on another physical
drive (not just a different partition on the same drive)</font></font></li>

<li>
<font face="Verdana"><font size=-1>I place the temp space on another drive</font></font></li>

<li>
<font face="Verdana"><font size=-1>I place the data onto a drive or series
of drives that have no other purpose.</font></font></li>

<li>
<font face="Verdana"><font size=-1>I create a RAM disk, setting up my isc_config
file to use the RAM disk first as my primary temp space.</font></font></li>

<li>
<font face="Verdana"><font size=-1>If I am using Linux, I create another
RAM disk, large enough to hold the complete InterBase program.</font></font>
<p><font face="Verdana"><font size=-1>I use a Bash script to copy the InterBase
software onto this RAM disk. I link that RAM disk back so that
<i>inetd</i>
will spawn the version from the RAM disk instead of the version from the
hard drive. This is still under test so I do not have hard numbers on the
actual performance gains.</font></font><P></li>
<li>
<font face="Verdana"><font size=-1>I fully populate the database but here
is what I do to improve speed:</font></font>
<br><font face="Verdana"><font size=-1>Create the database, either from
scratch or from backup</font></font>
<br><font face="Verdana"><font size=-1>Create a temporary table and fill
it with random data until all the files that comprise the gdb are filled.</font></font>
<br><font face="Verdana"><font size=-1>Then drop the temporary table and
sweep the database. This gets rid of file fragmentation and the server
no longer needs to ask the OS for disk space when it is inserting new records.</font></font>
<p><b><font face="Verdana"><font size=-1>This gives a very significant
speed improvement.</font></font></b></li></ul>
<font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>&nbsp;
<p><a NAME="methods"></a><b><font face="Verdana">4. Methods for Backing
Up Your Data</font></b>
<p><font face="Verdana"><font size=-1>Consider these backup methods:</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1><b>Standard Backup</b> - takes a snapshot
of the database from when the backup began.</font></font></li>

<li>
<font face="Verdana"><font size=-1><b>Shadow Style Backup</b> - takes a
snapshot of the database from when the backup finishes.</font></font></li>

<li>
<font face="Verdana"><font size=-1><b>Roll-Forward Logs - Differential
Backup</b> - allows you to take any backup, and apply all the changes needed
to make it current. You can extend this technique for remote replication
- for this I will show examples and problems to watch for.</font></font></li>
</ul>
<b><font face="Verdana"><font size=-1>4.1 GBAK</font></font></b>
<p><font face="Verdana"><font size=-1>I have a database that is extremely
large but I only want to backup certain tables because most of my database
is static. <i>(Problem: you can't do a 'partial GBAK'.)</i></font></font>
<p><font face="Verdana"><font size=-1>OR</font></font>
<p><font face="Verdana"><font size=-1>I have a database that only has small
amounts of changed data and I want to be able to perform incremental backups
with fixed time points. <i>(Problem: GBAK can't do incremental backups.)</i></font></font>
<p><font face="Verdana"><font size=-1>OR</font></font>
<p><font face="Verdana"><font size=-1>My backup takes so long that from
the time I start the backup to the time my restore is finished, a few (hours/weeks/months)
has passed. The backup is totally useless because of the differences between
it and the original database......</font></font>
<p><font face="Verdana"><font size=-1>OR</font></font>
<p><i><font face="Verdana"><font size=-1>[INSERT GBAK COMPLAINT OF CHOICE]</font></font></i>
<p><font face="Verdana"><font size=-1>Gbak is one of the biggest sources
of complaints that I have seen from users of large databases. I remember
that one of my first discussions with Markus Kemper (InterBase support)
was about a database that took days to backup and restore.</font></font>
<p><b><font face="Verdana"><font size=-1>4.2 HOW GBAK WORKS</font></font></b>
<p><font face="Verdana"><font size=-1>Lets look at GBAK, what is it, why
is it, why was it designed that way?</font></font>
<p><font face="Verdana"><font size=-1>Gbak is an end-user program. It is
no different from the program you are writing in [insert language of choice]
to connect to InterBase. It is very simple in concept.</font></font>
<p><font face="Verdana"><font size=-1>Gbak looks for the on-disk version
of the database. It reads the system tables (RDB$XXX tables) according
to that version. It then writes that information out to a file stream.
Next, it outputs the data that is in the database out to the same file
stream.</font></font>
<p><font face="Verdana"><font size=-1>You have all sorts of choices (including
a few that use the undocumented API of IB, such as not performing garbage
collection) but, overall, you can take Jason Wharton's IB Objects and write
your own gbak with any options you like. I've done so, for a previous client.
The biggest trick is to understand the order of extraction/insertion of
objects and data.</font></font>
<p><b><font face="Verdana"><font size=-1>4.3 ALTERNATIVES TO GBAK</font></font></b>
<p><font face="Verdana"><font size=-1>4.3.1 'Quick Backup'</font></font>
<p><font face="Verdana"><font size=-1>Gbak was written so that it can run
while other users are connected to the database. If you want a quick backup,
shut down the IB server, and perform an OS-level backup.</font></font>
<p><font face="Verdana"><font size=-1>4.3.2 Use a Shadow</font></font>
<p><font face="Verdana"><font size=-1>You can also create a shadow database,
shut down the IB server, rename the first file of the shadow, restart IB,
and connect to the server. The log will complain about the shadow not being
there but IB will just assume the shadow disk failed and proceed with the
login.</font></font>
<p><font face="Verdana"><font size=-1>Next, drop the shadow definition
or create a new one. You can then connect to the newly renamed shadow file
with gfix and make it a stand-alone GDB file.</font></font>
<p><font face="Verdana"><font size=-1>This allows you to have the least
downtime (less than a minute to shut down IB, rename the file and restart
IB, even doing it in a batch file on NT). It lets you bypass gbak entirely
and have a snapshot of IB that can be backed up to tape or copied to another
disk using good old OS-based tools.</font></font>
<p><font face="Verdana"><font size=-1>4.3.3 Use Roll-Forward Logs</font></font>
<p><font face="Verdana"><font size=-1>If even a minute of downtime is too
long, there is the Roll-Forward Logs method.</font></font>
<p><font face="Verdana"><font size=-1>I remember a discussion on the mers
lists about six months ago, with some people complaining about the lack
of roll-forward logs and others stating that roll-forward logs were of
no use. I will state that roll-forward logs are not just extremely useful,
they have saved me many times over the past few years.</font></font>
<p><font face="Verdana"><font size=-1><u>What is a roll-forward log? </u>It
is a complete log of all changes (insert/update/delete) made within the
database. It can work in many different ways. I will describe the thought
process we went through and the mistakes we made, so that you can understand
the decisions we made and why.</font></font>
<p><font face="Verdana"><font size=-1><u>Our first mistake - External Tables
</u>Our
first action was to have a series of triggers on each table of the database
(in position 0, with no other triggers at the same position) that inserted
the previous values into an external 'shadow' table. (Wait for it, I know
all the red flags are up, but like I said, I am explaining the process,
not the final product yet).</font></font>
<p><font face="Verdana"><font size=-1>External tables hold text values
extremely well, but when you are holding date and numeric values, sometimes
the casting is no good. Don't even begin to ask about blob or arrays. We
could have worked around that problem with a little work. The most important
hurdle of that approach is that EXTERNAL TABLES ARE OUTSIDE TRANSACTION
CONTROL.</font></font>
<p><font face="Verdana"><font size=-1>For those of you who do not know,
the transaction is the database programmer's best friend in the whole world.
Any occurrence in IB is done within a transaction - it is the nature of
the beast. If you are using the BDE with Autocommit and you insert one
record at a time, each insert is a single InterBase transaction.</font></font>
<p><font face="Verdana"><font size=-1>This has multiple effects. Say you
insert into a table which has an insert trigger which inserts rows into
another table. If you rollback your work, the original insert is rolled
back and the new rows in the other affected table are rolled back as well.</font></font>
<p><font face="Verdana"><font size=-1>If your roll-forward log is an external
table, it is outside the transaction context. You will have a list of changes
in your log, even though those changes were reversed out and so do not
exist in your main database.</font></font>
<p><font face="Verdana"><font size=-1>This is the problem of using UDF's
to record your log. After the UDF has written your changes to the external
file, there is no way to notify the UDF if a rollback occurs.</font></font>
<p><font face="Verdana"><font size=-1>After creating a whole series of
these tables to shadow each table in our database, we found them far too
complex to maintain.</font></font>
<p><font face="Verdana"><font size=-1><u>Logging WITHIN the database </u>The
only way to safely maintain a log was to have it within the database. So
how would we create the log? We looked at different methods.</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>The first method was to have a table
that held a very large char field that we could populate with an SQL statement
to reproduce the insert, update or delete action that took place. It would
have handled most datatypes, but blob and array data were still out of
the question.</font></font></li>

<li>
<font face="Verdana"><font size=-1>The second method was to have two tables,
a master/detail that looked something like this:</font></font></li>
</ul>

<dir><font face="Verdana"><font size=-1>MASTER table Fields</font></font>
<p><font face="Verdana"><font size=-1>SURROGATE_KEY = Unique key value,
generated.</font></font>
<p><font face="Verdana"><font size=-1>TABLE_NAME = Name of the table the
action took place on</font></font>
<p><font face="Verdana"><font size=-1>ACTION_TYPE = (I)nsert; (U)pdate;(D)elete</font></font>
<p><font face="Verdana"><font size=-1>KEY_LINK = This is a text field that
held the text</font></font>
<p><font face="Verdana"><font size=-1>of the where clause, e.g. 'WHERE
PK_FIELD1= VAL1 AND PK_FIELD2=VAL2'</font></font>
<p><font face="Verdana"><font size=-1>TIME_STAMP = To get the order of
operations. This value was generated by the trigger inserting these records.</font></font>
<p><font face="Verdana"><font size=-1>This approach meant that, if the
table in question had multiple fields making up its primary key, the record
could be properly found.</font></font>
<p><font face="Verdana"><font size=-1>CHILD table Fields</font></font>
<p><font face="Verdana"><font size=-1>LINK_KEY = Linking record from the
MASTER table</font></font>
<p><font face="Verdana"><font size=-1>using SURROGATE_KEY</font></font>
<p><font face="Verdana"><font size=-1>FIELD_NAME = Name of the field in
question</font></font>
<p><font face="Verdana"><font size=-1>VAL_VARCHAR</font></font>
<p><font face="Verdana"><font size=-1>VAL_NUMBER</font></font>
<p><font face="Verdana"><font size=-1>VAL_DATE</font></font>
<p><font face="Verdana"><font size=-1>VAL_BLOB</font></font>
<p><font face="Verdana"><font size=-1>etc.</font></font>
<p><font face="Verdana"><font size=-1>So for every change to the database,
we would have a record inserted into the MASTER and a record was inserted
into the child table for every column changed.</font></font></dir>
<font face="Verdana"><font size=-1>We were doing quite well with the second
method, but found that we needed to use some custom values, domains, etc.
That necessitated constantly adding to the field types to be saved, so
we needed to be constantly changing the metadata of a table that may currently
be in use.</font></font>
<p><font face="Verdana"><font size=-1>As well, it necessitated changing
all sorts of stored procedures that read these tables.</font></font>
<p><u><font face="Verdana"><font size=-1>What we ended up with</font></font></u>
<br><font face="Verdana"><font size=-1>We ended up with a separate table
for each primary domain/datatype. That also made it very easy to perform
the upgrade to version 6, where there were new datatypes. Although we are
not currently running on v.6, the upgrade testing has been performed.</font></font>
<p><font face="Verdana"><font size=-1>4.3.4 Using 'Bots' to Extract the
Logged Changes</font></font>
<p><font face="Verdana"><font size=-1>Now that all the changes were logged,
we needed some way to extract them from the database. I resorted to my
favorite tool, the IBOT.</font></font>
<p><font face="Verdana"><font size=-1>'Bot' is short for 'robot' - a automated
process that has very limited, pre-programmed responses to limited input.
A InterBase bot is one that is totally controlled by database events and
values kept in tables inside the core gdbs.</font></font>
<p><font face="Verdana"><font size=-1>It works just like a regular client
and can be set up on any machine with net or local access to the gdbs it
maintains or is maintained by.</font></font>
<p><font face="Verdana"><font size=-1>My BOTS (Or IBOTS for InterBase bots)
assist in the maintenance of the system. I will come back to what the bots
are and what they do for you later in this document. I am currently working
with a friend to produce a standard bot template that is easily modified
so that everyone out there can quickly use and/or customize their own bots
and get them up and working quickly.</font></font>
<p><font face="Verdana"><font size=-1>4.3.5 Our Multi-Server, Multi-File
Database</font></font>
<p><font face="Verdana"><font size=-1>To fully explain a few things, I
need to show that my concept of a database spans many servers and gdb files.</font></font>
<p><font face="Verdana"><font size=-1>I have a type of file that I refer
to as a core file. It has all of the users' data. There can be many core
files and they are replicated amongst themselves. They can sit on the same
network or on different networks, as long as some type of update method
is applied. That might even be applying roll-forward logs that have arrived
in the mail.</font></font>
<p><font face="Verdana"><font size=-1>Of all the core files, one is designated
as the primary file. It has the task of conflict resolution between the
different core files. The only difference between the primary file and
the rest is a setting in the Variables table.</font></font>
<p><font face="Verdana"><font size=-1>If the primary file fails, another
core file can be upgraded to become the primary core file when necessary.</font></font>
<p><font face="Verdana"><font size=-1>I have another type of file known
as the historical files. They can sit on any machine on the network, on
a machine that is appropriate to the amount of use they get. If they are
only accessed by a single person once a month, don't bother buying a Sun
server to host them...</font></font>
<p><font face="Verdana"><font size=-1>This type may or may not be applicable
to every developer's needs - if the data lends itself to breakpoints or
static tables that do not relate to the newer tables, the key may be to
separate this data into a subset of a core file.</font></font>
<p><font face="Verdana"><font size=-1>A third type of file is the roll-forward
logs. I set up the logs so that they represent a week of time and are sized
to fit easily on a CD. In the next section, I will go into the details
of our roll-forward logging concept and how we implemented it.</font></font>
<p><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>&nbsp;
<p><a NAME="rollforward"></a><b><font face="Verdana">5. Roll-Forward Logging</font></b>
<p><b><font face="Verdana"><font size=-1>5.1 Roll-Forward Concepts and
Implementation</font></font></b>
<p><i><font face="Verdana"><font size=-1>What use is Roll-Forward?</font></font></i>
<p><font face="Verdana"><font size=-1>Databases are designed to hold large
amounts of data that are shared at the same time by a large group of people.
As rarely as possible, the database has to be shut down to allow the system
administrator to make a proper external backup of the data.</font></font>
<p><font face="Verdana"><font size=-1>If the database is not shut down
when a backup is made, at best the backup is corrupt, at worst, you have
damaged your database. This happens when the backup process (either a third-party
tool or the COPY command) does not understand that only portions of the
file are locked and that they may be in a transitional state during the
copy process (the file is changing as the copy is taking place).</font></font>
<p><font face="Verdana"><font size=-1>InterBase provides a backup utility
called GBAK. Instead of physically copying the file, it links into the
database as a user and queries all the information about the database.
It writes this information into another file (or directly onto tape) in
such a way that it can be physically copied or moved. All this is within
transaction control, so you get a perfect snapshot of the database when
the transaction began.</font></font>
<p><font face="Verdana"><font size=-1>The problem is, what do you do when
your backup routine takes a long time? Or when your backup regimen is once
a day or even once a week? A file corruption could have you lose hours
or even days of work.</font></font>
<p><font face="Verdana"><font size=-1>Once you restore your database, all
the changes done since the snapshot have to be re-entered. Just retracing
those changes is time-consuming. It would be great if every change to the
database since the last snapshot backup was in an SQL script that you could
run to bring the database up to date.</font></font>
<p><font face="Verdana"><font size=-1>Roll-Forward is about easily rebuilding
a series of actions by applying a single, user-editable process.</font></font>
<p><font face="Verdana"><font size=-1>InterBase currently has no inherent
method of doing this. It had this functionality in the days before Superserver
but it got broke and was deemed too hard to fix. That does not mean it
can not be done. Triggers can be used on a table to create a series of
SQL statements that echo actions which have just occurred. For example,
you can have an After Insert trigger on a table to insert values into a
series of special tables that store the changes. You can do the same with
an After Update or After Delete trigger.</font></font>
<p><font face="Verdana"><font size=-1>A safe way to implement a roll-forward
system with InterBase is to create an IBOT that works on a timer. At every
[preset] interval of time, the IBOT queries the table to see all the newly-committed
changes and writes them out to another database (preferably on another
machine) that exists specifically to hold the logs. When those writes are
committed, the IBOT removes the entries from the original database.</font></font>
<p><font face="Verdana"><font size=-1>This is handled nicely by using Jason
Wharton's multi-database transaction components (or by going to the API
directly). This way, the deletes occur only if the data are properly transferred
to the target database.</font></font>
<p><font face="Verdana"><font size=-1>With proper timestamp values, you
can take a backup, query the roll-forward database(s) and apply the changes
that have occurred from the point the backup transaction occured.</font></font>
<p><font face="Verdana"><font size=-1>The log makes it easy to isolate
where a user has made a mistake, roll the log forward to that point, remove
the users actions and continue the log as if the user never performed the
data-damaging action in the first place.</font></font>
<p><font face="Verdana"><font color="#FF0000"><font size=-1>This is only
one way of reversing a user's actions - more on this later.</font></font></font>
<p><b><font face="Verdana"><font size=-1>5.2 Implementing Roll-Forward
Using Daemons and Bots</font></font></b>
<p><font face="Verdana"><font size=-1>I must begin to explain the different
tools that go into the system to make it work well. We developed several
tools to make the system work well. You can get away with shortcuts, but
every tool I am describing here was built to solve a problem that confronted
us.</font></font>
<p><font face="Verdana"><font size=-1>We have multiple machines, each with
its own IP address, each with a unique path to a particular database.</font></font>
<p><font face="Verdana"><font size=-1>At any time, a server can be taken
down for maintenance, or a new file made active by a backup/restore routine
that has now become ready. It is very difficult to hard-code this information
into a BDE alias or IB_Connection style component.</font></font>
<p><font face="Verdana"><font size=-1>Consider, too, that the client machines
that are connecting to the various gdbs may be on a remote site, hours
away from someone who can make any changes to its configuration.</font></font>
<p><font face="Verdana"><font size=-1>5.2.1 DAEMONS</font></font>
<br><font face="Verdana"><font size=-1>The Net came up with tool to solve
a similar problem. A DNS server will take a name lookup query and return
its IP address. Since we need more than a simple IP address, we just extend
the model a little and customize it to our needs.</font></font>
<p><font face="Verdana"><font size=-1>In our network's DNS server, we add
a few entries that give multiple IP addresses to a single web name. Let's
call the web name GDBCONTROL.MYDOMAIN.COM and say it has a series of IP
addresses (192.168.10.2 .....192.168.10.6) corresponding to the machines
on our network that will be running our new extended DNS server - our GDBCONTROL
daemon.</font></font>
<p><font face="Verdana"><font size=-1>When a client machine wants to connect
to the system, it first does a DNS lookup for 'GDBCONTROL.MYDOMAIN.COM'
and then sends a specially formatted UDP packet to the returned address
(and to a predetermined port). If there is no response within a specified
time period, another DNS lookup occurs for 'GDBCONTROL.MYDOMAIN.COM'. If
you configured your DNS correctly, the DNS server will be rotating through
all the IPs you gave for that domain name and the client machine will eventually
have contact with one of the GDBCONTROL daemons.</font></font>
<p><font face="Verdana"><font size=-1>This allows you to add GDBCONTROL
daemons to the system as needed or have them drop from the loop without
your end users (or automated bots) really caring.</font></font>
<p><font face="Verdana"><font size=-1>The GDBCONTROL daemon, connected
to one of the core databases, prompts the user for username and password
and runs a query against the database to determine what database the requesting
client should be directed to. That information is sent to the GDBCONTROL
daemon. In turn, the daemon verifies the user is allowed to connect from
that particular client machine at that particular time.</font></font>
<p><font face="Verdana"><font size=-1>After all verification routines have
been run, the server:/path, together with the user's real login and password
for the server they are connecting to, are sent back to the client so that
the client can make the appropriate connections.</font></font>
<p><font face="Verdana"><font size=-1>The GDBCONTROL daemon is connected
not just to a core gdb. It has no interface of its own but it keeps in
contact with a user interface via UDP broadcasts that can also log all
connection activity.</font></font>
<p><font face="Verdana"><font size=-1>The daemon is analogous to an NT
service. You start it. You have no user interface. It runs in the background
and if you want to configure it, you change its configuration settings
in the Registry or pass values via the services API.</font></font>
<p><font face="Verdana"><font size=-1>With the GDBCONTROL, all control
commands and responses are done with UDP broadcasts. I am going to detail
the interface in my docs.</font></font>
<p><i><font face="Verdana"><font size=-1>I am currently putting in capability
for a UDP broadcast to registered IP addresses - this way a remote user
can signal the bot to broadcast everything it is doing. I have not really
had a need for such a detailed log. There is enough redundancy in the system
that I went a whole week without realizing one of the secondary core files
and its associated bots were down. I checked GDBCONTROL session log, saw
the problem, rebooted NT and voila, everything was back up and running.</font></font></i>
<p><font face="Verdana"><font size=-1>The daemon also is in contact with
one of the 'ISALIVE' bots and knows when a server is down.</font></font>
<p><font face="Verdana"><font size=-1>At this point, the client connections
or any one of the automated bots can start up and connect to the system,
regardless of what machines are up or down, as long as a physical connection
is available between the client machine and an operating core server.</font></font>
<p><font face="Verdana"><font size=-1>5.2.2 BOTS/IBOTS</font></font>
<br><font face="Verdana"><font size=-1>We use bots to extend IB's basic
functionality by allowing it to perform tasks that normally only a client
app can do. A bot is a client app. The only real difference is that the
database controls it, rather than the normal situation where a client app
controls the database.</font></font>
<p><i><font face="Verdana"><font size=-1>The reason I refer to the GDBCONTROL
program as a 'daemon' rather than a 'bot' is because it receives its requests
and setup commands through a UDP interface and thus directly interfaces
with the client software. A bot does not do this. I make this distinction
to separate the 'bot' style of approach from daemon-based middleware solutions.</font></font></i>
<p><font face="Verdana"><font size=-1>When a bot starts, it finds out what
core file (i.e. server and gdb) it is supposed to be a slave to. If that
server is not available, it notifies the GDBCONTROL. GDBCONTROL records
this into the core file that it is connected to. GDBCONTROL either reassigns
the bot to another core file or responds with the shutdown command.</font></font>
<p><font face="Verdana"><font size=-1>If the bot does not get either the
information for a working core file or the shutdown command, it shuts down
on its own.</font></font>
<p><font face="Verdana"><font size=-1>A bot should be configured so that
it starts up, knows what kind of bot it is, and contacts the GDBCONTROL
program. Once it receives its assigned server, database, login name and
password from the GDBCONTROL daemon, it logs into the server and registers
an interest in two events. One event has the same name as the bot; the
other is called 'BOTSTYLE||SETUP'.</font></font>
<p><font face="Verdana"><font size=-1>For example, the ROLLFWD bot would
be registered into the server for an event matching its unique name as
well as for the event called ROLLFWD||SETUP.</font></font>
<p><font face="Verdana"><font size=-1>We went with the idea that only one
of a type of bot would be sitting at a particular IP address and every
login has its own unique login name. This meant that, although you could
have any number of bots running on a machine, they all have to be different
types of bots.</font></font>
<p><font face="Verdana"><font size=-1>After registering for events, the
bot reads its own configuration settings from the appropriate tables. To
change a bot's settings, you alter the configuration settings and post
the setup event for the particular bot you want reconfigured.</font></font>
<p><font face="Verdana"><font size=-1>Once a bot's particular event is
triggered, it follows its configuration settings and basic rules to perform
the task assigned to it.</font></font>
<p><font face="Verdana"><font size=-1>ROLLFWD</font></font>
<br><font face="Verdana"><font size=-1>The ROLLFWD bot is connected to
a core gdb as well as a log gdb. The connections are not constant - it
is connected as needed. When a timer on the ROLLFWD bot fires, the bot
executes a procedure on the core server, returning a formatted series of
data that is inserted into the log gdb. It is all done via a single multi-gdb
transaction because, once the data is committed into the destination, it
is removed from the source database. If an error occurs, all changes on
both databases get rolled back.</font></font>
<p><font face="Verdana"><font size=-1>Initially we used a hard-coded SP
name but later we found that, with changing the SP code on an operational
database, it was a VERY BAD THING (tm).</font></font>
<p><font face="Verdana"><font size=-1>After that, we started putting the
SP name and returned parameters, along with the destination settings, into
the configuration tables for the bot. That meant we could create a new
version of the SP with the changes we wished to incorporate, update the
bot's configuration tables, then post the update event. This ensured that
the new settings would take effect when all the client bots were ready,
instead of changing the metadata while they were using it. It allowed for
very quick configuration changes to many remote bots.</font></font>
<p><font face="Verdana"><font size=-1>We also started to implement the
storage of the actual program within the database as a blob field - this
way, when the bot connects it checks its version and downloads a new copy
of itself when necessary. I never really went into a lot of detail on the
subject, but others may be interested in looking at the source code and
coming up with a method for doing it.</font></font>
<p><font face="Verdana"><font size=-1>5.2.3 BOTS AND DDL</font></font>
<br><font face="Verdana"><font size=-1>So far I have discussed how to save
the actions of DML statements with triggers into internal log tables, and
how those log tables are moved into a remote gdb. So far, I have not touched
on metadata changes.</font></font>
<p><font face="Verdana"><font size=-1>At first I was building triggers
on the system tables that would fire when the change was committed. Those
triggers would try to build the entire DDL statement that caused the change.
Many frustrating moments later, I ended up putting up a flag in the Variables
tables that would indicate what had changed. I would get the ROLLFWD bot
to read in the changes, create the proper DDL, and store it into the log
gdb for later application.</font></font>
<p><font face="Verdana"><font size=-1>5.2.4 PROTECTING CLIENT CONNECTIONS</font></font>
<br><font face="Verdana"><font size=-1>After a client has connected to
a core file, it operates normally except that all inserts are performed
via stored procedures. The client also maintains a session log of all DML
actions. If a core file goes down, the client requests a different core
file to connect to from GDBCONTROL, and then replays all the previous DML
actions of the user.</font></font>
<p><font face="Verdana"><font size=-1>When the first core file is brought
back online, the UI's of each record are used to make sure that no record
gets double-modified. This protects end users from losing work when a core
file fails in some way.</font></font>
<p><font face="Verdana"><font size=-1>5.2.5 APPLYING THE LOGS</font></font>
<br><font face="Verdana"><font size=-1>If the basic design that the developer
has in mind is not for a load-balanced system and there is only one core
file (i.e., no fail-over replication), we are almost done.</font></font>
<p><font face="Verdana"><font size=-1>Now, you have a database that has
become corrupt in some fashion. You have a backup that is working just
fine. You also have a log of all the changes to the database.</font></font>
<p><font face="Verdana"><font size=-1>At this point, you can apply the
log to the database with another client program that prompts for start
timestamp/end timestamp - stop on first occurrence of user X - step through
changes.... I could go on for days with all the possible options you could
include in this program. I kept mine very simple because I did not have
a need that I could not get around by using WISQL or IBO.</font></font>
<p><font face="Verdana"><font size=-1>5.2.6 <b><font color="#FF0000">WARNING!!!!!</font></b></font></font>
<p><font face="Verdana"><font size=-1>Since you are creating the log from
triggers, you have the choice to capture the data on the Before or the
After trigger. Consider this: if you do not change the data using triggers,
it does not matter where your data capture trigger sits. If you change,
modify or insert the values into another table, then you need to think
about a few things.</font></font>
<ol>
<li>
<font face="Verdana"><font size=-1>if you capture the values on an insert
trigger, you need to think about the receiving server having to process
the values during the LOGS insert. This could be a problem if you have
another insert trigger putting values into secondary tables. Those changes
will also be in the log, so the value gets inserted twice. This is an Opportunity
for confusion if you are not extremely careful.</font></font></li>

<li>
<font face="Verdana"><font size=-1>if you capture the values after the
DML has occurred, you need to make sure that any triggers on the table
do not fire again, or you will corrupt your data.</font></font></li>
</ol>
<font face="Verdana"><font size=-1>A simple IF...THEN block around the
body of your triggers, that checks to see if the trigger is supposed to
fire for this user, will save you lots of grief in the long run.</font></font>
<p><font face="Verdana"><font size=-1>This is true even if you are not
working with replication. You can have a trigger not fire for a specific
user for the duration of a transaction and not affect other users or even
future transactions of this user.</font></font>
<p><b><font face="Verdana"><font size=-1>5.3 My IBOTS</font></font></b>
<p><font face="Verdana"><font size=-1>ISALIVE - this bot simply tests to
see if the different servers/gdb's are available and keeps the core file
it is connected to informed of any which are down or slow to respond. It
actually connects and queries the different databases and records whether
it was successful. It is more informative than a ping, since a machine
could be up but the gdb could be unavailable.</font></font>
<p><font face="Verdana"><font size=-1>SECURIT - this bot responds to comands
to add users, grant rights, checks for the dependencies between (my groups
table, my users table, my rights table) and makes sure that a simple procedure
ADD_USER_TO_GROUP(username, groupname) would give the user the rights that
the group has. It prevents the client apps from needing to know the sysdba
password to work with the ib 5 API. It also works with InterBase 4.</font></font>
<p><font face="Verdana"><font size=-1>ROLLFWD - explained to death so far.</font></font>
<p><font face="Verdana"><font size=-1>REPLICAT - this is the bot that is
used in many-to-many replication across servers.</font></font>
<p><font face="Verdana"><font size=-1>METABUILD - this is the bot that
actually performs metadata updates - I have triggers on all the system
tables preventing anyone but this bot from doing DDL statements.</font></font>
<p><font face="Verdana"><font size=-1>DOCUMENT - these bots create the
sequential numbers for invoices etc. There can be only one bot per numeric
range.</font></font>
<p><font face="Verdana"><font size=-1>I have a few others but these are
the main ones.</font></font>
<p><b><font face="Verdana"><font size=-1>5.4 Some Conclusions</font></font></b>
<p><font face="Verdana"><font size=-1>There we have a simple roll-forward
system. My big concern is being able to provide a solution for those who
need it but are locked into a non-maintained IB environment (4.x) or for
those who want a system that is highly modular and easy to modify and maintain
without needing to understand C or BLR or even the InterBase API. If they
do go this route, they simply print out the final version of the documentation
as a development or maintenance guide and give it any new developers on
staff to read. I am trying to target as wide a audience as possible with
my writing because, for many, this is a very new and intimidating subject.</font></font>
<p><font face="Verdana"><font size=-1>For many users, the sort of solution
I am detailing is overkill. With the source of the different bots released,
along with a few wizards (I have been working on a visual database builder
- a RAD tool for InterBase) the whole system can be set up easily.</font></font>
<p><font face="Verdana"><font size=-1>Many of the extras could be trimmed
off but I left the extra details in just so that the reader would have
a firm understanding of the tools needed, when I go into the extra steps
of replication and load balancing.</font></font>
<br><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>&nbsp;
<p><a NAME="replication"></a><b><font face="Verdana">6. Replication</font></b>
<p><font face="Verdana"><font size=-1>Replicating data involves copying
changes from one operational database to another operational database.
There are different kinds of replication.</font></font>
<p><font face="Verdana"><font size=-1>People who begin to work with replication
think it is a simple process of applying the changes that have occured
to one database onto a separate database.</font></font>
<p><font face="Verdana"><font size=-1>Replication is far more complex than
simply applying a log. It necessitates adding a lot more maintenance code
to ensure that it does not hog all your network bandwidth.</font></font>
<p><font face="Verdana"><font size=-1><b>One-directional replication</b>
occurs when the data are moved from an active server that is serving information
to client applications, to a non-active server which only receives changes.
When the primary server becomes corrupt and unusable, the secondary is
activated.</font></font>
<p><font face="Verdana"><font size=-1>A <b>shadow</b> is a one-way replication
system that works on a single server under the control of InterBase. It
is good protection against the event of drive failure to maintain your
production data on one physical drive and the shadow on another.</font></font>
<p><font face="Verdana"><font size=-1>This is fine for keeping a ready-to-run
operation going. It does not alleviate situations where a single server
can not process all the requests that are coming to it. Everyone slows
down and the system becomes unworkable.</font></font>
<p><font face="Verdana"><font size=-1>To combat this, a bi-server or poly-server
environment could be implemented. Users log in to different servers, each
with a copy of the data, and no single server acts as a bottle neck. Similar
methods could be used to keep and synchronize active data at multiple locations.</font></font>
<p><b><font face="Verdana"><font size=-1>Fail-over replication</font></font></b>
<p><font face="Verdana"><font size=-1>This is the easiest style of replication
to set up. Think of it as being a remote shadow. Users and bots work from
only one core file at a time. Secondary core files are updated by dedicated
bots but it is one-way only.</font></font>
<p><b><font face="Verdana"><font size=-1>Shared Replication</font></font></b>
<p><font face="Verdana"><font size=-1>In some applications, you may find
that, while all users may query all the tables in a database, only one
or two users actually modify data in certain tables.</font></font>
<p><font face="Verdana"><font size=-1>An example of this would be a table
that holds large batches of information (like that generated by outside
services or machines, with us, it is client transactional data from Bell).
If you can segregate your users into those who modify a certain set of
tables and those who modify a certain other set of tables, you can split
your users onto two or more servers.</font></font>
<p><font face="Verdana"><font size=-1>You can even have your applications
understand the split and connect to the appropriate servers when a operation
starts.</font></font>
<p><font face="Verdana"><font size=-1>Although all servers contain the
same data, you have balanced the load, especially if you have a lot of
triggers and server-side verification going on.</font></font>
<p><font face="Verdana"><font size=-1>This method allows you to use a slightly
modified version of the Fail-over method, with the idea that it is one-way
replication split by tables.</font></font>
<p><b><font face="Verdana"><font size=-1>Full Replication</font></font></b>
<p><font face="Verdana"><font size=-1>With Fail-over or Shared Replication,
you can normalize your activities.</font></font>
<p><font face="Verdana"><font size=-1>For example, if a new log record
gets created, then updated multiple times, then deleted, all within the
span of the log, the BOT would not apply anything related to that record.
This is a way to cut down the network traffic so that only the data in
its final state is applied to the end database.</font></font>
<p><font face="Verdana"><font size=-1>With full replication, this is a
problem.</font></font>
<p><font face="Verdana"><font size=-1>You may have a record that was in
one core database, that conflicts with a record in the destination database
(such as a unique key conflict during a certain time period). This sort
of problem in minimized if updates are frequent but it does not go away.</font></font>
<p><font face="Verdana"><font size=-1>What is happening is a process that
is as complex as file locking in a multi-user database. The problem is,
you can not do any form of file locking, or even MGA, because, at the time
that a change is taking place on one server, there is no way for the other
servers to know that it is happening.</font></font>
<p><b><font face="Verdana"><font size=-1>6.1 Enterprise-scoped Unique Identifiers
(UIDs)</font></font></b>
<p><font face="Verdana"><font size=-1>Many systems use simple numbers provided
by generators as primary (surrogate) keys. A generator has no method of
knowing what numbers have been given to what record on another server.
This can give rise to invalid numbers or index corruptions - not a pretty
sight.</font></font>
<p><font face="Verdana"><font size=-1>For a data warehouse, many servers
may be serving multiple users and producing calculated results that encompass
the work being performed by other servers.</font></font>
<p><font face="Verdana"><font size=-1>A typical scenario for such a system
is the need to create an enterprise-unique identifier for every row in
a table. Since this identifier is generated by the individual server, it
is necessary to make sure it is calculated in such a way that it identifies
the very server it was created on.</font></font>
<p><font face="Verdana"><font size=-1>In this case, a server-wide &lt;server
name> variable - let's assume it is a 2-byte string - is used as the beginning
of the unique indentifier (UID). Then, because a server may have a second
or more copies of the database on it, a second variable, &lt;database name>,
is added. So far, the UID is 4 characters in length and it still needs
further processing.</font></font>
<p><font face="Verdana"><font size=-1>Because tables may be combined via
union clauses or recursive tree structures, the unique identifier must
also be unique across all possible tables, so each table has a unique shortcut
name that is 4 characters in length.</font></font>
<p><font face="Verdana"><font size=-1>Now we are at the point where most
other designers begin, with an auto-incrementing number, generally created
by a generator, with a start value of 1. The difference is, we must cast
the integer value as a string large enough to hold the largest value the
integer can be - 11 digits including the sign. To make sorting and other
operations on the UID easier, after the cast, we will zero-fill the positions
preceding the digits, so that it looks like this</font></font>
<dir>
<dir><font face="Verdana"><font size=-1>001</font></font>
<p><font face="Verdana"><font size=-1>002</font></font>
<p><font face="Verdana"><font size=-1>003</font></font></dir>
</dir>
<font face="Verdana"><font size=-1>instead of</font></font>
<dir>
<dir><font face="Verdana"><font size=-1>1</font></font>
<p><font face="Verdana"><font size=-1>2</font></font>
<p><font face="Verdana"><font size=-1>3</font></font></dir>
</dir>
<font face="Verdana"><font size=-1>This fixes the sort order so that we
do not have sorts like this</font></font>
<dir>
<dir><font face="Verdana"><font size=-1>19</font></font>
<p><font face="Verdana"><font size=-1>2</font></font>
<p><font face="Verdana"><font size=-1>20</font></font>
<p><font face="Verdana"><font size=-1>21</font></font>
<p><font face="Verdana"><font size=-1>22</font></font>
<p><font face="Verdana"><font size=-1>....</font></font>
<p><font face="Verdana"><font size=-1>29</font></font>
<p><font face="Verdana"><font size=-1>3</font></font>
<p><font face="Verdana"><font size=-1>30</font></font>
<p><font face="Verdana"><font size=-1>31</font></font>
<p><font face="Verdana"><font size=-1>etc.</font></font></dir>
</dir>
<font face="Verdana"><font size=-1>With this structure, any number of simultaneous
users can insert any number of records in multiple databases, across multiple
servers and not have a duplicate UID assigned. It works even while the
communication between servers is down, or on a time-delayed update system.</font></font>
<p><font face="Verdana"><font size=-1>What we have come up with is a UID
that is 19 characters in length and looks like this</font></font>
<dir>
<dir><font face="Verdana"><font size=-1>CHARS, 1-2 is a unique Server identifier</font></font>
<p><font face="Verdana"><font size=-1>- ie, AA or AB etc.</font></font>
<p><font face="Verdana"><font size=-1>CHARS, 3-4 is a unique GDB identifier</font></font>
<p><font face="Verdana"><font size=-1>- ie, AA or AB etc.</font></font>
<p><font face="Verdana"><font size=-1>CHARS, 5-8 is a unique TABLE identifier</font></font>
<p><font face="Verdana"><font size=-1>- the same across all databases</font></font>
<p><font face="Verdana"><font size=-1>CHARS, 9-19 is the actual number
of the record ranging</font></font>
<p><font face="Verdana"><font size=-1>from -2147483647 to 2147483648, with
left zero-filling,</font></font>
<p><font face="Verdana"><font size=-1>for example</font></font>
<p><font face="Verdana"><font size=-1>AAAAAAAA-2147483647 (minimum)</font></font>
<p><font face="Verdana"><font size=-1>AAAAAAAA00000000001 (mid-range)</font></font>
<p><font face="Verdana"><font size=-1>AAAAAAAA02147483648 (maximum)</font></font>
<p><font face="Verdana"><font size=-1>etc.</font></font></dir>
</dir>
<font face="Verdana"><font color="#FF0000"><font size=-1>I will be posting
the SP code that does this.</font></font></font>
<p><font face="Verdana"><font size=-1>In order for us to use replication
properly, we resorted to a UID that would survive backup/restore and be
unique across the entire database schema. That allows us to identify records
even when the data that comprised their primary key had changed.</font></font>
<p><font face="Verdana"><font size=-1>It also allowed us to identify what
server created a record and determine an order of operations for use in
identifying conflicts. The UID has further usefulness for us because we
use many-many relationships and this UID works well in recursive structures.</font></font>
<p><font face="Verdana"><font size=-1>This sort of planning is also required
when data must be replicated over many servers. In a simple replication
strategy, a single column can be used to mark whether a record needs to
be copied from one server to the next,</font></font>
<p><font face="Verdana"><font size=-1>e.g.</font></font>
<p><font face="Verdana"><font size=-1>select * from mytable where changed='YES'</font></font>
<p><font face="Verdana"><font size=-1>What happens when you are updating
multiple servers or using a ring or star topology? It is extremely important
to designate what information is to be replicated, how it is to be marked
and to which servers it must be transferred.</font></font>
<p><font face="Verdana"><font size=-1>As a rule, almost all aspects of
data design must be questioned as to how they would hold up in a multi-server
system.</font></font>
<p><font face="Verdana"><font size=-1>Another situation to be handled is
entry of the same data by different users into different servers at the
same time.</font></font>
<p><font face="Verdana"><font size=-1>For example, a customer calls in
and gives his change of address. Employee A takes the call, takes down
the information and prepares to process it after the current work is finished.</font></font>
<p><font face="Verdana"><font size=-1>Meanwhile, the customer calls in
again with a clarification, Employee B, working on a different server,
gets the new data, sees it has not been entered and begins entering it.</font></font>
<p><font face="Verdana"><font size=-1>When Employee A starts to enter the
changes, the information from Employee B has not been posted, so the information
has not been replicated to Employee A's server. Both employees are working
on the same record, at the same time. Neither server blocks it because
they are unaware of each other.</font></font>
<p><font face="Verdana"><font size=-1>Consider, also, two new records being
entered at the same time, or one that is deleted from one server while
another is updating the 'same' record on another.</font></font>
<p><font face="Verdana"><font size=-1>The log from the remote database
assumes the data is in one state but it has been modified already, locally.</font></font>
<p><font face="Verdana"><font size=-1>This all comes down a need to know
not just what has happened, but also what it happened to and, for updates,
what were the values before the update.</font></font>
<p><font face="Verdana"><font size=-1>To ensure that the data are correct
and not duplicated, each table has a series of 'KEY' fields that enable
duplicate checking. Also, one server out of the cluster is responsible
for maintaining the data integrity. All the servers must have the code
in place to do the maintenance, but only one may be active at a time. This
is managed by storing a value in the Variables table that the database
checks.</font></font>
<p><font face="Verdana"><font size=-1>You can see that data design for
handling load balancing can be very convoluted and detailed. Don't worry,
it is actually very simple if you stay in touch with the overall picture
and don't get lost in the details.</font></font>
<p><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>&nbsp;
<p><a NAME="reversing"></a><b><font face="Verdana">7. Reversing User Actions</font></b>
<p><font face="Verdana"><font size=-1>Previously, I referred to the benefits
of logging to trace and 'undo' a single user's actions. Another approach
uses a non-transactional approach to process control.</font></font>
<p><font face="Verdana"><font size=-1>When a user logs onto InterBase and
makes a change, that change does not affect others until it is committed
to the database. After it is committed, it is difficult to isolate and
reverse the user's actions at a later date.</font></font>
<p><font face="Verdana"><font size=-1>To cover for this, every table can
have a linked child table to store all the main table's changes. This would
give you the means to run a script and reverse all of a single user's actions
across the database.</font></font>
<p><font face="Verdana"><font size=-1>To prevent your database from becoming
huge, you need to factor in a periodic purge of the data history.</font></font>
<p><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>&nbsp;
<p><a NAME="advanced"></a><b><font face="Verdana">8. Advanced Techniques</font></b>
<p><b><font face="Verdana"><font size=-1>8.1 Conflict Management and Reporting</font></font></b>
<p><font face="Verdana"><font size=-1>If you are only changing the data
on a single table on a single server, your design is much simpler and easier
to implement. If you want full fail-over/load balancing without regard
to the tables or servers used, you need to design your record conflict
management routines.</font></font>
<p><font face="Verdana"><font size=-1>If you remember my description of
core files, you will note that I declared one core file as the primary
file. This is because it is the first to receive all replication. It uses
stored procedures and dedicated bots to perform all work on the data. If
a secondary core file gets out of whack, the primary core file will produce
the instructions to get it back into shape.</font></font>
<p><font face="Verdana"><font size=-1>This is very application-specific.
Much of it comes down to the developer's understanding of the application
and how the tools work.</font></font>
<p><b><font face="Verdana"><font size=-1>8.2 Speed and Bandwidth Issues</font></font></b>
<p><font face="Verdana"><font size=-1>An important issue with replication
is size of your data and time it takes to insert. You may find that you
need to compress your data before transmission and then uncompress it when
you get it to the destination machine. It is not too difficult and libraries
for almost every compression algorithm under the sun are free for use and
download on the web.</font></font>
<p><b><font face="Verdana"><font size=-1>8.3 Choice of InterBase Architecture</font></font></b>
<p><font face="Verdana"><font size=-1>Slowness comes with the actual inserts.
This is where Classic architecture shines because if the inserts are performed
on the server itself, they are very fast. As long as your app goes directly
to the GDB, it does not go through the networking layer or any of the other
layers involved.</font></font>
<p><font face="Verdana"><font size=-1>With Classic, you can compile the
equivalent of gdb_server into your app. If you watch gbak on a classic
box, you will note that gbak does all the work and no gdb_server process
is spawned. With Superserver, you do not get this benefit (at least as
far as I have seen).</font></font>
<p><b><font face="Verdana">Footnote</font></b>
<p><font face="Verdana"><font size=-1>I will be drawing up some charts
and diagrams and working with a friend on some template code.</font></font>
<p><font face="Verdana"><font size=-1>When I am finished my 10000' overview,
I will produce an example application.</font></font>
<p><font face="Verdana"><font size=-1>Replication is one area of database
design where one person's solution is perfect for them and useless for
somebody else. I will do my best to show all the different examples in
my project.</font></font>
<p><font face="Verdana"><font size=-1><a href="MAILTO:dcalford@distributel.ca">Dalton
Calford</a></font></font>
<br>
<hr SIZE=1 WIDTH="100%">
<br><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>
<hr SIZE=1 WIDTH="100%">
<br>&nbsp;

</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->

</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>