jQuery(document).ready(function ($) {
	/* swiperHero */
	var swiperHero = new Swiper(".swiperHero", {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: false,
		pagination: {
			el: ".swiper-pagination-her",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-her",
			prevEl: ".swiper-button-prev-her",
		},
	});

	const breakpoint = window.matchMedia("(min-width:1024px)");
	let mySwiper;

	// Función para inicializar Swiper solo en móviles
	const enableSwiper = function () {
		mySwiper = new Swiper(".swiperTarjetas", {
			slidesPerView: "auto",
			spaceBetween: 10,
			centeredSlides: true,
			pagination: {
				el: ".swiper-pagination-tar",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			breakpoints: {
				640: {
					slidesPerView: 2,
					spaceBetween: 10,
					centeredSlides: true,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 36,
				},
			},
		});
	};

	// Función para verificar el tamaño de pantalla y activar/desactivar Swiper
	const breakpointChecker = function () {
		if (breakpoint.matches) {
			// Pantallas de escritorio: destruir Swiper si existe
			if (mySwiper) mySwiper.destroy(true, true);
		} else {
			// Pantallas móviles: activar Swiper si no existe
			if (!mySwiper) enableSwiper();
		}
	};

	// Ajusta las alturas de elementos de tarjeta
	function setEqualHeightTarjetas() {
		let maxHeight24 = 0;
		$(".swiperTarjetas .swiper-slide .heading--24").each(function () {
			const itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperTarjetas .swiper-slide .heading--24").css("height", maxHeight24);

		let maxHeight18 = 0;
		$(".swiper-slide p.heading--18").each(function () {
			const itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperTarjetas .swiper-slide p.heading--18").css("height", maxHeight18);
	}

	// Inicializar ajuste de alturas y verificación de Swiper
	setEqualHeightTarjetas();
	breakpoint.addListener(breakpointChecker);

	// Ejecuta la verificación de pantalla al cargar
	breakpointChecker();

	/* swiperServicios */
	var swiperServicios = new Swiper(".swiperServicios", {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: false,
		pagination: {
			el: ".swiper-pagination-ser",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-ser",
			prevEl: ".swiper-button-prev-ser",
		},
		breakpoints: {
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
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

	function setEqualHeightExpertos() {
		var maxHeight24 = 0;

		$(".swiperServicios .swiper-slide .heading--24").each(function () {
			var itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperServicios .swiper-slide .heading--24").css("height", maxHeight24);

		var maxHeight18 = 0;
		$(".swiper-slide .heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperServicios .swiper-slide .heading--18").css("height", maxHeight18);
	}

	setEqualHeightExpertos();

	/* Tabs */
	$(".investigacionesProyectos__tab-button").click(function () {
		$(".investigacionesProyectos__tab-button").removeClass("active");
		$(".investigacionesProyectos__tab-content").removeClass("active");

		$(this).addClass("active");

		const tabId = $(this).data("tab");
		$("#" + tabId).addClass("active");
	});

	// Load more
	$(".post-item").slice(0, 6).show();
	$("[data-load-more]").click(function (e) {
		e.preventDefault();

		$(".post-item:hidden").slice(0, 9).fadeIn("slow");

		if ($(".post-item:hidden").length == 0) {
			$("[data-load-more]").fadeOut("slow");
		}
	});

	/* swiperGaleria */
	var swiperGaleria = new Swiper(".swiperGaleria", {
		slidesPerView: 1,
		spaceBetween: 10,
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
			640: {
				slidesPerView: 1,
				spaceBetween: 10,
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 36,
			},
		},
	});

	/* Load more equipos */
	const INITIAL_CARDS = 3; // Número de tarjetas a mostrar inicialmente
	const CARDS_PER_LOAD = 3; // Número de tarjetas a mostrar por cada click

	document.querySelectorAll("[data-load-mores]").forEach((button) => {
		const groupId = button.getAttribute("data-load-mores");
		console.log("Inicializando grupo:", groupId);

		const cardsContainer = document.getElementById(groupId);
		const cards = Array.from(
			cardsContainer.querySelectorAll(".investigacionesEquipos__tarjeta")
		);

		let currentIndex = 0;

		const isMobile = () => window.innerWidth <= 768;

		const updateCardsVisibility = () => {
			if (isMobile()) {
				cards.forEach((card) => {
					card.style.display = "none";
				});

				if (currentIndex === 0) {
					for (let i = 0; i < INITIAL_CARDS && i < cards.length; i++) {
						cards[i].style.display = "block";
						console.log("Mostrando tarjeta inicial:", i + 1);
					}
				} else {
					for (
						let i = 0;
						i < currentIndex + CARDS_PER_LOAD && i < cards.length;
						i++
					) {
						cards[i].style.display = "block";
						console.log("Mostrando tarjeta:", i + 1);
					}
				}

				button.style.display =
					currentIndex + CARDS_PER_LOAD >= cards.length ? "none" : "block";
				console.log("Botón visible:", button.style.display === "block");
			} else {
				cards.forEach((card) => {
					card.style.display = "block";
				});
				button.style.display = "none";
			}
		};

		button.addEventListener("click", () => {
			if (currentIndex === 0) {
				currentIndex = INITIAL_CARDS;
			} else {
				currentIndex += CARDS_PER_LOAD;
			}

			console.log("Nuevo índice después del click:", currentIndex);
			updateCardsVisibility();
		});

		updateCardsVisibility();

		window.addEventListener("resize", () => {
			currentIndex = 0;
			updateCardsVisibility();
		});
	});

	/* Buscador Unidad Sintesis*/
	let offset = 0;
	let currentSearch = "";
	let currentTipo = "";
	let currentTematica = "";

	// Función para cargar posts
	function loadPosts(resetOffset = true) {
		if (resetOffset) {
			offset = 0;
			$("#search-results").empty();
		}

		// Mostrar indicador de carga
		$("#search-results").append('<div class="loading">Cargando...</div>');

		$.ajax({
			url: ajax_object.ajax_url,
			type: "POST",
			data: {
				action: "search_posts",
				nonce: ajax_object.nonce,
				search: currentSearch,
				tipo: currentTipo,
				tematica: currentTematica,
				offset: offset,
			},
			success: function (response) {
				// Remover indicador de carga
				$(".loading").remove();

				console.log("Response:", response); // Debug

				// Verificar que response y response.posts existan
				if (
					response &&
					response.posts &&
					Array.isArray(response.posts) &&
					response.posts.length > 0
				) {
					response.posts.forEach(function (post) {
						if (post && post.title && post.date && post.link) {
							$("#search-results").append(`
								<a href="${post.link}" class="investigacionesBuscador__tarjeta" title="${post.title}">
									<div class="investigacionesBuscador__info">
										<img width="37" height="42" src="/wp-content/themes/fcitheme/assets/images/iconos/icono-descarga.png" title="icono descarga"/>
										<h3 class="heading--24 color--002D72 fw-500">${post.title}</h3>
										<p class="heading--12 color--717C7D fw-400">${post.date} - 8 min de lectur</p>
									</div>
									<span href="" class="heading--18 color--E40046">
										<span class="link--hover">Conoce más</span>
										<img src="/wp-content/themes/fcitheme/assets/images/iconos/icono-arrow-next-rojo.svg" title="conoce mas"/>
									</span>
								</a>
							`);
						}
					});

					$("#load-more").toggle(response.has_more);
					if (response.has_more) {
						offset += 6;
					}
				} else {
					if (resetOffset) {
						$("#search-results").html("<p>No se encontraron resultados.</p>");
					}
					$("#load-more").hide();
				}
			},
			error: function (xhr, status, error) {
				console.error("Error en la búsqueda:", error);
				console.log("XHR:", xhr.responseText); // Debug
				$(".loading").remove();
				$("#search-results").html(
					"<p>Ocurrió un error al buscar. Por favor, intente nuevamente.</p>"
				);
				$("#load-more").hide();
			},
		});
	}

	// Manejar envío del formulario
	$("#custom-search-form").on("submit", function (e) {
		e.preventDefault();
		currentSearch = $("#search-input").val();
		currentTipo = $("#tipo-select").val();
		currentTematica = $("#tematica-select").val();
		loadPosts();
	});

	// Manejar clic en "Cargar más"
	$("#load-more").on("click", function () {
		loadPosts(false);
	});

	// Cargar posts iniciales
	loadPosts();
});
