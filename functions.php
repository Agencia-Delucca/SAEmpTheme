<?php
add_theme_support('post-thumbnails');

require_once get_template_directory() . '/includes/custom-post-type.php';

// Enfileiramento de scripts e estilos
function load_scripts()
{
  wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/scripts/swiper-bundle.min.js', array(), null, true);
  wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/scripts/fancybox.umd.js', array(), null, true);
  wp_enqueue_script('custom', get_template_directory_uri() . '/assets/scripts/custom.js', array(), null, true);

  wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', 'all');
  wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/fancybox.css', 'all');
  wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Funções para carregar CSS e JS especifico
function enqueue_homepage()
{
  if (is_front_page()) {
    wp_enqueue_style(
      'css-homepage',
      get_template_directory_uri() . '/assets/css/home.css',
      array(),
      null,
      'all'
    );
  }
}

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

function enqueue_areacliente()
{
  if (!wp_style_is('areacliente', 'enqueued')) {
    wp_enqueue_style(
      'areacliente',
      get_template_directory_uri() . '/assets/css/areacliente.css',
      array(),
      null,
      'all'
    );
  }
}

function enqueue_parceiro()
{
  if (!wp_style_is('parceiro', 'enqueued')) {
    wp_enqueue_style(
      'parceiro',
      get_template_directory_uri() . '/assets/css/parceiro.css',
      array(),
      null,
      'all'
    );
  }
}

function enqueue_sgc()
{
  if (!wp_style_is('sgc', 'enqueued')) {
    wp_enqueue_style(
      'sgc',
      get_template_directory_uri() . '/assets/css/sgc.css',
      array(),
      null,
      'all'
    );
  }
}

// Menus
register_nav_menus([
  'principal' => 'Menu Principal',
  'rodape'    => 'Menu Rodape',
]);

add_filter('wp_nav_menu_objects', 'injetar_megamenu_com_acf', 10, 2);

// Walker do Megamenu
function injetar_megamenu_com_acf($items, $args)
{
  foreach ($items as $item) {
    $destaque = get_field('menu_destaque', $item);

    if (!empty($destaque['img']) && !empty($destaque['titulo']) && !empty($destaque['link'])) {
      ob_start();
?>
      <div class="megamenu">
        <div class="megamenu-content">
          <div class="megamenu-left">
            <img src="<?= esc_url($destaque['img']) ?>" alt="<?= esc_attr($destaque['titulo']) ?>">
            <h3><?= esc_html($destaque['titulo']) ?></h3>
            <?php if (!empty($destaque['descricao'])): ?>
              <p><?= esc_html($destaque['descricao']) ?></p>
            <?php endif; ?>
            <a class="btn-conheca" href="<?= esc_url($destaque['link']['url']) ?>" target="<?= esc_attr($destaque['link']['target']) ?>">
              <?= esc_html($destaque['link']['title']) ?>
            </a>
          </div>
          <div class="megamenu-right">
      <?php
      $item->description = ob_get_clean();
    }
  }
  return $items;
}

class Walker_Nav_Menu_Custom extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= "<ul class=\"sub-menu\">\n";
  }

  function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= "</ul></div></div></div>"; // Fecha megamenu-right, megamenu-content, megamenu
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    $output .= "<li class=\"$class_names\">";
    $output .= '<a href="' . esc_attr($item->url) . '">' . $item->title . '</a>';

    if (!empty($item->description)) {
      $output .= $item->description; // Bloco injetado pelo filtro acima
    }
  }

  function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $output .= "</li>\n";
  }
}


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
