<?php
/**
 * The template for displaying the Search Form
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */
 ?>
 <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
    <div class="input-group">
		<label class="sr-only" for="s"><?php _x( 'Search for:', 'label', 'bootstrapcanvaswp' ); ?></label>
		<input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'bootstrapcanvaswp' ); ?>" />
	</div>
    </div>
</form>

