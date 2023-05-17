import gsap from "gsap"
import { CSSRulePlugin, ScrollTrigger } from "gsap/all";

gsap.registerPlugin(CSSRulePlugin)
gsap.registerPlugin(ScrollTrigger)



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

//----------------ANIMATION---------------
gsap.set('body', { opacity: 1 })


gsap.set('.roster__item_links', { autoAlpha: 0 })
// gsap.set('.roster__item_title, .roster__item_role', { y: 70 })

let tl = null;

document.querySelectorAll('.roster__item').forEach(e => e.addEventListener('mouseenter', () => {
	tl = gsap.timeline()
		// .to(e.querySelectorAll('.roster__item_title, .roster__item_role'), { y: 0, duration: 0.7 })
		.to(e.querySelectorAll('.roster__item_text'), { y: -45, duration: 0.7 })
		.to(e.querySelector('.roster__item_links'), { autoAlpha: 1 }, '<+40%')
}))
document.querySelectorAll('.roster__item').forEach(e => e.addEventListener('mouseleave', () => {
	tl.kill()
	gsap.to(e.querySelector('.roster__item_links'), { autoAlpha: 0 })
	gsap.to(e.querySelectorAll('.roster__item_text'), { y: 0, duration: 0.7 })
	// gsap.to(e.querySelectorAll('.roster__item_title, .roster__item_role'), { y: 70, duration: 0.7 }, '<+50%')
}))

document.querySelectorAll('.roster__item').forEach(e => e.addEventListener('click', () => {
	tl = gsap.timeline()
		// .to(e.querySelectorAll('.roster__item_title, .roster__item_role'), { y: 0, duration: 0.7 })
		.to(e.querySelectorAll('.roster__item_text'), { y: -45, duration: 0.7 })
		.to(e.querySelector('.roster__item_links'), { autoAlpha: 1 }, '<+40%')
}))


let rosterTitleLine = CSSRulePlugin.getRule(".roster__title:before");
let rosterSubtitleLine = CSSRulePlugin.getRule(".roster__subtitle:before");
let rosterTitleAfter = CSSRulePlugin.getRule(".roster__title:after");


const rosterAnim = gsap.timeline()
	.from('.anim-item', { y: '100%', autoAlpha: 0, duration: 1, stagger: 0.3 }, 'qq1')
	.set('.clip-wrap--title', { overflow: 'visible' }, '>')
	// .to(rosterTitleAfter, { opacity: 1, duration: 0.7 }, '<')
	.from(rosterTitleAfter, { right: '-200px', opacity: 0, duration: 0.7 })

	.from(rosterTitleLine, { width: '0%', duration: 1, ease: 'none' }, '<')
	.from(rosterSubtitleLine, { width: '0%', duration: 0.5, ease: 'none' }, '>')
	.from('.header', { y: -70, autoAlpha: 0, duration: 0.7 }, '<-1')
	.from('.roster__item', { scaleX: 0, autoAlpha: 0, stagger: 0.1, duration: 1 }, '<')



if (screen.width > 992) {
	const rosterPageScroll = gsap.timeline()
		.to('.roster', { x: 10 })
		.to('.roster', { x: -10 })
		.to('.roster', { x: 0 })

	ScrollTrigger.create({
		animation: rosterPageScroll,
		trigger: ".roster",
		start: "0% 0%",
		scrub: 1
	})
}

let bodyNoise = CSSRulePlugin.getRule("body:after");

window.addEventListener('load', () => {
	gsap.to(bodyNoise, { opacity: 0.05, duration: 1 })
})
