<form role="search" method="get" id="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <div class="zopit-search-form">
		<input type="text" placeholder="<?php esc_attr_e('Search and hit enter&hellip;', 'zopit') ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
	 </div>
</form>