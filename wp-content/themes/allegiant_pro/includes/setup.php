<?php

//set settings defaults
add_filter( 'cpotheme_customizer_controls', 'cpotheme_customizer_controls' );
function cpotheme_customizer_controls( $data ) {
	//Layout
	$data['home_order']['default']        = 'slider,features,tagline,portfolio,services,products,testimonials,clients,team,content';
	$data['slider_height']['default']     = 650;
	$data['features_columns']['default']  = 3;
	$data['portfolio_columns']['default'] = 3;
	$data['services_columns']['default']  = 2;
	$data['team_columns']['default']      = 4;
	$data['clients_columns']['default']   = 5;
	$data['home_clients']['default']      = '';
	//Typography
	$data['type_headings']['default'] = 'Source+Sans+Pro';
	$data['type_nav']['default']      = 'Source+Sans+Pro';
	$data['type_body']['default']     = 'Source+Sans+Pro';
	//Colors
	$data['primary_color']['default']       = '#89ce40';
	$data['secondary_color']['default']     = '#444449';
	$data['type_headings_color']['default'] = '#556677';
	$data['type_widgets_color']['default']  = '#556677';
	$data['type_nav_color']['default']      = '#9999aa';
	$data['type_body_color']['default']     = '#9999aa';
	$data['type_link_color']['default']     = '#2a88bf';

	return $data;
}


add_filter( 'cpotheme_background_args', 'cpotheme_background_args' );
function cpotheme_background_args( $data ) {
	$data = array(
		'default-color'      => 'eeeeee',
		'default-image'      => get_template_directory_uri() . '/images/background.jpg',
		'default-repeat'     => 'no-repeat',
		'default-position-x' => 'center',
		'default-attachment' => 'fixed',
		'default-size'       => 'cover',
	);

	return $data;
}


add_action( 'wp_head', 'cpotheme_styling_custom', 20 );
function cpotheme_styling_custom() {
	$primary_color = cpotheme_get_option( 'primary_color' ); ?>
	<style type="text/css">
		<?php if ( $primary_color != '' ) : ?>
		html body .button,
		html body .button:link,
		html body .button:visited,
		html body input[type=submit] { background: none; border-color: <?php echo $primary_color; ?>; color: <?php echo $primary_color; ?>; }

		html body .button:hover,
		html body input[type=submit]:hover { color: #fff; background: <?php echo $primary_color; ?>; }

		.menu-main .current_page_ancestor > a,
		.menu-main .current-menu-item > a { color: <?php echo $primary_color; ?>; }

		.menu-portfolio .current-cat a,
		.pagination .current { background-color: <?php echo $primary_color; ?>; }

		.features a.feature-image { color: <?php echo $primary_color; ?>; }

		<?php endif; ?>
	</style>
	<?php
}


add_filter( 'cpotheme_portfolio_section_args', 'cpotheme_portfolio_section_args' );
function cpotheme_portfolio_section_args( $data ) {
	return array( 'spacing' => 'fit' );
}


add_filter( 'cpotheme_team_section_args', 'cpotheme_team_section_args' );
function cpotheme_team_section_args( $data ) {
	return array( 'spacing' => 'narrow' );
}


add_filter( 'cpotheme_clients_section_args', 'cpotheme_clients_section_args' );
function cpotheme_clients_section_args( $data ) {
	return array( 'spacing' => 'narrow' );
}


add_filter( 'cpotheme_services_section_args', 'cpotheme_services_section_args' );
function cpotheme_services_section_args( $data ) {
	return array( 'class' => 'secondary-color-bg dark' );
}
