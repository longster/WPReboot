<?php
/** page-full.php
 *
 * Template Name: Full Width
 *
 * @author		Long Duong
 * @package 	WPReboot
  */
get_header(); ?>


<?php if (is_front_page()) : ?>
<section class="jumbotron text-center">
  <div class="container">
  	<div class="row">
    	<h1>Wordpress Theme Development</h1>

    	<h2 class="col-md-offset-1 col-md-10">WPReboot is a Responsive WordPress theme based on HTML5 Boilerplate using Bootstrap or Foundation’s CSS preprocessors development method.</h2>

    
    	<div class="col-md-offset-1 col-md-5 "><a class="btn btn-primary btn-lg btn-block">WPReboot : Bootstrap / LESS</a></div>
    	<div class="col-md-5"><a class="btn btn-primary btn-lg btn-block">WPReboot : Foundation / Scss</a></div>
    </div>
  </div>
</section>

<section id="content">
	<div class="container">	
	<div class="row">
       	<h2 class="col-md-10 col-md-offset-1 text-center">CSS Development Methods</h2>
       	<h3 class="col-md-8 col-md-offset-2 text-center">Two most popular CSS preprocessors language that can extend CSS for front-end design and development.</h3>
	</div><!-- .row -->
	<div class="row methods">
		<div class="col-md-1 col-sm-1 col-xs-2"><img src="/wp-content/themes/wpreboot/assets/img/icon-b.png" /></div>
		<div class="col-md-5 col-sm-5 col-xs-10">
			<h3>Bootstrap’s Method</h3>
			<p>WPReboot Bootstrap includes LESS framework using Javascript method. Learn more about Bootstrap or LESS.</p>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-2"><img src="/wp-content/themes/wpreboot/assets/img/icon-f.png" /></div>
		<div class="col-md-5 col-sm-5 col-xs-10">
			<h3>Foundation's Method</h3>
			<p>WPReboot Foundation includes Sass/Scss framework using Ruby method. Learn more about Foundation or Scss/Sass.</p>
		</div>
	</div><!-- .row -->
	</div>
	<hr>
	<div class="container">	
	<div class="row">
		<h2 class="col-md-10 col-md-offset-1 text-center">Modern + Clean + Fast</h2>
	</div>
	<div class="row features">	
		<div class="col-md-4">
			<h3>Mobile First</h3>
			<p>Built for small devices first. Then, as devices get larger and larger, layer in more complexity.</p>
		</div>
		<div class="col-md-4">
			<h3>Lean Code</h3>
			<p>Lean markup without sacrificing the flexibility, utility, and speed across multi-devices</p>
		</div>
		<div class="col-md-4">
			<h3>Speed</h3>
			<p>Both CSS frameworks are lighter, faster and more advanced. Quickly code prototype to polished product.</p>
		</div>
		<div class="col-md-4 col-md-offset-4">
			<br/>
			<a class="btn btn-primary btn-lg btn-block">View All Features</a>
		</div>
	</div><!-- .row -->
	</div>
</section><!-- #content .container -->

<?php else: ?>

<section id="content" class="container">	
	<div class="row">
		<div class="col-md-12">
		<?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( '/module/content', 'page' ); ?>
        <?php endwhile; // end of the loop. ?>
	    </div><!-- .col-md-8 -->
	</div><!-- .row -->
</section><!-- #content .container -->
<?php endif; ?>


<?php get_footer();?>