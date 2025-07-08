<?php get_header();
// Template Name: Home
if (function_exists('enqueue_homepage')) {
  enqueue_homepage();
}

// Topo
$topo = get_field('topo');

$bullet_labels = [];

if ($topo) {
  foreach ($topo as $banner) {
    $bullet_labels[] = esc_js($banner['bullet']);
  }
}
?>

<div id="home">
  <div class="topo">
    <div class="swiper-wrapper topo__slide">
      <?php foreach ($topo as $item) : ?>
        <div class="swiper-slide">
          <video src="<?php echo $item['video']; ?>" autoplay loop muted playsinline></video>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<script>
  const bulletLabels = <?php echo json_encode($bullet_labels); ?>;
</script>

<?php get_footer(); ?>