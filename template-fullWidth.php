<?php
/**
 * Template Name: Full width, no sidebar
 *
 * The full width page template for our theme, no sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
	<div id="content" <?php echo ( has_post_thumbnail() ) ? 'class="noGap"' : ''; ?>>
		<?php if ( has_post_thumbnail() ) { ?>
			<div id="pageHeader" class="hero">
				<div class="container">
					<div class="twelve columns">
						<div class="banner">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							<div class="inner centre">
								<h1><?php the_post_thumbnail_caption(); ?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>	
		<div class="container">
			<main class="twelve columns" role="main">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
			</main>
		</div>
	</div>
<?php get_footer(); ?>