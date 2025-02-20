<?php 

$sitename               = get_bloginfo('name');

$pagina = get_page_by_path('blog-fellow', OBJECT, 'page');
$grupo_barra_lateral    = get_field('grupo_barra_lateral_interna_blog', $pagina->ID);
set_query_var('grupo_barra_lateral', $grupo_barra_lateral);

$autor               = !empty(get_field('autor')) ? get_field('autor') : '';
set_query_var('autor', $autor);


$nombre_doctor       = !empty(get_field('nombre_doctor')) ? get_field('nombre_doctor') : '';
$apellido_doctor          = !empty(get_field('apellido_doctor')) ? get_field('apellido_doctor') : '';

$foto_doctor_home    = !empty(get_field('foto_doctor_home')) ? get_field('foto_doctor_home') : '';
set_query_var('foto_doctor_home', $foto_doctor_home);
$image_id           = attachment_url_to_postid($foto_doctor_home);
$image_src          = wp_get_attachment_image_url($image_id, 'custom-size');
$image_srcset       = wp_get_attachment_image_srcset($image_id, 'custom-size');
$image_info         = wp_get_attachment_image_src($image_id, 'full');
$image_width        = ($image_info) ? $image_info[1] : '';
$image_height       = ($image_info) ? $image_info[2] : '';
$image_alt          = ($image_id) ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : ''; 
$image_title        = ($image_id) ? get_the_title($image_id) : '';

$autor_home          = !empty(get_field('autor_home')) ? get_field('autor_home') : '';
set_query_var('autor_home', $autor_home);

$introduccion        = !empty(get_field('introduccion')) ? get_field('introduccion') : '';
$titulo_metodologia  = !empty(get_field('titulo_metodologia')) ? esc_html(get_field('titulo_metodologia')) : '';
$metodologia         = !empty(get_field('metodologia')) ? get_field('metodologia') : '';
$titulo_resultados   = !empty(get_field('titulo_resultados')) ? esc_html(get_field('titulo_resultados')) : '';
$resultados          = !empty(get_field('resultados')) ? get_field('resultados') : '';
$titulo_discusion    = !empty(get_field('titulo_discusion')) ? esc_html(get_field('titulo_discusion')) : '';
$discusion           = !empty(get_field('discusion')) ? get_field('discusion') : '';
$titulo_conclusion   = !empty(get_field('titulo_conclusion')) ? esc_html(get_field('titulo_conclusion')) : '';
$conclusion          = !empty(get_field('conclusion')) ? get_field('conclusion') : '';
$titulo_bibliografia = !empty(get_field('titulo_bibliografia')) ? esc_html(get_field('titulo_bibliografia')) : '';
$bibliografia        = !empty(get_field('bibliografia')) ? get_field('bibliografia') : '';

get_header();
?>

<!-- CONTENIDO PÁGINA -->
<main>
    <div class="paginaInternaBlog">
        <section class="seccionInternaBlogBanner">
            <div class="seccionInternaBlogBanner__fondo">
                <div class="container--large">
                    <h1 class="heading--48 color--002D72"><?php the_title()?></h1>
                    <div class="seccionInternaBlogBanner__compartir">
                        <p class="heading--15 color--002D72">Compartir en:</p>
                        <div>
                            <?php get_template_part('template-parts/redes/content', 'compartir') ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container--large">
            <div class="seccionGrid">
                <div class="seccionInternaBlogInfo">
                    <?php echo $introduccion ?>
                    <?php if (!empty($titulo_metodologia)) { ?>
                        <h2 class="heading--36 color--002D72"><?php echo $titulo_metodologia ?></h2>
                    <?php } ?>
                    <?php echo $metodologia ?>
                    <?php if (!empty($titulo_resultados)) { ?>
                        <h2 class="heading--36 color--002D72"><?php echo $titulo_resultados ?></h2>
                    <?php } ?>
                    <?php echo $resultados ?>
                    <?php if (!empty($titulo_discusion)) { ?>
                        <h2 class="heading--36 color--002D72"><?php echo $titulo_discusion ?></h2>
                    <?php } ?>
                    <?php echo $discusion ?>

                    <?php if($titulo_conclusion) : ?>
                        <div class="seccionInternaBlogInfo__caja-rosado">
                            <h2 class="heading--36"><?php echo $titulo_conclusion ?></h2>
                            <?php echo $conclusion ?>
                        </div>
                    <?php endif; ?>

                    <div class="seccionBarraLateral__autor seccionBarraLateral__mobile">
                        <figure class="seccionBarraLateral__img">
                            <img width="<?php echo $image_width ?>" height="<?php echo $image_height ?>" src="<?php echo $image_src ?>" data-src="<?php echo $image_src ?>" srcset="<?php echo $image_srcset ?>" data-srcset="<?php echo $image_srcset ?>" alt="<?php echo $autor_home . ' - ' . $sitename; ?> " title="<?php echo $autor_home ?>">
                        </figure>
                        home:
                        <?php echo $nombre_doctor; ?>
                    </div>
                </div>
                <!-- Barra lateral -->
                <?php get_template_part('template-parts/secciones/seccion', 'articulos-barra-lateral') ?>
                <!-- Fin Barra lateral -->
            </div>
        </div>

        <!-- Más de -->
        <div class="seccionInternaBlogInfo__caja-gris">
            <div class="container--large">
                <h2 class="heading--48 seccionInternaBlogMasInfo__h2">Más de <?php echo $nombre_doctor; ?> <?php echo $apellido_doctor ?></h2>
                <div class="seccionInternaBlogMasInfo">
                    <?php 
                        $current_doctor_name = get_field('nombre_doctor', get_the_ID());
                        $args = array(
                            'post_type'      => 'blog_fellows',
                            'posts_per_page' => 100,
                            'orderby'        => 'rand',
                            'meta_query'     => array(
                                array(
                                    'key'     => 'nombre_doctor',
                                    'value'   => $current_doctor_name,
                                    'compare' => '='
                                )
                            )
                        );
                        $blog_fellows_query = new WP_Query($args); 
                        if ($blog_fellows_query->have_posts()) :
                            while ($blog_fellows_query->have_posts()) : $blog_fellows_query->the_post(); 
                            $id = get_the_ID();
                            $link = get_the_permalink();
                            $nombre_doctor      = !empty(get_field('nombre_doctor', $id)) ? esc_html(get_field('nombre_doctor', $id)) : '';
                            $apellido_doctor    = !empty(get_field('apellido_doctor', $id)) ? esc_html(get_field('apellido_doctor', $id)) : '';
                            $fecha              = get_the_date('j F, Y');
                    ?>
                            <article>
                                <a href="<?php echo $link; ?>">
                                    <p class="heading--18 color--002D72"><?php echo $nombre_doctor . ' ' . $apellido_doctor; ?></p>
                                    <h3 class="heading--24 color--002D72"><?php the_title(); ?></h3>
                                    <p class="heading--12 color--717C7D"><?php echo $fecha; ?></p>
                                </a>
                            </article>
                                
                        <?php endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No se encontraron posts con el mismo nombre de doctor.</p>';
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <!-- Fin Más de -->

        <!-- Fin Más de -->

        <?php get_template_part('template-parts/secciones/seccion', 'targetas-lg');  ?>
    </div>
</main>
<!-- FIN CONTENIDO PÁGINA -->

<?php get_footer('new');