<?php
if (eregi("page_alvarez.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Autostarting IB/Firebird on Linux</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<!-- SUBSTITUTE PAGE LOGO BELOW -->
<td>
Notes and shell script from <a href="mailto:alvarezje@hotmail.com?Subject=Re :: Autostart shell script for IB">Jorge Alvarez</b><hr size=1></td>
</tr>

<tr>
<td colspan=2>

Here's what I do under Linux Mandrake. It should do the trick under Red Hat
too.
<ol>

<li>copy the script below as 'ibserver' to /etc/rc.d/init.d<p>
<li>cd to this directory and chmod 700 ibserver<p>
<li>cd /etc/rc.d/rc3.d<p>
<li>ln -s /etc/rc.d/init.d/ibserver S86ibserver<p>
<li>ln -s /etc/rc.d/init.d/ibserver K40ibserver
</ol>


InterBase should start next time you reboot your Linux server.
<hr size=1>

Here's the script:
<blockquote>
</font>
<font face="Courier New"><pre>
#!/bin/sh
# file name ibserver
# ibserver script - Start/stop the InterBase daemon
# Set these environment variables if and only if they are not set.
: ${INTERBASE:=/opt/interbase}
: ${ISC_USER:=SYSDBA}
: ${ISC_PASSWORD:=masterkey}
# WARNING: in a real-world installation, you should not put the
# SYSDBA password in a publicly-readable file. To protect it:
# chmod 700 ibserver.sh; chown root ibserver.sh
export INTERBASE
export ISC_USER
export ISC_PASSWORD
ibserver_start()
{
 # This example assumes the InterBase server is
 # being started as UNIX user ¡¯interbase¡¯.
 echo '$INTERBASE/bin/ibmgr -start -forever' | su root
}
ibserver_stop()
{
 # No need to su, since $ISC_USER and $ISC_PASSWORD validate us.
 $INTERBASE/bin/ibmgr -shut -password $ISC_PASSWORD
}
case $1 in
 'start') ibserver_start ;;
 'start_msg') echo 'InterBase Server starting...\c' ;;
 'stop') ibserver_stop ;;
 'stop_msg') echo 'InterBase Server stopping...\c' ;;
 *) echo 'Usage: $0 { start | stop }' ; exit 1 ;;
esac
exit 0
</pre></font>
</blockquote>

</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->
</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>