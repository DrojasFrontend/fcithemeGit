<?php
$pagina_id       = get_page_by_path('noticias')->ID;

$grupo_banner    = ($pagina_id) ? get_field('grupo_banner', $pagina_id) : null;
$color_fondo    = !empty($grupo_banner['color_fondo']) ? esc_html($grupo_banner['color_fondo']) : '';
$fondo          = !empty($grupo_banner['fondo']) ? esc_html($grupo_banner['fondo']) : '';
$titulo         = !empty($grupo_banner['titulo']) ? esc_html($grupo_banner['titulo']) : '';
$subtitulo      = !empty($grupo_banner['subtitulo']) ? esc_html($grupo_banner['subtitulo']) : '';

get_header();
?>

<style>
    .seccionBlogBanner__fondo {
        background: url(<?php echo $fondo; ?>) no-repeat center right;
        background-size: cover;
        background-color: <?php echo $color_fondo; ?>;
    }
</style>
<main>
    <section class="seccionBlogBanner">
        <div class="seccionBlogBanner__fondo">
            <div class="container--large">
                <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
                <h1 class="heading--48 color--002D72"><?php echo $titulo; ?></h1>
                <!-- Filtros -->
                <div class="seccionBlogForm">
                    <div class="seccionBlogForm__fondo">
                        <div class="container--large">
                            <form method="get" id="category-filter">
                                <select name="cat" id="category-select" onchange="this.form.submit()">
                                    <option value="">Nuestras categorías</option>
                                    <?php
                                    $categories = get_categories(array(
                                        'orderby' => 'name',
                                        'order' => 'ASC'
                                    ));
                                    foreach ($categories as $category) {
                                        $selected = (isset($_GET['cat']) && $_GET['cat'] == $category->term_id) ? 'selected' : '';
                                        echo '<option value="' . esc_attr($category->term_id) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
                                    }
                                    ?>
                                </select>
                        
                                <select name="order" id="order-select" onchange="this.form.submit()">
                                    <option value="DESC" <?php selected(isset($_GET['order']) ? $_GET['order'] : 'DESC', 'DESC'); ?>>Más recientes</option>
                                    <option value="ASC" <?php selected(isset($_GET['order']) ? $_GET['order'] : 'DESC', 'ASC'); ?>>Más antiguos</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fin filtros -->
            </div>
        </div>
    </section>

    <?php
    // Obtener la categoría seleccionada o la más reciente por defecto
    if (isset($_GET['cat']) && !empty($_GET['cat'])) {
        $category_id = intval($_GET['cat']);
    } else {
        // Obtener la categoría más reciente por defecto
        $recent_post = get_posts(array(
            'numberposts' => 1,
            'orderby' => 'date',
            'order' => 'DESC'
        ));
        $category_id = !empty($recent_post) ? wp_get_post_categories($recent_post[0]->ID)[0] : 0;
    }

    // Obtener el orden seleccionado o por defecto
    $order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

    if ($category_id) {
        $args = array(
            'cat' => $category_id,
            'posts_per_page' => 9,
            'orderby' => 'date',
            'order' => $order
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $post_counter = 1;
            $posts_count = $query->post_count; // Contar el número total de publicaciones
            ?>
            <div class="targetaEntradas">
                <div class="container--large">
                    <div class="grupo-1"> 
                        <h2 class="d-none">Últimas noticias</h2>
                        <!-- 1ª Tarjeta grande -->
                        <div class="subgrupo-1">
                            <?php get_template_part('template-parts/secciones/seccion', 'noticia'); 
                            $post_counter++;
                            ?>
                        </div>
                        <!-- Fin 1ª Tarjeta grande -->

                        <!-- 2ª y 3ª Tarjetas pequeñas -->
                        <div class="subgrupo-2">
                            <div class="heading--48 color--002D72">Últimas noticias</div>
                            <?php
                            while ($query->have_posts() && $post_counter <= 3) {
                                $query->the_post();
                                get_template_part('template-parts/secciones/seccion', 'noticia');
                                $post_counter++;
                            }
                            ?>
                        </div>
                        <!-- Fin 2ª y 3ª Tarjetas pequeñas -->
                    </div>
                </div>

                <!-- Carrusel Slick para el resto de tarjetas -->
                 <div class="grupo-2">
                     <div class="grupo-2__container">
                        <h2 class="heading--48 color--002D72">Publicaciones más leídas</h2>
                         <div class="slickNoticias slickPersonalizado">
                             <?php
                             while ($query->have_posts()) {
                                 $query->the_post();
                                 ?>
                                <?php get_template_part('template-parts/secciones/seccion', 'noticia'); ?>
                                 <?php
                             }
                             ?>
                         </div>
                     </div>
                 </div>
                <!-- Fin Carrusel Slick -->
            </div>
            <?php
            // Ocultar el indicador de carga una vez que se hayan cargado los posts
            echo '<script>document.getElementById("loading-indicator").style.display = "none";</script>';
        } else {
            echo 'No se encontraron publicaciones en esta categoría.';
        }
        wp_reset_postdata();
    } else {
        echo 'Por favor seleccione una categoría.';
    }
    ?>

    <?php get_template_part('template-parts/secciones/seccion', 'texto-imagen'); ?>

    <!-- Noticias -->
    <?php 
    set_query_var('titulo_noticias', 'Recomendados para ti');
    set_query_var('fondo_noticias', 'rgb(255 255 255)');
    set_query_var('numero_entradas', 9);
    set_query_var('orden_entradas', 'rand');
    get_template_part('template-parts/secciones/seccion', 'noticias');
    ?>
    <!-- Fin Noticias -->

</main>

<?php get_footer(); ?>

<script>
    // Ocultar el indicador de carga cuando la página haya cargado completamente
    window.addEventListener('load', function() {
        document.getElementById('loading-indicator').style.display = 'none';
    });
</script>
