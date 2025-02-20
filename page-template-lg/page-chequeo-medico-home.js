document.addEventListener("DOMContentLoaded", function () {
console.log('init');
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '#pagination1',
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: typeof diapositivasConfig !== "undefined" ? diapositivasConfig.slidesPerView : 1,
            },
        },
    });

    let swiperServicios;

    function initializeMobileSwiper() {
        if (window.innerWidth < 767) {
            if (!swiperServicios) {
                swiperServicios = new Swiper('.swiper-container-servicios', {
                    slidesPerView: 1,
                    spaceBetween: 16,
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            }
        } else {
            if (swiperServicios) {
                swiperServicios.destroy(true, true);
                swiperServicios = null;
            }
        }
    }

    initializeMobileSwiper();
    window.addEventListener('resize', initializeMobileSwiper);
});