<?php
/**
 * Single blog post template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div id="content" class="<?php if ( has_post_thumbnail() ) { echo 'noGap'; } ?>">
<?php if ( has_post_thumbnail() ) { ?>
<div class="blog-image">
	<div id="pageHeader" class="hero">
		<div class="container">
			<div class="twelve columns">
				<div class="banner">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="container blog-post">
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
					yoast_breadcrumb();
				}
				if ( function_exists( 'seopress_display_breadcrumbs' ) ) {
					seopress_display_breadcrumbs();
				}
				?>
				</div>
				<h1><?php the_title(); ?></h1>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				<?php get_template_part( 'includes/meta' ); ?>
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