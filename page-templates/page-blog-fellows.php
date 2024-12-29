<?php 
/*
    Template Name: Blog Fellows
*/
$titulo = get_the_title();
$titulo = "Últimos artículos";
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'blog_fellows',
    'orderby' => 'post_date',
    'posts_per_page' => 12,
    'paged' => $paged
);
$entrada_index = 0;
$publicaciones = array();
$paginacion = "";
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    
    $id_publicacion = $post->ID;

    $foto_doctor_home = get_field('foto_doctor_home', $id_publicacion);
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $imagen = ($imagen != "") ? $imagen : $foto_doctor_home;

    $introduccion = get_field('introduccion', $id_publicacion);
    $descripcion_post = get_the_excerpt($id_publicacion);
    $descripcion_post = ($descripcion_post != "") ? $descripcion_post : excerpt_personalizado(get_the_content());
    $descripcion_post = ($descripcion_post != "") ? $descripcion_post : excerpt_personalizado($introduccion);

    $publicaciones[$id_publicacion] = array(
        "indice" => $entrada_index,
        "titulo" => $post->post_title,
        "enlace" => get_the_permalink($id_publicacion),
        "descripcion" => $descripcion_post,
        "imagen" => $imagen,
        "foto_doctor_home" => $foto_doctor_home,
        "fecha" => get_the_date("d M"),
        "profesionales" => array(
            "id" => "",
            "slug" => "",
            "nombre" => "",
        ),
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
    $pagina = $query;
endif;

?>
<?php echo get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
    <h1><?= $titulo ?></h1>
    <?= $descripcion ?>
    <div class="fellows_blog">
        <div class="fellows_blog__principal">
            <?php foreach($publicaciones as $cadaPublicacion): ?>
                <?php if($cadaPublicacion["indice"] < 3): ?>
                <div class="fellows_blog__principal__cadauno">
                    <div class="fellows_blog__principal__cadauno__int">
                        <div class="fellows_blog__principal__cadauno__content">
                            <div class="fellows_blog__principal__cadauno__content__int">
                                <h2><a href="<?= $cadaPublicacion["enlace"] ?>"><?= $cadaPublicacion["titulo"] ?></a></h2>
                                <?php if($cadaPublicacion["indice"] == 0): ?>
                                <div class="fellows_blog__principal__cadauno__content__descripcion">
                                    <p><?= $cadaPublicacion["descripcion"] ?></p>
                                </div>
                                <?php endif ?>
                                <div class="fellows_blog__principal__cadauno__content__meta">
                                    <div class="fellows_blog__principal__cadauno__content__autor">
                                        <p><?= $cadaPublicacion["profesionales"]["nombre"] ?></p>
                                    </div>
                                    <div class="fellows_blog__principal__cadauno__content__cta">
                                        <p>
                                            <a href="<?= $cadaPublicacion["enlace"] ?>" class="btn btn_leer">Leer</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="fellows_blog__principal__cadauno__bg">
                            <div class="fellows_blog__principal__cadauno__bg__sombra"></div>
                            <div class="fellows_blog__principal__cadauno__bg__img">
                                <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="fellows_blog__filtro">
            <div class="fellows_blog__filtro__int">
                <div>
                    Busca por <strong>especialidad, profesional o temática</strong>: 
                </div>
                <div>
                    <input type="text" name="" id="" class="form-control" placeholder="Buscar">
                </div>
                
            </div>
        </div>
        <div class="fellows_blog__resultados">
            <?php foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
                <?php if($cadaPublicacion["indice"] >= 3): ?>
                <div class="fellows_blog__cadaresult">
                    <div class="fellows_blog__cadaresult__int">
                        <div class="fellows_blog__cadaresult__img">
                            <img src="<?= $cadaPublicacion["foto_doctor_home"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                        </div>
                        <div class="fellows_blog__cadaresult__content">
                            <div class="fellows_blog__cadaresult__content__int">
                                <h2><?= $cadaPublicacion["titulo"] ?></h2>
                                <div class="fellows_blog__cadaresult__content__descrip">
                                    <p><?= $cadaPublicacion["descripcion"] ?></p>
                                </div>
                                <div class="fellows_blog__cadaresult__content__cta">
                                    <a href="<?= $cadaPublicacion["enlace"] ?>" class="btn btn_leer">Leer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="fellows_blog__paginacion">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12">
                        <?php get_template_part('template-parts/content', 'paginador'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php  get_footer(); ?>
