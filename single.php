<?php 
$sitename = get_bloginfo('name');

$grupo_nota             = get_field('grupo_nota');
$descripcion_nota       = isset($grupo_nota['descripcion']) ? $grupo_nota['descripcion'] : '';
$foto_nota              = isset($grupo_nota['foto']) ? $grupo_nota['foto'] : '';

$grupo_informacion      = get_field('grupo_informacion');
$items                  = isset($grupo_informacion['items']) ? $grupo_informacion['items'] : [];

$grupo_conclucion       = get_field('grupo_conclucion');
$titulo_conclucion      = isset($grupo_conclucion['titulo']) ? $grupo_conclucion['titulo'] : '';
$descripcion_conclucion = isset($grupo_conclucion['descripcion']) ? $grupo_conclucion['descripcion'] : '';


$autor       = isset($grupo_nota['descripcion']) ? $grupo_nota['descripcion'] : '';

get_header();
?>

<!-- INICIO CONTENIDO -->
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
    $fecha              = get_the_date('j F, Y');
    ?>
        <article id="post-<?php the_ID(); ?>" aria-label="<?php the_title(); ?>">
            <!-- Header -->
            <header class="seccionInternaEntradaHeader__titulo">
                <div class="container--large">
                    <h1 class="heading--48 color--002D72"><?php the_title(); ?></h1>
                </div>
            </header>
            
            <div class="seccionInternaEntradaBanner">
                <div class="seccionInternaEntradaBanner__img">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
                </div>
                <div class="seccionInternaEntradaBanner__info">

                    <span class="seccionInternaEntradaBanner__cat">
                        <?php $categories = get_the_category();
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    echo esc_html($category->name);
                                }
                            } 
                        ?>
                    </span>
                    <p class="heading--14 color--fff">Escrito por:</p>
                    
                    <?php if (get_the_author_meta('first_name') || get_the_author_meta('last_name')) { ?>
                        <h2 class="heading--30 color--fff"><?php echo get_the_author_meta('first_name') . ' ' .get_the_author_meta('last_name') ?></h2>
                    <?php } ?>

                    <p class="heading--12 color--fff fecha"><?php echo $fecha; ?></p>

                    <div class="seccionInternaEntradaBanner__compartir">
                        <p class="heading--14 color--fff">Compartir en:</p>
                        
                        <?php echo do_shortcode('[addtoany]') ?>
                    </div>
                </div>
            </div>
            <!-- Fin Header -->

            <!-- Banner -->
            <?php get_template_part('template-parts/secciones/seccion', 'noticia-banner') ?>
            <!-- Fin Banner -->

            <div class="container--large">
                <div class="seccionInternaEntradaGrid">
                    <!-- Contenido -->
                    <section>
                        <div class="heading--15 color--333">
                            <?php the_content(); ?>
                        </div>

                        <?php if (!empty($descripcion_nota)) : ?>
                            <!-- Nota -->
                            <section class="seccionInternaEntradaNota">
                                <div class="seccionInternaEntradaNota__box">
                                    <div class="heading--26">
                                        <?php echo $descripcion_nota; ?>
                                    </div>
                                    <div class="seccionInternaEntradaNota__foto">
                                        <figure>
                                            <img src="<?php echo esc_url($foto_nota);?>" alt="">
                                        </figure>
                                        <p class="heading--15 color--333">
                                            <?php
                                                $autor = get_the_author();
                                                echo esc_html($autor);
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </section>
                            <!-- Fin Nota -->
                        <?php endif; ?>

                    </section>
                    <!-- Fin Contenido -->

                    <!-- SideBard -->
                    <div class="seccionInternaEntradaGrid__sidebar">
                        <?php
                            $tipo_entrada = 'post';
                            $titulo_entrada = 'Más buscados';
                            set_query_var('tipo_entrada', $tipo_entrada);
                            set_query_var('titulo_entrada', $titulo_entrada);
                            get_template_part('template-parts/secciones/seccion', 'articulos-recomendados') 
                        ?>
                        <section class="seccionInternaEntradaGrid__conoce">
                            <figure>
                                <img width="282" height="220" src="<?php echo IMG_BASE . 'conoce-nuestros-servicios.png'?>" alt="Conoce mas" title="Conoce mas">
                            </figure>
                            <div class="seccionInternaEntradaGrid__conoce-info">
                                <h2 class="heading--20 color--002D72">Conoce nuestros servicios de cardiología en LaCardio</h2>
                                <a href="" class="boton-v2 boton-v2--blanco-rojo">Conoce más</a>
                            </div>
                        </section>
                    </div>
                    <!-- Fin SideBard -->
                </div>
            </div>
            
            <?php if (!empty($items)) : ?>
                <!-- Información -->
                <section class="seccionInternaEntradaGrid_info">
                    <?php foreach ($items as $key => $item) { 
                        $titulo         = isset($item['titulo']) ? $item['titulo'] : '';
                        $descripcion    = isset($item['descripcion']) ? $item['descripcion'] : '';
                        $fondo          = isset($item['fondo']) ? $item['fondo'] : '';

                        $imagen_id      = isset($item['imagen']['ID']) ? $item['imagen']['ID'] : '';
                        $imagen_src     = wp_get_attachment_image_url($imagen_id, 'custom-size');
                        $imagen_srcset  = wp_get_attachment_image_srcset($imagen_id, 'custom-size');
                        $imagen_info    = wp_get_attachment_image_src($imagen_id, 'full');
                        $imagen_width   = ($imagen_info) ? $imagen_info[1] : '';
                        $imagen_height  = ($imagen_info) ? $imagen_info[2] : '';
                        $imagen_alt     = ($imagen_id) ? get_post_meta($imagen_id, '_wp_attachment_image_alt', true) : ''; 
                        $imagen_title   = ($imagen_id) ? get_the_title($imagen_id) : '';

                    ?>
                        <div style="background-color: <?php echo esc_html($fondo); ?>">
                            <div class="container--large">
                                <div class="seccionInternaEntradaGrid_info-wrapper">
                                    <h2 class="heading--26 color--333"><?php echo esc_html($titulo); ?></h2>
                                    <div class="heading--15 color--333">
                                        <?php echo $descripcion; ?>
                                    </div>
                                    <?php if ($imagen_id) : ?>
                                        <figure>
                                            <img width="<?php echo esc_attr($imagen_width); ?>" height="<?php echo esc_attr($imagen_height); ?>" src="<?php echo esc_url($imagen_src); ?>" data-src="<?php echo esc_url($imagen_src); ?>" srcset="<?php echo esc_attr($imagen_srcset); ?>" data-srcset="<?php echo esc_attr($imagen_srcset); ?>" alt="<?php echo esc_attr($imagen_alt . ' - ' . $sitename); ?>" title="<?php echo esc_attr($imagen_title); ?>">
                                        </figure>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </section>
                <!-- Fin Información -->
            <?php endif; ?>

            <?php if (!empty($titulo_conclucion)) : ?>
                <!-- Conclución -->
                <section class="seccionInternaEntradaConclucion">
                    <div class="container--large">
                        <div class="seccionInternaEntradaConclucion__box">
                            <h2 class="heading--36">
                                <?php echo esc_html($titulo_conclucion)?>
                            </h2>
                            <div class="heading--15 color--333">
                                <?php echo $descripcion_conclucion; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Fin Conclución -->
            <?php endif; ?>


            <!-- Noticias -->
            <?php 
                set_query_var('titulo_noticias', 'También te puede interesar');
                set_query_var('fondo_noticias', 'rgb(255 255 255 / 0%)');
                set_query_var('numero_entradas', 9);
                get_template_part('template-parts/secciones/seccion', 'noticias');
            ?>
            <!-- Fin Noticias -->

        </article>
    <?php endwhile; else : ?>
        <p>No se encontraron entradas.</p>
    <?php endif; ?>
</main>
<!-- FIN CONTENIDO -->

<?php get_footer(); ?>