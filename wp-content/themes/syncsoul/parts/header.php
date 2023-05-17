<header class="header">
	<div class="header__container container">
		<a href="<?php echo get_home_url(); ?>/contact" class="header__contact"> 
			Contact
		</a>

		<a href="<?php echo get_home_url(); ?>" class="header__logo">
			<img src="<?php the_field('logo', 'option'); ?>" alt="">
		</a>

		<div class="header__menu">
			<span>Menu</span>
			<button class="hamburger" type="button">
				<span class="hamburger__item"></span>
			</button>
		</div>

	</div>
</header>