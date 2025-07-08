<?php
// Carregar CSS e Js
if (function_exists('enqueue_empreendimentos')) {
  enqueue_empreendimentos();
}
get_header();
// Empreendimentos - Master
$master_id = 70;

// Filtros
$statuses_disponiveis = [];

if (have_posts()) {
  global $wp_query;
  $posts_originais = $wp_query->posts;

  foreach ($posts_originais as $post) {
    setup_postdata($post);
    $status = get_field('status');
    if (!empty($status['value']) && !empty($status['label'])) {
      $statuses_disponiveis[$status['value']] = $status['label'];
    }
  }
  wp_reset_postdata();
}

// Bottom Banner
$bottom_banner = get_field('bottom_banner', $master_id);
$bn_img = $bottom_banner['img'];
$bn_img_mob = $bottom_banner['img_mob'];
$bn_alt = $bottom_banner['alt'];
$bn_title = $bottom_banner['title'];
$bn_link = $bottom_banner['link'];
$bn_cta = $bottom_banner['cta'];
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div id="masterEmpreendimentos">
  <div class="container-custom-sm">
    <div class="filtros">
      <h2>Encontre seu novo lar</h2>
      <div class="wrapper">
        <button data-filter="todos" class="filtro-btn all ativo">Todos</button>
        <?php foreach ($statuses_disponiveis as $slug => $label): ?>
          <button data-filter="<?php echo esc_attr($slug); ?>" class="filtro-btn selo-<?php echo esc_attr($slug); ?>">
            <?php echo esc_html($label); ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="grid">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();
          $selo = get_field('status');
          $selo_label = $selo['label'];
          $selo_value = $selo['value'];
        ?>
          <a href="<?php the_permalink(); ?>" class="item filtro-item selo-<?php echo $selo_value; ?>" title="Ver mais sobre o empreendimento <?php the_title(); ?>">
            <div class="wrapper">
              <div class="selo__wrapper">
                <span class="selo selo-<?php echo $selo_value; ?>">
                  <?php echo $selo_label; ?>
                </span>
              </div>
              <div class="img__wrapper">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="Foto do empreendimento">
              </div>
              <div class="infos__wrapper">
                <div class="title__wrapper">
                  <h2>
                    <?php the_title(); ?>
                  </h2>
                </div>
                <?php
                if (have_rows('informacoes_destaques')) : ?>
                  <div class="destaque__wrapper">
                    <?php while (have_rows('informacoes_destaques')) : the_row();
                      $item = get_sub_field('Item');
                      $icone = $item['icone'] ?? '';
                      $texto = $item['texto'] ?? '';
                      if ($icone && $texto) :
                        $icone_url = get_icone_svg($icone);
                    ?>
                        <?php if ($icone_url): ?>
                          <div class="destaque">
                            <div class="imagem">
                              <img src="<?php echo esc_url($icone_url); ?>" alt="<?php echo esc_attr($icone); ?>" />
                            </div>
                            <span class="texto"><?php echo esc_html($texto); ?></span>
                          </div>
                        <?php endif; ?>
                    <?php endif;
                    endwhile; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <?php if ($bn_img) : ?>
      <div class="bottom_banner">
        <div class="img__wrapper">
          <picture>
            <source media="(max-width: 1023px)" srcset="<?php echo esc_url($bn_img_mob); ?>">
            <img src="<?php echo esc_url($bn_img); ?>" alt="<?php echo esc_attr($bn_alt); ?>">
          </picture>
        </div>
        <div class="infos__wrapper">
          <h2>
            <?php echo esc_html($bn_title); ?>
          </h2>
          <a href="<?php echo esc_url($bn_link); ?>" class="cta">
            <?php echo $bn_cta; ?>
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
  // Filtros
  document.addEventListener('DOMContentLoaded', function() {
    const botoes = document.querySelectorAll('.filtro-btn');
    const items = document.querySelectorAll('.filtro-item');

    botoes.forEach(btn => {
      btn.addEventListener('click', () => {
        // Atualiza estado ativo do botão
        botoes.forEach(b => b.classList.remove('ativo'));
        btn.classList.add('ativo');

        const filtro = btn.dataset.filter;

        items.forEach(item => {
          if (filtro === 'todos' || item.classList.contains('selo-' + filtro)) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  });

  // Igualar altura dos cards
  function igualarAlturaTodosPs() {
    const elementos = document.querySelectorAll('#masterEmpreendimentos .grid .item .wrapper .destaque');
    if (!elementos.length) return;

    // Zera altura antes
    elementos.forEach(el => el.style.height = 'auto');

    // Acha a maior altura
    let maiorAltura = 0;
    elementos.forEach(el => {
      if (el.offsetHeight > maiorAltura) {
        maiorAltura = el.offsetHeight;
      }
    });

    // Aplica a mesma altura a todos
    elementos.forEach(el => {
      el.style.height = `${maiorAltura}px`;
    });
  }

  window.addEventListener('load', igualarAlturaTodosPs);
  window.addEventListener('resize', () => {
    setTimeout(igualarAlturaTodosPs, 100);
  });
</script>

<?php get_footer(); ?>