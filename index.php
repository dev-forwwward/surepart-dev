<?php
/**
 * Stub fallback template. Not part of the SurePart deliverable.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo( 'charset' ); ?>"><?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main style="padding:4rem;font-family:sans-serif">
	<h1><?php bloginfo( 'name' ); ?> — stub theme</h1>
	<p>Visit <a href="<?php echo esc_url( home_url( '/surepart/' ) ); ?>">/surepart/</a> to see the SurePart Home template.</p>
</main>
<?php wp_footer(); ?>
</body>
</html>
