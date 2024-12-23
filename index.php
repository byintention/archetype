<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header();
$our_title = get_the_title( get_option( 'page_for_posts', true ) );
?>
	<div id="blogHeader">
		<div class="container">
			<div class="twelve columns">
				<h1><?php echo esc_html( $our_title ); ?></h1>
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