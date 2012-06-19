<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /> -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style-custom.css" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/js/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/js/jcoverflip/jcoverflip.css" type="text/css" media="screen" />

<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6style.css" />
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
  <script type="text/javascript">DD_belatedPNG.fix('img#logo, #header #search-form, #slogan, a#left_arrow, a#right_arrow, div.slide img.thumb, div#controllers a, a.readmore, a.readmore span, #services .one-third, #services .one-third.first img.icon, #services img.icon, div.sidebar-block .widget ul li');</script>
<![endif]-->
<!--[if IE 7]>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7style.css" />
<![endif]-->

<script type="text/javascript">
  document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>


<?php wp_enqueue_script('jQuery'); ?>
<?php wp_head(); ?>

<script src="<?php bloginfo("template_url"); ?>/js/jcoverflip/jQuery-ui.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/jcoverflip/jQuery.jcoverflip.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/nivoslider/jQuery.nivo.slider.pack.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/cloud-carousel/cloud-carousel.1.0.5.js"></script>
<script>
jQuery(function(){
  jQuery('#sidebar nav a').click(function(event){
    event.preventDefault();
    var link = jQuery(this).data('link')
    console.log(link)
    jQuery('#sidebar > div').hide();
    jQuery('#sidebar .' + link).show();
  });
  
  jQuery('#slider1').nivoSlider();

  jQuery("#carousel1").CloudCarousel({      
    xPos: 250,
    yPos: 32,
    buttonLeft: jQuery("#left-but"),
    buttonRight: jQuery("#right-but"),
    altBox: jQuery("#alt-text"),
    titleBox: jQuery("#title-text")
  });

  jQuery("ul.superfish.nav").addClass('shadow');
  jQuery("ul.superfish.nav > li > a").after("<div class='triangle'></div>");
  jQuery("ul.superfish.nav ul.children li").before("<div class='blocker'>");
  jQuery("ul.superfish.nav ul.children li").after("</div>");
});
</script>

</head>
<body<?php if (is_front_page()) echo(' id="home"'); ?>>
  <header class="custom">
    <div class="contact_box">
      <h4>Free Consultation</h4>
      <div class="phone_location">
        <h5>Call Toll Free</h5>
        <h5>Seattle Area</h5>
        <h5>South King County</h5>
      </div>
      <div class="phone_number">
        <h5>888.852.0068</h5>
        <h5>206.285.1743</h5>
        <h5>253.359.9984</h5>
      </div>
      <h6>Follow &nbsp; on:</h6>
      <a class="fb" href="http://www.facebook.com/premierlawgroup"></a>
      <a class="tw" href="http://twitter.com/premierlawgroup"></a>
      <a class="yt" href="http://www.youtube.com/user/CarAccidentAttorney1"></a>
      <a class="gp" href="https://plus.google.com/100614141035772243773/posts"></a>
      <!-- <a class="chat_now" href=""></a> -->
    </div>
    <div id="logo_custom"></div>
    <div class="clear"></div>
    <?php $menuClass = 'superfish nav clearfix';
    $primaryNav = '';
    
    if (function_exists('wp_nav_menu')) {
      $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
    };
    if ($primaryNav == '') { ?>
      <ul class="<?php echo $menuClass; ?>">
        <?php if (get_option('minimal_home_link') == 'on') { ?>
          <li <?php if (is_front_page()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','Minimal'); ?></a></li>
        <?php }; ?>

        <?php show_categories_menu($menuClass,false); ?>
        
        <?php show_page_menu($menuClass,false,false); ?>
      </ul> <!-- end ul.nav -->
    <?php }
    else echo($primaryNav); ?>
  </header>
    <div id="wrapper" class="clearfix">