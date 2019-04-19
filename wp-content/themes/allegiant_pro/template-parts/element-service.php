<?php

$current_id = cpotheme_current_id();
$url        = get_post_meta( $current_id, 'service_url', true );
?>

<div class="service">
	<?php if ( $url ) { ?>
	<a href="<?php echo esc_url( $url ); ?>">
	<?php } else { ?>
		<a href="<?php the_permalink(); ?>">
	<?php } ?>
	<?php cpotheme_icon( get_post_meta( get_the_ID(), 'service_icon', true ), 'primary-color service-icon' ); ?>
		</a>
		<div class="service-body">
			<h3 class="service-title">
				<?php if ( $url ) { ?>
					<a href="<?php echo esc_url( $url ); ?>"><?php the_title(); ?></a>
				<?php } else { ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php } ?>

			</h3>
			<div class="service-content">
				<?php the_excerpt(); ?>
			</div>
	<?php cpotheme_edit(); ?>
		</div>
</div>
