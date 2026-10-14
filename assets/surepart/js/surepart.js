/**
 * SurePart — vanilla JS (no dependencies).
 */
(function () {
	'use strict';

	// Mobile nav toggle
	var nav = document.querySelector('[data-sp-nav]');
	var toggle = document.querySelector('[data-sp-nav-toggle]');
	if (nav && toggle) {
		toggle.addEventListener('click', function () {
			var open = nav.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
		nav.addEventListener('click', function (e) {
			if (e.target.closest('a')) {
				nav.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
			}
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && nav.classList.contains('is-open')) {
				nav.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
				toggle.focus();
			}
		});
	}

	// Platform cards: tap to expand on touch devices (hover handles desktop)
	if (window.matchMedia('(hover: none)').matches) {
		document.querySelectorAll('.sp-card').forEach(function (card) {
			card.addEventListener('click', function (e) {
				if (e.target.closest('a')) return;
				document.querySelectorAll('.sp-card.is-active').forEach(function (c) {
					if (c !== card) c.classList.remove('is-active');
				});
				card.classList.toggle('is-active');
			});
		});
	}

	// About video: swap the poster for the oEmbed player on click
	document.querySelectorAll('[data-sp-video]').forEach(function (box) {
		var play = box.querySelector('[data-sp-video-play]');
		var tpl = box.querySelector('template[data-sp-video-embed]');
		if (!play || !tpl) return;
		play.addEventListener('click', function () {
			box.classList.add('is-playing');
			box.appendChild(tpl.content.cloneNode(true));
			var frame = box.querySelector('iframe');
			if (frame) frame.focus();
		});
	});

	// Contact form: submit label follows the enquiry type tab
	document.querySelectorAll('[data-sp-form]').forEach(function (form) {
		var submit = form.querySelector('[data-sp-submit]');
		form.addEventListener('change', function (e) {
			if (submit && e.target.name === 'sp_type') {
				submit.textContent = e.target.getAttribute('data-sp-submit-label');
			}
		});
	});
})();
