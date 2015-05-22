<?php
/**
 * Custom Child Theme Functions
 *
 * This file's parent directory can be moved to the wp-content/themes directory 
 * to allow this Child theme to be activated in the Appearance - Themes section of the WP-Admin.
 *
 * Included is a basic theme setup that will add support for custom header images and custom 
 * backgrounds. There are also a set of commented theme supports that can be uncommented if you need
 * them for backwards compatibility. If you are starting a new theme, these legacy functionality can be deleted.  
 *
 * More ideas can be found in the community documentation for Thematic
 * @link http://docs.thematictheme.com
 *
 * @package ThematicSampleChildTheme
 * @subpackage ThemeInit
 */


/* The Following add_theme_support functions 
 * will enable legacy Thematic Features
 * if uncommented.
 */
 
// add_theme_support( 'thematic_legacy_feedlinks' );
// add_theme_support( 'thematic_legacy_body_class' );
// add_theme_support( 'thematic_legacy_post_class' );
// add_theme_support( 'thematic_legacy_comment_form' );
// add_theme_support( 'thematic_legacy_comment_handling' );

/**
 * Define theme setup
 */
function childtheme_setup() {
	
	/*
	 * Add support for custom background
	 * 
	 * Allow users to specify a custom background image or color.
	 * Requires at least WordPress 3.4
	 * 
	 * @link http://codex.wordpress.org/Custom_Backgrounds Custom Backgrounds
	 */
	add_theme_support( 'custom-background' );
	
	
	/**
	 * Add support for custom headers
	 * 
	 * Customize to match your child theme layout and style.
	 * Requires at least WordPress 3.4
	 * 
	 * @link http://codex.wordpress.org/Custom_Headers Custom Headers
	 */
	add_theme_support( 'custom-header', array(
		// Header image default
		'default-image' => '',
		// Header text display default
		'header-text' => true,
		// Header text color default
		'default-text-color' => '000',
		// Header image width (in pixels)
		'width'	=> '940',
		// Header image height (in pixels)
		'height' => '235',
		// Header image random rotation default
		'random-default' => false,
		// Template header style callback
		'wp-head-callback' => 'childtheme_header_style',
		// Admin header style callback
		'admin-head-callback' => 'childtheme_admin_header_style'
		) 
	);
	
}
add_action('thematic_child_init', 'childtheme_setup');


/**
 * Custom Image Header Front-End Callback
 *
 * Defines the front-end style definitions for 
 * the custom image header.
 * This style declaration will be output in the <head> of the
 * document just before the closing </head> tag.
 * Inline Syles and !important declarations 
 * can be used to override these styles.
 *
 * @link http://codex.wordpress.org/Function_Reference/get_header_image get_header_image()
 * @link http://codex.wordpress.org/Function_Reference/get_header_textcolor get_header_textcolor()
 */
function childtheme_header_style() {
	?>	
	<style type="text/css">
	<?php
	/* Declares the header image from the settings
	 * saved in WP-Admin > Appearance > Header
	 * as the background-image for div#branding.
	 */
	if ( get_header_image() && HEADER_IMAGE != get_header_image() ) {
		?>
		#branding {
			background:url('<?php header_image(); ?>') no-repeat 0 100%;
			margin-bottom:28px;
    		padding:44px 0 <?php echo HEADER_IMAGE_HEIGHT; ?>px 0; /* Bottom padding is the same height as the image */
    		overflow: visible;
}
		}
		<?php if ( 'blank' != get_header_textcolor() ) { ?>
		#blog-title, #blog-title a {
			color:#000;
		}
		#blog-description {	
			padding-bottom: 22px;
		}
		<?php
		}
		
	}
	?>
	<?php
	/* This delcares text color for the Blog title and Description
	 * from the settings saved in WP-Admin > Appearance > Header\
	 * If not set the deafault color is set to #000 
	 */
	if ( get_header_textcolor() ) {
		?>
		#blog-title, #blog-title a, #blog-description {
			color:#<?php header_textcolor(); ?>;
		}
		<?php
	}
	/* Removes header text if the
	 * "Do not diplay header text…" setting is saved
	 * in WP-Admin > Appearance > Header
	 */
	if ( ! display_header_text() ) {
		?>
		#branding {
			background-position: center bottom;
			background-repeat: no-repeat;
			margin-top: 32px;
		}
		#blog-title, #blog-title a, #blog-description {
			display:none;
		}
		#branding { 
			height:<?php echo HEADER_IMAGE_HEIGHT; ?>px; 
			width:940px;
			padding:0; 
		}
		<?php
	}
	?>
	</style>
	<?php
}


/**
 * Custom Image Header Admin Callback
 *
 * Callback to defines the admin (back-end) style
 * definitions for the custom image header.
 * Customize the css to match your theme defaults.
 * The !important declarations override inline admin styles
 * to better represent a WYSIWYG of the front-end styling
 * that this child theme is currently designed to display.
 */
function childtheme_admin_header_style() {
	?>
	<style type="text/css">
	#headimg {
		background-position: left bottom; 
		background-repeat:no-repeat;
		border:0 !important;   
		height:auto !important;
		padding:0 0 <?php echo HEADER_IMAGE_HEIGHT + 22; /* change the added integer (22) to match your desired top padding */?>px 0;
		margin:0 0 28px 0;
	}
	
	#headimg h1 {
	    font-family:Arial,sans-serif;
	    font-size:34px;
	    font-weight:bold;
	    line-height:40px;
		margin:0;
	}
	#headimg a {
		color: #000;
		text-decoration: none;
	}
	#desc{
		font-family: Georgia;
    	font-size: 13px;
    	font-style: italic;
    }
	</style>
	<?php
}

/* Add HTML5 Doctype */
function html5_create_doctype($content) {
 $content = "<!DOCTYPE html>";
 $content .= "\n";
 $content .= "<html";
 return $content;
}
add_filter('thematic_create_doctype', 'html5_create_doctype');
 
//replace the lang attribute in the opening <html> tag...
function html5_language_attributes($content) {
  $content = "lang=\"en\"";
  return $content;
}
add_filter('language_attributes', 'html5_language_attributes');
 
//replace the <head> tag opening to remove the now defunct profile attribute and add the <meta charset="utf-8"> tag...
function html5_head($content) {
 $content = "<head>";
 $content .= "\n";
 $content .= "<meta charset=\"utf-8\">";
 $content .= "\n";
 return $content;
}
add_filter('thematic_head_profile', 'html5_head');
 
//remove the now defunct <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> tag...
function html5_create_charset($content) {
 $content = "";
 return $content;
}
add_filter('thematic_create_contenttype', 'html5_create_charset');

/*add viewport meta*/
function child_meta_keywords($description) {
$keywords_meta = "\t" . '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n\n";
return $description . $keywords_meta;
}
add_filter ('thematic_create_description','child_meta_keywords');

/*start of overrides*/

function childtheme_override_access() {
  ?>
  
  <?php
}

function childtheme_override_brandingopen() {

}

function childtheme_override_blogtitle() {

}

function childtheme_override_blogdescription() {

}

function childtheme_override_brandingclose() {

}

function childtheme_override_siteinfoopen() {

}

function childtheme_override_siteinfo() {

}

function childtheme_override_siteinfoclose() {

}

/*js*/

function childtheme_override_head_scripts() {
	$scriptdir = get_stylesheet_directory_uri();

	wp_enqueue_script('jquery');
	wp_deregister_script('jquery');
}

/* content functions */

function get_nail_art_accessories() {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => 'nail-art-accessories', 'posts_per_page' => -1, 'paged' => $paged));
	
	$nacs = $return->posts;

	if ($nacs) {

		echo '<div class="tool-set1">';
		$nacs_cnt = 1;
		$nacs_box_cnt = 1;
		foreach ($nacs as $nac) {
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($nac->ID), 'full' );
			?>
				<a href="<?php echo get_bloginfo('url'); ?>/wp-admin/admin-ajax.php?action=get-nail-art-accessory&amp;id=<?php echo $nac->ID; ?>" role="button" data-toggle="modal" data-target="#myModal"><div class="<?php echo ($nacs_box_cnt != 4) ? 'tool-imgbx1' : 'tool-imgbx2'; ?>">
					<div class="<?php echo (($nacs_box_cnt%2) == 0) ? 'g-yellow-orange' : 'g-pink-darkpink'; ?>">
						<div class="prod-pad">
							<img alt="" src="<?php echo $featuredImage[0]; ?>">
						</div>
					</div>
					<div class="nt-titlebx">
						<p><?php echo $nac->post_title; ?></p>
					</div>
				</div></a>
			<?php
			if ($nacs_cnt%4 == 0) {
				echo '</div><div class="tool-set1">';
				$nacs_box_cnt = 1;
			} else {
				$nacs_box_cnt += 1;
			}
			$nacs_cnt += 1;
		}
		echo '</div>';

	}
	wp_reset_postdata();
}

add_shortcode('nail-art-accessories', 'get_nail_art_accessories');


function get_nail_tools() {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => 'nail-tools', 'posts_per_page' => -1, 'paged' => $paged));
	
	$nacs = $return->posts;

	if ($nacs) {

		echo '<div class="tool-set1">';
		$nacs_cnt = 1;
		$nacs_box_cnt = 1;
		foreach ($nacs as $nac) {
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($nac->ID), 'full' );
			?>
				<a href="<?php echo get_bloginfo('url'); ?>/wp-admin/admin-ajax.php?action=get-nail-tool&amp;id=<?php echo $nac->ID; ?>" role="button" data-toggle="modal" data-target="#myModal"><div class="<?php echo ($nacs_box_cnt != 4) ? 'tool-imgbx1' : 'tool-imgbx2'; ?>">
					<div class="<?php echo (($nacs_box_cnt%2) == 0) ? 'g-yellow-orange' : 'g-pink-darkpink'; ?>">
						<div class="prod-pad">
							<img alt="" src="<?php echo $featuredImage[0]; ?>">
						</div>
					</div>
					<div class="nt-titlebx">
						<p><?php echo $nac->post_title; ?></p>
					</div>
				</div></a>
			<?php
			if ($nacs_cnt%4 == 0) {
				echo '</div><div class="tool-set1">';
				$nacs_box_cnt = 1;
			} else {
				$nacs_box_cnt += 1;
			}
			$nacs_cnt += 1;
		}
		echo '</div>';

	}
	wp_reset_postdata();
}

add_shortcode('nail-tools', 'get_nail_tools');


function get_nail_more_tools() {
	$passtool = str_replace("/", "", $_SERVER['REQUEST_URI']);
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => $passtool, 'posts_per_page' => -1, 'paged' => $paged));
	
	$nacs = $return->posts;

	if ($nacs) {

		echo '<div class="tool-set1">';
		$nacs_cnt = 1;
		$nacs_box_cnt = 1;
		foreach ($nacs as $nac) {
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($nac->ID), 'full' );
			?>
				<a href="<?php echo get_bloginfo('url'); ?>/wp-admin/admin-ajax.php?action=get-nail-tool&amp;type=<?php echo $passtool; ?>&amp;id=<?php echo $nac->ID; ?>" role="button" data-toggle="modal" data-target="#myModal"><div class="<?php echo ($nacs_box_cnt != 4) ? 'tool-imgbx1' : 'tool-imgbx2'; ?>">
					<div class="<?php echo (($nacs_box_cnt%2) == 0) ? 'g-yellow-orange' : 'g-pink-darkpink'; ?>">
						<div class="prod-pad">
							<img alt="" src="<?php echo $featuredImage[0]; ?>">
						</div>
					</div>
					<div class="nt-titlebx">
						<p><?php echo $nac->post_title; ?></p>
					</div>
				</div></a>
			<?php
			if ($nacs_cnt%4 == 0) {
				echo '</div><div class="tool-set1">';
				$nacs_box_cnt = 1;
			} else {
				$nacs_box_cnt += 1;
			}
			$nacs_cnt += 1;
		}
		echo '</div>';

	}
	wp_reset_postdata();
}

add_shortcode('nail-more-tools', 'get_nail_more_tools');

function get_list_all_categories(){
	global $wpdb;
	$query = "SELECT option_value from wp_options where option_name = 'cctm_data'";
	$data = $wpdb->get_results($query);	

	$serial = $data[0]->option_value;
	$serialarray = unserialize($serial);
	$categories = array();
	foreach($serialarray['post_type_defs'] as $key=>$inner){
		foreach($inner as $inKey=>$inval){
			if($inKey == 'post_type'){
				if($inval == 'colors' || $inval == 'home-page-slider' || $inval=='nail-tools'){}else{
					$categories[] = $inval;
				}
			}	
		}
	}
	
	//print_r($categories);
	$splice = array_chunk($categories, 2);
	
	foreach($splice as $data){	?>
		<div class="a-prodbx" style="margin-top: 20px; margin-bottom: 25px;">
		<?php
		if(is_array($data)){
			foreach($data as $keycate=>$categoryData){
			$post = get_page_by_title(str_replace("-", " ", $categoryData));
			?>
			<div class="<?php echo ($keycate==0)? 'nt-l-holder':'nt-r-holder' ?>">
			<div class="title-list2">
			<p><a href="<?php echo get_site_url().'/'.$categoryData; ?>"><?php echo ucwords(str_replace("-", " ", $categoryData)); ?></a></p>
			<p></p>
			</div>
			<div class="<?php echo ($keycate==0)? 'nt-l-inside':'nt-r-inside'?>">
			<div class="<?php echo ($keycate==0)? 'nt-pinkbx':'nt-orangebx'?>">
			<div class="prod-pad">
			<?php echo $post->post_content; ?>
			<div class="btn-bx4" style="margin-top: 20px;"><a class="button-c-blck" href="<?php echo get_site_url().'/'.$categoryData; ?>">more</a></div>
			<p></p>
			</div>
			</div>
			</div>
			</div>
			<?php
			}
		}
		?>
		</div>
	<?php
	}
	wp_reset_postdata();
}
add_shortcode('list-all-categories', 'get_list_all_categories');


function get_colors() {
	global $cfs;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	//$return = new WP_Query(array('post_type' => 'colors', 'posts_per_page' => -1, 'category_name'=>array(20, 15, 17, 19, 18, 10, 13, 23, 12, 16, 9)));
	$category_arr = array('classics','whites','skin','pinks','violets','oranges','browns','reds', 'grays', 'black', 'yellows', 'greens','blues', 'glitters');

	$tmparr = array();
	foreach($category_arr as $category){
		$return = new WP_Query(array('post_type' => 'colors', 'posts_per_page' => -1, 'category_name'=>$category));	
		$tmparr[] = $return->posts;
	}
	
	if($tmparr){
		foreach($tmparr as $data){
			if(is_array($data)){
				foreach($data as $color){
					$the_color = $cfs->get('colors_color', $color->ID);
					$bottle_texture = $cfs->get('bottle_texture', $color->ID);
					$bottle_type = $cfs->get('bottle_type', $color->ID);
					$selectedbottle = "";
					if(strlen($bottle_type) > 0){
									$selectedbottle = $bottle_type;    
					}else{
									$selectedbottle = get_stylesheet_directory_uri().'/assets/images/bottle-transparent-1.png';
					}

					$featured_on = $cfs->get('featured_social_media', $color->ID);
					$showstar = '';
					if(is_array($featured_on)){
						if(array_key_exists('instagram', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-instagram.png'.'" />';
						}elseif(array_key_exists('facebook', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-fb.png'.'" />';
						}elseif(array_key_exists('twitter', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-twitter.png'.'" />';
						}elseif(array_key_exists('pinterest', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-pinterest.png'.'" />';
						}elseif(array_key_exists('star', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-star.png'.'" />';
						}elseif(array_key_exists('color of the month', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-colorofthemonth.png'.'" />';
						}elseif(array_key_exists('envied', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-envied.png'.'" />';
						}elseif(array_key_exists('shared', 	$featured_on)){
							$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-shared.png'.'" />';
						}elseif(array_key_exists('none',     $featured_on)){
							$showstar = '';
						}	                        
					}	

					$usebottle = $cfs->get('use_uploaded_bottle', $color->ID);
					if(strlen($usebottle) > 0) {
						echo sprintf('<a href="%s" role="button" data-toggle="modal" data-target="#ColorModal" rel="tooltip" title="'.$color->post_title.'" style="position: relative;"><div class="cutix-container" style="background: none;"><div style="position: absolute; width: 37px; height: 37px;">'.$showstar.'</div><img src="'.$usebottle.'" alt="%s" /></div></a>', get_bloginfo('url') . '/wp-admin/admin-ajax.php?action=get-single-color&amp;id='.$color->ID, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, $selectedbottle, $color->post_title);
					}else{
						echo sprintf('<a href="%s" role="button" data-toggle="modal" data-target="#ColorModal" rel="tooltip" title="'.$color->post_title.'" style="position: relative;"><div class="cutix-container" style="background: %s 0px -10px;"><div style="position: absolute; width: 37px; height: 37px;">'.$showstar.'</div><img src="%s" alt="%s" /></div></a>', get_bloginfo('url') . '/wp-admin/admin-ajax.php?action=get-single-color&amp;id='.$color->ID, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, $selectedbottle, $color->post_title);				
					}
				}
			}
		}
	}

	/*
	$colors = $return->posts;

	if ($colors) {
		foreach ($colors as $color) {
			$the_color = $cfs->get('colors_color', $color->ID);
			$bottle_texture = $cfs->get('bottle_texture', $color->ID);
			$bottle_type = $cfs->get('bottle_type', $color->ID);
			$selectedbottle = "";
			if(strlen($bottle_type) > 0){
							$selectedbottle = $bottle_type;    
			}else{
							$selectedbottle = get_stylesheet_directory_uri().'/assets/images/bottle-transparent-1.png';
			}
			
			$usebottle = $cfs->get('use_uploaded_bottle', $color->ID);
			if(strlen($usebottle) > 0) {
				echo sprintf('<a href="%s" role="button" data-toggle="modal" data-target="#ColorModal" rel="tooltip" title="'.$color->post_title.'" style="position: relative;"><div class="cutix-container" style="background: none;"><img src="'.$usebottle.'" alt="%s" /></div></a>', get_bloginfo('url') . '/wp-admin/admin-ajax.php?action=get-single-color&amp;id='.$color->ID, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, $selectedbottle, $color->post_title);
			}else{
				echo sprintf('<a href="%s" role="button" data-toggle="modal" data-target="#ColorModal" rel="tooltip" title="'.$color->post_title.'" style="position: relative;"><div class="cutix-container" style="background: %s 0px -10px;"><img src="%s" alt="%s" /></div></a>', get_bloginfo('url') . '/wp-admin/admin-ajax.php?action=get-single-color&amp;id='.$color->ID, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, $selectedbottle, $color->post_title);				
			}
			#$the_color = get_post_meta($color->ID, 'colors_color', true);
			
		}
	}
	 * 
	 */

	wp_reset_postdata();
}

add_shortcode('colors', 'get_colors');

function get_color_tester_colors() {
	global $cfs;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => 'colors', 'posts_per_page' => -1));

	$colors = $return->posts;

	if ($colors) {
		foreach ($colors as $color) {

			$the_color = $cfs->get('colors_color', $color->ID);
			$bottle_texture = $cfs->get('bottle_texture', $color->ID);
			$the_desc = $cfs->get('color_description_1', $color->ID);
			$nail_polish_id = $cfs->get('nail_polish_id', $color->ID);
			$hand_texture = $cfs->get('hand_texture', $color->ID);
			$feet_texture = $cfs->get('feet_texture', $color->ID);

			$bottle_type = $cfs->get('bottle_type', $color->ID);
			$use_bottle = $cfs->get('use_uploaded_bottle', $color->ID);
			$show_in_tester = $cfs->get('show_in_nail_studio', $color->ID);
			
			$selectedbottle = "";
			if(strlen($bottle_type) > 0){
				$selectedbottle = $bottle_type;    
			}else{
				$selectedbottle = get_stylesheet_directory_uri().'/assets/images/bottle-transparent-1.png';
			}			

//			echo sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s" data-hand="%s" data-feet="%s"><img src="%s" alt="%s" title="%s" data-desc="%s" data-nailId="%s"></a></div>',($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($hand_texture) ? 'url('.$hand_texture.')' : $the_color, ($feet_texture) ? 'url('.$feet_texture.')' : $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png', $color->post_title, $color->post_title, $the_desc, $nail_polish_id);
//			echo sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s" data-hand="%s" data-feet="%s" data-bottle-type="'.$selectedbottle.'" data-bottle-upload="'.$use_bottle.'"><img src="%s" alt="%s" title="%s" data-desc="%s" data-nailId="%s"></a></div>',($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($hand_texture) ? 'url('.$hand_texture.')' : $the_color, ($feet_texture) ? 'url('.$feet_texture.')' : $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png', $color->post_title, $color->post_title, $the_desc, $nail_polish_id);			
			if(!$show_in_tester){
			echo sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s" data-hand="%s" data-feet="%s" data-bottle-type="'.$selectedbottle.'" data-bottle-upload="'.$use_bottle.'"><img src="%s" alt="%s" title="%s" data-desc="%s" data-nailId="%s"></a></div>',($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($hand_texture) ? 'url('.$hand_texture.')' : $the_color, ($feet_texture) ? 'url('.$feet_texture.')' : $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png', $color->post_title, $color->post_title, $the_desc, $nail_polish_id);	
			}
		}
	}

	wp_reset_postdata();
}

add_shortcode('color-tester-colors', 'get_color_tester_colors');

function get_featured_blog() {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => 'post', 'orderby' => 'rand', 'posts_per_page' => 1));

	$post = $return->posts[0];

	$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

	if ($post) {
		?>
			<img alt="" src="<?php echo $featuredImage[0]; ?>">
			<h1><?php echo $post->post_title; ?></h1>
			<p>&nbsp;</p>
			<p><?php echo $post->post_excerpt; ?></p>
			<p>&nbsp;</p>
			<div class="btn-bx4">
				<a href="<?php echo get_permalink($post->ID); ?>" class="button-prod-orange">more<span></span></a>
			</div>
		<?php
	}

	wp_reset_postdata();
}

add_shortcode('featured-blog', 'get_featured_blog');

function get_blogs() {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6));

	$posts = $return->posts;

	if ($posts) {
		echo '<div class="blg-line-separator">';
		$post_cnt = 1;
		$line_sep_cnt = 1;

		foreach($posts as $post) {
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			if ($line_sep_cnt == 1):
			?>
				<div class="blg-bx-l">
					<h1 class="blck"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h1>
					<p class="hr-txt" style="margin-bottom: 15px;"><?php echo date('l M d, Y' ,strtotime($post->post_date_gmt)); ?> - <?php echo time_elapsed_string(strtotime($post->post_date_gmt)); ?></p>
					<div class="g-lightblu-darkblu">
						<div class="prod-pad">
							<img alt="" width="212px" src="<?php echo $featuredImage[0]; ?>">
							<p><?php echo $post->post_excerpt; ?></p>
							<p>&nbsp;</p>
							<div class="btn-bx4">
								<a href="<?php echo get_permalink($post->ID); ?>" class="button-prod-orange">more<span></span></a>
							</div>
						</div>
					</div>
				</div>
			<?php
			elseif ($line_sep_cnt == 2):
			?>
				<div class="blg-bx-r">
					<h1 class="blck"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h1>
					<p class="hr-txt" style="margin-bottom: 15px;"><?php echo date('l M d, Y' ,strtotime($post->post_date_gmt)); ?> - <?php echo time_elapsed_string(strtotime($post->post_date_gmt)); ?></p>
					<div class="g-yellow-red">
						<div class="prod-pad">
							<img alt="" width="212px" src="<?php echo $featuredImage[0]; ?>">
							<p><?php echo $post->post_excerpt; ?></p>
							<p>&nbsp;</p>
							<div class="btn-bx4">
								<a href="<?php echo get_permalink($post->ID); ?>" class="button-blue">more<span></span></a>
							</div>
						</div>
					</div>
				</div>
			<?php
			endif;

			if ($post_cnt%2 == 0) {
				echo '</div><div class="blg-line-separator">';
				$line_sep_cnt = 1;
			} else {
				$line_sep_cnt += 1;
			}

			$post_cnt += 1;

		}
		echo '</div>';
	}

	wp_reset_postdata();
}

add_shortcode('get-blogs', 'get_blogs');

function get_home_slider() {
	global $cfs;
	$return = new WP_Query(array('post_type' => 'home-page-slider', 'posts_per_page' => 4));

	$sliders = $return->posts;
	if ($sliders) {
		echo '<div class="slides-container">';
		echo '<div id="slides" class="slider-holder">';
		foreach($sliders as $slider) {
			$slider_image = $cfs->get('home_slide_image', $slider->ID);
			$slider_desc = $cfs->get('home_slide_description', $slider->ID);
			$slider_url = $cfs->get('home_slide_url', $slider->ID);
			?>
			<div class="slide slider slide-box">
				<div class="imgbx">
					<img src="<?php echo $slider_image; ?>">
				</div>
				<div class="b-cont-r">
					<?php echo htmlspecialchars_decode($slider_desc); ?>
		      <div class="btn-bx1">
		        <a href="<?php echo $slider_url; ?>" class="button-banner">more<span></span></a>
		      </div>
				</div>
			</div>
			<?php
		}
		echo '</div>';
		echo '</div>';
	}
}

add_shortcode('get-home-slider', 'get_home_slider');

function time_elapsed_string($ptime) {
	$etime = time() - $ptime;

	if ($etime < 1)
	{
	    return '0 seconds';
	}

	$a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
	            30 * 24 * 60 * 60       =>  'month',
	            24 * 60 * 60            =>  'day',
	            60 * 60                 =>  'hour',
	            60                      =>  'minute',
	            1                       =>  'second'
	            );

	foreach ($a as $secs => $str)
	{
	    $d = $etime / $secs;
	    if ($d >= 1)
	    {
	        $r = round($d);
	        return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
	    }
	}
}

function get_colors_categories() {
	global $wpdb;
	$query = "SELECT $wpdb->terms.name, $wpdb->terms.slug
						FROM $wpdb->term_relationships
						  INNER JOIN $wpdb->posts
						    ON ($wpdb->term_relationships.object_id = $wpdb->posts.ID)
						  INNER JOIN $wpdb->term_taxonomy
						    ON ($wpdb->term_taxonomy.term_taxonomy_id = $wpdb->term_relationships.term_taxonomy_id)
						  INNER JOIN $wpdb->terms
						    ON ($wpdb->terms.term_id = $wpdb->term_taxonomy.term_id)
						WHERE $wpdb->posts.post_type = 'colors'
						GROUP BY $wpdb->terms.name";
	$data = $wpdb->get_results($query);

	return $data;
}

function get_posts_categories() {
	global $wpdb;
	$query = "SELECT $wpdb->terms.name, $wpdb->terms.slug
						FROM $wpdb->term_relationships
						  INNER JOIN $wpdb->posts
						    ON ($wpdb->term_relationships.object_id = $wpdb->posts.ID)
						  INNER JOIN $wpdb->term_taxonomy
						    ON ($wpdb->term_taxonomy.term_taxonomy_id = $wpdb->term_relationships.term_taxonomy_id)
						  INNER JOIN $wpdb->terms
						    ON ($wpdb->terms.term_id = $wpdb->term_taxonomy.term_id)
						WHERE $wpdb->posts.post_type = 'post' AND $wpdb->terms.slug != 'uncategorized'
						GROUP BY $wpdb->terms.name";
	$data = $wpdb->get_results($query);

	return $data;
}

function childtheme_override_category_loop() {
	while ( have_posts() ) : the_post(); 
		
		$image_id = get_post_meta(get_the_ID(), 'blog_header_image', true);
    $featuredImage = wp_get_attachment_image_src($image_id, 'full', true);
		?>
			<div class="blg-bx-set1">
			  <div class="blgin-imgbx1">
			    <a href="<?php echo get_permalink(get_the_ID()); ?>"><img alt="" src="<?php echo $featuredImage[0]; ?>"></a>
			  </div>
			  <h1><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title(); ?></a></h1>
				<p>&nbsp;</p>
				<?php echo wpautop(get_the_excerpt(), 1); ?>
	      <?php $comment_cnt = wp_count_comments(get_the_ID()); ?>
	      <div class="smedia">
	        <div class="sm-linkbx-l">
	          <ul>
	            <li>Posted under</li><li>
	            <?php echo the_category(' | </li><li> '); ?> |
	            </li>
	            <li><a href="<?php echo get_permalink(get_the_ID()); ?>#comments"><?php echo $comment_cnt->approved; ?> Comments »</a></li>
	          </ul>
	        </div>
	        <div class="smediabox">
	          <?php
	            echo do_shortcode('[sharethis]');
	          ?>
	        </div>
	      </div>
			</div>
		<?php

	endwhile;
}

/*ajax*/
function get_colors_ajax() {

	$html = '';
	global $cfs;

	if(!empty($_POST)) {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$return = new WP_Query(array('post_type' => 'colors', 'category_name' => $_POST['cat'], 'posts_per_page' => -1));

			$colors = $return->posts;

			if ($colors) {
				foreach ($colors as $color) {
					$the_color_hex = get_post_meta($color->ID, 'colors_color', true);
					$the_bottle_texture = $cfs->get('bottle_texture', $color->ID);

					$html .= sprintf('<a href="%s" role="button" data-toggle="modal" data-target="#ColorModal" rel="tooltip" title="'.$color->post_title.'" style="position: relative;"><div class="cutix-container" style="background:%s;"><img src="%s" alt="%s" /></div></a>', get_bloginfo('url') . '/wp-admin/admin-ajax.php?action=get-single-color&amp;id='.$color->ID, ($the_bottle_texture) ? 'url('.$the_bottle_texture.')' : $the_color_hex, get_stylesheet_directory_uri().'/assets/images/bottle-transparent-1.png', $color->post_title);
				}
			}

			wp_reset_postdata();
	}

	echo json_encode(array('html' => $html));

	die;
}

add_action( 'wp_ajax_get-colors', 'get_colors_ajax' );
add_action( 'wp_ajax_nopriv_get-colors', 'get_colors_ajax' );

function get_nail_tools_paginate() {
	$offset = $_POST['offset'];

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$return = new WP_Query(array('post_type' => 'nail-tools', 'posts_per_page' => -1, 'offset' => $offset, 'paged' => $paged));
	
	$nacs = $return->posts;

	$html = '';

	if ($nacs) {

		echo '<div class="tool-set1">';
		$nacs_cnt = 1;
		$nacs_box_cnt = 1;
		foreach ($nacs as $nac) {
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($nac->ID), 'full' );
			?>
				<a href="<?php echo get_bloginfo('url'); ?>/wp-admin/admin-ajax.php?action=get-nail-tool&amp;id=<?php echo $nac->ID; ?>" role="button" data-toggle="modal" data-target="#myModal"><div class="<?php echo ($nacs_box_cnt != 4) ? 'tool-imgbx1' : 'tool-imgbx2'; ?>">
					<div class="<?php echo (($nacs_box_cnt%2) == 0) ? 'g-yellow-orange' : 'g-pink-darkpink'; ?>">
						<div class="prod-pad">
							<img alt="" src="<?php echo $featuredImage[0]; ?>">
						</div>
					</div>
					<div class="nt-titlebx">
						<p><?php echo $nac->post_title; ?></p>
					</div>
				</div></a>
			<?php
			if ($nacs_cnt%4 == 0) {
				echo '</div><div class="tool-set1">';
				$nacs_box_cnt = 1;
			} else {
				$nacs_box_cnt += 1;
			}
			$nacs_cnt += 1;
		}
		echo '</div>';

	}
	wp_reset_postdata();
}

add_action( 'wp_ajax_get-nail-tools-ajax', 'get_nail_tools_paginate' );
add_action( 'wp_ajax_nopriv_get-nail-tools-ajax', 'get_nail_tools_paginate' );

function get_single_color_ajax() {
	global $cfs;
	$id = $_GET['id'];

	$query = new WP_Query( array('post_type' => 'colors', 'p' => $id) );

	$color = $query->posts;

	$the_color = $cfs->get('colors_color', $id);

	$bottle_texture = $cfs->get('bottle_texture', $id);

	$cat = get_the_category($color[0]->ID);

	$bottle_type = $cfs->get('bottle_type', $id);
	$usebottle = $cfs->get('use_uploaded_bottle', $id);	

	$featured_on = $cfs->get('featured_social_media', $id);
	$showstar = '';
	if(is_array($featured_on)){
		if(array_key_exists('instagram', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-instagram2.png'.'" />';
		}elseif(array_key_exists('facebook', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-fb2.png'.'" />';
		}elseif(array_key_exists('twitter', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-twitter2.png'.'" />';
		}elseif(array_key_exists('pinterest', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-pinterest2.png'.'" />';
		}elseif(array_key_exists('star', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-star2.png'.'" />';
		}elseif(array_key_exists('color of the month', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-colorofthemonth2.png'.'" />';
		}elseif(array_key_exists('envied', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-envied2.png'.'" />';
		}elseif(array_key_exists('shared', 	$featured_on)){
			$showstar = '<img src="'.get_stylesheet_directory_uri().'/assets/images/star-shared2.png'.'" />';
		}elseif(array_key_exists('none',     $featured_on)){
			$showstar = '';
		}		
	}	

	$short = wp_get_shortlink($id); 

?>
<div class="pop-mainbx">
<div class="pop-pad">
	<div class="pop-sn-holder">
		<div class="snico-bx">
			<a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($short); ?>"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-fb.png"></a>
		</div>
		<div class="snico-bx">
			<a onclick="return !window.open(this.href, 'Twitter', 'width=640,height=300')" href="https://twitter.com/share?url=<?php echo urlencode($short); ?>"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-twit.png"></a>
		</div>
		<div class="snico-bx">
			<a onclick="return !window.open(this.href, 'Pinterest', 'width=640,height=300')" href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode($short); ?>"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sn-icon-pinterest.png"></a>
		</div>
	</div>
	<div class="x-bx">
		<a href="#" class="close close-x" data-dismiss="modal" aria-hidden="true"></a>
	</div>
	<div class="pop-content1">
		<h1><?php echo $color[0]->post_title; ?></h1>
		<p><?php echo $cfs->get('color_description_1', $color[0]->ID); ?></p>
		<p>&nbsp;</p>
		<div style="position: absolute;" id="starcontainer"><?php echo $showstar; ?></div>
		<div class="pop-imgbx">
			<?php if(strlen($usebottle) > 0): ?>
				<img style="width:100px;" alt="<?php echo $color[0]->post_title; ?>" src="<?php echo $usebottle; ?>" />
			<?php else: ?>
				<?php if(strlen($bottle_type) > 0): ?>
					<img style="background:<?php echo ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color; ?>;width:100px;" alt="<?php echo $color[0]->post_title; ?>" src="<?php echo $bottle_type; ?>" />
				<?php else: ?>
					<img style="background:<?php echo ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color; ?>;width:100px;" alt="<?php echo $color[0]->post_title; ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bottle-zoom.png" />
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<p>&nbsp;</p>
		<p><?php echo $cfs->get('color_description_2', $color[0]->ID); ?></p>
		<small><?php echo $cfs->get('color_notes', $color[0]->ID); ?></small>
	</div>

	<?php

	wp_reset_postdata();

	$other_query = new WP_Query( array('post_type' => 'colors', 'post_status' => 'publish', 'cat' => $cat[0]->cat_ID, 'post__not_in' => array($color[0]->ID), 'posts_per_page' => -1) );
	$other_colors = $other_query->posts;

	?>

	<div class="pop-content2">
		<div class="other-sizebx">

			<?php if ($other_colors): ?>
				<div class="title-list2">
					<p><a href="#">Other Colors</a></p>
				</div>
				<div class="slider1">
				<?php $othersize_cnt=1;foreach($other_colors as $other_color): ?>
					<?php
						$the_other_color_hex = $cfs->get('colors_color', $other_color->ID);
						$the_other_bottle_texture = $cfs->get('bottle_texture', $other_color->ID);

						$other_bottle_type = $cfs->get('bottle_type', $other_color->ID);
						$other_usebottle = $cfs->get('use_uploaded_bottle', $other_color->ID);
						$other_desription = $cfs->get('color_notes', $other_color->ID);
						$featured_on_other = $cfs->get('featured_social_media', $other_color->ID);
						$showstar_other = '';
						if(is_array($featured_on_other)){
							if(array_key_exists('instagram', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-instagram.png';
							}elseif(array_key_exists('facebook', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-fb.png';
							}elseif(array_key_exists('twitter', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-twitter.png';
							}elseif(array_key_exists('pinterest', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-pinterest.png';
							}elseif(array_key_exists('star', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-star.png';
							}elseif(array_key_exists('color of the month', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-colorofthemonth.png';
							}elseif(array_key_exists('envied', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-envied.png';
							}elseif(array_key_exists('shared', 	$featured_on_other)){
								$showstar_other = get_stylesheet_directory_uri().'/assets/images/star-shared.png';
							}elseif(array_key_exists('none',     $featured_on_other)){
								$showstar_other = '';
							}		
						}
					?>
					<div class="slide os-holder1">
						<div>
							<div class="prod-pad" data-star="<?php echo $showstar_other; ?>">
								<?php if(strlen($other_usebottle) > 0): ?>
									<img alt="<?php echo $other_desription; ?>" src="<?php echo $other_usebottle; ?>">
								<?php else: ?>
									<?php if(strlen($other_bottle_type) > 0): ?>
										<img alt="<?php echo $other_desription; ?>" style="background:<?php echo ($the_other_bottle_texture) ? 'url('.$the_other_bottle_texture.')' : $the_other_color_hex; ?>;" src="<?php echo $other_bottle_type; ?>">
									<?php else: ?>
										<img alt="<?php echo $other_desription; ?>" style="background:<?php echo ($the_other_bottle_texture) ? 'url('.$the_other_bottle_texture.')' : $the_other_color_hex; ?>;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bottle-zoom.png">
									<?php endif; ?>
								<?php endif; ?>		
							</div>
						</div>
						<p><a href="#" class="pop-txtlink"><?php echo $other_color->post_title; ?></a></p>
					</div>					
				<?php $othersize_cnt+=1;endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
	<script type="text/javascript">
  jQuery('.slider1').bxSlider({
    slideWidth: 100,
    minSlides: 2,
    maxSlides: 4,
    slideMargin: 10
  });
	</script>
	</div>

</div>
</div>
<?php

	die;
}

add_action( 'wp_ajax_get-single-color', 'get_single_color_ajax' );
add_action( 'wp_ajax_nopriv_get-single-color', 'get_single_color_ajax' );

function get_nail_art_accessory() {
global $cfs;
$id = $_GET['id'];
$query = new WP_Query( array('post_type' => 'nail-art-accessories', 'p' => $id) );

$accessory = $query->posts;

$image_id = get_post_meta($id, 'nail_art_accessory_large_image', true);
$featuredImage = wp_get_attachment_image_src($image_id, 'full', true);

$other_colors = $cfs->get('nt_other_colors', $id);

?>
<div class="pop-mainbx">
<div class="pop-pad">
	<div class="pop-sn-holder">
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
	<div class="x-bx">
		<a href="#" class="close close-x" data-dismiss="modal" aria-hidden="true"></a>
	</div>
	<div class="pop-content1">
		<div class="pop-imgbx">
			<img alt="<?php echo $accessory[0]->post_title; ?>" src="<?php echo $featuredImage[0]; ?>">
		</div>
		<h1><?php echo $accessory[0]->post_title; ?></h1>
		<p>&nbsp;</p>
		<p><?php echo $accessory[0]->post_excerpt; ?></p>
	</div>
	<div class="pop-content2">
		<div class="other-sizebx">

			<?php if ($other_colors): ?>
				<div class="title-list2">
					<p><a href="#">Other sizes</a></p>
				</div>
				<div class="slider1">
				<?php $othercolor_cnt=1;foreach($other_colors as $other_color): ?>
					<div class="slide os-holder1">
						<div class="<?php echo ($othercolor_cnt%2==0) ? 'g-yellow-orange' : 'g-pink-darkpink'; ?>">
							<div class="prod-pad">
								<img alt="" src="<?php echo $other_color['nt_other_colors_image']; ?>">
							</div>
						</div>
						<p><a href="#" class="pop-txtlink"><?php echo $other_color['nt_other_colors_title']; ?></a></p>
					</div>					
				<?php $othercolor_cnt+=1;endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
	<script type="text/javascript">
  jQuery('.slider1').bxSlider({
    slideWidth: 139,
    minSlides: 2,
    maxSlides: 4,
    slideMargin: 10
  });
	</script>
	</div>
</div>
</div>
<?php

	die;
}

add_action( 'wp_ajax_get-nail-art-accessory', 'get_nail_art_accessory' );
add_action( 'wp_ajax_nopriv_get-nail-art-accessory', 'get_nail_art_accessory' );

function get_nail_tool() {
global $cfs;
$id = $_GET['id'];
$type = $_GET['type'];
$query = new WP_Query( array('post_type' => $type, 'p' => $id) );

$accessory = $query->posts;
//$image_id = get_post_meta($id, 'nail_tools_large_image', true);
if($type=='nail-art-accessories'){
	$image_id = get_post_meta($id, 'nail_art_accessory_large_image', true);	
}else{
	$image_id = get_post_meta($id, 'nail_tools_large_image', true);	
}
$featuredImage = wp_get_attachment_image_src($image_id, 'full', true);

//$other_products = $cfs->get('nt_other_products', $id);
//$other_products = $cfs->get('nt_other_colors', $id);

if($type=='nail-art-accessories'){
	$other_products = $cfs->get('nt_other_colors', $id);	
}else{
	$other_products = $cfs->get('nt_other_products', $id);
}

?>
<div class="pop-mainbx">
<div class="pop-pad">
	<div class="pop-sn-holder">
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
	<div class="x-bx">
		<a href="#" class="close close-x" data-dismiss="modal" aria-hidden="true"></a>
	</div>
	<div class="pop-content1">
		<div class="pop-imgbx">
			<img alt="<?php echo $accessory[0]->post_title; ?>" src="<?php echo $featuredImage[0]; ?>">
		</div>
		<h1><?php echo $accessory[0]->post_title; ?></h1>
		<p>&nbsp;</p>
		<small><?php echo $accessory[0]->post_excerpt; ?></small>
	</div>
	<div class="pop-content2">
		<div class="other-sizebx">
			<?php if ($other_products): ?>
				<div class="title-list2">
					<p><a href="#">Other Products</a></p>
				</div>
				<div class="slider1">
				<?php $othersize_cnt=1;foreach($other_products as $pro): ?>
					<div class="slide os-holder1">
						<div class="<?php echo ($othersize_cnt%2==0) ? 'g-yellow-orange' : 'g-pink-darkpink'; ?>">
							<div class="prod-pad">
								<?php if($type=='nail-art-accessories'): ?>
								<img class="smallimg" alt="<?php echo $pro['nt_other_colors_description']; ?>" src="<?php echo $pro['nt_other_colors_image']; ?>" style="height: 100%;" data-largeimage="<?php echo $pro['nt_zoom_display_image']; ?>">
								<?php else: ?>
								<img class="smallimg" alt="<?php echo $pro['nt_other_product_description']; ?>" src="<?php echo $pro['nt_other_product_image']; ?>" style="height: 100%;" data-largeimage="<?php echo $pro['nt_zoom_display_image']; ?>">
								<?php endif; ?>
							</div>
						</div>
						<?php if($type=='nail-art-accessories'): ?>
						<p><a href="#" class="pop-txtlink"><?php echo $pro['nt_other_colors_title']; ?></a></p>
						<?php else: ?>
						<p><a href="#" class="pop-txtlink"><?php echo $pro['nt_other_product_title']; ?></a></p>
						<?php endif; ?>			
					</div>					
				<?php $othersize_cnt+=1;endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
	<script type="text/javascript">
  jQuery('.slider1').bxSlider({
    slideWidth: 139,
    minSlides: 2,
    maxSlides: 4,
    slideMargin: 10
  });
	</script>
</div>
</div>
<?php

	die;
}

add_action( 'wp_ajax_get-nail-tool', 'get_nail_tool' );
add_action( 'wp_ajax_nopriv_get-nail-tool', 'get_nail_tool' );

function get_colors_by_cat_ajax() {
	$html = "";
	global $cfs;
	if (!empty($_POST)){
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$return = new WP_Query(array('post_type' => 'colors', 'category_name' => $_POST['cat'], 'posts_per_page' => -1));

		$colors = $return->posts;

		if ($colors) {
			foreach ($colors as $color) {
/*				$the_color = get_post_meta($color->ID, 'colors_color', true);
				$bottle_texture = $cfs->get('bottle_texture', $color->ID);
				$html .= sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s"><img src="%s" alt="%s" title="%s"></a></div>',$the_color, $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png', $color->post_title, $color->post_title);*/

			$the_color = $cfs->get('colors_color', $color->ID);
			$bottle_texture = $cfs->get('bottle_texture', $color->ID);
			$the_desc = $cfs->get('color_description_1', $color->ID);
			$nail_polish_id = $cfs->get('nail_polish_id', $color->ID);
			$hand_texture = $cfs->get('hand_texture', $color->ID);
			$feet_texture = $cfs->get('feet_texture', $color->ID);

			$bottle_type = $cfs->get('bottle_type', $color->ID);
			$use_bottle = $cfs->get('use_uploaded_bottle', $color->ID);
			$selectedbottle = "";
			if(strlen($bottle_type) > 0){
				$selectedbottle = $bottle_type;    
			}else{
				$selectedbottle = get_stylesheet_directory_uri().'/assets/images/bottle-transparent-1.png';
			}			
			
			$html .= sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s" data-hand="%s" data-feet="%s" data-bottle-type="'.$selectedbottle.'" data-bottle-upload="'.$use_bottle.'"><img src="%s" alt="%s" title="%s" data-desc="%s" data-nailId="%s"></a></div>',($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($hand_texture) ? 'url('.$hand_texture.')' : $the_color, ($feet_texture) ? 'url('.$feet_texture.')' : $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png', $color->post_title, $color->post_title, $the_desc, $nail_polish_id);

			}
		}

	}

	echo json_encode(array('html' => $html));
	wp_reset_postdata();

	die;
}

add_action( 'wp_ajax_get-colors-by-cat-ajax', 'get_colors_by_cat_ajax' );
add_action( 'wp_ajax_nopriv_get-colors-by-cat-ajax', 'get_colors_by_cat_ajax' );

function search_colors() {
	$html = "";
	global $cfs;
	
	if (!empty($_POST)){
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$return = new WP_Query(array('post_type' => 'colors', 'wpse18703_title' => $_POST['q']));

		$colors = $return->posts;

		if ($colors) {
			foreach ($colors as $color) {
/*				$the_color = get_post_meta($color->ID, 'colors_color', true);
				$html .= sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s"><img alt="" src="%s"></a></div>',$the_color, $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png');*/

				$the_color = $cfs->get('colors_color', $color->ID);
				$bottle_texture = $cfs->get('bottle_texture', $color->ID);
				$the_desc = $cfs->get('color_description_1', $color->ID);
				$nail_polish_id = $cfs->get('nail_polish_id', $color->ID);
				$hand_texture = $cfs->get('hand_texture', $color->ID);
				$feet_texture = $cfs->get('feet_texture', $color->ID);
				$html .= sprintf('<div class="color-container"><a href="#" style="background: %s;" canvass-data="%s" data-hand="%s" data-feet="%s"><img src="%s" alt="%s" title="%s" data-desc="%s" data-nailId="%s"></a></div>',($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($bottle_texture) ? 'url('.$bottle_texture.')' : $the_color, ($hand_texture) ? 'url('.$hand_texture.')' : $the_color, ($feet_texture) ? 'url('.$feet_texture.')' : $the_color, get_stylesheet_directory_uri().'/assets/images/color-circle-box.png', $color->post_title, $color->post_title, $the_desc, $nail_polish_id);

			}
		}

	}

	echo json_encode(array('html' => $html));
	wp_reset_postdata();

	die;
}

add_action( 'wp_ajax_search-colors', 'search_colors' );
add_action( 'wp_ajax_nopriv_search-colors', 'search_colors' );

add_filter( 'posts_where', 'wpse18703_posts_where', 10, 2 );
function wpse18703_posts_where( $where, &$wp_query )
{
    global $wpdb;
    if ( $wpse18703_title = $wp_query->get( 'wpse18703_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( like_escape( $wpse18703_title ) ) . '%\'';
    }
    return $where;
}

if (function_exists('st_makeEntries')) :
	add_shortcode('sharethis', 'st_makeEntries');
endif;

function prentr($s) {
	echo '<pre>';
	var_dump($s);
	echo '</pre>';
}