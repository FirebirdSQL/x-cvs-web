<?PHP

######################################################################
# PHP-NUKE: Web Portal System REVIEWS Add-on
# ==========================================
#
# Add-on Copyright (c) 2000 by Jeff Lambert (jeffx@ican.net)
# http://www.qchc.com
#
# This module is the main administration part for the reviews add-on
#
######################################################################

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/reviews.html";
$result = mysql_query("select radminreviews, radminsuper from authors where aid='$aid'");
list($radminreviews, $radminsuper) = mysql_fetch_row($result);
if (($radminreviews==1) OR ($radminsuper==1)) {

/*********************************************************/
/* REVIEWS Block Functions                               */
/*********************************************************/

function mod_main($title, $description) {
    $title = stripslashes(FixQuotes($title));
    $description = stripslashes(FixQuotes($description));
    mysql_query("update reviews_main set title='$title', description='$description'");
    Header("Location: admin.php?op=reviews");
}

function reviews()
 {
   	global $hlpfile, $admin;
	include ("header.php");
	$hlpfile = "manual/reviews.html";
	GraphicAdmin($hlpfile);
	$resultrm = mysql_query("select title, description from reviews_main");
	list($title, $description) = mysql_fetch_row($resultrm);
	OpenTable4();
	echo "
	<center>
	".translate("Reviews Page Title:")."<br>
	<form action=\"admin.php\" method=post>
	<input type=text name=\"title\" value=\"$title\" size=50 maxlength=100><br><br>
	".translate("Reviews Page Description:")."<br>
	<TEXTAREA name=\"description\" rows=15 wrap=virtual cols=60>$description</TEXTAREA><br><br>
	<input type=hidden name=op value=\"mod_main\">
	<input type=submit value=\"".translate("Save Changes")."\">
	</form></center>
	";
	CloseTable();
	echo "<br>";
	OpenTable4();
	echo "<font size=3><b>".translate("Reviews Waiting for Validation")."</b><br></font>";
	$result = mysql_query("select * from reviews_add order by id");
    $numrows = mysql_num_rows($result);
    if ($numrows>0)
	{
		while(list($id, $date, $title, $text, $reviewer, $email, $score, $url, $url_title) = mysql_fetch_row($result))
		{
		    $title = stripslashes($title);
		    $text = stripslashes($text);
			echo "<form action=admin.php method=post>";
			echo "<hr><br><table border=0 cellpadding=1 cellspacing=2>";
			echo "<tr><td><font color=Blue>".translate("Reviews_Add ID:")."</td><td><font color=Black><b>$id</b></td></tr>";
			echo "<input type=hidden name=id value=$id>";
			echo "<tr><td>".translate("Date:")."</td><td><input type=text name=date value=\"$date\" size=8 maxlength=10></td></tr>";
			echo "<tr><td>".translate("Product Title:")."</td><td><input type=text name=title value=\"$title\" size=25 maxlength=40></td></tr>";
			echo "<tr><td>".translate("Text:")."</td><td><TEXTAREA class=textbox name=text rows=6 wrap=virtual cols=40>$text</TEXTAREA></td></tr>";
			echo "<tr><td>".translate("Reviewer:")."</td><td><input type=text name=reviewer value=\"$reviewer\" size=25 maxlength=20></td></tr>";
			echo "<tr><td>".translate("Email:")."</td><td><input type=text name=email value=\"$email\" size=40 maxlength=30></td></tr>";
			echo "<tr><td>".translate("Score:")."</td><td><input type=text name=score value=\"$score\" size=3 maxlength=2></td></tr>";
			if ($url != "")
			{
				echo "<tr><td>".translate("Related Link:")."</td><td><input type=text name=url value=\"$url\" size=25 maxlength=100></td></tr>";
				echo "<tr><td>".translate("Link title:")."</td><td><input type=text name=url_title value=\"$url_title\" size=25 maxlength=50></td></tr>";
			}
			echo "<tr><td>".translate("Cover image:")."</td><td><input type=text name=cover size=25 maxlength=100><br><i>Store your 150*150 image in images/covers</i></td></tr></table>";
			echo "<input type=hidden name=op value=add_review><input type=submit value=\"Add Review\"> - [ <a href=admin.php?op=deleteNotice&id=$id&table=reviews_add&op_back=reviews>".translate("Delete this notice")."</a> ]</form><p>";
	    }
    } else {
		echo "<br>".translate("No reviews to add")."<p>";
	}
	echo "<a href=reviews.php?op=write_review>".translate("Click here to write a review.")."</a><br>";
	CloseTable();
	mysql_free_result($result);
	echo "<p>";
	OpenTable4();
		echo "<font size=3><b>".translate("Delete / Modify a review")."</b></font><p>";
		echo "".translate("You can simply delete/modify reviews by browsing")." <a href=reviews.php>reviews.php</a> ".translate("as admin.")."<br>";
	CloseTable();
    include ("footer.php");
}

function add_review($id, $date, $title, $text, $reviewer, $email, $score, $cover, $url, $url_title)
{
		$title = stripslashes(FixQuotes($title));
		$text = stripslashes(FixQuotes($text));
		$reviewer = stripslashes(FixQuotes($reviewer));
		$email = stripslashes(FixQuotes($email));
		mysql_query("insert into reviews values (NULL, '$date', '$title', '$text', '$reviewer', '$email', '$score', '$cover', '$url', '$url_title', '1')");
		mysql_query("delete from reviews_add WHERE id = $id");
		Header("Location: admin.php?op=reviews");
}

switch ($op){

		case "reviews":
		reviews();
		break;

		case "add_review":
		add_review($id, $date, $title, $text, $reviewer, $email, $score, $cover, $url, $url_title);
		break;
		
		case "mod_main":
		mod_main($title, $description);
		break;
}

} else {
    echo "Access Denied";
}
?>