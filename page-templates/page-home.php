<?php
/* Template name: Home por defecto */
get_header();

$instalaciones_nuevas = get_field('instalaciones_nuevas');
$instalaciones_actuales = get_field('instalaciones_actuales');

?>
<main class="home boxedContent">
    <div class="internaPpal">
        <div class="sliderhome">

            <section class="slider_home_ppal">
                <?php echo do_shortcode('[rev_slider alias="slider-home"][/rev_slider]'); ?>
            </section>
        </div>

        <section class="container-fluid home_servicios fondo1 py-5">
            <div class="container">
                <div class="col-12">
                    <div class="home_servicios_int text-center">
                        <h2>Conoce nuestros <strong>servicios</strong></h2>
                        <div class="home_servicios_carrusel">
                            <div class="home-carousel1">

                                <?php
                                $argumentos_cirugias = array(
                                    'post_type' => array('cirugias', 'no-quirurgicos'), // Your Post type Name that You Registered
                                    'posts_per_page' => 15,
                                    'order' => 'ASC',
                                );
                                $publicaciones = new WP_Query($argumentos_cirugias);
         
                                if ($publicaciones->have_posts()) :
                                    while ($publicaciones->have_posts()) :
                                        $publicaciones->the_post();
                                        $foto = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large');
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="h-carou-indv">
                                            <div class="h-carou-indv-cont">
                                                <div class="h-carou-indv-img">
                                                    <img src="<?php echo $foto; ?>" alt="<?php the_title(); ?> ">
                                                    <div class="h-carou-indv-shadow"></div>
                                                </div>
                                                <h3><?php echo get_the_title(); ?></h3>
                                            </div>
                                        </a>
                                        <?php
                                        //   /wp-content/themes/bi/assets/img/servicios/servicios_1.jpg
                     
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php get_template_part('template-parts/content', 'bi-logo'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid home_especialistas mw-1600 py-5 fondo2">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="home_espec_texto py-5 px-4">
                        <h2 class="mb-3">Conoce a nuestros <strong>especialistas</strong></h2>
                        <a href="/nuestros-cirujanos/">Ver todos <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                <?php
                $argumentos_cirugias = array(
                    'post_type' => 'nuestros-cirujanos', // Your Post type Name that You Registered
                    'posts_per_page' => 3,
                    'order' => 'rand',
                );
                $publicaciones = new WP_Query($argumentos_cirugias);

                if ($publicaciones->have_posts()) :
                    while ($publicaciones->have_posts()) :
                        $publicaciones->the_post();
                        $directivo = get_post_meta($post->ID, 'directivo', 1);
                        $profesion = get_post_meta($post->ID, 'profesion', 1);

                        $foto = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large');
                        ?>
                        <div class="col-12 col-md-4 col-lg-3 mb-3 mb-md-0">
                            <a href="<?php the_permalink(); ?>" class="home_espec_indv">
                                <div class="hesp_foto">
                                    <img src="<?php echo $foto; ?>" alt="<?php the_title(); ?> ">
                                </div>
                                <div class="hesp_descrp">
                                    <h3><?php echo primeraPalabraSpan(get_the_title()); ?></h3>
                                    <p><?php echo $profesion; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php
        
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <section class="container-fluid fondo3 home_cientificos py-5 pb-100px">
            <div class="container position-relative">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="text-center">Conoce nuestros <strong class="d-block">Directores científicos</strong></h2>
                    </div>
                </div>
                <div class="row">


                    <?php
                    $argumentos_cirugias = array(
                        'post_type' => 'directores', // Your Post type Name that You Registered
                        'posts_per_page' => 3,
                        'order' => 'ASC'
                    );
                    $publicaciones = new WP_Query($argumentos_cirugias);
                    $directivos = 0;

                    if ($publicaciones->have_posts()) :
                        while ($publicaciones->have_posts()) :
                            $publicaciones->the_post();
                            $directivo = get_post_meta($post->ID, 'directivo', 1);
                            $profesion = get_post_meta($post->ID, 'profesion', 1);

                            $foto = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large');
                            ?>

                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                <div class="tarjeta">
                                    <div class="foto">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo $foto; ?>" alt="<?php the_title(); ?> ">
                                        </a>
                                    </div>
                                    <div class="contenido">
                                        <h3><?php echo primeraPalabraSpan(get_the_title()); ?></h3>
                                        <p><?php echo $profesion; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $directivos++;
                            
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                    




                </div>
                <div class="ubi-logo1">
                    <img src="/wp-content/themes/bi/assets/img/general/libelula_logo.png" alt="Clínica Integral de Cirugía Estética & Bienestar">
                </div>
            </div>
        </section>

        <section class="container-fluid fondo4 py-70px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_home_instalaciones">
                            <div class="carousel-instalaciones shi_contenedor mostrar">
                                <?php
                                foreach($instalaciones_actuales as $cadaFoto):
                                    ?>
                                    <div class="slid_h_insta_indv">
                                        <div class="_int">
                                            <div class="_bg">
                                                <?php echo wp_get_attachment_image($cadaFoto['imagen'], 'full'); ?>
                                            </div>
                                            <div class="_contenido">
                                                <h3>Conoce las instalaciones</h3>
                                                <h4>Body Institute</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                            <div class="carousel-instalaciones shi_contenedor">
                                <?php
                                foreach($instalaciones_nuevas as $cadaFoto):
                                    ?>
                                    <div class="slid_h_insta_indv">
                                        <div class="_int">
                                            <div class="_bg">
                                                <?php echo wp_get_attachment_image($cadaFoto['imagen']['ID'], 'full'); ?>
                                            </div>
                                            <div class="_contenido">
                                                <h3>Conoce las instalaciones nuevas</h3>
                                                <h4>Body Institute</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                            <div class="btns_instalaciones_gal">
                                <ul>
                                    <li><a href="#" class="actuales elegida">Actuales</a></li>
                                    <li><a href="#" class="nuevas">Nuevas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="nuestros-clientes" class="container-fluid fondo3 home_clientes py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 hom-cli-titulo">
                        <h2>Conoce a nuestros <strong>clientes</strong></h2>
                        <div class="home-clientes-nav">
                            <ul>
                                <li><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="slider_clientes">
                        <?php
                        $argumentos_cirugias = array(
                            'post_type' => 'clientes', // Your Post type Name that You Registered
                            'posts_per_page' => 9,
                            'order' => 'DESC'
                        );
                        $publicaciones = new WP_Query($argumentos_cirugias);

                        if ($publicaciones->have_posts()) :
                            while ($publicaciones->have_posts()) :
                                $publicaciones->the_post();
                                $video = get_post_meta($post->ID, 'video', 1);

                                    $foto = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large');
                                    ?>
                                    <a href="<?php echo $video; ?>&rel=0" data-fancybox="" class="slide_cliente_indv">
                                        <div class="_int">
                                            <div class="_bg">
                                                <img src="<?php echo $foto; ?>" alt="<?php the_title(); ?>">
                                            </div>
                                            <div class="_play">
                                                <img src="/wp-content/themes/bi/assets/img/general/video_play.png" alt="Play al video">
                                            </div>
                                            <div class="_nombre">
                                                <h3><?php echo primeraPalabraSpan(get_the_title()); ?></h3>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                            
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                        
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="nuestros-resultados" class="container-fluid home_resultados py-5">
            <div class="container position-relative">
                <div class="row cabecera">
                    <div class="col-6">
                        <h2>Conoce nuestros <strong>resultados</strong></h2>
                    </div>
                    <div class="col-6 text-right">
                        <?php /*
                        <p>
                            <a href="#">Ver Todo <i class="fas fa-chevron-right"></i></a>
                        </p>
                        */ ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="home_resultados_img">
                            <img src="/wp-content/themes/bi/assets/img/general/resultados.jpeg" alt="Nuestros resultados">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid fondo5 home_blog py-5 mb-5">
            <?php get_template_part('template-parts/content', 'blog-entradas'); ?>
        </section>

    </div>
</main>
<?php get_footer(); ?>