<?php
/**
 * Closing CTA band used on the child pages.
 *
 * $args: heading (string), text (string, optional),
 *        link_label / link_url (optional secondary outline button).
 * With a secondary link the band stacks (heading, then rule + buttons);
 * without one, heading and button sit side by side.
 */
$demo    = surepart_option( 'sp_demo_url', surepart_page_url( 'contact' ) );
$heading = isset( $args['heading'] ) ? $args['heading'] : '';
$text    = isset( $args['text'] ) ? $args['text'] : '';
$label   = isset( $args['link_label'] ) ? $args['link_label'] : '';
$url     = isset( $args['link_url'] ) ? $args['link_url'] : '';
$stacked = $label && $url;
?>
<section class="sp-band<?php echo $stacked ? ' sp-band--stacked' : ''; ?>">
	<div class="sp-band__inner">
		<div class="sp-band__copy">
			<?php surepart_svg( 'cta-mark', 'sp-band__mark' ); ?>
			<h2 class="sp-h2 sp-band__title"><?php echo esc_html( $heading ); ?></h2>
			<?php if ( $text ) : ?>
				<p class="sp-band__text"><?php echo esc_html( $text ); ?></p>
			<?php endif; ?>
		</div>
		<div class="sp-band__actions">
			<span class="sp-band__rule" aria-hidden="true"></span>
			<a class="sp-btn sp-btn--green" href="<?php echo esc_url( $demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
			<?php if ( $stacked ) : ?>
				<a class="sp-btn sp-btn--outline sp-btn--arrow" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?><span class="sp-arrow sp-arrow--grey" aria-hidden="true"></span></a>
			<?php endif; ?>
		</div>
	</div>
</section>
