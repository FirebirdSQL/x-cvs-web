<?php
if (eregi("page_ann_1.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Ann Harrison's Reminiscences on InterBase's Beginnings</H4>

<!-- BEGIN PAGE CONTENT -->
<table cellspacing=0 cellpadding=0>

<tr><td colspan=3>
<B>InterBase started in the shower.  Specifically in the blue-tiled walk-in shower at 297 Reedy Meadow Road, Groton, Massachusetts, USA. There, looking through the shower window into the woods, Jim Starkey had the &quot;Eureka&quot; that eventually became InterBase.</b><p>
</td></tr>
<td>
<table width="100%" border=0 cellspacing=0 cellpadding=0>

<tr><td width="48%" valign="top">

The chance to write a relational database drew Jim to DEC in the mid-seventies, but the prevailing wisdom said that only network databases could support commercial applications.  That misconception took four years to dispel, during which Jim designed and wrote Datatrieve, a relational query language that ran on flat files and DBMS-32.  Datatrieve users wanted more flexibility, better concurrency control, and atomic transactions.<P>
When DEC finally embraced relational technology, Jim was still in charge of Datatrieve, so another group began designing what became Rdb.  They debated the meaning of "relational" and the meaning of "database."  They scoured the literature and held wonderful discussions about degrees of consistency and predicate locking and shadowing techniques.  But they didn't start coding.
<P>
<b>Shadowing in the Shower</b>
<br>
Jim got impatient, and began playing with shadowing, which he saw as a way to provide a repeatable read without blocking updates.  Then, one morning in the shower, he realized that the shadows could be also prevent update conflicts and undo failed transactions.  The multi-generational database revealed itself in that shower.<P>
Intrigued, Jim began serious work on the database called jrd.  DEC's management discovered that it had two relational database projects, the real one and jrd. The database wars broke out.<P>
Those were dark years, full of internecine politics and flaming email.  Jim, Don DePalma, and I decided there had to be a better way.  We learned that Apollo Computer, a local workstation company, wanted a private-label database.   Apollo's management liked the jrd model, so Jim moved into the second-floor spare room and started coding. The initial capitalization was $243.50 for a comfortable chair and two filing cabinets to hold up the door that served as a desk.<P>
When Apollo contract was signed, eight months after we started negotiations, money started to flow in. Don and I joined Jim in the very very hot second-floor spare room.  Jim coded; Don wrote the manuals; and I did some of everything.  The cats slept on the computers, sprinkling cat hair and dander all through the machines.  Apollo field service came by weekly to vacuum.<P>
Dave Root left Apollo and became the fourth founder.  Every company should include one sane adult. The four of us overflowed the spare room, so the company spilled out onto the balcony.<P>
Then we began to have customers and potential customers, and meetings and mailings. The guestroom became the copy center and mailroom.  The living room was for conferences.  We all cooked in the kitchen and ate in the dining room.  The coffeepot sat beside my sink in the master bath. We weren't working at home anymore, we were living at work.<P>
That winter, the driveway was a luge run for Saabs, icy, twisty, and lined with trees.  Our first non-Apollo customer arrived from Santa Barbara California in February and slid into the front yard, barely upright.  He signed the contract anyway.<P>
Groton Database Systems moved out of the house and into an office over a dry cleaner.  I got my bathroom back.<P>
"Groton Database Systems" is an inspired name, inspired by our failure to find any other name that passed trademark search.  We were naive new entrepreneurs, so each time we thought of a name, we asked our lawyer "is this OK?"  Later we learned that the right question is "can you defend us if we use this?"  That sophistication let us change the name to InterBase, a change encouraged by the person who answered the phone "Rrrrotten Database Systems."<P>
<b>Concept:  Simplicity</b>
<br> 
What were we trying to do?  Build a relational database that didn't get in the way.  One that was simple to install, required little or no administration, and would work inside applications.<P>

We all had experience with network databases: IDMS, Seed, DBMS-32.  To use a network database, you really had to love tuning, tweaking, studying, and fondling your database.  InterBase was for the rest of us, who want to get on with our real jobs.
<P>
<i>The multi-generational architecture - Jim's shadowing Eureka - eliminated problems that other databases stumbled over.  A reader could create a large, consistent report while others continued to update the same data. Transaction rollback was simple; even crash recovery was automatic.</i><P>
Crash recovery was essential, because we ran the company on InterBase, from accounting, sales, code management, everything.  Electrical failures were common: from overloaded circuits, from August thunderstorms, and from accidentally unplugging a machine by tripping over the power cord.  Database recovery was as important to us as to any of our customers.

<p>

<a href="#top">Next column</a>

</td></tr>
</table></td>

<td width="48%" valign="top"><table>
<tr><td>
<a name="top"></A>
InterBase was a good product and most of our customers were very happy.  The company grew to seven people and expanded into two more suites over the former dry cleaners, now a donut shop.  Our insurance carrier didn't like the donut shop at all, but it smelled better than the cleaners.
<P>
<b>Unique Charm</b><br>
The space had its own unique charm.  In places, the floor sagged alarmingly, and creaked if anyone stepped on it.  None of the corners was square.  We had so many computers, and of course old computers were so much bigger and hotter than machines today, that we ran the air conditioners year round.  In the spring and fall they'd ice up, so we kept a few hair dryers around to melt the ice so we could get cool again.

<P>
After a few winter months, the gas company sent us an estimated bill for $350.  Our bills had been between one and two dollars because we heated the space with computers rather than gas.  Mass Gas was convinced we were stealing from them. They replaced the meter twice, and still got absurdly low readings.  Eventually the meter reader came up to our office agreed that the computers produced a lot of heat.<P>
We fought with purchasing departments and accounts payable because our customers were generally large companies, unused to dealing with very small companies.  Some could only pay for support renewal if we sent out a box with a bill of materials labelled "support renewal."  I have no idea how those companies bent their rules to pay phone bills.<P>One of our customers was an obscure subsection of the US Army Food Service.  Their programmers wanted a training course. We rented a conference room in a local hotel and made ourselves look presentable.  The two men arrived, with payment for the course in traveler's checks, foreign traveler's checks.  They wouldn't talk about their application or even what role they filled in feeding the Army.  Probably none.<P>
Looking presentable was not something we did often or well.  Don eventually convinced Jim that our utilities should be "dressed for success": the names Dudley (for DDL utility), Burp (backup and restore program), and Alice (all else) had to go. When visitors were expected, we made an effort, but it didn't go very deep.  A banker came by about an equipment loan I was trying to arrange. Some bright spark pointed out all these computers, none over two years old "and every one obsolete."  Oh well, there were other banks.<P>
<b>'Support Critical'</b>
<br>
Support was a critical part of our business; when a company buys a database, it invests much more than the cost of the software.  Word of mouth was our best advertising, and we worked to help customers succeed.  Most questions were resolved over the phone.  
<p>Then a large California aerospace company had a problem we couldn't diagnose remotely. 
Records disappeared from the database, randomly, but much too often.  The engineer was sure it wasn't his program; he said he'd bet his life on it.  Jim flew out with a source kit, built a debugging system, and traced the problem back to a delete statement.  That company became a major customer, despite the opinion of their purchasing department that we were small and flaky.
<P>
<i>Could a company like InterBase start today?  Probably not; certainly not a company that built a relational database.  Expectations rose as prices dropped.  We were able to sell a database with a few command line tools for thousands of dollars a seat in 1986.  Today, customers expect a suite of design tools, analysis tools, rad tools, and management tools, all with well-designed GUIs.  And they expect to pay less than a hundred dollars a seat.</i>
<P>
InterBase grew out of its own revenues for five years, giving us some business experience before we faced investors. Even though the market is much larger, getting the attention of enough customers to prevent starvation requires a large budget.  Starting without investment -- or a big trust fund -- simply is not feasible today.  Even then, companies with financial resources did better than bootstrap companies.  
<p>Sybase was founded within days of Groton Database Systems with tens of millions in venture capital.  They got more press and sold more software.   But we had a lot of fun.  Just lucky I guess.
</td></tr>
</table>
</td></tr>
</table>

<!-- END OF PAGE CONTENT -->

<p>
<hr size=1>
<table width="100%" border=0 cellspacing=0 cellpadding=0 <tr>
<td align="left">
Up: <A href="http://localhost/fbnew/index.php?op=history&amp;id=beginning">How InterBase came to be</A>
</td>
<td align="right">
Next: <A href="index.php?op=history&amp;id=jim_1">How Jim Starkey remembers it</A>
</td>
</tr></table>
<p>
