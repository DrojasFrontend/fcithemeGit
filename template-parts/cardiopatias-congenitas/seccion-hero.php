<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_hero       = get_field("grupo_hero");
$imagen_id        = !empty($grupo_hero["imagen"]) ? $grupo_hero["imagen"] : '';
$imagen_id_mobile = !empty($grupo_hero["imagen_mobile"]) ? $grupo_hero["imagen_mobile"] : '';
/*$descripcion      = !empty($grupo_hero["descripcion"]) ? esc_html($grupo_hero["descripcion"]) : '';*/
$titulo           = !empty($grupo_hero["titulo"]) ? esc_html($grupo_hero["titulo"]) : '';
$descripcion      = !empty($grupo_hero["descripcion"]) ? $grupo_hero["descripcion"] : '';
$ctas             = !empty($grupo_hero["ctas"]) && is_array($grupo_hero["ctas"]) ? $grupo_hero["ctas"] : [];

?>

<section class="seccionHero">
  <div class="seccionHero__img">
    <img src="<?php echo esc_url($imagen_id['url']); ?>" alt="">
  </div>
	<div class="seccionHero__img-mobile">
		<img src="<?php echo esc_url($imagen_id_mobile['url']); ?>" alt="">
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
        <?php
            if (is_array($ctas) && isset($ctas['url'], $ctas['title'], $ctas['target'])) :
                $url = $ctas['url'];
                $texto = $ctas['title'];
                $target = $ctas['target'] ? $ctas['target'] : '_self';
        ?>
        <a class="boton-v2 boton-v2--rojo-rojo" 
            href="<?php echo esc_url($url); ?>" 
            target="<?php echo esc_attr($target); ?>">
            <?php echo esc_html($texto); ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
