<?php
/**
 * @package rebootstrap
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<?php if ( is_single() ) : ?>
		<h1><?php the_title(); ?></h1>
	<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
	<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php wpreboot_entry_meta(); ?>
		</div>
	</header>

<?php if ( is_search()  ) : //|| is_category() || is_tag() Only display excerpts for search ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

<?php else : ?>

	<div class="entry-content">
		<?php the_content(__('Continue <span class="meta-nav">&rarr;</span>', 'wpreboot')); ?>
	</div>

<?php endif; ?>

	<footer>
		<? /*php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } */?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			
			<?php
	                /* translators: used between list items, there is a space after the comma */
	                $categories_list = get_the_category_list( __( ', ', 'wpreboot' ) );
	    
	                /* translators: used between list items, there is a space after the comma */
	                $tag_list = get_the_tag_list( '', __( ', ', 'wpreboot' ) );
	                if ( '' != $tag_list ) {
	                    $utility_text = __( 'Posted: %1$s | Tagged: %2$s', 'wpreboot' );
	                } elseif ( '' != $categories_list ) {
	                    $utility_text = __( 'Posted: %1$s', 'wpreboot' );
	                } else {
	                    $utility_text = __( 'Posted by <a href="%6$s">%5$s</a>', 'wpreboot' );
	                }
	    
	                printf(
	                    $utility_text,
	                    $categories_list,
	                    $tag_list,
	                    esc_url( get_permalink() ),
	                    the_title_attribute( 'echo=0' ),
	                    get_the_author(),
	                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
	                );
	            ?>
	            <?php edit_post_link( __( 'Edit', 'wpreboot' ), '<span class="edit-link">', '</span>' ); ?>
	    
	            <?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
	            	<?php get_template_part( '/modules/author-bio' ); ?>
	            <?php endif; ?>

            <?php endif; ?>
	</footer>
	<hr />
</article>