<?php 
$sitename          = esc_html(get_bloginfo('name'));
$grupo_testimonios = get_query_var('grupo_testimonios');
$titulo            = !empty($grupo_testimonios['titulo']) ? esc_html($grupo_testimonios['titulo']) : '';
$descripcion       = !empty($grupo_testimonios['descripcion']) ? esc_html($grupo_testimonios['descripcion']) : '';
$testimonios       = !empty($grupo_testimonios['testimonios']) ? $grupo_testimonios['testimonios'] : [];
?>

<section class="seccionCardioUTestimonios">
    <div class="wrapper">
        <div class="seccionCardioUTestimonios__titulo">
            <?php if($titulo) : ?>
            <h2 class="heading--48 color--002D72">
                <?php echo $titulo; ?>
            </h2>
            <?php endif; ?>
            
            <?php if($descripcion) : ?>
                <p class="heading--18 color--263956">
                    <?php echo $descripcion; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
    <div class="seccionCardioUTestimonios__wrapper">
        <div class="slickCardioUTestimonio slickPersonalizado">
            <?php foreach ($testimonios as $key => $testimonio) { ?>
                <div class="seccionCardioUTestimonio">
                    <img src="<?php echo $testimonio['avatar']?>" alt="<?php echo $testimonio['nombre'] . ' - ' . $sitename; ?>" title="<?php echo $testimonio['avatar']?>">
                    <h3 class="heading--24 color--002D72"><?php echo $testimonio['nombre']?></h3>
                    <p class="heading--18 color--263956"><?php echo $testimonio['detalle']?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

