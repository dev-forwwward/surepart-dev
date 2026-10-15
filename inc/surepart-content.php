<?php
/**
 * SurePart — default copy for the child pages (Platform, About, Contact).
 *
 * Templates render these until the matching ACF fields are filled in, so the
 * pages look finished straight after the templates are assigned.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Platform pages share one template; each slug gets its own copy and visual.
 * Keys double as ACF field names (prefixed sp_pf_).
 */
function surepart_platform_defaults() {
	$ops_url = surepart_page_url( 'operational-intelligence' );

	return array(
		'price-confidence'         => array(
			'visual'          => 'price',
			'layout'          => 'compare',
			'grid'            => 'a',
			'badge'           => 'Price Confidence',
			'title'           => 'Make parts decisions with confidence',
			'intro'           => 'SurePart provides access to current supplier pricing and live inventory information, giving appraisers greater confidence in the parts they select and the prices reflected in estimates.',
			'assumption'      => "Static catalog pricing, set months ago, applied to today's repair.",
			'reality'         => "Supplier-backed pricing for the part you're selecting, at the moment you select it.",
			'section_heading' => 'Replace assumptions with market reality',
			'section_body'    => 'Traditional estimating often relies on static catalog pricing that may not reflect current market conditions. SurePart helps insurers understand the price likely to be paid by providing supplier-backed pricing information at the time decisions are made.',
			'cards'           => array(
				array( 'icon' => 'focus', 'title' => 'Real Market Quotes', 'text' => 'Access current supplier quotes rather than relying solely on catalog list prices.' ),
				array( 'icon' => 'license', 'title' => 'Live Inventory Visibility', 'text' => 'See current supplier inventory and availability information while building the estimate.' ),
				array( 'icon' => 'verify', 'title' => 'Supplier-Backed Pricing', 'text' => 'Reduce uncertainty with pricing information supported by participating suppliers.' ),
			),
			'results'         => array(
				array( 'text' => 'More confident pricing decisions.' ),
				array( 'text' => 'More predictable repair planning.' ),
				array( 'text' => 'Greater visibility into what is actually available today.' ),
			),
			'cta_heading'     => 'Turn accurate estimates into program performance.',
			'cta_text'        => '',
			'cta_link_label'  => 'Operational Intelligence',
			'cta_link_url'    => $ops_url,
		),
		'estimate-accuracy'        => array(
			'visual'          => 'estimate',
			'layout'          => 'side',
			'grid'            => 'b',
			'badge'           => 'Estimate Accuracy',
			'title'           => 'Build better estimates from the start',
			'intro'           => 'SurePart helps appraisers make parts decisions using validated pricing, current availability, and policy-aligned options — reducing the likelihood of estimate changes and sourcing surprises later in the repair process.',
			'section_heading' => 'Improve consistency across every estimate',
			'section_body'    => 'When appraisers have immediate access to current market information, they can make more informed decisions before repairs begin.',
			'cards'           => array(
				array( 'icon' => 'focus', 'title' => 'Better Parts Decisions', 'text' => 'Current pricing and availability information helps improve estimate accuracy at the point of decision.' ),
				array( 'icon' => 'license', 'title' => 'Policy-Compliant Options', 'text' => 'Identify parts options that align with carrier guidelines and program requirements.' ),
				array( 'icon' => 'verify', 'title' => 'Availability Accuracy', 'text' => 'Build estimates around parts shown as available and deliverable, helping reduce rework caused by unavailable inventory.' ),
			),
			'results'         => array(
				array( 'text' => 'More accurate estimates' ),
				array( 'text' => 'Fewer revisions and adjustments' ),
				array( 'text' => 'Better repair readiness' ),
				array( 'text' => 'Greater consistency across claims operations' ),
			),
			'cta_heading'     => 'Turn accurate estimates into program performance.',
			'cta_text'        => '',
			'cta_link_label'  => 'Operational Intelligence',
			'cta_link_url'    => $ops_url,
		),
		'operational-intelligence' => array(
			'visual'          => 'ops',
			'layout'          => 'plain',
			'grid'            => 'b',
			'badge'           => 'Operational Intelligence',
			'title'           => 'Turn decisions into better performance',
			'intro'           => 'SurePart does more than support individual estimates. It provides the visibility and reporting insurers need to understand how parts programs are performing and where opportunities exist to drive improvement.',
			'section_heading' => 'Intelligence beyond the estimate',
			'section_body'    => '',
			'cards'           => array(
				array( 'icon' => 'focus', 'title' => 'Instant Decision Support', 'text' => 'Provide appraisers with pricing, availability, and delivery information directly within their workflow.' ),
				array( 'icon' => 'license', 'title' => 'Reduced Manual Effort', 'text' => 'Consolidate critical parts information into a single workflow, reducing time spent researching suppliers and tracking down data.' ),
				array( 'icon' => 'verify', 'title' => 'Faster Estimate Completion', 'text' => 'Support faster estimating by providing information when decisions need to be made, reducing the need to wait for supplier responses.' ),
				array( 'icon' => 'focus', 'title' => 'Actionable Insights', 'text' => 'Monitor program adoption and performance to identify trends, gaps, and opportunities for optimization.' ),
			),
			'results'         => array(),
			'split_heading'   => 'Built for modern claims operations',
			'split_body'      => "The most effective parts programs don't just provide access to data. They provide insight, consistency, and accountability. SurePart helps insurers make informed decisions, improve operational performance, and gain greater visibility across the parts decision process.",
			'cta_heading'     => 'Confidence creates better outcomes',
			'cta_text'        => 'When appraisers have access to current pricing, live inventory, and policy-aligned parts options, insurers can make more informed decisions from the very beginning of the repair process.',
			'cta_link_label'  => '',
			'cta_link_url'    => '',
		),
	);
}

/**
 * Content for the current platform page: defaults for its slug, overridden by ACF.
 */
function surepart_platform_content( $post_id = 0 ) {
	$post_id  = $post_id ? $post_id : get_the_ID();
	$defaults = surepart_platform_defaults();
	$slug     = get_post_field( 'post_name', $post_id );
	$content  = isset( $defaults[ $slug ] ) ? $defaults[ $slug ] : $defaults['price-confidence'];

	// visual / layout / grid are fixed per page; everything else is editable.
	foreach ( $content as $key => $default ) {
		if ( in_array( $key, array( 'visual', 'layout', 'grid' ), true ) ) {
			continue;
		}
		$content[ $key ] = surepart_field( 'sp_pf_' . $key, $default, $post_id );
	}
	return $content;
}

function surepart_about_defaults() {
	$team = function ( $slug, $name, $role, $bio ) {
		return array( 'photo' => surepart_img( 'team/team-' . $slug . '.jpg' ), 'name' => $name, 'role' => $role, 'bio' => $bio );
	};
	$lead = function ( $slug, $name, $role ) {
		return array( 'photo' => surepart_img( 'team/leader-' . $slug . '.jpg' ), 'name' => $name, 'role' => $role );
	};

	return array(
		'hero_title'       => 'Connecting the repair industry for a smarter future',
		'hero_intro'       => 'SurePart is redefining how parts decisions get made — bringing insurers, appraisers, and suppliers onto the same live view of price, availability, and policy.',
		'video_url'        => '',
		'intro_heading'    => 'A trusted source of parts intelligence to increase your business success',
		'intro_body'       => 'SurePart is a parts decisioning platform that connects insurers, appraisers, and suppliers around one current picture of the market — so every estimate is built on pricing and availability that hold up.',
		'pillars'          => array(
			array( 'label' => 'What we do', 'title' => 'Bringing precision to parts decisioning', 'text' => 'We deliver market pricing, live inventory, and policy-aligned options at the moment of estimate creation — improving accuracy for the carrier without adding steps for the appraiser.' ),
			array( 'label' => 'How we do it', 'title' => 'Market-driven technology, program-aware rules', 'text' => 'By combining historical parts intelligence with live supplier quotes, embedding carrier policy rules, and surfacing performance insight, we help insurers hold cost, consistency, and cycle time together.' ),
		),
		'team_heading'     => 'Our Team',
		'team_body'        => 'Leveraging over 20 years of deep expertise, our team of repair experts, insurance professionals, and innovators are crafting next-generation technology to forge stronger connections between repairers, suppliers, and insurers, and advance collision repair.',
		'team'             => array(
			$team( 'brenda-hogen', 'Brenda Hogen', 'Vice President, Enterprise Accounts', 'Brenda Hogen, Vice President at PartsTrader and Board Chair of CREF, is an insurance and collision industry executive driving innovation, workforce development, and collaboration across the industry.' ),
			$team( 'chris-benecick', 'Chris Benecick', 'Vice President, Sales', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.' ),
			$team( 'shweta-ramamurthy', 'Shweta Ramamurthy', 'Head of Product', 'Shweta Ramamurthy, Head of Product at PartsTrader, leads the company’s product strategy and works closely with industry partners to deliver solutions that improve outcomes across the collision repair ecosystem.' ),
			$team( 'jeremiah-siebert', 'Jeremiah Siebert', 'Director, Client Success', 'Jeremiah Siebert, Director of Client Success at PartsTrader, leads high-performing teams in enterprise client strategy and partnership growth, helping organizations achieve measurable business outcomes.' ),
			$team( 'justin-utkin', 'Justin Utkin', 'Support Center Supervisor', 'With 20 years of experience in the automotive industry, I understand the challenges faced by the collision repair sector. This perspective helps guide SurePart’s direction and supports the development of solutions tailored to the needs of insurance carriers and repair shops' ),
			$team( 'ralph-rousseau', 'Ralph Rousseau', 'Senior Technical Support Engineer', 'Ralph Rousseau, Senior Technical Support Engineer at PartsTrader, leads the Technical Escalations (Special Ops) Team, drawing on 14 years of platform experience to resolve complex challenges and improve customer experiences.' ),
		),
		'backer_heading'   => 'Proudly supported by PartsTrader',
		'backer_body'      => 'SurePart, developed by PartsTrader, an Enlyte company, is advancing intelligent decision making by streamlining shop floor to back-office operations to increase shop profitability while balancing carrier requirements and strengthening vendor relationships, all through an easy-to-use platform.',
		'leaders'          => array(
			$lead( 'mark-lindner', 'Mark Lindner', 'Executive Vice President & General Manager' ),
			$lead( 'kyle-schmitt', 'Kyle Schmitt', 'Group Chief Financial Officer' ),
			$lead( 'mark-bell', 'Mark Bell', 'Senior VP of Product' ),
			$lead( 'tom-super', 'Tom Super', 'Senior Vice President, Customer Experience' ),
			$lead( 'judy-matijevich', 'Judy Matijevich', 'Chief Administrative Officer' ),
			$lead( 'james-gilbert', 'James Gilbert', 'Senior VP of Technology' ),
		),
		'cta_heading'      => 'Learn how SurePart fits your parts program',
	);
}

function surepart_contact_defaults() {
	return array(
		'title'       => "Let's look at your parts decisions",
		'intro'       => 'See how SurePart helps insurance carriers and appraisal teams make more informed parts decisions with live pricing, availability and program rules.',
		'steps'       => array(
			array( 'title' => 'We confirm your request', 'text' => 'Usually within one business day.' ),
			array( 'title' => 'A 20-minute discovery call', 'text' => 'Your volume, platforms, and program requirements' ),
			array( 'title' => 'A demo on your parts mix', 'text' => 'Live pricing and availability, in your workflow.' ),
		),
		'contacts'    => array(
			array( 'label' => 'Sales', 'lines' => "sales@surepart.com\n1-800-000-0000" ),
			array( 'label' => 'Existing customers', 'lines' => "support@surepart.com\nMon–Fri, 8–6 ET" ),
		),
		'cta_heading' => 'Learn how SurePart fits your parts program',
	);
}

/**
 * Merge a defaults array with ACF fields named {$prefix}{key}.
 */
function surepart_page_content( $defaults, $prefix, $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	foreach ( $defaults as $key => $default ) {
		$defaults[ $key ] = surepart_field( $prefix . $key, $default, $post_id );
	}
	return $defaults;
}

/**
 * Image field helper: ACF image (array or URL) or a fallback URL.
 */
function surepart_image_url( $value, $size = 'large' ) {
	if ( is_array( $value ) ) {
		return isset( $value['sizes'][ $size ] ) ? $value['sizes'][ $size ] : $value['url'];
	}
	if ( is_numeric( $value ) ) {
		return wp_get_attachment_image_url( (int) $value, $size );
	}
	return $value;
}
