<?php 
    $grupoContactanos = get_field('grupo_contactanos');
    $subtitulo = $grupoContactanos['subtitulo'] ?? '';
    $titulo = $grupoContactanos['titulo'] ?? '';
    $descripcion = $grupoContactanos['descripcion'] ?? '';
    $tituloComunicacion = $grupoContactanos['titulo_comunicacion'] ?? '';
    $imagen = $grupoContactanos['imagen'] ?? '';
    $cta = $grupoContactanos['cta'] ?? '';

    $hayContenido = $subtitulo || $titulo || $descripcion || $imagen;
?>

<?php if ($hayContenido): ?>
    <section class="py-5 px-12">
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
                        <p class="mt-4 color--002D72 heading--18"><?php echo esc_html($descripcion); ?></p>
                    <?php endif; ?>
                    <?php if( $tituloComunicacion ): ?>
                        <h5 class="mt-4 color--002D72"><?php echo esc_html($tituloComunicacion); ?></h5>
                    <?php endif; ?>
                    
                    <div class="my-3">
                        <?php if (have_rows('grupo_contactanos')) : ?>
                            <?php while (have_rows('grupo_contactanos')) : the_row(); ?>
                                <?php if (have_rows('listado')) : ?>
                                    <?php while (have_rows('listado')) : the_row(); ?>
                                        <?php 
                                            $icono = get_sub_field('icono');
                                            $texto = get_sub_field('texto');
                                            $enlace = get_sub_field('enlace');
                                        ?>
                                        <a href="<?php echo esc_url($enlace); ?>" target="_blank" class="d-flex gap-2 text-decoration-none">
                                            <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" />
                                            <p class="contact-chequeo__list"><?php echo esc_html($texto); ?></p>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php
                    if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                            $url = $cta['url'];
                            $texto = $cta['title'];
                            $target = $cta['target'] ? $cta['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-amaranth d-block mt-4 text-center"><?php echo esc_html($texto); ?></a>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 text-center">
                    <?php if ($imagen) : ?>
                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid img-radius w-100">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>