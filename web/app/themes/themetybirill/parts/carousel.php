<?php
/**
 * Carrousel photos et vidéos de la page d'accueil (Swiper).
 *
 * Les champs ACF « images » et « videos » renvoient des URL.
 * Pour les images, on retrouve la pièce jointe afin d'afficher son texte
 * alternatif, son srcset et le chargement différé.
 */

$images = array_filter((array) get_field('images'));
$videos = array_filter((array) get_field('videos'));

if (!$images && !$videos) {
    return;
}
?>
<div class="container-slider swiper mySwiper" id="swiper-1">
  <div class="swiper-wrapper">
    <?php foreach ($images as $image) : ?>
      <div class="img-about swiper-slide">
        <?php
        $image_id = attachment_url_to_postid($image);
        if ($image_id) {
            echo wp_get_attachment_image($image_id, 'large');
        } else {
            printf('<img src="%s" alt="" loading="lazy">', esc_url($image));
        }
        ?>
      </div>
    <?php endforeach; ?>

    <?php foreach ($videos as $video) : ?>
      <div class="swiper-slide">
        <video controls preload="metadata">
          <source src="<?php echo esc_url($video); ?>">
        </video>
      </div>
    <?php endforeach; ?>
  </div>
</div>
