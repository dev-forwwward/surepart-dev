<?php
/**
 * SurePart — Contact form handler.
 *
 * The form on template-surepart-contact.php posts to admin-post.php. We
 * validate, email the submission with wp_mail(), and redirect back with a
 * status flag (?sp_contact=sent|invalid|failed). No data is stored.
 *
 * Recipient: SurePart Settings → "Contact form recipient" (falls back to the
 * site admin email).
 */

defined( 'ABSPATH' ) || exit;

function surepart_contact_interests() {
	return array(
		'price'     => __( 'Price confidence', 'surepart' ),
		'estimate'  => __( 'Estimate accuracy', 'surepart' ),
		'reporting' => __( 'Reporting', 'surepart' ),
	);
}

add_action( 'admin_post_nopriv_surepart_contact', 'surepart_handle_contact' );
add_action( 'admin_post_surepart_contact', 'surepart_handle_contact' );

function surepart_handle_contact() {
	$back = wp_get_referer();
	$back = $back ? $back : surepart_page_url( 'contact' );
	$back = remove_query_arg( 'sp_contact', $back );
	$go   = function ( $status ) use ( $back ) {
		wp_safe_redirect( add_query_arg( 'sp_contact', $status, $back ) . '#sp-contact-form' );
		exit;
	};

	if ( ! isset( $_POST['sp_contact_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['sp_contact_nonce'] ) ), 'surepart_contact' ) ) {
		$go( 'failed' );
	}

	// Honeypot: real people never see or fill this field.
	if ( ! empty( $_POST['sp_website'] ) ) {
		$go( 'sent' );
	}

	$field = function ( $key ) {
		return isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '';
	};

	$data = array(
		'type'         => 'general' === $field( 'sp_type' ) ? 'General enquiry' : 'Demo request',
		'first_name'   => $field( 'sp_first_name' ),
		'last_name'    => $field( 'sp_last_name' ),
		'email'        => sanitize_email( $field( 'sp_email' ) ),
		'company'      => $field( 'sp_company' ),
		'role'         => $field( 'sp_role' ),
		'company_type' => $field( 'sp_company_type' ),
		'message'      => isset( $_POST['sp_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['sp_message'] ) ) : '',
		'updates'      => ! empty( $_POST['sp_updates'] ) ? 'Yes' : 'No',
	);

	$labels    = surepart_contact_interests();
	$interests = isset( $_POST['sp_interests'] ) ? array_map( 'sanitize_key', (array) wp_unslash( $_POST['sp_interests'] ) ) : array();
	$interests = array_intersect_key( $labels, array_flip( $interests ) );

	if ( ! $data['first_name'] || ! $data['last_name'] || ! $data['company'] || ! is_email( $data['email'] ) ) {
		$go( 'invalid' );
	}

	$to      = sanitize_email( surepart_option( 'sp_contact_email', get_option( 'admin_email' ) ) );
	$name    = $data['first_name'] . ' ' . $data['last_name'];
	$subject = sprintf( '[SurePart] %s from %s (%s)', $data['type'], $name, $data['company'] );
	$lines   = array(
		'Type: ' . $data['type'],
		'Name: ' . $name,
		'Email: ' . $data['email'],
		'Company: ' . $data['company'],
		'Role: ' . $data['role'],
		'Company type: ' . $data['company_type'],
		'Most interested in: ' . ( $interests ? implode( ', ', $interests ) : '—' ),
		'Product updates: ' . $data['updates'],
		'',
		'Message:',
		$data['message'] ? $data['message'] : '—',
	);
	$headers = array( sprintf( 'Reply-To: %s <%s>', $name, $data['email'] ) );

	$go( wp_mail( $to, $subject, implode( "\n", $lines ), $headers ) ? 'sent' : 'failed' );
}
