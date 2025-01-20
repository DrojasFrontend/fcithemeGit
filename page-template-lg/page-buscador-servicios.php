<?php
/*
Template Name: Plantilla Buscador de servicios y especialidades
*/

get_header();

$sitename     = esc_html(get_bloginfo('name'));
$subtitulo    = !empty(get_field('subtitulo')) ? esc_html(get_field('subtitulo')) : '';
$titulo       = !empty(get_field('titulo')) ? esc_html(get_field('titulo')) : '';

$imagen_id    = !empty(get_field("fondo")) ? get_field("fondo") : '';
?>

<section class="directorioEspecialidades__hero">
    <div class="directorioEspecialidades__hero-img">
        <?php if ($imagen_id): ?>
            <img src="<?php echo $imagen_id; ?>" alt="<?php echo $titulo . ' ' .  $sitename; ?>" title="<?php echo $titulo; ?>">
        <?php endif; ?>
    </div>
    <div class="directorioEspecialidades__hero-contenido">
        <div class="container--large">
            <?php if ($subtitulo): ?>
                <p class="subheading color--fff"><?php echo $subtitulo; ?></p>
            <?php endif; ?>
        
            <?php if ($titulo): ?>
                <h1 class="heading--64 color--fff"><?php echo $titulo; ?></h1>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/directorio-especialidades/seccion', 'filtro-desktop') ?>
<?php get_template_part('template-parts/directorio-especialidades/seccion', 'filtro-mobile') ?>

<?php get_footer(); ?>