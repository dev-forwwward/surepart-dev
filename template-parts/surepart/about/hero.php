<?php
/**
 * About — hero with video.
 * The poster always shows; with a video URL set (YouTube, Vimeo or any
 * oEmbed provider) the play button swaps the poster for the player.
 */
$demo  = surepart_option( 'sp_demo_url', surepart_page_url( 'contact' ) );
$embed = $args['video_url'] ? wp_oembed_get( $args['video_url'], array( 'width' => 1280 ) ) : '';
if ( $embed ) {
	// Autoplay once the visitor has clicked play.
	$embed = preg_replace_callback( '/src="([^"]+)"/', function ( $m ) {
		return 'src="' . esc_url( add_query_arg( 'autoplay', 1, html_entity_decode( $m[1] ) ) ) . '" allow="autoplay; fullscreen; picture-in-picture"';
	}, $embed, 1 );
}
?>
<section class="sp-ahero">
	<img class="sp-ahero__pattern" src="<?php echo esc_url( surepart_img( 'about-hero-pattern.svg' ) ); ?>" alt="" width="1614" height="1110">

	<div class="sp-container sp-ahero__inner">
		<?php surepart_svg( 'cta-mark', 'sp-ahero__mark' ); ?>
		<h1 class="sp-ahero__title"><?php echo esc_html( $args['hero_title'] ); ?></h1>

		<div class="sp-ahero__bottom">
			<div class="sp-ahero__copy">
				<p><?php echo esc_html( $args['hero_intro'] ); ?></p>
				<a class="sp-btn sp-btn--green sp-btn--wide" href="<?php echo esc_url( $demo ); ?>"><?php esc_html_e( 'Request a Demo', 'surepart' ); ?></a>
			</div>

			<div class="sp-video" data-sp-video>
				<img class="sp-video__poster" src="<?php echo esc_url( surepart_img( 'about-video-poster.jpg' ) ); ?>" alt="" width="1708" height="960" loading="lazy">
				<?php if ( $embed ) : ?>
					<button class="sp-video__play" type="button" data-sp-video-play>
						<span class="sp-visually-hidden"><?php esc_html_e( 'Play video', 'surepart' ); ?></span>
						<img src="<?php echo esc_url( surepart_img( 'play.svg' ) ); ?>" alt="" width="77" height="67">
					</button>
					<template data-sp-video-embed><?php echo $embed; // phpcs:ignore WordPress.Security.EscapeOutput -- oEmbed HTML from WordPress. ?></template>
				<?php else : ?>
					<span class="sp-video__play" aria-hidden="true"><img src="<?php echo esc_url( surepart_img( 'play.svg' ) ); ?>" alt="" width="77" height="67"></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
