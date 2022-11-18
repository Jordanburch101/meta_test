<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
3423432423
	<section class="container">
		<div class="row">
			<div class="col-12">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			</div><!--col-xs-12-->
		</div>
	</section><!-- container -->

	<?php get_template_part('components/content_components');?>

<?php get_footer(); ?>
