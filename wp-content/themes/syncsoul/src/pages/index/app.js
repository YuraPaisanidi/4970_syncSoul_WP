import gsap from "gsap"

import { CSSRulePlugin } from "gsap/all";

gsap.registerPlugin(CSSRulePlugin)

document.addEventListener("DOMContentLoaded", function () {

	//----------------------HAMBURGER-----------------------
	const hamburger = (hamburgerButton, hamburgerNav, hamburgerHeader) => {
		const button = document.querySelector(hamburgerButton),
			nav = document.querySelector(hamburgerNav),
			header = document.querySelector(hamburgerHeader);

		button.addEventListener('click', (e) => {
			button.classList.toggle('hamburger--active');
			nav.classList.toggle('header__nav--active');
			header.classList.toggle('header--menu');
		});

	};
	hamburger('.hamburger', '.header__nav', '.header');

	//----------------FIXED HEADER--------------
	const headerFixed = (headerFixed, headerActive) => {
		const header = document.querySelector(headerFixed),
			active = headerActive.replace(/\./, '');

		window.addEventListener('scroll', function () {
			const top = pageYOffset;

			if (top >= 90) {
				header.classList.add(active);
			} else {
				header.classList.remove(active);
			}

		});

	};

	headerFixed('.header', '.header--active');

	//----------------HERO SLIDER------------


	const heroSwiper = new Swiper(".hero__swiper", {
		loop: true,
		// loopedSlides: 15,
		// loopPreventsSlide: false,
		loopAdditionalSlides: 2,
		direction: 'horizontal',
		speed: 3500,
		spaceBetween: 10,
		slidesPerView: 'auto',

		autoplay: {
			disableOnInteraction: false,
			pauseOnMouseEnter: false,
			delay: 0,
			// reverseDirection: true,
			// invert: true
		},
		// freeMode: false,
		// freeModeMomentum: false,
		// observer: true
	})

	heroSwiper.update();
	heroSwiper.autoplay.start()
	// heroSwiper.updateSlides();



	//-----------------Animation---------------
	gsap.set(`.hero__title, .hero__subtitle, .hero__btn, .hero__swiper`, { autoAlpha: 0 })


	gsap.set('.hero__title, .hero__subtitle', { y: '100%' })

	const indexAnim = gsap.timeline()
		.to('body', { opacity: 1, duration: 0.5, delay: 1 })
		.to('.hero__title, .hero__subtitle', { y: 0, autoAlpha: 1, stagger: 0.1, duration: 1 })
		.to(' .hero__btn', { autoAlpha: 1, duration: 0.7, ease: 'none', }, '>')

		.set('.hero__swiper', { autoAlpha: 1 })
		.from('.hero__swiper_slide', { scaleX: 0, duration: 0.7, stagger: { from: 'random', each: 0.02 } }, '<')

		.from('.header', { y: -70, autoAlpha: 0, duration: 1 }, '<+0.2')
		.from('.hero__bottomText', { y: '100%', autoAlpha: 0, duration: 1 }, '<+0.2')


	let bodyNoise = CSSRulePlugin.getRule("body:after");

	window.addEventListener('load', () => {
		gsap.to(bodyNoise, { opacity: 0.05, duration: 1 })
	})


})
