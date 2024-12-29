<?php 
$sitename   = esc_html(get_bloginfo('name'));
$grupo_hero = get_field('grupo_hero');
$imagen_id  = !empty($grupo_hero["fondo"]['ID']) ? $grupo_hero["fondo"]['ID'] : '';
$subtitulo  = !empty($grupo_hero['subtitulo']) ? esc_html($grupo_hero['subtitulo']) : '';
$titulo     = !empty($grupo_hero['titulo']) ? esc_html($grupo_hero['titulo']) : '';
?>

<div class="breadcrumbs">
                <p id="breadcrumbs" class="claro">
                    <span>
                        <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
                    </span> » 
                    <span>
                        <a style="text-decoration: none!important;" href="# " data-wpel-link="internal">Pacientes, familiares, cuidadores</a>
                    </span> » 
                    <span>
                        <a style="text-decoration: none!important;" href="# " data-wpel-link="internal">Pide y prepárate para tu cita</a>
                    </span> » 
                    <span>
                        <a style="text-decoration: none!important;" href="https://www.lacardio.org/instrucciones-para-examenes-y-procedimientos/" data-wpel-link="internal">Preparación para Procedimientos e Imágenes Diagnósticas</a>
                    </span> 
                </p>
            </div>



<section class="procedimientoHero">
  <div class="procedimientoHero__fondo">
    <?php echo generar_imagen_responsive($imagen_id, 'custom-size-2x', $sitename, ''); ?>
    <div class="container--large">
      <div class="procedimientoHero__titulo">
        <?php if($subtitulo) : ?>
        <p class="subheading color--fff"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo) : ?>
          <h1 class="heading--64 color--fff"><?php echo $titulo; ?></h1>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>