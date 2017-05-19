<?php
/**
 * The template for search form
 *
 */
?>

<div>
	<a class="open" href="#"><?php esc_html_e( 'Haku', 'theme_name' ); ?> <i class="icon-search"></i></a>
	<div class="popup">
		<form role="form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="input-row">
				<input type="search" name="s" placeholder="Haku" value="<?php echo get_search_query(); ?>">
				<button type="submit"><i class="icon-search"></i></button>
			</div>
		</form>
	</div>
</div>
