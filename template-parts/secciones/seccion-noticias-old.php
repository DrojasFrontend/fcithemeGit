<?php 
$sitename               = get_bloginfo('name');
$titulo_noticias        = get_query_var('titulo_noticias');
$fondo_noticias         = get_query_var('fondo_noticias');
$numero_entradas        = get_query_var('numero_entradas');
$orden_entradas         = get_query_var('orden_entradas');
$args = array(
        'post_type'      => 'post',
        'posts_per_page' => $numero_entradas,
        'orderby'          => $orden_entradas,
    );
    $noticias_query = new WP_Query($args); 
?>

<section class="seccionNoticias">
    <div class="seccionNoticias__fondo" style="background-color: <?php echo $fondo_noticias; ?>">
        <div class="container--large">
            <p class="heading--14 color--002D72">NOTICIAS</p>
            <div class="seccionNoticias__titulo">
                <h2 class="heading--48 color--002D72"><?php echo $titulo_noticias; ?></h2>
                <a href="https://www.lacardio.org/noticias/" class="boton-v2 boton-v2--blanco-rojo">
                    Ver todas las noticias
                </a>
            </div>
        </div>
        <div class="sectionNoticias__container">
            <div class="seccionNoticias__articulos slickNoticias slickPersonalizado">
                <?php 
                    if ($noticias_query->have_posts()) : 
                    while ($noticias_query->have_posts()) : $noticias_query->the_post();?>
                        <article id="post-<?php the_ID(); ?>" class="seccionNoticias__articulo">
                            <?php 
                            $titulo             = get_the_title();
                            if (has_excerpt()) {
                                $contenido = get_the_excerpt();
                                $contenido_format = substr($contenido, 0, 135) . ' [...]';
                            } else {
                                $contenido_format = ''; 
                            }
                            $link               = get_the_permalink();
                            $fecha              = get_the_date('j F, Y');

                            $post_id            = get_the_ID();
                            $banner_id          = get_post_thumbnail_id($post_id);
                            $banner_src     = wp_get_attachment_image_url($banner_id, 'custom-size');
                            $banner_srcset  = wp_get_attachment_image_srcset($banner_id, 'custom-size');
                            $banner_info    = wp_get_attachment_image_src($banner_id, 'full');
                            $banner_width   = ($banner_info) ? $banner_info[1] : '';
                            $banner_height  = ($banner_info) ? $banner_info[2] : '';
                            $banner_alt     = ($banner_id) ? get_post_meta($banner_id, '_wp_attachment_image_alt', true) : ''; 
                            $banner_title   = ($banner_id) ? get_the_title($banner_id) : '';

                            $grupo_nota = get_field("grupo_nota", $post_id);
                            $grupo_nota_descripcion = !empty($grupo_nota["descripcion"]) ? strip_tags($grupo_nota["descripcion"]) : '';
                            $short_excerpt = generar_extracto_truncado($grupo_nota_descripcion);

                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                $first_category = $categories[0];
                            }

                            ?>
                            <a href="<?php echo $link; ?>" class="seccionNoticias__link" title="<?php echo $titulo; ?>">
                                <figure class="seccionNoticias__img">
                                    <img width="<?php echo $banner_width ?>" height="<?php echo $banner_height ?>" src="<?php echo $banner_src ?>" data-src="<?php echo $banner_src ?>" srcset="<?php echo $banner_srcset ?>" data-srcset="<?php echo $banner_srcset ?>" alt="<?php echo $banner_alt . ' - ' . $sitename; ?> " title="<?php echo $banner_title ?>">
                                </figure>
                                <div class="seccionNoticias__contenido">
                                    <div class="seccionNoticias__info">
                                        <!-- <span class="seccionNoticias__cat color--717C7D"><?php echo $first_category->name; ?></span> -->
                                        <h3 class="heading--24 color--002D72"><?php echo $titulo; ?></h3>
                                        <?php if ($contenido_format) : ?>
                                            <div class="heading--15 color--333"><?php echo $contenido_format; ?></div>
                                        <?php endif ?>

                                        <?php if($short_excerpt) : ?>
                                        <p class="seccionNoticias__excerpt">
                                            <?php echo $short_excerpt; ?>
                                        </p>
                                        <?php endif; ?>

                                        <p class="heading--12"><?php echo $fecha; ?></p>
                                        
                                    </div>
                                    <span class="seccionNoticias__leermas font-sans heading--18 color--E40046">
                                        Leer noticia
                                        <img width="24" height="24" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/ico-chevron-rojo.svg" alt="icono flecha roja" title="icono flecha roja">
                                    </span>
                                </div>
                            </a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No se han encontrado posts.</p>';
                endif; ?>
            </div>

            <a href="https://www.lacardio.org/noticias/" class="boton-v2 boton-v2--blanco-rojo seccionNoticias__mobile">
                Ver todas las noticias
            </a>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    $(document).ready(function () {
        $slickNoticias = $(".slickNoticias");
        slickNoticiasSettings = {
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            infinite: false,
            adaptiveHeight: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]

        }
        $slickNoticias.slick(slickNoticiasSettings);

        $('.seccionNoticias__articulo').closest('div').addClass('seccionNoticias__alto');

        function setEqualHeight() {
            var maxHeight = 0;
            $('.seccionNoticias .slick-slide').each(function() {
            var itemHeight = $(this).outerHeight();
            if (itemHeight > maxHeight) {
                maxHeight = itemHeight;
            }
            });
            $('.seccionNoticias .slick-slide').css('height', maxHeight);
        }

        setEqualHeight();
    })
</script>