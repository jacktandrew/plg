<?php get_header(); ?>
<?php if ( ( is_home() || is_front_page() ) && get_option('minimal_featured') == 'on') get_template_part('includes/featured');?>
<?php if (get_option('minimal_services') == 'on') { ?>
	<?php if (get_option('minimal_featured') == 'false') { ?>
		<div id="services_bg">
	<?php }; ?>
			<div id="services" class="clearfix">
						
				<div class="one-third first">
					<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('minimal_service_1')))); while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/service_content'); ?>
					<?php endwhile; wp_reset_query(); ?>
				</div> <!-- end .one-third -->
				
				<div class="one-third">
					<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('minimal_service_2')))); while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/service_content'); ?>
					<?php endwhile; wp_reset_query(); ?>
				</div> <!-- end .one-third -->
				
				<div class="one-third">
					<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('minimal_service_3')))); while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/service_content'); ?>
					<?php endwhile; wp_reset_query(); ?>
				</div> <!-- end .one-third -->
				
			</div> <!-- end #services -->
	<?php if (get_option('minimal_featured') == 'false') { ?>
		</div> <!-- end #services_bg -->
	<?php }; ?>		
<?php }; ?>

<?php get_template_part('includes/default'); ?>

<?php get_footer(); ?>