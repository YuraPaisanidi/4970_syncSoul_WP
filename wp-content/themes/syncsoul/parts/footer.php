<footer class="footer">
	<div class="footer__container container">
		<div class="footer__wrap">
			<div class="footer__contacts">
				<h4 class="footer__title">
					Contact
				</h4>
				<a href="<?php echo get_home_url(); ?>/general-enquiries/">
					General Enquiries
				</a>
				<a href="<?php echo get_home_url(); ?>/submit-your-music">
					Submit your Music
				</a>
				<a href="<?php echo get_home_url(); ?>/join-the-roster">
					Join the Roster
				</a>
			</div>

			<?php echo do_shortcode('[contact-form-7 id="152" title="Subscribe"]') ?>
		</div>

		<div class="footer__bottom">
			<div class="footer__links">
				<a href="<?php the_field('footer_fb_link', 'option'); ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_fb.svg" alt="">
				</a>
				<a href="<?php the_field('footer_inst_link', 'option'); ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_insta.svg" alt="">
				</a>
				<a href="<?php the_field('footer_spot_link', 'option'); ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_spot.svg" alt="">
				</a>
				<a href="<?php the_field('footer_tiktok_link', 'option'); ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_tiktok.svg" alt="">
				</a>
				<a href="<?php the_field('footer_linkedin_link', 'option'); ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer_ln.svg" alt="">
				</a>
			</div>

			<p class="footer__copyright">
				Enter the Vibe © 2023 • All rights reserved
			</p>

			<div class="footer__madeby">
				Handcrafted with &#10084; By
				<a href="#">Media Beast</a>
			</div>
		</div>
	</div>
</footer>