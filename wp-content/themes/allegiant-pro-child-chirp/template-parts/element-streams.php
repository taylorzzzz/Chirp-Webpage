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
    <?php
		$youtube_id = get_post_meta( get_the_ID(), 'stream_id', true );
		$stream_location = get_post_meta( get_the_ID(), 'stream_location', true );
    ?>
    <img width="600" height="400" src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/mqdefault.jpg" class="attachment-portfolio size-portfolio wp-post-image" alt="" title="">    
</div>
<caption><?php echo $stream_location ?></caption>


