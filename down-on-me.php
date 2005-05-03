<?php
/*
Plugin Name: Down on me
Plugin URI: http://dev.wp-plugins.org/wiki/DownOnMe
Description: Rewrites the header tags in your posts one level down. To be used in multipost pages.
Version: 0.1
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


if (isset($wp_version)) { // if we are into WordPress, add the filter
	add_filter('the_content', 'tt_down_on_me', 8);
}
?>