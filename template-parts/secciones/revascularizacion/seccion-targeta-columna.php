<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_targetas         = get_query_var('grupo_targetas');
$subtitulo              = !empty($grupo_targetas['subtitulo']) ? esc_html($grupo_targetas['subtitulo']) : '';
$titulo                 = !empty($grupo_targetas['titulo']) ? esc_html($grupo_targetas['titulo']) : '';
$targetas               = !empty($grupo_targetas['targetas']) ? $grupo_targetas['targetas'] : [];
?>
<section class="seccionRevTargetaColumna">
    <div class="seccionRevTargetaColumna__fondo" style="background-color: rgb(170 204 255 / 15%)">
        <div class="wrapper">
            <div class="seccionRevTargetaColumna__titulo">
                <?php if($subtitulo) : ?>
                <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
                <?php endif; ?>

                <?php if($titulo) : ?>
                    <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
                <?php endif; ?>
            </div>
            <?php if($targetas) : ?>
                <div class="seccionRevTargetaColumna__grid">
                    <?php foreach ($targetas as $key => $targeta) { 
                        $titulo         = !empty($targeta['titulo']) ? esc_html($targeta['titulo']) : '';
                        $descripcion    = !empty($targeta['descripcion']) ? $targeta['descripcion'] : '';
                        $imagen_id      = !empty($targeta["imagen"]['ID']) ? esc_attr($targeta["imagen"]['ID']) : '';
                    ?>
                        <div class="seccionRevTargetaColumna__col">
                            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                            <div class="seccionRevTargetaColumna__info">
                            <?php if($titulo) : ?>
                                <h3 class="heading--24 color--002D72"><?php echo $titulo; ?></h3>
                            <?php endif; ?>

                            <?php if($descripcion) : ?>
                                <div class="heading--18 color--263956">
                                    <?php echo $descripcion; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>