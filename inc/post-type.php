<?php

// Custom post for tab and toggles shortcodes.
function wpv_shortcodes_tabs_toggle_cpt() {
    $args = array(
      'labels'                =>  array(
      'name'                  =>  __( 'Vicodes', WPV_DOMAIN ),
      'singular_name'         =>  __( 'Vicodes', WPV_DOMAIN ),
      'all_items'             =>  __( 'All Whistles', WPV_DOMAIN ),
      'add_new'               =>  __( 'Add New Whistle', WPV_DOMAIN ),
      'add_new_item'          =>  __( 'Add New Whistle (Tabs, Toggles & Accordion)', WPV_DOMAIN ),
      'edit'                  =>  __( 'Edit', WPV_DOMAIN ),
      'edit_item'             =>  __( 'Edit Whistles', WPV_DOMAIN ),
      'new_item'              =>  __( 'New Whistles', WPV_DOMAIN ),
      'view_item'             =>  __( 'View Whistles', WPV_DOMAIN ),
      'search_items'          =>  __( 'Search WPV Tabs', WPV_DOMAIN ),
      'not_found'             =>  __( 'Nothing found in the Database.', WPV_DOMAIN ),
      'not_found_in_trash'    =>  __( 'Nothing found in Trash', WPV_DOMAIN ),
      'parent_item_colon'     =>  ''
      ),

      'description'           =>  '',
      'public'                =>  false,
      'publicly_queryable'    =>  false,
      'show_in_nav_menus'     =>  false,
      'show_in_admin_bar'     =>  true,
      'exclude_from_search'   =>  true,
      'show_ui'               =>  true,
      'show_in_menu'          =>  true,
      'can_export'            =>  true,
      'query_var'             =>  'wpv_sc',
      'menu_position'         =>  105,
      'menu_icon'             =>  WPVSC_URL . '/assets/img/add-vicodes-gray.png',
      'rewrite'               =>  false,
      'has_archive'           =>  false,
      'capability_type'       =>  'post',
      'hierarchical'          =>  false,
      'supports'              =>  array( 'title', 'editor', 'revisions' )
    );

    register_post_type( 'wpv_sc' , $args );
  }

  add_action( 'init', 'wpv_shortcodes_tabs_toggle_cpt' );

  // Taxonomy for Custom Post Type
  function wpv_shortcodes_tabs_toggle_taxonomy() {
    register_taxonomy(
      'wpss_tabs_taxonomy',
      'wpv_sc',
      array(
        'labels'              =>  array(
        'name'                =>  'Whistles Groups',
        'add_new_item'        =>  'Add New Group',
        'new_item_name'       =>  "New Group"
      ),
        'show_ui'             =>  true,
        'show_tagcloud'       =>  false,
        'hierarchical'        =>  true,
        'show_admin_column'   =>  true,
      )
    );
  }
  add_action( 'init', 'wpv_shortcodes_tabs_toggle_taxonomy', 0 );
