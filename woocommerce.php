<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<section class="container">
		<div class="row">
			<div class="col-12">
				<?php woocommerce_content(); ?>
			</div><!--col-xs-12-->
		</div>
	</section><!-- container -->

<?php get_footer(); ?>
