<?php get_header(); ?>
<div class="container grid blogPost">    
    <div class="nine columns">
        <div id="bread">
	    <?php if ( function_exists('yoast_breadcrumb') ) {
	    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	    } ?>
        <?php if(function_exists("seopress_display_breadcrumbs")) {
            seopress_display_breadcrumbs();
        } ?>
        </div>
    
        <?php if (have_posts()) {
            while (have_posts()) {
                the_post(); ?> 
         
            <div class="post" id="post-<?php the_ID(); ?>">  
    	        
    	        <?php if ( has_post_thumbnail()) : ?>
		        <div class="newsThumb">
			        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>"> 
		        </div> 
		        <?php endif; ?>
    	        
                <h1 class="blog-title"><?php the_title(); ?></h1>  
				        
		        <p class="postMetadata clear">
                    <span class="blogcat">Posted in <?php the_category(', ') ?></span><span class="blogdate"><?php the_time('F jS, Y') ?> </span>    
                </p>
				        
                <div class="entry">   
      	             <?php the_content(); ?>  
                </div>  
                
                <div id="comments">
                    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    } else { ?>
                        No comments, soz
                    <?php } ?>
                </div>
            </div>  
            <?php } ?>        
        <?php } ?> 
    </div>
    <?php get_sidebar(); ?> 
</div>    
<?php get_footer(); ?> 