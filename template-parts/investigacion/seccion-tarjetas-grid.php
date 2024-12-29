<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_targetas_grid    = get_field('grupo_targetas_grid');
$subtitulo              = !empty($grupo_targetas_grid['subtitulo']) ? esc_html($grupo_targetas_grid['subtitulo']) : '';
$titulo                 = !empty($grupo_targetas_grid['titulo']) ? esc_html($grupo_targetas_grid['titulo']) : '';
$items                  = !empty($grupo_targetas_grid['items']) ? $grupo_targetas_grid['items'] : [];

?>

<section class="investigacionTarjetaGrid">
  <div class="investigacionTarjetaGrid__wrapper">
    <div class="container--large">
      <div class="investigacionTarjetaGrid__titulo">
        <?php if($subtitulo):?>
          <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if($titulo):?>
          <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
        <?php endif; ?>
      </div>
      <div class="investigacionTarjetaGrid__grid">
        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
          $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          $enlace               = !empty($item['enlace']) ? $item['enlace'] : [];
          $imagen_id            = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
        ?>
          <div class="investigacionTarjetas__tarjeta">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            <div class="investigacionTarjetas__info">
              
              <?php if($targeta_titulo):?>
                <h3><?php echo $targeta_titulo; ?></h3>
              <?php endif; ?>

              <?php if($targeta_descripcion):?>
                <?php echo $targeta_descripcion; ?>
              <?php endif; ?>

              <?php if($enlace['title']):?>
                <a href="<?php echo $enlace['url']; ?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $enlace['target']; ?>">
                  <?php echo $enlace['title']; ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>