<?php

/*
 * Proper way to enqueue scripts and styles
*/

    function imramuha_enqueue_scripts() {

        /* integration of BOOTSTRAP CSS/JS */
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );

        wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' );
    }

    add_action ('wp_enqueue_scripts', 'imramuha_enqueue_scripts');
    add_action( 'widgets_init', 'imramuha_widgets_init');

    function imramuha_widgets_init() {
        
        /*sidebar TODO*/
        
        register_sidebar( array(
            'name' => __('Sidebar widget area','imramuha'),
            'id' => 'sidebar_primary',
        ) );
    }


    ## COSTUM NAVBAR MENU
    function wp_custom_menu() {
        register_nav_menu('wp-custom-menu',__( 'Wordpress Custom Menu' ));
      }
      add_action( 'init', 'wp_custom_menu' );

    // Register Custom Navigation Walker 
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    // create 3 custom post types
    function create_custom_post_types() {

        register_post_type(
          'recipes', array(
            'labels' => array(
                'name' => __( 'Recipes' ),
                'singular_name' => __( 'Recipe' ),
                'all_items' => __('All Recipes'),
                'add_new_item' => __('Add New Recipe'),
                'edit_item' => __('Edit Recipe'),
                'new_item' => __('Add New Recipe'),
                'view_item' => __('View Recipe'),
                'search_item' => __('Search Recipe'),
                'not_found' => __('Recipe not found'),
                'not_found_in_trash' => __('Recipe not found in the trash'),
                'parent_item_colon' => __('Parent recipe'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 
                'title', 
                'custom-fields',
            ),
            'register_meta_box_cb' => 'add_recipes_metaboxes',
          )
        );
  
        register_post_type(
            'events', array(
              'labels' => array(
                  'name' => __( 'Events' ),
                  'singular_name' => __( 'Event' ),
                  'all_items' => __('All Events'),
                  'add_new_item' => __('Add New Event'),
                  'edit_item' => __('Edit Event'),
                  'new_item' => __('Add New Event'),
                  'view_item' => __('View Event'),
                  'search_item' => __('Search Event'),
                  'not_found' => __('Event not found'),
                  'not_found_in_trash' => __('Event not found in the trash'),
                  'parent_item_colon' => __('Parent Event'),
              ),
              'public' => true,
              'has_archive' => true,
              'supports' => array( 
                'title', 
                'editor',
                'thumbnail', 
                'custom-fields', 
                'revisions',
              )
            )
        );

        register_post_type(
            'reviews', array(
              'labels' => array(
                  'name' => __( 'Reviews' ),
                  'singular_name' => __( 'Review' ),
                  'all_items' => __('All Reviews'),
                  'add_new_item' => __('Add New Review'),
                  'edit_item' => __('Edit Review'),
                  'new_item' => __('Add New Review'),
                  'view_item' => __('View Review'),
                  'search_item' => __('Search Review'),
                  'not_found' => __('Review not found'),
                  'not_found_in_trash' => __('Review not found in the trash'),
                  'parent_item_colon' => __('Parent Review'),
              ),
              'public' => true,
              'has_archive' => true,
              'supports' => array( 
                'custom-fields', 
                'revisions',
              )
            )
        ); 
  
      }
      add_action( 'init', 'create_custom_post_types' );




    // hook into the init action and call create_custom_taxonomies when it fires
    add_action( 'init', 'create_custom_taxonomies', 0 );
    
    // create a custom taxonomies name it for customer post types    
    function create_custom_taxonomies() {
    
    // Add custom taxonomy called Allergy for recipes
        $labels = array(
            'name'              => _x( 'Allergies', 'taxonomy general name', 'imosh' ),
            'singular_name'     => _x( 'Allergy', 'taxonomy singular name', 'imosh' ),
            'search_items'      => __( 'Search Allergies', 'imosh' ),
            'all_items'         => __( 'All Allergies', 'imosh' ),
            'parent_item'       => __( 'Parent Allergy', 'imosh' ),
            'parent_item_colon' => __( 'Parent Allergy:', 'imosh' ),
            'edit_item'         => __( 'Edit Allergy', 'imosh' ),
            'update_item'       => __( 'Update Allergy', 'imosh' ),
            'add_new_item'      => __( 'Add New Allergy', 'imosh' ),
            'new_item_name'     => __( 'New Allergy Name', 'imosh' ),
            'menu_name'         => __( 'Allergies', 'imosh' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'allergy' ),
        );

        register_taxonomy( 'allergy', array( 'recipes' ), $args );


        // Add custom taxonomy called Difficulty for recipes
        $labels = array(
            'name'              => _x( 'Difficulties', 'taxonomy general name', 'imosh' ),
            'singular_name'     => _x( 'Difficulty', 'taxonomy singular name', 'imosh' ),
            'search_items'      => __( 'Search Difficulties', 'imosh' ),
            'all_items'         => __( 'All Difficulties', 'imosh' ),
            'parent_item'       => __( 'Parent Difficulty', 'imosh' ),
            'parent_item_colon' => __( 'Parent Difficulty:', 'imosh' ),
            'edit_item'         => __( 'Edit Difficulty', 'imosh' ),
            'update_item'       => __( 'Update Difficulty', 'imosh' ),
            'add_new_item'      => __( 'Add New Difficulty', 'imosh' ),
            'new_item_name'     => __( 'New Difficulty Name', 'imosh' ),
            'menu_name'         => __( 'Difficulties', 'imosh' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'difficulty' ),
        );

        register_taxonomy( 'difficulty', array( 'recipes' ), $args );


        // Add custom taxonomy called Category for recipes
        $labels = array(
            'name'              => _x( 'Categories', 'taxonomy general name', 'imosh' ),
            'singular_name'     => _x( 'Category', 'taxonomy singular name', 'imosh' ),
            'search_items'      => __( 'Search Categories', 'imosh' ),
            'all_items'         => __( 'All Categories', 'imosh' ),
            'parent_item'       => __( 'Parent Category', 'imosh' ),
            'parent_item_colon' => __( 'Parent Category:', 'imosh' ),
            'edit_item'         => __( 'Edit Category', 'imosh' ),
            'update_item'       => __( 'Update Category', 'imosh' ),
            'add_new_item'      => __( 'Add New Category', 'imosh' ),
            'new_item_name'     => __( 'New Category Name', 'imosh' ),
            'menu_name'         => __( 'Categories', 'imosh' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'recipes_category' ),
        );

        register_taxonomy( 'recipes_category', array( 'recipes' ), $args );


        // Add custom taxonomy called Setting for events
        $labels = array(
            'name'              => _x( 'Settings', 'taxonomy general name', 'imosh' ),
            'singular_name'     => _x( 'Setting', 'taxonomy singular name', 'imosh' ),
            'search_items'      => __( 'Search Settings', 'imosh' ),
            'all_items'         => __( 'All Settings', 'imosh' ),
            'parent_item'       => __( 'Parent Setting', 'imosh' ),
            'parent_item_colon' => __( 'Parent Setting:', 'imosh' ),
            'edit_item'         => __( 'Edit Setting', 'imosh' ),
            'update_item'       => __( 'Update Setting', 'imosh' ),
            'add_new_item'      => __( 'Add New Setting', 'imosh' ),
            'new_item_name'     => __( 'New Setting Name', 'imosh' ),
            'menu_name'         => __( 'Settings', 'imosh' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'setting' ),
        );

        register_taxonomy( 'setting', array( 'events' ), $args );

        // Add custom taxonomy called Setting for events
        $labels = array(
            'name'              => _x( 'Provinces', 'taxonomy general name', 'imosh' ),
            'singular_name'     => _x( 'Province', 'taxonomy singular name', 'imosh' ),
            'search_items'      => __( 'Search Provinces', 'imosh' ),
            'all_items'         => __( 'All Provinces', 'imosh' ),
            'parent_item'       => __( 'Parent Province', 'imosh' ),
            'parent_item_colon' => __( 'Parent Province:', 'imosh' ),
            'edit_item'         => __( 'Edit Province', 'imosh' ),
            'update_item'       => __( 'Update Province', 'imosh' ),
            'add_new_item'      => __( 'Add New Province', 'imosh' ),
            'new_item_name'     => __( 'New Province Name', 'imosh' ),
            'menu_name'         => __( 'Provinces', 'imosh' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'province' ),
        );

        register_taxonomy( 'province', array( 'events' ), $args );

        // Add custom taxonomy called Tag for post type Events
        $labels = array(
            'name'              => _x( 'Tags', 'taxonomy general name', 'imosh' ),
            'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'imosh' ),
            'search_items'      => __( 'Search Tags', 'imosh' ),
            'all_items'         => __( 'All Tags', 'imosh' ),
            'parent_item'       => __( 'Parent Tag', 'imosh' ),
            'parent_item_colon' => __( 'Parent Tag:', 'imosh' ),
            'edit_item'         => __( 'Edit Tag', 'imosh' ),
            'update_item'       => __( 'Update Tag', 'imosh' ),
            'add_new_item'      => __( 'Add New Tag', 'imosh' ),
            'new_item_name'     => __( 'New Tag Name', 'imosh' ),
            'menu_name'         => __( 'Tags', 'imosh' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'tag' ),
        );

        register_taxonomy( 'tag', array( 'events' ), $args );

    }

    add_action('add_meta_metaboxes', 'add_recipes_metaboxes');

    // Add custom fields without plugin to our Recipes post type
    function add_recipes_metaboxes() {
        add_meta_box(
            'wp_recipes_subtitle',
            'Subtitle',
            'wp_recipes_subtitle',
            'recipes',
            'normal',
            'high'
        );
        add_meta_box(
            'wp_recipes_ingredients',
            'Ingredients',
            'wp_recipes_ingredients',
            'recipes',
            'normal',
            'high'
        );
    }

    /**
    * show our custom fields in HTML - subtitle
    */
    function wp_recipes_subtitle() {
        global $post;

        // var_dump($post);
        //Nonce field to validate form request came from current site
        wp_nonce_field( basename( __FILE__ ), 'recipes_fields' );
        // Get the subtitle data if it's already been entered
        $subtitle = get_post_meta( $post->ID, 'subtitle', true );
        // Output the field
        echo '<input type="text" name="subtitle" value="' . esc_textarea( $subtitle )  . '" class="widefat">';
    
    }

    /**
    * Show our custom fields in HTML - ingredients
    */
    function wp_recipes_ingredients() {
        global $post;

        //Nonce field to validate form request came from current site
        wp_nonce_field( basename( __FILE__ ), 'recipes_fields' );
        // Get the subtitle data if it's already been entered
        $ingredients = get_post_meta( $post->ID, 'ingredients', true );

        // Output the field
        echo '<input type="text" name="ingredients" value="' . esc_textarea( $ingredients )  . '" class="widefat">';
    }

    /**
     * Save the metabox data
     */
    function save_custom_fields_data( $post_id, $post ) {
        // Return if the user doesn't have edit permissions.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        // Verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times.
        if ( ! isset( $_POST['subtitle'] ) || ! wp_verify_nonce( $_POST['recipes_fields'], basename(__FILE__) ) ) {
            return $post_id;
        }

        // Now that we're authenticated, time to save the data.
        // This sanitizes the data from the field and saves it into an array $events_meta.
        $recipes_subtitle_meta['subtitle'] = esc_textarea( $_POST['subtitle'] );
        $recipes_ingredients_meta['ingredients'] = esc_textarea( $_POST['ingredients'] );
        // Cycle through the $events_meta array.
        // Note, in this example we just have one item, but this is helpful if you have multiple.
        foreach ( $recipes_subtitle_meta as $key => $value ) :
            // Don't store custom data twice
            if ( 'revision' === $post->post_type ) {
                return;
            }
            if ( get_post_meta( $post_id, $key, false ) ) {
                // If the custom field already has a value, update it.
                update_post_meta( $post_id, $key, $value );
            } else {
                // If the custom field doesn't have a value, add it.
                add_post_meta( $post_id, $key, $value);
            }
            if ( ! $value ) {
                // Delete the meta key if there's no value
                delete_post_meta( $post_id, $key );
            }
        endforeach;

        foreach ( $recipes_ingredients_meta as $key => $value ) :
            // Don't store custom data twice
            if ( 'revision' === $post->post_type ) {
                return;
            }
            if ( get_post_meta( $post_id, $key, false ) ) {
                // If the custom field already has a value, update it.
                update_post_meta( $post_id, $key, $value );
            } else {
                // If the custom field doesn't have a value, add it.
                add_post_meta( $post_id, $key, $value);
            }
            if ( ! $value ) {
                // Delete the meta key if there's no value
                delete_post_meta( $post_id, $key );
            }
        endforeach;
    }

    add_action( 'save_post', 'save_custom_fields_data', 1, 2 );

?>