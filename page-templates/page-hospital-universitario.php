<?php 
/*
    Template Name: Hospital Universitario
*/

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'educacion_medica',
    'orderby' => 'post_date',
    'posts_per_page' => 6,
    // 'paged' => $paged
);
$entrada_index = 0;
$publicaciones = array();
$paginacion = "";
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;
    $descripcion = get_field('descripcion', $id_publicacion);
    $universidad = get_field('universidad', $id_publicacion);
    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => $descripcion,
        "universidad" => $universidad,
        "enlace" => get_the_permalink($id_publicacion),
    );
    $entrada_index++;
    endwhile;

    if($query->max_num_pages > 1): /* Si hay más de 1 página */
        $paginacion .= '<div class="wp_pagination my-5" id="wp_pagination">';

        if($curpage > 1): /* Si estoy más adelante de la pag 1 */
            $paginacion .= '<a class="first page button" href="' . get_pagenum_link(1) . '">&laquo;</a>';
            $paginacion .= '<a class="previous page button" href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '">&lsaquo;</a>';
        endif;
        
        for ($i = 1; $i <= $query->max_num_pages; $i++)
            $paginacion .= '<a class="' . ($i == $curpage ? 'active ' : '') . 'page button" href="' . get_pagenum_link($i) . '">' . $i . '</a>';

        if($curpage < $query->max_num_pages):
            $paginacion .= '<a class="next page button" href="' . get_pagenum_link(($curpage + 1 <= $query->max_num_pages ? $curpage + 1 : $query->max_num_pages)) . '">&rsaquo;</a>';
            $paginacion .= '<a class="last page button" href="' . get_pagenum_link($query->max_num_pages) . '">&raquo;</a>';
        endif;

        $paginacion .=  '</div>';
    endif;

    wp_reset_postdata();
endif;

get_header(); ?>
<?php echo get_template_part('template-parts/content'); ?>
<main class="hospi_universitario">
    <div class="container g-0">
        <div class="row g-0">
            <div class="col-12 col-lg-9">
                <div class="hospi_universitario__columna">
                    <?php the_content() ?>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="hospi_universitario__resultados">
                    <div class="hospi_universitario__resultados--entradas">
                        <div class="hospi_universitario__resultados--entradas__int">
                            <h2>Nuestros cursos</h2>
                            <?php foreach($publicaciones as $id_publicacion => $cadaPublicacion): ?>
                                <div class="entradaIndv">
                                    <a href="<?= $cadaPublicacion["enlace"] ?>">
                                        <h3><?= $cadaPublicacion["titulo"] ?></h3>
                                        <p><?= $cadaPublicacion["descripcion"] ?></p>
                                        <h4><?= $cadaPublicacion["universidad"] ?></h4>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php  get_footer(); ?>
