<?php wp_reset_query(); ?>

<?php if ( cpotheme_show_title() ) : ?>

	<?php 
		//$header_image = cpotheme_header_image(); 
		$header_image = "";
	?>

	<?php
	/*
		if ( '' != $header_image && ! ( is_page() && has_post_thumbnail() ) ) {
			$header_image = 'style="background-image:url(' . esc_url( $header_image ) . ');"';
		} else {
			// We have some checks to see if we should display header image or not.
			// Checks if we are looking at a single post 
			if (is_singular('post')) {
				// If we are then we don't want to use the post's thumbnail for the header image
				$header_image = '';
				// Check if we are on a product page
			} else if(is_product()) {
				$header_image = '';
				// Check if we are on a post or product category page
			} else if (is_category() || is_product_category() ) {
				$header_image = '';
			} else if (is_shop()){
				$header_image = '';
			} else if (is_search()){
				$header_image = '';
			} else if (is_archive()) {
				$header_image = '';
			} else {
				$header_image = 'style="background-image:url(' . esc_url( get_the_post_thumbnail_url() ) . ');"';
			}
		}
	*/
	?>
	<?php do_action( 'cpotheme_before_title' ); ?>
	<section id="pagetitle" class="pagetitle dark" <?php echo $header_image; ?>>
		<div class="container">
			<?php do_action( 'cpotheme_title' ); ?>
		</div>
	</section>
	<?php do_action( 'cpotheme_after_title' ); ?>

<?php endif; ?>
