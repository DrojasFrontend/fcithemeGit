<?php 
/*
    Template Name: Cardiopatias Congenitas
*/
get_header(); ?>
<?php echo get_template_part('template-parts/content', 'breadcrumbs'); ?>


<?php get_header();
$doctores = get_field('doctors_service');
$tabs = get_field('tabs-group');
$accordionId = get_field('id_acordeon');
$acordeon = get_field('items_acordeon');

// Grupos > Servicios
$terms = get_terms( array(
	'taxonomy' => 'grupos', // set your taxonomy here
	'hide_empty' => false, // default: true
) );
if ( empty( $terms ) || is_wp_error( $terms ) ) {
	return;
}

// Armamos el segundo menú
$grupos = get_the_terms($post->ID, 'grupos');
$grupo_actual = array();
foreach($grupos as $grupo){
    if($grupo->parent != 0){
        $grupo_actual = array(
            'slug' => $grupo->slug,
            'nombre' => $grupo->name,
        );
        break;
    }
}

$menuPpal = array();
foreach( $terms as $term ) {
    if($term->parent != 0){
        $servicio = get_1erservicio_x_grupo($term->slug);
        $menuPpal[$term->term_id] = array(
            "nombre" => $term->name,
            "slug" => $term->slug,
            "servicio" => $servicio,
        );
    }
}

$seccion_actual = $post->post_name;
$filtros[] = array(
    'taxonomy' => 'grupos',
    'field'    => 'slug',
    'terms'    => $grupo_actual["slug"],
);
$argumentos = array(  
    'post_type' => 'servicios',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'order' => 'ASC',
    'orderby' => 'title',
    'tax_query' => $filtros,
);

$menuSec = array();
$query = new WP_Query($argumentos);
$entrada_index = 0;
if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
    $id = get_the_ID();
    $menuSec[$id]["id"] = $id;
    $menuSec[$id]["slug"] = get_post_field('post_name', $id_publicacion);
    $menuSec[$id]["nombre"] = get_the_title();

    }/*while*/
    wp_reset_postdata();
}/*if*/


?>

<main class="servicios">


<section class="curso-descripcion">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <!-- <?= $descripcion ?> -->

                   <?php the_content() ?>
                </div>
                
            </div>
        </div>
    </section>



    <div class="servicios__cont">
       
        <div class="servicios__cuerpo">
            
            <div class="servicios__content" style="width: 100%!important;">
                
                <div class="servicios__content__doctores">
                    <div class="slider_doctores">
                        <?php foreach($doctores as $doctor): ?>
                            <div class="slide_doctor">
                                <a href="<?= $doctor->guid ?>">
                                    <div class="slide_doctor__contenido">
                                        <div class="slide_doctor__contenido__int">
                                            <h3><?= $doctor->post_title ?></h3>
                                            <p><?= get_field('specialties_doctor', $doctor->ID) ?></p>
                                        </div>
                                    </div>
                                    <div class="slide_doctor__bg">
                                        <div class="slide_doctor__bg__capa"></div>
                                        <div class="slide_doctor__bg__img">
                                            <?php if(isset(get_field('image_doctor', $doctor->ID)["url"])): ?>
                                                <img src="<?= get_field('image_doctor', $doctor->ID)["url"] ?>" alt="<?= get_field('image_doctor', $doctor->ID)["alt"] ?>">
                                            <?php else: ?>
                                                <img src="/wp-content/uploads/2023/05/doctor-hombre.png" alt="<?= $doctor->post_title ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>





<?php  get_footer(); ?>
