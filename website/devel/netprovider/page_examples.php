<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<p><a href="#top"></a><h4>Firebird .NET Provider - Examples of use</h4></p>

<p>1. <a href="#1">Connection pooling.</a></p>
<p>2. <a href="#2">Update a text blob field.</a></p>

<br />

<p><a name="1"></a>1. <b>Connection pooling</b></p>
<p>
    <pre class=code>
public static void Main(string[] args)
{
    // Set the ServerType to 1 for connect to the embedded server
    string connectionString =
        "User=SYSDBA;"                  +
        "Password=masterkey;"           +
        "Database=SampleDatabase.fdb;"  +
        "DataSource=localhost;"         +
        "Port=3050;"                    +
        "Dialect=3;"                    +
        "Charset=NONE;"                 +
        "Role=;"                        +
        "Connection lifetime=15;"       +
        "Pooling=true;"                 +
        "MinPoolSize=0;"                +
        "MaxPoolSize=50;"               +
        "Packet Size=8192;"             +
        "ServerType=0";

    FbConnection myConnection1 = new FbConnection(connectionString);
    FbConnection myConnection2 = new FbConnection(connectionString);
    FbConnection myConnection3 = new FbConnection(connectionString);

    try
    {
        // Open two connections.
        Console.WriteLine ("Open two connections.");
        myConnection1.Open();
        myConnection2.Open();

        // Now there are two connections in the pool that matches the connection string.
        // Return the both connections to the pool. 
        Console.WriteLine ("Return both of the connections to the pool.");
        myConnection1.Close();
        myConnection2.Close();

        // Get a connection out of the pool.
        Console.WriteLine ("Open a connection from the pool.");
        myConnection1.Open();

        // Get a second connection out of the pool.
        Console.WriteLine ("Open a second connection from the pool.");
        myConnection2.Open();

        // Open a third connection.
        Console.WriteLine ("Open a third connection.");
        myConnection3.Open();

        // Return the all connections to the pool.  
        Console.WriteLine ("Return all three connections to the pool.");
        myConnection1.Close();
        myConnection2.Close();
        myConnection3.Close();
    }
    catch(Exception e)
    {
	    Console.WriteLine(e.Message);
    }
}
    </pre>
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p><a name="2"></a>2. <b>Update a text blob field.</b></p>
<p>
    <pre class=code>
public static void Main(string[] args)
{
    // Set the ServerType to 1 for connect to the embedded server
    string connectionString =
        "User=SYSDBA;"                  +
        "Password=masterkey;"           +
        "Database=SampleDatabase.fdb;"  +
        "DataSource=localhost;"         +
        "Port=3050;"                    +
        "Dialect=3;"                    +
        "Charset=NONE;"                 +
        "Role=;"                        +
        "Connection lifetime=15;"       +
        "Pooling=true;"                 +
        "Packet Size=8192;"             +
        "ServerType=0";

    FbConnection myConnection = new FbConnection(connectionString);
    myConnection.Open();

    FbTransaction myTransaction = myConnection.BeginTransaction();

    FbCommand myCommand = new FbCommand();

    myCommand.CommandText	= "UPDATE TEST_TABLE_01 SET CLOB_FIELD = @CLOB_FIELD WHERE INT_FIELD = @INT_FIELD";
    myCommand.Connection	= myConnection;
    myCommand.Transaction	= myTransaction;

    myCommand.Parameters.Add("@INT_FIELD", FbType.Integer, "INT_FIELD");
    myCommand.Parameters.Add("@CLOB_FIELD", FbType.Text, "CLOB_FIELD");           

    myCommand.Parameters[0].Value = 1;
    myCommand.Parameters[1].Value = GetFileContents(@"GDS.CS");

    // Execute Update
    myCommand.ExecuteNonQuery();

    // Commit changes
    myTransaction.Commit();

    // Free command resources in Firebird Server
    myCommand.Dispose();

    // Close connection
    myConnection.Close();
}

public static string GetFileContents(string fileName)
{
    StreamReader reader = new StreamReader(new FileStream(fileName, FileMode.Open));

    string contents = reader.ReadToEnd();

    reader.Close();

    return contents;
}    
    </pre>
</p>
<p align=CENTER><a href="#top">return to top</a></p>

<p>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>