<?php 
/*
    Template Name: Convocatorias
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'convocatorias',
    'orderby' => 'post_date',
    'posts_per_page' => 12,
    'paged' => $paged
);
$entrada_index = 0;
$publicaciones = array();
$paginacion = "";
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;
    $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);
    $ubicacion = get_field('ubicacion', $id_publicacion);
    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => get_field('descripcion', $id_publicacion),
        "fecha_del_evento" => $fecha_del_evento,
        "enlace" => get_the_permalink($id_publicacion),
        "ubicacion" => $ubicacion,
        "imagen" => $imagen,
        "fecha" => get_the_date("d M"),
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

?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
    <h1><img src="<?= $foto_destacada ?>" alt="<?= $titulo ?>"></h1>
    <?= $descripcion ?>
    <div class="educacontigeneral">
        <div class="educacontigeneral__filtro">
            <div class="educacontigeneral__filtro__int">
                <div>
                    Busca por palabra clave: 
                </div>
                <div>
                    <input type="text" name="" id="" class="form-control" placeholder="Buscar">
                </div>
                <div>
                    <input type="date" name="" id="" class="form-control" placeholder="Fecha">
                </div>
                <div>
                    <select name="" id="" class="form-select">
                        <option value="">Categoría</option>
                        <option value="1">Categoría 1</option>
                        <option value="2">Categoría 2</option>
                        <option value="3">Categoría 3</option>
                    </select>
                </div>
                <div>
                    <button class="btn btn_limpiar">Limpiar</button>
                </div>
            </div>
        </div>
        <div class="educacontigeneral__resultados">
            <?php foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
            <?php for($i=0; $i<= 16; $i++): ?>
            <div class="educacontigeneral__cadaresult">
                <div class="educacontigeneral__cadaresult__int">
                    <div class="educacontigeneral__cadaresult__content">
                        <div class="educacontigeneral__cadaresult__content__foto">
                            <a href="<?= $cadaPublicacion["enlace"] ?>">
                                <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                            </a>
                        </div>
                        <div class="educacontigeneral__cadaresult__content__content">
                            <div class="educacontigeneral__cadaresult__content__fecha">
                                <div class="icono">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/fci/calendar2.svg" alt="Fecha">
                                </div>
                                <div class="fecha">
                                    <?= $cadaPublicacion["fecha_del_evento"] ?>
                                </div>
                            </div>
                            <h2><?= $cadaPublicacion["titulo"] ?></h2>
                            <div class="educacontigeneral__cadaresult__content__ubicacion">
                                <?= $cadaPublicacion["ubicacion"] ?>
                            </div>
                            <div class="educacontigeneral__cadaresult__content__cta">
                                <a href="<?= $cadaPublicacion["enlace"] ?>" class="btn btn_vermas">Ver evento</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor ?>
            <?php endforeach ?>
        </div>
        <div class="educacontigeneral__paginacion">
            <?= $paginacion ?>
        </div>
    </div>
</main>
<?php  get_footer(); ?>
