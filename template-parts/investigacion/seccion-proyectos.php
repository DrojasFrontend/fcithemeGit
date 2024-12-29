<?php 
$sitename        = esc_html(get_bloginfo('name'));
$grupo_proyectos = get_field('grupo_proyectos');
$subtitulo       = !empty($grupo_proyectos['subtitulo']) ? esc_html($grupo_proyectos['subtitulo']) : '';
$titulo          = !empty($grupo_proyectos['titulo']) ? esc_html($grupo_proyectos['titulo']) : '';
$descripcion     = !empty($grupo_proyectos['descripcion']) ? wp_kses_post($grupo_proyectos['descripcion']) : '';
$items           = !empty($grupo_proyectos['items']) ? $grupo_proyectos['items'] : [];
?>

<div class="investigacionesProyectos">
  <div class="container--large">
    <div class="investigacionesProyectos__titulo">
      <?php if($subtitulo) : ?>
        <p class="subheading color--002D72">
          <?php echo $subtitulo;?>
        </p>
      <?php endif; ?>
  
      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72 fw-300"><?php echo $titulo;?></h2>
      <?php endif; ?>
  
      <?php if($descripcion) : ?>
        <p class="heading--18 color--263956">
          <?php echo $descripcion;?>
        </p>
      <?php endif; ?>
    </div>
  </div>
  <div class="investigacionesProyectos__tab-buttons">
    <div class="container--large">
      <div class="investigacionesProyectos__scroll">
        <?php foreach ($items as $key => $item) { 
          $imagen_id = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
        ?>
          <button class="investigacionesProyectos__tab-button <?php echo $key == 0 ? 'active' : ''; ?>" data-tab="tab<?php echo $key; ?>"><?php echo $item['titulo_tab']?></button>
        <?php } ?>
      </div>
    </div>
  </div>
    
  <div class="investigacionesProyectos__tab-contents">
    <div class="container--large">
      <?php foreach ($items as $key => $item) { 
        $imagen_id = !empty($item["imagen"]['ID']) ? $item["imagen"]['ID'] : '';
      ?>
        <div id="tab<?php echo $key; ?>" class="investigacionesProyectos__tab-content <?php echo $key == 0 ? 'active' : ''; ?>">
          <div>
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
          </div>
          <div>
            <h3 class="heading--36 color--002D72 fw-500"><?php echo $item['titulo']?></h3>
            <p class="heading--18 color--263956">
              <?php echo $item['descripcion']?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>



