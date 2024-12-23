<?php
/**
 * The search results template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container searchPage white rounded padded shadow">
	<h1><?php echo esc_html__( 'Search Results', 'archetype' ); ?></h1>
	<p><?php echo esc_html__( 'You searched for:', 'archetype' ); ?> <em><?php echo get_search_query(); ?></em> </p>
	<hr>
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?>
			<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<?php
			the_excerpt();
		}
		?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(); ?></div>
			<div class="alignright"><?php previous_posts_link(); ?></div>
		</div>
	<?php } else { ?>
		<p><?php echo esc_html__( 'No results for that keyword - please search again:', 'archetype' ); ?></p>
		<div id="searchWrapper">
			<?php get_search_form(); ?>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>