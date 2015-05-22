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
    $image_id = get_post_meta(get_the_ID(), 'blog_header_image', true);
    $featuredImage = wp_get_attachment_image_src($image_id, 'full', true);
    $cats = get_posts_categories();
?>

    <div class="blg-in-bx-l">
      <div class="blgin-pad">
        <div class="blg-bx-set1">
          <div class="blgin-imgbx1">
            <a href="#"><img alt="" src="<?php echo $featuredImage[0]; ?>"></a>
          </div>
          <h1><?php echo get_the_title(); ?></h1>
          <p>&nbsp;</p>
          <?php echo wpautop(get_the_content(), 1); ?>
          <?php $comment_cnt = wp_count_comments(get_the_ID()); ?>
          <div class="smedia">
            <div class="sm-linkbx-l">
              <ul>
                <li>Posted under</li><li>
                <?php echo the_category(' | </li><li> '); ?> |
                </li>
                <li><a href="#comments"><?php echo $comment_cnt->approved; ?> Comments »</a></li>
              </ul>
            </div>
            <div class="smediabox">
              <?php
                echo do_shortcode('[sharethis]');
              ?>
            </div>
          </div>

        </div>
        <?php thematic_comments_template(); ?>
      </div>
    </div>
    <div class="blg-in-bx-r">
      <div class="blgin-pad">

        <div class="b-inbx1">
          <div class="top-blue-bar">
            <p class="b-inbx-title">URGENT POSTS</p>
          </div>
          <div class="b-catlistbx1">
            <div class="b-catlist-pad">
              <div class="list-setup1">
                <ul>
                  <?php
                    global $wpdb;

                    $latestposts = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' LIMIT 6");

                    foreach ($latestposts as $latest) {
                      echo sprintf('<li><a href="%s">%s</a></li>', get_permalink($latest->ID), $latest->post_title);
                    }
                  ?>
                </ul>
              </div>

            </div>
          </div>
        </div>
        <div class="b-inbx2">
          <div class="top-pink-bar">
            <p class="b-inbx-title">CATEGORIES</p>
          </div>
          <div class="b-catlistbx1">
            <div class="b-catlist-pad">
              <div class="list-setup2">
                <ul>
                  <?php foreach($cats as $cat): ?>
                    <li><a href="<?php echo get_bloginfo('url') ?>/category/<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
			
			<?php
				// action hook for placing content below #content
				thematic_belowcontent();
			?> 
		</div><!-- #container -->
		
<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();
?>