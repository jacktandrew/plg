<?php get_header(); ?>	
	<div id="content" class="clearfix">
		<div id="content-area"<?php if ( isset($fullWidthPage) && $fullWidthPage ) echo(' class="fullwidth_home"');?>>
			<div class="entry clearfix">
				<?php get_template_part('includes/entry'); ?>
			</div> <!-- end .entry -->
		</div> <!-- end #content-area -->	
	
<?php get_sidebar(); ?>
	</div> <!-- end #content --> 

<?php get_footer(); ?>	