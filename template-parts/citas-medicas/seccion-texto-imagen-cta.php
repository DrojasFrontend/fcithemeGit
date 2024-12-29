<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_texto_imagen_cta   = get_field('grupo_texto_imagen_cta');
$posicion                 = !empty($grupo_texto_imagen_cta['posicion']) ? esc_html($grupo_texto_imagen_cta['posicion']) : '';
$subtitulo                = !empty($grupo_texto_imagen_cta['subtitulo']) ? esc_html($grupo_texto_imagen_cta['subtitulo']) : '';
$titulo                   = !empty($grupo_texto_imagen_cta['titulo']) ? esc_html($grupo_texto_imagen_cta['titulo']) : '';
$descripcion              = !empty($grupo_texto_imagen_cta['descripcion']) ? esc_html($grupo_texto_imagen_cta['descripcion']) : '';
$cta                      = !empty($grupo_texto_imagen_cta['cta']) ? $grupo_texto_imagen_cta['cta'] : [];
$cta_url                  = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo               = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target               = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id                = !empty($grupo_texto_imagen_cta["imagen"]['ID']) ? $grupo_texto_imagen_cta["imagen"]['ID'] : '';
?>

<section class="citasMedicasTextoImagenCTA" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="citasMedicasTextoImagenCTA__flex estilo-1">
      <div class="citasMedicasTextoImagenCTA__col">
        <div class="citasMedicasTextoImagenCTA__info">
          <?php if($subtitulo) : ?>
            <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
          <?php endif; ?>

          <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
          <?php endif; ?>

          <?php if($descripcion) : ?>
            <p class="heading--18 color--263956">
              <?php echo $descripcion;?>
            </p>
          <?php endif; ?>

          <?php if ($cta_url === '#'): ?>
						  <button class="open-modal-form boton-v2 boton-v2--rojo-rojo" id="open-modal-form" type="button" aria-label="abrir modal">
                <?php echo $cta_titulo;?>
						  </button>
					<?php else: ?>
						   <!-- Span que se muestra cuando el URL no es "modal" -->
						   <span class="boton-v2 boton-v2--rojo-rojo"><?php echo esc_html($targeta_cta_titulo); ?></span>
					<?php endif; ?>



        </div>
      </div>
    <div class="citasMedicasTextoImagenCTA__col">
      <div class="citasMedicasTextoImagenCTA__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>


<!-- Modal -->
<section class="seccionCitasFormularioContacto__modal">
    <button type="button" class="seccionCitasFormularioContacto__close" id="close-modal-form"
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
                        <?php echo do_shortcode('[contact-form-7 id="1413" title="Formulario de Citas y Teleconsultas" html_name="Teleconsultas"]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin Modal -->



