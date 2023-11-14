<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->


  <?php wp_head() ?>
</head>

<body id="smooth-wrapper">
  <nav>
    <div class="nav">
      <?php
      wp_nav_menu([
        'theme_location'  => 'header',
        'container'       => 'false'
      ]);
      ?>

      <ul>
        <li><a href="#">Certificat cadeau</a></li>
      </ul>
    </div>
    <div class="logo-nav"><img src="./app/uploads/2023/10/logo-nav.png" alt="Pizzeria - Ferme Ty Birill"></div>

    <div class="footer-nav"><a href="#">Politique de confidentialité</a></div>
  </nav>
  <div class="nav-header">
    <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
      <span class="line l1"></span>
      <span class="line l2"></span>
    </button>
  </div>