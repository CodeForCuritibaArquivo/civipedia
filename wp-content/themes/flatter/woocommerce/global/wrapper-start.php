<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$template = get_option( 'template' );

switch( $template ) {
	case 'flatterone' :
		echo '<div id="primary"><div id="content" role="main">';
		break;
	case 'flattertwo' :
		echo '<div id="primary" class="site-content"><div id="content" role="main">';
		break;
	case 'flatterthree' :
		echo '<div id="primary" class="site-content"><div id="content" role="main" class="entry-content twentythirteen">';
		break;
	case 'flatterfour' :
		echo '<div id="primary" class="content-area"><div id="content" role="main" class="site-content twentyfourteen"><div class="tfwc">';
		break;
	default :
		echo '<section class="inner-content"><div class="container"><div class="row">';
		break;
}