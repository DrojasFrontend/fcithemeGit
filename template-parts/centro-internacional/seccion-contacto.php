<?php 
$sitename       = esc_html(get_bloginfo('name'));
$grupo_contacto = get_field("grupo_contacto");
$subtitulo      = !empty($grupo_contacto["subtitulo"]) ? esc_html($grupo_contacto["subtitulo"]) : '';
$titulo         = !empty($grupo_contacto["titulo"]) ? esc_html($grupo_contacto["titulo"]) : '';
$items          = !empty($grupo_contacto["items"]) && is_array($grupo_contacto["items"]) ? $grupo_contacto["items"] : [];
?>

<section class="seccionContacto">
    <div class="container--large">
        <div class="seccionContacto__titulo">
            <?php if ($subtitulo): ?>
                <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
            <?php endif; ?>
            <?php if ($titulo): ?>
                <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
            <?php endif; ?>
        </div>

        <ul>
            <?php foreach ($items as $key => $item) { 
                $nombre = !empty($item['nombre']) ? esc_html($item['nombre']) : '';
                $rol    = !empty($item['rol']) ? esc_html($item['rol']) : '';
                $idioma = !empty($item['idioma']) ? $item['idioma'] : '';
            ?>
            <li>
                <?php if($nombre) { ?>
                    <h3 class="heading--24 color--002D72"><?php echo $nombre; ?></h3>
                <?php } ?>

                <?php if($rol) { ?>
                    <p class="heading--18 color--263956 rol"><?php echo $rol; ?></p>
                <?php } ?>

                <?php if($idioma) { ?>
                    <p class="heading--14 color--002D72 idioma"><?php echo $idioma; ?></p>
                <?php } ?>

                <p class="heading--14 color--002D72">Contacto:</p>
                <?php foreach ($item['ctas'] as $key => $cta) {  
                    $targeta_cta          = !empty($cta['cta']) ? $cta['cta'] : [];
                    $targeta_icono        = !empty($cta['icono']) ? $cta['icono'] : '';
                    $targeta_cta_url      = !empty($targeta_cta['url']) ? $targeta_cta['url'] : "";
                    $targeta_cta_titulo   = !empty($targeta_cta['title']) ? $targeta_cta['title'] : "";
                    $targeta_cta_target   = !empty($targeta_cta['target']) ? $targeta_cta['target'] : "";
                ?>
                    <?php if($targeta_cta_url) { ?>
                        <a class="heading--18 color--E40046" href="<?php echo $targeta_cta_url ; ?>" target="<?php echo $targeta_cta_target ; ?>" title="<?php echo $targeta_cta_titulo ; ?>">
                            <img width="24" height="24" src="<?php echo $targeta_icono; ?>" alt="<?php echo $targeta_cta_titulo ; ?>">
                            <span><?php echo $targeta_cta_titulo ; ?></span>
                        </a>
                    <?php } ?>
                <?php } ?>
            </li>
            <?php } ?>
        </ul>
        
    </div>
</section>
