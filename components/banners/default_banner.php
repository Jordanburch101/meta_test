<section class="svg-banner px-4 margin-bottom position-relative">
  <div class="container">
    <div class="row justify-content-between g-5 svg-banner-content">

      <div class="col-12 col-lg-7">
        <?php if( get_sub_field('title') ) : ?>
          <h2 class="clr-white text-center text-md-start"><?php echo get_sub_field('title'); ?></h2>
          <?php else : ?>
          <h2 class="clr-white text-center text-md-start"><?php the_title(); ?></h2>
        <?php endif; ?>
        <?php if( get_sub_field('text') ) : ?>
          <h4 class="clr-white mb-0 text-center text-md-start"><?php echo get_sub_field('text'); ?></h4>
        <?php endif; ?>
      </div>
      <?php 
      $link = get_sub_field('button_#1');
      if( $link ): 
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <div class="col-12 col-lg-2 d-flex justify-content-center justify-content-lg-end align-items-end">
            <!-- button to footer -->
            <div class=""><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="secondary-btn"><?php echo esc_html( $link_title ); ?></a></div>
          </div>
      <?php endif; ?>

    </div>
  </div>
  <!-- vector -->
  <img class="svg-banner-vector" src="<?php echo get_template_directory_uri(); ?>/images/banner_vector.svg">
</section>