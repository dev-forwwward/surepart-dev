<?php
/**
 * SurePart — bootstrap.
 *
 * Loaded from the theme's functions.php with a single require. Keeps every
 * SurePart addition (assets, menus, ACF) in one place so the change set
 * stays easy to track and FTP.
 */

defined( 'ABSPATH' ) || exit;

define( 'SUREPART_VERSION', '0.1.0' );
define( 'SUREPART_DIR', get_stylesheet_directory() . '/' );
define( 'SUREPART_URI', get_stylesheet_directory_uri() . '/' );

require_once SUREPART_DIR . 'inc/surepart-fields.php';
require_once SUREPART_DIR . 'inc/surepart-content.php';
require_once SUREPART_DIR . 'inc/surepart-contact.php';

/**
 * URL of a SurePart child page, e.g. surepart_page_url( 'about' ).
 */
function surepart_page_url( $slug = '' ) {
	return home_url( '/surepart/' . ( $slug ? trailingslashit( $slug ) : '' ) );
}

/**
 * Is the current request a SurePart page?
 * Home is page-surepart.php; child pages use the template-surepart-*.php templates.
 */
function surepart_is_page() {
	if ( ! is_page() ) {
		return false;
	}
	$page = get_queried_object();
	if ( ! $page instanceof WP_Post ) {
		return false;
	}
	if ( 'surepart' === $page->post_name ) {
		return true;
	}
	// Any descendant of the SurePart parent page.
	$parent = get_page_by_path( 'surepart' );
	return $parent && in_array( $parent->ID, get_post_ancestors( $page ), true );
}

/**
 * Assets — only on SurePart pages, so nothing leaks into the PartsTrader site.
 */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! surepart_is_page() ) {
		return;
	}

	wp_enqueue_style(
		'surepart-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	$css = SUREPART_DIR . 'assets/surepart/css/surepart.css';
	wp_enqueue_style(
		'surepart',
		SUREPART_URI . 'assets/surepart/css/surepart.css',
		array( 'surepart-fonts' ),
		file_exists( $css ) ? filemtime( $css ) : SUREPART_VERSION
	);

	$js = SUREPART_DIR . 'assets/surepart/js/surepart.js';
	wp_enqueue_script(
		'surepart',
		SUREPART_URI . 'assets/surepart/js/surepart.js',
		array(),
		file_exists( $js ) ? filemtime( $js ) : SUREPART_VERSION,
		true
	);
}, 20 );

add_filter( 'body_class', function ( $classes ) {
	if ( surepart_is_page() ) {
		$classes[] = 'sp-page';
	}
	return $classes;
} );

/**
 * Menus — editable in Appearance → Menus.
 */
add_action( 'after_setup_theme', function () {
	register_nav_menus( array(
		'surepart-primary'          => __( 'SurePart — Primary', 'surepart' ),
		'surepart-footer-platform'  => __( 'SurePart — Footer: Platform', 'surepart' ),
		'surepart-footer-company'   => __( 'SurePart — Footer: Company', 'surepart' ),
	) );
} );

/**
 * Default links used until menus are assigned.
 */
function surepart_default_links( $location ) {
	$sets = array(
		'surepart-primary'         => array(
			'Price Confidence'        => surepart_page_url( 'price-confidence' ),
			'Estimate Accuracy'       => surepart_page_url( 'estimate-accuracy' ),
			'Operational Intelligence'=> surepart_page_url( 'operational-intelligence' ),
			'About Us'                => surepart_page_url( 'about' ),
		),
		'surepart-footer-platform' => array(
			'Price Confidence'        => surepart_page_url( 'price-confidence' ),
			'Estimate Accuracy'       => surepart_page_url( 'estimate-accuracy' ),
			'Operational Intelligence'=> surepart_page_url( 'operational-intelligence' ),
		),
		'surepart-footer-company'  => array(
			'About'          => surepart_page_url( 'about' ),
			'Contact'        => surepart_page_url( 'contact' ),
			'Privacy Policy' => home_url( '/privacy-policy/' ),
			'Terms'          => home_url( '/terms/' ),
		),
	);
	return isset( $sets[ $location ] ) ? $sets[ $location ] : array();
}

/**
 * Print a menu location, falling back to the defaults above.
 */
function surepart_menu( $location, $ul_class ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu( array(
			'theme_location' => $location,
			'container'      => false,
			'menu_class'     => $ul_class,
			'depth'          => 1,
		) );
		return;
	}
	echo '<ul class="' . esc_attr( $ul_class ) . '">';
	foreach ( surepart_default_links( $location ) as $label => $url ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * Field helper: ACF value with a fallback so templates render before content
 * is entered (and if ACF is inactive).
 *
 * @param string     $name    Field name.
 * @param mixed      $default Fallback.
 * @param int|string $post_id Defaults to current post; use 'option' for options.
 */
function surepart_field( $name, $default = '', $post_id = false ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}
	$value = get_field( $name, $post_id );
	return ( null === $value || '' === $value || array() === $value || false === $value ) ? $default : $value;
}

function surepart_option( $name, $default = '' ) {
	return surepart_field( $name, $default, 'option' );
}

/**
 * Inline an SVG from the SurePart image folder (decorative, aria-hidden).
 */
function surepart_svg( $file, $class = '' ) {
	$path = SUREPART_DIR . 'assets/surepart/img/' . $file . '.svg';
	if ( ! file_exists( $path ) ) {
		return;
	}
	$svg = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions
	$svg = preg_replace( '/<svg\b/', '<svg aria-hidden="true" focusable="false"' . ( $class ? ' class="' . esc_attr( $class ) . '"' : '' ), $svg, 1 );
	echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput -- trusted theme file.
}

function surepart_img( $file ) {
	return SUREPART_URI . 'assets/surepart/img/' . $file;
}
