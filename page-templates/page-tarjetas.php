<?php 
/*
    Template Name: Tarjeta de saludo
*/

$args = array(
    'post_type' => 'tarjetas_de_saludo',
    'posts_per_page' => -1, // Para obtener todos los registros
    'order' => 'DESC', // Ordenar del más nuevo al más viejo
);
$query = new WP_Query($args);
$tarjetas_de_saludo = array();
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $titulo = get_the_title();
        $imagen = get_field('tarjeta')["url"]; // Reemplaza 'imagen' con el nombre de tu campo ACF
        $tarjetas_de_saludo[] = array(
            'titulo' => $titulo,
            'imagen' => $imagen,
        );
    }
    wp_reset_postdata(); // Restaurar datos originales del post
}

get_header(); ?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina">
  <h1 class="text-center"><?php the_title() ?></h1>
  <?php the_content() ?>
  <div class="tarjetas">
    <div class="tarjetas__paso tarjetas__paso1 mostrar">
        <h2>Paso 1: elije el diseño que más te guste</h2>
        <div class="tarjetas__general">
            <?php foreach($tarjetas_de_saludo as $cada_tarjeta): ?>
                <div class="tarjetas__individual">
                    <button>
                        <img src="<?= $cada_tarjeta["imagen"] ?>" alt="<?= $cada_tarjeta["titulo"] ?>">
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tarjetas__paso tarjetas__paso2">
        <h2>Paso 2: Llena el formulario con tu mensaje personalizado</h2>
        <div class="tarjetas__contenedor">
            <button class="btn btn_cambiardesign"><i class="fas fa-arrow-left"></i> Cambiar de diseño</button>
            <div class="tarjetas__design">
                <div class="tarjetas__contenedor__int">
                    <div id="tarjeta_contenedor" class="tarjetas__contenedor__contenido">
                        <div id="tarjeta_texto" class="tarjetas__contenedor__contenido--text">
                            <p id="tarjeta_saludo"></p>
                            <p id="tarjeta_mensaje"></p>
                            <p id="tarjeta_firma"></p>
                        </div>
                    </div>
                    <div class="tarjetas__contenedor__bg">
                    </div>
                </div>
            </div>
            <div class="tarjetas__contenedor__disclaimer">
                <p>* Esto es una previsualización aproximada de cómo va a quedar la tarjeta final.</p>
            </div>
            <div class="tarjetas__contenedor__form">
                <div class="tarjetas__contenedor__form__int">
                    <?= do_shortcode('[contact-form-7 id="4870" title="Enviar tarjeta de saludo"]') ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>