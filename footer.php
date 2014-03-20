<hr>
<footer id="colophon">		
	<div class="container credit">
		<div class="row">
			<div class="col-md-12 text-center">
                <?php wp_nav_menu( array(
					'theme_location'	=>	'footer',
					'menu_class'		=>	'list-inline',
					'depth'				=>	2,
					'fallback_cb'		=>	'wpreboot_menu_fallback',
					'walker'			=>	new WPReboot_Nav_Walker,
				) );  ?>
			</div>
		</div>
		<div class="row text-center">
			<small class="col-md-12"><?php wpreboot_credits(); ?></small>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>