	// Plain JS first, then jQuery stuff
	
	// Opening answers on faq panel
	document.addEventListener("DOMContentLoaded", function() {
		var anchors = document.getElementsByClassName('faq-question');
		var len = anchors.length;
		//console.log(anchors);
		for (var i = 0; i < anchors.length; i++) {
			anchors[i].addEventListener('click', function(event) {
				//var parent = this.parentElement;
				this.parentElement.classList.toggle('active');
				//var answer = this.nextElementSibling;
				this.nextElementSibling.classList.toggle('visible');
			});
		}
		
		// Add body class when page loaded
		document.body.classList.toggle('loaded');
	
	});
	
	// BTT
    var timeOut;
	function scrollToTop() {
		if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
			window.scrollBy(0,-50);
			timeOut=setTimeout('scrollToTop()',10);
		}
		else clearTimeout(timeOut);
	}
	
	 
	// New code May 23
	window.onload = function() {
	  // fade in when scroll into view 
	  // Select all the elements with the class "fade-in"
	  const fadeIns = document.querySelectorAll('.fade-in');
	  
	  // Loop through each element
	  fadeIns.forEach(fadeIn => {
		// Check if the element is in view
		const isInView = (entry) => {
		  return entry.isIntersecting;
		};
	
		// Create a new intersection observer
		const observer = new IntersectionObserver(entries => {
		  // If the element is in view, add the class "in-view"
		  if (entries.some(isInView)) {
			fadeIn.classList.add('in-view');
		  } else {
			fadeIn.classList.remove('in-view');
		  }
		});
	
		// Start observing the element
		observer.observe(fadeIn);
	  });
	  
	  // BTT 
	  // Get the back-to-top link element
	  const backToTopLink = document.querySelector('.btt');
	  
	  // Add a click event listener to the link
	  backToTopLink.addEventListener('click', (event) => {
		// Prevent the default link behavior
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
	 
	
// jQuery stuff	

(function($) {
    $(document).ready(function() {
	  
	  /*
	  // Open off-site links in new tab
	  $('a').each(function() {
		  var a = new RegExp('/' + window.location.host + '/');
		  if(!a.test(this.href)) {
				$(this).click(function(event) {
					event.preventDefault();
					event.stopPropagation();
					window.open(this.href, '_blank');
				});
		  }
		});
	  */
	  

	
	$('.tabList a').click(function(){
		// Grab current ID from data-id on link
		tabNo = $(this).attr("data-id");  
		// Update links
		$('.tabList li').removeClass('active'); 
		$('#tabLink'+tabNo).addClass('active'); 
		// Update tab panels
		$('.tabContent').removeClass('active');
		$('#tab'+tabNo).addClass('active');
	});
	
	$('.accordion h2 a').click(function(){
		// Grab current ID from data-id on link
		accordionNo = $(this).attr("data-id");  
		// Update links
		//$('.accordionPanel').removeClass('active'); 
		$(this).closest('.accordionPanel').toggleClass('active'); 
		
	});

	  
	// Mobile nav

    $('.menu-trigger').click(function() {
			//console.log('open');
			$('#nav2').fadeToggle(300);
			$('body').toggleClass('mobilenavopen');
			$(this).toggleClass('navOpen');   
		});
		
		$('.navclose').click(function() {
			//console.log('close');
			$('#nav2').fadeOut(300);
			$('body').toggleClass('mobilenavopen'); 
		});
	    
	  // Dropdown triggers
      $('#nav2 li.menu-parent-item').prepend( '<a class="sub_nav"><div class="arrow_down"></div></a>' );
      
      $('.sub_nav').click(function() {
        $(this).toggleClass('open');
        $(this).siblings('ul').toggleClass('show');   
      });
	    
      // End mobile nav

	  // Dropdown navigation for desktop size
		var curz = 99;
		var screen = $(window);
		if (screen.width() > 1200) {
			$("#nav2 li.menu-item-has-children").hover(function() {
			    var timeout = $(this).data("timeout");
			    if (timeout) clearTimeout(timeout);
			$(this).children("ul").slideDown(0).css({ "z-index":curz++ });
			 }, function() {
			   $(this).data("timeout", setTimeout($.proxy(function() {
			   $(this).find("ul").slideUp(0);
			 }, this), 0));
			});
		}
		 
	});  
	
	// Add div for dropdown arrow to modified select boxes
	$(window).on('load', function(){
		$(".variations select").wrap("<div class=\"select-input\"></div>");
		$(".wpcf7 select").wrap("<div class=\"select-input\"></div>");
		$("#sidebar select").wrap("<div class=\"select-input\"></div>");
		$(".woocommerce-ordering select").wrap("<div class=\"select-input\"></div>");

		$(".wpcf7 input[type='checkbox']").after("<span class=\"checkmark\"></span>");
		
	});
	
	

	
	

	
})(jQuery); // Fully reference $ after this point.