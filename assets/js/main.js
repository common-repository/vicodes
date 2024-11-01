(function() {
  tinymce.PluginManager.add('tmrd_mce_button', function( editor, url ) {
    editor.addButton( 'tmrd_mce_button', {
      title: 'Essential Shortcodes',
      icon: 'icon wpvita-icon',
      type: 'menubutton',
      menu: [

        /*--- [ Tabs / Toggles ] ---*/
        { text: 'Add Whistles', onclick: function() { editor.windowManager.open(
          { id: 'wpvita-box', file : url + '/dialog.php', inline : 1, width : 500, height: 270, });
        }}, // Tabs and Toggles

        /*--- [ Alert ] ---*/
        { text: 'Alert', onclick: function() { editor.windowManager.open(
          { title: 'Insert Alert Box', id: 'wpvita-box', width : 600, height: 260,
            body: [
              { type: 'textbox', name: 'title', label: 'Title' },
              { type: 'textbox', name: 'message', label: 'Message', multiline: true, minWidth: 300, minHeight: 80 },
              { type: 'listbox', name: 'style', label: 'Style',
                'values': [
                  {text: 'Success', value: 'success'},
                  {text: 'Error', value: 'error'},
                  {text: 'Warning', value: 'warning'},
                  {text: 'Info', value: 'info'}]},
              { type: 'checkbox', name: 'show_icon', label: 'Display with Icon', text: '', classes: 'checkclass'},
              { type: 'checkbox', name: 'show_close', label: 'Show close button', text: '', classes: 'checkclass'}],
          onsubmit: function( e ) {
            editor.insertContent( '[wpv_alert title="'+e.data.title+'" style="'+e.data.style+'" icon="'+e.data.show_icon+'"  close="'+e.data.show_close+'"]'+e.data.message+'[/wpv_alert]');
          }});
        }}, // end Alert

        /*--- [ Button ] ---*/
        { text: 'Buttons', onclick: function() { editor.windowManager.open(
          { title: 'Insert Button', id: 'wpvita-box', width : 600, height: 260,
            body: [
                { type: 'textbox', name: 'title', label: 'Button Title' },
                { type: 'textbox', name: 'url', label: 'URL' },
                { type: 'listbox', name: 'theme', label: 'Theme',
                  'values': [
                    {text: 'Red', value: 'red'},
                    {text: 'Pink', value: 'pink'},
                    {text: 'Purple', value: 'purple'},
                    {text: 'Deep Purple', value: 'deep-purple'},
                    {text: 'Indigo', value: 'indigo'},
                    {text: 'Blue', value: 'blue'},
                    {text: 'Light Blue', value: 'light-blue'},
                    {text: 'Cyan', value: 'cyan'},
                    {text: 'Teal', value: 'teal'},
                    {text: 'Green', value: 'green'},
                    {text: 'Light Green', value: 'light-green'},
                    {text: 'Lime', value: 'lime'},
                    {text: 'Yellow', value: 'yellow'},
                    {text: 'Amber', value: 'amber'},
                    {text: 'Orange', value: 'orange'},
                    {text: 'Deep Orange', value: 'deep-orange'},
                    {text: 'Brown', value: 'brown'},
                    {text: 'Gray', value: 'gray'},
                    {text: 'Blue Gray', value: 'blue-gray'},
                    {text: 'Black', value: 'black'}]},
                { type: 'listbox', name: 'position', label: 'Position',
                  'values': [
                    {text: 'left', value: 'left'},
                    {text: 'right', value: 'right'},
                    {text: 'center', value: 'center'}]},
                { type: 'listbox', name: 'size', label: 'Button Size',
                  'values': [
                    {text: 'Default', value: 'default'},
                    {text: 'Large', value: 'large'},
                    {text: 'Full Width', value: 'fullwidth'}]},
                { type: 'textbox', name: 'class', label: 'Custom Class'}
            ],
          onsubmit: function( e ) {
            if(e.data.title === ''){ e.data.title = 'Button title'; }
            if(e.data.url === ''){ e.data.url = '#'; }
            if(e.data.class === ''){ e.data.class = '';
            }else{ e.data.class = ' class="'+e.data.class+'"'; }
            editor.insertContent( '[wpv_button title="'+e.data.title+'" theme="'+e.data.theme+'" url="'+e.data.url+'" position="'+e.data.position+'"'+e.data.class+' size="'+e.data.size+'"]');
          }});
      }}, // end Button

      /*--- [ Column / Grid ] ---*/
      { text: 'Colums / Grid', onclick: function() { editor.windowManager.open(
        { title: 'Insert Columns / Grid', id: 'wpvita-box', width : 600, height: 310,
          body: [
            { type: 'listbox', name: 'columns', label: 'Select Grid',
              'values': [
                {text: 'Full Width', value: 'full_width'},
                {text: 'One Half', value: 'one_half'},
                {text: 'One Third', value: 'one_third'},
                {text: 'One Fourth', value: 'one_fourth'},
                {text: 'One Fifth', value: 'one_fifth'},
                {text: 'One Sixth', value: 'one_sixth'},
                {text: 'Two Third', value: 'two_third'},
                {text: 'Two Fifth', value: 'two_fifth'},
                {text: 'Three Fourth', value: 'three_fourth'},
                {text: 'Three Fifth', value: 'three_fifth'},
                {text: 'Four Forth', value: 'four_fifth'},
                {text: 'Five Sixth', value: 'five_sixth'}]},
            { type: 'textbox', name: 'column_content', label: 'Content', multiline: true, minWidth: 300, minHeight: 190 },
            { type: 'checkbox', name: 'grid_last', label: 'Is Last?', text: 'Yes', classes: 'checkclass'}],
          onsubmit: function( e ) {
            if(e.data.column_content == ''){e.data.column_content = 'WPVita Shortcode Grid / Columns.'}
            editor.insertContent( '[wpv_grid columns="'+e.data.columns+'" last="'+e.data.grid_last+'"]'+e.data.column_content+'[/wpv_grid]');
          }});
      }}, // end Grid (Columns)

      /*--- [ Divider ] ---*/
      { text: 'Divider', onclick: function() { editor.windowManager.open(
        { title: 'Insert Divier', id: 'wpvita-box', width : 500, height: 130,
          body: [
            { type: 'textbox', name: 'hr_height', label: 'Height', maxLength: 2, id: 'txtDivider'},
            { type: 'listbox', name: 'color', label: 'Color',
              'values': [
                {text: 'Red', value: 'red'},
                {text: 'Pink', value: 'pink'},
                {text: 'Purple', value: 'purple'},
                {text: 'Deep Purple', value: 'deep-purple'},
                {text: 'Indigo', value: 'indigo'},
                {text: 'Blue', value: 'blue'},
                {text: 'Light Blue', value: 'light-blue'},
                {text: 'Cyan', value: 'cyan'},
                {text: 'Teal', value: 'teal'},
                {text: 'Green', value: 'green'},
                {text: 'Light Green', value: 'light-green'},
                {text: 'Lime', value: 'lime'},
                {text: 'Yellow', value: 'yellow'},
                {text: 'Amber', value: 'amber'},
                {text: 'Orange', value: 'orange'},
                {text: 'Deep Orange', value: 'deep-orange'},
                {text: 'Brown', value: 'brown'},
                {text: 'Gray', value: 'gray'},
                {text: 'Blue Gray', value: 'blue-gray'},
                {text: 'Black', value: 'black'}]
            }],
          onsubmit: function( e ) {
            if (isNaN(e.data.hr_height)) { editor.windowManager.alert('Please, insert divider height in numeric.'); return false;}
            if (e.data.hr_height > 10) { editor.windowManager.alert('Invalid numeric entry. An integer between 1 and 10 is required.'); return false; }
            if (e.data.hr_height == '') { e.data.hr_height = 1;}
            editor.insertContent( '[wpv_divider color="'+e.data.color+'" height="'+e.data.hr_height+'"]');
          }});
      }}, // end Divider

      /*--- [ Google Map ] ---*/
      { text: 'Google Map', onclick: function() { editor.windowManager.open(
        { title: 'Embed Google Map', id: 'wpvita-box', width : 500, height: 150,
          body: [
            { type: 'textbox', name: 'address', label: 'Address' },
            { type: 'textbox', name: 'frame_width', label: 'Width', maxLength: 3 },
            { type: 'textbox', name: 'frame_height', label: 'Height', maxLength: 3}],
          onsubmit: function( e ) {
            if (isNaN(e.data.frame_width) || isNaN(e.data.frame_height)) { editor.windowManager.alert('Please, insert width and height as numeric value.'); return false; }
            if (e.data.frame_width == '' || e.data.frame_height == '') { e.data.frame_width = '600'; e.data.frame_height = '338'; }
            editor.insertContent( '[wpv_googlemap address="'+e.data.address+'" width="'+e.data.frame_width+'" height="'+e.data.frame_height+'"]');
          }});
      }}, // Google Map

      /*--- [ Progress Bar ] ---*/
      { text: 'Progress Bar', onclick: function() { editor.windowManager.open(
        { title: 'Insert Progress Bar', id: 'wpvita-box', width : 500, height: 170,
          body: [
            { type: 'textbox', name: 'title', label: 'Title' },
            { type: 'textbox', name: 'percentage', label: 'Percentage', maxLength: 3 },
            { type: 'listbox', name: 'theme', label: 'Theme',
              'values': [
                {text: 'Red', value: 'red'},
                {text: 'Pink', value: 'pink'},
                {text: 'Purple', value: 'purple'},
                {text: 'Deep Purple', value: 'deep-purple'},
                {text: 'Indigo', value: 'indigo'},
                {text: 'Blue', value: 'blue'},
                {text: 'Light Blue', value: 'light-blue'},
                {text: 'Cyan', value: 'cyan'},
                {text: 'Teal', value: 'teal'},
                {text: 'Green', value: 'green'},
                {text: 'Light Green', value: 'light-green'},
                {text: 'Lime', value: 'lime'},
                {text: 'Yellow', value: 'yellow'},
                {text: 'Amber', value: 'amber'},
                {text: 'Orange', value: 'orange'},
                {text: 'Deep Orange', value: 'deep-orange'},
                {text: 'Brown', value: 'brown'},
                {text: 'Gray', value: 'gray'},
                {text: 'Blue Gray', value: 'blue-gray'},
                {text: 'Black', value: 'black'}]}],
          onsubmit: function( e ) {
            if (isNaN(e.data.percentage)) { editor.windowManager.alert('Please, insert percentage in numeric.'); return false;}
            if (e.data.percentage > 100) { editor.windowManager.alert('Please, enter correct percentage.'); return false;}
            editor.insertContent( '[wpv_progress_bar title="'+e.data.title+'" percentage="'+e.data.percentage+'" theme="'+e.data.theme+'"]');
          }});
      }}, // end Progress Bar

      /*--- [ Vimeo Video ] ---*/
      { text: 'Video (Vimeo)', onclick: function() { editor.windowManager.open(
        { title: 'Embed Vimeo Video', id: 'wpvita-box', width : 500, height: 390,
          body: [
            { type: 'textbox', name: 'vimeo_id', label: 'Video ID', },
            { type: 'textbox', name: 'frame_width', label: 'Width', maxLength: 3 },
            { type: 'checkbox', name: 'auto_width', label: 'Auto Width', text: ' (width = 100%)', classes: 'checkclass' },
            { type: 'textbox', name: 'frame_height', label: 'Height', maxLength: 3 },
            { type: 'textbox', name: 'color_theme', label: 'Color', },
            { type: 'checkbox', name: 'show_title', label: '', text: ' Show video title', classes: 'checkclass' },
            { type: 'checkbox', name: 'show_byline', label: '', text: ' Show video byline', classes: 'checkclass' },
            { type: 'checkbox', name: 'show_portrait', label: '', text: ' Display author portrait', classes: 'checkclass' },
            { type: 'checkbox', name: 'autoplay', label: '', text: ' Autoplay this video.', classes: 'checkclass' },
            { type: 'checkbox', name: 'loop', label: '', text: ' Loop this video.', classes: 'checkclass' },
            { type: 'checkbox', name: 'detail', label: '', text: ' Show video description below video.', classes: 'checkclass' }],
          onsubmit: function( e ) {
            if (isNaN(e.data.vimeo_id)) { editor.windowManager.alert('Please, insert valid Vimeo video id.'); return false; }
            if (isNaN(e.data.frame_width) || isNaN(e.data.frame_height)) { editor.windowManager.alert('Please, insert width and height as numeric value.'); return false; }
            if (e.data.auto_width) { e.data.frame_width = 'auto'; e.data.frame_height = '500'; }
            if (e.data.frame_width == '' || e.data.frame_height == '') { e.data.frame_width = '600'; e.data.frame_height = '338'; }
            editor.insertContent( '[wpv_vimeo id="'+e.data.vimeo_id+'" width="'+e.data.frame_width+'" height="'+e.data.frame_height+'" color="'+e.data.color_theme+'" autoplay="'+e.data.autoplay+'" loop="'+e.data.loop+'" title="'+e.data.show_title+'" byline="'+e.data.show_byline+'" portrait="'+e.data.show_portrait+'" detail="'+e.data.detail+'"]');
          }});
      }}, // Vimeo Video

      /*--- [ YouTube Video ] ---*/
      { text: 'Video (YouTube)', onclick: function() { editor.windowManager.open(
        { title: 'Embed YouTube Video', id: 'wpvita-box', width : 500, height: 220,
          body: [
            { type: 'textbox', name: 'youtube_id', label: 'Video ID',},
            { type: 'textbox', name: 'frame_width', label: 'Width', maxLength: 3},
            { type: 'textbox', name: 'frame_height', label: 'Height', maxLength: 3},
            { type: 'checkbox', name: 'youtube_suggested', label: '', text: 'Show suggested videos when the video finishes', classes: 'checkclass' },
            { type: 'checkbox', name: 'youtube_player', label: '', text: 'Show player controls', classes: 'checkclass' },
            { type: 'checkbox', name: 'youtube_title', label: '', text: 'Show video title and player actions', classes: 'checkclass' }],
          onsubmit: function( e ) {
            if (isNaN(e.data.frame_width) || isNaN(e.data.frame_height)) { editor.windowManager.alert('Please, insert width and height as numeric value.'); return false; }
            if (e.data.frame_width == '' || e.data.frame_height == '') { e.data.frame_width = '600';e.data.frame_height = '338'; }
            editor.insertContent( '[wpv_youtube id="'+e.data.youtube_id+'" width="'+e.data.frame_width+'" height="'+e.data.frame_height+'" suggested="'+e.data.youtube_suggested+'" player="'+e.data.youtube_player+'" title="'+e.data.youtube_title+'"]');
          }});
      }}, // end YouTube

      /*--- [ DailyMotion Video ] ---*/
      { text: 'Video (DailyMotion)', onclick: function() { editor.windowManager.open(
        { title: 'Embed Daily Motion Video', id: 'wpvita-box', width : 500, height: 180,
          body: [
            { type: 'textbox', name: 'dm_id', label: 'Video ID / Link', },
            { type: 'textbox', name: 'frame_width', label: 'Width', maxLength: 3 },
            { type: 'textbox', name: 'frame_height', label: 'Height', maxLength: 3 },
            { type: 'checkbox', name: 'autoplay', label: '', text: ' Autoplay mode', classes: 'checkclass'}],
          onsubmit: function( e ) {
            var videoID = e.data.dm_id.substring(0, 7);
            if (isNaN(e.data.frame_width) || isNaN(e.data.frame_height)) { editor.windowManager.alert('Please, insert width and height as numeric value.'); return false; }
            if (e.data.frame_width == '' || e.data.frame_height == '') { e.data.frame_width = '600'; e.data.frame_height = '338'; }
            editor.insertContent( '[wpv_dailymotion id="'+videoID+'" width="'+e.data.frame_width+'" height="'+e.data.frame_height+'" autoplay="'+e.data.autoplay+'"]');
          }});
      }} // DailyMotion Video


    ]});
  });
})();