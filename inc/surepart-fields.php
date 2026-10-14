<?php
/**
 * SurePart — ACF Pro field groups, registered in code so they live in version control.
 * Requires ACF Pro (repeaters + options page).
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	/* ---------- Options page: shared SurePart settings ---------- */
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => 'SurePart Settings',
			'menu_title' => 'SurePart',
			'menu_slug'  => 'surepart-settings',
			'capability' => 'edit_pages',
			'icon_url'   => 'dashicons-admin-generic',
			'redirect'   => false,
		) );
	}

	acf_add_local_field_group( array(
		'key'      => 'group_sp_settings',
		'title'    => 'SurePart — Global',
		'fields'   => array(
			array( 'key' => 'field_sp_demo_url', 'name' => 'sp_demo_url', 'label' => '"Request a Demo" link', 'type' => 'url' ),
			array( 'key' => 'field_sp_footer_tagline', 'name' => 'sp_footer_tagline', 'label' => 'Footer tagline', 'type' => 'textarea', 'rows' => 2, 'new_lines' => 'br' ),
			array( 'key' => 'field_sp_copyright', 'name' => 'sp_copyright', 'label' => 'Copyright line', 'type' => 'text', 'instructions' => 'Use {year} for the current year.' ),
		),
		'location' => array( array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'surepart-settings' ) ) ),
	) );

	/* ---------- Home (page slug: surepart) ---------- */
	$home = get_page_by_path( 'surepart' );
	if ( ! $home ) {
		return;
	}

	$text = function ( $key, $label, $extra = array() ) {
		return array_merge( array( 'key' => 'field_sp_home_' . $key, 'name' => 'sp_' . $key, 'label' => $label, 'type' => 'text' ), $extra );
	};
	$area = function ( $key, $label ) use ( $text ) {
		return $text( $key, $label, array( 'type' => 'textarea', 'rows' => 3, 'new_lines' => '' ) );
	};
	$tab = function ( $key, $label ) {
		return array( 'key' => 'field_sp_tab_' . $key, 'label' => $label, 'type' => 'tab' );
	};

	acf_add_local_field_group( array(
		'key'      => 'group_sp_home',
		'title'    => 'SurePart — Home',
		'fields'   => array(
			$tab( 'hero', 'Hero' ),
			$text( 'hero_badge', 'Badge' ),
			$text( 'hero_line_1', 'Headline — line 1' ),
			$text( 'hero_line_2', 'Headline — line 2' ),
			$text( 'hero_line_3', 'Headline — line 3 (gradient)' ),
			$area( 'hero_intro', 'Intro' ),
			$text( 'hero_secondary_label', 'Secondary button label' ),
			$text( 'hero_secondary_url', 'Secondary button link', array( 'type' => 'url' ) ),

			$tab( 'opp', 'Opportunity' ),
			$text( 'opp_label', 'Overline' ),
			$text( 'opp_heading', 'Heading' ),
			$area( 'opp_body', 'Body' ),
			$text( 'opp_rows', 'Before → after rows', array(
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_sp_opp_from', 'name' => 'from', 'label' => 'Before', 'type' => 'text' ),
					array( 'key' => 'field_sp_opp_to', 'name' => 'to', 'label' => 'After', 'type' => 'text' ),
				),
			) ),
			$area( 'opp_statement', 'Statement' ),

			$tab( 'platform', 'Platform' ),
			$text( 'platform_label', 'Overline' ),
			$text( 'platform_cards', 'Cards (3) — illustrations are fixed', array(
				'type'       => 'repeater',
				'min'        => 3,
				'max'        => 3,
				'layout'     => 'block',
				'sub_fields' => array(
					array( 'key' => 'field_sp_pc_title', 'name' => 'title', 'label' => 'Title', 'type' => 'text' ),
					array( 'key' => 'field_sp_pc_text', 'name' => 'text', 'label' => 'Description', 'type' => 'textarea', 'rows' => 2 ),
					array( 'key' => 'field_sp_pc_url', 'name' => 'url', 'label' => 'Explore link', 'type' => 'url' ),
				),
			) ),

			$tab( 'approach', 'Approach' ),
			$text( 'approach_label', 'Overline' ),
			$text( 'approach_heading', 'Heading' ),
			$area( 'approach_intro', 'Intro' ),
			$text( 'approach_items', 'Benefits', array(
				'type'       => 'repeater',
				'layout'     => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_sp_ap_title', 'name' => 'title', 'label' => 'Title', 'type' => 'text' ),
					array( 'key' => 'field_sp_ap_text', 'name' => 'text', 'label' => 'Text', 'type' => 'text' ),
				),
			) ),

			$tab( 'cta', 'Closing CTA' ),
			$area( 'cta_lines', 'Headline lines (one per line)' ),
			$text( 'cta_sub', 'Subline' ),
		),
		'location' => array( array( array( 'param' => 'page', 'operator' => '==', 'value' => (string) $home->ID ) ) ),
		'hide_on_screen' => array( 'the_content' ),
	) );
} );
