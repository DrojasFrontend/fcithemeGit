jQuery(document).ready(function ($) {
	/* swiperTarjetas */
	var swiper = new Swiper(".swiperTarjetas", {
		slidesPerView: 1,
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

	/* swiperTarjetasInstalaciones */
	var swiper = new Swiper(".swiperTarjetasInstalaciones", {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: false,
		pagination: {
			el: ".swiper-pagination-ins",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-ins",
			prevEl: ".swiper-button-prev-ins",
		},
		breakpoints: {
			680: {
				slidesPerView: 2,
				spaceBetween: 36,
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
			1280: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
		},
	});

	function setEqualHeightTarjetasInstalaciones() {
		var maxHeight24 = 0;

		$(".swiperTarjetasInstalaciones .swiper-slide .heading--24").each(function () {
			var itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperTarjetasInstalaciones .swiper-slide .heading--24").css("height", maxHeight24);

		var maxHeight18 = 0;
		$(".swiperTarjetasInstalaciones .swiper-slide p.heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperTarjetasInstalaciones .swiper-slide p.heading--18").css("height", maxHeight18);
	}

	setEqualHeightTarjetasInstalaciones();

	$(".tabs").each(function () {
		var $tabsContainer = $(this);

		$tabsContainer.find(".tab-links a").on("click", function (e) {
			e.preventDefault();

			var $link = $(this);
			var targetTabId = $link.attr("href");

			// Elimina la clase activa de todas las pestañas y enlaces del grupo actual
			$tabsContainer.find(".tab-links li").removeClass("active");
			$tabsContainer.find(".tab-content .tab").removeClass("active");

			// Activa el enlace y la pestaña correspondientes
			$link.parent().addClass("active");
			$tabsContainer.find(targetTabId).addClass("active");
		});
	});

	/* Expetos */
	var swiperTrasplanteExpertos = new Swiper(
		".swiperTrasplanteExpertos",
		{
			slidesPerView: 1,
			spaceBetween: 10,
			loop: false,
			pagination: {
				el: ".swiper-pagination-exp",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next-exp",
				prevEl: ".swiper-button-prev-exp",
			},
			breakpoints: {
				680: {
					slidesPerView: 2,
					spaceBetween: 36,
				},
				1200: {
					slidesPerView: 3,
					spaceBetween: 36,
				},
				1280: {
					slidesPerView: 4,
					spaceBetween: 36,
				},
			},
		}
	);

	function setEqualHeightExpertos() {
		var maxHeight24 = 0;

		$(".swiperTrasplanteExpertos .swiper-slide .heading--24").each(
			function () {
				var itemHeight24 = $(this).outerHeight();
				if (itemHeight24 > maxHeight24) {
					maxHeight24 = itemHeight24;
				}
			}
		);
		$(".swiperTrasplanteExpertos .swiper-slide .heading--24").css(
			"height",
			maxHeight24
		);

		var maxHeight18 = 0;
		$(".swiperTrasplanteExpertos .swiper-slide .heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperTrasplanteExpertos .swiper-slide .heading--18").css(
			"height",
			maxHeight18
		);
	}

	setEqualHeightExpertos();

	/* Videos */
	var swiper = new Swiper(".swiperVideos", {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: false,
		pagination: {
			el: ".swiper-pagination-vid",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-vid",
			prevEl: ".swiper-button-prev-vid",
		},
		breakpoints: {
			680: {
				slidesPerView: 1,
				spaceBetween: 36,
			},
			1200: {
				slidesPerView: 2,
				spaceBetween: 36,
			},
			1280: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
		},
	});
});

jQuery(document).ready(function ($) {
        // Mostrar el modal al hacer clic en el botón abrir
        $("#open-modal-form").on("click", function () {
            $(".seccionTrasplanteFormularioContacto__modal").fadeIn();
        });

        // Ocultar el modal al hacer clic en el botón cerrar
        $("#close-modal-form").on("click", function () {
            $(".seccionTrasplanteFormularioContacto__modal").fadeOut();
        });
    });