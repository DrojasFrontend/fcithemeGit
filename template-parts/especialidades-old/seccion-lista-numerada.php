<?php 
$grupo_lista_numerada   = get_field('grupo_lista_numerada');
$posicion               = !empty($grupo_lista_numerada['posicion']) ? esc_html($grupo_lista_numerada['posicion']) : '';
$subtitulo              = !empty($grupo_lista_numerada['subtitulo']) ? esc_html($grupo_lista_numerada['subtitulo']) : '';
$titulo                 = !empty($grupo_lista_numerada['titulo']) ? esc_html($grupo_lista_numerada['titulo']) : '';
$items                  = !empty($grupo_lista_numerada['items']) ? $grupo_lista_numerada['items'] : [];

?>
<section class="etapaEspecialidadesListaNumerada" style="order: <?php echo $posicion; ?>">
  <div class="etapaEspecialidadesListaNumerada__fondo">
    <div class="wrapper">
      <div class="etapaEspecialidadesListaNumerada__titulo">
        <?php if ($subtitulo) : ?>
          <p class="subheading color--fff"><?php echo esc_html($subtitulo); ?></p>
        <?php endif; ?>

        <?php if ($titulo) : ?>
          <h2 class="heading--48 color--fff"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
      </div>

      <?php if($items) : ?>
        <div class="etapaEspecialidadesListaNumerada__listas">
          <?php 
          foreach ($items as $key => $item) {
          ?>
            <div class="etapaEspecialidadesListaNumerada__lista">
              <span class="numero color--fff">0<?php echo $key + 1; ?></span>
              <?php if(!empty($item['titulo'])) : ?>
              <h3 class="heading--24 color--fff"><?php echo esc_html($item['titulo']);?></h3>
              <?php endif; ?>
              
              <?php if(!empty($item['detalle'])) : ?>
              <div class="heading--18 color--fff">
                <?php echo $item['detalle'];?>
              </div>
              <?php endif; ?>
            </div>
          <?php } ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>