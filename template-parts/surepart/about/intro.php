<?php
/**
 * About — "A trusted source…" intro + What we do / How we do it.
 */
$checks  = array( 'Supplier quotes', 'Live Inventory & Delivery', 'Supplier quotes', 'Live Inventory & Delivery' );
$pillars = is_array( $args['pillars'] ) ? array_slice( $args['pillars'], 0, 2 ) : array();
?>
<section class="sp-section sp-aintro">
	<img class="sp-aintro__pattern" src="<?php echo esc_url( surepart_img( 'about-circle-pattern.svg' ) ); ?>" alt="" width="1436" height="1078">

	<div class="sp-container">
		<div class="sp-aintro__top">
			<div>
				<h2 class="sp-h2 sp-aintro__title"><?php echo esc_html( $args['intro_heading'] ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h2>
				<p class="sp-body sp-aintro__body"><?php echo esc_html( $args['intro_body'] ); ?></p>
			</div>
			<ul class="sp-checks" aria-hidden="true">
				<?php foreach ( $checks as $c ) : ?>
					<li><strong><?php echo esc_html( $c ); ?></strong><img src="<?php echo esc_url( surepart_img( 'dots-green.svg' ) ); ?>" alt="" width="46" height="6"></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="sp-pillars">
			<?php foreach ( $pillars as $i => $p ) : ?>
				<article class="sp-pillar">
					<img class="sp-pillar__lines sp-pillar__lines--<?php echo (int) $i + 1; ?>" src="<?php echo esc_url( surepart_img( 'about-card-lines-' . ( $i + 1 ) . '.svg' ) ); ?>" alt="" width="1041" height="1002">
					<p class="sp-overline sp-pillar__label"><?php echo esc_html( $p['label'] ); ?></p>
					<h3 class="sp-h3 sp-pillar__title"><?php echo esc_html( $p['title'] ); ?></h3>
					<p class="sp-pillar__text"><?php echo esc_html( $p['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
