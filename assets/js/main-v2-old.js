document.addEventListener("DOMContentLoaded", function () {
	const toggleButton = document.getElementById("js-toggle-button");
	const menuMobile = document.getElementById("js-menu-mobile");

	toggleButton.addEventListener("click", function () {
		this.classList.toggle("is-active");
		menuMobile.classList.toggle("is-active");
		document.body.classList.toggle("is-active");
	});
});

/* Menu Escritorio */
document.addEventListener("DOMContentLoaded", function () {
	var menuItems = document.querySelectorAll(".has-submenu");

	menuItems.forEach(function (menuItem) {
		var subMenu = findSubMenu(menuItem);

		menuItem.addEventListener("mouseover", function () {
			if (subMenu) {
				menuItem.classList.add("is-hover");
			}
		});

		menuItem.addEventListener("mouseleave", function () {
			if (subMenu) {
				menuItem.classList.remove("is-hover");
			}
		});

		if (subMenu) {
			subMenu.addEventListener("mouseover", function () {
				menuItem.classList.add("is-hover");
			});

			subMenu.addEventListener("mouseleave", function () {
				menuItem.classList.remove("is-hover");
			});
		}
	});

	function findSubMenu(element) {
		var sibling = element.nextElementSibling;
		while (sibling) {
			if (sibling.tagName.toLowerCase() === "div") {
				var potentialSubMenu = sibling.querySelector(
					".sub-menu-nivel-0-wrapper, .sub-menu-nivel-1-wrapper, .sub-menu-nivel-2-wrapper, .sub-menu-nivel-3-wrapper"
				);
				if (potentialSubMenu) {
					return potentialSubMenu;
				}
			}
			sibling = sibling.nextElementSibling;
		}
		return null;
	}
});

/* Menu Mobile */
document.addEventListener("DOMContentLoaded", function () {
	const hasSubmenu = document.querySelectorAll(".has-submenu-mobile");
	const allSubmenus = document.querySelectorAll(
		".sub-menu-mobile-nivel-0, .sub-menu-mobile-nivel-1, .sub-menu-mobile-nivel-2, .sub-menu-mobile-nivel-3"
	);

	function closeAllSubmenus() {
		allSubmenus.forEach(function (submenu) {
			submenu.classList.remove("is-open");
		});
	}

	function handleSubmenuClick(event) {
		event.preventDefault();
		const submenu = this.nextElementSibling;

		if (submenu.classList.contains("is-open")) {
			submenu.classList.remove("is-open");
		} else {
			closeAllSubmenus();
			submenu.classList.add("is-open");
		}
	}

	hasSubmenu.forEach(function (item) {
		item.addEventListener("click", handleSubmenuClick);
	});

	const submenuTitles = document.querySelectorAll(
		".sub-menu-mobile-nivel-0-title, .sub-menu-mobile-nivel-1-title, .sub-menu-mobile-nivel-2-title, .sub-menu-mobile-nivel-3-title"
	);

	function handleTitleClick() {
		const parentSubMenu = this.parentElement.parentElement;
		const grandParentSubMenu = parentSubMenu.parentElement.parentElement;

		parentSubMenu.classList.remove("is-open");
		grandParentSubMenu.classList.add("is-open");
	}

	submenuTitles.forEach(function (title) {
		title.addEventListener("click", handleTitleClick);
	});
});

jQuery(document).ready(function ($) {
	// Manejar clic en una categoría

	$(".post-item").slice(0, 6).show();
	$("[data-vermas]").click(function (e) {
		e.preventDefault();

		$(".post-item:hidden").slice(0, 3).fadeIn("slow");

		if ($(".post-item:hidden").length == 0) {
			$("[data-vermas]").fadeOut("slow");
		}
	});

	$(document).on("click", ".category-link", function (e) {
		e.preventDefault();
		var catID = $(this).data("cat-id");
		getPostsByCategory(catID);

		$(".category-link").removeClass("active");
		// Agregar la clase 'active' al enlace de categoría seleccionado
		$(".category-link[data-cat-id='" + catID + "']").addClass("active");
	});

	// Obtener la primera categoría al cargar la página
	$.ajax({
		url: lm_params.ajaxurl,
		type: "POST",
		data: {
			action: "get_first_category_id",
		},
		success: function (response) {
			var firstCatID = parseInt(response);
			getPostsByCategory(firstCatID);

			// Agregar la clase 'active' al enlace de la primera categoría
			$(".category-link").removeClass("active");
			$(".category-link[data-cat-id='" + firstCatID + "']").addClass("active");
		},
	});

	$.ajax({
		url: lm_params.ajaxurl,
		type: "POST",
		data: {
			action: "get_blog_follows_categories",
		},
		success: function (response) {
			$(".categories").html(response);
		},
	});

	// Función para obtener posts por categoría
	function getPostsByCategory(catID) {
		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "get_posts_by_category",
				catID: catID,
			},
			success: function (response) {
				// Mostrar posts utilizando Slick
				$(".posts").html(response);
				$blogFellowSlider = $(".blogFellowSlider");
				blogFellowSliderSettings = {
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: true,
					arrows: true,
					infinite: false,
					responsive: [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 2,
								arrows: false,
							},
						},
					],
				};
				$blogFellowSlider.slick(blogFellowSliderSettings);
			},
		});
	}

	$("#search-input").on("input", function () {
		var searchTerm = $(this).val();
		searchPosts(searchTerm);
	});

	// Función para obtener posts por titulo
	function searchPosts(searchTerm) {
		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "search_blog_fellows",
				searchTerm: searchTerm,
			},
			success: function (response) {
				$(".posts").html(response);

				// Mostrar elementos iniciales
				$(".post-item").slice(0, 3).show();
				$("[data-vermas]").click(function (e) {
					e.preventDefault();
					$(".post-item:hidden").slice(0, 3).fadeIn("slow");
					if ($(".post-item:hidden").length == 0) {
						$("[data-vermas]").fadeOut("slow");
					}
				});
				// $blogFellowSlider = $(".blogFellowSlider");
				// blogFellowSliderSettings = {
				//   slidesToShow: 4,
				//   slidesToScroll: 1,
				//   dots: true,
				//   arrows: true,
				//   infinite: false,
				//   responsive: [
				//     {
				//       breakpoint: 1024,
				//       settings: {
				//         slidesToShow: 2,
				//         arrows: false,
				//       }
				//     },
				//   ]
				// };
				// $blogFellowSlider.slick(blogFellowSliderSettings);
			},
		});
	}

	const $slickBannerSlide = $(".slickBannerSlide");
	const slickBannerSlideSettings = {
		fade: true,
		cssEase: "linear",
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		touchMove: true,
		dots: true,
		arrows: false,
		infinite: false,
	};
	$slickBannerSlide.slick(slickBannerSlideSettings);

	let $sliderContainer = $('#sliderEventos');

    if ($sliderContainer.length > 0) {
		// Inicializa el carrusel de la información del evento
        let $slickEventoInfo = $sliderContainer.find('.slickEventoInfo').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            fade: false,
            asNavFor: $sliderContainer.find('.slickEventoDia'),
            infinite: false,
			responsive: [
                {
                    breakpoint: 768, // A partir de 768px y menos (dispositivos móviles)
                    settings: {
                        arrows: false
                    }
                }
            ]
        }).on('setPosition', function() {
			setEqualHeight($(this));
		});

        // Inicializa el carrusel de los días con ajuste para móviles
        var $slickEventoDia = $sliderContainer.find('.slickEventoDia').slick({
            slidesToShow: 6, // Muestra 6 días en escritorio
            slidesToScroll: 1,
            asNavFor: $sliderContainer.find('.slickEventoInfo'),
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: false,
            variableWidth: false, // Elementos con ancho fijo

            // Configuración responsive
            responsive: [
                {
                    breakpoint: 768, // A partir de 768px y menos (dispositivos móviles)
                    settings: {
                        slidesToShow: 2, // Muestra 2 días en dispositivos móviles
                        centerMode: false, // Desactiva el centrado en móviles
                        variableWidth: false, // Mantén el ancho fijo
						arrows: false
                    }
                }
            ]
        });

		// Función que ajusta el slider a la posición 0 si el evento más cercano es el primero
		function ajustarPosicionSlider(closestEventIndex) {
			if (closestEventIndex === 0) {
				// Para escritorio y dispositivos móviles
				$slickEventoDia.slick('slickSetOption', 'centerMode', false, true);
				$slickEventoInfo.slick('slickSetOption', 'centerMode', false, true);

				// Reiniciar sliders a la posición inicial
				$slickEventoDia.slick('slickGoTo', 0);
				$slickEventoInfo.slick('slickGoTo', 0);
			} else {
				// Si no es el primer evento, lo navega normalmente
				$slickEventoInfo.slick('slickGoTo', closestEventIndex);
			}
		}

        // Verificar si el evento más cercano es el primero
        if (closestEventIndex !== -1) {
            ajustarPosicionSlider(closestEventIndex);
        }

        // Detectar versión móvil y aplicar el ajuste para la versión mobile también
        var mobileQuery = window.matchMedia('(max-width: 768px)'); // Ajusta el tamaño para dispositivos móviles

        // Si es móvil, aplicamos la misma lógica
        if (mobileQuery.matches) {
            ajustarPosicionSlider(closestEventIndex);
        }

        // Escuchar cambios en el tamaño de la pantalla y ajustar cuando se pasa a móvil o desktop
        mobileQuery.addEventListener('change', function(e) {
            if (e.matches) {
                // Si entra en el tamaño móvil
                ajustarPosicionSlider(closestEventIndex);
            }
        });
    }

	const $slickTargetas = $("#sliderAtencionInvestigacion");
	const slickTargetasSettings = {
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		infinite: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					arrows: false,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				},
			},
		],
	};
	if ($slickTargetas.length > 0) {
		$slickTargetas.slick(slickTargetasSettings).on('setPosition', function() {
			setEqualHeight($(this));
		});
	}

	$window = $(window);
	const $slickArticulos = $(".slickArticulos");
	const slickArticulosSettings = {
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		infinite: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					arrows: false,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					arrows: false,
				},
			},
		],
	};
	if ($slickArticulos.length > 0) {
		$slickArticulos.slick(slickArticulosSettings);
	}

	$slickNoticias = $(".slickNoticias");
	slickNoticiasSettings = {
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		infinite: false,
		adaptiveHeight: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					arrows: false,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					arrows: false,
				},
			},
		],
	};
	$slickNoticias.slick(slickNoticiasSettings).on('setPosition', function() {
		setEqualHeight($(this));
	});

	$slickProfesionalesUrg = $(".slickProfesionalesUrg");
	slickProfesionalesUrgSettings = {
		slidesToShow: 4,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		infinite: false,
		adaptiveHeight: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					arrows: false,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					arrows: false,
				},
			},
		],
	};
	if ($slickProfesionalesUrg.length > 0) {
		$slickProfesionalesUrg.slick(slickProfesionalesUrgSettings);
	}
    
    $slickServiciosHome = $(".slickServiciosHome");
	slickServiciosHomeSettings = {
		slidesToShow: 6,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		infinite: false,
		adaptiveHeight: false,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 4,
					arrows: false,
				},
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					arrows: false,
				},
			},
			{
				breakpoint: 680,
				settings: {
					slidesToShow: 1,
					arrows: false,
				},
			},
		],
	};
	$slickServiciosHome.slick(slickServiciosHomeSettings);

	$(".tab-links a").on("click", function (e) {
		var currentAttrValue = $(this).attr("href");

		$(".tab").removeClass("active");
		$(currentAttrValue).addClass("active");

		$(".tab-links li").removeClass("active");
		$(this).parent("li").addClass("active");
		$('.slickMultimedia').slick('setPosition');
		e.preventDefault();
	});

	var $slickMultimedia = $(".slickMultimedia");

	// Configuración inicial del carousel
	var slickMultimediaSettings = {
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		infinite: false,
		adaptiveHeight: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 9999,
				settings: "unslick",
			},
		],
	};

	function initSlick() {
		if (window.innerWidth < 1024) {
			$slickMultimedia.slick(slickMultimediaSettings);
		} else {
			$slickMultimedia.slick("unslick");
		}
	}

	function setEqualHeight(slider) {
		let maxHeight = 0;
		slider.find('.slick-slide').each(function () {
			let slideHeight = $(this).outerHeight();
			if (slideHeight > maxHeight) {
				maxHeight = slideHeight;
			}
		});
		slider.find('.slick-slide .seccion__alto').css('height', maxHeight + 'px');
	}

	initSlick();
	$(window).on("resize", function () {
		initSlick();
	});

	$(".slickPersonalizado article")
		.closest("div")
		.addClass("seccion__alto");

	jQuery("#open-contact").on("click", function() {
		jQuery(this).parent().toggleClass("active");
	});
	
	
	// Buacador Blog Fellow
	function realizarBusqueda() {
		let author = $("#author_name").val();
		let order = $("#order").val();
		let search = $('input[name="s"]').val();

		$.ajax({
			url: lm_params.ajaxurl,
			type: "POST",
			data: {
				action: "filter_posts",
				author_name: author,
				order: order,
				s: search,
			},
			beforeSend: function () {
				$("#filtros-loader").fadeIn();
				$(".seccionArticulos section").fadeOut(); // Esconde artículos antes de cargar
			},
			success: function (response) {
				$(".seccionArticulos").html(response).fadeIn();
				$("#filtros-loader").fadeOut();
				actualizarFiltros();
			},
			error: function (xhr, status, error) {
				console.error("Error en la solicitud AJAX:", status, error);
				$("#filtros-loader").fadeOut();
			},
		});
	}

	function actualizarFiltros() {
		let filtrosAplicados = "";

		// Obtener valores de los filtros
		let author = $("#author_name").val();
		let order = $("#order").val();
		let search = $('input[name="s"]').val();

		// Construir los filtros seleccionados como HTML
		if (author) {
			filtrosAplicados += `<span class="filtro-chip">Dra. ${author} <button type="button" class="eliminar-filtro" data-filtro="author"></button></span>`;
		}

		if (order === "last_week") {
			filtrosAplicados += `<span class="filtro-chip">Última semana <button type="button" class="eliminar-filtro" data-filtro="order"></button></span>`;
		} else if (order === "ASC") {
			filtrosAplicados += `<span class="filtro-chip">Orden: Ascendente <button type="button" class="eliminar-filtro" data-filtro="order"></button></span>`;
		} else if (order === "DESC") {
			filtrosAplicados += `<span class="filtro-chip">Orden: Descendente <button type="button" class="eliminar-filtro" data-filtro="order"></button></span>`;
		}

		if (search) {
			filtrosAplicados += `<span class="filtro-chip">Buscar: ${search} <button type="button" class="eliminar-filtro" data-filtro="search"></button></span>`;
		}

		// Mostrar los filtros en el contenedor
		$(".filtros-aplicados").html(filtrosAplicados);

		// Mover el botón de borrar filtros después de los filtros aplicados
		$(".borrar-filtros").appendTo(".filtros-aplicados-contenedor");

		// Mostrar u ocultar el botón de borrar filtros en función de si hay filtros
		if (filtrosAplicados !== "") {
			$(".borrar-filtros").show();
			$(".seccionArticulosBuscados").fadeOut();
		} else {
			$(".borrar-filtros").hide();
			$(".seccionArticulosBuscados").fadeIn();
		}

		// Evento para eliminar filtros
		$(".eliminar-filtro").on("click", function () {
			let filtro = $(this).data("filtro");
			if (filtro === "author") {
				$("#author_name").val("");
			} else if (filtro === "order") {
				$("#order").val("");
			} else if (filtro === "search") {
				$('input[name="s"]').val("");
			}
			// Disparar la búsqueda nuevamente con los filtros actualizados
			realizarBusqueda();
		});
	}

	// Disparar la búsqueda cuando se cambian los filtros o se escribe en el input
	let searchTimeout;
	$('input[name="s"]').on("keyup", function () {
		clearTimeout(searchTimeout);
		searchTimeout = setTimeout(realizarBusqueda, 300);
	});

	$("#author_name, #order").on("change", function () {
		realizarBusqueda();
	});

	// Botón de resetear filtros
	$('button[type="reset"]').click(function () {
		window.location.reload();
	});
	
	
});