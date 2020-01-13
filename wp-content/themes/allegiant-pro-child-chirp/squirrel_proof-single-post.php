<?php
/*
 * Template Name: Squirrel Proof Central
 * Template Post Type: post
 */
  
 get_header();  ?>

<div id="main" class="main">
	<div class="container">

		<section id="content" class="content" style="padding-top:100px">
            <div class="container">
                <?php do_action( 'cpotheme_before_content' ); ?>
                <div class="spc-main-title-container" style="max-width: calc(100% * (6 / 12)); margin: 0 auto;text-align:center">
                    <!--
                    <h1 style="" class="spc-main-title">
                        Protect Your Feeders
                    </h1>
-->
                    <h5>
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
                    </h5>
                </div>
                
            </div>
        </section>

        <div class="section">
            <div class="container">
                <!-- Get squirrel-proof posts -->
                <div class=" section-heading products-heading">
                    <div class="section-title products-title heading">Featured Squirrel Proofing Posts</div>
                </div>
                <?php 
                    // We want to fetch all squirrel-proof pr
                    $query = new WP_Query( array(
                        'post_type' => 'post',
                        'paged' => cpotheme_current_page(),
                        'posts_per_page' => get_option( 'posts_per_page'),
                        'category_name' => 'Squirrel Proof',
                        'post__not_in' => array( 3854 )
                        )
                    ); 
                ?>
                <?php if ( $query->posts ) : ?>
                <?php 
                    $num_columns = count($query->posts) > 3 ? 4 : 3;
                    //cpotheme_grid( $query->posts, 'element', 'squirrel-proof-posts', cpotheme_get_option( 'blog_columns' ), array( 'class' => 'column-narrow' ) ); 
                    cpotheme_grid( $query->posts, 'element', 'squirrel-proof-posts', $num_columns, array( 'class' => 'column-narrow' ) );
                ?>
                <?php cpotheme_numbered_pagination( $query ); ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <!-- End squirrel-proof posts -->
            </div>
        </div>

        <div class="section products grey-bg">
            <div class="container">
                <!-- Get squirrel-proof products -->
                <div class=" section-heading products-heading">
                    <div class="section-title products-title heading">Our Favorite Squirrel Proof Bird Feeders</div>
                </div>
                
                <?php 
                    //cpotheme_grid( $query->posts, 'element', 'squirrel-proof-posts', cpotheme_get_option( 'blog_columns' ), array( 'class' => 'column-narrow' ) ); 
                    $output = do_shortcode( '[products ids="3773,3733,3815,1959"]' );
                    echo $output;
                ?>
                <!-- End squirrel-proof posts -->
            </div>
        </div>

			<?php do_action( 'cpotheme_after_content' ); ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>
