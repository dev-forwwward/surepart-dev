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
			array( 'key' => 'field_sp_contact_email', 'name' => 'sp_contact_email', 'label' => 'Contact form recipient', 'type' => 'email', 'instructions' => 'Where Contact page submissions are sent. Defaults to the site admin email.' ),
		),
		'location' => array( array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'surepart-settings' ) ) ),
	) );

	/*
	 * ---------- Child page templates ----------
	 * Every field is optional: empty fields fall back to the copy in
	 * inc/surepart-content.php.
	 */
	$f = function ( $prefix, $key, $label, $type = 'text', $extra = array() ) {
		return array_merge( array( 'key' => 'field_' . $prefix . $key, 'name' => $prefix . $key, 'label' => $label, 'type' => $type ), $extra );
	};
	$ftab = function ( $prefix, $key, $label ) {
		return array( 'key' => 'field_' . $prefix . 'tab_' . $key, 'label' => $label, 'type' => 'tab' );
	};
	$rows = array( 'rows' => 3, 'new_lines' => '' );
	$on   = function ( $template ) {
		return array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => $template ) ) );
	};

	$p = 'sp_pf_';
	acf_add_local_field_group( array(
		'key'            => 'group_sp_platform',
		'title'          => 'SurePart — Platform page',
		'fields'         => array(
			$ftab( $p, 'hero', 'Hero' ),
			$f( $p, 'badge', 'Badge' ),
			$f( $p, 'title', 'Headline' ),
			$f( $p, 'intro', 'Intro', 'textarea', $rows ),
			$ftab( $p, 'section', 'Features' ),
			$f( $p, 'assumption', 'Assumption text', 'text', array( 'instructions' => 'Price Confidence only.' ) ),
			$f( $p, 'reality', 'Market reality text', 'text', array( 'instructions' => 'Price Confidence only.' ) ),
			$f( $p, 'section_heading', 'Heading' ),
			$f( $p, 'section_body', 'Body', 'textarea', $rows ),
			$f( $p, 'cards', 'Cards', 'repeater', array(
				'max'        => 4,
				'layout'     => 'block',
				'sub_fields' => array(
					array( 'key' => 'field_sp_pf_card_icon', 'name' => 'icon', 'label' => 'Icon', 'type' => 'select', 'choices' => array( 'focus' => 'Focus', 'license' => 'Badge', 'verify' => 'Verified' ) ),
					array( 'key' => 'field_sp_pf_card_title', 'name' => 'title', 'label' => 'Title', 'type' => 'text' ),
					array( 'key' => 'field_sp_pf_card_text', 'name' => 'text', 'label' => 'Text', 'type' => 'textarea', 'rows' => 2 ),
				),
			) ),
			$ftab( $p, 'results', 'The result' ),
			$f( $p, 'results', 'Result rows', 'repeater', array(
				'max'          => 4,
				'layout'       => 'table',
				'instructions' => 'Leave empty to use the default rows.',
				'sub_fields'   => array( array( 'key' => 'field_sp_pf_result_text', 'name' => 'text', 'label' => 'Text', 'type' => 'text' ) ),
			) ),
			$f( $p, 'split_heading', 'Split heading', 'text', array( 'instructions' => 'Operational Intelligence only.' ) ),
			$f( $p, 'split_body', 'Split body', 'textarea', $rows ),
			$ftab( $p, 'cta', 'Closing CTA' ),
			$f( $p, 'cta_heading', 'Heading' ),
			$f( $p, 'cta_text', 'Text', 'textarea', $rows ),
			$f( $p, 'cta_link_label', 'Secondary button label' ),
			$f( $p, 'cta_link_url', 'Secondary button link', 'url' ),
		),
		'location'       => $on( 'template-surepart-platform.php' ),
		'hide_on_screen' => array( 'the_content' ),
	) );

	$p = 'sp_ab_';
	acf_add_local_field_group( array(
		'key'            => 'group_sp_about',
		'title'          => 'SurePart — About page',
		'fields'         => array(
			$ftab( $p, 'hero', 'Hero' ),
			$f( $p, 'hero_title', 'Headline' ),
			$f( $p, 'hero_intro', 'Intro', 'textarea', $rows ),
			$f( $p, 'video_url', 'Video URL', 'url', array( 'instructions' => 'YouTube or Vimeo link. Leave empty to show the still image only.' ) ),
			$ftab( $p, 'intro', 'Intro' ),
			$f( $p, 'intro_heading', 'Heading' ),
			$f( $p, 'intro_body', 'Body', 'textarea', $rows ),
			$f( $p, 'pillars', 'What we do / How we do it', 'repeater', array(
				'min'        => 2,
				'max'        => 2,
				'layout'     => 'block',
				'sub_fields' => array(
					array( 'key' => 'field_sp_ab_pillar_label', 'name' => 'label', 'label' => 'Overline', 'type' => 'text' ),
					array( 'key' => 'field_sp_ab_pillar_title', 'name' => 'title', 'label' => 'Title', 'type' => 'text' ),
					array( 'key' => 'field_sp_ab_pillar_text', 'name' => 'text', 'label' => 'Text', 'type' => 'textarea', 'rows' => 3 ),
				),
			) ),
			$ftab( $p, 'team', 'Team' ),
			$f( $p, 'team_heading', 'Heading' ),
			$f( $p, 'team_body', 'Body', 'textarea', $rows ),
			$f( $p, 'team', 'Team members', 'repeater', array(
				'layout'     => 'block',
				'sub_fields' => array(
					array( 'key' => 'field_sp_ab_team_photo', 'name' => 'photo', 'label' => 'Photo (wide, ~874×602)', 'type' => 'image', 'return_format' => 'array' ),
					array( 'key' => 'field_sp_ab_team_name', 'name' => 'name', 'label' => 'Name', 'type' => 'text' ),
					array( 'key' => 'field_sp_ab_team_role', 'name' => 'role', 'label' => 'Role', 'type' => 'text' ),
					array( 'key' => 'field_sp_ab_team_bio', 'name' => 'bio', 'label' => 'Bio', 'type' => 'textarea', 'rows' => 3 ),
				),
			) ),
			$ftab( $p, 'backers', 'PartsTrader' ),
			$f( $p, 'backer_heading', 'Heading' ),
			$f( $p, 'backer_body', 'Body', 'textarea', $rows ),
			$f( $p, 'leaders', 'Leadership', 'repeater', array(
				'layout'     => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_sp_ab_lead_photo', 'name' => 'photo', 'label' => 'Photo (square)', 'type' => 'image', 'return_format' => 'array' ),
					array( 'key' => 'field_sp_ab_lead_name', 'name' => 'name', 'label' => 'Name', 'type' => 'text' ),
					array( 'key' => 'field_sp_ab_lead_role', 'name' => 'role', 'label' => 'Role', 'type' => 'text' ),
				),
			) ),
			$ftab( $p, 'cta', 'Closing CTA' ),
			$f( $p, 'cta_heading', 'Heading' ),
		),
		'location'       => $on( 'template-surepart-about.php' ),
		'hide_on_screen' => array( 'the_content' ),
	) );

	$p = 'sp_ct_';
	acf_add_local_field_group( array(
		'key'            => 'group_sp_contact',
		'title'          => 'SurePart — Contact page',
		'fields'         => array(
			$f( $p, 'title', 'Headline' ),
			$f( $p, 'intro', 'Intro', 'textarea', $rows ),
			$f( $p, 'steps', 'What happens next', 'repeater', array(
				'layout'     => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_sp_ct_step_title', 'name' => 'title', 'label' => 'Title', 'type' => 'text' ),
					array( 'key' => 'field_sp_ct_step_text', 'name' => 'text', 'label' => 'Text', 'type' => 'text' ),
				),
			) ),
			$f( $p, 'contacts', 'Contact cards', 'repeater', array(
				'max'        => 2,
				'layout'     => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_sp_ct_contact_label', 'name' => 'label', 'label' => 'Overline', 'type' => 'text' ),
					array( 'key' => 'field_sp_ct_contact_lines', 'name' => 'lines', 'label' => 'Lines (one per line; emails become links)', 'type' => 'textarea', 'rows' => 2, 'new_lines' => '' ),
				),
			) ),
			$f( $p, 'cta_heading', 'Closing CTA heading' ),
		),
		'location'       => $on( 'template-surepart-contact.php' ),
		'hide_on_screen' => array( 'the_content' ),
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
