jQuery(document).ready(function ($) {
	$("[data-open-modal]").on("click", function () {
		$("#videoModal").fadeIn();
	});

	$(".close").on("click", function () {
		$("#videoModal").fadeOut();
	});

	$(window).on("click", function (event) {
		if ($(event.target).is("#videoModal")) {
			$("#videoModal").fadeOut();
		}
	});

	/* Noticias */
	var swiperMesCorazonNoticias = new Swiper(".swiperMesCorazonNoticias", {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		pagination: {
			el: ".swiper-pagination-noti",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-noti",
			prevEl: ".swiper-button-prev-noti",
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

	function setEqualHeightNoticias() {
		var maxHeight24 = 0;
		
		$(".swiperMesCorazonNoticias .swiper-slide .heading--24").each(function () {
			var itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperMesCorazonNoticias .swiper-slide .heading--24").css("height", maxHeight24);

		var maxHeight18 = 0;
		$(".swiper-slide .heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperMesCorazonNoticias .swiper-slide .heading--18").css("height", maxHeight18);
	}
	
	setEqualHeightNoticias();

	/* Expetos */
	var swiperMesCorazonExpertos = new Swiper(".swiperMesCorazonExpertos", {
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
		
		$(".swiperMesCorazonExpertos .swiper-slide .heading--24").each(function () {
			var itemHeight24 = $(this).outerHeight();
			if (itemHeight24 > maxHeight24) {
				maxHeight24 = itemHeight24;
			}
		});
		$(".swiperMesCorazonExpertos .swiper-slide .heading--24").css("height", maxHeight24);

		var maxHeight18 = 0;
		$(".swiper-slide .heading--18").each(function () {
			var itemHeight18 = $(this).outerHeight();
			if (itemHeight18 > maxHeight18) {
				maxHeight18 = itemHeight18;
			}
		});
		$(".swiperMesCorazonExpertos .swiper-slide .heading--18").css("height", maxHeight18);
	}
	
	setEqualHeightExpertos();

	/* Socios */
	var swiperMesCorazonSocios = new Swiper(".swiperMesCorazonSocios", {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		pagination: {
			el: ".swiper-pagination-socio",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next-socio",
			prevEl: ".swiper-button-prev-socio",
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
				slidesPerView: 5,
				spaceBetween: 36,
			},
		},
	});
});





console.log(`
  *****    *****
*******    ********
********* *********
*******************
*****************
  *************
    *********
      *****
        *
`);
console.log(`
  M   M  EEEEE  SSSS       DDDD  EEEEE  L      CCCCC  OOOOO  RRRR   AAAAA  ZZZZZ  OOOOO  N   N
  MM MM  E      S          D   D E      L      C      O   O  R   R  A   A     Z   O   O  NN  N
  M M M  EEEE    SSS       D   D EEEE   L      C      O   O  RRRR   AAAAA    Z    O   O  N N N
  M   M  E          S      D   D E      L      C      O   O  R   R  A   A   Z     O   O  N  NN
  M   M  EEEEE  SSSS       DDDD  EEEEE  LLLLL  CCCCC  OOOOO  R   R  A   A  ZZZZZ  OOOOO  N   N
  `);