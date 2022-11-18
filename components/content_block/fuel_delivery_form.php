<section class="fuel-form px-4 padding">
  <div class="container">
    <div class="row">

      <div class="col-12 d-flex justify-content-center">
        <div class="form-wrap align-items-center justify-content-between align-items-center row g-5 large-gap">
            <?php if( get_sub_field('title') || get_sub_field('text') ) : ?>
              <div class="col-12 col-lg-6">
                <h3 class="mb-5 clr-white"><?php echo get_sub_field('title'); ?></h3>
                <div class="clr-white"><?php echo get_sub_field('text'); ?></div>
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