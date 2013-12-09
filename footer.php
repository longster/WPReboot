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
    

<script type="text/javascript">
//Temporary Fix for IE viewport - http://timkadlec.com/2013/01/windows-phone-8-and-device-width/
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
var msViewportStyle = document.createElement("style");
msViewportStyle.appendChild(
    document.createTextNode(
        "@-ms-viewport{width:auto!important}"
    )
);
document.getElementsByTagName("head")[0].
    appendChild(msViewportStyle);
}
</script>

<?php wp_footer(); ?>

</body>
</html>