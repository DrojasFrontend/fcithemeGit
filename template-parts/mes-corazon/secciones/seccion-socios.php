<?php 
$sitename     = esc_html(get_bloginfo('name'));
$grupo_socios = get_field('grupo_socios');
$titulo       = $grupo_socios['titulo'];
$galerias     = $grupo_socios['galeria'];
?>
<section class="paginaMesCorazonSocios">
  <div class="container--large">

    <?php if($titulo) : ?>
      <h2 class="heading--48 color--002D72">
        <?php echo $titulo; ?>
      </h2>
    <?php endif; ?>

    <div class="swiper swiperMesCorazonSocios">
      <div class="swiper-wrapper">
        <?php foreach ($galerias as $key => $imagen) { 
        $imagen_id = !empty($imagen['ID']) ? $imagen['ID'] : '';
          ?>
          <div class="swiper-slide">
            <div class="paginamesCorazonSocios__slide">
              <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
    <div class="swiper-custom-button swiper-button-next-socio"></div>
    <div class="swiper-custom-button swiper-button-prev-socio"></div>
    <div class="swiper-pagination-socio"></div>
  </div>
</section>
