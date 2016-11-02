<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package interview
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php echo wp_title();?></title>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="format-detection" content="telephone=no">
    <!-- Favicon and touch icons-->
    
  </head>
  <body <?php body_class(); ?>>
      <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="main-header">
                <div class="header">
                    <div class="logo">
                        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo"></a></h1>
                    </div>
                    <div class="slogan">
                        <h5><?php echo bloginfo('description'); ?></h5>
                    </div>
                </div>
                <div class="btn-menu"><span></span></div>
            </div>
        </div>
        <nav id="main-nav" class="main-nav">
            <div class="line-top"></div>
            <div class="line-bottom"></div>
            <div class="container">
                <div class="logo_person"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_2.png" alt="logo2"></a></div>
                <?php
                    $defaults = array(
                        'theme_location'  => '',
                        'menu'            => 'main-menu',
                        'container'       => 'ul',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'depth'           => 0,
                        'walker'          => ''
                    );

                    wp_nav_menu( $defaults );
                ?>
            </div>
        </nav>

	</header><!-- #masthead -->
    
