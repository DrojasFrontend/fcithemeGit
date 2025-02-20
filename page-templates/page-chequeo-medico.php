<?php
/*
    Template Name: Chequeo Médico Personalizado
*/
get_header();
$fecha_del_evento = get_field('fecha_del_evento');
$ubicacion = get_field('ubicacion');
?>
<?= get_template_part('template-parts/content'); ?>
<main class="chequeo_medico">
    <section class="container-fluid g-0 chequeo_medico--contenido" style="max-width: 100%!important;">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12 col-md-12 blog-cont">
                    <div class="chequeo_medico--contenido__cont">
                        <!--
                        <div class="chequeo_medico--contenido__banner">
                            <?= get_the_post_thumbnail($post->ID, 'full', array('class' => 'w-100')); ?>
                        </div>

                        <div class="chequeo_medico--contenido__social">
                            <?php echo get_template_part('template-parts/content', 'compartir'); /* Módulo de compartir */ ?>
                        </div>

                        -->
                        <div class="chequeo_medico--contenido__total">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                






                
            </div>
        </div>
    </section>


    <section class="formulario mt-5 mb-5" >
    <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-10" style="border-radius: 25px;border: 1px solid #D9D9D9;padding: 1.5rem; margin:0 auto;">
                    <h2 id="formulario-chequeo" style="color: #00266e;font-weight: bold;font-size: 1.7rem;margin-bottom: 1rem; text-align: center;">Solicite su chequeo médico personalizado</h2>
                    <div class="chequeo_medico--contenido__columnader--descrp">
                            <p>Para iniciar la reserva de un Chequeo Médico personalizado en el horario que más le convenga, puede darnos sus datos y día de preferencia aquí o puede contactarnos directamente a:</p>
                            <p>Teléfono: <a href="tel:6014894486" data-wpel-link="internal">6014894486</a> <br>
                            E-mail: <a href="mailto:chequeomedico@lacardio.org">chequeomedico@lacardio.org</a></p>
                        </div>
                    <?php echo do_shortcode('[contact-form-7 id="1937" title="Solicitar Chequeo Médico Personalizado"]'); ?>
                    </div>
                </div>            
            </div>
    </div>
    </section>




</main>

<?php
get_footer();

