// Ejecutamos el slider del home
/*
*/

function btnAtras(){
    document.querySelectorAll('.ncausa--pestanas__tab .slick-prev').forEach(function(cadaUno){
        cadaUno.click()
    })
}

function parar_todos_losaudios(){
    console.log("Mutear!")
    document.querySelectorAll('.play_stop_general').forEach(function(cadaUno){
        console.log("encuentra alguno?")
        console.log(cadaUno.querySelector('.stop'))
        if(cadaUno.querySelector('.stop').classList.contains('seleccionado')){
            console.log("si mutea")
            cadaUno.click()
        }
    })
}




jQuery(document).ready(function ($) {

    
    function toggleCorreoPaciente() {
        var enviarTarjetaVirtual = $('#enviar_tarjeta_virtual');
        var correoPaciente = $('#correo_paciente_contenedor');

        if (enviarTarjetaVirtual.val() === 'Sí') {
            correoPaciente.show();
            correoPaciente.prop('required', true);
        } else {
            correoPaciente.hide();
            correoPaciente.prop('required', false);
        }
    }
    // Ejecutar la función al cargar la página
    toggleCorreoPaciente();
    // Agregar un evento change al campo "enviar_tarjeta_virtual"
    $('#enviar_tarjeta_virtual').change(function () {
        toggleCorreoPaciente();
    });




    if ($('.page-template-page-contacto-hepa').length > 0) {
        $('select[name="antecedente_enfermedad_hepatica"] option:first').text('¿Tiene antecedente de enfermedad hepática?');
        $('select[name="diagnosticado_cancer_higado"] option:first').text('¿Le han diagnosticado cáncer de higado?');
        document.addEventListener('wpcf7mailsent', function (event) {
            location = 'https://www.lacardio.org/hepatocarcinoma-thank-you';
        }, false);

    }






    $('.tipo_slider_1').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev"><i class="far fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="far fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.tipo_slider_2').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'punticos3',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: '<button type="button" class="slick-prev home_slide3"><i class="far fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide3"><i class="far fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ],
    });

    $('.slickslider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'punticos3',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: '<button type="button" class="slick-prev home_slide3"><i class="far fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide3"><i class="far fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
        ],
    });

    $('.slickslider_2').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="far fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="far fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.slickslider_3').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="far fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="far fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.slickslider_4').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'slick-dots slick-dots2',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide6"><i class="far fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide6"><i class="far fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
	
	  $('.ejemplo_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: $('#ejemplo-prev'), // Botón personalizado para Anterior
        nextArrow: $('#ejemplo-next'), // Botón personalizado para Siguiente
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ],
    });

    $('.sliderConvenios').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'punticos3',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: '<button type="button" class="slick-prev home_slide3 mod1"><i class="far fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide3 mod1"><i class="far fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ],
    });

    $('.tipo_slider_timeline').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="far fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="far fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    
    $('.slider_1 .wp-block-column').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.slider_2 .wp-block-column').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });





    $('.slider_3 .wp-block-column').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.slider_4 .wp-block-column').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $('.slider_doctores').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                }
            },
        ]
    });

    $('.slider_5 .wp-block-column').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        dotsClass: 'slick-dots',
        speed: 300,
        autoplay: true,
        autoplaySpeed: 1000000,
        prevArrow: '<button type="button" class="slick-prev home_slide5"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next home_slide5"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                }
            },
        ]
    });

    const tabs = document.querySelector(".nav-tabs");
    if (tabs) {
        tabs.addEventListener("click", (event) => {
            if ($("#nav-donaciones-tab").hasClass("active")) {
                $('.slider_donaciones').removeClass("no-view");
                $('.slider_donaciones').addClass("view");
    
                $('.slider_donaciones').slick('slickNext');
    
            }
            else {
                $('.slider_donaciones').removeClass("view");
                $('.slider_donaciones').addClass("no-view");
            }
        });
    }

})

document.addEventListener('DOMContentLoaded', function () {
    
    function tarjeta_poner_mensajes(mensaje, tarjeta_mensaje) {

        var textarea = document.getElementById(mensaje);
        var tarjetaMensaje = document.getElementById(tarjeta_mensaje);

        if (textarea && tarjetaMensaje) {
            textarea.addEventListener("input", function () {
                var mensajeTextarea = textarea.value;
                if (mensajeTextarea.length > 440) {
                    mensajeTextarea = mensajeTextarea.substring(0, 440);
                    textarea.value = mensajeTextarea;
                }
                // Firma:
                if (tarjeta_mensaje == 'tarjeta_firma') {
                    var nombres = document.getElementById('nombres').value;
                    var apellidos = document.getElementById('apellidos').value;
                    mensajeTextarea = 'Con mucho aprecio, ' + nombres + ' ' + apellidos
                }
                // Firma:
                if (tarjeta_mensaje == 'tarjeta_saludo') {
                    mensajeTextarea = 'Apreciado/a ' + mensajeTextarea + ', '
                }
                tarjetaMensaje.textContent = mensajeTextarea;
            });
            tarjetaMensaje.textContent = textarea.value;
        }

    }

    tarjeta_poner_mensajes("mensaje", "tarjeta_mensaje")
    tarjeta_poner_mensajes("nombres", "tarjeta_firma")
    tarjeta_poner_mensajes("apellidos", "tarjeta_firma")
    tarjeta_poner_mensajes("paciente_nombres", "tarjeta_saludo")

    const tarjetas_elegir = document.querySelector('.tarjetas__general')
    if (tarjetas_elegir) {
        tarjetas_elegir.querySelectorAll('button').forEach(function (each) {
            each.addEventListener('click', function (event) {
                document.getElementById('plantilla').value = each.querySelector('img').src
                document.querySelector('.tarjetas__contenedor__bg').innerHTML = `
                    <img src="${each.querySelector('img').src}" alt="Tarjetas">
                `;
                // Cambiar pestaña
                document.querySelector('.tarjetas__paso1').classList.remove("mostrar");
                document.querySelector('.tarjetas__paso2').classList.add("mostrar");
                tarjetaSaludo()
            })
        })
    }

    var btn_cambiardesign = document.querySelector('.btn_cambiardesign')
    if(btn_cambiardesign){
        btn_cambiardesign.addEventListener('click', function( event ){
            document.querySelector('.tarjetas__paso1').classList.add("mostrar");
            document.querySelector('.tarjetas__paso2').classList.remove("mostrar");
            tarjetaSaludo()
        })
    }


    // Tarjeta de saludo - Conversión de tamaño de fuente
    function tarjetaSaludo() {
        const ancho_documento = 1260
        const tarjeta_ancho = document.getElementById('tarjeta_contenedor').offsetWidth
        const tamano = Math.round(tarjeta_ancho / ancho_documento * 10000)
        let new_tamano
        if (tamano >= 10000) {
            new_tamano = '1em'
        } else {
            new_tamano = '0.' + tamano + 'em'
        }
        console.log(new_tamano)
        document.getElementById('tarjeta_texto').querySelectorAll('p').forEach(function (todo) {
            todo.setAttribute('style', 'font-size:' + new_tamano)
        })
    }
    if (document.getElementById('tarjeta_contenedor')) {
        if (document.getElementById('tarjeta_texto')) {
            tarjetaSaludo()
            window.addEventListener('resize', function (event) {
                tarjetaSaludo()
            }, true);
        }
    }

    /* Botones galerías - Instalaciones home */
    if (document.querySelector('.btns_instalaciones_gal')) {

        const instalaciones = document.querySelector('.btns_instalaciones_gal')
        const actuales = document.querySelector('.btns_instalaciones_gal .actuales')
        const nuevas = document.querySelector('.btns_instalaciones_gal .nuevas')

        actuales.addEventListener('click', function (event) {

            event.preventDefault()

            instalaciones.querySelectorAll('a').forEach(function (cadaUno) {
                cadaUno.classList.remove('elegida')
            })
            actuales.classList.add('elegida')
            document.querySelectorAll('.shi_contenedor').forEach(function (cadaUno) {
                cadaUno.classList.remove('mostrar')
            })
            document.querySelectorAll('.shi_contenedor')[0].classList.add('mostrar')
            jQuery('.carousel-instalaciones').slick('unslick');
            jQuery('.carousel-instalaciones').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                speed: 300,
            });
        })
        nuevas.addEventListener('click', function (event) {
            event.preventDefault()

            instalaciones.querySelectorAll('a').forEach(function (cadaUno) {
                cadaUno.classList.remove('elegida')
            })
            nuevas.classList.add('elegida')
            document.querySelectorAll('.shi_contenedor').forEach(function (cadaUno) {
                cadaUno.classList.remove('mostrar')
            })
            document.querySelectorAll('.shi_contenedor')[1].classList.add('mostrar')

            jQuery('.carousel-instalaciones').slick('unslick');
            jQuery('.carousel-instalaciones').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                speed: 300,
            });
        })

    }

    /* Botones clientes home - slider */
    if (document.querySelectorAll('.home-clientes-nav a')[0]) {
        document.querySelectorAll('.home-clientes-nav a')[0].addEventListener('click', function (event) {
            event.preventDefault()
            document.querySelector('.slider_clientes .slick-prev').click()
        })
        document.querySelectorAll('.home-clientes-nav a')[1].addEventListener('click', function (event) {
            event.preventDefault()
            document.querySelector('.slider_clientes .slick-next').click()
        })
    }

    /* Botones resultados - slider */
    if (document.querySelectorAll('.slider_resultados-nav a')[0]) {
        document.querySelectorAll('.slider_resultados-nav a')[0].addEventListener('click', function (event) {
            event.preventDefault()
            document.querySelector('.slider_resultados .slick-prev').click()
        })
        document.querySelectorAll('.slider_resultados-nav a')[1].addEventListener('click', function (event) {
            event.preventDefault()
            document.querySelector('.slider_resultados .slick-next').click()
        })
    }

    document.querySelectorAll('.mapa__botones ul li a').forEach(function(cadaUno, indice){
        cadaUno.addEventListener('click', function( event ){
            event.preventDefault()
        })
        cadaUno.addEventListener('mouseover', function( event ){
            document.querySelectorAll('.mapa__imagen__points--indv')[indice].classList.add('selected')
        })
        cadaUno.addEventListener('mouseout', function( event ){
            document.querySelectorAll('.mapa__imagen__points--indv')[indice].classList.remove('selected')
        })
    })

    /* Sistema de pestañas */
    if(document.querySelector('.pestanas')){
        document.querySelectorAll('.pestanas').forEach(function( cadaPest ){
            let slide_activo = 0
            cadaPest.querySelectorAll('.pestanas__btns a').forEach(function( cadaEnlace, indice ){
                cadaEnlace.addEventListener('click', function( event ){
                    event.preventDefault()
                    // Cambiamos el boton activado
                    if(slide_activo != indice){
                        cadaPest.querySelectorAll('.pestanas__btns a').forEach(function(temp){
                            temp.classList.remove('activa')
                        })
                        // Activamos el botón que acabamos de cliquear
                        cadaPest.querySelectorAll('.pestanas__btns a')[indice].classList.add('activa')
                        // Escondemos todas las pestañas individuales
                        cadaPest.querySelectorAll('.pestanas__indv').forEach(function(temp){
                            temp.classList.remove('activa')
                        })
                        // Activamos la pestaña que se cliqueó
                        cadaPest.querySelectorAll('.pestanas__indv')[indice].classList.add('activa')
                        slide_activo = indice
                    }
                })
            })
        })
    }

    if(document.querySelector('.subpestanas')){
        document.querySelectorAll('.subpestanas').forEach(function( cadaPest ){
            let slide_activo = 0
            cadaPest.querySelectorAll('.subpestanas__btns a').forEach(function( cadaEnlace, indice ){
                cadaEnlace.addEventListener('click', function( event ){
                    event.preventDefault()
                    // Cambiamos el boton activado
                    if(slide_activo != indice){
                        cadaPest.querySelectorAll('.subpestanas__btns a').forEach(function(temp){
                            temp.classList.remove('activa')
                        })
                        // Activamos el botón que acabamos de cliquear
                        cadaPest.querySelectorAll('.subpestanas__btns a')[indice].classList.add('activa')
                        // Escondemos todas las pestañas individuales
                        cadaPest.querySelectorAll('.subpestanas__indv').forEach(function(temp){
                            temp.classList.remove('activa')
                        })
                        // Activamos la pestaña que se cliqueó
                        cadaPest.querySelectorAll('.subpestanas__indv')[indice].classList.add('activa')
                        slide_activo = indice
                    }
                })
            })
        })
    }

    /* Slider de ubicaciones */
    if(document.querySelector('.ubicacionestabs')){
        document.querySelectorAll('.ubicacionestabs').forEach(function(este1, indice1){
            este1.querySelectorAll('.botones button').forEach(function(este2, indice2){
                este2.addEventListener('click', function( event ){
                    
                    const enlace_foto = este2.getAttribute('data-imagen')
                    const enlace_nombre = este2.getAttribute('data-nombre')
                    document.querySelector('.ubicacion_principal').src = enlace_foto
                    document.querySelector('.ubicacion_principal').alt = enlace_nombre

                    const elemento = this.parentElement.parentElement.parentElement

                    elemento.querySelectorAll('.contenido .cadaUno').forEach(function(este3, indice3){
                        este3.classList.remove('activo')
                    })
                    elemento.querySelectorAll('.botones .cadaUno').forEach(function(este3, indice3){
                        este3.classList.remove('activo')
                    })
                    elemento.querySelectorAll('.contenido .cadaUno')[indice2].classList.add('activo')
                    elemento.querySelectorAll('.botones .cadaUno')[indice2].classList.add('activo')
                })
            })
        })
        if(document.querySelector('.pisosniveles')){
            document.querySelectorAll('.pisosniveles').forEach(function(este10, indice10){
                este10.querySelectorAll('.cadaBoton button').forEach(function(este20, indice20){
                    este20.addEventListener('click', function( event ){
                        
                        const elemento2 = this.parentElement.parentElement.parentElement
                        elemento2.querySelectorAll('.contenido2 .cadaUno2').forEach(function(este30, indice30){
                            este30.classList.remove('activo')
                        })
                        elemento2.querySelectorAll('.botones2 .cadaBoton').forEach(function(este30, indice30){
                            este30.classList.remove('activo')
                        })
                        elemento2.querySelectorAll('.contenido2 .cadaUno2')[indice20].classList.add('activo')
                        elemento2.querySelectorAll('.botones2 .cadaBoton')[indice20].classList.add('activo')
                    })
                })
            })
        }
    }

    if(document.querySelector('a[data-fancybox]')){
        document.querySelectorAll('a[data-fancybox]').forEach(function(cadaUno){
            cadaUno.addEventListener('click', function( event ){
                console.log("Hicieron clic!")
            })
        })
    }

    if(document.querySelector('.especialidad_tabs')){
        document.querySelectorAll('.especialidad_tabs .cadaTab button').forEach(function( cadaUno, indice ){
            cadaUno.addEventListener('click', function( event ){
                const contenedor = this.parentElement.parentElement.parentElement
                contenedor.querySelectorAll('.cadaTab').forEach(function( cadaUno2, indice2){
                    cadaUno2.classList.remove("elegido")
                })
                contenedor.querySelectorAll('.cadaTab')[indice].classList.add("elegido")

                contenedor.querySelectorAll('.cadaBloq').forEach(function( cadaUno2, indice2){
                    cadaUno2.classList.remove("elegido")
                })
                contenedor.querySelectorAll('.cadaBloq')[indice].classList.add("elegido")

            })
        })
    }



    if(document.querySelector('.filtro_apellido')){
        document.querySelectorAll('.filtro_apellido .todas_las_letras a').forEach(function( cadaUno ){
            cadaUno.addEventListener('click', function( event ){
                event.preventDefault()
                document.querySelector('.filtro_letra').value = cadaUno.innerText
                document.querySelectorAll('.filtro_apellido .todas_las_letras a').forEach(function( cadaUno2 ){
                    cadaUno2.classList.remove('activo')
                })
                cadaUno.classList.add('activo')
                enviarFiltros('filtros')
            })

        })
    }

    function enviarFiltros(tipo){
		
		const objeto = new FormData()
		const filtro_tipo = document.querySelector('input[name=filtro_tipo]').value
		objeto.append('action', ajax_var.action);
		objeto.append('nonce', ajax_var.nonce);
		objeto.append('filtro_tipo', filtro_tipo);

		if(tipo == 'filtros'){
			objeto.append('accion', 'filtro');
			// document.querySelector('.filtro_buscador').reset()
			document.querySelectorAll('.filtro_valores').forEach(function( cadaFiltro ){
				if(cadaFiltro.value != ""){
					objeto.append(cadaFiltro.getAttribute('name'), cadaFiltro.value);
				}
			})
            if(document.querySelector('.filtro_checkbox')){
                document.querySelectorAll('.filtro_checkbox').forEach(function( cadaFiltro ){
                    if(cadaFiltro.checked == true){
                        objeto.append(cadaFiltro.getAttribute('name'), cadaFiltro.value);
                    }
                })
            }
		}

		if(tipo == 'buscador'){
			objeto.append('accion', 'buscador');
			if(document.querySelector('.filtro_buscador .buscador').value != ""){
				const buscador_text = document.querySelector('.filtro_buscador .buscador').value
				objeto.append('buscar', buscador_text);
			}
		}

		// Cargando
		let contenedor = ''
		if(filtro_tipo == 'directorio'){
			contenedor = '.directoriolist'
		}
		if(filtro_tipo == "empleo"){
			contenedor = '.ofertalist'
		}
		if(filtro_tipo == "ofertas"){
			contenedor = '.ofertalist'
		}
		if(filtro_tipo == "especialistas"){
			contenedor = '.especialistasgen__resultados'
		}

		document.querySelector(contenedor).innerHTML = `
			<div class="cargando">
				<div class="spinner"></div>
				<p>Cargando resultados, por favor espere...</p>
			</div>
		`;
        /*
        */
		if(document.querySelector('.paginador')){
			document.querySelector('.paginador').innerHTML = ''
		}

		// Envío de consulta
		fetch(ajax_var.url, {
			method: "POST",
			headers: {
				"Accept": "*/*",
			},
			body: objeto
		})
		.then(resp => resp.json())
		.then(salida => {
			// código adicional
			document.querySelector(contenedor).innerHTML = salida.html
			// modal_ofertas()
			// document.querySelector('.blog_post_html').innerHTML = salida.html
		});

	}


    if(document.querySelector('form[name=filtro]')){
        document.querySelector('form[name=filtro]').addEventListener('change', function( event ){
            enviarFiltros('filtros')
        });
    }

    function json2array(json){
        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function(key){
            result.push(json[key]);
        });
        return result;
    }

    function cambiar_letra(letra){

        if(especialidades_x_letra[letra] != undefined){

            let arreglo = json2array(especialidades_x_letra[letra])
            // Cambiar título
            document.querySelector('.resultados h2').innerHTML = letra.toUpperCase()
            let salida_html = ''
            arreglo.forEach(function(elemento, indice, array) {
                salida_html += `
                    <li>
                        <a href="/servicios/${elemento.slug}/">${elemento.nombre}</a>
                    </li>
                `;
            })
            document.querySelector('.results').innerHTML = salida_html
        }else{
            document.querySelector('.resultados h2').innerHTML = letra.toUpperCase()
            let salida_html = `
                    <li>
                        Lo sentimos, pero no hay especialidades ni servicios por la letra ${letra.toUpperCase()}
                    </li>
                `;
            document.querySelector('.results').innerHTML = salida_html
        }
        
    }

    if(document.querySelector('.buscador__services')){
        cambiar_letra(letra_x_defecto)
        document.querySelectorAll('.buscador__services .todas_las_letras a').forEach(function(cadaUno){
            if(letra_x_defecto.toUpperCase() == cadaUno.innerText){
                cadaUno.classList.add('activo')
            }
            cadaUno.addEventListener('click', function( event ){
                event.preventDefault()
                cambiar_letra(cadaUno.innerText.toLowerCase())
                document.querySelectorAll('.buscador__services .todas_las_letras a').forEach(function(cadaUno2){
                    cadaUno2.classList.remove('activo')
                })
                cadaUno.classList.add('activo')
            })
        })
    }

    if(document.querySelector('.recursosDecargaBtn')){
        if(document.querySelector('.recurso_download')){

            document.querySelectorAll('.recursosDecargaBtn').forEach(function( cadaUno ){
                cadaUno.addEventListener('click', function( event ){
                    event.preventDefault()
                    const titulo = this.getAttribute('descarga-titulo')
                    const id = this.getAttribute('descarga-id')
                    document.querySelector('.recurso_download').innerHTML = `<strong>${titulo}</strong>`
                    document.querySelector('.wpcf7-form input[name=descarga]').value = id
                })
            })

        }
    }
    

})



/* Correcciones de alto */
if (document.querySelector('.taxo .taxo-perfil-indv .-contenido')) {
    const contenidos = document.querySelectorAll('.taxo .taxo-perfil-indv .-contenido')
    let alto = 0
    contenidos.forEach(function (cadaUno) {
        if (cadaUno.offsetHeight > alto) {
            alto = cadaUno.offsetHeight
        }
    })
    contenidos.forEach(function (cadaUno) {
        cadaUno.style.height = alto + 'px'
    })

}

document.addEventListener('DOMContentLoaded', function () {
    function redimensionarYT() {
        if(document.querySelector('.blog-cont .wp-block-embed__wrapper iframe')){
            let ancho = document.querySelector('.blog-cont .wp-block-embed__wrapper iframe').offsetWidth
            let conversion = 1920 / ancho
            let alto_n = 1024 / conversion
            document.querySelector('.blog-cont .wp-block-embed__wrapper iframe').style.height = alto_n + "px"
        }
    }
    if (document.querySelector('.blog-cont .wp-block-embed__wrapper')) {
        redimensionarYT()
        window.addEventListener('resize', function (event) {
            redimensionarYT()
        }, true);
    }

})

/* Controlar formulario de contacto */
if(document.querySelector('.btnLlamarForm')){
    document.querySelectorAll('.btnLlamarForm').forEach(function(cadaUno){
        cadaUno.addEventListener('click', function( event ){
            event.preventDefault()
            // overflow-hidden - para el body
            document.querySelector('.modalForm').classList.add('open')
            document.querySelector('body').classList.add('overflow-hidden')
        })
    })
}
if(document.querySelector('.modalForm_close')){
    document.querySelector('.modalForm_close').addEventListener('click', function(event){
        event.preventDefault()
        document.querySelector('.modalForm').classList.remove('open')
        document.querySelector('body').classList.remove('overflow-hidden')
    })
}



/* APLUS */
HTMLElement.prototype.prependHtml = function (element) {
    const div = document.createElement('div');
    div.innerHTML = element;
    this.insertBefore(div, this.firstChild);
};

HTMLElement.prototype.appendHtml = function (element) {
    const div = document.createElement('div');
    div.innerHTML = element;
    while (div.children.length > 0) {
        this.appendChild(div.children[0]);
    }
};

/* Menu primer nivel */

document.querySelectorAll('.main-menu > li.menu-item-has-children > a').forEach(function( cadaLink ){

   cadaLink.addEventListener('click', function( event ){
        event.preventDefault()
        let volver_btn = `<span class="menu_btn_volver">${this.innerText}</span>`
        document.querySelectorAll('.sub-menu').forEach(function( cadaSub ){
            cadaSub.classList.remove('open')
        })
        cadaLink.parentElement.querySelector('.sub-menu').classList.add('open')
        // cadaLink.parentElement.querySelector('.sub-menu').innerHTML = volver_btn + cadaLink.parentElement.querySelector('.sub-menu').innerHTML;
    })
})

document.querySelectorAll('.menu_btn_volver').forEach(function( cadaBtn ){
    cadaBtn.addEventListener('click', function( event ){
        this.parentElement.parentElement.classList.remove('open')
    })
})

/* Menu segundo nivel */
document.querySelectorAll('.main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > a').forEach(function( cadaLink ){
    cadaLink.addEventListener('click', function( event ){
        event.preventDefault()
        document.querySelectorAll('.main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children .sub-menu').forEach(function( cadaSub ){
            cadaSub.classList.remove('open')
        })
        cadaLink.parentElement.querySelector('.sub-menu').classList.add('open')
    })
})


/* Menu responsive */
document.querySelector('.abrir_menu_cell').addEventListener('click', function( event ){
    event.preventDefault()
    document.querySelector('.menu_responsive_cont').classList.add('activo')
})
document.querySelector('.cerrar_menu_cell').addEventListener('click', function( event ){
    event.preventDefault()
    document.querySelector('.menu_responsive_cont').classList.remove('activo')
})


function redimensionarYT(){
    if(document.querySelector('.wp-embed-aspect-16-9 iframe')){
        let ancho = document.querySelector('.wp-embed-aspect-16-9 iframe').offsetWidth
        let conversion = 1920 / ancho
        let alto_n = 1024 / conversion
        document.querySelector('.wp-embed-aspect-16-9 iframe').style.height = alto_n + "px"
    }
}
document.addEventListener('DOMContentLoaded', function(){
    redimensionarYT()
    window.addEventListener('resize', function(event) {
        redimensionarYT()
    }, true);
})



/* tab del home */
if(document.querySelector('.home__programas--pestanas')){
    document.querySelectorAll('.home__programas--pestanas .home__programas--pestanas__btns li a').forEach(function(cadaBtnPest, indice){
        let indice_actual = 0
        cadaBtnPest.addEventListener('click', function( event ){
            event.preventDefault()
            document.querySelectorAll('.home__programas--pestanas .home__programas--pestanas__btns li a').forEach(function(cu){
                cu.classList.remove('selected')
            })
            this.classList.add('selected')
            document.querySelectorAll('.home__programas--pestanas__tab').forEach(function(cu){
                cu.classList.remove('mostrar')
            })
            document.querySelectorAll('.home__programas--pestanas__tab')[indice].classList.add('mostrar')
            redimensionarYT()
    
            indice_actual = indice
        })
    })
}

/* tab de nuestra causa */
if(document.querySelector('.ncausa--pestanas')){

    document.querySelectorAll('.ncausa--pestanas__btns li a').forEach(function(cadaBtnPest, indice){
        let indice_actual = 0
        cadaBtnPest.addEventListener('click', function( event ){
            event.preventDefault()
            document.querySelectorAll('.ncausa--pestanas__btns li a').forEach(function(cu){
                cu.classList.remove('selected')
            })
            this.classList.add('selected')
            document.querySelectorAll('.ncausa--pestanas__tab').forEach(function(cu){
                cu.classList.remove('mostrar')
            })
            document.querySelectorAll('.ncausa--pestanas__tab')[indice].classList.add('mostrar')
            redimensionarYT()
    
            indice_actual = indice

            btnAtras()
        })
    })

}

const list = document.querySelectorAll('.list');

function accordion(e) {
    e.stopPropagation();
    if (this.classList.contains('active')) {
        this.classList.remove('active');
    }
    else if (this.parentElement.parentElement.classList.contains('active')) {
        this.classList.add('active');
    }
    else {
        for (i = 0; i < list.length; i++) {
            list[i].classList.remove('active');
        }
        this.classList.add('active');
    }
}
for (i = 0; i < list.length; i++) {
    list[i].addEventListener('click', accordion);
}

/*Config FCI Banner Slider*/
var fciBannerSlider = document.querySelector('#fci-banner_slider');
var carousel = new bootstrap.Carousel(fciBannerSlider , {
  interval: 4000,
  wrap: true,
  touch: true
})




