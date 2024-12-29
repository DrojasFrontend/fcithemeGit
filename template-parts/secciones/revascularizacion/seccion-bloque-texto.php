<?php 
$sitename           = esc_html(get_bloginfo('name'));
$grupo_bloque_texto = get_query_var('grupo_bloque_texto');
$fondo              = !empty($grupo_bloque_texto['fondo']) ? $grupo_bloque_texto['fondo'] : '';
$icono              = !empty($grupo_bloque_texto['icono']) ? esc_url($grupo_bloque_texto['icono']) : '';
$subtitulo          = !empty($grupo_bloque_texto['subtitulo']) ? esc_html($grupo_bloque_texto['subtitulo']) : '';
$titulo             = !empty($grupo_bloque_texto['titulo']) ? $grupo_bloque_texto['titulo'] : '';
?>
<section class="seccionRevBloqueTexto">
    <div class="seccionRevBloqueTexto__fondo" style="background-color: <?php echo $fondo ? $fondo : ''  ?>">
        <div class="wrapper">
            <div class="seccionRevBloqueTexto__texto">
                <div class="seccionRevBloqueTexto__icon">
                    <?php if($icono) : ?>
                    <img src="<?php echo $icono; ?>" alt="">
                    <?php endif; ?>

                    <?php if($subtitulo) : ?>
                    <p class="heading--24 color--002D72"><?php echo $subtitulo; ?></p>
                    <?php endif; ?>
                </div>
                <?php if($titulo) : ?>
                <div class="heading--36 color--002D72">
                    <?php echo $titulo; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>