<?php
/* Template Name: Plantilla: Convenios de atención */
get_header();
$polizas = get_field('polizas');
$medicina_prepagada = get_field('medicina_prepagada');
$planes_complementarios = get_field('planes_complementarios');
$eps = get_field('eps');
$todo = array(
    $polizas,
    $medicina_prepagada,
    $planes_complementarios,
    $eps
);
$indice = 1;
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="conveniosAtencion py-2 py-md-5">
    <div class="grilla">
        <h1 class="pseudotitulo1"><strong>Convenios</strong> de atención</h1>
        <?php foreach($todo as $cUno): ?>
            <div class="grupo grupo1">
                <h2 class="pseudotitulo2__sinborde"><?= $cUno["titulo"] ?></h2>
                <div class="galeria">
                    <div class="sliderConvenios">
                        <?php foreach($cUno["entradas"] as $cImagen): ?>
                            <div class="cadConvenio">
                                <img src="<?= $cImagen["imagen"]["url"] ?>" alt="<?= $cImagen["imagen"]["alt"] ?>">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="descripcion">
                    <?= $cUno["descripcion"] ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</main>
<?php get_footer(); ?>