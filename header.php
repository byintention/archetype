<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="screen" href="<?php bloginfo( 'stylesheet_directory' ); ?>/style.css?v=<?php echo date('dmy');?>">
	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>> 	
	<div class="wrap">	
		<a class="skipLink" href='#content'>Skip to content</a>
		<header id="header">
			<div class="container">
				<div id="headerMenuMobile"><button class="menu-trigger navclosed"><span>Menu</span></button></div>
				<div id="headerLogo">
					<?php  
					if ( get_custom_logo() ){
						the_custom_logo();
					} 
					
					if( !get_custom_logo() ){ 
						echo 'no logo';
						echo '<div class="siteName">';
						 get_bloginfo('name');
						echo '</div>';
						echo esc_html( get_bloginfo( 'description' ) ); 
					} ?>
				</div>
				<nav id="nav2" class="clearfix">
					<?php wp_nav_menu( array(
						'container' => false,
						'theme_location' => 'main-menu'
					 )); ?>
				</nav>
			</div>
		</header>	
		