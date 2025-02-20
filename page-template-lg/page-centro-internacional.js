jQuery(document).ready(function ($) {
	/* swiperTarjetas */
	var swiper = new Swiper(".swiperTarjetas", {
		slidesPerView: 1.2,
		spaceBetween: 10,
		centeredSlides: false,
		loop: false,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			680: {
				slidesPerView: 2,
				spaceBetween: 36,
				centeredSlides: false,
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 36,
				centeredSlides: false,
			},
			1280: {
				slidesPerView: 3,
				spaceBetween: 36,
				centeredSlides: false,
			},
		},
	});
	function setEqualHeightTarjetas() {
		var maxHeight24 = 0;

		$(".swiperTarjetas .swiper-slide .heading--24").each(function () {
			var itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperTarjetas .swiper-slide .heading--24").css("height", maxHeight24);

		var maxHeight18 = 0;
		$(".swiperTarjetas .swiper-slide p.heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperTarjetas .swiper-slide p.heading--18").css("height", maxHeight18);
	}
	setEqualHeightTarjetas();

	/* swiperTarjetasGrandes */
	var swiper = new Swiper(".swiperTarjetasGrandes", {
		slidesPerView: 1.1,
		spaceBetween: 10,
		centeredSlides: false,
		loop: false,
		pagination: {
			el: ".swiper-pagination-grandes",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-grandes",
			prevEl: ".swiper-button-prev-grandes",
		},
		breakpoints: {
			680: {
				slidesPerView: 2,
				spaceBetween: 36,
				centeredSlides: false,
			},
			1200: {
				slidesPerView: 2,
				spaceBetween: 36,
				centeredSlides: false,
			},
			1280: {
				slidesPerView: 2,
				spaceBetween: 36,
				centeredSlides: false,
			},
		},
	});

	/* swiperTarjetasHorizontal */
	var swiper = new Swiper(".swiperTarjetasHorizontal", {
		slidesPerView: 1,
		spaceBetween: 10,
		centeredSlides: false,
		loop: false,
		pagination: {
			el: ".swiper-pagination-hor",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-hor",
			prevEl: ".swiper-button-prev-hor",
		},
	});

	/* swiperGaleria */
	var swiper = new Swiper(".swiperGaleria", {
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
		pagination: {
			el: ".swiper-pagination-gal",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-gal",
			prevEl: ".swiper-button-prev-gal",
		},

    breakpoints: {
			680: {
				slidesPerView: 1,
				spaceBetween: 0,
				centeredSlides: true,
			},
			1200: {
				slidesPerView: 1,
				spaceBetween: 0,
				centeredSlides: true,
			},
			1280: {
				slidesPerView: 2.5,
				spaceBetween: 36,
				centeredSlides: true,
			},
		},
	});

	$(".tab-button").click(function () {
		$(".tab-button").removeClass("active");
		$(this).addClass("active");
		const tabId = $(this).data("tab");

		$(".tab-content").removeClass("active");
		$(`#${tabId}`).addClass("active");
	});
    
    $('a[href^="#formulario"]').click(function (e) {
		e.preventDefault();
		$("#formulario").fadeIn();
	});

	$("#close-modal-form").click(function () {
		$("#formulario").fadeOut();
	});
});