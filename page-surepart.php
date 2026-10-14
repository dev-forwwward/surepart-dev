<?php
/**
 * SurePart — Home.
 * WordPress loads this automatically for the page with slug "surepart".
 */
get_header( 'surepart' );
?>
<main id="sp-main" class="sp-main">
	<?php
	get_template_part( 'template-parts/surepart/home/hero' );
	get_template_part( 'template-parts/surepart/home/opportunity' );
	get_template_part( 'template-parts/surepart/home/platform' );
	get_template_part( 'template-parts/surepart/home/approach' );
	get_template_part( 'template-parts/surepart/home/cta' );
	?>
</main>
<?php
get_footer( 'surepart' );
