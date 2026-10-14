<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body id="smooth-wrapper" <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <nav id="main-nav" aria-label="Navigation principale">
    <div class="nav">
      <?php
      wp_nav_menu([
          'theme_location' => 'header',
          'container'      => false,
          'fallback_cb'    => false,
      ]);
      ?>

      <ul>
        <li><a href="#">Certificat cadeau</a></li>
      </ul>
    </div>

    <div class="logo-nav">
      <img src="<?php echo esc_url(get_theme_file_uri('img/logo-nav.png')); ?>" alt="Pizzeria - Ferme Ty Birill" width="473" height="484">
    </div>

    <?php if (get_privacy_policy_url()) : ?>
      <div class="footer-nav"><?php the_privacy_policy_link(); ?></div>
    <?php endif; ?>
  </nav>

  <div class="nav-header">
    <button type="button" class="nav-toggler" aria-label="Ouvrir le menu" aria-controls="main-nav" aria-expanded="false">
      <span class="line l1"></span>
      <span class="line l2"></span>
    </button>
  </div>
