<?php
if (eregi("page_opensource.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>How InterBase became Open Source</H4>

<b>From article featured in the UK Borland Users Group Magazine<br> (Nov/Dec 2000)
</b><p>
"Just before Christmas 1999 Dale Fuller's management team had a meeting with the senior executives of the InterBase division and told them of their new business plan. It has been stated by informed personnel that they had decided that the revenue stream was insufficient for the size of the division. They also said they wanted to lay off at least 50% of the current InterBase staff of 39 (including part-timers and contractors ). In addition, there would be no budget to restore the struggling US marketing and sales staff, which had already been reduced to one 3/4 time person and an intern. This was not a workable scenario to grow a product business. It has never been clear to me just what Dale and his team had in mind, but I believe it was intended to cancel the release of 6.0 and sit on the diminishing revenue stream from 5.n for a couple of years."<p>

"Possibly unbeknown to the Inprise management team, the InterBase team had been quietly building a sound and profitable (i.e., not loss making) business. One of the original developers of InterBase (Ann Harrison) had continued to provide excellent technical support for the product via the mers list server/news group. The product manager, Bill Karwin had equally spent many hours there helping developers. On the business side Paul Beach, responsible for worldwide sales (non-US) was basically generating about 90% of the total turnover. With little resources he had concentrated on building a formidable network of VARS that typically integrated InterBase with other Borland tools."<p>

"Their response (Karwin and Beach) to the new business plan was probably not what was expected. They resigned. Their resignations hit developers and VARS hard. Contractually they couldn't explain why they resigned, but gradually the above picture became clear. Thus the InterBase Developer's Initiative (IBDI) was born. Suddenly we discovered that some serious business and serious money was riding on InterBase. Enough people came forward to buy InterBase several times over. A sale was not to be, but the development community was now forming itself into an organised force to be recognised."<p>

<p align="right"><i>
Paul Reeves<br>(BUG InterBase Group Leader)
</i></p><hr size=1><p>
InterBase became an open source product on 25th July 2000. There should have been dancing in the streets and unbounded joy throughout heaven and earth. The release should have brought praise for enlightened and forward thinking management. Instead there was anger and recrimination towards Inprise (now Borland Software Corp.). What went wrong? <p>
Let's the events speak for themselves ! A list of events in chronological order as they have been recorded by on-line press.
<p>

<table cellspacing=5 cellpadding=0>
<TR>
<TD WIDTH="109"><I>28 Dec 1999</I></TD>
<TD>(eWeek) <A HREF="http://www.zdnet.com/eweek/stories/general/0,11011,2414619,00.html">Inprise mulls future of InterBase division </A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>03 Jan 2000</I></TD>
<TD>(Inprise press release) <A HREF="http://www.borland.com/about/press/2000/ib.html">Open-sourcing of InterBase announcement</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>04 Jan 2000</I></TD>
<TD><font color="red"><b>(LinuxJournal) <A HREF="http://www2.linuxjournal.com/articles/conversations/010.html">Conversation with Dale Fuller regarding InterBase</A></b></font> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>14 Feb 2000</I></TD>
<TD>(Inprise press release) <A HREF="http://www.borland.com/about/press/2000/ibnewco.html">New Company to Manage InterBase</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>16 Feb 2000</I></TD>
<TD>(PC Week) <A HREF="http://www.zdnet.com/pcweek/stories/news/0,4153,2436153,00.html">InterBase proves its mettle</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>27 Mar 2000</I></TD>
<TD>(Inter@ctive Week) <A HREF="http://www.zdnet.com/intweek/stories/news/0,4164,2473264,00.html">Forming an InterBase Company</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>27 Mar 2000</I></TD>
<TD>(Inter@ctive Week) <A HREF="http://www.zdnet.com/intweek/stories/news/0,4164,2473231,00.html">The New Open Source Frontier</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>27 Mar 2000</I></TD>
<TD>(Computergram) <A HREF="http://www.ibphoenix.com/ibp_news_art5.html">Inprise Spins Out Database Division for Open Source Future </A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>10 Apr 2000</I></TD>
<TD>(The 451) <A HREF="http://www.ibphoenix.com/ibp_news_art3.html">Disappearing Inprise spawns InterBase</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>26 Apr 2000</I></TD>
<TD>(SD Times) <A HREF="http://www.sdtimes.com/news/004/story7.htm">InterBase Reborn as Open-Source Player</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>14 Jul 2000</I></TD>
<TD>(Infoworld) <A HREF="http://www.infoworld.com/articles/hn/xml/00/07/14/000714hnfuller.xml">Dale Fuller: Inprise/Borland welcomes Microsoft to the jungle</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>15 Jul 2000</I></TD>
<TD>(SD Times) <A HREF="http://www.sdtimes.com/news/010/story1.htm">Phoenix Rises Again - Independent InterBase expanding operations</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>17 Jul 2000</I></TD>
<TD>(Slashdot) <A
HREF="http://slashdot.org/article.pl?sid=00/07/12/124244">Attendee reports on
InterBase and Kylix from Borcon</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>21 Jul 2000</I></TD>
<TD>(The 451) <A HREF="http://www.ibphoenix.com/ibp_news_art4.html">Will Borland let
InterBase go?</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>25 Jul 2000</I></TD>
<TD>(Inprise press release) <A HREF="http://www.borland.com/about/press/2000/terminates.html">Inprise/Borland Terminates Negotiations to Sell InterBase&reg; Product Line</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>25 Jul 2000</I></TD>
<TD>(Inprise press release) <A HREF="http://www.borland.com/about/press/2000/ib6.html">Inprise/Borland Introduces InterBase 6.0 Now Free and Open Source on Linux&reg;, Windows, and Solaris&reg;</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>27 Jul 2000</I></TD>
<TD>(Inprise press release) <A HREF="http://www.borland.com/about/press/2000/cobalt.html">Inprise/Borland's InterBase&reg; ships with Cobalt Networks&reg; Next Generation Server Appliance</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>28 Jul 2000</I></TD>
<TD>(Infoworld) <A HREF="http://www.infoworld.com/articles/hn/xml/00/07/28/000728hninterbase.xml">InterBase: The spin-off that hasn't</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>31 Jul 2000</I></TD>
<TD><font color="red"><b>The Firebird Project was born</b></font></TD>
</TR>
<TR>
<TD WIDTH="109"><I>25 Aug 2000</I></TD>
<TD>(Client Server NEWS 361 - August 7-11, 2000) <A HREF="http://www.ibphoenix.com/ibp_news_art1.html">InterBase Flap Could Fork Code</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>29 Aug 2000</I></TD>
<TD>(Client Server NEWS 364 - August 28 - September 1, 2000) <A HREF="http://www.ibphoenix.com/ibp_news_art2.html">InterBase Rises</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>12 Sep 2000</I></TD>
<TD>(Inprise/Borland) <A
HREF="http://www.borland.com/interbase/letter.html">An open letter to the InterBase Developer Community</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>15 Sep 2000</I></TD>
<TD>(LinuxGram) <A HREF="http://www.linuxgram.com/article.pl?sid=00/09/15/0806490&amp;section=134">Inprise is back in the InterBase Business</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>13 Nov 2000</I></TD>
<TD><A HREF="http://www.ibphoenix.com/ibp_news_art6.html">Whats happening to InterBase?</A> Article from the UK Borland User Group Magazine by Paul Reeves (Nov/Dec
2000)</TD>
</TR>
<TR>
<TD WIDTH="109"><I>22 Nov 2000</I></TD>
<TD>(Upside Today) <A HREF="http://www.upside.com/Open_Season/3a1adcc1b.html">IBPhoenix president gets past the politics</A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>09 Jan 2001</I></TD>
<TD><font color="red"><b>(IBPhoenix) <A HREF="http://www.ibphoenix.com/sec1.html">InterBase Security Alert</A></b></font></TD>
</TR>
<TR>
<TD WIDTH="109"> <I>19 Feb 2001</I></TD>
<TD>(Crypto-Gram) <A HREF="http://www.counterpane.com/crypto-gram-0102.html#5">Bruce Schneier writes about that backdoor in the latest edition of his monthly newsletter on security issues.</A> </TD>
</TR>
<TR>
<TD WIDTH="109"><I>13 Mar 2001</I></TD>
<TD><A HREF="http://www.borland.com/about/press/2001/ib6_certified.html">Borland release certified kits for InterBase 6.0 </A></TD>
</TR>
<TR>
<TD WIDTH="109"><I>19 Apr 2001</I></TD>
<TD><font color="red"><b>(IBPhoenix) <A HREF="http://www.ibphoenix.com/ibp_certified_interbase_faq.html">IBPhoenix's response to Borland's certified kits</A></b></font></TD>
</TR>

</table>
<p>
<hr size=1>
<table width="100%" border=0 cellspacing=0 cellpadding=0 <tr>
<td align="left">
Previous: <A href="index.php?op=history&amp;id=borland">InterBase at Borland</A>
</td>
<td align="right">
Next: <A href="index.php?op=history&amp;id=firebird">Firebird records</A>
</td>
</tr></table>
<p>
