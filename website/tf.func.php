<?php

#
# tf.func.php, contains all functions for txtForum
#
# CopyLeft (C) 2001-2003 Lauri Kasvandik, lauri_k@mail.ru
#
#	This program is free software; you can redistribute it and/or modify it under the
#	terms of the GNU General Public License as published by the Free Software Foundation;
#	either version 2 of the License, or (at your option) any later version.
#
#	This program is distributed in the hope that it will be useful, but WITHOUT ANY
#	WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
#	PARTICULAR PURPOSE. See the GNU General Public License for more details.
#
#	YOU MUST RETAIN COPYRIGHT NOTICE!
#
#	http://www.gnu.org/copyleft/
#

# if this file is not included by any other page then we show this message...
basename(__FILE__) == basename($PHP_SELF) ? die('tf.func.php, contains all functions for <a href="http://zone.ee/txtforum/">txtForum</a>. <h2><a href="index.php">Local forum is here</a></h2>') : '';

include_once('tf.conf.php');

### General purpose functions #################################################

# javascript messagebox (nice thing for debugging)
function alert($msg)
{
	print '<script>alert("'.$msg.'")</script>';
}

# gives errormessage with javascript and goes to previous page
function err_msg($s)
{
	global $PHP_SELF,$l;
	print $s.' <a href="'.$PHP_SELF.'">'.$l['Back'].'</a>';
	alert($s);
	goto_url('JavaScript:history.go(-1)');
}

#
# returns sorted array, where array contains such elements:
#
#	$array = (	'myself || 12 || my@self.org',
#				'yourself || 14 || your@self.org');
#
function sort_array($array, $n=1, $separator="||", $reverse=true)
{
	foreach ($array as $line)
	{
		$temp = explode($separator, $line);
		$a[trim($line)] = $temp[$n];
	}
	natcasesort($a);
	$reverse ? $a = array_reverse($a) : '';

	while (list ($key, $val) = each ($a)) {
		$return_array[] = $key;
	}
	return $return_array;
}


# goes after $time seconds to $url either with meta refresh or javascript
function goto_url($url, $time=0, $method="meta")
{
    if ($method=="meta")
    {
        print "\n<meta http-equiv=\"refresh\" content=\"$time;url=$url\">\n";
    }
    else if ($method=="js")
    {
        $time=$time*1000;
        print "\n<script>function go(){window.location=\"$url\";}setTimeout(\"go()\",$time)</script>\n";
    }
}

# copyed from PHP manual
function getmicrotime()
{
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}


# sets cookie with javascript: equal with PHP setcookie() but it can use 
# after headers are sent (some free webspace providers adds banners and so
# is using setcookie() impossible).
#
# thanks fly to unknown forum visitor, who shares this codesnippet
# and to Guillermo Ochoa de Aspuru, who found and fixes one bug with expiry time
function cookie($name, $value, $expire)
{
  echo '
<script>
<!--
  var expire = new Date();
  var thetime = expire.getTime(); // Get the current time in ms
  thetime += '.$expire.'000; // Add the cookie duration in ms
  expire.setTime(thetime); // Set the expiry time
  document.cookie = "'.$name.'='.$value.';expires="+expire.toGMTString();
  --></script>
';
# i removed path variable from cookie baking, so its possible to 
# use this forum with frames in another servers
#  +";path=/"
}


# returns true if email address is correct (not 100% correct but its simple and fast)
function is_email($email)
{
	if (strstr($email,'@') && strpos($email, '.') > 2)
	{
		return true;
	}
	return false;
}

# Function name: regglobals
# Date: 08.05.2003
# Version: 1.0
# Author: Sigmar Muuga
# Author e-mail: sigmarm@ope.khk.tartu.ee
# Author homepage: http://www.hot.ee/meediake
#
function register_globals()
{
	# we continue only when php.ini variable register_globals=Off

	if (!ini_get('register_globals')) 
	{ 
		session_start();
		$php_versioon = phpversion();
		list($versiooni_peanumber,$versiooni_alam1,$versiooni_alam2) = explode(".",$php_versioon);

		# when version < 4.1.4 then we use older global variables
		if(($versiooni_peanumber > 4 && $versiooni_alam1 < 1) || $versiooni_alam2 < 4)
		{ 
			$_FILES = $HTTP_POST_FILES;
			$_ENV = $HTTP_ENV_VARS;
			$_GET = $HTTP_GET_VARS;
			$_POST = $HTTP_POST_VARS;
			$_COOKIE = $HTTP_COOKIE_VARS;
			$_SERVER = $HTTP_SERVER_VARS;
			$_SESSION = $HTTP_SESSION_VARS;
			$_FILES = $HTTP_POST_FILES;
		}

		while(list($v6ti,$v22rtus)=each($_FILES)) $GLOBALS[$v6ti]=$v22rtus;
		while(list($v6ti,$v22rtus)=each($_ENV)) $GLOBALS[$v6ti]=$v22rtus;
		while(list($v6ti,$v22rtus)=each($_GET)) $GLOBALS[$v6ti]=$v22rtus;
		while(list($v6ti,$v22rtus)=each($_POST)) $GLOBALS[$v6ti]=$v22rtus;
		while(list($v6ti,$v22rtus)=each($_COOKIE)) $GLOBALS[$v6ti]=$v22rtus;
		while(list($v6ti,$v22rtus)=each($_SERVER)) $GLOBALS[$v6ti]=$v22rtus;
		while(list($v6ti,$v22rtus)=each($_SESSION)) $GLOBALS[$v6ti]=$v22rtus;

		# _FILES too...
		foreach($_FILES as $v6ti => $v22rtus) 
		{
			$GLOBALS[$v6ti]=$_FILES[$v6ti]['tmp_name'];
			foreach($v22rtus as $lisa => $v22rtus2) 
			{
				$v6ti2 = $v6ti."_".$lisa;
				$GLOBALS[$v6ti2]=$v22rtus2;
			}
		}
	} // end if
}

#
# nospam4 -- Obfusticated email link creator (our modest attempt to fight with spamspiders)
#
# url: http://zone.ee/internetu/php/nospam/nospam.htm
#
# Parameters:
#	mail - fake@some.where.ee
#	text - linkname
#	js - if its true then adds JS document.write (harder to find by spamrobots)
#
# ideas are borrowed from:
#	- http://members.tripod.com/semper.fi/oelc/index.htm
#	- http://php.net/bin2hex
#	- http://www.indrek.ee/avaleht/indrek/383/1/

function nospam4($mail,$text,$js=true)
{
	$mail = trim($mail);
	$text = trim($text);

	$encoded = bin2hex("$mail");
    $encoded = chunk_split($encoded, 2, '%');
    $encoded = '%' . substr($encoded, 0, strlen($encoded) - 1);

	$mailto = '<a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;'.$encoded.'">'.$text.'</a>';
	$js == true ? $mailto = '<script>document.write(\''.$mailto.'\');</script>' : '';

	return $mailto;
}

/*
function nospam4($mail, $text, $js=true)
{
	$mailto = 'mailto:' . $mail;
	for ($i=0; $i<strlen($mailto); $i++)
	{
		$s .= '&#' . ord($mailto[$i]) . ';';
	}
	$mailto = '<a href="' . $s . '">' . $text . '</a>';
	$js == true ? $mailto = '<script>document.write(\''.$mailto.'\');</script>' : '';
	return $mailto;
}
*/
# one function more to obfusticating e-mail
function nospam3($mail,$at='( alt+64 )', $dot='( alt+46 )')
{
	$mail = str_replace ('@', $at, $mail);
	$mail = str_replace ('.', $dot, $mail);
	return $mail;
}

#
# BBCode functions are made by kilukarp (http://zone.ee/kilukodu/)
#
# url: http://php.center.ee/skript.php?id=209
#
# I edited it lightly:
#	+ language strings (sometimes doesn't work, so i removed they)
#	+ added PHP, big, small tags
#	+ e-mail address obfustication
#	+ bbcode help
#	+ img dimensions

function bb_code_help()
{
	global $l, $PHP_SELF, $t;
	$t['template_path'] = get_template_path();
	return parse_tpl(get_template($t['template_path'].'bb_code_help.htm'));
}

$tags = array(
	'b' => '<b>%s</b>',
	'u' => '<u>%s</u>',
	'i' => '<i>%s</i>',
	'quote' => '<blockquote><b>Quote</b>:<hr>%s<hr></blockquote>',
	'url' => '<a href="%s">%s</a>',
	'mail' => '%s',
	'img' => '<img border="0" src="%s" alt="%s"%s>',
	'big' => '<big>%s</big>',
	'small' => '<small>%s</small>',
	'color' => '<font color="%s">%s</font>',
	'size' => '<font size="%s">%s</font>',
	'code' => '<blockquote><b>Code</b>:<hr><span class="code">%s</span><hr></blockquote>',
	'php' => '<blockquote><b>PHP:</b><hr>%s<hr></blockquote>'
);

$atag = join( '|', array_keys( $tags));


function nc( $s )
{
	#print '<pre>';
	#print_r($s);

	if ( $s[1] )
		$s[4] = nk( $s[4]);

	global $l,$tags;


	if ($s[1]=='php')
	{
		if (stristr($s[4],'<?')==false)
		{
			$r = true;
			$t = "<?php".$s[4]."?>";
		}
		$ht = highlight_string($t,true);
		if ( $r )
		{
			$ht = str_replace('&lt;?php','',$ht);
			$ht = str_replace('?&gt;','',$ht);
		}
		return sprintf($tags['php'],$ht);
	}

	if ($s[1]=='mail')
	{
		$at = isset($l)? '( '.$l['At'].' )' : '( at )';
		$point =(isset($l)) ? '( '.$l['Point'].' )' : '( point )';
		$js = (defined('js_email')) ? js_email : false;

		if (!empty($s[3]))
		{
			$link = nospam3($s[4],$at,$point);
			$email = nospam4($s[3],$link,$js);
		}
		else
		{
			$link=nospam3($s[4],$at,$point);
			$email=nospam4($s[4],$link,$js);
		}
		return $email;
	}

	if ($s[1]=='img')
	{
		if (get_img_size==true)
		{
			$xy = @getimagesize($s[4]);
			if($xy[0] > img_max_width || $xy[1] > img_max_height)
			{ 
			    $widthshift = img_max_width / $xy[0];
		        $heightshift = img_max_height / $xy[1];
		        $shift = ($widthshift < $heightshift) ? $widthshift : $heightshift;
		        $width = $xy[0] * $shift;
		        $height = $xy[1] * $shift;
		        $dimensions = ' width="'.round($width).'" height="'.round($height).'"';
			}
		    else
			{
				$dimensions = ' '.$xy[3].' ';
		    }

			return '<a href="'.$s[4].'">'.sprintf($tags['img'], $s[4], $s[4], $dimensions).'</a>';
		}
		else
		{
			return '<br> <a href="'.$s[4].'"> '.$l['Image'].': '.$l['View_img'].' </a> </br>';
		}
	}

	return $s[1]?sprintf($tags[$s[1]],(!empty($s[3])?$s[3]:$s[4]),$s[4]):$s[0];
}

function nk( $s)
{
	global $atag;
	$t = preg_replace_callback( '/\[('.$atag.')(=(.*))?\](.*)\[\/\1\]/isU', 'nc', $s);
	return $t;
}

function bb_encode($str,$specchars=0)
{
	// nl2br( )
	//htmlspecialchars( $str, ENT_NOQUOTES)
	if ($specchars==1)
		return nk( $str);
	else
		return nk( htmlspecialchars( $str, ENT_NOQUOTES));
}

#
# ripped from miniBB (www.minibb.net)
# enchanced by me (added email links replacement and popup_window stuff)
#
function url_maker($text, $wrap=4096)
{
	global $l;

	$text = str_replace("\n", " \n ", $text);

	# default values for emails...
	$at = isset($l)? '( '.$l['At'].' )' : '( at )';
	$point =(isset($l)) ? '( '.$l['Point'].' )' : '( point )';
	$js = (defined('js_email')) ? js_email : false;

	$link_target = (popup_windows == true) ? ' target="_BLANK"' : ' target=""';

	$words=explode(' ',$text);
	for($i=0;$i<sizeof($words);$i++)
	{
		if (strlen($words[$i])>$wrap) $word=chunk_split($words[$i],$wrap,' ');
		else $word=$words[$i];

		$c=0;

		if(strtolower(substr($words[$i],0,7))=='http://'){$c=1;$word='<a href="'.$words[$i].'"'.$link_target.'>'.$word.'</a>';}
		elseif(strtolower(substr($words[$i],0,8))=='https://') {$c=1;$word='<a href="'.$words[$i].'"'.$link_target.'>'.$word.'</a>';}
		elseif(strtolower(substr($words[$i],0,6))=='ftp://') {$c=1;$word='<a href="'.$words[$i].'"'.$link_target.'>'.$word.'</a>';}
		elseif(strtolower(substr($words[$i],0,4))=='ftp.') {$c=1;$word='<a href="ftp://'.$words[$i].'"'.$link_target.'>'.$word.'</a>';}
		elseif(strtolower(substr($words[$i],0,4))=='www.') {$c=1;$word='<a href="http://'.$words[$i].'"'.$link_target.'>'.$word.'</a>';}
		elseif(strpos($words[$i],'@')>1 && strpos($words[$i], '.') >= 3)
		{
			$c=1;

			$email=nospam3($words[$i],$at,$point);
			$nospam=nospam4($words[$i],$email,$js);
			$word=$nospam;
		}

		if ($c==1) $words[$i]=$word;
	}

	$ret = str_replace (" \n ", "\n", implode(' ',$words));
	return $ret;
}

# template parser callback function
function real_tpl_parsing($matches)
{
	if (strstr($matches[0],'[') && strstr($matches[0],']'))
	{
		$a = explode('[',$matches[2]);
		$var = $a[0];
		$b = explode(']',$a[1]);
		$key = $b[0];

		global ${$var};
		$result = ${$var}["$key"];
		return $result;
	}
	else
	{
		$x = $matches[2];
		global ${$x};
		return ${$x};
	}
}

# idea is borrowed from minibb template parser but i wrote it from scratch, 
# its littlebit of shorter, but maybe slower -- it works with PCRE now...
function parse_tpl($template_string)
{
	return preg_replace_callback('/(\{.)([a-zA-Z0-9_\[\]]*)(\})/','real_tpl_parsing',$template_string);
}

# returns visitor IP
function get_IP()
{
	$ip1=getenv('REMOTE_ADDR');
	$ip2=getenv('HTTP_X_FORWARDED_FOR');

	if ($ip2!='' and ip2long($ip2)!=-1) 
		$finalIP=$ip2; 
	else 
		$finalIP=$ip1;

	$finalIP=substr($finalIP,0,15);
	return $finalIP;
}


# saves array into file
function save_file($array, $filename, $flock)
{
	$fp = fopen($filename, 'w');
	$flock ? flock($fp, 2) : '';
	foreach($array as $line)
	{
		fputs($fp, rtrim($line)."\n");
	}
	fclose($fp);
	if(file_exists($filename))
	{
		return true;
	}
	else 
	{
		return false;
	}
}

#
# grojsus (v.3.1 - 13.06.2003) is advanced pagination function
#
# url: http://zone.ee/internetu/php/grojsus/naide.php
#
# Parameters:
#
#	$array - array which splits to pages (can be array or array/table length too -- 
#            count(file("name.txt")) or "select count(*) from table")
#	$page - current page to show; this should be with same name like defined with $pagevar
#	$itemsperpage - items per page
#	$style - how to show navigation bar: 0 - simply page numbers, 1 - items range (1-10)
#	$pageurl - which url to use as links (can contain variables) if empty then equal with Php_self
#	$pagevar - pager variable name in url (&page=123)
#	$keepurlvar - if its true then current Query_string stay
#	$options - "SE" (start and end links)
#	$maxlen - how many links to show, if -1 then all, default 10 (should be at least 4)
#	$debug - returns debugging info or not
#
# Returns:
#   array where:
#   [0] - if is_array($array) then contains all items of current page, else returns false
#   [1] - navigation bar with links
#   [2] - debugging info (only if $debug = true) 
#   [3] - items starting number on current page
#   [4] - items ending number on current page
#   [5] - items per page (same as input parameter $itemsperpage)
#
function grojsus($array,$page,$itemsperpage,$style=0,$pageurl='',$pagevar='page',$keepurlvar=true,$options='E',$maxlen=10,$debug=false)
{
	global $PHP_SELF, $QUERY_STRING;

	if (!isset($page)) {
		$page = 0;
	}

	$pageurl = $pageurl == '' ? $PHP_SELF : $pageurl;
	is_array($array) ? $total_items = count($array) : $total_items = $array;

	# items start and end on current page
	$start = $page * $itemsperpage;
	$end = $start + $itemsperpage > $total_items ? $total_items : $start+$itemsperpage;

	# makeing return array
	if (is_array($array)) {
		for ($i=$start;$i<$end;$i++)
		{
			$ret_array[] = $array[$i];
		}
	}
	else {
		$ret_array = false;
	}


	# if there are more items than goes to one page 
	# then we make navigation bar with links
	if ($total_items > $itemsperpage)
	{
		$links_total = ceil($total_items / $itemsperpage);

		# now we calculate which links to show:
		# first links_start
		$d = floor($maxlen / 2);
		if ($page - $d < 0)	{
			$links_start = 0;
			$remainder = abs($page -$d);	// we add it to $links_end
		}
		else {
			$links_start = $page - $d;
			$remainder = 0;
		}

		# and then links_end:
		if ($page + $d + $remainder > $links_total)	{
			$links_end = $links_total;
		}
		else {
			$links_end = $page + $d + $remainder;
		}

		# and one thing more : if there are still fewer links then maxlen
		# then we move start to little left or if it is already in start then
		# we keep it along. (heh, and this is still beginning ;-)
		if ($links_end - $links_start < $maxlen)
		{
			$links_start = $page - $d < 0 ? 0 : $links_start - ($maxlen-($links_end - $links_start));
			$links_start = $links_start < 0 ? 0 : $links_start;
		}

		if ($debug==true)
		{
			$cp=$page+1;
			$ls=$links_start+1;

			$dbg .= '<br>total items: '.$total_items;
			$dbg .= '<br>items per page: '.$itemsperpage;
			$dbg .= '<br>total pages:'.$links_total;;
			$dbg .= '<br>current page: '.$cp;
			$dbg .= '<br>maxlinks: '.$maxlen;
			$dbg .= '<br>remainder:' . $remainder;
			$dbg .= '<br>first page:'.$ls;
			$dbg .= '<br>last page:'.$links_end;
			$dbg .= '<br>start link: '.$b = stristr($options,'s') ? 'true' : 'false';
			$dbg .= '<br>end link: '.$b = stristr($options,'e') ? 'true' : 'false';
		}
		else
		{
			$dbg='';
		}
	
		if ($maxlen == -1)
		{
			$links_start = 0;
			$links_end = $links_total;
		}
		for ($i=$links_start;$i<$links_end;$i++)
		{
			$no1 = $i * $itemsperpage + 1;	# pageno (from)
			$no2 = $no1 + $itemsperpage -1;	# second page no (to)
			$no2 > $total_items ? $no2 = $total_items : '';

			if ($page == $i){ $navbar .= "<b>"; }
			# now is time to generate url...
			if ($keepurlvar==true && strlen($QUERY_STRING))
			{
				$QUERY_STRING = eregi_replace("&$pagevar=[[:digit:]]+", '', $QUERY_STRING);
				if (strstr($pageurl,'?')){ $xmark = '&'; }
				else { $xmark = '?'; }
				$url = "<a href=".$pageurl.$xmark.$QUERY_STRING."&".$pagevar."=$i>";
			}
			else
			{
				//if (strstr($pageurl,'?')){ $xmark = '&'; }	else { $xmark = '?'; }
				$xmark = strstr($pageurl,'?') == true ? '&' : '?';
				$url = "<a href=".$pageurl.$xmark.$pagevar."=$i>";
			}

			#if ($page != $i){ $navbar .= $url; }
			$navbar .= $url;
			$style == 0 ? $navbar .= $i + 1 : '';
			$style == 1 ? $navbar .= $no1."-".$no2 : '';
			#if ($page != $i){ $navbar .= "</a>"; }
			$navbar .= "</a>";


			$navbar .= "&nbsp;";
			if ($page == $i){ $navbar .= "</b>"; }
		}


		# and we continue! is time to add start and end links
		$xmark = strstr($pageurl,'?') == true ? '&' : '?';
		if ($keepurlvar == true && strlen($QUERY_STRING) > 0)
		{
			$q = strlen($QUERY_STRING) > 0 ? $xmark.eregi_replace("$pagevar=[[:digit:]]+",'',$QUERY_STRING) .'&' : $xmark;
		}
		else{ $q = $xmark; }
		
		# we show start link only when we cant see first link and if options contain 'S' char
		if (stristr ($options,'S'))
		{
			if ($page + $d > $maxlen)
			{
				$navbar = ' <a href="'.$pageurl.$q.$pagevar.'=0">&lt;&lt;</a> ' . $navbar ;
			}
		}

		# and same here
		if (stristr ($options,'E'))
		{
			if ($page + $d <  $links_total)
			{
				$last_link = $links_total-1;
				$navbar .= ' <a href="'.$pageurl.$q.$pagevar.'='.$last_link.'">&gt;&gt;</a> ';
			}
		}
	} 

	return (array($ret_array,$navbar,$dbg,$start,$end,$itemsperpage));
}


# returns file list in array from asked path what match pattern 
function file_list($path,$pattern)
{
	$d = dir($path);
	while (false !== ($entry = $d->read()))
	{
		if (eregi($pattern,$entry))
		{
			$files_array[] = $entry;
		}
	}
	return $files_array;
}

# returns subdirectoryes from some path
function dir_list($path)
{
	$unallowed_dirs = array('.','..');
	$d = dir($path);
	while (false !== ($entry = $d->read()))
	{
		if (is_dir($path.$entry) && !in_array($entry, $unallowed_dirs))
		{
			$dir_array[] = $entry;
		}
	}
	sort($dir_array);
	return $dir_array;
}

# copyed from zend.com code-examples gallery
# notes
#   - language codes are from ISO 639 
# language_accept(): 
#   takes a list of languages the current document is 
#   available in as a parameter, and returns either a 
#   language that the browser and server have in common, 
#   or an empty string if no match was found 
# parameters: 
#   $accept - array of language codes to accept 
# returns: negotiated language code or '' 
function language_accept($accept='') 
{ 
	global $HTTP_ACCEPT_LANGUAGE;
	global $HTTP_ACCEPT_CHARSET;

	$lang=split(',', $HTTP_ACCEPT_LANGUAGE); 

	// parse http_accept_language header 
	foreach($lang as $i=>$value) 
	{ 
		$value=split(';', $value);
		$lang[$i]=trim($value[0]);
	} 

	return language_negotiate($lang, $accept); 
} 

# language_negotiate(): 
#   finds a matching language between the two arrays. Tries 
#   to match whole language code, then first two characters 
#   (ie. 'en-us', 'en')
# parameters: 
#   $ask_lang - array of language codes the browser wants 
#   $accept_lang - array of language codes this document is available in 
# returns: language code or ''
function language_negotiate($ask_lang, $accept_lang) 
{ 
	if (!(is_array($ask_lang) && is_array($accept_lang))) return ''; 

	// if it exists exactly, or just the first two characters 
	foreach($ask_lang as $lang)
	{ 
		if (in_array($lang, $accept_lang)) return $lang;
		$short_lang=substr($lang, 0, 2);
		if (in_array($short_lang, $accept_lang)) return $short_lang;
	}
	return ''; 
}

# function is ripped from miniBB.net
# it adds after every $wrap characters $break char(s)
# its like wordwrap() but it dosent breaks lines inside html tags
function wrapText($wrap,$text,$break=' ')
{
	$ft=0;
	$exploded=explode(' ',$text);
	for($i=0;$i<sizeof($exploded);$i++)
	{
		$str=$exploded[$i];

		if (substr_count($str, '<') > 0 or substr_count($str, '>')>0 or substr_count($str, '&#')>0 or substr_count($str, '&quot;')>0 or substr_count($str, '&amp;')>0 or substr_count($str, '&lt;')>0 or substr_count($str, '&gt;')>0) $ft=1; else $ft=0;

		if (strlen($str)<$wrap and $ft != 0) $dT=TRUE;

		if(strlen($str)>$wrap and $ft!=0) 
		{
			$sf=FALSE; $qf=0;
			$chkPhr=''; $sym=0;
			for ($a=0; $a<strlen($str); $a++) 
			{
				if ($qf==2) $qf=0;
				if ($str[$a]=="\n") { $sym=0; }

				if ($str[$a]=='<') { $qf=1; $ft=0; $dT=TRUE; }
				elseif ($str[$a]=='>') { $qf=2; $ft=0; $dT=FALSE; }

				if ($str[$a]=='&' and isset($str[$a+1]) and ($str[$a+1]=='#' or substr($str,$a+1,4)=='quot' or substr($str,$a+1,3)=='amp') or
				substr($str,$a+1,2)=='lt' or substr($str,$a+1,2)=='gt') { $sf=TRUE; }
				if ($sf and $str[$a]==';') { $sf=FALSE; }

				if ($qf>=1 or $dT) 
				{
					$chkPhr.=$str[$a];
				}
				elseif($qf==0)
				{
					if(!$sf) $sym++; 
					if ($sym<$wrap) $chkPhr.=$str[$a];
					else 
					{
						$chkPhr.=$str[$a].' '; 
						$sym=0;
					}
				}
			} //cycle

			if (strlen($chkPhr)>0) $exploded[$i]=$chkPhr;
			$sym=0; $qf=0; $chkPhr='';
		}
		elseif (strlen($str)>$wrap and !$dT) $exploded[$i]=chunk_split($exploded[$i],$wrap,$break);

	} //i cycle

	return implode(' ',$exploded);
}

///////////////////////////////////////////////////////////////////////////////
// HERE BEGINS REAL STUFF. DATA VALIDATING, DIFFERENT FORMS, DATA SAVINGS ETC /
///////////////////////////////////////////////////////////////////////////////

function tpl_get_header()
{
	global $l,$PHP_SELF,$t;

	$tpl = get_template(get_template_path().'header.htm');
	return parse_tpl($tpl);
}

function tpl_get_footer()
{
	global $l,$PHP_SELF,$t;

	$tpl = get_template(get_template_path().'footer.htm');
	return parse_tpl($tpl);
}

function tpl_get_login_form()
{
	global ${'tf'.get_cookid()}, $l, $PHP_SELF, $t, $tf;

	$tf = ${'tf'.get_cookid()};

	if (user_pass_match($tf['user'],$tf['pass']))
	{
		$t['template_path']=get_template_path();
		$t['forum_version']=forum_version;

		if (admin_in())
		{
			$t['admin_link'] = parse_tpl(get_template(get_template_path().'form_logged_in_admin.htm'));
		}

		$tpl = get_template(get_template_path().'form_logged_in.htm');
		return parse_tpl($tpl);
	}
	else
	{
		$t['login_form_action'] = $PHP_SELF.'?action=login';
		$t['template_path']=get_template_path();
		$t['forum_version']=forum_version;
		$tpl = get_template(get_template_path().'form_login.htm');
		return parse_tpl($tpl);
	}
}

# checks that string didnt contain unallowed characters (for example <>)
# returns false if contains, else true
function chars_ok($str, $unallowed_chars)
{
	$array_chars=chunk_split($unallowed_chars,1,'');
	if (is_array($array_chars))
	{
		foreach($array_charc as $char)
		{
			if (strstr($str,$char))
			{
				return false;
			}
		}
	}
	return true;
}

# function replaces delimitrer characters 
# inside array with delimiter replacement
# and return array with replaced elements
function replace_delimiter_char($array)
{
	if (is_array($array))
	{
		foreach($array as $key=>$element)
		{
			if (stristr($element,d))
			{
				$array[$key]=stripslashes(str_replace(d, dr, $element));
			}
		}
	}
	return $array;
}

# function replaces delimitrer characters 
# in string with delimiter replacement
function replace_delimiter_char_str($str)
{
	return stripslashes(str_replace(d, dr, $str));
}

# function replaces all linefeeds in
# in array values with linefeed replacement char
function replace_newlines($array)
{
	if (is_array($array))
	{
		foreach($array as $key=>$element)
		{
			$array[$key]=eregi_replace("(\n)|(\r\n)|(\n\r)", nlr, $element);
		}
	}
	return $array;
}

# function replaces all linefeeds in
# string with linefeed replacement char
function replace_newlines_str($str,$nlr=nlr)
{
	return eregi_replace("(\n)|(\r\n)|(\n\r)", $nlr, $str);
}

# function cuts all array values shorter or to certain length
# $array contains $key value pairs 
# $array_settings $key2=>$length
# if key==key2 then substr(x,y,$length) else substr(,,default_length)
function cut_shorter($array, $array_settings, $default_length=30)
{
	if (is_array($array))
	{
		foreach($array as $key=>$val)
		{
			if (isset($array_settings[$key]))
			{
				$val = substr($val,0,$array_settings[$key]);
			}
			else
			{
				$val = substr($val,0,$default_length);
			}
			$tmp_array[$key] = $val;
		}
		return $tmp_array;
	}
}

# cuts string shorter and adds... end of str
function cut_shorter_str($str, $len=40)
{
	(strlen($str) > $len) ? $str=substr($str, 0, $len-3).'...' : '';
	return $str;
}

# checks that array values dosent contain unallowed chars
function array_chars_ok($array,$chars)
{
	if (is_array($array))
	{
		for ($i=0;$i<strlen($chars);$i++)
		{
			$chars_array[] = $chars[$i];
		}
		$pattern = implode('|',$chars_array);

		foreach($array as $key=>$value)
		{
			if (eregi($pattern,$value))
			{
				return false;
			}
		}
		return true;
	}
}

# replaces ¶ with defined thing and returns string
function nl2br_($str, $line_break = ' <br> ')
{
	$str = str_replace(nlr,$line_break,$str);
	$str = str_replace(htmlentities(nlr),$line_break,$str);
	return $str;
}

# replaces 
function html2entities($variable)
{
	if (is_array($variable))
	{
		foreach($variable as $key=>$val)
		{
			$tmp[$key] = htmlentities($val);
		}
		return $tmp;
	}

	return htmlentities($array);
}
# creates settings file with default settings
function create_settings_file()
{
	$array = array(forum_name,language.'.php',template,rand(10000, 99999));
	$array = array_pad($array,10,'');
	$array = replace_delimiter_char($array);
	$str = implode(d, $array);

	$fp = @fopen(f_settings,'w');
	flokk ? @flock($fp,2) : '';
	@fwrite($fp, $str);
	@fclose($fp);

	if (!file_exists(f_settings))
	{
		return false;
	}
	return true;
}

# function parses from filename lang-code
function get_available_languages()
{
	$languages = file_list(dir_languages,'\.php$');
	foreach($languages as $lang)
	{
		$lang = explode('.', $lang);
		$lang = $lang[count($lang)-2];
		$language_array[] = $lang;
	}
	return $language_array;
}

# returns array with settings
function get_settings()
{
	if (file_exists(f_settings)==false)
	{
		create_settings_file();
	}
	$file_content = file(f_settings);
	return (explode(d,$file_content[0]));
}

# returns asked kategory (id=line no)
function get_category($id)
{
	$file_content = file(f_categories);
	return (explode(d,$file_content[$id]));
}

# returns linkbar (Forums->Threads->Subject)
function get_linkbar($separator = ' -&gt; ')
{
	global $PHP_SELF, $action, $fid, $topic, $l, $user;

	$linkbar[0] = '<a href="'.$PHP_SELF.'?op=devel&action=forums">'.$l['Forums'].'</a>';
	if (isset($fid))
	{
		$cat_dat = get_category($fid);
		$linkbar[1] = '<a href="'.$PHP_SELF.'?action=topics&fid='.$fid.'">'.stripslashes($cat_dat[0]).'</a>';
	}
	if (isset($topic))
	{
		$topic_dat = get_data_from_header($topic);
		if (isset($linkbar[1])==false)
		{
			$fid = $topic_dat[0];
			$cat_dat = get_category($fid);
			$linkbar[1] = '<a href="'.$PHP_SELF.'?action=topics&fid='.$fid.'">'.stripslashes($cat_dat[0]).'</a>';
		}
		$linkbar[2] = '<a href="'.$PHP_SELF.'?action=view&topic='.$topic.'">'.stripslashes($topic_dat[1]).'</a>';
	}

	if ($action == 'new')
	{
		$linkbar[2] = $l['New_topic'];
	}
	else if ($action=='reply')
	{
		$linkbar[3] = $l['Reply'];
	}
	else if ($action=='members')
	{
		$linkbar[1] = '<a href="'.$PHP_SELF.'?action=members">'.$l['Members'].'</a>';
	}
	else if ($action=='modify')
	{
		$linkbar[3] = $l['Modify'];
	}
	else if ($action=='viewprofile')
	{
		$linkbar[1] = '<a href="'.$PHP_SELF.'?action=members">'.$l['Members'].'</a>';
		$linkbar[2] = $user;
	}
	else if ($action=='loginpage')
	{
		$linkbar[1] = '<a href="'.$PHP_SELF.'?action=loginpage">'.$l['Login'].'</a>';
	}
	else if ($action == 'admin')
	{
		$linkbar[2] = '<a href="'.$PHP_SELF.'?action=admin">'.$l['Admin_panel'].'</a>';
	}
	

	return implode($separator, $linkbar);
}

# returns cookie id
function get_cookid()
{
	$settings = get_settings();
	return $settings[3];
}

# returs current user or board template path
function get_template_path()
{
	global ${'tf'.get_cookid()}, $txtforumtemplate;
	$tf = ${'tf'.get_cookid()};

	if (user_pass_match($tf['user'],$tf['pass']))
	{
		$us = get_user_data($tf['user']);
		if ($us!=false)
		{
			$td = dir_templates.$us[13].'/';
			if (is_dir($td))
			{
				return($td);
			}
		}
	}
	if (strlen($txtforumtemplate))
	{
		if (is_dir(dir_templates.$txtforumtemplate))
		{
			return dir_templates.$txtforumtemplate.'/';
		}
	}
	if (file_exists(f_settings))
	{
		$settings = get_settings();
		return (dir_templates.$settings[2].'/');
	}
	else
	{
		return dir_templates.template.'/';
	}
}

# returns current user or board default language file path
function get_langfile_path()
{
	global ${'tf'.get_cookid()};
	$tf = ${'tf'.get_cookid()};
	if (user_pass_match($tf['user'],$tf['pass']))
	{
		$us = get_user_data($tf['user']);
		if ($us!=false)
		{
			$lf = dir_languages.$us[12];
			if (file_exists($lf) && filesize($lf)>2*1024)
			{
				return $lf;
			}
		}
	}

	if (check_default_language==true)
	{
		$lang = language_accept(get_available_languages());
		if ($lang != '')
		{
			return dir_languages.$lang.'.php';
		}
	}

	if (file_exists(f_settings))
	{
		$settings = get_settings();
		return (dir_languages.$settings[1]);
	}
	else
	{
		return dir_languages.language.'.php';
	}
}

# returns current lang (et, en etc)
function get_lang($langfilepath)
{
	$langfile = explode('/', $langfilepath);
	$langfile = $langfile[count($langfile)-1];
	$lang = explode('.', $langfile);
	$lang = $lang[count($lang)-2];
	return $lang;
}

# returns css file path
function get_css_path()
{
	$template_path = get_template_path();
	$array = explode('/',$template_path);
	$template = $array[count($array)-2];
	if (file_exists($template_path.$template.'.css'))
	{
		return $template_path.$template.'.css';
	}
	elseif (file_exists($template_path.'style.css'))
	{
		return $template_path.'style.css';
	}
	elseif (file_exists('style.css'))
	{
		return 'style.css';
	}
	else
	{
		return false;
	}
}

# returns template source
function get_template($template_path)
{
	global $l;
	if (!file_exists($template_path))
	{
		return ('<br>'.$l['Unable_load_template'].' : '.$template_path."\n");
	}

	$file_content = file($template_path);
	$file_content[] =''; # otherwise gives sometimes error...
	return implode('',$file_content);
}

# returns array with users groups where array key is group id
# and element contains group name
function get_users_groups()
{
	$content = file(f_users_groups);
	if (is_array($content))
	{
		foreach($content as $line)
		{
			$a = explode(d,$line);
			$id = $a[0];
			$return_array[$id] = $a[1];
		}
		return $return_array;
	}
	return false;
}

# returns array with asked user info
function get_user_data($username)
{
	if (!file_exists(f_users))
	{
		return false;
	}

	$file_content = file(f_users);
	foreach ($file_content as $line)
	{
		$array = explode(d, trim($line));
		if (strtolower($array[0])==strtolower($username))
		{
			return $array;
		}
	}
	return false;
}

# returns asked topic_id category id
function get_fid_from_header($topic_id)
{
	$header = file(f_header);
	foreach($header as $line)
	{
		$array = explode(d, $line);
		if ($array[6]==$topic_id)
		{
			return $array[0];
		}
	}
	return false;
}

# returns asked topic data 
function get_data_from_header($topic_id)
{
	$header = file(f_header);
	foreach($header as $line)
	{
		$array = explode(d, $line);
		if ($array[6]==$topic_id)
		{
			return $array;
		}
	}
	return false;
}


function get_favicon_path()
{
	global $PHP_SELF, $SERVER_NAME;
	$server_path = 'http://'.$SERVER_NAME.dirname($PHP_SELF);

	if (file_exists(get_template_path().'favicon.ico'))
	{
		return $server_path.substr(get_template_path(),1).'favicon.ico';
	}
	else if (file_exists(get_template_path().'img/favicon.ico'))
	{
		return $server_path.substr(get_template_path(),1).'img/favicon.ico';
	}
	else if (file_exists(dir_img.'favicon.ico'))
	{
		return $server_path.substr(dir_img,1).'favicon.ico';
	}
	else
	{
		return false;
	}
	
}


# returns true if current user is with admin privileges
function admin_in()
{
	$tf = ${'tf'.get_cookid};
	global $tf;
	$ud=get_user_data($tf['user']);
	if ($ud != false && $ud[4]==2)
	{
		return true;
	}
	return false;
}

# returns true if current user is moderator
function mode_in()
{
	$tf = ${'tf'.get_cookid};
	global $tf;
	$ud=get_user_data($tf['user']);
	if ($ud != false && $ud[4]==1)
	{
		return true;
	}
	return false;
}

function get_user_group($username)
{
	$ud=get_user_data($username);
	$ret = ($ud == false) ?false:$ud[4];
	return $ret;
}

# returns listbox with users groups, selected 
# options sets which option is default
function list_usersgroups($selected_option=0)
{
	$list_usersgroups = '<select name="f[usersgroups]">';
	$groups = get_users_groups();
	foreach($groups as $id=>$group_name)
	{
		if ($id == $selected_option)
		{
			$s = ' selected="selected"';
		}
		else
		{
			$s = '';
		}
		$list_usersgroups .= '<option value="'.$id.'"'.$s.'>'.$group_name.'</option>'."\n";
	}
	$list_usersgroups .= '</select>';

	return $list_usersgroups;
}

# returns listbox with existing languages
function list_languages($selected='')
{
	$filez = file_list(dir_languages,'\.php$');
	$list_languages = '<select name="f[language]">';
	if (is_array($filez))
	{
		foreach($filez as $file)
		{
			if ($file==$selected)
			{
				$s = ' selected="selected"';
			}
			else
			{
				$s = '';
			}
			$list_languages .= '<option value="'.$file.'"'.$s.'>'.$file.'</option>'."\n";
		}
	}
	$list_languages .= '</select>';

	return $list_languages;
}

# returns listbox with existing templates
function list_templates($selected='')
{
	$dirz = dir_list(dir_templates);
	$list_templates = '<select name="f[template]">';
	if (is_array($dirz))
	{
		foreach($dirz as $dir)
		{
			if ($dir == $selected)
			{
				$s = ' selected="selected"';
			}
			else
			{
				$s = '';
			}
			$list_templates .= '<option value="'.$dir.'"'.$s.'>'.$dir.'</option>'."\n";
		}
	}
	$list_templates .= '</select>';

	return $list_templates;
}


# returns listbox with forums (if they are more than 1)
function list_forums($selected='', $jumpbox=true)
{
	global $l, $PHP_SELF;
	$forums = file(f_categories);
	$list='';

	if ($jumpbox==true)
	{
		$list  = '<form name="hopform">';
		$js = 'onChange="JavaScript:change_forum()"';
	}
	$list .= '<select name="forums_list"'.$js.'>';
	$list .= '<option value="-1">'.$l['Select_forum'].':</option>';
	$list .= '<option value="-1"></option>';
	$i=-1;

	foreach($forums as $forum)
	{
		$i++;
		$cat = explode(d, $forum);

		if ($i==$selected)
		{
			$s = ' selected="selected"';
		}
		else
		{
			$s= '';
		}
		$list .= '<option value="'.$i.'"'.$s.'>'.$cat[0]."</option>\n";
	}

	$list .= '</select>';
	if ($jumpbox==true)
	{
		$list .= '</form>';
	}

	return $list;
}

# checks if username exists
function user_exists($username)
{
	$user_data = get_user_data($username);
	if ($user_data == false)
	{
		return false;
	}
	else
	{
		return true;
	}

	return false;
}

# checks that logged in user username/password match
function user_pass_match($username,$password)
{
	$userdata = get_user_data($username);
	if ($userdata == false)
	{
		return false;
	}
	elseif(strtolower($username) == strtolower($userdata[0]) && md5($password)==$userdata[1])
	{
		return true;
	}
	
	return false;
}

# checks that password match and logs user "in"
function do_login($username,$password,$remember)
{
	global $l, $PHP_SELF;

	if (user_pass_match($username,$password))
	{
		$time = ($remember=='on') ? cookie_expiry2 : cookie_expiry;
		cookie('tf'.get_cookid().'[user]',$username,$time);
		cookie('tf'.get_cookid().'[pass]',$password,$time);
		goto_url($PHP_SELF);
	}
	else
	{
		alert ($l['Incorrect_username']);
		goto_url($PHP_SELF);
	}
}

function do_logout()
{
	global $PHP_SELF;
	cookie('tf'.get_cookid().'[user]','',0);
	cookie('tf'.get_cookid().'[pass]','',0);
	goto_url($PHP_SELF);
}

# form for users adding
function form_add_user($error_message='')
{
	global $f, $l, $PHP_SELF, $t, $f_avatar;

	# first we find templatefiles paths
	$f_profile = get_template_path().'form_profile.htm';
	$f_username = get_template_path().'form_profile_name_0.htm';

	# then we set default values for language, template, homepage, etc
	if (!isset($f['language']))
	{
		$f['language']=lang.'.php';
	}
	if (!isset($f['template']))
	{
		$f['template'] = template;
	}
	if (!isset($f['homepage']))
	{
		$f['homepage'] = 'http://';
	}

	if (get_img_size==false)
	{
		$t['choose_avatar'] = parse_tpl(get_template(get_template_path().'form_profile_choose_avatar.htm'));
	}
	else
	{
		$f_avatar= 'http://';
	}


	# values for template fields
	$t['action'] = 'add_user';
	$t['error_msg'] = $error_message;
	$t['username_str'] = parse_tpl(get_template($f_username));
	$t['languages_list'] = list_languages($f['language']);
	$t['templates_list'] = list_templates($f['template']);

	# template reading, parsing and printing
	$tpl = get_template($f_profile);
	print parse_tpl($tpl);
}

# saves new user data into the usersfile
# if users file not yet exists then user 
# is in administrator privileges
function add_user()
{
	global $f,$l,$PHP_SELF,$t, $f_avatar;

	# user data validating...
	# first we replace all delimiter chars with they html values
	$f = replace_delimiter_char($f);
	$f = replace_newlines($f);
	$f = cut_shorter($f, array('homepage'=>128,'signature'=>255), 30);

	$f_avatar = replace_delimiter_char_str($f_avatar);
	$f_avatar = replace_newlines_str($f_avatar);
	$f_avatar = cut_shorter_str($f_avatar,256);

	$f['username']=trim($f['username']);

	if (!array_chars_ok($f,unallowed_chars) || !chars_ok($f_avatar,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		#form_add_user($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;
	}
	if (strlen($f['username'])<1)
	{
		err_msg($l['Missing_username']);
		#form_add_user($l['Missing_username']);
		return false;
	}
	if (user_exists($f['username']))
	{
		err_msg($l['Username_exists']);
		#form_add_user($l['Username_exists']);
		return false;
	}
	if (strlen($f['password'])<1)
	{
		err_msg($l['Missing_password']);
		#form_add_user($l['Missing_password']);
		return false;
	}
	if (!is_email($f['email']))
	{
		err_msg($l['Incorrect_email']);
		#form_add_user($l['Incorrect_email']);
		return false;
	}

	# if there arent yet any user we make so that 
	# first user usergroup is 2 - thats admin
	if (!file_exists(f_users))
	{
		$user_group = 2;
		$new_file = true;
	}
	else
	{
		$user_group = 0;
		$new_file = false;
	}

	if ($f_avatar=='http://')
	{
		$f_avatar='';
	}


	if ($f['homepage'] == 'http://')
	{
		$f['homepage'] = '';
	}


	if (strlen($f['avatar']) > 0 && eregi(implode('|',explode(',',avatar_img_types)),$f['avatar'])==false)
	{
		err_msg($l['Incorrect_avatar_type']. ' ('.avatar_img_types.')');
		#form_modify_profile($username, $l['Incorrect_avatar_type']. ' ('.avatar_img_types.')');
		return false;
	}

	if (get_img_size==true)
	{
		# if avatar is with correct extension then we check its size
		# if its larger than allowed or smaller than 2x2 pixels we remove it
		if (strlen($f['avatar'])>0)
		{
			$avatar_dimensions = @getimagesize($f['avatar']);
			if ($avatar_dimensions[0] > avatar_max_width || $avatar_dimensions[1]>avatar_max_height)
			{
				err_msg($l['Avatar_is_too_big']. ' ('.avatar_max_width .'x'.avatar_max_height.' px)');
				#form_modify_profile($username, $l['Avatar_is_too_big']. ' ('.avatar_max_width .'x'.avatar_max_height.' px)');
				return false;
				# $f['avatar']='';
			}
		}
	}
	else
	{
		if (file_exists(dir_avatars.$f_avatar)==false || stristr($f_avatar,'../'))
		{
			$f_avatar = '';
		}
	}

	$password = md5($f['password']);
	$u_array = array($f['username'], $password, $f['email'], time(), $user_group, $f['short_description'], $f_avatar, $f['msn'], $f['homepage'], $f['location'], $f['occupation'], $f['signature'], $f['language'], $f['template']);
	# we make array with 19 elements, not all are filled 
	# but its reserve for simpler future upgrading
	$u_array = array_pad($u_array,19,'');
	$u_str = implode(d,$u_array)."\n";

	$fp = fopen(f_users, 'a');
	flokk ? flock($fp, 2) : '';
	$new_file == true ? fwrite($fp, '<?php die("NOT FOR YOUR EYES, SIR."); ?>'."\n") : '';
	fwrite($fp,$u_str);
	fclose($fp);

	do_login($f['username'],$f['password'],'');
	#goto_url($PHP_SELF,1);
	return true;
}

# form for category adding
function form_add_cat($error_message="")
{
	global $f, $l, $PHP_SELF, $t;

	# first we find templatefiles paths
	$f_category = get_template_path().'admin_form_category.htm';
	if (!isset($f))
	{
		# default values for **
		if (!isset($f['cat_name']))
		{
			$f['cat_name'] = 'Nameless GateGlory';
		}
		if (!isset($f['all_pipl_can_read']))
		{
			$f['all_pipl_can_read_value'] = ' checked="checked"';
			}
		if (!isset($f['all_pipl_can_post']))
		{
			$f['all_pipl_can_post_value'] = ' checked="checked"';
		}
		if (!isset($f['only_admin_can_start_thread']))
		{
			$f['only_admin_can_start_thread_value'] = '';
		}
		if (!isset($f['hidden']))
		{
			$f['hidden'] = '';
		}
	}

	# seems like only way to check some checkbox is set checked=checked
	# unfortunally checked=false or checked=off didnt work
	# so we must check values and set them with manually...
	if (strtolower($f['all_pipl_can_read'])=='on')
	{
		$f['all_pipl_can_read_value'] = ' checked="checked"';
	}
	if (strtolower($f['all_pipl_can_post'])=='on')
	{
		$f['all_pipl_can_post_value'] = ' checked="checked"';
	}
	if (strtolower($f['only_admin_can_start_thread'])=='on')
	{
		$f['only_admin_can_start_thread_value'] = ' checked="checked"';
	}
	if (strtolower($f['hidden'])=='on')
	{
		$f['hidden'] = ' checked="checked"';
	}

	# values for template fields
	$t['cat_action'] = 'admin&add_cat=1';
	$t['error_msg'] = $error_message;

	# template reading, parsing and printing
	$tpl = get_template($f_category);
	print parse_tpl($tpl);
}

# category data validating and saving
function add_cat()
{
	global $f,$l,$PHP_SELF,$t;

	# user data validating... ($f is array with all form variables)
	# first we replace all delimiter chars with they html values
	$f = replace_delimiter_char($f);
	$f = replace_newlines($f);
	$f = cut_shorter($f, array('cat_description'=>255), 40);

	if (!array_chars_ok($f,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		#form_add_cat($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;
	}
	if (strlen($f['cat_name'])<3)
	{
		err_msg($l['Missing_cat_name'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		#form_add_cat($l['Missing_cat_name'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		return false;
	}

	# reading/posting options
	$o1 = ($f['all_pipl_can_read']=='on') ? 1 : 0;
	$o2 = ($f['all_pipl_can_post']=='on') ? 1 : 0;
	$o3 = ($f['only_admin_can_start_thread']=='on') ? 1 : 0;
	$o4 = ($f['hidden']=='on') ? 1 : 0;

	if (!file_exists(f_categories))
	{
		$forum_order = 1;
	}
	else
	{
		# dunno is it so simple. maybe future bug?
		# $forum_order = count(file(f_categories))+1;

		# ies, tis is bitter
		$fs = file(f_categories);

		# we search biggest order no from file
		foreach($fs as $line)
		{
			$a = explode(d, $line);
			$int = ($a[2]>$int)?$a[2]:$int;
		}
		$forum_order=$int+1;
	}


	$array = array($f['cat_name'], $f['cat_description'], $forum_order, $o1, $o2, $o3);
	$array = array_pad($array,16,'');

	$str = implode(d, $array);

	$fp=fopen(f_categories,'a');
	flokk ? flock($fp,2) : '';
	fwrite($fp, $str."\n");
	fclose($fp);

	$url = $PHP_SELF.'?action=admin';
	$forum_order == 1 ? $url .= '&main_settings=1' : '';
	goto_url($url);
}

# here are listed all admin features
function form_admin_control_panel()
{
	global $l,$PHP_SELF;
	$tpl_name = get_template_path().'admin_control_panel.htm';
	$tpl = get_template($tpl_name);
	print parse_tpl($tpl);
}

function form_admin_upgrade()
{
	global $l, $PHP_SELF, $t;
	$t['category_list'] = list_forums(-1, false);
	$t['data_dir'] = data_dir;
	$tpl_name = get_template_path().'admin_upgrade.htm';
	$tpl = get_template($tpl_name);
	print parse_tpl($tpl);
}

# shows main settings form for admin
function form_admin_main_settings($error_str='')
{
	global $l,$t,$f,$PHP_SELF;

	$settings = get_settings();
	$settings = html2entities($settings);
	$f['board_name'] = (isset($f['board_name'])) ? $f['board_name'] : $settings[0];
	$t['languages_list'] = (isset($f['language'])) ? list_languages($f['language']) : list_languages($settings[1]);
	$t['templates_list'] = (isset($f['template'])) ? list_templates($f['template']) : list_templates($settings[2]);
	$t['error_msg']=$error_str;
	$t['main_action'] = 'admin&save_settings=1';

	$tpl_name = get_template_path().'admin_main_settings.htm';
	$tpl = get_template($tpl_name);
	print parse_tpl($tpl);
}

# saves main settings
function save_main_settings()
{
	global $f, $l, $PHP_SELF;
	$f = replace_delimiter_char($f);
	$f = replace_newlines($f);
	$f = cut_shorter($f, '', 100);
	$f['board_name'] = stripslashes($f['board_name']);

	if (!array_chars_ok($f,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;
		#form_admin_main_settings($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
	}
	if (strlen($f['board_name'])<3)
	{
		err_msg($l['Missing_board_name'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		return false;
		#form_admin_main_settings($l['Missing_board_name'].' ('.sprintf($l['At_least_n_chars'],'3').')');
	}

	$settings = get_settings();
	$settings[0] = $f['board_name'];
	$settings[1] = $f['language'];
	$settings[2] = $f['template'];

	$str = implode(d, $settings);

	$fp=fopen(f_settings,'w');
	flokk ? flock($fp,2):'';
	fputs($fp,$str);
	fclose($fp);
	goto_url($PHP_SELF.'?action=admin',1);
	return true;
}

# list with all categories : adding/modificating/deleting,
# pushing cats up or pulling down (for admin eyes only)
function form_admin_cats_settings()
{
	global $l,$t,$f,$PHP_SELF;

	# first we generate category list from f_categories & 
	# parse them with tpl to get all rows
	$categories = file(f_categories);
	$i=-1;
	foreach($categories as $c)
	{
		$i++;
		$a = explode(d, $c);
		$a[14] = $i;
		$s = implode(d,$a);
		$categories[$i] = $s;
	}
	$categories=sort_array($categories, 2, d,false);

	#print '<pre>';
	#print_r($categories);

	$f_row_tpl = get_template_path().'admin_form_cats_row.htm';
	$row_tpl = get_template($f_row_tpl);
	for ($i=0;$i<count($categories);$i++)
	{
		$t['css_no'] = ( $i % 2 ) ? '1':'0';
		$a = explode(d, trim($categories[$i]));
		
		$t['cid'] = $i;
		$t['order'] = $a[2];
		$t['push_up'] = ($a[2] > 1 && count($categories)>2) ? parse_tpl(get_template(get_template_path().'admin_form_cats_up.htm')) : '';
		$t['pull_down'] = ($a[2] < count($categories)) ? parse_tpl(get_template(get_template_path().'admin_form_cats_down.htm')) : '';

		$t['current_cat_name'] = cut_shorter_str($a[0]);
		$t['cat_id'] = $a[14];

		$rows_string .= parse_tpl($row_tpl);
	}

	$t['rows_string'] = $rows_string;

	$tpl_name = get_template_path().'admin_form_cats.htm';
	$tpl = get_template($tpl_name);
	print parse_tpl($tpl);
}

# categlory modification form for admin...
function form_admin_modify_cat($cid, $error_msg='')
{
	global $f, $l, $t, $PHP_SELF;
	
	# first we find templatefiles paths
	if (!isset($f))
	{
		$fs = file(f_categories);
		if (!isset($fs[$cid]))
		{
			return false;
		}
		$category_data = explode(d,$fs[$cid]);
		$category_data = html2entities($category_data);

		$f['cat_name'] = $category_data[0];
		$f['cat_description'] = $category_data[1];

		$f['all_pipl_can_read_value'] = ($category_data[3]==1) ? ' checked="checked"' : '';
		$f['all_pipl_can_post_value'] = ($category_data[4]==1) ? ' checked="checked"' : '';
		$f['only_admin_can_start_thread_value'] = ($category_data[5]==1) ? ' checked="checked"' : '';
		$f['hidden'] = ($category_data[12]==1) ? ' checked="checked"' : '';
	}

	# seems like only way to check some checkbox is set checked=checked
	# unfortunally checked=false or checked=off didnt work
	# so we must check values and set them manually...
	if (strtolower($f['all_pipl_can_read'])=='on')
	{
		$f['all_pipl_can_read_value'] = ' checked="checked"';
	}
	if (strtolower($f['all_pipl_can_post'])=='on')
	{
		$f['all_pipl_can_post_value'] = ' checked="checked"';
	}
	if (strtolower($f['only_admin_can_start_thread'])=='on')
	{
		$f['only_admin_can_start_thread_value'] = ' checked="checked"';
	}
	if (strtolower($f['hidden'])=='on')
	{
		$f['hidden'] = ' checked="checked"';
	}

	
	$f_tpl = get_template_path().'admin_form_category.htm';

	# values for template fields
	$t['cat_action'] = 'admin&save_cat_modify=1&cid='.$cid;
	$t['error_msg'] = $error_msg;

	# template reading, parsing and printing
	$tpl = get_template($f_tpl);
	print parse_tpl($tpl);
}

# saves modifications in categories
function admin_save_cat_modify($cid)
{
	global $l, $f, $PHP_SELF;
	$f = replace_delimiter_char($f);
	$f = replace_newlines($f);
	$f = cut_shorter($f, array('cat_description'=>255), 40);
	
	if (!array_chars_ok($f,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;

		#form_admin_modify_cat($cid, $l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
	}
	if (strlen($f['cat_name'])<3)
	{
		err_msg($l['Missing_cat_name'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		#form_admin_modify_cat($cid, $l['Missing_cat_name'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		return false;
	}

	$fs = file(f_categories);
	$val = explode(d, $fs[$cid]);
	
	$val[0] = $f['cat_name'];
	$val[1] = $f['cat_description'];
	$val[3] = ($f['all_pipl_can_read']=='on') ? 1 : 0;
	$val[4] = ($f['all_pipl_can_post']=='on') ? 1 : 0;
	$val[5] = ($f['only_admin_can_start_thread']=='on') ? 1 : 0;
	$val[12] = ($f['hidden']=='on') ? 1 : 0;

	$s = implode(d, $val);
	$fs[$cid] = $s;

	save_file($fs, f_categories, flokk);
	goto_url($PHP_SELF.'?action=admin&cats=1');
}


# changes categories sorting order either up or down
function move_cat($order_id,$direction)
{
	global $PHP_SELF;
	$fs = file(f_categories);

	if ($direction=='up'||$direction='down')
	{
		if ($direction=='up')
		{
			$i=-1;
			foreach($fs as $line)
			{
				$i++;
				$arr = explode(d, $line);
				if ($arr[2]==$order_id-1)
				{
					$reminder = $i;
					break;
				}
			}

			$i=-1;
			foreach($fs as $line)
			{
				$i++;
				$arr = explode(d, $line);
				if ($arr[2]==$order_id)
				{
					$arr[2] = $arr[2]-1;
					$s = implode(d, $arr);
					$fs[$i]=$s;
					break;
				}
			}
			if (isset($reminder))
			{
				$arr = explode(d, $fs[$reminder]);
				$arr[2] = $arr[2]+1;
				$s = implode(d, $arr);
				$fs[$reminder]=$s;
			}
		}

		# now same story but vice versa
		if ($direction=='down')
		{
			$i=-1;
			foreach($fs as $line)
			{
				$i++;
				$arr = explode(d, $line);
				if ($arr[2]==$order_id+1)
				{
					$reminder = $i;
					break;
				}
			}

			$i=-1;
			foreach($fs as $line)
			{
				$i++;
				$arr = explode(d, $line);
				if ($arr[2]==$order_id)
				{
					$arr[2] = $arr[2]+1;
					$s = implode(d, $arr);
					$fs[$i]=$s;
					break;
				}
			}
			if (isset($reminder))
			{
				$arr = explode(d, $fs[$reminder]);
				$arr[2] = $arr[2]-1;
				$s = implode(d, $arr);
				$fs[$reminder]=$s;
			}
		}
		save_file($fs, f_categories, flokk);
	}
	goto_url($PHP_SELF.'?action=admin&cats=1');
}

# function deletes category from categories file
# (and all messages, what located in same category)
function delete_cat($id)
{
	global $PHP_SELF;
	$save_flag = false;

	$fs = file(f_categories);
	unset($fs[$id]);
	save_file($fs, f_categories, flokk);

	$header = file(f_header);
	$i=-1;
	foreach($header as $line)
	{
		$i++;
		$a = explode(d, $line);
		if ($a[0]==$id)
		{
			$save_flag = true;
			$fn = dir_data.date('YmdHis',$a[6]).msg_ext;
			file_exists($fn) ? unlink($fn) : '';
			unset($header[$i]);
		}
	}

	if ($save_flag==true)
	{
		save_file($header,f_header,flokk);
	}

	goto_url($PHP_SELF.'?action=admin&cats=1');
}


# form for user data modifing for user/admin
function form_modify_profile($user_name, $error_msg='')
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l, $f_avatar;

	if (($user_name==$tf['user'] && user_pass_match($tf['user'],$tf['pass'])) || admin_in())
	{
		$t['username'] = $user_name;
		$t['username_str'] = parse_tpl(get_template(get_template_path().'form_profile_name_1.htm'));

		# if there not exists form elements then we load data from usersfile
		if (!isset($f))
		{
			$settings = get_user_data($user_name);
			$settings = html2entities($settings);
			$f['password']='';
			$f['email']=$settings[2];
			$f['short_description']=stripslashes($settings[5]);
			if (get_img_size==false)
			{
				$f_avatar=(strlen($settings[6])==0) ? '' : $settings[6];
				$t['myavatar'] = $f_avatar;
				$t['choose_avatar'] = parse_tpl(get_template(get_template_path().'form_profile_choose_avatar.htm'));
				#$f['avatars_str'] = parse_tpl(get_template(get_template_path().''));
			}
			else
			{
				$f_avatar=(strlen($settings[6])==0) ? 'http://' : $settings[6];
			}
			$f['msn']=$settings[7];
			$f['homepage']=(strlen($settings[8])==0) ? 'http://' : $settings[8];
			$f['location']=$settings[9];
			$f['occupation']=stripslashes($settings[10]);
			$f['signature']=stripslashes(nl2br_($settings[11],"\n"));

			$t['languages_list'] = list_languages($settings[12]);
			$t['templates_list'] = list_templates($settings[13]);
		}
		else
		{
			$t['languages_list'] = list_languages($f['language']);
			$t['templates_list'] = list_templates($f['template']);
		}

		$t['error_msg'] = $error_msg;
		$t['action'] = 'save_profile&user='.$user_name;
		print parse_tpl(get_template(get_template_path().'form_profile.htm'));
	}
	else
	{
		# user attempt to change other account (only admin can do it)
		print $l['Not_for_your_eyes'];
		return false;
	}
}

# validates form elements and if they are 
# correct -- saves and goes to forum mainpage
function save_profile($username)
{
	global $f,$l,$PHP_SELF,$t,$f_avatar;

	# user data validating...
	# first we replace all delimiter chars with they html values
	$f = replace_delimiter_char($f);
	$f_avatar = replace_delimiter_char_str($f_avatar);
	$f_avatar = replace_newlines_str($f_avatar);
	$f_avatar = cut_shorter_str($f_avatar,256);

	$f = replace_newlines($f);

	$f = cut_shorter($f, array('homepage'=>128,'signature'=>255), 30);


	if (!array_chars_ok($f,unallowed_chars)||!chars_ok($f_avatar, unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		#form_modify_profile($username, $l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;
	}
	if (!is_email($f['email']))
	{
		err_msg($l['Incorrect_email']);
		#form_modify_profile($username, $l['Incorrect_email']);
		return false;
	}

	# we abolish empty avatar and homepage (total 14 bytes saving!)
	# we remove avatar only whet it is still equal with 'http' or when
	# it does not match to regular expression with allowed avatar_img_types
	if ($f_avatar=='http://')
	{
		$f_avatar='';
	}

	if (strlen($f['avatar']) > 0 && eregi(implode('|',explode(',',avatar_img_types)),$f['avatar'])==false)
	{
		err_msg($l['Incorrect_avatar_type']. ' ('.avatar_img_types.')');
		#form_modify_profile($username, $l['Incorrect_avatar_type']. ' ('.avatar_img_types.')');
		return false;
	}


	if (get_img_size==true)
	{
		# if avatar is with correct extension then we check its size
		# if its larger than allowed or smaller than 2x2 pixels we remove it
		if (strlen($f['avatar'])>0)
		{
			$avatar_dimensions = @getimagesize($f['avatar']);
			# ||$avatar_dimensions[0] < 2 || $avatar_dimensions[1] < 2
			if ($avatar_dimensions[0] > avatar_max_width || $avatar_dimensions[1]>avatar_max_height)
			{
				err_msg($l['Avatar_is_too_big']. ' ('.avatar_max_width .'x'.avatar_max_height.' px)');
				#form_modify_profile($username, $l['Avatar_is_too_big']. ' ('.avatar_max_width .'x'.avatar_max_height.' px)');
				return false;
				# $f['avatar']='';
			}
		}
	}
	else
	{
		if (file_exists(dir_avatars.$f_avatar)==false || stristr($f_avatar,'../'))
		{
			$f_avatar = '';
		}
	}


	if ($f['homepage']=='http://')
	{
		$f['homepage']='';
	}


	$old_userdata = get_user_data($username);
	if ($old_userdata==false)
	{
		return false;
	}

	$password = ($f['password']=='') ? $old_userdata[1] : md5($f['password']);
	$reg_date = $old_userdata[3];
	$user_group = $old_userdata[4];
	$postings = $old_userdata[14];

	$u_array = array($username, $password, $f['email'], $reg_date, $user_group, $f['short_description'], $f_avatar, $f['msn'], $f['homepage'], $f['location'], $f['occupation'], $f['signature'], $f['language'], $f['template'],$postings);
	# we make array with 19 elements, not all are filled 
	# but its reserve for simpler future upgrading
	$u_array = array_pad($u_array,19,'');
	$u_str = implode(d,$u_array)."\n";

	# now we read old userdata into memory
	$fs = file(f_users);

	for($i=0;$i<count($fs);$i++)
	{
		# update certain user line
		$array = explode(d, $fs[$i]); 
		if (strtolower($array[0]) == strtolower($username))
		{
			$fs[$i] = $u_str;
		}
	}
	# and save result into the file
	$x = save_file($fs,f_users,flokk);
	goto_url($PHP_SELF,1);
	return true;
}


# shows categories list
function print_categories_list()
{
	global $f,$l,$PHP_SELF,$t;

	$categories = file(f_categories);
	$i=-1;
	foreach($categories as $c)
	{
		$i++;
		$a = explode(d, $c);
		$a[14] = $i;
		$s = implode(d,$a);
		$categories[$i] = $s;
	}
	$categories=sort_array($categories, 2, d,false);
	$settings = get_settings();
	$t['board_name'] = $settings[0];

	$tpl_cat_row = get_template(get_template_path().'categories_row.htm');

	$i=-1;
	foreach($categories  as $cat)
	{
		$i++;
		$current_cat = explode(d, $cat);
		if ($current_cat[12] != 1) 
		{
			$t['category_name'] = stripslashes($current_cat[0]);
			$t['category_description'] = stripslashes(nl2br_($current_cat[1]));
			$t['css_id'] = ($i%2) ? '1' : '0';
			$t['postings_in_forum'] = ($current_cat[10]<1) ? 0 : $current_cat[10];
			$t['topics_in_forum'] = ($current_cat[11]<1) ? 0 : $current_cat[11];
			$t['last_posting_time'] = (strlen($current_cat[7]>1)) ? date(time_format,$current_cat[7]) : $l['Unknown'];
			if (strlen($current_cat[6])>0)
			{
				$t['author'] = $current_cat[6];
				$t['short_author'] = cut_shorter_str($t['author'],15);

				if (user_exists($t['author']))
				{
					$t['last_author'] = parse_tpl(get_template(get_template_path().'categories_row_reg_user.htm'));
				}
				else 
				{
					$t['last_author'] = parse_tpl(get_template(get_template_path().'categories_row_unreg_user.htm'));
				}
			}
			else
			{
				$t['last_author']='';
			}

			if (strlen($current_cat[7])>1 && strlen($current_cat[9])>1)
			{
				$t['page'] = ceil(count(@file(dir_data.date('YmdHis', $current_cat[7]).msg_ext))/max_postings_per_page)-1;
				$t['thread'] =$current_cat[7];
				$t['topic'] =$current_cat[8];
				$t['subject']=cut_shorter_str($current_cat[9],15);

				$t['last_posting'] = parse_tpl(get_template(get_template_path().'categories_row_lastposting.htm'));
			}
			else
			{
				$t['topic'] = $t['subject'] = $t['last_posting'] = '';
			}

			#$file_name = date('YmdHis',$topic).msg_ext;
			#$total_pages = ceil(count(file(dir_data.$file_name))/max_postings_per_page)-1;
			#$page = $PHP_SELF.'?action=view&topic='.$topic;
			#$total_pages > 0 ? $page .= '&p='.$total_pages : '';

			$t['fid'] = $current_cat[14];
			$rows_str .= parse_tpl($tpl_cat_row);
		}
	}
	$t['category_rows'] = $rows_str;
	print parse_tpl(get_template(get_template_path().'categories_page.htm'));
}




# saves last posting data and updates topics and messages numbers
function update_cat_file($cid, $time, $postings_balance, $topics_balance, $poster_name, $subject, $replytime)
{
	$fs = file(f_categories);
	$a = explode(d, $fs[$cid]);

	if (strlen($poster_name)>0){ $a[6] = $poster_name; }
	if (strlen($time)>0){ $a[7] = $time; }
	if (strlen($replytime)>0) { $a[8] = $replytime; }
	if (strlen($subject)>0){ $a[9] = $subject; }

	$a[10] = $a[10]+$postings_balance;
	$a[11] = $a[11]+$topics_balance;

	if ($a[10]<0)
	{
		$a[10]=0;
	}
	if ($a[11]<0)
	{
		$a[11]=0;
	}

	$str = implode(d,$a);
	$fs[$cid] = $str;

	save_file($fs, f_categories, flokk);
}

# increases or decreases user postings
function update_users_file($username, $postings_balance)
{
	if (user_exists($username))
	{
		$fs = file(f_users);

		for($i=0;$i<count($fs);$i++)
		{
			$a = explode(d, $fs[$i]);
			if (strtolower($username)==strtolower($a[0]))
			{
				$a[14] = $a[14]+$postings_balance;
				$str = implode(d,$a);
				$fs[$i]=$str;
				break;
			}
		}
		save_file($fs, f_users, flokk);
	}
}

# updates views in header
function update_header_views_and_replies($topic_id, $balance_views, $balance_replies)
{
	$headers = file(f_header);
	$i=-1;
	foreach($headers as $line)
	{
		$i++;
		$array = explode(d, $line);
		if ($array[6]==$topic_id)
		{
			$array[5] = $array[5] + $balance_views;
			$array[4] = $array[4] + $balance_replies;
			$str_line = implode(d, $array);
			$headers[$i]=$str_line;
			save_file($headers,f_header,flokk);
			return true;
		}
	}
	return false;
}

# updates header information
function update_header_2($topic, $balance_replies, $last_author, $last_posting_time)
{
	$headers = file(f_header);
	$i=-1;
	foreach($headers as $line)
	{
		$i++;
		$array = explode(d, $line);
		if ($array[6]==$topic)
		{
			$array[3] = $last_author;
			$array[4] = $array[4] + $balance_replies;
			$array[7] = $last_posting_time;
			$str_line = implode(d, $array);
			$headers[$i]=$str_line;
			save_file($headers,f_header,flokk);
			return true;
		}
	}
	return false;

}


# form for making new posting to specific page....
function form_new_page_posting($fid='',$subject='',$error_str='')
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l;

	# if user isn't registrered we give him/her textboxes for email and name
	if (user_pass_match($tf['user'],$tf['pass'])==false)
	{
		$t['user_data']=parse_tpl(get_template(get_template_path().'form_posting_userdata.htm'));
	}

	$f['posting_smileys_value']=($f['posting_smileys']=='on') ? ' checked="checked"' : '';
	$t['form_header'] = $l['New_topic'];
	$t['error_str']=$error_str;
	$t['posting_action'] = 'send&fid='.$fid;
	$t['posting_icons'] = icon_bar($f['topic_icon']);
	$t['smileys'] = tpl_get_smileys();
	$f[posting_subject] = $subject;
	print parse_tpl(get_template(get_template_path().'form_posting.htm'));
}


# form for making new posting....
function form_new_posting($fid='',$error_str='')
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l;

	$cat_data = get_category($fid);
	if ($cat_data[5]==1 && admin_in()==false && mode_in()==false)
	{
		print $l['Only_admin_can_post'];
		return false;
	}

	# if user isn't registrered we give him/her textboxes for email and name
	if (user_pass_match($tf['user'],$tf['pass'])==false)
	{
		$t['user_data']=parse_tpl(get_template(get_template_path().'form_posting_userdata.htm'));
	}

	$f['posting_smileys_value']=($f['posting_smileys']=='on') ? ' checked="checked"' : '';
	$t['form_header'] = $l['New_topic'];
	$t['error_str']=$error_str;
	$t['posting_action'] = 'send&fid='.$fid;
	$t['posting_icons'] = icon_bar($f['topic_icon']);
	$t['smileys'] = tpl_get_smileys();
	print parse_tpl(get_template(get_template_path().'form_posting.htm'));
}


#############################
# function for posting saving
function save_new_posting($fid='',$news=0)
{
	$tf = ${'tf'.get_cookid()};
	global $f, $l, $PHP_SELF, $posting_content, $t, $tf;

	if ($fid=='')
	{
		$fid = 0;
	}

	if (ip_ok()==false)
	{
		err_msg(sprintf($l['Please_wait'], post_interval));
		#form_new_posting($fid, sprintf($l['Please_wait'], post_interval));
		return false;
	}

	$cat_data = get_category($fid);
	
	if ($cat_data[5]==1 && admin_in()==false && mode_in()==false)
	{
		err_msg($l['Only_admin_can_post']);
		#print $l['Only_admin_can_post'];
		return false;
	}
 
	if ($cat_data[4]==0 && user_pass_match($tf['user'],$tf['pass'])==false)
	{
		err_msg($l['Only_users_can_post']);
		#print $l['Only_users_can_post'];
		return false;
	}

	# user data validating...
	admin_in()==false ? $posting_content = substr($posting_content, 0, max_posting_length):'';
	# we replace all delimiter chars with they html values
	$f = replace_delimiter_char($f);
	$posting_content=replace_delimiter_char_str($posting_content);
	$f = replace_newlines($f);
	$posting_content=replace_newlines_str($posting_content);

	$f = cut_shorter($f, '', 50);

	if (!array_chars_ok($f,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		#form_new_posting($fid, $l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;
	}
	if (strlen($f['posting_subject'])<4)
	{
		err_msg($l['Missing_subject'].' ('.sprintf($l['At_least_n_chars'],'4').')');
		#form_new_posting($fid, $l['Missing_subject'].' ('.sprintf($l['At_least_n_chars'],'4').')');
		return false;
	}


	# we seek for user...
	if (strlen($tf['user'])>0)
	{
		$poster_name = $tf['user'];
		$user_data = get_user_data($poster_name);
		$poster_mail = $user_data[2];
	}
	else
	{
		$poster_name = $f['posting_name'];
		$poster_mail = $f['posting_email'];
	}


	if (strlen($poster_name)<1)
	{
		err_msg($l['Missing_username'].' ('.sprintf($l['At_least_n_chars'],'1').')');
#		form_new_posting($fid, $l['Missing_username'].' ('.sprintf($l['At_least_n_chars'],'1').')');
		return false;
	}

	if (user_pass_match($tf['user'],$tf['pass'])==false && user_exists($poster_name)==true)
	{
		err_msg($l['Username_exists']);
#		form_new_posting($fid, $l['Username_exists']);
		return false;
	}

	if (strlen($posting_content)<3)
	{
		err_msg($l['Missing_content'].' ('.sprintf($l['At_least_n_chars'],'3').')');
#		form_new_posting($fid, $l['Missing_content'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		return false;
	}

	$disable_smilies =($f['posting_smileys']=='on') ? 1 : 0;
	$current_time = time();
	$file_name = date('YmdHis',$current_time).msg_ext;

	# main posting file
	$array = array($f['posting_subject'],$poster_name,$poster_mail,'',get_ip(),$current_time,$disable_smilies,$posting_content,$f['topic_icon']);
	$array = array_pad($array, 19, '');
	$posting_str = implode(d, $array);
	
	$fp=fopen(dir_data.$file_name, 'w');
	flokk ? flock($fp,2) : '';
	fwrite($fp, $posting_str."\n");
	fclose($fp);


	# main header file
	$header = array($fid,$f['posting_subject'],$poster_name,$poster_name,1,0,$current_time,$current_time,get_ip(),0,0,$f['topic_icon']);
	$header = array_pad($header, 19, '');
	$header_str = implode(d, $header);
	
	$fp=fopen(f_header, 'a');
	flokk ? flock($fp,2) : '';
	fwrite($fp, $header_str."\n");
	fclose($fp);

	update_cat_file($fid,$current_time,1,1,$poster_name,$f['posting_subject'],$current_time);

	if (user_pass_match($tf['user'],$tf['pass']))
	{
		update_users_file($tf['user'],1);
	}
	if ($news==1)
		goto_url($PHP_SELF.'?action=view_item&topic='.$current_time,1);
	else
		goto_url($PHP_SELF.'?action=view&topic='.$current_time,1);
	return true;
}

#############################
# shows certain forum topics
function show_topics($fid='')
{
	global $l, $page, $PHP_SELF, $QUERY_STRING, $t;
	if ($fid == '')
	{
		$fid = 0;
	}

	if (file_exists(f_header))
	{
		$header_file = file(f_header);

		# now we make new array with topics with asked fid
		# we find regular and sticky threads separately, then we
		# sort them (by last posting) and lastly merge arrays
		foreach ($header_file as $line)
		{
			$a = explode(d, $line);
	
			if ($a[0] == $fid && $a[9]==0)
			{
				$regular_headers[] = $line;
			}
			elseif ($a[0] == $fid && $a[9]==1)
			{
				$sticky_headers[] = $line;
			}
		}

		# we sort them last posting order
		if (is_array($regular_headers))
		{
			$regular_headers = sort_array($regular_headers,7,d);
		}
		if (is_array($sticky_headers))
		{
			$sticky_headers = sort_array($sticky_headers,7,d);
		}

		# now we merge arrays
		if (is_array($regular_headers) || is_array($sticky_headers))
		{
			$headers = array_merge($sticky_headers,$regular_headers);
		}

		if (is_array($headers))
		{
			if (admin_in()) {
				$admin_in = true;
			}
			else {
				$admin_in = false;
			}
			$tpl_row = get_template(get_template_path().'topics_page_row.htm');
			$tpl_row_links = get_template(get_template_path().'topics_page_row_linkbar.htm');
			$tpl_row_admin = get_template(get_template_path().'topics_page_admin_panel_checkbox.htm');

			$current_page = grojsus($headers, $page, max_topics_per_forum,0,'','page',true,'SE',max_links);

			$i=-1;
			foreach($current_page[0] as $topic)
			{
				$array = explode(d, $topic);

				$i++;
				$t['css_id'] = ($i%2) ? '1' : '0';

				if ($array[4]>max_postings_per_page)
				{
					$linkbar = grojsus($array[4],$p,max_postings_per_page,0,$PHP_SELF.'?action=view&topic='.$array[6],'p',false);
					$t[link_bar] = $linkbar[1];
					$t['topics_links'] = parse_tpl($tpl_row_links);
				}
				else
				{
					$t['topics_links'] = '';
				}

				$t['sticky'] = ($array[9]==1) ? $l['Sticky'] : '';
				$t['topic_icon'] = (strlen($array[11]) > 0) ? '<img src="'.dir_topic_icons.$array[11].'" alt="'.$array[11].'">' : '';
				$t['subject'] = stripslashes($array[1]);
				$t['author'] = stripslashes($array[2]);
				$t['short_author'] = cut_shorter_str($t['author'],15);
				$t['last_poster'] = stripslashes($array[3]);
				$t['short_last_poster'] = cut_shorter_str($t['last_poster'],15);
				$t['postings'] = $array[4];
				$t['replies'] = $array[4]-1;
				$t['views'] = $array[5];
				$t['topic_file'] = $array[6];
				$t['starting_time'] = date(time_format, $array[6]);
				$t['last_posting_time'] = date(time_format, $array[7]);
				$t['topic_smiley'] = (strlen($array[10]) > 1) ? '<img src="'.$array[10].'">' : '';

				if ($admin_in==true)
				{
					$t['admin_checkbox'] = parse_tpl($tpl_row_admin);
				}
				
				$topics_rows .= parse_tpl($tpl_row);
			}
		}
		else
		{
			$t['error_msg'] = $l['No_topics'];
			$t['error_message'] = parse_tpl(get_template(get_template_path().'topics_page_error.htm'));
		}
	}
	else
	{
		$t['error_msg'] = $l['No_topics'];
		$t['error_message'] = parse_tpl(get_template(get_template_path().'topics_page_error.htm'));
	}

	$t['categories_list'] = list_forums($fid);
	$t['categories_list_2'] = list_forums(-1,false);
	$t['fid'] = $fid;
	$t['topics_rows'] = $topics_rows;
	$t['navigation_bar'] = $current_page[1];
	$t['pages_nav_bar'] = (strlen($current_page[1]) > 1) ? $l['Pages'].': '.$current_page[1] : '';
	$t['admin_form_start'] = '';
	$t['admin_form_end'] = '';

	if ($admin_in==true)
	{
		$t['admin_form_start'] = parse_tpl(get_template(get_template_path().'topics_page_admin_panel_start.htm'));
		$t['admin_form_end']= parse_tpl(get_template(get_template_path().'topics_page_admin_panel_end.htm'));
	}
	$tpl_page = parse_tpl(get_template(get_template_path().'topics_page.htm'));
	print $tpl_page;
}



#############################
# shows news
function show_news()
{
	$tf = ${'tf'.get_cookid()};
	global $l, $page, $PHP_SELF, $QUERY_STRING, $t, $tf;
	$fid = 0;  # forum 0 is news forum

	if (file_exists(f_header))
	{
		$header_file = file(f_header);

		# now we make new array with topics with asked fid
		# we find regular and sticky threads separately, then we
		# sort them (by last posting) and lastly merge arrays
		foreach ($header_file as $line)
		{
			$a = explode(d, $line);
	
			if ($a[0] == $fid && $a[9]==0)
			{
				$regular_headers[] = $line;
			}
			elseif ($a[0] == $fid && $a[9]==1)
			{
				$sticky_headers[] = $line;
			}
		}

		# we sort them last posting order
		if (is_array($regular_headers))
		{
			$regular_headers = sort_array($regular_headers,7,d);
		}
		if (is_array($sticky_headers))
		{
			$sticky_headers = sort_array($sticky_headers,7,d);
		}

		# now we merge arrays
		if (is_array($regular_headers) || is_array($sticky_headers))
		{
			$headers = array_merge($sticky_headers,$regular_headers);
		}

		if (is_array($headers))
		{
			if (admin_in()) {
				$admin_in = true;
			}
			else {
				$admin_in = false;
			}
			$tpl_row = get_template(get_template_path().'news_page_row.htm');
			$tpl_sticky_row = get_template(get_template_path().'news_page_sticky_row.htm');
			$tpl_row_links = get_template(get_template_path().'news_page_row_linkbar.htm');
			$tpl_row_admin = get_template(get_template_path().'news_page_admin_panel_checkbox.htm');

			$current_page = grojsus($headers, $page, max_topics_per_forum,0,'','page',true,'SE',max_links);

			$i=-1;
			foreach($current_page[0] as $topic)
			{
				$array = explode(d, $topic);

				$i++;
				$t['css_id'] = ($i%2) ? '1' : '0';

				if ($array[4]>max_postings_per_page)
				{
					$linkbar = grojsus($array[4],$p,max_postings_per_page,0,$PHP_SELF.'?action=item&topic='.$array[6],'p',false);
					$t[link_bar] = $linkbar[1];
					$t['topics_links'] = parse_tpl($tpl_row_links);
				}
				else
				{
					$t['topics_links'] = '';
				}

				$t['sticky'] = ($array[9]==1) ? $l['Sticky'] : '';
				$t['subject'] = stripslashes($array[1]);
				$t['author'] = stripslashes($array[2]);
				$t['short_author'] = cut_shorter_str($t['author'],15);
				$t['last_poster'] = stripslashes($array[3]);
				$t['short_last_poster'] = cut_shorter_str($t['last_poster'],15);
				$t['postings'] = $array[4];
				$t['replies'] = $array[4]-1;
				$t['views'] = $array[5];
				$t['topic_file'] = $array[6];
				$t['starting_time'] = date(time_format, $array[6]);
				$t['last_posting_time'] = date(time_format, $array[7]);

				if ($admin_in==true)
				{
					$t['admin_checkbox'] = parse_tpl($tpl_row_admin);
				}
				if ($array[9]==1) {
					
					$topic_real_name = dir_data.date('YmdHis',$array[6]).msg_ext;

					if (file_exists($topic_real_name)==false)
					{
						print $array[6];
						print $l['Topic_not_found'];
#						return false;
					}

					$topics_content = file($topic_real_name);
					$msg = explode(d, $topics_content[0]);
					$t['topic_file'] = $array[6];
					$t['posting_id'] = 0;

					$t['posting_content'] = url_maker(nl2br_(bb_encode($msg[7],1),' <br> '));
					$t['posting_content'] = (soft_wrap== true) ? wrapText(text_wrap,$t['posting_content']," ") : wordwrap($t['posting_content'], text_wrap, ' ', 1);
					$msg[6]!=1 ? $t['posting_content']=parse_smileys($t['posting_content']):'';
					$t['posting_content'] = stripslashes($t['posting_content']);
					$t['author'] = cut_shorter_str(stripslashes($msg[1]),15);

					$tpl_row_modify = get_template(get_template_path().'news_item_page_row_modify_topic.htm');
					$tpl_row_delete = get_template(get_template_path().'news_item_page_row_delete_topic.htm');

					if (admin_in() || ($tf['user'] ==$t['author'] && user_pass_match($tf['user'], $tf['pass'])))
					{
						$t['link_delete'] = parse_tpl($tpl_row_delete);
						$t['link_modify'] = parse_tpl($tpl_row_modify);
					}

					if (admin_in())
					{
						if ($array[9]==0)
						{
							$t['make_sticky_link'] = parse_tpl(get_template(get_template_path().'news_item_page_make_sticky.htm'));
						}
						else 
						{
							$t['make_sticky_link'] = parse_tpl(get_template(get_template_path().'news_item_page_make_unsticky.htm'));
						}

						if ($array[10]==1)
						{
							$t['lock_thread_link'] = parse_tpl(get_template(get_template_path().'news_item_page_unlock_thread.htm'));
						}
						else
						{
							$t['lock_thread_link'] = parse_tpl(get_template(get_template_path().'news_item_page_lock_thread.htm'));
						}

						$t['delete_postings_link'] = parse_tpl(get_template(get_template_path().'news_item_page_admin_delete_all.htm'));
					}

					$topics_rows .= parse_tpl($tpl_sticky_row);
				}
				else
					$topics_rows .= parse_tpl($tpl_row);
			}
		}
		else
		{
			$t['error_msg'] = $l['No_topics'];
			$t['error_message'] = parse_tpl(get_template(get_template_path().'news_page_error.htm'));
		}
	}
	else
	{
		$t['error_msg'] = $l['No_topics'];
		$t['error_message'] = parse_tpl(get_template(get_template_path().'news_page_error.htm'));
	}

	$t['categories_list'] = list_forums($fid);
	$t['categories_list_2'] = list_forums(-1,false);
	$t['fid'] = $fid;
	$t['topics_rows'] = $topics_rows;
	$t['navigation_bar'] = $current_page[1];
	$t['pages_nav_bar'] = (strlen($current_page[1]) > 1) ? $l['Pages'].': '.$current_page[1] : '';
	$t['admin_form_start'] = '';
	$t['admin_form_end'] = '';

	if ($admin_in==true)
	{
		$t['admin_form_start'] = parse_tpl(get_template(get_template_path().'news_page_admin_panel_start.htm'));
		$t['admin_form_end']= parse_tpl(get_template(get_template_path().'news_page_admin_panel_end.htm'));
	}
	$tpl_page = parse_tpl(get_template(get_template_path().'news_page.htm'));
	print $tpl_page;
}


# shows news item
function view_news_item($topic_file)
{
	# p = current postings page
	$tf = ${'tf'.get_cookid()};
	global $l, $p, $PHP_SELF, $QUERY_STRING, $t, $tf, $tags, $poster_status;
	$header_data = get_data_from_header($topic_file);
	$fid = $header_data[0];

	$category_data = get_category($fid);

	if ($category_data[3]==0 && user_pass_match($tf['user'],$tf['pass'])==false)
	{
		print $l['Only_users_can_read'];
		return false;
	}

	update_header_views_and_replies($topic_file, 1, 0);

	$topic_real_name = dir_data.date('YmdHis',$topic_file).msg_ext;

	if (file_exists($topic_real_name)==false)
	{
		print $l['Topic_not_found'];
		return false;
	}

	$topics_content = file($topic_real_name);
	
	# here we call pagination function...
	$current_topics = grojsus($topics_content,$p,max_postings_per_page,1,'','p');


	$tpl_row = get_template(get_template_path().'news_item_page_row.htm');

	$tpl_row_modify = get_template(get_template_path().'news_item_page_row_modify_topic.htm');
	$tpl_row_delete = get_template(get_template_path().'news_item_page_row_delete_topic.htm');
	$tpl_row_postings_number=get_template(get_template_path().'news_item_page_row_posts.htm');
	$tpl_row_location =get_template(get_template_path().'news_item_page_row_location.htm');
	
	$t['fid'] = $fid;
	$t['topic_file'] = $topic_file;
	$t['back'] = "<a href=index.php>".$l['Back']."</a>";

	$j=-1;

	for ($i=$current_topics[3];$i<$current_topics[4];$i++)
	{
		$j++;
		$t['css_id'] = ($j%2) ? '1' : '0';

		$msg = explode(d, $topics_content[$i]);
		$t['subject'] = stripslashes($msg[0]);
		$email = $msg[2];
		# we add usersdata into array, so we needn't to load every time
		# usersdata from usersfile, if there are more than one time posting 
		# by same person (hopefully little faster :-)
		$author = stripslashes($msg[1]);
		if (!isset($ua[$author]))
		{
			$regged = true;
			$ua[$author] = get_user_data($author);
			if ($ua[$author]==false)
			{
				$regged = false;
				$ua[$author]['user_status'] = $l['Anonymous'];
			}
			else if ($ua[$author][4]==2)
			{
				$ua[$author]['user_status'] = $l['Admin'];
			}
			else if ($ua[$author][4]==1)
			{
				$ua[$author]['user_status'] = $l['Mode'];
			}
			else
			{
				foreach($poster_status as $status)
				{
					if ($ua[$author][14] >= $status[0] && $ua[$author][14] <= $status[1])
					{
						$ua[$author]['user_status'] = $status[2];
					}
				}
			}
		}
		
		$t['author'] = $author;
		$t['user_status'] = $ua[$author]['user_status'];
		$ua[$author]['e_mail'] = $email;

		if ($regged==false)
		{
			if (strlen($ua[$author]['e_mail'])>0) {
				$t['email']=nospam4($ua[$author]['e_mail'],$l['Email'],js_email);
				$t['email']=parse_tpl($tpl_row_unreg_email);
			}
			$t['author'] = cut_shorter_str($author,15);
			$t['short_user_name'] = parse_tpl(get_template(get_template_path().'news_item_page_row_username_unreg.htm'));
		}
		else
		{
			$t['user_name'] = parse_tpl(get_template(get_template_path().'news_item_page_row_username_regged.htm'));
			$t['author'] = cut_shorter_str($author,15);
			$t['short_user_name'] = parse_tpl(get_template(get_template_path().'news_item_page_row_username_regged.htm'));

	
			# short user description
			if (strlen($ua[$author][5])>0)
			{
				$t['description'] = $ua[$author][5];
				$t['user_description'] = parse_tpl($tpl_row_description);
			}
			else 
			{
				$t['user_description'] = '';
			}
		
		}

		$t['last_poster'] = stripslashes($msg[3]);
		$t['posting_date'] = date(time_format, $msg[5]);
		$t['timestamp'] = $msg[5];
		$t['posting_content'] = url_maker(nl2br_(bb_encode($msg[7],1),' <br> '));
		$t['posting_content'] = (soft_wrap== true) ? wrapText(text_wrap,$t['posting_content']," ") : wordwrap($t['posting_content'], text_wrap, ' ', 1);
		$msg[6]!=1 ? $t['posting_content']=parse_smileys($t['posting_content']):'';
		$t['posting_content'] = stripslashes($t['posting_content']);
		
		$icon_path = dir_topic_icons.$msg[8];

		if(strlen($msg[8])>3 && file_exists($icon_path)) {
			$t['posting_icon'] = '<img src="'.$icon_path.'" alt="'.$msg[8].'">';
		}
		else {
			$t['posting_icon'] = '';
		}

		$t['posting_id'] = $i;
		if (admin_in() || ($tf['user'] ==$t['author'] && user_pass_match($tf['user'], $tf['pass'])))
		{
			$t['link_delete'] = parse_tpl($tpl_row_delete);
			$t['link_modify'] = parse_tpl($tpl_row_modify);
		}

		$msg_rows .= parse_tpl($tpl_row);
	}

	if (count($topics_content)>max_postings_per_page)
	{
		$t['linkbar'] = $current_topics[1];
		$t['pages_links'] = parse_tpl(get_template(get_template_path().'news_item_page_linkbar.htm'));
	}
	else
	{
		$t['pages_links'] = '';
	}

	$t['categories_list'] = list_forums($fid);
	$t['messages_rows'] = $msg_rows;

	$tpl_row = get_template(get_template_path().'news_item_page_row.htm');

	if (admin_in())
	{
		if ($header_data[9]==0)
		{
			$t['make_sticky_link'] = parse_tpl(get_template(get_template_path().'news_item_page_make_sticky.htm'));
		}
		else 
		{
			$t['make_sticky_link'] = parse_tpl(get_template(get_template_path().'news_item_page_make_unsticky.htm'));
		}


		if ($header_data[10]==1)
		{
			$t['lock_thread_link'] = parse_tpl(get_template(get_template_path().'news_item_page_unlock_thread.htm'));
		}
		else
		{
			$t['lock_thread_link'] = parse_tpl(get_template(get_template_path().'news_item_page_lock_thread.htm'));
		}

		$t['delete_postings_link'] = parse_tpl(get_template(get_template_path().'news_item_page_admin_delete_all.htm'));
	}
	
	print parse_tpl(get_template(get_template_path().'news_item_page.htm'));
}

# shows postings from selected topic
function view_topic($topic_file)
{
	# p = current postings page
	$tf = ${'tf'.get_cookid()};
	global $l, $p, $PHP_SELF, $QUERY_STRING, $t, $tf, $tags, $poster_status;
	$header_data = get_data_from_header($topic_file);
	$fid = $header_data[0];

	$category_data = get_category($fid);

	if ($category_data[3]==0 && user_pass_match($tf['user'],$tf['pass'])==false)
	{
		print $l['Only_users_can_read'];
		return false;
	}

	update_header_views_and_replies($topic_file, 1, 0);

	$topic_real_name = dir_data.date('YmdHis',$topic_file).msg_ext;

	if (file_exists($topic_real_name)==false)
	{
		print $l['Topic_not_found'];
		return false;
	}

	$topics_content = file($topic_real_name);
	
	# here we call pagination function...
	$current_topics = grojsus($topics_content,$p,max_postings_per_page,1,'','p');

	$tpl_row = get_template(get_template_path().'postings_page_row.htm');

	$tpl_row_modify = get_template(get_template_path().'postings_page_row_modify_topic.htm');
	$tpl_row_delete = get_template(get_template_path().'postings_page_row_delete_topic.htm');
	$tpl_row_unreg_email = get_template(get_template_path().'postings_page_row_email_unreg.htm');
	$tpl_row_avatar = get_template(get_template_path().'postings_page_row_avatar.htm');
	$tpl_row_description = get_template(get_template_path().'postings_page_row_userdescription.htm');
	$tpl_row_homepage = get_template(get_template_path().'postings_page_row_homepage.htm');
	$tpl_row_signature = get_template(get_template_path().'postings_page_row_signature.htm');
	$tpl_row_postings_number=get_template(get_template_path().'postings_page_row_posts.htm');
	$tpl_row_location =get_template(get_template_path().'postings_page_row_location.htm');
	
	$t['fid'] = $fid;
	$t['topic_file'] = $topic_file;

	$j=-1;

	for ($i=$current_topics[3];$i<$current_topics[4];$i++)
	{
		$j++;
		$t['css_id'] = ($j%2) ? '1' : '0';

		$msg = explode(d, $topics_content[$i]);
		$t['subject'] = stripslashes($msg[0]);
		$email = $msg[2];
		# we add usersdata into array, so we needn't to load every time
		# usersdata from usersfile, if there are more than one time posting 
		# by same person (hopefully little faster :-)
		$author = stripslashes($msg[1]);
		if (!isset($ua[$author]))
		{
			$regged = true;
			$ua[$author] = get_user_data($author);
			if ($ua[$author]==false)
			{
				$regged = false;
				$ua[$author]['user_status'] = $l['Anonymous'];
			}
			else if ($ua[$author][4]==2)
			{
				$ua[$author]['user_status'] = $l['Admin'];
			}
			else if ($ua[$author][4]==1)
			{
				$ua[$author]['user_status'] = $l['Mode'];
			}
			else
			{
				foreach($poster_status as $status)
				{
					if ($ua[$author][14] >= $status[0] && $ua[$author][14] <= $status[1])
					{
						$ua[$author]['user_status'] = $status[2];
					}
				}
			}
		}
		
		$t['author'] = $author;
		$t['user_status'] = $ua[$author]['user_status'];
		$ua[$author]['e_mail'] = $email;

		if ($regged==false)
		{
			if (strlen($ua[$author]['e_mail'])>0) {
				$t['email']=nospam4($ua[$author]['e_mail'],$l['Email'],js_email);
				$t['email']=parse_tpl($tpl_row_unreg_email);
			}
			$t['user_description']=$t['avatar'] = $t['user_homepage'] = $t['user_location'] = $t['occupation'] = $t['user_postings_number'] = $t['user_signature'] = '';
			$t['user_name'] = parse_tpl(get_template(get_template_path().'postings_page_row_username_unreg.htm'));
			$t['author'] = cut_shorter_str($author,15);
			$t['short_user_name'] = parse_tpl(get_template(get_template_path().'postings_page_row_username_unreg.htm'));
		}
		else
		{
			$t['user_name'] = parse_tpl(get_template(get_template_path().'postings_page_row_username_regged.htm'));
			$t['author'] = cut_shorter_str($author,15);
			$t['short_user_name'] = parse_tpl(get_template(get_template_path().'postings_page_row_username_regged.htm'));

			# avatar
			if (strlen($ua[$author][6])>1)
			{
				if (get_img_size==true)
				{
					if (file_exists(dir_avatars.$ua[$author][6]))
					{
						$t['avatar_location'] = dir_avatars.$ua[$author][6];
					}
					else
					{
						$t['avatar_location'] = $ua[$author][6];
					}
				}
				else
				{
					$t['avatar_location'] = dir_avatars.$ua[$author][6];
				}
		
				$t['avatar'] = parse_tpl($tpl_row_avatar);
			}
			else
			{
				$t['avatar']='';
			}
	
			# short user description
			if (strlen($ua[$author][5])>0)
			{
				$t['description'] = $ua[$author][5];
				$t['user_description'] = parse_tpl($tpl_row_description);
			}
			else 
			{
				$t['user_description'] = '';
			}
		
			# user homepage
			if (strlen($ua[$author][8])>0)
				{
				$t['homepage'] = $ua[$author][8];
				$t['user_homepage'] = parse_tpl($tpl_row_homepage);
			}
			else 
			{
				$t['user_homepage'] = '';
			}
		
			# user postings number
			if (strlen($ua[$author][14])>0)
			{
				$t['postings_number'] = $ua[$author][14];
				$t['user_postings_number'] = parse_tpl($tpl_row_postings_number);
			}
			else 
			{
				$t['user_postings_number'] = '';
			}
	
			# user postings number
			if (strlen($ua[$author][9])>0)
			{
				$t['location'] = $ua[$author][9];
				$t['user_location'] = parse_tpl($tpl_row_location);
			}
			else 
			{
				$t['user_location'] = '';
			}

			# signature
			if (strlen($ua[$author][11])>0)
			{
				$t['signature'] = wrapText(80,stripslashes(parse_smileys(url_maker(nl2br_(bb_encode($ua[$author][11]))))));
				$t['user_signature'] = parse_tpl($tpl_row_signature);
			}
			else 
			{
				$t['user_signature'] = '';
			}
		}

		$t['last_poster'] = stripslashes($msg[3]);
		$t['posting_date'] = date(time_format, $msg[5]);
		$t['timestamp'] = $msg[5];
		$t['posting_content'] = url_maker(nl2br_(bb_encode($msg[7]),' <br> '));
		$t['posting_content'] = (soft_wrap== true) ? wrapText(text_wrap,$t['posting_content']," ") : wordwrap($t['posting_content'], text_wrap, ' ', 1);
		$msg[6]!=1 ? $t['posting_content']=parse_smileys($t['posting_content']):'';
		$t['posting_content'] = stripslashes($t['posting_content']);
		
		$icon_path = dir_topic_icons.$msg[8];

		if(strlen($msg[8])>3 && file_exists($icon_path)) {
			$t['posting_icon'] = '<img src="'.$icon_path.'" alt="'.$msg[8].'">';
		}
		else {
			$t['posting_icon'] = '';
		}

		$t['posting_id'] = $i;
		if (admin_in() || ($tf['user'] ==$t['author'] && user_pass_match($tf['user'], $tf['pass'])))
		{
			$t['link_delete'] = parse_tpl($tpl_row_delete);
			$t['link_modify'] = parse_tpl($tpl_row_modify);
		}

		$msg_rows .= parse_tpl($tpl_row);
	}

	if (count($topics_content)>max_postings_per_page)
	{
		$t['linkbar'] = $current_topics[1];
		$t['pages_links'] = parse_tpl(get_template(get_template_path().'postings_page_linkbar.htm'));
	}
	else
	{
		$t['pages_links'] = '';
	}

	$t['categories_list'] = list_forums($fid);
	$t['messages_rows'] = $msg_rows;

	$tpl_row = get_template(get_template_path().'postings_page_row.htm');

	if (admin_in())
	{
		if ($header_data[9]==0)
		{
			$t['make_sticky_link'] = parse_tpl(get_template(get_template_path().'postings_page_make_sticky.htm'));
		}
		else 
		{
			$t['make_sticky_link'] = parse_tpl(get_template(get_template_path().'postings_page_make_unsticky.htm'));
		}


		if ($header_data[10]==1)
		{
			$t['lock_thread_link'] = parse_tpl(get_template(get_template_path().'postings_page_unlock_thread.htm'));
		}
		else
		{
			$t['lock_thread_link'] = parse_tpl(get_template(get_template_path().'postings_page_lock_thread.htm'));
		}

		$t['delete_postings_link'] = parse_tpl(get_template(get_template_path().'postings_page_admin_delete_all.htm'));
	}
	
	print parse_tpl(get_template(get_template_path().'postings_page.htm'));
}


# shows form for reply or quote sending
function form_reply($topic, $error_message='', $post_id=-1)
{
	$tf = ${'tf'.get_cookid()};
	global $f, $l, $PHP_SELF,$posting_content, $t, $tf;
	if (!isset($topic))
	{
		print $l['Topic_not_found'];
		return false;
	}

	$fid = get_fid_from_header($topic);
	$catdat = get_category($fid);

	if ($catdat[4] == 0 && user_pass_match($tf['user'],$tf['pass']) == false)
	{
		print $l['Only_users_can_post'];
		return false;
	}

	if (isset($f) == false)
	{
		$topic_file = dir_data.date('YmdHis',$topic).msg_ext;
		if (!file_exists($topic_file))
		{
			print $l['Topic_not_found'];
			return false;
		}
		$topic_cont = file($topic_file);		

		if ($post_id == -1 || $post_id=='')
		{
			$line = explode(d, $topic_cont[0]);
			$f['posting_subject'] = (eregi($l['Re'],$line[0])) ? $line[0] : $l['Re'].$line[0];
		}
		else if(isset($topic_cont[$post_id]))
		{
			$line = explode(d, $topic_cont[$post_id]);
			$f['posting_subject'] = (eregi($l['Re'],$line[0])) ? $line[0] : $l['Re'].$line[0];
			$post_content = $line[7];
			$post_content =nl2br_($post_content, "\n");
			$posting_content = '[quote]'.$post_content."[/quote]\n";
		}
	}
	
	if ($post_id == -1 || $post_id == '')
	{
		$t['form_header'] = $l['Reply'];
	}
	else
	{
		$t['form_header'] = $l['Quote'];
	}

	$posting_content = nl2br_($posting_content, "\n");
	$t['smileys'] = tpl_get_smileys();

	# if user isn't registrered we give him/her textboxes for email and name
	if (user_pass_match($tf['user'],$tf['pass'])==false)
	{
		$t['user_data']=parse_tpl(get_template(get_template_path().'form_posting_userdata.htm'));
	}

	$f['posting_smileys_value']=($f['posting_smileys']=='on') ? ' checked="checked"' : '';
	$t['posting_icons'] = icon_bar($f['topic_icon']);

	$t['error_str']=$error_message;
	$t['posting_action'] = 'send_reply&topic='.$topic;
	isset($post_id) ? $t['posting_action'] .= '&id='.$post_id : '';
	print parse_tpl(get_template(get_template_path().'form_posting.htm'));
}

# saves reply
function save_reply($topic,$id='')
{
	$tf = ${'tf'.get_cookid()};
	global $f, $l, $PHP_SELF,$posting_content, $t, $tf;
	if (!isset($topic))
	{
		err_msg($l['Topic_not_found']);
#		print $l['Topic_not_found'];
		return false;
	}

	$header_data = get_data_from_header($topic);
	$fid = $header_data[0];
	$catdat = get_category($fid);

	if ($header_data[10]==1 && admin_in()==false)
	{
		err_msg($l['Thread_is_locked']);
		return false;
	}

	if ($catdat[4] == 0 && user_pass_match($tf['user'],$tf['pass']) == false)
	{
		err_msg($l['Only_users_can_post']);
		return false;
	}

	if (ip_ok()==false)
	{
		err_msg(sprintf($l['Please_wait'],post_interval));
		return false;
	}

	# user data validating...
	admin_in()==false ? $posting_content = substr($posting_content, 0, max_posting_length):'';

	# we replace all delimiter chars with they html values
	$f = replace_delimiter_char($f);
	$posting_content=replace_delimiter_char_str($posting_content);
	$f = replace_newlines($f);
	$posting_content=replace_newlines_str($posting_content);

	$f = cut_shorter($f, '', 50);

	if (!array_chars_ok($f,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' ('. htmlentities(unallowed_chars).')');
#		form_reply($topic, $l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"', $id);
		return false;
	}
	if (strlen($f['posting_subject'])<4)
	{
		err_msg($l['Missing_subject'].' ('.sprintf($l['At_least_n_chars'],'4').')');
#		form_reply($topic, $l['Missing_subject'].' ('.sprintf($l['At_least_n_chars'],'4').')', $id);
		return false;
	}

	# we seek for user...
	if (strlen($tf['user'])>0)
	{
		$poster_name = $tf['user'];
		$user_data = get_user_data($poster_name);
		$poster_mail = $user_data[2];
	}
	else
	{
		$poster_name = $f['posting_name'];
		$poster_mail = $f['posting_email'];
	}


	if (strlen($poster_name)<1)
	{
		err_msg($l['Missing_username'].' ('.sprintf($l['At_least_n_chars'],'1').')');
#		form_reply($topic, $l['Missing_username'].' ('.sprintf($l['At_least_n_chars'],'1').')', $id);
		return false;
	}

	if (user_pass_match($tf['user'],$tf['pass'])==false && user_exists($poster_name)==true)
	{
		err_msg($l['Username_exists']);
#		form_reply($topic, $l['Username_exists'], $id);
		return false;
	}

	if (strlen($posting_content)<3)
	{
		err_msg($l['Missing_content'].' ('.sprintf($l['At_least_n_chars'],'3').')');
#		form_reply($topic, $l['Missing_content'].' ('.sprintf($l['At_least_n_chars'],'3').')', $id);
		return false;
	}

	$disable_smilies =($f['posting_smileys']=='on') ? 1 : 0;

	$file_name = date('YmdHis',$topic).msg_ext;

	$current_time = time();
	# main posting file
	$array = array($f['posting_subject'],$poster_name,$poster_mail,'',get_ip(),$current_time,$disable_smilies,$posting_content,	$f['topic_icon']);
	$array = array_pad($array, 19, '');
	$posting_str = implode(d, $array);
	
	$fp=fopen(dir_data.$file_name, 'a');
	flokk ? flock($fp,2) : '';
	fwrite($fp, $posting_str."\n");
	fclose($fp);

	# main header file
	update_header_2($topic, 1, $poster_name, $current_time);
	update_cat_file($fid,$topic,1,0,$poster_name,$f['posting_subject'],$current_time);

	if (user_pass_match($tf['user'],$tf['pass']))
	{
		update_users_file($tf['user'],1);
	}

	$total_pages = ceil(count(file(dir_data.$file_name))/max_postings_per_page)-1;

	$page = $PHP_SELF.'?action=view&topic='.$topic;
	$total_pages > 0 ? $page .= '&p='.$total_pages : '';
	$page .= '#'.$current_time;
	goto_url($page,1);
	return true;
}

# updates online users file
function who_is_online()
{
	$tf = ${'tf'.get_cookid()};
	global $l, $PHP_SELF, $tf;
	if (strlen($tf['user'])>0)
	{
		$usr = $tf['user'];
	}
	else
	{
		$usr = guest;
	}

	if (file_exists(f_online_users)==false)
	{
		$fp = fopen(f_online_users, 'w');
		$s = implode(d, array_pad(array(get_ip(), time(), $usr),6,''));
		fputs($fp, $s."\n");
		fclose($fp);
	}

	$online_users = file(f_online_users);

	$i=-1;
	foreach($online_users as $user_data)
	{
		$i++;
		$array = explode(d, $user_data);
		if ($array[1]+online_time < time() || $array[0]==get_ip())
		{
			unset($online_users[$i]);
		}
	}

	$online_users[] = implode(d, array_pad(array(get_ip(), time(), $usr),6,''));

	save_file($online_users, f_online_users, flokk);
}

# returns parsed template with online users
function get_online_users()
{
	global $PHP_SELF, $t, $l;

	$reg_users = 0;
	$guest_users = 0;

	$fs = file(f_online_users);
	foreach($fs as $line)
	{
		$array = explode(d, $line);
		if ($array[2] != guest)
		{
			$reg_users ++;
			$t['online_users_links'] .= '<a href="'.$PHP_SELF.'?action=viewprofile&user='.$array[2].'">'.$array[2].'</a> &nbsp; ';
		}
		else
		{
			$guest_users ++;
		}
	}


	$t['total_online_users'] = $reg_users + $guest_users;
	$t['registrered_users'] = $reg_users;
	$t['guest_users'] = $guest_users;

	$t['l_reg_users'] = ($reg_users <> 1) ? $l['Users'] : $l['User'];
	$t['l_guest_users'] = ($guest_users <> 1) ? $l['Guests'] : $l['Guest'];

	$users_file = file(f_users);
	$total_users = count($users_file)-1;
	$last_line = explode(d, $users_file[$total_users]);
	$last_registrered_user = $last_line[0];

	$t['total_users'] = $total_users;
	$t['newest_user_link'] = '<a href="'.$PHP_SELF.'?action=viewprofile&user='.$last_registrered_user.'">'.$last_registrered_user.'</a>';

	$tpl = parse_tpl(get_template(get_template_path().'online_users.htm'));
	return $tpl;
}

# shows some person profile
function view_profile($username)
{
	global $t, $l, $PHP_SELF;
	#print '_'.$username.'_';
	$username = urldecode($username);

	if (user_exists($username)==false)
	{
		print $l['User_not_exists'];
		return false;
	}

	$i = -1;
	$usersdata = file(f_users);
	foreach($usersdata as $usr)
	{
		$i++;
		$array = explode(d, $usr);
		if (strtolower($array[0])==strtolower($username))
		{
			break;
		}
	}

	$t['username'] = $username;

	$email = nospam3($array[2], ' ('.$l['At'].') ', ' ('.$l['Point'].') ');
	$email = nospam4($array[2],$email,js_email);
	$t['email'] = $email;

	$t['short_description'] = $array[5];
	# if there exists avatar in avatars dir then it taked from this dir...
	# else avatar is taked from remote address
	if (get_img_size==true)
	{
		if (strlen($array[6])>0)
		{
			if (file_exists(dir_avatars.$array[6]))
			{
				$t['avatar'] = '<img src="'.dir_avatars.$array[6].'"><br>';
			}
			else
			{
				$t['avatar'] = '<img src="'.$array[6].'"><br>';
			}
		}
	}
	else
	{
		if (strlen($array[6])>0)
		{
			$t['avatar'] = '<img src="'.dir_avatars.$array[6].'"><br>';
		}
	}
	
	$t['reg_no'] = $i;
	$t['reg_date'] = date(time_format, $array[3]);
	if (strlen($array[7])>0)
	{
		$msn = nospam3($array[7],  ' ('.$l['At'].') ', ' ('.$l['Point'].') ');
		$msn = nospam4($array[7],$msn,js_email);
		$t['msn'] = $msn;
	}
	else
	{
		$t['msn'] = '--';
	}

	if (strlen($array[8])>0)
	{
		$t['homepage'] = '<a href="'.$array[8].'">'.$array[8].'</a>';
	}
	else
	{
		$t['homepage'] = '--';
	}

	$t['location'] = (strlen($array[9])>0) ? $array[9] : '--';
	$t['occupation'] = (strlen($array[10])>0) ? $array[10] : '--';
	$t['postings'] = strlen($array[14]>0) ? $array[14] : '0';

	$tpl = parse_tpl(get_template(get_template_path().'viewprofile.htm'));
	print $tpl;
}

# returns parsed login template
function login_page()
{
	global $l,$PHP_SELF, $t;
	$t['login_form_action'] = $PHP_SELF. '?action=login';
	$tpl = parse_tpl(get_template(get_template_path().'form_login2.htm'));
	print $tpl;
}

# checks ip from header last line file. if its same than current 
# user ip then returns false, else true
function ip_ok()
{
	if (file_exists(f_header))
	{
		$header = file(f_header);
		$header = sort_array($header, 7, d);
		if (is_array($header))
		{
			$last = explode(d, $header[0]);
			$last_phile = dir_data.date('YmdHis',$last[6]).msg_ext;
			$ll = file($last_phile);
			$ll = explode(d, $ll[count($ll)-1]);
			if ($ll[4]==get_ip() && $ll[5]+post_interval > time())
			{
				return false;
			}
		}
	}
	return true;
}

# topics moving to another forum (for admin only)
function move_topics($topics, $forum)
{
	global $l, $PHP_SELF;

	if (is_array($topics)==false)
	{
		err_msg($l['No_topics_selected']);
		return false;
	}

	if ($forum==-1)
	{
		err_msg($l['No_forum_selected']);
		return false;
	}

	$header = file(f_header);
	$i=-1;
	$total_postings = 0;
	$total_topics = 0;

	foreach($header as $line)
	{
		$i++;
		$a = explode(d, $line);
		$fn = $a[6];
		if ($fn == $topics[$fn])
		{
			if (isset($f_source)==false)
			{
				$f_source = $a[0];
				$f_destination = $forum;

				if ($f_source == $f_destination)
				{
					err_msg($l['Destination_equal_source']);
					return false;
				}
			}
			$a[0] = $forum;

			$total_postings += $a[4];
			$total_topics ++;
			$new_line = implode(d, $a);
			$header[$i]=$new_line;
		}
	}

	save_file($header, f_header, flokk);
	update_cat_file($forum, '', $total_postings, $total_topics, '', '');

	$total_postings *= -1;
	$total_topics *= -1;

	update_cat_file($f_source, '', $total_postings, $total_topics, '', '');

	goto_url($PHP_SELF);
}

# topic(s) deleting for admin
function delete_topics($topics)
{
	global $l, $PHP_SELF;

	if (is_array($topics)==false)
	{
		err_msg($l['No_topics_selected']);
		return false;
	}

	$header = file(f_header);
	$i=-1;
	$total_postings = 0;
	$total_topics = 0;

	foreach($header as $line)
	{
		$i++;
		$a = explode(d, $line);
		$fn = $a[6];
		if ($fn == $topics[$fn])
		{
			if (isset($fid)==false)
			{
				$fid=$a[0];
			}
			$total_postings += $a[4];
			$total_topics ++;
			unset($header[$i]);
			unlink(dir_data.date("YmdHis",$fn).msg_ext);
		}
	}

	save_file($header, f_header, flokk);

	$total_postings *= -1;
	$total_topics *= -1;

	update_cat_file($fid, '', $total_postings, $total_topics, '', '');

	goto_url($PHP_SELF.'?action=topics&fid='.$fid);
}

# sets sticky flag vice versa...
function set_sticky_flag($topic)
{
	$tf = ${'tf'.get_cookid};
	global $l, $PHP_SELF, $tf;

	$ug=get_user_group($tf['user']);

	if ($ug<1 || $ug==false)
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}

	$fn = dir_data.date('YmdHis',$topic).msg_ext;
	if (file_exists($fn)==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	$header = file(f_header);
	$i=-1;
	
	foreach($header as $line)
	{
		$i++;
		$a = explode(d, $line);
		if ($a[6]==$topic)
		{
			$a[9] = ($a[9]==0) ? 1 : 0;
			$fid = $a[0];
			$s = implode(d, $a);
			$header[$i]=$s;
			break;
		}
	}

	save_file($header, f_header, flokk);
#	goto_url($PHP_SELF.'?action=topics&fid='.$fid);
	goto_url($PHP_SELF);
}

# deletes posting from topic
function delete_posting($topic, $id)
{
	$tf = ${'tf'.get_cookid()};
	global $l, $PHP_SELF, $tf;

	$filename = dir_data.date('YmdHis',$topic).msg_ext;

	if ($id == '' || file_exists($filename)==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	$filecontent = file($filename);
	$thispost = explode(d, $filecontent[$id]);
	
	if (($thispost[1]==$tf['user'] && user_pass_match($tf['user'],$tf['pass'])) || admin_in())
	{
		if (count($filecontent) <=1)
		{
			$topicarray[$topic] = $topic;
			delete_topics($topicarray);
			return true;
		}

		unset($filecontent[$id]);
		save_file($filecontent, $filename, flokk);

		$header = file(f_header);
		$i=-1;
		foreach($header as $line)
		{
			$i++;
			$a = explode(d, $line);
			if ($a[6] == $topic)
			{
				$fid = $a[0];
				$a[4] = $a[4] -1;
				$s = implode(d, $a);
				$header[$i] = $s;
				save_file($header, f_header, flokk);
				break;
			}
		}

		update_cat_file($fid, '', -1, 0, '', '');
	}
	else
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}

	goto_url($PHP_SELF.'?action=view&topic='.$topic);
}

# posting modifing form for posting owner & admin
function form_modify($topic, $id)
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l, $PHP_SELF, $posting_content;

	$filename = dir_data.date('YmdHis',$topic).msg_ext;

	if ($id == '' || file_exists($filename)==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	$filecontent = file($filename);
	$thispost = explode(d, $filecontent[$id]);
	$thispost = html2entities($thispost);
	if (($thispost[1]==$tf['user'] && user_pass_match($tf['user'],$tf['pass'])) || admin_in())
	{
		$t['form_header'] = $l['Modify'];
		$f['posting_subject'] = $thispost[0];
		$f['posting_smileys_value']=($thispost[6]==1) ? ' checked="checked"' : '';
		$posting_content = nl2br_($thispost[7],"\n");
		$t['posting_icons'] = icon_bar($thispost[8]);
		$t['posting_action'] = 'savemodify&topic='.$topic.'&id='.$id;
		$t['smileys'] = tpl_get_smileys();
		print parse_tpl(get_template(get_template_path().'form_posting.htm'));
	}
	else
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}
}

# saves modified topic content
function save_modify($topic,$id)
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l, $PHP_SELF, $posting_content;

	$filename = dir_data.date('YmdHis',$topic).msg_ext;

	$filecontent = file($filename);
	$thispost = explode(d, $filecontent[$id]);

	if ($id == '' || file_exists($filename)==false || isset($filecontent[$id])==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	if (($thispost[1]==$tf['user'] && user_pass_match($tf['user'],$tf['pass'])) || admin_in())
	{
		$thispost[6] = ($f['posting_smileys']=='on') ? 1 : 0;
		$thispost[7] = cut_shorter_str(replace_delimiter_char_str(replace_newlines_str($posting_content)),max_posting_length);
		$thispost[8] = cut_shorter_str(replace_delimiter_char_str(replace_newlines_str($f['topic_icon'])));

		$s = implode(d, $thispost);
		$filecontent[$id] = $s;
		save_file($filecontent, $filename, flokk);

		$current_page = ceil($id / max_postings_per_page)-1;

		$page = $PHP_SELF.'?action=view&topic='.$topic;
		$current_page > 0 ? $page .= '&p='.$current_page : '';
		$page .= '#'.$thispost[5];
		goto_url($page,0);
	}
	else
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}
}

# posting modifing form for posting owner & admin
function form_modify_item($topic, $id)
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l, $PHP_SELF, $posting_content;

	$filename = dir_data.date('YmdHis',$topic).msg_ext;

	if ($id == '' || file_exists($filename)==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	$filecontent = file($filename);
	$thispost = explode(d, $filecontent[$id]);
	$thispost = html2entities($thispost);
	if (($thispost[1]==$tf['user'] && user_pass_match($tf['user'],$tf['pass'])) || admin_in())
	{
		$t['form_header'] = $l['Modify'];
		$f['posting_subject'] = $thispost[0];
		$f['posting_smileys_value']=($thispost[6]==1) ? ' checked="checked"' : '';
		$posting_content = nl2br_($thispost[7],"\n");
		$t['posting_icons'] = icon_bar($thispost[8]);
		$t['posting_action'] = 'savemodifyitem&topic='.$topic.'&id='.$id;
		$t['smileys'] = tpl_get_smileys();
		print parse_tpl(get_template(get_template_path().'form_news_posting.htm'));
	}
	else
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}
}

# saves modified topic content
function save_modify_item($topic,$id)
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l, $PHP_SELF, $posting_content;

	$filename = dir_data.date('YmdHis',$topic).msg_ext;

	$filecontent = file($filename);
	$thispost = explode(d, $filecontent[$id]);

	if ($id == '' || file_exists($filename)==false || isset($filecontent[$id])==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	if (($thispost[1]==$tf['user'] && user_pass_match($tf['user'],$tf['pass'])) || admin_in())
	{
		$thispost[6] = ($f['posting_smileys']=='on') ? 1 : 0;
		$thispost[7] = cut_shorter_str(replace_delimiter_char_str(replace_newlines_str($posting_content)),max_posting_length);
		$thispost[8] = cut_shorter_str(replace_delimiter_char_str(replace_newlines_str($f['topic_icon'])));

		$s = implode(d, $thispost);
		$filecontent[$id] = $s;
		save_file($filecontent, $filename, flokk);

		$current_page = ceil($id / max_postings_per_page)-1;

		$page = $PHP_SELF.'?action=view_item&topic='.$topic;
		$current_page > 0 ? $page .= '&p='.$current_page : '';
		$page .= '#'.$thispost[5];
		goto_url($page,0);
	}
	else
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}
}

# form for making new news item....
function form_new_news_item($fid='',$error_str='')
{
	$tf = ${'tf'.get_cookid()};
	global $tf, $f, $t, $l;

	# if user isn't registrered we give him/her textboxes for email and name
	if (user_pass_match($tf['user'],$tf['pass'])==false)
	{
		$t['user_data']=parse_tpl(get_template(get_template_path().'form_posting_userdata.htm'));
	}

	$f['posting_smileys_value']=($f['posting_smileys']=='on') ? ' checked="checked"' : '';
	$t['form_header'] = $l['New_topic'];
	$t['error_str']=$error_str;
	$t['posting_action'] = 'send_news&fid='.$fid;
	$t['posting_icons'] = icon_bar($f['topic_icon']);
	$t['smileys'] = tpl_get_smileys();
	print parse_tpl(get_template(get_template_path().'form_news_posting.htm'));
}


#############################
# function for posting saving
function save_new_news_item($fid='')
{
	$tf = ${'tf'.get_cookid()};
	global $f, $l, $PHP_SELF, $posting_content, $t, $tf;

	if ($fid=='')
	{
		$fid = 0;
	}

	if (ip_ok()==false)
	{
		err_msg(sprintf($l['Please_wait'], post_interval));
		#form_new_posting($fid, sprintf($l['Please_wait'], post_interval));
		return false;
	}

	$cat_data = get_category($fid);
	
	if ($cat_data[5]==1 && admin_in()==false && mode_in()==false)
	{
		err_msg($l['Only_admin_can_post']);
		#print $l['Only_admin_can_post'];
		return false;
	}
 
	if ($cat_data[4]==0 && user_pass_match($tf['user'],$tf['pass'])==false)
	{
		err_msg($l['Only_users_can_post']);
		#print $l['Only_users_can_post'];
		return false;
	}

	# user data validating...
	admin_in()==false ? $posting_content = substr($posting_content, 0, max_posting_length):'';
	# we replace all delimiter chars with they html values
	$f = replace_delimiter_char($f);
	$posting_content=replace_delimiter_char_str($posting_content);
	$f = replace_newlines($f);
	$posting_content=replace_newlines_str($posting_content);

	$f = cut_shorter($f, '', 50);

	if (!array_chars_ok($f,unallowed_chars))
	{
		err_msg($l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		#form_new_posting($fid, $l['Unallowed_chars']. ' "'. htmlentities(unallowed_chars).'"');
		return false;
	}
	if (strlen($f['posting_subject'])<4)
	{
		err_msg($l['Missing_subject'].' ('.sprintf($l['At_least_n_chars'],'4').')');
		#form_new_posting($fid, $l['Missing_subject'].' ('.sprintf($l['At_least_n_chars'],'4').')');
		return false;
	}


	# we seek for user...
	if (strlen($tf['user'])>0)
	{
		$poster_name = $tf['user'];
		$user_data = get_user_data($poster_name);
		$poster_mail = $user_data[2];
	}
	else
	{
		$poster_name = $f['posting_name'];
		$poster_mail = $f['posting_email'];
	}


	if (strlen($poster_name)<1)
	{
		err_msg($l['Missing_username'].' ('.sprintf($l['At_least_n_chars'],'1').')');
#		form_new_posting($fid, $l['Missing_username'].' ('.sprintf($l['At_least_n_chars'],'1').')');
		return false;
	}

	if (user_pass_match($tf['user'],$tf['pass'])==false && user_exists($poster_name)==true)
	{
		err_msg($l['Username_exists']);
#		form_new_posting($fid, $l['Username_exists']);
		return false;
	}

	if (strlen($posting_content)<3)
	{
		err_msg($l['Missing_content'].' ('.sprintf($l['At_least_n_chars'],'3').')');
#		form_new_posting($fid, $l['Missing_content'].' ('.sprintf($l['At_least_n_chars'],'3').')');
		return false;
	}

	$disable_smilies =($f['posting_smileys']=='on') ? 1 : 0;
	$current_time = time();
	$file_name = date('YmdHis',$current_time).msg_ext;

	# main posting file
	$array = array($f['posting_subject'],$poster_name,$poster_mail,'',get_ip(),$current_time,$disable_smilies,$posting_content,$f['topic_icon']);
	$array = array_pad($array, 19, '');
	$posting_str = implode(d, $array);
	
	$fp=fopen(dir_data.$file_name, 'w');
	flokk ? flock($fp,2) : '';
	fwrite($fp, $posting_str."\n");
	fclose($fp);


	# main header file
	$header = array($fid,$f['posting_subject'],$poster_name,$poster_name,1,0,$current_time,$current_time,get_ip(),0,0,$f['topic_icon']);
	$header = array_pad($header, 19, '');
	$header_str = implode(d, $header);
	
	$fp=fopen(f_header, 'a');
	flokk ? flock($fp,2) : '';
	fwrite($fp, $header_str."\n");
	fclose($fp);

	update_cat_file($fid,$current_time,1,1,$poster_name,$f['posting_subject'],$current_time);

	if (user_pass_match($tf['user'],$tf['pass']))
	{
		update_users_file($tf['user'],1);
	}
	goto_url($PHP_SELF.'?action=view&topic='.$current_time,1);
	return true;
}

# upgrades txtforum from 0.6.x versions to 0.7.x
function upgrade()
{
	global $l, $x_old_data_dir, $x_old_header, $x_old_users, $forums_list, $PHP_SELF;

	if (admin_in()==false)
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}

	if (file_exists($x_old_header) ==  false || file_exists($x_old_users) ==  false )
	{
		err_msg($l['File_not_found']);
		return false;
	}

	if ($forums_list == -1)
	{
		err_msg($l['No_forum_selected']);
		return false;
	}

	# first we copy postings over...

	$f_old_header = file($x_old_header);
	$total_topics = 0;
	$total_postings=0;
	if (is_array($f_old_header))
	{
		$f_new_header = fopen(f_header, 'a');
		flokk ? flock($f_new_header, 2) : '';

		foreach($f_old_header as $line)
		{
			$old_line = explode('||', $line);
			$old_p_f = $x_old_data_dir.$old_line[0];
			# we continue only when there exists postings file
			if (file_exists($old_p_f))
			{
				$total_topics ++;
				$old_posting_file = file($old_p_f);
				$old_posting_file_last_line = explode('||', $old_posting_file[count($old_posting_file)-1]);

				$new_line[0] = $forums_list; // category id
				$new_line[1] = $old_line[1]; // subject
				$new_line[2] = $old_line[6]; // author
				$new_line[3] = $old_posting_file_last_line[1]; // last poster
				$new_line[4] = $old_line[2]; // postings
				$new_line[5] = trim($old_line[7]); // views
				$new_line[6] = $old_line[3]; // first post time
				$new_line[7] = $old_line[5]; // last post time
				$new_line[8] = $old_line[4]; // ip
				$new_line[9] = 0; // sticky status
				$new_line[10] = ''; // topic smiley

				$new_line = array_pad($new_line, 19,'');

				$new_line_str = implode(d,$new_line);
				fputs($f_new_header, $new_line_str."\n");
				$total_postings += count($old_posting_file);
				foreach($old_posting_file as $old_posting_line)
				{
					$old_posting_line = explode('||', $old_posting_line);
					# now we convert posting file...
					$new_posting[0] = stripslashes($old_posting_line[0]); // subject
					$new_posting[1] = $old_posting_line[1]; // author
					$new_posting[2] = $old_posting_line[2]; // email
					$new_posting[3] = ''; //topic smiley
					$new_posting[4] = trim($old_posting_line[5]); // ip
					$new_posting[5] = trim($old_posting_line[4]); // time
					$new_posting[6] = ''; // smileys
					
					$pcontent = eregi_replace('<br>', nlr, $old_posting_line[3]);
					$pcontent = eregi_replace('<p>', nlr, $pcontent);
					$pcontent = stripslashes($pcontent);

					#$pcontent = eregi_replace('<a href=','[url=', $pcontent);
					#$pcontent = eregi_replace('>',']', $pcontent);
					#$pcontent = eregi_replace('</a','\[/url', $pcontent);
					#$pcontent = eregi_replace('<','[', $pcontent);

					$new_posting[7] = $pcontent;

					$new_posting = array_pad($new_posting,19,'');
					$new_posting_str = implode(d, $new_posting)."\n";
					$new_posting_file[] = $new_posting_str;
				}

				save_file($new_posting_file, dir_data.date('YmdHis', $old_line[3]).msg_ext, flokk);
				unset ($new_posting_file);
			}
		}
		fclose($f_new_header);
	}

	update_cat_file($forums_list, '', $total_postings, $total_topics, '', '');

	$f_old_users = file($x_old_users);
	if (count($f_old_users)>1)
	{
		$f_new_users = fopen(f_users, 'a');
		for($i=1;$i<count($f_old_users)-1;$i++)
		{
			$old_usr = explode('||', $f_old_users[$i]);
			if (user_exists($old_usr[0])==false)
			{
				$new_usr[0] = $old_usr[0]; // username
				$new_usr[1] = md5($old_usr[1]); // pass
				$new_usr[2] = $old_usr[2]; // email
				$new_usr[3] = trim($old_usr[6]); // registrering time
				$new_usr[4] = 0; // usergroup
				$new_usr[5] = '';//description
				$new_usr[6] = ''; // avatar
				$new_usr[7] = ''; // msn
				$new_usr[8] = ($old_usr[3] == 'http://') ?  '': $old_usr[3]; // homepage
				$new_usr[9] = ''; // location
				$new_usr[10] = ''; // occupation
				$new_usr[11] = $old_usr[4]; // signature
				$new_usr[12] = 'en.php'; // language
				$new_usr[13] = 'default'; // template
				$new_usr[14] = $old_usr[5]; // postings

				$new_usr = array_pad($new_usr,19,'');

				$new_usr_str = implode(d, $new_usr)."\n";

				fwrite($f_new_users, $new_usr_str);
			}
		}
		fclose($f_new_users);
	}

	goto_url($PHP_SELF);
}


# prints memberslist
function members_list()
{
	global $page, $PHP_SELF, $l, $t;
	$users = file(f_users);
	$users = array_splice($users, 1, count($users));
	$users = sort_array($users, 0, d, false);

	if (is_array($users))
	{
		$members = grojsus($users, $page,30,0,'','page',true,'SE',10);
	
		$tpl_members_row = get_template(get_template_path().'members_row.htm');
		$tpl_members_row_admin = get_template(get_template_path().'members_row_admin.htm');

		$i=-1;
		foreach($members[0] as $member)
		{
			$i++;
			$t['css_id'] = ($i%2) ? '1' : '0';
			$t['id'] = $i;
			$a = explode(d, $member);
			$t['username'] = $a[0];
			$t['short_description'] = $a[5];
			if (admin_in()==true)
			{
				$t['usersgroups'] = list_usersgroups($a[4]);
				$t['admin_links'] = parse_tpl($tpl_members_row_admin);
			}
			$members_list .= parse_tpl($tpl_members_row);
		}
	}

	$t['members_link_bar'] = $members[1];
	$t['members_row'] = $members_list;
	print parse_tpl(get_template(get_template_path().'members_page.htm'));
}

# bakup screen for admin...
function form_admin_backup()
{
	global $PHP_SELF, $l, $t;
	$t['archive_name'] = 'backup-'.date('Y-m-d__H.i');
	$t['data_dir'] = dir_data;
	$archives = file_list(dir_data, "(\.tar$)|(\.gz$)");

	if (is_array ($archives))
	{
		$list = '<select name="arc">';
		foreach($archives as $arc)
		{
			$list .= '<option value="'.$arc.'">'.$arc.'('.filesize(dir_data.$arc).')</option>';
		}
		$list .= '</select>';
		$t['archive_list']=$list;
		$t['extract_form'] = parse_tpl(get_template(get_template_path().'admin_backup_extract_page.htm'));
	}

	print parse_tpl(get_template(get_template_path().'admin_backup_page.htm'));
}


function get_file_content($file)
{
	if (file_exists($file)==true)
	{
		$fp = fopen($file, 'r');
		$contents = fread($fp, filesize($file));
		fclose($fp);
		return $contents;
	}
	return false;
}

# makes backup copies of board settings/postings
function tar_data()
{
	global $archive_type, $archive_name, $PHP_SELF;
	require_once('tf.archive.php');

	if ($archive_type == 'tar')
	{
		$arc = new tarfile(dir_data,array(1,0777,0,0));
		$arc_ext = '.tar';
	}
	else if ($archive_type == 'gz')
	{
		$arc  = new gzfile(dir_data,array(1,0777));
		$arc_ext = '.gz';
	}

	$ext = explode('.', msg_ext);
	$files = file_list(dir_data, "(\.php$)|(\.txt$)|(\.".$ext[1]."$)");

	if (is_array($files))
	{
		foreach($files as $file)
		{
			$arc->addfile(get_file_content(dir_data.$file),$file);
		}

		$arc->filewrite(dir_data.$archive_name.$arc_ext,0777);
	}

	goto_url($PHP_SELF.'?action=admin&backup=1',2);
}

# deletes gzip or tar archive
function delete_archive()
{
	global $arc, $PHP_SELF;

	if (eregi('(tar$)|(gz$)',$arc))
	{
		unlink(dir_data.$arc);
	}
	goto_url($PHP_SELF.'?action=admin&backup=1',0);
}

function untar_data()
{
	global $arc, $data_dir, $PHP_SELF, $l;

	require_once('tf.archive.php');

	$ext = explode('.', $arc);
	$ext = $ext[count($ext)-1];

	if ($ext=='tar')
	{
		$tar = new tarfile(dir_data,array(1,0777,0,0));
		$a=$tar-> extractfile(dir_data.$arc);
	}
	else if ($ext=='gz')
	{
		$gzip = new gzfile(dir_data,array(1,0777));
		$a=$gzip-> extractfile(dir_data.$arc);
	}

	if (is_array($a))
	{
		if (is_dir($data_dir)==true)
		{
			foreach($a as $b)
			{
				$fp = fopen($data_dir.$b['filename'], 'wb');
				fwrite($fp, $b['data']);
				fclose($fp);
			}
		}
		else
		{
			alert($l['Dir_not_found']);
		}
	}
	else
	{
		alert($l['Archive_error']);
	}
	goto_url($PHP_SELF.'?action=admin&backup=1',0);
}


# sets locked flag vice-versa
function set_lock_flag($topic)
{
	$tf = ${'tf'.get_cookid};
	global $l, $PHP_SELF, $tf;

	$ug=get_user_group($tf['user']);

	if ($ug<1 || $ug==false)
	{
		err_msg($l['Not_for_your_eyes']);
		return false;
	}

	$fn = dir_data.date('YmdHis',$topic).msg_ext;
	if (file_exists($fn)==false)
	{
		err_msg($l['Topic_not_found']);
		return false;
	}

	$header = file(f_header);
	$i=-1;
	
	foreach($header as $line)
	{
		$i++;
		$a = explode(d, $line);
		if ($a[6]==$topic)
		{
			$a[10] = ($a[10]==1) ? 0 : 1;
			$fid = $a[0];
			$s = implode(d, $a);
			$header[$i]=$s;
			break;
		}
	}

	save_file($header, f_header, flokk);
	goto_url($PHP_SELF.'?action=topics&fid='.$fid);
}

#
function icon_bar($selected='')
{
	global $l;
	if (is_dir(dir_topic_icons)==false)
	{
		return false;
	}

	$exts = explode(',',topic_img_types);
	foreach($exts as $ext)
	{
		$pattern[] = '(\.'.$ext.'$)';
	}
	$pattern = implode('|',$pattern);
	$topic_icons = file_list(dir_topic_icons, $pattern);
	if (is_array($topic_icons))
	{
		foreach($topic_icons as $ti)
		{
			if ($selected==$ti)	{ $chk = ' checked="checked"'; $x = true; }
			else { $chk =''; }
			$icon_bar .= '<input type="radio"'.$chk.' name="f[topic_icon]" value="'.$ti.'"><img src="'.dir_topic_icons.$ti.'" alt="'.$ti.'"> ';
		}

		$chk = ($x == true) ? '' : ' checked="checked"';
		$icon_bar = '<input type="radio"'.$chk.' name="f[topic_icon]" value="">'.$l['No_icon'].$icon_bar;

	}
	return $icon_bar;
}

#return s smileys from smiley dir
function tpl_get_smileys()
{
	global $l, $t;
	if (is_dir(dir_smileys)==false)
	{
		return false;
	}

	$exts = explode(',',smiley_img_types);
	foreach($exts as $ext)
	{
		$pattern[] = '(\.'.$ext.'$)';
	}
	$pattern = implode('|',$pattern);
	$smileys = file_list(dir_smileys, $pattern);

	if (is_array($smileys))
	{
		$tpl_smiley = get_template(get_template_path().'smileys.htm');
		foreach($smileys as $smiley)
		{
			$t['smiley_name'] = $smiley;
			$t['smiley_path'] = dir_smileys.$smiley_name;
			$array = explode('.', $smiley);
			$t['smiley_value'] = '[:'.$array[count($array)-2].':]';
			$smiley_bar .= parse_tpl($tpl_smiley);
		}
	}
	return $smiley_bar;
	
}

# replaces smileys with images
function parse_smileys($text)
{
	global $static_smileys;

	if (is_dir(dir_smileys)==false)
	{
		return false;
	}

	$exts = explode(',',smiley_img_types);
	foreach($exts as $ext)
	{
		$pattern[] = '(\.'.$ext.'$)';
	}
	$pattern = implode('|',$pattern);
	$smileys = file_list(dir_smileys, $pattern);

	if (is_array($smileys))
	{
		foreach($smileys as $smiley)
		{
			$array = explode('.', $smiley);
			$pattern = '\[:'.$array[count($array)-2].':\]';
			$text=eregi_replace($pattern, '<img src="'.dir_smileys.$smiley.'" alt="'.$smiley.'" border="0"> ', $text);
		}
	}

	if (is_array($static_smileys))
	{
		foreach($static_smileys as $smiley=>$image)
		{
			$text=eregi_replace($smiley,'<img src="'.dir_smileys.$image.'" alt="'.$smiley.'" border="0"> ', $text);
		}
	}

	return $text;
}

# returns avatars from avatar directory
function tpl_get_avatarpage($selected='')
{
	global $l,$t;
	$exts = explode(',',avatar_img_types);
	foreach($exts as $ext)
	{
		$pattern[] = '(\.'.$ext.'$)';
	}

	$pattern = implode('|',$pattern);
	$avatars = file_list(dir_avatars, $pattern);

	$tpl_avatar_row = get_template(get_template_path().'avatar_row.htm');
	$tpl_avatar_page = get_template(get_template_path().'avatar_page.htm');

	$t['avatar_path'] = dir_avatars;
	if (is_array($avatars))
	{
		natcasesort($avatars);
		foreach($avatars as $a)
		{
			$t['avatar'] = $a;
			$avatars_list .= parse_tpl($tpl_avatar_row);
		}
	}
	else
	{
		return false;
	}
	$t['avatars_path'] = dir_avatars; 
	$t['selected_avatar']=($selected=='') ? 'avatar00.gif' : $selected;
	$t['avatars_list'] = $avatars_list;
	return parse_tpl($tpl_avatar_page);
}

# this function repairs broken category file
# * removes broken lines
# * calculates correct postings and topics
# * removes last poster etc, if there aren't postings
function fix_categories_file()
{
	global $l;

	$cf = file(f_categories);

	if (is_array($cf))
	{
		$hdr = file(f_header);
		if (is_array($hdr))
		{
			foreach($hdr as $line)
			{
				$a = explode(d,$line);
				$fid = $a[0];
				$new_dat[$fid][0] ++;		// topics
				$new_dat[$fid][1] += $a[4];	// postings
			}

			$cts = file(f_categories);
			for($i=0; $i<count($cts); $i++)
			{
				# we set correct postings/topics
				$a = explode(d, $cts[$i]);
				$a[10] = $new_dat[$i][1]; // correct postings number
				$a[11] = $new_dat[$i][0];  // correct topics number
				$cts[$i] = implode(d, $a);
				$a = explode(d, $cts[$i]);

				# if there are less than 1 topics we remove all unnecessary info
				if ($a[10]<1)
				{
					$a[6]='';	// last poster
					$a[7]='';	// last posting timestamp
					$a[9]='';	// subject
					$a[10]=0;	// postings
					$a[11]=0;	// topics
				
					$s = implode(d,$a);
					$cts[$i]=$s;
				}

				if (count($a)<13)
				{
					unset($cts[$i]);
				}
			}
			save_file($cts,f_categories,flokk);
		}
	}
	else
	{
		print $l['File_not_found'];
	}
	goto_url($PHP_SELF.'?action=admin&cats=1',3);
}

# function returns last postings from header file
function last_postings($how_many=5, $dir='')
{
	global $l;
	$lines = file($dir.f_header);

	if (is_array($lines))
	{
		$sorted_lines = sort_array($lines, 7, d);
		$total = (count($lines)<$how_many) ? count($lines) : $how_many;
		for ($i=0;$i<$total;$i++)
		{
			$line = explode(d, $sorted_lines[$i]);
			$links .= '<a href="index.php?action=view&topic='.$line[6].'">'.$line[1]."</a><br>\n";
		}
		return $links;
	}
	else
	{
		return $l['No_topics'];
	}
}

# deletes user from usersfile
function delete_user($username)
{
	global $PHP_SELF;

	if (user_exists($username)==false)
	{
		err_msg($l['User_not_exists']);
	}

	$users = file(f_users);

	for($i=1;$i<count($users);$i++)
	{
		$user = explode(d, $users[$i]);
		if ($user[0]==$username)
		{
			unset($users[$i]);
			break;
		}
	}

	save_file($users, f_users, flokk);
	goto_url($PHP_SELF.'?action=members');
}

# changes usergroup, for example from user to 
# moderator or administrator or vice versa
function change_usergroup($username, $group)
{
	global $PHP_SELF;

	if (user_exists($username)==false)
	{
		err_msg($l['User_not_exists']);
	}

	if ($group >= 0 && $group<=2)
	{
		$users = file(f_users);

		for($i=1;$i<count($users);$i++)
		{
			$user = explode(d, $users[$i]);
			if ($user[0]==$username)
			{
				$user[4] = $group;
				$user = array_pad($user,19,'');
				$users[$i] = implode(d, $user);
				break;
			}
		}

		save_file($users, f_users, flokk);
		goto_url($PHP_SELF.'?action=members');
	}
}

#
#   Feel free to send me water, bread and nonrepayable credit :-)
#
#	             ---->>> lauri_k@mail.ru <<<-----
#
#         I wrote miraculous scripts for next to nothing!
#
#                          - call me -

?>