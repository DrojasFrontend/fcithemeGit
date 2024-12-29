<?php
/* Template name: Nuestra causa (Template) */
get_header();

// $instalaciones_nuevas = get_field('instalaciones_nuevas');
// $instalaciones_actuales = get_field('instalaciones_actuales');

?>
<main class="ncausa">
    
    <section class="home__slider">
        <div class="home__slider--cont">
            <?php
                $sliders = get_field('slider');
                foreach($sliders as $slider):
                    ?>
                    <div class="home__slider--indv">
                        <div class="home__slider--indv__contenido">
                            <div>
                                <h2 class="mb-0 mb-md-2"><?php echo $slider["titulo_1"]; ?></h2>
                                <h3 class="mb-2 mb-md-4"><?php echo $slider["titulo_2"]; ?></h3>
                                <?php
                                if($slider["enlace"] != ""):
                                    ?>
                                    <div class="boton">
                                        <a href="<?php echo $slider["enlace"]; ?>" target="<?php echo $slider["enlace_pestana"]; ?>" class="btn btn-accion1"><?php echo $slider["enlace_valor"]; ?></a>
                                    </div>
                                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="home__slider--indv__bg">
                            <img src="<?php echo $slider["imagen"]["url"]; ?>" alt="<?php echo $slider["imagen"]["alt"]; ?>">
                        </div>
                    </div>
                    <?php
                endforeach;
            ?>
            
        </div>
    </section>

    <section class="ncausa__historias">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Historias</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $historias = get_field('historias');
                foreach($historias as $historia):
                    ?>
                    <div class="col-12 col-md-6 mb-4 mb-md-0">
                        <div class="ncausa__historias--video">
                            <a href="https://www.youtube.com/embed/<?php echo $historia["youtube"]; ?>?controls=0&rel=0" data-fancybox="">
                                <img src="<?php echo $historia["imagen"]["url"]; ?>" alt="<?php echo $historia["titulo"]; ?>">
                            </a>
                        </div>
                        <div class="ncausa__historias--titulo">
                            <h3><?php echo $historia["titulo"]; ?></h3>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>

    <section class="ncausa__testimonios">
        <div class="container-fluid g-0">
            <div class="row g-0">
                <div class="col-12">
                    <h2>Testimonios</h2>
                    <div class="ncausa__testimonios--slider__paddingleft">
                        <div class="ncausa__testimonios--slider">
                            <?php
                            $testimonios = get_field('testimonios');
                            foreach($testimonios as $testimonio):
                                ?>
                                <div class="ncausa__testimonios--slider__indv">
                                    <div class="ncausa__testimonios--slider__indv--relative">
                                        <div class="ncausa__testimonios--slider__indv__contenido">
                                            <div class="ncausa__testimonios--slider__indv__contenido--cont">
                                                <div>
                                                    <h3><?php echo $testimonio["nombre"]; ?></h3>
                                                    <h4><?php echo $testimonio["edad"]; ?></h4>
                                                    <p><?php echo $testimonio["descripcion"]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ncausa__testimonios--slider__indv__bg">
                                            <img src="<?php echo $testimonio["foto"]["url"]; ?>" alt="<?php echo $testimonio["nombre"]["alt"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ncausa--internas">
    <div class="ncausa--pestanas">
        <div class="ncausa--pestanas__btns">
            <ul>
                <li>
                    <a href="#" class="selected"><span></span> Nuestra causa</a>
                </li>
                <li>
                    <a href="#"><span></span> “Regale una vida”</a>
                </li>
                <li>
                    <a href="#"><span></span> Brigadas de salud</a>
                </li>
                <li>
                    <a href="#"><span></span> Resultados del programa</a>
                </li>
                <li>
                    <a href="#"><span></span> Nuestros aliados</a>
                </li>
            </ul>
        </div>
        <div class="ncausa--pestanas__tabs">
            <div class="ncausa--pestanas__tab mostrar"><!-- TAB 1 -->
                <?php
                $nc_titulo = get_field('nc_titulo');
                $nc_descripcion = get_field('nc_descripcion');
                $nc_imagen = get_field('nc_imagen');
                ?>
                <div class="container-fluid g-0 mb-4">
                    <div class="row align-items-center g-0">
                        <div class="col-12 col-md-5 mb-3 mb-md-0">
                            <div class="position-relative">
                                <div class="home__programas--pestana__burbuja-izq">
                                    <h3><?php echo $nc_titulo; ?></h3>
                                    <p>
                                        <?php echo $nc_descripcion; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 margin-left-2p">
                            <img src="<?php echo $nc_imagen["url"]; ?>" alt="<?php echo $nc_imagen["alt"]; ?>" class="rounded w-100">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="ncausa--pestanas__tab"><!-- TAB 2 -->
                <?php
                    $ruv_bloque1_titulo = get_field('ruv_bloque1_titulo');
                    $ruv_bloque1_descripcion = get_field('ruv_bloque1_descripcion');
                    $ruv_bloque1_imagen = get_field('ruv_bloque1_imagen');
                    $ruv_bloque2_titulo = get_field('ruv_bloque2_titulo');
                    $ruv_bloque2_descripcion = get_field('ruv_bloque2_descripcion');
                    $ruv_bloque2_imagen = get_field('ruv_bloque2_imagen');
                ?>
                <div class="container-fluid g-0 mb-4">
                    <div class="row align-items-center g-0">
                        <div class="col-12 col-md-5 mb-3 mb-md-0">
                            <div class="position-relative">
                                <div class="home__programas--pestana__burbuja-izq">
                                    <h3><?php echo $ruv_bloque1_titulo; ?></h3>
                                    <p>
                                        <?php echo $ruv_bloque1_descripcion; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 margin-left-2p">
                            <img src="<?php echo $ruv_bloque1_imagen["url"]; ?>" alt="<?php echo $ruv_bloque1_imagen["alt"]; ?>" class="rounded w-100">
                        </div>
                    </div>
                </div>

                <div class="container-fluid g-0 mb-4">
                    <div class="row align-items-center g-0">
                        <div class="col-12 col-md-7 mb-3 mb-md-0">
                            <img src="<?php echo $ruv_bloque2_imagen["url"]; ?>" alt="<?php echo $ruv_bloque2_imagen["alt"]; ?>" class="rounded w-100">
                        </div>
                        <div class="col-12 col-md-5 margin-left-2p-inright">
                            <div class="position-relative">
                                <div class="home__programas--pestana__burbuja-der">
                                    <h3><?php echo $ruv_bloque2_titulo; ?></h3>
                                    <p>
                                        <?php echo nl2br($ruv_bloque2_descripcion); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="ncausa--pestanas__tab"><!-- TAB 3 -->
                <?php
                    $bds_titulo_ppal = get_field('bds_titulo_ppal');
                    $bds_imagen_ppal = get_field('bds_imagen_ppal');
                    $bds_bloque1_descripcion = get_field('bds_bloque1_descripcion');
                    $bds_bloque1_imagen = get_field('bds_bloque1_imagen');
                    $bds_bloque2_verde_1 = get_field('bds_bloque2_verde_1');
                    $bds_bloque2_verde_2 = get_field('bds_bloque2_verde_2');
                    $bds_bloque2_verde_3 = get_field('bds_bloque2_verde_3');
                    $bds_bloque3_foto = get_field('bds_bloque3_foto');
                    $bds_bloque3_descripcion = get_field('bds_bloque3_descripcion');
                    $bds_bloque4_imagen = get_field('bds_bloque4_imagen');
                    $bds_bloque4_titulo = get_field('bds_bloque4_titulo');
                    $bds_bloque4_descripcion = get_field('bds_bloque4_descripcion');
                    $bds_bloque4_enlace = get_field('bds_bloque4_enlace');
                    $bds_bloque4_enlace_label = get_field('bds_bloque4_enlace_label');
                ?>
                <div class="container mb-4">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="titulo1"><?php echo $bds_titulo_ppal; ?></h3>
                            <img src="<?php echo $bds_imagen_ppal["url"]; ?>" alt="<?php echo $bds_imagen_ppal["alt"]; ?>">
                        </div>
                    </div>
                </div>

                <div class="container mb-4">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-5 primario">
                            <?php echo $bds_bloque1_descripcion; ?>
                        </div>
                        <div class="col-12 col-md-7">
                            <img src="<?php echo $bds_bloque1_imagen["url"]; ?>" alt="<?php echo $bds_bloque1_imagen["alt"]; ?>" class="radius-20px">
                        </div>
                    </div>
                </div>

                <div class="container mb-4">
                    <div class="row">
                        <div class="col-12 col-md-4 mb-5 mb-md-0">
                            <div class="radius-20px bg-secundario p-5 h-100 d-flex align-items-center text-white">
                                <?php echo $bds_bloque2_verde_1; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-5 mb-md-0">
                            <div class="radius-20px bg-secundario p-5 h-100 d-flex align-items-center text-white">
                                <?php echo $bds_bloque2_verde_2; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-5 mb-md-0">
                            <div class="radius-20px bg-secundario p-5 h-100 d-flex align-items-center text-white">
                                <?php echo $bds_bloque2_verde_3; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mb-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-7">
                            <img src="<?php echo $bds_bloque3_foto["url"]; ?>" alt="<?php echo $bds_bloque3_foto["alt"]; ?>" class="radius-20px">
                        </div>
                        <div class="col-12 col-md-5 primario">
                            <?php echo $bds_bloque3_descripcion; ?>
                        </div>
                    </div>
                </div>

                <div class="container mb-5">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="ncausa--pestanas__eventos">
                                <div class="ncausa--pestanas__eventos-cont">
                                    <div class="ncausa--pestanas__eventos--img">
                                        <img src="<?php echo $bds_bloque4_imagen["url"]; ?>" alt="<?php echo $bds_bloque4_imagen["alt"]; ?>">
                                    </div>
                                    <div class="ncausa--pestanas__eventos--contenido">
                                        <h4><?php echo $bds_bloque4_titulo; ?></h4>
                                        <p><?php echo $bds_bloque4_descripcion; ?></p>
                                        <div class="ncausa--pestanas__eventos--contenido_btn text-center">
                                            <a href="<?php echo $bds_bloque4_enlace; ?>" class="btn btn-descargar1"><?php echo $bds_bloque4_enlace_label; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="ncausa--pestanas__calendario">
                                <?php echo do_shortcode('[my_calendar]'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid g-0 ncausa--pestanas__formulario">
                    <div class="container g-0">
                        <?php echo do_shortcode('[contact-form-7 id="48" title="Formulario - Conoces un niño"]') ?>
                    </div>
                </div>
                    
                    

                
            </div>
            <div class="ncausa--pestanas__tab"><!-- TAB 4 -->
                <?php
                    $rdp_titulo = get_field('rdp_titulo');
                    $rdp_descripcion = get_field('rdp_descripcion');
                    $rdp_imagen = get_field('rdp_imagen');
                    $cifras = get_field('cifras');
                ?>
                <div class="container g-0 mb-4">
                    <div class="row g-0">
                        <div class="col-12">
                            <h2 class="titulo1 text-center"><?php echo $rdp_titulo; ?></h2>
                        </div>
                    </div>
                </div>

                <div class="container mb-4">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-5">
                            <p class="primario">
                                <?php echo $rdp_descripcion; ?>
                            </p>
                        </div>
                        <div class="col-12 col-md-7">
                            <img src="<?php echo $rdp_imagen["url"] ?>" alt="<?php echo $rdp_imagen["alt"]; ?>">
                        </div>
                    </div>
                </div>

                <div class="container g-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="ncausa--pestanas__stats">
                                <?php 
                                foreach($cifras as $cifra):
                                    ?>
                                    <div class="ncausa--pestanas__stat_indv">
                                        <div class="ncausa--pestanas__stat_indv--cont">
                                            <h4><?php echo $cifra["cifra"]; ?></h4>
                                            <p><?php echo $cifra["descripcion"]; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php

                ?>
                <div class="container g-0 mb-4">
                    <div class="row g-0">
                        <div class="col-12">
                            <h2 class="titulo1">Últimas noticias de pacientes y brigadas</h2>
                        </div>
                    </div>
                </div>

                <div class="container g-0 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="ncausa--pestanas__slidernotis">
                                <?php
                                $entradas_args = array(
                                    'category_name' => 'noticias',
                                    'post_status' => 'publish',
                                    'post_type' => array('post'), 
                                    'posts_per_page' => 12,
                                );
                                $aliados = array();
                                $entradas = new WP_Query($entradas_args);
                                if ($entradas->have_posts()) :
                                    while ($entradas->have_posts()) :
                                        $entradas->the_post();
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )
                                        ?>
                                        <div class="ncausa--pestanas__slidernotis--indv">
                                            <div class="ncausa--pestanas__slidernotis--indv__cont">
                                                <div class="ncausa--pestanas__slidernotis--indv__foto">
                                                    <a style="background-color:transparent; border:0;" href="<?php the_permalink() ?>" class="btn btn-secundario">
                                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                                    </a>
                                                </div>
                                                <div class="ncausa--pestanas__slidernotis--indv__texto">
                                                    <h4><?php the_title(); ?></h4>
                                                    <p><?php the_excerpt() ?></p>
                                                </div>
                                                <div class="ncausa--pestanas__slidernotis--indv__btn">
                                                    <a href="<?php the_permalink() ?>" class="btn btn-secundario">Conoce más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="ncausa--pestanas__tab"><!-- TAB 5 -->
                <?php
                $na_titulo = get_field('na_titulo');
                $na_descripcion = get_field('na_descripcion');
                $na_video = get_field('na_video');
                $na_imagen = get_field('na_imagen');
                $na_mapa = get_field('na_mapa');
                $na_mapa_descripcion = get_field('na_mapa_descripcion');
                $na_aliados = get_field('na_aliados');
                ?>
                <div class="container g-0 mb-4">
                    <div class="row g-0">
                        <div class="col-12">
                            <h2 class="titulo1 text-center"><?php echo $na_titulo; ?></h2>

                        </div>
                    </div>
                </div>

                <div class="container-fluid g-0 mb-5">
                    <div class="row align-items-center g-0">
                        <div class="col-12 col-md-6">
                            <div class="position-relative">
                                <div class="home__programas--pestana__burbuja-izq">
                                    <p>
                                        <?php echo nl2br($na_descripcion) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 margin-left-2p">
                            <?php
                            if($na_video == ''):
                                ?>
                                <img src="<?php echo $na_imagen["url"]; ?>" alt="<?php echo $na_imagen["alt"]; ?>" class="rounded w-100">
                                <?php
                            else:
                                ?>
                                <a href="https://www.youtube.com/embed/<?php echo $na_video; ?>?controls=0&rel=0" data-fancybox="">
                                    <img src="<?php echo $na_imagen["url"]; ?>" alt="<?php echo $na_imagen["alt"]; ?>" class="rounded w-100">
                                </a>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container-xl mapa g-0 mb-5 d-none d-md-block">
                    <div class="row g-0 align-items-center">
                        <div class="d-none d-lg-block col-lg-1"></div>
                        <div class="col-6 text-center">
                            <div class="mapa__imagen">
                                <div class="mapa__imagen__points">
                                    <?php
                                    foreach($na_mapa as $mapa):
                                        ?>
                                        <div class="mapa__imagen__points--indv" style="left:<?php echo $mapa["posicion_x"]; ?>%; top:<?php echo $mapa["posicion_y"]; ?>%;"></div>
                                        <?php
                                    endforeach;
                                    ?>
                                </div>
                                <div class="mapa__imagen__cont">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/ncausa/mapa.jpg" alt="Mapa">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 text-center">
                            <div class="mapa__botones">
                                <ul>
                                    <?php
                                    foreach($na_mapa as $mapa):
                                        ?>
                                        <li>
                                            <a href="#"><?php echo $mapa["nombre"]; ?></a>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                            <div class="mapa__texto">
                                <p>
                                    <?php echo nl2br($na_mapa_descripcion); ?>
                                </p>
                            </div>
                        </div>
                        <div class="d-none d-lg-block col-lg-1"></div>
                    </div>
                </div>

                <div class="container g-0 mb-5 aliados-logos">
                    <div class="row g-0">
                        <div class="col-12 text-center">
                            <div class="aliados-logos_cont">
                                <?php
                                foreach($na_aliados as $aliado):
                                    ?>
                                    <div class="aliados-logos--indv">
                                        <?php
                                        if($aliado["enlace"] == ''):
                                            ?>
                                            <img src="<?php echo $aliado["imagen"]["url"]; ?>" alt="<?php echo $aliado["imagen"]["alt"]; ?>" class="w-100">
                                            <?php
                                        else:
                                            ?>
                                            <a href="<?php echo $aliado["enlace"]; ?>" target="<?php echo $aliado["enlace_ventana"]; ?>">
                                                <img src="<?php echo $aliado["imagen"]["url"]; ?>" alt="<?php echo $aliado["imagen"]["alt"]; ?>" class="w-100">
                                            </a>
                                            <?php
                                        endif;
                                        ?>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    </section>

</main>
<?php get_footer(); ?>