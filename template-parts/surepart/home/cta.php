<?php
/**
 * Home — Closing CTA.
 */
$demo  = surepart_option( 'sp_demo_url', home_url( '/surepart/contact/' ) );
$lines = surepart_field( 'sp_cta_lines', "Price Confidence.\nEstimate Accuracy.\nOperational Intelligence." );
$lines = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $lines ) ) );
$sub   = surepart_field( 'sp_cta_sub', "That's the SurePart advantage." );
?>
<section class="sp-cta">
	<img class="sp-cta__lines" src="<?php echo esc_url( surepart_img( 'lines-cta.svg' ) ); ?>" alt="" width="1196" height="438">
	<div class="sp-cta__inner">
		<?php surepart_svg( 'cta-mark', 'sp-cta__mark' ); ?>
		<h2 class="sp-h2 sp-cta__title">
			<?php foreach ( $lines as $line ) : ?>
				<span><?php echo esc_html( $line ); ?></span>
			<?php endforeach; ?>
		</h2>
		<p class="sp-cta__sub"><?php echo esc_html( $sub ); ?></p>
		<a class="sp-btn sp-btn--green" href="<?php echo esc_url( $demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
	</div>
</section>
