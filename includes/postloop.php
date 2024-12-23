<?php
/**
 * Post loop for Archetype theme
 *
 * @package Archetype
 */

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$classes = array(
			'clear',
			'padded',
			'white',
			'shadow',
			'rounded',
		);
		?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
		<?php
		if ( has_post_thumbnail() ) {
			?>
		<div class="newsText">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
		</div>
		<div class="newsThumb">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?>">
			</a>
		</div>
		<p class="post-metadata clear smallText">
			<span class="blogcat"><?php echo esc_html__( 'Posted in:', 'archetype' ); ?> <?php the_category( ', ' ); ?></span>
			<span class="blogdate"><?php the_time( 'F jS, Y' ); ?></span>
		</p>
			<?php
		} else {
			?>
		<div class="newsText wide">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<p class="post-metadata clear smallText">
				<span class="blogcat"><?php echo esc_html__( 'Posted in:', 'archetype' ); ?> <?php the_category( ', ' ); ?></span>
				<span class="blogdate"><?php the_time( 'F jS, Y' ); ?></span>
			</p>
		</div>
			<?php
		}
		?>
	</div>	
		<?php
	}
	?>
	<div class="navigation">
		<div class="navlink"><?php next_posts_link(); ?></div>
		<div class="navlink"><?php previous_posts_link(); ?></div>
	</div>
	<?php
} else {
	?>
	<h2 class="center"><?php echo esc_html__( 'Not Found', 'archetype' ); ?></h2>
	<p class="center"><?php echo esc_html__( "Sorry, but you are looking for something that isn't here.", 'archetype' ); ?></p>
	<?php get_search_form(); ?>	
	<?php
}
?>