<?php
// Flexible Content Rows

if( have_rows('flexible_content') ){
	$field_object = get_field_object('flexible_content');
	
	$total_rows = count($field_object['value']);
	$counter = 0;
	while ( have_rows('flexible_content') ){
		
		the_row(); 
		$counter++; ?>


		<?php  // Full row 
		if( get_row_layout() == 'full' ){ ?>
		<section id="panel<?php echo $counter;?>" class="full clearfix <?php the_sub_field('background'); ?>">
			<div class="text fade-in" style="max-width: <?php the_sub_field('max_width'); ?>px;">
				<?php the_sub_field('content'); ?>
			</div>
		</section>
		<?php }  // end full row
		   
		
		elseif( get_row_layout() == 'filler' ){?>
			<div id="panel<?php echo $counter;?>" class="filler <?php the_sub_field('background'); ?>"></div>
		<?php }
		
		elseif( get_row_layout() == 'opener' ){?>
			<div id="panel<?php echo $counter;?>" class="opener <?php the_sub_field('classes'); ?>">
		<?php }
		
		elseif( get_row_layout() == 'closer' ){?>
			</div>
		<?php }
		
		   
		   
		elseif( get_row_layout() == 'banner_block' ){ ?>
		<section id="panel<?php echo $counter;?>" class="hero clear">
			
			<?php if(get_sub_field('full_width')) { ?>
					
				<?php if(get_sub_field('desktop_banner')) { 
					$mobileBanner =  get_sub_field('mobile_banner');
					$desktopBanner = get_sub_field('desktop_banner');
					?>
					<div class="banner">
						<picture>
							<source media="(max-width:599px)" srcset="<?php echo $mobileBanner['url']; ?>" width="<?php echo $mobileBanner['width']; ?>" height="<?php echo $mobileBanner['height']; ?>">
							<source media="(min-width:600px)" srcset="<?php echo $desktopBanner['url']; ?>" width="<?php echo $desktopBanner['width']; ?>" height="<?php echo $desktopBanner['height']; ?>">
							<img src="<?php echo $mobileBanner['url']; ?>" alt="<?php the_sub_field('alt_text'); ?>" style="width: 100%; height: auto;">
						</picture>
						<div class="inner">	
							<div class="container">
								<?php the_sub_field('banner_text'); ?>
							</div>
						</div>			
					</div>     
				<?php } else { ?>
				   <p class="negative">Please add a banner</p>
				<?php } ?>	
				
			<?php } else { ?>
				<div class="container grid">
					<div class="twelve columns">	
						<?php if(get_sub_field('desktop_banner')) { 
						$mobileBanner =  get_sub_field('mobile_banner');
						$desktopBanner = get_sub_field('desktop_banner');
						?>
						<div class="banner">
							<picture>
								<source media="(max-width:599px)" srcset="<?php echo $mobileBanner['url']; ?>" width="<?php echo $mobileBanner['width']; ?>" height="<?php echo $mobileBanner['height']; ?>">
								<source media="(min-width:600px)" srcset="<?php echo $desktopBanner['url']; ?>" width="<?php echo $desktopBanner['width']; ?>" height="<?php echo $desktopBanner['height']; ?>">
								<img src="<?php $mobileBanner['url']; ?>" alt="<?php the_sub_field('alt_text'); ?>" style="width: 100%; height: auto;">
							</picture>
							<div class="inner">		
								<?php the_sub_field('banner_text'); ?>
							</div>			
						</div>     
						<?php } else { ?>
			   		<p class="negative">Please add a banner</p>
				 		<?php } ?>	
					</div>
				</div>
			<?php } ?>
		</section>
		<?php } 
	
	
		elseif( get_row_layout() == 'filler' ){?>
			<section id="panel<?php echo $counter;?>" class="filler <?php the_sub_field('background'); ?>"></section>
		<?php }
			
		  
		elseif( get_row_layout() == 'testimonial' ){?>
		<section id="panel<?php echo $counter;?>" class="testimonials">
			<div class="container grid">
				<div class="slides">
				<?php if( have_rows('testimonials') ){

			  while ( have_rows('testimonials') ) : 
			  the_row(); ?>

				<div class="testimonial">	
					<blockquote>
						<?php the_sub_field('testimonial_text');?>
						<cite>
							<?php the_sub_field('testimonial_name');?>
							</cite>			
					</blockquote>
				</div> 
			
			  <?php endwhile;
			
				} else { ?>
			
			  <p class="negative">Please add some testimonials!</p>
			
				<?php }	?>
				</div>
			</div>
		</section>
		<?php }
	
	
		elseif( get_row_layout() == 'boxes' ){?>
		<section id="panel<?php echo $counter;?>" class="boxes <?php the_sub_field('classes');?> <?php the_sub_field('background'); ?>">
			<div class="container grid <?php the_sub_field('vertical_align'); ?>">
				<?php if( have_rows('boxes') ){
			  	while ( have_rows('boxes') ) { 
			  		the_row(); ?>
					<div class="box <?php the_sub_field('class');?>">	
						<?php the_sub_field('content');?>
					</div> 
			  	<?php }
				} else { ?>
				<p class="negative">Please add some boxes!</p>
				<?php }	?>

			</div>
		</section>
		<?php }
		
		  
		elseif( get_row_layout() == 'faq' ){?>
		<section id="panel<?php echo $counter;?>" class="faqs <?php the_sub_field('background'); ?>" itemscope="" itemtype="https://schema.org/FAQPage">
			<div class="container grid" style="max-width: <?php the_sub_field('max_width'); ?>px;">
				<div class="twelve columns">
				<?php if( have_rows('faqs') ){
			    while ( have_rows('faqs') ) : 
			    the_row(); ?>
					<div class="faq" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<button class="showFaq">Show answer<svg xmlns="http://www.w3.org/2000/svg" width="31" height="18" viewBox="0 0 31 18"><path fill="#666" fill-rule="evenodd" d="M26.1484098,0.655381305 C27.0320334,-0.218460435 28.4601777,-0.218460435 29.3372801,0.655381305 C30.217643,1.52922305 30.2241642,2.94106437 29.3372801,3.81490611 L16.5948416,16.3030175 C15.7144786,17.1768593 14.2895949,17.1768593 13.4027107,16.3030175 L0.660272211,3.81490611 C-0.220090737,2.94432497 -0.220090737,1.52922305 0.660272211,0.655381305 C1.54389576,-0.218460435 2.9720401,-0.218460435 3.84914244,0.655381305 L15.0036671,10.8969369 L26.1484098,0.655381305 L26.1484098,0.655381305 Z" transform="translate(.399 .658)"/></svg></button>	
						<h2 class="faq-question" itemprop="name"><?php the_sub_field('faq_question');?></h2>	
						<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"> 
							<?php the_sub_field('faq_answer');?>
						</div>			
					</div> 
			  	<?php endwhile;
				} else { ?>
			  		<p class="negative">Please add some FAQs!</p>
				<?php }	?>
				</div>
			</div>
		</section>
		<?php } 
		
		
		
		elseif( get_row_layout() == 'logos' ){?>
		<section id="panel<?php echo $counter;?>" class="logos">
			<div class="container grid" style="max-width: <?php the_sub_field('max_width'); ?>px;">
				
				<?php if( have_rows('logos') ){ ?>
				<div class="logos">
					<div class="slidesLogos>
				<?php while ( have_rows('logos') ) { 
	  			the_row(); ?>
					<div class="logo">	
						<a href="<?php the_sub_field('link');?>">
							<img src="<?php the_sub_field('image');?>" alt="<?php the_sub_field('name');?>" loading="lazy">
						</a>
					</div> 
	  				<?php }; ?>
	  				</div>
				</div>
				<?php } ?>
			</div>
		</section>
		<?php } 
			
	
		
		elseif( get_row_layout() == 'tabs' ){?>
		<section id="panel<?php echo $counter;?>" class="tabs">
			<div class="container grid" style="max-width: <?php the_sub_field('max_width'); ?>px;">
				<?php if( have_rows('tabs') ){
				$tabNo = 1;
				echo '<ul class="tabList" role="tablist" aria-label="Tabs">';
				while ( have_rows('tabs') ) { 
				the_row(); ?>
				<li id="tabLink<?php echo $tabNo;?>" class="<?php if($tabNo==1){echo 'active';} ?>">	
					<!--<a data-id="<?php echo $tabNo;?>"><?php the_sub_field('title');?></a>-->
					<button role="tab" id="tab-<?php echo $tabNo;?>" data-id="<?php echo $tabNo;?>" aria-selected="<?php if($tabNo==1){echo 'true';} else { echo 'false'; } ?>" aria-controls="panel-<?php echo $tabNo;?>"><?php the_sub_field('title');?></button>
				</li> 
				<?php 
				$tabNo++;
				}
				echo '</ul>';
				} ?>	
					
				<?php if( have_rows('tabs') ){
					$tabNo = 1; ?>
					<div class="tabsPanel clearfix">
			  		<?php while ( have_rows('tabs') ) { 
			 		the_row(); ?>
					<div id="panel-<?php echo $tabNo;?>" class="tabContent <?php if($tabNo==1){echo 'active';} ?>" role="tabpanel" aria-labelledby="tab-<?php echo $tabNo;?>">	
						<?php the_sub_field('content');?>
					</div> 
			    	<?php 
					$tabNo++;
					}
					echo '</div>';
			   	} ?>
				
			</div>
		</section>
		<?php } 
		
		
		elseif( get_row_layout() == 'accordion' ){?>
		<section id="panel<?php echo $counter;?>" class="accordion">
			<div class="container">
				<?php if( have_rows('accordion') ){
				$accordionNo = 1;
				while ( have_rows('accordion') ) { 
					the_row(); ?>
					<div id="accordion<?php echo $accordionNo;?>" class="accordionPanel <?php if($accordionNo==1){echo 'active';} ?>">	
						<h3><a data-id="<?php echo $accordionNo;?>"><?php the_sub_field('title');?></a></h3>
						<div class="inner">
						<?php the_sub_field('content');?>
						</div>
					</div> 
					<?php 
					$accordionNo++;
					}
				} ?>	
			</div>
		</section>
		<?php } 
		
		
		elseif( get_row_layout() == 'news' ){ ?>
		<section id="panel<?php echo $counter;?>" class="newsCards">
			
			<h2>Latest Articles</h2>
			
			<div class="container grid">
			
				<?php $news_query = new WP_Query('showposts=3');
					if ( $news_query -> have_posts() ) { 
						while ( $news_query -> have_posts() ) {
						$news_query -> the_post(); ?>
						<div class="card clearfix shadow rounded">
						<?php 
						if ( has_post_thumbnail() ) { ?>  
						  	<div class="newsThumb">	
							  	<a href="<?php the_permalink();?>">
							  	<?php the_post_thumbnail( 'medium' );?>
							  	</a>
						  		</div>
						<?php } else { ?>
						  	<div class="newsThumb">
							  <a href="<?php the_permalink(); ?>">
								  <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/placeholder.png" alt="<?php the_title(); ?>"> 
							  </a>
						  	</div>    
						<?php } ?>
							<div class="newsExcerpt">
								<h3><?php the_title();?></h3>
								<a href="<?php the_permalink();?>">Read more &raquo;</a>
							</div>
						</div>
					<?php } ?>
				<?php } ?>			
			</div>
		</section>
		<?php 
			wp_reset_query();
		} 
		
 
		elseif( get_row_layout() == 'text_and_image_block' ){?>
		<section id="panel<?php echo $counter;?>" class="textImage clear clearfix" style="background-image:url(<?php the_sub_field('text_and_image_block_image'); ?>);">
			<div class="container">
				<div class="text <?php the_sub_field('textbox_location'); ?>">
					<?php the_sub_field('text_and_image_block_content'); ?>
				</div>	
			</div>
		</section>
		<?php } 	
	
	

		  
		elseif( get_row_layout() == 'three_column' ){ ?>
		<section id="panel<?php echo $counter;?>" class="clearfix threeColumn <?php the_sub_field('vertical_align'); ?> <?php the_sub_field('class'); ?>">
			<div class="container grid">
				<div class="box">
					<?php the_sub_field('content_left'); ?>
				</div>
				<div class="box">
					<?php the_sub_field('content_middle'); ?>
				</div>
				<div class="box">
					<?php the_sub_field('content_right'); ?>
				</div>
			</div>
		</section>
		<?php } 
			
			
		elseif( get_row_layout() == 'two_column' ){ ?>
		<section id="panel<?php echo $counter;?>" class="clearfix twoColumn <?php the_sub_field('vertical_align'); ?> <?php the_sub_field('class'); ?>">
			<div class="container grid">
				<div class="box">
					<?php the_sub_field('content_left'); ?>
				</div>
				<div class="box">
					<?php the_sub_field('content_right'); ?>
				</div>
			</div>
		</section>
		<?php } 	
			
		
		
		elseif( get_row_layout() == 'gallery' ){?>
				<section id="panel<?php echo $counter;?>" class="clearfix gallery" >
					<?php  if( get_sub_field('title') ) { ?>
					<h2><?php the_sub_field('title'); ?></h2>
					<?php } ?>
					<div class="container grid" >			
						<div class="mygallery" itemscope itemtype="http://schema.org/ImageGallery">
						<?php
						//$counter = 1;
						$images = get_sub_field('images');
						if($images){
							foreach($images as $image){
						?>
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="one-quarter column" data-match-height="gallery-<?php echo $counter; ?>">			
							<a href="<?php echo $image['sizes']['large']; ?>" itemprop="contentUrl" data-size="<?php echo $image['width']; ?>x<?php echo $image['height']; ?>">
								<img src="<?php echo $image['sizes']['medium']; ?>" itemprop="thumbnail" alt="gallery image">
								<div class="overlay">
									<div class="expand">
										<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-zoom.svg" alt="zoom icon">
									</div>
								</div>
							</a>	
						</figure>
						<?php
							//$counter++;
							}
						}
						?>
						</div>
					</div>
				</section>
				
				<!-- Root element of PhotoSwipe. Must have class pswp. -->
				<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
				
				<!-- Background of PhotoSwipe. 
					 It's a separate element as animating opacity is faster than rgba(). -->
				<div class="pswp__bg"></div>
			
				<!-- Slides wrapper with overflow:hidden. -->
				<div class="pswp__scroll-wrap">
			
				<!-- Container that holds slides. 
					PhotoSwipe keeps only 3 of them in the DOM to save memory.
					Don't modify these 3 pswp__item elements, data is added later on. -->
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>
		
				<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
				<div class="pswp__ui pswp__ui--hidden">
		
				  <div class="pswp__top-bar">
		
					<!--  Controls are self-explanatory. Order can be changed. -->
					<div class="pswp__counter"></div>
		
					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
		
					<button class="pswp__button pswp__button--share" title="Share"></button>
		
					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
		
					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
		
					<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
					<!-- element will get class pswp__preloader--active when preloader is running -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
						  <div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						  </div>
						</div>
					</div>
				  </div>
		
				  <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					  <div class="pswp__share-tooltip"></div> 
				  </div>
		
				  <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
				  </button>
		
				  <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
				  </button>
		
				  <div class="pswp__caption">
					  <div class="pswp__caption__center"></div>
				  </div>
		
				</div>
			
				</div>
				
				</div>
				
				<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/photoswipe.min.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/photoswipe-ui-default.min.js"></script>
				
				<script>
				
					var initPhotoSwipeFromDOM = function(gallerySelector) {
		
			// parse slide data (url, title, size ...) from DOM elements 
			// (children of gallerySelector)
			var parseThumbnailElements = function(el) {
				var thumbElements = el.childNodes,
					numNodes = thumbElements.length,
					items = [],
					figureEl,
					linkEl,
					size,
					item;
		
				for(var i = 0; i < numNodes; i++) {
		
					figureEl = thumbElements[i]; // <figure> element
		
					// include only element nodes 
					if(figureEl.nodeType !== 1) {
						continue;
					}
		
					linkEl = figureEl.children[0]; // <a> element
		
					size = linkEl.getAttribute('data-size').split('x');
		
					// create slide object
					item = {
						src: linkEl.getAttribute('href'),
						w: parseInt(size[0], 10),
						h: parseInt(size[1], 10)
					};
		
		 
		
					if(figureEl.children.length > 1) {
						// <figcaption> content
						item.title = figureEl.children[1].innerHTML; 
					}
		
					if(linkEl.children.length > 0) {
						// <img> thumbnail element, retrieving thumbnail url
						item.msrc = linkEl.children[0].getAttribute('src');
					} 
		
					item.el = figureEl; // save link to element for getThumbBoundsFn
					items.push(item);
				}
		
				return items;
			};
		
			// find nearest parent element
			var closest = function closest(el, fn) {
				return el && ( fn(el) ? el : closest(el.parentNode, fn) );
			};
		
			// triggers when user clicks on thumbnail
			var onThumbnailsClick = function(e) {
				e = e || window.event;
				e.preventDefault ? e.preventDefault() : e.returnValue = false;
		
				var eTarget = e.target || e.srcElement;
		
				// find root element of slide
				var clickedListItem = closest(eTarget, function(el) {
					return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
				});
		
				if(!clickedListItem) {
					return;
				}
		
				// find index of clicked item by looping through all child nodes
				// alternatively, you may define index via data- attribute
				var clickedGallery = clickedListItem.parentNode,
					childNodes = clickedListItem.parentNode.childNodes,
					numChildNodes = childNodes.length,
					nodeIndex = 0,
					index;
		
				for (var i = 0; i < numChildNodes; i++) {
					if(childNodes[i].nodeType !== 1) { 
						continue; 
					}
		
					if(childNodes[i] === clickedListItem) {
						index = nodeIndex;
						break;
					}
					nodeIndex++;
				}
		
		
		
				if(index >= 0) {
					// open PhotoSwipe if valid index found
					openPhotoSwipe( index, clickedGallery );
				}
				return false;
			};
		
			// parse picture index and gallery index from URL (#&pid=1&gid=2)
			var photoswipeParseHash = function() {
				var hash = window.location.hash.substring(1),
				params = {};
		
				if(hash.length < 5) {
					return params;
				}
		
				var vars = hash.split('&');
				for (var i = 0; i < vars.length; i++) {
					if(!vars[i]) {
						continue;
					}
					var pair = vars[i].split('=');  
					if(pair.length < 2) {
						continue;
					}           
					params[pair[0]] = pair[1];
				}
		
				if(params.gid) {
					params.gid = parseInt(params.gid, 10);
				}
		
				return params;
			};
		
			var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
				var pswpElement = document.querySelectorAll('.pswp')[0],
					gallery,
					options,
					items;
		
				items = parseThumbnailElements(galleryElement);
		
				// define options (if needed)
				options = {
		
					// define gallery index (for URL)
					galleryUID: galleryElement.getAttribute('data-pswp-uid'),
								
								// Turn off share button
								shareEl: false,
								
					getThumbBoundsFn: function(index) {
						// See Options -> getThumbBoundsFn section of documentation for more info
						var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
							pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
							rect = thumbnail.getBoundingClientRect(); 
		
						return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
					}
		
				};
		
				// PhotoSwipe opened from URL
				if(fromURL) {
					if(options.galleryPIDs) {
						// parse real index when custom PIDs are used 
						// http://photoswipe.com/documentation/faq.html#custom-pid-in-url
						for(var j = 0; j < items.length; j++) {
							if(items[j].pid == index) {
								options.index = j;
								break;
							}
						}
					} else {
						// in URL indexes start from 1
						options.index = parseInt(index, 10) - 1;
					}
				} else {
					options.index = parseInt(index, 10);
				}
		
				// exit if index not found
				if( isNaN(options.index) ) {
					return;
				}
		
				if(disableAnimation) {
					options.showAnimationDuration = 0;
				}
		
				// Pass data to PhotoSwipe and initialize it
				gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
				gallery.init();
			};
		
			// loop through all gallery elements and bind events
			var galleryElements = document.querySelectorAll( gallerySelector );
		
			for(var i = 0, l = galleryElements.length; i < l; i++) {
				galleryElements[i].setAttribute('data-pswp-uid', i+1);
				galleryElements[i].onclick = onThumbnailsClick;
			}
		
			// Parse URL and open gallery if it contains #&pid=3&gid=1
			var hashData = photoswipeParseHash();
			if(hashData.pid && hashData.gid) {
				openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
			}
		};
		
		// execute above function
		initPhotoSwipeFromDOM('.mygallery');
					
				</script>
				
		<?php } // End Gallery Row 	
		
		
	} // end while
		
} else { ?>
	<!-- no flex layouts -->
<?php } // end if ?>