<?php
/**
 * The search results template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div id="blog-header">
	<div class="container">
		<div class="twelve columns">
			<h1><?php echo esc_html__( 'Search Results', 'ARCHETYPE' ); ?></h1>
			<p><?php echo esc_html__( 'You searched for:', 'ARCHETYPE' ); ?> <em><?php echo get_search_query(); ?></em></p>
		</div>
	</div>
</div>
<div id="content">
	<div class="container blog-listing">
	<div class="nine columns">
		<?php get_template_part( 'includes/postloop' ); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>