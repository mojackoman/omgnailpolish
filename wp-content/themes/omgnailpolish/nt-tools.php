<?php
/**
 * Template Name: Nail Tools
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
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
				// action hook for inserting content above #content
				thematic_abovecontent();		
	    	
				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
			
				// calling the widget area 'page-top'
	            get_sidebar('page-top');
	
	            // start the loop
	            while ( have_posts() ) : the_post();
	            
	            // action hook for inserting content above #post
	            thematic_abovepost();
	        ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	#thematic_postheader();
	            ?>
	                
					<div class="entry-content">

	                    <?php
	                    	#the_content();
	                    
	                    	#wp_link_pages( "\t\t\t\t\t<div class='page-link'>" . __( 'Pages: ', 'thematic' ), "</div>\n", 'number' );
	                    
	                    	#edit_post_link( __( 'Edit', 'thematic' ), '<span class="edit-link">','</span>' );
	                    ?>

	          <div class="g-white-yellow nt-tools">
	          	<div class="pad1">
	          		<h3><?php echo get_the_title(); ?></h3>
	          		<?php echo do_shortcode('[nail-tools]'); ?>

								<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-body" style="overflow-y: visible;">
								  </div>
								</div>

	          	</div>
	          </div>

				    <div class="nt-btm-link">
							<div class="btm-btnbx1">
								<a id="more-tools-btn" href="<?php echo get_bloginfo('url'); ?>/nail-art-accessories" class="button-banner">more<span></span></a>
							</div>
							<div class="title-list">
								<p><a href="<?php echo get_bloginfo('url'); ?>/nail-art-accessories">Nail Art Accessories</a></p>
							</div>
						</div>
	
					</div>
					
				</div><!-- .post -->
	
			<?php
				// calls the do_action for inserting content below #post
	        	thematic_belowpost();
	        		        
	        	// action hook for calling the comments_template
       			#thematic_comments_template();
        		
	        	// end loop
        		endwhile;
	        
	        	// calling the widget area 'page-bottom'
	        	get_sidebar( 'page-bottom' );
	        ?>
	
			</div><!-- #content -->
			
			<?php 
				// action hook for inserting content below #content
				thematic_belowcontent(); 
			?> 
		</div><!-- #container -->

<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();
    
    // calling footer.php
    get_footer();
?>