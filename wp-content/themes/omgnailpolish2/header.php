<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file. 
 * 
 * @package Thematic
 * @subpackage Templates
 */
 
	// Create doctype
	thematic_create_doctype();
	echo " ";
	language_attributes();
	echo ">\n";
	
	// Opens the head tag 
	thematic_head_profile();
	
	// Create the meta content type
	thematic_create_contenttype();
	
	// Create the title tag 
	thematic_doctitle();
	
	// Create the meta description
	thematic_show_description();
	
	// Create the tag <meta name="robots"  
	thematic_show_robots();
	
	// Legacy feedlink handling
	if ( current_theme_supports( 'thematic_legacy_feedlinks' ) ) {    
		// Creating the internal RSS links
		thematic_show_rss();
	
		// Create comments RSS links
		thematic_show_commentsrss();
	}
	
	// Create pingback adress
	thematic_show_pingback();
	
	/* The function wp_head() loads Thematic's stylesheet and scripts.
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();
?>

	<!-- Le scripts -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-1.8.2.min.js"><\/script>')</script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    var myVars = {};
    myVars.base_url = "<?php echo get_bloginfo('url'); ?>";
    myVars.admin_ajax = "<?php echo get_bloginfo('url'); ?>/wp-admin/admin-ajax.php";
  </script>
  <?php if ( is_page_template('colors.php') ): ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/spin.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.spin.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/colors.js"></script>
  <?php endif; ?>
  <?php if ( is_page_template('color-tester.php') ): ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/tabs.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/color-tester.js"></script>
  <?php endif; ?>
  <?php if ( is_page_template('nt-tools.php') || is_page_template('nt-accessories.php') || is_page_template('colors.php') ): ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/carousel/jquery.bxslider.min.js"></script>
  <?php endif; ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.slides.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
   <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/html5.js"></script>
   <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/respond.js"></script>
  <![endif]-->
  <!--[if gte IE 9]>
  <style type="text/css">
    .g-white-yellow, .g-white-gold, .g-white-blue, .blg-in-bx-r, .top-blue-bar, .top-pink-bar, .b-catlistbx1, .ctrl-bx1, .ctrl-bx2 {
       filter: none;
    }
  </style>
<![endif]-->

<?php if ( is_home() ) : ?>
<script type="text/javascript">
$.omg = {};
$.omg.banner = {
	init: function () {
		var _el = $('.slider-holder .slider');
		$.omg.banner.item.length = _el.length - 1;
		$.omg.banner.events();
		var _i = 0;
		_el.each( function () {
			$(this).attr('item', _i);
			var _class = _i == 0 ? ' class="active"' : '';
			$('.circle-bx ul').append('<li><a href="#" item="' + _i + '"' + _class + '></a>');
			_i++;
		} );
		$.omg.banner.image.load();
	},
	events: function () {
		$('a.control').click( function ( e ) {
			e.preventDefault();
			var _next = 0;
			var _active = $.omg.banner.item.active;
			if ( $(this).attr('class').match(/next/) ) {
				_next = _active + 1;
			} else {
				_next = _active - 1;
			}
			if ( _next >= 0 && _next <= $.omg.banner.item.length ) {
				$.omg.banner.item.active = _next;
				$('.slider[item=' + _active + ']').fadeOut(500);
				$('.slider[item=' + _next + ']').fadeIn(400);
				$('.circle-bx a').removeClass('active');
				$('.circle-bx a[item=' + _next + ']').addClass('active');
			}
			
		} );
	},
	item: {
		active: 0
	},
	image: {
		container: false,
		load: function () {
			if ( $.omg.banner.image.container ) {
				var _length = $.omg.banner.image.container.length;
				var _loaded = 0;
				$.omg.banner.image.container.load( function () {
					_loaded++;
					if ( _loaded == _length ) {
						var _height = $('.slider').first().height();
						console.log(_height);
						$('.wait').hide();
						$('.slider-holder').animate({
							height: _height + 'px',
							background: '#a23960'
						}, 300, 'linear', function () {
							$('.slider').first().show();
							$('.circle-bx').show();
							setTimeout( function () {
								$('.control').css('display', 'block').show();
							} );
						});
					}
				} );	
			}
		}
	}
}
$(document).ready( function () {
	$.omg.banner.image.container = $('.slider-holder img');
	$.omg.banner.init();
} );
$(window).resize( function () {
	$('.slider-holder').css('height', $('.slider').first().height() + 'px');
} );
</script>
<?php endif; ?>
</head>

<?php 
	// Create the body element and dynamic body classes
	thematic_body();

	// Action hook to place content before opening #wrapper
	thematic_before(); 
?>
<?php
// Action hook for placing content above the theme header
thematic_aboveheader(); 
?>

<?php 
// Action hook creating the theme header
thematic_header();
?>
		        
<?php
// Action hook for placing content below the theme header
thematic_belowheader();
?>
<div class="fx-wrapper">

	<div class="container">
		<div class="h-inside-bg">
			<div class="h-l-bx">
				<p class="h-txt">Connect with us</p>
				<div class="sn-holder">
					<div class="sn-main-holder">
						<div class="snico-bx">
							<a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-fb.png"></a>
						</div>
						<div class="snico-bx">
							<a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-twit.png"></a>
						</div>
						<div class="snico-bx">
							<a href="#"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-link.png"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="logobx">
				<a href="<?php echo get_bloginfo('url'); ?>"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-top.png"></a>
			</div>
		</div>
	</div>

    <div class="container">
      <?php
        $menu = array(
          'Home' => get_bloginfo('url').'/',
          'Colors' => get_bloginfo('url').'/colors',
          'Nail Tools' => get_bloginfo('url').'/nail-tools',
          'Opportunities' => get_bloginfo('url').'/opportunities',
          'Partners' => get_bloginfo('url').'/partners',
          'Contact Us' => get_bloginfo('url').'/contact-us',
          'About Us' => get_bloginfo('url').'/about-us',
          'Nail Studio' => get_bloginfo('url').'/omg-nail-studio',
          'Blog' => get_bloginfo('url').'/blog'
        );
      ?>

      <div class="nav-container">
        
        <div class="main-nav">
          <ul>
            <?php foreach ( $menu as $name => $link ) : ?>
            <?php
              $class = '';
              if ( ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_URI'] == $link) || ($name != 'Home' && preg_match('#' . $link . '#', $_SERVER['REQUEST_URI'])) )
              {
                $class = ' class="active"'; 
              }
            ?>
            <li<?php echo $class; ?>><a href="<?php echo $link; ?>"><?php echo strtoupper($name); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <nav>
          <a href="#" class="nav-btn pull-right" data-toggle="collapse" data-target=".nav-collapse"></a>
          <ul class="collapse nav-collapse">
            <?php foreach ( $menu as $name => $link ) : ?>
            <?php
              $class = '';
              if ( ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_URI'] == $link) || ($name != 'Home' && preg_match('#' . $link . '#', $_SERVER['REQUEST_URI'])) )
              {
                $class = ' class="active"'; 
              }
            ?>
            <li<?php echo $class; ?>><a href="<?php echo $link; ?>"><?php echo strtoupper($name); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </nav>

      </div><!-- .nav-container -->

    </div><!-- .container -->

<div class="container">