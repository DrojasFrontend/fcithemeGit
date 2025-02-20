<!-- Modal -->
<section class="seccionCitasFormularioContacto__modal" id="formCitaTeleC">
    <button type="button" class="seccionCitasFormularioContacto__close" id="cerrarFormCitaTeleC"
        aria-label="cerrar modal">
        <?php
        get_template_part('template-parts/content', 'icono');
        display_icon('ico-close');
        ?>
    </button>
    <div class="seccionCitasFormularioContacto">
        <div class="wrapper">
            <div class="seccionCitasFormularioContacto__contenido">
                <div class="seccionCitasFormularioContacto__titulo">
                    <h2 class="heading--64 color--002D72">Agenda tu cita</h2>
                    <p class="heading--18 color--263956">Déjanos tus datos y uno de nuestros asesores estará en contacto contigo.</p>
                </div>
                <div class="seccionCitasFormularioContacto__grid">
                    <div class="seccionCitasFormularioContacto__form">
                        <?php echo do_shortcode('[contact-form-7 id="c7dd65c" title="Formulario de Citas y Teleconsultas"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin Modal -->

<script>
  document.addEventListener('wpcf7mailsent', function(event) {
    
    if (event.detail.contactFormId == "1413") {
        gtag_report_conversion();
    }
    }, false);

    function gtag_report_conversion() {
        gtag('event', 'conversion', {
            'send_to': 'AW-10884480840/USodCMjIrp0aEMj-j8Yo',
            'value': 1.0,
            'currency': 'COP'
        });
        
        return false;
    }
</script>
<?php get_footer(); ?>