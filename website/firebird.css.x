
BODY  {
  color:        #333333;  background-color: F0F0F0;

  font-family:  Lucida, Verdana, Helvetica, Arial, sans-serif;
  font-style:   normal;
  font-variant: normal;
  font-weight:  normal;
  font-size:    x-small;
  text-align: left; 

  margin-top:   0px;    margin-left:  2px;    margin-right: 2px;  margin-bottom:  2px;
  padding-top:  0;      padding-left:   0;    padding-right:  0;  padding-bottom: 0;
  border-top:   0;      border-left:    0;    border-bottom:  0;  border-right:   0;

  width:  auto;
  }

H6, TD H6  { font-size: xx-small;  font-weight: bold;  color: #e13601; }
H5, TD H5  { font-size: x-small;   font-weight: bold;  color: #006600; }
H4, TD H4  { font-size: small;     font-weight: bold;  color: #e13601; }
H3, TD H3  { font-size: medium;    font-weight: bold;  color: #006600;  }
H2, TD H2  { font-size: large;     font-weight: bold;  color: #006600;  }
/* H1, TD H1  { font-size: x-large;   font-weight: bold;  color: #006600;  }*/

/* Miscellany */
.redsmallcaps {font-weight: normal; color: red; font-variant: small-caps; }
H3.redsmallcaps {font-weight: bold; color: red; font-variant: small-caps; } 

H3.red, TD H3.red { font-size: medium; font-weight: bold;  color: red; }
H5.red, TD H5.red { font-size: x-small;  font-weight: bold;  color: red; font-variant: small-caps;} 

H4.green, TD H4.green { font-size: small;  font-weight: bold;  color: #006600; font-variant: small-caps;  } 

OL, OL OL  { 
  list-style-type: decimal;  
  font-size: x-small; 
  text-align: left; 
}

UL {
   list-style-type: disc;
   }

LI, LI LI {
  text-indent: 0%;    
  text-align: left; 
  font-size: x-small; /* list-style-image: url( "images/ball.gif");*/
  }

LI.plain, LI LI.plain { font-size: x-small;     
  list-style: none;           
  text-align: left; 
}

LI.code, LI LI.code   {  
  font-size: x-small;     
  font-family: "Courier New"; 
}

P, TD, TD P, CAPTION
  {  font-family:  Lucida, Verdana, Helvetica, Arial, sans-serif;
     font-size: x-small; 
  }

P.small { font-size: xx-small; }

P.smallcaps{ font-variant: small-caps; }

P.indent1 {  font-size: x-small;       text-indent: 5%;    margin-left: 20%; }

.lmargin20 { margin-left: 20px;  }
.lmargin0 { margin-left: 0px;  }

.indentA  { text-indent: 20px;  }
.indentB  { text-indent: 25px;  }   /* Works better with IE*/
.indent2  { text-indent: 10px;  }
.indent0  { text-indent: 0px;  }

.narrowlines { line-height: 50%; }
.halflinefeed { line-height: 50%; }
.spacedlines { line-height: 200%; }

H2.centre {text-align: center;}
H4.centre {text-align: center;}
DIV.centre {text-align: center;}
P.centre {text-align: center;}
P.rightalign {text-align: right;}

A         { font-size: x-small;     text-decoration: underline; COLOR: blue; }


TABLE { background-color: F0F0F0; }

TABLE.NoThreeD {background-color: #fffeee; border: none 0 #fffeee;  }
TR.Header {background-color: #ffffcc;}
TR.LineA  {background-color: #fffeee;}
TR.LineB  {background-color: #ffffcc;}

TABLE.YNoThreeD {background-color: #fffeee; border: none 0 #fffeee;  }
TR.YHeader {background-color: #ffff00;}
TR.YLineA  {background-color: #fffeee;}
TR.YLineB  {background-color: #ffffcc;}

TABLE.RNoThreeD {background-color: #FFCCCC; border: none 0 #FFCCCC;   }
TR.RHeader {background-color: #FF6666;}
TR.RLineA  {background-color: #FFCCCC;}
TR.RLineB  {background-color: #FF9999;}
A.RLine         { font-size: x-small; font-weight: bold; text-decoration: None;}
A.RLine:link    { color:	Green;}
A.RLine:visited	{ color:	gray;	}
A.RLine:active	{	color:	red;  }
A.RLine:hover   { color:	red;	}     /* netscape 4 doesn't support this. */
A.RLine:offsite	{	color:	Green;}     /* for links to other sites */

TABLE.BNoThreeD {background-color: #CCFFFF; border: none 0 #CCFFFF;  }
TR.BHeader {background-color: #33CCFF;}
TR.BLineA  {background-color: #CCFFFF;}
TR.BLineB  {background-color: #33FFFF;}

TABLE.GNoThreeD {background-color: #99ff99; border: none 0 #99ff99;  }
TR.GHeader {background-color: #33cc99;}
TR.GLineA  {background-color: #99ff99;}
TR.GLineB  {background-color: #66cc77;}

TABLE.GyNoThreeD {background-color: #CCCCCC; border: none 0 #CCCCCC;  }
TR.GyHeader {background-color: #999999;}
TR.GyLineA  {background-color: #CCCCCC;}
TR.GyLineB  {background-color: #C0C0C0;}

TABLE.ONoThreeD {background-color: #ffCC99; border: none 0 #ffCC99;  }
TR.OHeader {background-color: #FF6600;}
TR.OLineA  {background-color: #ffCC99;}
TR.OLineB  {background-color: #FF9900;}

TD P.indent1 {   font-size: x-small;   margin-left: 20%; text-indent: 5%; }

TT, PRE, CODE {  font-size: x-small;   font-family: "Courier New";
/*  font-style: normal;
  font-variant: normal;
  font-weight: normal;*/
}

/* Global Classes */
.c1 {  font-size: x-small;   font-family: "Courier New"; }
.cl {  font-size: x-small;   font-family: "Courier New"; }
.plain { font-size: x-small; color: black; font-style: normal; font-variant: normal; font-weight: normal; }

.strongstyle {  font-weight: bold; }

.floatright {   float: right; }

.floatleft {   float: left; }

.warning	{ font-weight:	bolder; text-transform:	none; background:	yellow; }

.uptop {vertical-align: super; }

.boxlink {TEXT-DECORATION: none; font-size: 12; COLOR: #000000; }

.s_menu { FONT-WEIGHT: bold; TEXT-DECORATION: none; font-size: 12; COLOR: #000000 }
