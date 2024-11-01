<?php

/* For Tabs and Toggles dialog box */

require_once('wpv_config.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Insert Whistles (Tabs, Toggles & Accordion)</title>
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>

    <style type="text/css">
      body{
        position: relative;
        margin: 0;
        padding: 0;
        color: #333;
      }
      a{text-decoration: none;}
      .action{
        width: 100%;
        position: absolute;
        bottom: 0;
        padding: 10px 23px 20px;
        text-align: right;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;

      }
      input[type="button"],
      button.add-post{
        padding: 6px 18px;
        font-size: 12px;
        border: 1px solid #18BE9C;
        cursor: pointer;
        color: #18BE9C;
      }
      input{
        padding: 5px 17px;
        border: 1px solid #888;
      }
      .btnOK,
      button.add-post{
        background: #18BE9C;
        color: #FFF !important;
      }
      button.add-post{
        padding: 10px 40px;
        font-size: 15px;
        margin: 50px auto;
        display: flex;
      }
      button.add-post:hover{
        background: #3FD6B7;
      }
      .fields{
        padding: 20px;
        font-size: 14px;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
      }
      .fields .container{
        padding-bottom: 20px;
      }
      label{
        width: 15%;
        display: inline-block;
      }
      select{
        padding: 4px 10px;
        font-size: 14px;
        line-height: 20px;
        cursor: pointer;
        color: #333;
        text-align: center;
        overflow: visible;
        width: 84%;
      }
    </style>

  </head>
  <body>
    <div class="fields">
      <?php
        $query = new WP_Query( array( 'post_type' => 'wpv_sc', ) );
        if( $query->have_posts() ){
      ?>
      <div class="container">
        <label>Type</label>
        <select id="wpv_type" name="wpv_type">
          <option value="tabs" selected>Tabs</option>
          <option value="toggles">Toggles</option>
          <option value="accordion">Accordion</option>
        </select>
      </div>
      <div class="container">
        <label>Groups</label>
        <select id="wpv_groups" name="wpv_groups">
          <?php
            $terms = get_terms('wpss_tabs_taxonomy',array('hide_empty' => true));
            foreach($terms as $term) {
              echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
            }
          ?>
        </select>
      </div>
      <div class="container">
        <label>Order</label>
        <select id="wpv_order" name="wpv_order">
          <option value="ASC" selected>Ascending</option>
          <option value="DESC">Descending</option>
        </select>
      </div>
      <div class="container">
        <label>Order by</label>
        <select id="wpv_order_by" name="wpv_order_by">
          <option value="ID" selected>ID</option>
          <option value="title">Title</option>
          <option value="date">Date</option>
          <option value="rand">Random</option>
        </select>
      </div>

    </div>

    <div class="action">
      <input type="button" class="btnOK" value="OK" onClick="wpvShortcodeSubmit();" />
      <input type="button" value="Cancel" onClick="tinyMCEPopup.close();" />
    </div>

    <?php } else { ?>
      <div class="fields">
        <div class="container">
          <a href="<?php echo get_admin_url().'post-new.php?post_type=wpv_sc'; ?>" target="_parent"><button class="add-post">Add some Tabs or Toggles first</button></a>
        </div>
      </div>
    <?php } ?>



    <script type="text/javascript">
    function wpvShortcodeSubmit() {
      var shortcode;
      var wpv_types = document.getElementById('wpv_type').value;
      var wpv_groups = document.getElementById('wpv_groups').value;
      var wpv_order = document.getElementById('wpv_order').value;
      var wpv_order_by = document.getElementById('wpv_order_by').value;

      shortcode = '[wpv_post type="'+wpv_types+'" group="'+wpv_groups+'" order="'+wpv_order+'" order_by="'+wpv_order_by+'"]';

      tinyMCEPopup.editor.insertContent(shortcode);
      tinyMCEPopup.close();

    }
    </script>
  </body>
</html>