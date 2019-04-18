<?php $output = do_shortcode( '[featured_products per_page="999" columns="' . cpotheme_get_option( 'products_columns' ) . '" order="asc" orderby="menu_order"]' ); ?>
<?php $check  = strip_tags( $output ); ?>
<?php if ( ! empty( $check ) ) : ?>
<div id="products" class="section products">
	<div class="container">
		<?php cpotheme_section_heading( 'products' ); ?>
		<?php echo $output; ?>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
