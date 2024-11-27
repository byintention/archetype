<?php get_header(); ?>
<div class="container grid">    
    <div class="nine columns">
    
    <h1>Events</h1>
    
    <h2>Upcoming Events</h2>
    
    <?php 
    $today = date( 'Ymd' );
    
    $args = array(
        'post_type' => 'event',
        'meta_key' => 'event_start_date',
        'posts_per_page' => -1,
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query'=> array(
          array(
            'key' => 'event_start_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'DATE'
          )
        ),
    ); 
    
    $home_query = new WP_Query($args);
    
        if ( $home_query -> have_posts() ) { 
            while ( $home_query -> have_posts() ) { 
                $home_query -> the_post(); ?>
        
        <div class="eventListingEvent">
        
            <?php 
            if ( has_post_thumbnail() ) { ?>  
              <div class="eventThumb">	
                  <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                  <?php the_post_thumbnail( 'large' );?>
                  </a>
              </div>
             <?php }?>
             
            <h3><?php the_title();?></h3>
            
            <p><?php the_field('event_start_date'); ?></p>
        
        </div>
        
        <?php } ?>
               
        <?php } else { ?>
        
            <p class="negative">Sorry, no future events to show</p>
        
        <?php } ?>
    
    <hr>
    
    <h2>Past Events</h2>
    
    <?php 
    $today = date( 'Ymd' );
    
    $args2 = array(
        'post_type' => 'event',
        'meta_key' => 'event_start_date',
        'posts_per_page' => 2,
        'pagination' => '1',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_query'=> array(
          array(
            'key' => 'event_start_date',
            'compare' => '<',
            'value' => $today,
            'type' => 'DATE'
          )
        ),
    ); 
    
    $home_query2 = new WP_Query($args2);
    
        if ( $home_query2 -> have_posts() ) { 
            while ( $home_query2 -> have_posts() ) { 
                $home_query2 -> the_post(); ?>
        
        <div class="eventListingEvent">
        
            <?php 
            if ( has_post_thumbnail() ) { ?>  
              <div class="eventThumb">	
                  <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                  <?php the_post_thumbnail( 'large' );?>
                  </a>
              </div>
             <?php }?>
             
            <h3><?php the_title();?></h3>
            
            <p><?php the_field('event_start_date'); ?></p>
        
        </div>
        
        <?php } ?>
        
        <div class="navigation">  
            <div class="alignleft"><?php next_posts_link('« Previous Entries') ?></div>  
            <div class="alignright"><?php previous_posts_link('Next Entries »') ?></div>  
        </div>
  
    <?php } else { ?>
    
        <p class="negative">Sorry, no past events to show</p>
   
    <?php } ?>
    
    
    </div>
    
    <?php get_sidebar(); ?> 
</div>   
<?php get_footer(); ?> 