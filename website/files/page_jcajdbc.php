<?php
if (eregi("page_interclient.php",$PHP_SELF)) {
  Header("Location: index.php");
  die();
}
?>

<H4>Pure Java JCA-JDBC driver</H4>
This driver provides JCA spi functionality for direct use with JCA compliant application servers such as JBoss, as well as implementations of the JDBC Driver and DataSource interfaces. As far as we know, this driver and the Firebird database are the only open source free products implementing XA transaction support. This appears to make it the only open source solution suitable for consideration for enterprise software.<p>
Please report problems, congratulations, etc. to the <?php echo GetMailingListPageLink("lists/data/fb-java.dat") ?> lists or the firebird sourceforge bug tracker.
<UL>
<LI>1-April-2002
<A HREF="http://prdownloads.sourceforge.net/firebird/FirebirdSQL-1.0_beta_1.zip">Firebird JCA-JDBC driver 1.0 Beta1</A> (.zip) (0.78mb)</LI>
</UL>
