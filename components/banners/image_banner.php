<section class="px-4 image-banner">
  <div class="container">
    <div class="row g-5 justify-content-between align-items-center">


        <div class="col-12 col-lg-5 left">
          <div class="image-banner_content">
            <!-- title -->
            <?php if( get_sub_field('title') ) : ?>
              <h2 class="mb-5"><?php echo get_sub_field('title'); ?></h2>
            <?php endif; ?>
            <?php if( get_sub_field('text') ) : ?>
              <h4 class="mb-5"><?php echo get_sub_field('text'); ?></h4>
            <?php endif; ?>
            <div class="btn-wrap d-flex gap-5">
                <?php 
                $link = get_sub_field('button_#1');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="primary-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                <?php 
                $link = get_sub_field('button_#2');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="border-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-6 right">
          <div class="image-banner_image fluid-right" style="background: url(<?php echo get_sub_field('image'); ?>);">
            <!-- <?php if( get_sub_field('image') ) : ?>
              <img class="" src="<?php echo get_sub_field('image'); ?>"/>
            <?php endif; ?> -->
          </div>
        </div>


    </div>
  </div>
</section>