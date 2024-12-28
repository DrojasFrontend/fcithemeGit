jQuery(document).ready(function ($) {
	/* Soluciones Medicas */
	var swiperLegadoTargetasCarusel = new Swiper(".swiperLegadoTargetasCarusel", {
		slidesPerView: 1,
		spaceBetween: 18,
		loop: true,
		pagination: {
			el: ".swiper-pagination-solu",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-solu",
			prevEl: ".swiper-button-prev-solu",
		},
		breakpoints: {
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 36,
				mousewheel: false,
			},
		},
	});

	/* Soluciones Testimonios */
	var swiperLegadoSolCarusel = new Swiper(".swiperLegadoSolCarusel", {
		slidesPerView: 1,
		spaceBetween: 18,
		loop: true,
		pagination: {
			el: ".swiper-pagination-tes",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-tes",
			prevEl: ".swiper-button-prev-tes",
		},
		breakpoints: {
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			1024: {
				slidesPerView: 2,
				spaceBetween: 36,
				mousewheel: false,
			},
		},
	});

	/* Grid Carusel */
	var swiperLegadoGridCarusel = new Swiper(".swiperLegadoGridCarusel", {
		slidesPerView: 1,
		spaceBetween: 18,
		loop: true,
		pagination: {
			el: ".swiper-pagination-grid",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-grid",
			prevEl: ".swiper-button-prev-grid",
		},
		breakpoints: {
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			1024: {
				slidesPerView: 2,
				spaceBetween: 70,
				mousewheel: false,
			},
		},
	});

	/* Accordion */
	$(".paginaLegadoPreguntas__titulo").click(function () {
		$(this)
			.toggleClass("active")
			.next(".paginaLegadoPreguntas__tab")
			.slideToggle()
			.parent()
			.siblings()
			.find(".paginaLegadoPreguntas__tab")
			.slideUp()
			.prev()
			.removeClass("active");
	});

  // Load more
	$(".post-item").slice(0, 5).show();
	$("[data-load-more]").click(function (e) {
		e.preventDefault();

		$(".post-item:hidden").slice(0, 9).fadeIn("slow");

		if ($(".post-item:hidden").length == 0) {
			$("[data-load-more]").fadeOut("slow");
		}
	});
});
