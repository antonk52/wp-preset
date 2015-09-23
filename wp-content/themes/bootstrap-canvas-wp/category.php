<?php
/**
 * Template for displaying Category Archive pages
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */

	get_header(); ?>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <h1><?php printf( __( 'Category Archives: %s', 'bootstrapcanvaswp' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
		  <hr />
		  <?php get_template_part( 'loop', 'category' ); ?>

        </div><!-- /.blog-main -->

        <?php get_sidebar(); ?>

      </div><!-- /.row -->
      
	<?php get_footer(); ?>