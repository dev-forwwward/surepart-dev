<?php
/**
 * Decorative product UI for each platform card.
 * $args['index'] = 0 | 1 | 2
 */
$index = isset( $args['index'] ) ? (int) $args['index'] : 0;

if ( 0 === $index ) : ?>
	<div class="sp-ui">
		<div class="sp-ui__meta">
			<div><span class="sp-ui__label">CLAIM</span><span class="sp-ui__chip">48210</span></div>
			<div><span class="sp-ui__label">APPRAISER</span><span>J. Ellis</span></div>
			<div><span class="sp-ui__label">STATUS</span><span class="sp-ui__status"><i class="sp-ui__check">✓</i>Validated</span></div>
		</div>
		<ul class="sp-ui__list">
			<li><i class="sp-ui__dot"></i>Bumper cover, front <small>IBMSZ 13008 K</small></li>
			<li><i class="sp-ui__dot"></i>Absorber, front bumper <small>CP9Z 16612 B</small></li>
			<li><i class="sp-ui__dot"></i>Hood Panel <small>BMSZ 16006 B</small></li>
			<li><i class="sp-ui__dot"></i>Bumper cover, front <small>IBMSZ 13008 K</small></li>
		</ul>
		<div class="sp-meter">
			<div class="sp-meter__row"><span>Difference from estimate price</span><span>$662.89</span></div>
			<div class="sp-meter__track"><i style="width:74%"></i></div>
		</div>
	</div>
<?php elseif ( 1 === $index ) : ?>
	<div class="sp-ui">
		<div class="sp-ui__claim"><span class="sp-ui__label">CLAIM</span><span class="sp-ui__chip">48210</span></div>
		<div class="sp-ui__prices">
			<div class="sp-ui__price"><strong>$1,402.94</strong><span>Estimate Price <i class="sp-ui__dot sp-ui__dot--white"></i></span></div>
			<div class="sp-ui__price"><strong>$602.98 <em>-$799.96</em></strong><span>Best Partstrader Price <i class="sp-ui__dot sp-ui__dot--white"></i></span></div>
			<div class="sp-ui__price is-selected"><strong>$602.98 <em>-$799.96</em></strong><span>Selected Price <i class="sp-ui__dot"></i></span></div>
		</div>
		<div class="sp-ui__foot"><span class="sp-ui__label">Live Pricing</span></div>
	</div>
<?php else : ?>
	<div class="sp-ui">
		<div class="sp-ui__steps"><b>1</b><i></i><b>2</b><i></i><b class="is-current">3</b></div>
		<dl class="sp-ui__dl">
			<div><dt>CLAIM</dt><dd>#F08DF0C4S</dd></div>
			<div><dt>MARKUP</dt><dd>25%</dd></div>
			<div><dt>LOCATION</dt><dd>Chicago, IL</dd></div>
			<div><dt>VEHICLE</dt><dd>2012 Ford Focus</dd></div>
			<div><dt>VIN</dt><dd>1FAHP3F21CL151818</dd></div>
		</dl>
		<ul class="sp-ui__checks">
			<li><strong>Supplier quotes</strong><img src="<?php echo esc_url( surepart_img( 'dots-green.svg' ) ); ?>" alt="" width="46" height="6"></li>
			<li><strong>Live Inventory &amp; Delivery</strong><img src="<?php echo esc_url( surepart_img( 'dots-green.svg' ) ); ?>" alt="" width="46" height="6"></li>
			<li><strong>Live Inventory &amp; Delivery</strong><img src="<?php echo esc_url( surepart_img( 'dots-green.svg' ) ); ?>" alt="" width="46" height="6"></li>
		</ul>
	</div>
<?php endif;
