<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$template = get_option( 'template' );

switch( $template ) {
	case 'flatterone' :
		echo '</div></div>';
		break;
	case 'flattertwo' :
		echo '</div></div>';
		break;
	case 'flatterthree' :
		echo '</div></div>';
		break;
	case 'flatterfour' :
		echo '</div></div></div>';
		get_sidebar( 'content' );
		break;
	default :
		get_sidebar( 'shopsidebar_left' );
		echo '</div></div></section>';
		break;
}