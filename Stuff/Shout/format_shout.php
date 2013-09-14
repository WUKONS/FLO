<?php
 
function format_shout($text, $strip_html = true) {
 
    $s = $text;
    //$s = strip_tags($s);
 
  if ($strip_html)
    $s = htmlspecialchars($s);
 
    $s = stripslashes($s);
 
    // [b]Bold[/b]
    $s = preg_replace("/\[b\]((\s|.)+?)\[\/b\]/", "<b>\\1</b>", $s);
 
    // [i]Italic[/i]
    $s = preg_replace("/\[i\]((\s|.)+?)\[\/i\]/", "<i>\\1</i>", $s);
 
    // [u]Underline[/u]
    $s = preg_replace("/\[u\]((\s|.)+?)\[\/u\]/", "<u>\\1</u>", $s);
 
    // [color=blue]Text[/color]
    $s = preg_replace(
        "/\[color=([a-zA-Z]+)\]((\s|.)+?)\[\/color\]/i",
        "<font color=\\1>\\2</font>", $s);
 
    // [color=#ffcc99]Text[/color]
    $s = preg_replace(
        "/\[color=(#[a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9])\]((\s|.)+?)\[\/color\]/i",
        "<font color=\\1>\\2</font>", $s);
 
    // [url=http://www.example.com]Text[/url]
    $s = preg_replace(
        "/\[url=((http|ftp|https|ftps|irc):\/\/[^<>\s]+?)\]((\s|.)+?)\[\/url\]/i",
        "<a href=\\1 target=_blank>\\3</a>", $s);
 
    // [url]http://www.example.com[/url]
    $s = preg_replace(
        "/\[url\]((http|ftp|https|ftps|irc):\/\/[^<>\s]+?)\[\/url\]/i",
        "<a href=\\1 target=_blank>\\1</a>", $s);
 
 
    // [url]www.example.com[/url]
    $s = preg_replace(
        "/\[url\](www\.[^<>\s]+?)\[\/url\]/i",
        "<a href='http://\\1' target='_blank'>\\1</a>", $s);
 
    // [url=www.example.com]Text[/url]
    $s = preg_replace(
        "/\[url=(www\.[^<>\s]+?)\]((\s|.)+?)\[\/url\]/i",
        "<a href='http://\\1' target='_blank'>\\2</a>", $s);
        
     // URL
    $s = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $s);
 
    // [size=4]Text[/size]
    $s = preg_replace(
        "/\[size=([1-7])\]((\s|.)+?)\[\/size\]/i",
        "<font size=\\1>\\2</font>", $s);
 
    // [font=Arial]Text[/font]
    $s = preg_replace(
        "/\[font=([a-zA-Z ,]+)\]((\s|.)+?)\[\/font\]/i",
        "<font face=\"\\1\">\\2</font>", $s);
 
    // Linebreaks
    $s = nl2br($s);
 
    // Maintain spacing
    $s = str_replace("  ", " &nbsp;", $s);
 
        // Smileys
 	    $s = str_replace(":angry:",           "<img border='0' src='./static/common/smileys/angry.gif' alt='' />", $s);
		$s = str_replace(":-D",               "<img border='0' src='./static/common/smileys/biggrin.gif' alt='' />", $s);
		$s = str_replace(":D",                "<img border='0' src='./static/common/smileys/biggrin.gif' alt='' />", $s);
		$s = str_replace(":|",                "<img border='0' src='./static/common/smileys/blank.gif' alt='' />", $s);
		$s = str_replace(":-|",               "<img border='0' src='./static/common/smileys/blank.gif' alt='' />", $s);
		$s = str_replace(":blush:",           "<img border='0' src='./static/common/smileys/blush.gif' alt='' />", $s);
		$s = str_replace(":cool:",            "<img border='0' src='./static/common/smileys/cool.gif' alt='' />", $s);
		$s = str_replace(":&#39;(",           "<img border='0' src='./static/common/smileys/crying.gif' alt='' />", $s);
		$s = str_replace(":crying:",          "<img border='0' src='./static/common/smileys/crying.gif' alt='' />", $s);
		$s = str_replace("&gt;.&gt;",         "<img border='0' src='./static/common/smileys/eyesright.gif' alt='' />", $s);
		$s = str_replace(":frown:",           "<img border='0' src='./static/common/smileys/frown.gif' alt='' />", $s);
		$s = str_replace("&lt;3",             "<img border='0' src='./static/common/smileys/heart.gif' alt='' />", $s);
		$s = str_replace(":unsure:",          "<img border='0' src='./static/common/smileys/hmm.gif' alt='' />", $s);
		$s = str_replace(":\\",               "<img border='0' src='./static/common/smileys/hmm.gif' alt='' />", $s);
		$s = str_replace(":whatlove:",        "<img border='0' src='./static/common/smileys/ilu.gif' alt='' />", $s);
		$s = str_replace(":lol:",             "<img border='0' src='./static/common/smileys/laughing.gif' alt='' />", $s);
		$s = str_replace(":loveflac:",        "<img border='0' src='./static/common/smileys/loveflac.gif' alt='' />", $s);
		$s = str_replace(":ninja:",           "<img border='0' src='./static/common/smileys/ninja.gif' alt='' />", $s);
		$s = str_replace(":no:",              "<img border='0' src='./static/common/smileys/no.gif' alt='' />", $s);
		$s = str_replace(":nod:",             "<img border='0' src='./static/common/smileys/nod.gif' alt='' />", $s);
		$s = str_replace(":ohno:",            "<img border='0' src='./static/common/smileys/ohnoes.gif' alt='' />", $s);
		$s = str_replace(":ohnoes:",          "<img border='0' src='./static/common/smileys/ohnoes.gif' alt='' />", $s);
		$s = str_replace(":omg:",             "<img border='0' src='./static/common/smileys/omg.gif' alt='' />", $s);
		$s = str_replace(":o",                "<img border='0' src='./static/common/smileys/ohshit.gif' alt='' />", $s);
		$s = str_replace(":O",                "<img border='0' src='./static/common/smileys/ohshit.gif' alt='' />", $s);
		$s = str_replace(":paddle:",          "<img border='0' src='./static/common/smileys/paddle.gif' alt='' />", $s);
		$s = str_replace(":(",                "<img border='0' src='./static/common/smileys/sad.gif' alt='' />", $s);
		$s = str_replace(":-(",               "<img border='0' src='./static/common/smileys/sad.gif' alt='' />", $s);
		$s = str_replace(":shifty:",          "<img border='0' src='./static/common/smileys/shifty.gif' alt='' />", $s);
		$s = str_replace(":sick:",            "<img border='0' src='./static/common/smileys/sick.gif' alt='' />", $s);
		$s = str_replace(":)",                "<img border='0' src='./static/common/smileys/smile.gif' alt='' />", $s);
		$s = str_replace(":-)",               "<img border='0' src='./static/common/smileys/smile.gif' alt='' />", $s);
		$s = str_replace(":bow:",             "<img border='0' src='./static/common/smileys/bow.gif' alt='' />", $s);
		$s = str_replace(":thanks:",          "<img border='0' src='./static/common/smileys/thanks.gif' alt='' />", $s);
		$s = str_replace(":P",                "<img border='0' src='./static/common/smileys/tongue.gif' alt='' />", $s);
		$s = str_replace(":-P",               "<img border='0' src='./static/common/smileys/tongue.gif' alt='' />", $s);
		$s = str_replace(":wave:",            "<img border='0' src='./static/common/smileys/wave.gif' alt='' />", $s);
		$s = str_replace(";-)",               "<img border='0' src='./static/common/smileys/biggrin.gif' alt='' />", $s);
		$s = str_replace(":wink:",            "<img border='0' src='./static/common/smileys/wink.gif' alt='' />", $s);
		$s = str_replace(":creepy:",          "<img border='0' src='./static/common/smileys/creepy.gif' alt='' />", $s);
		$s = str_replace(":worried:",         "<img border='0' src='./static/common/smileys/worried.gif' alt='' />", $s);
		$s = str_replace(":wtf:",             "<img border='0' src='./static/common/smileys/wtf.gif' alt='' />", $s);
		$s = str_replace(":wub:",             "<img border='0' src='./static/common/smileys/wub.gif' alt='' />", $s);

    return $s;
}
?>
