jQuery(document).ready(function($){
    // Toggles
    if ($('.wp_shortcodes_toggle').length) {
        $(".togglec").hide();
      $(".wps_togglet").click(function(){
         $(this).toggleClass("toggleta").next(".togglec").slideToggle("normal");
      });
     }

     // Tabs
    if ($('.wp_shortcodes_tabs').length) {
        $('.wp_shortcodes_tabs').each(function() {
            var $this = $(this);
            $this.find('.tab_content').slice(1).hide();
            $this.find('ul.wps_tabs li:first').addClass('active');
            $this.find('ul.wps_tabs li a').click(function(e) {
                e.preventDefault();
                var $this_a = $(this);
                var $tab = $this.find('#'+$this_a.data('tab'));
                if (! $tab.is(':visible')) {
                    $this.find('.tab_content').hide();
                    $this_a.parent().addClass('active').siblings().removeClass('active');
                    $tab.fadeIn(600);
                }
            });
        });
    }
    $('.wpvsc-alert').each(function(){
      var $this = $(this);
      $this.find('.close').click(function(e){
        $this.hide();
      });

    });

    if ($('.wp-vicodes-accordion').length) {
      $('.wp-vicodes-accordion').each(function() {
        var $this = $(this);
        function close_accordion_section() {
          $this.find('.wpv-accordion-section-title').removeClass('active');
          $this.find('.wpv-accordion-section-content').slideUp(300).removeClass('open');
        }

        $this.find('.wpv-accordion-section-title').click(function(e) {
          // Grab current anchor value
          var currentAttrValue = jQuery(this).attr('href');

          if(jQuery(e.target).is('.active')) {
            close_accordion_section();
          }else {
            close_accordion_section();

            // Add active class to section title
            $this.find(this).addClass('active');
            // Open up the hidden content panel
            $this.find(currentAttrValue).slideDown(300).addClass('open');
          }

          e.preventDefault();
        });
      });
    }

});