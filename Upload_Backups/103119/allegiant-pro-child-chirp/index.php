<?php get_header(); ?>

<?php if ( cpotheme_show_posts() ) : ?>
<div id="main" class="main">
	<div class="container">		
		<section id="content" class="content">
            <?php do_action( 'cpotheme_before_content' ); ?>

            

            <?php 
                // Original Query
                // $query = new WP_Query( 'post_type=post&paged=' . cpotheme_current_page() . '&posts_per_page=' . get_option( 'posts_per_page') . '&category__not_in=63' );
                
                // First Version of Query 
                // $query = new WP_Query( 'post_type=post&paged=' . cpotheme_current_page() . '&posts_per_page=3&category__not_in=63' );
               
                // Final Version of Query
                $args = array(
					'post_type' => 'post',
					'paged' => cpotheme_current_page(),
                    'posts_per_page' => '3',
                    'category__not_in' => array(63, 184)
				);
				$query = new WP_Query( $args );
            ?>
                
			<?php if ( $query->posts ) : ?>
			<?php cpotheme_grid( $query->posts, 'element', 'blog', cpotheme_get_option( 'blog_columns' ), array( 'class' => 'column-narrow' ) ); ?>
			<?php cpotheme_numbered_pagination( $query ); ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

            <div class="link-to-bulletins">
                <a class="tagline-link button button-medium" href="/bird-bulletins">See All Bulletins</a>
            </div>



            <?php 
            // This code was replaced above in the conditional
            /*
            cpotheme_grid( null, 'element', 'blog', cpotheme_get_option( 'blog_columns' ), array( 'class' => 'column-narrow' ) ); 
            */
            ?>
            <?php 
            /*
                cpotheme_numbered_pagination(); 
            */
            ?>
            
			<?php do_action( 'cpotheme_after_content' ); ?>


		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
