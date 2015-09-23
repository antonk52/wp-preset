<?php
/**
 * Template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */

	get_header(); ?>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <h1>
		  <?php 
		    if ( is_day() ) : 
		      printf( __( 'Daily Archives: <span>%s</span>', 'bootstrapcanvaswp' ), get_the_date() ); 
		    elseif ( is_month() ) : 
			  printf( __( 'Monthly Archives: <span>%s</span>', 'bootstrapcanvaswp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'bootstrapcanvaswp' ) ) ); 
			elseif ( is_year() ) : 
			  printf( __( 'Yearly Archives: <span>%s</span>', 'bootstrapcanvaswp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'bootstrapcanvaswp' ) ) );
			else : 
			  _e( 'Blog Archives', 'bootstrapcanvaswp' ); 
			endif; 
		  ?>
		  </h1>
          <hr /> 
		  <?php get_template_part( 'loop', 'archive' ); ?>

        </div><!-- /.blog-main -->

        <?php get_sidebar(); ?>

      </div><!-- /.row -->
      
	<?php get_footer(); ?>