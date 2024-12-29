<?php 
$sitename      = esc_html(get_bloginfo('name'));
$grupo_equipos = get_field('grupo_equipos');
$items         = !empty($grupo_equipos['grupos']) ? $grupo_equipos['grupos'] : [];
?>

<section class="investigacionesEquipos">
  <?php foreach ($items as $grupo_key => $item) { ?>
    <div class="investigacionesEquipos__grupo <?php echo $item['fondo'] ? '' : 'no-padding'; ?>" style="background-color: <?php echo $item['fondo']; ?>">
      <div class="container--large">
        <div class="investigacionesEquipos__titulo">
          <h2 class="heading--48 color--002D72 fw-300"><?php echo $item['titulo'] ?></h2>
        </div>
        <div class="investigacionesEquipos__tarjetas" id="grupo-<?php echo $grupo_key; ?>">
          <?php foreach ($item['tarjetas'] as $tarjeta_key => $tarjeta) { ?>
            <div class="investigacionesEquipos__tarjeta">
              <div class="investigacionesEquipos__tarjeta-top">
                <?php if($tarjeta['titulo']) { ?>
                  <h3 class="heading--24 color--002D72 fw-500"><?php echo $tarjeta['titulo'] ?></h3>
                <?php } ?>

                <?php if($tarjeta['lider']) { ?>
                  <p class="heading--18 color--263956"><strong>Lider:</strong> <?php echo $tarjeta['lider']?></p>
                <?php } ?>

                <?php if($tarjeta['contacto']) { ?>
                  <a href="<?php echo $tarjeta['contacto']['url'] ?>" class="heading--18 color--263956" title="<?php echo $tarjeta['contacto']['title'] ?>" target="<?php echo $tarjeta['contacto']['target'] ?>">
                    <strong>Contacto:</strong> <span><?php echo $tarjeta['contacto']['title'] ?></span>
                  </a>
                <?php } ?>
  
                <?php if($tarjeta['descripcion']) { ?>
                  <?php echo $tarjeta['descripcion'] ?>
                <?php } ?>
              </div>

              <?php if($tarjeta['cta']['title']) { ?>
                <a class="heading--18 cta" href="<?php echo $tarjeta['cta']['url'] ?>" title="<?php echo $tarjeta['cta']['url'] ?>" target="<?php echo $tarjeta['cta']['target'] ?>">
                  <span class="link--hover">
                    <?php echo $tarjeta['cta']['title'] ?>
                  </span>
                  <?php 
                    get_template_part('template-parts/content', 'icono');
                    display_icon('icono-arrow-next-rojo'); 
                  ?>
                </a>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="container--large">
        <button type="button" class="boton-v2 boton-v2--blanco-rojo" aria-label="cargar mas" data-load-mores="grupo-<?php echo $grupo_key; ?>">Ver más equipos</button>
      </div>
    </div>
  <?php } ?>
</section>