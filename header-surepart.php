<?php
/**
 * SurePart header — loaded with get_header( 'surepart' ).
 */
$sp_demo = surepart_option( 'sp_demo_url', home_url( '/surepart/contact/' ) );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="sp-skip" href="#sp-main"><?php esc_html_e( 'Skip to content', 'surepart' ); ?></a>

<header class="sp-nav" data-sp-nav>
	<div class="sp-nav__bar">
		<a class="sp-nav__logo" href="<?php echo esc_url( home_url( '/surepart/' ) ); ?>" aria-label="SurePart home">
			<?php surepart_svg( 'logo-dark' ); ?>
		</a>

		<nav class="sp-nav__menu" id="sp-nav-menu" aria-label="<?php esc_attr_e( 'SurePart', 'surepart' ); ?>">
			<?php surepart_menu( 'surepart-primary', 'sp-nav__links' ); ?>
			<a class="sp-btn sp-btn--dark sp-nav__cta" href="<?php echo esc_url( $sp_demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
		</nav>

		<button class="sp-nav__toggle" type="button" aria-expanded="false" aria-controls="sp-nav-menu" data-sp-nav-toggle>
			<span class="sp-visually-hidden"><?php esc_html_e( 'Menu', 'surepart' ); ?></span>
			<span class="sp-nav__toggle-bars" aria-hidden="true"></span>
		</button>
	</div>
</header>
