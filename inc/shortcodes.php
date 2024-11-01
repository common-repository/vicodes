<?php

// WPvita Button
function wpvf_button( $atts ) {
  extract( shortcode_atts(
    array(
      'title'     =>  'Button',
      'url'       =>  'http://www.wpvita.com',
      'theme'     =>  '',
      'class'     =>  '',
      'position'  =>  'left',
      'size'      =>  'default'
    ), $atts )
  );

  // Output of Button Shortocode.
  $output = '<a href="' . $url . '" class="wpv-button ' . $size . ' ' . $theme . ' ' . $position . ' ' . $class .'"><span>' . $title . '</span></a>';
  if($position == 'center'){
    $output = '<div class="wpv-button-center">' . $output . '</div>';
  }

  // Return output of Button Shortcode.
  return $output;
}
add_shortcode( 'wpv_button', 'wpvf_button' );

// WPvita Alert
function wpvf_alert( $atts, $content = null ) {
  extract( shortcode_atts(
    array(
      'title'   =>  '',
      'style'   =>  '',
      'icon'    =>  '',
      'close'   =>  'false',
    ), $atts )
  );

  $borderColor = ' ' . $style;
  $showClose = '';

  if( $icon == 'true' ){
    $showIcon = '<div class="icon ' . $style . '"></div>';
    $borderColor = '';
  }
  if( $close == 'true' ){
    $showClose = '<div class="close"></div>';
  }
  if( !empty( $title ) ){
    $alertTitle = '<h4 class="title">' . $title . '</h4>';
  }

  $output = '<div class="wpvsc-alert' . $borderColor . '">' . $showClose . $showIcon . '<div class="msg">' . $alertTitle . '<div class="text">' . do_shortcode( $content ) . '</div></div></div>';

  return $output;
}
add_shortcode( 'wpv_alert', 'wpvf_alert' );

// WPvita Progress Bar
function wpvf_progress( $atts) {
  extract( shortcode_atts(
    array(
      'title'       => '',
      'percentage'  => '',
      'theme'       => 'red'
    ), $atts )
  );

  $output = '<div class="wpv-progress-bar"><span class="' . $theme . '" style="width: ' . $percentage . '%"><span class="title hcolor">' . $title . '</span>' . $percentage . '%</span></div>';

  return $output;
}
add_shortcode( 'wpv_progress_bar', 'wpvf_progress' );

// WPvita Grid (Columns)
function wpvf_columns( $atts, $content = null ) {
  extract( shortcode_atts(
    array(
      'columns' => '',
      'last'    => ''
    ), $atts )
  );

  $output = '<div class="grid_' . $columns . '">' . do_shortcode( $content ) . '</div>';

  if($last == 'true'){
    $output = '<div class="grid_' . $columns . ' last">' . do_shortcode( $content ) . '</div><div class="clear"></div>';
  }

  return $output;
}
add_shortcode( 'wpv_grid', 'wpvf_columns' );

// WPvita YouTube Video
function wpvf_youtube_video( $atts ) {
  extract( shortcode_atts(
    array(
      'id'        => '',
      'width'     => '600',
      'height'    => '338',
      'suggested' => true,
      'player'    => true,
      'title'     => true
    ), $atts )
  );

  if( empty( $height ) ){ $height = 338; }

  $output = '<iframe width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/' . $id . '?rel=' . $suggested . '&amp;controls=' . $player . '&amp;showinfo=' . $title . '" frameborder="0" allowfullscreen></iframe>';

  return $output;
}
add_shortcode( 'wpv_youtube', 'wpvf_youtube_video' );

// WPvita Vimeo Video
function wpvf_vimeo_video( $atts ) {
  extract( shortcode_atts(
    array(
      'id'        => '',
      'width'     => '100%',
      'height'    => '338',
      'autoplay'  => false,
      'loop'      => false,
      'color'     => '36c3a4',
      'title'     => 'true',
      'byline'    => 'true',
      'portrait'  => 'true',
      'detail'    => 'false'
    ), $atts )
  );

  if( $width == 'auto' ){
    $video_width = '100%';
  }else{
    $video_width = $width . 'px';
  }

  if( empty( $width ) ){ $height = 600; }
  if( empty( $height ) ){ $height = 338; }

  $video = '<iframe src="https://player.vimeo.com/video/' . $id . '?autoplay=' . $autoplay . '&loop=' . $loop . '&color=' . $color . '&title=' . $title . '&byline=' . $byline . '&portrait=' . $portrait . '" width="' . $video_width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

  $output = $video;

  // Retriving Vimeo video detail from JSON
  if( $detail == 'true' ){
    $vimeo_video = @file_get_contents( 'https://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $id );
    if( $vimeo_video ){
      $array = json_decode( $vimeo_video, true );
      $seconds = $array['duration'];
      $video_time = gmdate( "H:i:s", $array['duration'] );
      if( $seconds <= 3600 ){
        $video_time = gmdate( "i:s", $array['duration'] );
      }

      $output .= '<div class="wpv-vimeo-detail" style="width: ' . $video_width . ';">';
      $output .= '<div class="wpv-vimeo-title">' . $array['title'] . ' <span class="vimeo">from</span> ' . $array['author_name'];
      $output .= '<div class="wpv-vimeo-duration">Duration: ' . $video_time . '</div>';
      $output .= '</div>';
      $output .= '<div class="wpv-vimeo-description">' . $array['description'] . '</div>';
      $output .= '</div>';
    }
  }
  return $output;
}
add_shortcode( 'wpv_vimeo', 'wpvf_vimeo_video' );

// WPvita DailyMotion
function wpvf_daily( $atts) {
  extract( shortcode_atts(
    array(
      'id'        => 'x2am1yu',
      'autoplay'  => 'false',
      'width'     => '600',
      'height'    => '338'
    ), $atts )
  );

  if( empty( $width ) ){ $height = 600; }
  if( empty( $height ) ){ $height = 338; }


  $output = '<iframe frameborder="0" width="' . $width . '" height="' . $height . '" src="//www.dailymotion.com/embed/video/' . $id . '?autoPlay=' . $autoplay . '" allowfullscreen></iframe>';

  return $output;
}
add_shortcode( 'wpv_dailymotion', 'wpvf_daily' );

// WPvita Divider
function wpvf_divide( $atts) {
  extract( shortcode_atts(
    array(
      'color'   => 'red',
      'height'  => '1',
    ), $atts )
  );

  if( empty( $height )){ $height = 1; }
  if( $height >= 10 ){ $height = 10; }

  $output = '<hr class="' . $color . '" style="height: ' . $height . 'px;"/>';

  return $output;
}
add_shortcode( 'wpv_divider', 'wpvf_divide' );

// WPvita Divider
function wpvf_google_map( $atts) {
  extract( shortcode_atts(
    array(
      'address' => '',
      'width'   => '600',
      'height'  => '338',
    ), $atts )
  );

  if( empty( $width ) ){ $height = 600; }
  if( empty( $height )){ $height = 338; }

  $output = '<div class="wpv-google-map"><iframe width="600" height="338" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.com/maps?q=' . urlencode( $address ) . '&output=embed"></iframe></div>';

  return $output;
}
add_shortcode( 'wpv_googlemap', 'wpvf_google_map' );

// WPvita Tabs and Toggles
function wpvf_tabs_toggles( $atts ) {
  extract( shortcode_atts(
    array(
      'type'      => '',
      'group'     => 'services',
      'order'     => 'ASC', // DESC and ASC
      'order_by'  => 'title', // ID, title, date, rand,
    ), $atts )
  );

  ob_start();

  $query = new WP_Query( array(
    'post_type'           => 'wpv_sc',
    'post_status'         => 'publish',
    'order'               => $order,
    'orderby'             => $order_by,
    'wpss_tabs_taxonomy'  => $group,
  ));

  switch ($type) {
    case 'tabs':
      if ( $query->have_posts() ) { ?>
        <div class="tab_widget wp_shortcodes_tabs">
          <ul class="wps_tabs">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li class=""><a href="#" data-tab="wpv-shortcodes-tabs-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
          <div class="tab_container">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div id="wpv-shortcodes-tabs-<?php the_ID(); ?>" class="tab_content clearfix"><?php the_content(); ?></div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>

        </div>
        <?php $output = ob_get_clean();
        return $output;
      }
    break;
    case 'accordion':
      if ( $query->have_posts() ) { ?>
        <div class="wp-vicodes-accordion">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="wpv-accordion-section">
              <a class="wpv-accordion-section-title" href="#wpv-accordion-<?php the_ID(); ?>"><?php the_title(); ?></a>

              <div id="wpv-accordion-<?php the_ID(); ?>" class="wpv-accordion-section-content">
                  <?php the_content(); ?>
              </div><!--end .accordion-section-content-->
          </div><!--end .accordion-section-->
          <?php endwhile; wp_reset_postdata(); ?>
      </div><!--end .accordion-->
        <?php $output = ob_get_clean();
        return $output;
      }
    break;
    case 'toggles':
      if ( $query->have_posts() ) { ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="toggle clearfix wp_shortcodes_toggle">
          <div class="wps_togglet">
            <span><?php the_title(); ?></span>
          </div>
          <div class="togglec clearfix">
          <?php the_content(); ?>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <?php $output = ob_get_clean();
        return $output;
      }
    break;

    default:
    $output = 'Please add tabs or toggles from Vicodes Post type.';
    return $output;
  }
}
add_shortcode( 'wpv_post', 'wpvf_tabs_toggles' );