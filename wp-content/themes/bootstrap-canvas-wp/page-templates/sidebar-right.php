<?php
/*
Template Name: Sidebar Right
*/
?><?php get_header(); ?>
    
    <div class="row">

        <div class="col-sm-8 blog-main-left">

          <?php get_template_part( 'loop', 'page' ); ?>

        </div><!-- /.blog-main -->

        <?php get_sidebar(); ?>

      </div><!-- /.row -->
      
	<?php get_footer(); ?>