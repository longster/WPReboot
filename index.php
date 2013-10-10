<?php get_header(); ?>

<header class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php if ( is_home() ) : // Blog ?>
				<h1 class="entry-title">Blog</h1>
			<?php elseif ( is_category() ) : // Category ?>
				<h1 class="entry-title"><?php single_cat_title(); ?></h1>
			<?php elseif ( is_tag() ) : // Tag ?>
				<h1 class="entry-title">Tag: <?php single_tag_title(); ?></h1>
			<?php elseif ( is_archive() ) : // Archive ?>
				<h1 class="entry-title">Archives: <?php single_month_title(' '); ?></h1>
			<?php elseif ( is_search() ) : // Search ?>
				<h1 class="entry-title"><?php _e('Search Results for', 'wpreboot'); ?> "<?php echo get_search_query(); ?>"</h1>
			<?php else :  // Others ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php endif;?>
			</div>
		</div>
	</div>
</header>

<section id="content" class="container">

	<div class="row">
		<div class="col-md-8">

	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'modules/content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'modules/content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('wpreboot_pagination') ) { wpreboot_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav" class="pager">
			<div class="previous"><?php next_posts_link( __( '&larr; Older posts', 'wpreboot' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpreboot' ) ); ?></div>
		</nav>
	<?php } ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>