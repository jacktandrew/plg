<?php $icon = get_post_meta($post->ID, 'Icon', true);
$tagline = get_post_meta($post->ID, 'Tagline', true); ?>

<?php if ($icon != '' ) { ?>
	<img src="<?php echo esc_attr($icon); ?>" alt="" class="icon" />
<?php } ?>
<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php if ($tagline != '' ) { ?>
	<p class="tagline"><?php echo wp_kses( $tagline, array( 'span' => array() ) );?></p>
<?php } ?>

<?php global $more;   
	  $more = 0;
	  the_content(""); ?>
 
<a href="<?php the_permalink(); ?>" class="readmore"><span><?php esc_html_e('Read more','Minimal'); ?></span></a>