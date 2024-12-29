<?php /* Template Name: Template 4 - Thankyou page */ ?>
<?php get_header(); ?>
<div class="page-servicios-hepa">
<?php /* CONTENIDO PAGINA */ ?>
<div class="formCardioInfantil">
    <div class="columnTwo infoThankYou gap-0 gap-3Mobile columnTwoReverseMobile">
        <div class="column formInfoPro">
            <div class="infoForm">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_theme_file_uri( 'images/logos/cardioInfantilForm.svg'); ?>" class="logo" alt="Logo CardioInfantil" />
                </a>
                <h1>¡Genial!</h1>
                <p>Tus datos se han enviado correctamente. Pronto uno de nuestros colaboradores estará en contacto contigo.</p>
                <p>Muchas gracias.</p>
                <div class="separadorProFour visibleDesktop"></div>
                <div class="separadorProFour visibleMobile"></div>
                <div class="btnSend">
					<a style="text-decoration:none;" href="/"><button type="button"  class=" submit">Volver al inicio</button></a>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="imageForm">
                <img src="<?php echo get_theme_file_uri( 'images/others/form.jpg'); ?>" class="img-fluid w-100 formImage" alt="¡Genial!" />
            </div>
        </div>
    </div>
</div>
<?php /* FIN CONTENIDO PAGINA */ ?>
</div>
<?php get_footer(); ?>