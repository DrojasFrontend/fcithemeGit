<?php 
    $grupoHero = get_field('grupo_hero');
    $fondo = $grupoHero['fondo'] ?? '';
    $subtitulo = $grupoHero['subtitulo'] ?? '';
    $titulo = $grupoHero['titulo'] ?? '';
    $descripcion = $grupoHero['descripcion'] ?? '';
    $cta = $grupoHero['cta'] ?? '';

    $hayContenido = $subtitulo || $titulo || $descripcion;
?>

<?php if ($hayContenido): ?>
    <section class="hero-section pt-190 pt-113 pb-72 bg-hero" style="background-image: url('<?php echo esc_url($fondo['url']); ?>');">
        <div class="container text-center hero-content">
            <?php if( $subtitulo ): ?>
                <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
            <?php endif; ?>
            <?php if( $titulo ): ?>
                <h1 class="color--002D72"><?php echo esc_html($titulo); ?></h1>
            <?php endif; ?>
            <?php if( $descripcion ): ?>
                <div class="color--0C2448 mt-4 heading--18"><?php echo $descripcion; ?></div>
            <?php endif; ?>
            <?php
                if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                    $url = $cta['url'];
                    $texto = $cta['title'];
                    $target = $cta['target'] ? $cta['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" class="btn-amaranth d-block m-auto mt-4"><?php echo esc_html($texto); ?></a>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>