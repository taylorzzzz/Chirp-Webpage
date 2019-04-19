<?php

//Define customizer sections
if ( ! function_exists( 'cpotheme_metadata_panels' ) ) {
	function cpotheme_metadata_panels() {
		$data = array();

		$data['cpotheme_management'] = array(
			'title'       => __( 'General Theme Options', 'cpotheme' ),
			'description' => __( 'Options that help you manage your theme better.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'priority'    => 15,
		);

		$data['cpotheme_layout'] = array(
			'title'       => __( 'Layout', 'cpotheme' ),
			'description' => __( 'Here you can find settings that control the structure and positioning of specific elements within your website.', 'cpotheme' ),
			'priority'    => 25,
		);

		$data['cpotheme_content'] = array(
			'title'       => __( 'Content Areas', 'cpotheme' ),
			'description' => __( 'This theme includes a few areas where you can insert cutom content.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'priority'    => 26,
		);

		return apply_filters( 'cpotheme_customizer_panels', $data );
	}
}


//Define customizer sections
if ( ! function_exists( 'cpotheme_metadata_sections' ) ) {
	function cpotheme_metadata_sections() {
		$data = array();

		$data['cpotheme_layout_general'] = array(
			'title'       => __( 'Site Wide Structure', 'cpotheme' ),
			'description' => __( 'Settings that control the structure and positioning of design elements.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'panel'       => 'cpotheme_layout',
			'priority'    => 25,
		);

		$data['cpotheme_layout_home'] = array(
			'title'       => __( 'Homepage', 'cpotheme' ),
			'description' => __( 'Customize the appearance and behavior of the homepage elements.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'panel'       => 'cpotheme_layout',
			'priority'    => 50,
		);

		if ( defined( 'CPOTHEME_USE_SLIDES' ) && CPOTHEME_USE_SLIDES == true ) {
			$data['cpotheme_layout_slider'] = array(
				'title'       => __( 'Slider', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the slider.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_TAGLINE' ) && CPOTHEME_USE_TAGLINE == true ) {
			$data['cpotheme_layout_tagline'] = array(
				'title'       => __( 'Tagline', 'cpotheme' ),
				'description' => __( 'Customize the appearance and of the homepage tagline.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_FEATURES' ) && CPOTHEME_USE_FEATURES == true ) {
			$data['cpotheme_layout_features'] = array(
				'title'       => __( 'Features', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the feature blocks.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_PORTFOLIO' ) && CPOTHEME_USE_PORTFOLIO == true ) {
			$data['cpotheme_layout_portfolio'] = array(
				'title'       => __( 'Portfolio', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the portfolio.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_PRODUCTS' ) && CPOTHEME_USE_PRODUCTS == true ) {
			$data['cpotheme_layout_products'] = array(
				'title'       => __( 'Products', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the products.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_SERVICES' ) && CPOTHEME_USE_SERVICES == true ) {
			$data['cpotheme_layout_services'] = array(
				'title'       => __( 'Services', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the services.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_TEAM' ) && CPOTHEME_USE_TEAM == true ) {
			$data['cpotheme_layout_team'] = array(
				'title'       => __( 'Team Members', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the team listing.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_TESTIMONIALS' ) && CPOTHEME_USE_TESTIMONIALS == true ) {
			$data['cpotheme_layout_testimonials'] = array(
				'title'       => __( 'Testimonials', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the testimonials.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		if ( defined( 'CPOTHEME_USE_CLIENTS' ) && CPOTHEME_USE_CLIENTS == true ) {
			$data['cpotheme_layout_clients'] = array(
				'title'       => __( 'Clients', 'cpotheme' ),
				'description' => __( 'Customize the appearance and behavior of the client listing.', 'cpotheme' ),
				'capability'  => 'edit_theme_options',
				'panel'       => 'cpotheme_layout',
				'priority'    => 50,
			);
		}

		$data['cpotheme_layout_posts'] = array(
			'title'       => __( 'Blog Posts', 'cpotheme' ),
			'description' => __( 'Modify the appearance and behavior of your blog posts by enabling specific elements.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'panel'       => 'cpotheme_layout',
			'priority'    => 50,
		);

		$data['cpotheme_typography'] = array(
			'title'       => __( 'Typography', 'cpotheme' ),
			'description' => __( 'Custom typefaces for the entire site.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'priority'    => 45,
		);

		$data['cpotheme_content_general'] = array(
			'title'       => __( 'Site Wide Content', 'cpotheme' ),
			'description' => __( 'Content areas located in common areas throughout the site. You can use HTML and shortcodes here.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'panel'       => 'cpotheme_content',
			'priority'    => 50,
		);

		$data['cpotheme_content_home'] = array(
			'title'       => __( 'Homepage', 'cpotheme' ),
			'description' => __( 'Add custom content to specific areas of the homepage. You can use HTML and shortcodes here.', 'cpotheme' ),
			'capability'  => 'edit_theme_options',
			'panel'       => 'cpotheme_content',
			'priority'    => 50,
		);

		return apply_filters( 'cpotheme_customizer_sections', $data );
	}
}


if ( ! function_exists( 'cpotheme_metadata_customizer' ) ) {
	function cpotheme_metadata_customizer( $std = null ) {
		$data = array();

		$data['general_logo'] = array(
			'label'       => __( 'Custom Logo', 'cpotheme' ),
			'description' => __( 'Insert the URL of an image to be used as a custom logo.', 'cpotheme' ),
			'section'     => 'title_tagline',
			'sanitize'    => 'esc_url',
			'type'        => 'image',
			'partials'    => '#logo .site-logo',
		);

		$data['general_favicon'] = array(
			'label'       => __( 'Custom Favicon', 'cpotheme' ),
			'description' => __( 'Recommended sizes are 16x16 pixels.', 'cpotheme' ),
			'section'     => 'title_tagline',
			'sanitize'    => 'esc_url',
			'type'        => 'image',
		);

		$data['general_logo_width'] = array(
			'label'       => __( 'Logo Width (px)', 'cpotheme' ),
			'description' => __( 'Forces the logo to have a specified width.', 'cpotheme' ),
			'section'     => 'title_tagline',
			'type'        => 'text',
			'placeholder' => '(none)',
			'sanitize'    => 'absint',
			'width'       => '100px',
		);

		$data['general_texttitle'] = array(
			'label'       => __( 'Enable Text Title?', 'cpotheme' ),
			'description' => __( 'Activate this to display the site title as text.', 'cpotheme' ),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
			'sanitize'    => 'cpotheme_sanitize_bool',
			'std'         => false,
		);

		$data['sidebar_position'] = array(
			'label'       => __( 'Default Sidebar Position', 'cpotheme' ),
			'description' => __( 'This option can be overridden in individual pages.', 'cpotheme' ),
			'section'     => 'cpotheme_layout_general',
			'type'        => 'select',
			'choices'     => cpotheme_metadata_sidebarposition_text(),
			'default'     => 'right',
		);

		$data['layout_subfooter_columns'] = array(
			'label'   => __( 'Number of Footer Columns', 'cpotheme' ),
			'section' => 'cpotheme_layout_general',
			'type'    => 'select',
			'choices' => cpotheme_metadata_sidebar_columns_text(),
			'default' => 3,
		);

		$data['layout_breadcrumbs'] = array(
			'label'    => __( 'Enable breadcrumbs', 'cpotheme' ),
			'section'  => 'cpotheme_layout_general',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['layout_languages'] = array(
			'label'    => __( 'Enable Language Switcher', 'cpotheme' ),
			'section'  => 'cpotheme_layout_general',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['layout_cart'] = array(
			'label'    => __( 'Enable Shopping Cart', 'cpotheme' ),
			'section'  => 'cpotheme_layout_general',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['general_credit'] = array(
			'label'    => __( 'Show Credit Link', 'cpotheme' ),
			'section'  => 'cpotheme_layout_general',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
			'partials' => '.footer-content .cpo-credit-link',
		);

		$data['sticky_header'] = array(
			'label'    => __( 'Sticky header', 'cpotheme' ),
			'section'  => 'cpotheme_layout_general',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['footer_text'] = array(
			'label'        => __( 'Footer Text', 'cpotheme' ),
			'description'  => __( 'Add custom text that replaces the copyright line in the footer.', 'cpotheme' ),
			'section'      => 'cpotheme_layout_general',
			'multilingual' => true,
			'sanitize'     => 'esc_html',
			'type'         => 'textarea',
			'partials'     => '.footer-content .copyright',
		);

		$data['social_links'] = array(
			'label'        => __( 'Social Links', 'cpotheme' ),
			'description'  => __( 'Enter the URL of your preferred social profiles, one per line.', 'cpotheme' ),
			'section'      => 'cpotheme_layout_general',
			'multilingual' => true,
			'sanitize'     => 'esc_html',
			'type'         => 'textarea',
		);

		//Homepage
		$data['sidebar_position_home'] = array(
			'label'       => __( 'Sidebar Position in Homepage', 'cpotheme' ),
			'description' => __( 'If you set a static page to serve as the homepage, this option will be overridden by that page\'s settings.', 'cpotheme' ),
			'section'     => 'cpotheme_layout_home',
			'type'        => 'select',
			'choices'     => cpotheme_metadata_sidebarposition_text(),
			'default'     => 'right',
		);

		$data['home_order'] = array(
			'label'       => __( 'Content Ordering', 'cpotheme' ),
			'description' => __( 'Change the ordering of the various elements in the homepage.', 'cpotheme' ),
			'section'     => 'cpotheme_layout_home',
			'type'        => 'sortable',
			'choices'     => cpotheme_metadata_homepage_order(),
			'default'     => cpotheme_metadata_homepage_order_default(),
		);

		//Homepage Tagline
		if ( defined( 'CPOTHEME_USE_TAGLINE' ) && CPOTHEME_USE_TAGLINE == true ) {
			$data['hide_tagline'] = array(
				'label'       => __( 'Hide Tagline', 'cpotheme' ),
				'description' => __( 'Hide tagline section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_tagline',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#tagline',
			);

			$data['home_tagline'] = array(
				'label'        => __( 'Tagline Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_tagline',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Add your custom tagline here.', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#tagline .tagline-title',
			);

			$data['home_tagline_content'] = array(
				'label'        => __( 'Tagline Content', 'cpotheme' ),
				'section'      => 'cpotheme_layout_tagline',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'wp_kses_post',
				'type'         => 'textarea',
				'partials'     => '#tagline .tagline-content',
			);

			$data['home_tagline_image'] = array(
				'label'    => __( 'Image', 'cpotheme' ),
				'section'  => 'cpotheme_layout_tagline',
				'sanitize' => 'esc_url',
				'type'     => 'image',
			);

			$data['home_tagline_url'] = array(
				'label'        => __( 'Tagline Button URL', 'cpotheme' ),
				'section'      => 'cpotheme_layout_tagline',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_url',
				'type'         => 'text',
			);

			$data['home_tagline_link'] = array(
				'label'        => __( 'Tagline Button Label', 'cpotheme' ),
				'section'      => 'cpotheme_layout_tagline',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Learn More', 'cpotheme' ),
				'sanitize'     => 'esc_attr',
				'type'         => 'text',
				'partials'     => '#tagline .tagline-link',
			);
		}

		//Homepage Slider
		if ( defined( 'CPOTHEME_USE_SLIDES' ) && CPOTHEME_USE_SLIDES == true ) {
			$data['hide_slider'] = array(
				'label'       => __( 'Hide Slider', 'cpotheme' ),
				'description' => __( 'Hide slider section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_slider',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#slider',
			);

			$data['slider_height'] = array(
				'label'    => __( 'Slider Height (px)', 'cpotheme' ),
				'section'  => 'cpotheme_layout_slider',
				'type'     => 'text',
				'sanitize' => 'absint',
				'default'  => '500',
			);

			$data['slider_speed'] = array(
				'label'    => __( 'Slider Transition Speed (ms)', 'cpotheme' ),
				'section'  => 'cpotheme_layout_slider',
				'type'     => 'text',
				'sanitize' => 'absint',
				'default'  => '1500',
			);

			$data['slider_timeout'] = array(
				'label'    => __( 'Slider Timeout (ms)', 'cpotheme' ),
				'section'  => 'cpotheme_layout_slider',
				'type'     => 'text',
				'sanitize' => 'absint',
				'default'  => '8000',
			);

			$data['slider_always'] = array(
				'label'       => __( 'Always Display Slider', 'cpotheme' ),
				'description' => __( 'Shows the homepage slider in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_slider',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);


			$data['slider_effect'] = array(
				'label'   => __( 'Slider Transition Effect', 'cpotheme' ),
				'section' => 'cpotheme_layout_slider',
				'type'    => 'select',
				'choices' => cpotheme_metadata_slider_effect(),
				'default' => 'fade',
			);


		}

		//Homepage Features
		if ( defined( 'CPOTHEME_USE_FEATURES' ) && CPOTHEME_USE_FEATURES == true ) {
			$data['hide_features'] = array(
				'label'       => __( 'Hide Features', 'cpotheme' ),
				'description' => __( 'Hide features section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_features',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#features',
			);

			$data['home_features'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_features',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Our core features', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#features .section-title',
			);

			$data['home_features_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_features',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#features .section-subtitle',
			);

			$data['features_columns'] = array(
				'label'   => __( 'Features Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_features',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 3,
			);

			$data['features_always'] = array(
				'label'       => __( 'Always Display Features', 'cpotheme' ),
				'description' => __( 'Shows the homepage features in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_features',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);
		}

		//Portfolio layout
		if ( defined( 'CPOTHEME_USE_PORTFOLIO' ) && CPOTHEME_USE_PORTFOLIO == true ) {
			$data['hide_portfolio'] = array(
				'label'       => __( 'Hide Portfolio', 'cpotheme' ),
				'description' => __( 'Hide portfolio section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_portfolio',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#portfolio',
			);

			$data['home_portfolio'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_portfolio',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Take a look at our work', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#portfolio .section-title',
			);

			$data['home_portfolio_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_portfolio',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#portfolio .section-subtitle',
			);

			$data['portfolio_columns'] = array(
				'label'   => __( 'Portfolio Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_portfolio',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 3,
			);

			$data['portfolio_always'] = array(
				'label'       => __( 'Always Display Portfolio', 'cpotheme' ),
				'description' => __( 'Shows the featured portfolio items in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_portfolio',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);

			$data['portfolio_related'] = array(
				'label'       => __( 'Enable Related Portfolio Items', 'cpotheme' ),
				'description' => __( 'Shows portfolio items belonging to the same category at the end of each portfolio item.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_portfolio',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => true,
			);
		}

		//Services layout
		if ( defined( 'CPOTHEME_USE_PRODUCTS' ) && CPOTHEME_USE_PRODUCTS == true ) {
			$data['hide_products'] = array(
				'label'       => __( 'Hide Products', 'cpotheme' ),
				'description' => __( 'Hide products section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_products',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#products',
			);

			$data['home_products'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_products',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Our Featured Products', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#products .section-title',
			);

			$data['home_products_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_products',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#products .section-subtitle',
			);

			$data['products_columns'] = array(
				'label'   => __( 'Services Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_products',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 4,
			);

			$data['products_always'] = array(
				'label'       => __( 'Always Display Products', 'cpotheme' ),
				'description' => __( 'Shows the featured products section in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_products',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);
		}

		//Services layout
		if ( defined( 'CPOTHEME_USE_SERVICES' ) && CPOTHEME_USE_SERVICES == true ) {
			$data['hide_services'] = array(
				'label'       => __( 'Hide Services', 'cpotheme' ),
				'description' => __( 'Hide services section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_services',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#services',
			);

			$data['home_services'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_services',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'What we can offer you', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#services .section-title',
			);

			$data['home_services_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_services',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#services .section-subtitle',
			);

			$data['services_columns'] = array(
				'label'   => __( 'Services Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_services',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 3,
			);

			$data['services_always'] = array(
				'label'       => __( 'Always Display Services', 'cpotheme' ),
				'description' => __( 'Shows the featured services section in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_services',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);
		}

		//Team layout
		if ( defined( 'CPOTHEME_USE_TEAM' ) && CPOTHEME_USE_TEAM == true ) {
			$data['hide_team'] = array(
				'label'       => __( 'Hide Team', 'cpotheme' ),
				'description' => __( 'Hide team section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_team',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#team',
			);

			$data['home_team'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_team',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Meet our team', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#team .section-title',
			);

			$data['home_team_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_team',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#team .section-subtitle',
			);

			$data['team_columns'] = array(
				'label'   => __( 'Team Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_team',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 3,
			);

			$data['team_always'] = array(
				'label'       => __( 'Always Display Team', 'cpotheme' ),
				'description' => __( 'Shows the team section in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_team',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);
		}

		//Testimonials
		if ( defined( 'CPOTHEME_USE_TESTIMONIALS' ) && CPOTHEME_USE_TESTIMONIALS == true ) {
			$data['hide_testimonials'] = array(
				'label'       => __( 'Hide Testimonials', 'cpotheme' ),
				'description' => __( 'Hide testimonials section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_testimonials',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#testimonials',
			);

			$data['home_testimonials'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_testimonials',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'What they say about us', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#testimonials .section-title',
			);

			$data['home_testimonials_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_testimonials',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#testimonials .section-subtitle',
			);

			$data['testimonials_columns'] = array(
				'label'   => __( 'Testimonials Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_testimonials',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 3,
			);

			$data['testimonials_always'] = array(
				'label'       => __( 'Always Display Testimonials', 'cpotheme' ),
				'description' => __( 'Shows the testimonials section in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_testimonials',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);
		}

		//Clients
		if ( defined( 'CPOTHEME_USE_CLIENTS' ) && CPOTHEME_USE_CLIENTS == true ) {
			$data['hide_clients'] = array(
				'label'       => __( 'Hide Clients', 'cpotheme' ),
				'description' => __( 'Hide clients section from homepage.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_clients',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
				'partials'    => '#clients',
			);

			$data['home_clients'] = array(
				'label'        => __( 'Section Title', 'cpotheme' ),
				'section'      => 'cpotheme_layout_clients',
				'empty'        => true,
				'multilingual' => true,
				'default'      => __( 'Featured clients', 'cpotheme' ),
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#clients .section-title',
			);

			$data['home_clients_subtitle'] = array(
				'label'        => __( 'Section Subtitle', 'cpotheme' ),
				'section'      => 'cpotheme_layout_clients',
				'empty'        => true,
				'multilingual' => true,
				'default'      => '',
				'sanitize'     => 'esc_html',
				'type'         => 'text',
				'partials'     => '#clients .section-subtitle',
			);

			$data['clients_columns'] = array(
				'label'   => __( 'Clients Columns', 'cpotheme' ),
				'section' => 'cpotheme_layout_clients',
				'type'    => 'select',
				'choices' => cpotheme_metadata_columns(),
				'default' => 3,
			);

			$data['clients_always'] = array(
				'label'       => __( 'Always Display Clients', 'cpotheme' ),
				'description' => __( 'Show the clients section in all pages.', 'cpotheme' ),
				'section'     => 'cpotheme_layout_clients',
				'type'        => 'checkbox',
				'sanitize'    => 'cpotheme_sanitize_bool',
				'default'     => false,
			);
		}

		//Blog Posts
		$data['home_posts'] = array(
			'label'    => __( 'Enable Posts On Homepage', 'cpotheme' ),
			'section'  => 'cpotheme_layout_home',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['blog_columns'] = array(
			'label'   => __( 'Posts Columns', 'cpotheme' ),
			'section' => 'cpotheme_layout_posts',
			'type'    => 'select',
			'choices' => cpotheme_metadata_columns(),
			'default' => 1,
		);

		$data['postpage_preview'] = array(
			'label'   => __( 'Content In Post Listings', 'cpotheme' ),
			'section' => 'cpotheme_layout_posts',
			'type'    => 'select',
			'choices' => cpotheme_metadata_post_preview(),
			'default' => 'excerpt',
		);

		$data['postpage_dates'] = array(
			'label'    => __( 'Enable Post Dates', 'cpotheme' ),
			'section'  => 'cpotheme_layout_posts',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['postpage_authors'] = array(
			'label'    => __( 'Enable Post Authors', 'cpotheme' ),
			'section'  => 'cpotheme_layout_posts',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['postpage_comments'] = array(
			'label'    => __( 'Enable Comment Count', 'cpotheme' ),
			'section'  => 'cpotheme_layout_posts',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['postpage_categories'] = array(
			'label'    => __( 'Enable Post Categories', 'cpotheme' ),
			'section'  => 'cpotheme_layout_posts',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		$data['postpage_tags'] = array(
			'label'    => __( 'Enable Post Tags', 'cpotheme' ),
			'section'  => 'cpotheme_layout_posts',
			'type'     => 'checkbox',
			'sanitize' => 'cpotheme_sanitize_bool',
			'default'  => true,
		);

		//Typography
		$data['type_size'] = array(
			'label'   => __( 'Font Size', 'cpotheme' ),
			'section' => 'cpotheme_typography',
			'type'    => 'select',
			'choices' => cpotheme_metadata_font_sizes(),
			'default' => '0.875',
		);

		$data['type_headings'] = array(
			'label'   => __( 'Headings & Titles', 'cpotheme' ),
			'section' => 'cpotheme_typography',
			'type'    => 'select',
			'choices' => cpotheme_metadata_fonts(),
			'default' => '',
		);

		$data['type_nav'] = array(
			'label'   => __( 'Main Navigation Menu', 'cpotheme' ),
			'section' => 'cpotheme_typography',
			'type'    => 'select',
			'choices' => cpotheme_metadata_fonts(),
			'default' => '',
		);

		$data['type_body'] = array(
			'label'   => __( 'Body Text', 'cpotheme' ),
			'section' => 'cpotheme_typography',
			'type'    => 'select',
			'choices' => cpotheme_metadata_fonts(),
			'default' => '',
		);

		$data['type_body_variants'] = array(
			'label'       => __( 'Load Font Variants', 'cpotheme' ),
			'description' => __( 'Loads additional font variations for the selected body typeface, if available. This will result in better-looking bold/light text.', 'cpotheme' ),
			'section'     => 'cpotheme_typography',
			'type'        => 'checkbox',
			'sanitize'    => 'cpotheme_sanitize_bool',
			'default'     => true,
		);

		//Colors
		$data['primary_color'] = array(
			'label'       => __( 'Primary Color', 'cpotheme' ),
			'description' => __( 'Used in buttons, headings, and other prominent elements.', 'cpotheme' ),
			'section'     => 'colors',
			'type'        => 'color',
			'sanitize'    => 'sanitize_hex_color',
			'default'     => '#444444',
		);

		$data['secondary_color'] = array(
			'label'       => __( 'Secondary Color', 'cpotheme' ),
			'description' => __( 'Used in minor design elements and backgrounds.', 'cpotheme' ),
			'section'     => 'colors',
			'type'        => 'color',
			'sanitize'    => 'sanitize_hex_color',
			'default'     => '#333355',
		);

		$data['type_headings_color'] = array(
			'label'       => __( 'Headings & Titles', 'cpotheme' ),
			'description' => '',
			'section'     => 'colors',
			'type'        => 'color',
			'sanitize'    => 'sanitize_hex_color',
			'default'     => '#444444',
		);

		$data['type_widgets_color'] = array(
			'label'       => __( 'Widget Titles', 'cpotheme' ),
			'description' => '',
			'section'     => 'colors',
			'type'        => 'color',
			'sanitize'    => 'sanitize_hex_color',
			'default'     => '#444444',
		);

		$data['type_nav_color'] = array(
			'label'    => __( 'Main Menu', 'cpotheme' ),
			'section'  => 'colors',
			'type'     => 'color',
			'sanitize' => 'sanitize_hex_color',
			'default'  => '#444444',
		);

		$data['type_body_color'] = array(
			'label'    => __( 'Body Text', 'cpotheme' ),
			'section'  => 'colors',
			'type'     => 'color',
			'sanitize' => 'sanitize_hex_color',
			'default'  => '#777777',
		);

		$data['type_link_color'] = array(
			'label'    => __( 'Hyperlinks', 'cpotheme' ),
			'section'  => 'colors',
			'type'     => 'color',
			'sanitize' => 'sanitize_hex_color',
			'default'  => '#f5663e',
		);

		return apply_filters( 'cpotheme_customizer_controls', $data );
	}
}
