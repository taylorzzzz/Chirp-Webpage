<article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
	
	<div class="post-body">
		<?php cpotheme_postpage_title(); ?>
		<div class="event-info">
			<?php
				$location_meta_value = get_post_meta( get_the_ID(), 'event_location', true );
				$date_meta_value = get_post_meta( get_the_ID(), 'event_date', true );
				$time_meta_value = get_post_meta( get_the_ID(), 'event_time', true );
				$end_time_meta_value = get_post_meta( get_the_ID(), 'event_end_date_time', true );
				//$event_date = $date_meta_value ? date('F j, Y', strtotime($date_meta_value)) : 'N/A';
				//$event_time = $time_meta_value ? date('g:i A', strtotime($time_meta_value)) : 'N/A';


				global $wp;
				$current_url = home_url( add_query_arg( array(), $wp->request ) );
			?>
			<script type='application/ld+json'> 

				{
					"@context": "https://www.schema.org",
					"@type": "Event",
					"name": "<?php echo the_title(); ?>",
					"url": "<?php echo $current_url; ?>",
					"description": "<?php echo get_the_excerpt(); ?>",
					"startDate": "<?php echo $event_date ?>",
					"location": {
						"@type": "Place",
						"address": {
							"@type": "PostalAddress",
							"addressLocality": "Big Bear Lake",
							"addressRegion": "CA",
							"postalCode": "92315"
						},
						"name": "<?php echo $location_meta_value ?>"
					}
				}

			</script>
			
			<div class="event-post-date">
				<span class="dashicons dashicons-clock"></span>
				<span class="event-post-date-label">When: </span>
				<?php 
					if ($end_time_meta_value) {
						echo $date_meta_value->format('g:ia') . ' - ' . $end_time_meta_value->format('g:ia \| l M jS, Y');
					} else {
						//echo $date_meta_value->format('g:ia \o\n l M jS, Y');
						echo $date_meta_value->format('g:ia \| l M jS, Y');
					}
					
				?>
			</div>
			<div class="event-post-location">
				<span class="dashicons dashicons-location"></span>
				<span class="event-post-location-label">Where: </span>
				<?php echo $location_meta_value; ?>
			</div>


		</div>
		<div class="post-byline"></div>
		
		<div class="post-image">
			<?php cpotheme_postpage_image(); ?>		
		</div>	
		<br>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		<?php cpotheme_postpage_comments( false, '%s' ); ?>
		<?php
		if ( is_singular( 'post' ) ) {
			cpotheme_postpage_tags( false, '', '', '' );}
?>
        <?php 
            //cpotheme_postpage_readmore( 'button' );
        ?>
		<div class="clear"></div>
	</div>
</article>