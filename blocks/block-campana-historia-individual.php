    <?php
    $nombre = block_field('nombre', false); 
    $ciudad = block_field('ciudad', false); 
    $leer_mas = block_field('leer-mas', false); 
    ?>
    <div class="camp_hist_indv">
        <div class="camp_hist_indv__cont">
            <div class="camp_hist_indv__contenido" style="background: linear-gradient(0deg, rgb(0, 0, 0) 10%, rgba(0, 45, 114, 0) 50%);">
                <div class="camp_hist_indv__contenido__cont">
                    <h3 style="text-shadow: 3px 2px 1px rgb(0 0 0);border-bottom: 1px solid white!important; font-weight: bold!important;"><?= strip_tags($nombre) ?></h3>
                    <p style="text-shadow: 3px 2px 1px rgb(0 0 0);"><?= strip_tags($ciudad) ?></p>
                    <div class="camp_hist_indv__contenido__leermas">
                        <?= $leer_mas ?>
                    </div>
                </div>
            </div>
            <div class="camp_hist_indv__bg">
                <div class="camp_hist_indv__bg__capa"></div>
                <div class="camp_hist_indv__bg__img">
                    <img src="<?= block_field('foto') ?>" alt="<?= strip_tags($nombre) ?>">
                </div>
            </div>
        </div>
    </div>

