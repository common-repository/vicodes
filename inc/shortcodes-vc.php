<?php

/*****************
 *  Buttons
 *****************/
add_action( 'vc_before_init', 'wpvsc_buttons_integrateWithVC' );
function wpvsc_buttons_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "Button", WPV_DOMAIN ),
    "base"      =>  "wpv_button",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Title', WPV_DOMAIN ),
        'param_name'  =>  'title',
        "description" =>  __("Add button title", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'URL', WPV_DOMAIN ),
        'param_name'  =>  'url',
        "description" =>  __("Add button URL", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'dropdown',
        'heading'     =>  __( 'Position', WPV_DOMAIN ),
        'param_name'  =>  'position',
        "description" =>  __("Select button position", WPV_DOMAIN),
        "value"       =>  array(
          'Left'      =>  'left',
          'Right'     =>  'right',
          'Center'    =>  'center'
        )
      ),
      array(
        'type'          =>  'dropdown',
        'heading'       =>  __( 'Size', WPV_DOMAIN ),
        'param_name'    =>  'size',
        "description"   =>  __("Select button size", WPV_DOMAIN),
        "value"         =>  array(
          'Default'     =>  'default',
          'Large'       =>  'large',
          'Full Width'  =>  'fullwidth'
        )
      ),
      array(
        'type'          =>  'dropdown',
        'heading'       =>  __( 'Theme', WPV_DOMAIN ),
        'param_name'    =>  'theme',
        "description"   =>  __("Select button theme", WPV_DOMAIN),
        "value"         =>  array(
          'Red'         =>  'red',
          'Pink'        =>  'pink',
          'Purple'      =>  'purple',
          'Deep Purple' =>  'deep-purple',
          'Indigo'      =>  'indigo',
          'Blue'        =>  'blue',
          'Light Blue'  =>  'light-blue',
          'Cyan'        =>  'cyan',
          'Teal'        =>  'teal',
          'Green'       =>  'green',
          'Light Green' =>  'light-green',
          'Lime'        =>  'lime',
          'Yellow'      =>  'yellow',
          'Amber'       =>  'amber',
          'Orange'      =>  'orange',
          'Deep Orange' =>  'deep-orange',
          'Brown'       =>  'brown',
          'Gray'        =>  'gray',
          'Blue-Gray'   =>  'blue-gray',
          'Black'       =>  'black'
        )
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Class', WPV_DOMAIN ),
        'param_name'  =>  'class',
        "description" =>  __("Custom CSS class", WPV_DOMAIN),
      ),
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_Buttons extends WPBakeryShortCode { }
}


/****************
 *  Alert
 ****************/
add_action( 'vc_before_init', 'wpvsc_alert_integrateWithVC' );
function wpvsc_alert_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "Alert", WPV_DOMAIN ),
    "base"      =>  "wpv_alert",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Title', WPV_DOMAIN ),
        'param_name'  =>  'title',
        "description" =>  __("Add Your Title", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'textarea',
        'heading'     =>  __( 'Content', WPV_DOMAIN ),
        'param_name'  =>  'content',
        "description" =>  __("Add Your Content", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'dropdown',
        'heading'     =>  __( 'Style', WPV_DOMAIN ),
        'param_name'  =>  'style',
        "description" =>  __("Select your style", WPV_DOMAIN),
        "value"       =>  array(
          'Success'   =>  'success',
          'Error'     =>  'error',
          'Warning'   =>  'warning',
          'Info'      =>  'info'
        )
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Display Alert Icon', WPV_DOMAIN ),
        'param_name'  =>  'icon'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Enable Close function', WPV_DOMAIN ),
        'param_name'  =>  'close'
      ),
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_Alert extends WPBakeryShortCode { }
}


/****************************
 *  DailyMotion Video
 ***************************/
add_action( 'vc_before_init', 'wpvsc_dailymotion_integrateWithVC' );
function wpvsc_dailymotion_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "DailyMotion Video", WPV_DOMAIN ),
    "base"      =>  "wpv_dailymotion",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Video ID', WPV_DOMAIN ),
        'param_name'  =>  'id',
        "description" =>  __("Add DailyMotion Video ID", WPV_DOMAIN),
        "value"       =>  __("x2jlme3", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Width', WPV_DOMAIN ),
        'param_name'  =>  'width',
        "value"       =>  __("768", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Height', WPV_DOMAIN ),
        'param_name'  =>  'height',
        "value"       =>  __("480", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Autoplay this video', WPV_DOMAIN ),
        'param_name'  =>  'autoplay'
      )
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_DailyMotionVideo extends WPBakeryShortCode { }
}


/****************************
 *  Divider Shortcode
 ***************************/
add_action( 'vc_before_init', 'wpvsc_divier_integrateWithVC' );
function wpvsc_divier_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "Divider", WPV_DOMAIN ),
    "base"      =>  "wpv_divider",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Height of Divider', WPV_DOMAIN ),
        'param_name'  =>  'height',
        "value"       =>  __("3", WPV_DOMAIN)
      ),
      array(
        'type'          =>  'dropdown',
        'heading'       =>  __( 'Color', WPV_DOMAIN ),
        'param_name'    =>  'color',
        "description"   =>  __("Select button theme", WPV_DOMAIN),
        "value"         =>  array(
          'Red'         =>  'red',
          'Pink'        =>  'pink',
          'Purple'      =>  'purple',
          'Deep Purple' =>  'deep-purple',
          'Indigo'      =>  'indigo',
          'Blue'        =>  'blue',
          'Light Blue'  =>  'light-blue',
          'Cyan'        =>  'cyan',
          'Teal'        =>  'teal',
          'Green'       =>  'green',
          'Light Green' =>  'light-green',
          'Lime'        =>  'lime',
          'Yellow'      =>  'yellow',
          'Amber'       =>  'amber',
          'Orange'      =>  'orange',
          'Deep Orange' =>  'deep-orange',
          'Brown'       =>  'brown',
          'Gray'        =>  'gray',
          'Blue-Gray'   =>  'blue-gray',
          'Black'       =>  'black'
        )
      )
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_Divider extends WPBakeryShortCode { }
}



/****************************
 *  Google Map
 ***************************/
add_action( 'vc_before_init', 'wpvsc_google_map_integrateWithVC' );
function wpvsc_google_map_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "Google Map", WPV_DOMAIN ),
    "base"      =>  "wpv_googlemap",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Address', WPV_DOMAIN ),
        'param_name'  =>  'address',
        "description" =>  __("Add your address", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Width', WPV_DOMAIN ),
        'param_name'  =>  'width',
        "value"       =>  __("768", WPV_DOMAIN),
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Height', WPV_DOMAIN ),
        'param_name'  =>  'height',
        "value"       =>  __("480", WPV_DOMAIN),
      )
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_GoogleMap extends WPBakeryShortCode { }
}


/****************************
 *  Progress Bar
 ***************************/
add_action( 'vc_before_init', 'wpvsc_progress_bar_integrateWithVC' );
function wpvsc_progress_bar_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "Progress Bar", WPV_DOMAIN ),
    "base"      =>  "wpv_progress_bar",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Title', WPV_DOMAIN ),
        'param_name'  =>  'title',
        "description" =>  __("Add your title", WPV_DOMAIN),
      ),
      array(
        'type'          =>  'dropdown',
        'heading'       =>  __( 'Theme', WPV_DOMAIN ),
        'param_name'    =>  'theme',
        "description"   =>  __("Select button theme", WPV_DOMAIN),
        "value"         =>  array(
          'Red'         =>  'red',
          'Pink'        =>  'pink',
          'Purple'      =>  'purple',
          'Deep Purple' =>  'deep-purple',
          'Indigo'      =>  'indigo',
          'Blue'        =>  'blue',
          'Light Blue'  =>  'light-blue',
          'Cyan'        =>  'cyan',
          'Teal'        =>  'teal',
          'Green'       =>  'green',
          'Light Green' =>  'light-green',
          'Lime'        =>  'lime',
          'Yellow'      =>  'yellow',
          'Amber'       =>  'amber',
          'Orange'      =>  'orange',
          'Deep Orange' =>  'deep-orange',
          'Brown'       =>  'brown',
          'Gray'        =>  'gray',
          'Blue-Gray'   =>  'blue-gray',
          'Black'       =>  'black'
        )
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Percentage', WPV_DOMAIN ),
        'param_name'  =>  'percentage',
        "description" =>  __("Add percentage in numbers", WPV_DOMAIN),
      ),
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_ProgressBar extends WPBakeryShortCode { }
}


/****************************
 *  Vimeo Video
 ***************************/
add_action( 'vc_before_init', 'wpvsc_vimeo_video_integrateWithVC' );
function wpvsc_vimeo_video_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "Vimeo Video", WPV_DOMAIN ),
    "base"      =>  "wpv_vimeo",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Video ID', WPV_DOMAIN ),
        'param_name'  =>  'id',
        "description" =>  __('Add YouTube video id. e.g "1084537"', WPV_DOMAIN)
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Width', WPV_DOMAIN ),
        'param_name'  =>  'width',
        "value"       =>  __("768", WPV_DOMAIN)
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Height', WPV_DOMAIN ),
        'param_name'  =>  'height',
        "value"       =>  __("480", WPV_DOMAIN)
      ),
      array(
        'type'        =>  'colorpicker',
        'heading'     =>  __( 'Color', WPV_DOMAIN ),
        'param_name'  =>  'color',
        "description" =>  __("Select video player color theme", WPV_DOMAIN)
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Show video title', WPV_DOMAIN ),
        'param_name'  =>  'show_title'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Show video byline', WPV_DOMAIN ),
        'param_name'  =>  'show_byline'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Display author portrait', WPV_DOMAIN ),
        'param_name'  =>  'show_portrait'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Autoplay this video', WPV_DOMAIN ),
        'param_name'  =>  'autoplay'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Loop this video', WPV_DOMAIN ),
        'param_name'  =>  'loop'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Show video description below video', WPV_DOMAIN ),
        'param_name'  =>  'detail'
      ),
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_VimeoVideo extends WPBakeryShortCode { }
}


/****************************
 *  YouTube Video
 ***************************/
add_action( 'vc_before_init', 'wpvsc_youtube_video_integrateWithVC' );
function wpvsc_youtube_video_integrateWithVC() {
  vc_map( array(
    "name"      =>  __( "YouTube Video", WPV_DOMAIN ),
    "base"      =>  "wpv_youtube",
    "icon"      =>  "icon-wpvsc",
    "category"  =>  __( "Vicodes", WPV_DOMAIN),
    "params"    =>  array(
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Video ID', WPV_DOMAIN ),
        'param_name'  =>  'id',
        "description" =>  __('Add YouTube video id. e.g "XSGBVzeBUbk"', WPV_DOMAIN)
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Width', WPV_DOMAIN ),
        'param_name'  =>  'width',
        "value"       =>  __("768", WPV_DOMAIN)
      ),
      array(
        'type'        =>  'textfield',
        'heading'     =>  __( 'Height', WPV_DOMAIN ),
        'param_name'  =>  'height',
        "value"       =>  __("480", WPV_DOMAIN)
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Show Player controls', WPV_DOMAIN ),
        'param_name'  =>  'player'
      ),
      array(
        'type'        =>  'checkbox',
        'heading'     =>  __( 'Show video title', WPV_DOMAIN ),
        'param_name'  =>  'title'
      )
    ),
  ));
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_WPVSC_YouTube extends WPBakeryShortCode { }
}