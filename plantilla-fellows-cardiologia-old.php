<?php 
/* 
Template Name: Plantilla Fellows cardiologia
*/

$breadcrumbs = get_field('breadcrumbs');

$sitename                       = get_bloginfo('name');
$mostrar_banner                 = get_field('mostrar_banner');
$grupo_banner                   = get_field('grupo_banner');
set_query_var('sitename', $sitename);
set_query_var('grupo_banner', $grupo_banner);

$mostrar_articulo_destacado     =  get_field('mostrar_articulo_destacado');
$mostrar_articulos              =  get_field('mostrar_articulos');

$mostrar_barra_lateral          =  get_field('mostrar_barra_lateral');
$grupo_barra_lateral            =  get_field('grupo_barra_lateral');
set_query_var('grupo_barra_lateral', $grupo_barra_lateral);

get_header();
?>

<?php if (isset($_GET['s']) || isset($_GET['author_name']) || isset($_GET['order'])): ?>
    <style>
        .seccionArticulosBuscados__fondo, .seccionArticulos__targeta {
            display: none;
        }
    </style>
<?php endif; ?>


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

<!-- CONTENIDO PÁGINA -->
<main>
    <!-- Banner -->
    <?php if($mostrar_banner) { ?>
        <?php get_template_part('template-parts/secciones/seccion', 'banner-texto-imagen') ?>
    <?php } ?>
    <!-- Fin Banner -->

    <div class="seccionBuscar">
        <div class="container--large">
            <div class="seccionBuscar__title">
                <h2 class="heading--24 color--263956">Agrega filtros a tu búsqueda</h2>
            </div>
            <form method="GET" action="">
                <div class="seccionBuscar__grid">
                   <select name="author_name" id="author_name">
						<option value="">Filtrar por autor</option>
						<?php
						// Obtener todos los autores (nombre_doctor y apellido_doctor) desde el post type 'blog_fellows'
						$doctores = get_posts([
							'post_type' => 'blog_fellows',
							'posts_per_page' => -1,
							'meta_key' => 'nombre_doctor',
							'meta_value' => '',
							'meta_compare' => '!=',
							'fields' => 'ids'
						]);

						$autores = [];
						foreach ($doctores as $post_id) {
							$nombre_doctor = get_field('nombre_doctor', $post_id);
							$apellido_doctor = get_field('apellido_doctor', $post_id);
							$nombre_completo = $nombre_doctor . ' ' . $apellido_doctor;

							if (!in_array($nombre_doctor, $autores)) {
								$autores[] = $nombre_doctor;
								echo '<option value="' . esc_attr($nombre_doctor) . '">' . esc_html($nombre_completo) . '</option>';
							}
						}
						?>
					</select>
                    <select name="order" id="order">
                        <option value="">Ordenar</option>
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                        <option value="last_week">Última semana</option>
                    </select>
                    <input type="text" name="s" placeholder="Buscar">
                </div>
            </form>
            <div class="filtros-aplicados-contenedor">
                <div class="filtros-aplicados"></div>
                <button type="reset" class="borrar-filtros" onclick="window.location.href=window.location.pathname" style="display: none">Borrar filtros</button>
            </div>
        </div>
    </div>
    <!-- Articulos más buscados -->
    <?php if($mostrar_articulos) { ?>
        <?php get_template_part('template-parts/secciones/seccion', 'articulos-buscados-estilo-1') ?>
    <?php } ?>
    <!-- Fin Articulos más buscados -->

    <div class="seccionGrid">
        <div class="container--large">
            <div class="seccionGrid__grid">
            <div id="filtros-loader" class="filtros-loader" style="display: none;"><p>Cargando...</p></div>
                <div class="seccionArticulos">
                    <?php if($mostrar_articulo_destacado) { ?>
                    <!-- Targeta articulo destacado -->
                        <?php get_template_part('template-parts/secciones/seccion', 'targeta-articulo-destacado-lg') ?>
                    <!-- Fin targeta articulo destacado -->
                    <?php } ?>
        
                    <!-- Últimos articulos -->
                        <?php get_template_part('template-parts/secciones/seccion', 'articulos-buscados-estilo-2') ?>
                    <!-- Fin últimos articulos -->
                </div>
    
                <?php if($mostrar_barra_lateral) { ?>
                    <!-- Barra lateral -->
                    <?php get_template_part('template-parts/secciones/seccion', 'articulos-barra-lateral') ?>
                    <!-- fin Barra lateral -->
                <?php } ?>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/secciones/seccion', 'targetas-lg'); ?>
	
	
	
</main>
<!-- FIN CONTENIDO PÁGINA -->

<?php get_footer();