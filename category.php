<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container blogListing">
	<div class="eight columns">
		<h1>Category:<?php single_cat_title( '&nbsp;' ); ?> </h1>
		<?php get_template_part( 'includes/postloop' ); ?>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>