<?php
/**
 * @package rebootstrap
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php wpreboot_entry_meta(); ?>
	</header>

<?php if ( is_search() || is_category() || is_tag() ) : // Only display Excerpts for search, category, or tag ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

<?php else : ?>

	<div class="entry-content">
		<?php the_content(__('Continue reading...', 'wpreboot')); ?>
	</div>

<?php endif; ?>

	<footer>
		<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr />
</article>