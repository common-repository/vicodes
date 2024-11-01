<?php
function wpv_shortcode_load_fonts() {
wp_register_style('wpv-google-fonts', 'http://fonts.googleapis.com/css?family=Oxygen');
wp_enqueue_style( 'wpv-google-fonts');
}
add_action('admin_enqueue_scripts', 'wpv_shortcode_load_fonts');
function wpvita_settings_page() {
?>
<style type="text/css">
.wpv-wrap {
margin: 0;
padding-top: 45px;
margin-left: 40px;
max-width: 980px;
width: 98%;
font-family: 'Oxygen', helvetica, arial, serif;
color: #23282d;
font-size: 14px;
line-height: 26px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
.wpvsc-info {
overflow: hidden;
width: 980px;
}
.wpvsc-info h3 {
margin: 0;
color: #23282d;
font-weight: 300;
font-size: 50px;
line-height: 50px;
padding-bottom: 20px;
}
.wpv-desc span {
color: #7b8898;
font-size: 16px;
}
.wpv-desc p {
font-size: 18px;
color: #2a3138;
line-height: 30px;
overflow: hidden;
}
.wpvsc-main {
background-color: #fff;
overflow: hidden;
margin-top: 45px;
}
h1.nav-tab-wrapper,
h2.nav-tab-wrapper,
h3.nav-tab-wrapper {
padding: 0;
margin: 0;
}
.wpvsc-main .nav-tab {
margin: 0;
border: 0;
background-color: #fafafa;
line-height: 60px !important;
height: 60px !important;
text-align: center;
padding: 0 !important;
min-width: 49.89%;
text-transform: uppercase;
font-size: 16px !important;
border-right: 1px solid #f1f4f6;
box-shadow: none;
color: #23282d;
font-weight: normal;
}
.wpvsc-main .nav-tab:last-of-type {
border-right-color: #fafafa;
}
.wpvsc-main .nav-tab-active,
.nav-tab-active:hover {
background: #fff;
color: #40C0EF;
}
.wpvsc-main .nav-tab-wrapper,
.wpvsc-main .nav-tab-active,
.wpvsc-main .nav-tab-active:hover {
border-bottom: 0 !important;
}
.wpvsc-main .sidebar {
max-width: 290px;
width: 90%;
float: left;
}
.wpv-widget {
padding: 0 0 30px;
}
.wpv-widget h3 {
margin-top: 0;
font-size: 20px;
color: #23282d;
font-weight: normal;
}
.wpv-widget p {
color: #7B8898;
font-size: 16px;
}
.wpvsc-main .tab-content {
background: #FFF;
padding-right: 40px;
float: left;
max-width: 610px;
width: 90%;
box-sizing: border-box;
font-size: 18px;
position: relative;
}
.wpvsc-main .tab-content-wrap {
padding: 60px 40px;
overflow: hidden;
}
.wpvsc-main .tab-content p {
font-size: 16px;
line-height: 26px;
}
.wpv-thumb {
background: url(<?php echo __( WPVSC_URL ); ?>/assets/img/screenshot.png) no-repeat;
width: 350px;
height: 250px;
float: left;
background-color: #40C0EF;
border-radius: 10px;
margin-right: 38px;
}
.tab-inner p {
font-size: 18px;
}
.tab-content h6 {
margin-bottom: 10px;
}
li {
font-size: 14px;
padding-bottom: 10px;
}
li em {
font-size: Consolas, Monaco, monospace;
}
.wpv-start code {
padding: 0 10px;
background: #f9f9f9;
border: 1px solid #dedede;
font-size: 12px;
display: block;
}
.wpv-start h3 {
margin: 0;
color: #2a3138;
font-size: 20px;
font-weight: normal;
}
.wpv-wrap hr {
margin: 30px 0;
border: 1px solid #f0f0f0;
border-bottom: 0;
}
.wpv-start h4 {
font-size: 14px;
font-weight: normal;
}
</style>
<div class="wpv-wrap">
  <?php
  if( isset( $_GET[ 'tab' ] ) ) {
  $active_tab = $_GET[ 'tab' ];
  } else {
  $active_tab = 'tab_help';
  }
  ?>
  <div class="wpvsc-info">
    <div class="wpv-thumb">
    </div>
    <div class="wpv-desc">
      <h3><?php echo __( WPV_PLUGIN_NAME, WPV_DOMAIN ) ?></h3>
      <span>Version <?php echo __( WPVSC_VERSION, WPVI_TEXTDOMAIN ); ?></span>
      <p>Vicodes provides an essential set of easy to use shortcodes like buttons, alert boxes, columns, video embed, divider, google map, progress bars,  tabs and toggles to make your life easier.</p>
    </div>
  </div>
  <div class="wpvsc-main">
    <?php
    function page_tabs( $current = 'first' ) {
    $tabs = array(
    'get-started'   => __("Getting Started", WPV_DOMAIN ),
    'shortcode'       => __("Shortcodes List", WPV_DOMAIN )
    );
    $html =  '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
    $class = ($tab == $current) ? 'nav-tab-active' : '';
    $html .=  '<a class="nav-tab ' . $class . '" href="?post_type=wpv_sc&page='.WPV_PLUGIN_PAGE_NAME.'&tab=' . $tab . '">' . $name . '</a>';
    }
    $html .= '</h2><div class="tab-content-wrap">';
      echo $html;
      }
      $tab = ( !empty( $_GET['tab'] )) ? esc_attr( $_GET['tab'] ) : 'get-started';
      page_tabs( $tab );
      if( $tab == 'get-started' ) {
      ?>
      <div class="tab-content wpv-start">
        <h3>Overview</h3>
        <p>With Vicodes you can add all sorts of essential elements to your pages easily. It includes 13 useful Shortcodes.</p>
        <hr>
        <h3>How to Use</h3>
        <p>You can add a shortcode from the post editor button or you can manually add one.</p>
        <h4>Button Shortcode Sample:</h4>
        <code>[wpv_button title="Google" theme="green" url="http://google.com" position="left" class="googl" size="default"]</code>

      </div>
      <?php } else if( $tab == 'shortcode' ) { ?>
      <div class="tab-content wpv-start">
        <h3>Shortcodes List</h3>
        <p>Here is the complete list of shortcodes along with all the parameters used in this plugin.</p>
        <hr>
        <h5>Whistles (Tabs / Toggles / Accordion)</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_post type=" " group=" " order=" " order_by=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        type: tabs | toggles | accordion<br/>
        group: &lt;utilities group&gt; <br/>
        order: ASC | DESC <br/>
        order_by: ID | title | date | rand
        </code>

        <h5>Column / Grid</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_grid columns=" " last=" "] content [/wpv_grid]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        content: &lt;value&gt; <br/>
        last: true | false <br/>
        columns: full_width | one_half | one_third | one_fourth | one_fifth | one_sixth | two_third | two_fifth | three_fourth | three_fifth | four_fifth | five_sixth
        </code>

        <h5>Button</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_button title=" " theme=" " url=" " position=" " class=" " size=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        title: &lt;value&gt; <br/>
        url: &lt;url&gt; <br/>
        position: left | right | center <br/>
        class: &lt;custom class&gt; <br/>
        size: default | large | fullwidth<br/>
        theme: red | pink | purple | deep-purple | indigo | blue | light-blue| cyan | teal | green | light-green | lime | yellow | amber | orange | deep-orange | brown | gray | blue-gray | black
        </code>

        <h5>Alerts</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_alert title=" " style=" " icon=" " close=" "] message [/wpv_alert]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        title: &lt;value&gt;<br/>
        message: &lt;value&gt;<br/>
        style: success | error | warning | info <br/>
        icons: true | false <br/>
        close: true | false
        </code>

        <h5>DailyMotion Video</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_dailymotion id=" " width=" " height=" " autoplay=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        id: <em style="color: #999">http://www.dailymotion.com/video/</em><b>x2yme9s_video_title</b><br/>
        width: &lt;number&gt;<br/>
        height: &lt;number&gt;<br/>
        autoplay: true | false
        </code>

        <h5>Divider</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_divider color=" " height=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        height: &lt;number&gt; 1 - 10<br/>
        color: red | pink | purple | deep-purple | indigo | blue | light-blue| cyan | teal | green | light-green | lime | yellow | amber | orange | deep-orange | brown | gray | blue-gray | black
        </code>

        <h5>Google Map</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_googlemap address=" " width=" " height=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        address: &lt;address&gt; <br/>
        width: &lt;number&gt;<br/>
        height: &lt;number&gt;
        </code>

        <h5>Progress Bar</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_progress_bar title=" " percentage=" " theme=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        title: &lt;value&gt;<br/>
        percentage: &lt;number&gt; 1 - 100<br/>
        theme: red | pink | purple | deep-purple | indigo | blue | light-blue| cyan | teal | green | light-green | lime | yellow | amber | orange | deep-orange | brown | gray | blue-gray | black
        </code>

        <h5>Vimeo Video</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_vimeo id=" " width=" " height=" " autoplay=" " loop=" " title=" " byline=" " portrait=" " detail=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        id: <em style="color: #999">http://vimeo.com/</em><b>1084537</b><br/>
        width: &lt;number&gt; <br/>
        height: &lt;number&gt; <br/>
        autoplay: true | false <br/>
        loop: true | false <br/>
        title: true | false <br/>
        byline: true | false <br/>
        portrait: true | false <br/>
        detail: true | false (this will show the detail title and description of video from vimeo website)
        </code>

        <h5>YouTube video</h5>
        <h4>Shortcode:</h4>
        <code>[wpv_youtube id=" " width=" " height=" " suggested=" " player=" " title=" "]</code>
        <h4>Shortcode Parameters:</h4>
        <code>
        id: <em style="color: #999">https://www.youtube.com/watch?v=</em><b>XSGBVzeBUbk</b><br/>
        width: &lt;number&gt; <br/>
        height: &lt;number&gt; <br/>
        suggested: true | false <br/>
        player: true | false <br/>
        title: true | false
        </code>

      </div>
      <?php } ?>
      <div class="sidebar">
        <div class="wpv-widget">
          <h3>Support</h3>
          <p>Feel free to contact us at support@wpvita.com or open a thread in the support forum.</p>
        </div>
        <div class="wpv-widget">
          <h3>Get Vicons</h3>
          <p><a target="_blank" href="http://codecanyon.net/item/vicons-font-icons-for-wordpress/14388816?ref=wpvitarocks"><img src="<?php echo __( WPVSC_URL ); ?>/assets/img/get-vicons.png" alt="vicons plugin"></a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }