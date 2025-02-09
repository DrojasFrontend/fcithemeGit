jQuery(document).ready(function ($) {
  console.log("init");
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

  // Inicialización: asegurarse que el primer panel esté abierto
	$(".accordion__panel:not(:first)").hide();
	$(".accordion__trigger:first").addClass("is-active");

	// Manejador de click para los triggers
	$(".accordion__trigger").click(function () {
		var $this = $(this);
		var $panel = $this.next(".accordion__panel");

		// Si el panel clickeado no está activo
		if (!$this.hasClass("is-active")) {
			// Cerrar todos los paneles abiertos
			$(".accordion__trigger").removeClass("is-active");
			$(".accordion__panel").slideUp(300);

			// Abrir el panel clickeado
			$this.addClass("is-active");
			$panel.slideDown(300);
		} else {
			// Si el panel clickeado está activo, cerrarlo
			$this.removeClass("is-active");
			$panel.slideUp(300);
		}

		return false; // Prevenir comportamiento por defecto
	});
});
