<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div id="blogHeader">
	<div class="container">
		<div class="twelve columns">
			<h1>Archives: <?php single_month_title( '&nbsp;' ); ?></h1>
		</div>
	</div>
</div>
<div id="content">
	<div class="container blogListing">
		<div class="eight columns">
			<?php get_template_part( 'includes/postloop' ); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>