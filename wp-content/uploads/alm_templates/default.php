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