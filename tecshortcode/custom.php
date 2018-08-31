<?php //do_action( 'tribe_events_single_event_before_the_meta' ) ?>
<?php
/**
 * you have access to:
 * $post (WP_Post) for the current event (and the tribe_get_... functions)
 * $post_index (int) of the current post, starting at 0 (ie. $post_index == ( count( $posts ) - 1 ) for last post)
 * $posts (WP_Post array) for all events
 * $atts (array) for your shortcode attributes
 * $event_output (string) for the current HTML output for the event
 */
?>
<?php //tribe_get_template_part( 'modules/meta' ); ?>
<?php //do_action( 'tribe_events_single_event_after_the_meta' ) 





?>

<!-- Klistrat in från compact.php här -->

<div class="ecs-event<?php //echo implode( $category_slugs, '' ) . $featured_class ?>">
	
	<div class="date_thumb">
		<div class="day"><?php echo tribe_get_start_date( null, false, 'j' ) ?></div>
		<div class="month"><?php echo tribe_get_start_date( null, false, 'M' ) ?></div>
		
	</div>
	<?php if ( Events_Calendar_Shortcode::isValid( $atts['thumb'] ) ): ?>
		<div class="ecs-thumbnail">
			<?php if ( isset( $atts['thumbwidth'], $atts['thumbheight'] ) and is_numeric( $atts['thumbwidth'] ) and is_numeric( $atts['thumbheight'] ) ): ?>
				<?php echo get_the_post_thumbnail( get_the_ID(), array( intval( $atts['thumbwidth'] ), intval( $atts['thumbheight'] ) ) ); ?>
			<?php elseif ( $event_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ) ): ?>
				<img src="<?php echo esc_url( $event_image[0] ) ?>" />
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="summary">
		<a href="<?php echo tribe_get_event_link(); ?>" rel="bookmark"><?php echo apply_filters( 'ecs_event_list_title', get_the_title(), $atts, $post ) ?></a>
		

		<?php if ( Events_Calendar_Shortcode::isValid( $atts['timeonly'] ) ): ?>
			<div class="duration time ecs_start_time">
				<?php if(tribe_get_start_time()): ?>
					Kl: <?php echo tribe_get_start_time() ?>
				<?php endif; ?>

				<?php if(tribe_get_end_time()): ?>
					- <?php echo tribe_get_end_time() ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		<?php if (Events_Calendar_Shortcode::isValid( $atts['venue'] ) ): ?>
			<div class="ecs-venue"><?php echo tribe_get_venue(); ?></div>
		<?php endif; ?>
		
		
	</div>
    <?php //if ( in_array( 'button', $contentorder ) and Events_Calendar_Shortcode::isValid( $atts['button'] ) ): ?>
        <div class="ecs-button">
            <a href="<?php //echo tribe_get_event_link(); ?>" rel="bookmark"><?php //echo esc_html( $atts['button'] ); ?></a>
        </div>
    <?php //endif; ?>
</div>