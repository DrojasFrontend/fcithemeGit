<?php

$grupo_tarjeta_eps = get_field('grupo_tarjeta_eps');

$tarjetas_eps = isset($grupo_tarjeta_eps['tarjeta_eps']) ? $grupo_tarjeta_eps['tarjeta_eps'] : [];

// Agrupar las tarjetas por categoría
$tarjetas_por_categoria = [];

foreach ($tarjetas_eps as $tarjeta_eps) {
  // Extraemos la categoría de la tarjeta
  $categoria = isset($tarjeta_eps['categoria_tarjeta_eps']) ? $tarjeta_eps['categoria_tarjeta_eps'] : 'Sin categoría'; // 'Sin categoría' si no tiene asignada una
  $tarjetas_por_categoria[$categoria][] = $tarjeta_eps;
}

?>

<section class="paginaLegadoSolCarusel <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="margin-top: 80px;">
  <div class="container">
    <div class="paginaLegadoSolCarusel__titulo">
      <p class="subheading color--002D72" style="text-align: center;">NUESTRAS ALIANZAS Y CONVENIOS</p>
      <h2 class="heading--48 color--002D72" style="text-align: center;">Conoce todos los servicios y beneficios</h2>
    </div>
  </div>
</section>

<section class="seccionTargetas__fondo" style="margin-top: 0px!important;">
  <div class="card">
    <!-- Header de la tarjeta con los tabs -->
    <div class="card-header container--large">
      <ul class="tabs" id="myTabs">
        <?php $tab_counter = 0; ?>
        <?php foreach ($tarjetas_por_categoria as $categoria => $tarjetas): ?>
          <li class="tab-item <?php echo $tab_counter === 0 ? 'active' : ''; ?>"
            data-tab="tab-<?php echo $tab_counter; ?>">
            <?php echo $categoria; ?>
          </li>
          <?php $tab_counter++; ?>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Cuerpo de la tarjeta con el contenido de los tabs -->
    <div class="card-body container--large">
      <?php $tab_counter = 0; ?>
      <?php foreach ($tarjetas_por_categoria as $categoria => $tarjetas): ?>
        <!-- Contenido para cada tab -->
        <div class="tab-content <?php echo $tab_counter === 0 ? 'active' : ''; ?>" id="tab-<?php echo $tab_counter; ?>">
          <div class="swiper swiperTarjetasEPSCarusel">
            <div class="swiper-wrapper">
              <?php foreach ($tarjetas as $key => $tarjeta_eps):
                $imagen = isset($tarjeta_eps['imagen_eps']) ? esc_url($tarjeta_eps['imagen_eps']) : '';
                $link_linea_nacional = isset($tarjeta_eps['link_linea_nacional']) ? esc_url($tarjeta_eps['link_linea_nacional']) : '';
                $link_whatsapp = isset($tarjeta_eps['link_whatsapp']) ? esc_url($tarjeta_eps['link_whatsapp']) : '';
                $imagen_servicios_incluidos = isset($tarjeta_eps['imagen_servicios_incluidos']) ? esc_url($tarjeta_eps['imagen_servicios_incluidos']) : '';
                $info_servicios_incluidos = isset($tarjeta_eps['info_servicios_incluidos']) ? $tarjeta_eps['info_servicios_incluidos'] : '';
                $numero_incremento = isset($tarjeta_eps['numero_incremento']) ? $tarjeta_eps['numero_incremento'] : '';
                
                ?>

                
                <div class="swiper-slide">
                  <div class="card-eps">
                    <?php if ($imagen): ?>
                      <img src="<?php echo $imagen; ?>" class="card-img-top" alt="">
                    <?php endif; ?>
                    <p>Solicita tu cita por:</p>
                    <div class="card-body-eps">
                      <div class="contenedor-solicita-cita">
                        <div class="solicita-cita">
                          <?php if ($link_linea_nacional): ?>
                            <a href="<?php echo $link_linea_nacional; ?>" target="_blank">
                              <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M19.4099 13.8042C19.1899 13.8042 18.9599 13.7342 18.7399 13.6842C18.2948 13.5847 17.857 13.4543 17.4299 13.2942C16.966 13.1254 16.4561 13.1342 15.9982 13.3188C15.5404 13.5034 15.167 13.8508 14.9499 14.2942L14.7299 14.7542C13.7587 14.2034 12.8616 13.5313 12.0599 12.7542C11.2828 11.9526 10.6107 11.0554 10.0599 10.0842L10.5199 9.8742C10.9633 9.65712 11.3107 9.28373 11.4953 8.82589C11.6799 8.36805 11.6887 7.85811 11.5199 7.3942C11.3611 6.96323 11.2308 6.52228 11.1299 6.0742C11.0799 5.8542 11.0399 5.6242 11.0099 5.4042C10.8885 4.69982 10.5196 4.06194 9.96955 3.60544C9.41955 3.14894 8.72462 2.90381 8.00993 2.9142H4.99993C4.57717 2.91365 4.15908 3.00245 3.77305 3.17478C3.38701 3.34712 3.04176 3.5991 2.75993 3.9142C2.47225 4.23785 2.25804 4.61995 2.13203 5.03424C2.00602 5.44852 1.97119 5.88518 2.02993 6.3142C2.57352 10.4763 4.47514 14.3429 7.43993 17.3142C10.4113 20.279 14.2778 22.1806 18.4399 22.7242C18.5697 22.7341 18.7001 22.7341 18.8299 22.7242C19.5673 22.7253 20.2793 22.4547 20.8299 21.9642C21.145 21.6824 21.397 21.3371 21.5693 20.9511C21.7417 20.5651 21.8305 20.147 21.8299 19.7242V16.7242C21.8245 16.0332 21.5808 15.3653 21.1399 14.8333C20.6989 14.3013 20.0879 13.9378 19.4099 13.8042ZM19.8999 19.8042C19.8996 19.9437 19.8701 20.0817 19.8132 20.2091C19.7564 20.3366 19.6735 20.4507 19.5699 20.5442C19.4603 20.6441 19.3299 20.7183 19.1881 20.7615C19.0463 20.8048 18.8966 20.8159 18.7499 20.7942C15.0182 20.3068 11.5502 18.6062 8.87993 15.9542C6.2074 13.2817 4.49196 9.80157 3.99993 6.0542C3.9782 5.90753 3.98936 5.75787 4.0326 5.61605C4.07584 5.47423 4.15007 5.3438 4.24993 5.2342C4.34455 5.12935 4.46031 5.04573 4.58958 4.98886C4.71885 4.93198 4.8587 4.90312 4.99993 4.9042H7.99993C8.23109 4.89855 8.45707 4.97318 8.63939 5.1154C8.82172 5.25761 8.94913 5.45862 8.99993 5.6842C8.99993 5.9542 9.08993 6.2342 9.14993 6.5042C9.2655 7.02806 9.41925 7.54277 9.60993 8.0442L8.20993 8.7042C7.96929 8.81466 7.78229 9.01605 7.68993 9.2642C7.58991 9.50766 7.58991 9.78074 7.68993 10.0242C9.12913 13.107 11.6072 15.585 14.6899 17.0242C14.9334 17.1242 15.2065 17.1242 15.4499 17.0242C15.6981 16.9318 15.8995 16.7448 16.0099 16.5042L16.6399 15.1042C17.1558 15.2923 17.6837 15.446 18.2199 15.5642C18.4799 15.6242 18.7599 15.6742 19.0299 15.7142C19.2555 15.765 19.4565 15.8924 19.5987 16.0747C19.7409 16.2571 19.8156 16.483 19.8099 16.7142L19.8999 19.8042ZM13.9999 2.8042C13.7699 2.8042 13.5299 2.8042 13.2999 2.8042C13.0347 2.82674 12.7893 2.95372 12.6177 3.1572C12.4461 3.36067 12.3624 3.62398 12.3849 3.8892C12.4075 4.15442 12.5344 4.39981 12.7379 4.57141C12.9414 4.74301 13.2047 4.82674 13.4699 4.8042H13.9999C15.5912 4.8042 17.1174 5.43634 18.2426 6.56156C19.3678 7.68678 19.9999 9.2129 19.9999 10.8042C19.9999 10.9842 19.9999 11.1542 19.9999 11.3342C19.9778 11.598 20.0611 11.8598 20.2317 12.0623C20.4023 12.2648 20.6462 12.3913 20.9099 12.4142H20.9899C21.2403 12.4152 21.4819 12.3223 21.667 12.1538C21.8522 11.9853 21.9674 11.7535 21.9899 11.5042C21.9899 11.2742 21.9899 11.0342 21.9899 10.8042C21.9899 8.6842 21.1484 6.65088 19.6503 5.15088C18.1522 3.65087 16.1199 2.80685 13.9999 2.8042ZM15.9999 10.8042C15.9999 11.0694 16.1053 11.3238 16.2928 11.5113C16.4804 11.6988 16.7347 11.8042 16.9999 11.8042C17.2651 11.8042 17.5195 11.6988 17.707 11.5113C17.8946 11.3238 17.9999 11.0694 17.9999 10.8042C17.9999 9.74333 17.5785 8.72592 16.8284 7.97577C16.0782 7.22563 15.0608 6.8042 13.9999 6.8042C13.7347 6.8042 13.4804 6.90956 13.2928 7.09709C13.1053 7.28463 12.9999 7.53898 12.9999 7.8042C12.9999 8.06942 13.1053 8.32377 13.2928 8.51131C13.4804 8.69884 13.7347 8.8042 13.9999 8.8042C14.5304 8.8042 15.0391 9.01491 15.4141 9.38999C15.7892 9.76506 15.9999 10.2738 15.9999 10.8042Z"
                                  fill="#E40046" />
                              </svg>
                              <p>Línea Nacional</p>
                            </a>
                          <?php endif; ?>
                        </div>
                        <div class="solicita-cita">
                          <?php if ($link_whatsapp): ?>
                            <a href="<?php echo $link_whatsapp; ?>" target="_blank">
                              <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M20 5.3542C19.9888 4.92277 19.9554 4.4922 19.9 4.0642C19.8253 3.68932 19.7009 3.32611 19.53 2.9842C19.3513 2.6133 19.1112 2.27523 18.82 1.9842C18.5261 1.6964 18.1886 1.45679 17.82 1.2742C17.4776 1.10664 17.1144 0.985573 16.74 0.914199C16.3161 0.850699 15.8886 0.813959 15.46 0.804199H4.55C4.11857 0.815436 3.68801 0.848813 3.26 0.904199C2.88512 0.978868 2.52191 1.1033 2.18 1.2742C1.8091 1.45294 1.47103 1.69297 1.18 1.9842C0.892204 2.27811 0.652591 2.61559 0.47 2.9842C0.302444 3.32656 0.181373 3.68978 0.11 4.0642C0.0464994 4.48813 0.0097601 4.91565 0 5.3442C0 5.5342 0 5.8042 0 5.8842V15.7242C0 15.8342 0 16.0742 0 16.2542C0.0112364 16.6856 0.0446136 17.1162 0.0999999 17.5442C0.174668 17.9191 0.299103 18.2823 0.47 18.6242C0.648737 18.9951 0.888773 19.3332 1.18 19.6242C1.47391 19.912 1.81139 20.1516 2.18 20.3342C2.52236 20.5018 2.88558 20.6228 3.26 20.6942C3.68393 20.7577 4.11145 20.7944 4.54 20.8042H15.45C15.8814 20.793 16.312 20.7596 16.74 20.7042C17.1149 20.6295 17.4781 20.5051 17.82 20.3342C18.1909 20.1555 18.529 19.9154 18.82 19.6242C19.1078 19.3303 19.3474 18.9928 19.53 18.6242C19.6976 18.2818 19.8186 17.9186 19.89 17.5442C19.9535 17.1203 19.9902 16.6928 20 16.2642C20 16.0742 20 15.8342 20 15.7242V5.8842C20 5.8042 20 5.5342 20 5.3542ZM10.23 17.8042C9.02906 17.7983 7.84913 17.4887 6.8 16.9042L3 17.9042L4 14.1842C3.35511 13.1007 3.00999 11.8651 3 10.6042C3.00398 9.18712 3.4272 7.80291 4.21636 6.62591C5.00552 5.4489 6.12532 4.53173 7.43473 3.98991C8.74414 3.4481 10.1846 3.30587 11.5747 3.58114C12.9648 3.85641 14.2423 4.53686 15.2464 5.5368C16.2505 6.53674 16.9363 7.81145 17.2173 9.20039C17.4984 10.5893 17.3622 12.0304 16.8258 13.342C16.2894 14.6537 15.3769 15.7773 14.2032 16.5713C13.0295 17.3654 11.647 17.7943 10.23 17.8042ZM10.23 4.6742C9.16981 4.68633 8.13177 4.97918 7.22156 5.52294C6.31135 6.06669 5.56148 6.84193 5.0483 7.76972C4.53512 8.69751 4.27695 9.74472 4.30008 10.8047C4.32322 11.8647 4.62683 12.8997 5.18 13.8042L5.32 14.0342L4.72 16.2242L7 15.6042L7.22 15.7342C8.12957 16.27 9.1644 16.5563 10.22 16.5642C11.8113 16.5642 13.3374 15.9321 14.4626 14.8068C15.5879 13.6816 16.22 12.1555 16.22 10.5642C16.22 8.9729 15.5879 7.44678 14.4626 6.32156C13.3374 5.19634 11.8113 4.5642 10.22 4.5642L10.23 4.6742ZM13.73 13.1942C13.599 13.4127 13.4236 13.6012 13.2152 13.7476C13.0068 13.894 12.7699 13.9951 12.52 14.0442C12.1465 14.1125 11.7621 14.0884 11.4 13.9742C11.0593 13.8677 10.7254 13.7408 10.4 13.5942C9.16374 12.9739 8.10944 12.0436 7.34 10.8942C6.92188 10.3617 6.66819 9.71875 6.61 9.0442C6.60405 8.76399 6.65705 8.48565 6.76558 8.22724C6.87412 7.96884 7.03575 7.73612 7.24 7.5442C7.30016 7.47599 7.37397 7.42116 7.45665 7.38326C7.53934 7.34537 7.62905 7.32525 7.72 7.3242H8C8.11 7.3242 8.26 7.3242 8.4 7.6342C8.54 7.9442 8.91 8.8742 8.96 8.9642C8.98457 9.01217 8.99739 9.0653 8.99739 9.1192C8.99739 9.1731 8.98457 9.22623 8.96 9.2742C8.91579 9.38286 8.85508 9.48406 8.78 9.5742C8.69 9.6842 8.59 9.8142 8.51 9.8942C8.43 9.9742 8.33 10.0742 8.43 10.2542C8.70209 10.7134 9.03888 11.131 9.43 11.4942C9.85593 11.8706 10.3429 12.1715 10.87 12.3842C11.05 12.4742 11.16 12.4642 11.26 12.3842C11.36 12.3042 11.71 11.8642 11.83 11.6842C11.95 11.5042 12.07 11.5342 12.23 11.5942C12.39 11.6542 13.28 12.0842 13.46 12.1742C13.64 12.2642 13.75 12.3042 13.8 12.3842C13.8434 12.6459 13.8193 12.9144 13.73 13.1642V13.1942Z"
                                  fill="#E40046" />
                              </svg>
                              <p>WhatsApp</p>
                            </a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer-eps">
                      <button class="hover hover--rojo abrirModal" id="modal-<?php echo $numero_incremento; ?>" data-modal="<?php echo $numero_incremento; ?>">Ver los servicios incluidos
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                          <path fill="currentColor"
                            d="m14.83 11.29-4.24-4.24a1 1 0 1 0-1.42 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41.999.999 0 0 0 .71.29.998.998 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42Z">
                          </path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>



              <?php endforeach; ?>
            </div>
            <div class="swiper-pagination-solu centrar"></div>
          </div>



        </div>
        <?php $tab_counter++; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<?php foreach ($tarjetas_eps as $key => $tarjeta):
  $imagen_servicios_incluidos = isset($tarjeta['imagen_servicios_incluidos']) ? esc_url($tarjeta['imagen_servicios_incluidos']) : '';
  $info_servicios_incluidos = isset($tarjeta['info_servicios_incluidos']) ? $tarjeta['info_servicios_incluidos'] : '';
  $numero_incremento = isset($tarjeta['numero_incremento']) ? $tarjeta['numero_incremento'] : '';

  ?>

  <!-- Modal -->
  <div id="<?php echo $numero_incremento; ?>" class="modal" data-modal="modal-<?php echo $key; ?>">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-columns">
        <div class="modal-column-text">
          <?php echo $info_servicios_incluidos; ?>
        </div>
        <div class="modal-column-image">
          <?php if ($imagen_servicios_incluidos): ?>
            <img src="<?php echo $imagen_servicios_incluidos; ?>" alt="Servicios incluidos" class="img-fluid">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php $tab_counter++; ?>
<?php endforeach; ?>

<script>
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


</script>


<script>
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
</script>




<script>
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
</script>



<style>
  /* Estilos de pestañas */
  .tabs {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    justify-content: space-around;
  }

  .tab-item {
    cursor: pointer;
    padding: 10px 20px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-bottom: none;
    font-weight: bold;
    margin-right: 5px;
    align-items: center;
    text-align: center;
    font-family: 'Open Sans';
    color: #E40046 !important;
    background-color: #FFABC4;
    border-color: #dee2e6 #dee2e6 #fff;
    font-style: normal;
    font-weight: 400;
    line-height: 24px;
    border-radius: 6px 6px 0px 0px;
  }

  .tab-item.active {
    background-color: #fff;
    border-bottom: 1px solid white;
    color: white !important;
    background-color: #E40046;
    border-color: #dee2e6 #dee2e6 #fff;
    font-style: normal;
    font-weight: 400;
    line-height: 24px;
    border-radius: 6px 6px 0px 0px;
    align-items: center;
    text-align: center;
    font-family: 'Open Sans';
  }

  .tab-content {
    display: none;
  }

  .tab-content.active {
    display: block;
  }

  /* Estilos del contenedor de tabs */
  #myTabs {
    display: flex;
    justify-content: left;
    font-family: 'Open Sans';
  }

  /* Estilos de las tarjetas */


  .card {
    border: none;
  }

  .card-body {
    margin-top: 80px;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-eps {
    box-sizing: border-box;
    height: 259px;
    width: 100%;
    max-width: 376px;
    background-color: #fff;
    border: 1px solid #D5DBE7;
    box-shadow: 0px 4px 24px rgba(103, 114, 131, 0.15);
    border-radius: 6px;
    padding: 20px;
    transition: transform 0.2s ease;
  }

  .card-eps p {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 18px;
    letter-spacing: 0.005em;
    color: #263956;
  }

  .card-eps img {
    margin: 10px 0 10px;
    width: auto;
    height: 45px;
  }

  .card-body-eps p {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 24px;
    color: #E40046;
  }

  .contenedor-solicita-cita {
    margin: 5px 0 5px;
    padding: 10px 0 10px;
    display: flex;
    width: 100%;
    border-top: 1px solid #D5DBE7;
    border-bottom: 1px solid #D5DBE7;
  }

  .card-body-eps .solicita-cita {
    width: 50%;
  }

  .card-footer-eps button {
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 24px;
    color: #677283;
    border: none;
    background: transparent;
  }

  .card-header {
    background-color: transparent;
    border-bottom: 1px solid rgb(255 171 196);
  }

  /* Contenedor de las tarjetas */
  .cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
  }

  .card-eps-wrapper {
    text-decoration: none;
  }

  .card-eps:hover {
    transform: translateY(-5px);
  }

  @media (min-width: 1024px) {
    .cards-container {
      grid-template-columns: repeat(3, 1fr);
      /* 3 columnas en escritorio */
    }
  }

  /* Estilos para links */
  a {
    text-decoration: none;
  }

  /* Estilos para SVG */
  svg {
    vertical-align: bottom;
  }


  /* Estilos del modal */
  .modal {
    display: none;
    /* Oculto por defecto */
    position: fixed !important;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 9999;
  }

  .modal-content {
    background-color: #fff;
    margin: 15% auto;
    border: 1px solid #888;
    width: 70%;
    max-width: 788px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }

  .modal-columns {
    display: flex;
    width: 100%;
  }

  .modal-column-text {
    width: 60%;
    padding: 30px;
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.015em;
    color: #1F2C3C;
  }

  .modal-column-image {
    width: 40%;
    display: flex;
    align-items: flex-end;
    background-color: #AACCFF;
  }

  .modal-column img {
    width: auto;
    height: 438px;
  }

  /* Botón de cerrar */
  .close {
    top: 40px;
    right: 40px;
    position: absolute;
    background-color: #fff;
    border-radius: 50%;
    color: #E40046;
    font-size: 28px;
    cursor: pointer;
    width: 24px;
    height: 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 300;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }


  @media (max-width: 768px) {
    .tabs {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
      justify-content: flex-start;
      overflow-x: auto;
      /* Permitir scroll horizontal */
      white-space: nowrap;
      /* Prevenir que los elementos se rompan a la siguiente línea */
    }

    .tab-item {

      flex: 0 0 auto;
      /* Asegura que los elementos ocupen solo el espacio que necesitan */
      margin-right: 5px;
      white-space: nowrap;
      /* Evitar que el texto se divida en varias líneas */
    }


    .tab-item:last-child {
      margin-right: 0;
      /* Elimina el margen derecho del último tab */
    }

    /* Scroll suave */
    .tabs::-webkit-scrollbar {
      display: none;
      /* Oculta la barra de desplazamiento en navegadores con WebKit (como Chrome) */
    }

    .tabs {
      -ms-overflow-style: none;
      /* IE y Edge */
      scrollbar-width: none;
      /* Firefox */
    }
    .close{
      bottom: -10px;
      background-color: #E40046;
      color: white;
      width: 42px;
      height: 42px;
      top: unset;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .modal-content {
      margin: 5% auto;
      /* Reducir márgenes en móvil */
      width: 95%;
      max-width: 100%;
      /* Asegura que ocupe todo el ancho del dispositivo */
    }

    .modal-columns {
      flex-direction: column-reverse;
      background-color: #fff;
      padding-bottom: 30px;
      /* Coloca las columnas una encima de la otra */
    }

    .modal-column-image {
        border: 20px solid white!important;
    }

    .modal-column-text,
    .modal-column-image {
      width: 100%;
      /* Las columnas ocupan todo el ancho */
      padding: 20px;
      /* Añadir padding adicional para mejorar la presentación */
    }

    .modal-column img {
      height: auto;
      width: 100%;
      /* La imagen ocupa todo el ancho disponible */
    }

  }
</style>

