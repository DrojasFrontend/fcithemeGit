<?php
// Obtener el URL y la imagen del logo secundario desde las opciones del tema
$secundary_logo_url = get_theme_mod('secundary_logo_url');
$secundary_logo = get_theme_mod('secundary_logo');

// Solo necesitamos verificar si existe el logo
if ($secundary_logo) : ?>
    <div class="customHeader__logo-sec">
        <a href="<?php echo esc_url($secundary_logo_url ? $secundary_logo_url : home_url('/')); ?>">
            <img 
                src="<?php echo esc_url($secundary_logo); ?>" 
                alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
            >
        </a>
    </div>
<?php endif; ?>