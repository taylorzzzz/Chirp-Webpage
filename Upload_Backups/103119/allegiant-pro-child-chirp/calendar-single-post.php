<?php
/*
 * Template Name: Calendar Post
 * Template Post Type: event
 */
  
 get_header();  ?>

<div id="main" class="main">
	<div class="container">
		<section id="content" class="content">
			<?php do_action( 'cpotheme_before_content' ); ?>

			<!-- Get Event Posts -->
			<?php 
				// We want to fetch all event posts EXCEPT for the calendar event
				$args = array(
					'post_type' => 'event',
					'orderby'   => 'meta_value',
					'meta_key' => 'event_date',
					'order' => 'ASC',
					'eventDisplay' => 'upcoming',
					'post__not_in' => array( 3854 ),
				);
				$query = new WP_Query( $args ); 
			?>
			<?php if ( $query->posts ) : ?>

			<?php 
				// Outer list container	
				echo '<div class="events-list-container">';

				$current_month = "";
				foreach ( $query->posts as $post ) {

					// Get post meta values
					$location_meta_value = get_post_meta( $post->ID, 'event_location', true );
					$date_time_meta_value = get_post_meta( $post->ID, 'event_date', true );

					// Based on these meta values, get month, day and time
					if ($date_time_meta_value) {
						$event_month = $date_time_meta_value->format('F');
						$event_month_abbr = $date_time_meta_value->format('M');
						$event_year = $date_time_meta_value->format('Y');
						$event_day = $date_time_meta_value->format('j');
						$event_time = $date_time_meta_value->format('g:i a');
					} else {
						$event_month = 'N/A';
						$event_day = 'N/A';
						$event_time = 'N/A';
					}

					// First check if month of current post is same as saved $current_month
					if ($event_month != $current_month && $event_month != 'N/A') {
						// Close the previous months container if we aren't on the first month
						if ($current_month) {
							echo '</div>';	// month-listings
							echo '</div>';	// month-container
						}
						// Update current_month 
						$current_month = $event_month;
						// output the month container markup
						echo '<div class="month-container">';
						echo '<div class="month-header">' . $event_month . ' <span class="month-listing-year">' . $event_year . '</span></div>';
						echo '<div class="month-listings">';
						
					}
					?>
					<div class="event-listing-container">
						
						<div class="event-listing-date-container">
							<div class="event-listing-day"><?php echo $event_day; ?></div>
							<div class="event-listing-month"><?php echo $event_month_abbr; ?></div>
						</div>
						<div class="event-listing-info-container">
							<div class="event-listing-title">
								<a href="<?php echo get_permalink();?>"><?php echo the_title(); ?></a>
							</div>
							<div class="event-listing-subinfo">
								<div class="event-listing-time-container">
									<span class="dashicons dashicons-clock"></span>
									<div class="event-listing-time"><?php echo $event_time; ?></div>
								</div>
								<div class="event-listing-location-container">
									<span class="dashicons dashicons-location"></span>
									<div class="event-listing-location"><?php echo $location_meta_value; ?></div>
								</div>
								<a class="event-listing-more-info" href="<?php echo get_permalink();?>">More Info</a>
							</div>
						</div>			
					</div>
				<?php 
					} 				// end posts loop
					echo '</div>';	// last month-listings
					echo '</div>';	// last month-container
				?>
				
			<div>

			<?php wp_reset_postdata(); ?>
			<?php endif; ?>


			<?php do_action( 'cpotheme_after_content' ); ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>
