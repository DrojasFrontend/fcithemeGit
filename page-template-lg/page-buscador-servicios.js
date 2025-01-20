jQuery(document).ready(function ($) {
	// Función para inicializar el comportamiento desktop
	function initDesktop() {
		// Asegurarse de que el primer item esté activo al inicio
		if (!$(".directorioEspecialidades__btn.activo").length) {
			$(".directorioEspecialidades__btn:first").addClass("activo");
			$(".directorioEspecialidades__content:first").addClass("activo");
		}

		// Remover eventos click previos
		$(".directorioEspecialidades__btn").off("click");

		// Agregar comportamiento desktop
		$(".directorioEspecialidades__btn").click(function () {
			var departamentoId = $(this).data("id");

			$(".directorioEspecialidades__btn").removeClass("activo");
			$(this).addClass("activo");

			$(".directorioEspecialidades__content").removeClass("activo");
			$(
				'.directorioEspecialidades__content[data-departamento="' +
					departamentoId +
					'"]'
			).addClass("activo");
		});

		// Asegurarse que el contenido esté visible en desktop
		$(".directorioEspecialidades__content").css("display", "");
	}

	// Función para inicializar el comportamiento mobile
	function initMobile() {
		// Remover eventos click previos
		$(".directorioEspecialidades__btn").off("click");

		// Agregar comportamiento mobile
		$(".directorioEspecialidades__btn").click(function () {
			$(this).toggleClass("activo");
			var $content = $(this)
				.next(".directorioEspecialidades__especialidades")
				.find('[data-departamento="' + $(this).data("id") + '"]');

			if ($content.is(":visible")) {
				$content.slideUp(300);
			} else {
				$(".directorioEspecialidades__content").not($content).slideUp(300);
				$content.slideDown(300);
			}

			$(".directorioEspecialidades__btn").not(this).removeClass("activo");
		});
	}

	// Función para manejar el cambio de comportamiento según el ancho
	function handleResize() {
		if ($(window).width() >= 1024) {
			initDesktop();
		} else {
			initMobile();
		}
	}

	// Ejecutar al cargar
	handleResize();

	// Ejecutar cuando cambie el tamaño de la ventana
	var resizeTimer;
	$(window).on("resize", function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(handleResize, 250);
	});
});
