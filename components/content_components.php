<?php if( have_rows('content_areas') ):
   while ( have_rows('content_areas') ) : the_row(); ?>
   
      <!-- Banners -->
      <?php if( get_row_layout() == 'home_banner' ): ?>
      <?php get_template_part('components/banners/home_banner');?>

      <?php elseif( get_row_layout() == 'image_banner' ): ?>
      <?php get_template_part('components/banners/image_banner');?>

      <?php elseif( get_row_layout() == 'default_banner' ): ?>
      <?php get_template_part('components/banners/default_banner');?>

      <!-- Content block -->
      <?php elseif( get_row_layout() == 'content_block' ): ?>
      <?php get_template_part('components/content_block/content_block');?>

      <?php elseif( get_row_layout() == 'content_block_70_30' ): ?>
      <?php get_template_part('components/content_block/content_block_70_30');?>

      <?php elseif( get_row_layout() == 'content_block_-_5050' ): ?>
      <?php get_template_part('components/content_block/content_block_50_50');?>

      <?php elseif( get_row_layout() == 'contact_block' ): ?>
      <?php get_template_part('components/content_block/contact_block');?>

      <?php elseif( get_row_layout() == 'image_with_text' ): ?>
      <?php get_template_part('components/image_with_text/image_with_text');?>

   
      <?php endif; ?>

   <?php endwhile; 
endif;?>
