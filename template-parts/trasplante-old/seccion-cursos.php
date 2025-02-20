<?php 
$grupo_cursos = get_field('grupo_cursos');
$posicion     = !empty($grupo_cursos['posicion']) ? esc_html($grupo_cursos['posicion']) : '';
$subtitulo    = !empty($grupo_cursos['subtitulo']) ? esc_html($grupo_cursos['subtitulo']) : '';
$titulo       = !empty($grupo_cursos['titulo']) ? esc_html($grupo_cursos['titulo']) : '';
$enlaces      = !empty($grupo_cursos['ctas']) ? $grupo_cursos['ctas'] : [];
?>

<section class="etapaTrasplanteCursos <?php echo isset($args['class']) ? $args['class'] : ''; ?>" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaTrasplanteCursos__titulo">

    <?php if($subtitulo) : ?>
        <p class="subheading color--263956"><?php echo $subtitulo; ?></p>
      <?php endif; ?>

      <?php if($titulo) : ?>
        <h2 class="heading--48 color--263956"><?php echo $titulo; ?></h2>
      <?php endif; ?>
      
    </div>
    <?php if($enlaces) : ?>
      <div class="etapaTrasplanteCursos__ctas">
        <?php foreach ($enlaces as $key => $enlace) {
          $cta          = !empty($enlace['cta']) ? $enlace['cta'] : [];
          $cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
          $cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
          $cta_target   = !empty($cta['target']) ? $cta['target'] : '';
        ?>
          <?php if($cta_url) : ?>
            <a href="<?php echo $cta_url; ?>" class="heading--24 color--002D72 etapaTrasplanteCursos__cta" target="<?php echo $cta_target; ?>" title="mas sobre <?php echo $cta_titulo; ?>">
              <?php echo $cta_titulo; ?>
              <span class="heading--18 color--E40046">
                Ver sede
                <?php 
                  get_template_part('template-parts/content', 'icono');
                  display_icon('arrow-rojo'); 
                ?>
              </span>
            </a>
          <?php endif; ?>
        <?php } ?>
      </div>
    <?php endif; ?>
  </div>
</section>