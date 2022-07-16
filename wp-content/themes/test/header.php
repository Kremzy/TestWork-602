<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="app">
      <div class="header-wrapper">
        <div class="container">
          <header id="masthead" class="header">
            <div class="header__logo">
              <div class="logo" href=""><?php the_custom_logo();?>
              </div>
            </div>
            <div class="header__favorites_auth_cart_hamburger">
              	<?php
              		$menuParameters = array(
					  'container'       => false,
					  'echo'            => false,
					  'theme_location'  => 'menu-1',
					  'menu_id'         => 'primary-menu',
					  'items_wrap'      => '<div class="header__auth">%3$s</div>',
					  'depth'           => 0,
					);

					echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
				?>
              <div class="header__hamburger" hidden="hidden"><a class="hamburger js-hamburger" href="javascript:void(0)" hidden="hidden"><span class="hamburger__line"></span><span class="hamburger__line"></span><span class="hamburger__line"></span></a>
              </div>
            </div>
          </header>
        </div>
      </div>