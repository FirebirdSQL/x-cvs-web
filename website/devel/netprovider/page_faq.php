<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<p><a href="#top"></a><h4>Firebird .NET Provider - Frequently Asked Questions</h4></p>

<p>1. <a href="#1">What versions of the MS.NET Framework are supported ?</a></p>
<p>2. <a href="#2">Can the provider be used with mono 1.0 ?</a></p>
<p>3. <a href="#3">Can the provider be used with the MS.NET Compact Framework ?</a></p>
<p>4. <a href="#4">What versions of Firebird are supported ?</a></p>
<p>5. <a href="#5">Can i use the provider with the Firebird embedded server ?</a></p>
<p>6. <a href="#6">Does the provider use gds32.dll/fbclient.dll ?</a></p>
<p>7. <a href="#7">Can the provider work with Delphi 8 for .NET ?</a></p>
<p>8. <a href="#7">Can the provider work with Visual Studio .NET ?</a></p>
<p>9. <a href="#8">Can i generate type datasets at design time using the FbDataAdapter component ?</a></p>
<p>10. <a href="#9">There are sample applications using the .NET provider ?</a></p>

<br />

<p><a name="1"></a>1. <b>What versions of the MS.NET Framework are supported ?</b></p>
<p>
.NET 1.0 and .NET 1.1
</p>
<p>It can be used with the .NET Framework 2.0 Beta 1 too, but it does
no take advantage of the new System.Data.ProviderBase classes.</p>
<p>That will be done for the version 2.0 of the provider that, in first 
place, will work only with the .NET Framework 2.0</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="2"></a>2. <b>Can the provider be used with mono 1.0 ?</b></p>
<p>
Yes.
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="2"></a>3. <b>Can the provider be used with the MS.NET Compact Framework ?</b></p>
<p>
No. There are plans to port the provider to the MS.NET Compact Framework in the near future.
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="4"></a>4. <b>What versions of Firebird are supported ?</b></p>
<p>
Firebird 1.0.x and 1.5.x ( it should work with Interbase 6.0 too. )
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="5"></a>5. <b>Can i use the provider with the Firebird embedded server ?</b></p>
<p>
Yes, since v1.6, you should add a ServerType=1 to the connection string.
</p>
<p>
The provider will look by default (unless the assembly was built using the
GDS32, FBCLIENT or VULCAN defines) for the fbembed.dll.
</p>
<p>
The embedded server documentation states that the fbembded.dll should be renamed
to fbclient.dll or gds32.dll, <b>that is not needed in the .NET provider</b> 
(as mentioned before unless the provider wasn't build with the default defines).
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="6"></a>6. <b>Does the provider use gds32.dll/fbclient.dll ?</b></p>
<p>
No, you don't need to install the Firebird client to work with the .NET provider.
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="7"></a>7. <b>Can the provider work with Delphi 8 for .NET ?</b></p>
<p>
Yes, but no with the Borland Data Provider, for that you will need to use
the Borland Data Provider for Firebird.
</p>
<p>
You need to add a reference to the provider assembly in your project and 
you can add the provider components to the Delphi 8 Toolbox.
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="8"></a>8. <b>Can the provider work with Visual Studio .NET ?</b></p>
<p>
Yes.
</p>
<p>
You need to add a reference to the provider assembly in your project and 
you can add the provider components to the Visual Studio .NET Toolbox.
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="9"></a>9. <b>Can i generate type datasets at design time using the FbDataAdapter component ?
</b></p>
<p>
No, design time support is limited to the FbConnection and FbCommand components.
</p>
<p>
You can generate typed datasets by code using the <b>TypedDataSetGenerator</b> .NET class.
</p>
<p>	
    <pre class=code>
FbConnection connection = new FbConnection(connectionString);

DataSet employees = new DataSet("Employees");
FbCommand command = new FbCommand("select * from employee", connection);
FbDataAdapter adapter = new FbDataAdapter(command);
adapter.MissingSchemaAction = MissingSchemaAction.AddWithKey;

adapter.Fill(employees, "Employees");

// Generate the employee TypedDataSet
string fileName = @"d:\employee.cs";

StreamWriter tw = new StreamWriter(new FileStream(fileName,
FileMode.Create,
FileAccess.Write));

CodeNamespace      cn = new CodeNamespace("employees");
CSharpCodeProvider cs = new CSharpCodeProvider();
ICodeGenerator     cg = cs.CreateGenerator();

TypedDataSetGenerator.Generate(employees, cn, cg);

cg.GenerateCodeFromNamespace(cn, tw, null);

tw.Flush();
tw.Close();

employees.WriteXmlSchema(@"d:\employee.xsd");

connection.Close();
    </pre>
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="10"></a>10. <b>There are sample applications using the .NET provider ?</b></p>
<p>
There are a port to Firebird, that uses the .NET provider, of the <a href="http://www.asp.net/Default.aspx?tabindex=8&tabid=47">Microsoft IssueTracker Starter Kit</a>, 
but, it's not downloadable in the web because it mantains the original license.
</p>
<p>
If you are interested on it send an email to <i>carlosga at telefonica.net</i>
</p>
<p align=CENTER><a href="#top">return to top</a></p>


<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>