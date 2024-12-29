<?php /* Template Name: Template 2 - Contacto hepatocarcinoma */ ?>
<?php get_header(); ?>

<?php /* CONTENIDO PAGINA */ ?>
<div class="page-servicios-hepa">
<div class="formCardioInfantil">
  <div class="columnTwo gap-0 gap-3Mobile columnTwoReverseMobile">
      <div class="column formInfoPro">
          <div class="infoForm">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo get_theme_file_uri( 'images/logos/cardioInfantilForm.svg'); ?>" class="logo" alt="Logo CardioInfantil" />
              </a>
              <h1>Dejanos tus datos</h1>
              <?php echo do_shortcode( '[contact-form-7 id="5734" title="Formulario contacto hepartocacinoma"]' ); ?>
          </div>
      </div>
      <div class="column">
          <div class="imageForm">
              <img src="<?php echo get_theme_file_uri( 'images/others/form.jpg'); ?>" class="img-fluid w-100 formImage" alt="Dejanos tus datos" />
          </div>
      </div>
  </div>
</div>
</div>
<?php /* FIN CONTENIDO PAGINA */ ?>

<?php get_footer(); ?>