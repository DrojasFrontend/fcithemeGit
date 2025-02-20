<?php 
$sitename     = esc_html(get_bloginfo('name'));
$grupo_hero   = get_field('grupo_hero');
$posicion     = !empty($grupo_hero['posicion']) ? esc_html($grupo_hero['posicion']) : '';
$titulo       = !empty($grupo_hero['titulo']) ? esc_html($grupo_hero['titulo']) : '';
$descripcion  = !empty($grupo_hero['descripcion']) ? esc_html($grupo_hero['descripcion']) : '';
$cta          = !empty($grupo_hero['cta']) ? $grupo_hero['cta'] : [];
$cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target   = !empty($cta['target']) ? $cta['target'] : '';

$imagen_id    = !empty($grupo_hero["imagen"]['ID']) ? $grupo_hero["imagen"]['ID'] : '';
?>

<section class="etapaEspecialidadesHero <?php echo $args['class']; ?>" style="order: <?php echo $posicion; ?>">
  <div class="etapaEspecialidadesHero__fondo desktop">
    <div></div>
    <div>
      <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
    </div>
  </div>
  <div class="container--large">
    <div class="etapaEspecialidadesHero__grid">
      <div class="etapaEspecialidadesHero__text">
        <?php if($titulo) : ?>
          <h1 class="heading--64 color--fff fw-400"><?php echo $titulo;?></h1>
        <?php endif; ?>

        <?php if($descripcion) : ?>
          <p class="heading--18 color--fff">
            <?php echo $descripcion;?>
          </p>
        <?php endif; ?>

        <?php if ($cta_url) : ?>
          <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--rojo-rojo" target="<?php echo $cta_target;?>">
            <?php 
              get_template_part('template-parts/content', 'icono');
              display_icon('ico-email'); 
            ?>
            <?php echo $cta_titulo;?>
          </a>
        <?php endif; ?>
      </div>
      <div class="etapaEspecialidadesHero__img">
        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
      </div>
    </div>
  </div>
</section>