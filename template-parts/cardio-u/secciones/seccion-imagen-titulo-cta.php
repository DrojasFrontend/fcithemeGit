<?php 
$sitename                = esc_html(get_bloginfo('name'));
$grupo_imagen_titulo_cta = get_query_var('grupo_imagen_titulo_cta');
$subtitulo               = !empty($grupo_imagen_titulo_cta['subtitulo']) ? esc_html($grupo_imagen_titulo_cta['subtitulo']) : '';
$titulo                  = !empty($grupo_imagen_titulo_cta['titulo']) ? esc_html($grupo_imagen_titulo_cta['titulo']) : '';
$descripcion             = !empty($grupo_imagen_titulo_cta['descripcion']) ? esc_html($grupo_imagen_titulo_cta['descripcion']) : '';
$icono                   = !empty($grupo_imagen_titulo_cta['icono']) ? $grupo_imagen_titulo_cta['icono'] : '';
$descripcion_corta       = !empty($grupo_imagen_titulo_cta['descripcion_corta']) ? esc_html($grupo_imagen_titulo_cta['descripcion_corta']) : '';
$enlace                  = !empty($grupo_imagen_titulo_cta['enlace']) ? $grupo_imagen_titulo_cta['enlace'] : '';
$imagen_id               = !empty($grupo_imagen_titulo_cta["imagen"]['ID']) ? $grupo_imagen_titulo_cta["imagen"]['ID'] : '';
?>
<section class="seccionCardioUImgTituloCta">
    <div class="wrapper">
        <div class="seccionCardioUImgTituloCta__grid">
            <div class="seccionCardioUImgTituloCta__img">
                <?php if($imagen_id) : ?>
                    <?php 
                        echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                    ?>
                <?php else : ?>
                    <img src="https://via.placeholder.com/372x532" alt="Imagen">
                <?php endif; ?>
            </div>
            <div class="seccionCardioUImgTituloCta__info">
                <?php if($subtitulo) : ?>
                <p class="subheading color--002D72">
                    <?php echo $subtitulo; ?>
                </p>
                <?php endif; ?>
    
                <?php if($titulo) : ?>
                <h2 class="heading--48 color--002D72">
                    <?php echo $titulo; ?>
                </h2>
                <?php endif; ?>
    
                <?php if($descripcion) : ?>
                <p class="heading--18 color--263956">
                    <?php echo $descripcion; ?>
                </p>
                <?php endif; ?>

                <div class="seccionCardioUImgTituloCta__icono">
                    <img src="<?php echo $icono; ?>" alt="respaldo de LaCardio - <?php echo $sitename; ?>" title="respaldo de LaCardio">
                    <p class="heading--14 color--677283">
                        <?php echo $descripcion_corta; ?>
                    </p>
                </div>

                <?php if($enlace) : ?>
                <a class="boton-v2 boton-v2--rojo-rojo" href="<?php echo esc_url($enlace['url']); ?>" target="<?php echo $enlace['target']; ?>" title="<?php echo $enlace['title']; ?> - Más información">
                    <?php echo $enlace['title']; ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
