jQuery(document).ready(function ($) {
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
});

/* Alianzas */
var swiperAlianzas = new Swiper(".swiperAlianzas", {
	slidesPerView: 1,
	spaceBetween: 36,
	centeredSlides: true,
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
		640: {
			slidesPerView: 2,
			spaceBetween: 36,
      centeredSlides: true,
		},
		1024: {
			slidesPerView: 2,
			spaceBetween: 36,
      centeredSlides: true,
		},
	},
});

 jQuery(document).ready(function ($) {
    // Mostrar el modal al hacer clic en el botón abrir
    $("#open-modal-form").on("click", function () {
      $(".seccionCitasFormularioContacto__modal").fadeIn();
    });

    // Ocultar el modal al hacer clic en el botón cerrar
    $("#close-modal-form").on("click", function () {
      $(".seccionCitasFormularioContacto__modal").fadeOut();
    });
  });