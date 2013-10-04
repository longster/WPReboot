<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="row">
    	<div class="">
    		<label for="s" class="assistive-text hide"><?php _e( 'Search', 'wpreboot' ); ?></label>
    		<input type="search" class="search-query expand" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'wpreboot' ); ?>" />
    	</div>
    	<div class="">
    		<button type="submit" class="button prefix" name="submit" id="searchsubmit"><?php _e( 'Go', 'wpreboot' ); ?></button>
    	</div>
    </div>	
</form>