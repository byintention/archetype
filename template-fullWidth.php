<?php
/**
/* Template Name: Full width, no sidebar
/*
/* The full width page template for our theme, no sidebar.
/*
/* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
/*
/* @package archetype
*/

get_header(); ?>
	<div id="content" class="<?php if ( has_post_thumbnail() ) { echo 'noGap'; } ?>">
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
			<div class="twelve columns">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>