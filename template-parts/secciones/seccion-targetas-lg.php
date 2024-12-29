<?php 
$sitename       = esc_html(get_bloginfo('name'));
// $grupo_nosotros = get_field("grupo_nosotros");

$targetas       = get_page_by_path('home-prueba')->ID;
$grupo_nosotros = ($targetas) ? get_field('grupo_nosotros', $targetas) : null;

$fondo          = !empty($grupo_nosotros["fondo"]) ? esc_attr($grupo_nosotros["fondo"]) : '';
$color_texto    = !empty($grupo_nosotros['color_texto']) ? esc_html($grupo_nosotros['color_texto']) : '';
$titulo         = !empty($grupo_nosotros["titulo"]) ? esc_html($grupo_nosotros["titulo"]) : '';
$subtitulo      = !empty($grupo_nosotros["subtitulo"]) ? esc_html($grupo_nosotros["subtitulo"]) : '';

$targetas       = !empty($grupo_nosotros["targetas"]) ? $grupo_nosotros["targetas"] : [];
?>

<section class="seccionTargetas">
    <div class="seccionTargetas__fondo" style="background-color: <?php echo $fondo; ?>">
        <div class="container--large">
            <div class="seccionTargetas__titulo">
                <?php if (!empty($subtitulo)): ?>
                    <p style="color: <?php echo $color_texto; ?>" class="heading--14"><?php echo $subtitulo; ?></p>
                <?php endif; ?>
                <?php if (!empty($titulo)): ?>
                    <h2 style="color: <?php echo $color_texto; ?>" class="heading--48"><?php echo $titulo; ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="seccionTargetas__container">
            <div class="seccionTargetas__grid slickTargetas slickPersonalizado" id="sliderAtencionInvestigacion">
                <?php foreach ($targetas as $key => $targeta) { 
                    set_query_var('targeta', $targeta);
                    get_template_part('template-parts/secciones/seccion', 'targeta-lg'); 
                } ?>
            </div>
        </div>
    </div>
</section>