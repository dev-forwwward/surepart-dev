<?php
/**
 * Platform page — hero (light). $args = surepart_platform_content().
 */
$demo = surepart_option( 'sp_demo_url', surepart_page_url( 'contact' ) );
?>
<section class="sp-phero">
	<img class="sp-phero__grid" src="<?php echo esc_url( surepart_img( 'platform-grid-' . $args['grid'] . '.svg' ) ); ?>" alt="" width="1041" height="1002">

	<div class="sp-container sp-phero__inner">
		<div class="sp-phero__copy">
			<p class="sp-badge sp-badge--light"><span><?php echo esc_html( $args['badge'] ); ?></span></p>
			<h1 class="sp-phero__title"><?php echo esc_html( $args['title'] ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h1>
			<p class="sp-phero__intro"><?php echo esc_html( $args['intro'] ); ?></p>
			<a class="sp-btn sp-btn--dark sp-btn--wide" href="<?php echo esc_url( $demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
		</div>

		<div class="sp-phero__visual" aria-hidden="true">
			<?php get_template_part( 'template-parts/surepart/platform/visual-' . $args['visual'] ); ?>
		</div>
	</div>
</section>
