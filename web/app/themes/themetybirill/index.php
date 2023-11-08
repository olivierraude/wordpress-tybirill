<?php get_header() ?>

<div class="container">

  <h1>Ferme Ty Birill</h1>

  <?php if (have_posts()) : ?>
    <ul>
      <?php while (have_posts()) : the_post(); ?>
        <li><?php the_title() ?></li>
      <?php endwhile; ?>
    </ul>
  <?php else : ?>
    <h1>Il n'y a pas d'article!</h1>
  <?php endif; ?>
</div>

<?php get_footer() ?>