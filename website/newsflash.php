<?php
if (eregi("newsflash.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<hr size=2>
<b><font color="red">31-December-2003</font> Firebird 1.5 Release Candidate 8</b>
<p>
The development of Firebird 1.5 release is in final development stage ! The Release Candidate means that we're "almost there", and we turned our focus to remaining known issues and rough edges, final testing and bug squashing. We made a lot of progress with it thanks to your feedback.
<p>
<b>The eighth Release Candidate should become the final release, so we are eager to hear about your experience (good or bad) with it.</b> Please send your reports to the <?php GetMailingListPageLink("fb-devel","",true) ?> mailing list (or newsgroup). Don't forget that your feedback will help us to move forward faster!
<p>
<i>Background information:</i><br>
The 1.5 release is the first version based on new, cleaned and improved C++ source code tree with many new features and bugs fixed. Complete list of major changes beyond the 1.0 version is quite long, and you can read the <b>up-to-date</b> version <a href="http://cvs.sourceforge.net/viewcvs.py/firebird/firebird2/doc/WhatsNew?rev=1.36.2.11&only_with_tag=B1_5_Release&view=markup">here</a>.
<p>
<i>Your Firebird Development Team</i>
<p>

<hr size=2>
<b><font color="red">17-December-2003</font> Jim Starkey is Back !</b>
<p>
<a href="index.php?op=history&id=beginning">Jim Starkey</a> announces on the Firebird Development List: <p>
"I've been hired by <a href="http://www.ibphoenix.com">IBPhoenix</a> to produce a 64 bit, SMP-friendly reference port for Firebird.  The formal deliverable will be for 64bit Solaris Sparc, although I plan to produce AMD64/Opteron versions for WinXP and Linux on the way.  I'm calling it <b>Project Vulcan</b> (I wanted to call it IBAlbuquerque, but Mozilla is already using the name)."<p>
"The requirement is for a thread-safe, embeddable, 64 bit versions capable of 3X performance on a four processor system (or run out of disk bandwidth trying) in a three month period.  The resulting code will be released under the standard <a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_idpl">IDPL</a>."
<p>
<i>Note: You can find more in <?php GetMailingListPageLink("fb-devel","",true) ?> mailing list. Look for Vulcan in message subject lines.</i>

<hr size=2>
<table width="100%" cellpadding=2>
  <tr>
    
    <td align=center valign=top colspan=2><font size="+2" color=#dc143c>
<b>Yaffil Merges Source Code<br>with Firebird</b></font>
<p><i>Moscow, St Petersburg and The World, 2 December 2003</i>
    </td>
  </tr>

  <tr>
    <td colspan=2>
      <table cellspacing=4 cellpadding=4>
        <tr>
          <td width=130><img src="images/helloworld.gif" width=130 height=66 border=0
alt="helloworld.gif" title="Yaffil hails Firebird"></td>
          <td>

<b>
The Firebird Project and the principals of the Yaffil project are very pleased to announce the merging of the Yaffil project with Firebird.  Former Yaffil chief developer Oleg Ivanov is welcomed as the newest member of the Firebird core developer team.</b>
<font color=#000000>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td>
Yaffil, a Russian, Windows-only version of the Firebird database engine, was built originally from the open source Firebird code with a number of additional features.  It began life as a private project, before becoming available as a commercial distribution from iBase.ru, of Moscow.  Separate Yaffil development has since ceased, product sales have been stopped and all the sources have been released for merging into the Firebird 2.0 code base by the Firebird development team.
<p> 
For Firebird, the homecoming of the little red bird is welcome news.  First, it allows the two closely-related codebases to be united in a single tree.  Both will gain strength by moving forward in a single direction.  Secondly, it brings into the design scheme a number of significant enhancements, optimizations, architectural improvements and character sets/collations.</b>

    </td>

    <td width=133 align=center valign=top><img src="images/yaffilsmall.gif" width=36 height=37 border=0
alt="yaffilsmall.gif" title="Yaffil - Little Red Bird"><br>
<img src="images/welcome_to_yaffil.gif" width=133 height=114 border=0
alt="welcome_yaffil.gif" title="Firebird welcomes Yaffil">

</td>
  </tr>
  <tr>
    <td colspan=2>
<b>
For Yaffil users *, the proprietor of <a href="http://www.ibase.ru">iBase.ru</a>, Dmitri Kouzmenko, says migrating to Firebird 2.0 will benefit them by enabling them to 
<ul type=circle>
<li>work with the cross-platform database server
<li>use the new features 
<li>have access to  full project source code.  
</ul><p>
He also notes that, as Firebird is being developed by a big team of developers, partly financed by the FirebirdSQL Foundation, the combined project will continue to develop and progress. </b> 

<p>
Coordinated efforts between the Firebird core developers and Oleg Ivanov will ensure that Yaffil users will be able to migrate easily to Firebird 2 with only minor changes to their applications and databases.  To Dmitri, this means that users will have Yaffil's advantages of better performance and lower CPU load along with the benefits of the cross-platform server, an open source product and a number of unique features. He considers that, rather than having two teams spending energy on implementing conflicting features, it would be more productive for them to work together on new features and bugfixes.

<p>
The <a href="http://firebirdsql.org/ff/foundation">FirebirdSQL Foundation</a> is discussing a proposal to grant some funds to assist with an early merger of Yaffil's most useful special features into the codebase for a forthcoming post-version 1.5 sub-release of Firebird.
    </td>
  </tr>

  <tr>
    <td colspan=2><hr size=1>
<i>* Bug fixes for current Yaffil products and technical support for existing customers will be continued by iBase.ru.-- D. Kouzmenko</i>
<hr size=1>
    </td>
  </tr>
</table>


<hr size=2>
<b><font color="red">4-August-2003</font> CVS HEAD is now open for v2.0 development</b>
<p>
The HEAD CVS branch is now open for Firebird V2.0 development. The major goals of this version are:<br>
<ul>
<li>Much better scalability and performance (SMP support, improved caching, better optimizer).</li>
<li>New SQL features (built-in functions, datatypes, statements, metadata object types).</li>
<li>Better conformance to the latest SQL specification.</li>
<li>Optimized network protocol.</li>
<li>Proper security.</li>
<li>Incremental backup, native monitoring features, engine plugins.</li>
</ul>
And lots of other stuff. A more detailed list will be published later, after the
V1.5 final release.
<p>
<i>Dimitry Yemanov, Firebird Development Team</i>

<hr size=2>
<!--
<hr size=2>
<b><font color="red">29-April-2003</font>&nbsp; Protecting the Firebird Brand: Update</b></font>
<p>
After nearly two weeks of effort to get our objections heard via the Web and private email, we are beginning to see some action by the Mozilla leaders to unroll the re-branding of its lightweight browser as "Firebird&trade;".  When this issue first blew up, we took <a href="http://firebirdsql.org/ff/foundation/index.php?id=fb_trademark.html">legal advice</a>. On Friday (April 25), we (Firebird Admins), the FirebirdSQL Foundation committee and the IBPhoenix principals wrote a formal letter to the Mozilla admins, stating the legal position and asking them to contact us.  We look forward to their response.
<p>
However, over the weekend and today, we note 
<ul type=circle>
<li>a <a href="http://www.mozilla.org/roadmap/branding.html">branding policy statement</a>  that should leave nobody with an excuse to err

<br> and 
<li>some observable activity to change or disable web pages containing trademark infringements against our Firebird brand.
</ul>
<p>
The branding statement does a lot of footwork to make and reiterate the point that the product must be referred to as "Mozilla Firebird browser" and, preferably, as "Mozilla browser".  It's not a "back-down" on the choice to take Firebird's brand-name.  Still, now, provided all of the satellite websites comply AND "Firebird" disappears from all of their pages, documents and tags next month, as promised, then we can take comfort that the letter of the law, at least, is to be observed.
<p>
We wish that it had never become a question of confronting Mozilla.  As a proposal, the name-change from "Phoenix" to "Firebird&trade;" should never have gotten past the ethical questions raised in their forums and committees last December about taking another Open Source project's name.
<p>
We appreciate the attempts by Debian project admin Jonathan Walther, to try to mediate between us and the Mozilla folk.  We look forward to some kind of contact from Mozilla's leaders soon.  We still have quite a lot to discuss with them. We trust that Mozilla will continue to do what is required to proactively cleanse the Web and their browser project of the brandname abuses, including the &trade; claim on our Firebird mark.  
<p>
Firebird users who would like to help Mozilla in this task can do so by posting any infringements you find to OUR <a href="http://www.yahoogroups.com/community/Firebird-general">Firebird-General list</a>.

<p><i>The Firebird Team</i>

<hr size=2>
<b><font color="red">14-April-2003</font> Mozilla Takes Firebird's Name for its Browser</b>
<p>
The <a href="http://www.mozilla.org">Mozilla</a> subproject formally known as <a href="http://www.mozilla.org/projects/phoenix/">"Phoenix"</a> has decided to <a href="http://www.mozillazine.org/talkback.html?article=3075">rename its lightweight browser product to "Firebird"</a>. The Firebird development team, and the larger Firebird community, <b>strongly oppose</b> this change. 

<p>
We of the Firebird project are proud of our product and devoted to our branding.  Our marks are not there for the taking and our advice is that the law is on our side:  we have nearly three years of widespread international use of our mark.  
<p>
Legal issues notwithstanding, we take this as a slap in the face to the entire open source community. The easy route will be for Mozilla to quickly retract what it has done and pay the open source community the courtesy of an apology.  The hard route, which we sincerely hope to avoid, will be Mozilla proceeding with this, losing its Open Source cred and goodwill and taking the risk of making its product untouchable by the distributors.
<p>
We are dismayed that Firebird was not contacted before Mozilla's decision was finalized. This breach of principle has occurred in the heartland of open source, where we are all supposed to be above such things.  The attitude adopted by Mozilla's vocal proponents of the change, in essence "if they don't like it they can sue", is contrary to the generally accepted core values of the open source community.  It reflects poorly on a community that voices strong opinions when corporate entities employ similar tactics.  If Open Source is to win, we can do without brother cynically stealing from brother.
<p>  
Please make your feelings on this issue known by emailing and posting to the <a href="http://www.yahoogroups.com/community/Firebird-general"> Firebird-general list</a>.
<p>
Firebird thanks you for your support.

<p>
<u>The Firebird Admins</u><br>
<blockquote>
John Bellardo, Helen Borrie, Pavel Cisar, Ann Harrison, David Jencks, Sean Leyne,  
Mark O'Donohue, Dmitry Yemanov
</blockquote>
<p>
-->
