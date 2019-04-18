<?php get_header(); ?>

<div id="main" class="main">
	<div class="container">
		<section id="content" class="content">
			<?php do_action( 'cpotheme_before_content' ); ?>
			
			<?php $description = term_description(); ?>
			<?php if ( $description != '' ) : ?>
			<div class="page-content">
				<?php echo $description; ?>
			</div>
			<?php endif; ?>
			
			<?php if ( have_posts() ) : ?>
			<div id="team" class="team">
				<?php cpotheme_grid( null, 'element', 'team', cpotheme_get_option( 'team_columns' ), array( 'class' => 'column-narrow' ) ); ?>
			</div>
			<?php endif; ?>
			<?php cpotheme_numbered_pagination(); ?>
			
			<?php do_action( 'cpotheme_after_content' ); ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
