<?php
    $sitename   = get_bloginfo('name');
    $homeurl    = get_home_url();
    $logo_id    = get_theme_mod('custom_logo');
    $logo       = wp_get_attachment_image_src($logo_id, 'full');
?>

<div class="customHeaderTop">
	<div class="customHeaderTop__wrapper">
	<div>
	<a href="https://www.elempleo.com/co/sitio-empresarial/cardio-infantil" target="_blank" title="Trabaja con nosotros">Trabaja con nosotros</a>
	<a href="https://www.lacardio.org/ley-de-transparencia/" target="_blank" title="Ley de transparencia">Ley de transparencia</a>
	</div>
	<div>
		<a href="tel:601756 3426" target="_blank" title="Línea de atención">Línea de atención: (601) 756 3426</a>
    </div>
    </div>	
</div>
<header class="customHeader">
    <div class="customHeader__wrapper">
        <!-- logo -->
        <div class="customHeader__logo">
            <a href="<?php echo esc_url($homeurl) ?>">
                <?php if ($logo) { ?>
                    <img src="<?php echo esc_url($logo[0]) ?>" alt="Logo <?php echo esc_attr($sitename) ?>" width="127" height="46" />
                <?php } ?>
            </a>
        </div>
        <!-- Fin Logo -->
        <button class="customHeader-boton__menu" type="button" id="js-toggle-button">
            <span></span>
        </button>
        <!-- Menu Escritorio -->
        <?php get_template_part('template-parts/page/header/content', 'header-escritorio') ?>
        <!-- Fin Menu Escritorio -->
        <!-- Menu Escritorio -->
        <?php get_template_part('template-parts/page/header/content', 'header-mobile') ?>
        <!-- Fin Menu Escritorio -->
		<!-- Logo fundacion cardioinfantil -->
        <?php get_template_part('template-parts/page/header/content', 'header-logo') ?>
        <!-- Fin Logo fundacion cardioinfantil -->
    </div>
</header>