<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>Firebird ADO.NET Data Provider Development v1.7</h4>

<p>
<b>The development of the v1.7 is going to be focused in:</b>
</p>
<p>
	<ul>
		<li>The reimplementation of the <b>Firebird events</b> system.</li>
		<li>Improve management of resources allocated in the Firebird server (connections, statements, transactions, ...).</li>
		<li>Improve .NET provider internals.</li>
		<li>Make the API more consistent, for example, in the usage of connection strings.</li>
		<li>Changes on database schema support, to implement it in similar way as in the 
		.NET 2.0 Beta 1 documentation (when the changes are ready it will be back-ported to v1.6).</li>
	</ul>
</p>
<p>

<h3>Building the sources on Windows</h3>
<p>
You will need a recent snapshot of <a href="http://nant.sourceforge.net">nant 0.85</a>.
The nant build file is located in <i>builds\win32\ado.net</i>, there are a <i>build.bat</i> file
that can be used to build the sources if nant is in the PATH.
The default target frameworks in the nant build file are:
<ul>
    <li>Microsoft .NET 1.0</li>
    <li>Microsoft .NET 1.1</li>
    <li>Microsoft .NET 2.0</li>
    <li>Mono 1.0</li>
</ul>
The build will be done for all the framework versions that are installed and detected by nant.
If you want to build the Nunit test suite you will need to install <a href="http://nunit.sourceforge.net">NUnit 2.2</a>
</p>
<p>
If you want to build the v1.7 sources on windows using mono you will need to set the MONO_EXTERNAL_ENCODINGS environment
variable, an example:
</p>
<p>
	<b>MONO_EXTERNAL_ENCODINGS=default_locale</b>
<p>

<h3>Building the sources on Linux</h3>
<p>
You will need a working installation of <a href="http://www.mono-project.com/">Mono</a>.
There provider sources ships with a makefile to build the sources on linux that is located 
in <i>builds/linux<i>.
</p>


<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>