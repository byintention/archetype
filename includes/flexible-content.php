<?php
/**
 * Advanced Custom Fields Pro - Flexible Content Rows
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intention
 */

if ( have_rows( 'flexible_content' ) ) {
	$field_object = get_field_object( 'flexible_content' );
	$total_rows   = count( $field_object['value'] );
	$counter      = 0;
	while ( have_rows( 'flexible_content' ) ) {
		the_row();
		++$counter;


		if ( get_row_layout() === 'full' ) { ?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="full clearfix <?php the_sub_field( 'background' ); ?>">
			<div class="text fade-in" style="max-width: <?php the_sub_field( 'max_width' ); ?>px;">
				<?php the_sub_field( 'content' ); ?>
			</div>
		</section>
			<?php
			// end full row.



		} elseif ( get_row_layout() === 'filler' ) {
			?>
			<div id="panel<?php echo esc_attr( $counter ); ?>" class="filler <?php the_sub_field( 'background' ); ?>"></div>
			<?php



		} elseif ( get_row_layout() === 'opener' ) {
			?>
			<div id="panel<?php echo esc_attr( $counter ); ?>" class="opener <?php the_sub_field( 'classes' ); ?>">
			<?php



		} elseif ( get_row_layout() === 'closer' ) {
			?>
			</div>
			<?php



		} elseif ( get_row_layout() === 'banner_block' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="hero clear">
			<?php if ( get_sub_field( 'full_width' ) ) { ?>
				<?php
				if ( get_sub_field( 'desktop_banner' ) ) {
					$mobile_banner  = get_sub_field( 'mobile_banner' );
					$desktop_banner = get_sub_field( 'desktop_banner' );
					?>
				<div class="banner">
					<picture>
						<source media="(max-width:599px)" srcset="<?php echo esc_url( $mobile_banner['url'] ); ?>" width="<?php echo esc_attr( $mobile_banner['width'] ); ?>" height="<?php echo esc_attr( $mobile_banner['height'] ); ?>">
						<source media="(min-width:600px)" srcset="<?php echo esc_url( $desktop_banner['url'] ); ?>" width="<?php echo esc_attr( $desktop_banner['width'] ); ?>" height="<?php echo esc_attr( $desktop_banner['height'] ); ?>">
						<img src="<?php echo esc_url( $mobile_banner['url'] ); ?>" alt="<?php the_sub_field( 'alt_text' ); ?>">
					</picture>
					<div class="inner">
						<div class="container">
							<div class="twelve columns">
								<?php the_sub_field( 'banner_text' ); ?>
							</div>
						</div>
					</div>
				</div>
					<?php
				} else {
					?>
					<p class="negative">Please add a banner</p>
					<?php
				}
			} else {
				// Not full width.
				?>
				<div class="container grid">
					<div class="twelve columns">
						<?php
						if ( get_sub_field( 'desktop_banner' ) ) {
							$mobile_banner  = get_sub_field( 'mobile_banner' );
							$desktop_banner = get_sub_field( 'desktop_banner' );
							?>
						<div class="banner">
							<picture>
								<source media="(max-width:599px)" srcset="<?php echo esc_url( $mobile_banner['url'] ); ?>" width="<?php echo esc_attr( $mobile_banner['width'] ); ?>" height="<?php echo esc_attr( $mobile_banner['height'] ); ?>">
								<source media="(min-width:600px)" srcset="<?php echo esc_url( $desktop_banner['url'] ); ?>" width="<?php echo esc_attr( $desktop_banner['width'] ); ?>" height="<?php echo esc_attr( $desktop_banner['height'] ); ?>">
								<img src="<?php echo esc_url( $mobile_banner['url'] ); ?>" alt="<?php the_sub_field( 'alt_text' ); ?>">
							</picture>
							<div class="inner">		
								<?php the_sub_field( 'banner_text' ); ?>
							</div>			
						</div>     
							<?php
						} else {
							?>
						<p class="negative">Please add a banner</p>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}
			?>
		</section>
			<?php
			// End banner row.



		} elseif ( get_row_layout() === 'testimonial' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="testimonials">
			<div class="container grid">
				<div class="slides">
				<?php
				if ( have_rows( 'testimonials' ) ) {
					while ( have_rows( 'testimonials' ) ) {
						the_row();
						?>
					<div class="testimonial">
						<blockquote>
							<?php the_sub_field( 'testimonial_text' ); ?>
							<cite>
								<?php the_sub_field( 'testimonial_name' ); ?>
							</cite>
						</blockquote>
					</div> 
						<?php
					}
				} else {
					?>
				<p class="negative">Please add some testimonials!</p>
					<?php
				}
				?>
				</div>
			</div>
		</section>
			<?php
			// End testimonials.



		} elseif ( get_row_layout() === 'boxes' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="boxes <?php the_sub_field( 'classes' ); ?> <?php the_sub_field( 'background' ); ?>">
			<div class="container grid <?php the_sub_field( 'vertical_align' ); ?>">
				<?php
				if ( have_rows( 'boxes' ) ) {
					while ( have_rows( 'boxes' ) ) {
						the_row();
						?>
					<div class="box <?php the_sub_field( 'class' ); ?>">	
						<?php the_sub_field( 'content' ); ?>
					</div> 
						<?php
					}
				} else {
					?>
				<p class="negative">Please add some boxes!</p>
					<?php
				}
				?>
			</div>
		</section>
			<?php
			// End boxes.



		} elseif ( get_row_layout() === 'faq' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="faqs <?php the_sub_field( 'background' ); ?>" itemscope="" itemtype="https://schema.org/FAQPage">
			<div class="container grid" style="max-width: <?php the_sub_field( 'max_width' ); ?>px;">
				<div class="twelve columns">
				<?php
				if ( have_rows( 'faqs' ) ) {
					while ( have_rows( 'faqs' ) ) {
						the_row();
						?>
					<div class="faq" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<button class="showFaq">Show answer<svg xmlns="http://www.w3.org/2000/svg" width="31" height="18" viewBox="0 0 31 18"><path fill="#666" fill-rule="evenodd" d="M26.1484098,0.655381305 C27.0320334,-0.218460435 28.4601777,-0.218460435 29.3372801,0.655381305 C30.217643,1.52922305 30.2241642,2.94106437 29.3372801,3.81490611 L16.5948416,16.3030175 C15.7144786,17.1768593 14.2895949,17.1768593 13.4027107,16.3030175 L0.660272211,3.81490611 C-0.220090737,2.94432497 -0.220090737,1.52922305 0.660272211,0.655381305 C1.54389576,-0.218460435 2.9720401,-0.218460435 3.84914244,0.655381305 L15.0036671,10.8969369 L26.1484098,0.655381305 L26.1484098,0.655381305 Z" transform="translate(.399 .658)"/></svg></button>	
						<h2 class="faq-question" itemprop="name"><?php the_sub_field( 'faq_question' ); ?></h2>	
						<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<?php the_sub_field( 'faq_answer' ); ?>
						</div>
					</div>
						<?php
					}
				} else {
					?>
					<p class="negative">Please add some FAQs!</p>
					<?php
				}
				?>
				</div>
			</div>
		</section>
			<?php
			// End FAQs.



		} elseif ( get_row_layout() === 'logos' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="logos">
			<div class="container grid" style="max-width: <?php the_sub_field( 'max_width' ); ?>px;">
				<?php
				if ( have_rows( 'logos' ) ) {
					?>
				<div class="logos">
					<div class="slidesLogos">
					<?php
					while ( have_rows( 'logos' ) ) {
						the_row();
						?>
						<div class="logo">	
							<a href="<?php the_sub_field( 'link' ); ?>">
								<img loading="lazy" src="<?php the_sub_field( 'image' ); ?>" alt="<?php the_sub_field( 'name' ); ?>">
							</a>
						</div>
						<?php
					}
					?>
					</div>
				</div>
					<?php
				}
				?>
			</div>
		</section>
			<?php
			// End logo slider.



		} elseif ( get_row_layout() === 'tabs' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="tabs">
			<div class="container grid" style="max-width: <?php the_sub_field( 'max_width' ); ?>px;">
				<div class="twelve columns">
				<?php
				if ( have_rows( 'tabs' ) ) {
					$tab_no = 1;
					echo '<ul class="tabList" role="tablist" aria-label="Tabs">';
					while ( have_rows( 'tabs' ) ) {
						the_row();
						if ( 1 === $tab_no ) {
							?>
							<li id="tabLink<?php echo esc_attr( $tab_no ); ?>" class="active">	
							<?php
						} else {
							?>
							<li id="tabLink<?php echo esc_attr( $tab_no ); ?>">	
							<?php
						}
						?>
							<!--<a data-id="<?php echo esc_attr( $tab_no ); ?>"><?php the_sub_field( 'title' ); ?></a>-->
							<?php
							if ( 1 === $tab_no ) {
								?>
							<button role="tab" id="tab-<?php echo esc_attr( $tab_no ); ?>" data-id="<?php echo esc_attr( $tab_no ); ?>" aria-selected="true" aria-controls="panel-<?php echo esc_attr( $tab_no ); ?>"><?php the_sub_field( 'title' ); ?></button>
								<?php
							} else {
								?>
							<button role="tab" id="tab-<?php echo esc_attr( $tab_no ); ?>" data-id="<?php echo esc_attr( $tab_no ); ?>" aria-selected="false" aria-controls="panel-<?php echo esc_attr( $tab_no ); ?>"><?php the_sub_field( 'title' ); ?></button>
								<?php
							}
							?>
						</li>
						<?php
						++$tab_no;
					}
					echo '</ul>';
				}
				if ( have_rows( 'tabs' ) ) {
					$tab_no = 1;
					?>
					<div class="tabsPanel clearfix">
					<?php
					while ( have_rows( 'tabs' ) ) {
						the_row();
						?>
						<div id="panel-<?php echo esc_attr( $tab_no ); ?>" class="tabContent
						<?php
						if ( 1 === $tab_no ) {
							echo 'active';
						}
						?>
						" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr( $tab_no ); ?>">
							<?php the_sub_field( 'content' ); ?>
						</div> 
						<?php
						++$tab_no;
					}
					?>
					</div>
					<?php
				}
				?>
				</div>
			</div>
		</section>
			<?php
			// End tabs.



		} elseif ( get_row_layout() === 'accordion' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="accordion">
			<div class="container" style="max-width: <?php the_sub_field( 'max_width' ); ?>px;">
				<div class="twelve columns">
				<?php
				if ( have_rows( 'accordion' ) ) {
					$accordion_no = 1;
					while ( have_rows( 'accordion' ) ) {
						the_row();
						?>
					<div id="accordion<?php echo esc_attr( $accordion_no ); ?>" class="accordionPanel
						<?php
						if ( 1 === $accordion_no ) {
							echo 'active'; }
						?>
						">	
						<h3><a data-id="<?php echo esc_attr( $accordion_no ); ?>"><?php the_sub_field( 'title' ); ?></a></h3>
						<div class="inner">
						<?php the_sub_field( 'content' ); ?>
						</div>
					</div>
						<?php
						++$accordion_no;
					}
				}
				?>
				</div>
			</div>
		</section>
			<?php
			// End accordion.



		} elseif ( get_row_layout() === 'news' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="newsCards">
			<h2>Latest Articles</h2>
			<div class="container grid">
				<?php
				$news_query = new WP_Query( 'showposts=3' );
				if ( $news_query->have_posts() ) {
					while ( $news_query->have_posts() ) {
						$news_query->the_post();
						?>
						<div class="card clearfix shadow rounded">
						<?php
						if ( has_post_thumbnail() ) {
							?>
							<div class="newsThumb">
								<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
								</a>
							</div>
						<?php } else { ?>
							<div class="newsThumb">
								<a href="<?php the_permalink(); ?>">
									<img loading="lazy" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/placeholder.png" alt="<?php the_title(); ?>"> 
								</a>
							</div>
						<?php } ?>
							<div class="newsExcerpt">
								<h3><?php the_title(); ?></h3>
								<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</section>
			<?php
			wp_reset_postdata();



		} elseif ( get_row_layout() === 'text_and_image_block' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="textImage clear clearfix" style="background-image:url(<?php the_sub_field( 'text_and_image_block_image' ); ?>);">
			<div class="container">
				<div class="text <?php the_sub_field( 'textbox_location' ); ?>">
					<?php the_sub_field( 'text_and_image_block_content' ); ?>
				</div>	
			</div>
		</section>
			<?php



		} elseif ( get_row_layout() === 'gallery' ) {
			?>
		<section id="panel<?php echo esc_attr( $counter ); ?>" class="clearfix gallery" >
			<?php if ( get_sub_field( 'title' ) ) { ?>
			<h2><?php the_sub_field( 'title' ); ?></h2>
			<?php } ?>
			<div class="container grid" >
				<div class="mygallery" itemscope itemtype="http://schema.org/ImageGallery">
				<?php
				$images = get_sub_field( 'images' );
				if ( $images ) {
					foreach ( $images as $image ) {
						?>
				<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="one-quarter column galleryImage">			
					<a href="<?php echo esc_url( $image['sizes']['large'] ); ?>" itemprop="contentUrl" data-pswp-width="<?php echo esc_attr( $image['width'] ); ?>" data-pswp-height="<?php echo esc_attr( $image['height'] ); ?>">
						<img src="<?php echo esc_url( $image['sizes']['medium'] ); ?>" itemprop="thumbnail" alt="<?php echo esc_attr( $image['alt'] ); ?>">
						<div class="overlay">
							<svg version="1.1" id="Magnifying_glass" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><path fill="#ffffff" d="M17.545,15.467l-3.779-3.779c0.57-0.935,0.898-2.035,0.898-3.21c0-3.417-2.961-6.377-6.378-6.377 C4.869,2.1,2.1,4.87,2.1,8.287c0,3.416,2.961,6.377,6.377,6.377c1.137,0,2.2-0.309,3.115-0.844l3.799,3.801 c0.372,0.371,0.975,0.371,1.346,0l0.943-0.943C18.051,16.307,17.916,15.838,17.545,15.467z M4.004,8.287 c0-2.366,1.917-4.283,4.282-4.283c2.366,0,4.474,2.107,4.474,4.474c0,2.365-1.918,4.283-4.283,4.283 C6.111,12.76,4.004,10.652,4.004,8.287z"/></svg>
						</div>
					</a>
				</figure>
						<?php
					}
				}
				?>
				</div>
			</div>
		</section>
			<?php
		}
		// End Gallery Row.


	} // end while
} else {
	?>
	<!-- no flex layouts -->
	<?php
} // end if
?>