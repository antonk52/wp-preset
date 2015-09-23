<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */

	get_header(); ?>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <h2 class="center"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'bootstrapcanvaswp' ); ?></h2>
          <p class="center">
          <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bootstrapcanvaswp' ); ?></p>
		  <?php get_search_form(); ?>

        </div><!-- /.blog-main -->

        <?php get_sidebar(); ?>

      </div><!-- /.row -->
      
	<?php get_footer(); ?>