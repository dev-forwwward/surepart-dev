<?php
/**
 * Operational Intelligence — "Built for modern claims operations" split.
 */
?>
<section class="sp-section sp-pfsplit">
	<div class="sp-container sp-pfsplit__inner">
		<div class="sp-pfsplit__visual" aria-hidden="true">
			<?php get_template_part( 'template-parts/surepart/platform/visual-quote' ); ?>
		</div>
		<div class="sp-pfsplit__copy">
			<h2 class="sp-h2"><?php echo esc_html( $args['split_heading'] ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h2>
			<p class="sp-body"><?php echo esc_html( $args['split_body'] ); ?></p>
		</div>
	</div>
</section>
