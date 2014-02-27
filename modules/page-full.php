<?php
/** page-full.php
 *
 * Template Name: Full Width
 *
 * @author		Long Duong
 * @package 	WPReboot
  */
get_header(); ?>


<?php if ( is_front_page() ) : ?>

<section class="jumbotron text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>WP<span>Reboot</span><br/>Theme Development</h1>
				<h2>A Responsive WordPress theme based on HTML5 Boilerplate using Bootstrap framework with CSS preprocessors development method.</h2>
			</div>
		</div>
	</div>
</section>

<section class="download text-center">
	<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-5">
			<div class="options">
				<h4>WPReboot : LESS</h4>
				<div class="btn-group btn-group-lg btn-group-justified">
					<a href="#" class="btn btn-primary">Download Zip</a>
					<a href="#" class="btn btn-primary">Fork</a>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="options">
				<h4>WPReboot : Sass/Scss</h4>
				<div class="btn-group btn-group-lg btn-group-justified">
					<a href="#" class="btn btn-primary">Download Zip</a>
					<a href="#" class="btn btn-primary">Fork</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<section id="content">	
		<?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( '/modules/content', 'page' ); ?>
        <?php endwhile; // end of the loop. ?>
</section><!-- #content -->

<?php else: ?>

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