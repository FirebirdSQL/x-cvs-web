<html>
<body>
<table bgcolor="228B22" cellpadding=1 cellspacing=1>
  <tr> 
    <td> 
<!-- ------------------------------------------- -->
<table colspecs=2 cellpadding=3 bgcolor="FFFAF0"> 
  <tr>
    <td colspan=2>
<h4>Developer's Report for July-September 2004</h4>
    </td>
  <tr>
  <tr>
    <td>Project:
    </td>
    <td><h5>Firebird ADO.NET Data Provider</h5>
    </td>
  </tr>
  <tr>
    <td>Developer: 
    </td>
    <td>Carlos Guzmán Álvarez
    </td> 
  </tr>
  <tr> 
    <td colspan=2>
<hr size=1>
<h5>Overview</h5>
    </td>
  </tr> 
  <tr>
    <td colspan=2>

    The work done has been focused on: <ol>
<li>Stabilization of the v1.6 version. 
<li>Development of the new 1.7 version. 
<li>Continue with the development of the Borland Data Provider. 
<li>Documentation about the Firebird procotocol as it's implemented in the .NET Provider. 
<li>Updated of the .NET Provider section of the Firebird Web Site. 
<li>Answering user questions on the Firebird .NET provider developement list. 
</ol>
    </td>
  </tr>
  <tr>
    <td colspan=2>
<h5>Resume of the work done (by release) in 1.6 sources.</h5>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.6.2<br>( 2004-09-10 )
    </td>
    <td>
<ul>
<li>Fixed bug #1017108
<li>Fixed bug #1015453
<li>Fixed bug #1013031
<li>Fixed connection pooling that was non working properly
<li>Minor fixes to the unicode database support when working with the embedded server.
<li>Better fit to ADO.NET in the FbDataReader class.
<li>Added some improvments in the database schema stuff. 
</ul>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.6.1<br>( 2004-08-13 )
    </td>
    <td>
<ul> 
<li>Fixed bug #1007104
<li>Fixed bug #995178
<li>Fixed bug #998002
<li>Fixed bug #1000160
<li>Fixed bug #1003519
<li>Removed the limitation of one DataReader per connection. (Now it's possible to have many 
DataReaders per connection and only one per command).
<p>
<li>Changes in the Database Schema suport, most important are:
<ul>
<li>Several bugfixes.
<li>All the source files and classes related to the Database schema support has been 
renamed to remove the 'Schema' suffix.
<li>Added new schemas: Restrictions, MetaDataCollections, DataTypes.
<li>Added new columns to some schemas: XXX_CATALOG, XXX_SCHEMA
<li>FbConnection class has 3 new methods (added following the documentation of the 
.NET Framework 2.0 Beta 1) : GetSchema(), GetSchema(string), GetSchema(string[])
<li>FbDbSchemaType and FbConnection.GetDbSchemaTable are set as Obsolete.
<li>Added new column CHARACTER_OCTECT_LENGTH to the Columns, 
ProcedureParameters, Domains and ViewColumnUsage schemas, along with this 
change now the column XXXX_SIZE for the char/varchar columns will hold the length 
in characters.
</ul>
</ul>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.6.0<br>( 2004-07-16 )
    </td>
    <td>
<ul>
<li>Fixed bug in FbCommand class on subsequent command executions between open & close 
connection operations
<li>Fixed NUMERIC_SCALE value in columns, domains and procedure parameters schemas
<li>Changes in FbDataReader.GetSchema for set the numeric precision and scale only for numeric 
and decimal columns
<li>Added Serializable attribute to FbDbSchemaType structure
<li>Added Serializable attribute to FbCharset structure
</ul> 
    </td>
  </tr>
  <tr>
    <td colspan=2>
<h5>Resume of the work done (by release) in 1.7 sources</h5>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.7 Beta 1<br>( 2004-10-99 )
    </td>
    <td>
<ul>
<li>Added support for the .NET Compact Framework 2.0 Beta 1
<li>Added new constants for standard buffer sizes in the IscCodes class.
<li>Added better handling (trying to mimic the SqlClient behavior) for the Max Pool Size parameter 
of the connection pooling implementation.
<li>Globalization changes.
<li>Improved GC interaction in the GdsConnection class by adding new GC.SupressFinalize calls.
<li>Improved handling of parameters with null values on the embedded server support (backported 
to 1.6)
</ul>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.7 Alpha 3<br>( 2004-09-19 )
    </td>
    <td>
<ul>
<li>Fixed bug #1015453
<li>Fixed bug #1017108
<li>Fixed execution of unicode sql commands (that doesn't use parameters) when working with the 
embedded server
<li>Improvements and bugfixes in the connection pooling implementation.
<li>Added a new FbConnectionStringBuilder class (FbConnectionString class is now internal)
<li>Reworked the usage (internal) of database and service parameter buffers and added new ones 
for blobs and transactions
<li>Improved information request made to the server (server version, statement type and number of 
rows affected by a insert, delete or update command)
<li>Added some improvements in the database schema stuff
<li>Added changes to the FbDataReader.GetSchemaTable method to avoid schema command 
execution when the field doesn't belong to a firebird table 
</ul>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.7 Alpha 2<br>( 2004-08-22 )
    </td>
    <td>
<ul>
<li>Fixed bug #995178
<li>Fixed bug #998002
<li>Fixed bug #1000160
<li>Fixed bug #1003519
<li>Fixed bug #1007104
<li>Fixed bug #1013031
<li>Removed the limitation of one DataReader per connection.(Now you can have many 
DataReader's per connection and only one per command).
<li>Override DbDataAdapter.Update(DataRow[], TableMappingCollection)method in the 
<li>FbDataAdapter class. This is done for execute Insert, Update and Delete querys in the 
DataAdapter implementation using FbCommand.ExecuteNonQuery, MS implementation uses 
FbCommand.ExecuteReader method and this doesn't work as expected when executing insert, 
update or delete stored proceudres.
<li>Reworked row fetching using a Queue instead of a object[]. (This is an internal change that 
affects only the native C# GDS implementation).
<li>Added a new FetchSize property to the FbCommand class and a new "Fetch Size" parameter to 
the connection string. This allows to change the number of rows that will fetched when doing 
sending a fetch to the Firebird Server.
<li>Reworked output parameter handling on stored procedure execution.
<li>Removed the support for batch queries as it was implemented only using 
FbDataReader.NextResult and was very limited.
<p>
<li>Changes in the Database Schema suport, most important are:
<ul>
<li>Several bugfixes.
<li>All the source files and classes related to the Database schema support has been 
renamed to remove the 'Schema' suffix.
<li>Added new schemas: Restrictions, MetaDataCollections, DataTypes.
<li>Added new columns to some schemas: XXX_CATALOG, XXX_SCHEMA
<li>FbConnection class has 3 new methods (added following the documentation of the 
.NET Framework 2.0 Beta 1) : GetSchema(), GetSchema(string), GetSchema(string[])
<li>FbDbSchemaType and FbConnection.GetDbSchemaTable are set as Obsolete.
<li>Added new column CHARACTER_OCTECT_LENGTH to the Columns, 
ProcedureParameters, Domains and ViewColumnUsage schemas, along with this 
change now the column XXXX_SIZE for the char/varchar columns will hold the length 
in characters.
</ul>
</ul>
    </td>
  </tr>
  <tr>
    <td valign="top">
1.7 Alpha 1<br>( 2004-07-22 )
    </td>
    <td>
<ul>
<li>Fixed bug #995178
<li>Initial reimplementation of the Firebird Events System
<li>Initial changes to FbConnection, FbCommand and FbTransaction classes to release 
resources allocated in the Firebird Server without the need of explicity call to Dispose (if an 
object goes out of scope the allocated resources should be released in the object  
destructor)
<li>New FbConnectionString class
<li>The Firebird Services implementation now works using connection strings
<li>Internal rework of GDS's implementations.
<li>Changed private methods naming to PasCal case to match the MS Guidelines
<li>Changed installation script to register the assembly in the Visual Studio Assembly references 
section of the Windows registry.
<li>Fixes in the Connection Pooling implementation
<li>Added new overloads of the FbConnection.CreateDatabase and FbConnection.DropDatabase 
(using connection strings as parameters) and set as obsolte the previous ones.
<li>Better naming for some internal classes.
<ul>
<li>FesDbAttachment ->FesDatabase
<li>FesSvcAttachment -> FesServiceManager
<li>GdsDbAttachment -> GdsDatabase
<li>...
</ul>
</ul>
    </td>
  </tr>
  <tr>
    <td colspan=2>
<h5>Resume of the work done in the Borland Data Provider</h5>
    </td>
  </tr>
  <tr>
    <td valign="top">
BDP 1.0
    </td>
    <td>
<ul>    
<li>Bug fixes for problems reported in the firebird .net provider development list.
<li>Improved the Nunit test suite with new test cases and reworked some of the existent for match 
the BDP.
</ul>
    </td>
  </tr>
  <tr>
    <td colspan=2>
<h5>Firebird procotol documentation</h5>
    </td>
  </tr>
  <tr>
    <td colspan=2>
    As part of the Firebird.NET provider documentation now there are a new document explaining how the      Firebird protocol is implemented in the .NET Provider. 
<br>
    The document is available in DocBook format (Thanks to the explains and help of Paul Vinkenoog around the 
DocBook format) in the manual CVS module of the Firbeird CVS. 
    </td>
  </tr>
  <tr>
    <td colspan=2>
<h5>Other</h5>
    </td>
  </tr>
  <tr>
    <td valign="top">
Firebird Web site update
    </td>
    <td>  
The .NET provider section of the Firebird web site is now updated with information about the provider: 
<ol>
<li>Development information 
<li>Examples 
<li>Frequently Asked Questios (FAQ) 
<li>Feature Lists 
<li>Tools (A short list of tools that are using the Firebird .NET Provider) 
</ol> 
    </td>
  </tr>
  <tr>
    <td valign="top">
Miscellaneous
    </td>
    <td>
<ol>
<li>Added new test cases to the Nunit test suite of v1.6, v1.7 and the Borland Data Provider sources. 
<li>Updated SDK documentation of the .NET provider (v1.6 and 1.7) 
<li>Fixes on Globalization issues reported by FxCop 
</ol> 
    </td>
  </tr> 
  <tr>
    <td colspan=2>
<i>Carlos Guzmán Álvarez<br>
Vigo-Spain</i>
<hr size=1>
    </td>
  </tr>
</table>
<!-- ------------------------------------------- -->
    </td>
  </tr>
</table>
<p>
Back to <A href="index.php?op=devel&sub=netprovider">.NET Providers page</A>.
<p>
