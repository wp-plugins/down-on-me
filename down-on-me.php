<?php
/*
Plugin Name: Down on me
Plugin URI: http://codex.wordpress.org/Plugin:DownOnMe
Description: <a href="http://dizque.lacalabaza.net/2005/03/down-on-me">Down on me</a> rewrites the header tags in your posts one level down. To be used in multipost pages.
Version: 0.1
Author: Choan C. Galvez <choan@alice.0z0ne.com>
Author URI: http://dizque.lacalabaza.net/
*/

function tt_down_on_me($text) {
	if (is_single() || is_page()) {
		return $text;
	}
	
	$pattern = "/<h([2-5])(.*>.*<\/h)([2-5])>/Use";
	$replace = "tt_down_on_me_replace('\\1', '\\2', '\\3')";
	return preg_replace($pattern, $replace, $text); 

}

function tt_down_on_me_replace($level1, $middle, $level2) {
	return '<h'. ($level1 + 1) . stripslashes($middle) . ($level2 + 1) .'>';
}

add_filter('the_content', 'tt_down_on_me', 8);


?>