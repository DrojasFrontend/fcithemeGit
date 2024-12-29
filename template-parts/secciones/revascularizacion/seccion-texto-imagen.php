<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_texto_imagen = get_query_var('grupo_texto_imagen');
$estilo_targeta     = !empty($grupo_texto_imagen['estilo_targeta']) ? $grupo_texto_imagen['estilo_targeta'] : '';
$subtitulo          = !empty($grupo_texto_imagen['subtitulo']) ? esc_html($grupo_texto_imagen['subtitulo']) : '';
$titulo             = !empty($grupo_texto_imagen['titulo']) ? esc_html($grupo_texto_imagen['titulo']) : '';
$descripcion        = !empty($grupo_texto_imagen['descripcion']) ? $grupo_texto_imagen['descripcion'] : '';
$imagen_id          = !empty($grupo_texto_imagen["imagen"]['ID']) ? esc_attr($grupo_texto_imagen["imagen"]['ID']) : '';

?>
<section class="seccionRevTextoImagen">
    <div class="wrapper">
        <div class="seccionRevTextoImagen__flex <?php echo $estilo_targeta; ?>">
            <div class="seccionRevTextoImagen__col">
                <div class="seccionRevTextoImagen__info">
                    <?php if($subtitulo) : ?>
                    <span class="subheading color--002D72 uppercase"><?php echo $subtitulo; ?></span>
                    <?php endif; ?>
                    
                    <?php if($titulo) : ?>
                    <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
                    <?php endif; ?>

                    <?php if($descripcion) : ?>
                    <p class="heading--18 color--263956">
                        <?php echo $descripcion; ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="seccionRevTextoImagen__col">
                <div class="seccionRevTextoImagen__img">
                    <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                </div>
            </div>
        </div>
    </div>
</section>