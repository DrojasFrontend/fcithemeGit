<?php
/**
 * Block Name: FCI Banner Slider by https://github.com/dvprod7
 *
 * Banner slider dinámico.
 */
 
$id = 'fci_block-' . $block['id']; // Create an id for every block
$slides = get_field('banner_slides');
?>

<?php if(is_array($slides)): ?>
<section id="<?= $id ?>" class="fci_banner_slider">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 p-0">
                <?php if(count($slides) >= 2): ?>
                    <div id="fci-banner_slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php foreach ($slides as $key => $slide): ?>
                                <button type="button" data-bs-target="#fci-banner_slider" data-bs-slide-to="<?= $key ?>" class="<?= ($key === 0) ? 'active' : ''; ?>" <?= ($key === 0) ? 'aria-current="true"' : ''; ?> aria-label="Slide--<?= $key ?>"></button>
                            <?php endforeach ?>
                        </div>
                        <div class="carousel-inner">
                            <?php foreach ($slides as $key => $slide): ?>
                                <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                    <div class="banner-img">
                                        <?php if($slide["enlace_banner_img"]): ?>
                                            <a href="<?= $slide["enlace_banner_img"]["url"]?>" class="banner-img-link">
                                                <img src="<?= $slide["imagen_banner"]["url"]?>" alt="<?= $slide["imagen_banner"]["alt"]?>" class="img-fluid">
                                            </a>
                                        <?php else: ?>
                                            <img src="<?= $slide["imagen_banner"]["url"]?>" alt="<?= $slide["imagen_banner"]["alt"]?>" class="img-fluid">
                                        <?php endif; ?>
                                    </div>
                                    <?php if(!$slide["enlace_banner_img"]): ?>
                                        <div class="banner-txt">
                                            <h1><?= $slide["titular"]?></h1>
                                            <?php if($slide["descripcion"]): ?>
                                                <div class="banner-desc">
                                                    <?= $slide["descripcion"]?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($slide["boton_banner"]): ?>
                                                <a href="<?= $slide["boton_banner"]["url"]?>" class="btn"><?= $slide["boton_banner"]["title"]?></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#fci-banner_slider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#fci-banner_slider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php elseif(count($slides) < 2): ?>
                    <?php foreach ($slides as $simple): ?>
                        <div class="simple-banner">
                            <div class="banner-img">
                                <?php if($simple["enlace_banner_img"]): ?>
                                    <a href="<?= $simple["enlace_banner_img"]["url"]?>" class="banner-img-link">
                                        <img src="<?= $simple["imagen_banner"]["url"]?>" alt="<?= $simple["imagen_banner"]["alt"]?>" class="img-fluid">
                                    </a>
                                <?php else: ?>
                                    <img src="<?= $simple["imagen_banner"]["url"]?>" alt="<?= $simple["imagen_banner"]["alt"]?>" class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <?php if(!$simple["enlace_banner_img"]): ?>
                                <div class="banner-txt">
                                    <?php if (!empty($simple['titular'])) { ?>
                                        <h1><?= $simple["titular"]?></h1>
                                    <?php } ?>
                                    <?php if($simple["descripcion"]): ?>
                                        <div class="banner-desc">
                                            <?= $simple["descripcion"]?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($simple["boton_banner"]): ?>
                                        <a href="<?= $simple["boton_banner"]["url"]?>" class="btn"><?= $simple["boton_banner"]["title"]?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>