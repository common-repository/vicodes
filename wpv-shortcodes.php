<?php
  /*
    Plugin Name: Vicodes - Essential Shortcodes
    Plugin URI: https://wordpress.org/plugins/vicodes/
    Description: Vicodes provides an essential set of easy to use shortcodes like buttons, alert boxes, tabs and toggles to make your life easier.
    Version: 1.1
    Author: wpvita
    Author URI: http://www.wpvita.com/
    License: GPL2
  */

  defined( 'ABSPATH' ) or die("No script kiddies please!");
  define( 'WPVSC_VERSION',   '1.1' );
  define( 'WPVSC_URL', plugins_url( '', __FILE__ ) );
  define( 'WPV_DOMAIN',  'wpvita' );
  define( 'WPV_PLUGIN_PAGE_NAME',  'wpv_shortcodes' );
  define( 'WPV_PLUGIN_NAME',  'Vicodes' );

  require_once( 'inc/shortcodes.php' );
  if ( class_exists( 'WPBakeryShortCode' ) ) {
    require_once( 'inc/shortcodes-vc.php' );
  }
  require_once( 'inc/post-type.php' );
  require_once( 'inc/wpv-start.php' );

  // Initialize Shortcode Plugin
  add_action( 'init', 'wpv_shortcodes' );
  function wpv_shortcodes() {
    load_plugin_textdomain( WPV_DOMAIN );
  }

  add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpv_shortcode_links' );

  function wpv_shortcode_links( $links ) {
    $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=wpv_sc&page=wpv_shortcodes') ) .'">Getting Started</a>';
    return $links;
  }

  // Enqueue Script and Style for front end
  add_action( 'wp_enqueue_scripts', 'wpv_shortcodes_scripts', 99 );
  function wpv_shortcodes_scripts() {
    wp_register_style( 'wpv-shortcodes-css', WPVSC_URL . '/assets/css/wpv-shortcodes.css', array(), WPVSC_VERSION );
    wp_enqueue_style( 'wpv-shortcodes-css' );

    wp_register_script( 'wpv-shortcodes-js', plugins_url( '/assets/js/wpv-shortcodes.js', __FILE__), array( 'jquery' ), WPVSC_VERSION, true);
    wp_enqueue_script( 'wpv-shortcodes-js' );
  }

  // Enqueue Script and Style for admin panel
  add_action( 'admin_enqueue_scripts', 'wpv_shortcodes_scripts_admin' );
  function wpv_shortcodes_scripts_admin( $hook ) {
    global $post;

    // Enqueue script and style on New and Edit Post / Pages.
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
      wp_register_style( 'wpv-shortcodes-admin-css', WPVSC_URL . '/assets/css/wpv-shortcodes-admin.css', array(), WPVSC_VERSION );
      wp_enqueue_style( 'wpv-shortcodes-admin-css' );

      wp_register_script( 'wpv-shortcodes-ed-js', plugins_url( '/assets/js/ed-list.js', __FILE__), array( 'jquery' ), WPVSC_VERSION, true);
      wp_enqueue_script( 'wpv-shortcodes-ed-js' );
    }
  }

  // Shortcode MCE Button for Visual Editor
  add_action( 'admin_head', 'tmrd_add_mce_button' );
  function tmrd_add_mce_button() {
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
      return;
    }
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
      add_filter( 'mce_external_plugins', 'tmrd_add_tinymce_plugin' );
      add_filter( 'mce_buttons', 'tmrd_register_mce_button' );
    }
  }

  // Registered MCE Button for visual editor
  function tmrd_register_mce_button( $buttons ) {
    array_push( $buttons, 'tmrd_mce_button' );
    return $buttons;
  }

  // MCE Shortcode Control script
  function tmrd_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['tmrd_mce_button'] =  WPVSC_URL . '/assets/js/main.js';
    return $plugin_array;
  }

  // Admin panel menu for Shortcode
  add_action( 'admin_menu', 'register_wpv_shortcodes_page' );
  function register_wpv_shortcodes_page() {
    add_submenu_page( 'edit.php?post_type=wpv_sc', 'WPvita Shortcodes', 'Getting Started', 'manage_options', 'wpv_shortcodes', 'wpvita_settings_page' );
  }

  add_action( 'admin_print_footer_scripts', 'wpv_shortcodes_qtag',55 );
  function wpv_shortcodes_qtag(){
    global $pagenow;
    if($pagenow == 'post.php'||$pagenow=='post-new.php'){
      echo "\n\n";
?>
  <script type="text/javascript">
  jQuery( document ).ready( function() {
    if( 'undefined' != typeof wpvsc_qtag_list ){
      var tempStr = '<select class="wpvsc-edButton" onchange="edGetShortcodes(this.options[this.selectedIndex].value);"><option value="-1">WPvita Shortcodes</option>';
      for( i in wpvsc_qtag_list )
        tempStr += '<option value=\'' + wpvsc_qtag_list[i] + '\'>' + wpvsc_qtag_list[i] + '</option>';
        tempStr += '</select>';
        jQuery( "#ed_toolbar" ).append( tempStr );
        edButtons[edButtons.length+1] = new QTags.Button();
    }
  });
  </script>
<?php
  }
}
