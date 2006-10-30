<?php
/*
Plugin Name: Down on me
Plugin URI: http://dev.wp-plugins.org/wiki/DownOnMe
Description: Rewrites the header tags in your posts one level down. To be used in multipost pages.
Version: 0.3
Author: Choan C. Galvez <choan@alice.0z0ne.com>
Author URI: http://dizque.lacalabaza.net/
*/

/*  
    Copyright 2005  Choan C. Galvez  (email: choan@alice.0z0ne.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$tt_down_on_me_config = array(
	"home" => 2,
	"single" => 2,
	"category" => 1,
	"page" => 0
);

function tt_down_on_me_getDownlevel() {
	global $tt_down_on_me_config;
	if (is_home()) return $tt_down_on_me_config["home"];
	if (is_single()) return $tt_down_on_me_config["single"];
	if (is_category()) return $tt_down_on_me_config["category"];
	if (is_page()) return $tt_down_on_me_config["page"];
	return 0;
}

function tt_down_on_me($text) {
	$n = tt_down_on_me_getDownlevel();
	if (!$n) return $text;
	$pattern = "/<h([1-6])(.*>.*<\/h)([1-6])>/Use";
	$replace = "tt_down_on_me_replace('\\1', '\\2', '\\3', $n)";
	return preg_replace($pattern, $replace, $text); 

}

function tt_down_on_me_replace($level1, $middle, $level2, $n) {
	return '<h'. ($level1 + $n) . stripslashes($middle) . ($level2 + $n) .'>';
}


if (isset($wp_version)) { // if we are into WordPress, add the filter
	add_filter('the_content', 'tt_down_on_me', 8);
}
?>