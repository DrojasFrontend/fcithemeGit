<?php
$sitename            = get_bloginfo('name');
$grupo_banner_slider = get_field('grupo_banner_slider');
$imagen_cargando     = !empty($grupo_banner_slider['imagen_cargando']) ? $grupo_banner_slider['imagen_cargando'] : '';
$slides              = !empty($grupo_banner_slider['slides']) ? $grupo_banner_slider['slides'] : [];

?>

<style>
.seccionSliderFullWidth {
    position: relative;
    /* padding-top: 36px; */
}

.seccionSliderFullWidth a {
    display: block;
}

.seccionSliderFullWidth .slick {
    display: none;
}

.seccionSliderFullWidth .slick.slick-initialized {
    display: block;
}

.seccionSliderFullWidth .slick-slide > div > a {
    position: relative;
    display: block !important;
    text-decoration: none;
}

.seccionSliderFullWidth img {
    display: block; 
    width: 100%;
    height: auto;
}

.seccionSliderFullWidth .container--large {
    height: 100%;
}

.seccionSliderFullWidth__contenido {
    position: relative;
    width: 100%;
    padding: 40px 0 80px;
    background-color: #000;
}

.seccionSliderFullWidth__contenido:before {
    content: '';
    position: absolute;
    top: -60px;
    left: 0;
    width: 100%;
    height: 60px;
    background: linear-gradient(0deg, #000 0%, rgba(0, 0, 0, 0.00) 83.94%);
}

.seccionSliderFullWidth__info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    row-gap: 12px;
    height: 100%;
}

.seccionSliderFullWidth__info .heading--64,
.seccionSliderFullWidth__info .heading--18 {
    text-align: left;
    color: var(--fff);
}

.seccionSliderFullWidth__info .boton-v2 {
    margin-top: 12px;
}

.seccionSliderFullWidth .progress {
  display: none;
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 3px;
  overflow: hidden;
  background-color: #FFABC4;
  background-image: linear-gradient(to right, #E40046, #E40046);
  background-repeat: no-repeat;
  background-size: 0 100%;
  transition: background-size .4s ease-in-out;
}

.seccionSliderFullWidth .slick-dots li.slick-active {
    background-color: var(--fff);
}

.seccionSliderFullWidth .slick-dots li button:before {
    color: var(--fff);
}

.seccionSliderFullWidth .slick-dots {
   display: none;
}

@media only screen and (max-width: 1024px) {
    .seccionSliderFullWidth .slick-dots {
        display: flex;
        justify-content: center;
        position: absolute;
        left: 0;
        bottom: 42px;
        width: 100%;
        margin: 0 auto;
        padding: 0 24px;
    }
}

@media only screen and (min-width: 1024px) {
    .seccionSliderFullWidth__contenido {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        padding: 0;
        background-color: transparent;
    }

    .seccionSliderFullWidth__info {
        max-width: 800px;
    }

    .seccionSliderFullWidth__info .heading--64 {
        font-size: 50px;
    }

    .seccionSliderFullWidth .progress {
        display: block;
    }
}

@media only screen and (min-width: 1200px) {
    .seccionSliderFullWidth .slick-dots {
        position: absolute;
        display: flex !important;
        justify-content: flex-start;
        left: 50%;
        bottom: 50px;
        max-width: 1240px;
        padding: 0 24px;
        transform: translate(-50%, 0);
    }
}

</style>

<section class="seccionSliderFullWidth">
    <div class="skeleton-loader">
        <img src="<?php echo $imagen_cargando; ?>" alt="Imagen cargando" title="Imagen cargando">
    </div>
    <div class="slick sliderFullWidth slickPersonalizado">
        <?php foreach ($slides as $key => $slide) { 
            $titulo        = !empty($slide['titulo']) ? $slide['titulo'] : '';
            $imagen        = !empty($slide['imagen']) ? $slide['imagen'] : '';
            $imagen_mobile = !empty($slide['imagen_mobile']) ? $slide['imagen_mobile'] : '';
            $titulo        = !empty($slide['titulo']) ? esc_html($slide['titulo']) : '';
            $descripcion   = !empty($slide['descripcion']) ? esc_html($slide['descripcion']) : '';
            $cta           = !empty($slide['cta']) ? $slide['cta'] : array();
            $cta_titulo    = !empty($cta['title']) ? esc_html($cta['title']) : '';
            $cta_url       = !empty($cta['url']) ? esc_url($cta['url']) : '';
            $cta_target    = !empty($cta['target']) ? $cta['target'] : '';
        ?>
            <a href="<?php echo $cta_url; ?>" target="<?php echo $cta_target;?>" title="<?php echo $cta_url; ?>">
                <div class="visibleDesktop">
                    <img src="<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>" title="mas sobre <?php echo $titulo; ?>">
                </div>
                <div class="visibleMobile">
                    <img src="<?php echo $imagen_mobile; ?>" alt="mobile <?php echo $titulo; ?>" title="mobile mas sobre <?php echo $titulo; ?>">
                </div>
                <?php if($titulo) : ?>
                <div class="seccionSliderFullWidth__contenido">
                    <div class="container--large">
                        <div class="seccionSliderFullWidth__info">
                            <?php if ($key === 0) : ?>
                                <?php if($titulo) : ?>
                                <h1 class="heading--64 fw-300"><?php echo $titulo; ?></h1>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php if($titulo) : ?>
                                <h2 class="heading--64 fw-300"><?php echo $titulo; ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>
    
                            <?php if($descripcion) { ?>
                            <p class="font-sans heading--18"><?php echo $descripcion; ?></p>
                            <?php } ?>
    
                            <?php if (!empty($cta_titulo) && !empty($cta_url)) { ?>
                                <span class="boton-v2 boton-v2--rojo-rojo"><?php echo $cta_titulo; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </a>
        <?php } ?>
    </div>
    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
        <span class="slider__label sr-only"></span>
    </div>
</section>