<?php

if (eregi("page_secur_diary01.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="90%">

  <tr>
    <td colspan=2>
<h4>Firebird 2 Security Diary</h4>

Alex Peshkov, 12-OCT-2004
<p>
I'll start with the things about which we have got an agreement (I hope) with Jim [Starkey: Vulcan developer] as a result of a long discussion.
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>
    <td width="60%">
<b>ITEM</b>
    </td> 
    <td>
<b>STATUS/COMMENT</b>
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>   
    <td>
<ol start=1>
<li>Make the security database completely invisible to the users. Drop the
     service "anonymous", which reports the real security database location.
This wonderful service(!!) doesn't require any user authentication, but can: 
<ol type=a>
<li>print pools info (actually does nothing with the new memory pools - thanks to NS).
<li>print current config settings (again does nothing, implementation was put in TODO in svc.cpp, but why should we report firebird.conf values to someone without a firebird login?).
<li>report the security database location (works and is used currently by gsec, dropped from my local tree).
</ol>
</ol>
    </td>
    <td>
Already done by me.
<p>
Two of three activities intended by Borland's design are already broken, <i>de facto</i>. The third should be broken because it does no good from a security point of view, and was needed only for the old-style gsec.
<p> 
My suggestion is to drop the anonymous service altogether. It's part of Borland's IB 5.x services and need not be supported any more.
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>   
    <td>
<ol start=2>
<li>
Add SQL commands to manage users' accounts -
     CREATE/MODIFY/UPDATE/DROP USER.
</ol>
    </td>
    <td>
Though they seem to be a little like &quot;foreign things&quot; for 2.0 (I need to have at least *one database* to manage
*servers* security of 2.0), these commands are desirable in all other respects, therefore - why not have them?
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>   
    <td>
<ol start=3>
<li>Use services to implement backward compatibility for isc_*_user()
     functions and GSEC. GSEC's switch -database is deprecated
     completely, added new one -server to manage security database on
     remote server.
</ol>
    </td>
    <td>
Already done by me
    </td>
  
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>   
    <td>
<ol start=4>
<li>Add server's salt, that is used in some combination with user name
     to build salt for SHA-1. It's value is stored in security
     database. Initialization is done during server installation with
     random value.
</ol>
    </td>
    <td>
Jim suggested using the host-name as the initial salt. His opinion was that having a separate file for the salt adds absolutely nothing from security point of view, but I have not got an answer from him - what to do if host name should be changed?
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>   
    <td>
<ol start=5>
<li>Let users modify their own passwords
</ol>
    </td>
    <td>
Already done by me
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
  <tr>   
    <td>
<ol start=6>
<li>
Don't create crypt plugins, instead always use SHA-1 to calculate password
     hashes, disabling use of the old encryption algorithm for password validation by default.
<p>
     Allow use of the old crypt method via a firebird.conf entry to control OldCrypt=0/1 (1 to use old hashes, 0
     default. 
</ol>
    </td>
    <td>
2-3 hours of work
    </td>
  </tr>
  <tr><td colspan=2><hr size=1></td></tr>
</table>


<h5>Problems known to me</h5>
They all are related to changes of remote protocol. I suggest keeping full compatibility with old clients for 2.0. Only when we get a good understanding of everything we want to change in the remote protocol -- not just the security aspects -- should we go ahead and make the changes for 3.0. 
<p>
The list:
<ol>
<li>A lot of people want to make passwords longer. But this makes
      login with an old fbclient impossible since it passes a short DES-hash,
      based on an 8-byte password.
<p>
<li>Some authentication methods (PAM, for example) like to be able to talk with the
      client to request some additional info from it. It appears that this
      will also break the old fbclient.
<p>
<li>Protect all exchanges (as variant - authentication) via network by
      assymetric keys encryption.
</ol>
<h5>Other ideas on the table</h5>
Jim [Starkey: Vulcan developer] suggested authentication plugins and also fb_user_info() as an API call.  To me, without long passwords and encrypted wire they look to be weighted on the too-hard side. They should be in roadmap for Firebird 3.0, but not now, I think. 
<p>
I think it's better to spend time before the 3.0 release at least fixing a lot of buffer overflows in the code.  Claudio [Valderrama] is doing it now, but I think that my helping with it would be very useful.
<p>
A couple of Mark O'Donohue's suggestions would be easy to implement and quite useful: 
<ol>
<li>Ability to have locked accounts and various ways of autolocking them after too many attempts to enter the wrong password for an account. 
<p>
Mark suggested managing it individually for each account. I think that having a common policy (like "lock account for 1 minute after 5 attempts to enter wrong password") seems much easier to manage and much more independent from any authentication plugin, which we will be able to choose later. 
<blockquote>
My reasoning on this :: If we stored personal users settings in security.fdb, as was initially suggested, it would be not very easy to port this wonderful feature to a set of arbitrary authentication plugins that was suggested by Jim for v.3.0.
</blockquote>
<p> 
<li>Capturing the IP address (also suggested by Jim) at login request time, of the node that tried to attach with the wrong login/password, it would be possible to extend this feature to IP autolocking - quite useful in case of bruteforce attacks with random logins.
</ol>

</table>
<p>
Back to <A href="index.php?op=devel&sub=engine">Core Engine index page</A>.
<p>


