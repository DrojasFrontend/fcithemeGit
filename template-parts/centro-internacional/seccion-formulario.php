<section class="seccionFormulario" id="formulario">
  <a type="button" class="seccionFormulario__close" id="close-modal-form" type="button" aria-label="cerrar modal">
    <?php 
      get_template_part('template-parts/content', 'icono');
      display_icon('ico-close'); 
    ?>
  </a>
  <div class="container--large">
    <div class="seccionFormulario__formulario">
      <?php echo do_shortcode('[contact-form-7 id="9b79ea6" title="Centro Internacional - Proceso inscripción"]'); ?>
    </div>
  </div>
</section>