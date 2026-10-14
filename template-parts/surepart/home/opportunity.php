<?php
/**
 * Home — The Opportunity.
 */
$label     = surepart_field( 'sp_opp_label', 'The Opportunity' );
$heading   = surepart_field( 'sp_opp_heading', 'Every parts decision matters' );
$body      = surepart_field( 'sp_opp_body', "Insurers face increasing pressure to control costs, improve consistency, and accelerate repairs. Yet too many parts decisions are made using outdated pricing, incomplete availability information, or manual supplier research. When the information behind a parts decision isn't current, estimate accuracy suffers, delays increase, and uncertainty follows." );
$statement = surepart_field( 'sp_opp_statement', 'SurePart helps insurers move from assumptions to informed decisions with market intelligence delivered at the point of estimate creation.' );
$rows      = surepart_field( 'sp_opp_rows', array(
	array( 'from' => 'Static catalog pricing', 'to' => 'Supplier-backed market quotes' ),
	array( 'from' => 'Manual supplier phone calls', 'to' => 'Live inventory at the point of decision' ),
	array( 'from' => 'Availability discovered after approval', 'to' => 'Policy-aligned options surfaced up front' ),
) );
?>
<section class="sp-section sp-opp">
	<div class="sp-container">
		<p class="sp-overline"><?php echo esc_html( $label ); ?></p>
		<h2 class="sp-h2 sp-opp__title"><?php echo esc_html( $heading ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h2>

		<div class="sp-split">
			<div class="sp-split__left">
				<p class="sp-body"><?php echo esc_html( $body ); ?></p>
				<img class="sp-opp__pattern" src="<?php echo esc_url( surepart_img( 'hex-pattern.svg' ) ); ?>" alt="" width="688" height="54">
			</div>
			<div class="sp-split__right">
				<ul class="sp-compare">
					<?php foreach ( $rows as $row ) : ?>
						<li>
							<span class="sp-compare__from"><?php echo esc_html( $row['from'] ); ?></span>
							<span class="sp-arrow" aria-hidden="true"></span>
							<span class="sp-visually-hidden"><?php esc_html_e( 'becomes', 'surepart' ); ?></span>
							<strong><?php echo esc_html( $row['to'] ); ?></strong>
						</li>
					<?php endforeach; ?>
				</ul>
				<p class="sp-h3 sp-opp__statement"><?php echo esc_html( $statement ); ?></p>
			</div>
		</div>
	</div>
</section>
