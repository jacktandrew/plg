<?php 
/* 
Template Name: Full Width Page
*/
?>

<?php if (is_front_page()) { ?>
	<?php get_template_part('home'); ?>
<?php } else { ?>
	<?php get_header(); ?>		
		<div id="content" class="clearfix pagefull_width">
			<div id="content-area">			
				<div class="entry clearfix">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="title"><?php the_title(); ?></h1>
										
					<?php if (get_option('minimal_page_thumbnails') == 'on') { ?>
				
						<?php $width = get_option('minimal_thumbnail_width_pages');
						  $height = get_option('minimal_thumbnail_height_pages');
						  $classtext = 'thumbnail-post alignleft';
						  $titletext = get_the_title();
						
						  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
						  $thumb = $thumbnail["thumb"]; ?>
					
						<?php if($thumb <> '') { ?>
							<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
						<?php }; ?>
											
					<?php }; ?>
					
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','Minimal').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php edit_post_link(esc_html__('Edit this page','Minimal')); ?>
				<?php endwhile; endif; ?>
				</div> <!-- end .entry -->
							
				<?php if (get_option('minimal_show_pagescomments') == 'on') comments_template('', true); ?>
					
			</div> <!-- end #content-area -->	

		</div> <!-- end #content --> 
		
	<?php get_footer(); ?>
<?php } ?>	
	