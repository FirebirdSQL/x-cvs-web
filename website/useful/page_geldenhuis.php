<?php
if (eregi("page_geldenhuis.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Writing UDF's in Delphi for Interbase/Firebird</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<!-- SUBSTITUTE PAGE LOGO BELOW -->
<td align=left>
<hr size=1>
<font size="-1"><b>Gerhardus Geldenhuis</b> describes how he taught himself to write UDFs, using the resources available around the community web sites<hr size=1></td>
</tr>

<tr>
<td colspan=2><font face="Verdana" size="-1">

<h4>First things first</h4>This document is a summary of my experiences and the 
functions I wrote. It is not intended to be a complete guide to writing UDF's 
but merely an introduction. If you have something to add please feel free to do 
so I can be contacted at <A 
href="mailto:flooder@global.co.za">flooder@global.co.za</A>. If you find any 
errors I would also appreciate you letting me know. <I>Please include 
<B>UDFPAPER</B> somewhere in the subject line when sending a email it helps me 
to filter and respond timely.</I> <BR><BR>Before jumping in and writing code 
start reading first. This is what should be read without exception 
<UL>
<LI>Interbase 6.0 Language Reference 
<LI>InterBase 6.0 Developer’s Guide </LI></UL>This is what I think should also 
be read about or have some knowledge about,<BR>depending on the function you 
want to write. 
<UL>
<LI>Pointers 
<LI>Var Parameters 
<LI>PChars 
<LI>Threads </LI></UL><BR>I am assuming you are using at least Delphi4 hopefully 
Delphi5. Also IB6 or FB1. 
<h4>The stuph that matters</h4>Lets assume that IB can't add two numbers 
together so we must write a function that does that.<BR><BR>Create a new dll 
project.<BR>If your dll is only chatting with IB then you can ignore the 
ShareMem clause, because IB uses PChars.<BR><BR>You can write the function code 
directly in the dll but it is<BR>more ordered to write it in a unit and include 
the unit in the<BR>uses clause, it makes it easier when your dll start 
containing <BR>20+ functions.<BR>Here is some sample code:<BR><CODE><PRE><FONT face="Courier New"><B>library</B> Project1;

<B>uses</B>
  Unit1 <B>in</B> <FONT color=#800080><B>'Unit1.pas'</B></FONT>;

<B>exports</B>

  AddFunction;

<B>begin</B>
<B>end</B>.
</FONT>
</PRE></CODE>Here is the code for unit 1. <CODE><PRE><FONT face="Courier New"><B>unit</B> Unit1;

<B>interface</B>

<B>function</B> AddFunction(<B>var</B>
Width,Height:Integer):Integer;<B>stdcall</B>;

<B>implementation</B>

<B>function</B> AddFunction(<B>var</B> Width,Height:Integer):Integer;
<B>begin</B>
  Result:=Width+Height;
<B>end</B>;

<B>end</B>.
</FONT>
</PRE></CODE>That is all there is to it basically. It is very important to 
remember that all parameters passed from IB is passed by reference hence the use 
of var parameters. Another important thing to remember is that pchar is already 
a reference so it should not be passed as a var parameter that would result in a 
pointer to a pointer to data, a recipe for disaster. If you don't want to use 
the var parameter your code will look like this. There is two versions of 
AddFunction <CODE><PRE><FONT face="Courier New"><B>unit</B> Unit1;

<B>interface</B>

<B>type</B>
  PInteger = ^Integer;

<B>function</B> AddFunction(Width,Height:PInteger):Integer;<B>stdcall</B>;

<B>implementation</B>

<B>function</B> AddFunction(Width,Height:PInteger):Integer;
<B>begin</B>
  Result:=Width^+Height^;
<B>end</B>;

<B>function</B> AddFunction(Width,Height:Integer):Integer;
<B>var</B>
  K,J:^Integer;
<B>begin</B>
  K:=Pointer(Width);
  J:=Pointer(Height);
  Result:=K^+J^;
<B>end</B>;

<B>end</B>.

</FONT>
</PRE></CODE>
<h4>How do I import it?</h4>To import a function is actually the easiest part. 
Firstly again, read the documentation. Here is the script for importing the 
function. <CODE><PRE><FONT face="Courier New">
declare external function f_AddFunction
  Integer,
  Integer,
returns
  Integer by value
entry_point 'AddFunction'
module_name 'Project1.dll';
</FONT>
</PRE></CODE>Just a few things to take note of: 
<UL>
<LI>The function name and the entry point can be the same. 
<LI>You can return either <I>by value</I> or <I>by reference</I> in which case 
you must make the result of your function of a pointer type. 
<LI>I have not done it by reference so I cannot give you an example it is 
probably very much the same as the second example. 
<BR>eg:<BR>AddFunction(Width,Height:PInteger):PInteger;<BR>begin<BR>Result^:=Width^+Height^;<BR>end;<BR></LI></UL>
<h4>Using PChars</h4>Using PChars is actually not that difficult. I did not use 
it extensively so this is not a complete example but it will get you underway. 
<CODE><PRE><FONT face="Courier New"><B>unit</B> Unit1;

<B>interface</B>
<B>uses</B> SysUtils;

<B>type</B>
  PInteger = ^Integer;

<B>function</B> AddFunction(<B>var</B>
Width,Height:Integer;Operation:PChar):Double;<B>stdcall</B>;

<B>implementation</B>

<B>function</B> AddFunction(<B>var</B>
Width,Height:Integer;Operation:PChar):Double;
<B>var</B>
  S:<B>String</B>;
<B>begin</B>
  S:=Trim(UpperCase(<B>String</B>(Operation)));
  Result:=<FONT color=#800000><B>0</B></FONT>;
  <B>if</B> S = <FONT color=#800080><B>'DIVIDE'</B></FONT> <B>then</B>
    Result:=Width/Height
  <B>else</B>
    <B>if</B> S = <FONT color=#800080><B>'MULTIPLY'</B></FONT> <B>then</B>
      Result:=Width*Height;
<B>end</B>;

<B>end</B>.

</FONT>
</PRE></CODE>When you pass pchars its is better to remove spaces depending on 
what you are going to do. This gave me some trouble until I realised that there 
were extra unwanted spaces in the variable. Also 
mystring:=String(ThePCharVariable) is the correct and new way to cast pchars 
according to the Delphi help file. Please read it for further information. 
<h4>How do I import it?</h4>PChars is also very easy here is the script for the 
procedure. <CODE><PRE><FONT face="Courier New">
declare external function f_AddFunction
  Integer,
  Integer,
  CString(15)
returns
  Double Precision by value
entry_point 'AddFunction'
module_name 'Project1.dll';
</FONT>
</PRE></CODE>Just a few things to take note of: 
<UL>
<LI>The length of CString must be the same value as the maximum size of the 
field which value you will use to send data with. If you know 100% that you will 
never send a string longer than x characters then make it x characters. 
</LI></UL>
<h4>Things</h4>
<UL>
<LI>The compiler of IB also uses the <B>stdcall</B> calling convention so that 
is the right one to use 
<LI><B>Near</B>, <B>far</B> and <B>export</B> have no effect so don't use it. 
<LI>When you loose a connection while debugging(calling the procedure) it means 
your dll has raised an exeption or performed an illegal operation. It basically 
means your not yet finished coding. 
<LI>The dll should be placed under the UDF directory of IB, otherwise you need 
to specify it in the startup files of IB. See the Language Reference 
<LI>Corresponding Types 
<TABLE bgColor=#ffffff border=1 cellPadding=2 cellSpacing=2>
<TBODY>
<TR>
<TD><B>Delphi</B></TD>
<TD><B>Interbase</B></TD></TR>
<TR>
<TD>Integer</TD>
<TD>Integer</TD></TR>
<TR>
<TD>PChar</TD>
<TD>Char or VarChar</TD></TR>
<TR>
<TD>Double</TD>
<TD>Double Precision</TD></TR></TBODY></TABLE>
<LI>When changing the parameters of a procedure after you have imported it and 
then dropping it andre importingg it can create problems. The best solution for 
me was to remove all reference to the UDF then to drop it and then re importing 
it. 
<LI>Remember to copy the dll to the UDF directory after compiling. When IB is 
using the UDF, Windows will not let you copy the dll exit all relevant programs 
or disconnectt and then copy the file. 
<LI>You don't need to re-import a UDF after compiling and copying a dll. 
</LI></UL>
<h4>Debugging</h4>A stupid mistake I made during debugging was to use 
MessageDlg. It works but if your server is not very near you will need to run to 
it everytime, to press Ok. Also it effectively halts your session because it 
waits for the UDF to exit and it will not do so until you press OK or any of the 
other buttons you specified. <BR>I used a textfile with great success. Here is a 
code snippet of how you might do it. If the procedure is called multiple times 
in succesion it you should not call rewrite but append to add the data to the 
end. Remember to check for file existence when appending. <CODE><PRE><FONT face="Courier New"><B>unit</B> Unit1;

<B>interface</B>
<B>uses</B> SysUtils;

<B>type</B>
  PInteger = ^Integer;

<B>function</B> AddFunction(<B>var</B>
Width,Height:Integer;Operation:PChar):Double;<B>stdcall</B>;

<B>implementation</B>

<B>function</B> AddFunction(<B>var</B>
Width,Height:Integer;Operation:PChar):Double;
<B>var</B>
  S:<B>String</B>;
  K:TextFile;
<B>begin</B>
  <B>try</B>
    AssignFile(K,<FONT color=#800080><B>'C:\Program
Files\Borland\Interbase\UDF\Debug.txt'</B></FONT>);
    Rewrite(K);
    Writeln(K,<FONT color=#800080><B>'In
Width:'</B></FONT>+IntToStr(Width));
  <FONT color=#800000><B><I>//or</I></B></FONT>
    Writeln(K,Width);
    Writeln(K,<B>String</B>(Operation));
  <B>finally</B>
    CloseFile(K);
  <B>end</B>;<FONT color=#800000><B><I>//try finally</I></B></FONT>
  S:=Trim(UpperCase(<B>String</B>(Operation)));
  Result:=<FONT color=#800000><B>0</B></FONT>;
  <B>if</B> S = <FONT color=#800080><B>'DIVIDE'</B></FONT> <B>then</B>
    Result:=Width/Height
  <B>else</B>
    <B>if</B> S = <FONT color=#800080><B>'MULTIPLY'</B></FONT> <B>then</B>
      Result:=Width*Height;
<B>end</B>;

<B>end</B>.

</FONT>
</PRE></CODE>
<h4>Opinions</h4>
<UL>
<LI>I use UDF's when I need to do a lot of calculations between <I>Double 
Precision</I> and <I>Integer because in Delphi you dont need to cast the whole 
time</I> 
<LI>When a double value in Delphi is very very very small it will be 0 in IB 
even if passing it as Double Precision. I have not confirmed this conclusively 
so it is an opinion. </LI></UL>
<h4>Further reference and reading</h4>Most of these sites have sections where 
you can join mailinglists for further information. Mailinglist is a very 
valuable place to get help. Just dont be lazy, try to find the answer yourself 
first, and then if that did not succeed ask your question clearly and tell what 
have tried already. 
<UL>
<LI><A href="http://www.mers.com/">Mers.com</A> 
<LI><A href="http://www.ibphoenix.com/">IB Phoenix</A> 
<LI><A href="http://www.ibobjects.com/">IBObjects</A> </LI></UL>
<h4>Thanks</h4>
<UL>
<LI><A href="http://www.interbaseworkbench.com/">Interbase Workbench</A> my 
exclusive tool for modifying/creating my databases! 
<LI><A href="http://www.ibexpert.com/">IB Expert</A> for a very nice procedure 
debugging tool 
<LI>Thanks to the help of the people at ib-support@egroups.com 
<LI>Thanks to <A href="mailto:gdeatz@hlmdd.com">Gregory Deatz</A> programmer of 
FreeUDFLib for making his code open so I could study it to see how things were 
done. 
<LI>Thanks to <A href="http://www.ibobjects.com/">IBObjects</A> for the best way 
to access Interbase/Firebird. </LI></UL>

</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->

</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>