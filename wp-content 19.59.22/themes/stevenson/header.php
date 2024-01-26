<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php wp_head(); ?>
</head>

<body style="margin:0 auto;" <?php body_class(); ?>>

<header id="header">

   <div class="mobileOnly">
      <div class="navbarToggleMobile">
      <div class="toggleMobile">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
      </div>
      <div class="navbarMenuMobile">
         <?php
            wp_nav_menu( array(
                  'menu' => 'navbarMenu'
            ) );
         ?>
      </div>
   </div>

   <nav>
      <div class="d-flex navbarMenu">
         <h2>
            <a href="<?php echo esc_url( home_url('/') ); ?>">
               StevenCourtaut
            </a>
         </h2>
         <?php
            wp_nav_menu( array(
               'menu' => 'navbarMenu'
            ) );
         ?>
      </div>
   </nav>

</header>

<main id="main">