<?php
/**
 * Template Name: SurePart — About
 * Template Post Type: page
 */
$sp = surepart_page_content( surepart_about_defaults(), 'sp_ab_' );

get_header( 'surepart' );
?>
<main id="sp-main" class="sp-main sp-about">
	<?php
	get_template_part( 'template-parts/surepart/about/hero', null, $sp );
	get_template_part( 'template-parts/surepart/about/intro', null, $sp );
	get_template_part( 'template-parts/surepart/about/team', null, $sp );
	get_template_part( 'template-parts/surepart/about/backers', null, $sp );
	get_template_part( 'template-parts/surepart/shared/cta-band', null, array( 'heading' => $sp['cta_heading'] ) );
	?>
</main>
<?php
get_footer( 'surepart' );
