<?php
/*
    Template Name: Chequeo Médico (Convenio)
*/
get_header();
$fecha_del_evento = get_field('fecha_del_evento');
$ubicacion = get_field('ubicacion');
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="chequeo_medico">
    <section class="container-fluid g-0 chequeo_medico--contenido">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 col-md-8 blog-cont">
                    <div class="chequeo_medico--contenido__cont">
                        <div class="chequeo_medico--contenido__total">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="chequeo_medico--contenido__columnader">
                        <h1>Sea parte de nuestros convenios de Chequeo Médico para empresas.</h1>
                        <div class="chequeo_medico--contenido__columnader--descrp">
                            <p>En un mercado competitivo, los beneficios para colaboradores se convierten en un diferencial importante para retener y fidelizar al capital humano.</p>
                        </div>
                        <?= do_shortcode('[contact-form-7 id="1967" title="Convenio Chequeo Médico Personalizado"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();