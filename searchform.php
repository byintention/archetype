<?php
/**
 * Custom search form template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

?>
<form role="search" method="get" id="searchform" action="<?php echo esc_html( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s">Search for:</label>
		<div id="search">
			<input type="text" value="" name="s" id="s"  placeholder="Search"/>
		</div>
		<input type="submit" id="searchSubmit" value="GO" class="btn btn-primary"/>
	</div>
</form>