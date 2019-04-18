
<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $base_style = 'base-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri('cpotheme-base') . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 99);  // The 99 ensures that this callback is called after the callback in the parent theme

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
    $is_visible = $product->catalog_visibility == 'visible';
    
    if($is_visible)
        return true;
    else
        return false;
    
}







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

?>