var wpvsc_qtag_list = ['Add Tabs', 'Add Toggles', 'Add Accordion' ,'Alert','Buttons', 'Colums / Grid', 'DailyMotion Video', 'Divider', 'Google Map', 'Progress Bar', 'Vimeo Video', 'YouTube Video'];

  function edInsertTest( i ) {
    if( i!=-1 )
      edInsertContent( edCanvas, i );
  };

  function edGetShortcodes( value ){
    switch ( value ) {
      case 'Add Tabs':
        edInsertTest( '[wpv_post type="tabs" group="" order="DESC" order_by="ID"]' );
        break;
      case 'Add Toggles':
        edInsertTest( '[wpv_post type="toggles" group="" order="DESC" order_by="ID"]' );
        break;
      case 'Add Accordion':
        edInsertTest( '[wpv_post type="accordion" group="" order="DESC" order_by="ID"]' );
        break;
      case 'Alert':
        edInsertTest( '[wpv_alert title="Success" style="success" icon="true" close="false"]Alert message goes here...[/wpv_alert]' );
        break;
      case 'Buttons':
        edInsertTest( '[wpv_button title="Button" theme="red" url="#" position="left" class="" size="fullwidth"]' );
        break;
      case 'Colums / Grid':
        edInsertTest( '[wpv_grid columns="two_third" last="false"] content goes here. [/wpv_grid]' );
        break;
      case 'DailyMotion Video':
        edInsertTest( '[wpv_dailymotion id="x1yj6t9" width="640" height="480" autoplay="false"]' );
        break;
      case 'Divider':
        edInsertTest( '[wpv_divider color="red" height="5"]' );
        break;
      case 'Google Map':
        edInsertTest( '[wpv_googlemap address="Chicago" width="768" height="350"]' );
        break;
      case 'Progress Bar':
        edInsertTest( '[wpv_progress_bar title="Web Development" percentage="80" theme="indigo"]' );
        break;
      case 'Vimeo Video':
        edInsertTest( '[wpv_vimeo id="1084537" width="640" height="480" autoplay="false" loop="false" title="false" byline="false" portrait="true" detail="true"]' );
        break;
      case 'YouTube Video':
        edInsertTest( '[wpv_youtube id="XSGBVzeBUbk" width="640" height="480" suggested="false" player="true" title="true"]' );
        break;
    }
  }