<?php get_header();
$doctores = get_field('doctors_service');
$tabs = get_field('tabs-group');
$accordionId = get_field('id_acordeon');
$acordeon = get_field('items_acordeon');
$titulo_especialidad = $titulo_seccion_actual = '';

// Grupos > Servicios
$terms = get_terms(array(
    'taxonomy' => 'grupos', // set your taxonomy here
    'hide_empty' => false, // default: true
));
if (empty($terms) || is_wp_error($terms)) {
    return;
}

// Armamos el segundo menú
$grupos = get_the_terms($post->ID, 'grupos');
$grupo_actual = array();
foreach ($grupos as $grupo) {
    if ($grupo->parent != 0) {
        $grupo_actual = array(
            'slug' => $grupo->slug,
            'nombre' => $grupo->name,
        );
        break;
    }
}

$menuPpal = array();
foreach ($terms as $term) {
    if ($term->parent != 0) {
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
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $id = get_the_ID();
        $menuSec[$id]["id"] = $id;
        $menuSec[$id]["slug"] = get_post_field('post_name', $id);
        $menuSec[$id]["nombre"] = get_the_title();
    }/*while*/
    wp_reset_postdata();
}/*if*/


?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="servicios">
    <div class="servicios__cont">
        <h1>Especialidades y servicios</h1>
        <div class="servicios__menumain">
            <ul>
                <?php foreach ($menuPpal as $cadaItem): ?>
                    <?php if ($grupo_actual["slug"] == $cadaItem["slug"]) { 
                        $titulo_especialidad = $cadaItem['nombre'];
                    } ?>
                    <li>
                        <a href="/servicios/<?= $cadaItem["servicio"]["slug"] ?>/" <?php if ($grupo_actual["slug"] == $cadaItem["slug"]): ?>class="activo" <?php endif ?>><span class="icono"><img src="/wp-content/uploads/2023/05/servicios_icon.svg" alt="<?= $cadaItem["nombre"] ?>"></span>
                            <h2 class="texto fs-14"><?= $cadaItem["nombre"] ?></h2>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <h2 class="sr-only"><?php echo $titulo_especialidad ?></h2>
        <div class="servicios__cuerpo">
            <div class="servicios__menusec">
                <ul>
                    <?php foreach ($menuSec as $cadaItem): ?>
                        <?php if ($seccion_actual == $cadaItem["slug"]) { 
                            $titulo_seccion_actual = $cadaItem['nombre'];
                        } ?>
                        <li>
                            <a href="/servicios/<?= $cadaItem["slug"] ?>/" <?php if ($seccion_actual == $cadaItem["slug"]): ?>class="activo" <?php endif ?>>
                                <h3 class="fs-16 fw-700"><?= $cadaItem["nombre"] ?></h3>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="servicios__content">
                <h2 class="sr-only"><?php echo $titulo_seccion_actual ?></h2>
                <div class="servicios__content__content">
                    <?php if (is_array($tabs)): foreach ($tabs as $tab): ?>
                            <h3><?= $tab["title-tab"] ?></h3>
                            <div class="contenido">
                                <?= str_replace('<p>&nbsp;</p>', '', $tab["content-tab"]) ?>
                            </div>
                    <?php endforeach;
                    endif ?>
                    <?php if (is_array($acordeon)): ?>
                        <div class="container">
                            <div class="row">
                                <!---
                                <div class="accordion" id="<?= $accordionId ?>">
                                    <?php foreach ($acordeon as $key => $item): ?>
                                        <?php
                                        $item_id = $accordionId . '-' . ($key + 1);
                                        ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header mw-100" id="<?= $item_id . '--btn' ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?= '#' . $item_id ?>" aria-expanded="false" aria-controls="<?= $item_id ?>">
                                                    <?= $item["titulo_item"] ?>
                                                </button>
                                            </h2>
                                            <div id="<?= $item_id ?>" class="accordion-collapse collapse" aria-labelledby="<?= $item_id . '--btn' ?>" data-bs-parent="<?= '#' . $accordionId ?>">
                                                <div class="accordion-body">
                                                    <?= $item["contenido_item"] ?>
                                                </div>
                                                <?php if (is_array($item["doctores_acordeon"])): ?>
                                                    <?php
                                                    $doctoresAcordeon = $item["doctores_acordeon"];
                                                    ?>
                                                    <div class="servicios__content__doctores">
                                                        <div class="slider_doctores">
                                                            <?php foreach ($doctoresAcordeon as $doctor): ?>
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
                                                                                <?php if (isset(get_field('image_doctor', $doctor->ID)["url"])): ?>
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
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            --->

                                <div class="accordion" id="<?= $accordionId ?>">
                                    <?php foreach ($acordeon as $key => $item): ?>
                                        <?php
                                        $item_id = $accordionId . '-' . ($key + 1);
                                        ?>
                                        <div class="accordion-item">
                                            <h2 class="mw-100" id="<?= $item_id . '--btn' ?>">
                                                <?= $item["titulo_item"] ?>
                                            </h2>
                                            <div id="<?= $item_id ?>">
                                                <div class="accordion-body">
                                                    <?= $item["contenido_item"] ?>
                                                </div>
                                                <?php if (is_array($item["doctores_acordeon"])): ?>
                                                    <?php
                                                    $doctoresAcordeon = $item["doctores_acordeon"];
                                                    ?>
                                                    <div class="servicios__content__doctores">
                                                        <div class="slider_doctores">
                                                            <?php foreach ($doctoresAcordeon as $doctor): ?>
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
                                                                                <?php if (isset(get_field('image_doctor', $doctor->ID)["url"])): ?>
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
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>

                            </div>
                        </div>
                    <?php endif ?>
                    <?php if (is_array($doctores)): ?>
                        <h3>Especialistas y equipo humano</h3>
                    <?php endif ?>
                </div>
                <div class="servicios__content__doctores">
                    <div class="slider_doctores">
                        <?php if (is_array($doctores)) { ?>
                            <?php foreach ($doctores as $doctor): ?>
                                <div class="slide_doctor">
                                    <a href="<?= $doctor->guid ?>">
                                        <div class="slide_doctor__contenido">
                                            <div class="slide_doctor__contenido__int">
                                                <h4><?= $doctor->post_title ?></h4>
                                                <p><?= get_field('specialties_doctor', $doctor->ID) ?></p>
                                            </div>
                                        </div>
                                        <div class="slide_doctor__bg">
                                            <div class="slide_doctor__bg__capa"></div>
                                            <div class="slide_doctor__bg__img">
                                                <?php if (isset(get_field('image_doctor', $doctor->ID)["url"])): ?>
                                                    <img src="<?= get_field('image_doctor', $doctor->ID)["url"] ?>" alt="<?= get_field('image_doctor', $doctor->ID)["alt"] ?>">
                                                <?php else: ?>
                                                    <img src="/wp-content/uploads/2023/05/doctor-hombre.png" alt="<?= $doctor->post_title ?>">
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($seccion_actual == 'laboratorios-clinicos'): ?>
                    <?php
                    $args = array(
                        'post_type' => 'labs-clinicos',
                        'posts_per_page' => -1,
                        'meta_query' => array(),
                    );
                    // Filter by search term
                    $search_term = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
                    if (!empty($search_term)) {
                        $args['s'] = $search_term;
                        $args['post_title'] = $_GET['search'];
                    }
                    // Filter by cups
                    $cupsform = isset($_GET['cups']) ? sanitize_text_field($_GET['cups']) : '';
                    if (!empty($cupsform)) {
                        $args['meta_query'][] = array(
                            'key' => 'cups',
                            'value' => $cupsform,
                            'compare' => '=',
                        );
                    }
                    // Filter by letter
                    /* $type_letter = isset($_GET['type_letter']) ? sanitize_text_field($_GET['type_letter']) : '';
                        if (!empty($type_letter)) {
                            $args['s'] = $type_letter;
                        } */
                    // Filter by area
                    $type_area = isset($_GET['type_area']) ? sanitize_text_field($_GET['type_area']) : '';
                    if (!empty($type_area)) {
                        $args['meta_query'][] = array(
                            'key' => 'area',
                            'value' => $type_area,
                            'compare' => '=',
                        );
                    }
                    $custom_query = new WP_Query($args);
                    ?>
                    <div class="container">
                        <div class="educacontigeneral__filtro">
                            <div class="educacontigeneral__filtro__int">
                                <form id="filter-form" action="<?php echo esc_url(get_permalink()); ?>" method="get" class="form-clas" style="  width: 100%;
                                    justify-content: space-between;
                                    display: flex;">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-3 text-center mb-3">
                                            <input type="text" name="search" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Palabra">
                                        </div>
                                        <div class="col-12 col-md-3 text-center mb-3">
                                            <input type="number" name="cups" class="form-control" value="<?php echo isset($_GET['cups']) ? $_GET['cups'] : ''; ?>" placeholder="Cups">
                                        </div>
                                        <div class="col-12 col-md-3 text-center mb-3">
                                            <select id="type_letter" name="type_letter" class="form-select">
                                                <option value="<?php echo !empty($_GET['type_letter']) ? $_GET['type_letter'] : '';  ?>"><?php echo !empty($_GET['type_letter']) ? $_GET['type_letter'] : 'Por letra';  ?></option>
                                                <?php
                                                foreach (range('A', 'Z') as $letter) {
                                                ?>
                                                    <option value="<?php echo $letter; ?>"><?php echo $letter; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 text-center mb-3">
                                            <select id="type_area" name="type_area" class="form-select">
                                                <option value="<?php echo !empty($_GET['type_area']) ? $_GET['type_area'] : '';  ?>"><?php echo !empty($_GET['type_area']) ? $_GET['type_area'] : 'Área';  ?></option>
                                                <?php
                                                $areas = array(
                                                    'IQ',
                                                    'INM',
                                                    'PERE',
                                                    'HH',
                                                    'HHE',
                                                    'MIC',
                                                    'MB',
                                                    'MYC',
                                                    'MBE',
                                                    'MICO',
                                                    'BIO'
                                                );
                                                foreach ($areas as $key => $value) {
                                                ?>
                                                    <option value="<?= $value ?>" <?php echo (isset($_GET['type_area']) && $_GET['type_area'] === $key) ? 'selected' : ''; ?>>
                                                        <?= $value ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 text-center">
                                            <input type="submit" value="BUSCAR" class="btn btn_limpiar">
                                        </div>
                                        <div class="col-12 col-md-4 text-center">
                                            <button class="btn btn_limpiar" id="limpiar-btn">LIMPIAR</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php if ($custom_query->have_posts()) : ?>
                        <div class="container">
                            <div class="row">
                                <div class="accordion" id="labs-clinicos-acordion">
                                    <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                                        <div class="accordion-item" data-title="<?php echo get_the_title(); ?>">
                                            <h4 class="accordion-header mw-100" id="lab-clinico-item-<?php the_ID(); ?>-btn">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#lab-clinico-item-<?php the_ID(); ?>" aria-expanded="false" aria-controls="lab-clinico-item-<?php the_ID(); ?>">
                                                    <?php the_title(); ?>
                                                </button>
                                            </h4>
                                            <div id="lab-clinico-item-<?php the_ID(); ?>" class="accordion-collapse collapse" aria-labelledby="lab-clinico-item-<?php the_ID(); ?>-btn" data-bs-parent="#labs-clinicos-acordion">
                                                <div class="accordion-body">
                                                    <span class="d-none"><?php echo get_field('cups') ?></span>
                                                    <span class="d-none"><?php echo get_field('area') ?></span>
                                                    <h5 class="border-0">Condiciones del paciente y/o datos anexos</h5>
                                                    <?php the_content(); ?>
                                                    <h5>Día de montaje</h5>
                                                    <p><?php echo get_field('dia_montaje') ?></p>
                                                    <h5>Reporte de resultados</h5>
                                                    <p><?php echo get_field('reporte') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<script>
    /* Limpiar la busqueda */
    document.addEventListener("DOMContentLoaded", function() {
        var limpiarBtn = document.getElementById("limpiar-btn");
        if (limpiarBtn !== null) {
            limpiarBtn.addEventListener("click", function() {
                var formClas = document.querySelectorAll(".form-clas");
                for (var i = 0; i < formClas.length; i++) {
                    var inputs = formClas[i].querySelectorAll("input[type=text], input[type=number], select");
                    for (var j = 0; j < inputs.length; j++) {
                        inputs[j].value = "";
                    }
                }
            });
        }
    });
    /* Filtrar por letra */
    var type_letter = document.getElementById('type_letter');
    if (type_letter != null) {
        type_letter.addEventListener('change', function() {
            let selectedLetter = this.value.toUpperCase();
            let posts = document.getElementsByClassName('accordion-item');

            for (let i = 0; i < posts.length; i++) {
                let postTitle = posts[i].getAttribute('data-title').charAt(0).toUpperCase();
                if (selectedLetter === '' || postTitle === selectedLetter) {
                    posts[i].style.display = 'block';
                } else {
                    posts[i].style.display = 'none';
                }
            }
        });
    }
</script>
<?php get_footer(); ?>