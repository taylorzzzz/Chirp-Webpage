<?php $query = new WP_Query( 'post_type=cpo_team&order=ASC&orderby=menu_order&meta_key=team_featured&meta_value=1&posts_per_page=-1' ); ?>
<?php if ( $query->posts ) : ?>
	<div id="team" class="section team">
		<div class="container">
			<?php cpotheme_section_heading( 'team', 'dark' ); ?>
			<?php cpotheme_grid( $query->posts, 'element', 'team', cpotheme_get_option( 'team_columns' ), array( 'class' => 'column-narrow' ) ); ?>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
