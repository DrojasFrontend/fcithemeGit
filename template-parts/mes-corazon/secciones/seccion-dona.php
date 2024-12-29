<?php 
$sitename     = esc_html(get_bloginfo('name'));
$grupo_donar  = get_field('grupo_donar');
$subtitulo    = !empty($grupo_donar['subtitulo']) ? esc_html($grupo_donar['subtitulo']) : '';
$encabezado   = !empty($grupo_donar['encabezado']) ? esc_html($grupo_donar['encabezado']) : '';
$descripcion  = !empty($grupo_donar['descripcion']) ? esc_html($grupo_donar['descripcion']) : '';
$cta          = !empty($grupo_donar['cta']) ? $grupo_donar['cta'] : null;
$cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_target   = !empty($cta['target']) ? esc_attr($cta['target']) : '';

$imagen_id    = !empty($grupo_donar["imagen"]['ID']) ? $grupo_donar["imagen"]['ID'] : '';
?>
<section class="paginaMesCorazonDona">
  <div class="container--large">
    <div class="paginaMesCorazonDona__grid-fondo">
      <div class="corazones-container"></div>
      <div></div>
    </div>
    <div class="paginaMesCorazonDona__grid">
      <div class="paginaMesCorazonDona__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size-x2', $sitename, 'desktop'); ?>
      </div>
      <div class="paginaMesCorazonDona__info">
        <?php if (!empty($subtitulo)) : ?>
          <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
        <?php endif; ?>

        <?php if (!empty($encabezado)) : ?>
          <h2 class="heading--48 color--002D72"><?php echo $encabezado; ?></h2>
        <?php endif; ?>

        <?php if (!empty($descripcion)) : ?>
          <p class="heading--18 font-sans color--002D72">
            <?php echo $descripcion; ?>
          </p>
        <?php endif; ?>
        
        <?php if (!empty($cta_url)) : ?>
          <a href="<?php echo $cta_url; ?>" class="boton-v2 boton-v2--blanco" title="Más sobre <?php echo $cta_titulo; ?>" target="<?php echo $cta_target; ?>">
            <?php echo $cta_titulo; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const corazonContainer = document.querySelector('.corazones-container');
    const numeroCorazones = 20;
    for (let i = 0; i < numeroCorazones; i++) {
      const corazones = document.createElement('div');
      corazones.classList.add('corazones');
      corazones.style.animationDelay = `${i * 0.2}s`; 
      corazonContainer.appendChild(corazones);
    }
  });
</script>
