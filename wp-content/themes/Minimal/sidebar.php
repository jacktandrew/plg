<div id="sidebar" class="clearfix">
  <nav>
    <ul>
      <li><a href="#" data-link="recent_news">Recent News</a><div class="triangle"></div></li>
      <li><a href="#" data-link="popular">Popular</a><div class="triangle"></div></li>
      <li><a href="#" data-link="practice_areas">Practice Areas</a><div class="triangle"></div></li>
    </ul>
  </nav>

  <div class="popular">  
    <div class="side_box">
      <div class="form_box clearfix">
        <form>
          <div class="clearfix">
            <h1>Free Consultation</h1>
            <h6>Name:</h6><input type="text" size="25" /></br>
            <h6>Phone:</h6><input type="tel" size="25" /></br>
            <h6>Email:</h6><input type="email" size="25" /></br>
            <h6>Tell Us More:</h6><textarea rows="5" cols="13" /></textarea></br>
          </div>
          <input type="submit" class="submit" />
        </form>
        <div class="triangle"></div>
      </div>
    </div>
  
    <div class="side_box">
      <div class="contact clearfix">
        <div class="wrapper clearfix">
          <h1>Get In Touch</h1>
          <p>We are here to take your call 24 hours a day, 7 days a week</p>
          <div class="phone_location clearfix">
            <h5>Seattle</h5>
            <h5>Bellevue</h5>
            <h5>South King</h5>
            <h5>Call Toll Free</h5>
          </div>
          <div class="phone_number clearfix">
            <h5>(206) 285-1743</h5>
            <h5>(425) 214-1680</h5>
            <h5>(253) 359-9984</h5>
            <h5>(888) 852-0068</h5>
          </div>
        </div>
        <a class="chat_now" href=""></a>
        <div class="triangle"></div>
      </div>
    </div>
  
    <div class="side_box">
      <div class="from_blog clearfix">
        <div class="wrapper clearfix">
          <h1>From The Blog</h1>
          <div class="triangle"></div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="recent_news">
    <div class="side_box">
      <h1>What we are doing...</h1>
      <?php if ( ! dynamic_sidebar( 'Sidebar' ) ) : ?>
      <?php endif; ?>
      <div class="triangle"></div>
    </div>
    <div class="side_box">
      <h1>As featured in...</h1>
      <img class="media-logo" src="<?php bloginfo("template_url"); ?>/images/custom/media-logo.jpg" />
      <div class="triangle"></div>
    </div>
  </div>

</div> <!-- end sidebar -->

