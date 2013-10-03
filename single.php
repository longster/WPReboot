<?php get_header(); ?>

<section id="content" class="container">	
	<div class="row">
		<div class="col-md-12">
	
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part( '/modules/content', 'single' ); ?>
	<?php endwhile; // End the loop ?>

	    <nav id="nav-single" class="pager">
	            <span class="next"><?php next_post_link( '%link', sprintf( '%1$s <span class="meta-nav">&rarr;</span>', __( 'Next Post', 'wpbootstrap' ) ) ); ?></span>
	            <span class="previous"><?php previous_post_link( '%link', sprintf( '<span class="meta-nav">&larr;</span> %1$s', __( 'Previous Post', 'wpbootstrap' ) ) ); ?></span>
	    </nav><!-- #nav-single -->
	    <?php comments_template( '', true ); ?>
	
		</div><!-- .col-md-12 -->
	</div><!-- .row -->
</section><!-- #content .container -->

<?php get_footer(); ?>