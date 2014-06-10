<?php
function startme_styles() {
	wp_enqueue_style('themememe-fonts', '//fonts.googleapis.com/css?family=Gudea:700|Arimo:400,400italic,700');
}

add_action('wp_enqueue_scripts', 'startme_styles');