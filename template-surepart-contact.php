<?php
/**
 * Template Name: SurePart — Contact
 * Template Post Type: page
 *
 * The form posts to admin-post.php (see inc/surepart-contact.php).
 */
$sp     = surepart_page_content( surepart_contact_defaults(), 'sp_ct_' );
$status = isset( $_GET['sp_contact'] ) ? sanitize_key( wp_unslash( $_GET['sp_contact'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification -- display only.
$notes  = array(
	'sent'    => __( 'Thanks — your request is in. We’ll be in touch shortly.', 'surepart' ),
	'invalid' => __( 'Please fill in your name, a valid work email and your company.', 'surepart' ),
	'failed'  => __( 'Something went wrong sending your request. Please try again or email us directly.', 'surepart' ),
);

get_header( 'surepart' );
?>
<main id="sp-main" class="sp-main sp-contact">
	<section class="sp-section sp-chero">
		<img class="sp-chero__pattern" src="<?php echo esc_url( surepart_img( 'contact-circle-pattern.svg' ) ); ?>" alt="" width="1436" height="1078">

		<div class="sp-container sp-chero__inner">
			<div class="sp-chero__copy">
				<h1 class="sp-chero__title"><?php echo esc_html( $sp['title'] ); ?><?php surepart_svg( 'tri-accent', 'sp-tri sp-tri--up' ); ?></h1>
				<p class="sp-body sp-chero__intro"><?php echo esc_html( $sp['intro'] ); ?></p>

				<ol class="sp-steps">
					<?php foreach ( (array) $sp['steps'] as $i => $step ) : ?>
						<li>
							<span class="sp-steps__num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?><span class="sp-arrow" aria-hidden="true"></span></span>
							<span><strong><?php echo esc_html( $step['title'] ); ?></strong><?php echo esc_html( $step['text'] ); ?></span>
						</li>
					<?php endforeach; ?>
				</ol>

				<ul class="sp-reach">
					<?php foreach ( (array) $sp['contacts'] as $c ) : ?>
						<li>
							<p class="sp-overline"><?php echo esc_html( $c['label'] ); ?></p>
							<p class="sp-reach__lines">
								<?php
								foreach ( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $c['lines'] ) ) ) as $line ) {
									echo is_email( $line )
										? '<a href="' . esc_url( 'mailto:' . $line ) . '">' . esc_html( $line ) . '</a>'
										: '<span>' . esc_html( $line ) . '</span>';
								}
								?>
							</p>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<form class="sp-form" id="sp-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" data-sp-form>
				<input type="hidden" name="action" value="surepart_contact">
				<?php wp_nonce_field( 'surepart_contact', 'sp_contact_nonce' ); ?>
				<p class="sp-form__trap" aria-hidden="true"><label>Website <input type="text" name="sp_website" tabindex="-1" autocomplete="off"></label></p>

				<?php if ( isset( $notes[ $status ] ) ) : ?>
					<p class="sp-form__note sp-form__note--<?php echo esc_attr( $status ); ?>" role="status"><?php echo esc_html( $notes[ $status ] ); ?></p>
				<?php endif; ?>

				<fieldset class="sp-form__tabs">
					<legend class="sp-visually-hidden"><?php esc_html_e( 'Enquiry type', 'surepart' ); ?></legend>
					<label><input type="radio" name="sp_type" value="demo" checked data-sp-submit-label="<?php esc_attr_e( 'Request a Demo', 'surepart' ); ?>"><span><?php esc_html_e( 'Request a demo', 'surepart' ); ?></span></label>
					<label><input type="radio" name="sp_type" value="general" data-sp-submit-label="<?php esc_attr_e( 'Send Enquiry', 'surepart' ); ?>"><span><?php esc_html_e( 'General enquiry', 'surepart' ); ?></span></label>
				</fieldset>

				<div class="sp-form__row">
					<label class="sp-field"><span><?php esc_html_e( 'First Name *', 'surepart' ); ?></span><input type="text" name="sp_first_name" placeholder="Jordan" autocomplete="given-name" required></label>
					<label class="sp-field"><span><?php esc_html_e( 'Last Name *', 'surepart' ); ?></span><input type="text" name="sp_last_name" placeholder="Ellis" autocomplete="family-name" required></label>
				</div>
				<div class="sp-form__row">
					<label class="sp-field"><span><?php esc_html_e( 'Work Email *', 'surepart' ); ?></span><input type="email" name="sp_email" placeholder="jordan@company.com" autocomplete="email" required></label>
					<label class="sp-field"><span><?php esc_html_e( 'Company *', 'surepart' ); ?></span><input type="text" name="sp_company" placeholder="Carrier or MSO" autocomplete="organization" required></label>
				</div>
				<div class="sp-form__row">
					<label class="sp-field"><span><?php esc_html_e( 'Role', 'surepart' ); ?></span><input type="text" name="sp_role" placeholder="Claims leadership" autocomplete="organization-title"></label>
					<label class="sp-field"><span><?php esc_html_e( 'Company type', 'surepart' ); ?></span><input type="text" name="sp_company_type" placeholder="Insurance carrier"></label>
				</div>

				<fieldset class="sp-form__chips">
					<legend><?php esc_html_e( 'Most interested in', 'surepart' ); ?></legend>
					<?php foreach ( surepart_contact_interests() as $value => $label ) : ?>
						<label><input type="checkbox" name="sp_interests[]" value="<?php echo esc_attr( $value ); ?>"<?php checked( 'price', $value ); ?>><span><?php echo esc_html( $label ); ?></span></label>
					<?php endforeach; ?>
				</fieldset>

				<label class="sp-field sp-field--area"><span><?php esc_html_e( 'Message', 'surepart' ); ?></span><textarea name="sp_message" rows="6" placeholder="Anything we should know before the call?"></textarea></label>

				<label class="sp-form__check"><input type="checkbox" name="sp_updates" value="1"><span><?php esc_html_e( 'Send me occasional SurePart product updates. No more than once a month.', 'surepart' ); ?></span></label>

				<div class="sp-form__foot">
					<p>
						<?php
						printf(
							/* translators: %s: privacy policy link */
							esc_html__( 'By submitting you agree to our %s. Fields marked * are required.', 'surepart' ),
							'<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'surepart' ) . '</a>'
						);
						?>
					</p>
					<button class="sp-btn sp-btn--green" type="submit" data-sp-submit><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></button>
				</div>
			</form>
		</div>
	</section>

	<?php get_template_part( 'template-parts/surepart/shared/cta-band', null, array( 'heading' => $sp['cta_heading'] ) ); ?>
</main>
<?php
get_footer( 'surepart' );
