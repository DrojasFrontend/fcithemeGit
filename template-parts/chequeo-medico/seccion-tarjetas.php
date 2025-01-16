<?php
    $grupoTarjetas = get_field('grupo_tarjetas');
    $subtitulo = $grupoTarjetas['subtitulo'] ?? '';
    $titulo = $grupoTarjetas['titulo'] ?? '';

    $hayContenido = $subtitulo || $titulo;
?>

<?php if ($hayContenido): ?>
    <section class="bg-gray py-5 px-12">
        <div class="container">
            <?php if( $subtitulo ): ?>
                <p class="subheading text-center color--002D72"><?php echo esc_html($subtitulo); ?></p>
            <?php endif; ?>
            <?php if( $titulo ): ?>
                <h2 class="heading--48 mt-2 text-start text-center color--002D72"><?php echo esc_html($titulo); ?></h2>
            <?php endif; ?>
            <div class="row mt-4 gap-5 gap-md-0">
                <?php if (have_rows('grupo_tarjetas')) : ?>
                    <?php while (have_rows('grupo_tarjetas')) : the_row(); ?>
                        <?php if (have_rows('listado')) : ?>
                            <?php while (have_rows('listado')) : the_row(); ?>
                                <?php
                                    $imagen = get_sub_field('imagen');
                                    $tituloListado = get_sub_field('titulo');
                                    $descripcion = get_sub_field('descripcion');
                                ?>
                                <div class="col-md-6">
                                    <div class="benefits-card">
                                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid">
                                        <div class="pt-3 px-md-4">
                                            <h5 class="color--002D72"><?php echo esc_html($tituloListado); ?></h5>
                                            <p class="color-delft-blue mt-2 heading--18"><?php echo esc_html($descripcion); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>