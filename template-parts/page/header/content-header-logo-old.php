<?php
// Obtener el URL y la imagen del logo secundario desde las opciones del tema
$secundary_logo_url = get_theme_mod('secundary_logo_url');
$secundary_logo = get_theme_mod('secundary_logo');
?>
<?php if (!empty($secundary_logo_url) && !empty($secundary_logo)) : ?>
<div class="customHeader__logo-sec">
	<a href="<?php echo esc_url($secundary_logo_url); ?>">
    	<img src="<?php echo esc_url($secundary_logo); ?>" alt="<?php bloginfo('name'); ?>">
    </a>
</div>
<?php endif; ?>