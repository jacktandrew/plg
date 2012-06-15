	 <div id="footer" >
		<div id="footer-content">
			
				<?php global $is_footer;
				$is_footer = true; ?>
				<h1>Practice Areas</h1>
				<?php $menuClass = 'bottom-menu';
				$footerNav = '';
				
				if (function_exists('wp_nav_menu')) $footerNav = wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false, 'depth' => '1' ) );
				if ($footerNav == '') show_page_menu($menuClass);
				else echo($footerNav); ?>

			      <p>&copy; Premier Law Group, All Rights Reserved, Reproduced with Permission</p>
      <!-- <p id="copyright"><?php esc_html_e('Designed by ','Minimal'); ?> <a href="http://www.elegantthemes.com" title="Elegant Themes">Elegant WordPress Themes</a></p> -->
		</div> <!-- end #footer-content -->
		<div class="small_print"><p>Premier Law Group, PLLC is a Seattle and Bellevue based law firm that serves personal injury victims in Seattle, Bellevue, Redmond, Issaquah, Bothell, Sammamish, Renton, Burien, Kent, Seatac, Mercer Island, Lynnwood, Kirkland, Tacoma, Everett, King County, Pierce County, Snohomish County, Puget Sound Area, and all of Western Washington</p></div>
		<a class="top_arrow" href="#"><h5>Top</h5><div class="triangle"></div></a>
	</div> <!-- end #footer -->
</div> <!-- end #page-wrap -->
	 
				
	<?php get_template_part('includes/scripts'); ?>

	<?php wp_footer(); ?>	
</body>
</html>