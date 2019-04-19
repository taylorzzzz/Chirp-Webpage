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
                    <iframe 
                        width="560" 
                        height="315" 
                        src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'stream_id', true ); ?>?controls=0&autoplay=1" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
					<?php //the_content(); ?>
					<?php //cpotheme_post_pagination(); ?>
				</div>
			</div>
			<?php comments_template( '', true ); ?>

			<?php
                endwhile;
                };
            ?>

			<?php do_action( 'cpotheme_after_content' ); ?>
		</section>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>
