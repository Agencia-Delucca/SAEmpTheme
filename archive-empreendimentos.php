<?php
// Carregar CSS e Js
if (function_exists('enqueue_empreendimentos')) {
  enqueue_empreendimentos();
}
get_header();
// Empreendimentos - Master
$master_id = 70;

$titulo = get_field('teste', $master_id);
?>

<?php echo $titulo ?>


<div id="masterEmpreendimentos">
  <div class="container-custom-sm">
    <div class="grid">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); 
          $selo = get_field('status');
          $selo_label = $selo['label'];
          $selo_value = $selo['value'];
        ?>
          <a href="<?php the_permalink(); ?>" class="item" title="Ver mais sobre o empreendimento <?php the_title(); ?>">
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
  </div>
</div>

<script>
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