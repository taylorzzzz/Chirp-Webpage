<div class="portfolio-item dark <?php if ( has_excerpt() ) {
	echo ' portfolio-item-has-excerpt';} ?>">
	<a class="portfolio-item-link" href="<?php the_permalink(); ?>"></a>
	<div class="portfolio-item-overlay primary-color-bg"></div>
	<h3 class="portfolio-item-title">
		<?php the_title(); ?>
	</h3>
	<?php if ( has_excerpt() ) : ?>
	<div class="portfolio-item-description">
		<?php the_excerpt(); ?>
	</div>
	<?php cpotheme_edit(); ?>
	<?php endif; ?>
	<?php the_post_thumbnail( 'portfolio', array( 'title' => '' ) ); ?>
</div>
