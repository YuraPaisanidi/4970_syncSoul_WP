<?php
/* Template name: Roster */
?>

<?php get_header(); ?>


<section class="roster">
	<div class="roster__container container">
		<div class="roster__head">
			<div class="clip-wrap clip-wrap--title">
				<h1 class="roster__title anim-item"><?php the_field('title'); ?></h1>
			</div>
			<div class="clip-wrap">
				<p class="roster__subtitle anim-item">
				<?php the_field('subtitle'); ?>
				</p>
			</div>
		</div>


	<?php if( have_rows('list') ): ?>
		<div class="roster__list">
			<?php while( have_rows('list') ): the_row(); 
				$img= get_sub_field('img');
				$name= get_sub_field('name');
				$mainUrl= get_sub_field('main_url');
				$role= get_sub_field('role');
				$socialMedia= get_sub_field('social_media');
				?>

					<div class="roster__item">
						<div class="roster__item_img">
							<img src="<?php echo $img; ?>" alt="">
						</div>
						<div class="roster__item_text">
							<h3 class="h3 roster__item_title">
								<a href="<?php echo $mainUrl; ?>">
									<?php echo $name; ?>
								</a>
							</h3>
							<span class="roster__item_role">
								<?php echo $role; ?>
							</span>
						</div>
						<?php if( have_rows('social_media') ): ?>
							<div class="roster__item_links">
							<?php while( have_rows('social_media') ): the_row(); 
								$icon= get_sub_field('icon');
								$link= get_sub_field('link');
								?>
								<a href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" alt=""></a>
							<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

		<a href="#" class="roster__btn btn">Load more</a>
	</div>
</section>

<?php get_template_part( 'parts/footer' ); ?>

<?php get_footer(); ?>