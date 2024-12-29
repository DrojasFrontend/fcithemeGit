<?php
/* Template name: Como donar (Template) */
get_header();

// $instalaciones_nuevas = get_field('instalaciones_nuevas');
// $instalaciones_actuales = get_field('instalaciones_actuales');

?>
<main class="cdonar">

    <section class="home__slider">
        <div class="home__slider--cont">


            
            <?php
            $sliders = get_field('slider');
            foreach($sliders as $slider):
                ?>
                <div class="home__slider--indv">
                    <div class="home__slider--indv__contenido">
                        <div>
                            <h2 class="mb-2"><?php echo $slider["titulo_1"]; ?></h2>
                            <h3 class="mb-4"><?php echo $slider["titulo_2"]; ?></h3>
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
    <?php
        $bloque_1_titulo = get_field('bloque_1_titulo');
        $bloque_1_imagen = get_field('bloque_1_imagen');
        $bloque_1_contenido = get_field('bloque_1_contenido');
    ?>
    <section class="cdonar__cuales">
        <div class="container g-0">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-lg-7">
                    <img src="<?php echo $bloque_1_imagen["url"]; ?>" alt="<?php echo $bloque_1_imagen["alt"]; ?>" class="radius-20px">
                </div>
                <div class="col-12 col-lg-5">
                    <div class="cdonar__cuales--contenido">
                        <h2><?php echo $bloque_1_titulo; ?></h2>
                        <?php echo $bloque_1_contenido; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cdonar__hazte">
        <div class="container-fluid g-0 mb-4">
            <div class="row align-items-center g-0">
                <div class="col-12 col-lg-5">
                    <div class="position-relative">
                        <div class="cdonar--pestana__burbuja-izq">
                            <h3>Hazte socio</h3>
                            <p>
                                Con tu aporte mensual como socio desde 40,000 COP, contribuyes a la realización de las brigadas constantemente, así como para cubrir transporte, hospedaje, alimentación, medicinas y servicio de atención médica personalizada a los pacientes trasladados a Bogotá. Todos los meses hay muchos niños y niñas que necesitan nuestro apoyo.
                            </p>
                            <p>
                                Al ser socio recibirás el paquete de bienvenida con un detalle sorpresa y comunicaciones exclusivas para ti, adicional a eso, para informarte sobre nuestras acciones te enviaremos información mensualmente en un boletín de noticias, y cada año te enviaremos un informe anual de gestión. Creemos en la transparencia y en la acción.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 margin-left-2p">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/cdonar/cdonar_hazte.jpg" alt="Hazte socio" class="rounded w-100">
                </div>
            </div>
        </div>

    </section>
    <?php
        $campana_titulo = get_field('campana_titulo');
        $campana_izq = get_field('campana_izq');
        $campana_der = get_field('campana_der');
        $campana_tabla = get_field('campana_tabla');
    ?>
    <section class="cdonar__creacampana">
        <div class="container-fluid g-0">
            <div class="container g-0 py-5">
                <div class="row g-0 mb-4">
                    <div class="col-12">
                        <h2><?php echo $campana_titulo; ?></h2>
                    </div>
                </div>
                <div class="row g-0 mb-0 mb-md-4 align-items-center px-4 px-md-0">
                    <div class="col-12 col-md-6">
                        <?php echo $campana_izq; ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="texto_grande">
                            <p>
                                <?php echo $campana_der; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-12">
                        <div class="cdonar__creacampana--pasos">
                            <?php
                            foreach($campana_tabla as $cadaU):
                                ?>
                                <div class="cdonar__creacampana--pasos_indv">
                                    <div class="cont">
                                        <span><?php echo $cadaU["numero"]; ?></span>
                                        <h3><?php echo $cadaU["titulo"]; ?></h3>
                                        <p>
                                            <?php echo $cadaU["descripcion"]; ?>
                                        </p>
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
    <?php
        $bloque_3_titulo = get_field('bloque_3_titulo');
        $bloque_3_contenido = get_field('bloque_3_contenido');
        $bloque_3_imagen = get_field('bloque_3_imagen');
    ?>
    <section class="cdonar__alianzas">
        <div class="container-fluid g-0 mb-4">
            <div class="row align-items-center g-0">
                <div class="col-12 col-md-7 mb-4 mb-md-0">
                    <img src="<?php echo $bloque_3_imagen["url"]; ?>" alt="<?php echo $bloque_3_imagen["alt"]; ?>" class="radius-20px">
                </div>
                <div class="col-12 col-md-5 margin-left-2p-inright">
                    <div class="position-relative">
                        <div class="home__programas--pestana__burbuja-der">
                            <h3><?php echo $bloque_3_titulo ?></h3>
                            <p>
                                <?php echo nl2br($bloque_3_contenido); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        $bloque_4_titulo = get_field('bloque_4_titulo');
        $bloque_4_descripcion = get_field('bloque_4_descripcion');
        $bloque_4_imagen = get_field('bloque_4_imagen');
    ?>
    <section class="cdonar__hablemos">
        <div class="container-fluid g-0">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-md-6 bg-secundario radius-right20px">
                    <div class="p-5 text-white">
                        <h3><?php echo $bloque_4_titulo; ?></h3>
                        <p>
                            <?php echo nl2br($bloque_4_descripcion) ; ?>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="cdonar__hablemos--corazon">
                        <img src="<?php echo $bloque_4_imagen["url"]; ?>" alt="<?php echo $bloque_4_imagen["alt"]; ?>" class="radius-20px">
                    </div>
                </div>
            </div>
        </div>
    </section>






</main>
<?php get_footer(); ?>