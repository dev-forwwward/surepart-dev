<?php
/**
 * Platform page — section heading + feature cards.
 * Layouts: compare (assumption vs. reality graphic above the heading),
 * side (body copy in the right column) or plain (heading only).
 */
$layout = $args['layout'];
$cards  = is_array( $args['cards'] ) ? $args['cards'] : array();
$icons  = array( 'focus', 'license', 'verify' );
?>
<section class="sp-section sp-pfs sp-pfs--<?php echo esc_attr( $layout ); ?>">
	<div class="sp-container">
		<?php if ( 'compare' === $layout ) : ?>
			<div class="sp-versus" aria-label="<?php esc_attr_e( 'Assumption versus market reality', 'surepart' ); ?>">
				<div class="sp-versus__item sp-versus__item--assumption">
					<p class="sp-overline"><span class="sp-versus__tri" aria-hidden="true"></span><?php esc_html_e( 'Assumption', 'surepart' ); ?></p>
					<p class="sp-versus__text"><?php echo esc_html( $args['assumption'] ); ?></p>
				</div>
				<div class="sp-versus__item sp-versus__item--reality">
					<p class="sp-overline"><span class="sp-versus__tri" aria-hidden="true"></span><?php esc_html_e( 'Market reality', 'surepart' ); ?></p>
					<p class="sp-versus__text"><?php echo esc_html( $args['reality'] ); ?></p>
				</div>
			</div>
		<?php endif; ?>

		<div class="sp-pfs__head">
			<h2 class="sp-h2 sp-pfs__title"><?php echo esc_html( $args['section_heading'] ); ?><?php if ( 'compare' !== $layout ) { surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); } ?></h2>
			<?php if ( ! empty( $args['section_body'] ) ) : ?>
				<p class="sp-body sp-pfs__body"><?php echo esc_html( $args['section_body'] ); ?></p>
			<?php endif; ?>
		</div>

		<ul class="sp-features sp-features--<?php echo (int) count( $cards ); ?>">
			<?php foreach ( $cards as $card ) : ?>
				<?php $icon = ! empty( $card['icon'] ) && in_array( $card['icon'], $icons, true ) ? $card['icon'] : 'focus'; ?>
				<li class="sp-feature">
					<span class="sp-feature__icon"><?php surepart_svg( 'icon-' . $icon ); ?></span>
					<h3 class="sp-feature__title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p class="sp-feature__text"><?php echo esc_html( $card['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
