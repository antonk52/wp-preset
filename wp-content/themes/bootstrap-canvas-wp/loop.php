<?php
/**
 * The loop that displays posts
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */
?>
	  <?php 
	  /* Start the Loop */
	  if (have_posts()) : while (have_posts()) : the_post(); 
	  $date_format = get_option( 'date_format' );
	  ?>
      <div class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- check if the post has a Post Thumbnail assigned to it. -->
        <?php if ( is_singular() && has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail( 'full' ); ?>
        <?php elseif ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
        </a>
        <?php endif; ?>
        <?php if ( !is_singular() ) : ?>
        <h2 class="blog-post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to ', 'bootstrapcanvaswp' ) . esc_attr( the_title_attribute() ); ?>">
        <?php the_title(); ?></a></h2>
        <?php else : ?>
        <h2 class="blog-post-title"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <?php if ( !get_the_title() ) : ?>
        <p class="blog-post-meta"><span class="glyphicon glyphicon-calendar"></span> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to ', 'bootstrapcanvaswp' ) . get_the_title() ? esc_attr( the_title_attribute() ) : esc_attr_e( '[No Title]', 'bootstrapcanvaswp' ); ?>"><?php the_time( $date_format ) ?></a> by <span class="glyphicon glyphicon-user"></span> <?php the_author_link() ?></p>
        <?php else : ?>
        <p class="blog-post-meta"><span class="glyphicon glyphicon-calendar"></span> <?php the_time( $date_format ) ?> by <span class="glyphicon glyphicon-user"></span> <?php the_author_link() ?></p>
        <?php endif; ?>

        <?php 
		/* Include the post format-specific template for the content. If you want to
		 * this in a child theme then include a file called called content-___.php
		 * (where ___ is the post format) and that will be used instead.
		 */
		get_template_part( 'content', get_post_format() ); ?>
        <?php
          $link_args = array(
            'before'           => '<ul class="pager">',
            'after'            => '</ul>',
            'next_or_number'   => 'next',
            'separator'        => '<li>',
            'nextpagelink'     => __( 'Next &rarr;', 'bootstrapcanvaswp' ),
            'previouspagelink' => __( '&larr; Previous', 'bootstrapcanvaswp' )
          );
          wp_link_pages( $link_args );
        ?>
        <p class="blog-post-meta">
        <?php if ( is_single() ) : ?>
        <span class="glyphicon glyphicon-folder-open"></span> Posted in <?php the_category(', ') ?> 
        <strong>|</strong>
        <?php endif; ?> 
        <?php if ( is_user_logged_in() ) : ?>
        <?php edit_post_link(__( 'Edit', 'bootstrapcanvaswp' ),'<span class="glyphicon glyphicon-pencil"></span> ','<strong> |</strong>'); ?> 
        <?php endif; ?> 
        <span class="glyphicon glyphicon-comment"></span> <?php comments_popup_link( __( 'No Comments', 'bootstrapcanvaswp' ), __( '1 Comment', 'bootstrapcanvaswp' ), __( '% Comments', 'bootstrapcanvaswp' ) ); ?></p>
        <?php if ( has_tag() ) : ?>
          <p class="blog-post-meta"><span class="glyphicon glyphicon-tags"></span> <?php the_tags( __( 'Tags: ', 'bootstrapcanvaswp' ) ); ?></p>
        <?php endif; ?>
        <?php comments_template(); ?>
      </div><!-- /.blog-post -->
      <!--
      <?php trackback_rdf(); ?>
      -->
      <?php endwhile; ?>

      <?php 
	  global $wp_query; 
	  if ( $wp_query->max_num_pages > 1 ) : 
	  ?>
      <nav>
        <ul class="pager">
          <li><?php next_posts_link( __( '<span class=\"meta-nav\">&larr;</span> Older posts', 'bootstrapcanvaswp' ) ); ?></li>
          <li><?php previous_posts_link( __( 'Newer posts <span class=\"meta-nav\">&rarr;</span>', 'bootstrapcanvaswp' ) ); ?></li>
        </ul>
      </nav>
      <?php endif; ?>
      
      <?php else : ?>
        <?php if ( current_user_can( 'edit_posts' ) ) :
			// Show a different message to a logged-in user who can add posts.
		?>
          <h2 class="center"><?php _e( 'No posts to display', 'bootstrapcanvaswp' ); ?></h2>
          <p class="center">
          <?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'bootstrapcanvaswp' ), admin_url( 'post-new.php' ) ); ?></p>
        <?php else :
			// Show the default message to everyone else.
		?>
          <h2 class="center"><?php _e( 'Nothing Found', 'bootstrapcanvaswp' ); ?></h2>
          <p class="center">
          <?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'bootstrapcanvaswp' ); ?></p>
		  <?php get_search_form(); ?>
        <?php endif; // end current_user_can() check ?>
      <?php endif; ?>