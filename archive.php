<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container blogListing">
	<div class="eight columns">
		<h1>Archives:<?php single_month_title( '&nbsp;' ); ?></h1>
		<?php get_template_part( 'includes/postloop' ); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>