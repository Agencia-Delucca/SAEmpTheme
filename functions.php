<?php
add_theme_support('post-thumbnails');

require_once get_template_directory() . '/includes/custom-post-type.php';

// Enfileiramento de scripts e estilos
function load_scripts()
{
  wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), null, true);
  wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array(), null, true);
  wp_enqueue_script('custom', get_template_directory_uri() . '/assets/scripts/custom.js', array(), null, true);

  wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', 'all');
  wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', 'all');

  if (is_single()) {
    wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/single.css', array(), null, 'all');
  }
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Funções para carregar CSS e JS especifico
function enqueue_empreendimentos()
{
  if (!wp_style_is('empreendimentos', 'enqueued')) {
    wp_enqueue_style(
      'empreendimentos',
      get_template_directory_uri() . '/assets/css/empreendimentos.css',
      array(),
      null,
      'all'
    );
  }
}

function enqueue_single_empreendimento()
{
  if (!wp_style_is('single_empreendimento', 'enqueued')) {
    wp_enqueue_style(
      'single_empreendimento',
      get_template_directory_uri() . '/assets/css/single-empreendimentos.css',
      array(),
      null,
      'all'
    );
  }
}

// Menus
register_nav_menus([
  'principal' => 'Menu Principal'
]);

// Ícones
// Usar no loop no componente que tenha icone: $icone = get_icone_svg($item['icone']); adaptar o campo conforme necessário
function get_icone_svg($slug)
{
  $icones = [
    'local'    => get_template_directory_uri() . '/assets/imgs/icones/local.svg',
    'm2'       => get_template_directory_uri() . '/assets/imgs/icones/m2.svg',
    'cama'     => get_template_directory_uri() . '/assets/imgs/icones/cama.svg',
    'carro'    => get_template_directory_uri() . '/assets/imgs/icones/carro.svg',
    'mesa'     => get_template_directory_uri() . '/assets/imgs/icones/mesa.svg',
    'rooftop'  => get_template_directory_uri() . '/assets/imgs/icones/rooftop.svg',
  ];

  return $icones[$slug] ?? '';
}
