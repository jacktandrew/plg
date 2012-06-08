	  
<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<?php 
	$post_title = get_the_title();
	$width = 137;
	$height = 140;
	$classtext = 'thumbnail-post alignleft';
	
	$thumbnail = get_thumbnail($width,$height,$classtext,$post_title,$post_title);
	$thumb = $thumbnail["thumb"];
	
	if ($thumb != '') print_thumbnail($thumb, $thumbnail["use_timthumb"], $post_title, $width, $height, $classtext); ?>

<?php global $more;   
	  $more = 0; 
	  the_content(""); ?>