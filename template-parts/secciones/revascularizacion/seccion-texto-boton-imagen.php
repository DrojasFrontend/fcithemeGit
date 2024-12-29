<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_texto_cta_imagen = get_query_var('grupo_texto_cta_imagen');
$subtitulo              = !empty($grupo_texto_cta_imagen['subtitulo']) ? esc_html($grupo_texto_cta_imagen['subtitulo']) : '';
$titulo                 = !empty($grupo_texto_cta_imagen['titulo']) ? esc_html($grupo_texto_cta_imagen['titulo']) : '';
$descripcion            = !empty($grupo_texto_cta_imagen['descripcion']) ? $grupo_texto_cta_imagen['descripcion'] : '';
$icono_cta              = !empty($grupo_texto_cta_imagen['icono_cta']) ? $grupo_texto_cta_imagen['icono_cta'] : '';

$cta                    = !empty($grupo_texto_cta_imagen['cta']) ? $grupo_texto_cta_imagen['cta'] : '';
$cta_url = $cta['url'];
$cta_titulo = $cta['title'];
$cta_target = $cta['target'];

$textos                 = !empty($grupo_texto_cta_imagen['textos']) ? $grupo_texto_cta_imagen['textos'] : '';

$imagen_id              = !empty($grupo_texto_cta_imagen["imagen"]['ID']) ? esc_attr($grupo_texto_cta_imagen["imagen"]['ID']) : '';
?>
<section class="seccionRevTextoBotonImagen">
    <div class="wrapper">
        <div class="seccionRevTextoBotonImagen__flex">
            <div class="seccionRevTextoBotonImagen__info" style="background-color: rgb(255 171 196 / 30%)">
                <?php if($subtitulo) : ?>
                <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
                <?php endif; ?>

                <?php if($titulo) : ?>
                <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
                <?php endif; ?>

                <?php foreach ($textos as $key => $texto) { 
                    $icono = $texto['icono'];
                    $detalle = $texto['detalle'];
                ?>
                    <div class="seccionRevTextoBotonImagen__icono color--002D72">
                        <img src="<?php echo $icono; ?>" alt="icon" title="icono">
                        <div class="heading--18 color--002D72">
                            <?php echo $detalle; ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if($cta_url) : ?>
                <div class="seccionRevTextoBotonImagen__cta">
                    <a href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>" class="boton-v2 boton-v2--blanco-rojo">
                        <?php 
                            get_template_part('template-parts/content', 'icono');
                            display_icon('ico-whatsapp'); 
                        ?>
                        <?php echo $cta_titulo; ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="seccionRevTextoBotonImagen__img">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
        </div>
    </div>
</section>