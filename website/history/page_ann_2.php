<?php
if (eregi("page_ann_2.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Interbase With a Small 'b'</H4>

Further recollections from Ann Harrison<hr size=1>

<!-- ------------------------------------------------------------------- -->
<table cellspacing=0 cellpadding=0>
<tr>
<td colspan=3><font face="Verdana" size="-1">
<font face="Verdana"><B>InterBase started on Apollo Domain, a spectacularly wonderful 
workstation with terrific networking.  The initial release supported
Apollo, Sun, HP/UX, VAX/VMS, Ultrix, and something else that escapes
me. So, if you wonder 'was InterBase originally a Windows/DOS
system?', the answer is 'no'.
</b><p>
</td></tr>
<tr><td>
<table>
<tr><td width="48%" valign="top">
Interbase (the company, with a small 'b') started as Groton Database
Systems in our spare bedroom in Groton, Mass.  All the 'gds' tags
and the 'g' prefix utilities (gfix, gpre, gbak) come from those days.
The three founders had previously worked at DEC on the Rdb projects.
We were (are) Jim Starkey who did the software architecture and wrote
most of the code, Don DePalma who wrote documentation etc. and me, 
Ann Harrison.  I brought in a salary and kept us from starving. That
was 1984.  <P>
<i>The system relations and the API were based on DEC's
relational architecture, which would have been an excellent basis
for a program to program relational database standard.  It was
extensible, supported SQL, QUEL, and DEC's own flavor of relational
language.  The design made multi-database programs quite simple
and provided a good basis for distributed processing.  Another 
ball dropped.  Anyway, that's why the system relations are RDB$xxx.</i>
<P>
In 1986, we (by now seven founders) sold stock to Ashton-Tate, a big
company that would give us credibility and funding so we could get 
over the twin hurdles of 'Who are you guys?' and never having enough
money to hire marketing talent to stir up leads to provide revenue
to hire ...  
<P>
Alas, Ashton-Tate decided that they really loved InterBase, 
so investing in database companies must be great, so they invested in 
Sybase too.  [Bad day.]  At that point, all they wanted from
us was to be great, and to be just like dBase, and just like Sybase,
and demonstrably faster than either of them at everything.  Need I
mention that that drained engineering resources?
<P>


<br>
<a href="#top">Next column</a>

</td></tr>
</table></td>
<td width="4%">&nbsp;</td>
<td width="48%" valign="top"><table>
<tr>
<td>
<a name="top"></A>
Ashton-Tate's inspired management put them in a death spiral at about
the time time ran out on the clause in their contract that said they either
had to buy the whole thing, or sell it back at cost.  They bought it,
and Jim's last act as President was to fire himself.  He was the only
one who left then (we were about 65 people).  
<P>
Shortly thereafter (1992) Borland bought Ashton-Tate.  They decided they needed the technology
in-house, so they moved about 1/3 of the company, including most of
the senior engineers, to Scott's Valley.  Several senior people from
support also moved west, and most of the local sales offices remained
intact.
<P>
What Borland got was a very sophisticated database that ran on a dozen
platforms, mostly Unix.  The only PC systems supported were SCO/Unix,
and OS/2.  (Did I mention that Ashton-Tate had really inspired management?)
<P>
The internationalization was extremely primitive - if you stored eight-bit characters, we didn't mangle them, usually.  The system did not 
support stored procedures - we felt, and had measured, that either
embedded or dynamic SQL was as fast as stored procedures - the time
gained by pre-compiling and optimizing them didn't make up for the 
time spent figuring out whether the optimization and compilation were
up to date.  
<P>
<b>Under Borland, the light suddenly went on that stored
procedures weren't about speed, they were about encapsulation.  What
I'm trying to say is that lots of good stuff happened after I decided
not to move with the company.</b>
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
</td>
</tr></table>
<p>
