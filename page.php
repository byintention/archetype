<?php get_header(); ?>
	<div id="content" class="<?php if ( has_post_thumbnail()) { echo 'noGap'; }?>">
		<div class="container grid">
			<?php if ( has_post_thumbnail()) { ?>
				<div class="twelve columns pageHeader">
					<p><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></p>
				</div> 
			<?php } ?>	
			<div class="twelve columns padded white shadow">
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