<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H3>Changes on the Web Site</H3>
We are currently (Sept/Oct '04) putting the website through a makeover. Things might appear a bit chaotic now and then - please be patient with us!
<p>
The first thing you will notice is cosmetic: a slight change in colour scheme.  If you are looking at a page with a pale green background and a side menu in a slighter darker shade of pale green, then it has already happened.<img src="images/smiley.gif"> &nbsp; Although some small changes have been made to the way the web app builds pages, we continue to use the great <a href="index.php?op=devel&sub=web&id=webtools">content management tools</a> developed by Pavel.<p>
This may not be the end of the cosmetics story, since there will be more hands at work as the makeover progresses. However, the general objective of cosmetic changes is to brighten up our image and make the pages appear more open.
<p>
You will notice that, if you are not on the Home page, every page has its section name inscribed beneath the logo at the top left of the page.  Firebird insignia now no longer dominates the &quot;content&quot; pages.  Pages also have their own distinct inscriptions in the title bar of your browser.
<h4>Organisation of Content</h4>
Some reorganisation of content is planned.  
<dl>
<dt><b>User Documentation</b>
<dd>We are starting with the documentation links:  the Web Team will be working with the Documentation Team to put all of the stuff relating to user documentation in one location on the site. Pages, links, jumps and on-line help will be organised to make it easy to find what you need.
<p>
<dt><b>Project Documentation</b>
<dd>Part of the makeover is to get our essential documentation for developers into place on the site.  We haven't done well with this in the past.  The current high level of activity in the HEAD and Vulcan branches make it imperative to fix the situation.
<p>
<dt><b>Novice's Guide</b>
<dd>This is another neglected area that is coming under review and rewrite during makeover.  When we are done, it will be very obvious to any new Firebird user where s/he needs to go to find the basic essentials. 
<li>Most of the content currently in the Novice's Guide will move into the History section. <li>We will include a new &quot;Tools&quot; page here to help new users find admin clients, UDF libraries and other useful utilities.
<li>There will be installation guides here.
<p>
<dt><b>F A Q</B>
<dd>Yes, we know the FAQ section is pathetic.  This is going to be updated, augmented and properly organised.  We want to wake this section up and really make it work.
<p>
<dt><b>Home Page</b>
<dd>We want to reduce the "noise" on the home page, making it more of an introduction to the rest of the site and less of a vehicle for stale news.  News headlines will be retained and limited in number so that they don't dominate the picture.  Topical items will be linked through to the main page of the section they refer to.  The "hottest" news item will appear in a the Newsflash block in the top left-hand corner of the home page.
<p>
<dt><b>Content Management</b>
<dd>During the course of the makeover, the Web Team will be augmented so that web site maintenance no longer gets left in the hands of the same busy people who are often heavily occupied with more urgent tasks around the project.  Ideally, we will have a content manager/editor and a web author for each team lead around the project whenever assistance is needed.  
 
</dl>
<p><h4>Latest Developer reports</h4>
<ul>
<li><a href="index.php?op=devel&sub=web&id=webff200409">Helen Borrie, 2004-09-30</a>
</ul>
<p>
<table cellpadding=2 border=0>
  <tr bgcolor="#C64108">
    <td> 
      <table cellpadding=4> 
        <tr bgcolor="#FFFFFF"> <!-- "#BBEAD7" -->
          <td> 
<b>Anyone who currently feels a calling to assist in one of these roles, please make yourself known by joining the <a href="https://lists.sourceforge.net/lists/listinfo/firebird-website">Web Team mail list</a> and signalling your interest.  Please don't offer unless you really intend to take charge of your role and make a difference.</b>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table> 


<?php
$action="topics";
$fid=7;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>