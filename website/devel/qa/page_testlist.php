<?php
if (eregi("page_testlist.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Tests in new Firebird Test Suite</H4>

Content:<br>
<ul>
<li><a href="#basic">Basic</a></li>
<li><a href="#database">Database</a></li>
<li><a href="#dml">DML</a></li>
<li><a href="#domain">Domain</a></li>
<li><a href="#exception">Exception</a></li>
<li><a href="#generator">Generator</a></li>
<li><a href="#index">Index</a></li>
<li><a href="#intfunc">Internal Function</a></li>
<li><a href="#procedure">Procedure</a></li>
<li><a href="#role">Role</a></li>
<li><a href="#shadow">Shadow</a></li>
<li><a href="#table">Table</a></li>
<li><a href="#trigger">Trigger</a></li>
<li><a href="#view">View</a></li>
</ul>

<a name="basic"></A><H5>Basic</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>basic.db.01</td><td>Empty DB - RDB$DATABASE content</td></tr>
<tr><td>basic.db.02</td><td>Empty DB - RDB$CHARACTER_SETS</td></tr>
<tr><td>basic.db.03</td><td>Empty DB - RDB$COLLATIONS</td></tr>
<tr><td>basic.db.04</td><td>Empty DB - RDB$EXCEPTIONS</td></tr>
<tr><td>basic.db.05</td><td>Empty DB - RDB$DEPENDENCIES</td></tr>
<tr><td>basic.db.06</td><td>Empty DB - RDB$FIELD_DIMENSIONS</td></tr>
<tr><td>basic.db.07</td><td>Empty DB - RDB$FIELDS</td></tr>
<tr><td>basic.db.08</td><td>Empty DB - RDB$FILES</td></tr>
<tr><td>basic.db.09</td><td>Empty DB - RDB$FILTERS</td></tr>
<tr><td>basic.db.10</td><td>Empty DB - RDB$FORMATS</td></tr>
<tr><td>basic.db.11</td><td>Empty DB - RDB$FUNCTION_ARGUMENTS</td></tr>
<tr><td>basic.db.12</td><td>Empty DB - RDB$FUNCTIONS</td></tr>
<tr><td>basic.db.13</td><td>Empty DB - RDB$GENERATORS</td></tr>
<tr><td>basic.db.14</td><td>Empty DB - RDB$CHECK_CONSTRAINTS</td></tr>
<tr><td>basic.db.15</td><td>Empty DB - RDB$INDEX_SEGMENTS</td></tr>
<tr><td>basic.db.15</td><td>Empty DB - RDB$INDEX_SEGMENTS</td></tr>
<tr><td>basic.db.16</td><td>Empty DB - RDB$INDICES</td></tr>
<tr><td>basic.db.17</td><td>Empty DB - RDB$LOG_FILES</td></tr>
<tr><td>basic.db.18</td><td>Empty DB - RDB$PAGES</td></tr>
<tr><td>basic.db.19</td><td>Empty DB - RDB$PROCEDURE_PARAMETERS</td></tr>
<tr><td>basic.db.20</td><td>Empty DB - RDB$PROCEDURES</td></tr>
<tr><td>basic.db.21</td><td>Empty DB - RDB$REF_CONSTRAINTS</td></tr>
<tr><td>basic.db.22</td><td>Empty DB - RDB$RELATION_CONSTRAINTS</td></tr>
<tr><td>basic.db.23</td><td>Empty DB - RDB$RELATIONS</td></tr>
<tr><td>basic.db.24</td><td>Empty DB - RDB$RELATION_FIELDS</td></tr>
<tr><td>basic.db.25</td><td>Empty DB - RDB$ROLES</td></tr>
<tr><td>basic.db.26</td><td>Empty DB - RDB$SECURITY_CLASSES</td></tr>
<tr><td>basic.db.27</td><td>Empty DB - RDB$TRANSACTIONS</td></tr>
<tr><td>basic.db.28</td><td>Empty DB - RDB$TRIGGER_MESSAGES</td></tr>
<tr><td>basic.db.29</td><td>Empty DB - RDB$TRIGGERS</td></tr>
<tr><td>basic.db.29</td><td>Empty DB - RDB$TRIGGERS</td></tr>
<tr><td>basic.db.30</td><td>Empty DB - RDB$TYPES</td></tr>
<tr><td>basic.db.31</td><td>Empty DB - RDB$USER_PRIVILEGES</td></tr>
<tr><td>basic.db.32</td><td>Empty DB - RDB$VIEW_RELATIONS</td></tr>
<tr><td>basic.isql.01</td><td>ISQL - SHOW DATABASE</td></tr>
<tr><td>basic.isql.02</td><td>ISQL - SHOW SYSTEM TABLES</td></tr>
</table>

<a name="database"></A><H5>Database</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>database.alter.01</td><td>ALTER DATABASE ADD FILE</td></tr>
<tr><td>database.alter.02</td><td>ALTER SCHEMA ADD FILE</td></tr>
<tr><td>database.alter.03</td><td>ALTER DATABASE ADD FILE - negative</td></tr>
<tr><td>database.create.01</td><td>CREATE DATABASE - simple DB</td></tr>
<tr><td>database.create.02</td><td>CREATE DATABASE - non sysdba user</td></tr>
<tr><td>database.create.03</td><td>CREATE DATABASE - PAGE SIZE 1024</td></tr>
<tr><td>database.create.04</td><td>CREATE DATABASE - PAGE SIZE 2048</td></tr>
<tr><td>database.create.05</td><td>CREATE DATABASE - PAGE SIZE 4096</td></tr>
<tr><td>database.create.06</td><td>CREATE DATABASE - PAGE SIZE 8192</td></tr>
<tr><td>database.create.07</td><td>CREATE DATABASE - PAGE SIZE 16384</td></tr>
<tr><td>database.create.08</td><td>CREATE DATABASE - Multi file DB</td></tr>
<tr><td>database.create.09</td><td>CREATE DATABASE - Multi file DB</td></tr>
<tr><td>database.create.10</td><td>CREATE DATABASE - Multi file DB - starting</td></tr>
<tr><td>database.create.11</td><td>CREATE DATABASE - Default char set NONE</td></tr>
</table>

<a name="dml"></A><H5>DML</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>dml.delete.01</td><td>DELETE</td></tr>
<tr><td>dml.delete.02</td><td>DELETE with WHERE</td></tr>
<tr><td>dml.delete.03</td><td>DELETE from VIEW</td></tr>
</table>

<a name="domain"></A><H5>Domain</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>domain.alter.01</td><td>ALTER DOMAIN - SET DEFAULT</td></tr>
<tr><td>domain.alter.02</td><td>ALTER DOMAIN - DROP DEFAULT</td></tr>
<tr><td>domain.alter.03</td><td>ALTER DOMAIN - ADD CONSTRAINT</td></tr>
<tr><td>domain.alter.04</td><td>ALTER DOMAIN - DROP CONSTRAINT</td></tr>
<tr><td>domain.alter.05</td><td>ALTER DOMAIN - Alter domain that doesn't exists</td></tr>
<tr><td>domain.create.01</td><td>CREATE DOMAIN - SMALLINT</td></tr>
<tr><td>domain.create.02</td><td>Simple domain creation based INTEGER datatype.</td></tr>
<tr><td>domain.create.03</td><td>CREATE DOMAIN - INT</td></tr>
<tr><td>domain.create.04</td><td>CREATE DOMAIN - FLOAT</td></tr>
<tr><td>domain.create.05</td><td>CREATE DOMAIN - DOUBLE PRECISION</td></tr>
<tr><td>domain.create.06</td><td>CREATE DOMAIN - DOUBLE PRECISION - ARRAY</td></tr>
<tr><td>domain.create.07</td><td>CREATE DOMAIN - DATE</td></tr>
<tr><td>domain.create.08</td><td>CREATE DOMAIN - TIME</td></tr>
<tr><td>domain.create.09</td><td>CREATE DOMAIN - TIMESTAMP</td></tr>
<tr><td>domain.create.10</td><td>CREATE DOMAIN - TIMESTAMP ARRAY</td></tr>
<tr><td>domain.create.11</td><td>CREATE DOMAIN - DECIMAL</td></tr>
<tr><td>domain.create.12</td><td>CREATE DOMAIN - DECIMAL ARRAY</td></tr>
<tr><td>domain.create.13</td><td>CREATE DOMAIN - NUMERIC</td></tr>
<tr><td>domain.create.14</td><td>CREATE DOMAIN - NUMERIC ARRAY</td></tr>
<tr><td>domain.create.15</td><td>CREATE DOMAIN - CHAR</td></tr>
<tr><td>domain.create.16</td><td>CREATE DOMAIN - CHARACTER</td></tr>
<tr><td>domain.create.17</td><td>CREATE DOMAIN - CHARACTER VARYING</td></tr>
<tr><td>domain.create.18</td><td>CREATE DOMAIN - VARCHAR</td></tr>
<tr><td>domain.create.19</td><td>CREATE DOMAIN - VARCHAR - ARRAY</td></tr>
<tr><td>domain.create.20</td><td>CREATE DOMAIN - VARCHAR CHARACTER SET</td></tr>
<tr><td>domain.create.21</td><td>CREATE DOMAIN - NCHAR</td></tr>
<tr><td>domain.create.22</td><td>CREATE DOMAIN - NATIONAL CHARACTER</td></tr>
<tr><td>domain.create.23</td><td>CREATE DOMAIN - NATIONAL CHAR</td></tr>
<tr><td>domain.create.24</td><td>CREATE DOMAIN - NATIONAL CHAR VARYING</td></tr>
<tr><td>domain.create.25</td><td>CREATE DOMAIN - NATIONAL CHAR VARYING ARRAY</td></tr>
<tr><td>domain.create.26</td><td>CREATE DOMAIN - BLOB</td></tr>
<tr><td>domain.create.27</td><td>CREATE DOMAIN - BLOB SUB TYPE</td></tr>
<tr><td>domain.create.28</td><td>CREATE DOMAIN - BLOB SUB TYPE TEXT</td></tr>
<tr><td>domain.create.29</td><td>CREATE DOMAIN - BLOB SEGMENT SIZE</td></tr>
<tr><td>domain.create.30</td><td>CREATE DOMAIN - BLOB SUB_TYPE CHARACTER SET</td></tr>
<tr><td>domain.create.31</td><td>CREATE DOMAIN - BLOB (seglen,subtype)</td></tr>
<tr><td>domain.create.32</td><td>CREATE DOMAIN - DEFAULT literal</td></tr>
<tr><td>domain.create.33</td><td>CREATE DOMAIN - DEFAULT NULL</td></tr>
<tr><td>domain.create.34</td><td>CREATE DOMAIN - DEFAULT USER</td></tr>
<tr><td>domain.create.35</td><td>CREATE DOMAIN - DEFAULT CURRENT_USER</td></tr>
<tr><td>domain.create.36</td><td>CREATE DOMAIN - DEFAULT CURRENT_ROLE</td></tr>
<tr><td>domain.create.37</td><td>CREATE DOMAIN - NOT NULL</td></tr>
<tr><td>domain.create.38</td><td>CREATE DOMAIN - CHECK</td></tr>
<tr><td>domain.create.39</td><td>CREATE DOMAIN - COLLATE</td></tr>
<tr><td>domain.create.40</td><td>CREATE DOMAIN - all options</td></tr>
<tr><td>domain.create.41</td><td>CREATE DOMAIN - create two domain with same name</td></tr>
<tr><td>domain.create.42</td><td>CREATE DOMAIN - domain name equal to existing datatype</td></tr>
<tr><td>domain.drop.01</td><td>DROP DOMAIN</td></tr>
<tr><td>domain.drop.02</td><td>DROP DOMAIN - in use</td></tr>
<tr><td>domain.drop.03</td><td>DROP DOMAIN - that doesn't exists</td></tr>
</table>

<a name="exception"></A><H5>Exception</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>exception.alter.01</td><td>ALTER EXCEPTION</td></tr>
<tr><td>exception.create.01</td><td>CREATE EXCEPTION</td></tr>
<tr><td>exception.create.02</td><td>CREATE EXCEPTION - try create Exception with the same name</td></tr>
<tr><td>exception.create.03</td><td>CREATE EXCEPTION - too long message</td></tr>
<tr><td>exception.drop.01</td><td>DROP EXCEPTION</td></tr>
<tr><td>exception.drop.02</td><td>DROP EXCEPTION</td></tr>
<tr><td>exception.drop.03</td><td>DROP EXCEPTION - that doesn't exists</td></tr>
</table>

<a name="generator"></A><H5>Generator</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>generator.create.01</td><td>CREATE GENERATOR</td></tr>
<tr><td>generator.create.02</td><td>CREATE GENERATOR - try create gen with same name</td></tr>
<tr><td>generator.drop.01</td><td>DROP GENERATOR</td></tr>
<tr><td>generator.drop.02</td><td>DROP GENERATOR - in use</td></tr>
<tr><td>generator.drop.03</td><td>DROP GENERATOR - generator does not exists</td></tr>
</table>

<a name="index"></A><H5>Index</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>index.alter.01</td><td>ALTER INDEX - INACTIVE</td></tr>
<tr><td>index.alter.02</td><td>ALTER INDEX</td></tr>
<tr><td>index.alter.03</td><td>ALTER INDEX - INACTIVE UNIQUE INDEX</td></tr>
<tr><td>index.alter.04</td><td>ALTER INDEX - INACTIVE PRIMARY KEY</td></tr>
<tr><td>index.alter.05</td><td>ALTER INDEX - INACTIVE FOREIGN KEY</td></tr>
<tr><td>index.create.01</td><td>CREATE INDEX</td></tr>
<tr><td>index.create.02</td><td>CREATE UNIQUE INDEX</td></tr>
<tr><td>index.create.03</td><td>CREATE ASC INDEX</td></tr>
<tr><td>index.create.04</td><td>CREATE ASCENDING INDEX</td></tr>
<tr><td>index.create.05</td><td>CREATE DESC INDEX</td></tr>
<tr><td>index.create.06</td><td>CREATE DESCENDING INDEX</td></tr>
<tr><td>index.create.07</td><td>CREATE INDEX - Multi column</td></tr>
<tr><td>index.create.08</td><td>CREATE INDEX - Table with data</td></tr>
<tr><td>index.create.09</td><td>CREATE UNIQUE INDEX - Table with data</td></tr>
<tr><td>index.create.10</td><td>CREATE INDEX - try create index with same name</td></tr>
<tr><td>index.create.11</td><td>CREATE UNIQUE INDEX - Non unique data in table</td></tr>
<tr><td>index.create.12</td><td>CREATE UNIQUE INDEX - Null value in table</td></tr>
</table>

<a name="intfunc"></A><H5>Internal Function</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>intfunc.avg.01</td><td>AVG from single integer row</td></tr>
<tr><td>intfunc.avg.02</td><td>AVG - Test for INTEGER</td></tr>
<tr><td>intfunc.avg.03</td><td>AVG - Test for INTEGER</td></tr>
<tr><td>intfunc.avg.04</td><td>AVG - Test for INTEGER</td></tr>
<tr><td>intfunc.avg.05</td><td>AVG - DISTINCT</td></tr>
<tr><td>intfunc.avg.06</td><td>AVG - Integer OverFlow</td></tr>
<tr><td>intfunc.avg.07</td><td>AVG - Integer with NULL</td></tr>
<tr><td>intfunc.avg.08</td><td>AVG - NULL test</td></tr>
<tr><td>intfunc.avg.09</td><td>AVG - DOUBLE PRECISION</td></tr>
<tr><td>intfunc.cast.01</td><td>CAST Numeric -> CHAR</td></tr>
<tr><td>intfunc.cast.02</td><td>CAST Numeric -> VARCHAR</td></tr>
<tr><td>intfunc.cast.03</td><td>CAST Numeric -> DATE</td></tr>
<tr><td>intfunc.cast.04</td><td>CAST Numeric -> Numeric (Round down)</td></tr>
<tr><td>intfunc.cast.05</td><td>CAST Numeric -> Numeric (Round up)</td></tr>
<tr><td>intfunc.cast.06</td><td>CAST CHAR -> INTEGER</td></tr>
<tr><td>intfunc.cast.07</td><td>CAST CHAR -> INTEGER</td></tr>
<tr><td>intfunc.cast.08</td><td>CAST CHAR -> DATE</td></tr>
<tr><td>intfunc.cast.09</td><td>CAST CHAR -> DATE</td></tr>
<tr><td>intfunc.cast.10</td><td>CAST CHAR -> TIME</td></tr>
<tr><td>intfunc.cast.11</td><td>CAST CHAR -> TIME</td></tr>
<tr><td>intfunc.cast.12</td><td>CAST CHAR -> TIME</td></tr>
<tr><td>intfunc.cast.13</td><td>CAST CHAR -> TIMESTAM</td></tr>
<tr><td>intfunc.cast.14</td><td>CAST CHAR -> TIMESTAMP</td></tr>
<tr><td>intfunc.cast.15</td><td>CAST DATE -> CHAR</td></tr>
<tr><td>intfunc.cast.16</td><td>CAST DATE -> VARCHAR</td></tr>
<tr><td>intfunc.cast.17</td><td>CAST DATE -> TIMESTAMP</td></tr>
<tr><td>intfunc.cast.18</td><td>CAST TIME -> CHAR</td></tr>
<tr><td>intfunc.cast.19</td><td>CAST TIME -> VARCHAR</td></tr>
<tr><td>intfunc.cast.20</td><td>CAST TIMESTAMP -> CHAR</td></tr>
<tr><td>intfunc.cast.21</td><td>CAST TIMESTAMP -> VARCHAR</td></tr>
<tr><td>intfunc.cast.22</td><td>CAST TIMESTAMP -> DATE</td></tr>
<tr><td>intfunc.cast.23</td><td>CAST TIMESTAMP -> TIME</td></tr>
<tr><td>intfunc.count.01</td><td>COUNT - empty</td></tr>
<tr><td>intfunc.count.02</td><td>COUNT</td></tr>
</table>

<a name="procedure"></A><H5>Procedure</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>procedure.alter.01</td><td>ALTER PROCEDURE - Simple ALTER</td></tr>
<tr><td>procedure.alter.02</td><td>ALTER PROCEDURE - Alter non exists procedure</td></tr>
<tr><td>procedure.create.01</td><td>CREATE PROCEDURE</td></tr>
<tr><td>procedure.create.02</td><td>CREATE PROCEDURE - Input parameters</td></tr>
<tr><td>procedure.create.03</td><td>CREATE PROCEDURE - Output paramaters</td></tr>
<tr><td>procedure.create.04</td><td>CREATE PROCEDURE - Output paramaters</td></tr>
<tr><td>procedure.create.05</td><td>CREATE PROCEDURE - PSQL Stataments</td></tr>
<tr><td>procedure.create.06</td><td>CREATE PROCEDURE - PSQL Stataments - SUSPEND</td></tr>
<tr><td>procedure.create.07</td><td>CREATE PROCEDURE - try create SP with same name</td></tr>
<tr><td>procedure.create.08</td><td>CREATE PROCEDURE - COMMIT in SP is not alowed</td></tr>
</table>

<a name="role"></A><H5>Role</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>role.create.01</td><td>CREATE ROLE</td></tr>
<tr><td>role.create.02</td><td>CREATE ROLE - try create role with same name</td></tr>
</table>

<a name="shadow"></A><H5>Shadow</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>shadow.create.01</td><td>CREATE SHADOW</td></tr>
<tr><td>shadow.create.02</td><td>CREATE SHADOW</td></tr>
</table>

<a name="table"></A><H5>Table</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>table.alter.01</td><td>ALTER TABLE - ADD column</td></tr>
<tr><td>table.alter.02</td><td>ALTER TABLE - ADD column (test2)</td></tr>
<tr><td>table.alter.03</td><td>ALTER TABLE - ADD CONSTRAINT - PRIMARY KEY</td></tr>
<tr><td>table.alter.04</td><td>ALTER TABLE - ADD CONSTRAINT - UNIQUE</td></tr>
<tr><td>table.alter.05</td><td>ALTER TABLE - ALTER - TO</td></tr>
<tr><td>table.alter.06</td><td>ALTER TABLE - ALTER - TYPE</td></tr>
<tr><td>table.alter.07</td><td>ALTER TABLE - ALTER - POSITION</td></tr>
<tr><td>table.alter.08</td><td>ALTER TABLE - DROP</td></tr>
<tr><td>table.alter.09</td><td>ALTER TABLE - DROP (with data)</td></tr>
<tr><td>table.alter.10</td><td>ALTER TABLE - DROP CONSTRAINT - PRIMARY KEY</td></tr>
<tr><td>table.alter.11</td><td>ALTER TABLE - DROP CONSTRAINT - UNIQUE</td></tr>
<tr><td>table.create.01</td><td>CREATE TABLE - types</td></tr>
<tr><td>table.create.02</td><td>CREATE TABLE - column properties</td></tr>
<tr><td>table.create.03</td><td>CREATE TABLE - charset + colations + domain</td></tr>
<tr><td>table.create.04</td><td>CREATE TABLE - constraints</td></tr>
<tr><td>table.create.05</td><td>CREATE TABLE - create table with same name</td></tr>
<tr><td>table.create.06</td><td>CREATE TABLE - two column with same name</td></tr>
<tr><td>table.create.07</td><td>CREATE TABLE - unknown datatype (domain)</td></tr>
</table>

<a name="trigger"></A><H5>Trigger</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>trigger.alter.01</td><td>ALTER TRIGGER - ACTIVE</td></tr>
<tr><td>trigger.alter.02</td><td>ALTER TRIGGER - INACTIVE</td></tr>
<tr><td>trigger.alter.03</td><td>ALTER TRIGGER - BEFORE DELETE</td></tr>
<tr><td>trigger.alter.04</td><td>ALTER TRIGGER - BEFORE INSERT</td></tr>
<tr><td>trigger.alter.05</td><td>ALTER TRIGGER - BEFORE UPDATE</td></tr>
<tr><td>trigger.alter.06</td><td>ALTER TRIGGER - AFTER DELETE</td></tr>
<tr><td>trigger.alter.07</td><td>ALTER TRIGGER - AFTER INSERT</td></tr>
<tr><td>trigger.alter.08</td><td>ALTER TRIGGER - POSITION</td></tr>
<tr><td>trigger.alter.09</td><td>ALTER TRIGGER - POSITION</td></tr>
<tr><td>trigger.alter.10</td><td>ALTER TRIGGER - AS</td></tr>
<tr><td>trigger.alter.11</td><td>ALTER TRIGGER - AS</td></tr>
<tr><td>trigger.alter.12</td><td>ALTER TRIGGER - AS</td></tr>
<tr><td>trigger.alter.13</td><td>ALTER TRIGGER - AS</td></tr>
<tr><td>trigger.create.01</td><td>CREATE TRIGGER</td></tr>
<tr><td>trigger.create.02</td><td>CREATE TRIGGER AFTER INSERT</td></tr>
<tr><td>trigger.create.03</td><td>CREATE TRIGGER BEFORE UPDATE</td></tr>
<tr><td>trigger.create.04</td><td>CREATE TRIGGER AFTER UPDATE</td></tr>
<tr><td>trigger.create.05</td><td>CREATE TRIGGER BEFORE DELETE</td></tr>
<tr><td>trigger.create.06</td><td>CREATE TRIGGER AFTER DELETE</td></tr>
<tr><td>trigger.create.07</td><td>CREATE TRIGGER INACTIVE AFTER DELETE</td></tr>
<tr><td>trigger.create.08</td><td>CREATE TRIGGER AFTER DELETE POSITION 12</td></tr>
<tr><td>trigger.create.09</td><td>CREATE TRIGGER BEFORE INSERT DECLARE VARIABLE</td></tr>
<tr><td>trigger.create.10</td><td>CREATE TRIGGER BEFORE INSERT DECLARE VARIABLE, block stataments</td></tr>
</table>

<a name="view"></A><H5>View</H5>

<table cellpadding="3" cellspacing="2" border="0" width="100%">
<tr bgcolor=#fa8072><td width="20%">Test ID</td><td width="80%">Title</td></tr>
<tr><td>view.create.01</td><td>CREATE VIEW</td></tr>
<tr><td>view.create.02</td><td>CREATE VIEW</td></tr>
<tr><td>view.create.03</td><td>CREATE VIEW - bad number of columns</td></tr>
<tr><td>view.create.04</td><td>CREATE VIEW - bad number of columns</td></tr>
<tr><td>view.create.05</td><td>CREATE VIEW</td></tr>
<tr><td>view.create.06</td><td>CREATE VIEW - updateable</td></tr>
<tr><td>view.create.07</td><td>CREATE VIEW - updateable WITH CHECK OPTION</td></tr>
<tr><td>view.create.08</td><td>CREATE VIEW - updateable WITH CHECK OPTION</td></tr>
</table>
<p>
<hr>
<p>
If you have any suggestion please drop us an e-mail in <a href="index.php?op=lists#fb-test">firebird-test</a> mailing list.
<p>
Back to <A href="index.php?op=devel&amp;sub=qa">Firebird QA</A>.
<p>