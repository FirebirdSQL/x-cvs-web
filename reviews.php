<?PHP

######################################################################
# PHP-NUKE: Web Portal System REVIEWS
# ===================================
#
# Copyright (c) 2000 by Jeff Lambert (jeffx@ican.net)
# view example on http://www.qchc.com
# download more scripts on http://www.jeffx.qchc.com
#
# This module is for displaying, adding, deleting and modifying REVIEWS
# Please read the included Install.txt for more info
# Top 5 lists info is on line 310
#
######################################################################

if (!IsSet($mainfile)) { include ('mainfile.php'); }

function alpha() { 
        $alphabet = array ("A","B","C","D","E","F","G","H","I","J","K","L","M",
                            "N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0");
        $num = count($alphabet) - 1;
        echo "<center>[ ";
        $counter = 0;
        while (list(, $ltr) = each($alphabet)) {
            echo "<A HREF=\"reviews.php?op=$ltr\">$ltr</a>";
            if ( $counter == round($num/2) ) {
                echo " ]\n<br>\n[ "; 
            } elseif ( $counter != $num ) {
                echo "&nbsp;|&nbsp;\n";
            }
            $counter++;
        }
        echo " ]<br><br>\n\n\n";
	echo "[ <a href=reviews.php?op=write_review>".translate("Write a Review")."</a> ]<br><br>\n\n";
}

function display_score($score)
{
	$image = "<img src=images/blue.gif>";
	$halfimage = "<img src=images/bluehalf.gif>";
	$full = "<img src=images/star.gif>";

	if ($score == 10)
	{
		for ($i=0; $i < 5; $i++)
			echo "$full";
	}
	else if ($score % 2)
	{
		$score -= 1;
		$score /= 2;
		for ($i=0; $i < $score; $i++)
			echo "$image";
		echo "$halfimage";
	}
	else
	{
		$score /= 2;
		for ($i=0; $i < $score; $i++)
			echo "$image";
	}
}

function write_review()
{
	global $admin, $sitename, $user, $cookie;
	
	include ('header.php');
	OpenTable4();
	echo "
	<b>".translate("Write a Review for")." $sitename</b><br><br>
	<i>".translate("Please enter information according to the specifications")."</i><br><br>
	<form method=POST action=reviews.php>
	<b>".translate("Product Title").":</b><br>
	<input type=text name=title size=50 maxlength=150><br>
	<i>".translate("Name of the Reviewed Product.")."</i><br><br>
	<b>".translate("Review").":</b><br>
	<TEXTAREA class=textbox name=text rows=15 wrap=virtual cols=60></TEXTAREA><br>
	<i>".translate("Your actual review. Please observe proper grammar! Make it at least 100 words, OK? You may also use HTML tags if you know how to use them.")."</i><br><br>
	<b>".translate("Your name").":</b><br>";
	if ($user) {
	    $result=mysql_query("select name, email from users where uname='$cookie[1]'");
	    list($name, $email) = mysql_fetch_row($result);
	}
	echo "<input type=text name=reviewer size=40 maxlength=20 value=$name><br>
	<i>".translate("Your Full Name. Required.")."</i><br><br>
	<b>".translate("Your email").":</b><br>
	<input type=text name=email size=40 maxlength=30 value=$email><br>
	<i>".translate("Your E-mail address. Required.")."</i><br><br>
	<b>".translate("Score").":</b><br>
	<select name=score>
	<option name=score value=10>10</option>
	<option name=score value=9>9</option>
	<option name=score value=8>8</option>
	<option name=score value=7>7</option>
	<option name=score value=6>6</option>
	<option name=score value=5>5</option>
	<option name=score value=4>4</option>
	<option name=score value=3>3</option>
	<option name=score value=2>2</option>
	<option name=score value=1>1</option>
	</select>
	<i>".translate("Select from 1=poor to 10=excelent.")."</i><br><br>
	<b>".translate("Related Link").":</b><br>
	<input type=text name=url size=40 maxlength=100 value=\"http://\"><br>
	<i>".translate("Product Official Website. Make sure your URL starts by")." \"http://\".</i><br><br>
	<b>".translate("Link title").":</b><br>
	<input type=text name=url_title size=40 maxlength=50><br>
	<i>".translate("Required if you have a related link, otherwise not required.")."</i><br><br>
	";
	if(isset($admin))
	{
		echo "
		<b>".translate("Image filename").":</b><br>
		<input type=text name=cover size=40 maxlength=100><br>
		<i>".translate("Name of the cover image, located in images/reviews/. Not required.")."</i><br><br>
		";
	}
	echo "<i>".translate("Please make sure that the information entered is 100% valid and uses proper grammar and capitalization. For instance, please do not enter your text in ALL CAPS, as it will be rejected.")."</i><br><br>";
	echo "<input type=hidden name=op value=preview_review><input type=submit value=\"Preview!\"> <input type=button onClick=history.go(-1) value=Cancel!></form>";
	CloseTable();
	include ("footer.php");
}

function preview_review($date, $title, $text, $reviewer, $email, $score, $cover, $url, $url_title, $hits, $id)
{
	global $admin;
	$title = stripslashes(check_html($title, "nohtml"));
	$text = stripslashes(check_html($text, ""));
	$reviewer = stripslashes(check_html($reviewer, "nohtml"));
	$url_title = stripslashes(check_html($url_title, "nohtml"));

	include ('header.php');
	OpenTable3();
	echo "<form method=post action=reviews.php>";
	
	if ($title == "")
	{
		$error = 1;
		echo "".translate("Invalid Title... can not be blank")."<br>";
	}

	if ($text == "")
	{
		$error = 1;
		echo "".translate("Invalid review text... can not be blank")."<br>";
	}

	if (($score < 1) || ($score > 10))
	{
		$error = 1;
		echo "".translate("Invalid score... must be between 1 and 10")."<br>";
	}

	if (($hits < 0) && ($id != 0))
	{
		$error = 1;
		echo "".translate("Hits must be a positive integer")."<br>";
	}

	if ($reviewer == "" || $email == "")
	{
		$error = 1;
		echo "".translate("You must enter both your name and your email")."<br>";
	} else if ($reviewer != "" && $email != "")
		if (!(eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$",$email)))
		{
			$error = 1; //eregi checks for a valid email! works nicely for me!
			echo "".translate("Invalid email (eg: you@hotmail.com)")."<br>";
		}
	
	if (($url_title != "" && $url =="") || ($url_title == "" && $url != ""))
	{
		$error = 1;
		echo "".translate("You must enter BOTH a link title and a related link or leave both blank")."<br>";
	} else if (($url != "") && (!(eregi('(^http[s]*:[/]+)(.*)', $url))))
		$url = "http://" . $url; //If the user ommited the http, this nifty eregi will add it

	if ($error == 1)
		echo "<br><input type=button onClick=history.go(-1) value=\"Go back!\">";
	else
	{
		if ($date == "")
			$date = date("Y-m-d", time());
		$year2 = substr($date,0,4);
		$month = substr($date,5,2);
		$day = substr($date,8,2);
		$fdate = date("F jS Y",mktime (0,0,0,$month,$day,$year2));

		echo "<TABLE BORDER=0 WIDTH=100%><TR><TD COLSPAN=2>";
		echo "<p><i><b><font size = 4>$title</b></i></font><br>";
		echo "<BLOCKQUOTE><p>";
		if ($cover != "")
			echo "<img src=images/reviews/$cover align=right border=1 vspace=2>";
		echo "$text<p>";
		echo "<b>".translate("Added:")."</b> $fdate<br>";
		echo "<b>".translate("Reviewer:")."</b> <a href=mailto:$email>$reviewer</a><br>";
		echo "<b>".translate("Score:")."</b> ";
		display_score($score);
		if ($url != "")
			echo "<br><b>".translate("Related Link").":</b> <a href=\"$url\" target=new>$url_title</a>";
		if ($id != 0)
		{
			echo "<br><b>".translate("Review ID").":</b> $id<br>";
			echo "<b>".translate("Hits").":</b> $hits<br>";
		}
		echo "</font></BLOCKQUOTE>";
		echo "</TD></TR></TABLE>";
		$text = urlencode($text);
		echo "<p><i>".translate("Does this look right?")." </i>";
		echo "<input type=hidden name=id value=$id>
		      <input type=hidden name=hits value=\"$hits\">
		      <input type=hidden name=op value=send_review>
		      <input type=hidden name=date value=\"$date\">
		      <input type=hidden name=title value=\"$title\">
		      <input type=hidden name=text value=\"$text\">
		      <input type=hidden name=reviewer value=\"$reviewer\">
		      <input type=hidden name=email value=\"$email\">
		      <input type=hidden name=score value=\"$score\">
		      <input type=hidden name=url value=\"$url\">
		      <input type=hidden name=url_title value=\"$url_title\">
		      <input type=hidden name=cover value=\"$cover\">
		      <input type=submit name=op value=Yes> <input type=button onClick=history.go(-1) value=No!>";
		if($id != 0)
			$word = "".translate("modified")."";
		else
			$word = "".translate("added")."";
		if(isset($admin))
			echo "<br><br><b>".translate("Note:")."</b> ".translate("Currently logged in as admin... this review will be")." $word ".translate("immediately").".";
	}
	echo "</td></tr></table></center></td></tr></table>";
	include ("footer.php");
}

function send_review($date, $title, $text, $reviewer, $email, $score, $cover, $url, $url_title, $hits, $id)
{
	global $admin, $EditedMessage;
	include ('header.php');
	$title = stripslashes(FixQuotes(check_html($title, "nohtml")));
	$text = stripslashes(Fixquotes(urldecode(check_html($text, ""))));
	OpenTable3();
	
	echo "<br><center>".translate("Thanks for submitting this review")."";
	if ($id != 0)
		echo " ".translate("modification")."";
	else
		echo ", $reviewer";
	echo "!<br>";
	if ((isset($admin)) && ($id == 0))
	{
		mysql_query("INSERT INTO reviews VALUES (NULL, '$date', '$title', '$text', '$reviewer', '$email', '$score', '$cover', '$url', '$url_title', '1')");
		echo "".translate("It is now available in the reviews database.")."";
	}
	else if (($admin) && ($id != 0))
	{
		mysql_query("UPDATE reviews SET date='$date', title='$title', text='$text', reviewer='$reviewer', email='$email', score='$score', cover='$cover', url='$url', url_title='$url_title', hits='$hits' where id = $id");
		echo "".translate("It is now available in the reviews database.")."";
	}
	else
	{
		mysql_query("INSERT INTO reviews_add VALUES (NULL, '$date', '$title', '$text', '$reviewer', '$email', '$score', '$url', '$url_title')");
		echo "".translate("The editors will look at your submission. It should be available soon!")."";
	}
	echo "<br><br>[ <a href=\"reviews.php\">".translate("Back to Reviews Index")."</a> ]<br></center>";
	CloseTable();
	include ("footer.php");
}

function reviews_index()
{
	include ('header.php');
	global $bgcolor4, $bgcolor2;
	OpenTable3();	
	echo "<table border=0 width=95% CELLPADDING=2 CELLSPACING=4 align=center>
	<tr><td colspan=2><center><font size = 4><p align=center>".translate("Welcome to Reviews Section")."</font><br><br><br>";
	$result = mysql_query("select title, description from reviews_main");
	list($title, $description) = mysql_fetch_row($result);
	OpenTable4();
	echo "<center><b>$title</b><br><br>$description</center>";
	CloseTable();
	echo "<br><br><br>";
	$result = mysql_query("select title, description from reviews_main");
	list($title, $description) = mysql_fetch_row($result);
	
	
	alpha();
	
	echo "</td></tr>";
	echo "<tr><TD WIDTH=50% BGCOLOR=$bgcolor2><b>".translate("10 most popular reviews")."</td>";
	echo "<TD WIDTH=50% BGCOLOR=$bgcolor2><b>".translate("10 most recent reviews")."</td></tr>";

	$result_pop = mysql_query("select id, title, hits from reviews order by hits DESC limit 10");
	$result_rec = mysql_query("select id, title, date, hits from reviews order by date DESC limit 10");
	$y = 1;

	for ($x = 0; $x < 10; $x++)
	{
		$myrow=mysql_fetch_array($result_pop);
		$id = $myrow["id"];
		$title = $myrow["title"];
		$hits = $myrow["hits"];
		echo "<tr><td width=50% BGCOLOR=$bgcolor4>$y) <a href=reviews.php?op=showcontent&id=$id>$title</a></td>";

		$myrow=mysql_fetch_array($result_rec);

		$id = $myrow["id"];
		$title = $myrow["title"];
		$hits = $myrow["hits"];
		echo "<td width=50% BGCOLOR=$bgcolor4>$y) <a href=reviews.php?op=showcontent&id=$id>$title</a></td></tr>";
		$y++;

	}
	echo "<tr><td colspan = 2><br></td></tr>";
	
	// THIS IS WHERE YOU CHANGE NAMES TO GET TOP 5 TO APPEAR ON YOUR PAGE
	// Refer to install.txt for more info
	// Don't forget to uncomment the lines!
	//
	//top5(Jeff, Shane);
	//echo "<tr></tr>";
	//top5(XdesilX, MAT);

	$result = mysql_query("SELECT * FROM reviews");
	$numresults = mysql_numrows($result);
	echo "<tr><td colspan = 2><br><center>".translate("There are")." $numresults ".translate("reviews in the database")."</center></td></tr></table>";
	
	// memory flush
	mysql_free_result($result_pop);
	mysql_free_result($result_rec);
	mysql_free_result($result);
	
	CloseTable();
	include ("footer.php");
}

function reviews($letter, $field, $order) {
	global $bgcolor4, $sitename;
	include ('header.php');
	OpenTable();
	echo "<center><b>$sitename ".translate("Reviews")."</b><br>";
	echo "<i>".translate("Reviews for letter")." \"$letter\"</i><br><br>";
	switch ($field)
	{
	
		case "reviewer":
		$result = mysql_query("SELECT id, title, hits, reviewer, score FROM reviews WHERE UPPER(title) LIKE '$letter%' ORDER by reviewer $order");
		break;

		case "score":
		$result = mysql_query("SELECT id, title, hits, reviewer, score FROM reviews WHERE UPPER(title) LIKE '$letter%' ORDER by score $order");
		break;

		case "hits":
		$result = mysql_query("SELECT id, title, hits, reviewer, score FROM reviews WHERE UPPER(title) LIKE '$letter%' ORDER by hits $order");
		break;

		default:
		$result = mysql_query("SELECT id, title, hits, reviewer, score FROM reviews WHERE UPPER(title) LIKE '$letter%' ORDER by title $order");
		break;
	}	
	$numresults = mysql_numrows($result);
	
	if ($numresults == 0)
	{
		echo "<i><b>".translate("There isn't any Review for letter")." \"$letter\"</b></i><br><br>";
	}
	elseif ($numresults > 0)
	{

	echo "<TABLE BORDER=0 WIDTH=100% CELLPADDING=2 CELLSPACING=4>
			<TR>
				<TD width=50% BGCOLOR=$bgcolor4>
					<P ALIGN=LEFT><a href=reviews.php?op=$letter&field=title&order=ASC><img src=images/download/up.gif border=0 width=15 height=9 Alt=\"Sort Ascending\"></a><B> Product Title </B><a href=reviews.php?op=$letter&field=title&order=DESC><img src=images/download/down.gif border=0 width=15 height=9 Alt=\"".translate("Sort Descending")."\"></a>
				</TD>
				<TD WIDTH=18% BGCOLOR=$bgcolor4>
					<P ALIGN=CENTER><a href=reviews.php?op=$letter&field=reviewer&order=ASC><img src=images/download/up.gif border=0 width=15 height=9 Alt=\"Sort Ascending\"></a><B> Reviewer </B><a href=reviews.php?op=$letter&field=reviewer&order=desc><img src=images/download/down.gif border=0 width=15 height=9 Alt=\"".translate("Sort Descending")."\"></a>
				</TD>
				<TD WIDTH=18% BGCOLOR=$bgcolor4>
					<P ALIGN=CENTER><a href=reviews.php?op=$letter&field=score&order=ASC><img src=images/download/up.gif border=0 width=15 height=9 Alt=\"Sort Ascending\"></a><B> Score </B><a href=reviews.php?op=$letter&field=score&order=DESC><img src=images/download/down.gif border=0 width=15 height=9 Alt=\"".translate("Sort Descending")."\"></a>
				</TD>
				<TD WIDTH=14% BGCOLOR=$bgcolor4>
					<P ALIGN=CENTER><a href=reviews.php?op=$letter&field=hits&order=ASC><img src=images/download/up.gif border=0 width=15 height=9 Alt=\"Sort Ascending\"></a><B> Hits </B><a href=reviews.php?op=$letter&field=hits&order=DESC><img src=images/download/down.gif border=0 width=15 height=9 Alt=\"".translate("Sort Descending")."\"></a>
				</TD>
			</TR>";

		while($myrow=mysql_fetch_array($result))
			{
				$title = $myrow["title"];
				$id = $myrow["id"];
				$reviewer = $myrow["reviewer"];
				$email = $myrow["email"];
				$score = $myrow["score"];
				$hits = $myrow["hits"];
				echo "<TR>
				<TD WIDTH=50% BGCOLOR=#EEEEEE><a href=reviews.php?op=showcontent&id=$id>$title</a></TD>
				<TD WIDTH=18% BGCOLOR=#EEEEEE>";
				if ($reviewer != "")
					echo "<center>$reviewer</center>";
				echo "</TD><TD WIDTH=18% BGCOLOR=#EEEEEE><center>";
				display_score($score);
				echo "</center></TD><TD WIDTH=14% BGCOLOR=#EEEEEE><center>$hits</center></TD>
				</TR>";
			}
		echo "</TABLE>";
		echo "<br>$numresults ".translate("Total Review(s) found.")."<br><br>";
	}
	echo "[ <a href=reviews.php>".translate("Return to Main Menu")."</a> ]";
	
	// memory flush
	mysql_free_result($result);
	CloseTable();
	include ("footer.php");
}

function postcomment($id, $title) {
    global $user, $cookie, $AllowableHTML;
    include("header.php");
    $title = urldecode($title);
    OpenTable();
    echo "<center><font size=3><b>".translate("Comment on the Review:")." $title</b><br><br></font></center>
    <form action=reviews.php method=post>
    ";
    if (!$user) {
	echo "<b>".translate("Your Nickname:")."</b> ".translate("Anonymous")." [ <a href=user.php>".translate("Create</a> an account")." ]<br><br>";
	$cookie[1] = "Anonymous";
    } else {
	echo "<b>".translate("Your Nickname:")."</b> $cookie[1]<br>
	<input type=checkbox name=anonpost> ".translate("Post Anonymously")."<br><br>";
    }
    echo "
    <input type=hidden name=uname value=$cookie[1]>
    <input type=hidden name=id value=$id>
    <b>".translate("This Product Score:")."</b>
    <select name=score>
    <option name=score value=10>10</option>
    <option name=score value=9>9</option>
    <option name=score value=8>8</option>
    <option name=score value=7>7</option>
    <option name=score value=6>6</option>
    <option name=score value=5>5</option>
    <option name=score value=4>4</option>
    <option name=score value=3>3</option>
    <option name=score value=2>2</option>
    <option name=score value=1>1</option>
    </select><br><br>
    <b>".translate("Your Comment:")."</b><br>
    <textarea name=comments rows=10 cols=70></textarea><br>
    ".translate("Allowed HTML:")."<br>";
    while (list($key,)= each($AllowableHTML)) echo " &lt;".$key."&gt;";
    echo "<br><br>
    <input type=hidden name=op value=savecomment>
    <input type=submit value=Submit>
    </form>
    ";
    CloseTable();
    include("footer.php");
}

function savecomment($anonpost, $uname, $id, $score, $comments) {
    if (!$anonpost) {
	$a = $uname;
    } else {
	$uname = "Anonymous";
    }
    $comments = stripslashes(FixQuotes(check_html($comments)));

    mysql_query("insert into reviews_comments values (NULL, '$id', '$uname', now(), '$comments', '$score')");
    Header("Location: reviews.php?op=showcontent&id=$id");
}

function r_comments($id, $title) {
    global $admin;
    $result = mysql_query("select cid, userid, date, comments, score from reviews_comments where rid='$id'");
    while(list($cid, $uname, $date, $comments, $score) = mysql_fetch_row($result)) {
	OpenTable();
	$title = urldecode($title);
	echo "
	<b>$title</b><br>";
	if ($uname == "Anonymous") {
	    echo "".translate("Posted by")." $uname ".translate("on")." $date<br>";
	} else {
	    echo "".translate("Posted by")." <a href=user.php?op=userinfo&uname=$uname>$uname</a> ".translate("on")." $date<br>";
	}
	echo "".translate("My Score:")." ";
	display_score($score);
	if ($admin) {
	    echo "<br><b>".translate("Admin:")."</b> [ <a href=reviews.php?op=del_comment&cid=$cid&id=$id>".translate("Delete")."</a> ]</font><hr noshade size=1><br><br>";
	} else {
	    echo "</font><hr noshade size=1><br><br>";
	}    
	$comments = FixQuotes(nl2br(filter_text($comments)));
	echo "
	$comments
	";
	CloseTable();
	echo "<br>";
    }
}

function showcontent($id)
{
	global $admin, $uimages;
	include ('header.php');
	
	OpenTable();
	mysql_query("UPDATE reviews SET hits=hits+1 WHERE id=$id");
	$result = mysql_query("SELECT * FROM reviews WHERE id=$id");

	echo "<center><TABLE BORDER=0 CELLPADDING=3 CELLSPACING=3 WIDTH=95%><TR><TD WIDTH=100%><P>";

	$myrow =  mysql_fetch_array($result);
	$id =  $myrow["id"];
	$date = $myrow["date"];
	$year = substr($date,0,4);
	$month = substr($date,5,2);
	$day = substr($date,8,2);
	$fdate = date("F jS Y",mktime (0,0,0,$month,$day,$year));
	$title = $myrow["title"];
	$text = $myrow["text"];
	$cover = $myrow["cover"];
	$reviewer = $myrow["reviewer"];
	$email = $myrow["email"];
	$hits = $myrow["hits"];
	$url = $myrow["url"];
	$url_title = $myrow["url_title"];
	$score = $myrow["score"];
	
	echo "<p><i><b><font size = 4>$title</b></i></font><br>";
	echo "<BLOCKQUOTE><p align=justify>";
	if ($cover != "")
	echo "<img src=\"images/reviews/$cover\" align=right border=1 vspace=2>";
	echo "$text</BLOCKQUOTE><p>";
	if ($admin)
		echo "<b>".translate("Admin:")."</b> [ <a href=\"reviews.php?op=mod_review&id=$id\">".translate("Edit")."</a> | <a href=reviews.php?op=del_review&id_del=$id>".translate("Delete")."</a> ]<br>";
	echo "<b>".translate("Added:")."</b> $fdate<br>";
	if ($reviewer != "")
	echo "<b>".translate("Reviewer:")."</b> <a href=mailto:$email>$reviewer</a><br>";
	if ($score != "")
	echo "<b>".translate("Score:")."</b> ";
	display_score($score);
	if ($url != "")
		echo "<br><b>".translate("Related Link:")."</b> <a href=\"$url\" target=new>$url_title</a>";
	echo "<br><b>".translate("Hits:")."</b> $hits";
	echo "</font>";
	echo "</TD></TR></TABLE>";
	echo "</CENTER>";

	// memory flush
	mysql_free_result($result);
	$title = urlencode($title);
	echo "<br><br><center><a href=\"reviews.php?op=postcomment&id=$id&title=$title\"><img src=\"$uimages/comment.gif\" border=0></a><br><br><b>[ <a href=reviews.php>".translate("Back to Reviews Index")."</a> ]</b></center>";
	CloseTable();
	echo "<br>";
	r_comments($id, $title);
	include ("footer.php");
}

function mod_review($id) {
	global $admin;
	include ('header.php');
	OpenTable();
	if (($id == 0) || (!($admin)))
	    echo "This function must be passed argument id, or you are not admin.";
	else if (($id != 0) && ($admin))
	{
		$result = mysql_query("select * from reviews where id = $id");
		while($myrow =  mysql_fetch_array($result))
		{   
			$id =  $myrow["id"];
			$date = $myrow["date"];
			$title = $myrow["title"];
			$text = $myrow["text"];
			$cover = $myrow["cover"];
			$reviewer = $myrow["reviewer"];
			$email = $myrow["email"];
			$hits = $myrow["hits"];
			$url = $myrow["url"];
			$url_title = $myrow["url_title"];
			$score = $myrow["score"];
		}
		echo "<center><b>".translate("Review Modification")."</b></center><br><br>";
		echo "<form method=POST action=reviews.php?op=preview_review><input type=hidden name=id value=$id>";
		echo "<TABLE BORDER=0 WIDTH=100%>
			<TR>
				<TD WIDTH=12%><b>".translate("Date:")."</b></TD>
				<TD><INPUT TYPE=text NAME=date SIZE=15 VALUE=\"$date\" MAXLENGTH=10></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Title:")."</b></TD>
				<TD><INPUT TYPE=text NAME=title SIZE=50 MAXLENGTH=150 value=\"$title\"></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Text:")."</b></TD>
				<TD><TEXTAREA class=textbox name=text rows=20 wrap=virtual cols=60>$text</TEXTAREA></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Reviewer:")."</b></TD>
				<TD><INPUT TYPE=text NAME=reviewer SIZE=30 MAXLENGTH=20 value=\"$reviewer\"></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Email:")."</b></TD>
				<TD><INPUT TYPE=text NAME=email value=\"$email\" SIZE=30 MAXLENGTH=20></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Score:")."</b></TD>
				<TD><INPUT TYPE=text NAME=score value=\"$score\" size=3 maxlength=2></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Link:")."</b></TD>
				<TD><INPUT TYPE=text NAME=url value=\"$url\" size=30 maxlength=100></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Link title:")."</b></TD>
				<TD><INPUT TYPE=text NAME=url_title value=\"$url_title\" size=30 maxlength=50></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Cover image:")."</b></TD>
				<TD><INPUT TYPE=text NAME=cover value=\"$cover\" size=30 maxlength=100></TD>
			</TR>
			<TR>
				<TD WIDTH=12%><b>".translate("Hits:")."</b></TD>
				<TD><INPUT TYPE=text NAME=hits value=\"$hits\" size=5 maxlength=5></TD>
			</TR>
		</TABLE>";
		echo "<input type=hidden name=op value=preview_review><input type=submit value=\"".translate("Preview Modifications")."\">&nbsp;&nbsp;<input type=button onClick=history.go(-1) value=".translate("Cancel")."></form>";
		// memory flush
		mysql_free_result($result);
	}
	CloseTable();
	include ("footer.php");
}

function del_review($id_del)
{
	global $admin;
	if ($admin)
	{
		mysql_query("delete from reviews where id = $id_del");
		mysql_query("delete from reviews_comments where rid='$id_del'");
		Header("Location: reviews.php");
	} else
		echo "ACCESS DENIED";
}

function del_comment($cid, $id) {
	global $admin;
	if ($admin) {
	    mysql_query("delete from reviews_comments where cid='$cid'");
	    Header("Location: reviews.php?op=showcontent&id=$id");
	} else {
	    echo "ACCESS DENIED";
	}
}

switch($op) {

	case "A":
	reviews(A, $field, $order);
	break;

	case "B":
	reviews(B, $field, $order);
	break;

	case "C":
	reviews(C, $field, $order);
	break;

	case "D":
	reviews(D, $field, $order);
	break;

	case "E":
	reviews(E, $field, $order);
	break;

	case "F":
	reviews(F, $field, $order);
	break;
	
	case "G":
	reviews(G, $field, $order);
	break;
	
	case "H":
	reviews(H, $field, $order);
	break;
		
	case "I":
	reviews(I, $field, $order);
	break;	

	case "J":
	reviews(J, $field, $order);
	break;
		
	case "K":
	reviews(K, $field, $order);
	break;
	
	case "L":
	reviews(L, $field, $order);
	break;
	
	case "M":
	reviews(M, $field, $order);
	break;
	
	case "N":
	reviews(N, $field, $order);
	break;
	
	case "O":
	reviews(O, $field, $order);
	break;
		
	case "P":
	reviews(P, $field, $order);
	break;
	
	case "Q":
	reviews(Q, $field, $order);
	break;
		
	case "R":
	reviews(R, $field, $order);
	break;
		
	case "S":
	reviews(S, $field, $order);
	break;
		
	case "T":
	reviews(T, $field, $order);
	break;
	
	case "U":
	reviews(U, $field, $order);
	break;
		
	case "V":
	reviews(V, $field, $order);
	break;
		
	case "W":
	reviews(W, $field, $order);
	break;
		
	case "X":
	reviews(X, $field, $order);
	break;

	case "Y":
	reviews(Y, $field, $order);
	break;

	case "Z":
	reviews(Z, $field, $order);
	break;
		
	case "1":
	reviews(1, $field, $order);
	break;

	case "2":
	reviews(2, $field, $order);
	break;

	case "3":
	reviews(3, $field, $order);
	break;

	case "4":
	reviews(4, $field, $order);
	break;

	case "5":
	reviews(5, $field, $order);
	break;

	case "6":
	reviews(6, $field, $order);
	break;

	case "7":
	reviews(7, $field, $order);
	break;

	case "8":
	reviews(8, $field, $order);
	break;

	case "9":
	reviews(9, $field, $order);
	break;

	case "showcontent":
	showcontent($id);
	break;

	case "write_review":
	write_review();
	break;

	case "preview_review":
	preview_review($date, $title, $text, $reviewer, $email, $score, $cover, $url, $url_title, $hits, $id);
	break;

	case "Yes":
	send_review($date, $title, $text, $reviewer, $email, $score, $cover, $url, $url_title, $hits, $id);
	break;

	case "del_review":
	del_review($id_del);
	break;

	case "mod_review":
	mod_review($id);
	break;

	case "postcomment":
	postcomment($id, $title);
	break;

	case "savecomment":
	savecomment($anonpost, $uname, $id, $score, $comments);
	break;
	
	case "del_comment":
	del_comment($cid, $id);
	break;

	default:
	reviews_index();
	break;
}
?>