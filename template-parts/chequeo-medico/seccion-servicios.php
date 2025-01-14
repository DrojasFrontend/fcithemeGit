<?php
$grupoServicios = get_field('grupo_servicios');
$subtitulo = $grupoServicios['subtitulo'] ?? '';
$titulo = $grupoServicios['titulo'] ?? '';

$args = [
    'post_type' => 'servicios',
    'posts_per_page' => 8,
];
$query = new WP_Query($args);

if ($query->have_posts()): ?>
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
                <?php while ($query->have_posts()): $query->the_post(); ?>
                    <div class="col">
                        <div class="card card-chequeo__servicios h-100">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title color--002D72"><?php the_title(); ?></h5>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none"><span class="span-underline">Conoce más</span></a>
                                <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/01/Right-arrow.svg" width="24" />
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-container-servicios d-md-none overflow-hidden">
                <div class="swiper-wrapper">
                    <?php while ($query->have_posts()): $query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="card card-chequeo__servicios flex-fill h-100">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="card-body flex-fill">
                                    <h5 class="card-title color--002D72"><?php the_title(); ?></h5>
                                </div>
                                <div class="card-footer bg-white border-0">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">Conoce más</a>
                                    <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/01/Right-arrow.svg" width="24" />
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
