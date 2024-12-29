<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_directorio   = get_field('grupo_directorio');
$posicion           = !empty($grupo_directorio['posicion']) ? esc_html($grupo_directorio['posicion']) : '';
$fondo              = !empty($grupo_directorio['fondo']) ? $grupo_directorio['fondo'] : '';
$subtitulo          = !empty($grupo_directorio['subtitulo']) ? esc_html($grupo_directorio['subtitulo']) : '';
$titulo             = !empty($grupo_directorio['titulo']) ? esc_html($grupo_directorio['titulo']) : '';
$icono              = !empty($grupo_directorio['icono']) ? esc_html($grupo_directorio['icono']) : '';
$items              = !empty($grupo_directorio['items']) ? $grupo_directorio['items'] : [];

$imagen_id          = !empty($grupo_directorio["imagen"]['ID']) ? $grupo_directorio["imagen"]['ID'] : '';
?>

<section class="paginaTrasplanteDirectorio" style="order: <?php echo $posicion; ?>">
  <div class="paginaTrasplanteDirectorio__fondo" style="background-color: <?php echo $fondo; ?>">
    <div class="container--large">
      <div class="paginaTrasplanteDirectorio__grid">
        <div class="paginaTrasplanteDirectorio__img">
          <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
        </div>
        <div class="paginaTrasplanteDirectorio__info">
          <div class="paginaTrasplanteDirectorio__titulo">
            <?php if($subtitulo) : ?>
              <p class="subheading color--263956 uppercase"><?php echo $subtitulo;?></p>
            <?php endif; ?>

            <?php if($titulo) : ?>
              <h2 class="heading--48 color--263956"><?php echo $titulo;?></h2>
            <?php endif; ?>
          </div>
          <ul class="paginaTrasplanteDirectorio__items">
            <?php foreach ($items as $key => $item) {
              $detalle   = !empty($item['detalle']) ? $item['detalle'] : [];
              $telefono  = !empty($item['telefono']) ? $item['telefono'] : "";
              $telefono  = !empty($item['telefono']) ? $item['telefono'] : "";
            ?>
              <li>
                <a class="heading--18 color--263956" href="tel:<?php echo $telefono; ?>" title="numero de contacto <?php echo $telefono; ?>" target="_blank">
                  <?php echo $detalle; ?>
                  <img width="24" height="24" src="<?php echo $icono; ?>" alt="<?php echo $icono; ?>" title="mas informacion <?php echo $icono; ?>">
                </a>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>