<?php
/*
Plugin Name:  Cloudfront CDN
Plugin URI:   http://sivel.net/
Description:  Based on Sivel CDN
Version:      1.0
Author:       Matt Martz
Author URI:   http://sivel.net/
*/

$origin = 'http://blog.start.me';
$cdn = 'http://assets.blog.start.me';

if ( ! is_admin() ) :

add_filter('script_loader_src', 'change_source');
add_filter('style_loader_src', 'change_source');
add_filter('stylesheet_uri', 'change_source');
add_filter('stylesheet_directory_uri', 'change_source');
function change_source($src) {
    global $origin, $cdn;
    if ( ! stristr($src, '.php') )
        $src = str_replace($origin, $cdn, $src);
    return $src;
}

endif;

add_filter('pre_option_upload_url_path', 'cdn_upload_url');
function cdn_upload_url($url) {
    global $cdn;
    return str_replace($origin, $cdn, $url);
}