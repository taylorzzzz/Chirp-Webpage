<?php
	/* This template is used on the squirrel proof central post to 
		display the individual squirrel proof post previews
	*/
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
	<div class="post-image">
		<?php cpotheme_postpage_image(); ?>		
	</div>	
	<div class="post-body">
	<?php cpotheme_postpage_categories(); ?>
		<?php 
			//cpotheme_postpage_title(); 
			childtheme_spc_postpage_title();
		?>
		<div class="post-byline">
			<?php //cpotheme_postpage_date(); ?>
			<?php //cpotheme_postpage_author(); ?>
			<?php //cpotheme_postpage_categories(); ?>
			
			<?php cpotheme_edit(); ?>
		</div>
		<div class="post-content">
			<?php 
				// cpotheme_postpage_content(); 
				childtheme_spc_postpage_content();
			?>
		</div>
		<?php //cpotheme_postpage_comments( false, '%s' ); ?>
		
		<?php 
			//cpotheme_postpage_readmore( 'button' ); 
			//childtheme_spc_postpage_readmore('button');
		?>
		<div class="clear"></div>
	</div>
</article>
