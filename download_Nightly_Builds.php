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

     
<div align="Center">
<p><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+2">
Firebird Nightly Builds</font></font></font></p>
</div>
<p><small><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1"><br>
      Nightly Builds</font></font></font></small></p>
           
<blockquote>          <small>       </small><small>         </small><small>
            </small><small>         </small><small>         </small><small>
            </small><small>         </small><small>         </small><small>
            </small><small>         </small><small>         </small><small>
            </small><small>         </small><small>         </small><small>
            </small><small>         </small><small>         </small><small>
            </small><small>         </small><small>       </small>      
  <small>      </small>     </blockquote>
     
  <table cellpadding="2" cellspacing="2" border="0" width="100%">
        <tbody>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>Builds straight from
the CVS tree.</small><small><br>
            </small><small>           </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>           </small>
           <small>             </small><small>               </small><small>
                  </small><small>                 </small><small>       
       </small><small>               </small><small>                 </small><small>
                  </small><small>               </small><small>         
   </small>             <small>           </small>                      
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="2"><big><small> MS  Win32
binaries</small></big><small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></td>
                  <td valign="Top"><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2"><small>                  </small>
                                   
              <ul>
                    <small>                   </small>                  
                   
                <li><small>&lt;none currently&gt;<br>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Firebird Super server install 
package for win32 platform <br>
  (nightly build for win32 is not currently available - see milestone build,
 or download the source and build it yourself.)</small><br>
                  <small>&nbsp;</small></td>
                  </tr>
                             
          </tbody>           
        </table>
            <small>           </small><small><br>
            </small><small>           </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>           </small>
           <small>             </small><small>               </small><small>
                  </small><small>                 </small><small>       
       </small><small>               </small><small>                 </small><small>
                  </small><small>               </small><small>         
     </small><small>                 </small><small>                 </small><small>
                </small><small>             </small>             <small>
          </small>                      
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="2"> Linux i386 binaries</td>
                  <td valign="Middle"><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/linux/fb_cs_linux_snapshot.tar.gz">
     fb_cs_linux_snapshot.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Classic server packages for 
i386  linux machines.&nbsp; A .tar.gz shell install is provided for general 
linux  install.</small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/linux/fb_ss_linux_snapshot.tar.gz">
     fb_ss_linux_snapshot.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Super server packages for i386 
 linux machines. &nbsp;.tar.gz install packages as described for classic.</small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                             
          </tbody>           
        </table>
            <small>           </small><small><br>
            </small><small>           </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>           </small>
           <small>             </small><small>               </small><small>
                  </small><small>                 </small><small>       
       </small><small>               </small><small>                 </small><small>
                  </small><small>               </small><small>         
     </small><small>                 </small><small>                 </small><small>
                </small><small>             </small>             <small>
          </small>                      
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="2"> Sun Solaris</td>
                  <td valign="Middle"><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/solaris-sparc/FirebirdCS-0.9.5.226-Beta1.Solaris-Sparc.tar.gz">
  FirebirdCS-0.9.5.226-Beta1.Solaris-Sparc.tar.gz</a>
                      </small><br>
                      <small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Classic server packages for 
Solaris                        </small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/solaris-sparc/FirebirdSS-0.9.5.226-Beta1.Solaris-Sparc.tar.gz">
  FirebirdSS-0.9.5.226-Beta1.Solaris-Sparc.tar.gz</a>
                      </small><br>
                      <small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Super server packages for Solaris 
                       </small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                             
          </tbody>           
        </table>
            <small>           </small><small><br>
            </small><small>           </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>           </small>
           <small>             </small><small>               </small><small>
                  </small><small>                 </small><small>       
       </small><small>               </small><small>                 </small><small>
                  </small><small>               </small><small>         
     </small><small>                 </small><small>                 </small><small>
                </small><small>             </small>             <small>
          </small>                      
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="2"> MAC OS-X (Darwin)</td>
                  <td valign="Middle"><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/darwin/fb_cs_darwin_snapshot.tar.gz">
     fb_cs_darwin_snapshot.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Classic server packages for 
Solaris                        </small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/darwin/fb_ss_darwin_snapshot.tar.gz">
     fb_ss_darwin_snapshot.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> Super server packages for Solaris 
                       </small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                             
          </tbody>           
        </table>
            <small>           </small><small><br>
            </small><small>           </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>           </small>
           <small>             </small><small>               </small><small>
                  </small><small>                 </small><small>       
       </small><small>               </small><small>                 </small><small>
                  </small><small>               </small><small>         
     </small><small>                 </small><small>                 </small><small>
                </small><small>               </small><small>           
     </small><small>                 </small><small>               </small><small>
                </small><small>                 </small><small>         
       </small><small>               </small><small>             </small>
             <small>           </small>                      
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="1"> Nightly generated Source 
Packages</td>
                  <td valign="Middle"><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="1"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/interbase.tar.gz">
     interbase.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> The latest nightly CVS source 
tarball  used to build the nightly firebird 1 releases.</small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Top"><small>                 </small>     
                            
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/bootbuild/bootbuild.tar.gz">
     bootbuild.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/bootbuild/README">   README</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small><small><br>
                  </small><small>                 </small></td>
                  <td valign="Top"><small>To build firebird from the above 
(interbase.tar.gz)  sources you will need to either have an existing running 
fb/ib installation  or use the boot build available from our ftp site.</small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="1"><small>               
  </small>                                  
              <ul>
                    <small>                   </small>                  
                   
                <li><small><a href="/download/snapshot_builds/firebird2.tar.gz">
     firebird2.tar.gz</a>
                      </small><small>                   </small></li>
                    <small>                 </small>                    
             
              </ul>
                  <small>                 </small></td>
                  <td valign="Middle"><small> The latest nightly firebird2 
CVS source tarball.</small><small><br>
                  </small><small>                 </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="1"><small><br>
                  </small><small>                 </small></td>
                  <td valign="Middle"><small><br>
                  </small><small>                 </small></td>
                  </tr>
                             
          </tbody>           
        </table>
            <small>           </small><small><br>
            </small><small>           </small></td>
            </tr>
                 
    </tbody>     
  </table>
       <br>
     <small><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
       </font></font></font></small><br>
     <small>     </small>               
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
