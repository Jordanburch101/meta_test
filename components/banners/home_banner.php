<section class="px-4 home-banner">
  <div class="container">
    <div class="row g-5 justify-content-between">


        <div class="col-12 col-lg-5 left">
          <div class="home-banner_content">
            <!-- title -->
            <?php if( get_sub_field('title') ) : ?>
              <h1 class="mb-5"><?php echo get_sub_field('title'); ?></h1>
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
          <div class="home-banner_image fluid-right" style="background: url(<?php echo get_sub_field('image'); ?>);">
            <!-- <?php if( get_sub_field('image') ) : ?>
              <img class="" src="<?php echo get_sub_field('image'); ?>"/>
            <?php endif; ?> -->
          </div>
        </div>

        <div class="col-12 d-flex justify-content-center">
          <div class="home-banner_bottom align-items-center justify-content-between align-items-center row g-5">
              <?php if( get_sub_field('title_bottom') ) : ?>
                <div class="col-12 col-lg-6 mt-0">
                  <h3 class="mb-0 clr-white"><?php echo get_sub_field('title_bottom'); ?></h3>
                </div>
              <?php endif; ?>
              <div class="col-12 mt-lg-0 col-lg-6">
                <?php echo do_shortcode('[gravityform title="false" id="1" ajax="true"]') ?>
              </div>
          </div>
        </div>

    </div>
  </div>
</section>