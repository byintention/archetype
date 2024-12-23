<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package archetype
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
	<div class="wrap">	
		<a class="skipLink" href='#content'><?php echo esc_html__( 'Skip to content', 'archetype' ); ?></a>
		<header id="header">
			<div class="container">
				<div id="headerMenuMobile"><button class="menu-trigger navclosed"><span><?php echo esc_html__( 'Menu', 'archetype' ); ?></span></button></div>
				<div id="headerLogo">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					}
					?>
					<div class="site-title">
						<a href="<?php echo esc_url( home_url() ); ?>">
						<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
						</a>
					</div>
					<div class="site-description">
						<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
					</div>	
				</div>
				<nav id="nav2" class="clearfix">
					<?php
					wp_nav_menu(
						array(
							'container'      => false,
							'theme_location' => 'main-menu',
						)
					);
					?>
				</nav>
			</div>
		</header>