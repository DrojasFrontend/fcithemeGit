<?php 
/*
    Template Name: Ley Transparencia
*/
$breadcrumbs = get_field('breadcrumbs');

$sitename     = get_bloginfo('name');
$grupo_banner = get_field('grupo_banner');
$titulo_banner = !empty($grupo_banner['titulo']) ? $grupo_banner['titulo'] : '';
$descripcion_banner = !empty($grupo_banner['descripcion']) ? $grupo_banner['descripcion'] : '';
$bckg_banner = !empty($grupo_banner['imagen']) ? $grupo_banner['imagen'] : '';

$grupo_tabs = get_field('grupo_tabs');
$tabs = $grupo_tabs['tabs'];

get_header();

?>
<!-- CONTENIDO -->
<main class="">
<?= get_template_part('template-parts/content'); ?>

<div class="breadcrumbs">
        <p id="breadcrumbs" class="claro">
            <span>
                <a style="text-decoration: none!important;" href="https://www.lacardio.org/" data-wpel-link="internal">LaCardio</a>
            </span>
            <?php foreach ($breadcrumbs as $breadcrumb): ?>
                » 
                <span>
                    <a style="text-decoration: none!important;" href="<?= $breadcrumb["link_breadcrumb"]?>">
                        <?= $breadcrumb["breadcrumb"]?>
                    </a>
                </span>
            <?php endforeach ?>

        </p>
    </div>	
	
<!-- Banner -->
    <section class="seccionBannerTexto">
        <div class="seccionBannerTexto__bckg" style="background-image: url(<?php echo $bckg_banner; ?>)">
            <div class="wrapper">
                <div class="seccionBannerTexto__title">
                    <?php if($titulo_banner) : ?>
                        <h1 class="heading--64 color--fff"><?php echo $titulo_banner?></h1>
                    <?php endif; ?>
                    <?php if($descripcion_banner) : ?>
                        <p class="heading--18 color--fff font-sans"><?php echo $descripcion_banner; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<!-- Fin Banner -->

<!-- Tabs -->
    <section class="seccionTabs">
        <div class="wrapper">
            <ul class="tab-links">
                <!-- Tabs Links -->
                <?php foreach ($tabs as $key => $tab) { ?>
                    <li class="<?php echo $key == 0 ? 'active' : ''; ?>"><a href="#tab<?php echo $key; ?>"><?php echo $tab['titulo_tab']?></a></li>
                <?php } ?>
                <!-- Fin Tabs Links -->
            </ul>
        </div>
        <div class="seccionTabs__line"></div>
        <div class="tab-content">
            <!-- Links -->
            <?php foreach ($tabs as $key => $tab) { ?>
                <div class="<?php echo $key == 0 || $key == 1 ? 'wrapper' : ''; ?>">
                    <div class="<?php echo $key == 2 ? 'wrapper' : ''; ?>">
                        <div id="tab<?php echo $key; ?>" class="tab <?php echo $key == 0 ? 'active' : ''; ?>">
                            <div class="seccionTabs__ancla">
                                <h2 class="d-none"><?php echo $tab['titulo_tab'] ?></h2>
                                <?php foreach ($tab['links'] as $idx => $link) { ?>
                                    <a href="<?php echo $link['enlace']['url']?>" target="<?php echo $link['enlace']['target']?>" title="<?php echo $link['enlace']['title']?>">
                                        <h3 class="heading--24 nombre"><?php echo $link['enlace']['title']?></h3>
                                        <span class="heading--18 link">
                                            Conoce más
                                            <?php 
                                                get_template_part('template-parts/content', 'icono');
                                                display_icon('arrow-rojo'); 
                                            ?>
                                        </span>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php if($tab['agregar_video']) : ?>
                                <div class="seccionTabs__multimedia">
                                    <h3 class="heading--48 color--002D72">Contenido Multimedia</h3>

                                    <div class="seccionTabs__videos slickMultimedia slickPersonalizado">
                                        <!-- Videos -->
                                        <?php foreach ($tab['videos'] as $idx => $video) { ?>
                                            <a href="<?php echo $video['enlace']['url']; ?>" target="<?php echo $video['enlace']['target']; ?>" class="seccionTabs__video" title="<?php echo $video['enlace']['title']; ?>">
                                                <div href="" class="seccionTabs__card">
                                                    <img src="<?php echo $video['imagen']; ?>" alt="<?php echo $video['enlace']['title'] . ' - ' . $sitename; ?>" title="<?php echo $video['enlace']['title']; ?>">
                                                    <div class="seccionTabs__card-info">
                                                        <h4 class="heading--24 color--002D72"><?php echo $video['enlace']['title']; ?></h4>
                                                        <span class="heading--18">
                                                            Ver video
                                                            <?php 
                                                                get_template_part('template-parts/content', 'icono');
                                                                display_icon('arrow-rojo'); 
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <!-- Fin Videos -->
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Fin Links -->
        </div>
    </section>
<!-- Fin Tabs -->
</main>
<!-- FIN CONTENIDO -->
<?php  get_footer(); ?>