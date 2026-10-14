<?php
/**
 * Home — The Approach.
 */
$label   = surepart_field( 'sp_approach_label', 'The approach' );
$heading = surepart_field( 'sp_approach_heading', 'A smarter approach to parts decisioning' );
$intro   = surepart_field( 'sp_approach_intro', 'SurePart combines historical parts intelligence with current market information to give insurers a smarter approach to parts decisioning.' );
$items   = surepart_field( 'sp_approach_items', array(
	array( 'title' => 'Decisions', 'text' => 'Improve confidence in parts selection decisions' ),
	array( 'title' => 'Pricing', 'text' => 'Reduce pricing uncertainty' ),
	array( 'title' => 'Estimate', 'text' => 'Increase estimate accuracy' ),
	array( 'title' => 'Research', 'text' => 'Minimize manual research and supplier outreach' ),
	array( 'title' => 'Execution', 'text' => 'Support faster repair planning and execution' ),
) );
$bars = array(
	array( 'Historical parts intelligence', 'archive', 74, false ),
	array( 'Current supplier quotes', 'real-time', 92, true ),
	array( 'Live inventory & delivery', 'real-time', 86, true ),
	array( 'Carrier policy rules', 'program', 64, false ),
);
?>
<section class="sp-section sp-approach">
	<div class="sp-container">
		<p class="sp-overline"><?php echo esc_html( $label ); ?></p>
		<h2 class="sp-h2 sp-approach__title"><?php echo esc_html( $heading ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h2>
		<p class="sp-body sp-approach__intro"><?php echo esc_html( $intro ); ?></p>

		<div class="sp-approach__grid">
			<div class="sp-approach__visual" aria-hidden="true">
				<img class="sp-approach__lines" src="<?php echo esc_url( surepart_img( 'lines-approach.svg' ) ); ?>" alt="" width="624" height="388">
				<div class="sp-analysis">
					<p class="sp-analysis__head"><span>market analysis</span><span class="is-live">live</span></p>
					<?php foreach ( $bars as $b ) : ?>
						<div class="sp-meter">
							<div class="sp-meter__row"><span><?php echo esc_html( $b[0] ); ?></span><span><?php echo esc_html( $b[1] ); ?></span></div>
							<div class="sp-meter__track<?php echo $b[3] ? ' is-strong' : ''; ?>"><i style="width:<?php echo (int) $b[2]; ?>%"></i></div>
						</div>
					<?php endforeach; ?>
					<p class="sp-analysis__foot"><span>Recommended part</span><b>Aftermarket · $284.10</b></p>
				</div>
			</div>

			<ul class="sp-benefits">
				<?php foreach ( $items as $item ) : ?>
					<li>
						<span class="sp-benefits__rule" aria-hidden="true"></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
