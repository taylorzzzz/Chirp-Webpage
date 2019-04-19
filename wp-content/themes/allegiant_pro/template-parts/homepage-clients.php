<?php $query = new WP_Query( 'post_type=cpo_client&posts_per_page=-1&order=ASC&orderby=menu_order' ); ?>
<?php if ( $query->posts ) : ?>
<div id="clients" class="section clients">
	<div class="container">	
		<?php cpotheme_section_heading( 'clients' ); ?>
		<?php cpotheme_grid( $query->posts, 'element', 'client', cpotheme_get_option( 'clients_columns' ), array( 'class' => 'column-narrow' ) ); ?>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
