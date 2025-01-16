<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen_cta');
    $fondo = $grupoTextoImagen['color_fondo_seccion'];
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';

    $hayContenido = $subtitulo || $titulo || $descripcion || $imagen;
?>

<?php if ($hayContenido): ?>
    <section class="<?php echo esc_attr($fondo); ?> py-5 px-12">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row align-items-center">
                <div class="col-md-6 mt-4 mt-md-0">
                    <?php if( $subtitulo ): ?>
                        <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
                    <?php endif; ?>
                    <?php if( $titulo ): ?>
                        <h2 class="heading--48 mt-2 text-start color--002D72"><?php echo esc_html($titulo); ?></h2>
                    <?php endif; ?>
                    <?php if( $descripcion ): ?>
                        <div class="color-delft-blue mt-4 heading--18"><?php echo $descripcion; ?></div>
                    <?php endif; ?>
                    <div class="d-flex flex-column gap-3 mt-4">
                    <?php if (have_rows('grupo_texto_imagen_cta')) : ?>
                        <?php while (have_rows('grupo_texto_imagen_cta')) : the_row(); ?>
                            <?php if (have_rows('botones')) : ?>
                                <?php while (have_rows('botones')) : the_row(); ?>
                                    <?php
                                        $fondo = get_sub_field('fondo');
                                        $icono = get_sub_field('icono');
                                        $cta = get_sub_field('cta');

                                        if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                                            $url = $cta['url'];
                                            $texto = $cta['title'];
                                            $target = $cta['target'] ? $cta['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-chequeo__medico <?php echo esc_attr($fondo); ?> text-decoration-none">
                                            <?php if ($icono) : ?>
                                                <span class="icono">
                                                    <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" width="24" />
                                                </span>
                                            <?php endif; ?>
                                            <span class="texto"><?php echo esc_html($texto); ?></span>
                                        </a>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <?php if ($imagen) : ?>
                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid w-100">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>