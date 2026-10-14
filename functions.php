<?php
/**
 * Stub theme functions.
 *
 * Everything above the "SUREPART" line exists only to make the stub theme work
 * in Local. When moving to the real PartsTrader theme, copy ONLY the require
 * line at the bottom into that theme's functions.php.
 */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
} );

// The real site already loads jQuery; mirror that here so code behaves the same.
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'jquery' );
} );

// Stub convenience: create the SurePart page on theme activation if missing.
add_action( 'after_switch_theme', function () {
	if ( ! get_page_by_path( 'surepart' ) ) {
		wp_insert_post( array(
			'post_title'  => 'SurePart',
			'post_name'   => 'surepart',
			'post_type'   => 'page',
			'post_status' => 'publish',
		) );
	}
	flush_rewrite_rules();
} );

/* ---------------- SUREPART: copy this line into the real theme ---------------- */
require_once get_stylesheet_directory() . '/inc/surepart.php';
