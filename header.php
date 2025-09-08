<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php wp_title(); ?></title>

  <meta property="og:url" content="https://www.santoandreempreendimentos.com.br/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Santo André Empreendimentos">
  <!-- <meta property="og:description" content="Os Melhores Produtos para Micropigmentação, Tattoo e Estética em até 10x Sem Juros e Entrega Para todo o Brasil."> -->
  <meta property="og:logo" content="<?php bloginfo("stylesheet_directory"); ?>/assets/imgs/favicon.jpg" />
  <meta property="og:image" content="<?php bloginfo("stylesheet_directory"); ?>/assets/imgs/og.jpg">

  <?php wp_head(); ?>

  <link href="<?php bloginfo("stylesheet_directory"); ?>/assets/imgs/favicon.jpg" rel="icon" size="32x32">
</head>

<body <?php body_class(); ?>>
  <?php get_template_part('template-parts/loader'); ?>

  <nav class="navbar__header">
    <div class="container-custom">
      <div class="left">
        <a href="<?php echo home_url(); ?>" class="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="Logo">
        </a>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'principal',
          'walker' => new Walker_Nav_Menu_Custom(),
          'menu_class'     => 'header-menu text-uppercase',
          'container'      => 'div',
          'container_class' => 'header-nav col-6',
        ));
        ?>
      </div>
      <div class="right">
        <div class="btn__wrapper">
          <a href="<?php echo home_url(); ?>/area-do-cliente/" class="btn-custom">Área do cliente</a>
          <a href="<?php echo home_url(); ?>/fale-conosco/" class="btn-custom">Fale conosco</a>
        </div>
      </div>
    </div>
    <div class="navbar__mobile">
      <div class="container-custom">
        <a href="<?php echo home_url(); ?>" class="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="Logo">
        </a>
        <div class="mobile">
          <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1.5H25" stroke="#1A539E" stroke-width="2" stroke-linecap="round" />
            <path d="M1 11.5H25" stroke="#1A539E" stroke-width="2" stroke-linecap="round" />
            <path d="M1 21.5H25" stroke="#1A539E" stroke-width="2" stroke-linecap="round" />
          </svg>
        </div>
      </div>
    </div>

    <div class="menu-mobile mobile">
      <div class="wrapper-mobile">
        <div class="topo">
          <!-- <a href="<?php echo home_url(); ?>" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo.svg" alt="Logo">
          </a> -->
          <div class="close-btn">
            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 23.1177L23 1.11768" stroke="#1A539E" stroke-width="2" stroke-linecap="round" />
              <path d="M23 23.1177L1 1.11768" stroke="#1A539E" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
        </div>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'principal',
          'menu_class'     => 'header-menu text-uppercase',
          'container'      => 'div',
          'container_class' => 'header-nav col-6',
        ));
        ?>
        <div class="btn__wrapper">
          <a href="<?php echo home_url(); ?>/area-do-cliente/" class="btn-custom">Área do cliente</a>
          <a href="<?php echo home_url(); ?>/fale-conosco/" class="btn-custom">Fale conosco</a>
        </div>
      </div>
    </div>
  </nav>