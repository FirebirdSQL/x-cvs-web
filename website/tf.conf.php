<?php

# forum_name - also you can change this value via
# webinterface when it is wroted to settings file
# default 'nameless board'
define('forum_name','Firebir Project');

# before you change this value look if there 
# exists such file inside ./tf.lang/(**).php
# default 'en'
define('language','en');

# default template to use in board
# default 'default'
define('template','default');

#######################################
# if this is false then users cant choose own avatars
# from http://some.host.net/avatar.gif but only from
# local host avatars directory: ./tf.img/avatars/.
# and when its false then images shows as links
# default false
define('get_img_size', true);

# count online users or no
# default true
define('online_users', false);

# if this constant is true then forum compares browser
# default language and lang files from ./tf.lang/ and
# if in langfile directory exists user languagefile then
# loads automatically this language
# default true
define('check_default_language', true);

# howto show time on forum. look http://php.net/date for explanation
# default 'd-m-Y H:i'
define('time_format','d-M-Y');

# how many topics are showed in topicslist at once
# (others are on next page)
# default 10
define('max_topics_per_forum',20);

# how many postings showed at once in thread (if they 
# are more we make new page them)
# default 10
define('max_postings_per_page',10);

# how many links are showed at once in navigation bar
# others are showed when you click on edges of links,
# also you can go to directly first or last page
# default 20
define('max_links',20);

# if this value is true then all emails are writed with 
# JavaScript so them are harder to find by spam robots 
# (btw, they are "crypted" with hexadecimal way already :-)
# default true
define('js_email', true);

# if true then forum opens links in postings in new window
# default false
define('popup_windows',false);

# avatar's stuff
define('avatar_img_types','gif,png,jpg,jpeg');
define('avatar_max_width',60);
define('avatar_max_height',60);

# topic icon types
# default 'gif,jpg'
define('topic_img_types','gif,jpg');

# topic icon types
# default 'gif,jpg,png'
define('smiley_img_types','gif,jpg,png');

# max image size in message (if image width or height 
# is bigger than max dimensions then forum adds 
# width="img_max_width" and height="img_max_height"
# options (proportions persist)
define('img_max_width', 400);
define('img_max_height', 300);

# maximum posting content size
# default 4 Kb
define('max_posting_length',4096);

#######################################
# fields delimiter in textfiles
# u can use such combos like "·"->&middot; "÷"->&divide; "£"->&pound; etc
# default '·'
define('d','·');

# delimiter replacement
# if text contains such character we replace it with...
# default '&middot;'
define('dr','&middot;');

# new line replacement
# we cant replace newlines with <br> or <p>
# because bb_encode makes them html entities --> &lt;br&gt;
# so we replace them with special char
define('nlr', '¶');

#######################################
# directories and files...

# this dir contains all postings, users data etc. 
# give it writing/executing permissions (chmod 777) 
# default './tf.data/'
define('dir_data', './forum/tf.data/');

# messagefile extension
# default '.txt'
define('msg_ext', '.txt');

# contains main settings (forum name, default template, language)
# default './tf.data/settings.txt'
define('f_settings',dir_data.'settings.txt');

# contains users data
# default './tf.data/users.php'
define('f_users',dir_data.'users.php');

# categoryes file
# default './tf.data/category.txt'
define('f_categories',dir_data.'categories.txt');

# this file contains alls postings header-data (author, last posting time etc)
# default './tf.data/header.txt'
define('f_header',dir_data.'header.txt');

# this file contains alls postings header-data (author, last posting time etc)
# default './tf.data/users_groups.txt'
define('f_users_groups',dir_data.'users_groups.txt');

# file contains online users (guests and registrered user ip-s, timestamps and names)
# default './tf.data/online_users.txt'
define('f_online_users', dir_data.'online_users.txt');

# templates dir
# default './tf.tpl/'
define('dir_templates', './forum/tf.tpl/');

# languages dir
# default './tf.lang/'
define('dir_languages', './forum/tf.lang/');

# main graphic files dir
# default './tf.img/'
define('dir_images', './forum/tf.img/');

# smileys dir
# default './tf.img/smileys/'
define('dir_smileys', dir_images.'smileys/');

# topic icons dir
# default './tf.img/topic_icons/'
define('dir_topic_icons', dir_images.'topic_icons/');

# avatars dir
# default './tf.img/avatars/'
define('dir_avatars', dir_images.'avatars/');

#######################################
# seconds before we allow to make new post
# after old one is sent by same person
# default 30
define('post_interval', 30);

# cookies expiry time (so long are user logged in)
# default '2700', 45 minutes
define('cookie_expiry', 2700);

# rememebr me expiry time
# default 3 months
define('cookie_expiry2', 60*60*24*30.5);

# how long count online guests/users
# (after this time they are not more online...)
# default 600, (10 min)
define('online_time', 600);

# guest user name (good idea is add to guestuser 
# name unallowed characters, so is sure that 
# there arent real user which same name)
# default '<guest>'
define('guest', '<guest>');

# lock files before writing or not. if not
# then there may be *** when two persons save
# files same time, so its should be TRUE. but if
# you use this forum under win32 then this
# constant should be false -- flock() doesnt work
# under windoze... better use this forum with
# some *NIX like server!
# default true
define('flokk', true);

# string with unallowed chars
# they checked in usernames, passwords, etc... -- everywhere
# defaul '<>'
define('unallowed_chars','<>');

# after every n characters add space
# default 80
define('text_wrap', 80);

# if soft_wrap is set to true then it dosen't break
# lines which contains html tags, like email links
# if its false then  spaces are added everywhere 
# after 80 characters with wordrap() function
# default true
define('soft_wrap', true);


# this is array with "static" smileys
# array key is regexp from smiley and 
# value is replacement image from smileys dir
# if you wish to add some special character like
# "." or "[" then you should escape they with slash
# a la \. or \[
$static_smileys = array(
	':)'=>'smile.gif',
	':-)'=>'smile.gif',
	';-)'=>'wink.gif',
	';)'=>'wink.gif',
	':-\('=>'sad.gif',	# Nota bene: bracket is escaped with slash
	':\('=>'sad.gif',	# Nota bene: bracket is escaped with slash
	':o)'=>'doh.gif',
	':-p'=>'happy.gif',
	':p'=>'happy.gif',
	':p'=>'happy.gif',
	'B-)'=>'cool.gif',
	'B)'=>'cool.gif',
	'8-)'=>'uhoh.gif',
	'8)'=>'uhoh.gif'
);

# array posting_status is multidimension array which contains
# info about poster status depending posted messages. First number
# is interval start, next number is interval end and third value
# contains status message
# there are 3 special status: admin, moderator and anonymous (they are
# translated in lang-file).
$poster_status = array(
	array (0, 5, 'Newcomer'),
	array (6, 25, 'New member'),
	array (26, 50, 'Member'),
	array (51, 100, 'Old member'),
	array (101, 10000, 'Crazy member')
);

#######################################
# forum version...
define('forum_version', '0.7.1');

#######################################
# if this file is not included by any 
# other page then we show this message...
basename(__FILE__) == basename($PHP_SELF) ? print 'tf.conf.php, contains <a href="http://zone.ee/txtforum/">txtForum</a> configuration settings. <h2><a href="forum.php">Local forum is here</a></h2>' : '';

#
#   Feel free to send me water, bread and nonrepayable credit :-)
#
#	             ---->>> lauri_k@mail.ru <<<-----
#
#         I wrote miraculous scripts for next to nothing!
#
#                          - call me -

?>