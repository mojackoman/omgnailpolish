<?php
/**
 * Category Template
 *
 * Displays an archive index of posts assigned to a Category. 
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Category_Templates Codex: Category Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	thematic_abovecontainer();
	$cats = get_posts_categories();
?>
		<div class="blg-in-bx-l">
      <div class="blgin-pad">
      	<?php thematic_page_title(); ?>
      	<?php thematic_categoryloop(); ?>
      	<?php wp_pagenavi(); ?>
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
	// action hook for placing content below #container
	thematic_belowcontainer();

	// calling the standard sidebar 
	thematic_sidebar();

	// calling footer.php
	get_footer();
?>