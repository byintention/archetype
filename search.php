<?php
/**
 * The search results template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container searchPage">
	<h1>Search Results</h1>
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			if ( has_post_thumbnail() ) {
				?>
				<div class="newsThumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?>"> 
					</a>
				</div>
			<?php } ?>
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
		<p>No results for that keyword - please search again:</p>
		<div id="searchWrapper">
			<?php get_search_form(); ?>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>