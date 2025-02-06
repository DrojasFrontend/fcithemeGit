<?php 
$sitename         = esc_html(get_bloginfo('name'));
// $grupo_hero       = get_field("grupo_hero");
// $imagen_id        = !empty($grupo_hero["imagen"]['ID']) ? $grupo_hero["imagen"]['ID'] : '';
// $imagen_id_mobile = !empty($grupo_hero["imagen_mobile"]['ID']) ? $grupo_hero["imagen_mobile"]['ID'] : '';
// $descripcion      = !empty($grupo_hero["descripcion"]) ? esc_html($grupo_hero["descripcion"]) : '';
// $titulo           = !empty($grupo_hero["titulo"]) ? esc_html($grupo_hero["titulo"]) : '';
// $descripcion      = !empty($grupo_hero["descripcion"]) ? $grupo_hero["descripcion"] : '';
// $ctas             = !empty($grupo_hero["ctas"]) && is_array($grupo_hero["ctas"]) ? $grupo_hero["ctas"] : [];

$imagen_id = "/wp-content/themes/fcitheme/template-parts/cardiopatias-congenitas/img/hero.png";
$imagen_id_mobile = "";
$titulo = "Cardiopatías congénitas";
$descripcion = "Identificarlas a tiempo puede marcar la diferencia. Realiza los exámenes y recibe atención especializada.";

$hero_cta_url      = "#";
$hero_cta_titulo   = "Agenda tu cita ahora";
$hero_cta_target   = "";

?>

<section class="seccionHero">
  <div class="seccionHero__img">
    <!-- <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, 'visibleDesktop');?>
    <?php echo generar_imagen_responsive($imagen_id_mobile, 'custom-size', $sitename, 'visibleMobile');?> -->
    <img src="<?php echo $imagen_id; ?>" alt="">
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
        <a class="boton-v2 boton-v2--rojo-rojo" 
          href="<?php echo esc_url($hero_cta_url); ?>" 
          title="<?php echo esc_attr($hero_cta_titulo); ?>">
          <?php echo esc_html($hero_cta_titulo); ?>
        </a>
      </div>
    </div>
  </div>
</section>
