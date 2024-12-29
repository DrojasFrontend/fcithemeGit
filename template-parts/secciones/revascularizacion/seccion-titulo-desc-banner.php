<?php 
$sitename                 = esc_html(get_bloginfo('name'));
$grupo_titulo_desc_banner = get_query_var('grupo_titulo_desc_banner');

$subtitulo           = !empty($grupo_titulo_desc_banner["subtitulo"]) ? $grupo_titulo_desc_banner["subtitulo"] : '';
$titulo              = !empty($grupo_titulo_desc_banner["titulo"]) ? $grupo_titulo_desc_banner["titulo"] : '';
$descripcion         = !empty($grupo_titulo_desc_banner["descripcion"]) ? $grupo_titulo_desc_banner["descripcion"] : '';
$segunda_descripcion = !empty($grupo_titulo_desc_banner["segunda_descripcion"]) ? $grupo_titulo_desc_banner["segunda_descripcion"] : '';
$imagen_id           = !empty($grupo_titulo_desc_banner["imagen"]['ID']) ? $grupo_titulo_desc_banner["imagen"]['ID'] : '';

?>
<section class="seccionRevTextDescBanner">
    <div class="wrapper">
        <div class="seccionRevTextDescBanner__grid">
            <div class="seccionRevTextDescBanner__title">
                <?php if($subtitulo) :?>
                <p class="subheading color--002D72">
                    <?php echo $subtitulo; ?>
                </p>
                <?php endif;?>

                <?php if($titulo) :?>
                <h2 class="heading--48 color--002D72">
                    <?php echo $titulo; ?>
                </h2>
                <?php endif;?>
            </div>
            <div class="seccionRevTextDescBanner__info">
                <?php if($descripcion) :?>
                    <p class="heading--18 color--263956">
                        <?php echo $descripcion; ?>
                    </p>
                <?php endif;?>
            </div>
        </div>
        <div class="seccionRevTextDescBanner__img">
            <?php 
                echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
            ?>
        </div>
        <?php if($segunda_descripcion) :?>
            <div class="seccionRevTextDescBanner__desc">
                <p class="heading--18 color--263956">
                    <?php echo $segunda_descripcion; ?>
                </p>
            </div>
        <?php endif;?>
    </div>
</section>