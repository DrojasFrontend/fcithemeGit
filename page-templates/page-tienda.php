<?php
/* Template name: Tienda (Template) */
get_header();

$sliders = get_field('slider');
?>
<main class="tienda">
    
    <section class="home__slider">
        <div class="home__slider--cont">

            <?php
            foreach($sliders as $slider):
                ?>
                <div class="home__slider--indv">
                    <div class="home__slider--indv__contenido">
                        <div>
                            <img src="<?php echo $slider["imagen_1"]["url"]; ?>" alt="<?php echo $slider["imagen_1"]["alt"]; ?>">
                        </div>
                    </div>
                    <div class="home__slider--indv__bg">
                        <img src="<?php echo $slider["imagen_2"]["url"]; ?>" alt="<?php echo $slider["imagen_2"]["alt"]; ?>">
                    </div>
                </div>     
                <?php
            endforeach;
            ?>

        </div>
    </section>

    <section class="cdonar__hazte mb-5">
        <?php
            $bloque_1_titulo_1 = get_field('bloque_1_titulo_1');
            $bloque_1_descripcion_1 = get_field('bloque_1_descripcion_1');
            $bloque_1_titulo_2 = get_field('bloque_1_titulo_2');
            $bloque_1_descripcion_2 = get_field('bloque_1_descripcion_2');
            $bloque_1_imagen = get_field('bloque_1_imagen');
        ?>
        <div class="container-fluid g-0 mb-4">
            <div class="row align-items-center g-0">
                <div class="col-12 col-lg-5">
                    <div class="position-relative">
                        <div class="cdonar--pestana__burbuja-izq">
                            <h3><?php echo $bloque_1_titulo_1; ?></h3>
                            <p>
                                <?php echo $bloque_1_descripcion_1; ?>
                            </p>
                            <h3><?php echo $bloque_1_titulo_2; ?></h3>
                            <p>
                                <?php echo $bloque_1_descripcion_2; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 margin-left-2p">
                    <img src="<?php echo $bloque_1_imagen["url"]; ?>" alt="<?php echo $bloque_1_imagen["alt"]; ?>" class="rounded w-100">
                </div>
            </div>
        </div>

    </section>
    <?php
        $bloque_2_titulo_1 = get_field('bloque_2_titulo_1');
        $bloque_2_descripcion_1 = get_field('bloque_2_descripcion_1');
        $bloque_2_titulo_2 = get_field('bloque_2_titulo_2');
        $bloque_2_descripcion_2 = get_field('bloque_2_descripcion_2');
        $bloque_2_imagen = get_field('bloque_2_imagen');
    ?>
    <section class="tienda__quesehace mb-5">
        <div class="container g-0">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-lg-7">
                    <div class="tienda__quesehace--img">
                        <img src="<?php echo $bloque_2_imagen["url"]; ?>" alt="<?php echo $bloque_2_imagen["alt"]; ?>" class="w-100">
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="tienda__quesehace--contenido">
                        <h3><?php echo $bloque_2_titulo_1; ?></h3>
                        <p><?php echo $bloque_2_descripcion_1; ?></p>
                        <h3><?php echo $bloque_2_titulo_2; ?></h3>
                        <p><?php echo $bloque_2_descripcion_2; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tienda__puntosfisicos py-5">
        <div class="container-fluid g-0">
            <div class="container g-0">
                <div class="row g-0">
                    <div class="col-12">
                        <h2>Información de puntos físicos</h2>
                    </div>
                </div>
                <div class="row g-0 align-items-center px-4 px-md-4">

                    <?php
                    $puntos_fisicos = get_field('puntos_fisicos');
                    $indice = 1;
                    foreach($puntos_fisicos as $punto):
                        ?>
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <div class="tienda__puntosfisicos--indv">
                                <div class="numero">
                                    <span><?php echo $indice; ?></span>
                                </div>
                                <div class="direccion">
                                    <h4><?php echo $punto["nombre"]; ?></h4>
                                    <p><?php echo $punto["direccion"]; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $indice++;
                    endforeach;
                    ?>



                </div>
            </div>
        </div>
    </section>

    <section class="tienda__productos py-5">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12">
                    <h2>Catálogo de productos</h2>
                    <div class="tienda__productos--slider">
                        <?php
                        $productos = get_field('productos');
                        foreach($productos as $producto):
                            ?>
                            <div class="tienda__productos--indv">
                                <div class="imagen">
                                    <img src="<?php echo $producto["imagen"]["url"]; ?>" alt="<?php echo $producto["nombre"]; ?>" class="w-100">
                                </div>
                                <div class="contenido">
                                    <p><?php echo $producto["nombre"]; ?></p>
                                    <h3>$<?php echo convertirEnMoneda($producto["precio"]); ?> </h3>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        $bloque_3_descripcion = get_field('bloque_3_descripcion');
        $bloque_3_imagen = get_field('bloque_3_imagen');
        $bloque_3_enlace = get_field('bloque_3_enlace');
        $bloque_3_enlace_ventana = get_field('bloque_3_enlace_ventana');
        $bloque_3_enlace_label = get_field('bloque_3_enlace_label');
    ?>
    <section class="tienda__quesehace mb-5">
        <div class="container g-0">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-md-5 order-2 order-md-1">
                    <div class="tienda__quesehace--contenido">
                        <p>
                            <?php echo $bloque_3_descripcion; ?>
                        </p>
                        <?php
                        if($bloque_3_enlace != ''):
                            ?>
                            <div class="boton">
                                <a href="<?php echo $bloque_3_enlace; ?>" target="<?php echo $bloque_3_enlace_ventana; ?>" class="btn btn-secundario"><?php echo $bloque_3_enlace_label; ?></a>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-7 order-1 order-md-2">
                    <div class="tienda__quesehace--img">
                        <img src="<?php echo $bloque_3_imagen["url"]; ?>" alt="<?php echo $bloque_3_imagen["alt"]; ?>" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>






</main>
<?php get_footer(); ?>