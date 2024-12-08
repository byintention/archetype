<?php
/**
 * Single blog post template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container grid blogPost">
	<div class="nine columns">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
			<div class="post white padded rounded shadow" id="post-<?php the_ID(); ?>">
				
				<div id="bread">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
				if ( function_exists( 'seopress_display_breadcrumbs' ) ) {
					seopress_display_breadcrumbs();
				}
				?>
				</div>
				
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="newsThumb">
					<img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>">
				</div>
				<?php } ?>

				<h1><?php the_title(); ?></h1>

				<p class="postMetadata clear">
					<span class="blogcat">Posted in <?php the_category( ', ' ); ?></span><span class="blogdate"><?php the_time( 'F jS, Y' ); ?> </span>    
				</p>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				<div id="comments">
					<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} else {
						?>
						<em>No comments yet</em>
						<?php
					}
					?>
				</div>
			</div>
				<?php
			}
		}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>