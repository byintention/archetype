<?php
/**
 * The 404 error page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

get_header(); ?>
<div class="container searchPage">
	<div class="twelve columns">
		<h1><?php echo esc_html__( 'Not Found', 'ARCHETYPE' ); ?></h1>
		<p><?php echo esc_html__( "Sorry, that page doesn't exist. Please try searching:", 'ARCHETYPE' ); ?></p>
		<div id="searchwrapper">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>