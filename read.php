<?php
include_once('simple_html_dom.php');

function strip_selected_tags_content($text, $tags )
{
$text = preg_replace('#<'.$tags.'(.*?)>(.*?)</'.$tags.'>#is', '', $text);
return $text;
}

    // create HTML DOM
    $html = file_get_html('https://wisatalengkap.com/tempat-wisata-di-siak-yang-wajib-dikunjungi-saat-liburan/');

    // get article block
	
    $ret=$html->innertext;
	//$ret = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $ret);
	$ret = strip_selected_tags_content($ret,'script');
	$ret = strip_selected_tags_content($ret,'style');
	$ret=strip_tags($ret,'<p><img><h1><h2><h3><h4>');
    // clean up memory
    $html->clear();
    unset($html);

   
 // echo to browser

    echo $ret;



?>