<?php
/**
 * Price Confidence hero — validated claim panel (decorative).
 */
$parts = array(
	array( 'Bumper cover, front', 'IBMSZ 13008 K' ),
	array( 'Absorber, front bumper', 'CP9Z 16612 B' ),
	array( 'Hood Panel', 'BMSZ 16006 B' ),
	array( 'Bumper cover, front', 'IBMSZ 13008 K' ),
	array( 'Absorber, front bumper', 'CP9Z 16612 B' ),
	array( 'Hood Panel', 'BMSZ 16006 B' ),
);
?>
<div class="sp-pv sp-pv--price">
	<div class="sp-pv__panel">
		<div class="sp-pv__bar"><i class="sp-pv__light"></i></div>
		<div class="sp-pv__body">
			<dl class="sp-pv__meta">
				<div><dt>STATUS</dt><dd class="sp-ui__status"><i class="sp-ui__check">✓</i>Validated</dd></div>
				<div><dt>CLAIM</dt><dd><span class="sp-ui__chip">48210</span></dd></div>
				<div><dt>APPRAISER</dt><dd>J. Ellis</dd></div>
			</dl>
			<ul class="sp-ui__list">
				<?php foreach ( $parts as $p ) : ?>
					<li><i class="sp-ui__dot"></i><?php echo esc_html( $p[0] ); ?> <small><?php echo esc_html( $p[1] ); ?></small></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
