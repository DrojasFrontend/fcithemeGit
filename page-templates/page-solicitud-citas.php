<?php
/* 
Template Name: Plantilla Paginan Solicitud Citas
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-983428478"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'AW-983428478');
</script>

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
                    <h2 class="heading--64 color--002D72">Agenda tu cita</h2>
                    <p class="heading--18 color--263956">Déjanos tus datos y uno de nuestros asesores estará en contacto contigo.</p>
                </div>
                <div class="seccionFormularioSolicitudCitas__grid">
                    <div class="seccionFormularioSolicitudCitas__form">
                        <?php echo do_shortcode('[contact-form-7 id="94ae996" title="Formulario solicitud de citas - especialista"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<!-- FIN CONTENIDO -->
<?php get_footer(); ?>