<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_banner_texto = get_query_var('grupo_banner_texto');
$titulo             = !empty($grupo_banner_texto['titulo']) ? esc_html($grupo_banner_texto['titulo']) : '';
$descripcion        = !empty($grupo_banner_texto['descripcion']) ? esc_html($grupo_banner_texto['descripcion']) : '';
$fondo              = !empty($grupo_banner_texto['fondo']) ? esc_html($grupo_banner_texto['fondo']) : '';
$imagen_id          = !empty($grupo_banner_texto["imagen"]['ID']) ? $grupo_banner_texto["imagen"]['ID'] : '';
?>

<section class="seccionCardioUBannerTexto">
    <div class="seccionCardioUBannerTexto__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionCardioUBannerTexto__grid">
                <div class="seccionCardioUBannerTexto__info">
                    <?php if($titulo) : ?>
                        <h1 class="heading--64 color--fff">
                            <?php echo $titulo; ?>
                        </h1>
                    <?php endif; ?>

                    
                </div>
                <div class="seccionCardioUBannerTexto__img">
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
    </div>
</section>
<section class="seccionCardioUInternaCurso__detalle">
    <div class="wrapper">
        <?php if($descripcion) : ?>
                        <p class="heading--18 color--263956">
                            <?php echo $descripcion; ?>
                        </p>
        <?php endif; ?>
    </div>
</section>