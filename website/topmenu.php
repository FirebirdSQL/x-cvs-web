<?php
if (eregi("topmenu.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>


<table border="0" width="100%">
<tbody>
        <tr>
        <td align="left">
        <img src="<?= $rootDir ?>images/LogoMedium3.gif" alt="" width="90" height="90" align="middle">
        <img src="<?= $rootDir ?>images/TitleBlackGill2.gif" alt="FirebirdSQL" width="310" height="50" align="middle">
        <!--img src="<?= $rootDir ?>images/fb_masthead1_lge.png" alt="FirebirdSQL" width="400"  align="middle"-->
        <!--img src="<?= $rootDir ?>images/fb_small_mhead.png" alt="FirebirdSQL"  align="middle"-->
        <br>
        </td>
        </tr>
</tbody>
</table>




