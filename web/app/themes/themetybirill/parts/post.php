<div class="card" style="width: 18rem;">
  <?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']); ?>
  <div class="card-body">

    <h5 class="card-title"><?php the_title(); ?></h5>
    <!-- <h6 class="card-subtitle mb2 text-muted"><?php the_category(); ?></h6> -->

    <ul>
      <?php
      the_terms(get_the_ID(), 'sport', '<li>', '</li><li>', '</li>')
      ?>
    </ul>

    <!-- <?php
          var_dump(get_the_terms(get_the_ID(), 'sport'));
          ?> -->

    <p class="card-text"><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Go to the article</a>

  </div>
</div>