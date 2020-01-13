<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php 
        if (is_front_page()) {
        ?>
            <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "LocalBusiness",
                    "address": {
                        "@type": "PostalAddress",
                        "addressLocality": "Big Bear Lake",
                        "addressRegion": "CA",
                        "addressCountry": "USA",
                        "postalCode":"92315",
                        "streetAddress": "40850 Village Dr." 
                    },
                    "description": "Chirp Nature Centers offers carefully curated wild bird supplies, guides & gifts for nature lovers, bird-themed treasures for home & garden, and educational, inspiring books & toys.",
                    "name": "Chirp Nature Centers",
                    "telephone": "888-412-4477",
                    "openingHours": "Mo,Tu,We,Th,Fr 10:00-18:00",
                    "sameAs" : [ "https://www.facebook.com/chirpforbirds/",
                    "https://twitter.com/chirpforbirds/",
                    "https://www.instagram.com/chirpforbirds/",
                    "https://www.pinterest.com/chripforbirds/"],
                    "image" : {
                        "@type" : "ImageObject",
                        "url" : "https://chirpforbirds.com/wp-content/uploads/2018/12/cropped-Chirp_Opening_Pano_112118.jpg",
                        "width" : 1600,
                        "height" : 49
                    }
                }
            </script>

        <?php } ?>
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="outer" id="top">
	<?php do_action( 'cpotheme_before_wrapper' ); ?>
	<div class="wrapper">
		<div id="topbar" class="topbar">
			<div class="container">
				<?php do_action( 'cpotheme_top' ); ?>
				<div class="clear"></div>
			</div>
		</div>
		<header id="header" class="header">
			<div class="container">
				<?php do_action( 'cpotheme_header' ); ?>
				<div class='clear'></div>
			</div>
		</header>



		<?php get_template_part( 'template-parts/element', 'page-header' ); ?>

		<?php do_action( 'cpotheme_before_main' ); ?>
        
		<div class="clear"></div>
