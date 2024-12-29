<?php
$sitename = get_bloginfo('name');
$grupo_articulos_buscados = get_field('grupo_articulos_buscados');
$titulo = $grupo_articulos_buscados['titulo'];
?>

<?php $args = array(
    'post_type' => 'blog_fellows',
    'posts_per_page' => 4,
);
$blog_fellows_query = new WP_Query($args);
?>

<section class="seccionArticulosBuscados">
    <div class="seccionArticulosBuscados__fondo">
        <div class="container--large">
            <h2 class="heading--48 color--002D72" style="text-align: center;"><?php echo $titulo; ?></h2>
            <div class="seccionArticulosBuscados__articulos slickArticulos slickPersonalizado">
                <?php
                if ($blog_fellows_query->have_posts()):
                    $index = 1;
                    while ($blog_fellows_query->have_posts()):
                        $blog_fellows_query->the_post(); ?>
                        <div style="height: 100%;">
                            <article id="post-<?php the_ID(); ?>" class="seccionArticulosBuscados__articulo"
                                data="<?php echo $index; ?>">
                                <?php
                                $titulo = get_the_title();
                                $link = get_the_permalink();
                                $foto_doctor_home = get_field('foto_doctor_home');
                                $foto_doctor_grande = get_field('foto_doctor_grande');
                                $nombre_doctor = !empty(get_field('nombre_doctor')) ? esc_html(get_field('nombre_doctor')) : '';
                                $apellido_doctor = !empty(get_field('apellido_doctor')) ? esc_html(get_field('apellido_doctor')) : '';
                                $fecha = get_the_date('j F, Y');
                                ?>
                                <a href="<?php echo $link; ?>" style="height: 100%;" class="seccionArticulosBuscados__link"
                                    title="<?php echo $titulo; ?>">
                                    <!-- <span class="heading--36 color--05C3DE">0<?php echo $index; ?></span> -->
                                    <div class="seccionArticulosBuscados__info" style="height: 100%;">
										<!--
                                        <div class="seccionArticulosBuscados__imgCabecera">
                                        <?php if ($foto_doctor_grande) { ?>
                                            <img class="" width="100%" height="auto" src="<?php echo $foto_doctor_grande; ?>"
                                                alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>"
                                                title="<?php echo $nombre_doctor . ' ' . $apellido_doctor; ?>">
                                        <?php } else { ?>
                                            <img class="" width="100%" height="auto" src="https://www.lacardio.org/wp-content/uploads/2024/11/banner-generico.png"
                                                alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>"
                                                title="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>">
                                        <?php } ?>
                                        </div>
										-->
                                        <header class="seccionArticulosBuscados__footer">
                                            <h3 class="heading--18 color--002D72"><?php echo $titulo; ?></h3>
                                            <!--<p class="heading--12 color--717C7D"><?php echo $fecha; ?></p>-->
                                        </header>
                                        <footer class="seccionArticulosBuscados__header">
                                            <?php if ($foto_doctor_home) { ?>
                                                <img class="seccionArticulosBuscados__img" width="42" height="42"
                                                    src="<?php echo $foto_doctor_home ?>"
                                                    alt="<?php echo $nombre_doctor . ' ' . $apellido_doctor . ' - ' . $sitename; ?>"
                                                    title="<?php echo $nombre_doctor . ' ' . $apellido_doctor ?>">
                                            <?php } else { ?>
                                                <img class="seccionArticulosBuscados__noimg"
                                                    src="<?php echo IMG_BASE . 'ico-heart.svg' ?>" alt="">
                                            <?php } ?>
                                            <p class="heading--18 color--263956" style="font-size: 14px;line-height: 14px;">
                                                <?php echo $nombre_doctor . ' ' . $apellido_doctor; ?></p>
                                        </footer>
                                    </div>
                                </a>
                            </article>
                        </div>

                        <?php $index++; endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p>No se han encontrado posts.</p>';
                endif; ?>
            </div>
        </div>
    </div>
</section>


<style>
    .seccionArticulosBuscados .slickArticulos .slick-slide {
        background: #FFFFFF;
        border: 1px solid #D5DBE7;
        border-radius: 6px;
        padding: 20px;
        margin: 18px;
    }

    .seccionArticulosBuscados__imgCabecera {
        border-radius: 6px;
    }

    .seccionArticulosBuscados__articulo {
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Asegura que el contenedor ocupe el 100% de la altura del padre */
    }

    .seccionArticulosBuscados__info {
        flex-grow: 1;
        /* Permite que esta sección ocupe el espacio disponible */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Mantiene el footer en la parte inferior */
    }

    

    .seccionArticulosBuscados__fondo {
        background-color: #ffffff;
        padding: 70px 0;
    }

    .seccionBuscar__grid {
        padding-bottom: 40px;
    }

    .seccionGrid,
    .seccionEventos__fondo {
        background-color: #ffffff;
    }

    .seccionEventos {
        margin: 0;
        background-color: #ffffff;
    }

    .seccionEvento__info {
        box-shadow: unset;
    }

    @media (max-width: 1024px) {
        .seccionArticulosBuscados .slickArticulos .slick-slide {
            margin: 20px 20px 0 0;
    	}
	}
</style>