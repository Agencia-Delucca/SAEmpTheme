<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php wp_title(); ?></title>

  <!-- <meta property="og:url" content="https://www.vitralaluminio.com.br/"> -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Vitral Alumínio e Vidro">
  <!-- <meta property="og:description" content="Os Melhores Produtos para Micropigmentação, Tattoo e Estética em até 10x Sem Juros e Entrega Para todo o Brasil."> -->
  <meta property="og:logo" content="<?php bloginfo("stylesheet_directory"); ?>/assets/imgs/favicon.jpg" />
  <meta property="og:image" content="<?php bloginfo("stylesheet_directory"); ?>/assets/imgs/og.jpg">

  <?php wp_head(); ?>

  <link href="<?php bloginfo("stylesheet_directory"); ?>/assets/imgs/favicon.jpg" rel="icon" size="32x32">
</head>

<body <?php body_class(); ?>>
  <?php get_template_part('template-parts/loader'); ?>