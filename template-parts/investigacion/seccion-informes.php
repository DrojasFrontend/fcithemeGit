<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_informes   = get_field('grupo_informes');
$titulo_informe   = !empty($grupo_informes['titulo_informe']) ? esc_html($grupo_informes['titulo_informe']) : '';
$textos           = !empty($grupo_informes['textos']) ? $grupo_informes['textos'] : [];
$informes         = !empty($grupo_informes['informes']) ? $grupo_informes['informes'] : [];

$imagen_id    = !empty($grupo_informes["imagen"]['ID']) ? $grupo_informes["imagen"]['ID'] : '';
?>

<section class="investigacionesInformes">
  <div class="container--large">
    <div class="investigacionInformes__textos">
      <?php if($textos) { ?>
        <?php foreach ($textos as $key => $texto) { 
          $titulo       = !empty($texto['titulo']) ? esc_html($texto['titulo']) : '';
          $descripcion  = !empty($texto['descripcion']) ? $texto['descripcion'] : '';
        ?>
          <div class="investigacionInformes__texto">
  
            <?php if($titulo) : ?>
              <h2 class="heading--36 color--002D72 fw-500"><?php echo $titulo; ?></h2>
            <?php endif; ?>
  
            <?php if($descripcion) : ?>
              <div class="heading--18 color--263956"><?php echo $descripcion; ?></div>
            <?php endif; ?>
          </div>
        <?php }?>
      <?php }?>
    </div>
    <h2 class="heading--36 color--002D72 fw-500"><?php echo $titulo_informe; ?></h2>
    <div class="investigacionInformes__tarjetas">
      <?php if($informes) { ?>
        <?php foreach ($informes as $key => $informe) { 
          $timestamp = strtotime(str_replace('/', '-', $informe['fecha']));
          if ($timestamp === false) {
            continue;
          }
          
          $dia = date('d', $timestamp);
          $diasSemana = ['domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
          $nombreDia = $diasSemana[date('w', $timestamp)];
          
          $meses = [
            'January' => 'Ene',
            'February' => 'Feb',
            'March' => 'Mar',
            'April' => 'Abr',
            'May' => 'May',
            'June' => 'Jun',
            'July' => 'Jul',
            'August' => 'Ago',
            'September' => 'Sep',
            'October' => 'Oct',
            'November' => 'Nov',
            'December' => 'Dic'
          ];

          $mes = $meses[date('F', $timestamp)];
          $ano = date('Y', $timestamp);

          $documento = !empty($informe['documento']['url']) ? $informe['documento']['url'] : '';
          $target    = !empty($informe['documento']['target']) ? $informe['documento']['target'] : '';
        ?>
          <div class="post-item">
            <a href="<?php echo $documento; ?>" class="investigacionInformes__tarjeta" title="descargar" target="<?php echo $target; ?>">
              <div class="investigacionInformes__fecha">
                <p class="heading--64 color--E40046"><?php echo $dia; ?></p>
                <span class="heading--14 color--E40046 uppercase"><?php echo $nombreDia; ?></span>,
                <div>
                  <span class="heading--14 color--E40046 uppercase"><?php echo $mes; ?></span>
                  <span class="heading--14 color--E40046 uppercase"><?php echo $ano; ?></span>
                </div>
              </div>
              <div class="investigacionInformes__detalle">
                <p class="heading--18 color--263956"><strong>Informe: No.</strong> <?php echo $informe['informe'] ?></p>
                <p class="heading--18 color--263956"><strong>Casos <br> probables:</strong> <?php echo $informe['casos_probables'] ?></p>
                <p class="heading--18 color--263956"><strong>Centros <br> participantes:</strong> <?php echo $informe['centros'] ?></p>
              </div>
              <div class="investigacionInformes__descarga">
                <img src="<?php echo IMG_BASE . 'iconos/icono-dowload-pdf.png'?>" alt="">
                <p class="font-sans heading--14 color--E40046">Descargar</p>
              </div>
            </a>
          </div>
        <?php }?>
      <?php }?>
    </div>
    <button type="button" class="boton-v2 boton-v2--blanco-rojo" data-load-more>Ver más informes</button>
  </div>
</section>