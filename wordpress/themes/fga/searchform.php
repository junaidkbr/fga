<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-term">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'fag' ); ?></span>

		<input type="search" id="search-term" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'fag' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>

	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'fag' ); ?>" />
</form>
