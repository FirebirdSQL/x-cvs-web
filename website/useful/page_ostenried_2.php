<?php
if (eregi("page_ostenried_2.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Instant GBAK &amp; RESTORE on Win2K</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<td align=left>
<font size="-1"><b>from <a href="mailto:chef_007@gmx.net" style="text-decoration:none;color:#800080;">Markus Ostenried</a><hr size=1></td>
</tr>

<tr>
<td colspan=2><font face="Verdana" size="-1">


This .REG file is for Win2k but can simply be adjusted for WinNT, 98, etc.
What it does is it creates a new entry in the Windows Explorer's context
menu for *.gdb and *.gbk files:<p>
'Backup' or 'Restore'<p>
Since you have to include the username and password in the .REG file it is
mainly for development machines.<p>
gbak.exe needs to be in the windows path or the complete path to gbak
has to be put into the .REG file.
<p>
TO DOWNLOAD:<ul type=circle>
<li>Download file <a href="download.php?op=file&amp;id=IB_Shell_Backup_Restore_Win2k.reg" style="text-decoration:none;color:#0000ff;">IB_Shell_Backup_Restore_Win2k.reg</a><p>
<li>Double-click on the file to install in the Win2K Registry. 
</ul>

TO USE:
<ul type=circle>

<li>double click on &quot;test.gdb&quot; and you get a &quot;backup.gbk&quot;<p>
<li>double click on &quot;backup.gbk" and you get a &quot;restored.gdb"
</ul>

{Editor's note :: I didn't succeed in editing this to have RegEdit accept it in NT4 SP 5.  It seems it was more than just changing the header entry from &quot;Windows Registry Editor Version 5.00&quot; to &quot;REGEDIT4&quot;.  If anyone succeeds in getting an installable .reg file for NT4, please <a href="mailto:helebor@dingoblue.net.au?Subject=GBAK KEYS FOR REG FILE style="text-decoration:none;color:#800080;">let me know</a> and I will update this page.

</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->

</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>