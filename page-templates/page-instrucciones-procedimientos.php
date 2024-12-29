<?php
/*
    Template Name: Instrucciones para procedimientos
*/

$breadcrumbs = get_field('breadcrumbs');
$sistema_pestanas = get_field('sistema_pestanas');
$titulo = get_field('titulo_h1');
$titulo = ($titulo != "") ? $titulo : get_the_title();

get_header(); 
?>
<style>

    #myTab{
        display: flex;justify-content: center;
    }


    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: white !important;
        background-color: #E40046;
        border-color: #dee2e6 #dee2e6 #fff;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        border-radius: 6px 6px 0px 0px;
        align-items: center;
        text-align: center;
        font-family: 'Open Sans';

    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link {
        margin-right: 5px;
        align-items: center;
        text-align: center;
        font-family: 'Open Sans';
        color: #E40046 !important;
        background-color: #FFABC4;
        border-color: #dee2e6 #dee2e6 #fff;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        border-radius: 6px 6px 0px 0px;
    }

    .card {
        border: none;
    }

    .card-body {
        background-color: rgba(0, 0, 0, .03);
        border-top: 1px solid rgba(0, 0, 0, .125);
    }

    .tab-content {
        margin: 0 auto;
    }

    .card-header {
        border-bottom: none;
        padding-bottom: 0;
        background-color: transparent !important;
    }

    .nav-item {
        margin-bottom: 5px!important;
    }

    .seccionSomosLacardio {
        padding: 60px 0 0 !important;
    }

    .fci ol,
    .fci ul {
        margin: 0 auto 2em;
        padding-left: 0 !important;
        width: 100%;
    }
</style>


<?php echo get_template_part('template-parts/content'); ?>

<div class="breadcrumbs">
    <p id="breadcrumbs" class="claro">
        <span>
            <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
        </span>
        <?php if (is_array($breadcrumbs)): ?>
            <?php foreach ($breadcrumbs as $breadcrumb): ?>
                » <span><a style="text-decoration: none!important;" href="<?= $breadcrumb["link_breadcrumb"] ?>"><?= $breadcrumb["breadcrumb"] ?></a></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </p>
</div>

<main class="pagina-full">
    <div class="w-dxxl padding1 mx-auto">
        <h1><?= esc_html($titulo) ?></h1>
    </div>

    <?php if (is_array($sistema_pestanas)): ?>
        <section class="seccionTargetas__fondo" style="margin-top: 0px!important;">
            <div class="card">
                <div class="card-header container--large">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist" style="margin:0;">
                        <?php $indice = 0; foreach ($sistema_pestanas as $cadaUno): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if (($indice == 0 && $contenidos["interna"] == 0) || ($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1)): ?>active<?php endif ?>"
                                   data-toggle="tab" href="#tab-<?= esc_attr($indice) ?>" role="tab" aria-selected="<?php if (($indice == 0 && $contenidos["interna"] == 0) || ($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1)): ?>true<?php else: ?>false<?php endif ?>">
                                   <?= esc_html($cadaUno["titulo"]) ?>
                                </a>
                            </li>
                        <?php $indice++; endforeach; ?>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <?php $indice = 0; foreach ($sistema_pestanas as $cadaUno): ?>
                            <div class="tab-pane container--large fade <?php if (($indice == 0 && $contenidos["interna"] == 0) || ($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1)): ?>show active<?php endif ?>" id="tab-<?= esc_attr($indice) ?>" role="tabpanel" aria-labelledby="tab-<?= esc_attr($indice) ?>">
                                <div class="preparacionGeneral <?= esc_attr($cadaUno["diseno"]) ?>">
                                    <div class="preparacionGeneral__titulo">
                                        <h2 class="text-center"><?= esc_html($cadaUno["titulo"]) ?></h2>
                                    </div>
                                    <div class="preparacionGeneral__columnas">
                                        <div class="preparacionGeneral__imagen">
                                            <img src="<?= esc_url($cadaUno["contenido"][0]["imagen"]["url"]) ?>" alt="<?= esc_attr($cadaUno["contenido"][0]["imagen"]["alt"]) ?>">
                                        </div>
                                        <div class="preparacionGeneral__texto">
                                            <?= wp_kses_post($cadaUno["contenido"][0]["texto"]) ?>
                                        </div>
                                    </div>
                                </div>

                                <?php if (is_array($cadaUno["subpestanas"])): ?>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <?php $subIndice = 0; foreach ($cadaUno["subpestanas"] as $cadaSub): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if ($subIndice == 0): ?>active<?php endif ?>" data-toggle="tab" href="#subpestana-<?= esc_attr($cadaSub["titulo"]) ?>" role="tab">
                                                    <?= esc_html($cadaSub["titulo"]) ?>
                                                </a>
                                            </li>
                                        <?php $subIndice++; endforeach; ?>
                                    </ul>

                                    <div class="tab-content pt-4">
                                        <?php $subIndice = 0; foreach ($cadaUno["subpestanas"] as $cadaSub): ?>
                                            <div class="tab-pane container--large fade <?php if ($subIndice == 0): ?>show active<?php endif ?>" id="subpestana-<?= esc_attr($cadaSub["titulo"]) ?>" role="tabpanel">
                                                <div class="preparacionGeneralHijo">
                                                    <div class="preparacionGeneralHijo__columnas">
                                                        <div class="preparacionGeneralHijo__imagen">
                                                            <img src="<?= esc_url($cadaSub["imagen"]["url"]) ?>" alt="<?= esc_attr($cadaSub["imagen"]["alt"]) ?>">
                                                        </div>
                                                        <div class="preparacionGeneralHijo__texto">
                                                            <h2 class="text-center"><?= esc_html($cadaSub["titulo"]) ?></h2>
                                                            <?= wp_kses_post($cadaSub["descripcion"]) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $subIndice++; endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php $indice++; endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<!-- Scripts de jQuery y Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Versión completa de jQuery -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php get_footer(); ?>
