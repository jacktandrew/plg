<?php global $shortname; ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/jquery.cycle.all.min.js"></script> 
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/jquery.easing.1.3.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/superfish.js"></script>	
	<script type="text/javascript">
	//<![CDATA[
		jQuery.noConflict();
	
		jQuery('ul.superfish').superfish({ 
			delay:       300,                            // one second delay on mouseout 
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			speed:       'fast',                          // faster animation speed 
			autoArrows:  true,                           // disable generation of arrow mark-up 
			dropShadows: false                            // disable drop shadows 
		}).find("> li > ul > li:last-child, > li > ul > li > ul > li:last-child, > li > ul > li > ul > li > ul > li:last-child").addClass("last-nav-element");
		
		jQuery(".js #featured, .js div#tabbed").css("display","block");

		<?php if (get_option($shortname.'_disable_toptier') == 'on') echo('jQuery("ul.nav > li > ul").prev("a").attr("href","#");'); ?>
		
		var $featured_content = jQuery('#featured_content'),
			$tabbed_area = jQuery('div#tabbed'),
			$controllers = jQuery('div#controllers'),
			$comments = jQuery('ol.commentlist');
		
		et_search_bar();
		
		jQuery(window).load( function(){
			if ($featured_content.length) {
				$featured_content.css( 'backgroundImage', 'none' );
				$featured_content.cycle({
					<?php if(get_option($shortname.'_slider_auto') == 'on') { ?>
						timeout: <?php echo esc_js(get_option($shortname.'_slider_autospeed')); ?>
					<?php } else { ?>
						timeout: 0
					<?php }; ?>,
					speed: 300,
					cleartypeNoBg: true,
					prev:   'a#left_arrow', 
					next:   'a#right_arrow',
					pager:  'div#controllers',
					fx: '<?php echo esc_js(get_option($shortname.'_slider_effect')); ?>'
				});
				
				if ( $featured_content.find('.slide').length == 1 ){
					$featured_content.find('.slide').css({'position':'absolute','top':'0','left':'0'}).show();
					jQuery('#featured a#left_arrow, #featured a#right_arrow').hide();
				}
				
				var controllersWidth = $controllers.width(),
					controllersLeft = Math.round((960 - controllersWidth) / 2);
				if (controllersWidth < 960) $controllers.css('padding-left',controllersLeft);
			};
		} );
		
		if ($tabbed_area.length) {
			$tabbed_area.tabs({ fx: { opacity: 'toggle' } });
		};
		
		if ($comments.length) {
			$comments.find(">li").after('<span class="bottom_bg"></span>');
		};
		
		
		<!---- Search Bar Improvements ---->
		function et_search_bar(){
			var $searchform = jQuery('#header div#search-form'),
				$searchinput = $searchform.find("input#searchinput"),
				searchvalue = $searchinput.val();
				
			$searchinput.focus(function(){
				if (jQuery(this).val() === searchvalue) jQuery(this).val("");
			}).blur(function(){
				if (jQuery(this).val() === "") jQuery(this).val(searchvalue);
			});
		};
		
	//]]>	
	</script>