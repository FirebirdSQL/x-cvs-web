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
        Firebird Source Code</font></font></font><br>
  </div>
  <p><small><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1"><br>
   Source Code - Online<br>
     </font></font></font></small></p>
           
  <table cellpadding="2" cellspacing="2" border="0" width="100%">
      <tbody>
        <tr>
          <td valign="Top" bgcolor="#e0e0e0"><small><b>Browse our CVS source
 code repository via the web.</b></small>                             
        <p><small>You can directly access the source files and revision history
 of modules in Firebird:. </small></p>
                               
        <ul>
                                     
          <li><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/interbase/">
    FirebirdSQL RDB server 1.0</a>
                 </small></li>
                                     
          <li><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/firebird2/">
    FirebirdSQL RDB server 2.0 (in development)&nbsp;</a>
                 </small></li>
                               
        </ul>
                               
        <ul>
                                     
          <li><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/OdbcJdbc/">
    The Firebird ODBC driver&nbsp;</a>
                 </small></li>
                               
        </ul>
                               
        <ul>
                                     
          <li><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/client-java/">
    Firebird JDBC drivers type3</a>
                 </small></li>
                                     
          <li><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/client-java/">
    Firebird JDBC drivers type2/type4 (in development)</a>
                 </small></li>
                               
        </ul>
                               
        <ul>
                                     
          <li><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/TCS/">
    Firebird test suite and tool &nbsp;</a>
                 </small></li>
                               
        </ul>
             <br>
          <small>           </small><small> Or browse from the root of the
 CVS source repository&nbsp;           </small><small><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/">
    here</a>
             </small><small> .</small><br>
          <small>           </small><br>
             </td>
           </tr>
                   
    </tbody>           
  </table>
       <br>
                  
  <p><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
   Source Code - Download</font></font></font></p>
             
  <p></p>
             
  <blockquote>       </blockquote>
           
    <table cellpadding="2" cellspacing="2" border="0" width="100%">
           <tbody>
             <tr>
               <td valign="Top" bgcolor="#e0e0e0"><small><b>Download Nightly
 archived source trees<br>
               </b></small><small>Each night a tarball distribution is created
  from the latest CVS sources. &nbsp;For those hoping to get started working
  with the source, and are not familure with CVS this is the perfect way
to   get started.&nbsp;                 </small><br>
               <br>
                                     
          <table cellpadding="2" cellspacing="2" border="0" width="100%">
                 <tbody>
                   <tr>
                     <td valign="Middle" colspan="1"><big>              
    </big>                                  
                <ul>
                    <big>                     </big>                    
                 
                  <li><small><a href="download/snapshot_builds/source/interbase.tar.gz">
        interbase.tar.gz</a>
                         </small></li>
                    <big>                   </big>                      
           
                </ul>
                  <big>                   </big></td>
                     <td valign="Middle"><small> The latest nightly CVS source
  tarball  used to build the nightly firebird 1 releases.</small><small><br>
                     </small><small>(aprox 6Meg)</small></td>
                   </tr>
                   <tr>
                     <td valign="Top">                                  
                 
                <ul>
                                                             
                  <li><small><a href="download/bootbuild/bootbuild.tar.gz">
        bootbuild.tar.gz</a>
                         </small></li>
                                                             
                  <li><small><a href="download/bootbuild/README">     README</a>
                         </small></li>
                                                       
                </ul>
                     <small><br>
                     </small></td>
                     <td valign="Top"><small>To build firebird from the above
  (interbase.tar.gz)  sources you will need to either have an existing running
  fb/ib installation  or use the boot build available from our ftp site.</small><small><br>
                     </small><small>(aprox 1Meg)</small><br>
                     </td>
                   </tr>
                   <tr>
                     <td valign="Middle" colspan="1">                   
                                 
                <ul>
                                                             
                  <li><small><a href="download/snapshot_builds/source/firebird2.tar.gz">
        firebird2.tar.gz</a>
                         </small></li>
                                                       
                </ul>
                     </td>
                     <td valign="Middle"><small> The latest nightly firebird2
  CVS source tarball.<br>
   (aprox 6Meg)<br>
                     </small><small><br>
                     </small></td>
                   </tr>
                   <tr>
                     <td valign="Middle" colspan="1"><small><br>
                     </small></td>
                     <td valign="Middle"><small><br>
                     </small></td>
                   </tr>
                                           
            </tbody>                                   
          </table>
               <small><br>
               </small></td>
             </tr>
                         
      </tbody>                 
    </table>
                                                  <br>
      <br>
                                  
    <p><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
   Source Code - via CVS</font></font></font></p>
                                    
    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                 <tbody>
                   <tr valign="Top">
                     <td width="65%" bgcolor="#e0e0e0">                 
                       
          <p><small><b>Anonymous access to Firebird CVS source repository</b></small></p>
                                           
          <p><small>The Firebird CVS repository can be checked out  through
 anonymous (pserver) CVS with the following instruction set. The module 
you  wish to check out must be specified as the </small><small><i>modulename</i></small><small>
    . When prompted for a password for </small><small><i>anonymous</i></small><small>
    , simply press the Enter key.  </small></p>
                                           
          <p><small><tt>cvs -d:pserver:anonymous@cvs.firebird.sourceforge.net:/cvsroot/firebird
  login <br>
    &nbsp;<br>
     cvs -z3 -d:pserver:anonymous@cvs.firebird.sourceforge.net:/cvsroot/firebird
  co <i>modulename</i></tt></small></p>
                                           
          <p><small>Updates from within the module's directory do not need
 the -d parameter.</small></p>
                                           
          <p><small><br>
                     </small></p>
                                           
          <p><small><b>Developer </b></small><small><b>access to Firebird
 CVS source repository</b></small><small><b> via SSH</b></small></p>
                                           
          <p><small>Only project developers can access the CVS tree  via
this method. SSH1 must be installed on your client machine. Substitute  
               </small><small><i>modulename</i></small><small> and </small><small><i>
    developername</i></small></p>
                                           
          <p><small><tt>export CVS_RSH=ssh <br>
    &nbsp;<br>
    cvs -z3 -d:ext:<i>developername</i>@cvs.firebird.sourceforge.net:/cvsroot/firebird
  co <i>modulename</i></tt></small></p>
                     </td>
                   </tr>
                               
      </tbody>                       
    </table>
               <br>
               <br>
                                                     
    <p><br>
          </p>
                                                     
    <p></p>
          <br>



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
