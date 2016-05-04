<?php
/**
 * Shop breadcrumb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $breadcrumb ) {

	echo $wrap_before;
	echo '<ul class="bc list-inline">';
	foreach ( $breadcrumb as $key => $crumb ) {
		
		echo $before;
		echo '<li>';
		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} else {
			echo '<a href="' .esc_html( $crumb[0] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		}

		echo $after;

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}
		echo '</li>';
	}
	echo '</ul>';

	echo $wrap_after;

}