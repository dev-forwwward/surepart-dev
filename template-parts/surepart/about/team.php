<?php
/**
 * About — Our Team.
 */
$team = is_array( $args['team'] ) ? $args['team'] : array();
?>
<section class="sp-section sp-team">
	<div class="sp-container">
		<h2 class="sp-h2"><?php echo esc_html( $args['team_heading'] ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h2>
		<p class="sp-body sp-team__body"><?php echo esc_html( $args['team_body'] ); ?></p>

		<ul class="sp-team__grid">
			<?php foreach ( $team as $m ) : ?>
				<li class="sp-member">
					<div class="sp-member__photo">
						<img src="<?php echo esc_url( surepart_image_url( $m['photo'] ) ); ?>" alt="<?php echo esc_attr( $m['name'] ); ?>" width="874" height="602" loading="lazy">
					</div>
					<div class="sp-member__body">
						<h3 class="sp-member__name"><?php echo esc_html( $m['name'] ); ?></h3>
						<p class="sp-overline sp-member__role"><?php echo esc_html( $m['role'] ); ?></p>
						<p class="sp-member__bio"><?php echo esc_html( $m['bio'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
