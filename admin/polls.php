<?PHP

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
$hlpfile = "manual/surveys.html";
$result = mysql_query("select radminsurvey, radminsuper from authors where aid='$aid'");
list($radminsurvey, $radminsuper) = mysql_fetch_row($result);
if (($radminsurvey==1) OR ($radminsuper==1)) {

/*********************************************************/
/* Poll/Surveys Functions                                */
/*********************************************************/

function poll_createPoll() {
	global $language, $hlpfile, $admin, $maxOptions;
	include ('header.php');
	GraphicAdmin($hlpfile);
	OpenTable4();
	?>
	<font size=4><b><center><?php echo translate("Create new poll"); ?><br></font>
	<font size=2><a href=admin.php?op=remove><?php echo translate("Delete Polls"); ?></a><br><br></font></center>
	<form action="admin.php" method="post">
	<input type="hidden" name="op" value="createPosted">
	<p><?php echo translate("Polltitle"); ?>: <input class=textbox type=text name="pollTitle" size=50 maxlength=100></p>
	<p><?php echo translate("Please enter each available option into a single field"); ?></p>
	<table>
	<?PHP
	for($i = 1; $i <= $maxOptions; $i++)
	{
		echo "<tr>";
		echo "<td>".translate("Option")." $i:</td><td><input class=textbox type=text name=\"optionText[$i]\" size=50 maxlength=50></td>";
		echo "</tr>";
	}

	echo "</tr></table>";
	echo "<input type=\"submit\" value=\"".translate("Create")."\">";
	echo "</form></td></tr></table></td></tr></table>";
	include ('footer.php');
}

function old_poll_createPosted() {
	global $maxOptions, $pollTitle, $optionText;
	$timeStamp = time();
	$result = mysql_query("INSERT INTO poll_desc VALUES (NULL, '$pollTitle', '$timeStamp')");
	if (!$result)	{
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		return;
	}
	mysql_free_result($result);

	// create option records in data table
	for($i = 1; $i <= $maxOptions; $i++) {
		if($optionText[$i] != "")
			$result = mysql_query("INSERT INTO poll_data VALUES ($id, '$optionText[$i]', 0, $i)");
			if (!result) {
				echo mysql_errno(). ": ".mysql_error(). "<br>";
				return;
			}
			mysql_free_result($result);
	}
	Header("Location: admin.php?op=adminMain");
}

function poll_createPosted() {
	global $maxOptions, $pollTitle, $optionText;
	$timeStamp = time();
	$pollTitle = FixQuotes($pollTitle);
	if(!mysql_query("INSERT INTO poll_desc VALUES (NULL, '$pollTitle', '$timeStamp', 0)")) {
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		return;
	}
	$object = mysql_fetch_object(mysql_query("SELECT pollID FROM poll_desc WHERE pollTitle='$pollTitle'"));
	$id = $object->pollID;

	for($i = 1; $i <= sizeof($optionText); $i++) {
		if($optionText[$i] != "")
			$optionText[$i] = FixQuotes($optionText[$i]);
			if(!mysql_query("INSERT INTO poll_data (pollID, optionText, optionCount, voteID) VALUES ($id, '$optionText[$i]', 0, $i)")) {
				echo mysql_errno(). ": ".mysql_error(). "<br>";
				return;
			}
	}
	Header("Location: admin.php?op=adminMain");
}

function poll_removePoll() {
	global $hlpfile, $admin;
	$hlpfile = "manual/surveys.html";
	include ('header.php');
	GraphicAdmin($hlpfile);
	OpenTable4();
	?>
	<font size=4><b><center><?php echo translate("Remove an existing poll"); ?></b></center><br><br></font>
	<font size=2><center><?php echo translate("WARNING: The chosen poll will be removed IMMEDIATELY from the database!"); ?></center>
	<p><?php echo translate("Please choose a poll from the list below."); ?></p>
	<form action="admin.php" method="post">
	<input type="hidden" name="op" value="removePosted">
	<table>

	<?PHP
	$result = mysql_query("SELECT pollID, pollTitle, timeStamp FROM poll_desc ORDER BY timeStamp"); 
	if(!$result) {
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		return;
	}

	// cycle through the descriptions until everyone has been fetched
	while($object = mysql_fetch_object($result)) {
		$pollID = $object->pollID;
		echo "<tr><td><input type=\"radio\" name=\"id\" value=\"".$object->pollID."\">".$object->pollTitle."</td></tr>";
	}

	echo "</table>";
	echo "<input type=\"submit\" value=\"".translate("Remove")."\">";
	echo "</form></td></tr></table></td></tr></table>";
	include ('footer.php');
}

function poll_removePosted() {
	global $id;
	mysql_query("DELETE FROM poll_desc WHERE pollID=$id");
	mysql_query("DELETE FROM poll_data WHERE pollID=$id");
	Header("Location: admin.php?op=adminMain");
}

function poll_viewPoll() {
	include ('header.php');
	GraphicAdmin($hlpfile);
	echo "<font size=4>".translate("View poll results")."</font>";
	echo "<p>";

	// select all descriptions
	$result = mysql_query("SELECT pollID, pollTitle, timeStamp FROM poll_desc ORDER BY timeStamp"); 
	if(!$result) {
		echo mysql_errno(). ": ".mysql_error(). "<br>";
		return;
	}

	echo "<form action=\"".basename($GLOBALS[PHP_SELF])."\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"op\" value=\"viewPosted\">";
	echo "<table>";

	// cycle through the descriptions until everyone has been fetched
	while($object = mysql_fetch_object($result)) {
		echo "<tr><td><input type=\"radio\" name=\"id\" value=\"".$object->pollID."\">".$object->pollTitle."</td></tr>";
	}
	echo "</table>";
	echo "<input type=\"submit\" value=\"".translate("View")."\">";
	echo "</form>";
	include ('footer.php');
}

function poll_viewPosted() {
	include ('header.php');
	GraphicAdmin($hlpfile);
	global $id;
	echo "<font size=4>".translate("View poll results")."</font><p>";
	pollResults($id);
	include ('footer.php');
}


switch($op) {

		case "create":
			poll_createPoll();
			break;

		case "createPosted":
			poll_createPosted();
			break;

		case "poll_editPoll":
			poll_editPoll($pollID);
			break;

		case "ChangePoll":
			ChangePoll($pollID, $pollTitle, $optionText, $optionCount, $voteID);
			break;

		case "remove":
			poll_removePoll();
			break;

		case "removePosted":
			poll_removePosted();
			break;
    
		case "view": 
			poll_viewPoll();
			break;

		case "viewPosted":
			poll_viewPosted();
			break;

}

} else {
    echo "Access Denied";
}


?>