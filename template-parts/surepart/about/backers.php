<?php
/**
 * About — Proudly supported by PartsTrader (leadership grid).
 */
$leaders = is_array( $args['leaders'] ) ? $args['leaders'] : array();
?>
<section class="sp-section sp-backers">
	<div class="sp-container sp-backers__inner">
		<div class="sp-backers__copy">
			<h2 class="sp-h2"><?php echo esc_html( $args['backer_heading'] ); ?></h2>
			<p class="sp-body"><?php echo esc_html( $args['backer_body'] ); ?></p>
		</div>
		<ul class="sp-leaders">
			<?php foreach ( $leaders as $l ) : ?>
				<li class="sp-leader">
					<img src="<?php echo esc_url( surepart_image_url( $l['photo'], 'medium' ) ); ?>" alt="<?php echo esc_attr( $l['name'] ); ?>" width="400" height="400" loading="lazy">
					<h3 class="sp-leader__name"><?php echo esc_html( $l['name'] ); ?></h3>
					<p class="sp-overline sp-leader__role"><?php echo esc_html( $l['role'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
