<?php
/* Template name: Main */
?>

<?php get_header(); ?>


<section class="hero" id="hero">
	
	<?php if( have_rows('image_slider') ): ?>
		<div class="swiper hero__swiper">
			<div class="swiper-wrapper hero__swiper_wrapper">
				<?php while( have_rows('image_slider') ): the_row(); 
					$img= get_sub_field('img');
					?>

					<div class="swiper-slide hero__swiper_slide">
						<img src="<?php echo $img; ?>" alt="">
					</div>

				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="hero__container container">
		<div class="clip-wrap">
			<h1 class="h1 hero__title">
				<?php the_field('title'); ?>
			</h1>
		</div>
		<div class="clip-wrap">
			<p class="hero__subtitle">
				<?php the_field('subtitle'); ?>
			</p>
		</div>
		<a href="<?php the_field('btn_url'); ?>" class="hero__btn btn"><?php the_field('btn_text'); ?></a>
	</div>

	<div class="hero__bottomText hero__bottomText--animation">
		<p class=""><?php the_field('bottom_slide_text'); ?></p>
	</div>


</section>

<?php get_footer(); ?>