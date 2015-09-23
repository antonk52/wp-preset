<?php
/**
 * The Footer widget areas
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */
?>
	  <?php if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ) || is_active_sidebar( 'third-footer-widget-area' ) || is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
      <div class="container">
    
        <div class="row">
        
          <div class="col-sm-3">
            <div class="footer-module">
              <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </div>
          </div>
        
          <div class="col-sm-3">
            <div class="footer-module">
              <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
            </div>
          </div>
        
          <div class="col-sm-3">
            <div class="footer-module">
              <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
            </div>
          </div>
          
          <div class="col-sm-3">
            <div class="footer-module">
              <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
            </div>
          </div>
        
        </div><!-- /.row -->
      
	  </div><!-- /.container -->
      <?php endif ; ?>
	  