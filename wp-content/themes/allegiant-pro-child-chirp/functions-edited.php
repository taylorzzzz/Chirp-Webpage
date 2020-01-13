<?php
/* 
************************* ENQUEUE STYLES */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 99);  
// The 99 ensures that this callback is called after the callback in the parent theme, thus these styles should overwrite base styles
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; 
    $base_style = 'base-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri('cpotheme-base') . '/style.css' );
    wp_dequeue_style( 'cpotheme-main' );  // This ends up being the child theme's css file and so is a duplicate.
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/******************* end ENQUEUE STYLES */



add_action('wp_head', 'add_phone_number', 1);   // The other topbar content is added during wp_head. We want add_phone_number to be the first callback for this hook so we add priority of 1.

function add_phone_number() {
    add_action( 'cpotheme_top', 'add_phone' );
}

function add_phone() {
    echo '<div id="topbar-phone">
            <span>(888) 412-4477</span>
		</div>';				
}

add_action('wp_head', 'add_searchbar');

function add_searchbar() {
    add_action('cpotheme_top', 'add_search');
}

function add_search() {
    echo '<div id="topbar-search">
            <div class="widget widget_search">
                <form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" value="" name="s" id="s" />
                        <input type="submit" id="topbar-search-submit" value="">
                    </div>
                </form>
            </div>
		</div>';				
}

// Prevents products with hidden visibility from appearing in the wordpress search results.

/* !!! REMOVE THE NOTED LINE BELOW WHICH PREVENTS PRODUCTS (AND PAGES) FROM SHOWING UP IN RESULTS */
function wpb_search_filter($query) {
    if (!is_admin() && $query->is_search) {

        $tax_query = $query->get( 'tax_query' );

        if ( ! is_array( $tax_query ) ) {
            $tax_query = array();
        }

        $taxquery[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'exclude-from-search',
            'operator' => 'NOT IN',
        );

        $query->set( 'tax_query', $taxquery );    

    }
    return $query;
}
add_filter('pre_get_posts','wpb_search_filter');



// Ensures that the woocommerce product search form and not the general wp search form
// appears at the top of the product search results page
add_action( 'cpotheme_before_content', 'cpotheme_search_form' );
function cpotheme_search_form() {
    if ( is_search() ) {
        $search_query = '';
        if ( isset( $_GET['s'] ) ) {
            $search_query = esc_attr( $_GET['s'] );
        }
        /* Start Changes */
        if (isset ( $_GET['post_type'] ) ) {
            get_product_search_form();
        } else {
            echo '<div class="search-form">';
            echo '<form role="search" method="get" id="search-form" class="search-form" action="' . home_url( '/' ) . '">';
            echo '<input type="text" value="' . $search_query . '" name="s" id="s" />';
            echo '<input type="submit" id="search-submit" value="' . __( 'Search', 'cpotheme' ) . '" />';
            echo '</form>';
            echo '</div>';
        }
        /* End Changes */
        

        if ( ! have_posts() ) {
            echo '<p class="search-submit">' . __( 'No results were found. Please try searching with different terms.', 'cpotheme' ) . '</p>';
        }
    }
}



// Excludes the default Miscellaneous category from the Product Categories Widget
function exclude_product_widget_categories($args){
    
    $exclude = "15";
    $args["exclude"] = array($exclude);
    return $args;

}
add_filter("woocommerce_product_categories_widget_args","exclude_product_widget_categories", 10, 1);


// Removes theme's unwanted action which adds breadcrumbs to the title section
add_action('wp_head', 'remove_breadcrumbs_from_title');
function remove_breadcrumbs_from_title() {
    remove_action( 'cpotheme_title', 'cpotheme_breadcrumb');
}

// Inserts the breadcrumbs. Priority of 9 ensures that breadcrumbs appear above search bar, if present. 
add_action( 'cpotheme_before_content', 'woocommerce_breadcrumb', 9);

// This removes the filter added in woocommerce.php removing unwanted effects to appearance/markup of breadcrumbs
add_action('init', 'remove_breadcrumb_filter');
function remove_breadcrumb_filter() {
    remove_filter( 'woocommerce_breadcrumb_defaults', 'cpotheme_woocommerce_breadcrumbs' );
}


// Causes all products regardless of category to appear on the 'all' category page.
/*
function _additional_woo_query( $query ) {
    if ( ( is_product_category('all') && $query->is_main_query() ) ) {
        $query->set('product_cat', '');
        // We also need to set visibility to search & catalog
    }
}
add_action( 'pre_get_posts', '_additional_woo_query' );
*/



// Remove product category counts
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
    return;
}



// Removes the Add to Cart button for Hidden products
add_filter('woocommerce_is_purchasable', 'check_if_purchasable', 10, 2);

function check_if_purchasable($purchasable , $product) {

    // First we find if the product is visible
    $is_visible = $product->get_catalog_visibility() == 'visible';
    
    if($is_visible)
        return true;
    else
        return false;
    
}


function cpotheme_page_title() {
    global $post;
    if ( isset( $post->ID ) ) {
        $current_id = $post->ID;
    } else {
        $current_id = false;
    }
    $title_tag = function_exists( 'is_woocommerce' ) && is_woocommerce() && is_singular( 'product' ) ? 'span' : 'h1';

    echo '<' . $title_tag . ' class="pagetitle-title heading">';
    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
        woocommerce_page_title();
    } elseif ( is_category() || is_tag() || is_tax() ) {
        echo single_tag_title( '', true );
    } elseif ( is_author() ) {
        the_author();
    } elseif ( is_date() ) {
        _e( 'Archive', 'cpotheme' );
    } elseif ( is_404() ) {
        echo __( 'Page Not Found', 'cpotheme' );
    } elseif ( is_search() ) {
        echo __( 'Search Results for', 'cpotheme' ) . ' "' . get_search_query() . '"';
    } elseif ( is_home() ) {
        echo get_the_title( get_option( 'page_for_posts' ) );
    } elseif ( is_post_type_archive( 'chirp_birdcam_stream' ) ) {
        echo 'Chirp Live Bird Feeder Cams';
    } else {
        echo get_the_title( $current_id );
    }
    echo '</' . $title_tag . '>';
}

//This function hardcodes two buttons on the homepage tagline
//Removing this function will allow you to create 1 button/link in the tagline from within customizer
if ( ! function_exists( 'cpotheme_tagline_link' ) ) {
    function cpotheme_tagline_link( $class = '' ) {
        $url  = cpotheme_get_option( 'home_tagline_url' );
        $link = cpotheme_get_option( 'home_tagline_link' );

        $urlOnline = 'https://www.chirpforbirds.com/shop';
        $labelOnline = 'Order Online Now';

        $urlRetail = 'https://www.chirpforbirds.com/about-us/#contact';
        $labelRetail = 'Visit Our Retail Store';

            echo '<a class="tagline-link ' . $class . '" href="' . esc_url( $urlOnline ) . '">';
            echo $labelOnline;
            echo '</a>';

            echo '<span class="or-divider">Or</span>';

            echo '<a class="tagline-link ' . $class . '" href="' . esc_url( $urlRetail ) . '">';
            echo $labelRetail;
            echo '</a>';
    }
}

// Adds a View-product Link to product landing pages
add_action( 'woocommerce_shop_loop_item_title', 'view_info_link', 15 );
function view_info_link( $args = array() ) {
    echo '<span class="view-product">More Info</span>';
}

// Adds a brand field to the product's structured data (produced by Woo). Uses the "Brand" attribute
// which each product should have
add_filter( 'woocommerce_structured_data_product', function( $markup, $product ) {
    $brand = $product->get_attribute( 'pa_brand' );
    
    $markup["brand"] = $brand ? $brand : "";  // Set blank brand if no brand assigned.
    $markup["upc"] = "123456789";
    return $markup;
}, 10, 2 );





// Currently the Schema plugin is generating incorrect/empty json-ld for woo product category pages.
// This function disables the Schema output for taxonomy pages specifically in woo i.e product categories.
add_filter( 'schema_wp_output_taxonomy_enabled', 'disable_schema_for_woo_categories' );
function disable_schema_for_woo_categories() {
    if ( is_woocommerce() ) {
        return false;
    }
    return true;    
}

/* 
************************* SETUP BIRDCAM STREAM CUSTOM POST TYPE  */
// Sets up Birdcam Stream custom post type
function create_birdcam_stream_post() {
    $labels = array(
        'name'               => __( 'Streams' ),
        'singular_name'      => __( 'Stream' ),
        'edit_item'          => __( 'Edit Birdcam Stream' ),
        'add_new_item'       => __( 'Add Birdcam Stream' ),
        'new_stream'         => __( 'New Stream')
    );

    $fields = array(
        'labels'            => $labels,
        'public'            => true,
        'supports'          => array( 'title' ),
        'has_archive'       => true,
        'rewrite' => array( 'slug' => 'streams' ),
    );
    
    register_post_type( 'chirp_birdcam_stream', $fields );
    //flush_rewrite_rules();
}  
add_action( 'init', 'create_birdcam_stream_post' );


// Sets up Stream ID Post Meta Box used in the Birdcam Stream Posts
add_action( 'add_meta_boxes', 'add_stream_id_box' );
function add_stream_id_box() {
    add_meta_box( 
        'stream_id_box',
        __( 'Stream Information' ),
        'stream_id_box_content',
        'chirp_birdcam_stream',
        'normal',
        'default'
    );
}

// This function outputs the content of our stream id post meta box.
function stream_id_box_content( $post ) {    
    $id = get_post_meta($post->ID, 'stream_id', true);
    $location = get_post_meta($post->ID, 'stream_location', true);
    
    $container_style = "margin-bottom: 10px;";
    $label_style = "display: block; margin-right: 10px; font-weight: 900;";
    $input_style = "width: 100%;";

    wp_nonce_field( basename( __FILE__ ), 'stream_id_box_content_nonce' );

    echo '<div class="stream-info-metabox-content">';
    // Id input
    echo '<div class="stream-info-input-container" style="' . $container_style . '">';
    echo '<label id="stream_id-label" for="stream_id" style="' . $label_style . '">YouTube Stream ID:</label>';
    echo '<input type="text" id="stream_id-input" name="stream_id" value="' . $id . '" placeholder="Enter a Stream ID" style="' . $input_style . '"/>';
    echo '</div>';
    // Location input
    echo '<div class="stream-info-input-container" style="' . $container_style . '">';
    echo '<label id="stream_location-label" for="stream_location" style="' . $label_style . '">YouTube Stream Location:</label>';
    echo '<input type="text" id="stream_location-input" name="stream_location" value="' . $location . '" placeholder="Enter a Stream Location" style="' . $input_style . '"/>';
    echo '</div>';
    

}

// This function specifies that we when a stream id post is saved, we should 
// save the input entered into the stream id post meta box.
add_action( 'save_post', 'stream_id_box_save', 10, 2 );
function stream_id_box_save( $post_id, $post ) {

    if ( !isset( $_POST['stream_id_box_content_nonce'] ) || !wp_verify_nonce( $_POST['stream_id_box_content_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    $post_type = get_post_type_object( $post->post_type );

    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    //$new_meta_value = ( isset( $_POST['stream_id'] ) ? sanitize_html_class( $_POST['stream_id'] ) : '' );
    $new_stream_id = ( isset( $_POST['stream_id'] ) ? $_POST['stream_id'] : '' );
    $new_stream_location = ( isset( $_POST['stream_location'] ) ? $_POST['stream_location'] : '' );

    /* Get the meta key. */
    $id_meta_key = 'stream_id';
    $location_meta_key = 'stream_location';

    /* Get the meta value of the custom field key. */
    $id_meta_value = get_post_meta( $post_id, $id_meta_key, true );
    $location_meta_value = get_post_meta( $post_id, $location_meta_key, true );

    // Update ID metadata
    if ( $new_stream_id && '' == $id_meta_value ) {
        add_post_meta( $post_id, $id_meta_key, $new_stream_id, true );
    }
    elseif ( $new_stream_id && $new_stream_id != $id_meta_value ) {
        update_post_meta( $post_id, $id_meta_key, $new_stream_id );
    }
    elseif ( '' == $new_stream_id && $id_meta_value ) {
        delete_post_meta( $post_id, $id_meta_key, $id_meta_value );
    }

    // Update Location metadata
    if ( $new_stream_location && '' == $location_meta_value ) {
        add_post_meta( $post_id, $location_meta_key, $new_stream_location, true );
    }
    elseif ( $new_stream_location && $new_stream_location != $location_meta_value ) {
        update_post_meta( $post_id, $location_meta_key, $new_stream_location );
    }
    elseif ( '' == $new_stream_location && $location_meta_value ) {
        delete_post_meta( $post_id, $location_meta_key, $location_meta_value );
    }

}









/* 
************************* Allow dates to be set for event posts by adding datepicker */
function enqueue_date_picker(){
    wp_enqueue_script(
        'field-date', 
        get_stylesheet_directory_uri() . '/admin/field-date.js', 
        array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
        time(),
        true
    );  

    wp_enqueue_style( 'jquery-ui-datepicker' );

    $wp_scripts = wp_scripts();
    wp_enqueue_style('plugin_name-admin-ui-css',
                'http://ajax.googleapis.com/ajax/libs/jqueryui/' . $wp_scripts->registered['jquery-ui-core']->ver . '/themes/smoothness/jquery-ui.css',
                false,
                false,
                false);

}
add_action('admin_enqueue_scripts', 'enqueue_date_picker');







/* 
************************* SETUP EVENT CUSTOM POST TYPE */
// Sets up Event custom post type
function create_event_post() {
    $labels = array(
        'name'               => __( 'Events' ),
        'singular_name'      => __( 'Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'add_new_item'       => __( 'Add Event' ),
        'new_item'         => __( 'New Event')
    );

    $events_slug = "events-in-big-bear-lake";
    $fields = array(
        'labels'            => $labels,
        'public'            => true,
        'has_archive'       => true,
        'rewrite'           => array ('slug' => $events_slug, 'with_front' => false),
        'supports'          => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments'),
        //'taxonomies'        => array( 'category' )
    );
    
    register_post_type( 'event', $fields );
}  
add_action( 'init', 'create_event_post' );

// Ensure that event posts use their "Things to Do" category in their permalink just like all other posts
function wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'category' );
        if( $terms ){
            return str_replace( '%category%' , $terms[0]->slug . '/event', $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );


// Sets up post meta box used in the Event Posts
add_action( 'add_meta_boxes', 'add_event_info_box' );
function add_event_info_box() {
    add_meta_box( 
        'event_info_box',
        __( 'Event Information' ),
        'event_info_box_content',
        'event'
    );
}

// This function outputs the content of our post meta box. This box contains inputs for 
// location and date .
function event_info_box_content( $post ) {    
    $event_location = get_post_meta($post->ID, 'event_location', true);
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_time = get_post_meta($post->ID, 'event_time', true);
    
    $container_style = "margin-bottom: 10px;";
    $label_style = "display: block; margin-right: 10px; font-weight: 900;";
    $input_style = "width: 100%;";

    wp_nonce_field( basename( __FILE__ ), 'event_info_box_content_nonce' );

    echo '<div class="event-info-metabox-content">';

    // Location input
    echo '<div class="event-info-input-container" style="' . $container_style . '">';
    echo '<label id="event-location-label" for="event-location" style="' . $label_style . '">Event Location:</label>';
    echo '<input type="text" id="event-location-input" name="event-location" value="' . $event_location . '" placeholder="Enter a Location" style="' . $input_style . '"/>';
    echo '</div>';

    // Date input
    $event_date = date('F j, Y', strtotime($event_date));
    echo '<div class="event-info-input-container" id="event-date-container" style="' . $container_style . '">';
    echo '<label id="event-date-label" for="event-date" style="' . $label_style . '">Event Date:</label>';
    echo '<input type="text" class="datepicker" id="event-date-input" name="event-date" value="' . $event_date . '" placeholder="Enter a Date" style="' . $input_style . '"/>';
    echo '</div>';

    // Time input
    //$event_time = $event_date_time ? $event_date_time->format('H:i') : '';
    echo '<div class="event-info-input-container" id="event-time-container" style="' . $container_style . '">';
    echo '<label id="event-time-label" for="event-time" style="' . $label_style . '">Event Time:</label>';
    echo '<input type="time" id="event-time-input" name="event-time" value="' . $event_time . '" placeholder="Enter a Time" style="' . $input_style . '"/>';
    echo '</div>';

    echo '</div>';
}

// This function specifies what happens when an event post is saved
add_action( 'save_post', 'event_info_box_save', 10, 2 );
function event_info_box_save( $post_id, $post ) {
    // Check that the nonce was properly set to ensuer no funny business
    if ( !isset( $_POST['event_info_box_content_nonce'] ) || !wp_verify_nonce( $_POST['event_info_box_content_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    
    // Make sure this is an event post we are handling
    $post_type = get_post_type($post_id);
    if ( "event" != $post_type ) return;

    // Ensure user editing has editing privelages
    $post_type_obj = get_post_type_object( $post->post_type );
    if ( !current_user_can( $post_type_obj->cap->edit_post, $post_id ) ) {
        return $post_id;
    }

    // get data posted in event location input
    $new_event_location = ( isset( $_POST['event-location'] ) ? $_POST['event-location'] : '' );
    $new_event_date = ( isset( $_POST['event-date'] ) ? $_POST['event-date'] : '' );
    $new_event_time = ( isset( $_POST['event-time'] ) ? $_POST['event-time'] : '' );

    /* Get the meta key. */
    $location_meta_key = 'event_location';
    $date_meta_key = 'event_date';
    $time_meta_key = 'event_time';


    /* Get the existing meta values */
    $location_meta_value = get_post_meta( $post_id, $location_meta_key, true );
    $date_meta_value = get_post_meta( $post_id, $date_meta_key, true );
    $time_meta_value = get_post_meta( $post_id, $time_meta_key, true );

    /* Update Location metadata */
    // No location set yet
    if ( $new_event_location && '' == $location_meta_value ) {    
        add_post_meta( $post_id, $location_meta_key, $new_event_location, true );
    }
    // New event location entered differs from existing
    elseif ( $new_event_location && $new_event_location != $location_meta_value ) { 
        update_post_meta( $post_id, $location_meta_key, $new_event_location );
    }
    // New event location is empty and there is existing location
    elseif ( '' == $new_event_location && $location_meta_value ) { 
        delete_post_meta( $post_id, $location_meta_key, $location_meta_value );
    }


    // // Set DateTime object based on date and time input
    // $new_event_date_time = '';
    // // Both date and time were entered
    // if ($new_event_date && $new_event_time) {
    //     $new_event_date_time = DateTime::createFromFormat('F j, Y, H:i', $new_event_date . ', ' . $new_event_time);
    // // Only date was entered, no time
    // } else if ($new_event_date) {
    //     $new_event_date_time = DateTime::createFromFormat('F j, Y, H:i', $new_event_date . ', ' . '00:00');
    // }
    
    // Set Time to noon if day was set but no time was set.
    if ($new_event_date && !$new_event_time) {
        $new_event_time = "00:00";
    }
    
    // Update Date metadata
    // New date entered and no existing date
    if ( $new_event_date && '' == $date_meta_value ) {
        update_post_meta( $post_id, $date_meta_key, date("Y-m-d", strtotime($new_event_date)) );
    }
    // New date entered differs from existing date
    elseif ( $new_event_date && $new_event_date != $date_meta_value ) {
        update_post_meta( $post_id, $date_meta_key, date("Y-m-d", strtotime($new_event_date)) );
    }
    // Removing existing date
    elseif ( '' == $new_event_date && $date_meta_value ) {
        delete_post_meta( $post_id, $date_meta_key, $date_meta_value );
    }

    // Update Time metadata
    // New date entered and no existing date
    if ( $new_event_time && '' == $time_meta_value ) {
        update_post_meta( $post_id, $time_meta_key, $new_event_time );
    }
    // New date entered differs from existing date
    elseif ( $new_event_time && $new_event_time != $time_meta_value ) {
        update_post_meta( $post_id, $time_meta_key, $new_event_time );
    }
    // Removing existing date
    elseif ( '' == $new_event_time && $time_meta_value ) {
        delete_post_meta( $post_id, $time_meta_key, $time_meta_value );
    }
    


    /* Set the category of all event posts to Things to Do */
    $things_to_do_id = 184;     // Live Site
    //$things_to_do_id = 99;      // Local Site (comment out when uploading to live)
    wp_set_object_terms( $post_id, $things_to_do_id, 'category' );
    

}

// Hook into post_class filter so that we can add the "post" class to event posts. This way they recieve the same styling
add_filter('post_class', 'set_event_post_class', 10,3);
function set_event_post_class($classes, $class, $post_id){

    $post_type = get_post_type( $post_id );

    if ($post_type == 'event') {
        $classes[] = 'post';
    }

    return $classes;
}





/* 
************************* Squirrel Proof Central stuff */

// This function replaces the cpo_postpage_content function (markup.php).  
// It is called from the spc template file (squirrel_proof-single-post.php) in order to
// display the post previews (excerpt). The original cpo_postpage_content function doesn't 
// allow us to use a singular post as a landing page for other posts. 
function childtheme_spc_postpage_content() {
    $preview = cpotheme_get_option( 'postpage_preview' );

    if ( $preview === true || $preview == 'full' || is_singular() ) {
        do_action( 'cpotheme_before_post_content' );
        the_excerpt();
        cpotheme_post_pagination();
        do_action( 'cpotheme_after_post_content' );
    } elseif ( $preview != 'none' ) {
        the_excerpt();
    }

}
// Same with the above this one removes the !is_singular() condition in the original cpotheme_postpage_title
function childtheme_spc_postpage_title() {
    echo '<h2 class="post-title">';
    echo '<a href="' . get_permalink( get_the_ID() ) . '" title="' . sprintf( esc_attr__( 'Go to %s', 'cpotheme' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">';
    the_title();
    echo '</a>';
    echo '</h2>';
}

function childtheme_spc_postpage_readmore( $classes = '' ) {
    echo '<a class="post-readmore ' . esc_attr( $classes ) . '" href="' . get_permalink( get_the_ID() ) . '">';
    echo apply_filters( 'cpotheme_readmore', __( 'Read More', 'cpotheme' ) );
    echo '</a>';
}



/* 
************************* SETUP EVENT CUSTOM POST TYPE */
add_action( 'template_redirect', 'maybe_redirect_404_old_permalink' );
/**
 * Attempts to forward old permalinks to the new permalink structure
 */
function maybe_redirect_404_old_permalink() {
    // Only run this function if we are on a 404
    if( ! is_404() ) {
        return;
    }

    // "trick" to get the full URL
    $url = add_query_arg( '', '' );

    /*
     * Pull the URL path apart to find a slug (post_name)
     * The final segment should be the slug
     */
    $parts = explode( '/', $url );
    $parts = array_filter( $parts );

    // check if last array element (potential slug) is a query and remove if it is
    if( end($parts)[0] == '?') {
        if (count($parts) > 1) {
            array_pop($parts);
        }
    }

    $size = count( $parts );
    $maybe_slug = $parts[ $size ]; // We use size here because the filter turned 1 based

    // Attempt to locate corresponding post in the database
    $args = array(
        'name'        => $maybe_slug,
        'post_type'   => 'post',
        'post_status' => 'publish',
        'numberposts' => 1,
    );

    $posts = get_posts( $args );

    // Identify a found post
    if( $posts && ! empty( $posts[0]->ID ) ) {
        $post_id = $posts[0]->ID;

        $post_url = get_permalink( $post_id );

        // Attempt to forward to the new post permalink
        if( $post_url ) {
            wp_safe_redirect( $post_url, 301 ); // Permanent redirect
        }
    }

    /*
     * If we made it down here then we could not find a matching post in
     * the database. No biggie, simply do nothing and display the 404 page
     * as normal 
     */
}








/* 
************************* UPCOMING EVENTS WIDGET */
add_action( 'widgets_init', function(){
	register_widget( 'upcoming_events_widget' );
});

class upcoming_events_widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname'     => 'upcoming_events_class',
            'description'   => 'Displays Event Posts for upcoming events'
        );
        parent::__construct( 'upcoming_events_widget', 'Events Widget', $widget_ops);
    }

    public function form( $instance ) {
        $title = !empty( $instance['title'] ) 
            ? $instance['title'] 
            : esc_html__( 'Upcoming Events', 'text_domain' );
    ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'text_domain' ); ?>
            </label> 
        
        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
        </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title']);

        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title']);

        if ( !empty( $title )) {
            echo $before_title . esc_html( $title ) . $after_title;
        }

        // Get recent events 
        $today = date("Y-m-d");

        $args = array (
            'post_type' => 'event',
            'orderby'   => 'meta_value',
            'meta_key' => 'event_date',
            'order' => 'ASC',
            'post__not_in' => array( 3854 ),
            'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                array(
                    'key' => 'event_date', // Check the start date field
                    'value' => $today, // Set today's date (note the similar format)
                    'compare' => '>=', // Return the ones greater than today's date
                    'type'  => 'DATE'
                )
            )
     
        );
        $query = new WP_Query( $args ); 

        if ( $query->posts ) :
            foreach ( $query->posts as $post ) {
                $date_meta_value = get_post_meta( $post->ID, 'event_date', true );
                echo "<a href='" . get_permalink($post) . "'>";
                echo get_the_post_thumbnail( $post );
                echo "</a>";
                echo get_the_title( $post );
                echo '<br>-----------------<br>';
            }
            wp_reset_postdata();
        endif;

        echo $after_widget;

    }
}
?>