<footer>
  <?php
  $id = 105;
  // Redes
  $logo = get_field('logo', $id);
  $rede_1 = get_field('rede_social_1', $id);
  $rede_2 = get_field('rede_social_2', $id);
  $rede_3 = get_field('rede_social_3', $id);
  $rede_4 = get_field('rede_social_4', $id);

  // Showroom
  $showroom = get_field('showroom', $id);

  // Contato
  $tel = get_field('tel', $id);
  $whatsapp = get_field('whatsapp', $id);
  ?>
  <div class="container-custom-sm">
    <div class="links">
      <div class="redes">
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo $logo; ?>" alt="Logo">
        </a>
        <div class="redes__wrapper">
          <?php if ($rede_1) : ?>
            <a href="<?php echo $rede_1['link']; ?>" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo $rede_1['imagem']; ?>" alt="<?php echo $rede_1['identificacao']; ?>">
            </a>
          <?php endif; ?>
          <?php if ($rede_2) : ?>
            <a href="<?php echo $rede_2['link']; ?>" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo $rede_2['imagem']; ?>" alt="<?php echo $rede_2['identificacao']; ?>">
            </a>
          <?php endif; ?>
          <?php if ($rede_3) : ?>
            <a href="<?php echo $rede_3['link']; ?>" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo $rede_3['imagem']; ?>" alt="<?php echo $rede_3['identificacao']; ?>">
            </a>
          <?php endif; ?>
          <?php if ($rede_4) : ?>
            <a href="<?php echo $rede_4['link']; ?>" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo $rede_4['imagem']; ?>" alt="<?php echo $rede_4['identificacao']; ?>">
            </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="menu__wrapper">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'rodape',
          'menu_class'     => 'header-menu',
          'container'      => 'nav',
          'container_class' => 'container',
        ));
        ?>
      </div>
      <div class="showroom">
        <p class="title">
          Showroom
        </p>
        <div class="item">
          <div class="img">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22" fill="none">
              <path d="M7.17783 21.5561C1.12375 12.5052 0 11.5763 0 8.25C0 3.69364 3.58171 0 8 0C12.4183 0 16 3.69364 16 8.25C16 11.5763 14.8763 12.5052 8.82217 21.5561C8.42488 22.148 7.57508 22.1479 7.17783 21.5561ZM8 11.6875C9.84096 11.6875 11.3333 10.1485 11.3333 8.25C11.3333 6.35151 9.84096 4.8125 8 4.8125C6.15904 4.8125 4.66667 6.35151 4.66667 8.25C4.66667 10.1485 6.15904 11.6875 8 11.6875Z" fill="#1A539E" />
            </svg>
          </div>
          <div class="text">
            <b>Endereço</b>
            <a href="<?php echo $showroom['link_maps']; ?>" target="_blank" rel="noopener noreferrer">
              <?php echo $showroom['endereco']; ?>
            </a>
          </div>
        </div>
      </div>
      <div class="contato">
        <p class="title">
          Contato
        </p>
        <div class="item">
          <div class="img">
            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.4581 13.4261L14.3018 11.6448C13.937 11.4894 13.5134 11.5938 13.2627 11.9009L11.422 14.1497C8.53331 12.7877 6.20855 10.463 4.84654 7.57425L7.0954 5.7336C7.40318 5.48327 7.50769 5.05921 7.35146 4.69453L5.57018 0.538228C5.39802 0.143523 4.96957 -0.0730414 4.54966 0.022401L0.690243 0.913037C0.286121 1.00636 -9.29055e-05 1.36628 2.26223e-08 1.78104C2.26223e-08 11.2997 7.71513 19 17.219 19C17.6339 19.0003 17.994 18.714 18.0873 18.3098L18.978 14.4503C19.0728 14.0284 18.8546 13.5986 18.4581 13.4261Z" fill="#1A539E" />
            </svg>
          </div>
          <div class="text">
            <b>Telefone</b>
            <a href="tel:<?php echo $tel['link']; ?>" target="_blank" rel="noopener noreferrer">
              <?php echo $tel['numero']; ?>
            </a>
          </div>
        </div>
        <div class="item">
          <div class="img">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
              <g clip-path="url(#clip0_2743_9607)">
                <path d="M0 21L1.50611 15.3829C0.650367 13.8463 0.205379 12.122 0.205379 10.372C0.205379 4.65244 4.86919 0 10.6027 0C16.3362 0 21 4.65244 21 10.372C21 16.0915 16.3362 20.7439 10.6027 20.7439C8.88264 20.7439 7.17971 20.3085 5.65648 19.489L0 21ZM5.93888 17.3805L6.29829 17.5939C7.60758 18.3707 9.09658 18.7805 10.6027 18.7805C15.2494 18.7805 19.0318 15.0073 19.0318 10.372C19.0318 5.73659 15.2494 1.96341 10.6027 1.96341C5.95599 1.96341 2.17359 5.73659 2.17359 10.372C2.17359 11.9 2.60147 13.411 3.40587 14.7341L3.62836 15.0927L2.78973 18.2256L5.95599 17.3805H5.93888Z" fill="#04B052" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4705 11.8152C14.0426 11.5591 13.4864 11.2774 12.9815 11.4822C12.5964 11.6359 12.3482 12.242 12.1001 12.5493C11.9717 12.7115 11.8177 12.7286 11.6208 12.6518C10.1661 12.0713 9.05361 11.1066 8.25776 9.77492C8.12084 9.57004 8.14652 9.40785 8.30911 9.21151C8.54872 8.9298 8.85679 8.60541 8.91669 8.22126C8.98515 7.83712 8.80544 7.39322 8.64285 7.05175C8.43747 6.61639 8.21498 5.99322 7.77855 5.74565C7.37635 5.51517 6.84578 5.64322 6.48637 5.93346C5.87023 6.43712 5.57072 7.22248 5.57928 8.00785C5.57928 8.2298 5.60495 8.45175 5.66485 8.66517C5.79322 9.17736 6.02427 9.66395 6.29811 10.1164C6.50349 10.4578 6.71742 10.7993 6.95703 11.1152C7.73576 12.1652 8.70275 13.0786 9.81522 13.77C10.3715 14.1115 10.979 14.4103 11.6037 14.6152C12.3054 14.8457 12.9301 15.0847 13.6832 14.9396C14.4705 14.7859 15.2492 14.2993 15.5658 13.5396C15.66 13.3176 15.7028 13.0615 15.6514 12.8225C15.5402 12.3274 14.8812 12.0371 14.479 11.7981L14.4705 11.8152Z" fill="#04B052" />
              </g>
              <defs>
                <clipPath id="clip0_2743_9607">
                  <rect width="21" height="21" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="text">
            <b>WhatsApp</b>
            <a href="<?php echo $whatsapp['link']; ?>" target="_blank" rel="noopener noreferrer">
              <?php echo $whatsapp['numero']; ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="copyright">
    <div class="wrapper">
      <span class="copy">
        Copyright 2025 - Todos os direitos reservados Santo André Empreendimentos
      </span>
      <a href="https://www.agenciadelucca.com.br" target="_blank" rel="noopener noreferrer" class="copy-delucca">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo-delucca.svg" alt="Agência Delucca">
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>