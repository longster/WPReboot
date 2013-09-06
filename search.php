<?php get_header(); ?>

<section id="content" class="container">	
	<div class="row">
<!-- Row for main content area -->
		<div class="col-md-8" role="main">
		
			<h2><?php _e('Search Results for', 'wpreboot'); ?> "<?php echo get_search_query(); ?>"</h2>
		
		<?php if ( have_posts() ) : ?>
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( '/module/content', get_post_format() ); ?>
			<?php endwhile; ?>
			
		<?php else : ?>
				<?php get_template_part( '/module/content', 'none' ); ?>
			
		<?php endif; // end have_posts() check ?>
		
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists('wpreboot_pagination') ) { wpreboot_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'wpreboot' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpreboot' ) ); ?></div>
			</nav><!-- #post-nav -->
		<?php } ?>

		</div><!-- .col-md-8 -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</section><!-- #content .container -->
		
<?php get_footer(); ?>