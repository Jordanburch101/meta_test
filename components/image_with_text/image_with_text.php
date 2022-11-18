<section class="image-text px-4 <?php if( get_sub_field('background_colour') ) : ?><?php echo get_sub_field('background_colour'); ?><?php endif; ?>">
  <div class="container">
    <div class="row g-5 align-items-center">
      

      <?php if( get_sub_field('image') ) : ?>

        <?php 
          $image = get_sub_field('image');
          $size = 'medium'; // (thumbnail, medium, large, full or custom size)
          $med = $image['sizes'][ $size ];
        ?>

        <div class="col-12 col-lg-6 <?php echo get_sub_field('image_order'); ?>">
          <div class="wrap">
            <a data-fancybox href="<?php echo esc_url($med); ?>"><img src="<?php echo esc_url($med); ?>"></a>
          </div>
        </div>

      <?php endif; ?>

      <div class="col-12 col-lg-6 ">
        <div class="wrap">
          <?php if( get_sub_field('title') ) : ?>
            <h2 class="title mb-5">
              <?php echo get_sub_field('title'); ?>
            </h2>
          <?php endif; ?>
          <?php if( get_sub_field('text') ) : ?>
            <div class="text mb-5">
              <?php echo get_sub_field('text'); ?>
            </div>
          <?php endif; ?>
          <?php 
          $link = get_sub_field('button');
          if( $link ): 
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <div class="d-flex"><a class="secondary-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>



  

