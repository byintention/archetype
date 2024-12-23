<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header();

if ( is_home() && ! is_front_page() ) {
	$our_title = get_the_title( get_option( 'page_for_posts', true ) );
	?>
	<div id="blog-header">
		<div class="container">
			<div class="twelve columns">
				<h1><?php echo esc_html( $our_title ); ?></h1>
			</div>
		</div>
	</div>
	<?php
}
?>
	<div id="content">
		<div class="container blog-listing">
			<div class="nine columns">
				<?php get_template_part( 'includes/postloop' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>