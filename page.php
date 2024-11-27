<?php get_header(); ?>
	<div id="content">
		<div class="container grid">
			<?php if ( has_post_thumbnail()) { ?>
				<div class="twelve columns">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"> 
				</div> 
			<?php } ?>	
			<div class="twelve columns">
			<?php
				if ( have_posts() ) while ( have_posts() )
				{
					the_post();
					the_content();
				}
			?>	
			</div>
		</div>	
	</div>	
<?php get_footer(); ?>