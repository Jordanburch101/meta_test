<section class="content-block px-4 <?php echo get_sub_field('background_colour'); ?>">
  <div class="container">
    <div class="row g-5 large-gap justify-content-between">
      <?php if( get_sub_field('title') ) : ?>
        <div class="col-12">
          <h3 class="clr-primary mb-0"><?php echo get_sub_field('title'); ?></h3>
        </div>
      <?php endif; ?>
      
      <div class="col-12 col-lg-6">
        <?php if( get_sub_field('text_left') ) : ?>
          <?php echo get_sub_field('text_left'); ?>
        <?php endif; ?>
      </div>
      <div class="col-12 col-lg-6">
        <?php if( get_sub_field('text_right') ) : ?>
          <?php echo get_sub_field('text_right'); ?>
        <?php endif; ?>
    </div>
  </div>
</section>