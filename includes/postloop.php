<?php if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
	<div class="post clear padded white shadow rounded" id="post-<?php the_ID(); ?>">
		<?php if ( has_post_thumbnail()) { ?>
		<div class="newsText">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
		</div>
		<div class="newsThumb">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?>">
			</a>
		</div>
		<p class="postMetadata clear smallText">
			<span class="blogcat">Posted in <?php the_category( ', ' ); ?></span>
			<span class="blogdate"><?php the_time( 'F jS, Y' ); ?></span>
		</p>
		<?php } else { ?>
		<div class="newsText wide">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<p class="postMetadata clear smallText">
				<span class="blogcat">Posted in <?php the_category( ', ' ) ?></span>
				<span class="blogdate"><?php the_time('F jS, Y') ?></span>
			</p>
		</div>
		<?php } ?>
	</div>	
	<?php } ?>	
	<div class="navigation">
		<div class="navlink"><?php next_posts_link() ?></div>
		<div class="navlink"><?php previous_posts_link() ?></div>
	</div>
<?php } else { ?>
	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php get_search_form(); ?>	
<?php } ?>