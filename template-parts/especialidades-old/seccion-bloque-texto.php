<?php 
$grupo_bloque_texto = get_field('grupo_bloque_texto');
$posicion           = !empty($grupo_bloque_texto['posicion']) ? esc_html($grupo_bloque_texto['posicion']) : '';
$titulo             = !empty($grupo_bloque_texto['texto']) ? $grupo_bloque_texto['texto'] : '';
?>

<section class="etapaEspecialidadesBloqueTexto <?php echo $args['class']; ?>" style="order: <?php echo $posicion; ?>">
  <div class="etapaEspecialidadesBloqueTexto__fondo">
    <div class="container--large">
      <div class="etapaEspecialidadesBloqueTexto__texto">
        <h2 class="heading--36 color--002D72">
          <?php echo $titulo; ?>
        </h2>
      </div>
    </div>
  </div>
</section>