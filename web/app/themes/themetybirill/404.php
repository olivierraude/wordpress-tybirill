<?php get_header(); ?>

<section>
  <div class="container logo">
    <div class="container badrequest">
      <h1>
        <img src="<?php echo esc_url(get_theme_file_uri('img/logo-404.png')); ?>" alt="Page introuvable" width="650" height="643">
      </h1>
      <a href="<?php echo esc_url(home_url('/')); ?>"><span aria-hidden="true">&#8592;</span> Retour vers l'accueil</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
