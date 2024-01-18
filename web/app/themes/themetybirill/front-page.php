<?php get_header() ?>

<form class="color-picker" action="">
  <fieldset>
    <legend class="visually-hidden">Pick a color</legend>
    <label class="visually-hidden" for="theme">Majorelle</label>
    <input type="radio" name="theme" id="blue" checked>
    <label class="visually-hidden" for="theme">Ajonc</label>
    <input type="radio" name="theme" id="green">
  </fieldset>
</form>

<div class="pizza">
  <img src="./app/uploads/2023/10/pizza.png" alt="Pizzeria - Ferme Ty Birill">
</div>

<!-- <section id="smooth-content"> -->
<section>

  <div class="container logo">
    <h1>
      <img src="./app/uploads/2023/10/logo.png" class="" alt="Pizzeria - Ferme Ty Birill">
    </h1>
  </div>

</section>

<section id="about">

  <div class="container about">
    <div class="text-about">
      <?php while (have_posts()) : the_post(); ?>
        <h2><?= get_field('titre_a_propos') ?></h2>
        <p><?= get_field('texte_a_propos', false, false) ?></p>
      <?php endwhile; ?>
    </div>

    <div class="img-about">
      <?php while (have_posts()) : the_post(); ?>
        <img class="img" src="<?= get_field('image_a_propos') ?>" />
      <?php endwhile; ?>
    </div>
  </div>

</section>

<section id="galery">

  <div class="container-slider swiper mySwiper">
    <div class="swiper-wrapper">

      <div class="img-about swiper-slide">
        <?php while (have_posts()) : the_post(); ?>
          <img class="img" src="<?= get_field('image_slider_1') ?>" />
        <?php endwhile; ?>
      </div>

      <div class="img-about swiper-slide">
        <?php while (have_posts()) : the_post(); ?>
          <img class="img" src="<?= get_field('image_slider_2') ?>" />
        <?php endwhile; ?>
      </div>

      <div class="img-about swiper-slide">
        <?php while (have_posts()) : the_post(); ?>
          <img class="img" src="<?= get_field('image_slider_3') ?>" />
        <?php endwhile; ?>
      </div>

      <div class="img-about swiper-slide">
        <?php while (have_posts()) : the_post(); ?>
          <img class="img" src="<?= get_field('image_slider_4') ?>" />
        <?php endwhile; ?>
      </div>

      <div class="img-about swiper-slide">
        <?php while (have_posts()) : the_post(); ?>
          <img class="img" src="<?= get_field('image_slider_5') ?>" />
        <?php endwhile; ?>
      </div>

      <div class="img-about swiper-slide">
        <?php while (have_posts()) : the_post(); ?>
          <img class="img" src="<?= get_field('image_slider_6') ?>" />
        <?php endwhile; ?>
      </div>

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

</section>

<section id="menu">

  <div class="container menu">
    <h2>MENU</h2>
    <br />
    <a href="#"><?= get_field('texte_lien_menu') ?></a>
  </div>

</section>

<section id="takeout">

  <div class="container takeout">
    <div class="text-takeout">
      <?php while (have_posts()) : the_post(); ?>
        <h2><?= get_field('titre_pour_emporter') ?></h2>
        <p><?= get_field('texte_pour_emporter', false, false) ?></p>
      <?php endwhile; ?>
    </div>

    <div class="img-takeout">
      <?php while (have_posts()) : the_post(); ?>
        <img class="img" src="<?= get_field('image_pour_emporter') ?>" />
      <?php endwhile; ?>
    </div>
  </div>

</section>

<!-- TODO -> Faire un widget avec le marquee -->
<div class="container-marquee">
  <div class="marquee">
    SLOW FOOD &#10168 GOOD FOOD - CIRCUIT COURT &#10168 INGRÉDIENTS DE LA FERME -
  </div>
</div>

<section>

  <div id="contact" class="container contact">
    <h2>HORAIRES (test)</h2>
    <p><?= get_option('pizzeria_schedule') ?></p>
  </div>
  <div class="container contact">
    <h2>ADRESSE</h2>
    <a href="https://www.google.com/maps/place/FERME+TY+BIRILL/@48.6646275,-4.0794388,17z/data=!3m1!4b1!4m6!3m5!1s0x4813e38471b53d53:0xdcf58cf2bd600b1!8m2!3d48.6646275!4d-4.0794388!16s%2Fg%2F11kppw1glf?authuser=0&hl=fr&entry=ttu" target="_blank"><?= get_option('pizzeria_address') ?></a>
  </div>
  <div class="container contact">
    <h2>TÉLÉPHONE</h2>
    <a href="tel:<?= str_replace(' ', '', get_option('pizzeria_phone')); ?>"><?= get_option('pizzeria_phone') ?></a>
  </div>
  <div class="container contact">
    <h2>COURRIEL</h2>
    <a href="mailto#" target="_blank"><?= get_option('pizzeria_mail') ?></a>
  </div>

</section>

<?php get_footer() ?>