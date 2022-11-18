<section id="contact" class="enquiry-form px-4 margin">
    <div class="container">
      <div class="row g-5 large-gap justify-content-between">

        <div class="col-12 col-lg-5">
          <div class="enquiry-form-cta">
            <h5 class="mb-4 clr-secondary">Freephone us on</h5>
            <?php if ( get_field('phone', 'option') ) : ?>
              <h3><a class="clr-white" href="tel:<?php echo get_field('phone', 'option'); ?>"><i class="clr-secondary far fa-phone pe-3"></i><?php echo get_field('phone', 'option'); ?></a></h3>
            <?php endif; ?>
            <h5 class="mb-4 clr-white">Or find your local Account Manager</h5>
          </div>
        </div>

        <div class="col-12 col-lg-7">
          <h5 class="clr-primary mt-5 pb-4">Contact form</h5>
          <?php echo do_shortcode('[gravityform title="false" id="3" ajax="true"]') ?>
        </div>

      </div>
    </div>

  </section>