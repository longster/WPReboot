<?php get_header(); ?>

<section id="content" class="container">
	<div class="row">
		<div class="col-md-8">
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'format/content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'format/content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('wpreboot_pagination') ) { wpreboot_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav" class="pager">
			<div class="previous"><?php next_posts_link( __( '&larr; Older posts', 'wpreboot' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpreboot' ) ); ?></div>
		</nav>
	<?php } ?>
		</div>
		<div class="col-md-4">
		<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>