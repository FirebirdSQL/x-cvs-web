<?php
if (eregi("page_testlist.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Tests in design/development</H4>

<b>Legend:</b>
<table border="0" width="100%"><tr>
<td width="10%">-</td><td>Unassigned, free for all</td>
</tr><tr>
<td width="10%">DIP</td><td>Design in progress</td>
</tr><tr>
<td width="10%">D</td><td>Design ready for implementation</td>
</tr><tr>
<td width="10%">IIP</td><td>Implementation in progress</td>
</tr><tr>
<td width="10%">I</td><td>Implemented</td>
</tr></table>
<p>
<table border="0" width="100%">
<tr class="YHeader">
  <td width="70%"><b>Statement/Area</b></td>
  <td width="10%" align="center"><b>Status</b></td>
  <td width="20%" align="center"><b>Taken by</b></td>
</tr>
<tr class="YLineB">
  <td>CREATE DATABASE</td>
  <td align="center">I</td>
  <td align="center">pcisar</td>
</tr>
<tr class="YLineA">
  <td class="indentA">Database validity</td>
  <td align="center">IIP</td>
  <td align="center">pcisar</td>
</tr>
<tr class="YLineA">
  <td class="indentA">Multifile database</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>ALTER DATABASE</td>
  <td align="center">D</td>
  <td align="center">S.Skopalik</td>
</tr>
<tr class="YLineB">
  <td>DROP DATABASE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE SHADOW</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP SHADOW</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE DOMAIN</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Default</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Check</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>ALTER DOMAIN</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Name change</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">SET/DROP DEFAULT</td>
  <td align="center">D</td>
  <td align="center">S.Skopalik</td>
</tr>
<tr class="YLineA">
  <td class="indentA">ADD/DROP CHECK</td>
  <td align="center">DIP</td>
  <td align="center">S.Skopalik</td>
</tr>
<tr class="YLineA">
  <td class="indentA">Datatype change</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP DOMAIN</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE EXCEPTION</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>ALTER EXCEPTION</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP EXCEPTION</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE GENERATOR</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>SET GENERATOR</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP GENERATOR</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE ROLE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP ROLE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE TABLE</td>
  <td align="center">DIP</td>
  <td align="center">S.Landrum</td>
</tr>
<tr class="YLineA">
  <td class="indentA">All datatypes</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Computed fields</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">With domains</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Domain override</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Field constraits</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">UNIQUE, PK and CHECK table constraints</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">REFERENCES constraints</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Search conditions</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>ALTER TABLE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">ADD column</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">ALTER column</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">DROP column</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">DROP constraint</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">ADD constraint</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP TABLE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE INDEX</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>ALTER INDEX</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP INDEX</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE VIEW</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP VIEW</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>INSERT</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DELETE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>UPDATE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>SELECT</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Simple SELECT</td>
  <td align="center">IIP</td>
  <td align="center">pcisar</td>
</tr>
<tr class="YLineA">
  <td class="indentA">FIRST/SKIP</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">DISTINCT</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Constants and expressions</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">UDF's</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">XXX</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">WHERE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">GROUP BY</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">HAVING</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">UNION</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">PLAN</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">ORDER BY</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">INNER JOIN</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">OUTER JOIN</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Complex joins</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">Sub-selects</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>AVG()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CAST()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>COUNT()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>EXTRACT()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>GEN_ID()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>MAX()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>MIN()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>SUBSTRING()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>SUM()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>UPPER()</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>Character sets</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>Collation orders</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>SET STATISTICS</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE TRIGGER</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>ALTER TRIGGER</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP TRIGGER</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>CREATE PROCEDURE</td>
  <td align="center">DIP</td>
  <td align="center">M.Popa</td>
</tr>
<tr class="YLineB">
  <td>ALTER PROCEDURE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>DROP PROCEDURE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>GRANT</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineB">
  <td>REVOKE</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>

<!--

<tr class="YLineB">
  <td>XXX</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
<tr class="YLineA">
  <td class="indentA">XXX</td>
  <td align="center">-</td>
  <td align="center"></td>
</tr>
-->

</table>
<p>
If you have any suggestion please drop us an e-mail in <a href="index.php?op=lists#fb-test">firebird-test</a> mailing list.</p>
<p>
Back to <A href="index.php?op=devel&amp;sub=qa">Firebird QA</A>.
<p>