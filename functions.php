<?php
add_theme_support('post-thumbnails');

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
