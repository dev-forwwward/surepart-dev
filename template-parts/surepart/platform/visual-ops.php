<?php
/**
 * Operational Intelligence hero — stacked supplier checks (decorative).
 */
$rows = array(
	array( '001', 'Supplier quotes', 'dots-green' ),
	array( '002', 'Live Inventory & Delivery', 'dots-mixed' ),
	array( '003', 'Supplier quotes', 'dots-mixed' ),
	array( '004', 'Live Inventory & Delivery', 'dots-green' ),
);
?>
<div class="sp-pv sp-pv--ops">
	<div class="sp-pv__vehicle">
		<p><span>VEHICLE</span>2012 Ford Focus</p>
		<p><span>MARKUP</span>25%</p>
	</div>
	<ol class="sp-pv__stack">
		<?php foreach ( $rows as $i => $r ) : ?>
			<li style="--sp-step:<?php echo (int) $i; ?>">
				<img class="sp-pv__pointer" src="<?php echo esc_url( surepart_img( 'arrow-grey.svg' ) ); ?>" alt="" width="8" height="35">
				<span class="sp-pv__row"><span><?php echo esc_html( $r[0] ); ?></span><b><?php echo esc_html( $r[1] ); ?></b><img src="<?php echo esc_url( surepart_img( $r[2] . '.svg' ) ); ?>" alt="" width="46" height="6"></span>
			</li>
		<?php endforeach; ?>
	</ol>
</div>
