<?php
if (eregi("page_development.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<h4>About JayBird - The Firebird Class 4 JCA-JDBC driver </h4>
<h5>By Roman Rokytskyy</h5>
29 August 2004
<p>
JayBird is JCA/JDBC driver suite to connect to Firebird database server.
Historically Borland opened sources of type 3 JDBC driver called
InterClient. However due to some inherent limitations of Firebird client
library it was decided that type 3 driver is a dead end, and Firebird team
developed a pure Java implementation of the wire protocol. This implementation
became the basis for JayBird, a pure Java driver for the Firebird relational database.
<p>
This driver is based on both the new JCA standard for application server
connections to enterprise information systems and the well known JDBC
standard. The JCA standard specifies an architecture in which an application
server can cooperate with a driver so that the application server manages
transactions, security, and resource pooling, and the driver supplies only
the connection functionality. While similar to the JDBC 2 XADataSource?
idea, the JCA specification is considerably clearer on the division of
responsibility between the application server and driver.
<p>
The driver requires at least JDK 1.3.1 to compile and run properly.
<p>
For more information please refer to the
<a href="http://jaybirdwiki.firebirdsql.org/JayBirdHome">JayBird Wiki pages</a>

<hr size=1>

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
objects (database features, supported data types, fetch size, etc.).
</p>
<h5>Specifications:</h5>
<ul>
<li>JDBC 2.0 - Driver passed complete JDBC compatibility test suite, though some
features are not implemented. It is not officially JDBC compliant, because
of high certification costs.
<p>
<li>JDBC 2.0 Standard Extensions - JayBird implement the following
interfaces from javax.sql.* package:
<ul>
<li>ConnectionPoolDataSource implementation provides connection and
prepared statement pooling.
<p>
<li>DataSource implementation provides seamless integration with major web
and application servers.
<p>
<li>XADataSource implementation provides the means to use the driver in
distributed transactions.
</ul>
<p>
<li>JCA 1.0 - JayBird provides implementation of
javax.resource.spi.ManagedConnectionFactory and related interfaces. CCI inte
rfaces are not supported.
<p>

<li>JTA 1.0.1 - Driver provides implementation of
javax.transaction.xa.XAResource interface via JCA framework and
javax.sql.XADataSource implementation.
<p>

<li>JMX 1.2 - JayBird provides MBean that allows creating and dropping databases
via JMX agent.
<p>

Back to <A href="index.php?op=devel">Developer's Corner</A>.
<p>
