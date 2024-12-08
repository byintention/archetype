<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container blogListing">
	<div class="eight columns">
		<h1>News &amp; Blog</h1>
		<?php get_template_part( 'includes/postloop' ); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>