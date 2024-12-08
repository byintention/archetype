<?php
/*
/* Template Name: Style test page
/* Shows examples of many included styles	
/*
/* @package archetype
*/

get_header(); ?>
<div class="container grid">
	<div id="content" class="twelve columns clearfix" style="padding:50px 0;">
	
		<h1>Grid &amp; Style Test</h1>
		
		<?php
			//Display the page content/body
			if ( have_posts() ) while ( have_posts() )
			{
				the_post();
				the_content();
			}
		?>
		
		<h2>Heading 2</h2>
		
		<h3>Heading 3</h3>
		
		<p class="largeText">
			Larger text: Nullam luctus sagittis urna. Vivamus nibh. Fusce
			 ut nunc. Vivamus sed felis. Nam elit diam, auctor eu, eleifend vel, dictum quis, leo. 
			 Pellentesque fringilla, tellus quis auctor nonummy, pede lorem varius massa, at vestibulum 
			 enim nibh ac massa.
		</p> 
		
		<p>Paragraph text - <strong>Strong</strong> - <em>Emphasis</em> - Lorem ipsum dolor sit amet,
		consectetuer adipiscing elit. Suspendisse lectus nisl, semper sit amet, blandit at, lacinia 
		et, sem. <a href="#">Sed pellentesque turpis ut risus</a>. Nullam luctus sagittis urna. Vivamus nibh. Fusce
		 ut nunc. Vivamus sed felis. Nam elit diam, auctor eu, eleifend vel, dictum quis, leo. 
		 Pellentesque fringilla, tellus quis auctor nonummy, <code>pede lorem varius massa</code>, at vestibulum 
		 enim nibh ac massa.</p>
		 
		<p class="smallText">
			 Smaller text: Nullam luctus sagittis urna. Vivamus nibh. Fusce
			  ut nunc. Vivamus sed felis. Nam elit diam, auctor eu, eleifend vel, dictum quis, leo. 
			  Pellentesque fringilla, tellus quis auctor nonummy, pede lorem varius massa, at vestibulum 
			  enim nibh ac massa.
		</p> 
		 
		<p class="clearfix">
			<a class="btn btn-primary" href="#">Anchor</a> 
			<button class="btn">Button</button> 
			<input class="btn" type="submit" value="Input" />
			<input class="" type="text" value="Input" style="display:inline-block;width:200px" />
		</p>
		
		<p class="left" style="background:#eee;padding:10px;">Left</p>
		
		<p class="right" style="background:#eee;padding:10px;">Right</p>
		
		<p class="clearance">Donec velit. Suspendisse rutrum nunc sed tellus. Maecenas interdum 
			placerat nulla. Etiam sit amet orci at lectus posuere nonummy. Praesent rutrum ante eget 
			nisl. Nulla bibendum sodales quam. Phasellus ipsum.</p>
			
		<p class="positive">Positive message</p>
		
		<p class="negative">Negative message</p>
		
		<ul>
			<li>List item 1</li>
			<li>Velit Quos Voluptatem Quo Qui Adipisci Libero Quia Veritatis Et Eos Laudantium Dolorem Perferendis Ea Facilis Omnis Corrupti Ipsum Ut Suscipit Dolor Velit Suscipit Aut Sint Veniam Vero Temporibus Magni Atque Quaerat Repellendus Fuga Repellendus Voluptas Voluptatem Numquam Ipsum Modi Dolores Mollitia Est Pariatur Deleniti Aliquid Quo Culpa Ut Sit</li>
			<li>List item 3</li>
		</ul>
		
		<ol>
			<li>List item 1</li>
			<li>Velit Quos Voluptatem Quo Qui Adipisci Libero Quia Veritatis Et Eos Laudantium Dolorem Perferendis Ea Facilis Omnis Corrupti Ipsum Ut Suscipit Dolor Velit Suscipit Aut Sint Veniam Vero Temporibus Magni Atque Quaerat Repellendus Fuga Repellendus Voluptas Voluptatem Numquam Ipsum Modi Dolores Mollitia Est Pariatur Deleniti Aliquid Quo Culpa Ut Sit</li>
			<li>List item 3</li>
		</ol>
		
		<blockquote><p>Blockquote - Etiam sit amet orci at lectus posuere nonummy. Praesent rutrum ante eget nisl. Nulla bibendum sodales quam. <code>Preformatted Code</code> Phasellus ipsum.</p></blockquote>
		
		<pre><code>Preformatted Code
  and again
    another line</code></pre>
		<hr>
		
		<p class="icon mobile"><svg version="1.1" id="Mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
			<path fill="#000000" d="M14.004,0H5.996C4.894,0,4,0.894,4,1.996v16.007C4,19.106,4.894,20,5.996,20h8.007C15.106,20,16,19.106,16,18.004V1.996
				C16,0.894,15.106,0,14.004,0z M10,19c-0.69,0-1.25-0.447-1.25-1s0.56-1,1.25-1s1.25,0.447,1.25,1S10.69,19,10,19z M14,16H6V2h8V16z"
				/>
			</svg>0115 1245656</p>
		
		<p class="icon email"><svg version="1.1" id="Mail" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
			<path d="M1.574,5.286c0.488,0.262,7.248,3.894,7.5,4.029C9.326,9.45,9.652,9.514,9.98,9.514c0.328,0,0.654-0.064,0.906-0.199
				s7.012-3.767,7.5-4.029C18.875,5.023,19.337,4,18.44,4H1.521C0.624,4,1.086,5.023,1.574,5.286z M18.613,7.489
				c-0.555,0.289-7.387,3.849-7.727,4.027s-0.578,0.199-0.906,0.199s-0.566-0.021-0.906-0.199S1.941,7.777,1.386,7.488
				C0.996,7.284,1,7.523,1,7.707S1,15,1,15c0,0.42,0.566,1,1,1h16c0.434,0,1-0.58,1-1c0,0,0-7.108,0-7.292S19.004,7.285,18.613,7.489z"
				/>
			</svg><a href="#">mail@mail.com</a></p>
		
		<hr>
		
		<div class="wpcf7">
			<form id="enquiry" action="" method="post" name="enquiry" class="wpcf7-form">
			<fieldset>
				<legend>Fieldset</legend>
				<div>
					<label for="name">Name:</label>
					<input id="name" type="text" name="name" />
				</div>
				<div>
					<label for="company">Company:</label>
					<input id="company" type="text" name="company" />
				</div>
				<div>
					<label for="email">Email:</label>
					<input id="email" type="text" name="email" /></div>
				<div>
					<label for="state">State:</label>
					<select id="state" name="state">
						<option value="CA">California -- CA</option>
						<option value="CO">Colorado -- CO</option>
						<option value="CN">Connecticut -- CN</option>
					</select>
				</div>
				<div>
					<label for="phone">Phone:</label>
					<input id="phone" type="text" name="phone" />
				</div>
				<div>
					<label>Your Enquiry:</label>
					<textarea id="body" cols="10" name="body" rows="4"></textarea>
				</div>
				<div>
					<span class="wpcf7-form-control-wrap" data-name="acceptance-828">
						<span class="wpcf7-form-control wpcf7-acceptance optional">
							<span class="wpcf7-list-item">
								<label>
									<input type="checkbox" name="acceptance-828" value="1" aria-invalid="false">
									<span class="wpcf7-list-item-label">I agree with the thing</span>
								</label>
							</span>
						</span>
					</span>
				</div>
				<div>
					<input id="send" type="submit" name="send" value="Send" />
				</div>
			</fieldset>	
		</form>
		</div>
		
		<p>Abbreviation: <abbr lang="en" title="World Wide Web Consortium">W3C</abbr></p>
		
		
		<table cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Title</th>
					<th>Title</th>
					<th>Title</th>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Data</td>
					<td>Data</td>
					<td>Data</td>
					<td>Data</td>
				</tr>
				<tr>
					<td>Data</td>
					<td>Data</td>
					<td>Data</td>
					<td>Data</td>
				</tr>
				<tr>
					<td>Data</td>
					<td>Data</td>
					<td>Data</td>
					<td>Data</td>
				</tr>
			</tbody>
		</table>
		
		<p>Donec velit. Suspendisse rutrum nunc sed tellus. Maecenas interdum placerat nulla. 
			Etiam sit amet orci at lectus posuere nonummy. Praesent rutrum ante eget nisl. 
			Nulla bibendum sodales quam. Phasellus ipsum.</p>
		
	</div> <!-- end 12 columm text tests -->
	
</div> <!-- end container -->

		<div class="container gridRow">
		
			<div class="one column">1
			</div>
		
			<div class="one column">2
			</div>
			
			<div class="one column">3
			</div>
			
			<div class="one column">4
			</div>
			
			<div class="one column">5
			</div>
			
			<div class="one column">6
			</div>
			
			<div class="one column">7
			</div>
			
			<div class="one column">8
			</div>
			
			<div class="one column">9
			</div>
			
			<div class="one column">10
			</div>
			
			<div class="one column">11
			</div>
			
			<div class="one column">12
			</div>
		
		</div> <!-- end 12 single columns -->
		
		<div class="container gridRow">
		
			<div class="two columns">Totam quia non minus iusto earum soluta quas et qui odit quo ad ut. Et aspernatur ipsa odio eveniet reiciendis dolorum porro deleniti tenetur odit a quos aut.
			</div>
		
			<div class="two columns">
				Voluptates velit rem molestias autem cum consequatur doloribus hic vel aut qui. In officia amet rerum cum.
			</div>
			
			<div class="two columns">Ullam modi quidem aut reiciendis at sequi excepturi voluptatem dolorum fugit ut. Corporis quos repellendus at pariatur quam nihil quibusdam. Magnam quis qui incidunt ut corrupti eligendi placeat. Voluptates eligendi qui iure iusto ut quia est distinctio repellendus ea et dicta et reiciendis voluptatem. Voluptatibus quia quos reiciendis quam laborum consectetur suscipit consequatur cupiditate quia cumque tempora.
			</div>
			
			<div class="two columns">Est voluptas ea impedit molestiae pariatur voluptas. Consectetur doloremque commodi sunt enim porro saepe consequatur dolorem. Voluptatum atque eius deleniti illum voluptate voluptatem aspernatur eum doloribus saepe et. Unde sapiente tempora at.
			</div>
			
			<div class="two columns">Ratione quos illo sed vel. Ipsa inventore aperiam quis repellendus molestias in ut explicabo ut enim eveniet nostrum dolorum dolorum. Voluptas omnis est dolorum enim laboriosam quis neque vel. Magni possimus animi itaque nemo nisi quia porro ullam occaecati atque consectetur autem. Non unde et beatae quis officia quia quam est non dolore alias illo doloribus. Excepturi sint necessitatibus molestiae totam quae eos.
								
			</div>
			
			<div class="two columns">6
			</div>
		
		</div> <!-- end 6 double columns -->
		
		<div class="container gridRow">
		
			<div class="one-quarter column">One Quarter
			</div>
		
			<div class="one-quarter column">One Quarter
			</div>
			
			<div class="one-quarter column">One Quarter
			</div>
			
			<div class="one-quarter column">One Quarter
			</div>
		
		</div> <!-- end 4 quarter columns -->
		
		<div class="container gridRow">
		
			<div class="one-quarter column">One Quarter
			</div>
		
			<div class="three-quarter column">Three Quarters
			</div>
		
		</div> <!-- end 1/3 quarter columns -->
		
		<div class="container gridRow">
		
			<div class="one-half column">One Half
			</div>
		
			<div class="one-half column">One Half
			</div>
		
		</div> <!-- end half columns -->
		
		<div class="container gridRow">
		
			<div class="one-third column">One Third
			</div>
		
			<div class="one-third column">One Third
			</div>
			
			<div class="one-third column">One Third
			</div>
		
		</div> <!-- end 3 third columns -->
		
		<div class="container gridRow">
		
			<div class="one-third column">One Third
			</div>
		
			<div class="two-thirds column">Two Thirds
			</div>
		
		</div> <!-- end 2 third columns -->

<?php get_footer(); ?>