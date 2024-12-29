<?php 
/*
    Template Name: Unidad de Síntesis y Transferencia
*/

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'unidad_sintesis',
    'orderby' => 'post_date',
    'posts_per_page' => 12,
    'paged' => $paged
);
/* Filtro */
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $args['s'] = $_GET['search'];
    $args['post_title'] = $_GET['search'];
}

if (isset($_GET['type_categorias']) && !empty($_GET['type_categorias']) || 
    isset($_GET['type_tematicas']) && !empty($_GET['type_tematicas'])) {
  $args['meta_query'] = array(
    'relation' => 'AND',
  );
  if (isset($_GET['type_categorias']) && !empty($_GET['type_categorias'])) {
    $args['meta_query'][] = array(
		'key' => 'categorias',
      'value' => $_GET['type_categorias'],
      'compare' => 'LIKE',
    );
  }
  if (isset($_GET['type_tematicas']) && !empty($_GET['type_tematicas'])) {
    $args['meta_query'][] = array(
		'key' => 'tematicas',
      'value' => $_GET['type_tematicas'],
      'compare' => 'LIKE',
    );
  }
}

$entrada_index = 0;
$publicaciones = array();
$paginacion = ""; 
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $imagen = get_the_post_thumbnail_url($post->ID, array(700, 460));
    $id_publicacion = $post->ID;
    $autor = get_field('autor', $id_publicacion);
    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "descripcion" => get_the_excerpt($id_publicacion),
        "imagen" => $imagen,
        "autor" => $autor,
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
    $pagina = $query;
endif;

get_header(); ?>
<?php echo get_template_part('template-parts/content'); ?>
<main class="sintesis_unidad">
    <?php the_content(); ?>
    <div class="container g-0">
        <div class="row g-0">
            <div class="col-12">
                <div class="sintesis_unidad__resultados">
                    <div class="sintesis_unidad__resultados--filtros">
                        <form  id="filter-form"  action="" method="get" class="form-clas" style="  width: 100%;
  justify-content: space-between;
  display: flex;" action="<?php the_permalink(); ?>
">
                    <div class="sintesis_unidad__resultados--filtros__int">                   
                        <div>
                            <input type="text" name="search" id="" class="form-control" placeholder="Busca por palabra clave">
                        </div>
                        <div>
                            <select id="type_categorias" name="type_categorias" class="form-select">
							<option value="<?php  echo !empty($_GET['type_categorias']) ? $_GET['type_categorias'] : '';  ?>"><?php  echo !empty($_GET['type_categorias']) ? $_GET['type_categorias'] : 'Categorias';  ?></option>
							<?php 
							$opciones_categorias_eventos = get_field_choices('categorias');
							foreach ($opciones_categorias_eventos as $opcion) {
								?>
								<option value="<?= $opcion ?>"><?= $opcion ?></option>
								<?php
							}
							?>
						</select>
                        </div>
						<div>
                            <select id="type_tematicas" name="type_tematicas" class="form-select">
							<option value="<?php  echo !empty($_GET['type_tematicas']) ? $_GET['type_tematicas'] : '';  ?>"><?php  echo !empty($_GET['type_tematicas']) ? $_GET['type_tematicas'] : 'Tematicas';  ?></option>
							<?php 
							$opciones_tematicas_eventos = get_field_choices('tematicas');
							foreach ($opciones_tematicas_eventos as $opcion) {
								?>
								<option value="<?= $opcion ?>"><?= $opcion ?></option>
								<?php
							}
							?>
						</select>
                        </div>
                        <div>
							<input type="submit" value="Búsqueda" class="btn btn_limpiar">
                            <a href="/unidad-de-sintesis-y-transferencia/" class="btn btn_limpiar" id="limpiar-btn">Limpiar</a>
                        </div>
                    </div>
</form>
                    </div>
                    <div class="sintesis_unidad__resultados--entradas">
                        <div class="sintesis_unidad__resultados--entradas__int">
                            <?php foreach($publicaciones as $id_publicacion => $cadaPublicacion): ?>
                                <div class="entradaIndv">
                                    <div class="entradaIndv__int">
                                        <div class="entradaIndv__contenido order-2 order-md-1">
                                            <div class="entradaIndv__contenido__int">
                                                <h2>
                                                    <a href="<?= $cadaPublicacion["enlace"] ?>"><?= $cadaPublicacion["titulo"] ?></a>
                                                </h2>
                                                <div class="entradaIndv__contenido__descrip">
                                                    <p><?= $cadaPublicacion["descripcion"] ?></p>
                                                </div>
                                                <div class="entradaIndv__contenido__autor">
                                                    <p class="mb-0"><?= $cadaPublicacion["autor"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="entradaIndv__imagen order-1 order-md-2">
                                            <a href="<?= $cadaPublicacion["enlace"] ?>"><img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</main>

<?php  get_footer(); ?>
