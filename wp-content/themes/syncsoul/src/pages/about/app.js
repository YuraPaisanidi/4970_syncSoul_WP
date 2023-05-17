import gsap from "gsap"
import { ScrollTrigger } from "gsap/all";
import { CSSRulePlugin } from "gsap/all";

gsap.registerPlugin(ScrollTrigger)
gsap.registerPlugin(CSSRulePlugin)

gsap.set('.roster-slider', { overflow: 'visible' })

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


//----------Roster-slider--------------
const swiper = new Swiper(".roster-slider", {
	slidesPerView: 1,
	spaceBetween: 15,
	// centeredSlides: true,
	breakpoints: {
		768: {
			slidesPerView: 'auto',
			// initialSlide: 1,
			// centeredSlides: true,
			// spaceBetween: 30,
		},
		1200: {
			slidesPerView: 'auto'
			// initialSlide: 1,
			// centeredSlides: true,
			// spaceBetween: 30,
		},
	},
});


let slides = document.querySelectorAll('.roster-slider__slide');

slides.forEach(function (button, index) {
	button.addEventListener('click', function () {
		swiper.slideTo(index);
	});
});

//----------Real-slider--------------
const swiper2 = new Swiper(".real-slider", {
	slidesPerView: 1,
	spaceBetween: 15,
	// loop: true,
	centeredSlides: true,
	initialSlide: 1,
	breakpoints: {
		576: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 4,
			initialSlide: 2,
		},
		1200: {
			initialSlide: 3,
			spaceBetween: 25,
			slidesPerView: 5,
		},
	},
});

let slides2 = document.querySelectorAll('.real-slider__slide');

slides2.forEach(function (button, index) {
	button.addEventListener('click', function () {
		swiper2.slideTo(index);
	});
});



// gsap.set('.roster-slider__role, .roster-slider__desc, .roster-slider__links ', { autoAlpha: 0 })
gsap.set('.roster-slider__text ', { autoAlpha: 0 })
// gsap.set('.roster-slider__title, .roster-slider__role, .roster-slider__desc', { y: 250 })

let tl = null;

if (screen.width > 767) {
	document.querySelectorAll('.roster-slider__slide').forEach(e => e.addEventListener('mouseenter', () => {
		e.classList.add('hovered');
		tl = gsap.timeline()
			.to(e, { maxWidth: '435px', duration: 0.1 })
			// .to(e.querySelectorAll('.roster-slider__title, .roster-slider__role, .roster-slider__desc'), { y: 0, duration: 0.7 }, '>')
			.to(e.querySelectorAll('.roster-slider__title'), { y: -155, duration: 0.5 }, '<')
			// .to(e.querySelectorAll('.roster-slider__links, .roster-slider__role, .roster-slider__desc'), { autoAlpha: 1, duration: 0.7 }, '>+0.3')
			.to(e.querySelectorAll('.roster-slider__text'), { autoAlpha: 1, duration: 0.2 }, '>+0.2')
	}))


	document.querySelectorAll('.roster-slider__slide').forEach(e => e.addEventListener('mouseleave', () => {
		e.classList.remove('hovered');
		// tl.kill()
		tl.reverse()
		// gsap.to(e.querySelectorAll('.roster-slider__text'), { autoAlpha: 0, duration: 0.7 }, '>+0.4')
		// gsap.to(e, { maxWidth: '330px' })
		// gsap.to(e.querySelectorAll('.roster-slider__title'), { y: 0, duration: 0.5 }, '<')
	}))


	document.querySelectorAll('.roster-slider__slide').forEach(e => e.addEventListener('click', () => {
		if (!e.classList.contains('hovered')) {
			tl = gsap.timeline()
				.to(e.querySelectorAll('.roster-slider__title'), { y: -165, duration: 0.5 }, '<')
				.to(e.querySelectorAll('.roster-slider__text'), { autoAlpha: 1, duration: 0.2 }, '>+0.2')
		}

	}))
}

if (screen.width <= 767) {
	gsap.set('.roster-slider__text ', { autoAlpha: 1 })
	gsap.to('.roster-slider__title', { y: -165, duration: 0.5 }, '<')

	document.querySelectorAll('.roster-slider__slide').forEach(e => e.addEventListener('mouseenter', () => {

	}))

	document.querySelectorAll('.roster-slider__slide').forEach(e => e.addEventListener('mouseleave', () => {
		tl.kill()
		gsap.to(e.querySelectorAll('.roster-slider__links, .roster-slider__role, .roster-slider__desc'), { autoAlpha: 0, duration: 1 })
		gsap.to(e.querySelectorAll('.roster-slider__title, .roster-slider__role, .roster-slider__desc'), { y: 160, duration: 0.7 }, '<+50%')
	}))

}

//--------------------Animation---------------------------

// gsap.set('body', { opacity: 1 })

const aboutAnim = gsap.timeline()
	.set('body', { opacity: 1 })

	.from('.about-hero__title--left', { x: '-100%', autoAlpha: 0, duration: 1 })
	.from('.about-hero__title--right', { x: '100%', autoAlpha: 0, duration: 1 }, '<')
	.from('.about-hero__subtitle', { y: '100%', autoAlpha: 0, duration: 1 }, '<')
	.from('.about-hero__container', { background: '#21212120', duration: 1 }, '<+0.5')
	// .from('.about-hero__container', { y: '300%', autoAlpha: 0, duration: 1 })
	.from('.about-bg', { autoAlpha: 0, duration: 1 }, '<')
	.from('.header', { y: -70, autoAlpha: 0, duration: 0.7 }, '<+50%')

let focusTitleBefore = CSSRulePlugin.getRule(".focus__title:before");

gsap.set(focusTitleBefore, { autoAlpha: 0 })


const aboutScrollAnim1 = gsap.timeline()
	.from('.anim-item', { y: '100%', autoAlpha: 0, duration: 1, stagger: 0.1 }, 'qq1')
	.to('.focus__btn', { autoAlpha: 1, duration: 0.7 }, '<+50%')
	.from('.focus__illustration', { x: '100%', autoAlpha: 0, duration: 1 }, 'qq1')
	.set('.clip-wrap--title', { overflow: 'visible' }, '>')
	.to(focusTitleBefore, { opacity: 1, duration: 0.7 }, '<')


ScrollTrigger.create({
	animation: aboutScrollAnim1,
	trigger: ".focus",
	start: "0% 80%",
})


const focusSectionParallax = gsap.timeline({})
	.to('.focus__illustration', { y: 75 })
	.to('.focus__title', { x: 50 }, '<')

ScrollTrigger.create({
	animation: focusSectionParallax,
	trigger: ".focus__illustration",
	start: "0% 80%",
	end: "100% 0%",
	scrub: 2
})



const focusLargeScrollAnim = gsap.timeline()
	.from('.focus__large--left', { x: '-100%', autoAlpha: 0, duration: 1 }, '<+50%')
	.from('.focus__large--right', { x: '100%', autoAlpha: 0, duration: 1 }, '<')

ScrollTrigger.create({
	animation: focusLargeScrollAnim,
	trigger: ".focus__large",
	start: "0% 90%",
	end: "0% 50%",
	scrub: 2
})



const aboutScrollAnim2 = gsap.timeline()
	.from('.roster-slider__mainTitle', { y: '100%', autoAlpha: 0, duration: 1, stagger: 0.1 })
	.from('.roster-slider__slide', { autoAlpha: 0, stagger: 0.1, duration: 0.2 }, '<+0.2')

ScrollTrigger.create({
	animation: aboutScrollAnim2,
	trigger: ".roster-slider",
	start: "0% 50%",
})

const aboutScrollAnim3 = gsap.timeline()
	.from('.real__title--left', { x: '-100%', autoAlpha: 0, duration: 1 })
	.from('.real__title--right', { x: '100%', autoAlpha: 0, duration: 1 }, '<')
	.from('.real-slider__slide', { autoAlpha: 0, stagger: { from: 'end', each: 0.1 }, duration: 0.2 }, '<+0.2')

ScrollTrigger.create({
	animation: aboutScrollAnim3,
	trigger: ".real",
	start: "0% 50%",
})

const realSectionParallax = gsap.timeline({})
	.to('.real__title', { x: 75 })

ScrollTrigger.create({
	animation: realSectionParallax,
	trigger: ".real",
	start: "0% 80%",
	end: "100% 0%",
	scrub: 2
})


const aboutScrollAnim4 = gsap.timeline()
	.from('.partners__title', { y: '100%', autoAlpha: 0, duration: 1 })
	.from('.partners__subtitle', { y: '100%', autoAlpha: 0, duration: 1 }, '<+0.2')
	.from('.partners__item img', { y: '100%', autoAlpha: 0, duration: 0.3, stagger: { each: 0.05 } }, '<+0.2')


ScrollTrigger.create({
	animation: aboutScrollAnim4,
	trigger: ".partners",
	start: "0% 50%",
})


const image = document.getElementById('aboutBgImage');
let mouseX = 0;
let mouseY = 0;

document.addEventListener('mousemove', (event) => {
	mouseX = event.clientX;
	mouseY = event.clientY;
	animateImage(true);
});

function animateImage(x) {
	if (x == true) {
		const dx = mouseX - (image.offsetLeft + image.clientWidth / 2);
		const dy = mouseY - (image.offsetTop + image.clientHeight / 2);

		gsap.to(image, {
			x: dx * 0.01,
			y: dy * 0.01,
			duration: 1
		});

		requestAnimationFrame(animateImage);
	}
}

// document.querySelector('.about-bg').addEventListener('mouseenter', () => {
// 	animateImage(true)
// })


let bodyNoise = CSSRulePlugin.getRule("body:after");

window.addEventListener('load', () => {
	gsap.to(bodyNoise, { opacity: 0.05, duration: 1 })
})
