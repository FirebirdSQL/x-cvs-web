<?PHP

######################################################################
# PHP-NUKE: Web Portal System
# ===========================
#
# Copyright (c) 2000 by Francisco Burzi (fburzi@ncc.org.ve)
# http://phpnuke.org
#
# This module is to configure the main options for your site
#
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################

######################################################################
# Database & System Config
#
# dbhost:   MySQL Database Hostname
# dbuname:  MySQL Username
# dbpass:   MySQL Password
# dbname:   MySQL Database Name
# system:   0 for Unix/Linux, 1 for Windows
######################################################################

$dbhost = "localhost";
$dbuname = "root";
$dbpass = "";
$dbname = "firebird";
$system = 0;

/*********************************************************************/
/* You finished to configure the Database. Now you can change all    */
/* you want in the Administration Section.   To enter just launch    */
/* you web browser pointing to http://yourdomain.com/admin.php       */
/*                                                                   */
/* At the prompt use the following ID to login (case sensitive):     */
/*                                                                   */
/* AdminID: God                                                      */
/* Password: Password                                                */
/*                                                                   */
/* Be sure to change inmediately the God login & password clicking   */
/* on Edit Admin in the Admin menu. After that, click on Preferences */
/* to configure your new site. In that menu you can change all you   */
/* need to change.                                                   */
/*                                                                   */
/* Remember to chmod 666 this file in order to let the system write  */
/* to it properly. If you can't change the permissions you can edit  */
/* the rest of this file by hand.                                    */
/*                                                                   */
/* Congratulations! now you have an automated news portal!           */
/* Thanks for choose PHP-Nuke: The Future of the Web                 */
/*********************************************************************/



######################################################################
# General Site Configuration
#
# $sitename:      Your Site Name
# $nuke_url:      Complete URL for your site (Do not put / at end)
# $site_logo:     Logo for Printer Friendly Page (It's good to have a Black/White graphic)
# $slogan:        Your site's slogan
# $startdate:     Start Date to display in Statistic Page
# $adminmail:     Site Administrator's Email
# $anonpost:      Allow Anonymous to Post Comments? (1=Yes 0=No)
# $Default_Theme: Default Theme for your site (See /themes directory for the complete list, case sensitive!)
# $foot(x):       Messages for all footer pages (Can include HTML code)
# $commentlimit:  Maximum number of bytes for each comment
# $anonymous:     Anonymous users Default Name
# $site_font:     Font for your entire site (Comma separated for many fonts type)
# $minpass:       Minimum character for users passwords
# $pollcomm:      Activate comments in Polls? (1=Yes 0=No)
######################################################################

$sitename = "Firebird Relational Database";
$nuke_url = "http://firebird.sourceforge.net";
$site_logo = "firebird.gif";
$slogan = "Database for the New Millennium";
$startdate = "February 2001";
$adminmail = "pcisar@atlas.cz";
$anonpost = 1;
$Default_Theme = "Firebird";
$foot1 = "<table CELLSPACING=\"5\" border=\"0\" width=\"100%\"><tr><td align=\"left\" width=\"10%\">

<a href=\"http://sourceforge.net/project/?group_id=9028\">

<img src=\"http://sourceforge.net/sflogo.php?group_id=9028&type=1\" width=\"88\" height=\"31\"

border=\"0\" alt=\"Firebird at SourceForge\"></a>

</td><td align=\"left\" width=\"90%\"><FONT face=\"Lucida,Verdana,Helvetica,Arial\" color=\"black\" size=-2>

This site and the pages contained within are Copyright © 2000, 2001, Firebird Project.<br>

Firebird - Relational Database for the New Millennium.

</font></td></tr></table>";
$foot2 = "You can syndicate our news using the file <a href=backend.php>backend.php</a> or <a href=ultramode.txt>ultramode.txt</a>";
$foot3 = "This web site was made with <a href=http://phpnuke.org>PHP-Nuke</a>, a web portal system written in PHP. PHP-Nuke is Free Software released under the <a href=http://www.gnu.org>GNU/GPL license</a>.";
$foot4 = "";
$commentlimit = 4096;
$anonymous = "Anonymous";
$site_font = "Verdana,Arial,Helvetica";
$minpass = 5;
$pollcomm = 1;

######################################################################
# General Stories Options
#
# $top:       How many items in Top Page?
# $storyhome: How many stories to display in Home Page?
# $oldnum:    How many stories in Old Articles Box?
# $ultramode: Activate ultramode plain text file backend syndication? (1=Yes 0=No  Need to chmod 666 ultramode.txt file)
######################################################################

$top = 10;
$storyhome = 5;
$oldnum = 30;
$ultramode = 0;

######################################################################
# Banners/Advertising Configuration
#
# $banners: Activate Banners Ads for your site? (1=Yes 0=No)
# $myIP:    Write your IP number to not count impressions, be fair about this!
######################################################################

$banners = 0;
$myIP = "150.10.10.10";

######################################################################
# XML/RDF Backend Configuration
#
# $backend_title:    Backend title, can be your site's name and slogan
# $backend_language: Language format of your site
# $backend_image:    Image logo for your site
# $backend_width:    Image logo width
# $backend_height:   Image logo height
######################################################################

$backend_title = "Firebird Relational Database";
$backend_language = "en-us";
$backend_image = "http://firebird.sourceforge.net/images/firebird_logo.gif";
$backend_width = 88;
$backend_height = 31;

######################################################################
# Site Language Preferences
#
# $language: Language of your site (You need to have lang-xxxxxx.php file for your selected language in the /language directory of your site)
# $locale:   Locale configuration to correctly display date with your country format. (See /usr/share/locale)
######################################################################

$language = "english";
$locale = "en_US";

######################################################################
# Web Links Preferences
#
# $perpage:      	    How many links to show on each page?
# $popular:      	    How many hits need a link to be listed as popular?
# $newlinks:     	    How many links to display in the New Links Page?
# $toplinks:     	    How many links to display in The Best Links Page? (Most Popular)
# $linksresults: 	    How many links to display on each search result page?
# $links_anonaddlinklock: Let Anonymous users to post new links? (1=Yes 0=No)
######################################################################

$perpage = 10;
$popular = 500;
$newlinks = 10;
$toplinks = 10;
$linksresults = 10;
$links_anonaddlinklock = 1;

######################################################################
# Notification of News Submissions
#
# $notify:         Notify you each time your site receives a news submission? (1=Yes 0=No)
# $notify_email:   Email, address to send the notification
# $notify_subject: Email subject
# $notify_message: Email body, message
# $notify_from:    account name to appear in From field of the Email
######################################################################

$notify = 1;
$notify_email = "pcisar@borland.cz";
$notify_subject = "NEWS for Firebird";
$notify_message = "Hey! You got a new submission for your site.";
$notify_from = "pcisar@borland.cz";

######################################################################
# Moderation Config (not 100% working)
#
# $moderate:   Activate moderation system? (1=Yes 0=No)
# $resons:     List of reasons for the moderation (each reason under quotes and comma separated)
# $badreasons: Number of bad reasons in the reasons list
######################################################################

$moderate = 2;
$reasons = array("As Is",
		    "Offtopic",
		    "Flamebait",
		    "Troll",
		    "Redundant",
		    "Insighful",
		    "Interesting",
		    "Informative",
		    "Funny",
		    "Overrated",
		    "Underrated");
$badreasons = 4;

######################################################################
# Survey/Polls Config
#
# $maxOptions: Number of maximum options for each poll
# $BarScale:   Scale for the Bar, multiple of 100, You may leave this to 1
# $setCookies: Set cookies to prevent visitors vote twice in a period of 24 hours? (1=Yes 0=No)
######################################################################

$maxOptions = 12;
$BarScale = 1;
$setCookies = 1;

######################################################################
# Some Graphics Options
#
# $tipath:       Topics images path (put / only at the end, not at the begining)
# $userimg:      User images path (put / only at the end, not at the begining)
# $adminimg:     Administration system images path (put / only at the end, not at the begining)
# $admingraphic: Activate graphic menu for Administration Menu? (1=Yes 0=No)
# $admart:       How many articles to show in the admin section?
######################################################################

$tipath = "images/topics/";
$userimg = "images/menu/";
$adminimg = "images/admin/";
$admingraphic = 0;
$admart = 20;

######################################################################
# HTTP Referers Options
#
# $httpref:    Activate HTTP referer logs to know who is linking to our site? (1=Yes 0=No)# $httprefmax: Maximum number of HTTP referers to store in the Database (Try to not set this to a high number, 500 ~ 1000 is Ok)
######################################################################

$httpref = 0;
$httprefmax = 1000;

######################################################################
# Allowable HTML tags
#
# $AllowableHTML: HTML command to allow in the comments
#                  =>2 means accept all qualifiers: <foo bar>
#                  =>1 means accept the tag only: <foo>
######################################################################

$AllowableHTML = array("p"=>2,
		    "b"=>1,
		    "i"=>1,
		    "a"=>2,
		    "em"=>1,
		    "br"=>1,
		    "strong"=>1,
		    "blockquote"=>1,
                    "tt"=>1,
                    "li"=>1,
                    "ol"=>1,
                    "ul"=>1);

######################################################################
# Miscelaneous Options
#
# $Ephemerids:    Activate Ephemerids (Past Events) system? (1=Yes 0=No)
# $advancedstats: Activate Advanced Stats? (1=Yes 0=No  This will display a new box in Statistics page with relevant server info)
######################################################################

$Ephemerids = 0;
$advancedstats = 0;

######################################################################
# Filters Options (not working yet)
######################################################################

$MaxTextLength = 0;
$MaxTotalLength = 0;
$CensorList = array("fuck",
		    "cunt",
		    "fucker",
		    "fucking",
		    "pussy",
		    "cock",
		    "c0ck",
		    "cum",
		    "twat",
		    "clit",
		    "bitch",
		    "fuk",
		    "fuking",
		    "motherfucker");
$CensorMode = 1;
$CensorReplace = "*";

######################################################################
# Do not touch the following options!
######################################################################

$cookieadmtime = 2592000;
$cookiePrefix = "NukePoll";
$uimages = "$userimg$language";
$Version_Num = "4.4";

#########################
# Show a number of user #
#########################

$show_user= 20;# How many users to display in admin section?

?>