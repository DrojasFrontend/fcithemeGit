<?php
/**
 * Template Name: Plantilla Cardio U | Formulario Contacto
 * 
 * @package FCITheme
 * @subpackage Legger_Templates
 * @version 1.0
 * @author Legger
 * @link https://legger.com
 * 
 * This template is part of the custom development by Legger.
 * Template for the Revascularizacion page.
 */

// Asegúrate de que no se acceda directamente a este archivo
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('cardiou');
?>
<section class="seccionCardioUFormularioContacto">
    <div class="wrapper">
        <div class="seccionCardioUFormularioContacto__contenido">
            <div class="seccionCardioUFormularioContacto__titulo">
                <h1 class="heading--64 color--002D72">Únete a nuestra comunidad</h1>
                <p class="heading--18 color--263956">Dejanos tus datos y uno de nuestros asesores estará en contacto contigo.</p>
            </div>
            <div class="seccionCardioUFormularioContacto__grid">
                <div class="seccionCardioUFormularioContacto__form">
                    <?php echo do_shortcode('[contact-form-7 id="8ae3dbc" title="Cardio U - info"]'); ?>
                </div>
                <div class="seccionCardioUFormularioContacto__img">
                    <img src="<?php echo IMG_BASE . 'imagen-form-contacto.webp'?>" alt="Únete a nuestra comunidad">
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer('cardiou');