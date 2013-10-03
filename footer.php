<hr>
<footer id="colophon">		
	<div class="container credit">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
                <?php wp_nav_menu( array(
					'theme_location'	=>	'footer',
					'menu_class'		=>	'list-inline',
					'depth'				=>	2,
					'fallback_cb'		=>	'wpreboot_menu_fallback',
					'walker'			=>	new WPReboot_Nav_Walker,
				) );  ?>
				<small class="clearfix"><?php wpreboot_credits(); ?></small>
			</div>
		</div>
	</div>
</footer>
    
<?php wp_footer(); ?>
	
</body>
</html>