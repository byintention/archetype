<?php
/**
 * The template for footer menu, back to top link and Javascript.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

?>
		<footer id="footer" class="clear">
			<div class="container">
				<div class="twelve columns">
					<div id="footerNav" class="largeText">
						<?php
						wp_nav_menu(
							array(
								'container'      => false,
								'theme_location' => 'footer-menu',
							)
						);
						?>
					</div>					
					<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
				</div>
				<div class="btt">
					<a href="#"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
<path fill="#666" d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83c0.27-0.268,0.707-0.268,0.979,0
	l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z"/>
</svg>Back to top</a>
				</div>	
			</div>
		</footer>
	</div>
	
	<?php wp_enqueue_script( 'jquery' ); ?>

	<?php wp_footer(); ?>
	
	<script>
		window.onload = function() {
			// BTT
			// Get the back-to-top link element
			const backToTopLink = document.querySelector('.btt');
			// Add a click event listener to the link
			backToTopLink.addEventListener('click', (event) => {
				// Prevent the default link behaviour
				event.preventDefault();
				// Scroll to the top of the page
				window.scrollTo({
					top: 0,
					behavior: 'smooth'
				});
			});
			// Add a scroll event listener to the window
			window.addEventListener('scroll', () => {
				// Get the current scroll position
				const currentPosition = window.scrollY;
			
				// If the current position is greater than 500, show the back-to-top link
				if (currentPosition > 500) {
					backToTopLink.classList.add('show');
				} else {
					backToTopLink.classList.remove('show');
				}
			});
		};
	</script>
	
	<script>
		jQuery(document).ready(function() {
			// Mobile nav
			jQuery('.menu-trigger').click(function() {
				event.preventDefault();
				jQuery('#nav2').fadeToggle(300);
				jQuery('body').toggleClass('mobilenavopen');
				jQuery(this).toggleClass('navOpen');
			});
			jQuery('.navclose').click(function() {
				jQuery('#nav2').fadeOut(300);
				jQuery('body').toggleClass('mobilenavopen');
			});
			// Dropdown triggers
			jQuery('#nav2 li.menu-item-has-children').prepend('<button class="sub_nav">Open sub nav<div class="arrow_down"></div></button>');
			jQuery('.sub_nav, .menu-item-has-children > a').click(function() {
				jQuery(this).toggleClass('open');
				jQuery(this).siblings('.sub_nav').toggleClass('open');
				jQuery(this).siblings('ul').toggleClass('show');
			});	
			// End mobile nav
			// Dropdown navigation for desktop size
			var curz = 99;
			var screen = jQuery(window);
			if (screen.width() > 200) {
				jQuery(".sub_nav, #nav2 .menu-item-has-children > a").click(function() {
					event.preventDefault();
					if (jQuery(this).parent().hasClass("openSubnav")) {
						jQuery(this).parent().removeClass("openSubnav");
					} else {
						jQuery("#nav2 li").removeClass("openSubnav");
						jQuery(this).parent().addClass("openSubnav");
					}
				});
			}
			// Update the ARIA states on click events
			jQuery('.menu-item-has-children > a').on('click', function(ev){
				if (jQuery(this).siblings(".sub-menu").is('[aria-expanded~="true"]')) {
					jQuery(this).siblings(".sub-menu").attr('aria-expanded',false);
				} else {
					jQuery(this).siblings(".sub-menu").attr('aria-expanded',true);	
				}
			});	
			// Close menus if clicked away
			jQuery('html').click(function() {
				jQuery("#nav2 li").removeClass("openSubnav");
			});	
			jQuery('#nav2').click(function(event){
				event.stopPropagation();
			});
			// Add wrapper div for styles on select element
			jQuery("select").wrap("<div class=\"select-input\"></div>");	
		});	
	</script>
</body>
</html>