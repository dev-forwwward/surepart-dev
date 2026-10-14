<?php
/**
 * Home — Hero.
 */
$demo   = surepart_option( 'sp_demo_url', home_url( '/surepart/contact/' ) );
$badge  = surepart_field( 'sp_hero_badge', 'Real-time parts intelligence, for Insurance Companies' );
$line1  = surepart_field( 'sp_hero_line_1', 'Confident' );
$line2  = surepart_field( 'sp_hero_line_2', 'parts decisions' );
$line3  = surepart_field( 'sp_hero_line_3', 'start here' );
$intro  = surepart_field( 'sp_hero_intro', 'Real-time market pricing, live inventory availability, and policy-aligned parts options for insurers and appraisers' );
$second = surepart_field( 'sp_hero_secondary_label', 'See How It Works' );
$second_url = surepart_field( 'sp_hero_secondary_url', '#platform' );

// Illustrative claims list (decorative product UI, not editable content).
$claims = array(
	array( 'F08DF0C4S', '2012 Ford Focus 1FAHP3F21CL151818', 3, '01-10-26' ),
	array( '33-2468-77', '2009 Honda CR-V 5J6RE48389LO34899', 2, '30-09-26' ),
	array( '88-2468-57', '2013 Chevrolet Cruze 1G1PB55H9D7115484', 6, '30-09-26' ),
	array( '74-246B-09', '2011 Volvo XC70 YV4952BZ5B1115350', 2, '30-09-26' ),
	array( '43-2468-02', '2018 Toyota Avalon 4T1BK1EB0JU287736', 1, '30-09-26' ),
);
?>
<section class="sp-hero">
	<img class="sp-hero__pattern" src="<?php echo esc_url( surepart_img( 'hero-pattern.svg' ) ); ?>" alt="" width="1437" height="900">

	<div class="sp-hero__inner">
		<p class="sp-badge"><span><?php echo esc_html( $badge ); ?></span></p>

		<h1 class="sp-hero__title">
			<span><?php echo esc_html( $line1 ); ?></span>
			<span><?php echo esc_html( $line2 ); ?></span>
			<span class="sp-hero__title-accent"><?php echo esc_html( $line3 ); ?><?php surepart_svg( 'tri-accent', 'sp-tri' ); ?></span>
		</h1>

		<div class="sp-hero__bottom">
			<div class="sp-claims" aria-hidden="true">
				<div class="sp-claims__bar">
					<span class="sp-claims__dots"><i></i><i></i><i></i></span>
					<span class="sp-claims__title">My claims</span>
					<span class="sp-claims__live">SUREPART LIVE</span>
				</div>
				<div class="sp-claims__row sp-claims__row--head">
					<span>CLAIM</span><span>VEHICLE</span><span>PARTS</span><span>CREATED</span>
				</div>
				<?php foreach ( $claims as $i => $c ) : ?>
					<div class="sp-claims__row sp-claims__row--<?php echo (int) $i; ?>">
						<span><?php echo esc_html( $c[0] ); ?></span>
						<span><?php echo esc_html( $c[1] ); ?></span>
						<span class="sp-claims__num"><?php echo (int) $c[2]; ?></span>
						<span><?php echo esc_html( $c[3] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="sp-hero__aside">
				<p><?php echo esc_html( $intro ); ?></p>
				<div class="sp-btn-group">
					<a class="sp-btn sp-btn--outline" href="<?php echo esc_url( $second_url ); ?>"><?php echo esc_html( $second ); ?></a>
					<a class="sp-btn sp-btn--light" href="<?php echo esc_url( $demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
