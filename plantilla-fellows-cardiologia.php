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
        <div class="seccionBuscarTop">
            <div class="container--large">
                <div class="seccionBuscar__title">
                    <h2 class="heading--24 color--263956">Agrega filtros a tu búsqueda</h2>
                </div>
            </div>
        </div>

        <div class="container--large">
            <div>
                <div class="seccionBuscar__grid">
                   <select name="author_name" id="author_name">
						<option value="">Filtrar por autor</option>
						<?php
						
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

							if (!isset($autores[$nombre_doctor])) {
								$autores[$nombre_doctor] = $nombre_completo;
							}
						}

						
						asort($autores);

						
						foreach ($autores as $nombre_doctor => $nombre_completo) {
							echo '<option value="' . esc_attr($nombre_doctor) . '">' . esc_html($nombre_completo) . '</option>';
						}
						?>

					</select>
                    <select name="order" id="order">
                        <option value="">Ordenar</option>
                        <option value="ASC">Ascendente</option>
                        <option value="DESC">Descendente</option>
                        <option value="last_week">Última semana</option>
                    </select>
                    <div style="display: flex;">
                        <input type="text" name="s" placeholder="Buscar">
                        <button onclick="setTimeout(realizarBusqueda, 300);" type="submit" class="boton-v2 boton-v2--rojo-rojo botonBuscarFellows">
                            <!-- Icono SVG -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.7094 20.2914L17.9994 16.6114C19.4395 14.8158 20.1369 12.5367 19.9482 10.2427C19.7595 7.94867 18.6991 5.81415 16.9849 4.27801C15.2708 2.74188 13.0332 1.92088 10.7323 1.98384C8.43145 2.0468 6.24214 2.98893 4.61456 4.61651C2.98698 6.24409 2.04485 8.43341 1.98189 10.7343C1.91893 13.0352 2.73992 15.2727 4.27606 16.9869C5.8122 18.701 7.94672 19.7615 10.2407 19.9502C12.5347 20.1389 14.8138 19.4415 16.6094 18.0014L20.2894 21.6814C20.3824 21.7751 20.493 21.8495 20.6148 21.9003C20.7367 21.951 20.8674 21.9772 20.9994 21.9772C21.1314 21.9772 21.2621 21.951 21.384 21.9003C21.5059 21.8495 21.6165 21.7751 21.7094 21.6814C21.8897 21.4949 21.9904 21.2457 21.9904 20.9864C21.9904 20.727 21.8897 20.4778 21.7094 20.2914ZM10.9994 18.0014C9.61495 18.0014 8.26157 17.5908 7.11042 16.8217C5.95928 16.0525 5.06207 14.9592 4.53226 13.6802C4.00245 12.4011 3.86382 10.9936 4.13392 9.63574C4.40402 8.27787 5.0707 7.03059 6.04967 6.05162C7.02864 5.07265 8.27592 4.40597 9.63378 4.13587C10.9917 3.86578 12.3991 4.0044 13.6782 4.53421C14.9573 5.06403 16.0505 5.96123 16.8197 7.11238C17.5889 8.26352 17.9994 9.6169 17.9994 11.0014C17.9994 12.8579 17.2619 14.6384 15.9492 15.9511C14.6364 17.2639 12.8559 18.0014 10.9994 18.0014Z" fill="white"/>
                            </svg>
                            <!-- Texto del botón -->
                            <span>Buscar</span>
                        </button>
    
                    </div>
                    
                </div>
            </div>
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
    <!--<?php get_template_part('template-parts/secciones/seccion', 'targetas-lg'); ?>-->
	
	<?php get_template_part('template-parts/secciones/seccion', 'eventos-podcast-fellows' ); ?>

    <?php get_template_part('template-parts/secciones/seccion', 'eventos-fellows' ); ?>
	
</main>
<!-- FIN CONTENIDO PÁGINA -->

<script>
     function realizarBusqueda() {
   
    
    // Construye la URL de búsqueda
    let baseURL = "/blog-fellows-resultados"; // Ajusta la URL de destino de la página de resultados
    

    let author = jQuery("#author_name").val();
    let order = jQuery("#order").val();
    let search = jQuery('input[name="s"]').val();
    localStorage.setItem('author', author);
    localStorage.setItem('order', order);
    localStorage.setItem('search', search);

    // Redirecciona a la nueva URL
    window.location.href = baseURL;
}


</script>




<?php get_footer();