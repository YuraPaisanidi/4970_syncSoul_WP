<?php

//------------------add css + js ----------------------
  function ewa_scripts() {
		wp_enqueue_style( 'swiper-style','https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css' );
		wp_enqueue_style( 'index-style', get_template_directory_uri() . '/assets/css/index.css' );
		wp_enqueue_style( 'viewed-style', get_template_directory_uri() . '/assets/css/viewed.css' );
		wp_enqueue_style( 'roster-style', get_template_directory_uri() . '/assets/css/roster.css' );
		wp_enqueue_style( 'about-style', get_template_directory_uri() . '/assets/css/about.css' );

    //---------------js---------------------
		wp_enqueue_script( 'gsap','https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js', array(), '3.11.1', false );
		wp_enqueue_script('gsap-scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js');
		wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true );

		if( is_page_template( 'templates/index.php' )) {
			wp_enqueue_script( 'index-script', get_template_directory_uri() . '/assets/js/index.js', array(), '', true );
		}
		// if( is_page_template( 'templates/viewed.php' )) {
		// 	// wp_enqueue_style( 'viewed-style', get_template_directory_uri() . '/assets/css/viewed.css' );
		// 	wp_enqueue_script( 'viewed-script', get_template_directory_uri() . '/assets/js/viewed.js', array(), '', true );
		// }
		if( is_page_template( 'templates/roster.php' )) {
			// wp_enqueue_script( 'roster-script', get_template_directory_uri() . '/assets/js/roster.js', array(), '', true );
		}
		if( is_page_template( 'templates/about.php' )) {
			wp_enqueue_script( 'about-script', get_template_directory_uri() . '/assets/js/about.js', array(), '', true );
		}

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'ewa_scripts' );


//------------------delet Post Type ----------------------
	function remove_menus(){
	  // remove_menu_page( 'index.php' );                  //
	  // remove_menu_page( 'edit.php' );                   //
	  // remove_menu_page( 'upload.php' );                 //
	  // remove_menu_page( 'edit.php?post_type=page' );    //
	  // remove_menu_page( 'edit-comments.php' );          //
	  // remove_menu_page( 'themes.php' );                 //
	  // remove_menu_page( 'users.php' );                  //
	  // remove_menu_page( 'tools.php' );                  //
	  // remove_menu_page( 'options-general.php' );        //
	}
	add_action( 'admin_menu', 'remove_menus' );


//------------------menu----------------------
    register_nav_menus(array(
        'menu' => 'Site Navigation'
    ));

//------------------ ACF settings---------------------
    if( function_exists('acf_add_options_page') ) {
     
        $option_page = acf_add_options_page(array(
            'page_title'    => 'Base blocks',
            'menu_title'    => 'Base blocks',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'  => false
        ));
     
    }
//------------------remove fields in comments----------------------
	add_filter('single_template', 'dh_comments_template');
	function dh_comments_template($template) {
	    global $wp_query;
	    if ( $_GET['comments'] == '1' and
	        file_exists(TEMPLATEPATH . '/single-comments.php') )
	            $template = TEMPLATEPATH . '/single-comments.php';
	    return $template;
	}

	function remove_comment_fields($fields) {
	    unset($fields['email']);
	    return $fields;
	}
	add_filter('comment_form_default_fields','remove_comment_fields');


/**
 * disable update
 */

 add_filter('site_transient_update_plugins', 'filter_plugin_updates');
 function filter_plugin_updates($value)
 {
		 unset($value->response['advanced-custom-fields-pro-master/acf.php']);
		 return $value;
 }


 //----------------------Register post type ROSTER------------

 function roster_post_type() {

	$labels = array(
			'name'                  => _x( 'Roster', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Roster', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Roster', 'text_domain' ),
			'all_items'             => __( 'Roster', 'text_domain' ),
			'add_new_item'          => __( 'Add items', 'text_domain' ),
			'add_new'               => __( 'Add item', 'text_domain' ),
	);
	$args = array(
			'label'                 => __( 'Roster', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'excerpt'),// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 4,
			'menu_icon'             => 'dashicons-images-alt2',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
	);
	register_post_type( 'roster', $args );

}
add_action( 'init', 'roster_post_type', 0 );

register_taxonomy("roster-cat", array("roster"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "activity item", "rewrite" => true));


