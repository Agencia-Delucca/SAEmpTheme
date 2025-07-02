<?php
function register_cpt_empreendimentos() {
  register_post_type('empreendimentos', array(
    'label' => 'Empreendimentos',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 2,
    'menu_icon' => 'dashicons-admin-multisite',
    'rewrite' => array('slug' => 'empreendimentos'),
    'supports' => array('title', 'thumbnail', 'excerpt'),
    'show_in_rest' => true,
  ));
}
add_action('init', 'register_cpt_empreendimentos');
?>
