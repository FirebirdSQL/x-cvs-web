<?php

######################################################################
# PHP-NUKE: Web Portal System
# ===========================
#
# Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)
# http://phpnuke.org
#
# This modules is to show the downloads section for users
#
# Based on MyPHPortal (http://sourceforge.net/projects/myphportal)
#
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################

if (!isset($mainfile)) { include("mainfile.php"); }
$ipp = 20;


function callscript() {
echo "
<script>
<!--

NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;

function show ( name ) {
  x = currentX;
  y = currentY + 20;
  if (NS4) {

    document.layers[name].xpos = parseInt ( x );
    document.layers[name].left = parseInt ( x );
    document.layers[name].ypos = parseInt ( y );
    document.layers[name].top = parseInt ( y );
    document.layers[name].visibility = \"show\";
  } else {
    document.all[name].style.left = parseInt ( x );
    document.all[name].style.top = parseInt ( y );
    document.all[name].style.visibility = \"visible\";
  }
}
function hide ( name ) {
  if (NS4) {
    document.layers[name].visibility = \"hide\";
  } else {
    document.all[name].style.visibility = \"hidden\";
  }
}

currentX = currentY = 0;

function grabEl(e) {
  if ( NS4 ) {
    currentX = e.pageX;
    currentY = e.pageY;
  } else {
    currentX = event.x;
    currentY = event.y;
  }
}

if ( NS4 ) {
  document.captureEvents(Event.MOUSEDOWN | Event.MOUSEMOVE);
}
document.onmousemove = grabEl;


//-->
</script>
";
}


function preface() {
  global $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $sitename;
?>

  
<div align="Center"><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+2">
   Firebird Downloads</font></font></font><br>
</div>
<font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1"><br>
<br>
     Download Options<br>
   <br>
   </font></font></font><small><b>Choice of server architecture</b></small><small><br>
   </small><small>  First you need to choose a Firebird server architecture. 
  There are two models the classic and the super  architecture.  On Microsoft 
 win32 platforms only the super server architecture is available.  Unix style 
 environments often have a choice of both the classic or super architecture. 
   If you are unsure start with the classic architecture which is a little 
 easier to experiment with and to learn the basics.  Then once you know  more
 you will be able to determine which architecture is best for  your installation.
  From a functional point of view both are equivalent and they are interchangable.
        </small>   
<blockquote>         
  <p><small><b>Classic</b></small><small><br>
     </small><small>    The classic architecture allows for programs to directly 
 open the database   file, It is architected to allow the same database to 
 be opened by several   programs at once.  The classic engine also allows 
remote connections  to local databases by providing an inetd or xinetd service 
(This spawns a  seperate task per user connection).</small></p>
           
  <p><small><b>Super</b></small><small><b><br>
     </b></small><small>The super server architecture provides a server process 
 and client   process cannot directly open the database file and all SQL requests
 are done  via the server using a socket.  The super server makes use of
lightweight   theads to process the requests.</small><small><br>
     </small><br>
     </p>
     </blockquote>
           
  <p><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
 Firebird Downloads</font></font></font><br>
     <br>
     <small>    The following different type Firebird server downloads are
 available: &nbsp;</small></p>
           
  <p><small><b>Most builds</b></small><small> are available for </small><small><b>
   Windows, Linux, Sun Solaris-Sparc</b></small><small> and </small><small><b>
   MAC OS-X (Darwin)</b></small><small>. &nbsp; </small></p>
           
  <p><small><b>Some builds</b></small><small> are available for </small><small><b>
   FreeBSD, &nbsp;Solaris-X86</b></small><small> and </small><small><b>AIX</b></small><small>
   . </small><small><br>
     </small><small>&nbsp;</small><small><br>
     </small><small>Firebird has also been </small><small><b>successfully 
built</b></small><small>   from source on </small><small><b>HP-UX</b></small><small>
 ,</small><small><b>   </b></small><small><b>SCO</b></small><small> and</small><small><b>
  NetBSD.</b></small><small>   </small></p>
           
  <p><small><b>Historically Firebird</b></small><small>, (under it's original 
 name) has also been built and run on the following platforms: </small><small>
   &nbsp;</small><small><b>DG-UX, SGI-IRIX, NCR3000, CRAY, DEC-Ultrix, DEC-VMS, 
 UnixWare, &nbsp;Apollo, &nbsp;OS2, </b></small><small><b>&nbsp;</b></small><small>
   and</small><small><b> HP MPE/XL</b></small><small>. &nbsp;</small><small>
   Anyone with an interest </small><small>in reviving these platforms is
welcome  and help is available through our </small><small><a href="newslists.php">
   newslists </a>
     </small><small>(although obtaining Apollo hardware might be dificult,
 and anyone seriously expressing an interest in reviving the HP MPE/XL port
 will have to be thick skinned).</small><br>
     </p>
     <font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1"><br>
     </font></font></font>         
  <table cellpadding="2" cellspacing="2" border="0" width="100%">
       <tbody>
         <tr>
           <td valign="Middle" nowrap="true" bgcolor="#e0e0e0">         
                 
        <ul>
                                   
          <li><small><a href="download_Stable_Builds.php"><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
     Stable Build (0.9.4)</font></font></font></a>
               </small></li>
                             
        </ul>
           </td>
           <td valign="Middle" bgcolor="#e0e0e0"><small>  Build 0.94 has
been  successfully run through the complete tcs test suite  and has proved
to be  stable in operation environments.</small><small><br>
           </small></td>
         </tr>
         <tr>
           <td valign="Middle" nowrap="true" bgcolor="#e0e0e0">         
                 
        <ul>
                                   
          <li><small><a href="download_Milestone_Builds.php"><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
     Milestone Build (0.9.5)</font></font></font></a>
               </small></li>
                             
        </ul>
           </td>
           <td valign="Middle" bgcolor="#e0e0e0"><small>  Build 0.9.5 has 
a number of new features/bug fixes has proved to be stable but has not necessarily
 (depending upon platform)  been passed through the TCS test suite or been
 used in an operational environment.</small><small><br>
           </small><small><br>
           </small></td>
         </tr>
         <tr>
           <td valign="Middle" nowrap="true" bgcolor="#e0e0e0">         
                 
        <ul>
                                   
          <li><small><a href="download_Nightly_Builds.php"><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
     Nightly Builds</font></font></font></a>
               </small></li>
                             
        </ul>
           </td>
           <td valign="Middle" bgcolor="#e0e0e0"><small>  Nightly the latest 
source is checked out and the install packages rebuilt.   This provides the 
latest up to date bug fixes/features but should only  be used for experimentation
 since no testing has been performed.         </small></td>
         </tr>
         <tr>
           <td valign="Middle" nowrap="true" bgcolor="#e0e0e0">         
                 
        <ul>
                                   
          <li><small><a href="download_Source_Code.php"><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
   Source Code</font></font></font></a>
               </small></li>
                             
        </ul>
           </td>
           <td valign="Middle" bgcolor="#e0e0e0"><small>The source code for 
Firebird is available for download or viewing online.</small><br>
           </td>
         </tr>
                 
    </tbody>         
  </table>
           
  <p><small><br>
     </small><small>In addition we also have a few experimental modules available 
from our browsable directory<small> </small></small><a href="http://firebird.sourceforge.net/download/experimental/"><small>
 here</small></a>
 <small>and a complete list of all previous Firebird releases is available
from our sourceforge   releases area </small><small><a href="http://sourceforge.net/project/showfiles.php?group_id=9028">
       here</a>
.</small></p>
   
  <p><small><br>
   </small></p>
   
  <p><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
 Related Download Sites</font></font></font></p>
   
  <p><small>The downloads on the page relate mainly to core Firebird modules, 
there are many projects surrounding the Firebird/Interbase community and the
following is a list of some related download sites where you are likley to
find.</small></p>
   
  <p><small>A good place to start is the </small><small><a href="http://www.ibphoenix.com">
 iphoenix</a>
   </small><small> website where they have a very large collection of Firebird/Interbase(r) 
related </small><small>materials including downloads&nbsp;</small><small><a href="http://www.ibphoenix.com/ibp_download.html">
 here,</a>
   </small> <small>contributed downloads </small><small><a href="http://www.ibphoenix.com/ibp_contrib_download.html">
 here,</a>
   </small> <small>and </small><small>Interbase related downloads </small><small><a href="http://www.ibphoenix.com/ibp_interbase_download.html">
 here.</a>
   </small></p>
            
 
<?php
}


function PrettySize($size) {
    $mb = 1024*1024;
    if ( $size > $mb ) {
        $mysize = sprintf ("%01.2f",$size/$mb) . " MB";
    }
    elseif ( $size >= 1024 ) {
        $mysize = sprintf ("%01.2f",$size/1024) . " Kb";
    }
    else {
        $mysize = $size . " bytes";
    }
    return $mysize;
}



function main() {
  global $PHP_SELF, $query, $min, $sortbyname, $dcategory, $sortby, $bgcolor1, $bgcolor2, $bgcolor3, $textcolor1, $textcolor2, $sortorder, $sitename;
  include("header.php");
  callscript();
#  OpenTable3();
  preface();
#  emit_sections();
#  CloseTable();
  include("footer.php");
}

 main();


?>
