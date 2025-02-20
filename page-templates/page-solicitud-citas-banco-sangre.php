<?php
/* 
Template Name: Plantilla | Solicitud Citas Banco de sangre
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

?>



<!-- CONTENIDO -->
<main>

<section class="seccionFormularioSolicitudCitas__modal">
    
    <div class="seccionFormularioSolicitudCitas">
        <div class="wrapper">
            <div class="seccionFormularioSolicitudCitas__contenido">
                <div class="seccionFormularioSolicitudCitas__titulo">
                    <h2 class="heading--64 color--002D72">Agenda tu cita en nuestro banco de sangre</h2>
                    <p class="heading--18 color--263956">Déjanos tus datos y uno de nuestros asesores estará en contacto contigo.</p>
                </div>
                <div class="seccionFormularioSolicitudCitas__grid">
                    <div class="seccionFormularioSolicitudCitas__form">
                        <?php echo do_shortcode('[contact-form-7 id="de75fd0" title="Formulario Banco de sangre"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>