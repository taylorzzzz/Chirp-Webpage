<?php $query = new WP_Query( 'post_type=cpo_portfolio&order=ASC&orderby=menu_order&meta_key=portfolio_featured&meta_value=1&posts_per_page=-1' ); ?>
<?php if ( $query->posts ) : ?>
<div id="portfolio" class="section portfolio">
	<div class="container">
		<?php cpotheme_section_heading( 'portfolio' ); ?>
		<?php cpotheme_grid( $query->posts, 'element', 'portfolio', cpotheme_get_option( 'portfolio_columns' ), array( 'class' => 'column-fit' ) ); ?>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
