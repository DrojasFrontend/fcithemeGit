<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_hero       = get_field("grupo_hero");
$imagen_id        = !empty($grupo_hero["imagen"]['ID']) ? $grupo_hero["imagen"]['ID'] : '';
$imagen_id_mobile = !empty($grupo_hero["imagen_mobile"]['ID']) ? $grupo_hero["imagen_mobile"]['ID'] : '';
$descripcion      = !empty($grupo_hero["descripcion"]) ? esc_html($grupo_hero["descripcion"]) : '';
$titulo           = !empty($grupo_hero["titulo"]) ? esc_html($grupo_hero["titulo"]) : '';
$descripcion      = !empty($grupo_hero["descripcion"]) ? $grupo_hero["descripcion"] : '';
$ctas             = !empty($grupo_hero["ctas"]) && is_array($grupo_hero["ctas"]) ? $grupo_hero["ctas"] : [];
?>

<section class="seccionHero">
  <div class="seccionHero__img">
    <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, 'visibleDesktop');?>
    <?php echo generar_imagen_responsive($imagen_id_mobile, 'custom-size', $sitename, 'visibleMobile');?>
  </div>
  <div class="seccionHero__contenido">
    <div class="container--large">
      <div class="seccionHero__titulo">
        <?php if ($titulo): ?>
          <h1 class="heading--64 color--002D72"><?php echo $titulo; ?></h1>
        <?php endif; ?>
          
        <?php if ($descripcion): ?>
          <p class="heading--18 color--0C2448"><?php echo $descripcion; ?></p>
        <?php endif; ?>
      </div>
      <div class="seccionHero__ctas">
        <?php foreach ($ctas as $key => $cta) { 
          $hero_cta          = !empty($cta['cta']) ? $cta['cta'] : [];
          $hero_cta_url      = !empty($hero_cta['url']) ? $hero_cta['url'] : "";
          $hero_cta_titulo   = !empty($hero_cta['title']) ? $hero_cta['title'] : "";
          $hero_cta_target   = !empty($hero_cta['target']) ? $hero_cta['target'] : "";
        ?>
          <a class="boton-v2 <?php echo ($key === 1) ? 'boton-v2--rojo-rojo' : 'boton-v2--blanco-rojo'; ?>" 
            href="<?php echo esc_url($hero_cta_url); ?>" 
            title="<?php echo esc_attr($hero_cta_titulo); ?>">
            <?php echo esc_html($hero_cta_titulo); ?>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
