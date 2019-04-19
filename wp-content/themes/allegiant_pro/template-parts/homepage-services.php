<?php $query = new WP_Query( 'post_type=cpo_service&order=ASC&orderby=menu_order&meta_key=service_featured&meta_value=1&numberposts=-1&posts_per_page=-1' ); ?>
<?php if ( $query->posts ) : ?>
<div id="services" class="section services dark">
	<div class="container">
		<?php cpotheme_section_heading( 'services' ); ?>
		<?php cpotheme_grid( $query->posts, 'element', 'service', cpotheme_get_option( 'services_columns' ) ); ?>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
