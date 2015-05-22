<?php
/**
 * Single Post Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();
?>

		<div id="container">
			
			<?php
				// action hook for placing content above #content
				thematic_abovecontent();
						
				// filter for manipulating the element that wraps the content 
				?>
				<div class="entry-content">
					<div class="whitebx">
						<div class="pad1">
							
				<?php
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
							
	            // start the loop
	            while ( have_posts() ) : the_post();
    	        
    	        // create the navigation above the content
				//thematic_navigation_above();
		
    	        // calling the widget area 'single-top'
    	       // get_sidebar('single-top');
		
    	        // action hook creating the single post
    	        //thematic_singlepost();
global $cfs;
$id = get_the_ID();
$query = new WP_Query( array('post_type' => 'colors', 'p' => $id) );
$color = $query->posts;													
$usebottle = $cfs->get('use_uploaded_bottle', $id);		
$bottle_type = $cfs->get('bottle_type', $id);
$the_color = $cfs->get('colors_color', $id);
$bottle_texture = $cfs->get('bottle_texture', $id);
													?>
							<h2><?php echo get_the_title(); ?></h2>
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
							<p><?php echo $cfs->get('color_description_1', $id); ?></p>
							<p><?php echo $cfs->get('color_description_2', $id); ?></p>
							<p><?php echo $cfs->get('color_notes', $id) ?></p>
							<?php
													/*
	global $cfs;
	$id = $_GET['id'];
	
	

	$color = $query->posts;

	$the_color = $cfs->get('colors_color', $id);

	$bottle_texture = $cfs->get('bottle_texture', $id);

	$cat = get_the_category($color[0]->ID);
	
	$bottle_type = $cfs->get('bottle_type', $id);
	$usebottle = $cfs->get('use_uploaded_bottle', $id);														
				*/
    	        // calling the widget area 'single-insert'
    	        //get_sidebar('single-insert');
		
							
    	        // create the navigation below the content
				//thematic_navigation_below();
		
       			// action hook for calling the comments_template
    	       // thematic_comments_template();
    	        
    	        // end the loop
        		endwhile;
		
    	        // calling the widget area 'single-bottom'
    	        //get_sidebar('single-bottom');
			?>
		
			</div><!-- #content -->
			
			<?php
				// action hook for placing content below #content
				//thematic_belowcontent();
			?>
			</div>
				</div>
		</div>
		</div><!-- #container -->
		
<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();
?>