<?php get_header(); ?>

<div class="container">
  <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>

  <?php if (have_posts()) : ?>
    <ul>
      <?php while (have_posts()) : the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      <?php endwhile; ?>
    </ul>
  <?php else : ?>
    <p>Aucun contenu pour le moment.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
