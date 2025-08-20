<?php get_header();
// Template Name: Area do Cliente
if (function_exists('enqueue_areacliente')) {
  enqueue_areacliente();
}

// Banner
$banner = get_field('banner');
$banner_m = get_field('banner_m');

// Bloco 1
$subtitulo = get_field('subtitulo');
$texto_1 = get_field('texto_1');

// Bloco 2
$bloco_2 = get_field('bloco_2');
$titulo_2 = $bloco_2['titulo'];
$subtitulo_2 = $bloco_2['subtitulo'];
$cta = $bloco_2['cta_texto'];
$cta_link = $bloco_2['cta_link'];
$texto_2 = $bloco_2['texto'];
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="areacliente">
  <div class="topo">
    <picture>
      <source media="(max-width: 1023px)" srcset="<?php echo esc_url($banner_m['url']); ?>">
      <img src="<?php echo esc_url($banner['url']); ?>" alt="Banner da página <?php the_title(); ?>">
    </picture>
  </div>


  <div class="bloco-1">
    <div class="container-custom">
      <div class="title">
        <h1><?php the_title(); ?></h1>
        <p>
          <?php echo $subtitulo; ?>
        </p>
      </div>
      <div class="wrapper">
        <?php echo $texto_1; ?>
      </div>
    </div>
  </div>

  <div class="bloco-2">
    <div class="container-custom">
      <div class="wrapper">
        <h2>
          <?php echo $titulo_2; ?>
        </h2>
        <p>
          <?php echo $subtitulo_2; ?>
        </p>
        <a href="<?php echo $cta_link; ?>" target="_blank" class="btn-custom">
          <?php echo $cta; ?>
        </a>
        <div class="wrapper__text">
          <?php echo $texto_2; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>