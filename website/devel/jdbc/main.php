<?php
if (eregi("main.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>About JayBird - The Firebird Class 4 JCA-JDBC driver </h4>
<h5>By Roman Rokytskyy</h5>
5th November 2002
<p>
JayBird has complete JDBC 1.2 implementation, all JDBC 2.1 metadata
support, BLOBs, none of JDBC 3.0 functions, some JDBC SE 2.1 (DataSource,
some non-standard connection pooling, I have almost finished
ConnectionPoolDataSource, but I need to make it JNDI-able), and the main part of
JCA specification (ManagedConnectionFactory, ManagedConnection with
XAResource support and LocalTransaction support).
</p>
<p>
Database connectivity in Java is fairly well standardised. The main standard is
the JDBC specification (java.sql.* classes, current version 3.0). It defines
the concepts for Connection, Statement, PreparedStatement, CallableStatement and
ResultSet. It also defines the standard data types in Java.
</p>
<p>
<b>java.sql.Connection</b> represents a physical connection to a database. Each
connection has one and only one transaction associated with it. This
transaction is started when the connection is opened and can be either committed
or rolled back. You can specify different transaction isolation levels
(none, read uncommitted, read committed, repeatable read and snapshot).
The connection instance is also a factory for different statement objects.
</p>
<p>
<b>java.sql.Statement</b> - is the most simple SQL statement. You can execute either a query or an update. If you execute a query (SELECT statement), you obtain an instance of a ResultSet. If you execute update, you get number of modified rows.
</p>
<p>
<b>java.sql.ResultSet</b> represents a result set returned from the server. The most simple result set is an iterator. After the request is executed, you can
iterate through all of the result set and get the data using data access methods
(getInt(colNumber), getString(colNumber), etc.).
</p>
<p>
<b>java.sql.PreparedStatement</b> represents a prepared statement. You can prepare it
once, then set parameters and execute it many times.
</p>
<p>
<b>java.sql.CallableStatement</b> - is a wrapper for a stored procedure call. I think it was introduced just to make everybody happy, because some database servers seem to have problems executing stored procedures using either java.sql.Statement or java.sql.PreparedStatement.
</p>
<p>
Also, there is a lot of metadata information associated with each of the
object (database features, supported data types, fetch size, etc.).
</p>
<h5>Specifications:</h5>
<ul>
<li>JDBC 1.2 - basic metadata plus all of the described above.
<li>JDBC 2.1 - support for arrays, BLOBs, batch updates, additional metadata,
scrollable result sets, updatable result sets, modification of concurrency for specific statement/result set, mapping of Java objects into SQL data types.
<li>JDBC 3.0 - more metadata and savepoints, more object-relational mapping.
</ul>
<p>
In addition to JDBC specification, Java has JDBC SE (Standard Extensions)
2.0. Standard extensions specify the features the driver has to provide in order to work correctly in a J2EE application server. It covers three main issues: connection pooling, integration with JNDI, and integration with JTA.
</p>
<p>
Connection pooling is easy to understand: opening a physical connection to a
database is expensive operation. So we open some connections in the
beginning and then reuse them in different parts of application.
</p>
<p>
JNDI integration. JNDI (Java Naming and Directory Interface) is the main
source for "services" within application server. Each service has a name,
and an application developer uses this name to find an object. JNDI can be
viewed as a generalization of NDS, LDAP, ActiveDirectory, etc.
</p>
<p>
JTA integration. JTA (Java Transaction API) specifies "high-level interfaces
between a transaction manager and the parties involved in a distributed
transaction system: the application, the resource manager, and the
application server". JTA defines the notion of a XAResource that can be enlisted
in a distributed transaction. XA resources must support a two-phase commit
protocol.
</p>
<h5>JDBC 2.0 SE</h5>
<p>
JDBC 2.0 SE defines concept of DataSource, ConnectionPoolDataSource, and
XADataSource.
</p>
<p>
<b>javax.sql.DataSource</b> is a factory of java.sql.Connection instances.
DataSource objects are usually obtained doing a lookup in JNDI. DataSource
objects return your already open JDBC connection. The main advantage is that an
application developer does not need to worry about database connection
parameters, this is handled by an application server. The only thing he/she
needs to know is the JNDI name of data source object. The application server
reads the configuration at startup, constructs the correct DataSource and binds it into the JNDI tree.
</p>
<p>
<b>javax.sql.ConnectionPoolDataSource</b> is a factory of pooled connections. Each pooled connection represents a physical connection to a database, while
connections returned by a javax.sql.DataSource object are "recyclable"
connections (when you close recyclable connection, it is not closed
physically, but returned to the connection pool).
</p>
<p>
<b>javax.sql.XADataSource</b> is a factory of XAConnection objects. Each
XAConnection object is a pooled connection (i.e. represents a physical
connection to a database) and has an XAResource implementation that can be
associated with XA transaction. The transaction manager of an application server
manages the transaction for this connection. It is no longer allowed to call
java.sql.Connection.commit() if the connection participates in a global
transaction.
</p>

<h5>JCA (Java Connector Architecture)</h5>
<p>
JCA (Java Connector Architecture) can be viewed as generalisation of JDBC SE
2.0 for different types of EIS connectors (like connectors to CICS systems,
etc.). It defines the concepts of ManagedConnection, ManagedConnectionFactory,
LocalTransaction, and few others.
</p>
<p>
<b>javax.resource.spi.ManagedConnectionFactory</b> is a factory of managed
connections. It also implements managed connection pooling.
</p>
<p>
<b>javax.resource.spi.ManagedConnection</b> represents a physical connection to the EIS system. Each managed connection can provide an XAResource implementation
for distributed transaction management, but it also can provide a
LocalTransaction that provides support of "transactions that are managed
internally to an EIS resource manager, and do not require an external
transaction manager".
</p>
<p>
<?php
$action="topics";
$fid=3;
require('tf.actions.php');

?>
Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>