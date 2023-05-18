<?php get_header(); ?>


<section class="roster">
	<div class="roster__container container">
		<div class="roster__head">
			<div class="clip-wrap clip-wrap--title">
				<h1 class="roster__title anim-item">Roster</h1>
			</div>
			<div class="clip-wrap">
				<p class="roster__subtitle anim-item">
					Representing the world’s most alluring, transportive and sultry music genres.
				</p>
			</div>
		</div>

		<!-- <div class="roster__list">
		
			<?php
				$args = array(
						'post_type' => 'roster', // Тип записів, які ви хочете вивести
						'posts_per_page' => 3, // Кількість постів, які ви хочете показати
				);

				$archive_posts = new WP_Query($args);

				if ($archive_posts->have_posts()) :
						while ($archive_posts->have_posts()) : $archive_posts->the_post();
								// Відображення постів з архіву
								// the_title(); // Приклад виводу заголовку поста
								// the_content(); // Приклад виводу контенту поста
								?>
								<div class="roster__item">
									<div class="roster__item_img">
										<img src="<?php the_field( 'image', $post_id ); ?>" alt="">
									</div>
									<div class="roster__item_text">
										<h3 class="h3 roster__item_title">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<span class="roster__item_role">
											<?php the_field( 'role', $post_id ); ?>
										</span>
									</div>

									<div class="roster__item_links">
										<?php if( have_rows('social_media') ): ?>
													<?php while( have_rows('social_media') ): the_row(); 
														$icon = get_sub_field('icon');
														$link = get_sub_field('link');
														?>

														<a href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" alt=""></a>

													<?php endwhile; ?>
										<?php endif; ?>
									</div>

								</div>
							<?php endwhile; ?>
				<?php endif; ?>

					
		</div> -->

		<?php echo do_shortcode('[ajax_load_more post_type="roster" posts_per_page="3" scroll="false"]') ?>
		<!-- <button href="#" class="roster__btn btn" id="load-more-button">Load more</button> -->

	</div>
</section>


<?php get_template_part( 'parts/footer' ); ?>

<?php wp_enqueue_script( 'roster-script', get_template_directory_uri() . '/assets/js/roster.js', array(), '', true ); ?>

<?php get_footer(); ?>