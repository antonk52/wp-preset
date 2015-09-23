<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * This can be overridden in child themes with content.php or
 * content-format.php, where 'format' is the content context
 * requested by a template. For example, content-aside.php would
 * be used if it exists and we ask for the content with:
 * <code>get_template_part( 'content', 'aside' );</code>
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */
?>
        <div class="entry clearfix">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bootstrapcanvaswp' ) ); ?>
        </div>
        