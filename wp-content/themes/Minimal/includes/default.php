
<?php $fullWidthPage = is_page_template('page-full.php'); ?>

	<div id="content" class="clearfix<?php if ( $fullWidthPage ) echo(' pagefull_width'); if (get_option('minimal_featured') == 'false' && get_option('minimal_services') == 'false') echo(' nudge'); ?>">
		<div id="content-area">
			<?php if (get_option('minimal_blog_style') == 'false') { ?>
				<div class="entry clearfix<?php if (get_option('minimal_blog_style') == 'false') echo(' homepage'); ?>">
			<?php }; ?>	
					<?php if (is_page()) { //if static homepage 
							 if (have_posts()) : while (have_posts()) : the_post(); 
								get_template_part('includes/homepage_content');
							 endwhile; endif; 
						  } else {
							 if (get_option('minimal_blog_style') == 'on') get_template_part('includes/blogstyle_home'); 
								else { 
								  query_posts('page_id=' . get_pageId(html_entity_decode(get_option('minimal_home_page_1'))) ); while (have_posts()) : the_post(); 
									get_template_part('includes/homepage_content'); 
								  endwhile; wp_reset_query();
								}; 
						  }; ?>
						  
			<?php if (get_option('minimal_blog_style') == 'false') { ?>			  
				</div> <!-- end .entry -->
			<?php }; ?>	
		</div> <!-- end #content-area -->
		
		
		<?php if ( !$fullWidthPage ) { ?>
			<?php if (get_option('minimal_homepage_widgets') == 'on') { ?>
				<div id="sidebar">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Home') ) : ?> 
					<?php endif; ?>
				</div> <!-- end #sidebar -->
			<?php } else get_sidebar(); ?>
		<?php }; ?>
		
	</div> <!-- end #content --> 