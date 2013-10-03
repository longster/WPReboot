<?php
/** page-full.php
 *
 * Template Name: Full Container Width
 *
 * @author		Long Duong
 * @package 	WPReboot
  */
get_header(); ?>

<section id="content" class="container">	
	<div class="row">
		<div class="col-md-12">
		<?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( '/modules/content', 'page' ); ?>
        <?php endwhile; // end of the loop. ?>
	    </div><!-- .col-md-12 -->
	</div><!-- .row -->
</section><!-- #content .container -->
<?php endif; ?>


<?php get_footer();?>