//©Xara Ltd
if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)fb_menu.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}

var bd=2
document.write("<style type=\"text/css\">");
document.write("\n<!--\n");
document.write(".fb_menu_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#c5420a;position:absolute;left:0px;top:0px;visibility:hidden;}");
document.write(".fb_menu_plain, a.fb_menu_plain:link, a.fb_menu_plain:visited{text-align:left;background-color:#c5420a;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:1px 0px 1px 0px;cursor:hand;display:block;font-size:10pt;font-family:Tahoma, Verdana, Arial, sans-serif;font-weight:bold;}");
document.write("a.fb_menu_plain:hover, a.fb_menu_plain:active{background-color:#ffffff;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:1px 0px 1px 0px;cursor:hand;display:block;font-size:10pt;font-family:Tahoma, Verdana, Arial, sans-serif;font-weight:bold;}");
document.write("\n-->\n");
document.write("</style>");

var fc=0x000000;
var bc=0xffffff;
if(typeof(frames)=="undefined"){var frames=0;}

startMainMenu("fb_menu_left.png",18,20,2,0,0)
mainMenuItem("fb_menu_b1",".png",18,70,loc+"../"+"index.php","","Home",2,2,"fb_menu_plain");
mainMenuItem("fb_menu_b2",".png",18,99,loc+"../"+"index.php?op=files","","Download",2,2,"fb_menu_plain");
mainMenuItem("fb_menu_b3",".png",18,140,"javascript:;","","Documentation",2,2,"fb_menu_plain");
mainMenuItem("fb_menu_b4",".png",18,104,"javascript:;","","Resources",2,2,"fb_menu_plain");
mainMenuItem("fb_menu_b5",".png",18,124,"javascript:;","","Development",2,2,"fb_menu_plain");
mainMenuItem("fb_menu_b6",".png",18,110,"http://www.firebirdsql.org/foundation/","","Foundation",2,2,"fb_menu_plain");
endMainMenu("fb_menu_right.png",18,5)

startSubmenu("fb_menu_b5","fb_menu_menu",225);
submenuItem("Subprojects",loc+"../"+"index.php?op=devel","","fb_menu_plain");
submenuItem("---","javascript:;","","fb_menu_plain");
submenuItem("Firebird Database Engine",loc+"../"+"index.php?op=devel&sub=engine","","fb_menu_plain");
submenuItem("Firebird Documentation",loc+"../"+"index.php?op=devel&sub=doc","","fb_menu_plain");
submenuItem("InterClient/InterServer",loc+"../"+"index.php?op=devel&sub=interclient","","fb_menu_plain");
submenuItem("Firebird JDBC Driver",loc+"../"+"index.php?op=devel&sub=jdbc","","fb_menu_plain");
submenuItem("Firebird ODBC Driver",loc+"../"+"index.php?op=devel&sub=odbc","","fb_menu_plain");
submenuItem("Firebird .NET Data Provider",loc+"../"+"index.php?op=devel&sub=netprovider","","fb_menu_plain");
submenuItem("Firebird QA",loc+"../"+"index.php?op=devel&sub=qa","","fb_menu_plain");
submenuItem("Firebird website",loc+"../"+"index.php?op=devel&sub=web","","fb_menu_plain");
submenuItem("---","javascript:;","","fb_menu_plain");
submenuItem("Rabbit Holes",loc+"../"+"index.php?op=rabbits","","fb_menu_plain");
submenuItem("---","javascript:;","","fb_menu_plain");
submenuItem("Firebird at SourceForge","http://sourceforge.net/projects/firebird","","fb_menu_plain");
submenuItem("CVS Repository","http://sourceforge.net/cvs/?group_id=9028","","fb_menu_plain");
endSubmenu("fb_menu_b5");

startSubmenu("fb_menu_b4","fb_menu_menu",412);
submenuItem("Bugs and feature requests",loc+"../"+"index.php?op=devel&id=bugdb","","fb_menu_plain");
submenuItem("Lists and Newsgroups",loc+"../"+"index.php?op=lists","","fb_menu_plain");
submenuItem("Firebird / InterBase Community Sites (at IBPhoenix)","http://www.ibphoenix.com/main.nfs?a=ibphoenix&s=1082027481:10186&page=ibp_member_sites","","fb_menu_plain");
submenuItem("Professional support services","http://www.ibphoenix.com","","fb_menu_plain");
endSubmenu("fb_menu_b4");

startSubmenu("fb_menu_b3","fb_menu_menu",224);
submenuItem("Novice's Guide",loc+"../"+"index.php?op=guide","","fb_menu_plain");
submenuItem("History",loc+"../"+"index.php?op=history","","fb_menu_plain");
submenuItem("FAQ",loc+"../"+"index.php?op=faq","","fb_menu_plain");
submenuItem("Knowledgebase",loc+"../"+"index.php?op=doc","","fb_menu_plain");
submenuItem("Really Useful Articles",loc+"../"+"index.php?op=useful","","fb_menu_plain");
submenuItem("Publications (at IBPhoenix)","http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_publications","","fb_menu_plain");
endSubmenu("fb_menu_b3");

startSubmenu("fb_menu_b2","fb_menu_menu",364);
submenuItem("All released packages","http://sourceforge.net/projects/firebird","","fb_menu_plain");
submenuItem("---","javascript:;","","fb_menu_plain");
submenuItem("Firebird Relational Database",loc+"../"+"index.php?op=files&id=engine","","fb_menu_plain");
submenuItem("Firebird ODBC Driver",loc+"../"+"index.php?op=files&id=odbc","","fb_menu_plain");
submenuItem("Firebird class 4 JCA-JDBC Driver",loc+"../"+"index.php?op=files&id=jaybird","","fb_menu_plain");
submenuItem("Firebird .NET Data Provider",loc+"../"+"index.php?op=files&id=netprovider","","fb_menu_plain");
submenuItem("---","javascript:;","","fb_menu_plain");
submenuItem("Firebird Quick Start Guide","/pdfmanual/Firebird-1.5-QuickStart.pdf","","fb_menu_plain");
submenuItem("Third-party Tools and Libraries (at IBPhoenix)","http://www.ibphoenix.com/main.nfs?a=ibphoenix&page=ibp_contrib_download","","fb_menu_plain");
endSubmenu("fb_menu_b2");

loc="";
