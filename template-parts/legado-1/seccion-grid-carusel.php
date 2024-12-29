<section class="paginaLegadoGridCarusel">
  <div class="container--large">
    <div class="paginaLegadoGridCarusel__grid">
      <div class="paginaLegadoGridCarusel__info">
        <p class="subheading color--fff">5 RAZONES PARA HACER UN TESTIMONIO SOLIDARIO</p>
        <h2 class="heading--48 color--fff">Por los niños con problemas del corazón</h2>
      </div>
      <div class="paginaLegadoGridCarusel__carusel">
        <div class="swiper swiperLegadoGridCarusel">
          <div class="swiper-wrapper">
            <?php for ($i = 1; $i <= 4; $i++) { ?>
              <div class="swiper-slide">
                <div class="paginaLegadoGridCarusel__targeta">
                  <img src="<?php echo IMG_BASE . 'legado/problemas-del-corazon-1.png'; ?>" alt="problemas del corazon" title="problemas del corazon">
                  <span class="heading--64 color--fff">#<?php echo $i;?></span>
                  <p class="heading--18 color--fff">
                    Brinda segundas oportunidades de vida para los niños de escasos recursos que no pueden costear tratamientos médicos de calidad para salvar sus corazones.
                  </p>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="swiper-custom-button swiper-button-next-grid"></div>
        <div class="swiper-custom-button swiper-button-prev-grid"></div>
        <div class="swiper-pagination-grid centrar"></div>
      </div>
    </div>
  </div>
</section>