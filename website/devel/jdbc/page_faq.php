
<h1><font size="6" style="font-size: 20pt"><a name="top"></a>Frequently 
  Asked Questions</font></h1>
<P ALIGN=CENTER><font size="4">JayBird JCA/JDBC Driver for Firebird</font></P>
<P ALIGN=CENTER>- Last Updated 01/13/04 -<BR>
</P>
      <p><a href="#1">1</a><a href="#1">. How much of JDBC 2.0 is supported by 
        JayBird?</a></p>
      <p><a href="#2">2. What parts of JDBC 2.0 are NOT Supported by JayBird</a></p>
      <p><a href="#3">3. Where do I get JayBird?</a></p>
      <p><a href="#4">4. How do I install JayBird?</a></p>
      <p><a href="#5">5. How do I use built-in Connection Pooling?</a></p>
      <p><a href="#6">6. How do I use JayBird in Java code?</a></p>
      <p><a href="#7">7. How do I use JayBird with JBoss?</a></p>
      <p><a href="#8">8. How do I use JayBird with Tomcat?</a></p>
      <p><a href="#9">9. </a><a href="#9">How do I use JayBird with </a><a href="#9"> 
        JBuilder?</a></p>
      <p><a href="#10">10. </a><a href="#10">How do I use BLOBs with JayBird</a><a href="#10">?</a></p>
      <p><a href="#11">11. How do I use different character sets with JayBird?</a></p>
      <p><a href="#12">12. How do I report bugs?</a></p>
      <p><a href="#13">13. How do I get sources from SourceForge using CVS?</a></p>
      <p><a href="#14">14. How can I participate in the development project?</a></p>
      <p><a href="#15">15. Where can I get help</a>?</p>
      <p><a href="#16">16. How do I join the Mailing List</a>?</p>
      <p><a href="#17">17. Are there any known bugs?</a></p>
      <p><a href="#18">18. What JVM and JARs are needed to use JayBird?</a></p>
      <p><a href="#19">19. Why isn't JayBird in one jar file?</a></p>
      <p><a href="#20">20. What are some common errors?</a></p>
      <p><a href="#21">21. Is there any compliance and performance information 
        available?</a></p>
      <p><a href="#22">22. What is the history of JayBird?</a></p>
      <p><a href="#23">23. Frequently Asked Questions</a></p>
      <p><a href="#24">24. What tasks are left to do?</a></p>
      <p><a href="#25">25. Where can I submit corrections/additions to the Release 
        Notes and FAQ?</a></p>
      <p><a href="#26">26. How do I turn off logging?</a></p>
      <p><a href="#27">27. How do I use JayBird with my development environment?</a></p>
      <p><a href="#28">28. Does JayBird provide any kind of security?</a></p>
      <p><a href="#29">29. Does JayBird support dialect 1, 2, and 3 databases?</a></p>
      <p><a href="#30">30. Why don't arguments or ampersands (&amp;) work in my 
        URL?</a></p>
      <p><a href="#31">31. Why do I see &quot;????&quot; instead of the correct 
        characters?</a></p>
      <p><a href="#32">32. Can I use JayBird with Open Office?</a></p>
      <p><a href="#33">33. How do I create a database with JayBird?</a></p>
      <p><a href="#34">34. How do I use JayBird with Windows 95/98?</a></p>
      <p><a href="#35">35. Why does building the CVS code fail?</a></p>
      <p><a href="#36">36. Why aren't my connections ever returned to the pool?</a></p>
      <p><a href="#37">37. How do I use JayBird with DreamWeaver UltraDev?</a></p>
      <p><a href="#38">38. Why do I see a &quot;javax.naming.Referenceable&quot; 
        error?</a></p>
      <p><a href="#39">39. How do I use stored procedures with JayBird?</a></p>
      <p><a href="#40">40. Why are VARCHAR Strings sometimes padded?</a></p>
      <p><a href="#41">41. Can I use CachedRowSet with JayBird?</a></p>
      <p><a href="#dpb">42. How do I pass Database Parameter Buffer (DPB) parameters?</a></p>
      <p><a href="#43">43.What is a good validation query to use with
          JayBird?</a></p>
      <p><a href="#44">44. How can I get the key of the record I just
      inserted?</a></p>
      <p><a href="#45">45. How do I set the default character set of a database?</a></p>
      <p><a href="#46">46. Can you explain how character sets work?</a></p>
      <p><a href="#codeexamples">47. Can you give me some code examples?</a></p>
<HR>
<P ALIGN=CENTER><FONT SIZE=4 STYLE="font-size: 16pt"><a name="1"></a><font size="5">1- 
  How much of JDBC 2.0 is supported by JayBird?</font></FONT></P>
<P ALIGN=CENTER><a href="#top">return to top</a></P>
<P><BR>
  <BR>
</P>
<P>JayBird complies with the JDBC 2.0 core with some features and
methods not implemented. Some of the unimplemented items are required
by the specification and some are optional.</P>
<P><FONT SIZE=4>Implemented features:</FONT></P>
<P>Most useful JDBC functionality (&quot;useful&quot; in the opinion
of the developers).</P>
<P>Complete JCA API support: may be used directly in JCA-supporting application 
  servers such as JBoss and WebLogic.</P>
<P>XA transactions with true two phase commit when used as a JCA
resource adapter in a managed environment (with a TransactionManager
and JCA deployment support).</P>
<P>Includes optional internal connection pooling for standalone use
and use in non-JCA environments such as Tomcat 4.</P>
<P>ObjectFactory implementation for use in environments with JNDI but
no TransactionManager such as Tomcat 4.</P>
<P>DataSource implementations with or without pooling.</P>
<P>Driver implementation for use in legacy applications.</P>
<P>Complete access to all Firebird database parameter block and
transaction parameter block settings.</P>
<P>Optional integrated logging through log4j.</P>
<P>JMX mbean for database management (so far just database create and
drop).</P>
<P><BR>
</P>
<p align=CENTER><font size=4 style="font-size: 16pt"><a name="2"></a><font size="5">2- 
  What parts of JDBC 2.0 are NOT supported by JayBird?</font></font></p>
<p align=CENTER><a href="#top">return to top</a></p>
<P><BR>
  For more information see the JDBC 2.0 Conformance document in the source code 
  in the src/etc folder.</P>
<P><FONT SIZE=4>The following optional features are NOT supported:</FONT></P>
<UL>
  The following optional features and the methods that support it are not implemented:
  <li><b>Batch Updates.</b></li>
  <ul>
    <li>java.sql.Statement</li>
    <ul>
      <li>addBatch(String sql)</li>
      <li>clearBatch()</li>
      <li>executeBatch()</li>
    </ul>
    <li>java.sql.Statement</li>
    <ul>
      <li>addBatch()</li>
    </ul>
  </ul>
  <li><b>Scrollable cursors.</b></li>
  <ul>
    <li>java.sql.ResultSet</li>
    <ul>
      <li>beforeFirst()</li>
      <li>afterLast()</li>
      <li>first()</li>
      <li>last()</li>
      <li>absolute(int row)</li>
      <li>relative(int rows)</li>
      <li>previous()</li>
    </ul>
  </ul>
  <li><b>Updatable cursors.</b></li>
  <ul>
    <li>java.sql.ResultSet</li>
    <ul>
      <li>rowUpdated()</li>
      <li>rowInserted()</li>
      <li>rowDeleted()</li>
      <li>updateXXX(....)</li>
      <li>insertRow()</li>
      <li>updateRow()</li>
      <li>deleteRow()</li>
      <li>refreshRow()</li>
      <li>cancelRowUpdates()</li>
      <li>moveToInsertRow()</li>
      <li>moveToCurrentRow()</li>
    </ul>
  </ul>
  <li><b>Cursors/Positioned update/delete</b></li>
  <ul>
    <li>java.sql.Statement</li>
    <ul>
      <li>setCursorName()</li>
    </ul>
    <li>java.sql.ResultSet</li>
    <ul>
      <li>getCursorName()</li>
    </ul>
  </ul>
  <li><b>Ref, Clob and Array types.</b></li>
  <ul>
    <li>java.sql.PreparedStatement</li>
    <ul>
      <li>setRef(int i, Ref x)</li>
      <li>setClob (int i, Clob x)</li>
      <li>setArray(int i, Array x)</li>
    </ul>
    <li>java.sql.ResultSet</li>
    <ul>
      <li>getArray(int i)</li>
      <li>getArray(String columnName)</li>
      <li>getRef(int i)</li>
      <li>getRef(String columnName)</li>
      <li>getClob(int i)</li>
      <li>getClob(String columnName)</li>
    </ul>
  </ul>
  <li><b>User Defined Types/Type Maps.</b></li>
  <ul>
    <li>java.sql.ResultSet</li>
    <ul>
      <li>getObject(int i, java.util.Map map)</li>
      <li>getObject(String columnName, java.util.Map map)</li>
    </ul>
    <li>java.sql.Connection</li>
    <ul>
      <li>getTypeMap()</li>
      <li>setTypeMap(java.util.Map map)</li>
    </ul>
  </ul>
</UL>
<p>Excluding the unsupported features, the following methods are not yet implemented:</p>
<ul>
  <li><b>java.sql.Statement</b></li>
  <ul>
    <li>cancel()</li>
  </ul>
  <li><b>java.sql.CallableStatement</b></li>
  <ul>
    <li>registerOutParameter(int parameterIndex, int sqlType)</li>
    <li>registerOutParameter(int parameterIndex, int sqlType, int scale)</li>
    <li>wasNull()</li>
  </ul>
  <li><b>java.sql.Blob</b></li>
  <ul>
    <li>length()</li>
    <li>getBytes(long pos, int length)</li>
    <li>position(byte pattern[], long start)</li>
    <li>position(Blob pattern, long start)</li>
  </ul>
</ul>
<p>The following methods are implemented, but do not work as expected:</p>
<ul>
  <li><b>java.sql.Statement</b></li>
  <ul>
    <li>get/setMaxFieldSize does nothing</li>
    <li>get/setQueryTimeout does nothing</li>
  </ul>
  <li><b>java.sql.PreparedStatement</b></li>
  <ul>
    <li>setObject(index,object,type) This method is implemented but behaves as
      setObject(index,object)</li>
    <li>setObject(index,object,type,scale) This method is implemented but behaves
      as setObject(index,object)</li>
  </ul>
  <li><b>java.sql.ResultSetMetaData</b></li>
  <ul>
    <li>isReadOnly(i) always returns false</li>
    <li>isWritable(i) always returns true</li>
    <li>isDefinitivelyWritable(i) always returns true</li>
  </ul>
  <li><b>java.sql.DatabaseMetaData</b></li>
  <ul>
    <li>getBestRowIdentifier(i) always returns empty resultSet</li>
  </ul>
</ul>
<UL>
  <p>&nbsp;
  </p>
</UL>
<hr>
<BR>
<P ALIGN=CENTER><FONT SIZE=4 STYLE="font-size: 16pt"><a name="3"></a><font size="5">3- 
  Where do I get JayBird?</font></FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  <P>In your browser go to:</P>
  
<P><a href="http://sourceforge.net/projects/firebird/">http://sourceforge.net/projects/firebird/</a></P>
  <P>Scroll down the page and find the row containing:</P>
  <P>firebird-jca-jdbc-driver</P>
  <P>Click the link &quot;Download&quot; in the rightmost column of the table 
    in that row. This links you to another page with the zip files of the various 
    versions of JayBird available to be downloaded. JayBird will have the 
    heading &quot;firebird-jca-jdbc-driver&quot;. Click on the version you wish 
    to download. It looks something like: FirebirdSQL-1.x.zip.</P>
  
<P>This will download the driver files to your system. Unzip the file and copy 
  the contents to the appropriate directories on your system as described in <a href="#4">#4 
  &quot;How do I install JayBird?&quot;</a> below.</P>
  
<P>More recent bugfix versions of JayBird can be obtained by downloading the daily 
  snapshot of the project through CVS and building the project. <a href="#13">See 
  #13</a> below for details.</P>
  <hr>
<BR>
<BR>
<P ALIGN=CENTER><FONT SIZE=4 STYLE="font-size: 16pt"><a name="4"></a><font size="5">4- 
  How do I install JayBird?</font></FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  <P>The classes from firebirdsql.jar must be in the classpath of the Java application 
    being compiled, or otherwise made available to your application. The classes 
    from the following packages must also be available:</P>
  <UL>
    <LI> 
      <P>mini-concurrent.jar</P>
    <LI> 
      <P>jaas.jar (included in jdk 1.4)</P>
    <LI> 
      <P>mini-j2ee.jar (now including JDBC classes)</P>
    <LI> 
      <P>log4j-core.jar (if you want logging available)</P>
  </UL>
<P><BR>
The firebirdsql-full.jar file has all of the needed files in one archive for
  ease of use.</P>
  
<P>These archives are included in the binary package.<BR>
</P>
  <P>You can use the jmx management mbean either in a jmx agent (MBeanServer) 
    or as a standalone class. So far it has been tested in jbossmx and the jmxri, 
    although since it is extremely simple it should have no problems in any jmx 
    implementation. Use of jbossmx is highly recommended due to its smaller bug 
    count and because it is in active development.</P>
  <P>For use in a managed environment as a JCA resource adapter, deploy firebirdsql.rar 
    according to the environment's deployment mechanism.</P>
  
<P>For installation in Tomcat, JBoss, JBuilder, and for use with stand alone Java 
  programs see the corresponding sections below.</P>
  <hr>
<BR>
<P ALIGN=CENTER><FONT SIZE=5><a name="5"></a>5- How do I use built-in Connection 
  Pooling?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  
<P><BR>
</P>
  
<P>JayBird features built-in connection pooling. This is very useful because it 
  eliminates the need for external connection pooling routines like Poolman or 
  DBCP.</P>
<P>Use FBWrappingDataSource for pooling. See <a href="#poolingcode">A simple pooling 
  example</a> below for a code example.</P>
  
<P>Setting up and shutting down JDBC connections to databases tend to be very 
  time and CPU intensive operations. Connection pooling allows connections to 
  be stored and reused by applications, or even by different applications without 
  going through the time consuming task of setting up the connection again.</P>
  <P>Using a connection pool effectively while preventing data corruption and 
    unauthorized access requires a slightly different mindset.</P>
  <P>The Firebird database uses the concept of user logins. To access the database 
    a user must log in and provide a password that the database recognizes. This 
    is set up by the database administrator.</P>
  <P>This can lead to problems with a connection pool. Suppose &quot;joe&quot; 
    logs in using his password and works with the database. If he logs out and 
    his connection is kept alive and given to the next user, &quot;bob&quot;, 
    without re-authorizing, &quot;bob&quot; may be able to see confidential data 
    that he is not intended to see. Worse he can change or delete data he should 
    not have access to.</P>
  <P>If we only allow users to use connections previously opened with their username, 
    we drastically reduce the effectiveness of the pool.</P>
  <P>To make the pool most effective we have to login with the same username every 
    time. This requires us to manage the user access to the database in our code 
    rather that allowing Firebird to do it for us. This is usually accomplished 
    by creating a table of usernames, passwords, and roles separate from those 
    maintained by the database.</P>
  
<P>When a user logs in, all database access is done under a single username and 
  password known to Firebird, for example username &quot;calendar&quot;, password 
  &quot;calpass&quot;. The program then opens a user table created for the application 
  and retrieves the username, password, and role of the user, which might be &quot;Joe&quot;, 
  &quot;joespassword&quot;, and &quot;manager&quot;. The retrieved username and 
  password is compared by your program to those provided by the user. If they 
  match, your program allows the user to perform actions on the database allowed 
  for users with their role, all under the Firebird username of &quot;calendar&quot;.</P>
  <P>When the next user, &quot;bob&quot;, logs in, transactions are still done 
    with your program using the connection opened with the &quot;calendar&quot; 
    Firebird username with the database, but the program checks the &quot;bob&quot; 
    password and role in the application user table before allowing transactions.</P>
  
<P>This results in maximum efficiency of connection pools. It is also compatible 
  with the way that web application servers handle container managed security. 
  So even if your program starts out as a standalone Java program, you can &quot;webify&quot; 
  the database access part of it very easily.</P>
  <P>It is possible to obtain connections with different usernames/passwords with 
    pooling enabled, and the connections will be kept separate, but this is apt 
    to result in inefficient connection usage.</P>
  <P>Be aware that JayBird provides no encryption. If you use JayBird in a standalone Java program, anyone who can listen to your network 
    connection can see your usernames, passwords, and data as it crosses the net. 
    You must take steps to secure your data. You can do this by all the standard 
    methods: Secure networks, VPN, etc.</P>
  
<P>A popular way to provide wide access to your database while still providing 
  security is to write your application as a web application that is viewed in 
  a browser, rather than as a stand-alone application. Then you can restrict your 
  web app to running under secure HTTP.</P>
  <P>If you are using JayBird in stand-alone Java applications there is little 
    need to use anything other than the built-in pooling.</P>
  <P>However, in some cases, you may not want to use the built-in connection pooling. 
    If you are using JayBird with a J2EE server that manages connection pooling, 
    like JBoss, you should deploy JayBird as a JCA resource adapter.</P>
  <P>In such cases the container (J2EE Server) needs JayBird to be deployed 
    as a JCA resource adapter so that it can manage connection usage and pooling, 
    hook the connections up to the transaction manager, and manage the security 
    and supply connections logged as appropriate for the current application user.</P>
  
<P>If you are using a limited J2EE server you may need to use the built-in pooling. 
  Versions of Tomcat before 4.1 are an example. From version 4.1, Tomcat has provided 
  connection pooling via DBCP. Tomcat is a Servlet and Java Server Pages (JSP) 
  server, but does not provide full J2EE web application server support.</P>
  <P>Since a large number of installations use only servlets and JSP's, application 
    servers like Tomcat, JRun, Cold Fusion, Servlet Exec, and Resin have become 
    very popular. These have varying support for connection pooling. You will 
    have to check the features of the particular version of your app server to 
    see if pooling is offered or if you will need to use the built-in pool from 
    JayBird.</P>
  
<P>See the sections below on JBoss, Tomcat, and Using JayBird in Java code 
  for specific information on those environments.<BR>
  <BR>
</P>
  <hr>
<BR>
<P ALIGN=CENTER><FONT SIZE=5><a name="6"></a>6- How do I use JayBird in Java code?</FONT></P>
<P ALIGN=CENTER><a href="#top">return to top</a><BR>
</P>
  
<P>Two forms of JayBird can be used. FBDriver is used much like the old Interclient 
  driver. FBWrappingDataSource has internal connection pooling capability. Examples 
  of both are included here. Code examples of many of the classes and methods 
  used by JayBird can be found in the src/test subdirectory of the source code 
  available on SourceForge.net, see question 13 below.</P>
  <P>JayBird supports two URL syntax formats:</P>
  <P STYLE="margin-left: 2cm">Standard format= jdbc:firebirdsql:[//host[:port]/]&lt;database&gt; 
  </P>
  <P STYLE="margin-left: 2cm">FB old format= jdbc:firebirdsql:[host[/port]:]&lt;database&gt;</P>
  <P><BR>
    <BR>
  </P>
  <P>For all environments that do not support JCA deployment, make the classes 
    in firebirdsql.jar available to your application. You will probably have to 
    use some of the jars mentioned above as necessary.</P>
  <P>For use in a somewhat managed environment with JNDI but no JCA support or 
    transaction manager, use the FBDataSourceObjectFactory to bind a reference 
    to a DataSource into JNDI. Tomcat 4 is an example of this scenario. The JNDI 
    implementation must support use of References/Referenceable. This will not 
    work if the JNDI implementation only supports binding serialized objects.</P>
  <P>For use in a standalone application that only needs one connection, use either 
    FBWrappingDataSource or FBDriver.</P>
  <P>A typical use of the FBDriver class would use code something like this:</P>
  <P STYLE="margin-left: 2cm"><FONT FACE="Courier, monospace">Class.forName(&quot;org.firebirdsql.jdbc.FBDriver&quot;);</FONT></P>
  <P STYLE="margin-left: 2cm"><FONT FACE="Courier, monospace">Connection conn 
    = DriverManager.getConnection(&quot;jdbc:firebirdsql:localhost/3050:/firebird/test.gdb&quot;, 
    &quot;sysdba&quot;, &quot;masterkey&quot;);</FONT></P>
  <P STYLE="margin-left: 2cm"><BR>
    <BR>
  </P>
  <P>Or in windows:</P>
  <P STYLE="margin-left: 2cm"><FONT FACE="Courier, monospace">DriverManager.getConnection(&quot;jdbc:firebirdsql:localhost/3050:E:\\database\\carwash.gdb&quot;, 
    &quot;sysdba&quot;, &quot;masterkey&quot;);</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P>For use in a standalone application with multiple connections that would 
    benefit from connection pooling, use an instance of FBWrappingDataSource configured 
    for pooling.</P>
  
<P><font size="4"><a name="poolingcode"></a>A simple pooling example:</font></P>
  
<P><font face="Courier, monospace">Boolean FBDriverLoaded=false; </font> </P>
  <P><FONT FACE="Courier, monospace">if (!FBDriverLoaded)</FONT></P>
  <P><FONT FACE="Courier, monospace">{ // don't load JayBird more than once.</FONT></P>
  <P><FONT FACE="Courier, monospace">try</FONT></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  <P><FONT FACE="Courier, monospace">org.firebirdsql.jdbc.FBWrappingDataSource 
    fbwds = new org.firebirdsql.jdbc.FBWrappingDataSource();</FONT></P>
  
<P><font face="Courier, monospace">FBDriverLoaded = true;</font></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">catch (ResourceException e)</FONT></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  <P><FONT FACE="Courier, monospace">System.out.println(&quot;Could Not create 
    org.firebirdsql.jdbc.FBWrappingDataSource, error:&quot;+e+&quot;\n&quot;);</FONT></P>
  
<P><FONT FACE="Courier, monospace">}</FONT></P>
<P>&nbsp;</P>
  
<P><FONT FACE="Courier, monospace">fbwds.setDatabase(&quot;//localhost:3050/dir1/subdir/myDatabase.gdb&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">// an old format version of the same url</FONT></P>
  
<P><FONT FACE="Courier, monospace">// fbwds.setDatabase(&quot;localhost/3050:/dir1/subdir/myDatabase.gdb&quot;);</FONT></P>
  
<P><FONT FACE="Courier, monospace">fbwds.setUserName(&quot;sysdba&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">fbwds.setPassword(&quot;masterkey&quot;);</FONT></P>
  
<P><FONT FACE="Courier, monospace">fbwds.setIdleTimeoutMinutes(30);</FONT><BR>
  <BR>
</P>
  
<P><FONT FACE="Courier, monospace">fbwds.setPooling(true); // this turns on pooling 
  for this data source. Max and min must be set.</FONT><BR>
</P>
  <P><FONT FACE="Courier, monospace">fbwds.setMinSize(5); // this sets the minimum 
    number of connections to keep in the pool</FONT></P>
  <P><FONT FACE="Courier, monospace">fbwds.setMaxSize(30); // this sets the maximum 
    number of connections that can be open at one time.</FONT></P>
  <P><BR>
    <BR>
  </P>
  
<P><font face="Courier, monospace">Try</font></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  <P><FONT FACE="Courier, monospace">fbwds.setLoginTimeout(10);</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">catch (SQLException e)</FONT></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  
<P><FONT FACE="Courier, monospace">System.out.println(&quot;Could not set Login 
  Timeout in SQLDriver\n&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">else</FONT></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  <P><FONT FACE="Courier, monospace">//System.out.println(&quot;Firebird Driver 
    already exists, not reloaded.\n&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P><FONT FACE="Courier, monospace">Connection c;</FONT></P>
  <P><FONT FACE="Courier, monospace">try</FONT></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  <P><FONT FACE="Courier, monospace">c = fbwds.getConnection();</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">catch (SQLException e)</FONT></P>
  <P><FONT FACE="Courier, monospace">{</FONT></P>
  <P><FONT FACE="Courier, monospace">system.out.println(&quot;getting new fbwds 
    connection failed! Error: &quot;+e+&quot;\n&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">handleError(e);</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  
<P><FONT FACE="Courier, monospace">// Use the connection &quot;c&quot; like any 
  other connection then close it.</FONT></P>
<P><font face="Courier, monospace">// To release the connection back to the pool 
  you must also close all result sets</font></P>
<P><font face="Courier, monospace">// and close all statements associated with 
  the connection.</font></P>
  <P><FONT FACE="Courier, monospace">c.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">// closing c returns it to the pool.</FONT></P>
  <P>Be aware that no security or encryption is built into JayBird. If you 
    use stand-alone Java programs you must provide secure access to your database 
    to protect your passwords and data.</P>
  
<P>More Java code for a driver example and a DataSource example are included in 
  the <a href="#codeexsamples">Code Examples</a> section below.<BR>
</P>
  <hr>
  <P><BR>
</P>
<P ALIGN=CENTER><FONT SIZE=5><a name="7"></a>7- How do I use JayBird with JBoss?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
</P>
<P>Deployment in JBoss 3.0.0 and later:<BR>
</P>
  
<P>The additional jars/classes mentioned above are already available in JBoss. 
  Put firebirdsql.rar in the deploy directory. Get firebird-service.xml from your 
  binary jboss distribution or jboss CVS at connector[jbosscx]/src/etc/example-config/firebird-service.xml 
  and modify the URL to point to the desired database location. If you get a configuration 
  from CVS, please be very sure and check twice that you have the correct version 
  for your JBoss version. There are hard-to-spot incompatibilities between every 
  minor release.</P>
  <P>For simplicity, start by setting the UserName and Password in the firebird-service.xml 
    configuration file. If you need more advanced JAAS based login, set that up 
    based on the instructions in the jboss 3 manual or the quickstart guide after 
    you have a simple configuration working.</P>
  <P><BR>
    <BR>
  </P>
  <hr>
  <P>&nbsp; </P>
  
<P ALIGN=CENTER><FONT SIZE=4 STYLE="font-size: 16pt"><a name="8"></a>8- How do 
  I use JayBird with </FONT><font size="4">Tomcat?</font></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P ALIGN=CENTER><BR>
    <BR>
  </P>
  <P>CATALINA_HOME is the installation directory for Tomcat 4.x or greater. An 
    environment variable of that name is set up on the Tomcat server. TOMCAT_HOME 
    was used in versions before Tomcat 4.</P>
  
<P>To use JayBird with Tomcat you must put the jar files where your web apps
   can access them. Once they are available to your web apps you use JayBird
  
  in your servlets or beans just as you would in standalone programs.</P>
  
<P>If you have only one webapp using JayBird or you need to keep JayBird separate 
  from other web apps, put the jar files in the WEB-INF/lib/ subdirectory of your 
  web app.</P>
  
<P>It is more likely that Firebird will be used by all of your web apps and Tomcat 
  itself. To have universal access to JayBird, put the jars in CATALINA_HOME/common/lib/.</P>
  <P>A simple example web app that creates a Firebird database and does a few
    transactions directly is included below. It is called test.</P>
  <P>Below that is the same web app set up to use a DataSource and connection
    pooling via DBCP. It is called dbTest.</P>
  <P>To use JayBird's internal connection pooling, you can configure an FBWrapping 
  DataSource for pooling just as you would in a stand-alone program. If you put 
  a class for doing that in a servlet and start it when Tomcat is initialized, 
  you can share a pool among web applications. If you do this, take care to make 
  it thread safe and synchronize access to methods.</P>
  <P>Tomcat can also use Firebird for BASIC or FORM based user authentication. 
    See the Tomcat docs for more details. An example realm for this is listed 
    below. This goes in the CATALINA_HOME/conf/server.xml file.</P>
  <P><FONT FACE="Courier, monospace">&lt;Realm className=&quot;org.apache.catalina.realm.JDBCRealm&quot; 
    debug=&quot;0&quot; </FONT> </P>
  <P><FONT FACE="Courier, monospace">driverName=&quot;org.firebirdsql.jdbc.FBDriver&quot; 
    </FONT> </P>
  <P><FONT FACE="Courier, monospace">userNameCol=&quot;USER_NAME&quot; </FONT> 
  </P>
  <P><FONT FACE="Courier, monospace">connectionName=&quot;sysdba&quot; </FONT> 
  </P>
  <P><FONT FACE="Courier, monospace">userTable=&quot;USERS&quot; </FONT> </P>
  <P><FONT FACE="Courier, monospace">userCredCol=&quot;USER_PASS&quot; </FONT> 
  </P>
  <P><FONT FACE="Courier, monospace">validate=&quot;true&quot; </FONT> </P>
  <P><FONT FACE="Courier, monospace">connectionURL=&quot;jdbc:firebirdsql:localhost/3050:/dir1/subdir/usersdb.gdb&quot; 
    </FONT> </P>
  <P><FONT FACE="Courier, monospace">userRoleTable=&quot;USER_ROLES&quot; </FONT> 
  </P>
  <P><FONT FACE="Courier, monospace">roleNameCol=&quot;ROLE_NAME&quot; </FONT> 
  </P>
  <P><FONT FACE="Courier, monospace">connectionPassword=&quot;masterkey&quot;/&gt;</FONT></P>
  <P>If your web app is set up to allow Tomcat to authenticate users this tells 
    Tomcat to use Firebird to look up user names and passwords. It does this by 
    calling the Firebird driver FBDriver to login to a database named usersdb.gdb 
    located on localhost in the directory /dir/subdir/, using the username sysdba 
    and the password masterkey.</P>
  <P>Tomcat then takes the username that is typed into the browser by the person 
    logging into the web app and searches the table named USERS to see if it is 
    in the field USER_NAME of a record. If it is, it checks to see if the password 
    typed into the browser is the same as the one in the field USER_PASS for that 
    record. If it is, the user is allowed to login and Tomcat opens the table 
    USER_ROLES and searches for all entries with USER_NAME. For each record it 
    finds, it looks in the ROLE_NAME column and adds that role name to a list 
    of roles for the user. It then allows access to web apps based on the roles 
    listed by the database.</P>
  
<P>You can configure your web apps in WEB-INF/web.xml to only allow users with 
  certain roles access to the web app. You can even use the role inside your JSP's 
  to only draw certain parts of an HTML page if a user has the appropriate role. 
  This allows you to customize each page based on a user's role.</P>
  <P>To use Tomcat's online GUI management web app to control your Tomcat installation, 
    you must have the role &quot;manager&quot; in the USER_ROLES table under your 
    name.</P>
  <P>See the Tomcat docs for more information.</P>
  <P><font size="+2">Sample Web Apps</font></P>
  <P>These examples assume that the username SYSDBA and password masterkey are
    valid. These samples create and search for the database in /databases/test.gdb.
    To use a different directory change those entries below. For windows change
    /databases/test.gdb to c:\\databases\\test.gdb, for example.</P>
  <P><font size="+1">Sample web app test:</font></P>
  <P>To use this sample web app create a folder called &quot;test&quot; in the webapps
    directory of your Tomcat installation. Put the HTML file below into a file
    called index.htm inside the  folder called test. Put the contents of the
    XML file following this into test/WEB-INF/web.xml. Finally, put the contents
    of the
    jsp file
    following
    that into test/search.jsp. Start Tomcat and run test in your browser by calling
    http://localhost/test/index.htm.</P>
  <P><font size="+1">Put this in CATALINA_HOME/webapps/test/index.htm:</font></P>
  <P>&lt;html&gt;<br>
    &lt;
    head&gt;<br>
    &lt;
    title&gt;index.htm&lt;/title&gt;<br>
    &lt;
    meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot;&gt;<br>
    &lt;
  /head&gt;</P>
  <p>&lt;body bgcolor=&quot;#CCCCFF&quot; text=&quot;#000000&quot;&gt;<br>
    &lt;
    /p&gt;<br>
  &lt;
    H1 align=&quot;center&quot;&gt;Enter Name&lt;/H1&gt;<br>
  &lt;
    /H1&gt;<br>
  &lt;
    p&gt;This demo of a simple web app will take the name you type above and
    search<br>
  a table called CUSTOMERS in a Firebird database named test.gdb using the JayBird<br>
  JDBC<br>
  driver.<br>
  The table CUSTOMERS has two fields (columns): FIRST_NAME and LAST_NAME.&lt;/p&gt;<br>
&lt;
  p&gt;If the database or tables don't exist they will be created for you. You
  will<br>
  need to edit the Strings at the top of the file search.jsp to appropriate<br>
  ones for your system.&lt;/p&gt;<br>
&lt;
  p&gt;If there are no entries with the same last name that you type in, the
  program<br>
  will add 3 so you will get some output: &amp;quot;Aaron, Bob, and Calvin&amp;quot;.&lt;/p&gt;<br>
&lt;
  p&gt;&amp;nbsp;&lt;/p&gt;<br>
&lt;
  form name=&quot;form1&quot; method=&quot;post&quot; action=&quot;search.jsp&quot;&gt;<br>
&lt;
  p align=&quot;center&quot;&gt;<br>
  Type a Last Name to search for here:<br>
&lt;input name=&quot;name&quot; type=&quot;text&quot; id=&quot;name&quot;&gt;<br>
  then click &amp;quot;Submit&amp;quot;.&lt;/p&gt;<br>
&lt;
  p align=&quot;center&quot;&gt; &lt;input type=&quot;submit&quot; name=&quot;Submit&quot; value=&quot;Submit&quot;&gt;<br>
&lt;
  /p&gt;<br>
&lt;
  /form&gt;<br>
&lt;
  p&gt;&amp;nbsp;&lt;/p&gt;<br>
&lt;
  /body&gt;<br>
&lt;
  /html&gt;</p>
  <p>&nbsp;</p>
  <p><font size="+1">Put this in CATALINA_HOME/webapps/test/WEB-INF/web.xml:</font></p>
  <p>&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;</p>
  <p><br>
&lt; !DOCTYPE web-app PUBLIC '-//Sun Microsystems, Inc.//DTD Web Application
  2.2//EN' 'http://java.sun.com/j2ee/dtds/web-app_2.2.dtd'&gt;</p>
  <p>&lt;web-app&gt;<br>
&lt;session-config&gt;<br>
&lt;session-timeout&gt;<br>
  30<br>
&lt;/session-timeout&gt;<br>
&lt;/session-config&gt;<br>
&lt;welcome-file-list&gt;<br>
&lt;welcome-file&gt;index.htm&lt;/welcome-file&gt;<br>
&lt;/welcome-file-list&gt;<br>
&lt;
  /web-app&gt;<br>
  </p>
  <p><font size="+1">Put this in CATALINA_HOME/webapps/test/search.jsp:</font></p>
  <p>&lt;%@page contentType=&quot;text/html; charset=iso-8859-1&quot; language=&quot;java&quot; import=&quot;java.sql.*,org.firebirdsql.management.*&quot;%&gt;</p>
  <p>&lt;html&gt;<br>
    &lt;
    head&gt;<br>
  &lt;
    title&gt;search.jsp&lt;/title&gt;<br>
  &lt;
    meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot;&gt;<br>
  &lt;
    /head&gt;</p>
  <p>&lt;body bgcolor=&quot;#CCCCFF&quot; text=&quot;#000000&quot;&gt;&lt;p&gt;<br>
    &lt;
    /p&gt;<br>
  &lt;
    H1 align=&quot;center&quot;&gt;Test Search&lt;/H1&gt;</p>
  <p>&lt;%<br>
    // Edit the strings below as needed for your system.</p>
  <p>String DB_SERVER_URL = &quot;localhost&quot;;<br>
    int DB_SERVER_PORT = 3050;</p>
  <p>// Use forward slashes here, even on Windows systems.<br>
    String DB_PATH = &quot;c:/databases&quot;;</p>
  <p>String DB_NAME = &quot;test.gdb&quot;;<br>
    String DB_USER = &quot;sysdba&quot;;<br>
    String DB_PASSWORD = &quot;masterkey&quot;;<br>
    String DB_CONNECTION_STRING = &quot;jdbc:firebirdsql:&quot;+DB_SERVER_URL+&quot;/&quot;+DB_SERVER_PORT+&quot;:&quot;+DB_PATH+&quot;/&quot;+DB_NAME;</p>
  <p>String lastName = request.getParameter(&quot;name&quot;);</p>
  <p>// To help you debug, you can set a session attribute to values indicating<br>
    // the prograss through the web app, then use an HTTP monitor to see how
      far <br>
    // you have progressed.</p>
  <p>// This stuff creates the database with the JMX management tools <br>
    // if it doesn't already exist.<br>
    FBManager fbManager = new FBManager();</p>
  <p>fbManager.setServer(DB_SERVER_URL);<br>
    fbManager.setPort(DB_SERVER_PORT);</p>
  <p>fbManager.start();</p>
  <p>fbManager.createDatabase(DB_PATH + &quot;/&quot; + DB_NAME, DB_USER, DB_PASSWORD);</p>
  <p><br>
    // Load the JayBird driver. This is OK for a test but your real web apps<br>
    // should use a dataSource for efficiency and flexibility.<br>
    Class.forName(&quot;org.firebirdsql.jdbc.FBDriver&quot;);</p>
  <p>%&gt;<br>
    Opening a connection with connection string: &lt;%=DB_CONNECTION_STRING%&gt;&lt;BR&gt;&lt;BR&gt;<br>
  &lt;
    %</p>
  <p>// Get a connection to the database.<br>
    Connection connRSFind = DriverManager.getConnection(DB_CONNECTION_STRING,
      DB_USER, DB_PASSWORD);</p>
  <p>// Back to HTML, show the user the LAST_NAME typed in.<br>
    %&gt;<br>
  &lt;
    p&gt;<br>
    The user entered name is: &lt;%=lastName%&gt;<br>
  &lt;
    p&gt;<br>
  &lt;
    %</p>
  <p>String sqlString = &quot;SELECT * FROM CUSTOMERS WHERE LAST_NAME = \'&quot; +
    lastName +&quot;\'&quot;;</p>
  <p>// Switch back to html so we can print out the sqlString on the web page.<br>
    %&gt;</p>
  <p>The SQL String is: &lt;%=sqlString%&gt;&lt;p&gt;</p>
  <p>&lt;%<br>
    PreparedStatement StatementRSFind=null;<br>
    ResultSet RSFind=null;<br>
    boolean resultException=false;<br>
    boolean rsReady = false;</p>
  <p>try<br>
  {<br>
  StatementRSFind = connRSFind.prepareStatement(sqlString);</p>
  <p> RSFind = StatementRSFind.executeQuery();<br>
  rsReady = RSFind.next();<br>
  }<br>
  catch(SQLException e1)<br>
  {<br>
  resultException = true; // Set a flag so that we know there was an error, not
  just an empty result set.</p>
  <p>%&gt;<br>
    Could not find table, I'll try to add it: &lt;%=e1.getMessage()%&gt;&lt;BR&gt;<br>
  &lt;
    %<br>
  }</p>
  <p>if (!rsReady || resultException)<br>
  { // If there are no database entries with this last name, enter a few so the
    user has something to look at.<br>
  // Or, if there was an error, the table probably doesn't exist yet.</p>
  <p> // try to create table CUSTOMERS, in case it doesn't exist yet.</p>
  <p> if (resultException)<br>
  {// The table CUSTOMERS probably doesn't exist, so we create it here.<br>
  Statement statement2=null;</p>
  <p> try<br>
  {<br>
  statement2 = connRSFind.createStatement();<br>
  }<br>
  catch(SQLException e2)<br>
  {<br>
  %&gt;<br>
  Could not create statement2 with this connection! Check your database settings
  in search.jsp: &lt;%=e2.getMessage()%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  }</p>
  <p> if (statement2 != null)<br>
  {<br>
  try<br>
  { // try to crate the table CUSTOMERS.<br>
  sqlString = &quot;CREATE TABLE CUSTOMERS(LAST_NAME VARCHAR(50), FIRST_NAME
  VARCHAR(50))&quot;;<br>
  statement2.execute(sqlString);<br>
  statement2.close();<br>
  }<br>
  catch(SQLException e2a)<br>
  {<br>
  %&gt;<br>
  Table CUSTOMERS already exists and we tried to create it again, or it could
  not be created: &lt;%=e2a.getMessage()%&gt; &lt;BR&gt;<br>
&lt;
  %<br>
  }<br>
  }<br>
  } // Table CUSTOZMERS should exist now, if it didn't before or things are really
  messed up.<br>
  else<br>
  {<br>
  %&gt;<br>
  First attempt at getting a result set produced an empty result set.&lt;BR&gt;<br>
&lt;
  %<br>
  }</p>
  <p> // Insert some names into table CUSTOMERS. Either the table is new and
    empty, or there were<br>
  // no entries with the last name the user gave us, so we'll enter a few, so
  the user has<br>
  // something to look at.<br>
  Statement statement3=null;</p>
  <p> try<br>
  {<br>
  statement3 = connRSFind.createStatement();<br>
  }<br>
  catch(SQLException e3)<br>
  {<br>
  %&gt;<br>
  Could not create statement3 with this connection! Check your database settings
  in search.jsp: &lt;%=e3.getMessage()%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  }</p>
  <p> if (statement3 != null)<br>
  {<br>
  try<br>
  {<br>
  sqlString = &quot;INSERT INTO CUSTOMERS(LAST_NAME, FIRST_NAME) VALUES(\'&quot;+lastName+&quot;\',
  'Aaron')&quot;;<br>
  %&gt;<br>
  Executing SQL: &lt;%=sqlString%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  statement3.execute(sqlString);<br>
  sqlString = &quot;INSERT INTO CUSTOMERS(LAST_NAME, FIRST_NAME) VALUES(\'&quot;+lastName+&quot;\',
  'Bob')&quot;;<br>
  %&gt;<br>
  Executing SQL: &lt;%=sqlString%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  statement3.execute(sqlString);<br>
  sqlString = &quot;INSERT INTO CUSTOMERS(LAST_NAME, FIRST_NAME) VALUES(\'&quot;+lastName+&quot;\',
  'Calvin')&quot;;<br>
  %&gt;<br>
  Executing SQL: &lt;%=sqlString%&gt;&lt;BR&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  statement3.execute(sqlString);<br>
  statement3.close();<br>
  }<br>
  catch(SQLException e3a)<br>
  {<br>
  %&gt;<br>
  We could not enter data in table CUSTOMERS for some reason: &lt;%=e3a.getMessage()%&gt; &lt;BR&gt;<br>
&lt;
  %<br>
  }<br>
  }<br>
  </p>
  <p> // try again to get a result set.<br>
  sqlString = &quot;SELECT * FROM CUSTOMERS WHERE LAST_NAME = \'&quot; + lastName
  +&quot;\'&quot;; <br>
  StatementRSFind = connRSFind.prepareStatement(sqlString);<br>
  RSFind = StatementRSFind.executeQuery();<br>
  rsReady = RSFind.next();<br>
  }</p>
  <p>int i = 0;</p>
  <p>if (rsReady)<br>
  {<br>
  boolean done=false;<br>
  while (!done)<br>
  {<br>
  i++;<br>
  String RSFind_Last = (String) RSFind.getObject(&quot;LAST_NAME&quot;);<br>
  String RSFind_First = (String) RSFind.getObject(&quot;FIRST_NAME&quot;);<br>
  // display the names in the browser.<br>
  %&gt;<br>
  Name &lt;%=i%&gt;: &lt;%=RSFind_First%&gt; &lt;%=RSFind_Last%&gt; &lt;BR&gt;<br>
&lt;
  %<br>
  done = !RSFind.next();<br>
  } //End while loop</p>
  <p> RSFind.close();<br>
  }<br>
  else<br>
  {<br>
  %&gt;<br>
&lt;
  BR&gt;The result set was empty. Check to be sure database is running and settings
  in search.jsp are correct.&lt;BR&gt;<br>
&lt;
  %</p>
  <p> }<br>
    if (StatementRSFind != null)<br>
  StatementRSFind.close();</p>
  <p>if (connRSFind != null)<br>
  connRSFind.close();</p>
  <p>%&gt;</p>
  <p>&lt;/body&gt;<br>
    &lt;
    /html&gt;<br>
  </p>
  <p><font size="+1">Sample web app dbTest:</font></p>
  <P>This sample web app shows how to use a Fiorebird DataSource with Tomcat.
    To use it, create a folder called &quot;dbTest&quot; in
    the webapps directory of your Tomcat installation. Put the HTML file below
    into
    a file called index.htm inside the folder called dbTest. Put the contents
    of the XML file following this into dbTtest/WEB-INF/web.xml. Put
    the contents
    of the jsp file following that into dbTest/search.jsp. Put the context
    XML code after that into the conf/server.xml file of your Tomcat installation
    just before the entry: &lt;/Host&gt;. Start Tomcat and run dbTest in your browser
    by calling http://localhost/dbTest/index.htm.</P>
  <P><font size="+1">Put this in CATALINA_HOME/webapps/dbTest/index.htm:</font></P>
  <P>&lt;html&gt;<br>
&lt; head&gt;<br>
&lt; title&gt;index.htm&lt;/title&gt;<br>
&lt; meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot;&gt;<br>
&lt; /head&gt;</P>
  <p>&lt;body bgcolor=&quot;#CCCCFF&quot; text=&quot;#000000&quot;&gt;<br>
&lt; /p&gt;<br>
&lt; H1 align=&quot;center&quot;&gt;Enter Name&lt;/H1&gt;<br>
&lt; /H1&gt;<br>
&lt; p&gt;This demo of a simple web app will take the name you type above and
search<br>
  a table called CUSTOMERS in a Firebird database named test.gdb using the JayBird<br>
  JDBC<br>
  driver.<br>
  The table CUSTOMERS has two fields (columns): FIRST_NAME and LAST_NAME.&lt;/p&gt;<br>
&lt; p&gt;If the database or tables don't exist they will be created for you.
You will<br>
  need to edit the Strings at the top of the file search.jsp to appropriate<br>
  ones for your system.&lt;/p&gt;<br>
&lt; p&gt;If there are no entries with the same last name that you type in, the
program<br>
  will add 3 so you will get some output: &amp;quot;Aaron, Bob, and Calvin&amp;quot;.&lt;/p&gt;<br>
&lt; p&gt;&amp;nbsp;&lt;/p&gt;<br>
&lt; form name=&quot;form1&quot; method=&quot;post&quot; action=&quot;search.jsp&quot;&gt;<br>
&lt; p align=&quot;center&quot;&gt;<br>
  Type a Last Name to search for here:<br>
&lt;input name=&quot;name&quot; type=&quot;text&quot; id=&quot;name&quot;&gt;<br>
  then click &amp;quot;Submit&amp;quot;.&lt;/p&gt;<br>
&lt; p align=&quot;center&quot;&gt; &lt;input type=&quot;submit&quot; name=&quot;Submit&quot; value=&quot;Submit&quot;&gt;<br>
&lt; /p&gt;<br>
&lt; /form&gt;<br>
&lt; p&gt;&amp;nbsp;&lt;/p&gt;<br>
&lt; /body&gt;<br>
&lt; /html&gt;</p>
  <p>&nbsp;</p>
  <p><font size="+1">Put this in CATALINA_HOME/webapps/dbTest/WEB-INF/web.xml:</font></p>
  <p>&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;</p>
  <p>&lt;!DOCTYPE web-app PUBLIC '-//Sun Microsystems, Inc.//DTD Web Application
    2.2//EN' 'http://java.sun.com/j2ee/dtds/web-app_2.2.dtd'&gt;</p>
  <p>&lt;web-app&gt;<br>
&lt;session-config&gt;<br>
&lt;session-timeout&gt;<br>
  30<br>
&lt;/session-timeout&gt;<br>
&lt;/session-config&gt;<br>
&lt;welcome-file-list&gt;<br>
&lt;welcome-file&gt;index.htm&lt;/welcome-file&gt;<br>
&lt;/welcome-file-list&gt;<br>
&lt;resource-ref&gt;<br>
&lt;description&gt;Test SQL DB Connection&lt;/description&gt;<br>
&lt;res-ref-name&gt;jdbc/dbTest&lt;/res-ref-name&gt;<br>
&lt;res-type&gt;javax.sql.DataSource&lt;/res-type&gt;<br>
&lt;res-auth&gt;Container&lt;/res-auth&gt;<br>
&lt;/resource-ref&gt;<br>
&lt;
  /web-app&gt;<br>
  </p>
  <p><font size="+1">Put this in CATALINA_HOME/webapps/dbTest/search.jsp:</font><br>
  </p>
  <p>&lt;%@page contentType=&quot;text/html; charset=iso-8859-1&quot; language=&quot;java&quot; import=&quot;java.sql.*,javax.sql.*,javax.servlet.*,
  javax.servlet.http.*,javax.naming.*,org.firebirdsql.management.*&quot;%&gt;</p>
  <p>&lt;html&gt;<br>
    &lt;
    head&gt;<br>
  &lt;
    title&gt;search.jsp&lt;/title&gt;<br>
  &lt;
    meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot;&gt;<br>
  &lt;
    /head&gt;</p>
  <p>&lt;body bgcolor=&quot;#CCCCFF&quot; text=&quot;#000000&quot;&gt;&lt;p&gt;<br>
    &lt;
    /p&gt;<br>
  &lt;
    H1 align=&quot;center&quot;&gt;Test Search&lt;/H1&gt;</p>
  <p>&lt;%<br>
    // Edit the strings below as needed for your system.</p>
  <p>String DB_SERVER_URL = &quot;localhost&quot;;<br>
    int DB_SERVER_PORT = 3050;</p>
  <p>// Use forward slashes here, even on Windows systems.<br>
    String DB_PATH = &quot;c:/databases&quot;;</p>
  <p>String DB_NAME = &quot;test.gdb&quot;;<br>
    String DB_USER = &quot;sysdba&quot;;<br>
    String DB_PASSWORD = &quot;masterkey&quot;;<br>
    String DB_CONNECTION_STRING = &quot;jdbc:firebirdsql:&quot;+DB_SERVER_URL+&quot;/&quot;+DB_SERVER_PORT+&quot;:&quot;+DB_PATH+&quot;/&quot;+DB_NAME;</p>
  <p>String lastName = request.getParameter(&quot;name&quot;);</p>
  <p>// To help you debug, you can set a session attribute to values indicating<br>
    // the prograss through the web app, then use an HTTP monitor to see how
      far <br>
    // you have progressed.</p>
  <p>// This stuff creates the database with the JMX management tools <br>
    // if it doesn't already exist.<br>
    FBManager fbManager = new FBManager();</p>
  <p>fbManager.setServer(DB_SERVER_URL);<br>
    fbManager.setPort(DB_SERVER_PORT);</p>
  <p>fbManager.start();</p>
  <p>fbManager.createDatabase(DB_PATH + &quot;/&quot; + DB_NAME, DB_USER, DB_PASSWORD);</p>
  <p>%&gt;<br>
    Opening a connection with connection string: &lt;%=DB_CONNECTION_STRING%&gt;&lt;BR&gt;&lt;BR&gt;<br>
  &lt;
    %</p>
  <p>// Get a connection to the database from the dataSource.<br>
    DataSource ds=null;<br>
    Connection connRSFind=null;</p>
  <p>try<br>
  {<br>
  Context ctx = new InitialContext();</p>
  <p> if(ctx == null ) <br>
  throw new Exception(&quot;Boom - No Context&quot;);</p>
  <p> ds = (DataSource)ctx.lookup(&quot;java:comp/env/jdbc/dbTest&quot;);</p>
  <p> try<br>
  {<br>
  connRSFind = ds.getConnection();<br>
  }<br>
  catch (SQLException e)<br>
  {<br>
  System.out.println(&quot;getting new data source connection failed! Error: &quot;+e+&quot;\n&quot;);<br>
  }</p>
  <p> }<br>
  catch (Exception e)<br>
  {<br>
  System.out.println(&quot;Could Not get data source, error: &quot;+e+&quot;\n&quot;);<br>
  }</p>
  <p>// Back to HTML, show the user the LAST_NAME typed in.<br>
    %&gt;<br>
  &lt;
    p&gt;<br>
    The user entered name is: &lt;%=lastName%&gt;<br>
  &lt;
    p&gt;<br>
  &lt;
    %</p>
  <p>String sqlString = &quot;SELECT * FROM CUSTOMERS WHERE LAST_NAME = \'&quot; +
    lastName +&quot;\'&quot;;</p>
  <p>// Switch back to html so we can print out the sqlString on the web page.<br>
    %&gt;</p>
  <p>The SQL String is: &lt;%=sqlString%&gt;&lt;p&gt;</p>
  <p>&lt;%<br>
    PreparedStatement StatementRSFind=null;<br>
    ResultSet RSFind=null;<br>
    boolean resultException=false;<br>
    boolean rsReady = false;</p>
  <p>try<br>
  {<br>
  StatementRSFind = connRSFind.prepareStatement(sqlString);</p>
  <p> RSFind = StatementRSFind.executeQuery();<br>
  rsReady = RSFind.next();<br>
  }<br>
  catch(SQLException e1)<br>
  {<br>
  e1.printStackTrace(System.out);<br>
  resultException = true; // Set a flag so that we know there was an error, not
  just an empty result set.</p>
  <p>%&gt;<br>
    Could not find table, I'll try to add it: &lt;%=e1.getMessage()%&gt;&lt;BR&gt;<br>
  &lt;
    %<br>
  }</p>
  <p>if (!rsReady || resultException)<br>
  { // If there are no database entries with this last name, enter a few so the
    user has something to look at.<br>
  // Or, if there was an error, the table probably doesn't exist yet.</p>
  <p> // try to create table CUSTOMERS, in case it doesn't exist yet.</p>
  <p> if (resultException)<br>
  {// The table CUSTOMERS probably doesn't exist, so we create it here.<br>
  Statement statement2=null;</p>
  <p> try<br>
  {<br>
  statement2 = connRSFind.createStatement();<br>
  }<br>
  catch(SQLException e2)<br>
  {<br>
  %&gt;<br>
  Could not create statement2 with this connection! Check your database settings
  in search.jsp: &lt;%=e2.getMessage()%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  }</p>
  <p> if (statement2 != null)<br>
  {<br>
  try<br>
  { // try to crate the table CUSTOMERS.<br>
  sqlString = &quot;CREATE TABLE CUSTOMERS(LAST_NAME VARCHAR(50), FIRST_NAME
  VARCHAR(50))&quot;;<br>
  statement2.execute(sqlString);<br>
  statement2.close();<br>
  }<br>
  catch(SQLException e2a)<br>
  {<br>
  %&gt;<br>
  Table CUSTOMERS already exists and we tried to create it again, or it could
  not be created: &lt;%=e2a.getMessage()%&gt; &lt;BR&gt;<br>
&lt;
  %<br>
  }<br>
  }<br>
  } // Table CUSTOZMERS should exist now, if it didn't before or things are really
  messed up.<br>
  else<br>
  {<br>
  %&gt;<br>
  First attempt at getting a result set produced an empty result set.&lt;BR&gt;<br>
&lt;
  %<br>
  }</p>
  <p> // Insert some names into table CUSTOMERS. Either the table is new and
    empty, or there were<br>
  // no entries with the last name the user gave us, so we'll enter a few, so
  the user has<br>
  // something to look at.<br>
  Statement statement3=null;</p>
  <p> try<br>
  {<br>
  statement3 = connRSFind.createStatement();<br>
  }<br>
  catch(SQLException e3)<br>
  {<br>
  %&gt;<br>
  Could not create statement3 with this connection! Check your database settings
  in search.jsp: &lt;%=e3.getMessage()%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  }</p>
  <p> if (statement3 != null)<br>
  {<br>
  try<br>
  {<br>
  sqlString = &quot;INSERT INTO CUSTOMERS(LAST_NAME, FIRST_NAME) VALUES(\'&quot;+lastName+&quot;\',
  'Aaron')&quot;;<br>
  %&gt;<br>
  Executing SQL: &lt;%=sqlString%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  statement3.execute(sqlString);<br>
  sqlString = &quot;INSERT INTO CUSTOMERS(LAST_NAME, FIRST_NAME) VALUES(\'&quot;+lastName+&quot;\',
  'Bob')&quot;;<br>
  %&gt;<br>
  Executing SQL: &lt;%=sqlString%&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  statement3.execute(sqlString);<br>
  sqlString = &quot;INSERT INTO CUSTOMERS(LAST_NAME, FIRST_NAME) VALUES(\'&quot;+lastName+&quot;\',
  'Calvin')&quot;;<br>
  %&gt;<br>
  Executing SQL: &lt;%=sqlString%&gt;&lt;BR&gt;&lt;BR&gt;<br>
&lt;
  %<br>
  statement3.execute(sqlString);<br>
  statement3.close();<br>
  }<br>
  catch(SQLException e3a)<br>
  {<br>
  %&gt;<br>
  We could not enter data in table CUSTOMERS for some reason: &lt;%=e3a.getMessage()%&gt; &lt;BR&gt;<br>
&lt;
  %<br>
  }<br>
  }<br>
  </p>
  <p> // try again to get a result set.<br>
  sqlString = &quot;SELECT * FROM CUSTOMERS WHERE LAST_NAME = \'&quot; + lastName
  +&quot;\'&quot;; <br>
  StatementRSFind = connRSFind.prepareStatement(sqlString);<br>
  RSFind = StatementRSFind.executeQuery();<br>
  rsReady = RSFind.next();<br>
  }</p>
  <p>int i = 0;</p>
  <p>if (rsReady)<br>
  {<br>
  boolean done=false;<br>
  while (!done)<br>
  {<br>
  i++;<br>
  String RSFind_Last = (String) RSFind.getObject(&quot;LAST_NAME&quot;);<br>
  String RSFind_First = (String) RSFind.getObject(&quot;FIRST_NAME&quot;);<br>
  // display the names in the browser.<br>
  %&gt;<br>
  Name &lt;%=i%&gt;: &lt;%=RSFind_First%&gt; &lt;%=RSFind_Last%&gt; &lt;BR&gt;<br>
&lt;
  %<br>
  done = !RSFind.next();<br>
  } //End while loop</p>
  <p> RSFind.close();<br>
  }<br>
  else<br>
  {<br>
  %&gt;<br>
&lt;
  BR&gt;The result set was empty. Check to be sure database is running and settings
  in search.jsp are correct.&lt;BR&gt;<br>
&lt;
  %</p>
  <p> }<br>
    if (StatementRSFind != null)<br>
  StatementRSFind.close();</p>
  <p>if (connRSFind != null)<br>
  connRSFind.close();</p>
  <p>%&gt;</p>
  <p>&lt;/body&gt;<br>
    &lt;
  /html&gt;</p>
  <p><br>
  </p>
  <p><font size="+1">Put this in CATALINA_HOME/conf/server.xml before &lt;/Host&gt;:</font> </p>
  <P>&lt;Context path=&quot;/dbTest&quot; docBase=&quot;dbTest&quot;<br>
debug=&quot;0&quot; reloadable=&quot;true&quot; crossContext=&quot;true&quot;&gt;</P>
  <p> &lt;Logger className=&quot;org.apache.catalina.logger.FileLogger&quot;<br>
  prefix=&quot;localhost_dbTest_log.&quot; suffix=&quot;.txt&quot;<br>
  timestamp=&quot;true&quot;/&gt;</p>
  <p> &lt;Resource name=&quot;jdbc/dbTest&quot;<br>
  auth=&quot;Container&quot;<br>
  type=&quot;javax.sql.DataSource&quot;/&gt;</p>
  <p> &lt;ResourceParams name=&quot;jdbc/dbTest&quot;&gt;</p>
  <p> &lt;parameter&gt;<br>
&lt;name&gt;factory&lt;/name&gt;<br>
&lt;value&gt;org.apache.commons.dbcp.BasicDataSourceFactory&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;parameter&gt;<br>
&lt;name&gt;removeAbandoned&lt;/name&gt;<br>
&lt;value&gt;true&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;parameter&gt;<br>
&lt;name&gt;removeAbandonedTimeout&lt;/name&gt;<br>
&lt;value&gt;300&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;parameter&gt;<br>
&lt;name&gt;logAbandoned&lt;/name&gt;<br>
&lt;value&gt;true&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;!-- Maximum number of dB connections in pool. Make sure you<br>
  configure your Firebird max_connections large enough to handle<br>
  all of your db connections. Set to 0 for no limit.<br>
  --&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;maxActive&lt;/name&gt;<br>
&lt;value&gt;100&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;!-- Maximum number of idle dB connections to retain in pool.<br>
  Set to 0 for no limit.<br>
  --&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;maxIdle&lt;/name&gt;<br>
&lt;value&gt;30&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;!-- Maximum time to wait for a dB connection to become available<br>
  in ms, in this example 10 seconds. An Exception is thrown if<br>
  this timeout is exceeded. Set to -1 to wait indefinitely.<br>
  --&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;maxWait&lt;/name&gt;<br>
&lt;value&gt;10000&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;!-- Firebird dB username and password for dB connections --&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;username&lt;/name&gt;<br>
&lt;value&gt;SYSDBA&lt;/value&gt;<br>
&lt;/parameter&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;password&lt;/name&gt;<br>
&lt;value&gt;masterkey&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;!-- Class name for JayBird JDBC driver --&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;driverClassName&lt;/name&gt;<br>
&lt;value&gt;org.firebirdsql.jdbc.FBDriver&lt;/value&gt;<br>
&lt;/parameter&gt;</p>
  <p> &lt;!-- The JDBC connection url for connecting to your MySQL dB.<br>
  The autoReconnect=true argument to the url makes sure that the<br>
  mm.mysql JDBC Driver will automatically reconnect if mysqld closed the<br>
  connection. mysqld by default closes idle connections after 8 hours.<br>
  --&gt;<br>
&lt;parameter&gt;<br>
&lt;name&gt;url&lt;/name&gt;<br>
&lt;value&gt;jdbc:firebirdsql:localhost/3050:/databases/test.gdb&lt;/value&gt;<br>
&lt;/parameter&gt;<br>
&lt;/ResourceParams&gt;</p>
  <p>&lt;/Context&gt;<br>
  </p>
  <P><BR>
  </P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="9"></a>9. How do I use JayBird with JBuilder?</FONT></P>
  <P ALIGN=CENTER>Last updated: 2003.11.04</P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  
<P>Thanks to Marcelo Lopez Ruiz for the Jbuilder 6 Personal section.</P>
<P>Thanks to John B. Moore for the JBuilder 7 Enterprise notes.</P>
<P>Thanks to Sergio Samayoa for the JBuilder 9 notes.</P>
<P><strong>JBuilder 9 Notes:</strong></P>
<P>JBuilder 9 installation is similar to JBuilder 7.</P>
<P>1. Unpack JayBird onto your disk.</P>
<P>2. Create a Library for JayBird:</P>
<blockquote>
  <p>Open JBuilder and pull down the &quot;Tools&quot; menu from the main menu bar. Select
    &quot;Configure Libraries&quot;, this opens a dialog box.</p>
  <p>Click the &quot;New&quot; button.This opens the &quot;New Library Wizard&quot; dialog box.</p>
  <p>Type &quot;JayBird&quot; in the &quot;Name&quot; box.</p>
  <p>In &quot;Location&quot; select JBuilder.</p>
  <p>Click the &quot;Add&quot; button near the &quot;Library Paths&quot; list.</p>
  <p>Type in the path to the firebirdsql-full.jar file and click the &quot;OK&quot; button.</p>
  <p>Close the &quot;New Library Wizard&quot; dialog by clicking &quot;OK&quot;.</p>
</blockquote>
<P>3. Create a file &quot;JayBird.config&quot; in &lt;JBuilder dir&gt;\lib\ext containing the
  line (for example):</P>
<blockquote>
  <p>addpath c:/JayBird/firebirdsql-full.jar</p>
</blockquote>
<P>4. Restart JBuilder.</P>
<P>You can now use DataExpress. Add the &quot;JayBird&quot; library to your project. Note
  that the driver will not be listed in the driver selection combo boxes.</P>
<P>&nbsp;</P>
<P><strong>JBuilder 7 Enterprise Notes:</strong></P>
<p> Create a file...</p>
<p>&lt;JBuilderDir&gt;\Lib\Ext\jaybird.config</p>
<p>Containing the following line...</p>
<p>addpath /JavaJars/jars/firebirdsql.jar<br>
</p>
<p> Added Libraries<br>
  Make two libraries..<br>
  FireBird_JCA_JDBC - firebirdsql.jar<br>
  FireBird_ext - mini-j2ee.jar</p>
<p> Note: the mini-j2ee is needed IF you get a ClassDefNotFound on<br>
  javax/resources/ResourceException. This was encountered using Tomcat<br>
  3.3.. <br>
</p>
<P><BR>
  <font size="+1">JBuilder 6 Personal</font><BR>
</P>
  <P>If you have any comments/suggestions, drop me an mail at marcelo.lopezruiz@xlnet.com.ar. 
    If you have some spare time, check out the rest of the site at <a href="http://www.xlprueba.com.ar/marce/index.htm">http://www.xlprueba.com.ar/marce/index.htm</a>. 
  </P>
  <P><BR>
    <BR>
  </P>
  <P>1. First, download the .zip file from SourceForge and unzip it to a temporary 
    directory.</P>
  <P>2. Read the release_notes.html document.</P>
  <P>3. Unless you are doing funny things with your JDK, you use the default JDK 
    installed with JBuilder6. In this case, you will need to download the javax.sql.* 
    package, named the JDBC 2.0 Optional Package API (formerly known as the JDBC 
    2.0 Standard Extension API) from Sun, at <a href="http://java.sun.com/products/jdbc/download.html">http://java.sun.com/products/jdbc/download.html</a>. 
    Select the last option (option package binary), accept the license agreement, 
    and download the .jar file. </P>
  <P>4. Start JBuilder 6 Personal. </P>
  <P>5. Create a new project (File | New Project...). Select a directory and a 
    project name, then click Next. In step 2, select the Required Libraries tab 
    - here, the required libraries will be registered with JBuilder and then added 
    to the project.</P>
  <P>6. Click the Add button. A list of libraries JBuilder is aware of will be 
    shown. Click the New button to register the required libraries. Enter FireBird 
    JCA-JDBC in the Name field, select JBuilder in the Location combo box, and 
    click the Add button. Select the firebirdsql.jar you unzipped, and click OK. 
    Click OK again to close the library. Verify that the new library is selected, 
    and click OK to close the &quot;Select One or More Libraries&quot; dialog 
    box.</P>
  <P>7. Repeat the previous steps with the following libraries, found in the lib 
    subdirectory of the binary distribution (except for the last package, which 
    you downloaded from Sun). </P>
  <P>concurrent.jar, named Concurrency Utilities </P>
  <P>connector.jar, named Connector </P>
  <P>jta-spec1_0_1.jar, named Java Transaction API </P>
  <P>jdbc2_0-stdext.jar, named JDBC 2 Optional Package </P>
  <P><BR>
    <BR>
  </P>
  <P>8. Click Next, enter the desired project information, and click Finish. </P>
  <P>9. Create a new application (File | New, then Application in the New tab). 
    Enter the information you want for your application, and complete the wizard. 
  </P>
  <P>10. Click on the Design tab, and double-click on the button with the opening 
    folder icon to create an event handler. </P>
  <P>11. Type the following code for the event handler (note the small helper 
    method above). </P>
  
<P><FONT FACE="Courier, monospace">private void feedback(String text) {</FONT></P>
  <P><FONT FACE="Courier, monospace">statusBar.setText(text);</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">void jButton1_actionPerformed(ActionEvent 
    e) {</FONT></P>
  <P><FONT FACE="Courier, monospace">// Hard-coded parameters</FONT></P>
  <P><FONT FACE="Courier, monospace">String pathToDatabase = &quot;C:\\Program 
    Files\\Firebird\\examples\\EMPLOYEE.GDB&quot;;</FONT></P>
  <P><FONT FACE="Courier, monospace">String userName = &quot;sysdba&quot;;</FONT></P>
  <P><FONT FACE="Courier, monospace">String password = &quot;masterkey&quot;;</FONT></P>
  <P><FONT FACE="Courier, monospace">String sql = &quot;SELECT * FROM EMPLOYEE&quot;;</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P><FONT FACE="Courier, monospace">// Load the FireBird driver.</FONT></P>
  
<P><font face="Courier, monospace">Try {</font></P>
  <P><FONT FACE="Courier, monospace">Class.forName(&quot;org.firebirdsql.jdbc.FBDriver&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch(ClassNotFoundException cnfe) {</FONT></P>
  <P><FONT FACE="Courier, monospace">feedback(&quot;org.firebirdsql.jdbc.FBDriver 
    not found&quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">return;</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P><FONT FACE="Courier, monospace">// Retrieve a connection.</FONT></P>
  
<P><font face="Courier, monospace">Try {</font></P>
  <P><FONT FACE="Courier, monospace">Statement stmt = null;</FONT></P>
  <P><FONT FACE="Courier, monospace">ResultSet rst = null;</FONT></P>
  <P><FONT FACE="Courier, monospace">Connection conn = DriverManager.getConnection(</FONT></P>
  <P><FONT FACE="Courier, monospace">&quot;jdbc:firebirdsql:localhost/3050:&quot; 
    + pathToDatabase, userName, password);</FONT></P>
  <P><FONT FACE="Courier, monospace">try {</FONT></P>
  <P><FONT FACE="Courier, monospace">// Create a statement and retrieve its result 
    set.</FONT></P>
  <P><FONT FACE="Courier, monospace">stmt = conn.createStatement();</FONT></P>
  
<P><FONT FACE="Courier, monospace">rst = stmt.executeQuery(SQL);</FONT></P>
  <P><FONT FACE="Courier, monospace">// Show the result set through the standard 
    output.</FONT></P>
  <P><FONT FACE="Courier, monospace">int columnCount = rst.getMetaData().getColumnCount();</FONT></P>
  <P><FONT FACE="Courier, monospace">int recordIndex = 0;</FONT></P>
  <P><FONT FACE="Courier, monospace">while(rst.next()) {</FONT></P>
  <P><FONT FACE="Courier, monospace">recordIndex++;</FONT></P>
  <P><FONT FACE="Courier, monospace">System.out.println(&quot;Record: &quot; + 
    recordIndex);</FONT></P>
  <P><FONT FACE="Courier, monospace">for (int i=1;i&lt;=columnCount;i++) {</FONT></P>
  <P><FONT FACE="Courier, monospace">System.out.print(rst.getMetaData().getColumnName(i));</FONT></P>
  <P><FONT FACE="Courier, monospace">System.out.print(&quot;: &quot;);</FONT></P>
  <P><FONT FACE="Courier, monospace">System.out.println(rst.getString(i));</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">} finally {</FONT></P>
  <P><FONT FACE="Courier, monospace">// close the database resources immediately, 
    rather than waiting</FONT></P>
  <P><FONT FACE="Courier, monospace">// for the finalizer to kick in later</FONT></P>
  <P><FONT FACE="Courier, monospace">if (rst != null) rst.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">if (stmt != null) stmt.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">conn.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch(SQLException se) {</FONT></P>
  <P><FONT FACE="Courier, monospace">feedback(se.toString());</FONT></P>
  <P><FONT FACE="Courier, monospace">se.printStackTrace();</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P>12. Type the following code at the beginning of the file, after the import 
    statements. </P>
  <P>import java.sql.*;</P>
  <P>13. Run the application, click the button, and view the output. </P>
  <P>14. For the morbidly curious, the following link provides an overview of 
    the classes offered by the concurrent.jar package.</P>
  <P><a href="http://gee.cs.oswego.edu/dl/classes/EDU/oswego/cs/dl/util/concurrent/intro.html">http://gee.cs.oswego.edu/dl/classes/EDU/oswego/cs/dl/util/concurrent/intro.html</a>  </P>
  <P>15. When using this library, note that there are still unimplemented things. 
    To view the source for the Connection class and check which methods will return 
  null values or an unimplemented exception, see the following URL. <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/client-java/src/org/firebirdsql/jdbc/FBConnection.java?rev=HEAD&content-type=text/vnd.viewcvs-markup">http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/firebird/client-java/src/org/firebirdsql/jdbc/FBConnection.java?rev=HEAD&amp;content-type=text/vnd.viewcvs-markup</a>  </P>
  <P><BR>
    <BR>
  </P>
  <hr>
  <P><BR>
    <BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="10"></a>10- How do I use Blobs with JayBird?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  <P>Blobs are Binary Large OBjects. Blobs are used to store blocks of binary 
    data of varying size in the database. An example would be a database table 
    to store gif or jpeg images for a photo album program. Such a program could 
    be written using the database to store file names of image files to be loaded 
    from disk, but this could easily be corrupted if a file name were changed, 
    a file inadvertently deleted, or the database moved to a system with different 
    file naming conventions.</P>
  <P>Blobs allow the binary image data to be stored, retrieved, backed up, and 
    migrated like any other database data.</P>
  <P>The Interclient JDBC driver did not implement many of the blob handling methods 
    in the JDBC interfaces. So, the programmer had limited tools for using blobs 
    with Interclient. That is no longer the case with JayBird. If 
    you come across old code or help files dealing with blobs and Interbase/Interclient, 
    be aware that it may be outdated and easier ways of dealing with blobs are 
    available with JayBird.</P>
  <P>Firebird BLOB fields are accessed through different JDBC interfaces depending 
    on their subtype. For subtype &lt;0, they are accessed as Blob fields. Subtype 
    1 is a LongVarChar, and Subtype 2 is LongVarBinary.</P>
  <P>Below is some example code written for use with Interclient that may be helpful.</P>
  <P><FONT SIZE=4>Storing BLOB Data:</FONT></P>
  
<P>The example given below shows a method that inserts an array of bytes into 
  a BLOB column in the database. The PreparedStatement class is used so we can 
  set the parameters independent of the actual SQL command string. </P>
  <P>Inserting a BLOB </P>
  <P><FONT FACE="Courier, monospace">import java.io.*;</FONT></P>
  
<P><font face="Courier, monospace">Import java.sql.*;</font></P>
  <P><FONT FACE="Courier, monospace">...</FONT></P>
  <P><FONT FACE="Courier, monospace">public void insertBlob( int rowid, byte[] 
    bindata ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">// In this example I'm assuming there's an 
    open, active</FONT></P>
  <P><FONT FACE="Courier, monospace">// Connection instance called 'con'.</FONT></P>
  <P><FONT FACE="Courier, monospace">// This examples uses an imaginary SQL table 
    of the following</FONT></P>
  <P><FONT FACE="Courier, monospace">// form:</FONT></P>
  <P><FONT FACE="Courier, monospace">//</FONT></P>
  <P><FONT FACE="Courier, monospace">// CREATE TABLE blobs (</FONT></P>
  <P><FONT FACE="Courier, monospace">// ROWID INT NOT NULL,</FONT></P>
  <P><FONT FACE="Courier, monospace">// ROWDATA BLOB,</FONT></P>
  <P><FONT FACE="Courier, monospace">//</FONT></P>
  <P><FONT FACE="Courier, monospace">// PRIMARY KEY (rowid)</FONT></P>
  <P><FONT FACE="Courier, monospace">// );</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P><FONT FACE="Courier, monospace">try {</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P><FONT FACE="Courier, monospace">ByteArrayInputStream bais = new ByteArrayInputStream(bindata);</FONT></P>
  
<P><FONT FACE="Courier, monospace">String SQL = &quot;INSERT INTO blobs ( rowid, 
  rowdata ) VALUES ( ?, ? )&quot;;</FONT></P>
  
<P><FONT FACE="Courier, monospace">PreparedStatement ps = con.prepareStatement(SQL);</FONT></P>
  <P><FONT FACE="Courier, monospace">// Set up the parameter index for convenience 
    (JDBC column</FONT></P>
  <P><FONT FACE="Courier, monospace">// indices start from 1):</FONT></P>
  <P><FONT FACE="Courier, monospace">int paramindex = 1;</FONT></P>
  <P><FONT FACE="Courier, monospace">// Set the first parameter, the Row ID: </FONT> 
  </P>
  <P><FONT FACE="Courier, monospace">ps.setInt(paramindex++, rowid);</FONT></P>
  <P><FONT FACE="Courier, monospace">// Now set the actual binary column data 
    by passing the</FONT></P>
  <P><FONT FACE="Courier, monospace">// ByteArrayInputStream instance and its 
    length:</FONT></P>
  <P><FONT FACE="Courier, monospace">ps.setBinaryStream(paramindex++, bais, bindata.length);</FONT></P>
  <P><FONT FACE="Courier, monospace">// Finally, execute the command and close 
    the statement:</FONT></P>
  <P><FONT FACE="Courier, monospace">ps.executeUpdate();</FONT></P>
  <P><FONT FACE="Courier, monospace">ps.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch ( SQLException se ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">System.err.println(&quot;Couldn't insert 
    binary data: &quot;+se);</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch ( IOException ioe ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">System.err.println(&quot;Couldn't insert 
    binary data: &quot;+ioe);</FONT></P>
  <P><FONT FACE="Courier, monospace">} finally {</FONT></P>
  <P><FONT FACE="Courier, monospace">con.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><BR>
    <BR>
  </P>
  <P><FONT SIZE=4>Retrieving BLOB Data:</FONT></P>
  <P>The example given below shows a method that retrieves an array of bytes from 
    the database. </P>
  <P>Selecting a BLOB </P>
  <P><FONT FACE="Courier, monospace">import java.io.*;</FONT></P>
  
<P><font face="Courier, monospace">Import java.sql.*;</font></P>
  <P><FONT FACE="Courier, monospace">...</FONT></P>
  <P><FONT FACE="Courier, monospace">public byte[] selectBlob( int rowid ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">// In this example I'm assuming there's an 
    open, active</FONT></P>
  <P><FONT FACE="Courier, monospace">// Connection instance called 'con'.</FONT></P>
  <P><FONT FACE="Courier, monospace">// This examples uses an imaginary SQL table 
    of the following</FONT></P>
  <P><FONT FACE="Courier, monospace">// form:</FONT></P>
  <P><FONT FACE="Courier, monospace">//</FONT></P>
  <P><FONT FACE="Courier, monospace">// CREATE TABLE blobs (</FONT></P>
  <P><FONT FACE="Courier, monospace">// ROWID INT NOT NULL,</FONT></P>
  <P><FONT FACE="Courier, monospace">// ROWDATA BLOB,</FONT></P>
  <P><FONT FACE="Courier, monospace">//</FONT></P>
  <P><FONT FACE="Courier, monospace">// PRIMARY KEY (rowid)</FONT></P>
  <P><FONT FACE="Courier, monospace">// );</FONT></P>
  <P><FONT FACE="Courier, monospace">try {</FONT></P>
  <P><FONT FACE="Courier, monospace">Statement sment = con.createStatement();</FONT></P>
  
<P><FONT FACE="Courier, monospace">String SQL = &quot;SELECT rowid, rowdata FROM 
  blobs WHERE rowid = &quot; + rowid;</FONT></P>
  
<P><FONT FACE="Courier, monospace">ResultSet rs = sment.executeQuery(SQL);</FONT></P>
  <P><FONT FACE="Courier, monospace">byte[] returndata = null;</FONT></P>
  <P><FONT FACE="Courier, monospace">if ( rs.next() ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">try {</FONT></P>
  <P><FONT FACE="Courier, monospace">// The ByteArrayOutputStream buffers all 
    bytes written to it</FONT></P>
  <P><FONT FACE="Courier, monospace">// until we call getBytes() which returns 
    to us an array of bytes:</FONT></P>
  <P><FONT FACE="Courier, monospace">ByteArrayOutputStream baos = new ByteArrayOutputStream(1024);</FONT></P>
  <P><FONT FACE="Courier, monospace">// Create an input stream from the BLOB column. 
    By default, rs.getBinaryStream()</FONT></P>
  <P><FONT FACE="Courier, monospace">// returns a vanilla InputStream instance. 
    We override this for efficiency</FONT></P>
  <P><FONT FACE="Courier, monospace">// but you don't have to:</FONT></P>
  <P><FONT FACE="Courier, monospace">BufferedInputStream bis = new BufferedInputStream( 
    rs.getBinaryStream(&quot;fieldblob&quot;) );</FONT></P>
  <P><FONT FACE="Courier, monospace">// A temporary buffer for the byte data:</FONT></P>
  <P><FONT FACE="Courier, monospace">byte bindata[1024];</FONT></P>
  <P><FONT FACE="Courier, monospace">// Used to return how many bytes are read 
    with each read() of the input stream:</FONT></P>
  <P><FONT FACE="Courier, monospace">int bytesread = 0;</FONT></P>
  <P><FONT FACE="Courier, monospace">// Make sure its not a NULL value in the 
    column:</FONT></P>
  <P><FONT FACE="Courier, monospace">if ( !rs.wasNull() ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">if ( (bytesread = bis.read(bindata,0,bindata.length)) 
    != -1 ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">// Write out 'bytesread' bytes to the writer 
    instance:</FONT></P>
  <P><FONT FACE="Courier, monospace">baos.write(bindata,0,bytesread);</FONT></P>
  <P><FONT FACE="Courier, monospace">} else {</FONT></P>
  <P><FONT FACE="Courier, monospace">// When the read() method returns -1 we've 
    hit the end of the stream,</FONT></P>
  <P><FONT FACE="Courier, monospace">// so now we can get our bytes out of the 
    writer object:</FONT></P>
  <P><FONT FACE="Courier, monospace">returndata = baos.getBytes();</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">// Close the binary input stream:</FONT></P>
  <P><FONT FACE="Courier, monospace">bis.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch ( IOException ioe ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">System.err.println(&quot;Problem retrieving 
    binary data: &quot; + ioe);</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch ( ClassNotFoundException cnfe ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">System.err.println(&quot;Problem retrieving 
    binary data: &quot; + cnfe);</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">rs.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">sment.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">} catch ( SQLException se ) {</FONT></P>
  <P><FONT FACE="Courier, monospace">System.err.println(&quot;Couldn't retrieve 
    binary data: &quot; + se);</FONT></P>
  <P><FONT FACE="Courier, monospace">} finally {</FONT></P>
  <P><FONT FACE="Courier, monospace">con.close();</FONT></P>
  <P><FONT FACE="Courier, monospace">}</FONT></P>
  <P><FONT FACE="Courier, monospace">return returndata;</FONT></P>
  <P><BR>
  </P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="11"></a>11- How do I use different character 
  sets with JayBird?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  <P>Character Encodings:</P>
  <P>Support for character encodings has just been added. This is easily accessible 
    only from the FBDriver class. To use it, request a connection with a properties 
    object containing a name-value pair lc_ctype=WIN1250 or other appropriate 
    encoding name.</P>
  <P>URL-encoded params are fully supported only when you get a connection from 
    java.sql.DriverManager (using FBDriver class). For example: jdbc:firebirdsql://localhost//home/databases/sample.gdb?lc_ctype=UNICODE_FSS</P>
  <P>It is also possible to set lc_ctype in a deployment descriptor by adding 
    the following to your deployment descriptor:</P>
  <P><FONT FACE="Courier, monospace">&lt;config-property&gt;</FONT></P>
  <P><FONT FACE="Courier, monospace">&lt;config-property-name&gt;Encoding&lt;/config-property-name&gt;</FONT></P>
  <P><FONT FACE="Courier, monospace">&lt;config-property-type&gt;java.lang.String&lt;/config-property-type&gt;</FONT></P>
  <P><FONT FACE="Courier, monospace">&lt;config-property-value&gt;UNICODE_FSS&lt;/config-property-value&gt;</FONT></P>
  <P><FONT FACE="Courier, monospace">&lt;/config-property&gt;</FONT></P>
  <P><BR>
  </P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="12"></a>12- How do I report bugs?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  
<P>The developers attempt to follow the <a href="mailto:Firebird-Java@yahoogroups.com">Firebird-Java@yahoogroups.com</a> 
  list. Join the list (see<a href="#16"> #16</a> below) and post information about 
  suspected bugs. This is a good idea because what is often thought to be a bug 
  turns out to be something else. List members may be able o help out and get 
  you going again, whereas bug fixes might take awhile.</P>
  <P>You may also report bugs in the firebird bugtracker at:</P>
  
<P><a href="http://sourceforge.net/tracker/?group_id=9028&atid=109028">http://sourceforge.net/tracker/?group_id=9028&amp;atid=109028</a></P>
  <P><BR>
  </P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="13"></a>13- How do I get sources from SourceForge 
  using CVS?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P ALIGN=CENTER><BR>
    <BR>
  </P>
  
<P>CVS is a source code control system for managing access to, and synchronizing 
  source code in a project that is being developed by multiple programmers. A 
  full explanation of CVS is beyond the scope of this document, but information 
  is available at sorceforge.net.</P>
  
<P>To get the project containing the source from SourceForge, install CVS on your 
  system and use it to download the module named &quot;client-Java&quot;. The 
  user name is &quot;anonymous&quot;. CVSROOT is :pserver:anonymous@sourceforge.net:client-Java 
  The server is sourceforge.net. If you have secure shell capability and a SourceForge 
  account use &quot;:ext:&quot; instead of &quot;:pserver:&quot;, then type in 
  your password when prompted.</P>
  
<P>If you use a GUI based CVS tool like WinCVS or TortoiseCVS on Windows, be sure 
  that you also have your system set up to run CVS from the command line.</P>
  
<P>This is necessary because the newest version of JayBird uses libraries from 
  the JBoss project to avoid licensing issues related to distributing some libraries 
  from Sun. The Ant build scripts use command line CVS to check out the code needed 
  from the JBoss project.</P>
<P>Tortoise is another good Windows based CVS tool.</P>
<P>Once you install these tools and download the source, you should be able to 
  go into the client-Java folder (wherever you had CVS put it) and type &quot;build&quot; 
  from the command line to build JayBird.</P>
  
<P>There is a file in the client-Java directory called &quot;build.bat&quot; for 
  Windows systems and one called &quot;build.sh&quot; for Unix systems. Under 
  certain UNIX shells you will have to type &quot;build.sh&quot; from the command 
  line, the csh under Solaris, for example.</P>
<font size="+1">Tortoise CVS for Windows Users:</font> 
<P>There is a very easy CVS program for Windows users called TortoiseCVS.</P>
<p>If you have access to a Windows box and don't want to learn CVS, this is an 
  easy way to get the daily updates.</p>
<p>NOTE: because the build scripts use the command line version of CVS to download 
  other projects, you need to also download WinCVS from SourceForge and install 
  it before you can do a build.</p>
<p>You can get it at www.tortoisecvs.org. Once you install it on your windows 
  box you can download a CVS project by simply right clicking in a Windows Explorer 
  subdirectory window and selecting CVS checkout.</p>
<p>A window will appear. Under module type in: client-java<br>
  Under server type: cvs.firebird.sourceforge.net<br>
  Under repository directory type: /cvsroot/firebird<br>
  Under username type: anonymous</p>
<p>Click OK and a window will appear and show the files being downloaded. A folder 
  called client-java is created for the files.</p>
<p>Install WinCVS or another command line version of CVS.</p>
<p>It is a short download and has an installer so it is very easy to install under 
  windows.</p>
<p>After installing you should be able to open a command prompt window and type 
  cvs &lt;return&gt; and see an error from CVS.</p>
<p>If you try to build without command line CVS there will be an error. If you 
  then install command line CVS and try a build, it will still fail unless you 
  go into the client-java folder and delete the folder called thirdparty.</p>
<p>The thirdparty folder is where all the external stuff is. If it exists build 
  will think everything is there, even though it isn't because command line CVS 
  failed.</p>
<p>To build the release, double click the build.bat file in the client-java directory 
  that is created.</p>
<p>Depending on the load on the SourceForge server, it might take several minutes 
  to download the files.</p>
<p>Subsequent updates only download the changed files so things go quicker.</p>
<p>A window will open and show the build but will automatically close when the 
  build is done. If you want to see the progress of the build (recommended) open 
  a command prompt window cd to the client-java directory and type &quot;build&quot; 
  and hit return.</p>
<p>After the build is done you can scroll through the output messages in the window.</p>
<p>To get to the jar files you need go into ...\client-java\output\lib.</p>
<p>With TortoiseCVS installed, the client-java directory icon looks like a fuzzy 
  green file folder. To get a new daily build, right click on the folder and select 
  CVS update.</p>
<p>If a particular build doesn't work properly, you can right click and select 
  CVS... to get a popup menu, select update special to bring up a calendar. Pick 
  the date that the code last worked for you and TortoiseCVS will roll back your 
  code to the daily build for that day.<br>
</p>
<P><BR>
</P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="14"></a>14- How can I participate in the 
  development project?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  
<P>Use the <a href="mailto:Firebird-Java@yahoogroups.com">Firebird-Java@yahoogroups.com</a> 
  list to contact the developers about helping out (see <a href="#16">#16</a> 
  below). Perhaps the most crucial need right now is for more and better setup 
  and usage guides, and to produce a reasonable section of the Firebird web site 
  devoted to this driver. Work on this would be greatly appreciated.</P>
  <P><BR>
  </P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="15"></a>15- Where can I get help?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  
<P>The Firebird-Java mail list: <a href="mailto:Firebird-Java@yahoogroups.com">Firebird-Java@yahoogroups.com</a> 
  (see <a href="#16">#16</a> below).</P>
  <P>The code for Firebird and this driver are on <A HREF="http://www.sourceforge.net/">www.sourceforge.net</A> 
    under the Firebird project.</P>
  <P>The SourceForge Firebird project home page <a href="http://www.firebirdsql.com">www.firebirdsql.com</a> 
    or <a href="http://firebird.sourceforge.net">firebird.sourceforge.net</a>.</P>
  <P>The Firebird web site: <A HREF="http://www.IBPhoenix.com/">www.IBPhoenix.com</A></P>
  <P>The Sun Java web site: <A HREF="http://java.sun.com/">java.sun.com</A></P>
  <P>The Jboss web site: <A HREF="http://www.jboss.org/">www.jboss.org</A></P>
  
<P>The Jakarta Project Web Site for Ant, log4j, and Tomcat: <A HREF="http://jakarta.apache.org/">jakarta.apache.org</A></P>
  <P><BR>
    <BR>
  </P>
  <P><BR>
  </P>
  <hr>
  <P><BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="16"></a>16- How do I join the mailing list?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P><BR>
    <BR>
  </P>
  
<P>To join the Firebird-java mailing list, go to <a href="client-java/src/etc/www.yahoogroups.com">www.yahoogroups.com</a>. 
  Follow the instructions there for joining a group. The name of the group is 
  Firebird-java.</P>
  
<P>Please set your Yahoo settings to use plain text instead of HTML. All the ads 
  drive some folks nuts and cause an automatic Internet hookup for some folks 
  in Europe who have to pay for outgoing phone calls.</P>
  <P><BR>
    <BR>
  </P>
  <hr>
<BR>
<P ALIGN=CENTER><FONT SIZE=5><a name="17"></a> 17- Are there any known bugs?</FONT></P>
  
<P ALIGN=CENTER><a href="#top">return to top</a></P>
<P ALIGN=CENTER>&nbsp;</P>
  
<P>1) 575397: SERIALIZABLE is not isc_tpb_consistency - there is no final agreement 
  between developers about mapping.<br>
</P>
<P>2) 630749: implement isc_info_sql_stmt_savepoint - will be implemented in JayBird 
  1.5.<br>
  <br>
  3) 631090: Calling stored procedures - cannot be fixed with current Firebird 
  implementation.<br>
  <br>
  4) 638074: JUnit Errors in JayBird Build - known issue, not driver problem, 
  but test case problem.<br><br>
  5) 645725: getBestRowIdentifier() not working - not yet implemented.<br>
  <br>
<P>Monitor firebird-java@yahoogroups.com for daily updates.<BR>
</P>
  
<P>You may report bugs in the firebird bugtracker at <a href="http://sourceforge.net/tracker/?group_id=9028&atid=109028">http://sourceforge.net/tracker/?group_id=9028&amp;atid=109028</a> 
  <BR>
  <BR>
</P>
  <hr>
<BR>
<BR>
<P ALIGN=CENTER><FONT SIZE=5><a name="18"></a>18- What JVM and JARs are needed 
  to use JayBird?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  
<P>&nbsp;</P>
<P>If you use JVM 1.3.1 or higher the jars included in the distribution should 
  have all the classes you need.</P>
<P>In addition to the jars in the distribution you may need jndi.jar with some 
  applications that use JVMs before 1.3.1. It is available free from Sun at <a href="http://java.sun.com/products/jndi">http://java.sun.com/products/jndi</a>. 
  DreamWeaver UltraDev 4.0 is an example of such an application. It uses a pre-1.3 
  JVM instead of the JVM installed in the system. The jndi.jar file must be added 
  for JayBird to work with UltraDev.</P>
<P>Many development systems also use internal VM's. If they are pre-1.3.1 you 
  may need to add jar files to the program's external library folder or to the 
  system classpath to add classes that the older VM's lack.</P>
<P>If you see an errors about javax.naming.Referenceable, you are probably missing 
  jndi.jar, for example.</P>
<P>Many app servers already include jndi.jar, so you may not need to download 
  it. </P>
<P>All of the jars in the distribution are pretty small so it is not much of a 
  problem to include them all. If it does become a problem and you want to eliminate 
  classes that your app doesn't need, you will need to go through the source files 
  to see what you can live without. Then you can use the jar utility to strip 
  the unneeded files out of the jars.</P>
<P>The list below gives you a rough idea what is in each jar.</P>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td width="18%">firebirdsql.jar</td>
    <td width="82%">The primary jar file. Required.</td>
  </tr>
  <tr> 
    <td width="18%">mini-j2ee.jar</td>
    <td width="82%">Contains DataSource and XA routines. Usually required.</td>
  </tr>
  <tr> 
    <td width="18%"> 
      <p>mini-concurrent.jar</p>
    </td>
    <td width="82%">Concurrency routines. Required.</td>
  </tr>
  <tr> 
    <td width="18%">firebirdsql.rar</td>
    <td width="82%">This is a J2EE server deployment file. Only needed for J2EE 
      environments. </td>
  </tr>
  <tr> 
    <td width="18%">firebirdjmx.jar</td>
    <td width="82%">Java Management Extension bean. Only needed if you want to 
      play around with JMX.</td>
  </tr>
  <tr> 
    <td width="18%">jaas.jar</td>
    <td width="82%">This is the Java Authentication and Authorization Service. 
      It is a standard part of jdk 1.4. If you are using jdk 1.4 or above, you 
      do not need this file.</td>
  </tr>
  <tr> 
    <td width="18%">firebirdsql-test.jar</td>
    <td width="82%">Test routines, not needed for apps.</td>
  </tr>
  <tr> 
    <td width="18%">log4j-core.jar</td>
    <td width="82%">Include if you want logging available. Some environments like 
      application servers may already include this.</td>
  </tr>
</table>
<P>&nbsp;</P>
  <hr>
<br>
<br>
<p align=CENTER><font size=5><a name="19"></a>19- Why isn't JayBird in one jar 
  file?</font></p>
<p align=CENTER><a href="#top">return to top</a></p>
<P>&nbsp;</P>
<P>JayBird is now available as a single jar file: firebirdsql-full.jar.</P>
<P>Some of the code was originally from Sun and they didn't allow distribution 
  by third parties without a license. To be scrupulously legal you had to download 
  the Sun jars separately. This was a pain so equivalent classes from the JBoss 
  Project were used instead. These could be distributed but needed to be updated 
  from the JBoss project source, so they are in a separate jar (mini-j2ee.jar).</P>
<P>This combined with the fact that people are using the driver for everything 
  from running a backing store for J2EE servers to simple database access in applets 
  makes it hard to please everybody. So, multiple jars are used and you can pick 
  and choose from them as needed.</P>
<P>The concurrency files are also from another project and are in a separate jar 
  with a subset of only the needed classes in the package (mini-concurrent.jar), 
  see: <a href="http://gee.cs.oswego.edu/dl/classes/EDU/oswego/cs/dl/util/concurrent/intro.html">http://gee.cs.oswego.edu/dl/classes/EDU/oswego/cs/dl/util/concurrent/intro.html</a>  for details. </P>
<P>The firebirdsql-test.jar has routines that are used only for testing at build 
  time.</P>
<P>The other jars are less frequently used and are packaged separately for easy 
  removal.</P>
<P>If you are trying to build an app that you can distribute as an executable 
  jar, you are free to tear apart the jars and roll your own.<BR>
</P>
<hr>
<P><BR>
</P>
  
<P ALIGN=CENTER><font size=4><a name="20"></a></font><FONT SIZE=5>20- What are 
  some common errors? </FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <P>&nbsp;</P>
  <P><FONT SIZE=4>1. Wrong URL</FONT></P>
  <P>The most common error is having the wrong URL format for the database. </P>
  
<P>The two formats accepted are:</P>
  <P>Standard format= jdbc:firebirdsql:[//host[:port]/]&lt;database&gt; </P>
  
<P>FB old format= jdbc:firebirdsql:[host[/port]:]&lt;database&gt;</P>
<P><font size="4">2. May need to put &quot;.gdb&quot; in the URL<BR>
  </font> </P>
  
<P>Most Firebird/Interbase database file names end in &quot;.gdb&quot;. People 
  frequently forget to put that in the URL.</P>
  
<P><font size="4">3. May need to define &quot;localhost&quot;</font></P>
<P>If you use &quot;localhost&quot; as the host name in your URL, be sure that 
  your server can resolve &quot;localhost&quot; to itself. A simple test is to 
  execute &quot;ping localhost&quot; from the command line on the system that 
  will be running JayBird. If the system can't find localhost then you or the 
  administrator must configure DNS on it to do so, or you must use the IP number 
  or the full domain name, i.e. host.domain.com.<BR>
  <BR>
</P>
<P><font size="4">4. Incorrect spelling in xml files.</font></P>
<P>When using JBoss or Tomcat or any environment that uses XML files for configuration, 
  don't forget that case is important. Windows users often make this mistake because 
  Windows is insensitive to case.</P>
  <P><BR>
    <BR>
  </P>
  <hr>
  <BR>
  <BR>
  
<P ALIGN=CENTER><font size=4><a name="21"></a></font><FONT SIZE=5>21. Is there 
  any compliance and performance information available?</FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  <H2 STYLE="font-weight: medium"><FONT SIZE=4>Compliance Tests:</FONT></H2>
  
<P>The compliance was checked with <A HREF="http://www.jDataMaster.com/">jDataMaster</A>, 
  which include more than 1000 tests, excluding:</P>
  <UL>
    <LI> 
      <P STYLE="margin-bottom: 0cm">CallableStatements </P>
    <LI> 
      <P>Escape Syntax </P>
  </UL>
  <P>FB type 4 driver pass all the tests excluding</P>
  <UL>
    <LI> 
      <P STYLE="margin-bottom: 0cm">ResultSetMetaData.isReadOnly(i) </P>
    <LI> 
      <P STYLE="margin-bottom: 0cm">ResultSetMetaData.isWritable(i) </P>
    <LI> 
      <P>ResultSetMetaData.isDefinitivelyWritable(i) </P>
  </UL>
  <P>The set/get tests don't include Blobs.</P>
  
<P>Firebird driver is the most JDBC compliant driver of those tested with this 
  tool, the next one fails on 90 tests, including all of the most well known RDBMS.</P>
  <P><BR>
    <BR>
  </P>
  <H2 STYLE="font-weight: medium"><FONT SIZE=4>Performance tests compared with 
    Interclient</FONT></H2>
  <P>The results of the jDataMaster basic performance tests, are the following</P>
  <P>Local test</P>
  <P>Duron 800MHz with 512MB and FB 1.0 without forced Writes</P>
  <TABLE BORDER=1 CELLPADDING=2 CELLSPACING=5>
    <TR> 
      <TD> 
        <P>&nbsp;</P>
      </TD>
      <TD> 
        <P>Interclient</P>
      </TD>
      <TD> 
        <P>Firebird Type 4</P>
      </TD>
      <TD> 
        <P>FB as % of Interclient</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Insert 5000 records with autocommit</P>
      </TD>
      <TD> 
        <P>8510 ms</P>
      </TD>
      <TD> 
        <P>14307 ms</P>
      </TD>
      <TD> 
        <P>168 %</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Read 5000 records with autocommit (x5)</P>
      </TD>
      <TD> 
        <P>3052 ms</P>
      </TD>
      <TD> 
        <P>3056 ms</P>
      </TD>
      <TD> 
        <P>100 %</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Insert 5000 records with one transaction</P>
      </TD>
      <TD> 
        <P>6650 ms</P>
      </TD>
      <TD> 
        <P>5552 ms</P>
      </TD>
      <TD> 
        <P>83 %</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Read 5000 records inside one transaction(x5)</P>
      </TD>
      <TD> 
        <P>3990 ms</P>
      </TD>
      <TD> 
        <P>3819 ms</P>
      </TD>
      <TD> 
        <P>95 %</P>
      </TD>
    </TR>
  </TABLE>
  <P>Remote test</P>
  <P>Client: Windows 2000 on Duron 800MHz with 512MB.<BR>
    Server: Suse 7.2 on AMD 500MHz with 256MB and FB 1.0.</P>
  <TABLE BORDER=1 CELLPADDING=2 CELLSPACING=5>
    <TR> 
      <TD> 
        <P>&nbsp;</P>
      </TD>
      <TD> 
        <P>Interclient</P>
      </TD>
      <TD> 
        <P>Firebird Type 4</P>
      </TD>
      <TD> 
        <P>FB as % of Interclient</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Insert 5000 records with autocommit</P>
      </TD>
      <TD> 
        <P>16588 ms</P>
      </TD>
      <TD> 
        <P>17525 ms</P>
      </TD>
      <TD> 
        <P>106 %</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Read 5000x5 records with autocommit</P>
      </TD>
      <TD> 
        <P>8082 ms</P>
      </TD>
      <TD> 
        <P>6247 ms</P>
      </TD>
      <TD> 
        <P>77 %</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Insert 5000 records with one transaction</P>
      </TD>
      <TD> 
        <P>13009 ms</P>
      </TD>
      <TD> 
        <P>6311 ms</P>
      </TD>
      <TD> 
        <P>49 %</P>
      </TD>
    </TR>
    <TR> 
      <TD> 
        <P>Read 5000x5 records inside one transaction</P>
      </TD>
      <TD> 
        <P>11639 ms</P>
      </TD>
      <TD> 
        <P>8670 ms</P>
      </TD>
      <TD> 
        <P>75 %</P>
      </TD>
    </TR>
  </TABLE>
  <P>The time in each test is the average of 5 executions.</P>
  <P><BR>
    <BR>
  </P>
  <P>June-24-2002</P>
  <hr>
<BR>
<BR>
<P ALIGN=CENTER><FONT SIZE=5><a name="22"></a>22- What is the history of JayBird?</FONT></P>
  
<P ALIGN=CENTER><a href="#top">return to top</a><BR>
</P>
  
<P>The idea of writing a Java translation of the C client library and using it 
  in an all-Java driver originated in some discussions between David Jencks and 
  Jim Starkey. Alejandro Alberola provided the initial translation of most of 
  the client library functionality. David still doesn't understand how he did 
  it so quickly. David Jencks wrote the JCA support and initial JDBC interfaces. 
  Roman Rokytskyy wrote the CallableStatement support, many of the trickier JDBC 
  details, the FBField implementation, and the character encoding support (among 
  many other things). Several others have contributed bug fixes.<BR>
</P>
  <hr>
  <P><BR>
    <BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="23"></a>23- Where can I find an updated 
  FAQ and Release Notes? </FONT></P>
  <P ALIGN=CENTER><a href="#top">return to top</a></P>
  
<P><BR>
  This FAQ is available in the JayBird download on SourceForge and on the project 
  home page at: </P>
<P><a href="http://firebird.sourceforge.net/">http://firebird.sourceforge.net</a></P>
<P> The release notes are also in the download or can be read on the SourceForge 
  Firebird site at:</P>
<P><a href="http://sourceforge.net/projects/firebird">http://sourceforge.net/projects/firebird</a></P>
<P>Find the entry &quot;firebird-jca-jdbc-driver&quot; in the table and click 
  on the small book icon to the right to see the release notes.</P>
<P>The following link takes you to the JayBird FAQ at www.IBPhoenix.com:<BR>
</P>
  
<P><a href="http://www.ibphoenix.com/main.nfs?a=ibphoenix&l=;IBPHOENIX.FAQS;NAME=%27JayBird%27">http://www.ibphoenix.com/main.nfs?a=ibphoenix&amp;l=;IBPHOENIX.FAQS;NAME='JayBird'</a></P>
  <P><BR>
    <BR>
  </P>
  <hr>
  <P><BR>
    <BR>
  </P>
  
<P ALIGN=CENTER><FONT SIZE=5><a name="24"></a>24- What tasks are left to do?</FONT></P>
  
<P ALIGN=CENTER><a href="#top">return to top</a><BR>
  <BR>
</P>
  
<P ALIGN=LEFT><font size="3">JayBird is a stable product but there are numerous 
  additions and improvements that can be made. See the firebird-java discussion 
  group to make suggestions or find out what others are working on.</font></P>
  
<OL>
  <LI> 
    <P ALIGN=LEFT><FONT SIZE=3>Implement the unimplemented methods listed in question 
      2 above.</FONT></P>
  <LI> 
    <P ALIGN=LEFT><FONT SIZE=3>Implement the unimplemented optional features listed 
      in section 2 above, where possible.</FONT></P>
  <LI>
  <P ALIGN=LEFT><FONT SIZE=3>Implement JDBC 3.0 functionality.</FONT></P>
  <LI>
    <P ALIGN=LEFT><font size="3">Optimize Performance.</font></P>
</OL>
  <P ALIGN=center><BR>
  </P>
  <hr>
  <P ALIGN=center>&nbsp; </P>
  
<P ALIGN=center><font size="+2"><a name="25"></a>25- Where can I submit corrections/additions 
  to the release notes and FAQ?</font></P>
  <P ALIGN=center><a href="#top">return to top</a><BR>
  </P>
  <P ALIGN=left>&nbsp;</P>
  <P ALIGN=left>Please send corrections, suggestions, or additions to these Release 
    Notes to Rick Fincher at <a href="mailto:rnf@tbird.com">rnf@tbird.com</a>, 
    or to the developers on the SourceForge site, or post them to the newsgroup 
    at <a href="mailto:Firebird-Java@yahoogroups.com">Firebird-Java@yahoogroups.com</a>.<br>
  </P>
  <hr>
<P ALIGN=left>&nbsp;</P>
<p align=center><font size="+2"><a name="26"></a>26- How do I turn off logging?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
  
<P ALIGN=left>JayBird uses Log4J for logging. See: <a href="http://jakarta.apache.org/log4j/docs/index.html">http://jakarta.apache.org/log4j/docs/index.htm</a>l 
  for more details about Log4J. </P>
<P ALIGN=left>If you are using JayBird in JBoss, Tomcat, or other server environments, 
  you can usually control the logging from within that application. See the documentation 
  of those programs for more info.</P>
<P ALIGN=left>In a stand-alone app you need to put an entry like the following 
  in either a log4j.properties or xml file:</P>
<P ALIGN=left>log4j.logger.org.firebirdsql=[DEBUG, INFO, WARN, ERROR, FATAL]</P>
<P ALIGN=left>To tell Java where to find the Log4J configuaration file, you can 
  use a flag like the following when you run your app:</P>
<P ALIGN=left>java -Dlog4j.configuration=file:/c:/foobar.lcf myApp</P>
<P ALIGN=left><br>
</P>
<P ALIGN=left>&nbsp;</P>
<hr>
<p align=left>&nbsp;</p>
<p align=center><font size="+2"><a name="27"></a>27- How do I use JayBird with 
  my development environment?</font></p>
<p align=center><a href="#top">return to top</a></p>
<P ALIGN=left>&nbsp;</P>
<P ALIGN=left>You can use JayBird in most Java development environments. Examples 
  are NetBeans, Eclipse, SunOne Studio (formerly Forte for Java) among many others. 
  Look at your IDE's (Integrated Development Environment) documentation under 
  JDBC to find out how to install the drivers.</P>
<P ALIGN=left>DreamWeaver Ultradev from MacroMedia can also use the JayBird driver 
  to access Firebird databases. See question 31 below.</P>
<P ALIGN=left>Many IDE's will let you develop web apps using servlets and JSP's 
  (Java Server Pages). Where you put the jars when developing web apps may be 
  different from the directories used for developing stand-alone apps. See your 
  IDE's directions for details.</P>
<P ALIGN=left>In SunOne Studio (formerly Forte for Java) and NetBeans (an open 
  source version of the same program) a built-in version of Tomcat is used as 
  the default JSP/servlet container for the IDE when developing web apps. The 
  installation directories are different from those described in the Tomcat instructions 
  above. See the help files included with these programs to find out where to 
  install the jar files.</P>
<P ALIGN=left>Typically, there is a directory called ext in the directory tree 
  of the IDE where external jars are stored.</P>
<P ALIGN=left>If all else fails when developing web apps, you can put the jar 
  files in the WEB-INF/lib folder during development. When you deploy the web 
  app you can remove theJayBird jars from WEB-INF/lib and create your war file 
  for deployment. Just be sure you have the JayBird jars properly installed in 
  the app server before using the web app.</P>
<hr>
<p align=left>&nbsp;</p>
<p align=center><font size="+2"><a name="28"></a>28- Does JayBird provide any 
  kind of security?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=left>&nbsp;</p>
<p>Not directly. Firebird and InterBase do not currently support secure connections
  internally. Therefore JayBird cannot. You must use SSL with an application
  server, or
  an 
  IP tunneling program to secure your data in transit. These are both readily
   available. Secure connections are possible, you just have to use external
  software 
  to get them.</p>
<p>One popular tunneling program is ZeBeDee. See<a href="http://www.ibphoenix.com/a471.htm"> http://www.ibphoenix.com/a471.htm</a> for
  more information and examples of a secure Firebird setup.</p>
<p>There is a widely held misconception that Interclient/Interserver provide a 
  secure connection. All they do is encode the password used to log in to the 
  database. Data transactions after that are insecure unless the above means are 
  used to secure them.</p>
<p>Another method of securing your data is to write your application as a web
  application that runs on an application server and displays in a browser. Most
  app servers have secure access capability. In that scenario Firebird and the
  app server are run
  on  systems
  behind
  a firewall.
  The web
  browser makes secure calls to the app server. The app server then makes
  unsecure calls to the Firebird server using Jaybird. Since both the app server
  and the firebird server are behind the firewall, none of their transactions
  are visible to the outside world. Port 3050 should be blocked at the firewall
  in such a scenario to prevent unauthorized access or spoofing of Firebird.</p>
<p>This scenario will not prevent snooping from other systems behind your firewall,
  so for best security you may want to put your servers behind their own firewall.</p>
<p>If the application server and the Firebird server are on the same machine,
  packets never reach the network, so snooping is more difficult. Port 3050 will
  have
  to remain available, however, so the system will not be completely secure.</p>
<hr>
<p align=left>&nbsp;</p>
<p align=center><font size="+2"><a name="29"></a>29- Does JayBird support dialect 
  1, 2, and 3 databases?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p>&nbsp;</p>
<p>JayBird was written to support dialect 3 databases and may have problems with 
  the earlier dialect 1 and 2 databases. Having said that, many people are running 
  legacy dialect 1 and 2 databases without problems.</p>
<p>It is recommended that you migrate to dialect 3 databases as soon as practical 
  and always use dialect 3 for new development.</p>
<p>Firebird 1.5 and later releases will not support dialect 1 and 2 databases.</p>
<hr>
<p align=left>&nbsp;</p>
<p align=center><font size="+2"><a name="30"></a>30- Why don't arguments or ampersands 
  (&amp;) work in my URL?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
<p align=left>If you are using an XML file to pass the parameters (Tomcat, etc.) 
  you must use &amp;amp; or &amp;#38; instead of the ampersand (&amp;) alone.</p>
<p align=left>In XML, the &amp; symbol is used to make references to entities, 
  so it is treated like a special character. The XML parser expects to find something 
  like &amp;entityname; That is why it must end with the ';' delimiter.</p>
<p align=left>If you see an error message like:</p>
<p align=left>org.apache.commons.digester.Digester fatalError<br>
  SEVERE: Parse Fatal Error at line 62 column 94: The reference to entity &quot;lc_ctype&quot; 
  must end with the ';' delimiter.<br>
  org.xml.sax.SAXParseException: The reference to entity &quot;lc_ctype&quot; 
  must end with the ';' delimiter.</p>
<p align=left>This is what is causing it.</p>
<p align=left>Instead of: ...my.gdb?sql_role_name=guest&amp;lc_ctype=WIN1251<br>
</p>
<p align=left>Use: ...my.gdb?sql_role_name=guest&amp;amp;lc_ctype=WIN1251<br>
  <br>
</p>
<hr>
<p align=left>&nbsp;</p>
<p align=center><font size="+2"><a name="31"></a>31- Why do I see &quot;????&quot; 
  instead of the correct characters?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
<p align=left>This problem is seen a lot with Tomcat and alternate character sets. 
  Resin and Jetty seem to work OK. There are two possible sources of this error: 
  a) database contains incorrect data or b) The application handles this incorrecly.</p>
<p>The chain of translations is like this:</p>
<p>database byte[] -&gt; client-side byte[] (using lc_ctype) -&gt; String instance 
  (using corresponding Java encoding) -&gt; HTML page encoding (depends on the 
  implementation).</p>
<p>With lc_ctype=CP1254, for example, some Java code may use String.getBytes() 
  instead of String.getBytes(&quot;Cp1254&quot;), the result depends on the default 
  encoding of the JVM. If the default encoding is not Cp1254, it will translate 
  the correct unicode string into &quot;????&quot;.</p>
<p>InterClient works because it receives the byte array from InterServer in the 
  encoding that it asked (Cp1254). The String is constructed as &quot;new String(byte[])&quot;, 
  and not as &quot;new String(byte[], &quot;Cp1254&quot;)&quot;. Later &quot;str.getBytes()&quot; 
  will return bytes from that string without doing any unicode/charset translation.</p>
<p> MySQL and JayBird work correctly, InterClient has a bug that compensates for 
  the bug in the code.</p>
<p>To fix it, try to run the JVM with -Dfile.encoding=Cp1254, so the default encoding 
  will be correct.</p>
<hr>
<p>&nbsp;</p>
<p align=center><font size="+2"><a name="32"></a>32- Can I use JayBird with Open 
  Office?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
<p align=left>Yes. Use the standard JayBird settings for the driver class and 
  URL. You must have Java installed on your system as well.</p>
<p align=left>For example:</p>
<p align=left>JDBC Driver class- org.firebirdsql.jdbc.FBDriver<br>
  URL- jdbc:firebirdsql:host.domain.com/3050:/(pathtodb)/(dbfile).gdb</p>
<p>Make sure the locations of the driver jars are in the classpath box in the 
  menu: tools-&gt;options-&gt;openoffice.org-&gt;security.</p>
<p>You can then use the data table tool in Open Office to extract rows of the 
  database directly into your spreadsheets and use the data for any of the Open 
  Office apps.<br>
</p>
<hr>
<p align=center><font size="+2"><a name="33"></a>33- How do I create a new database 
  with JayBird?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=left>You can use the methods in FBManager in the package org.firebirdsql.management 
  to easily create a new database in your programs. After creation you can connect 
  to the database and use the standard SQL calls to create tables and populate 
  them. </p>
<p>This is an example:</p>
<p><font face="Courier New, Courier, mono">String
      DB_SERVER_URL = &quot;localhost&quot;;<br>
  int DB_SERVER_PORT = 3050;<br>
  String DB_PATH = &quot;c:/database&quot;;<br>
  String DB_NAME = &quot;test.gdb&quot;;<br>
  String DB_USER = &quot;sysdba&quot;;<br>
  String DB_PASSWORD = &quot;masterkey&quot;;</font></p>
<p><font face="Courier New, Courier, mono">fbManager.setServer(DB_SERVER_URL);<br>
  fbManager.setPort(DB_SERVER_PORT);</font></p>
<p><font face="Courier New, Courier, mono">fbManager.start();</font></p>
<p><font face="Courier New, Courier, mono">fbManager.createDatabase(DB_PATH + &quot;/&quot; +
DB_NAME, DB_USER, DB_PASSWORD);</font></p>
<p>After you have created the database you can set its default character set
  with a command like:</p>
<p><font face="Courier New, Courier, mono">UPDATE rdb$database SET rdb$character_set_name='ISO8859_1'<br>
</font></p>
<hr>
<p align="center"><font size="+2"><a name="34"></a>34- How do I use JayBird with 
  Windows 95/98?</font></p>
<p align="center"><a href="#top">return to top</a></p>
<p align="left">&nbsp;</p>
<p align="left">You must upgrade to Winsock 2.0 to use JayBird with Windows 95. 
  See the Microsoft web site for details. Windows 98 uses Winsock 2.0 by default, 
  but in a very few cases when Windows is upgraded from 95 to 98, Winsock 2.0 
  is not installed. See <a href="http://www.sockets.com/winsock2.htm">http://www.sockets.com/winsock2.htm</a> 
  for more info.</p>
<hr>
<p align=center>&nbsp;</p>
<p></p>
<p align=center><font size="+2"><a name="35"></a>35- Why does building the CVS 
  code fail?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
<p align=left>One of the primary reasons is that a command line version of CVS 
  is not installed. If you see a message about a cvs failure, that is probably 
  the reason. Type cvs&lt;return&gt; at a command prompt. You should see error 
  messages from CVS. If you get a message from the system that CVS isn't found, 
  it isn't properly installed, or you need to set up a path to it for your shell.</p>
<p align=left>If you see a message about missing files in the thirdparty directory, 
  you probably tried to build without command line CVS. This creates a directory 
  called thirdparty, but CVS can't put the necessary files in it. The build script 
  assumes the files are there if the thirdparty directory exists, so the build 
  fails. Delete the thirdparty directory, make sure command line CVS is working 
  and try build again.</p>
<hr>
<p align=center><font size="+2"><font size="+2"><a name="36"></a></font><font size="5">36-</font></font><font size="5"> 
  Why aren't my connections ever returned to the pool?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
<p align=left>Be sure that you close all statements and result sets associated 
  with a connection before closing a pooled connection. Closing a pooled connection 
  doesn't actually close it but returns it to the pool. If it has active statements 
  or result sets it can't be reused. </p>
<p align=left>Since closing a non-pooled connection automatically closed statements 
  and result sets associated with it, a lot of code has been written that doen 
  not explicitly close statements and result sets. If you simply substitute a 
  pooled connection in old code, it may never properly close statements and result 
  sets. </p>
<hr>
<p align=center><font size="+2"><font size="+2"><a name="37"></a></font><font size="5">37-</font></font><font size="5"> 
  How do I use JayBird with DreamWeaver UltraDev?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=left>UltraDev uses an internal Java JVM. The JVM in UltraDev 4 is a pre-1.3 
  version so you will need to obtain the jndi.jar file and install it. The jndi.jar 
  file is available from Sun at: <a href="http://java.sun.com/products/jndi">http://java.sun.com/products/jndi</a>.</p>
<p align=left>You must install the jars firebirdsql.jar, mini-concurrent.jar, 
  mini-j2ee.jar, and jndi.jar into the UltraDev JDBCDrivers folder. On Windows 
  machines this is typically at:</p>
<p align=left>C:\Program Files\Macromedia\Dreamweaver UltraDev 4\Configuration\JDBCDrivers</p>
<p align=left>See the UltraDev documentation for instructions on installing on 
  the Macintosh. This has not been tested by me but should work OK.</p>
<p align=left>To set up a connection pull down UltraDev's &quot;Modify&quot; menu 
  and select &quot;Connections...&quot;. A dialog box will pop up. Select &quot;New&quot; 
  and you will see a list of JDBC drivers. Select &quot;Custom JDBC Connection&quot;.</p>
<p align=left>Another dialog box will pop up. Type in the a name for your new 
  connection, the driver name, database URL string, username, and password. Click 
  the &quot;Test&quot; button to be sure that you can connect to the database.</p>
<p align=left>To add JayBird to the list JDBC drivers in the menu go to the configuration/connections/jsp 
  folder. Then open the Mac or Win folder, depending on your OS. Under Windows 
  this is typically at:</p>
<p align=left>C:\Program Files\Macromedia\Dreamweaver UltraDev 4\Configuration\Connections\JSP\Win</p>
<p align=left>Copy one of the existing html files (.htm under Windows) into a 
  new file with a name like &quot;jaybird_conn.htm&quot;. Open your new file and 
  change the following entries to the proper info for Jaybird as in the example 
  below:</p>
<p align=left>&lt;TITLE&gt;JayBird JDBC Driver for Firebird&lt;/TITLE&gt;</p>
<p align=left>...</p>
<p align=left> //Global vars<br>
  var DEFAULT_DRIVER = &quot;org.firebirdsql.jdbc.FBDriver&quot;;<br>
  var DEFAULT_TEMPLATE = &quot;jdbc:firebirdsql:localhost/3050:[database name]&quot;;<br>
  var MSG_JayBirdDriverNotFound = &quot;JayBird Driver not found on machine&quot;<br>
  var MSG_DriverNotFound = MSG_JayBirdDriverNotFound;<br>
  var FILENAME = &quot;jaybird_conn.htm&quot;</p>
<p align=left>Save this file and restart UltraDev. When you follow the procedure 
  above for creating a new connection you shoul now see &quot;JayBird JDBC Driver 
  for Firebird&quot; in the list of JDBC drivers.</p>
<hr>
<p align=center><font size="+2"><font size="+2"><a name="38"></a></font><font size="5">38-</font></font><font size="5"> 
  Why do I see a &quot;javax.naming.Referenceable&quot; error?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=left>&nbsp;</p>
<p align=left>If you see this error you probably need to include jndi.jar in your 
  classpath, or your application's external libraries directory. You will need 
  this jar if you are using JayBird with an application that uses an internal 
  JVM with a version prior to 1.3.</p>
<p align=left>&nbsp;</p>
<hr>
<p align=center><font size="+2"><font size="+2"><a name="39"></a></font><font size="5">39-</font></font><font size="5"> 
  How do I use stored procedures with JayBird?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=left>&nbsp;</p>
<p align=left>Jaybird does not fully support escaped syntax for procedure calls
  (output parameters are not supported). However if you use native Firebird syntax,
  stored
procedures are fully supported. </p>
<p>Native Firebird syntax:</p>
<p>EXECUTE PROCEDURE proc_name(?, ?, ?, ...) for executable procedures;<br>
  SELECT * FROM proc_name(?, ?, ...) for selectable procedures.</p>
<p>{call proc_name(?, ?, ...)} is translated into EXECUTE PROCEDURE<br>
  proc_name(?, ?, ?, ...) without any analysis. This means that:</p>
<p>a) It is not usable for selectable stored procedures;<br>
  b) Positions of output params are independent of input params (in JDBC they're
    not) and start with 1.</p>
<p>When you use native syntax, stored procedures can be called both from PreparedStatement
  and from CallableStatement, in case of escaped syntax - only from CallableStatement.<br>
</p>
<p><font size="+1">Examples</font> </p>
<p align=left>The following example is a stripped-down version of code taken from 
  the project source code tests in the directory:</p>
<p align=left>client-java/src/test/org/firebirdsql/jdbc/TestFBCallableStatement.java 
  <br>
</p>
<p align=left>It creates a stored procedure called &quot;factorial&quot; on the 
  Firebird server that recursively calls itself to calculate factorials. The method 
  testRun shows how the stored procedure would be called from Java. </p>
<p align=left>To make this work you would have to add code to open the java.sql.Connection 
  called connection in this code snippet. You would also have to close the connection, 
  statements, etc. when you are done<br>
</p>
<br>
public class TestFBCallableStatement {<br>
&nbsp;&nbsp;&nbsp;public static final String CREATE_PROCEDURE = &quot;&quot;<br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot;CREATE PROCEDURE factorial(number INTEGER, mode INTEGER) RETURNS (result INTEGER) &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot;AS &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; DECLARE VARIABLE temp INTEGER; &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot;BEGIN &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; temp = number - 1; &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; IF (NOT temp IS NULL) THEN BEGIN &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; IF (temp &gt; 0) THEN &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; EXECUTE PROCEDURE factorial(:temp, 0) RETURNING_VALUES :temp; &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; ELSE &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; temp = 1; &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; result = number * temp; &quot; <br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; END &quot;<br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; IF (mode = 1) THEN &quot;<br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot; SUSPEND; &quot;<br>
&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp+ &quot;END&quot;;
<p>&nbsp;&nbsp;&nbsp public static final String DROP_PROCEDURE =<br>
 &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp &quot;DROP PROCEDURE factorial;&quot;;</p>
<p> &nbsp;&nbsp;&nbsppublic static final String SELECT_PROCEDURE =<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&quot;SELECT * FROM factorial(?, 1)&quot;;</p>
<p> &nbsp;&nbsp;&nbsppublic static final String EXECUTE_PROCEDURE =<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&quot;{call factorial(?, 0)}&quot;;</p>
<p>&nbsp;&nbsp;&nbsp private java.sql.Connection connection;</p>
<p> &nbsp;&nbsp;&nbsppublic TestFBCallableStatement(String testName) {<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp//<br>
  &nbsp;&nbsp;&nbsp }</p>
<p>&nbsp;&nbsp;&nbsp public void testRun() throws Exception {</p>
<p> &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp// set up the connection before you call 
  this <br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbspjava.sql.CallableStatement cstmt = connection.prepareCall(EXECUTE_PROCEDURE);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsptry {<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp cstmt.setInt(1, 5);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp cstmt.execute();<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp int ans = cstmt.getInt(1);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp; &nbspassertTrue(&quot;got wrong 
  answer, expected 120: &quot; + ans, ans == 120);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp} finally {<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbspcstmt.close();<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp}<br>
  <br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbspjava.sql.PreparedStatement stmt = connection.prepareStatement(SELECT_PROCEDURE);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsptry {<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp stmt.setInt(1, 5);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp java.sql.ResultSet rs = 
  stmt.executeQuery();<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp; &nbsp;&nbspassertTrue(&quot;Should 
  have at least one row&quot;, rs.next());<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp; &nbspint result = rs.getInt(1);<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp; &nbspassertTrue(&quot;Wrong result: 
  expecting 120, received &quot; + result, result == 120);<br>
  <br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp assertTrue(&quot;Should 
  have exactly one row.&quot;, !rs.next());<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp rs.close();<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp} finally {<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp stmt.close();<br>
  &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp}</p>
<p>&nbsp;&nbsp;&nbsp// Tear down the connection here when you are done.<br>
  &nbsp;&nbsp;&nbsp}<br>
  }<br>
</p>
<p></p>
<hr>
<p></p>
<p align=center><font size="+2"><a name="40"></a>40- Why are VARCHAR strings sometimes 
  padded?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=left>&nbsp;</p>
<p align=left>Till v.6.5 InterBase sent VARCHAR columns padded to the full length 
  with spaces (0x20) similar to CHAR. In 6.5 this was changed by Borland so that 
  VARCHARs are no longer padded, as expected. IB 6.0 and FB 1.0 pads VARCHARs 
  too. However, if FB 1.0 is accessed via JayBird, it does NOT pad VARCHARs and 
  sends them correctly. </p>
<p> From one of the posts in the Firebird devel list this issue seems to appear 
  when using the gds32.dll under Windows but not with the INET protocol.</p>
<hr>
<p></p>
<p align=center><font size="+2"><a name="41" id="41"></a>41- Can
I use CachedRowSet with JayBird?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p></p>
<p>Yes, but  third party code must be used. CachedRowSet allows you to store
  a copy of a rowSet and disconnect from the Firebird server for processing.
  This is useful because it allows you to release a connection immediately after
  getting a rowSet instead of holding it open while the rowSet is processed.
  That allows the server to run more efficiently</p>
<p>Two third-party implementations have
  been tested and seem to work the same. </p>
<p>One is from Oracle: OracleCachedRowSet
    -- it doesn't require an Oracle database but does require the Oracle JDBC
jar file. You need both ocrs12.zip and ojdbc14.jar.</p>
<p>See: <a href="http://otn.oracle.com/software/tech/java/sqlj_jdbc/content.htm">http://otn.oracle.com/software/tech/java/sqlj_jdbc/content.htm</a>l </p>
<p>&nbsp;</p>
<p>Another is an open source project called jxutil: XDisconnectedRowSet -- only
requires one jar file, jxRowSet-0.8a.jar.</p>
<p>See:<a href="http://sourceforge.net/projects/jxutil/"> http://sourceforge.net/projects/jxutil/</a></p>
<p>Depending on the intended use, it would be appropriate to study the licenses
  both implementations come under.<br>
  Jxutil is LGPL (Limited Gnu Public License) software, while OracleCachedRowSet
  uses the Oracle Technology Network Development and Distribution License. See: <a href="http://otn.oracle.com/software/htdocs/distlic.html">http://otn.oracle.com/software/htdocs/distlic.html</a>.<br>
  <br>
</p>
<hr>
<p></p>
<p align=center><font size="+2"><a name="dpb"></a>42- How do I pass Database
    Parameter Buffer (DPB) parameters?</font></p>
<p align=center><a href="#top">return to top</a></p>
<p align=center>&nbsp;</p>
<p align=left> If you use FBWrappingDataSource, you specify DPB parameters in
  FBConnectionRequestInfo.</p>
<p align=left>If you are using java.sql.DriverManager you can pass any DPB parameter
  by stripping the &quot;isc_dpb_&quot; from the DPB parameter name and putting
  it in the URL. In case of roles and character encoding this could be:</p>
<p>...my.gdb?sql_role_name=guest&amp;lc_ctype=WIN1251</p>
<p>See the InterBase API Guide Chapter 4, &quot;Working with Databases&quot; for 
  more details. The following table is a listing of DPB parameters.</p>
<table width="90%" border="1" cellspacing="0" cellpadding="5" align="center">
  <tr> 
    <td width="19%"> 
      <div align="center">DPB Parameter</div>
    </td>
    <td width="28%"> 
      <div align="center">Description</div>
    </td>
    <td width="15%"> 
      <div align="center">Length</div>
    </td>
    <td width="38%"> 
      <div align="center">Values</div>
    </td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_activate_shadow</td>
    <td width="28%">Directive to activate the database shadow, which is an optional, 
      duplicate, in-sync copy of the database</td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%">1 (Ignored) 0 (Ignored)</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_damaged</td>
    <td width="28%">Number signifying whether or not the database<br>
      should be marked as damaged</td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%">1 = mark as damaged<br>
      0 = do not mark as damaged</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_dbkey_scope</td>
    <td width="28%">Scope of dbkey context</td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%">0 limits scope to the current transaction, 1 extends scope 
      to the database session</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_delete_shadow</td>
    <td width="28%">Directive to delete a database shadow that is no<br>
      longer needed</td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%">1(Ignored) 0 (Ignored)</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_encrypt_key</td>
    <td width="28%">String encryption key</td>
    <td width="15%"> 
      <div align="center">up to 255 characters</div>
    </td>
    <td width="38%"><br>
      String containing key</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_force_write</td>
    <td width="28%"> 
      <p>Specifies whether database writes<br>
        are synchronous or asynchronous.</p>
    </td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%">0 = asynchronous; 1 = synchronous</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_lc_ctype</td>
    <td width="28%">String specifying the character set to be utilized</td>
    <td width="15%"> 
      <div align="center">number of bytes in string</div>
    </td>
    <td width="38%">String containing character set name</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_lc_messages</td>
    <td width="28%">String specifying a language-specific message file</td>
    <td width="15%"> 
      <div align="center">Number of bytes<br>
        in string</div>
    </td>
    <td width="38%">String containing<br>
      message file name</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_no_reserve</td>
    <td width="28%">Specifies whether or not a small amount of space on each database 
      page is reserved for holding backup<br>
      versions of records when modifications are made;<br>
      keep backup versions on the same page as the primary record to optimize 
      update activity.</td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%">0 (default) = reserve space<br>
      1= do not reserve space</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_num_buffers</td>
    <td width="28%">Number of database cache buffers to allocate for use<br>
      with the database; default=75</td>
    <td width="15%"> 
      <div align="center">1</div>
    </td>
    <td width="38%"> Number of buffers to<br>
      allocate</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_password</td>
    <td width="28%">String password</td>
    <td width="15%"> 
      <div align="center">up to 255 characters </div>
    </td>
    <td width="38%">String containing password</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_password_enc</td>
    <td width="28%">String encrypted password</td>
    <td width="15%"> 
      <div align="center">up to 255 characters</div>
    </td>
    <td width="38%">String containing<br>
      password</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_sql_role_name</td>
    <td width="28%">String Role Name</td>
    <td width="15%"> 
      <div align="center">up to 255 characters</div>
    </td>
    <td width="38%">String containing Role Name</td>
  </tr>
  <tr> 
    <td width="19%">isc_dpb_sys_user_name</td>
    <td width="28%">String system DBA name</td>
    <td width="15%"> 
      <div align="center">up to 255 characters</div>
    </td>
    <td width="38%">String containing<br>
      SYSDBA name</td>
  </tr>
  <tr> 
    <td width="19%" height="68">isc_dpb_user_name</td>
    <td width="28%" height="68">String user name</td>
    <td width="15%" height="68"> 
      <div align="center">up to 255 characters</div>
    </td>
    <td width="38%" height="68">String containing<br>
      user name</td>
  </tr>
</table>
<p>&nbsp;</p>
<hr>
<br>
<p align=CENTER><font size=5><a name="43"></a>43- What
is a good validation query to use with JayBird?</font></p>
<p align=CENTER><a href="#top">return to top</a></p>
<p>&nbsp;</p>
<p>Some programs and web applications need a query that they can send to the
  database to verify that it is online and connected, or to insure that a connection
  hasn't timed out. That is called a validation query. A good one for Firebird/JayBird
  is:</p>
<p>SELECT CAST(1 AS INTEGER) FROM rdb$database<br>
  <br>
  This select will always succeed if the connection is still alive and will have
  exactly one row in the result set..<br>
</p>
<hr>
<br>
<p align=CENTER><font size=5><a name="44"></a>44- How
can I get the key of the new record I just inserted?</font></p>
<p align=CENTER><a href="#top">return to top</a></p>
<p>Sometimes it is necessary to get the Primary Key of a record just inserted
  so that it can be used as the relation in an insert into another table. If
  you are using a generator and trigger to auto-generate keys and insert them
  in new records, you do not know what the key is.</p>
<p>A solution is to get a key from the generator before you do the insert, then
  use that key to do the insert in both tables.</p>
<p>Getting a new key is simple but you have to modify the trigger to skip getting
  a new key if a key is supplied in the insert statement. In this way the database
  will still auto-generate keys if you like or it will use keys you supply.</p>
<p>To get a new primary key to insert with use:</p>
<p><font face="Courier, monospace">SELECT gen_id(my_generator, 1) FROM RDB$DATABASE</font></p>
<p>This fires your generator and returns the new key in the result set. The following
  sets up the trigger so that it will auto create the primary key if you don't
  pass
  it
  one in the insert,
  but will also use one that you give it (generated above) without generating
  another one. So insert will work either
way.</p>
<p>Create the trigger:</p>
<p><br>
  <font face="Courier, monospace">active before insert<br>
  as<br>
  begin<br>
  if (new.YourPk is null) then<br>
  new.YourPk = gen_id(my_generator, 1);<br>
  end</font><br>
  <br>
  Trigger generation is outside of transaction control (the only thing that
    is!) so it is guaranteed to be 100% atomic. In other words, this will always
safely give you a unique key.</p>
<p>You may get better performance by creating a pool of keys to use for inserts.
You could generate a block of keys at startup, then your inserts will go quicker.</p>
<p>To create a block of 100 keys, for example, use:</p>
<p><font face="Courier, monospace">SELECT gen_id(my_generator, 100) FROM RDB$DATABASE</font></p>
<p>This will return the last number in the block. If that number is myKey, you
can use numbers from( myKey-99) through myKey.</p>
<p>&nbsp;</p>
<hr>
<br>
<p align=CENTER><font size=5><a name="45" id="45"></a>45-How do
I set the default character set of a database?</font></p>
<p align=CENTER><a href="#top">return to top</a></p>
<p>After you have created the database (See FAQ item 33) you can set its default
  character set
with a command like:</p>
<p><font face="Courier New, Courier, mono">UPDATE rdb$database SET rdb$character_set_name='ISO8859_1'</font></p>
<p>Be sure to do this before creating tables. Tables created before the default
  charset is changed will have the old default charset and will not be affected
  by the change, unless explicitly set to something else.</p>
<p>You must also open the connection to the database with lc_ctype set to the
  same character set as the database for character translations to work properly.</p>
<hr>
<p align="center"><font size=5><a name="46" id="46"></a>46- Can you explain
    how character sets work?</font></p>
<p align="center"><a href="#top">return to top</a></p>
<p>Character handling with JayBird can be confusing because the Java VM, Firebird
  database, browser, and JayBird Connection all have a charset associated with
  them.
</p>
<p>Also, the Firebird server attempts to transliterate the internal charset of
  a database to the charset specified in the connection. JayBird also attempts
  to translate the JVM charset to the Firebird server charsets specfied in the
  connection.</p>
<p>With Firebird the character encoding of the text data stored in the database
  is set when the database is created. That applies to the char and varchar columns,
  and type 1 blobs (text blobs). You can override the default charset for columns
  with the appropriate SQL commands when the columns are created. Be careful
  if you do this or you may end up with two columns in the same table that you
  can't read with the same connection.</p>
<p>The only situation when this problem can happen is when
  you have a table with columns that have the &quot;NONE&quot; character set
  and some other character set (&quot;UNICODE_FSS&quot;, &quot;WIN1252&quot;,
  etc). The server tries to convert characters from the encoding specified for
  the column into the encoding specified for connection. The &quot;NONE&quot; character
  set allows only one-way conversion: from &lt;any&gt; to &quot;NONE&quot;. In
  this case server simply returns you bytes written in the database. So if you
  have table:</p>
<p><font face="Courier New, Courier, mono">CREATE TABLE charset_table(<br>
  col1 VARCHAR(10) CHARACTER SET WIN1252,<br>
  col2 VARCHAR(10) CHARACTER SET NONE<br>
  )</font></p>
<p>you will not be able to modify both columns in the same SQL statement, and
  it does not matter whether you use &quot;NONE&quot;, &quot;WIN1252&quot; or &quot;
UNICODE_FSS&quot; for the connection.</p>
<p>The only possible way to solve this problem is to use character set &quot;OCTETS&quot;.
  This is some kind of artificial character set, similar to &quot;NONE&quot; (data
  are written and read as byte arrays), however there exist bi-directional translation
  rules between any character set (incl.&quot;NONE&quot;) and &quot;OCTETS&quot;.
  You can specify &quot;OCTETS&quot; for
  connection and then decode byte arrays you receive from the server yourself,
  the driver will do byte-array-to-string conversion incorrectly, since it does
  not
get a hint about the character set from the server.</p>
<p>Let's say your program or web app prompts the user to type a string. If the
  user types &quot;abc&quot; into a Java text box in your app, or into a text
  box in a browser for a web app, Java creates a string for that 3 character
  string in Unicode. So the string would actually have 9 bytes in it- three Unicode
  characters of three bytes each.</p>
<p>INSERTing this in a text column in the database would result in nine bytes
being inserted without translation.</p>
<p>Note: You have to pass correct unicode strings to the driver. What is &quot;correct
  unicode&quot; string? It is easier to explain what is not a correct unicode
string. </p>
<p>Let's assume you have normal text file in WIN1251 encoding. In this case cyrillic
  characters from the unicode table (values between 0-65535) are mapped into
  the characters with values 0-255. However, your regional settings say that
  you're in Germany. This means that file.encoding will be set to Cp1252 on JVM
  start. If you now open the file and construct a reader without specifying that
  character encoding is Cp1251, Java will read the file and construct your strings.
  However all cyrillic characters will be replaced by characters from the Cp1252
  encoding that have the same number representation as the cyrillic ones. </p>
<p>These
    strings are valid unicode strings, however their content is not the content
    you read
    from the file. Interestingly enough, if you  write such strings back into
    the file, and open it in some text editor saying that this is WIN1251 text,
    you will see correct text.</p>
<p>If you open your connection to the database without specifying a character
  set (lc_ctype) it defaults to NONE and no translation is done. So when you
  SELECT the previously inserted data from the database and display it in your
  program you get the same string you entered, right? Well, not necessarily.</p>
<p>You will get a string with the same nine bytes in it that were stored, but
  if the user getting that string from the database has a different default charset
  in his Java VM those bytes will display differently.</p>
<p>The JVM usually picks up its locale dependent character encoding from the
  underlying operating system, but it can also be set when you invoke the JVM
  by using -Dfile.encoding=Cp1252, for example. If you attempt to display characters
  that aren't in your default JVM encoding they apear as '?'.</p>
<p>The only way to insure you always get back what you put in is to create the
  database with a charset and set lc_ctype to the same charset when you open
  the connection to that database.</p>
<p>If want to use charsets other than NONE and you have lots of data in databases
  with a charset of NONE, you may have to set up a new database with a different
  charset and use a data pump to transfer data over, or write a small program
  to do the transfer.</p>
<p>Using UNICODE_FSS works well nearly everywhere but may increase the size of
  your databases if you have lots of text because Unicode uses characters up
  to 3
  bytes long.</p>
<p>There are some limitations regarding UNICODE_FSS character set: there's only
  one collation, where strings are sorted by the natural order, and not collation
  rules for different languages; there are some issues when converting them to
  upper case, etc. More information on these anomalies  can be found in the Firebird-Support
  group.</p>
<p>Again, the default charset for Firebird is NONE. The Firebird server does
  no translation with this charset.</p>
<p>If your database has a charset of NONE and you set a charset type on the connection
  (lc_ctype) that is not NONE, you can write to the database but you can't read
  from it without getting the &quot;Cannot transliterate between character sets&quot; exception.</p>
<p>Let's follow a string as it gets inserted into the database and later selected
  from the database. For this example we will set the database charset to NONE.</p>
<p>See the freely available Interbase 6 PDF manuals &quot;Data Definition Guide&quot; for
  a list of charsets available.</p>
<p>The WIN125X or ISO8859_1 charsets may be a good choice for you if you need
  the non-English characters but want the compactness of the 1 byte characters.
  With these char sets you can specify many different national language collation
  orders in the ORDER BY clause of the SELECT statement.</p>
<p>Let's look at the same example above, but this time we will insert into a
  database that has been created with a charset of WIN1251.</p>
<p>When you open the connection to the database you set the lc_ctype=WIN1251.
  Then insert the string 'abc' into the appropriate column. JayBird has to take
  the Unicode encoded Java String &quot;abc&quot;and convert it to WIN1251
  format and send it to the database server for insertion. Since the database
  is already in WIN1251 format, the server does not have to translate. When the
  string is read back from the database it is converted back to the Java VM format
  by JayBird.</p>
<p>It is also possible to set an lc_ctype in a connection that is different from
  the charset of the database. This lets the database server do the translating
  from one charset to another. This is a feature of the Firebird server that
  lets programming languages or programs that require specific character formats
  to connect to the database without requiring the data to be stored in that
  format.</p>
<p>You can also avoid problems by using java.sql.PreparedStatement instead of
  java.sql.Statement and not building SQL strings out of concatenated Java strings.
  For example:</p>
<p>String sqlString, firstName=&quot;John&quot;, lastName=&quot;O'Neal&quot;;</p>
<p>sqlString = &quot;INSERT INTO nameTable (LNAME, FNAME) VALUES('&quot;+lastName+&quot;','&quot;+firstName+&quot;')&quot;;</p>
<p>Statement stmt = connection.createStatement();<br>
  int insertedRows = stmt.executeUpdate(sqlString);</p>
<p>The problem here is that if the user types in data for these strings you might
  end up with illegal characters, or the translation might not be correct.</p>
<p>In the example above, the following illegal SQL string would be generated
  and cause an exception to be thrown because of the apostrophe in O'Neil:</p>
<p>INSERT INTO nameTable (LNAME, FNAME) VALUES('O'Neal', 'John')</p>
<p>To avoid this, use a prepared statement like in the example below.</p>
<p>PreparedStatement stmt = connection.prepareStatement(&quot;INSERT INTO<br>
  nameTable(LNAME,FNAME) VALUES(?, ?)&quot;);</p>
<p>stmt.setString(1, lastName);<br>
  stmt.setString(2, firstName);</p>
<p>int insertedRows = stmt.executeUpdate();</p>
<p>if (insertedRows != 1)<br>
  throw new MyInsertFailedException(&quot;Could not insert data&quot;);<br>
</p>
<hr>
<br>
<p align=CENTER><font size=5><a name="codeexamples"></a>47- Can you give me some
     code examples?</font></p>
<p align=CENTER><a href="#top">return to top</a></p>
<p align=CENTER><br>
</p>
<p>Yes we can. There are two examples below, a driver example and a DataSource 
  example that are extensively commented.</p>
<p><font size=4>Driver Example:</font></p>
<p><font face="Courier, monospace">// Original version of this file was part of 
  InterClient 2.01 examples</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Copyright InterBase Software Corporation, 
  1998.</font></p>
<p><font face="Courier, monospace">// Written by com.inprise.interbase.interclient.r&amp;d.PaulOstler 
  :-)</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Code was modified by Roman Rokytskyy to 
  show that Firebird JCA-JDBC driver</font></p>
<p><font face="Courier, monospace">// does not introduce additional complexity 
  in normal driver usage scenario.</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// A small application to demonstrate basic, 
  but not necessarily simple, JDBC features.</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Note: you will need to hardwire the path 
  to your copy of employee.gdb</font></p>
<p><font face="Courier, monospace">// as well as supply a user/password in the 
  code below at the</font></p>
<p><font face="Courier, monospace">// beginning of method main().</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">public class DriverExample</font></p>
<p><font face="Courier, monospace">{</font></p>
<p><font face="Courier, monospace">// Make a connection to an employee.gdb on 
  your local machine,</font></p>
<p><font face="Courier, monospace">// and demonstrate basic JDBC features.</font></p>
<p><font face="Courier, monospace">// Notice that main() uses its own local variables 
  rather than</font></p>
<p><font face="Courier, monospace">// static class variables, so it need not be 
  synchronized.</font></p>
<p><font face="Courier, monospace">public static void main (String args[]) throws 
  Exception</font></p>
<p><font face="Courier, monospace">{</font></p>
<p><font face="Courier, monospace">// Modify the following hardwired settings 
  for your environment.</font></p>
<p><font face="Courier, monospace">// Note: localhost is a TCP/IP keyword which 
  resolves to your local machine's IP address.</font></p>
<p><font face="Courier, monospace">// If localhost is not recognized, try using 
  your local machine's name or</font></p>
<p><font face="Courier, monospace">// the loopback IP address 127.0.0.1 in place 
  of localhost.</font></p>
<p><font face="Courier, monospace">String databaseURL = &quot;jdbc:firebirdsql:localhost/3050:c:/database/employee.gdb&quot;;</font></p>
<p><font face="Courier, monospace">String user = &quot;sysdba&quot;;</font></p>
<p><font face="Courier, monospace">String password = &quot;masterkey&quot;;</font></p>
<p><font face="Courier, monospace">String driverName = &quot;org.firebirdsql.jdbc.FBDriver&quot;;</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// As an exercise to the reader, add some code 
  which extracts databaseURL,</font></p>
<p><font face="Courier, monospace">// user, and password from the program args[] 
  to main().</font></p>
<p><font face="Courier, monospace">// As a further exercise, allow the driver 
  name to be passed as well,</font></p>
<p><font face="Courier, monospace">// and modify the code below to use driverName 
  rather than the hardwired</font></p>
<p><font face="Courier, monospace">// string &quot;org.firebirdsql.jdbc.FBDriver&quot; 
  so that this code becomes</font></p>
<p><font face="Courier, monospace">// driver independent. However, the code will 
  still rely on the</font></p>
<p><font face="Courier, monospace">// predefined table structure of employee.gdb.</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// See comment about closing JDBC objects at 
  the end of this main() method.</font></p>
<p><font face="Courier, monospace">System.runFinalizersOnExit (true);</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Here are the JDBC objects we're going to 
  work with.</font></p>
<p><font face="Courier, monospace">// We're defining them outside the scope of 
  the try block because</font></p>
<p><font face="Courier, monospace">// they need to be visible in a finally clause 
  which will be used</font></p>
<p><font face="Courier, monospace">// to close everything when we are done.</font></p>
<p><font face="Courier, monospace">// The finally clause will be executed even 
  if an exception occurs.</font></p>
<p><font face="Courier, monospace">java.sql.Driver d = null;</font></p>
<p><font face="Courier, monospace">java.sql.Connection c = null;</font></p>
<p><font face="Courier, monospace">java.sql.Statement s = null;</font></p>
<p><font face="Courier, monospace">java.sql.ResultSet rs = null;</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Any return from this try block will first 
  execute the finally clause</font></p>
<p><font face="Courier, monospace">// towards the bottom of this file.</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Let's try to register the Firebird JCA-JDBC 
  driver with the driver manager</font></p>
<p><font face="Courier, monospace">// using one of various registration alternatives...</font></p>
<p><font face="Courier, monospace">int registrationAlternative = 1;</font></p>
<p><font face="Courier, monospace">switch (registrationAlternative) {</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">case 1:</font></p>
<p><font face="Courier, monospace">// This is the standard alternative and simply 
  loads the driver class.</font></p>
<p><font face="Courier, monospace">// Class.forName() instructs the java class 
  loader to load</font></p>
<p><font face="Courier, monospace">// and initialize a class. As part of the class 
  initialization</font></p>
<p><font face="Courier, monospace">// any static clauses associated with the class 
  are executed.</font></p>
<p><font face="Courier, monospace">// Every driver class is required by the JDBC 
  specification to automatically</font></p>
<p><font face="Courier, monospace">// create an instance of itself and register 
  that instance with the driver</font></p>
<p><font face="Courier, monospace">// manager when the driver class is loaded 
  by the java class loader</font></p>
<p><font face="Courier, monospace">// (this is done via a static clause associated 
  with the driver class).</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Notice that the driver name could have been 
  supplied dynamically,</font></p>
<p><font face="Courier, monospace">// so that an application is not hardwired 
  to any particular driver</font></p>
<p><font face="Courier, monospace">// as would be the case if a driver constructor 
  were used, eg.</font></p>
<p><font face="Courier, monospace">// new org.firebirdsql.jdbc.FBDriver().</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">Class.forName (&quot;org.firebirdsql.jdbc.FBDriver&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.lang.ClassNotFoundException e) 
  {</font></p>
<p><font face="Courier, monospace">// A call to Class.forName() forces us to consider 
  this exception :-)...</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Firebird JCA-JDBC 
  driver not found in class path&quot;);</font></p>
<p><font face="Courier, monospace">System.out.println (e.getMessage ());</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">break;</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">case 2:</font></p>
<p><font face="Courier, monospace">// There is a bug in some JDK 1.1 implementations, 
  eg. with Microsoft</font></p>
<p><font face="Courier, monospace">// Internet Explorer, such that the implicit 
  driver instance created during</font></p>
<p><font face="Courier, monospace">// class initialization does not get registered 
  when the driver is loaded</font></p>
<p><font face="Courier, monospace">// with Class.forName().</font></p>
<p><font face="Courier, monospace">// See the FAQ at <a href="http://java.sun.com/jdbc">http://java.sun.com/jdbc</a>  for more info on this problem.</font></p>
<p><font face="Courier, monospace">// Notice that in the following workaround 
  for this bug, that if the bug</font></p>
<p><font face="Courier, monospace">// is not present, then two instances of the 
  driver will be registered</font></p>
<p><font face="Courier, monospace">// with the driver manager, the implicit instance 
  created by the driver</font></p>
<p><font face="Courier, monospace">// class's static clause and the one created 
  explicitly with newInstance().</font></p>
<p><font face="Courier, monospace">// This alternative should not be used except 
  to workaround a JDK 1.1</font></p>
<p><font face="Courier, monospace">// implementation bug.</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">java.sql.DriverManager.registerDriver (</font></p>
<p><font face="Courier, monospace">(java.sql.Driver) Class.forName (&quot;org.firebirdsql.jdbc.FBDriver&quot;).newInstance 
  ()</font></p>
<p><font face="Courier, monospace">);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.lang.ClassNotFoundException e) 
  {</font></p>
<p><font face="Courier, monospace">// A call to Class.forName() forces us to consider 
  this exception :-)...</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Driver not found 
  in class path&quot;);</font></p>
<p><font face="Courier, monospace">System.out.println (e.getMessage ());</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.lang.IllegalAccessException e) 
  {</font></p>
<p><font face="Courier, monospace">// A call to newInstance() forces us to consider 
  this exception :-)...</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to access 
  driver constructor, this shouldn't happen!&quot;);</font></p>
<p><font face="Courier, monospace">System.out.println (e.getMessage ());</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.lang.InstantiationException e) 
  {</font></p>
<p><font face="Courier, monospace">// A call to newInstance() forces us to consider 
  this exception :-)...</font></p>
<p><font face="Courier, monospace">// Attempt to instantiate an interface or abstract 
  class.</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to create 
  an instance of driver class, this shouldn't happen!&quot;);</font></p>
<p><font face="Courier, monospace">System.out.println (e.getMessage ());</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">// A call to registerDriver() forces us to 
  consider this exception :-)...</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Driver manager failed 
  to register driver&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">break;</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">case 3:</font></p>
<p><font face="Courier, monospace">// Add the Firebird JCA-JDBC driver name to 
  your system's jdbc.drivers property list.</font></p>
<p><font face="Courier, monospace">// The driver manager will load drivers from 
  this system property list.</font></p>
<p><font face="Courier, monospace">// System.getProperties() may not be allowed 
  for applets in some browsers.</font></p>
<p><font face="Courier, monospace">// For applets, use one of the Class.forName() 
  alternatives above.</font></p>
<p><font face="Courier, monospace">java.util.Properties sysProps = System.getProperties 
  ();</font></p>
<p><font face="Courier, monospace">StringBuffer drivers = new StringBuffer (&quot;org.firebirdsql.jdbc.FBDriver&quot;);</font></p>
<p><font face="Courier, monospace">String oldDrivers = sysProps.getProperty (&quot;jdbc.drivers&quot;);</font></p>
<p><font face="Courier, monospace">if (oldDrivers != null)</font></p>
<p><font face="Courier, monospace">drivers.append (&quot;:&quot; + oldDrivers);</font></p>
<p><font face="Courier, monospace">sysProps.put (&quot;jdbc.drivers&quot;, drivers.toString 
  ());</font></p>
<p><font face="Courier, monospace">System.setProperties (sysProps);</font></p>
<p><font face="Courier, monospace">break;</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">case 4:</font></p>
<p><font face="Courier, monospace">// Advanced: This is a non-standard alternative, 
  and is tied to</font></p>
<p><font face="Courier, monospace">// a particular driver implementation, but 
  is very flexible.</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// It may be possible to configure a driver 
  explicitly, either thru</font></p>
<p><font face="Courier, monospace">// the use of non-standard driver constructors, 
  or non-standard</font></p>
<p><font face="Courier, monospace">// driver &quot;set&quot; methods which somehow 
  tailor the driver to behave</font></p>
<p><font face="Courier, monospace">// differently from the default driver instance.</font></p>
<p><font face="Courier, monospace">// Under this alternative, a driver instance 
  is created explicitly</font></p>
<p><font face="Courier, monospace">// using a driver specific constructor. The 
  driver may then be</font></p>
<p><font face="Courier, monospace">// tailored differently from the default driver 
  instance which is</font></p>
<p><font face="Courier, monospace">// created automatically when the driver class 
  is loaded by the java class loader.</font></p>
<p><font face="Courier, monospace">// For example, perhaps a driver instance could 
  be created which</font></p>
<p><font face="Courier, monospace">// is to behave like some older version of 
  the driver.</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// d = new org.firebirdsql.jdbc.FBDriver ();</font></p>
<p><font face="Courier, monospace">// DriverManager.registerDriver (d);</font></p>
<p><font face="Courier, monospace">// c = DriverManager.getConnection (...);</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Since two drivers, with differing behavior, 
  are now registered with</font></p>
<p><font face="Courier, monospace">// the driver manager, they presumably must 
  recognize different JDBC</font></p>
<p><font face="Courier, monospace">// subprotocols. For example, the tailored 
  driver may only recognize</font></p>
<p><font face="Courier, monospace">// &quot;jdbc:interbase:old_version://...&quot;, 
  whereas the default driver instance</font></p>
<p><font face="Courier, monospace">// would recognize the standard &quot;jdbc:interbase://...&quot;.</font></p>
<p><font face="Courier, monospace">// There are currently no methods, such as 
  the hypothetical setVersion(),</font></p>
<p><font face="Courier, monospace">// for tailoring an Firebird JCA-JDBC driver 
  so this 4th alternative is academic</font></p>
<p><font face="Courier, monospace">// and not necessary for Firebird JCA-JDBC 
  driver.</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// It is also possible to create a tailored 
  driver instance which</font></p>
<p><font face="Courier, monospace">// is *not* registered with the driver manager 
  as follows</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// d = new org.firebirdsql.jdbc.FBDriver ();</font></p>
<p><font face="Courier, monospace">// c = d.connect (...);</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// this is the most usual case as this does 
  not require differing</font></p>
<p><font face="Courier, monospace">// JDBC subprotocols since the connection is 
  obtained thru the driver</font></p>
<p><font face="Courier, monospace">// directly rather than thru the driver manager.</font></p>
<p><font face="Courier, monospace">d = new org.firebirdsql.jdbc.FBDriver ();</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// At this point the driver should be registered 
  with the driver manager.</font></p>
<p><font face="Courier, monospace">// Try to find the registered driver that recognizes 
  interbase URLs...</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">// We pass the entire database URL, but we 
  could just pass &quot;jdbc:interbase:&quot;</font></p>
<p><font face="Courier, monospace">d = java.sql.DriverManager.getDriver (databaseURL);</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Firebird JCA-JDBC 
  driver version &quot; +</font></p>
<p><font face="Courier, monospace">d.getMajorVersion () +</font></p>
<p><font face="Courier, monospace">&quot;.&quot; +</font></p>
<p><font face="Courier, monospace">d.getMinorVersion () +</font></p>
<p><font face="Courier, monospace">&quot; registered with driver manager.&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to find Firebird 
  JCA-JDBC driver among the registered drivers.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Advanced info: Class.forName() loads the 
  java class for the driver.</font></p>
<p><font face="Courier, monospace">// All JDBC drivers are required to have a 
  static clause that automatically</font></p>
<p><font face="Courier, monospace">// creates an instance of themselves and registers 
  that instance</font></p>
<p><font face="Courier, monospace">// with the driver manager. So there is no 
  need to call</font></p>
<p><font face="Courier, monospace">// DriverManager.registerDriver() explicitly 
  unless the driver allows</font></p>
<p><font face="Courier, monospace">// for tailored driver instances to be created 
  (each instance recognizing</font></p>
<p><font face="Courier, monospace">// a different JDBC sub-protocol).</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Now that the JayBird driver is registered 
  with the driver manager,</font></p>
<p><font face="Courier, monospace">// try to get a connection to an employee.gdb 
  database on this local machine</font></p>
<p><font face="Courier, monospace">// using one of two alternatives for obtaining 
  connections...</font></p>
<p><font face="Courier, monospace">int connectionAlternative = 1;</font></p>
<p><font face="Courier, monospace">switch (connectionAlternative) {</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">case 1:</font></p>
<p><font face="Courier, monospace">// This alternative is driver independent;</font></p>
<p><font face="Courier, monospace">// the driver manager will find the right driver 
  for you based on the JDBC subprotocol.</font></p>
<p><font face="Courier, monospace">// In the past, this alternative did not work 
  with applets in some browsers because of a</font></p>
<p><font face="Courier, monospace">// bug in the driver manager. I believe this 
  has been fixed in the jdk 1.1 implementations.</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">c = java.sql.DriverManager.getConnection (databaseURL, 
  user, password);</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Connection established.&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to establish 
  a connection through the driver manager.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">break;</font></p>
<p><font face="Courier, monospace">case 2:</font></p>
<p><font face="Courier, monospace">// If you're working with a particular driver 
  d, which may or may not be registered,</font></p>
<p><font face="Courier, monospace">// you can get a connection directly from it, 
  bypassing the driver manager...</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">java.util.Properties connectionProperties = 
  new java.util.Properties ();</font></p>
<p><font face="Courier, monospace">connectionProperties.put (&quot;user&quot;, 
  user);</font></p>
<p><font face="Courier, monospace">connectionProperties.put (&quot;password&quot;, 
  password);</font></p>
<p><font face="Courier, monospace">c = d.connect (databaseURL, connectionProperties);</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Connection established.&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to establish 
  a connection through the driver.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">break;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Let's disable the default autocommit so 
  we can undo our changes later...</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">c.setAutoCommit (false);</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Auto-commit is disabled.&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to disable 
  autocommit.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Now that we have a connection, let's try 
  to get some meta data...</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">java.sql.DatabaseMetaData dbMetaData = c.getMetaData 
  ();</font></p>
<p><font face="Courier, monospace">// Ok, let's query a driver/database capability</font></p>
<p><font face="Courier, monospace">if (dbMetaData.supportsTransactions ())</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Transactions are 
  supported.&quot;);</font></p>
<p><font face="Courier, monospace">else</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Transactions are 
  not supported.&quot;);</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// What are the views defined on this database?</font></p>
<p><font face="Courier, monospace">java.sql.ResultSet tables = dbMetaData.getTables 
  (null, null, &quot;%&quot;, new String[] {&quot;VIEW&quot;});</font></p>
<p><font face="Courier, monospace">while (tables.next ()) {</font></p>
<p><font face="Courier, monospace">System.out.println (tables.getString (&quot;TABLE_NAME&quot;) 
  + &quot; is a view.&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">tables.close ();</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to extract 
  database meta data.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">// What the heck, who needs meta data anyway 
  ;-(, let's continue on...</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Let's try to submit some static SQL on the 
  connection.</font></p>
<p><font face="Courier, monospace">// Note: This SQL should throw an exception 
  on employee.gdb because</font></p>
<p><font face="Courier, monospace">// of an integrity constraint violation. </font> 
</p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">s = c.createStatement ();</font></p>
<p><font face="Courier, monospace">s.executeUpdate (&quot;update employee set 
  salary = salary + 10000&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to increase 
  everyone's salary.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">// We expected this to fail, so don't return, 
  let's keep going...</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Let's submit some static SQL which produces 
  a result set.</font></p>
<p><font face="Courier, monospace">// Notice that the statement s is reused with 
  a new SQL string.</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">rs = s.executeQuery (&quot;select full_name 
  from employee where salary &lt; 50000&quot;);</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to submit 
  a static SQL query.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">// We can't go much further without a result 
  set, return...</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// The query above could just as easily have 
  been dynamic SQL,</font></p>
<p><font face="Courier, monospace">// eg. if the SQL had been entered as user 
  input.</font></p>
<p><font face="Courier, monospace">// As a dynamic query, we'd need to query the 
  result set meta data</font></p>
<p><font face="Courier, monospace">// for information about the result set's columns.</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">java.sql.ResultSetMetaData rsMetaData = rs.getMetaData 
  ();</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;The query executed 
  has &quot; +</font></p>
<p><font face="Courier, monospace">rsMetaData.getColumnCount () +</font></p>
<p><font face="Courier, monospace">&quot; result columns.&quot;);</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Here are the columns: 
  &quot;);</font></p>
<p><font face="Courier, monospace">for (int i = 1; i &lt;= rsMetaData.getColumnCount 
  (); i++) {</font></p>
<p><font face="Courier, monospace">System.out.println (rsMetaData.getColumnName 
  (i) +</font></p>
<p><font face="Courier, monospace">&quot; of type &quot; +</font></p>
<p><font face="Courier, monospace">rsMetaData.getColumnTypeName (i));</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to extract 
  result set meta data.&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">// What the heck, who needs meta data anyway 
  ;-(, let's continue on...</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Ok, lets step thru the results of the query...</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Here are the employee's 
  whose salary &lt; $50,000&quot;);</font></p>
<p><font face="Courier, monospace">while (rs.next ()) {</font></p>
<p><font face="Courier, monospace">System.out.println (rs.getString (&quot;full_name&quot;));</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Unable to step thru 
  results of query&quot;);</font></p>
<p><font face="Courier, monospace">showSQLException (e);</font></p>
<p><font face="Courier, monospace">return;</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// As an exercise to the reader, rewrite this 
  code so that required</font></p>
<p><font face="Courier, monospace">// table structures are created dynamically 
  using executeUpdate() on DDL.</font></p>
<p><font face="Courier, monospace">// In this way the code will be able to run 
  against any database file rather</font></p>
<p><font face="Courier, monospace">// than just a previously setup employee.gdb.</font></p>
<p><font face="Courier, monospace">// Just to get you started, you'll want to 
  define a method something like</font></p>
<p><font face="Courier, monospace">// the following...</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// private static void createTableStructures 
  (java.sql.Connection c) throws java.sql.SQLException</font></p>
<p><font face="Courier, monospace">// {</font></p>
<p><font face="Courier, monospace">// // Some drivers don't force commit on DDL, 
  Firebird JCA-JDBC driver does,</font></p>
<p><font face="Courier, monospace">// // see DatabaseMetaData.dataDefinitionCausesTransactionCommit().</font></p>
<p><font face="Courier, monospace">// // This is not necessary for Firebird JCA-JDBC 
  driver, but may be for other drivers...</font></p>
<p><font face="Courier, monospace">// c.setAutoCommit (true);</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// java.sql.Statement s = c.createStatement();</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// // Drop table EMPLOYEE if it already exists, 
  if not that's ok too.</font></p>
<p><font face="Courier, monospace">// try { s.executeUpdate (&quot;drop table 
  EMPLOYEE&quot;); } catch (java.sql.SQLException e) {}</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// // Ok, now that we're sure the table isn't 
  already there, create it...</font></p>
<p><font face="Courier, monospace">// s.executeUpdate (&quot;create table EMPLOYEE 
  (...)&quot;);</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// // Ok, now populate the EMPLOYEE table...</font></p>
<p><font face="Courier, monospace">// s.executeUpdate (&quot;insert into EMPLOYEE 
  values (...)&quot;);</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// s.close();</font></p>
<p><font face="Courier, monospace">// c.setAutoCommit (false);</font></p>
<p><font face="Courier, monospace">// }</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// This finally clause will be executed even 
  if &quot;return&quot; was called in case of any exceptions above.</font></p>
<p><font face="Courier, monospace">finally {</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Closing database 
  resources and rolling back any changes we made to the database.&quot;);</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Now that we're all finished, let's release 
  database resources.</font></p>
<p><font face="Courier, monospace">try { if (rs!=null) rs.close (); } catch (java.sql.SQLException 
  e) { showSQLException (e); }</font></p>
<p><font face="Courier, monospace">try { if (s!=null) s.close (); } catch (java.sql.SQLException 
  e) { showSQLException (e); }</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Before we close the connection, let's rollback 
  any changes we may have made.</font></p>
<p><font face="Courier, monospace">try { if (c!=null) c.rollback (); } catch (java.sql.SQLException 
  e) { showSQLException (e); }</font></p>
<p><font face="Courier, monospace">try { if (c!=null) c.close (); } catch (java.sql.SQLException 
  e) { showSQLException (e); }</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// If you don't close your database objects 
  explicitly as above,</font></p>
<p><font face="Courier, monospace">// they may be closed by the object's finalizer, 
  but there's</font></p>
<p><font face="Courier, monospace">// no guarantee if or when the finalizer will 
  be called.</font></p>
<p><font face="Courier, monospace">// In general, object finalizers are not called 
  on program exit.</font></p>
<p><font face="Courier, monospace">// It's recommended to close your JDBC objects 
  explictly,</font></p>
<p><font face="Courier, monospace">// but you can use System.runFinalizersOnExit(true), 
  as at the beginning</font></p>
<p><font face="Courier, monospace">// of this method main(), to force finalizers 
  to be called before</font></p>
<p><font face="Courier, monospace">// program exit.</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Display an SQLException which has occured 
  in this application.</font></p>
<p><font face="Courier, monospace">private static void showSQLException (java.sql.SQLException 
  e)</font></p>
<p><font face="Courier, monospace">{</font></p>
<p><font face="Courier, monospace">// Notice that a SQLException is actually a 
  chain of SQLExceptions,</font></p>
<p><font face="Courier, monospace">// let's not forget to print all of them...</font></p>
<p><font face="Courier, monospace">java.sql.SQLException next = e;</font></p>
<p><font face="Courier, monospace">while (next != null) {</font></p>
<p><font face="Courier, monospace">System.out.println (next.getMessage ());</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;Error Code: &quot; 
  + next.getErrorCode ());</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;SQL State: &quot; 
  + next.getSQLState ());</font></p>
<p><font face="Courier, monospace">next = next.getNextException ();</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><br>
  <br>
</p>
<p><font size=4>Data Source Example:</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Original version of this file was part of 
  InterClient 2.01 examples</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Copyright InterBase Software Corporation, 
  1998.</font></p>
<p><font face="Courier, monospace">// Written by com.inprise.interbase.interclient.r&amp;d.PaulOstler 
  :-)</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// Code was modified by Roman Rokytskyy to 
  show that Firebird JCA-JDBC driver</font></p>
<p><font face="Courier, monospace">// does not introduce additional complexity 
  in normal driver usage scenario.</font></p>
<p><font face="Courier, monospace">//</font></p>
<p><font face="Courier, monospace">// An example of using a JDBC 2 Standard Extension 
  DataSource.</font></p>
<p><font face="Courier, monospace">// The DataSource facility provides an alternative 
  to the JDBC DriverManager,</font></p>
<p><font face="Courier, monospace">// essentially duplicating all of the driver 
  manager's useful functionality.</font></p>
<p><font face="Courier, monospace">// Although, both mechanisms may be used by 
  the same application if desired,</font></p>
<p><font face="Courier, monospace">// JavaSoft encourages developers to regard 
  the DriverManager as a legacy</font></p>
<p><font face="Courier, monospace">// feature of the JDBC API.</font></p>
<p><font face="Courier, monospace">// Applications should use the DataSource API 
  whenever possible.</font></p>
<p><font face="Courier, monospace">// A JDBC implementation that is accessed via 
  the DataSource API is not</font></p>
<p><font face="Courier, monospace">// automatically registered with the DriverManager.</font></p>
<p><font face="Courier, monospace">// The DriverManager, Driver, and DriverPropertyInfo 
  interfaces</font></p>
<p><font face="Courier, monospace">// may be deprecated in the future.</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">import org.firebirdsql.jdbc.FBWrappingDataSource;</font></p>
<p><font face="Courier, monospace">import org.firebirdsql.jca.FBConnectionRequestInfo;</font></p>
<p><font face="Courier, monospace">import org.firebirdsql.gds.ISCConstants;</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">public final class DataSourceExample</font></p>
<p><font face="Courier, monospace">{</font></p>
<p><font face="Courier, monospace">static public void main (String args[]) throws 
  Exception</font></p>
<p><font face="Courier, monospace">{</font></p>
<p><font face="Courier, monospace">// Create an Firebird data source manually;</font></p>
<p><font face="Courier, monospace">FBWrappingDataSource dataSource = new FBWrappingDataSource();</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Set the standard properties</font></p>
<p><font face="Courier, monospace">dataSource.setDatabase (&quot;localhost/3050:c:/database/employee.gdb&quot;);</font></p>
<p><font face="Courier, monospace">dataSource.setDescription (&quot;An example 
  database of employees&quot;);</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">/*</font></p>
<p><font face="Courier, monospace">* Following properties were not deleted in 
  order to show differences </font> </p>
<p><font face="Courier, monospace">* between InterClient 2.01 data source implementation 
  and Firebird one.</font></p>
<p><font face="Courier, monospace">*/</font></p>
<p><font face="Courier, monospace">//dataSource.setDataSourceName (&quot;Employee&quot;);</font></p>
<p><font face="Courier, monospace">//dataSource.setPortNumber (3060);</font></p>
<p><font face="Courier, monospace">//dataSource.setNetworkProtocol (&quot;jdbc:interbase:&quot;);</font></p>
<p><font face="Courier, monospace">//dataSource.setRoleName (null);</font></p>
<p><font face="Courier, monospace">// Set the non-standard properties</font></p>
<p><font face="Courier, monospace">//dataSource.setCharSet (interbase.interclient.CharacterEncodings.NONE);</font></p>
<p><font face="Courier, monospace">//dataSource.setSuggestedCachePages (0);</font></p>
<p><font face="Courier, monospace">//dataSource.setSweepOnConnect (false);</font></p>
<p><font face="Courier, monospace">/*</font></p>
<p><font face="Courier, monospace">* This is an example how to use FBConnectionRequestInfo 
  to specify</font></p>
<p><font face="Courier, monospace">* DPB that will be used for this data source.</font></p>
<p><font face="Courier, monospace">*/</font></p>
<p><font face="Courier, monospace">FBConnectionRequestInfo cri = dataSource.getConnectionRequestInfo();</font></p>
<p><font face="Courier, monospace">cri.setProperty(ISCConstants.isc_dpb_lc_ctype, &quot;NONE&quot;);</font></p>
<p><font face="Courier, monospace">cri.setProperty(ISCConstants.isc_dpb_num_buffers,
1);</font></p>
<p><font face="Courier, monospace">cri.setProperty(ISCConstants.isc_dpb_sql_dialect,
3);</font></p>
<p><font face="Courier, monospace">dataSource.setConnectionRequestInfo(cri);</font></p>
<p><br>
  <br>
</p>
<p><font face="Courier, monospace">// Connect to the Firebird DataSource</font></p>
<p><font face="Courier, monospace">try {</font></p>
<p><font face="Courier, monospace">dataSource.setLoginTimeout (10);</font></p>
<p><font face="Courier, monospace">java.sql.Connection c = dataSource.getConnection 
  (&quot;sysdba&quot;, &quot;masterkey&quot;);</font></p>
<p><font face="Courier, monospace">// At this point, there is no implicit driver 
  instance</font></p>
<p><font face="Courier, monospace">// registered with the driver manager!</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;got connection&quot;);</font></p>
<p><font face="Courier, monospace">c.close ();</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">catch (java.sql.SQLException e) {</font></p>
<p><font face="Courier, monospace">e.printStackTrace();</font></p>
<p><font face="Courier, monospace">System.out.println (&quot;sql exception: &quot; 
  + e.getMessage ());</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p><font face="Courier, monospace">}</font></p>
<p>&nbsp;</p>
<P ALIGN=left>&nbsp;</P>
