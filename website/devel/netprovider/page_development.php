<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>Firebird ADO.NET Data Provider Development v1.7</h4>

<p>
<h4>The development of the v1.7 is going to be focused on:</h4>
</p>
<p>
	<ul>
		<li>The reimplementation of the <b>Firebird events</b> system.</li>
		<li>Improve management of resources allocated in the Firebird server (connections, statements, transactions, ...).</li>
		<li>Improve .NET provider internals.</li>
		<li>Make the API more consistent, for example, in the usage of connection strings.</li>
		<li>Changes on database schema support, to implement it in similar way as in the 
		.NET 2.0 Beta 1 documentation (when the changes are ready it will be back-ported to v1.6).</li>
		<li>Design Time support for the FbDataAdapter class.</li>
	</ul>
</p>
<h3>Latest development news (2004-11-20)</h3>
<p>
For the development of the v1.7 Beta 2 we are working on the design time support 
for FbDataADpter class.
</p>
<p>
The new design time support will have:
<ul>
    <li>A wizard for the Data Adapter configuration</li>
    <li>A DataSet generator (for typed or untyped DataSets)</li>
</ul>
</p>
<h5>The Configuration Wizard</h5>
<p>
For the configuration wizard we are working on a new Wizard Framework
that could be reused in the future if we want to add more wizards
on the design time support of the provider.
</p>
<p>
The wizard steps will have configuration options as similar as possible 
to the ones supported by the SqlClient one.
</p>
<h5>The DataSet Generator</h5>
<p>
The DataSet Generator will do generation of typed or untyped datasets.
</p>
<p>For the untyped DataSets you can select if you want to add them to the 
actual Designer.</p>
<p>
For Typed DataSets generation you can select on the Version of Visual Studio you are working on
in order to be able of add the Typed DataSet to the active project, the Visual Studio available 
versions are:
</p>
<p>
    <ul>
        <li>Visual Studio 2003</li>
        <li>Visual Studio 2005</li>
        <li>Visual C# Express 2005 <b>(this is the one being used for testing)</b></li>
    </ul>
</p>
<p>
The generated Typed DataSet will be added to the active Visual Studio project
as an embedded resource.
</p>
<p>
For allow the Typed DataSets to be added to the active Visual Studio project
the provider makes usage of the <a href="http://msdn.microsoft.com/library/default.asp?url=/library/en-us/vsintro7/html/vxoriExtendingVisualStudioEnvironment.asp">Visual Studio Extensibility</a> support.
</p>
<p>
In first place the support to generate Typed DataSets will not available on 
official provider releases, as for the Visual Studio Extensibility support
the provider needs references to envdte.dll and VSLangProj.dll
</p>
<p>
Anyway the provider could be build using a VISUAL_STUDIO define in order to include
that feature.
</p>

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