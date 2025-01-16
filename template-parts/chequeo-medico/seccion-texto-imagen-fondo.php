<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen_fondo');
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';
    $cta = $grupoTextoImagen['cta'] ?? '';

    $hayContenido = $subtitulo || $titulo || $descripcion || $imagen;
?>

<?php if ($hayContenido): ?>
    <section class="py-5 px-24">
        <div class="container"> 
            <div class="row bg-neutros align-items-center">
                <div class="col-lg-6 px-0 text-center">
                    <?php if ($imagen) : ?>
                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid w-100">
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 mt-4 mt-md-0 pb-5 pb-lg-0 pt-md-4 pt-lg-0">
                    <?php if( $subtitulo ): ?>
                        <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
                    <?php endif; ?>
                    <?php if( $titulo ): ?>
                        <h2 class="heading--48 mt-2 text-start color--002D72"><?php echo esc_html($titulo); ?></h2>
                    <?php endif; ?>
                    <?php if( $descripcion ): ?>
                        <p class="color-delft-blue mt-4 heading--18"><?php echo esc_html($descripcion); ?></p>
                    <?php endif; ?>
                    <?php
                        if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                            $target = $cta['target'] ? $cta['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-white text-center d-block mt-4"><?php echo esc_html($texto); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>