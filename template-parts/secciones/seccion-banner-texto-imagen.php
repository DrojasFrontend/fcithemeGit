<?php

get_query_var('sitename', $sitename);
get_query_var('grupo_banner', $grupo_banner);

$titulo         = !empty($grupo_banner['titulo'])  ? ($grupo_banner['titulo']) : '';
$descripcion    = !empty($grupo_banner['descripcion'])  ? $grupo_banner['descripcion'] : '';

$banner_id      = !empty($grupo_banner["imagen"]['ID']) ? $grupo_banner["imagen"]['ID'] : '';
$banner_src     = wp_get_attachment_image_url($banner_id, 'custom-size-2x');

$banner_id_mobile   = !empty($grupo_banner["imagen_mobile"]['ID']) ? $grupo_banner["imagen_mobile"]['ID'] : '';
$banner_src_mobile  = wp_get_attachment_image_url($banner_id_mobile, 'custom-size');

?>

<style>
    .seccionBannerV2__fondo {
        background-image: url(<?php echo $banner_src_mobile; ?>);
        margin-bottom: 138px;
    }

    .seccionBannerV2 .seccionBannerV2__box {
        margin-bottom: -138px;
    }

    .seccionBannerV2 .container--large {
        padding: 0;
    }

    @media only screen and (min-width: 680px) {
        .seccionBannerV2__fondo {
            background-image: url(<?php echo $banner_src; ?>);
            margin: 0;
        }

        .seccionBannerV2 .seccionBannerV2__box {
            margin: 0;
        }
        .seccionBannerV2 .container--large {
            padding: 0 24px;
        }
    }
</style>

<div class="seccionBannerV2">
    <div class="seccionBannerV2__fondo">
        <div class="container--large"> 
            <div class="seccionBannerV2__box">
                <h1 class="heading--64">
                    <?php echo $titulo; ?>
                </h1>
                <p class="heading--18">
                    <?php echo $descripcion; ?>
                </p>
            </div> 
        </div>
    </div> 
</div>