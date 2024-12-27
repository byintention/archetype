<?php
/**
 * Metadata output for Archetype theme
 *
 * @package Archetype
 */

?>
<p class="post-metadata clear">
	<span class="blog-cat"><?php echo esc_html__( 'Posted in:', 'ARCHETYPE' ); ?> <?php the_category( ', ' ); ?></span>
	<span class="blog-date"><?php the_time( 'F jS, Y' ); ?></span>
	<span class="blog-tag">
	<?php
	$posttags = get_the_tags();
	if ( $posttags ) {
		echo esc_html__( 'Tags: ', 'ARCHETYPE' );
		foreach ( $posttags as $posttag ) {
			echo '<a href="' . esc_attr( get_tag_link( $posttag->term_id ) ) . '">';
			echo esc_html( $posttag->name );
			echo '</a>';
			if ( next( $posttags ) ) {
				echo ', ';
			}
		}
	} else {
		echo 'Tags: none';
	}
	?>
</p>