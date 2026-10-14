<?php
/**
 * Home — The Platform (three capability cards).
 * Card illustrations are fixed product UI; title / text / link are editable.
 */
$label = surepart_field( 'sp_platform_label', 'The platform' );
$cards = surepart_field( 'sp_platform_cards', array(
	array( 'title' => 'Price Confidence', 'text' => "Understand the price you're likely to pay using real supplier-backed quotes and current inventory information.", 'url' => '' ),
	array( 'title' => 'Estimate Accuracy', 'text' => 'Build estimates using validated pricing, available parts, and policy-compliant options.', 'url' => '' ),
	array( 'title' => 'Operational Intelligence', 'text' => 'Build estimates using validated pricing, available parts, and policy-compliant options.', 'url' => '' ),
) );
$ids = array( 'price-confidence', 'estimate-accuracy', 'operational-intelligence' );
?>
<section class="sp-section sp-platform" id="platform">
	<div class="sp-container">
		<p class="sp-overline"><?php echo esc_html( $label ); ?></p>

		<div class="sp-cards">
			<?php foreach ( array_slice( $cards, 0, 3 ) as $i => $card ) : ?>
				<article class="sp-card" id="<?php echo esc_attr( $ids[ $i ] ); ?>" tabindex="0">
					<img class="sp-card__lines" src="<?php echo esc_url( surepart_img( 'lines-card.svg' ) ); ?>" alt="" width="355" height="233">

					<div class="sp-card__head">
						<span class="sp-card__num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
						<h3 class="sp-h3 sp-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
						<div class="sp-card__reveal"><div class="sp-card__reveal-inner">
							<p><?php echo esc_html( $card['text'] ); ?></p>
							<?php if ( ! empty( $card['url'] ) ) : ?>
								<a class="sp-link" href="<?php echo esc_url( $card['url'] ); ?>"><?php esc_html_e( 'Explore', 'surepart' ); ?><span class="sp-arrow sp-arrow--white" aria-hidden="true"></span></a>
							<?php endif; ?>
						</div></div>
					</div>

					<div class="sp-card__ui" aria-hidden="true">
						<?php get_template_part( 'template-parts/surepart/home/platform-ui', null, array( 'index' => $i ) ); ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
