<?php
/* Template name: About */
?>

<?php get_header(); ?>

<div class="about-bg">
	<div class="about-bg__wrap" id="aboutBgImage">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_bg.png" alt="">
	</div>

	<section class="about-hero">
		<div class="about-hero__container container">
			<h1 class="about-hero__title">
				<div class="about-hero__title--left"><?php the_field('hero_title_word_1'); ?></div>
				<div class="about-hero__title--right"><?php the_field('hero_title_word_2'); ?></div>
				<div class="about-hero__title--left"><?php the_field('hero_title_word_3'); ?></div>
			</h1>
			<div class="clip-wrap">
				<p class="about-hero__subtitle">
					<?php the_field('hero_subtitle'); ?>
				</p>
			</div>
		</div>
	</section>

	<section class="focus">
		<div class="focus__container container">
			<div class="">
				<h2 class="focus__title anim-item">
					<?php the_field('section_2_title'); ?>
				</h2>
			</div>
			<div class="clip-wrap">
				<div class="focus__subtitle anim-item">
					<p>
						<?php the_field('section_2_subtitle_1'); ?>
					</p>
					<p>
						<?php the_field('section_2_subtitle_1'); ?>
					</p>
				</div>
			</div>
			<div class="clip-wrap">
				<a href="<?php the_field('section_2_btn_url'); ?>" class="focus__btn btn"><?php the_field('section_2_btn_text'); ?></a>
			</div>
			<div class="focus__large">
				<div class="focus__large--left"><?php the_field('section_2_large_title_left'); ?></div>
				<div class="focus__large--right"><?php the_field('section_2_large_title_right'); ?></div>
			</div>
		</div>
		<div class="focus__illustration">
			<img src="<?php the_field('section_2_img'); ?>" alt="">
		</div>
	</section>

	<section class="swiper roster-slider container">
		<div class="clip-wrap">
			<div class="roster-slider__mainTitle container">
				<h2 class="h2">
					<?php the_field('section_3_title'); ?>
				</h2>
			</div>
		</div>

		<div class="swiper-wrapper roster-slider__wrapper">
		<?php $post_ID = get_the_ID(); ?>
			<?php
				$args = array(
						'post_type' => 'roster',
						'posts_per_page' => 12, 

				);

				$archive_posts = new WP_Query($args);

				if ($archive_posts->have_posts()) :
						while ($archive_posts->have_posts()) : $archive_posts->the_post();
								?>
									<div class="swiper-slide roster-slider__slide">
										<div class="roster-slider__img">
											<img src="<?php the_field( 'image', $post_id ); ?>" alt="">
										</div>
										<h3 class="h3 roster-slider__title">
											<?php the_title(); ?>
										</h3>
										<div class="roster-slider__text">
											<span class="roster-slider__role">
												<?php the_field( 'role', $post_id ); ?>
											</span>
											<div class="roster-slider__desc">
													<p>
														<?php the_field( 'desc', $post_id ); ?>
													</p>
											</div>
											<div class="roster__item_links">
												<?php if( have_rows('social_media') ): ?>
													<div class="roster-slider__icons">
														<?php while( have_rows('social_media') ): the_row(); 
															$icon = get_sub_field('icon');
															$link = get_sub_field('link');
															?>
															<a href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" alt=""></a>

														<?php endwhile; ?>
													</div>
												<?php endif; ?>

												<a href="<?php the_permalink(); ?>" class="roster-slider__view">View Profile</a>
											</div>
										</div>
									</div>
						<?php endwhile; ?>
				<?php endif; ?>
		</div>

	</section>


	<?php $post = get_post($post_ID); ?>
	
	<section class="real">
		<div class="real__container">
			<div class="real__title">
				<div class="real__title--left"><?php the_field('section_4_large_title_left'); ?><?php $post_ID; ?></div>
				<div class="real__title--right"><?php the_field('section_4_large_title_right'); ?></div>
			</div>
			
			<?php if( have_rows('section_4_slider') ): ?>
				<div class="swiper real-slider">
					<div class="swiper-wrapper real-slider__wrapper">
						<?php while( have_rows('section_4_slider') ): the_row(); 
							$img = get_sub_field('img');
							$desc = get_sub_field('desc');
							$name = get_sub_field('name');
							?>

								<div class="swiper-slide real-slider__slide">
									<div class="real-slider__img">
										<img src="<?php echo $img; ?>" alt="">
									</div>
									<p class="real-slider__text">
										<?php echo $desc; ?>
									</p>
									<span class="real-slider__name">
										<?php echo $name; ?>
									</span>
								</div>

						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>

		</div>

	</section>

	<section class="partners">
		<div class="partners__container container">
			<div class="clip-wrap">
				<h3 class="partners__title">
					<?php the_field('section_5_title'); ?>
				</h3>
			</div>
			<div class="clip-wrap">
				<p class="partners__subtitle">
				<?php the_field('section_5_subtitle'); ?>
				</p>
			</div>


			<?php if( have_rows('section_5_list') ): ?>
				<div class="partners__wrap">
						<?php while( have_rows('section_5_list') ): the_row(); 
							$img = get_sub_field('img');
							?>

							<div class="partners__item">
								<img src="<?php echo $img; ?>" alt="">
							</div>

						<?php endwhile; ?>
				</div>
			<?php endif; ?>

		</div>
	</section>
</div>

<?php get_template_part( 'parts/footer' ); ?>




<?php get_footer(); ?>