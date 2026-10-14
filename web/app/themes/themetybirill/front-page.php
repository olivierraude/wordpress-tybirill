<?php
/**
 * Page d'accueil.
 *
 * Les contenus viennent des champs ACF de la page d'accueil et des
 * options « Pizzeria » (Réglages > Pizzeria). Toutes les sorties sont échappées.
 */

get_header();

$schedule = get_option('pizzeria_schedule', '');
$address  = get_option('pizzeria_address', '');
$phone    = get_option('pizzeria_phone', '');
$mail     = get_option('pizzeria_mail', '');
$podcast  = get_field('url_podcast');
?>

<form class="color-picker" action="">
  <fieldset>
    <legend class="visually-hidden">Choisir une couleur</legend>
    <label class="visually-hidden" for="blue">Majorelle</label>
    <input type="radio" name="theme" id="blue" checked>
    <label class="visually-hidden" for="green">Ajonc</label>
    <input type="radio" name="theme" id="green">
  </fieldset>
</form>

<div class="pizza">
  <img src="<?php echo esc_url(get_theme_file_uri('img/pizza.png')); ?>" alt="" width="350" height="350">
</div>

<section>
  <div class="container logo">
    <h1>
      <img src="<?php echo esc_url(get_theme_file_uri('img/logo.png')); ?>" alt="Pizzeria - Ferme Ty Birill">
    </h1>
  </div>
</section>

<section id="about">
  <div class="container about">
    <div class="text-about">
      <h2><?php echo esc_html(get_field('titre_a_propos')); ?></h2>
      <p><?php echo wp_kses_post(get_field('texte_a_propos', false, false)); ?></p>
    </div>

    <div class="img-about">
      <?php echo wp_get_attachment_image(get_field('image_a_propos'), 'large', false, ['class' => 'img']); ?>
    </div>
  </div>
</section>

<section id="gallery">
  <?php get_template_part('parts/carousel'); ?>
</section>

<section id="menu">
  <div class="container menu">
    <h2>MENU</h2>
    <br />
    <a href="#"><?php echo esc_html(get_field('texte_lien_menu')); ?></a>
  </div>
</section>

<section id="takeout">
  <div class="container takeout">
    <div class="text-takeout">
      <h2><?php echo esc_html(get_field('titre_pour_emporter')); ?></h2>
      <p><?php echo wp_kses_post(get_field('texte_pour_emporter', false, false)); ?></p>
    </div>

    <div class="img-takeout">
      <?php echo wp_get_attachment_image(get_field('image_pour_emporter'), 'large', false, ['class' => 'img']); ?>
    </div>
  </div>
</section>

<div class="container-marquee" aria-hidden="true">
  <div class="marquee">
    SLOW FOOD &#10168; GOOD FOOD - CIRCUIT COURT &#10168; INGRÉDIENTS DE LA FERME -
  </div>
</div>

<?php if ($podcast) : ?>
  <section id="audio">
    <div class="container audio">
      <h2>On parle de nous par ici</h2>
      <audio controls id="player" src="<?php echo esc_url($podcast); ?>">
        Votre navigateur ne permet pas d'écouter ce podcast.
        <a href="<?php echo esc_url($podcast); ?>">Télécharger l'épisode</a>.
      </audio>
    </div>
  </section>
<?php endif; ?>

<section>
  <?php if ($schedule) : ?>
    <div id="contact" class="container contact">
      <h2>HORAIRES</h2>
      <p><?php echo nl2br(esc_html($schedule)); ?></p>
    </div>
  <?php endif; ?>

  <?php if ($address) : ?>
    <div class="container contact">
      <h2>ADRESSE</h2>
      <a href="https://www.google.com/maps/place/FERME+TY+BIRILL/@48.6646275,-4.0794388,17z" target="_blank" rel="noopener">
        <?php echo nl2br(esc_html($address)); ?>
      </a>
    </div>
  <?php endif; ?>

  <?php if ($phone) : ?>
    <div class="container contact">
      <h2>TÉLÉPHONE</h2>
      <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
    </div>
  <?php endif; ?>

  <?php if ($mail) : ?>
    <div class="container contact">
      <h2>COURRIEL</h2>
      <a href="mailto:<?php echo esc_attr(antispambot($mail)); ?>"><?php echo esc_html(antispambot($mail)); ?></a>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
