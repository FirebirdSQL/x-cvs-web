<?php
if (eregi("page_zamana.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>How we installed IB 6 on Red Hat 6.2 &amp; 7</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<td>
<font size="-1"><a href="mailto:zamana@zip.net"><b>C. R. Zamana</b></a> and others describe how they did their IB 6 installations<hr size=1></td>
</tr>
<tr>
<td colspan=2><font face="Verdana" size="-1">
<b>Red Hat 6.2</b><p>
Installing IB on Linux is very easy, or, at least if compared
to Oracle&nbsp;&nbsp;<img src="images/smiley.gif" width=17 height=15>
<P>
Well, this is My Installation (TM):
<P>
Login as &quot;root&quot;.
<ol>

<li>Create the user/group &quot;interbase&quot;</li>

<li>Install the package:<p>
&nbsp;&nbsp;&nbsp;&nbsp;rpm -ivh InterBaseSS_...<p></li>

<li>Add the &quot;/opt/interbase/bin&quot; to your PATH ( in /etc/profile, for example )</li>

<li>Add the &quot;localhost&quot; to your /etc/hosts.equiv ( create it if necessary )</li>

<li>Change the ownership of your IB installation:<p>
&nbsp;&nbsp;&nbsp;&nbsp;chown -R interbase.interbase /opt/interbase<p></li>

<li>Add the following line to your /etc/rc.d/rc.local to get the IB running
when you reboot your machine:<P>
&nbsp;&nbsp;&nbsp;&nbsp;/bin/su - interbase -c&quot;/opt/interbase/bin/ibmgr -start > /dev/null&quot;</li>

<li>Enjoy.&nbsp;&nbsp;<img src="images/tux.gif" width=41 height=49></li>
</ol>
<hr size=1>

<b>Red Hat 7</b> - extra notes posted to newsgroup by <a href="mailto:jakel@ecweb.cl">José Antonio Akel S</a>, forwarded by Frank Schlottmann-Gödde: 
<P>
Here are all the tips to get it working on Red Hat 7:<ol>

<li>first, you have to install an older version of libncurses: &nbsp;libncurses.so.3<br>

You can grab them from an older RedHat 6.x box, or from the <a href="ftp://ftp.redhat.com/pub/redhat/updates/i686/">RedHat FTP site</a>.<P></li>
<li>Install the update for glibc. You can <a href="ftp://ftp.redhat.com/pub/redhat/updates/i686/glibc-2.1.94-3.i686.rpm">download it</a> from the RedHat FTP site also.<P></li>

<li>If you are installing the Classic Server: &nbsp;since RedHat 7 comes with xinetd instead of inetd, you need to add the file<br>
&nbsp;&nbsp;&nbsp;&nbsp;/etc/xinetd.d/ibase<br>
and put the following lines on it:
<PRE><font face="Courier New" size=2">
----Start--------

service gds_db
{
      socket_type     = stream             wait            = no
      user            = root
      server          = /usr/local/sbin/gds_inet_server
      log_on_failure  += USERID
}

----End---------
</font></pre></li>

<li>If you are installing the Super Server: <BR>
&nbsp;&nbsp;&nbsp;&nbsp;restart xinetd (/etc/init.d/xinted restart)<p></li>

<li>Add the line "localhost" to the file "/etc/hosts.equiv". If the file doesn't exist, create it.<P></li>
<li>Start the server doing<br>
&nbsp;&nbsp;&nbsp;&nbsp;/opt/interbase/bin/ibguard &amp;<P></li>
<li>To connect, you should check that you are using the correct user/password:<br>
&nbsp;&nbsp;&nbsp;&nbsp;/opt/interbase/bin/isql 'calama://database/dbecweb.gdb' -u sysdba -p masterkey</li>
</ol>

<hr size=1>
<B>MORE NOTES FOR INSTALLING WITH xinetd</b><P>
Mark O'Donohue, one of the Firebird Admins, emailed <a href="http://www.interbase2000.org/Ivo.Panacek@regionet.cz">Ivo Panacek  (Czechoslovakia)</a>  and Ivo sent some Redhat 7.0 xinetd scripts, with permission to use them at the Firebird project.  You can get them by going to the notes on <a href="http://sourceforge.net/bugs/?func=detailbug&amp;bug_id=124333&amp;group_id=9028"> Firebird bug report list Bug #12433</a>.<P>
In summary, xinetd and inetd store config entries in DIFFERENT PLACES... Ivo wrItes: 
I'm switching to 7.0 on my workstations (home+office) mainly because my video card (Matrox G400 on both) work MUCH better under XFree4.0.1. 
<P>
                             Difference between inetd and xinetd is simple: entries are not just 
                             lines in /etc/inetd.conf but files in /etc/xinet.d directory. 
                             So life with xinetd is more simple. You need just add two files 
                             on proper place and rpm --erase removes them itself. No patching 
                             in %post and %postun sections. Maybe it would be better to create 
                             separate RPM for RedHat 6.x and for RedHat 7.x. 


<hr size=1>

</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->
</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>