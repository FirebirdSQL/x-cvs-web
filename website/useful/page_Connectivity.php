<?php
if (eregi("page_Connectivity.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>InterBase Connectivity for Delphi/C++Builder Client</H4>

<table>
<tr>
<td><a name="top"></a>
<hr SIZE=1 WIDTH="100%">
<font face="Verdana"><font size=-1>Date:&nbsp; 4 July 2000</font></font>
<br><font face="Verdana"><font size=-1>Author:&nbsp; Helen Borrie</font></font>
<br><font face="Verdana"><font size=-1>Contributors:&nbsp; Dalton Calford,
Jeff Overcash, Jason Wharton</font></font>
<br>
<hr SIZE=1 WIDTH="100%">
<br><font face="Verdana"><font size=-1>In this paper, we discuss two main
issues for developers writing InterBase client applications in Delphi or
Borland C++ Builder (BCB):</font></font>
<p><font face="Verdana"><font size=-1>1) Is direct access to InterBase's
Application Programming Interface (API) better than using the BDE and,
if so, why?</font></font>
<p><font face="Verdana"><font size=-1>2) Two major suites of Delphi database
components are available for InterBase - the <b>InterBase Express</b> set
(IBX), that shipped as a Beta with Delphi 5, and the <b>IB Objects</b>
set (IBO), which has been in production releases since 1997. Are they equivalent?
If not, how do they differ? We present the background of the two suites
along with a discussion of the functionality supported by each.</font></font>
<p><font face="Verdana"><font size=-1>This paper's scope is database connectivity.
Component support for server operations is a topic for another paper in
its own right.</font></font>
<p><font face="Verdana"><font size=-1>The commonalities and differences
between the four connectivity options concerned - BDE, InterBase Express,
and the two separate IB Objects strains, are <a href="#matrix">tabulated
in summary form</a> at the end.</font></font>
<p><a NAME="contents"></a><b><font face="Verdana"><font size=+1>CONTENTS</font></font></b>
<dl>
<dd>
<b><font face="Verdana"><font size=-1><a href="#ib_and_bde">1. InterBase
and the BDE</a></font></font></b></dd>

<dl>
<dd>
<b><font face="Verdana"><font size=-1><a href="#the_bde">1.1</a> The Borland
Database Engine</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#whynot">1.2</a> Why Not
Use the BDE?</font></font></b></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#largefoot">1.2.1</a> Large
Footprint</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#fragil">1.2.2</a> Fragility
and Cost for Internet Deployment</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#lcd">1.2.3</a> "Lowest Common
Denominator"</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#bdeperf">1.2.4</a> Performance
Considerations</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#endoflife">1.2.5</a> End of
Life</font></font></dd>
</dl>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#customconn">2. Custom Connectivity:
The InterBase Advantage</a></font></font></b></dd>

<dl>
<dd>
<b><font face="Verdana"><font size=-1><a href="#api">2.1</a> The InterBase
API</font></font></b></dd>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx">3. InterBase Express</a></font></font></b></dd>

<dl>
<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_bg">3.1</a> Background</font></font></b></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibx_inprise">3.1.1</a> IBX
and Borland/Inprise</font></font></dd>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_conn">3.2</a> How IBX
Implements the Connectivity with InterBase</font></font></b></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibx_database">3.2.1</a> TIBDatabase
and TIBTransaction Replace TDatabase</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_2pc">3.2.2</a> (a) Two-Phase
Commit</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_blr">3.2.2</a> (b) BLR</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_dsql">3.2.3</a> Dynamic
SQL</font></font></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibx_dscomp">(a)</a> Dataset
components</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_select">(b)</a> Selecting
Sets of Data</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_dml">(c)</a> Updating,
Inserting and Deleting</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_refresh">(d)</a> Refreshing
Sets</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_linking">(e)</a> Linking
Sets</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_params">(f)</a> Parameters</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_sprocs">(g)</a> Stored
Procedures</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_mon">(h)</a> Monitoring</font></font></dd>
</dl>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_client">3.2.4</a> Client
Considerations</font></font></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibx_sess">(a)</a> Sessions
and Multi-threaded Transactions</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_props">(b)</a> Data Field
Properties</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_methods">(c)</a> Methods
and Program Events</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_events">(d)</a> InterBase
Events</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_search">(e)</a> Searching</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_nav">(f)</a> Dataset Navigation</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_buf">(g)</a> Dataset Buffering</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_filter">(h)</a> Filtering</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_cursor">(i)</a> Dataset
Cursors</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_idx">(j)</a> Using Indexes
in Buffers</font></font></dd>
</dl>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_propeds">3.2.5</a> Property
Editors</font></font></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibx_treatprops">(a)</a> Treatment
of properties</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_runtime">(b)</a> Run-time
Access</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibx_encap">(c)</a> Encapsulated
behavior</font></font></dd>
</dl>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_controls">3.3</a> Controls</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_perf">3.4</a> Performance
(IBX vs BDE)</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_convert">3.5</a> Converting
a BDE Application to IBX</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_sig">3.6</a> Significant
Features</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_lic">3.7</a> Licensing</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_vers">3.8</a> Version
Support</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibx_clx">3.9</a> Delphi
for Linux (CLX components)</font></font></b></dd>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo">4. InterBase Objects</a></font></font></b></dd>

<dl>
<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_bg">4.1</a> Background</font></font></b></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibo_the_native">4.1.1</a>
TIB_ - the Native IBO Components</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_the_tdataset">4.1.2</a>
TDataset-Based Components</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_inprise">4.1.3</a> IB
Objects and Inprise</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_community">4.1.4</a> Community
Involvement and Support</font></font></dd>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_database">4.2</a> How
IB Objects Implements the Connectivity with InterBase</font></font></b></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibo_tibo">4.2.1</a> The "TIBO"
Strain - The TDataset-Compatible Components</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_native">4.2.2</a> The
"TIB-" Strain - Native IBO Components</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_conn">4.2.3</a> TIB_Connection
and TIB_Transaction Replace TDatabase</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_2pc">4.2.4</a> (a) Two-Phase
Commit</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_blr">4.2.4</a> (b) BLR</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_dsql">4.2.5</a> Dynamic
SQL</font></font></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibo_dscomp">(a)</a> Dataset
components</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_select">(b)</a> Selecting
Sets of Data</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_dml">(c)</a> Updating,
Inserting and Deleting</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_refresh">(d)</a> Refreshing
Sets</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_linking">(e)</a> Linking
Sets</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_params">(f)</a> Parameters</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_sprocs">(g)</a> Stored
Procedures</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_mon">(h)</a> Monitoring</font></font></dd>
</dl>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_client">4.2.6</a> Client
Considerations</font></font></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibo_sess">(a)</a> Sessions
and Multi-threaded Transactions</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_props">(b)</a> Data Field
Properties</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_methods">(c)</a> Methods
and Program Events</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_events">(d)</a> InterBase
Events</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_search">(e)</a> Searching</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_nav">(f)</a> Dataset Navigation</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_buf">(g)</a> Dataset Buffering</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_filter">(h)</a> Filtering</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_cursor">(i)</a> Dataset
Cursors</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_idx">(j)</a> Using Indexes
in Buffers</font></font></dd>
</dl>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_propeds">4.2.7</a> Property
Editors</font></font></dd>

<dl>
<dd>
<font face="Verdana"><font size=-1><a href="#ibo_treatprops">(a)</a> Treatment
of properties</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_runtime">(b)</a> Run-time
Access</font></font></dd>

<dd>
<font face="Verdana"><font size=-1><a href="#ibo_encap">(c)</a> Encapsulated
behavior</font></font></dd>
</dl>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_controls">4.4</a> Controls</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_convert">4.4</a> Converting
a BDE Application</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_perf">4.5</a> Performance
(IBO vs BDE)</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_sig">4.6</a> Significant
Features</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_lic">4.7</a> Licensing</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_vers">4.8</a> Version
Support</font></font></b></dd>

<dd>
<b><font face="Verdana"><font size=-1><a href="#ibo_clx">4.9</a> Delphi
for Linux (CLX components)</font></font></b></dd>
</dl>

<dd>
<b><font face="Verdana"><font size=-1><a href="#matrix">5. Summary of the
Connectivity Approaches</a></font></font></b></dd>
</dl>

<p><br><a NAME="ib_and_bde"></a><b><font face="Verdana">1. InterBase and
the BDE</font></b>
<p><font face="Verdana"><font size=-1>First, it will be helpful to examine
the standard database support which is provided by the native Delphi VCL
and the Borland Database Engine (BDE).</font></font>
<p><a NAME="the_bde"></a><b><font face="Verdana"><font size=-1>1.1 The
Borland Database Engine</font></font></b>
<p><font face="Verdana"><font size=-1>The BDE has a life stream that goes
back many years before the advent of RAD tools, predating even 16-bit Windows
by some years. It first came to prominence as the engine behind Paradox
3.5 and Quattro Pro, was modified a little later to provide an API for
DBaseIII-Plus, FoxBase (later DBaseIV and FoxPro) and some other ISAM databases,
as well as an API to SQLLinks pass-through drivers for several SQL engines
in the pre-Windows era. It moved onto the Windows platform with the first,
unhappy, premature Paradox for Windows release. A little after that, at
version 3.something, it redeemed its glorious DOS reputation with a very
fast, stable release accompanying the 16-bit Paradox 5 for Windows.</font></font>
<p><font face="Verdana"><font size=-1>From Delphi 1 forward, the BDE has
continued to grow as an API layer between the RAD platform and native or
open drivers for an increasing number of database platforms. Although it
has not been free of aches and pains, it has had a significant part to
play in the success of Delphi in the database arena over the past five
years.</font></font>
<p><a NAME="whynot"></a><b><font face="Verdana"><font size=-1>1.2 Why Not
Use the BDE?</font></font></b>
<p><a NAME="largefoot"></a><font face="Verdana"><font size=-1>1.2.1 Large
Footprint</font></font>
<p><font face="Verdana"><font size=-1>Deploying database applications that
need the BDE makes the installation footprint huge. Licensing restrictions
require that it be deployed intact, with full support for the Paradox engine.
These restrictions exist partly because the BDE creates Paradox tables
for caching and, sometimes, other purposes, even when Paradox is not the
back-end of the application.</font></font>
<p><a NAME="fragil"></a><font face="Verdana"><font size=-1>1.2.2 Fragility
and Cost for Internet Deployment</font></font>
<p><font face="Verdana"><font size=-1>Other deployment problems occur when
the BDE is used over the database back-end of a web application. ISP support
for system-level services often comes at very high cost. The overhead of
the BDE, with its large footprint and its reputation for fragility - often
justified through developer neglect of its configuration requirements -
can negate the advantage that InterBase's small footprint and "hands-free"
operation give it over competitors. The BDE can be an unacceptably costly
choice.</font></font>
<p><a NAME="lcd"></a><font face="Verdana"><font size=-1>1.2.3 "Lowest Common
Denominator"</font></font>
<p><font face="Verdana"><font size=-1>Economic considerations apart, the
much more significant down-side of using the BDE is that it necessarily
cripples the capacity of any database to utilize all of its features.</font></font>
<p><font face="Verdana"><font size=-1>The purpose of the BDE is to flatten
out the differences between the feature sets of the diverse range of databases
it supports. In order to "dummy out" transaction support and two-phase
commit for databases that don't have them, it must limit client applications
to one transaction per connection. This rules out asynchronous processing
and multi-server connections.</font></font>
<p><font face="Verdana"><font size=-1>In Delphi applications, it cripples
even Paradox and DBase by flattening out client language access to a limited
SQL statement set which sacrifices the grace and speed of their native
Query-by-Example language. Ironically, that sparse SQL actually gets translated
into QBE in the driver.</font></font>
<p><font face="Verdana"><font size=-1>In general, though, the BDE's support
for native SQL databases is reasonably acceptable for low-end client access,
notwithstanding some notable exceptions in certain driver implementations.</font></font>
<p><a NAME="bdeperf"></a><font face="Verdana"><font size=-1>1.2.4 Performance
Considerations</font></font>
<p><font face="Verdana"><font size=-1>Several factors about a BDE implementation
inhibit the developer from optimizing InterBase for performance and effectiveness.
The BDE-plus-driver combination adds two layers of interface code to slow
down the connection between the client application and InterBase's own
API layer.</font></font>
<p><font face="Verdana"><font size=-1>The deprecation of multi-transaction
and multi-server capabilities, discussed earlier, also deprives InterBase
of much of its capacity for load-distribution.</font></font>
<p><font face="Verdana"><font size=-1>The generalization of the VCL data
components to fit a generic scenario has resulted in a connectivity architecture
with definite limits. At the small end, that inhibits scaleability and
performance. At varying points up the scale, as the limits begin to slow
down operations, developers face the need for a direct interface, better
tailored to the database's features.</font></font>
<p><a NAME="endoflife"></a><font face="Verdana"><font size=-1>1.2.5 End
of Life</font></font>
<p><font face="Verdana"><font size=-1>As the porting of Delphi's and BCB's
RAD technology to new operating systems approaches - Linux this year, others
possibly soon to follow - it is clear that Borland will be looking to produce
a client/server connectivity layer which is released from its Paradox legacy and its
exclusive Windows OS binding. The BDE is going to be supplanted by a new,
lighter, more flexible API layer between Delphi/BCB and databases.</font></font>
<p><font face="Verdana"><font size=-1>This change will pass the balance
of the connectivity burden over to fatter drivers on the one hand and fatter
components on the other. <font color="mediumblue">The new, cross-platform dbXpress database engine,
in combination with the DataCLX data access objects, will eventually replace
the BDE for all but desktop database connectivity.<font color="black"></font></font>
<p><font face="Verdana"><font size=-1>Views around the newsgroups are that
Borland has produced the last release of the BDE, despite Borland's assurances
that it is here to stay.</font></font>
<p><font face="Verdana"><font size=-1>The BDE was ported to Linux for Corel's
Paradox for Linux release. Early releases of Delphi and BCB for Linux may
ship with this BDE port but experiences so far show that some difficult
hacking will be necessary to make it work with InterBase.</font></font>
<p><font face="Verdana"><font size=-1>Clearly, a dependable, BDE-free connectivity
solution is on the immediate Agenda for RAD developers of InterBase clients,
whether they are eyeing up the possibilities of a transition to Linux as
the platform for either server or client, or considering building portable
server tools.</font></font>
<p><a NAME="customconn"></a><b><font face="Verdana">2. Custom Connectivity:
The InterBase Advantage</font></b>
<p><font face="Verdana"><font size=-1>InterBase starts its new life in
the Open Source arena with a strong advantage over perhaps any other two-tier
client/server back-end proposition. The two leading development environments
for Windows clients - Delphi and BCB - are soon to become the first and
only RAD environments for Linux client development. Native InterBase connectivity
components already exist for both Windows environments: and not just one
set, but two. Delphi/BCB for Linux versions are planned for at least one
set. That is not a bad start.</font></font>
<p><a NAME="api"></a><b><font face="Verdana"><font size=-1>2.1 The InterBase
API</font></font></b>
<p><font face="Verdana"><font size=-1>It is not the function of this paper
to explain details of the Application Programming Interface (API) which
are wrapped by the Delphi data access components discussed here. Except
where stated otherwise, it is assumed that the components implement the
API functions and pass the required arguments as expected.</font></font>
<p><i><font face="Verdana"><font size=-1><a href="#contents">Contents</a></font></font></i>
<p><a NAME="ibx"></a><b><font face="Verdana">3. InterBase Express</font></b>
<p><a NAME="ibx_bg"></a><b><font face="Verdana"><font size=-1>3.1 Background</font></font></b>
<p><font face="Verdana"><font size=-1>During the period when Delphi 3 and
4 were the current releases, Greg Deatz and a group of helpers and testers
developed the FreeIBComponents suite of data access classes, including
datasets inheriting from the native VCL's TDataset, for connecting directly
to the InterBase API. Database and transaction components were new base
classes that mimicked the native Delphi TDatabase in functionality.</font></font>
<p><font face="Verdana"><font size=-1>It was an Open Source initiative
that carried the goodwill of the community and a free exchange of participation
through newsgroups and an email list server.</font></font>
<p><a NAME="ibx_inprise"></a><font face="Verdana"><font size=-1>3.1.1 IBX
and Borland/Inprise</font></font>
<p><font face="Verdana"><font size=-1>Borland/Inprise owned InterBase for
many years and has shipped it on the distribution CDs, with a developer
license, to install with the high-end editions of Delphi and BCB. Before
Delphi 5, Delphi versions had "lip-service" support for InterBase, in the
form of the TIBEventAlerter component, which was designed to give applications
the capability to respond to database EVENTs defined in the server.</font></font>
<p><font face="Verdana"><font size=-1>Towards the end of 1998, with Delphi
5 on the drawing board, Borland/Inprise decided to license the rights to
the FreeIB suite's data access classes and develop them to ship as components
of the new version's VCL. The somewhat transformed FreeIB became part of the
"Kinobi" project for InterBase 6. The developer was Ravi Kumar. A beta
of the components, renamed InterBase Express, shipped with Delphi 5 in
the Fall of 1999.</font></font>
<p><font face="Verdana"><font size=-1>Development and beta testing continued
until early in December, when unexpected events shut down the Kinobi project
and left InterBase 6 in suspension for nearly two months and, along with
it, plans to complete IBX.</font></font>
<p><font face="Verdana"><font size=-1>Development resumed with both InterBase
and IBX in passage of ownership between Borland/Inprise and the new InterBase
Corporation. Ravi moved to other duties in Borland R &amp; D. IBX development
was taken up by a Team B community support member, Jeff Overcash.</font></font>
<p>
<font face="Verdana"><font size=-1>At the time this article was originally prepared, Jeff ha released two
updates for the beta and announced his intention to aim for six-weekly
updates. The article originally referred to the most recent, which was Beta 4.1.</font></font>

<p><font face="Verdana"><font size=-1>It should be noted that IBX is still
work-in-progress. Where missing or incomplete functionality was observed,
effort was been made to indicate whether or when it would be addressed.
<P>
Now, several months on (February 2001), IBX has reached its Beta 4.52 release and has acquired a body of informed users who help out in the &quot;interbaseexpress newsgroup on the Borland forums.  One of these users (who prefers not to be named) has kindly provided some comments on updates and enhancements during the period.  These comments are shown here <font color="mediumblue">in blue text<font color="black">.</font></font>
<p><a NAME="ibx_conn"></a><b><font face="Verdana"><font size=-1>3.2 How
IBX Implements the Connectivity with InterBase</font></font></b>
<p><a NAME="ibx_database"></a><font face="Verdana"><font size=-1>3.2.1
TIBDatabase and TIBTransaction Replace TDatabase</font></font>
<p><font face="Verdana"><font size=-1>TCustomConnection is the foundation
of the native Delphi VCL's architecture for managing datasets. The native
Delphi (BDE) TDatabase inherits from TCustomConnection and encapsulates
a one-transaction connection to a database. IBX also inherits its TIBDatabase
from TCustomConnection, but exposes new properties for multiple transaction
contexts.</font></font>
<p><font face="Verdana"><font size=-1>The TIBDatabase must be associated
with at least one TIBTransaction in order for a database connection to
occur. Thus IBX supports multiple transactions per connection and the involvement
of multiple databases within a single transaction.</font></font>
<p><font face="Verdana"><font size=-1>IBX can support an implicit transaction
that is started when the first dataset is placed in Edit mode. The transaction
is ended when the same dataset commits or rolls back changes. The dataset
will close and, with it, all datasets in the same transaction context.</font></font>
<p><font face="Verdana"><font size=-1>If the database grants only restricted
privileges to certain users, it will be necessary to write code to pre-empt
the default implicit transaction being autostarted when the first dataset
opens, because it triggers a Prepare on all datasets, including those to
which some users have restricted privileges. This typically raises security
exceptions whenever those users open a form.
<P><font color="mediumblue">UPDATE :: In IBX 4.5 and higher, this is no longer true.  There is a LiveMode property to indicate user rights, and exceptions are only raised if you attempt to do something which is outside of user rights.  The handling of access privileges is now much more intelligent.<P>
TIBDatabase now has an AllowStreamedConnected property which allows the programmer to keep the database Active at design time, but not have it stream in as Active at runtime.
<font color="black">
</font></font>
<p><font face="Verdana"><font size=-1>To users reporting unexpected behavior
from IBX implicit transactions, Jeff Overcash recommends always explicitly
starting and committing all transactions.
<P>
<font color="mediumblue">
TIBTransaction has an array property, Databases[], to store references to each individual TIBDatabases. The methods AddDatabase and RemoveDatabase[s] are available for assigning and releasing connections. A DatabaseCount property and a FindDatabase method are provided for use with this property.
<font color="black"></font></font>
<p><a NAME="ibx_2pc"></a><font face="Verdana"><font size=-1>3.2.2 (a) Two-Phase
Commit</font></font>
<p><font face="Verdana"><font size=-1>No information available.
</font></font>
<p><a NAME="ibx_blr"></a><font face="Verdana"><font size=-1>3.2.2 (b) BLR</font></font>
<p><font face="Verdana"><font size=-1>Not supported.</font></font>
<p><a NAME="ibx_dsql"></a><font face="Verdana"><font size=-1>3.2.3 Dynamic
SQL</font></font>
<p><a NAME="ibx_dscomp"></a><font face="Verdana"><font size=-1>(a) Dataset
components</font></font>
<p><font face="Verdana"><font size=-1>IBX inherits <b>TIBCustomDataset</b>
from TDataset, adding properties to fetch and handle sets of data from
InterBase databases. It spawns four descendants to implement specific behaviors:</font></font>
<p><font face="Verdana"><font size=-1><b>TIBDataset</b> executes SQL statements
and returns a buffered, scrollable dataset. It has properties to access
a TIBSQL object, a high-performance class for executing DDL and dynamic
SQL statements as well as some DML that is unavailable through the BDE
components.
<P>
<font color="mediumblue">
All IBX dataset subclasses have a LiveMode property to indicate table access rights.  A special exception is used if the application attempts to do something outside of the user's GRANTed privileges.<font color="black">
</font></font>
<p><font face="Verdana"><font size=-1>TIBDataset itself has separate SQL
properties for selecting, refreshing, inserting, modifying and deleting.
It encapsulates each of these properties in its own TIBSQL for direct run-time
access to the underlying tables, achieving the effect of making a read-only
dataset behave as if it were updatable. It is the general-use SQL component
to populate UI controls for editing and searching. Cached updates are available.</font></font>
<p><font face="Verdana"><font size=-1><b>TIBTable</b> fetches all columns, all rows on a database table or view, emulating the
"fat client" approach of programming desktop databases with the native
Delphi TTable. Record subselection is by in-memory filtering or through
views. Column subselection can be achieved only through views or through
the properties and methods of the GUI controls. Cached updates are available.</font></font>
<p><font face="Verdana"><font size=-1>Although a TTable emulation component
seems unnecessary and undesirable for implementing the interface to a server
database, it can be presumed that its inclusion is intended to simplify
a desktop-to-client/server conversion for the programmer, allowing a two-stage
transition from TTable to TIBQuery or another TIBCustomDataset class. Jeff
Overcash recommends dropping the TIBTable component right now because it
is much slower than the other datasets and has some intrinsic problems.</font></font>
<p><font face="Verdana"><font size=-1><b>TIBQuery</b> emulates the native
Delphi TQuery. It can be supported by a TIBUpdateSQL, for assigning SQL
to update the underlying tables of read-only data sets. Cached updates
are available. TIBQuery can be used for any SELECT query, including "selectable"
stored procedures and views, with or without input parameters.</font></font>
<p><font face="Verdana"><font size=-1><b>TIBStoredProc</b> is for connecting
to stored procedures which do not return data sets. Its Params property
accepts input arguments. When execution completes, any values returned
will replace the input arguments in Params.</font></font>
<p><a NAME="ibx_select"></a><font face="Verdana"><font size=-1>(b) Selecting
Sets of Data</font></font>
<p><font face="Verdana"><font size=-1>TIBDataset and TIBQuery present a
comprehensive range of InterBase's capabilities for returning sets of data
through SQL. <font color="mediumblue">The TIBSQL class is available to execute an SQL statement with minimal overhead.  It has no standard interface to data-aware controls and is unidirectional.<font color="black"></font></font>
<p><font face="Verdana"><font size=-1>Because more than one database can
be involved in a single transaction context, access to datasets across
database boundaries is possible. IBX does not implement any facility for
client-side indexing of datasets, however, so that sorts, unions or joins
across database boundaries in some useful sort order may still be impracticable.
The Help text recommends using TClientDataset for datasets involving distributed
queries. (IBX does not require a specialized version of TClientDataset.)</font></font>
<p><font face="Verdana"><font size=-1>IBX does not support the use of double-quoted
keywords as column names in query strings, e.g. SELECT BEGINNING, MIDDLE,
"END" FROM MYTABLE. Support in the dataset editor for double-quoting symbols
is dysfunctional and should be avoided until it is fixed in a future release.
<P><font color="mediumblue">UPDATE :: This bug has since been fixed. <font color="black"></font></font>
<p><font face="Verdana"><font size=-1>Dialect 3 case-sensitivity of table
and column names appears to be unsupported.</font></font>
<p><a NAME="ibx_dml"></a><font face="Verdana"><font size=-1>(c) Updating,
Inserting and Deleting</font></font>
<p><font face="Verdana"><font size=-1>The IBX components offer a range
of options for editing data sets.</font></font>
<p><font face="Verdana"><font size=-1>Insert, Append, Update and Delete
methods are provided for use with TIBTable, which connects to tables and
views. 
<P><font color="mediumblue">
TIBTable, TIBQuery, and TIBDataset support the standard TDataset methods for modifying data: Insert, Append, and the like.  TIBTable will generate SQL at runtime to do INSERTs, UPDATEs, and DELETEs.  SQL must be provided either at design time or in code at runtime for TIBDataset and TIBQuery.  TIBDataset has TIBSQL components built-in for these statements, whereas TIBQuery must be paired with a TIBUpdateSQL component to produce a 'live' dataset.  A design-time editor similar to the one supplied with Delphi's ADOExpress components is supplied for generating and editing the required SQL statements.
<font color="black">
</font></font>
<p><font face="Verdana"><font size=-1>Inserts are achieved by appending
rows to the buffer. The effect is that the user will not see inserted rows
except by scrolling to the end of the dataset, even if the dataset is committed
using COMMITRETAINING (q.v.).</font></font>
<p><font face="Verdana"><font size=-1>Because of the underlying memory
model for storing rows on the client side, insert-in-place cannot be feasibly
implemented. A complex, new memory model is planned to fix this in the
forthcoming months. It is proposed to incorporate the testing of work-in-progress
into the Delphi 6/Kylix beta program. Upgrades will be publicly released.
Beta versions may be available.</font></font>
<p><font face="Verdana"><font size=-1>The recommended workaround for now
is to tie the IBX dataset to a TClientDataset.</font></font>
<p><font face="Verdana"><font size=-1>Cached updates are available to TIBTable,
TIBDataset and TIBQuery. IBX handles cached updates internally and does
not require the BDE for any operations. IBX follows the TUpdateSQL practice
of clearing the cache after updates have been applied.</font></font>
<p><font face="Verdana"><font size=-1>TIBQuery Params containing the InterBase
6.x INT64 data type will return errors because the TDataset's Params property uses the Windows variant type, which does not support it. Jeff Overcash recommends using the TIBDataset for
all DML when using IBX with Delphi 5.</font></font>
<p><a NAME="ibx_refresh"></a><font face="Verdana"><font size=-1>(d) Refreshing
Sets</font></font>
<p><font face="Verdana"><font size=-1>IBX follows the TDataset model for
refreshing datasets. <font color="mediumblue"> 

All IBX datasets support the TDataset.Refresh method, but, unlike the BDE implementation, Refresh in IBX refreshes only the current row.  To refresh the entire dataset, one should Close and re-Open the dataset.
<font color="black"><P>
A SelectSQL property for setting SQL at run-time to restrict the rows returned is the preferred way to implement filtering with IBX.</font></font>
<p><font face="Verdana"><font size=-1>The datasets do not implement any behavior to return the buffer cursor to the &quot;current&quot; row after Refresh, Commit, Rollback or CommitRetaining.</font></font>
<p><font face="Verdana"><font size=-1>IBX also supports the new InterBase
6.0 ROLLBACKRETAINING to do "soft rollbacks".</font></font>

<p><a NAME="ibx_linking"></a><font face="Verdana"><font size=-1>(e) Linking
Sets</font></font>
<p><font face="Verdana"><font size=-1>For TIBTable, you have the same options
for master-detail relationships as with the BDE components.</font></font>
<p><font face="Verdana"><font size=-1>For the other datasets, the BDE's
familiar "follow-the-master" behavior by setting the Datasource property
in the detail set is not implemented in the code - it is necessary to close
the dataset, set the new parameters and requery the server for the next
detail subset. <BR>
<font color="mediumblue">UPDATE :: IBX now fully implements the behaviour of TDataset's Datasource property.<font color="black"></font></font>
<p><a NAME="ibx_params"></a><font face="Verdana"><font size=-1>(f) Parameters</font></font>
<p><font face="Verdana"><font size=-1>For Dialect 1 databases,IBX follows
the same rules as the BDE access components with regard to setting parameters.
Existing code that uses ParamByName or Params[n] for WHERE clauses will
work for Dialect 1.</font></font>
<p><font face="Verdana"><font size=-1>For applications that are to be moved
over to use the InterBase 6.x 64-bit integer, TQueries should be replaced by TIBDataset in the Delphi 5 version of IBX, rather than by TIBQuery, to avoid the problem TIBQuery has with this datatype..</font></font>
<p><font face="Verdana"><font size=-1>Note, however, that the intention
is for TIBSQL and TIBDataset to use the IBSQLVAR and IBXSQLDA data type
structures to support IB 6.0 data types for parameters.</font></font>
<p><font face="Verdana"><font size=-1>The main drawbacks to these two data
type structures is that they are not currently supported in the IDE integration
and they do not follow the TParams calling convention. Both of these limitations
will be addressed in future updates.</font></font>
<p><a NAME="ibx_sprocs"></a><font face="Verdana"><font size=-1>(g) Stored
Procedures</font></font>
<p><font face="Verdana"><font size=-1>For Dialect 1 databases, IBX fully
emulates BDE functionality for stored procedures in TIBStoredProc, with
the limitations described above with respect to the Dialect 3 datatypes.
SPs which take or return arguments that are Int64 or any of the other new
data types should be avoided until support becomes available in a future
upgrade.</font></font>
<p><a NAME="ibx_mon"></a><font face="Verdana"><font size=-1>(h) Monitoring</font></font>
<p><font face="Verdana"><font size=-1>TIBSQLMonitor component works in
concert with the TIBDatabase and TIBTransaction components to trace various
dynamic SQL operations during tuning and debugging. It has a public OnSQL
event for handling the monitor's output.</font></font>
<p><a NAME="ibx_client"></a><font face="Verdana"><font size=-1>3.2.4 Client
Considerations</font></font>
<p><a NAME="ibx_sess"></a><font face="Verdana"><font size=-1>(a) Sessions
and Multi-threaded Transactions</font></font>
<p><font face="Verdana"><font size=-1>IBX does not implement a class equivalent
to the native Delphi VCL's TSession to isolate multiple instances of a shared library module.</font></font>
<p><a NAME="ibx_props"></a><font face="Verdana"><font size=-1>(b) Data
Field Properties</font></font>
<p><font face="Verdana"><font size=-1>A TIBBCDField is available to emulate
TBCDField and replace the BCD internals that the field type would otherwise
pick up from the 'BCD' setting in the BDE driver.</font></font>
<p><font face="Verdana"><font size=-1>A TIBBlobStream is implemented for
reading and writing blobs. Maximum size of a Blob read in from a text file
appears to be 60Kb.<br>
<font color="mediumblue">This problem was corrected in a subsequent version. <font color="black"></font></font>
<p><font face="Verdana"><font size=-1>IBX adds no IB-specific client side
attributes at field level for capturing or encapsulating special InterBase
datatype characteristics or to generalize the treatment of domains. <br>
<font color="mediumblue">
As of IBX 4.4, generators can be handled by a GeneratorFields property, to which are applied the name of the column, the generator name and the increment value.  It is necessary to nominate whether the generator is fetched into the client (OnNewRecord or BeforePost) or left to be populated by a trigger on the server.<font face="black">
</font></font>
<p><font face="Verdana"><font size=-1>InterBase Array columns are not supported.</font></font>
<p><a NAME="ibx_methods"></a><font face="Verdana"><font size=-1>(c) Methods
and Program Events</font></font>
<p><font face="Verdana"><font size=-1>The IBX implementation deprecates
the BDE's implicit transaction control to the extent that it may be impracticable
for applications which utilize InterBase user privileges. 
<br><font color="mediumblue">With the introduction of the LiveMode property, user privileges are no longer an issue;  but implicit transactions are not recommended at present for other reasons.<font color="black">
<br>New methods have
been added to the data access components to facilitate explicit transaction
control and to support multiple database connections and multiple concurrent
transactions.</font></font>
<p><font face="Verdana"><font size=-1>Inspection of the source code and
help file tends to confirm that many methods, both public and private,
are work-in-progress or awaiting implementation.</font></font>
<p><a NAME="ibx_events"></a><font face="Verdana"><font size=-1>(d) InterBase
Events</font></font>
<p><font face="Verdana"><font size=-1>The TIBEvents component replaces
TIBEventAlerter from earlier Delphi versions, for registering interest
in and responding to InterBase EVENTs. Up to 15 events can be included;
events can be registered and unregistered during run-time. The QueueEvents
property switches the client into and out of EVENT WAIT condition, to start
or stop listening for an event.  Currently, it is still a developer's
task to code the synchronization of events passed back from different threads.
<p><font color="mediumblue">UPDATE :: The TIBEvents component has been completely replaced.  There is no longer a limit on the number of events which can be registered, nor a limitation on sharing connections.  The QueueEvents property no longer exists.  A standard inteface has been added to TIBDatabase to facilitate writing replacement event components, if desired.  The component runs in its own thread (or threads -- multiple threads may be necessary to get around the limit on the number of events in an IB events block), but synchronization is provided by the component.<font color="black">

<p><a NAME="ibx_search"></a><font face="Verdana"><font size=-1>(e) Searching</font></font>
<p><font face="Verdana"><font size=-1>Datasets inherit TDataset's Locate
method and LocateOptions.</font></font>
<p><font face="Verdana"><font size=-1>Buffering of TIBQuery and TIBDataset
can be bi-directional. Only TIBTable has buffers for primary keys.</font></font>
<p><font face="Verdana"><font size=-1>Wildcard searching is not supported.</font></font>
<p><a NAME="ibx_nav"></a><font face="Verdana"><font size=-1>(f) Dataset
Navigation</font></font>
<p><font face="Verdana"><font size=-1>IBX data set components support the
native Delphi 5 TDBNavigator; same capabilities and restrictions with navigation
methods (Locate, Findkey, etc.) as for any TDataset object. No InterBase-specific
navigation facilities have been added; but the TIBSQL object will be useful
when writing handler code to do quick singleton selects to examine a table
for existence of a specific row.</font></font>
<p><a NAME="ibx_buf"></a><font face="Verdana"><font size=-1>(g) Dataset
Buffering</font></font>
<p><font face="Verdana"><font size=-1>TIBCustomDataset returns a buffer
cache with a default size of 1000 rows, which descendants and event handlers
can override via the BufferChunks property.</font></font>
<p><font face="Verdana"><font size=-1>The RefreshSQL property of TIBDataset
and TIBUpdateSql <font color="mediumblue">is for refreshing the current row only, e.g., after a Post, to get changes from triggers on the server.  To change the sort order, you would modify TIBDataset.SelectSQL or TIBQuery.SQL.<font color="black"></font></font>
<p><font face="Verdana"><font size=-1>Buffering does not suppress whitespace
in the in-memory buffers, which will have performance implications where
datasets contain large varchars that typically store small actual data.</font></font>
<p><font face="Verdana"><font size=-1>IBX buffering appends inserted rows
to the end of datasets.</font></font>
<p><a NAME="ibx_filter"></a><font face="Verdana"><font size=-1>(h) Filtering</font></font>
<p><font face="Verdana"><font size=-1>In-memory filtering is not supported
except in TIBTable, where FilterOptions for case insensitivity and partial
matches are not implemented. Integration of the filtered set with the FindFirst,
FindNext, FindPrior and FindLast methods has not been implemented.</font></font>
<p><font face="Verdana"><font size=-1>Filtering will need to be done through
event handler code <font color="mediumblue">on the OnFilterRecord event, although changing the SQL, via the SelectSQL property, is recommended.<font color="black"> The Filtered and Filter 
properties are available to the other datasets and the code will compile.
Attempts to invoke them at run-time trigger a ShowMessage dialog 'This
feature is not supported'.</font></font>
<p><a NAME="ibx_cursor"></a><font face="Verdana"><font size=-1>(i) Dataset
Cursors</font></font>
<p><font face="Verdana"><font size=-1>Bidirectional cursoring is possible
with TIBDataset, <font color="mediumblue">TIBTable<font color="black"> and TIBQuery.</font></font>
<p><a NAME="ibx_idx"></a><font face="Verdana"><font size=-1>(j) Using Indexes
in Buffers</font></font>
<p><font face="Verdana"><font size=-1>Supported in TIBTable only.</font></font>
<p><a NAME="ibx_propeds"></a><font face="Verdana"><font size=-1>3.2.5 Property
Editors</font></font>
<p><a NAME="ibx_treatprops"></a><font face="Verdana"><font size=-1>(a)
Treatment of properties</font></font>
<p><font face="Verdana"><font size=-1>IBX adds a simple SQL Wizard to the
TIBQueryIBX adds a simple SQL Wizard to the TIBQuery, <font color="mediumblue">TIBDataset<font color="black"> and TIBSQL.
<font color="mediumblue">TIBQuery and TIBDataset also feature a dialog to generate the SQL necessary for the RefreshSQL, UpdateSQL, InsertSQL, and DeleteSQL properties, identical to the dialog used in ADOExpress.<font color="black"> There is a nice Stringlist editor for maintaining the Events
list in the TIBEvents component and additional design-time property editors
to integrate with the Delphi 5/BCB 5 Data Module Designer. It has component
editors for the IBDatabase and IBTransaction components, to simplify setting
up connection strings and transaction isolation level.<br>
<font color="mediumblue">There is also a property editor for the new GeneratorFields property.<font color="black"></font></font>
<p><a NAME="ibx_runtime"></a><font face="Verdana"><font size=-1>(b) Run-time
Access</font></font>
<p><font face="Verdana"><font size=-1>Most new, InterBase-specific features
are surfaced in the data access objects as writeable properties. Client
event handling through introduced published events is adequate for most
needs.</font></font>
<p><a NAME="ibx_encap"></a><font face="Verdana"><font size=-1>(c) Encapsulated
behavior</font></font>
<p><font face="Verdana"><font size=-1>IBX adds behaviour to enable handling
of multiple transactions, multiple connections, transaction isolation/concurrency
and commit options. There do not appear to be any classes, internal code
or surfaced properties to support multi-threading of transactions or ISAPI-style
isolation.</font></font>
<p><a NAME="ibx_controls"></a><b><font face="Verdana"><font size=-1>3.3
Controls</font></font></b>
<p><font face="Verdana"><font size=-1>IBX dataset components work with
all native Delphi 5 data-aware controls and the Infopower(TM) controls.
No InterBase-specific controls have been added.</font></font>
<p><a NAME="ibx_perf"></a><b><font face="Verdana"><font size=-1>3.4 Performance
(IBX vs BDE)</font></font></b>
<p><font face="Verdana"><font size=-1>At present, no results are available
for tests involving production-quality data in networked environments or
involving any of the processes that would be typical of a production-capable
client application.</font></font>
<p><font face="Verdana"><font size=-1>The following results were produced
from a performance bench originally written by Ravi Kumar to compare the
"raw" performance of IBX and the BDE. It ran over tables of 50,000 records,
each having two or three columns.</font></font>
<p><font face="Verdana"><font size=-1>The most dramatic advantage was on
query inserts - IBQuery 720%, IBDataset 1000%, IBSQL 2100% speed improvement.</font></font>
<p><font face="Verdana"><font size=-1>Open/close table 10 times: Queries
23% faster, IBTable 2.25 times slower than TTable.</font></font>
<p><font face="Verdana"><font size=-1>Table scans, 50,000 rows:</font></font>
<p><font face="Verdana"><font size=-1>First to last, natural scan: IBQuery
and IBDataset 33% faster, IBSQL 53% faster; IBTable 24% faster than TTable.</font></font>
<p><font face="Verdana"><font size=-1>First to last, indexed scan: IBQuery
and IBDataset 43% faster, IBSQL 60% faster; IBTable 49% faster than TTable.</font></font>
<p><font face="Verdana"><font size=-1>Last to first, natural scan: queries
23% faster, tables 14% faster.</font></font>
<p><font face="Verdana"><font size=-1>Last to first, indexed table: queries
24% faster, tables 39% faster.</font></font>
<p><font face="Verdana"><font size=-1>IBX compared poorly on table locates
- IBTable was 9 times slower than BDE, doing slightly worse on indexed
locates than unindexed.</font></font>
<p><font face="Verdana"><font size=-1>IBTable indexed random edit was 12%
slower than either a BDE indexed random edit or an IBX unindexed random
edit.</font></font>
<p><font face="Verdana"><font size=-1>IBTable insert nearly three times
slower than TTable.</font></font>
<p><font face="Verdana"><font size=-1>IBX was three times faster executing
a Stored Procedure.</font></font>
<p><font face="Verdana"><font size=-1>It was eight times faster on Blob
select and 12 times faster on Blob Insert.</font></font>
<p><a NAME="ibx_convert"></a><b><font face="Verdana"><font size=-1>3.5
Converting a BDE Application to IBX</font></font></b>
<p><font face="Verdana"><font size=-1>3.5.1 Converting a BDE-based client/server
application may be a painstaking transition. Jeff Overcash reported that
it took him and John Kaster (Inprise Developer Relations, <font color="mediumblue">now Borland Developer Relations<font color="black">) 10 days to recode
the Code Central application in IBX.</font></font>
<p><font face="Verdana"><font size=-1>A good understanding of working with
transactions is necessary, as dependency on implicit transaction handling
will be a significant area of rework. The BDE's TDatabase shields the developer
from physical transaction issues. IBX implements a less sophisticated architecture
which requires explicit attention to coding details formerly hidden by
TDatabase.</font></font>
<p><font face="Verdana"><font size=-1>Substantial reworking will be required
if the existing application used live queries or TTables, because of transaction
issues and virtual ancestor methods which have not been implemented or
have been implemented only partly.</font></font>
<p><font face="Verdana"><font size=-1>The use of TClientDataset, linked
to a TIB dataset as provider, has been widely recommended as a means to
recoup some of the deprecated functionality or to solve problems related
to unfinished functionality.</font></font>
<p><font face="Verdana"><font size=-1>Controls should work; there will
be some unexpected behavior in grids which will require extra code to restore
to normal; existing filters will need to be reworked (see below).</font></font>
<p><font face="Verdana"><font size=-1>3.5.2 BDE apps that relied on TTables
will be painful to convert. Performance will be disappointing. Their use
is not recommended.</font></font>
<p><font face="Verdana"><font size=-1>3.5.3 Applications that used filtering
and/or SetRange will require substantial extra work. TIBTable filtering
does not implement FilterOptions nor integrate with the FindFirst, FindNext,
FindPrior and FindLast methods of filtered sets. Other datasets do not
support in-memory filtering except through requerying the database. IBX replaces it with IBSQL objects,
exposed as SelectSQL in IBDataset and through a TIBUPdateSQL for TIBQuery.
These objects will require run-time handlers in order to parse filter parameter
inputs and apply the SelectSQL.</font></font>
<p><font face="Verdana"><font size=-1>3.5.4 Implementation in the IDE and
naming standards for new attributes and methods are generally consistent
with those to which users of the native data access components are accustomed.</font></font>
<p><font face="Verdana"><font size=-1>3.5.5 On-line documentation is very
sparse, with inaccuracies and gaps, possibly occurring because of changes
since the help was written. <font color="mediumblue">Help has been improved since the paper was written. <font color="black"> A set of conversion guidelines appears to be
urgently needed to highlight the "gotchas" of conversion. The changes required
for implementing a database connection are not immediately obvious, for
example. Users of the components may get some help from the Developer's
Guide included in the beta documentation for IB 6.x.</font></font>
<p><font face="Verdana"><font size=-1>3.5.6 The supplied demo application
is viewed as a very poor sample of client/server and multi-user programming
and does not use the client/server capabilities of the components at all.
Bugs have been reported. Jeff Overcash has promised new demo applications.<br>
<font color="mediumblue">Jeff has a couple of demo applications available on his page on CodeCentral (http://codecentral.borland.com/codecentral/ccweb.exe/author?authorid=102)<font color="black"></font></font>
<p><font face="Verdana"><font size=-1>3.5.7 Developers who approach the
conversion to IBX simultaneously with scaling up to InterBase from a desktop
database can expect to encounter a lot of problems if they do not first
get fully in touch with the significant differences between the desktop
and client/server application models. An interim transition via TIBTable
will probably be more useful in this situation, to help them up the learning
curve; but developers should not hold their breath for a dramatic improvement
in performance!</font></font>
<p><a NAME="ibx_sig"></a><b><font face="Verdana"><font size=-1>3.6 Significant
Features</font></font></b>
<p><font face="Verdana"><font size=-1>3.6.1. The IBX dataset classes are
founded on the native Delphi TDataset, maintaining compatibility with native
and third-party data-aware controls.</font></font>
<p><a NAME="ibx_lic"></a><b><font face="Verdana"><font size=-1>3.7 Licensing</font></font></b>
<p><font face="Verdana"><font size=-1>Borland owns IBX. Source code for the beta version is freely available under the
terms of the InterBase Public License. No deployment licensing applies.</font></font>
<p><a NAME="ibx_vers"></a><b><font face="Verdana"><font size=-1>3.8 Version
Support</font></font></b>
<p><font face="Verdana"><font size=-1>At time of writing (4 July 2000)
the current IBX version was Beta release 4.1 of 5 May 2000.<br>
<font color="mediumblue">The version current February/March 2001 is 4.51 and shipped with Delphi 6 for Linux.  Upgrades can be downloaded from Jeff Overcash's download page at <a href="http://community.borland.com/">CodeCentral</a>.  (Registration and login required). <font color="black"></font></font>
<p><font face="Verdana"><font size=-1>IBX data access components are for
use with</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>Delphi 5 and higher (Professional and
Enterprise versions only)</font></font></li>

<li>
<font face="Verdana"><font size=-1>Borland C++ Builder 5 and higher (Professional
and Enterprise versions)</font></font></li>

<li>
<font face="Verdana"><font size=-1>InterBase versions 5.x and higher.</font></font></li>

<li>
<font face="Verdana"><font size=-1>The Services components (not discussed
here) support only the InterBase 6 Services API.</font></font></li>
</ul>
<a NAME="ibx_clx"></a><b><font face="Verdana"><font size=-1>3.9 Delphi
for Linux (CLX components)</font></font></b>
<p><font face="Verdana"><font size=-1>Not known.</font></font>
<p><i><font face="Verdana"><font size=-1><a href="#contents">Contents</a></font></font></i>
<p><a NAME="ibo"></a><b><font face="Verdana">4. InterBase Objects</font></b>
<p><a NAME="ibo_bg"></a><b><font face="Verdana"><font size=-1>4.1 Background</font></font></b>
<p><font face="Verdana"><font size=-1>Jason Wharton, author of InterBase
Objects, discovered InterBase in the course of an exploration of client/server
database products for a huge Point-of-Sale system. Against his recommendation
for InterBase, the company chose MSSQL Server 6.5. Jason sought out an
employer which used InterBase and Delphi and moved on.</font></font>
<p><a NAME="ibo_the_native"></a><font face="Verdana"><font size=-1>4.1.1
TIB_ - the Native IBO Components</font></font>
<p><font face="Verdana"><font size=-1>Not long after the release of Delphi
2, Jason discovered that the best capabilities of InterBase were virtually
inaccessible to the RAD developer because of the constraints imposed by
the BDE. In 1996 he determined to start his own suite of components and
data-aware GUI controls to bypass the BDE and work directly with the InterBase
API. He chose to develop a data access hierarchy that was independent of
the TDataset and the standard Delphi data-aware visual controls, thus affording
himself the opportunity to design a library of components and visual controls
specifically for the client/server architecture, which could be fully customized
through succeeding releases of InterBase.</font></font>
<p><a NAME="ibo_the_tdataset"></a><font face="Verdana"><font size=-1>4.1.2
TDataset-Based Components</font></font>
<p><font face="Verdana"><font size=-1>Once Delphi 3 came out with the new
TDataset virtual class, Jason was able to embrace the best of both worlds.
He put a thin layer around his IB Objects-native dataset and brought a
BDE-free InterBase TDataset-compatible component suite to life.</font></font>
<p><font face="Verdana"><font size=-1>At that point, he was faced with
deciding whether to continue making components based on his IBO datasets,
already quite advanced, or to turn his focus to the new TDataset opportunity.
Seeing that both would be relevant to a variety of development requirements,
he decided to continue developing both strains of components. Today, IB
Objects offers the developer both the simpler TIBO (TDataset) strain and
the richer, more encompassing TIB_Dataset architecture.</font></font>
<p><font face="Verdana"><font size=-1>When the simplest IBO TDataset descendant
went into production in Gimbal's Marathon 1.1, it was cynically assumed
by some that the final target had been met. However, after two years' more
growth, the TIBO strain today covers the TDataset niche handsomely, includes
custom classes to enable developers to make their own descendant classes
and sits on top of a stable architecture, well-tested in heavyweight commercial
environments.</font></font>
<p><a NAME="ibo_inprise"></a><font face="Verdana"><font size=-1>4.1.3 IB
Objects and Inprise</font></font>
<p><font face="Verdana"><font size=-1>At times people have wanted Inprise
to acquire IBO. Negotiations were tinkered with, off and on, but Jason
was concerned that a corporate development environment could inhibit the
growth he envisaged for the components and lead to shortcuts and deficiencies
in the product. He has continued to progress IBO under his own auspices,
to keep the development in touch with and responsive to his developer community.</font></font>
<p><a NAME="ibo_community"></a><font face="Verdana"><font size=-1>4.1.4
Community Involvement and Support</font></font>
<p><font face="Verdana"><font size=-1>During more than three years of development
and three (soon to be four) full production releases, IBO source code has
been open to its user community. The result is huge user involvement in
its evolution and a panel of supporting coders who know the code just about
as well as its author does. Daily support for both commercial and "free"
users (see the <a href="#ibo_lic">Licensing topic</a>, below) is provided
by means of a fully-monitored, public list server.</font></font>
<p><a NAME="ibo_database"></a><b><font face="Verdana"><font size=-1>4.2
How IB Objects Implements the Connectivity with InterBase</font></font></b>
<p><font face="Verdana"><font size=-1>IB Objects implements the connectivity
in two distinct approaches, both available whether using the TDataset-compatible
strain or the fully native IBO components.</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>The first parallels the native BDE strategy
of TDatabase, in which a single transaction is embedded with a single connection.</font></font></li>
</ul>

<ul>
<li>
<font face="Verdana"><font size=-1>The second approach fully utilizes the
elementally-separated, native IBO architecture which supports multiple
transactions, threaded processing, two-phase commit and multiple connections.</font></font></li>
</ul>
<a NAME="ibo_tibo"></a><font face="Verdana"><font size=-1>4.2.1 The "TIBO"
Strain - The TDataset-Compatible Components</font></font>
<p><font face="Verdana"><font size=-1>IBO's set of "BDE-equivalent" components
- referred to here as the "TIBO strain" because of its class prefix - preserves
full code compatibility with controls and components that rely on the BDE's
TDataset.</font></font>
<p><font face="Verdana"><font size=-1>The TIBO components provide some
enhanced functionality inherited from the IBO native data access objects
that affects underlying behavior, enhancing performance and case insensitivity
support while retaining the exact intention of the developer's interface
code.</font></font>
<p><font face="Verdana"><font size=-1>In the BDE, the embedded transaction's
internals are hidden and cannot be accessed except through properties published
by TDatabase. However, because the <b>TIBODatabase</b> inherits its transaction
architecture from <b>TIB_Database</b>, its internal transaction is the
same <b>TIB_Transaction</b> that is used elementally by the fully-powered
TIB_ strain. Its full range of properties and methods is exposed at both
design time and run-time. It is also possible to drop down additional TIB_Transaction
components and define additional explicit transaction contexts.</font></font>
<p><font face="Verdana"><font size=-1>The TIBO strain is often used as
an aid to "soft" transition from the BDE to IB Objects. Although an eventual
full transition to the full capabilities of InterBase client development
is the course many developers wish to take, it is perfectly feasible to
use the TIBO strain as an easy replacement for the BDE in an existing application,
to enhance performance, stability and server-side capability.</font></font>
<p><font face="Verdana"><font size=-1>Developers maintaining a BDE-based
application code base designed to work with different databases can easily
generate an optimal, IBO-based version for InterBase by preparing quick
conversion templates for global search and replace of units and class names.</font></font>
<p><a NAME="ibo_native"></a><font face="Verdana"><font size=-1>4.2.2 The
"TIB-" Strain - Native IBO Components</font></font>
<p><font face="Verdana"><font size=-1>The second "full-powered" approach
removes TDataset compatibility entirely from the architecture and enables
complete implementation of the transactional, server-centric and multi-database
capabilities of InterBase.</font></font>
<p><font face="Verdana"><font size=-1>It integrates tightly with a large
suite of visual controls to facilitate rapid development and standardized
behavior for the client/server interface. See Section 4.4, Controls.</font></font>
<p><font face="Verdana"><font size=-1>Unless otherwise stated, the following
descriptions apply to both strains.</font></font>
<p><a NAME="ibo_conn"></a><font face="Verdana"><font size=-1>4.2.3 TIB_Connection
and TIB_Transaction Replace TDatabase</font></font>
<p><font face="Verdana"><font size=-1><b>TIB_Connection</b> obtains a persistent
connection to an InterBase database and wraps all of the API functions
associated with connections, as well as some some server admin functions.
It can deduce protocol from the server and path properties and automatically
update connection strings when one of these properties changes. The developer
can access any server parameters independently, through property lists,
at both design and run-time.</font></font>
<p><font face="Verdana"><font size=-1>Login support can use custom settings
for roles and user names, whether implemented with the standard login dialog
or with a custom dialog. The dialogs have properties and methods to limit
login attempts and to respond to illegal login attempts.</font></font>
<p><font face="Verdana"><font size=-1><b>TIB_Connection</b> has properties
for setting the data display and case-sensitivity attributes for domains
that will apply globally for the connection; and resolves the behaviour
of columns which the application is to treat as Boolean.</font></font>
<p><font face="Verdana"><font size=-1>It keeps a local Schema cache and
has methods for flushing and renewing it when metadata change. It can also
use an alternative file for messages.</font></font>
<p><font face="Verdana"><font size=-1>It has notification methods for a
large number of objects and processes, including the synchronization of
datasets after external DML changes.</font></font>
<p><font face="Verdana"><font size=-1>The dbHandleShared property allows
sharing a single connection with BDE based components. Thus IBO can augment
applications which need to remain BDE based, by enabling additional concurrent
transactions, including cross-database transactions, involving the connection
being used by the BDE.</font></font>
<p><font face="Verdana"><font size=-1>IBO uses a model in which a logical
transaction (unit of work) can involve zero to many physical transactions
in its context. <b>TIB_Transaction</b> provides all properties, methods
and events necessary to have very fine-grained control over the capabilities
and interactions of physical transactions.</font></font>
<p><font face="Verdana"><font size=-1>The interactions of transactions,
in the single connection context, are managed by the IB_Connection object.
The TIB_Session object allows "super-management" of the interactions of
multiple connection contexts through its own properties and methods in
conjunction with a TIB_SessionProps object.</font></font>
<p><font face="Verdana"><font size=-1>IBO automates features to monitor
and, if necessary, shut down long-running transactions according to configurations
set at both connection and transaction levels. This process is referred
to as "OAT (Oldest Active Transaction) Management".</font></font>
<p><font face="Verdana"><font size=-1><b>TIB_Database</b> (<b>TIBODatabase</b>
for a TDataset-compatible connection) emulates the model of the native
Delphi TDatabase without imposing TDatabase's restriction of limiting all
connected statements and datasets to use its own internally defined transaction.
The IBO database classes allow multiple transactions to be assigned to
their connection context.</font></font>
<p><font face="Verdana"><font size=-1>It was implemented to make BDE-to-IBO
transition simple and fast and provide an initial BDE-free application
that fully emulates the original without needing to change any application
code.</font></font>
<p><font face="Verdana"><font size=-1>The database component can be regarded
as a staging-point toward a more complete implementation of the InterBase
functionality. It is also useful for those who want to maintain a single
code base for an application across different database systems. They can
develop using the BDE to work with the other databases and use the quick
convert templates to generate an IBO-based, BDE-free version for InterBase.</font></font>
<p><a NAME="ibo_2pc"></a><font face="Verdana"><font size=-1>4.2.4 (a) Two-Phase
Commit</font></font>
<p><font face="Verdana"><font size=-1>TIB_Transaction has an array property,
Connections[], to store a reference to each individual connection. The
methods AddConnection() and RemoveConnection() are available for assigning
and releasing connections. A ConnectionCount property is provided for enumerating
the array.</font></font>
<p><font face="Verdana"><font size=-1>The component exposes three prioritized
IB_Connection properties to simplify management of the most common multi-connection
scenarios.</font></font>
<p><a NAME="ibo_blr"></a><font face="Verdana"><font size=-1>4.2.4 (b) BLR</font></font>
<p><font face="Verdana"><font size=-1>BLR can be used from an IBO client
application.</font></font>
<p><a NAME="ibo_dsql"></a><font face="Verdana"><font size=-1>4.2.5 Dynamic
SQL</font></font>
<p><a NAME="ibo_dscomp"></a><font face="Verdana"><font size=-1>(a) Dataset
components</font></font>
<p><font face="Verdana"><font size=-1>All dataset components descend from
one of two base classes - <b>TIBODataset</b> or <b>TIB_Statement</b> -
which handle all of the necessary API calls to allocate, prepare and execute
an InterBase DSQL statement. These base classes also interpret and define
memory buffers that are bound to column objects for both input and output
handling.</font></font>
<p><font face="Verdana"><font size=-1>The TIBO strain dataset classes (<b>TIBOTable</b>
and <b>TIBOQuery</b>) are TDataset descendants wrapped by an internal <b>TIB_BDataset
</b>(bi-directional
dataset). Thus, they have all of the TDataset functionality with much of
it re-implemented and enhanced by transparent calls to the properties and
methods of the internal native IBO object.</font></font>
<p><font face="Verdana"><font size=-1>TIBODataset supports the assignment
of a query plan, which can be either assigned<font color="#FF0000"> </font>in
the SQL statement or patched in during the OnPrepareSQL event<font color="#0000FF">.</font></font></font>
<p><font face="Verdana"><font size=-1>The Fields array provides pointers
to a large number of other arrays surfacing properties for setting virtually
every attribute that a column value can have in code and in the GUI, including
display masks, Boolean behavior, labels, case-insensitive and validation
masks, field trimming rules, alignment, et al.</font></font>
<p><font face="Verdana"><font size=-1>Statement-level and dataset-level
properties provide for the storing of design-time or runtime inputs to
the SQL parser routines which support the complex system of buffer and
index management underlying IBO's "smart" searching, locating, updating,
lookup and refreshing.</font></font>
<p><font face="Verdana"><font size=-1>This system causes virtually any
dataset - including sets returned from JOINs - to behave as "live" without
the addition of any handler code. Update handling for exceptional update
situations is also encapsulated and surfaced as design-time or runtime
properties, rather than requiring handler code.</font></font>
<p><font face="Verdana"><font size=-1>The <b>TIB_Dataset</b> base class
inherits from TIB_Statement and has three groups of offspring to encapsulate
queries which return rows: <b>TIB_BDataset</b> (the internal base class
for the buffered dataset classes, including <b>TIB_Query</b>), <b>TIB_Cursor</b>
(and its offspring) and <b>TIB_StoredProc</b>.</font></font>
<p><font face="Verdana"><font size=-1>The <b>TIB_DSQL</b> class, which
implements TIB_Statement directly, is used for all DSQL statements that
do not output multiple rows - "executable" stored procedures, batched updates
or inserts, performing DDL or DML statements, et al.</font></font>
<p><a NAME="ibo_select"></a><font face="Verdana"><font size=-1>(b) Selecting
Sets of Data</font></font>
<p><font face="Verdana"><font size=-1>TIBO datasets implement SetRange
and smart filtering for both queries and tables, with correct resulting
behavior in other dataset capabilities, including key-dependent methods
such as FindKey(), FindNext(), etc. and master-detail dependency.</font></font>
<p><font face="Verdana"><font size=-1>Select SQL can be very broadly defined
at design time, i.e. 'SELECT FIELD1, FIELD2, ... FROM ATABLE' because selection
and ordering criteria can be defined with very fine granularity in other
design/runtime properties. Although exact criteria definition through the
SQL string alone, or with Delphi parameters, is available, use of the extra
properties causes the parsing engine to make best use of its server and
I/O optimization capabilities.</font></font>
<p><a NAME="ibo_dml"></a><font face="Verdana"><font size=-1>(c) Updating,
Inserting
and Deleting</font></font>
<p><font face="Verdana"><font size=-1>LIVE DATASETS</font></font>
<br><font face="Verdana"><font size=-1>Most datasets (incl. many JOINed
sets) can be live; custom update SQL is rarely needed but can be entered
through the GUI of the dataset editor for any operation.</font></font>
<p><font face="Verdana"><font size=-1>INSERTING</font></font>
<br><font face="Verdana"><font size=-1>IBO datasets improve on the TQuery's
behavior of "losing" inserted rows from the buffer which requires a refresh
of the dataset for each insert performed, at considerable cost to performance.</font></font>
<p><font face="Verdana"><font size=-1>With IBO's TIB_Dataset components
(both queries and tables) the inserted row remains in the buffer where
inserted. It is internally flagged to avoid messing up other algorithms
whose behaviors depend on an assumed row ordering.</font></font>
<p><font face="Verdana"><font size=-1>CACHED UPDATES</font></font>
<br><font face="Verdana"><font size=-1>IBO cached updates do not use separate
buffers for caching changes. Caching is handled natively in the dataset
buffer caches. The cache remains available after the dataset is closed,
refreshed, sorted, etc.</font></font>
<p><font face="Verdana"><font size=-1>Updates can be applied to the database
at any level from a single row through to multiple datasets.</font></font>
<p><a NAME="ibo_refresh"></a><font face="Verdana"><font size=-1>(d) Refreshing
Sets</font></font>
<p><font face="Verdana"><font size=-1>Under the BDE, TDataset.Refresh method
is not implemented for TQuery. IBO introduces implementations to refresh
both tables and queries, with options to determine the state and cursor
position after the refresh.</font></font>
<p><a NAME="ibo_bookmark"></a><font face="Verdana"><font size=-1>BOOKMARKS</font></font>
<br><font face="Verdana"><font size=-1>The Bookmark property of TDataset
and its descendants is an arbitrary string that identifies a record in
a specific dataset and becomes unreliable once the dataset is closed. For
the same reasons, it cannot be used to synchronize with another dataset
that returns the same data. Code and variables must be implemented to overcome
these limitations.</font></font>
<p><font face="Verdana"><font size=-1>IBO implements a Bookmark that can
be configured for format and content. Meaningful data, such as a primary
key column, can thus be stored as persistent bookmarks which can be applied
to other datasets using the same keys, or broadcast so that other datasets
can respond to them and synchronize their buffers when changes are posted.</font></font>
<p><font face="Verdana"><font size=-1>This buffer synchronization can be
scoped to datasets within the same transaction context, those in other
transaction contexts within the same connection context or to datasets
in the applications of other users currently logged into the same database.</font></font>
<p><a NAME="ibo_linking"></a><font face="Verdana"><font size=-1>(e) Linking
Sets</font></font>
<p><font face="Verdana"><font size=-1>Every dataset has a KeyLinks property
which defines a column or column list by which a row is distinct (unique).
If it is not defined explicitly, IBO will attempt to identify it automatically
from the local schema cache data. Keylinks are loaded into buffers and
are referred to by many linking and parsing mechanisms.</font></font>
<p><font face="Verdana"><font size=-1>IBO's native datasets implement linking
techniques which extend beyond the simple column name matching of TDataset
descendants. The developer can define several different types of set links
for any dataset, including master-detail hierarchies of any depth, lookup
links that are refreshed automatically and join links which are used in
parsing SQL when updates or inserts are performed on JOINed sets.</font></font>
<p><font face="Verdana"><font size=-1>Developers have access to the InterBase
internal DB_KEY to guarantee that selects for subqueries and joins will
always be scalar.</font></font>
<p><font face="Verdana"><font size=-1>Other link types can be defined for
user-initiated sorting of sets for searches and filtering.</font></font>
<p><font face="Verdana"><font size=-1>A GeneratorLinks array property,
implemented in all datasets, allows the developer to link a column name
to a generator name, causing the generated value to be fetched into an
inserted row and made available to the application.</font></font>
<p><a NAME="ibo_params"></a><font face="Verdana"><font size=-1>(f) Parameters</font></font>
<p><font face="Verdana"><font size=-1>TIB_Statement descendants all contain
a Params property equivalent to that of the BDE TDataset. TDataset's Params
property is directly available to the TIBO components. Additionally, various
"--Links" and other properties of TIB_ datasets can be set up to assign
parameters or load values into WHERE clauses by referring to columns in
other datasets. It is possible to assign parameters which refer to columns
not present in the dataset.</font></font>
<p><a NAME="ibo_sprocs"></a><font face="Verdana"><font size=-1>(g) Stored
Procedures</font></font>
<p><font face="Verdana"><font size=-1><b>TIB_StoredProc</b> and <b>TIBOStoredProc</b>
provide for any executable stored procedure which may or may not return
a result row. Input arguments are handled automatically via the metadata,
and are stored in the Params array. Results may be accessed in either the
Params or the Fields array.</font></font>
<p><font face="Verdana"><font size=-1>TIBOStoredProc is also able to emulate
the Params behavior of the virtual TDataset class, storing both the input
and output arguments in the Params array without losing the input parameters
after execution completes.</font></font>
<p><font face="Verdana"><font size=-1>Procedures that execute DML can (and
should) be flagged to trigger resynchronization of datasets affected by
the transaction.</font></font>
<p><font face="Verdana"><font size=-1>"Selectable" stored procedures should
generally be assigned to a TIBOQuery or TIB_Query, if a buffered dataset
is required. An unbuffered dataset can be returned by the "native" TIB_StoredProc
when a fast, unidirectional cursor is wanted.</font></font>
<p><a NAME="ibo_mon"></a><font face="Verdana"><font size=-1>(h) Monitoring</font></font>
<p><font face="Verdana"><font size=-1>The TIB_SQLMonitor component can
optionally trace and display all associated information for most calls
to the API. If an enabled monitor instance exists, a batch of intercept
API hooks is passed to the IB_Session which are, in turn, used by all of
the components in IB Objects.</font></font>
<p><font face="Verdana"><font size=-1>Statement plans and precise timings
and the count of rows affected are automatically output, for immediate
feedback on performance in applications.</font></font>
<p><font face="Verdana"><font size=-1>When the intercept hooks are taken
out, the application regains a direct connection to the API exports. When
the monitor is not enabled, there is no performance hit and sniffing of
the program API activity is impossible.</font></font>
<p><a NAME="ibo_client"></a><font face="Verdana"><font size=-1>4.2.6 Client
Considerations</font></font>
<p><a NAME="ibo_sess"></a><font face="Verdana"><font size=-1>(a) Sessions
and Multi-threaded Transactions</font></font>
<p><font face="Verdana"><font size=-1>Under most circumstances IBO handles
sessions in multi-threaded apps automatically via thread local storage
mechanisms.</font></font>
<p><font face="Verdana"><font size=-1>In applications where explicit session
control is required, such as an ISAPI module, IBO's TIB_Session provides
the necessary isolation.</font></font>
<p><a NAME="ibo_props"></a><font face="Verdana"><font size=-1>(b) Data
Field Properties</font></font>
<p><font face="Verdana"><font size=-1>IBO provides a dataset editor in
which a comprehensive range of field properties and attributes can be applied
within the dataset object itself, obviating the need to set them in each
individual control which uses the field. It includes an SQL editor similar
to that of the native VCL and facilities to fetch and display the live
data before any control objects have been set down.</font></font>
<p><font face="Verdana"><font size=-1>Property lists are provided here
for setting virtually every attribute that a column value can have in code
and in the GUI, including display masks, labels, case-insensitive and validation
masks, field trimming rules, alignment, et al.</font></font>
<p><font face="Verdana"><font size=-1>Boolean fields can be identified,
together with their True and False values, to predetermine automatically
their behavior in the application and to have them display as checkboxes
when they occur in grid columns.</font></font>
<p><font face="Verdana"><font size=-1>(Note, if a Boolean domain is defined
in the database, this behavior can be set globally in the IB_Connection
object.)</font></font>
<p><font face="Verdana"><font size=-1>IBO provides full, transparent Blob
handling with no limits.</font></font>
<p><font face="Verdana"><font size=-1>InterBase ARRAY columns are fully
supported, including getting and putting of slices.</font></font>
<p><font face="Verdana"><font size=-1>GeneratorLinks, described earlier,
provides linking between generator columns and their generators.</font></font>
<p><a NAME="ibo_methods"></a><font face="Verdana"><font size=-1>(c) Methods
and Program Events</font></font>
<p><font face="Verdana"><font size=-1>A huge number of public methods and
interface events is available to surface all of the functions of the InterBase
API and to support very fine-grained access to the parsing engine, callbacks,
database events, navigation operations, state changes, etc.</font></font>
<p><a NAME="ibo_events"></a><font face="Verdana"><font size=-1>(d) InterBase
Events</font></font>
<p><font face="Verdana"><font size=-1>The TIB_Events component replaces
TIBEventAlerter from earlier Delphi versions and the IBX TIBEvents from
Delphi 5, for registering interest in and responding to InterBase EVENTs.
It takes care of all multi-threading issues by using synchronous event
notification instead of processing the events immediately in a sub-thread.</font></font>
<p><font face="Verdana"><font size=-1>Up to 16 events can be included;
events can be registered and unregistered during run-time. An interface
event handler can be added to provide custom processing of event notifications;
or the component's DoEventAlert() method can be overridden to provide custom
logic to the process.</font></font>
<p><a NAME="ibo_search"></a><font face="Verdana"><font size=-1>(e) Searching</font></font>
<p><font face="Verdana"><font size=-1>IBO provides a number of facilities,
by way of dataset property settings, specialized controls, and smart buffering,
to effect fast, case-insensitive, incremental searching on large datasets.</font></font>
<p><font face="Verdana"><font size=-1>Grid controls have embedded navigation
tools tied to certain dataset properties, for user-configured searching.</font></font>
<p><font face="Verdana"><font size=-1>Wildcard searching is available.</font></font>
<p><font face="Verdana"><font size=-1>QUERY-BY-EXAMPLE (QBE)</font></font>
<br><font face="Verdana"><font size=-1>Most of the native IBO controls
(checkbox, radiogroup, lookupcombo, memo, richedit, listbox, lookuplist,
date, et al.) integrate with the capabilities of Search mode (dssSearch),
making it possible to use the same form for entering update or record-selection
data.</font></font>
<p><font face="Verdana"><font size=-1>The controls have built-in capability
to treat their contents as search criteria when the underlying dataset's
state changes to dssSearch. These controls embed configurable options to
change appearance when the mode changes. They are supported by a search
toolbar (analogous to the TDBNavigator) with buttons for switching, ordering,
saving, recalling and clearing search criteria in and out of a buffer,
and for counting matching rows to the criteria entered.</font></font>
<p><font face="Verdana"><font size=-1>Searching is optionally case insensitive
per column and can be configured to work with incremental searching and
nearest match enabled or disabled. It is also possible to set-up automatic
SOUNDEX and METAPHONE search criteria.</font></font>
<p><a NAME="ibo_nav"></a><font face="Verdana"><font size=-1>(f) Dataset
Navigation</font></font>
<p><font face="Verdana"><font size=-1>Locate and keyed navigation methods
are fully implemented in all datasets and integrated with the Filtered
property.</font></font>
<p><font face="Verdana"><font size=-1>See also earlier notes on <a href="#ibo_bookmark">Bookmarks</a>.</font></font>
<p><font face="Verdana"><font size=-1>Native IBO implements its own navigation
bar with six button types, any of which can be invisible. All glyphs are
configurable. The set includes Jump Forward and Jump Back buttons which
can be configured for the number of rows per jump. There are several events
to which custom handler code can be applied.</font></font>
<p><a NAME="ibo_buf"></a><font face="Verdana"><font size=-1>(g) Dataset
Buffering</font></font>
<p><font face="Verdana"><font size=-1>Comprehensive options are supplied
for buffering datasets, accessing buffer fields and navigating. Tuning
for efficient buffer performance is accomplished automatically. IBO buffers
all use dynamic memory allocation and suppress whitespace.</font></font>
<p><font face="Verdana"><font size=-1>Locate(), Lookup() and RecordCount()
methods are optimized to work as efficiently as possible, using smart algorithms
to minimize fetches.</font></font>
<p><font face="Verdana"><font size=-1>All buffer methods and mechanisms,
including SetRange, master-detail and filtering are integrated with global
case-sensitivity settings and with one another.</font></font>
<p><font face="Verdana"><font size=-1>Keys and whole records are allocated
separately within the buffer caches. Datasets can be configured to fetch
first the keys and then the remaining columns, or to fetch whole rows.
The "key" approach is specifically for reducing network traffic when browsing
large datasets and can be enabled or disabled as required.</font></font>
<p><font face="Verdana"><font size=-1>The buffered datasets allow forward
and reverse scrolling by any increment, multi-row selects, locates, automated
"follow-me" updating of lookup fields, incremental searching, et al.</font></font>
<p><a NAME="ibo_filter"></a><font face="Verdana"><font size=-1>(h) Filtering</font></font>
<p><font face="Verdana"><font size=-1>Although filters are all processed
on the server, BDE filter syntax and FilterOptions are fully supported,
with wildcards and case insensitivity. FindFirst(), FindNext(), etc. methods
are integrated with filtering to navigate appropriately within the bounds
of a filtered set.</font></font>
<p><font face="Verdana"><font size=-1>The OnFilterRecord event can be used
to filter records within the client buffers, without losing the current
dataset.</font></font>
<p><a NAME="ibo_cursor"></a><font face="Verdana"><font size=-1>(i) Dataset
Cursors</font></font>
<p><font face="Verdana"><font size=-1>TIBOQuery, TIBOTable and TIB_Query
use a bi-directional cursor with a large amount of navigating capability.</font></font>
<p><font face="Verdana"><font size=-1>TIB_Cursor uses a unidirectional
cursor and is capable of very fast scans of large datasets.</font></font>
<p><a NAME="ibo_idx"></a><font face="Verdana"><font size=-1>(j) Using Indexes
in Buffers</font></font>
<p><font face="Verdana"><font size=-1>"Smart buffering" can determine whether
to use the key buffer for searches, locates and internal operations.</font></font>
<p><a NAME="ibo_propeds"></a><font face="Verdana"><font size=-1>4.2.7 Property
Editors</font></font>
<p><a NAME="ibo_treatprops"></a><font face="Verdana"><font size=-1>(a)
Treatment of properties</font></font>
<p><font face="Verdana"><font size=-1>A full-scale dataset editor is invoked
by double-clicking on any dataset component. Datasets keep arrays for many
properties and the editor's interface simplifies work by allowing entry
of all attributes per column or all columns per attribute. Hyperlinks permit
switching between these modes.</font></font>
<p><a NAME="ibo_runtime"></a><font face="Verdana"><font size=-1>(b) Run-time
Access</font></font>
<p><font face="Verdana"><font size=-1>All InterBase-specific features are
surfaced in the data access objects as writeable properties. Comprehensive
client event handling is provided through hundreds of published events
and properties. IBO utilizes a local schema cache.</font></font>
<p><a NAME="ibo_encap"></a><font face="Verdana"><font size=-1>(c) Encapsulated
behavior</font></font>
<p><font face="Verdana"><font size=-1>IBO fully encapsulates handling of
multiple transactions and multiple connections by clients configured for
it, and all isolation/concurrency and commit options. "Pessimistic locking"
can be enabled, which is accomplished by preceding a transaction with a
dummy update. In almost all cases, live datasets are made transparent to
developer and user.</font></font>
<p><a NAME="ibo_controls"></a><b><font face="Verdana"><font size=-1>4.4
Controls</font></font></b>
<p><font face="Verdana"><font size=-1>Native IBO provides a full GUI development
environment of more than 50 data-aware controls designed for InterBase
client development. Specialized edit controls and bars encapsulate behaviours
for searches and navigation, with fine control of editing and display characteristics.</font></font>
<p><font face="Verdana"><font size=-1>Controls connect to the data access
objects through the TIB_Datasource.</font></font>
<p><font face="Verdana"><font size=-1>The 'TIBO' strain of components uses
a TDatasource and connects to the native Delphi data-aware controls. This
strain can use the InfoPower(TM) controls, requiring the specialized TwwIBOQuery
and TwwIBOTable components for earlier Infopower versions.</font></font>
<p><font face="Verdana"><font size=-1>'TIBO' can continue to support existing
third-party report and graphing tools designed for the native Delphi VCL.
Several third-party component vendors provide support for the native 'TIB_'
strain of data access.</font></font>
<p><a NAME="ibo_convert"></a><b><font face="Verdana"><font size=-1>4.4
Converting a BDE Application</font></font></b>
<p><font face="Verdana"><font size=-1>4.4.1 Conversion from the BDE based
components to the 'TIBO' strain is a matter of performing a global search-and-replace
of unit and class names. Except for one rarely-used feature of TTable,
IBO implements full BDE emulation.</font></font>
<p><font face="Verdana"><font size=-1>4.4.2 Existing settings in the BDE
native Interbase driver can optionally be read at connection time to have
the IBO connection duplicate the BDE configuration.</font></font>
<p><font face="Verdana"><font size=-1>4.4.3 A detailed conversion guide
is available in the on-line help, which walks through each stage of a conversion
and pinpoints where differences occur. The guide explains how to test that
the converted application works as it should.</font></font>
<p><font face="Verdana"><font size=-1>4.4.4 The guide includes two practice
runs that demonstrate BDE-to-IBO conversion. Both of them are fully converted
in less than one minute.</font></font>
<p><a NAME="ibo_perf"></a><b><font face="Verdana"><font size=-1>4.5 Performance
(IBO vs BDE)</font></font></b>
<p><font face="Verdana"><font size=-1>(a) IBO employs intelligent client-side
statement parsing to optimize the dialog with the server. Users who have
converted production applications report excellent performance over BDE,
especially on low-bandwidth connections.</font></font>
<p><font face="Verdana"><font size=-1>(b) In performance comparisons with
the BDE, IBO shows speed gains of 200 to 500 percent over the BDE on equivalent
operations.</font></font>
<p><font face="Verdana"><font size=-1>(c) Much of the client-side statement
parsing for dataset operations involves shifting work to the server. Operations
like Filter, Locate(), Lookup(), FindKey(), GotoKey(), RecordCount, etc.
can offload whole tasks, or significant parts, to the server to minimize
network I/O.</font></font>
<p><a NAME="ibo_sig"></a><b><font face="Verdana"><font size=-1>4.6 Significant
Features</font></font></b>
<p><font face="Verdana"><font size=-1>4.6.1 BDE-based Delphi and C++Builder
applications can be fully converted and working in minutes without code
changes, retaining compatibility with native Delphi and third-party data-aware
controls.</font></font>
<p><font face="Verdana"><font size=-1>4.6.2 The "IBO native" data-aware
controls embed the code to utilize dataset configurations and interact
with changes in dataset state, e.g. the "Query-by-Example" behavior of
the specialized search controls.</font></font>
<p><font face="Verdana"><font size=-1>4.6.3 IBO includes a number of "Tool"
components for adding extra features to client applications: data pumping,
running DDL scripts, table exports, et al., with encapsulated implementation
support in the supplied controls, toolbars, etc.</font></font>
<p><font face="Verdana"><font size=-1>4.6.4 Datasets are transparently
"live" to both developer and user, with custom update SQL required only
in rare conditions.</font></font>
<p><font face="Verdana"><font size=-1>4.6.5 IBO ships with a comprehensive
help file and many sample applications, accompanied by documentation, to
demonstrate a representative range of configurations, component combinations
and techniques.</font></font>
<p><a NAME="ibo_lic"></a><b><font face="Verdana"><font size=-1>4.7 Licensing</font></font></b>
<p><font face="Verdana"><font size=-1>Source code and binaries are distributed
under the Computer Programming Solutions Trustware License. Registered
users receive full source code.</font></font>
<p><font face="Verdana"><font size=-1>Users become registered by one or
more of</font></font>
<p><font face="Verdana"><font size=-1>(a) contributing actively to source
code or documentation development</font></font>
<p><font face="Verdana"><font size=-1>(b) developing and deploying a client
application for use by a non-profit organization</font></font>
<p><font face="Verdana"><font size=-1>(c) contributing to IB Objects source
code base while using IB Objects in a fully Open Source development project,
whether commercial or not</font></font>
<p><font face="Verdana"><font size=-1>(d) paying a license fee. Unless
(c) applies, the license fee is payable for any successful commercial deployment,
including situations where registrations were previously granted under
(a) or (b).</font></font>
<p><font face="Verdana"><font size=-1>Managers of Open Source projects
can get rights to distribute the IBO sources along with their projects
if they make sure that the terms of the Trustware license are distributed
and understood.</font></font>
<p><a NAME="ibo_vers"></a><b><font face="Verdana"><font size=-1>4.8 Version
Support</font></font></b>
<p><font face="Verdana"><font size=-1>The production release of IBO at
time of writing is 3.5.</font></font>
<p><font face="Verdana"><font size=-1>IBO components are for use with</font></font>
<ul>
<li>
<font face="Verdana"><font size=-1>Delphi 2 and higher (Note, Delphi 2
upgrades will be discontinued after IBO version 3.5)</font></font></li>

<li>
<font face="Verdana"><font size=-1>The TDataset-compatible components must
be used with a Delphi or BCB version which includes the native Delphi data
access objects and data-aware controls.</font></font></li>

<li>
<font face="Verdana"><font size=-1>The "native IBO" components can be used
with Delphi Standard versions which ship without the data access components</font></font></li>

<li>
<font face="Verdana"><font size=-1>Borland C++ Builder, all versions except
1.0</font></font></li>

<li>
<font face="Verdana"><font size=-1>InterBase versions 4.x and higher; includes
full support for InterBase 6.x Dialect 3 data types, quoted reserved words
as object names, and object name case-sensitivity.</font></font></li>
</ul>
<a NAME="ibo_clx"></a><b><font face="Verdana"><font size=-1>4.9 Delphi
for Linux (CLX components)</font></font></b>
<p><font face="Verdana"><font size=-1>Under development, expected Spring 
2001.</font></font>
<p><i><font face="Verdana"><font size=-1><a href="#contents">Contents</a></font></font></i>
<p><a NAME="matrix"></a><b><font face="Verdana">5. Summary of the Connectivity
Approaches</font></b>
<font color="mediumblue">Some feature descriptions for InterBase Express (IBX) have changed as the beta development proceeded in the months following the preparation of this matrix.  Please refer to the marked passages in the article for the updated information.  This matrix has NOT been updated.

<br><img SRC="useful/images/Connectivity_Matrix_top.gif" HSPACE=5 VSPACE=5 BORDER=0 height=506 width=709>
<br><img SRC="useful/images/Connectivity_Matrix_bottom.gif" HSPACE=5 VSPACE=5 height=535 width=709>
<p><i><font face="Verdana"><font size=-1><a href="#contents">Contents</a><br>
<a href="#top">Top of Page</a><br></font></font></i>
<br>&nbsp;
<br>&nbsp;
</td></tr></table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>