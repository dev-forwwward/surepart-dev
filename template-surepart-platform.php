<?php
/**
 * Template Name: SurePart — Platform
 * Template Post Type: page
 *
 * Shared template for Price Confidence, Estimate Accuracy and Operational
 * Intelligence. Copy comes from surepart_platform_content(): per-slug
 * defaults in inc/surepart-content.php, overridden by ACF.
 */
$sp = surepart_platform_content();

get_header( 'surepart' );
?>
<main id="sp-main" class="sp-main sp-pf sp-pf--<?php echo esc_attr( $sp['visual'] ); ?>">
	<?php
	get_template_part( 'template-parts/surepart/platform/hero', null, $sp );
	get_template_part( 'template-parts/surepart/platform/features', null, $sp );

	if ( ! empty( $sp['results'] ) ) {
		get_template_part( 'template-parts/surepart/platform/results', null, $sp );
	}
	if ( ! empty( $sp['split_heading'] ) ) {
		get_template_part( 'template-parts/surepart/platform/split', null, $sp );
	}

	get_template_part( 'template-parts/surepart/shared/cta-band', null, array(
		'heading'    => $sp['cta_heading'],
		'text'       => $sp['cta_text'],
		'link_label' => $sp['cta_link_label'],
		'link_url'   => $sp['cta_link_url'],
	) );
	?>
</main>
<?php
get_footer( 'surepart' );
