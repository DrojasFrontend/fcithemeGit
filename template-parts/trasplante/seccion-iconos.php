<?php 
$sitename     = esc_html(get_bloginfo('name'));
$grupo_iconos = get_field('grupo_iconos');
$posicion     = !empty($grupo_iconos['posicion']) ? esc_html($grupo_iconos['posicion']) : '';
$fondo        = !empty($grupo_iconos['fondo']) ? $grupo_iconos['fondo'] : '';
$subtitulo    = !empty($grupo_iconos['subtitulo']) ? esc_html($grupo_iconos['subtitulo']) : '';
$titulo       = !empty($grupo_iconos['titulo']) ? esc_html($grupo_iconos['titulo']) : '';
$items        = !empty($grupo_iconos['items']) ? $grupo_iconos['items'] : [];
?>

<section class="paginaTrasplantes" style="order: <?php echo $posicion; ?>">
  <div class="paginaTrasplantes__wrapper">
    <div class="container--large">
      <div class="paginaTrasplantes__titulo">
        <?php if($subtitulo) : ?>
          <p class="subheading color--263956 uppercase"><?php echo $subtitulo;?></p>
        <?php endif; ?>
      
        <?php if($titulo) : ?>
          <h2 class="heading--48 color--263956"><?php echo $titulo;?></h2>
        <?php endif; ?>
      </div>
      <div class="paginaTrasplantes__iconos">
        <?php foreach ($items as $key => $item) {
          $targeta_titulo       = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
          $targeta_descripcion  = !empty($item['descripcion']) ? $item['descripcion'] : '';
          $targeta_cta          = !empty($item['cta']) ? $item['cta'] : [];
          $targeta_cta_url      = !empty($targeta_cta['url']) ? $targeta_cta['url'] : '';
          $targeta_cta_titulo   = !empty($targeta_cta['title']) ? $targeta_cta['title'] : '';
          $targeta_cta_target   = !empty($targeta_cta['target']) ? $targeta_cta['target'] : '';
          $imagen_id            = !empty($item["icono"]) ? $item["icono"] : '';
        ?>
          <a href="<?php echo $targeta_cta_url; ?>" class="paginaTrasplantes__icono" target="<?php echo $targeta_cta_url; ?>" title="mas sobre <?php echo $targeta_titulo; ?>">
            <img src="<?php echo $imagen_id; ?>" alt="">
            <div class="paginaTrasplantes__info">
              <?php if($targeta_titulo):?>
                <h3 class="heading--18 color--263956"><?php echo $targeta_titulo; ?></h3>
              <?php endif; ?>
    
              <?php if($targeta_descripcion):?>
                <p class="heading--36 color--263956">
                  <?php echo $targeta_descripcion; ?>
                </p>
              <?php endif; ?>

              <?php if($targeta_cta_titulo) : ?>
                <span class="heading--18 color--E40046">
                  <span class="link--hover"><?php echo $targeta_cta_titulo; ?></span>
                  <?php 
                    get_template_part('template-parts/content', 'icono');
                    display_icon('icono-arrow-next-rojo'); 
                  ?>
                </span>
              <?php endif; ?>
            </div>
          </a>
        <?php }?>
      </div>
    </div>
  </div>
</section>