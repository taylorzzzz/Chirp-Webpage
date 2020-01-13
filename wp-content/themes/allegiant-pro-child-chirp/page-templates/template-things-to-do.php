<?php /* Template Name: Things to do */ ?>

<?php get_header(); ?>

<div id="main" class="main">
	<div class="container">
		<section id="content" class="content">
			<?php do_action( 'cpotheme_before_content' ); ?>
			
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) :
					the_post();
				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</div>
			<?php
			endwhile;
			};
?>
			
			<?php 
				// Get's all posts and event posts with a category of 'Things to do'
                $query = new WP_Query( array(
                    'post_type' => array( 'post', 'event' ),
                    'paged' => cpotheme_current_page(),
                    'posts_per_page' => get_option( 'posts_per_page'),
					'category_name' => 'things-to-do-in-big-bear-lake' // category slug
					)
				);
			?>
			
			<?php if ( $query->posts ) : ?>
			<?php cpotheme_grid( $query->posts, 'element', 'blog', cpotheme_get_option( 'blog_columns' ), array( 'class' => 'column-narrow' ) ); ?>
			<?php cpotheme_numbered_pagination( $query ); ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			
			<?php do_action( 'cpotheme_after_content' ); ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>
