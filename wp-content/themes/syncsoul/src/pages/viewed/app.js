import gsap from "gsap"

import { CSSRulePlugin } from "gsap/all";

gsap.registerPlugin(CSSRulePlugin)


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


//-------------Animation--------------
gsap.set('body', { opacity: 1 })

const viewedAnim = gsap.timeline()
	.from('.anim-item', { y: '100%', autoAlpha: 0, duration: 1, stagger: 0.15 }, 'qq1')
	.from('.header', { y: -70, autoAlpha: 0, duration: 0.7 }, '<+0.2')
	.from('.viewed__img', { y: '100%', duration: 1 }, 'qq1')
	.from('.viewed__illustration_bg', { opacity: 0, duration: 2 }, '>')


const image = document.getElementById('viewedImg');
let mouseX = 0;
let mouseY = 0;

document.addEventListener('mousemove', (event) => {
	mouseX = event.clientX;
	mouseY = event.clientY;
});

function animateImage(x) {
	if (x == true) {
		const dx = mouseX - (image.offsetLeft + image.clientWidth / 2);
		const dy = mouseY - (image.offsetTop + image.clientHeight / 2);

		gsap.to(image, {
			x: dx * 0.05,
			y: dy * 0.05,
			duration: 1
		});

		requestAnimationFrame(animateImage);
	}
}

document.querySelector('.viewed__illustration').addEventListener('mouseenter', () => {
	animateImage(true)
})


let bodyNoise = CSSRulePlugin.getRule("body:after");

window.addEventListener('load', () => {
	gsap.to(bodyNoise, { opacity: 0.05, duration: 1 })
})