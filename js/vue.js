(function($) {
	$(document).ready(function() {

		/** You should use wp_localize_script() to provide this data dynamically */
		var config = {
			api: 'https://demosite.local/wp-json/wp/v2/posts/129',
			//nonce: 'hiroy'
		};
		
		/** GET post and then construct Vue instance with it **/
		
		// TO-DO - Broken - this reloads page and doesn't save data to post
		// Nonce isn't being set as far as I can see - commented out above
		
		var ex4;
		$.get({
			url: config.api,
			success: function(r) {
				
				ex4 = new Vue({
					el: '#post',
					data: {
						post: r
					},
					methods: {
						save: function(){
							jQuery(".wpcf7-spinner").css('display', 'inline-block');
							event.preventDefault();
							console.log(ajax_var.nonce);
							var self = this;
							$.ajax( {
						
								url: config.api,
								method: 'POST',
								beforeSend: function ( xhr ) {
									xhr.setRequestHeader( 'X-WP-Nonce', ajax_var.nonce );
								},
								data:{
									//action: 'custom_script_name',
									//nonce: ajax_var.nonce, 
									title : self.post.title.rendered,
									content: self.post.content.rendered
								}
								} ).done( function ( response ) {
									//console.log( response );
									jQuery(".wpcf7-spinner").css('display', 'none');
								} 
							);
						}
					}
				})
			}
		})
	
	});

	
})(jQuery); // Fully reference $ after this point.