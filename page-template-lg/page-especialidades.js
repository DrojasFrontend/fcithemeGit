jQuery(document).ready(function ($) {
	/* Expetos */
	var swiperEspecialidadesExpertos = new Swiper(".swiperEspecialidadesExpertos", {
		slidesPerView: 1,
		spaceBetween: 0,
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
			640: {
				slidesPerView: 2,
				spaceBetween: 20,
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
	});

	function setEqualHeightExpertos() {
		var maxHeight24 = 0;

		$(".swiperEspecialidadesExpertos .swiper-slide .heading--24").each(function () {
			var itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperEspecialidadesExpertos .swiper-slide .heading--24").css(
			"height",
			maxHeight24
		);

		var maxHeight18 = 0;
		$(".swiper-slide .heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperEspecialidadesExpertos .swiper-slide .heading--18").css(
			"height",
			maxHeight18
		);
	}

	setEqualHeightExpertos();
});


/*Citas Medicas */

jQuery(document).ready(function ($) {

    var swiperTarjetasEPSCarusel = new Swiper(".swiperTarjetasEPSCarusel", {
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
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
          mousewheel: false,
        },
      },
    });
  });

  // Script para manejar los tabs
  jQuery(document).ready(function () {
    jQuery('.tab-item').click(function () {
      var tabId = jQuery(this).data('tab');

      // Cambiar la pestaña activa
      jQuery('.tab-item').removeClass('active');
      jQuery(this).addClass('active');

      // Mostrar el contenido correspondiente
      jQuery('.tab-content').removeClass('active');
      jQuery('#' + tabId).addClass('active');
    });
  });

  // Abrir Modal
  document.querySelectorAll('.abrirModal').forEach(function(boton) {
	boton.addEventListener('click', function() {
	  const modalId = this.getAttribute('data-modal');
	  document.getElementById(modalId).style.display = 'block';
	});
  });
  
  document.querySelectorAll('.close').forEach(function(span) {
	span.addEventListener('click', function() {
	  this.closest('.modal').style.display = 'none';
	});
  });
  
	// Cerrar el modal si se hace clic fuera de él
	window.onclick = function(event) {
		  if (event.target.classList.contains('modal')) {
			  event.target.style.display = "none";
		  }
	  }