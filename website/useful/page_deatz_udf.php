<?php
if (eregi("page_deatz_udf.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Writing UDFs for InterBase</H4>

<!-- THIS TABLE CONTAINS THE PAGE LOGO AND THE CONTENT -->
<table>
<tr>
<td align=left>
<font size="-1"><b>Gregory Deatz</b> shares his expert knowledge of writing User-defined Functions for InterBase<br>
(Paper delivered at the Borland Developers' Conference, San Diego, July 2000)<hr size=1></td>
</tr>

<tr>
<td colspan=2><font face="Verdana" size="-1">


<H2>Contents</H2>
<UL>
<LI><A href="#introduction">Introduction</A> 
<UL>
<LI><A href="#what">What is a UDF?</A> 
<LI><A href="#why">Why write them?</A> 
<LI><A href="#donts">Some do's, some don't's</A> </LI></UL>
<LI><A href="#windows">Writing UDFs in Delphi for Windows platforms</A> 
<UL>
<LI><A href="#start_project">Start a Delphi project</A> 
<LI><A href="#create_unit">Create a new unit for your functions</A> 
<LI><A href="#modulo">Create a modulo routine</A> 
<LI><A href="#build_use">Build it, use it</A> 
<LI><A href="#strings_dates">But what about strings and dates?</A> 
<LI><A href="#left">Let's build a "Left" routine.</A> 
<LI><A href="#date">Let's build some date routines.</A> </LI></UL>
<LI><A href="#linux">Writing UDFs for Linux/Unix platforms</A> 
<UL>
<LI><A href="#c_file">Create a C-file</A> 
<LI><A href="#l_mod">Create the modulo routine</A> 
<LI><A href="#l_build_use">Build it, use it</A> </LI></UL>
<LI><A href="#conclusions">Conclusions</A> </LI></UL>
<HR>
<A name=introduction></A>
<H2>Introduction</H2><A name=what></A>
<H3>What is a UDF?</H3>
<P>A user defined function (UDF) in InterBase is merely a function written in 
any programming language that is compiled into a shared library. Under Windows 
platforms, shared libraries are commonly referred to as dynamic link libraries 
(DLL's). <A name=why></A>
<H3>Why write them?</H3>
<P>After all, stored procedures can accomplish quite a bit on their own. 
<P>The truth of the matter is, InterBase does not come with a very rich set of 
built-in functions. Some common functions that are missing are <I>modulo</I> 
arithmetic, floating point formatting routines, date manipulation routines and 
string manipulation routines. 
<P>It just so happens that programming languages like Delphi and C can produce 
amazingly fast code to do modulo arithmetic, and other various date processing, 
floating point formatting and string manipulation routines. 
<P>It's also a well known fact that writing UDFs is an insanely easy task; 
however, the inexperienced DLL/shared library writer might be uneasy and 
uncomfortable with some of the requirements... <A name=donts></A>
<H3>Some do's, some don't's</H3>
<P>Before we start going through some examples of writing UDFs, let's talk about 
what you <I>should</I> be doing, and what you <I>should not</I> be doing. 
<P>Once you get the hang of writing UDFs, you will probably think that a whole 
world of InterBase extensibility has opened up to you through UDFs. 
<P>On the one hand, it has... The mechanisms for invoking UDFs are quite simple, 
and since a UDF is simply a routine written in your favorite programming 
language, you can do virtually anything, right? 
<P>Well, yes and no... One thing you can't do with UDFs: You can't pass 
<TT>NULL</TT>s to them. Likewise, a UDF cannot return a <TT>NULL</TT> value. 
Also, a UDF does not work within the context of a transaction. That is, 
transaction level information cannot be passed to a UDF, and therefore, a UDF 
isn't able to "dig back" to the database. 
<P>Sort of. A UDF <I>can</I> establish a new connection to the database and 
start another transaction if it so desires, but this is where we come to the 
"do's and don'ts", not to the "can'ts". 
<P>When you write UDFs, you should follow these two simple rules: 
<UL>
<LI>A UDF should be a simple, <I>quick</I> function. 
<LI>A UDF should <I>not</I> attempt to directly affect the state of the 
database. </LI></UL>
<P>What does this mean? 
<P>Well, a function that trims a string, performs modulo arithmetic, performs 
fancy date arithmetic or evaluates aspects of dates are all nice, simple, 
<I>quick</I> functions. They are good examples of candidate UDFs. 
<P>Now, a function that attaches to a database, and inserts, deletes or updates 
data is probably a <I>bad idea</I>. A function that launches a program that 
performs a series of complex tasks is probably a <I>bad idea</I>. Why? Quite 
simply because these types of functions might stop a database from (a) doing 
transactional stuff or (b) even worse, they could significantly damage the 
performance of your server: As soon as a UDF is called, the thread that called 
that UDF blocks until the UDF returns. 
<P>Remember, of course, that these are <I>general guidelines</I>. Your 
particular business case might dictate a need to do something that is 
<I>generally bad</I> because in your case it is <I>specifically good</I>, kind 
of like a glaucoma patient smoking... O yeah, stay on topic now. 
<P>Let's get to the heart of the discussion, now! <A name=windows></A>
<H2>Writing UDFs in Delphi for Windows platforms</H2><A name=start_project></A>
<H3>Start a Delphi project</H3>
<P>Start a Delphi DLL project (a special type of project, when you click "F"ile 
"N"ew). <A name=create_unit></A>
<H3>Create a new unit for your functions</H3>
<UL>
<LI>Now, do "F"ile, "N"ew... UNIT. 
<LI>It might be wise to do a Save All at this point... put your project where 
you feel is a good spot... </LI></UL><A name=modulo></A>
<H3>Create a modulo routine</H3>
<UL>
<LI>In the newly created unit: 
<UL>
<LI>Declare the routine in the interface section: <PRE>function Modulo(var i, j: Integer): Integer; cdecl; export;
</PRE>
<LI>Implement the routine in the implementation section: <PRE>function Modulo(var i, j: Integer): Integer;
begin
  if (j = 0) then
    result := -1 // just check the boundary condition, and
                 // return a reasonably uninteresting answer.
  else
    result := i mod j;
end;
</PRE></LI></UL>
<LI>In the newly created project source: 
<UL>
<LI>Type the following immediately preceding the "begin end.": <PRE>  exports
    Modulo;
</PRE></LI></UL></LI></UL><A name=build_use></A>
<H3>Build it, use it</H3>
<UL>
<LI>So, build the project, and you now have a working DLL. 
<LI>Now, I'm only going to mention this once: This simplest way to get InterBase 
to appropriately find the DLL is to copy it to the UDF directory under the 
InterBase Installation, which may be: <BR><TT>c:\Program 
Files\Borland\IntrBase\UDF</TT>. 
<LI>To use the UDF.... do the following: 
<UL>
<LI>Connect to a new or existing database using ISQL. 
<LI>Type the following: <PRE>declare external function f_Modulo
  integer, integer
  returns
  integer by value
  entry_point 'Modulo' module_name 'dll name minus ".dll"';
</PRE>
<LI>Commit your changes. 
<LI>Now test it... <PRE>select f_Modulo(3, 2) from rdb$database
</PRE></LI></UL></LI></UL>Whew! That was really easy, wasn't it? <A 
name=strings_dates></A>
<H3>But what about strings and dates?</H3>
<P>What about 'em anyway? A string and a date are not considered "scalar" values 
in InterBase-ese, so special care must be taken when returning their values to 
InterBase. <A name=left></A>
<H3>Let's build a "Left" routine.</H3>
<H4>Memory allocation issues </H4>
<UL>
<LI>If you have IB 5.1 or lower, then type the following declaration in the 
interface section of your unit: <PRE>function malloc(Bytes: Integer): Pointer; cdecl; external 'msvcrt.dll';
</PRE>
<LI>If you have InterBase 5.5 or better, then you don't really need this bit of 
coding magic. Instead, make sure that the <TT>ib_util.pas</TT> file is in your 
compiler search path, and that <TT>ib_util.dll</TT> is in your real search path. 

<P>The simplest way to do this is to put <PRE>c:\Program Files\InterBase Corp\InterBase\include
</PRE>in Delphi's library search path. Then, copy <PRE>c:\Program Files\InterBase Corp\InterBase\lib\ib_util.dll
</PRE>to your windows system directory (typically <TT>c:\Windows\System</TT>). 
<LI>Then, put <TT>ib_util.pas</TT> in your uses clause of your interface 
section. <PRE>uses
  ...,
  ib_util;
</PRE></LI></UL>What are all these strange memory allocation details? Why can't 
I just allocate memory with AllocMem, or whatever? The simple answer is: You 
can't, so don't ask! The more complicated answer is that every compiler uses 
it's own favorite algorithms for managing memory that has been given to it by 
the OS. As an example, MSVC manages memory differently from Delphi. Guess what? 
IB is compiled with MSVC. In pre-5.5 version, you have to link directly to the 
MS VC Run-time DLL, and in post-5.5 days, InterBase gives you an IB call to make 
this possible. So, let's get on with building a string-ish function! 
<H4>Building the function </H4>
<UL>
<LI>In the interface section of the newly created unit, type the following 
declaration: <PRE>function Left(sz: PChar; Cnt: Integer): PChar; cdecl; export;
</PRE>
<LI>In the implementation section of the unit, type: <PRE>(* Return the Cnt leftmost characters of sz *)
function Left(sz: PChar; var Cnt: Integer): PChar;
var
  i: Integer;
begin
  if (sz = nil) then
    result := nil
  else begin
    i := 0;
    while ((sz[i] &lt;&gt; #0) and (i &lt; cnt)) do Inc(i);
    result := ib_util_malloc(i+1);
    Move(sz[0], result[0], i);
    result[i] := #0;
  end;
end;
</PRE>
<LI>In your project source, in the "exports" section, type: <PRE>exports
  Modulo,
  Left;
</PRE>
<LI>Now, build the project again... 
<LI>Now, to use the routine, go to ISQL, and reconnect to the database you used 
above, and type: <PRE>declare external function f_Left
  cstring(64), integer
  returns cstring(64) free_it
  entry_point 'Left' module_name 'dll name minus ".dll"';
</PRE>
<LI>And test it... <PRE>select f_Left('Hello', 3) from rdb$database
</PRE></LI></UL>Still pretty simple, huh? <A name=date></A>
<H3>Let's build some date routines</H3>
<UL>
<LI>In InterBase 6, three different "date" types are supported, <TT>DATE</TT>, 
<TT>TIME</TT>, and <TT>TIMESTAMP</TT>. For those familiar with InterBase 5.5 and 
older, the <TT>TIMESTAMP</TT> data type is exactly the equivalent of the 5.5 
<TT>DATE</TT> type. 
<LI>In order to "decode" and "encode" these types into something meaningful for 
your Delphi program, you need a "little bit" of information about the InterBase 
API. In your unit, put the following code: <PRE>interface
...

type
  TM = record
    tm_sec : integer;   // Seconds
    tm_min : integer;   // Minutes
    tm_hour : integer;  // Hour (0--23)
    tm_mday : integer;  // Day of month (1--31)
    tm_mon : integer;   // Month (0--11)
    tm_year : integer;  // Year (calendar year minus 1900)
    tm_wday : integer;  // Weekday (0--6) Sunday = 0)
    tm_yday : integer;  // Day of year (0--365)
    tm_isdst : integer; // 0 if daylight savings time is not in effect)
  end;
  PTM             = ^TM;

  ISC_TIMESTAMP = record
    timestamp_date : Long;
    timestamp_time : ULong;
  end;
  PISC_TIMESTAMP = ^ISC_TIMESTAMP;

implementation
...

procedure isc_encode_timestamp  (tm_date                    : PTM;
                                 ib_date                    : PISC_TIMESTAMP);
                                stdcall; external IBASE_DLL;
procedure isc_decode_timestamp  (ib_date: PISC_TIMESTAMP;
                                 tm_date: PTM);
                                stdcall; external IBASE_DLL;

procedure isc_decode_sql_date   (var ib_date: Long;
                                 tm_date: PTM);
                                stdcall; external IBASE_DLL;
procedure isc_encode_sql_date   (tm_date: PTM;
                                 var ib_date: Long);
                                stdcall; external IBASE_DLL;

procedure isc_decode_sql_time   (var ib_date: ULong;
                                 tm_date: PTM);
                                stdcall; external IBASE_DLL;
procedure isc_encode_sql_time   (tm_date: PTM;
                                 var ib_date: ULong);
                                stdcall; external IBASE_DLL;

</PRE>
<LI>Now, let's write some date UDFs! 
<LI>In the interface section of the newly created unit, type the following 
declaration: <PRE>function Year(var ib_date: Long): Integer; cdecl; export;
function Hour(var ib_time: ULong): Integer; cdecl; export;
</PRE>
<LI>In the implementation section of the unit, type: <PRE>function Year(var ib_date: Long): Integer;
var
  tm_date: TM;
begin
  isc_decode_sql_date(@ib_date, @tm_date);
  result := tm_date.tm_year + 1900;
end;

function Hour(var ib_time: ULong): Integer;
var
  tm_date: TM;
begin
  isc_decode_sql_time(@ib_time, @tm_date);
  result := tm_date.tm_hour;
end;
</PRE>
<LI>In your project source, in the "exports" section, type: <PRE>exports
  Modulo,
  Left,
  Year,
  Hour;
</PRE>
<LI>Now, build the project again... 
<LI>Now, to use the routine, go to ISQL, and reconnect to the database you used 
above, and type: <PRE>declare external function f_Year
  date
  returns integer by value
  entry_point 'Year' module_name 'dll name minus ".dll"';

declare external function f_Hour
  time
  returns integer by value
  entry_point 'Hour' module_name 'dll name minus ".dll"';
</PRE>
<LI>And test it... <PRE>select f_Year(cast('7/11/00' as date)) from rdb$database
</PRE></LI></UL>
<P>Not quite as easy as string or number manipulations, but still pretty simple, 
huh? <A name=linux></A>
<H2>Writing UDFs for Linux/Unix platforms</H2>
<P>Most Linux novices that have been initiated into programming in the Windoze 
world will probably feel a bit intimidated by the notion of "writing a UDF for 
Linux/Unix platforms". 
<P>The process couldn't be simpler, and, in some respects, I find it easier and 
"more intuitive" than doing it under windows platforms. 
<P>Whenever you compile a C-File, it creates an "object" file, which is 
something that will be <I>statically</I> linked to some other code during a 
"linking" phase, which generally produces an executable file of some form. 
<P>It's during this "linking" phase that we are going to tell the c-compiler to 
create a "shared library", which is essentially a "shared object" file that can 
be dynamically linked to a program at run-time, not at compile-time. 
<P>In Windoze-ese, we call these "things" Dynamically Linked Libraries, because 
the library of functions is "linked" to the executable <I>dynamically</I>, at 
run-time. Thus we arrive at the "DLL" extension for these files. 
<P>In Unix/Linux-ese, we call these "things" shared libraries, which are 
essentially "shared object" files--libraries of code that can be dynamically 
linked at run-time. Thus we arrive at the conventional "so" extension for these 
files. 
<P>You need to remember that there is nothing inherently different between a 
Linux "Shared Library" and a Windows "DLL". They are the same thing, at least in 
concept. 
<P>So.... how do we create a shared library under Linux? <A name=c_file></A>
<H3>Create a C-file</H3>This much is easy, right? Just open a text file with a 
.c extension. <A name=l_mod></A>
<H3>Create the modulo routine</H3><PRE>int modulo(int *, int *);

int modulo(a, b)
     int *a;
     int *b;
{
  if (*b == 0)
    return -1; // return something suitably stupid.
  else
    return *a % *b;
}
</PRE><A name=l_build_use></A>
<H3>Build it, use it</H3>At the command-line <PRE>gcc -c -O -fpic -fwritable-strings &lt;your udf&gt;.c
ld -G &lt;your udf&gt;.o -lm -lc -o &lt;your udflib&gt;.so
cp &lt;your udflib&gt;.so /usr/interbase/udf
</PRE>In ISQL <PRE>declare external function f_Modulo
  integer, integer
  returns
  integer by value
  entry_point 'modulo' module_name 'name of shared library';

commit;

select f_Modulo(3, 2) from rdb$database;
</PRE>Holy guacamole, Batman! That was <I>really</I> easy. 
<P>Now, instead of going through the motions of writing the other routines, I'll 
leave it as an exercise for the reader. HOWEVER, if there proves to be time in 
the lecture, I will go through more examples. <A name=conclusions></A>
<H2>Conclusions</H2>
<P>Wow! Writing UDFs is really easy--there isn't much to it--and look! Linux 
development ain't so difficult after all. 
<P>And, of course, we can make the following brain-dead conclusions about 
developing UDFs for InterBase: 
<P><B>They are easy</B>. There is no excuse for not building them if you need 
them. 
<P><B>Don't get carried away</B>. As powerful as UDFs can be, don't get carried 
away. Be very objective when deciding where you should place little tidbits of 
functionality: Am I better served by a UDF or a stored procedure? 
<P>And that, my friends, is UDF development. 
<P>For even more examples and happy-fun programming, download FreeUDFLib, a 
Delphi UDF library for InterBase and FreeUDFLibC a C based UDF library for 
InterBase that runs on Solaris, Linux, Windows, etc... at <A 
href="http://www.interbase.com/download">InterBase</A>. </P>
<hr SIZE=1 WIDTH="100%">
<br><font face="Verdana"><font size=-1><a href="#top">Back to Top</a></font></font>
<br>
<hr SIZE=1 WIDTH="100%">

</td></tr>

<!-- ------------------------------------------------------------------- -->
<!-- END OF PAGE CONTENT -->
</table>

<p>
Back to <A href=index.php?op=useful>Really Useful</A> Index
<p>