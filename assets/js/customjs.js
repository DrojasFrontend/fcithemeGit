jQuery(document).ready(function ($) {
  $('.slider-porque').slick({
    prevArrow: '<button type="button" class="slick-prev home_slide3"><i class="far fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next home_slide3"><i class="far fa-angle-right"></i></button>',
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          adaptiveHeight: true,
          rows: 0,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $('.slider_valores').slick({
    prevArrow: '<button type="button" class="slick-prev home_slide3"><i class="far fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next home_slide3"><i class="far fa-angle-right"></i></button>',
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          adaptiveHeight: true,
          rows: 0,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.slider_doctores_corazon').slick({
    prevArrow: '<button type="button" class="slick-prev home_slide3"><i class="far fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next home_slide3"><i class="far fa-angle-right"></i></button>',
    autoplay: true,
    autoplaySpeed: 3000,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          adaptiveHeight: true,
          rows: 0,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});



let cards = document.querySelectorAll('.card-porque');
let maxHeight = 0;
let loadedImages = 0;
let isCodeExecuted = false;

function adjustCardHeights() {
  if (isCodeExecuted) {
    return;
  }

  cards.forEach(card => {
    const img = card.querySelector('img');
    img.addEventListener('load', () => {
      loadedImages++;
      if (loadedImages === cards.length) {
        cards.forEach(card => {
          const cardHeight = card.getBoundingClientRect().height;
          maxHeight = Math.max(maxHeight, cardHeight);
        });

        cards.forEach(card => {
          card.style.height = `${maxHeight}px`;
        });
        isCodeExecuted = true;
      }
    });


    if (img.complete) {
      loadedImages++;
      if (loadedImages === cards.length) {
        cards.forEach(card => {
          const cardHeight = card.getBoundingClientRect().height;
          maxHeight = Math.max(maxHeight, cardHeight);
        });

        cards.forEach(card => {
          card.style.height = `${maxHeight}px`;
        });
        isCodeExecuted = true;
      }
    }
  });
}

//window.addEventListener('load', adjustCardHeights);


function formatearFecha(fecha) {
  let año = fecha.slice(0, 4)
  let mes = fecha.slice(4, 6)
  let dia = fecha.slice(6, 8)
  return año + "-" + mes + "-" + dia;
}

document.addEventListener('DOMContentLoaded', function () {
  localStorage.setItem('selectedDateId', '0');
  var calendarEl = document.getElementById('calendar');
  /*var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid' ],
    locale: 'es',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    defaultDate: moment().format("YYYY-MM-DD"),
    selectable: true,
    editable: true
  });*/
  if (calendarEl) {

    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      locale: 'es',
      height: '500px',
      events: [],
      buttonText: {
        today: 'Hoy',
      },
      initialDate: moment().format("YYYY-MM-DD"),
      datesSet: event => {
        pintarEventos()
      }
    });
    calendar.on('dateClick', function (info) {
      if (jQuery('.ncausa--pestanas__eventos').hasClass('slick-initialized')) {
        jQuery('.ncausa--pestanas__eventos').slick('unslick');
      }
      jQuery('.ncausa--pestanas__eventos').empty();
      jQuery('.ncausa--pestanas__eventos').html('<span class="spinner"></span>');
      jQuery('#simulador .loading').slideToggle(10);
  
  
  
      var date = info.dateStr;
      var id = moment(date).format('YYYYMMDD');
      localStorage.setItem('selectedDateId', id);
      if (jQuery('.color-evento-seleccionado')) {
        jQuery('.color-evento-seleccionado').removeClass("color-evento-seleccionado")
      }
      let diaEventoSeleccionado = jQuery('[data-date="' + date + '"]')
      diaEventoSeleccionado.addClass("color-evento-seleccionado")
      // Inicializar slick
      //jQuery('.slick-container').slick();
      //setTimeout(function(){
      jQuery.ajax({
        type: 'POST',
        url: ajax_var.url,
        data: {
          action: 'my_ajax_function',
          selected_date_id: id,
        },
        success: function (response) {
          //console.log(response)
  
          if (response.length == 0) {
            var html = '<h3>No hay eventos disponibles</h3>'
            //console.log("Vacio")
            jQuery('.ncausa--pestanas__eventos').html(html);
            jQuery('.loading').slideToggle(10);
          } else {
  
  
            var events = response;
  
            var html = '';
            events.forEach(function (event) {
  
              html += '<div class="ncausa--pestanas__eventos-cont">';
              html += '<div class="ncausa--pestanas__eventos--img">';
              html += '<img src="' + event.image + '" alt="' + event.alt + '">';
              html += '</div>';
              html += '<div class="ncausa--pestanas__eventos--contenido">';
              html += '<h4>' + event.title + '</h4>';
              html += '<p>' + event.informacion_del_evento + '</p>';
              html += '<div class="ncausa--pestanas__eventos--contenido_btn text-center">';
              html += '<a href="' + event.link_del_boton + '" class="btn btn-descargar1">' + event.texto_del_boton + '</a>';
              html += '</div>';
              html += '</div>';
              html += '</div>';
            });
            jQuery('.ncausa--pestanas__eventos').html(html);
            jQuery('.ncausa--pestanas__eventos').slick({
              arrows: false,
              dots: true,
            });
            jQuery('.loading').slideToggle(10);
			  
			  $(".ncausa--pestanas__eventos--contenido").hover(function(){
				$(".ncausa--pestanas__eventos--contenido h4").css("display", "block");
				}, function(){
				$(".ncausa--pestanas__eventos--contenido h4").css("display", "none");
			  });

			  $(".ncausa--pestanas__eventos--contenido").hover(function(){
				$(".ncausa--pestanas__eventos--contenido p").css("display", "block");
				}, function(){
				$(".ncausa--pestanas__eventos--contenido p").css("display", "none");
			  });
    
			  
			  
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
      //}, 100000);
  
    });

  }

  function pintarEventos() {
    jQuery.ajax({
      type: 'POST',
      url: ajax_var.url,
      data: {
        action: 'getEventos',
      }, success: function (response) {
        //console.log(response)
        var events = response;
        var fechas = [];
        events.forEach(function (event) {
          //console.log(event)
          let fechaFinal = formatearFecha(event.fecha_evento)
          fechas.push(fechaFinal)
        })
        //console.log(fechas)
        let dateStorage = localStorage.getItem('selectedDateId');
        let dateFinal = formatearFecha(dateStorage)
        let diaEventoSeleccionadoSinEvento = jQuery('[data-date="' + dateFinal + '"]')
        diaEventoSeleccionadoSinEvento.addClass("color-evento-seleccionado")
        fechas.forEach(function (fecha) {


          if (dateFinal == fecha) {

            let diaEventoSeleccionado = jQuery('[data-date="' + dateFinal + '"]')
            diaEventoSeleccionado.addClass("color-evento-seleccionado")
          } else {
            let diaEvento = jQuery('[data-date="' + fecha + '"]')
            diaEvento.addClass("color-evento")
          }
        })
        //console.log('funciona')
      }, error: function (data) {
        console.log(data)
        console.log('error')
      }
    });
  }




  if (calendar) {
    calendar.render();
    pintarEventos();
  }

});
