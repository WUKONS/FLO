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

    return $s;
}

/* 	private $Smileys = array(
		':angry:'			=> 'angry.gif',
		':-D'				=> 'biggrin.gif',
		':D'				=> 'biggrin.gif',
		':|'				=> 'blank.gif',
		':-|'				=> 'blank.gif',
		':blush:'			=> 'blush.gif',
		':cool:'			=> 'cool.gif',
		':&#39;('				=> 'crying.gif',
		':crying:'				=> 'crying.gif',
		'&gt;.&gt;'			=> 'eyesright.gif',
		':frown:'			=> 'frown.gif',
		'&lt;3'				=> 'heart.gif',
		':unsure:'			=> 'hmm.gif',
		':\\'			=> 'hmm.gif',
		':whatlove:'		=> 'ilu.gif',
		':lol:'				=> 'laughing.gif',
		':loveflac:'		=> 'loveflac.gif',
		':ninja:'			=> 'ninja.gif',
		':no:'				=> 'no.gif',
		':nod:'				=> 'nod.gif',
		':ohno:'			=> 'ohnoes.gif',
		':ohnoes:'			=> 'ohnoes.gif',
		':omg:'				=> 'omg.gif',
		':o'				=> 'ohshit.gif',
		':O'				=> 'ohshit.gif',
		':paddle:'			=> 'paddle.gif',
		':('				=> 'sad.gif',
		':-('				=> 'sad.gif',
		':shifty:'			=> 'shifty.gif',
		':sick:'			=> 'sick.gif',
		':)'				=> 'smile.gif',
		':-)'				=> 'smile.gif',
		':sorry:'			=> 'sorry.gif',
		':bow:'		    	=> 'bow.gif',
		':thanks:'			=> 'thanks.gif',
		':P'				=> 'tongue.gif',
		':-P'				=> 'tongue.gif',
		':-p'				=> 'tongue.gif',
		':wave:'			=> 'wave.gif',
		';-)'				=> 'wink.gif',
		':wink:'			=> 'wink.gif',
		':creepy:'			=> 'creepy.gif',
		':worried:'			=> 'worried.gif',
		':wtf:'				=> 'wtf.gif',
		':wub:'				=> 'wub.gif',
	);
	
	private $NoImg = 0; // If images should be turned into URLs
	private $Levels = 0; // If images should be turned into URLs
	
	function __construct() {
		foreach($this->Smileys as $Key=>$Val) {
			$this->Smileys[$Key] = '<img border="0" src="'.STATIC_SERVER.'common/smileys/'.$Val.'" alt="" />';
		}
		reset($this->Smileys);
	} */

?>
