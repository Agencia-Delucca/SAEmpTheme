<?php if (!is_front_page()) : ?>
  <div id="breadcrumb">
    <div class="container-custom">
      <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>

          <?php
          if (is_home()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title(get_option('page_for_posts')) . '</li>';
          } elseif (is_page()) {
            $parents = get_post_ancestors(get_the_ID());
            if (!empty($parents)) {
              $parents = array_reverse($parents);
              foreach ($parents as $parent_id) {
                echo '<li class="breadcrumb-item"><a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a></li>';
              }
            }
            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
          } elseif (is_singular()) {
            $post_type = get_post_type();
            $post_type_object = get_post_type_object($post_type);
            if ($post_type !== 'post') {
              echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_object->labels->name . '</a></li>';
            } elseif ($category = get_the_category()) {
              echo '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
            }
            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
          } elseif (is_category()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . single_cat_title('', false) . '</li>';
          } elseif (is_tag()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . single_tag_title('', false) . '</li>';
          } elseif (is_search()) {
            echo '<li class="breadcrumb-item active" aria-current="page">Resultados da busca por: "' . get_search_query() . '"</li>';
          } elseif (is_404()) {
            echo '<li class="breadcrumb-item active" aria-current="page">Página não encontrada</li>';
          } elseif (is_post_type_archive()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
          } elseif (is_tax()) {
            $term = get_queried_object();
            echo '<li class="breadcrumb-item active" aria-current="page">' . $term->name . '</li>';
          }
          ?>
        </ol>
      </nav>
    </div>
  </div>
<?php endif; ?>