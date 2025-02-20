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

	$('a[href="#formCitaTeleC"]').click(function (e) {
		e.preventDefault();
		$("#formCitaTeleC").fadeIn();
	});

	$("#cerrarFormCitaTeleC").click(function (e) {
		$("#formCitaTeleC").fadeOut();
	});
});

document.addEventListener("DOMContentLoaded", function () {
	const tabs = document.querySelectorAll(".tab");
	const contents = document.querySelectorAll(".tab-content");

	tabs.forEach((tab) => {
		tab.addEventListener("click", function () {
			tabs.forEach((t) => t.classList.remove("active"));
			this.classList.add("active");

			const target = this.getAttribute("data-tab");
			contents.forEach((content) => {
				if (content.id === target) {
					content.style.display = "grid";
				} else {
					content.style.display = "none";
				}
			});
		});
	});
});

document.addEventListener("DOMContentLoaded", function () {
    const videoModal = document.getElementById("videoModal");
    const videoIframe = document.getElementById("videoIframe");
    const closeModal = document.querySelector(".video-modal__close");

    document.querySelector(".video-thumbnail").addEventListener("click", function () {
        let videoUrl = this.getAttribute("data-video");
        if (videoUrl) {
            let embedUrl = videoUrl.replace("watch?v=", "embed/");
            videoIframe.src = embedUrl + "?autoplay=1";
            videoModal.style.display = "block";
        }
    });

    closeModal.addEventListener("click", function () {
        videoModal.style.display = "none";
        videoIframe.src = "";
    });

    window.addEventListener("click", function (event) {
        if (event.target === videoModal) {
            videoModal.style.display = "none";
            videoIframe.src = "";
        }
    });
});