<?php
/*
Template Name: Sidebar Left
*/
?><?php get_header(); ?>
    
    <div class="row">

        <?php if ( is_rtl() ) : ?>
        <div class="col-sm-8 blog-main-left">
        <?php else : ?>
        <div class="col-sm-8 blog-main-right">
        <?php endif; ?>

          <?php get_template_part( 'loop', 'page' ); ?>

        </div><!-- /.blog-main -->

        <?php get_sidebar(); ?>

      </div><!-- /.row -->
      
	<?php get_footer(); ?>