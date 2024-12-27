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
			'white',
			'shadow',
			'rounded',
		);
		?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
		<?php
		if ( has_post_thumbnail() ) {
			?>
		<div class="news-thumb">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="<?php the_title(); ?>">
			</a>
		</div>
		<div class="news-text padded">
			<?php if ( ! empty( $post->post_title ) ) { ?>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><em>Untitled</em></a></h2>
				<?php
			}
			$allowed = array(
				'a'      => array(
					'href'  => array(),
					'title' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
			);
			echo wp_kses( excerpt( 45 ), $allowed );
			?>
			<?php get_template_part( 'includes/meta' ); ?>
		</div>
			<?php
		} else {
			?>
		<div class="news-text wide padded">
			<?php if ( ! empty( $post->post_title ) ) { ?>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><em><?php echo esc_html__( 'untitled post', 'ARCHETYPE' ); ?></em></a></h2>
				<?php
			}
			$allowed = array(
				'a'      => array(
					'href'  => array(),
					'title' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
			);
			echo wp_kses( excerpt( 45 ), $allowed );
			?>
			<?php get_template_part( 'includes/meta' ); ?>
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
	<h2 class="center"><?php echo esc_html__( 'Not Found', 'ARCHETYPE' ); ?></h2>
	<p class="center"><?php echo esc_html__( "Sorry, but you are looking for something that isn't here.", 'ARCHETYPE' ); ?></p>
	<?php get_search_form(); ?>	
	<?php
}
?>