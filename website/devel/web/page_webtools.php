<?php
if (eregi("page_webtools.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<h3>Web Tools</h3>
Currently we have two useful tools at our disposal for developing the Firebird website, both written in PHP 4:
<ul>
<li>the web application design, written by webmaster Pavel Cisar, that generates the pages from &quot;chunks&quot; whenever
an http request is served
<li>incorporated inside the application, a system of interactive dialogs, enabling
<ul type=square>
<li>project members and others to create login accounts for themselves
<li>authorised accountholders to update certain items interactively, i.e. through the web page
<li>ordinary &quot;guest&quot;-style accountholders to participate in web-based forums
</ul>
</ul>

<h4>The Web Application Architecture</h4>
The architecture is quite simple and does not require web team members and project team leads to have more than a very basic
understanding of the PHP scripting language.  A great resource can be found at <a href="http://www.php.net/quickref.php"> the
quick-reference page</a> for the vast manual maintained by php.org.
<p>
The html "base" from which every page on the website is launched is index.php.  Chunks get fed into this code by include calls
from index.php (usually).  Chunk calls are sometimes nested, or enclosed inside a function.  Work your way through the source
in the $firebirdwebroot/ directory to track the sequence in which each page is determined and built. A typical page is made up
of chunks located in the main root and/or in subdirectories.  Some simple algorithms are used to decide the names of the
chunks to include.
<p>
<center> TO BE UPDATED </center>
<h4>The Interactive Part</h4>
The interactive part is built on txtForum, a GPL content management system in PHP, designed by Lauri Kasvandik, of Estonia.
 The readme
is <a href="http://zone.ee/txtforum/tf.doc/readme.htm">here</a>.  It has multi-language support and all of the pieces
that we need for user account management and login.  Currently, on this site, it is enabled for language support, account
management, the news board on the homepage and tech forums in each of the development areas.  The 'txt' part of the name 
refers to the fact that all of the data are stored in text files, rather than a DBMS. (Yeah, we'll mod it to use 
Firebird the day Sourceforge decides to install a Firebird server for us!)
<p>
You don't have to start any kind of executable to use the txtForum features.  Most of them are quite intuitive to follow 
during usage. One of the Roadmap objectives will be to make a brief HowTo page to iron out any wrinkles that show up in 
practice
<p>
While we are getting the 'Website Roadmap' into shape, web team members are encouraged to experiment with the  
text forums  and, if you're feeling really confident, with the news board.
<p>
<center> TO BE UPDATED </center>

