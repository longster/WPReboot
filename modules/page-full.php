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
				<h1>WP<span class="highlight">Reboot</span><br/>WordPress Development</h1>
				<h2>A <span class="highlight">Responsive WordPress</span> theme based on <span class="highlight">HTML5 Boilerplate</span>, <span class="highlight">Bootstrap</span>, &amp; <span class="highlight">Grunt</span>. <span class="highlight">Extend CSS</span> with one of <span class="highlight">Two Most Popular CSS Preprocessors</span> development method.</h2>
			</div>
		</div><!-- .row -->
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
					<h4>WPReboot : Sass</h4>
					<div class="btn-group btn-group-lg btn-group-justified">
						<a href="#" class="btn btn-primary">Download Zip</a>
						<a href="#" class="btn btn-primary">Fork</a>
					</div>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .download  -->

<section id="content">	
		<?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( '/modules/content', 'page' ); ?>
        <?php endwhile; // end of the loop.  ?>
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