<?php
if (function_exists('enqueue_sgc')) {
  enqueue_sgc();
}

get_header();
// Template Name: SGC

// Depoimentos
$master_depoimentos = 425;

// Post
$topo = get_field('topo');
$empresas_parceiras = get_field('empresas_parceiras');
$middle_banner = get_field('middle_banner');
?>

<div id="sgc">

  <div class="topo">
    <div class="topo__wrapper container-custom-sm">
      <h1><?= $topo['titulo']; ?></h1>
      <p>
        <?= $topo['subtitulo']; ?>
      </p>
    </div>
    <picture>
      <source media="(max-width: 1023px)" srcset="<?php echo esc_url($topo['banner_m']); ?>">
      <img src="<?= $topo['banner']; ?>" alt="Banner">
    </picture>
  </div>

  <?php if (have_rows('bloco_t_i')): ?>
    <section class="blocos">
      <?php while (have_rows('bloco_t_i')): the_row();
        $cor = get_sub_field('background');
        $texto = get_sub_field('texto');
        $side = get_sub_field('side');
        $imagem = get_sub_field('imagem');
        $preenchimento = get_sub_field('preenchimento');
        $custom_class = get_sub_field('custom_class');
      ?>
        <div class="textoImagem bg-<?php echo esc_attr($cor); ?>">
          <div class="container-custom-sm">

            <?php if ($side === 'esquerda'): ?>
              <div class="texto <?php echo esc_attr($side); ?>">
                <?php echo $texto; ?>
              </div>
              <div class="imagem">
                <img src="<?php echo esc_url($imagem); ?>"
                  class="<?php echo esc_attr($custom_class); ?>"
                  style="object-fit: <?php echo esc_attr($preenchimento); ?>">
              </div>
            <?php else: ?>
              <div class="imagem">
                <img src="<?php echo esc_url($imagem); ?>"
                  class="<?php echo esc_attr($custom_class); ?>"
                  style="object-fit: <?php echo esc_attr($preenchimento); ?>">
              </div>
              <div class="texto  <?php echo esc_attr($side); ?>">
                <?php echo $texto; ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
      <?php endwhile; ?>
    </section>
  <?php endif; ?>

  <?php if ($middle_banner) : ?>
    <div id="middle_banner">
      <div class="container-custom-sm">
        <div class="middle_banner__wrapper">
          <div class="img__wrapper">
            <picture>
              <source media="(max-width: 1023px)" srcset="<?php echo esc_url($middle_banner['imagem_m']['url']); ?>">
              <img src="<?php echo esc_url($middle_banner['imagem']['url']); ?>" alt="<?php echo esc_attr($bn_alt); ?>">
            </picture>
          </div>
          <div class="infos__wrapper">
            <h2>
              <?php echo esc_html($middle_banner['titulo']); ?>
            </h2>
            <p>
              <?php echo ($middle_banner['texto']); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div id="empresas-parceiras">
    <div class="container-custom-sm">
      <h2>Empresas Parceiras</h2>
      <div class="empresas">
        <?php foreach ($empresas_parceiras as $empresa): ?>
          <div class="img__wrapper">
            <img src="<?= $empresa['url']; ?>" alt="<?= $empresa['title']; ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div id="depoimentos">
    <div class="container-custom-sm">
      <h2>Depoimentos</h2>
      <?php if (have_rows('depoimentos', $master_depoimentos)): ?>
        <div class="depoimentos__slide swiper">
          <div class="swiper-wrapper">
            <?php while (have_rows('depoimentos', $master_depoimentos)): the_row(); ?>
              <?php $avatar = get_sub_field('avatar'); ?>
              <div class="swiper-slide">
                <div class="depoimentos__wrapper">
                  <?php if ($avatar): ?>
                    <img src="<?= esc_url($avatar['url']); ?>" alt="<?= esc_attr(get_sub_field('nome')); ?>">
                  <?php endif; ?>
                  <p class="depoimentos__texto-depoimento"><?= esc_html(get_sub_field('texto')); ?></p>
                  <p class="depoimentos__texto-nome"><b><?= esc_html(get_sub_field('nome')); ?></b></p>
                </div>
              </div>
            <?php endwhile; ?>
          </div>

          <div class="swiper-button-wrapper">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>