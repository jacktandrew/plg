<?php
if ( is_home() ){
	global $ids;
	if (get_option('minimal_duplicate') == 'false') {
		$args=array(
		   'showposts'=> (int) get_option('minimal_homepage_posts'),
		   'post__not_in' => $ids,
		   'paged'=>$paged,
		   'category__not_in' => (array) get_option('minimal_exlcats_recent'),
		);
	} else {
		$args=array(
		   'showposts'=> (int) get_option('minimal_homepage_posts'),
		   'paged'=>$paged,
		   'category__not_in' => (array) get_option('minimal_exlcats_recent'),
		);
	};
	query_posts($args);
}
if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $thumb = ''; 	  

		$width = (int) get_option('minimal_thumbnail_width_usual');
		$height = (int) get_option('minimal_thumbnail_height_usual');
		$classtext = 'thumbnail-post alignleft';
		$titletext = get_the_title();
		
		$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
		$thumb = $thumbnail["thumb"]; ?>
		
	<?php global $post;
		  $page_result = is_search() && ($post->post_type == 'page') ? true : false; ?>	
		  
	<h2 class="title<?php if ($page_result) echo(' page_result'); ?>"><a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__ ('Permanent Link to %s', 'Minimal'), $titletext) ?>"><?php the_title(); ?></a></h2>

	<?php if ((get_option('minimal_postinfo1') <> '') && !($page_result)) { ?>
		<?php get_template_part('includes/postinfo'); ?>
	<?php }; ?>

	<?php if($thumb <> '' && get_option('minimal_thumbnails_index') == 'on') { ?>
		<a href="<?php the_permalink() ?>" title="<?php printf(esc_attr__ ('Permanent Link to %s', 'Minimal'), $titletext) ?>">
			<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
		</a>
	<?php }; ?>

	<?php if (get_option('minimal_blog_style') == 'on') the_content(""); else { ?>
		<p><?php truncate_post(400); ?></p>
	<?php }; ?>
	<a class="readmore" href="<?php the_permalink(); ?>"><span><?php esc_html_e('Read More','Minimal'); ?></span></a>
	<div class="clear"></div>
<?php endwhile; ?>		
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
	else { ?>
		<?php get_template_part('includes/navigation'); ?>
	<?php } ?>
<?php else : ?>
	<?php get_template_part('includes/no-results'); ?>
<?php endif; if ( is_home() ) wp_reset_query(); ?>