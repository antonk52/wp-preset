<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */
?>
		<?php if ( is_page_template ( 'page-templates/sidebar-right.php' ) ) : ?>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar-right">
          <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
            <div id="search" class="sidebar-module widget widget_search">
				<?php get_search_form(); ?>
			</div>

			<div id="archives" class="sidebar-module widget widget_archive">
				<h4><?php _e( 'Archives', 'bootstrapcanvaswp' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</div>

			<div id="meta" class="sidebar-module widget widget_meta">
				<h4><?php _e( 'Meta', 'bootstrapcanvaswp' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
		  <?php endif; // end primary widget area ?>
        </div><!-- /.blog-sidebar -->
        <?php elseif ( is_page_template ( 'page-templates/sidebar-left.php' ) ) : ?>
        <?php if ( is_rtl() ) : ?> 
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar-right">
        <?php else : ?>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar-left">
        <?php endif; ?>
          <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
            <div id="search" class="sidebar-module widget widget_search">
				<?php get_search_form(); ?>
			</div>

			<div id="archives" class="sidebar-module widget widget_archive">
				<h4><?php _e( 'Archives', 'bootstrapcanvaswp' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</div>

			<div id="meta" class="sidebar-module widget widget_meta">
				<h4><?php _e( 'Meta', 'bootstrapcanvaswp' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
		  <?php endif; // end primary widget area ?>
        </div><!-- /.blog-sidebar -->
        <?php else: ?>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
            <div id="search" class="sidebar-module widget widget_search">
				<?php get_search_form(); ?>
			</div>

			<div id="archives" class="sidebar-module widget widget_archive">
				<h4><?php _e( 'Archives', 'bootstrapcanvaswp' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</div>

			<div id="meta" class="sidebar-module widget widget_meta">
				<h4><?php _e( 'Meta', 'bootstrapcanvaswp' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
		  <?php endif; // end primary widget area ?>
        </div><!-- /.blog-sidebar -->
        <?php endif; ?>