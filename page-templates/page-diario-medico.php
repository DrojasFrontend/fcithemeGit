<?php 
/*
    Template Name: Diario médico
*/
$breadcrumbs = get_field('breadcrumbs');


$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
$titulo_logos = get_field('titulo');
$socios = get_field('socios');
get_header(); 

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'diario_medico',
    'orderby' => 'post_date',
    'posts_per_page' => 13,
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
        "descripcion" => get_the_excerpt(),
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
    $pagina = $query;
    wp_reset_postdata();
endif;

?>
<?= get_template_part('template-parts/content'); ?>


<div class="breadcrumbs">
    <p id="breadcrumbs" class="claro">
        <span>
            <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
        </span>
        <?php foreach ($breadcrumbs as $breadcrumb): ?>
            » 
            <span>
                <a style="text-decoration: none!important;" href="<?= $breadcrumb["link_breadcrumb"]?>">
                    <?= $breadcrumb["breadcrumb"]?>
                </a>
            </span>
        <?php endforeach ?>

    </p>
</div>
<main class="pagina">
    <h1 class="px-0"><?= get_the_title() ?></h1>
    <div class="noticiasgeneral">
        <div class="noticiasgeneral__filtro">
            <div class="noticiasgeneral__filtro__int">
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
        <div class="noticiasgeneral__resultados">
            <?php $indicepubli = 0; foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
                <?php if($indicepubli == 0): ?>
                    <div class="noticiasgeneral__cadaresultgrande">
                        <div class="noticiasgeneral__cadaresultgrande__int">
                            <div class="noticiasgeneral__cadaresultgrande__content">
                                <div class="noticiasgeneral__cadaresultgrande__content__content">
                                    <h2>
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <?= $cadaPublicacion["titulo"] ?>
                                        </a>
                                    </h2>
                                    <div class="noticiasgeneral__cadaresultgrande__content__ubicacion">
                                        <?= $cadaPublicacion["descripcion"] ?>
                                    </div>
                                </div>
                                <div class="noticiasgeneral__cadaresultgrande__content__foto">
                                    <?php if($cadaPublicacion["imagen"]): ?>
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="noticiasgeneral__cadaresult">
                        <div class="noticiasgeneral__cadaresult__int">
                            <div class="noticiasgeneral__cadaresult__content">
                                <div class="noticiasgeneral__cadaresult__content__foto">
                                    <?php if($cadaPublicacion["imagen"]): ?>
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                                <div class="noticiasgeneral__cadaresult__content__content">
                                    <h2>
                                        <a href="<?= $cadaPublicacion["enlace"] ?>">
                                            <?= $cadaPublicacion["titulo"] ?>
                                        </a>
                                    </h2>
                                    <div class="noticiasgeneral__cadaresult__content__ubicacion">
                                        <?= $cadaPublicacion["descripcion"] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php $indicepubli++ ; endforeach ?>
        </div>
        <div class="noticiasgeneral__paginacion">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12">
                        <?php get_template_part('template-parts/content', 'paginador'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(is_array($socios)): ?>
            <div class="noticiasgeneral__socios">
                <div class="noticiasgeneral__socios__titulo">
                    <h3><?= $titulo_logos ?></h3>
                </div>
                <div class="noticiasgeneral__socios__contenido">
                    <div class="socios">
                        <?php foreach($socios as $socio): ?>
                            <div class="socios__indv">
                                <img src="<?= $socio["logo"]["url"] ?>" alt="<?= $socio["logo"]["alt"] ?>">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</main>
<?php  get_footer(); ?>