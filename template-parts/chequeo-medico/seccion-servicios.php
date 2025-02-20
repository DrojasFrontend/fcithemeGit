<?php
    $grupoServicios = get_field('grupo_servicios');
    $subtitulo = $grupoServicios['subtitulo'] ?? '';
    $titulo = $grupoServicios['titulo'] ?? '';

    $hayContenido = $subtitulo || $titulo;
?>

<?php if ($hayContenido): ?>
    <section class="py-5 px-12">
        <div class="container">
            <div class="text-center mb-4">
                <?php if ($subtitulo): ?>
                    <p class="subheading color--002D72 text-uppercase"><?php echo esc_html($subtitulo); ?></p>
                <?php endif; ?>
                <?php if ($titulo): ?>
                    <h2 class="heading--48 mt-2 color--002D72"><?php echo esc_html($titulo); ?></h2>
                <?php endif; ?>
            </div>
            <div class="d-none d-md-flex row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                <?php if (have_rows('grupo_servicios')) : ?>
                    <?php while (have_rows('grupo_servicios')) : the_row(); ?>
                        <?php if (have_rows('servicios')) : ?>
                            <?php while (have_rows('servicios')) : the_row(); ?>
                                <div class="col">
                                    <?php
                                        $imagen = get_sub_field('imagen');
                                        $tituloServicios = get_sub_field('titulo');
                                        $cta = get_sub_field('cta');
                                    ?>
                                    <div class="card card-chequeo__servicios h-100">
                                        <?php if ($imagen) : ?>
                                            <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="card-img-top">
                                        <?php endif; ?>
                                        <div class="card-body">
                                        <?php if ($tituloServicios): ?>
                                            <h5 class="card-title color--002D72"><?php echo esc_html($tituloServicios); ?></h5>
                                        <?php endif; ?>
                                        </div>
                                        <div class="card-footer bg-white border-0">
                                            <?php
                                                if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                                                    $url = $cta['url'];
                                                    $texto = $cta['title'];
                                                    $target = $cta['target'] ? $cta['target'] : '_self';
                                            ?>
                                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="text-decoration-none"><span class="span-underline"><?php echo esc_html($texto); ?></span></a>
                                                <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/01/Right-arrow.svg" width="24" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="swiper-container-servicios d-md-none overflow-hidden">
                <div class="swiper-wrapper">
                    <?php if (have_rows('grupo_servicios')) : ?>
                        <?php while (have_rows('grupo_servicios')) : the_row(); ?>
                            <?php if (have_rows('servicios')) : ?>
                                <?php while (have_rows('servicios')) : the_row(); ?>
                                    <div class="swiper-slide">
                                        <?php
                                            $imagen = get_sub_field('imagen');
                                            $tituloServicios = get_sub_field('titulo');
                                            $cta = get_sub_field('cta');
                                        ?>
                                        <div class="card card-chequeo__servicios h-100">
                                            <?php if ($imagen) : ?>
                                                <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="card-img-top">
                                            <?php endif; ?>
                                            <div class="card-body">
                                            <?php if ($tituloServicios): ?>
                                                <h5 class="card-title color--002D72"><?php echo esc_html($tituloServicios); ?></h5>
                                            <?php endif; ?>
                                            </div>
                                            <div class="card-footer bg-white border-0">
                                                <?php
                                                    if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                                                        $url = $cta['url'];
                                                        $texto = $cta['title'];
                                                        $target = $cta['target'] ? $cta['target'] : '_self';
                                                ?>
                                                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="text-decoration-none"><span class="span-underline"><?php echo esc_html($texto); ?></span></a>
                                                    <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/01/Right-arrow.svg" width="24" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
    </section>
<?php endif; ?>