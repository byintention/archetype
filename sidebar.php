<?php
/**
 * Blog sidebar template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

?>
<div class="three columns">
	<?php
	if ( is_page() && is_active_sidebar( 'page-sidebar' ) ) {
		echo '<div id="page-sidebar"><ul id="sidebar">';
		dynamic_sidebar( 'page-sidebar' );
		echo '</ul></div>';
	} elseif ( is_active_sidebar( 'blog-sidebar' ) ) {
		echo '<div id="blog-sidebar"><ul id="sidebar">';
		dynamic_sidebar( 'blog-sidebar' );
		echo '</ul></div>';
	}
	?>
	</ul>
</div>