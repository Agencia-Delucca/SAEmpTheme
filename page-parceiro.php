<?php get_header();
// Template Name: Seja parceiro
if (function_exists('enqueue_parceiro')) {
  enqueue_parceiro();
}

// Banner
$banner = get_field('banner');
$banner_m = get_field('banner_m');

// Bloco 1
$titulo = get_field('titulo');
$subtitulo = get_field('subtitulo');
$bloco_1 = get_field('bloco_1');
$bloco_1_titulo = $bloco_1['titulo'];
$textos = $bloco_1['textos'];

// Forms
$form = get_field('form');
$form_titulo = $form['titulo'];
$form_subtitulo = $form['subtitulo'];
$form_shorcode = $form['shortcode'];
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="parceiro">
  <div class="topo">
    <picture>
      <source media="(max-width: 1023px)" srcset="<?php echo esc_url($banner_m['url']); ?>">
      <img src="<?php echo esc_url($banner['url']); ?>" alt="Banner da página <?php the_title(); ?>">
    </picture>
  </div>

  <div class="bloco-1">
    <div class="container-custom">
      <div class="title">
        <h1><?php echo $titulo; ?></h1>
        <p>
          <?php echo $subtitulo; ?>
        </p>
      </div>
      <div class="wrapper">
        <div class="left">
          <h2>
            <?php echo $bloco_1_titulo; ?>
          </h2>
        </div>
        <div class="right">
          <?php foreach ($textos as $texto) : ?>
            <div class="text">
              <h3>
                <?php echo $texto['titulo']; ?>
              </h3>
              <p>
                <?php echo $texto['subtitulo']; ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="bloco-2">
    <div class="container-custom">
      <div class="wrapper">
        <div class="text">
          <h2>
            <?php echo $form_titulo; ?>
          </h2>
          <p>
            <?php echo $form_subtitulo; ?>
          </p>
        </div>
        <div class="form">
          <?php echo do_shortcode($form_shorcode); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>