<?php
    $grupoListadoIcono = get_field('grupo_listado_icono');
    $titulo = $grupoListadoIcono['titulo'] ?? '';

    $hayContenido = $titulo;
?>

<?php if ($hayContenido): ?>
    <section class="py-5 px-12">
        <div class="container">
            <?php if( $titulo ): ?>
                <h2 class="heading--48 mt-2 text-center color--002D72"><?php echo esc_html($titulo); ?></h2>
            <?php endif; ?>
            <div class="row justify-content-lg-center mt-5">
            <?php if (have_rows('grupo_listado_icono')) : ?>
                <?php while (have_rows('grupo_listado_icono')) : the_row(); ?>
                    <?php if (have_rows('listado')) : ?>
                        <?php while (have_rows('listado')) : the_row(); ?>
                            <?php
                                $imagen = get_sub_field('imagen');
                                $tituloListado = get_sub_field('titulo');
                            ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid">
                                    <h5 class="mt-2 color--002D72"><?php echo esc_html($tituloListado); ?></h5>
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