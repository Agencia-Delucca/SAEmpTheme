<footer>
  <?php
  $id = 105;
  $logo = get_field('logo', $id);
  ?>
  <div class="container-custom-sm">
    <div class="links">
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