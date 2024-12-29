<?php 
$sitename               = esc_html(get_bloginfo('name'));

$grupo_banner_principal = get_query_var('grupo_banner_principal');

$etiqueta               = !empty($grupo_banner_principal['etiqueta']) ? esc_html($grupo_banner_principal['etiqueta']) : "";
$titulo                 = !empty($grupo_banner_principal['titulo']) ? esc_html($grupo_banner_principal['titulo']) : "";

$cta                    = !empty($grupo_banner_principal['cta']) ? $grupo_banner_principal['cta'] : array();
$cta_url                = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_texto              = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target             = !empty($cta['target']) ? esc_attr($cta['target']) : '';

$imagen_id              = !empty($grupo_banner_principal["imagen"]['ID']) ? esc_attr($grupo_banner_principal["imagen"]['ID']) : '';
?>

<section class="seccionRevBanner">
    <div class="seccionRevBanner__grid">
        <div class="seccionRevBanner__col">
            <div class="seccionRevBanner__fondo">
                <div class="seccionRevBanner__info">
                    <?php if($etiqueta): ?>
                    <span class="seccionRevBanner__etiqueta heading--12 color--002D72">
                        <?php echo $etiqueta; ?>
                    </span>
                    <?php endif; ?>

                    <?php if($titulo): ?>
                    <h1 class="heading--64 color--002D72"><?php echo $titulo; ?></h1>
                    <?php endif; ?>

                    <?php if($cta_url): ?>
                    <a href="<?php echo $cta_url; ?>" title="<?php echo $cta_texto; ?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target; ?>">
                        <?php 
                            get_template_part('template-parts/content', 'icono');
                            display_icon('ico-whatsapp'); 
                        ?>
                        <?php echo $cta_texto; ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="seccionRevBanner__col">
            <div class="seccionRevBanner__img">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
        </div>
    </div>
</section>