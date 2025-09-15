<?php
get_header();
// Carregar CSS e JS
if (function_exists('enqueue_single_empreendimento')) {
  enqueue_single_empreendimento();
}

// Primarios
$banner = get_field('banner');
$infos = get_field('informacoes');
$galeria = get_field('galeria');
$plantas = get_field('plantas');
$obras = get_field('obras');
$finalizado = get_field('finalizado');

// Secundarios
$tour_360 = $infos['tour_360'];
$destaques = $infos['destaques'];
$descricao = $infos['texto'];
$andamento_obra = $obras['andamento'];

// Externos
$master_id = 70;
$bottom_banner_empreendimentos = get_field('bottom_banner_empreendimentos', $master_id);
$bn_img = $bottom_banner_empreendimentos['img'];
$bn_img_mob = $bottom_banner_empreendimentos['img_mob'];
$bn_alt = $bottom_banner_empreendimentos['alt'];
$bn_title = $bottom_banner_empreendimentos['title'];
$bn_link = $bottom_banner_empreendimentos['link'];
$bn_cta = $bottom_banner_empreendimentos['cta'];
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

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

  <div class="container-custom-sm" id="infos">
    <div class="wrapper">
      <div class="item left">
        <div class="img__wrapper">
          <img src="<?php the_post_thumbnail_url(); ?>" alt="Imagem de destaque do empreendimento <?php the_title(); ?>" class="img-full">
        </div>
      </div>
      <div class="item right">
        <h1><?php the_title(); ?></h1>
        <div class="content">
          <?php if ($tour_360) : ?>
            <div class="item anchor" onclick="scrollToId('tour-360')">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/icones/3d-black.svg" alt="Setas indicando item 3D">
              Tour 360º
            </div>
          <?php endif; ?>
          <?php if ($obras) : ?>
            <div class="item anchor" <?php if (!$finalizado) : ?>onclick="scrollToId('obras')" <?php endif; ?>>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/icones/obras.svg" alt="Obras">
              <?php echo ($finalizado) ?: 'Acompanhe a obra' ?>
            </div>
          <?php endif; ?>
          <div class="item infos">
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
          <div class="item text">
            <?php echo $descricao; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($galeria) : ?>
    <div class="container-custom-sm" id="galeria">
      <h2 class="title">
        <?php echo esc_html($galeria['tipo']); ?>
      </h2>

      <div class="swiper">
        <div class="swiper-wrapper">
          <?php
          $comuns = [];

          foreach ($galeria['slide'] as $item) {
            $imagem = $item['imagem'];
            $slots = $item['slots'];
            $texto = $item['texto'];

            if ($slots == '2') {
              echo '<a href="' . esc_url($imagem) . '" data-fancybox="gallery" class="swiper-slide destaque">';
              echo '<img src="' . esc_url($imagem) . '" alt="Fotos do empreendimento" class="img-full">';
              if ($texto) echo '<div class="legenda">' . $texto . '</div>';
              echo '</a>';
            } elseif ($slots == '1') {
              $comuns[] = ['imagem' => $imagem, 'texto' => $texto];
            }
          }

          // Renderiza pares de imagens comuns (slots = 1)
          for ($i = 0; $i < count($comuns); $i += 2) {
            $img1 = $comuns[$i];
            $img2 = isset($comuns[$i + 1]) ? $comuns[$i + 1] : null;

            echo '<div class="swiper-slide duplo">';
            echo '<div class="duas-imagens">';

            // Imagem 1
            echo '<a href="' . esc_url($img1['imagem']) . '" data-fancybox="gallery" class="img-bloco">';
            echo '<img src="' . esc_url($img1['imagem']) . '" alt="Fotos do empreendimento" class="img-full">';
            if ($img1['texto']) echo '<div class="legenda">' . $img1['texto'] . '</div>';
            echo '</a>';

            // Imagem 2 (se existir)
            if ($img2) {
              echo '<a href="' . esc_url($img2['imagem']) . '" data-fancybox="gallery" class="img-bloco">';
              echo '<img src="' . esc_url($img2['imagem']) . '" alt="Fotos do empreendimento" class="img-full">';
              if ($img2['texto']) echo '<div class="legenda">' . $img2['texto'] . '</div>';
              echo '</a>';
            }

            echo '</div></div>';
          }
          ?>
        </div>

        <div class="swiper-button-wrapper">
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($plantas) : ?>
    <?php if (have_rows('plantas_tipos')): ?>
      <div class="container-custom-sm" id="plantas">
        <h2 class="title">Planta baixa</h2>
        <section class="plantas">

          <!-- Coluna da esquerda (Legendas) -->
          <div class="left">
            <?php $j = 0;
            while (have_rows('plantas_tipos')): the_row();
              $legenda = get_sub_field('legenda'); ?>
              <?php if ($legenda): ?>
                <div class="planta-legenda <?php echo $j === 0 ? 'active' : ''; ?>" id="planta-legenda-<?php echo $j; ?>">
                  <h3>Legenda</h3>
                  <ol>
                    <?php foreach ($legenda as $linha): ?>
                      <li><?php echo esc_html($linha['linha']); ?></li>
                    <?php endforeach; ?>
                  </ol>
                </div>
              <?php endif; ?>
            <?php $j++;
            endwhile; ?>
          </div>

          <!-- Coluna da direita -->
          <div class="right">

            <!-- Botões -->
            <div class="plantas__botoes">
              <?php $i = 0;
              while (have_rows('plantas_tipos')): the_row();
                $tipo = get_sub_field('tipo'); ?>
                <button class="planta-btn <?php echo $i === 0 ? 'active' : ''; ?>"
                  data-planta="<?php echo $i; ?>">
                  <?php echo esc_html($tipo); ?>
                </button>
              <?php $i++;
              endwhile; ?>
            </div>

            <!-- Conteúdo das Plantas -->
            <div class="plantas__conteudo">
              <?php $k = 0;
              while (have_rows('plantas_tipos')): the_row();
                $imagem    = get_sub_field('imagem');
                $destaques = get_sub_field('destaques'); ?>

                <div class="planta-item <?php echo $k === 0 ? 'active' : ''; ?>" id="planta-item-<?php echo $k; ?>">

                  <!-- Imagem -->
                  <?php if ($imagem): ?>
                    <a class="planta-imagem" data-fancybox href="<?php echo esc_url($imagem['url']); ?>">
                      <img src="<?php echo esc_url($imagem['url']); ?>" alt="<?php echo esc_attr($imagem['alt']); ?>">
                    </a>
                  <?php endif; ?>

                  <!-- Destaques -->
                  <?php if ($destaques): ?>
                    <div class="planta-destaques">
                      <?php foreach ($destaques as $d):
                        $item  = $d['Item'];
                        $icone = $item['icone'] ?? '';
                        $texto = $item['texto'] ?? '';
                        if ($icone && $texto) :
                          $icone_url = get_icone_svg($icone); ?>
                          <?php if ($icone_url): ?>
                            <div class="destaque">
                              <div class="imagem">
                                <img src="<?php echo esc_url($icone_url); ?>" alt="<?php echo esc_attr($icone); ?>" />
                              </div>
                              <span class="texto"><?php echo esc_html($texto); ?></span>
                            </div>
                          <?php endif; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>

                </div>
              <?php $k++;
              endwhile; ?>
            </div>
          </div>
        </section>
      </div>
    <?php endif; ?>
  <?php endif; ?>


  <?php if ($tour_360) : ?>
    <div class="container-custom" id="tour-360">
      <h2 class="title">
        Faça um Tour Virtual
      </h2>
      <a href="<?php echo $tour_360; ?>" class="wrapper" data-fancybox data-type="iframe" style="background: center / cover no-repeat url(<?php echo get_template_directory_uri(); ?>/assets/imgs/lausanne_teste_tour.jpg);">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/icones/3d.svg" alt="Perspectiva 3D">
      </a>
    </div>
  <?php endif; ?>

  <?php if ($obras && $andamento_obra) : ?>
    <section class="container-custom" id="obras">
      <div class="obras__wrapper">
        <div class="obras__andamento">
          <h2>Andamento da Obra</h2>
          <div class="obras__grid">
            <?php
            $i = 0;
            foreach ($obras['andamento'] as $step):
              $pct = intval($step['porcentagem']);
              $i++; // incrementa a cada item
            ?>
              <div class="obras__item">
                <div class="progress">
                  <div class="progress-bar-outer" style="background: <?= esc_attr($obras['cor_linha']); ?>;">
                    <div class="progress-bar-inner">
                      <div class="number" data-circle-id="circle<?= $i; ?>">
                        <?= $pct ?>%
                      </div>
                    </div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                    <circle
                      stroke="<?= esc_attr($obras['cor_progress']); ?>"
                      cx="80" cy="80" r="70" stroke-linecap="round"
                      id="circle<?= $i; ?>" />
                  </svg>
                </div>
                <p><?= esc_html($step['item']); ?></p>
              </div>
            <?php endforeach; ?>

          </div>
        </div>

        <div class="obras__galeria">
          <h2>Galeria</h2>
          <div class="obras__galeria-wrapper">
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php
                $i = 0;
                foreach ($obras['galeria'] as $img):
                  // abre o slide a cada 2 imagens
                  if ($i % 2 === 0): ?>
                    <div class="swiper-slide">
                    <?php endif; ?>
                    <div class="img__wrapper">
                      <a href="<?= esc_url($img); ?>" data-fancybox="gallery">
                        <img src="<?= esc_url($img); ?>" alt="Imagem da obra">
                      </a>
                    </div>

                    <?php
                    $i++;
                    // fecha o slide a cada 2 imagens
                    if ($i % 2 === 0): ?>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>

                <?php
                // se sobrar uma imagem sem par, fecha a div aberta
                if ($i % 2 !== 0): ?>
              </div>
            <?php endif; ?>
            </div>
          </div>
          <?php if (!empty($obras['entrega'])): ?>
            <div class="obras__entrega">
              Entrega prevista para <?= esc_html($obras['entrega']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
</div>
</section>
<?php endif; ?>

<?php if ($bn_img) : ?>
  <div class="container-custom">
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
        <a href="<?php echo esc_url($bn_link); ?>&text=Olá, Gostaria de saber mais sobre o empreendimento <?php echo the_title(); ?>" class="cta" target="_blank">
          <?php echo $bn_cta; ?>
        </a>
      </div>
    </div>
  </div>
<?php endif; ?>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const botoes = document.querySelectorAll(".planta-btn");
    const plantas = document.querySelectorAll(".planta-item");
    const legendas = document.querySelectorAll(".planta-legenda");

    botoes.forEach(botao => {
      botao.addEventListener("click", function() {
        const index = this.getAttribute("data-planta");

        // limpa tudo
        botoes.forEach(b => b.classList.remove("active"));
        plantas.forEach(p => p.classList.remove("active"));
        legendas.forEach(l => l.classList.remove("active"));

        // ativa botão + planta + legenda correspondentes
        this.classList.add("active");
        document.getElementById("planta-item-" + index).classList.add("active");
        document.getElementById("planta-legenda-" + index).classList.add("active");
      });
    });

    // Progress bar (SCRIPT SITE ANTIGO SA BY LUCAS)
    const circleElements = document.querySelectorAll('[id^="circle"]');
    const numberElements = document.querySelectorAll('.number');

    function updateProgress(circleId, numberElement) {
      const circle = document.getElementById(circleId);
      const percentageText = numberElement.textContent.trim();
      const percentage = parseFloat(percentageText);

      if (!isNaN(percentage) && percentage >= 0) {
        const circumference = 2 * Math.PI * circle.getAttribute('r');
        const offset = circumference * (1 - (percentage / 100));

        circle.style.strokeDasharray = `${circumference} ${circumference}`;
        circle.style.strokeDashoffset = circumference;
        circle.animate(
          [
            // keyframes
            {
              strokeDashoffset: offset
            },
          ], {
            // timing options
            duration: 2,
            fill: 'forwards',
            easing: 'linear',
          }
        );

        animateCounter(numberElement, percentage);
      }
    }

    function animateCounter(numberElement, targetPercentage) {
      let currentPercentage = 0;
      const animationDuration = 2000; // Tempo de duração da animação em milissegundos
      const startTime = performance.now();

      numberElement.style.display = 'block';

      function updateCounter(timestamp) {
        const elapsedTime = timestamp - startTime;

        if (elapsedTime >= animationDuration) {
          numberElement.textContent = targetPercentage.toFixed(0) + '%';
        } else {
          currentPercentage = (elapsedTime / animationDuration) * targetPercentage;
          numberElement.textContent = currentPercentage.toFixed(0) + '%';
          requestAnimationFrame(updateCounter);
        }
      }

      requestAnimationFrame(updateCounter);
    }

    function checkAndActivate() {
      const anchor4Element = document.getElementById('obras');
      const windowHeight = window.innerHeight;
      const scrollPosition = window.scrollY;

      if (anchor4Element) {
        const anchor4Offset = anchor4Element.offsetTop;

        if (scrollPosition + windowHeight >= anchor4Offset) {
          numberElements.forEach((numberElement) => {
            const circleId = numberElement.getAttribute('data-circle-id');
            updateProgress(circleId, numberElement);

            const observer = new MutationObserver(() => updateProgress(circleId, numberElement));
            observer.observe(numberElement, {
              characterData: true
            });
          });
          window.removeEventListener('scroll', checkAndActivate);
        }
      }
    }
    checkAndActivate();

    window.addEventListener('scroll', checkAndActivate);
  });
</script>

<?php get_footer(); ?>