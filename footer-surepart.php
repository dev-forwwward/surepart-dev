<?php
/**
 * SurePart footer — loaded with get_footer( 'surepart' ).
 */
$sp_demo      = surepart_option( 'sp_demo_url', home_url( '/surepart/contact/' ) );
$sp_tagline   = surepart_option( 'sp_footer_tagline', 'Parts decisioning intelligence<br>for insurers and appraisers.' );
$sp_copyright = str_replace( '{year}', gmdate( 'Y' ), surepart_option( 'sp_copyright', '© {year} SurePart. All rights reserved.' ) );
?>
<footer class="sp-footer">
	<div class="sp-footer__inner">
		<div class="sp-footer__brand">
			<a href="<?php echo esc_url( home_url( '/surepart/' ) ); ?>" aria-label="SurePart home"><?php surepart_svg( 'logo-light', 'sp-footer__logo' ); ?></a>
			<p><?php echo wp_kses( $sp_tagline, array( 'br' => array() ) ); ?></p>
		</div>

		<div class="sp-footer__col">
			<h2 class="sp-overline"><?php esc_html_e( 'Platform', 'surepart' ); ?></h2>
			<?php surepart_menu( 'surepart-footer-platform', 'sp-footer__links' ); ?>
		</div>

		<div class="sp-footer__col">
			<h2 class="sp-overline"><?php esc_html_e( 'Company', 'surepart' ); ?></h2>
			<?php surepart_menu( 'surepart-footer-company', 'sp-footer__links' ); ?>
		</div>

		<div class="sp-footer__col">
			<h2 class="sp-overline"><?php esc_html_e( 'Get Started', 'surepart' ); ?></h2>
			<a class="sp-btn sp-btn--light" href="<?php echo esc_url( $sp_demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
		</div>
	</div>

	<div class="sp-footer__bottom">
		<p><?php echo esc_html( $sp_copyright ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
