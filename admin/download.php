<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/downloads.html";
$result = mysql_query("select radmindownload, radminsuper from authors where aid='$aid'");
list($radmindownload, $radminsuper) = mysql_fetch_row($result);
if (($radmindownload==1) OR ($radminsuper==1)) {

function DownloadAdmin() {
    global $hlpfile, $admin, $bgcolor4;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    OpenTable4();
    echo "
    <center>
	   <font size=4>
	      <b>".translate("Download")."</b>
	   </font>
	</center>
    <form action=admin.php method=post>
       <center>
	      <table border=1 width=100%>
		     <tr bgcolor=$bgcolor4>
	            <td>
				   
				   <center>".translate("ID")."
				</td>
	            <td>
				   
				   <center>".translate("Counter")."
				</td>
	            <td>
				   
				   <center>".translate("URL")."
				</td>
	            <td>
				   
				   <center>".translate("Filename")."
				</td>
	            <td>
				   
				   <center>".translate("Version")."
				</td>
	            <td>
				   
				   <center>".translate("Filesize")."
				</td>	
	            <td>
				   
				   <center>".translate("Date")."
				</td>
		    <td>
			    <center>".translate("Category")."
				</td>
		    <td>
				   ".translate("Functions")."
				</td>
			</tr>
			<tr bgcolor=$bgcolor4>
			   <td colspan=9>
			      <img src=images/pixel.gif width=1 height=1 border=0>
			   </td>
			</tr>";
    $result = mysql_query("select did, dcounter, durl, dfilename, dfilesize, ddate, dver, dcategory from downloads order by did");
    while(list($did, $dcounter, $durl, $dfilename, $dfilesize, $ddate, $dver, $dcategory) = mysql_fetch_row($result)) {
	echo "
	        <tr bgcolor=$bgcolor1>
			   <td align=center>
			      $did
			   </td>
	           <td align=center>
			      $dcounter
			   </td>
	           <td align=center>
			      <a href=$durl>".translate("Download")."</a>
			   </td>
	           <td align=center>
			      $dfilename
			   </td>
	           <td align=center>
			      $dver
			   </td>
	           <td align=center>
			      $dfilesize
			   </td>	
	           <td align=center>
			      $ddate
			   </td>
	           <td align=center>
			      $dcategory</a>
			   </td>
	           <td align=center>
			      <a href=admin.php?op=DownloadEdit&did=$did>".translate("Edit")."</a>
				   | 
				  <a href=admin.php?op=DownloadDel&did=$did&ok=0>".translate("Delete")."</a>
			   </td>
			</tr>
			<tr height=10>
			   <td colspan=10 bgcolor=black><img src=images/pixel.gif width=1 height=1 border=0></td>
			</tr>";
    }
    echo "</table></form>
<br>
<br>
</center>
<font size=4>
   <b>".translate("Add Download")."</b>
   <br><br>
<font size=2>
   <form action=admin.php method=post>
<table border=0 width=100%>
   <tr>
      <td> 
	     ".translate("Download URL:")." 
	  </td>
	  <td>
	     <input type=text name=durl size=50>
	  </td>
   </tr>
   <tr>
      <td>
          ".translate("Counter:")." 
	  </td>
	  <td>
	     <input type=text name=dcounter size=10 maxlength=30>
	  </td>
   </tr>
   <tr>
      <td>
         ".translate("File Name:")." 
	  </td>
	  <td>
	     <input type=text name=dfilename size=50 maxlength=30>
	  </td>
   </tr>
   <tr>
      <td>
          ".translate("Version:")." 
	  </td>
	  <td>
	     <input type=text name=dver size=5 maxlength=10>
	  </td>
   </tr>
   <tr>
      <td>
          ".translate("File Size:")." 
	  </td>
	  <td>
	     <input type=text name=dfilesize size=50 maxlength=30>
	  </td>
   </tr>
   <tr>
      <td>
          ".translate("Owner Homepage:")." 
	  </td>
	  <td>
	      <input type=text name=dweb size=50>
	  </td>
   </tr>
   <tr>
      <td>
          ".translate("Owner:")." 
	  </td>
	  <td>
	      <input type=text name=duser size=50 maxlength=30>
	  </td>
   </tr>
   <tr>
      <td>
	      ".translate("Category:")." 
	  </td>
	  <td>
	     <input type=text name=dcategory size=25 maxlength=30>";
echo "       <SELECT NAME=\"sdcategory\">";
		$result = mysql_query("select distinct dcategory from downloads order by dcategory");	
        while (list($dcategory) = mysql_fetch_row($result)) {
echo "           <option $sel value=\"$dcategory\">$dcategory</option>";
        }
echo "	     </SELECT></td></tr><tr><td> ";
	echo "
	       ".translate("Description:")." 
		</td>
		<td>
		    <textarea name=ddescription cols=48 rows=10></textarea>
		</td>
	</tr>
	      <td>
	     ".translate("Set Priviledges?:")." 
	  </td>
	  <td>
	     <SELECT NAME=\"privs\">
		      <option $sel value=\"0\">Anonymous</option>
			  <option $sel value=\"1\">User</option>
			  <option $sel value=\"2\">Admin</option>
		 </select>
	  </td>
	<tr>
	   <td>
       </td>
	</tr>
</table>
                     <input type=hidden name=op value=DownloadAdd>
                     <input type=submit value=".translate("Add").">
                  </form>
               </td>
	        </tr>
         </table>
      </td>
   </tr>
</table>";
    include("footer.php");
}

function DownloadEdit($did) {
    global $hlpfile, $admin;
    include ("config.php");
    include ("header.php");
    GraphicAdmin($hlpfile);
    $result = mysql_query("select did, dcounter, durl, dfilename, dfilesize, ddate, dweb, duser, dver, dcategory, ddescription, privs from downloads where did='$did'");
    list($did, $dcounter, $durl, $dfilename, $dfilesize, $ddate, $dweb, $duser, $dver, $dcategory, $ddescription, $privs) = mysql_fetch_row($result);
    OpenTable4();
    echo "
    <center>
	   <font size=4>
	      <b>".translate("Edit Download")."</b>
	   </font>
	</center>
    <form action=admin.php method=post>
       <input type=hidden name=did value=$did>
       <input type=hidden name=dcounter value=$dcounter>
<table border=0 width=100%>
   <tr>
      <td>
         ".translate("Download URL:")." 
	  </td>
	  <td>
	     <input type=text name=durl size=50 value=\"$durl\">
	  </td>
   </tr>
   <tr>
      <td>
         ".translate("File Name:")." 
	  </td>
	  <td>
	      <input type=text name=dfilename size=50 maxlength=30 value=\"$dfilename\">
	  </td>
   </tr>
   <tr>
      <td>
         ".translate("Version:")." 
	  </td>
	  <td>
	     <input type=text name=dver size=5 maxlength=10 value=\"$dver\">
	  </td>
   </tr>
   <tr>
      <td>
         ".translate("File Size:")." 
	  </td>
	  <td>
	     <input type=text name=dfilesize size=50 maxlength=30 value=\"$dfilesize\">
	  </td>
   </tr>
   <tr>
      <td>
          ".translate("Owner Homepage:")."
	  </td>
	  <td>
	      <input type=text name=dweb size=50 value=\"$dweb\">
	  </td>
   </tr>
   <tr>
      <td>
         ".translate("Owner:")." 
	  </td>
	  <td>
	     <input type=text name=duser size=50 maxlength=30 value=\"$duser\">
	  </td>
   </tr>
   <tr>
      <td>
         ".translate("Category:")." 
	  </td>
	  <td>
	     <input type=text name=dcategory size=25 maxlength=30 value=\"$dcategory\">
		 ";

echo "       <SELECT NAME=\"sdcategory\">";
               $result = mysql_query("select distinct dcategory from downloads order by dcategory");
               while (list($dcategory) = mysql_fetch_row($result)) {
    echo "      <option $sel value=\"$dcategory\">$dcategory</option>";
    }
	echo "   </SELECT>
	  </td>
   </tr>
   <tr>
      <td>";
	echo "
         ".translate("Description:")." 
	  </td>
	  <td>
	     <textarea name=ddescription cols=48 rows=10>$ddescription</textarea>
	  </td>
   </tr>
   <tr>
      <td>
	     ".translate("Change Date?:")." 
	  </td>
	  <td>
	     Yes? <input type=checkbox name=ddate value=yes>
	  </td>
   </tr>
      <tr>
      <td>
	     ".translate("Change Priviledges?:")." 
	  </td>
	  <td>
	     Yes? <SELECT NAME=\"privs\">
		      <option $sel value=\"0\">Anonymous</option>
			  <option $sel value=\"1\">User</option>
			  <option $sel value=\"2\">Admin</option>
			  </select>
	  </td>
   </tr>
   <tr>
      <td>
      </td>
   </tr>
</table>
   <input type=hidden name=op value=DownloadSave>
   <input type=submit value=".translate("Save Changes").">
</form>
                  </td>
			 </tr>
	     </table>
	  </td>
   </tr>
</table>";
    include("footer.php");
}

function DownloadSave($did, $dcounter, $durl, $dfilename, $dfilesize, $dweb, $duser, $ddate, $dver, $dcategory, $sdcategory, $ddescription, $privs) {
    if (!$dcategory) { 
       $dcategory = $sdcategory;
	}
       if ($ddate=="yes") {
       $time = date("Y-m-d");
       mysql_query("update downloads set dcounter='$dcounter', durl='$durl', dfilename='$dfilename', dfilesize='$dfilesize', ddate='$time', dweb='$dweb', duser='$duser', dver='$dver', dcategory='$dcategory', ddescription='$ddescription', privs='$privs' where did='$did'");
    }
    else {
       mysql_query("update downloads set dcounter='$dcounter', durl='$durl', dfilename='$dfilename', dfilesize='$dfilesize', dweb='$dweb', duser='$duser', dver='$dver', dcategory='$dcategory', ddescription='$ddescription', privs='$privs' where did='$did'");
    }
    Header("Location: admin.php?op=DownloadAdmin");
}

function DownloadAdd($dcounter, $durl, $dfilename, $dfilesize, $dweb, $duser, $dver, $dcategory, $sdcategory, $ddescription, $privs) {
   	if (!$dcategory) { 
       $dcategory = $sdcategory;
	}
	   $time = date("Y-m-d");
    mysql_query("insert into downloads values (NULL, '$dcounter', '$durl', '$dfilename', '$dfilesize', '$time', '$dweb', '$duser', '$dver', '$dcategory', '$ddescription', '$privs')");
    Header("Location: admin.php?op=DownloadAdmin");
}


function DownloadDel($did, $ok=0) {
    if($ok==1) {
	mysql_query("delete from downloads where did=$did");
	Header("Location: admin.php?op=DownloadAdmin");
    } else {
	include("header.php");
	GraphicAdmin($hlpfile);
	OpenTable4();
	echo "<center><br>";
	echo "<font size=3 color=Red>";
	echo "<b>".translate("WARNING: Are you sure you want to delete this Download file?")."</b><br><br><font color=Black>";
    }
	echo "[ <a href=admin.php?op=DownloadDel&did=$did&ok=1>".translate("Yes")."</a> | <a href=admin.php?op=DownloadAdmin>".translate("No")."</a> ]<br><br>";
	echo "</TD></TR></TABLE></TD></TR></TABLE>";
	include("footer.php");	
}

} else {
    echo "Access Denied";
}
?>
