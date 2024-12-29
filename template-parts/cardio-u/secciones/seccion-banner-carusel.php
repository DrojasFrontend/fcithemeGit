<?php 
$sitename              = esc_html(get_bloginfo('name'));
$grupo_banner_pricipal = get_query_var('grupo_banner_pricipal');
$slides                = !empty($grupo_banner_pricipal['slides']) ? $grupo_banner_pricipal['slides'] : [];
?>

<section class="seccionCardioUBannerPrincipal">
    <div class="seccionCardioUBannerPrincipal__fondo">
        <div class="wrapper">
            <div class="slickCardioUBannerPrincipal slickPersonalizado">
                <?php foreach ($slides as $key => $slide) { 
                    $titulo        = !empty($slide['titulo']) ? esc_html($slide['titulo']) : '';
                    $descripcion   = !empty($slide['descripcion']) ? esc_html($slide['descripcion']) : '';
                    $enlace        = !empty($slide['enlace']) ? $slide['enlace'] : '';
                    $enlace_url    = !empty($enlace['url']) ? $enlace['url'] : '';
                    $enlace_titulo = !empty($enlace['title']) ? $enlace['title'] : '';
                    $enlace_target = !empty($enlace['target']) ? $enlace['target'] : '';
                    $imagen_id     = !empty($slide["imagen"]['ID']) ? $slide["imagen"]['ID'] : '';
                    ?>
                    <div>
                        <div class="seccionCardioUBannerPrincipal__grid">
                            <div class="seccionCardioUBannerPrincipal__info">
                                <?php if($key == 0) : ?>
                                    <h1 class="heading--64 color--fff"><?php echo $titulo; ?></h1>
                                <?php else : ?>
                                    <h2 class="heading--64 color--fff"><?php echo $titulo; ?></h2>
                                <?php endif; ?>
                                <p class="heading--18 color--fff">
                                    <?php echo $descripcion ?>
                                </p>
                                <?php if($enlace) : ?>
                                <a class="boton-v2 boton-v2--rojo-rojo" href="<?php echo $enlace_url; ?>" title="Más información" target="<?php echo $enlace_target; ?>">
                                    <?php echo $enlace_titulo; ?>
                                </a>
                                <?php endif; ?>
                                <?php if(count($slides) > 1) : ?>
                                <div class="seccionCardioUBannerPrincipal__bullet">
                                    <?php foreach ($slides as $index => $slide) { ?>
                                        <span class="<?php echo $index == 0 ? 'active' : ''; ?>" data-slide-index="<?php echo $index; ?>"></span>
                                    <?php }; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="seccionCardioUBannerPrincipal__img">
                                <?php if($imagen_id) : ?>
                                    <?php 
                                        echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                                    ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/372x532" alt="Imagen">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>