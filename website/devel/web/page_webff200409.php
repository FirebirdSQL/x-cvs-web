<?php

if (eregi("page_webff200409.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">

  <tr>
    <td class="centre" colspan=2>
<h4>Developer's Report for August/September 2004</h4>
    </td>
  <tr>
  <tr>
    <td>Project:
    </td>
    <td><h5>Firebird Web Makeover</h5>
    </td>
  </tr>
  <tr>
    <td>Developer: 
    </td>
    <td>Helen Borrie
    </td> 
  </tr>
  <tr> 
    <td colspan=2>
<hr size=1>
A lot has been happening, with more to come.
<ul>
<li>Documentation of the content management tools has begun.  When we (that's Pavel, Paul V. and me, at this point) get the reorganisation of content into a plan we all like, I'll update the lower-level details -- mainly in diagram form -- to make site and sub-site maintenance obvious and consistent for everyone.
<p>
<li>Having only dabbled with PHP before, I wrote a web-app from scratch, using Pavel's model, and put it up live at <a href="http://www.firebird-books.net">http://www.firebird-books.net</a>.  It was almost too easy.  I hope potential web team members will take courage from this! <img src="images/smiley.gif"> &nbsp;The PHP you need to know is minimal and the answers are easy to find on the web.
<p> 
<li>I made totally new graphics, some mods to the top menu, a new colour scheme and a general reduction in &quot;top-weight&quot; to try to bring a fresher, lighter look (which reminds Pavel of peas, a popular item of Czech cuisine!)
<p>
<li>I added a bit of new logic to the app so that all pages except the home page get a custom header that informs you where you are.  The same logic enables each section to have its own title.
<p>
<li>Behind the scenes, Pavel's elegant design is cluttered with unused and obsolete garbage that has accumulated over five years. We're chasing people to clean up, so thanks to those who already heard and took the required action.
<li>Worse, the foundation sub-site currently exists in an &quot;island&quot; that is linked by scripts to the CVS tree and makes poor use of relative path addressing.  Currently it doesn't take a big error to break things in the main site. At present I'm redeveloping the whole Foundation section so that it can move into the main application while keeping its distinctive look-and-feel.
<p>
<li>You'll find some new content scattered around the sections;  and the dead FAQs have now been buried forever.  I added a few new ones; and we are going to devise a little PHP function so anyone can add more.  The big work on content is still work-in-progress.  There's a sort of <a href="index.php?op=devel&sub=web">roadmap</a> but it's fairly volatile at the moment.
</ul>
<h4>What's next</h4>
<p>
My attempt to recruit web team members from ffMembers hasn't borne any fruit so far. What is it they say about the Road to Hell? In the forthcoming weeks, I'll be pushing this again, taking it out to firebird-general.
<p>
Once Pavel's newborn son Viktor settles into a humane sleep pattern, we are going to rebuild the web branch of the CVS tree to reflect the new site structure. Pavel will write some Python code to do slightly asynchronous, one-way updates from the live web zone to CVS. I lost a battle -- correctly, I suppose -- to take the html units out of CVS.  It will save a lot of time and trouble to improve the current absurd situation where humans are maintaining the CVS and live versions separately and manually and, in the case of the foundation section, bi-directionally.
<p>
<i>Helen Borrie<br>
NSW, Australia</i>
<hr size=1>

<!-- ------------------------------------------- -->
    </td>
  </tr>
</table>
<p>
Back to <A href="index.php?op=devel&sub=web">Web Team page</A>
<p>