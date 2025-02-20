<?php 
$grupo_ctas   = get_field('grupo_ctas');
$posicion     = !empty($grupo_ctas['posicion']) ? esc_html($grupo_ctas['posicion']) : '';
$subtitulo    = !empty($grupo_ctas['subtitulo']) ? esc_html($grupo_ctas['subtitulo']) : '';
$titulo       = !empty($grupo_ctas['titulo']) ? esc_html($grupo_ctas['titulo']) : '';
$enlaces      = !empty($grupo_ctas['enlaces']) ? $grupo_ctas['enlaces'] : [];
?>

<section class="etapaEspecialidadesCTAS" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="etapaEspecialidadesCTAS__titulo">
      <?php if($subtitulo) : ?>
        <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
      <?php endif; ?>

      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
      <?php endif; ?>
    </div>

    <?php if($enlaces) : ?>
      <div class="etapaEspecialidadesCTAS__ctas">
        <?php foreach ($enlaces as $key => $enlace) {
          $cta          = !empty($enlace['cta']) ? $enlace['cta'] : [];
          $cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
          $cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
          $cta_target   = !empty($cta['target']) ? $cta['target'] : '';
        ?>
          <a href="<?php echo $cta_url; ?>" class="heading--18 color--002D72 etapaEspecialidadesCTAS__cta" target="<?php echo $cta_target; ?>" title="mas sobre <?php echo $cta_titulo; ?>">
            <?php echo $cta_titulo; ?>
            <?php 
              get_template_part('template-parts/content', 'icono');
              display_icon('arrow-rojo'); 
            ?>
          </a>
        <?php } ?>
      </div>
    <?php endif; ?>
  </div>
</section>