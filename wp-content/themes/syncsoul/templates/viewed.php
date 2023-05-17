<?php
/* Template name:Viewed */
?>

<?php get_header(); ?>


<section class="viewed">
	<div class="viewed__container">
		<div class="viewed__illustration_bg">
			<img src="<?php the_field('image'); ?>" alt="">
		</div>

		<div class="viewed__wrap container">
			<div class="viewed__illustration">
				<div class="clip-wrap clip-wrap--illustration">
					<div class="viewed__img" id="viewedImg">
						<img src="<?php the_field('image'); ?>" alt="">
					</div>
				</div>
			</div>

			<div class="viewed__desc">
				<div class="clip-wrap">
					<h1 class="h2 viewed__title anim-item">
						<?php the_field('name'); ?>
					</h1>
				</div>
				<div class="clip-wrap">
					<p class="viewed__role anim-item">
						<?php the_field('role'); ?>
					</p>
				</div>
				<div class="clip-wrap">
					<p class="viewed__info anim-item">
						<?php the_field('desc'); ?>
					</p>
				</div>

				<div class="clip-wrap">

				<?php if( have_rows('social_media') ): ?>
					<div class="viewed__social anim-item">
							<?php while( have_rows('social_media') ): the_row(); 
								$icon = get_sub_field('icon');
								$link = get_sub_field('link');
								?>

								<a href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" alt=""></a>

							<?php endwhile; ?>
					</div>
				<?php endif; ?>

				</div>

				<div class="clip-wrap">
					<div class="viewed__buttons anim-item">
						<a href="<?php the_field('button_1_url'); ?>" class="btn btn--white"><?php the_field('button_1_text'); ?></a>
						<a href="<?php the_field('button_2_url'); ?>" class="btn"><?php the_field('button_2_text'); ?></a>
					</div>
				</div>


			</div>
		</div>
	</div>
</section>

	<?php get_footer(); ?>