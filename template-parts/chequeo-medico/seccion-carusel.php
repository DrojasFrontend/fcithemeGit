<?php
    $grupoCarrusel = get_field('grupo_carrusel');
    $fondo = $grupoCarrusel['color_fondo_seccion'];
    $subtitulo = $grupoCarrusel['subtitulo'] ?? '';
    $titulo = $grupoCarrusel['titulo'] ?? '';
    $descripcion = $grupoCarrusel['descripcion'] ?? '';
    $usarGradiente = $grupoCarrusel['usar_gradiente'] ?? '';
    $slides = $grupoCarrusel['slides'] ?? '';
?>

<section class="<?php echo esc_attr($fondo); ?> py-5 px-12 text-md-center">
    <div class="position-relative">
        <?php if( $subtitulo ): ?>
            <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
        <?php endif; ?>
        <?php if( $titulo ): ?>
            <h2 class="heading--48 mt-2 text-start text-md-center color--002D72"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
        <?php if( $descripcion ): ?>
            <div class="color-delft-blue mt-4 heading--18"><?php echo $descripcion; ?></div>
        <?php endif; ?>

        <div class="swiper-container-wrapper <?php if($usarGradiente) : ?>swiper-container-gradient<?php endif; ?> mt-5">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($slides as $slide): ?>
                        <div class="swiper-slide">
                        <?php if (!empty($slide['imagen'])): ?>
                            <img src="<?php echo esc_url($slide['imagen']['url']); ?>" alt="<?php echo esc_attr($slide['imagen']['alt']); ?>" class="swiper-img">
                        <?php endif; ?>
                        <?php 
                            $heading_level = !empty($slide['nivel_de_encabezado']) ? esc_html($slide['nivel_de_encabezado']) : 'h4'; 
                        ?>
                            <<?php echo $heading_level; ?> class="color--002D72 text-center mt-3"><?php echo $slide['titulo'] ?></<?php echo $heading_level; ?>>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn swiper-bg-blue d-none d-lg-block">
            <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/01/svgviewer-output-4.svg">
        </div>
        <div class="swiper-button-prev swiper-navBtn swiper-bg-blue d-none d-lg-block">
            <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/01/svgviewer-output-3.svg">
        </div>
        <div class="mt-5 d-flex justify-content-center align-items-center gap-3">
            <div id="pagination1" class="swiper-pagination"></div>
        </div>
    </div>
</section>