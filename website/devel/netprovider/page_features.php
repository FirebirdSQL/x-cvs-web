<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>Firebird ADO.NET Data Provider v1.6 (stable) Feature list</h4>
<ul>
	<li>Written 100% in C#, using managed code.</li>
	<li>
	    <p>Supported in:</p>
	    <p>
	        <ul>
	            <li>MS.NET Framework 1.1</li>
	            <li>MS.NET Framework 1.0</li>
	            <li><a href="http://www.mono-project.com">mono:: 1.0</a></li>
	        </ul>
	    </p>
	</li>
	<li><p>Support for Firebird 1.0, Firebird 1.5 and Interbase 6.0 servers.</p></li>
	<li><p>Provides access to the Firebird embedded server.</p></li>
	<li>
		<p>Firebird services implementation</p>
		<p>
			<ul>
				<li>Backup.</li>
				<li>Configuration.</li>
				<li>Log.</li>
				<li>Restore.</li>
				<li>Security.</li>
				<li>Server properties.</li>
				<li>Statistical.</li>
				<li>Validation.</li>
			</ul>
		</p>
	</li>
	<li>
		<p>Supported character sets</p>
		<p>
			<ul>
			    <li>NONE</li>
			    <li>ASCII</li>
			    <li>UNICODE_FSS</li>
			    <li>SJIS_0208</li>
			    <li>EUCJ_0208</li>
			    <li>ISO2022-JP</li>
			    <li>DOS437</li>
			    <li>DOS850</li>
			    <li>DOS860</li>
			    <li>DOS861</li>
			    <li>DOS863</li>
			    <li>DOS865</li>
			    <li>ISO8859_1</li>
			    <li>ISO8859_2</li>
			    <li>KSC_5601</li>
			    <li>WIN1250</li>
			    <li>WIN1251</li>
			    <li>WIN1252</li>
			    <li>WIN1253</li>
			    <li>WIN1254</li>
			    <li>WIN1255</li>
			    <li>WIN1256</li>
			    <li>WIN1257</li>
			    <li>BIG_5</li>
			    <li>GB_2312</li>
			</ul>
		</p>
	</li>
	<li>
        <p>Data types</p>
        <p>
            <ul>
                <li>Array</li>
                <li>Smallint</li>
                <li>Integer</li>
                <li>Bigint</li>
                <li>Numeric</li>
                <li>Decimal</li>
                <li>Float</li>
                <li>Double</li>
                <li>Char</li>
                <li>Varchar</li>
                <li>Date</li>
                <li>Time</li>
                <li>Timestamp</li>
                <li>Binary blobs</li>
                <li>Text blobs</li>
            </ul>
        </p>
	</li>
	<li><p>ISQL scripts parsing and execution.</p></li>
	<li><p>Connection pooling implementation.</p></li>
	<li><p>Command builder implementation.</p></li>
	<li>
	    <p>Named parameters (SQL Server like implementation).</p>
	    <p>An example:</p>
	    <p>
	        <pre>
FbConnection connection = new FbConnection(connectionString);
FbCommand command = new FbCommand("select * from table_name were field_name = @param_value");
FbDataReader reader = command.ExecuteReader();
while(reader.Read)
{
	...
}
reader.Close();
connection.Close();
            </pre>
        </p>
	</li>
	<li>
	    <p>Stored procedure execution using SQL Server-like syntax</p>
	    <p>An example:</p>
	    <p>
	        <pre>
FbConnection connection = new FbConnection(connectionString);
FbCommand command = new FbCommand("sp_select_data");
command.CommandType = CommandType.StoredProcedure;
FbDataReader reader = command.ExecuteReader();
while(reader.Read)
{
	...
}
reader.Close();
connection.Close();
	        </pre>
	    </p>
	</li>
	<li><p>Support for metadata information retrieval.</p></li>
</ul>

<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>