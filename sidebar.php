<?php
/**
 * Blog sidebar template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

?>
<div class="four columns">
	<ul id="sidebar">
	<?php 
		if ( is_page() && is_active_sidebar( 'page-sidebar' ) ) {
			dynamic_sidebar( 'page-sidebar' );
		} elseif ( is_active_sidebar( 'blog-sidebar' ) ) {
			dynamic_sidebar( 'blog-sidebar' );
		}
	?>
	</ul>
</div>