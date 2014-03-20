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
        <div class="hide">
        	<h2 class="quote text-center"><span class="highlight">Clean</span> &#183; <span class="highlight">Fast</span> &#183; <span class="highlight">Simple</span> &#183; <span class="highlight">Easy</span> &#183; <span class="highlight">Versatile</span></h2>

			<div class="container features">	
				<div class="row">
					<div class="col-md-6">
						<h3><span class="glyphicon glyphicon-th"></span>Bootstrap</h3>
						<p>Simple and flexible HTML, CSS, and Javascript for popular user interface components and interactions. Bootstrap is one of the most complete front-end toolkits out there with dozens of fully functional components ready to be put to use.</p>
					</div>
					<div class="col-md-6">
						<h3><span class="glyphicon glyphicon-th-list"></span>HTML5</h3>
						<p>HTML5 Boilerplate is the professional frontend developers’s base template for a fast, robust and future-safe site. You get the best of the best practices baked in: cross-browser normalization, performance optimizations, and more.</p>
					</div>
				</div><!-- .row -->
				<div class="row">	
					<div class="col-md-6 pull-right">
						<h3><span class="glyphicon glyphicon-resize-full"></span>Fully Responsive</h3>
						<p>Design and development in response to the user’s behavior and environment based on screen size, platform and orientation. Mix of flexible grids and layouts, images and an intelligent use of CSS media queries.</p>
					</div>
					<div class="col-md-6 pull-left">
						<h3><span class="glyphicon glyphicon-cog"></span>LESS or Sass</h3>
						<p>Both preprocessor tools are fantastic to work efficiently and quickly. Choose one of the options to build either in: LESS - a JavaScript library processed through client-side. Sass - Runs on Ruby and processed through server-side.</p>
					</div>
				</div><!-- .row -->
				<div class="row">
					<div class="col-md-6">
						<h3><span class="glyphicon glyphicon-flash"></span>Built for Speed</h3>
						<p>Lighter, faster and more advanced. Quickly build code from prototype to polished product.</p>
					</div>
					<div class="col-md-6">
						<h3><span class="glyphicon glyphicon-wrench"></span>Clean &amp; Lean Code</h3>
						<p>Lean markup using web standards without sacrificing the flexibility, utility, and speed across multi-devices.</p>
					</div>
				</div><!-- .row -->
			</div><!-- .container .features -->
        </div>
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