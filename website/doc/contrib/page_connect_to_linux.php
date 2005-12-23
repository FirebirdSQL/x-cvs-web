<?php

if (eregi("page_connect_to_linux.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="100%">

  <tr>
     <td>    

<P STYLE="margin-bottom: 0cm"><BR>
</P>
<H1 CLASS="western" ALIGN=CENTER>
Connecting to Firebird 1.5 on Linux</H1>
<P ALIGN=CENTER STYLE="margin-bottom: 0cm">Mark O'Donohue</P>
<P ALIGN=CENTER STYLE="margin-bottom: 0cm">14-Feb-2005</P>

<P STYLE="margin-bottom: 0cm"><BR>
</P>
<blockquote><font color=#2e8b57>
<i><b>"What causes a non-root user to be refused a connection?"</b></i></font>
</blockquote>
Often users on remote client encounter problems with trying to connect to Firebird
on Linux using a non-root user, although they can connect as root.  Here I look at some of the questions people ask and try to explain the details you need.
<p>

Assuming we are talking about these users using isql to get to the database, rather than an application connecting via a language interface such as the .NET provider, this condition occurs only for Classic and local access.
<p>
There is a number of likely causes:
<ol>
<li>user not in group firebird
<li>user does not have physical write access to db file
<li>and one extra point:  remote access will need Firebird user name and password.
</ol>
<p>
The reason root user works fine is that, as a *special* user, root has physical write access to both the /opt/firebird/* files and the database file, whereas a normal user doesn't.
<p>
Let's look at the non-root users's problems now.
<p>
<ol>
<li>User not in group firebird
<p>You will see this error:
<pre>
$/opt/firebird/bin/isql
SQL> connect '/var/firebird/yourdb.fdb'; Statement failed, SQLCODE = -902
  operating system directive open failed
</pre>

This tells you that do not have the filesystem privileges to allow you *write* access to the /opt/firebird/* files.
<p>
<b>Solution</b>: That user needs to be added to the firebird group.
<table>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>
    <td valign="top"><pre>$groups</pre></td>
    <td valign="top">- will list the user groups 
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>
    <td valign="top"><pre>$usermod -G firebird &lt;username&gt;</pre></td>
    <td valign="top">- will add them.  Be careful, as you need to format the command with any existing groups they are in as well.  For example,
<pre>
$usermod -G firebird,cdwriter,.. &lt;username&gt;
</pre>
For this, my suggestion is to use a GUI admin tool to add the user to the group.
<p>
The user also needs to logoff and log back on for the new group add to take effect.
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
</table> 

<p>
</li>

<li><font color=#2e8b57>
<b><i>"Some of the users were having the problem, even if they added the non-root user to the firebird user group."</i></b></font>
<p>
The user does not have write access to db file.  The error you will see is:
<pre>
$/opt/firebird/bin/isql
SQL> connect '/var/firebird/yourdb.fdb'; 
Statement failed, SQLCODE = -551
No permission for read-write access to database /var/firebird/yourdb.fdb

</pre>
You have write access to the /opt/firebird/* files, but no *write* access to the actual database file, usually indicating that the group write permission is missing:
<pre>
-rw-r--r--  1 firebird firebird 29M Feb 14 12:54 /var/firebird/yourdb.fdb
</pre>

To add the missing group write permission:
<pre>
$chmod ug+rw &lt;dbfile.fdb&gt;
</pre>
</li>

<li>Remote access will need user name and password.
<p>
Do take note that any remote access, even by root user, will require user name and password.  If you forget, you'll see this error:
<pre>
$ /opt/firebird/bin/isql
Use CONNECT or CREATE DATABASE to specify a database 
SQL> connect 'localhost:/var/firebird/yourdb.fdb';
 
Statement failed, SQLCODE = -923
Connection rejected by remote interface
</pre>
<p>
<p>
On Classic, the root local user can connect directly:
<pre>
  /opt/firebird/bin/isql /var/firebird/yourdb.fdb 
</pre>
whereas, for Superserver, you will always need to do your local connection through localhost and will need the user name and password:
<pre>
  /opt/firebird/bin/isql localhost:/var/firebird/yourdb.fdb -u &lt;x&gt; -p &lt;y&gt
</pre>
If you are calling isql directly from the Firebird bin directory, Windows users sometimes need to be reminded to use the "dot-slash" convention: 
<pre>
 <b>./</b>isql localhost:/var/firebird/yourdb.fdb -u &lt;x&gt; -p &lt;y&gt
</pre>
</li>
</ol>
<P STYLE="margin-bottom: 0cm"><BR>
<a href="index.php?op=doc&id=techinfo" style="color:#228b22;text-decoration:none;">
<small><b>BACK TO TECH ARTICLES INDEX</b></small></a>
      </td>
  </tr>
</table>
