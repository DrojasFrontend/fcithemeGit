<?php 
/*
    Template Name: Ley de transparencia
*/
$titulo = get_the_title();
$descripcion = get_the_content();
$foto_destacada = get_the_post_thumbnail_url($post->ID, array(700, 460));
get_header();

/* ACF Variables */
$tabcontent = get_field('tabs_ley_transparencia');
?>
<?= get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="ley-transparencia">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Banner -->
                <?php the_content() ?>
            </div>
        </div>
    </div>

    <div class="tabs-contenidos">
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php foreach($tabcontent as $key => $tab): ?>
                        <?php
                            $tab_id = 'tab--' . ($key + 1);
                            $tab_content_id = 'content-tab--' . ($key + 1);
                        ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= ($key === 0) ? 'active' : ''; ?>" id="<?= $tab_id ?>" data-bs-toggle="tab" data-bs-target="<?= '#' . $tab_content_id ?>" type="button" role="tab" aria-controls="<?= $tab_content_id ?>" aria-selected="false <?= ($key === 0) ? 'true' : ''; ?>">
                                <span>
                                    <?= $tab["titular_tab"] ?>
                                </span>    
                            </button>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="tab-content" id="tabs-ley-transparencia">
                    <?php foreach($tabcontent as $key => $tab_content): ?>
                        <?php
                            $tab_id = 'tab--' . ($key + 1);
                            $tab_content_id = 'content-tab--' . ($key + 1);
                        ?>
                        <div class="tab-pane fade <?= ($key === 0) ? 'show active' : ''; ?>" id="<?= $tab_content_id ?>" role="tabpanel" aria-labelledby="<?= $tab_id ?>">
                            <?= $tab_content["contenido_tab"] ?>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php  get_footer(); ?>