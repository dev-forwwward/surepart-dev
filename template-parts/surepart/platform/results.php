<?php
/**
 * Platform page — "The result": stepped list, each row 229.5px wider than the last.
 */
?>
<section class="sp-section sp-results">
	<div class="sp-container sp-results__inner">
		<h2 class="sp-overline sp-results__label"><?php esc_html_e( 'The result', 'surepart' ); ?></h2>
		<ol class="sp-results__list">
			<?php foreach ( $args['results'] as $i => $row ) : ?>
				<li class="sp-results__row" style="--sp-step:<?php echo (int) $i; ?>">
					<span class="sp-results__num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
					<span class="sp-arrow" aria-hidden="true"></span>
					<span class="sp-results__text"><?php echo esc_html( $row['text'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
