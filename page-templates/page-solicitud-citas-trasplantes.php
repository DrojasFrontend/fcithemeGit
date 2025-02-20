<?php
/* 
Template Name: Plantilla | Solicitud Citas Trasplantes
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

?>



<!--
<div class="breadcrumbs">
  <p id="breadcrumbs" class="claro">
    <span>
      <a style="text-decoration: none!important;" href="https://www.lacardio.org/"
        data-wpel-link="internal">LaCardio</a>
    </span> »
    <span>
      <a style="text-decoration: none!important;" href="#" data-wpel-link="internal">Pacientes, familiares,
        cuidadores</a>
    </span> »
    <span>
      <a style="text-decoration: none!important;" href="#" data-wpel-link="internal">Pide y prepárate para tu cita</a>
    </span> »

    <span>
      <a style="text-decoration: none!important;" href="https://www.lacardio.org/citas-y-teleconsultas/"
        data-wpel-link="internal">Pide una cita</a>
    </span>
  </p>
</div>
-->
<!-- CONTENIDO -->
<main>

<section class="seccionFormularioSolicitudCitas__modal">
    
    <div class="seccionFormularioSolicitudCitas">
        <div class="wrapper">
            <div class="seccionFormularioSolicitudCitas__contenido">
                <div class="seccionFormularioSolicitudCitas__titulo">
                    <h2 class="heading--64 color--002D72">Agenda tu cita de Trasplante</h2>
                    <p class="heading--18 color--263956">Déjanos tus datos y uno de nuestros asesores estará en contacto contigo.</p>
                </div>
                <div class="seccionFormularioSolicitudCitas__grid">
                    <div class="seccionFormularioSolicitudCitas__form">
                        <?php echo do_shortcode('[contact-form-7 id="5d5bf8a" title="Formulario contacto trasplantes"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>