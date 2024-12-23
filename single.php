<?php
/**
 * Single blog post template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div id="content" class="container blogPost">
	<div class="eight columns">
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
				<p class="blog-image">
					<img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>">
				</p>
				<?php } ?>
				<h1><?php the_title(); ?></h1>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				<p class="post-metadata clear">
					<span class="blogcat"><?php echo esc_html__( 'Posted in:', 'archetype' ); ?> <?php the_category( ', ' ); ?></span>
					<span class="blogdate"><?php the_time( 'F jS, Y' ); ?></span>    
				</p>
			</div>
			<div class="white padded rounded shadow" id="comment-list">
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				} else {
					?>
					<em><?php echo esc_html__( 'No comments yet.', 'archetype' ); ?></em>
					<?php
				}
				?>
			</div>
				<?php
			}
		}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>