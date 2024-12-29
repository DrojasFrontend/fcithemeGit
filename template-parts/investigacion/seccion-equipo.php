<?php 
$sitename      = esc_html(get_bloginfo('name'));
$grupo_equipo  = get_field('grupo_equipo');
$titulo        = !empty($grupo_equipo['titulo']) ? esc_html($grupo_equipo['titulo']) : '';
$items         = !empty($grupo_equipo['equipo']) ? $grupo_equipo['equipo'] : [];
?>

<section class="investigacionesNuestroEquipo">
  <div class="container--large">
    <div class="investigacionesNuestroEquipo__titulo">
      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
      <?php endif; ?>
    </div>
  </div>
  <?php if($items) { ?>
    <div class="investigacionesNuestroEquipo__fondo">
      <div class="investigacionesNuestroEquipo__items">
        <?php 
        $total_items = count($items);
        foreach (array_chunk($items, 2) as $chunk_key => $chunk) { 
        ?>
          <div class="investigacionesNuestroEquipo__wrapper">
            <div class="container--large">

              <?php foreach ($chunk as $key => $item) {
                $nombre           = !empty($item['nombre']) ? esc_html($item['nombre']) : '';
                $cargo            = !empty($item['cargo']) ? esc_html($item['cargo']) : '';
                $contacto         = !empty($item['contacto']) ? $item['contacto'] : [];
                $contacto_link    = !empty($contacto['url']) ? $contacto['url'] : '';
                $contacto_titulo  = !empty($contacto['title']) ? $contacto['title'] : '';
                $contacto_target  = !empty($contacto['target']) ? $contacto['target'] : '';
                $consultas        = !empty($item['consultas']) ? $item['consultas'] : '';
                $imagen_id        = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
              ?>
                <div class="investigacionesNuestroEquipo__item">
                  <div class="investigacionesNuestroEquipo__img">
                    <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                  </div>
                  <div class="investigacionesNuestroEquipo__info">
                    <div>
                      <?php if($nombre) : ?>
                        <h3 class="heading--30 color--002D72 fw-300"><?php echo $nombre;?></h3>
                      <?php endif; ?>
                    </div>
                    
                    <div>
                      <?php if($cargo) : ?>
                        <p class="heading--18 color--263956"><strong>Cargo:</strong> <?php echo $cargo;?></p>
                      <?php endif; ?>
                    </div>
                    
                    <div>
                      <?php if($contacto_titulo) : ?>
                        <a href="<?php echo $contacto_link;?>" class="heading--18 color--263956" title="<?php echo $contacto_titulo;?>" target="<?php echo $contacto_target;?>">
                          <strong>Contacto:</strong> 
                          <span><?php echo $contacto_titulo;?></span>
                        </a>
                      <?php endif; ?>
                    </div>
                    
                    <div>
                      <?php if($consultas) : ?>
                        <p class="heading--18 color--263956"><strong>Consultas:</strong></p>
                        <?php echo $consultas;?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</section>
