<?php

if (eregi("page_odbcff200409.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>
<table width="85%">

  <tr>
    <td class="centre" colspan=2>
<h4>Developer's Report for September 2004</h4>
    </td>
  <tr>
  <tr>
    <td>Project:
    </td>
    <td><h5>Firebird ODBC Driver</h5>
    </td>
  </tr>
  <tr>
    <td>Developer: 
    </td>
    <td>Vladimir Tsvigun
    </td> 
  </tr>
  <tr> 
    <td colspan=2>
<hr size=1>
Work on the new v1-3-beta version has begun.
<p>
Driver now intercepts the keywords COMMIT and ROLLBACK and executes them on the client through SQLEndTran.
<p>
Added resource Config DSN Dialog for en, es, it, ru, uk
<p>
Added resource Access Dialog for en, es, it, ru, uk
<p>
Added HTMLHelp translations for Portuguese and Spanish
<p>
Proceeding with translation of HTMLHelp into Russian and Ukrainian languages
<p>
<h4>Next big objective</h4>
Add Unicode and Microsoft tabular data control (TDC).  There will be a new v2.0 branch for these features.

<p>
<i>Vladimir Tsvigun<br>
Khmelnitskiy, Ukraine</i>
<hr size=1>
    </td>
  </tr>
</table>
<!-- ------------------------------------------- -->
    </td>
  </tr>
</table>
<p>
Back to <A href="index.php?op=devel&sub=odbc">ODBC page</A>
<p>
