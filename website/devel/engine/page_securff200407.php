<?php

if (eregi("page_securff200407.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">

  <tr>
    <td class="centre" colspan=2>
<h4>Developer's Report for July 2004</h4>
    </td>
  <tr>
  <tr>
    <td>Project:
    </td>
    <td><h5>Firebird Security Design &amp; Enhancements</h5>
    </td>
  </tr>
  <tr>
    <td>Developer: 
    </td>
    <td>Alex Peshkoff
    </td> 
  </tr>

  <tr>
    <td colspan=2>
<hr size=1>
It has happened so, that my security-related work on project and 
non-security-related work were very close together. For today I see two 
most awful (on my mind, because they may be used for DoS attack) security 
problems:<ol>
<li>While we continue using char* and/or old class str to store string 
data, read from user packets or environment, it's always possible to have 
a situation, when buffer overflow happens. Only stable string class can 
solve this problem once and forever.
<p>
<li>User may connect to server unlimited number of times (we don't have 
license limit !), open big or very big transaction and don't close it. 
This leads to great memory losses and as a result server dies (sometimes 
taking OS like w9x together). Specially bad, that this may happen (and 
already happened to 1.5) without any special hacker attack - simply bad 
application, started for debugginbg purposes many times! This may be 
cured by limiting number of connections for ordinary user (8-16, for 
example, but may be configured in conf file). But additionally it's 
necessary to set quotas on MemoryPools.
</ol>

Now look please - data, living in such pool and causing memory overflows, 
are often strings! Therefore, creating string class correctly and safely 
storing data in memory pools is required task for both points. Certainly, 
other data strcutures (like arrays) must also behave pool-correct. I 
should mention, that no known to me standard class library (like STL) 
behaves in this pool-correct manner.
<p>
Therefore as a common required task I took active part (together with 
Nickolay Samofatov) in creating Firebird classes library (it was described 
by NS in fb-devel a few days ago). 
<p>
Another important job to be done - 
applying this class library to existing sources. That's a great pity that 
this job now has important showstopper - we don't have decision about 
Vulcan intergration, and multiple fixes in Firebird HEAD under this 
circumstances may become useless job. Therefore I apply new classes to CVS 
tree only when absolutely needed.
<p>
A list of main jobs done:
<ol>
<li>Minor fixes in Linux SS install.
<li>NPTL Linux SS build.
<li>Fixed win32 conf-file load problem when set in environment.
<li>Fixed memory leak in Execute Statement.
<li>Analyzed availability and performance of TLS on available and used by 
me compliers/OSs.
<li>Fixed problems with filename conversion in multibyte character sets in 
win32.
</ol>
I don't mention here class library related work, because it was described 
earlier.
<p>
My future plans depend - strongly <img src="images/smiley_not.gif"> - from decision about Firebird/Vulcan 
integration.
<i>Alex Peshkoff<br>
Yaroslavl, Russia</i>
<hr size=1>
    </td>
  </tr>
</table>
<p>
Back to <A href="index.php?op=devel&sub=engine">Core Engine index page</A>.
<p>