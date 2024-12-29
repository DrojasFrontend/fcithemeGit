<?php 
/*
    Template Name: Encuesta de satisfacción
*/

$breadcrumbs = get_field('breadcrumbs');

$evaluacion = get_field('evaluacion');
$titulo = get_field('titulo_h1');
$titulo = ($titulo != "") ? $titulo : get_the_title();
get_header(); ?>
<?php echo get_template_part('template-parts/content'); ?>

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
    <div class="w-dxxl padding1 mx-auto">
        <h1><?= $titulo ?></h1>
        <div class="content">
            <?php the_content() ?>
        </div>
    </div>
    <div class="encuesta_satisfaccion">
        <?php if(is_array($evaluacion)): ?>
            <?php foreach($evaluacion as $cadaUna): ?>
                <div class="encuesta_indv">
                    <div class="encuesta_indv__int">
                        <div class="encuesta_indv__bg">
                            <img decoding="async" src="<?= $cadaUna["imagen"]["url"] ?>" alt="<?= $cadaUna["imagen"]["alt"] ?>">
                        </div>
                        <div class="encuesta_indv__content">
                            <div class="encuesta_indv__content--int">
                                <div class="encuesta_indv__content--int__cont">
                                    <h2 class="border-0 px-1 text-t-initial h3"><?= $cadaUna["titulo"] ?></h2>
                                    <hr>
                                    <p><?= $cadaUna["descripcion"] ?></p>
                                    <?php if(is_array($cadaUna["enlace"])): ?>
                                        <p class="text-center"><a href="<?= $cadaUna["enlace"]["href"] ?>" target="<?= $cadaUna["enlace"]["target"] ?>" class="btn">Ver más</a></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div>
                No hay encuestas registradas.
            </div>
        <?php endif ?>
    </div>
</main>
<?php  get_footer(); ?>