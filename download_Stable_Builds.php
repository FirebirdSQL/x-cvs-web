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
       Firebird Stable Builds</font></font></font><br>
</div>
<br>
<br>
     <small><font size="2"><font face="Lucida,Verdana,Helvetica,Arial" color="black" size="-1"><font color="#e13601" size="+1">
     Stable Builds (0.9.4)</font></font></font></small><small><br>
    </small> <small><br>
    </small>     
<blockquote><small>   </small></blockquote>
      <small>     </small><small>       </small><small>         </small><small>
          </small><small>       </small><small>         </small><small> 
     </small><small>       </small><small>         </small><small>      
  </small><small>          </small><small>         </small><small>      
  </small><small>       </small><small>         </small><small>       </small><small>
       </small><small>            </small><small>       </small><small> 
     </small><small>         </small><small>       </small><small>      
  </small><small>           </small><small>        </small><small>     </small>
     <small>   </small>              
  <table cellpadding="2" cellspacing="2" border="0">
        <tbody>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>Firebird 0.9.4 builds
 were released in the first quarter of 2001. &nbsp;</small><small><br>
            </small><small>   All platforms have been built and successfully
  run though the TCS test suite.</small><small><br>
            </small><small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>         </small> 
       <small>           </small><small>             </small><small>    
          </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>           </small>
           <small>         </small>                                    
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="2"><big><small> MS Win32 
binaries</small></big><small>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></td>
                  <td valign="Top"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2"><small>                </small>
                                                               
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/ibwin32f.zip">
       ibwin32f.zip</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Middle"><small>Firebird Super server install
 package  for win32 platforms</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>         </small> 
       <small>           </small><small>             </small><small>    
          </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>             </small><small>
                  </small><small>               </small><small>         
           </small><small>           </small>           <small>         </small>
                                       
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="2"> Linux i386 binaries</td>
                  <td valign="Middle"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2" nowrap="true"><small> 
              </small>                                                  
          
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdCS-0.9-4p1.i386.rpm">
       FirebirdCS-0.9-4p1.i386.rpm</a>
                      </small><small>                 </small></li>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdCS-0.9-4p1.tar.gz">
        FirebirdCS-0.9-4p1.tar.gz</a>
                      </small><small>                   </small><small><br>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Middle"><small>Classic server packages for
i386  linux  machines.&nbsp; A .rpm package install is provided for redhat/mandrake 
 and  compatible installations and a .tar.gz shell install is provided for 
 general  linux install.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="2"><small>               
              </small>                                                  
            
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdSS-0.9-4p1.i386.rpm">
       FirebirdSS-0.9-4p1.i386.rpm</a>
                      </small><small>                 </small></li>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdSS-0.9-4p1.tar.gz">
       FirebirdSS-0.9-4p1.tar.gz</a>
                      </small><small>                   </small><small><br>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Middle"><small>Super server packages for i386 
 linux  machines. &nbsp;Both .rpm and .tar.gz install packages as described 
 for classic.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>         </small> 
       <small>           </small><small>             </small><small>    
          </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>             </small><small>
                  </small><small>               </small><small>         
           </small><small>           </small>           <small>         </small>
                                       
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Top" colspan="2"> Sun Solaris<small><br>
                  </small><small>               </small></td>
                  <td valign="Top"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2" nowrap="true"><small>    
           </small>                                                     
       
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdCS-0.9.4-Solaris-X86-.tar.gz">
       FirebirdCS-0.9.4-Solaris-X86-.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdCS-0.9.4-Test1-Solaris-Sparc.tar.gz">
       FirebirdCS-0.9.4-Test1-Solaris-Sparc.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Top"><small>Classic server packages for Solaris 
 x86  and &nbsp;sparc platforms.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2"><small>                </small>
                                                               
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdSS-0.9.4-Solaris-X86.tar.gz">
       FirebirdSS-0.9.4-Solaris-X86.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdSS-0.9.4-Test1-Solaris-Sparc.tar.gz">
       FirebirdSS-0.9.4-Test1-Solaris-Sparc.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Top"><small>Super server packages for Solaris 
 x86  and sparc platforms.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>         </small> 
       <small>           </small><small>             </small><small>    
          </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>           </small>
           <small>         </small>                                    
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Top" colspan="2"> MAC OS-X (Darwin<small> 
)</small><small><br>
                  </small><small>               </small><small><br>
                  </small><small>               </small></td>
                  <td valign="Top"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2"><small>                </small>
                                                               
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdCS-0.9-4.Darwin.tar.gz">
       FirebirdCS-0.9-4.Darwin.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Top"><small>Classic server for MAC OS X (Darwin) 
 platform.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Middle" bgcolor="#e0e0e0"><small>         </small>
          <small>           </small><small>             </small><small> 
             </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>           </small>
           <small>         </small>                                    
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Top" colspan="2"> FreeBSD<small><br>
                  </small><small>               </small><small><br>
                  </small><small>               </small></td>
                  <td valign="Top"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2"><small>                </small>
                                                               
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/FirebirdCS-0.9-4.FreeBSD.tar.gz">
       FirebirdCS-0.9-4.FreeBSD.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Top"><small>Classic package for FreeBSD platform.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>         </small> 
       <small>           </small><small>             </small><small>    
          </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>           </small>
           <small>         </small>                                    
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Top" colspan="2"> IBM - AIX<small><br>
                  </small><small>               </small><small><br>
                  </small><small>               </small></td>
                  <td valign="Top"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Top" colspan="2"><small>                </small>
                                                               
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://firebird.sourceforge.net/download/FirebirdCS-0.9-4.AIX.bff.Z">
       FirebirdCS-0.9-4.AIX.bff.Z</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Top"><small>Classic package for AIX platform.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
          <tr>
            <td valign="Top" bgcolor="#e0e0e0"><small>         </small> 
       <small>           </small><small>             </small><small>    
          </small><small>               </small><small>             </small><small>
                </small><small>               </small><small>           
           </small><small>             </small><small>             </small><small>
                  </small><small>               </small><small>         
           </small><small>             </small><small>               </small><small>
                  </small><small>             </small><small>           </small>
              <small>         </small>                                  
 
        <table cellpadding="2" cellspacing="2" border="0" width="100%">
              <tbody>
                <tr>
                  <td valign="Middle" colspan="1"> Source Packages for  0.9-4</td>
                  <td valign="Middle"><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="1" nowrap="true"><small> 
              </small>                                                  
          
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/interbase0.9-4src.tar.gz">
       interbase0.9-4src.tar.gz</a>
                     </small>                   <small><small>          
      </small></small></li>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/interbase0.9-4-v5examples.tar.gz">
       interbase0.9-4-v5examples.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Middle"><small>The source &nbsp;CVS tar tree
 used  to build the 0.9-4 releases.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="1"><small>               
              </small>                                                  
            
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/interbase-0.9-4src-patch1.tar.gz">
       interbase-0.9-4src-patch1.tar.gz</a>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Middle"><small>Patch file applied to create 
the  0.9-4p1  release (only applicable for linux systems).</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                <tr>
                  <td valign="Middle" colspan="1"><small>               
              </small>                                                  
            
              <ul>
                    <small>                 </small>                    
                                               
                <li><small><a href="http://prdownloads.sourceforge.net/firebird/interbase0.9-4src.FreeBSD.ports.shar">
       interbase0.9-4src.FreeBSD.ports.shar</a>
                      </small><small>                   </small><small><br>
                      </small><small>                 </small></li>
                    <small>               </small>                      
                                     
              </ul>
                  <small>               </small></td>
                  <td valign="Middle"><small>The source .shar archive tree
 used  to build the FreeBSD distribution.</small><small><br>
                  </small><small>               </small></td>
                  </tr>
                                                 
          </tbody>                           
        </table>
            <small>         </small><small><br>
            </small><small>         </small></td>
            </tr>
                         
    </tbody>         
  </table>
      <small>   </small>                
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
