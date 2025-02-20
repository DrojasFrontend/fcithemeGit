<?php 
$sitename     = esc_html(get_bloginfo('name'));
$ctas = [
    [
        'imagen' => IMG_BASE . 'lacardio.svg',
        'alt' => 'lacardio',
        'link' => 'https://www.lacardio.org/'
    ],
    [
        'imagen' => IMG_BASE . 'fundacion-cardioinfantil.svg',
        'alt' => 'fundacion cardioinfantil',
        'link' => 'https://fundacion.cardioinfantil.org/'
    ],
]
?>
<section class="seccionCardioUCta">
    <div class="wrapper">
        <div class="seccionCardioUCta__titulo">
            <h2 class="heading--48 color--002D72">Juntos somos más</h2>
            <p class="heading--18 color--263956">La opinión de nuestros estudiantes, es muy impotante para nosotros</p>
        </div>
        <div class="seccionCardioUCta__grid">
            <?php foreach ($ctas as $key => $cta) { ?>
                <a href="<?php echo $cta['link']; ?>" title="<?php echo $cta['alt']; ?>">
                    <img src="<?php echo $cta['imagen']; ?>" alt="<?php echo $cta['alt'] . ' - ' . $sitename ?>" title="<?php echo $cta['alt']; ?>">
                    <span class="heading--18 color--E40046">
                        <span class="hover hover--rojo">Ir al sitio</span>
                        <?php 
                            get_template_part('template-parts/content', 'icono');
                            display_icon('arrow-rojo'); 
                        ?>
                    </span>
                </a>
            <?php } ?>
        </div>
    </div>
</section>