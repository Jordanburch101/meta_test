<section class="content-block px-4 <?php echo get_sub_field('background_colour'); ?>">
  <div class="container">
    <div class="row">
      <?php if( get_sub_field('title') ) : ?>
        <div class="col-12">
          <h3 class="clr-primary mb-0"><?php echo get_sub_field('title'); ?></h3>
        </div>
      <?php endif; ?>
      <div class="col-12">
        <?php if( get_sub_field('text') ) : ?>
          <?php echo get_sub_field('text'); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>