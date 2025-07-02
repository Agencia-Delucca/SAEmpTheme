<?php
get_header();
// Carregar CSS e JS
if (function_exists('enqueue_single_empreendimento')) {
  enqueue_single_empreendimento();
}

// Primarios
$banner = get_field('banner');
$infos = get_field('informacoes');
$galeira = get_field('galeria');
$plantas = get_field('plantas');

// Secundarios
$tour_360 = $infos['tour_360'];
?>

<div id="single-empreendimento">
  <?php if ($banner) :
    $imagem_desk = $banner['img_desk'];
    $imagem_mob = $banner['img_mobile'];
    $forms = $banner['forms']; ?>
    <div id="banner">
      <div class="wrapper">
        <?php if ($forms) : ?>
          <div class="container-custom-sm">
            <?php echo do_shortcode($forms); ?>
          </div>
        <?php endif; ?>
        <picture>
          <source media="(max-width: 1023px)" srcset="<?php echo esc_url($imagem_mob['url']); ?>">
          <img src="<?php echo esc_url($imagem_desk['url']); ?>" alt="<?php echo esc_attr($imagem_desk['alt']); ?>">
        </picture>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($tour_360) : ?>
    <div class="container-custom" id="tour-360">
      <h2 class="title">
        Faça um Tuor Virtual
      </h2>
      <div class="wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/icones/3d.svg" alt="Perspectiva 3D">
        <iframe src="<?php echo $tour_360; ?>" frameborder="0" loading="lazy"></iframe>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>