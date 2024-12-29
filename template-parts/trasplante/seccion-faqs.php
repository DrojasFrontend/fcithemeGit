<?php 
$sitename    = esc_html(get_bloginfo('name'));
$grupo_faqs  = get_field('grupo_faqs');
$posicion    = !empty($grupo_faqs['posicion']) ? esc_html($grupo_faqs['posicion']) : '';
$fondo       = !empty($grupo_faqs['fondo']) ? $grupo_faqs['fondo'] : '';
$subtitulo   = !empty($grupo_faqs['subtitulo']) ? esc_html($grupo_faqs['subtitulo']) : '';
$titulo      = !empty($grupo_faqs['titulo']) ? esc_html($grupo_faqs['titulo']) : '';
$items       = !empty($grupo_faqs['items']) ? $grupo_faqs['items'] : [];

$imagen_id   = !empty($grupo_faqs["imagen"]['ID']) ? $grupo_faqs["imagen"]['ID'] : '';
?>

<section class="paginaTrasplantesFaqs" style="order: <?php echo $posicion; ?>">
  <div class="container--large">
    <div class="paginaTrasplantesFaqs__titulo">
      <?php if($subtitulo) : ?>
        <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
      <?php endif; ?>

      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
      <?php endif; ?>
    </div>

    <div class="paginaTrasplantesFaqs__faqs">
      <ul class="tab-links">
        <?php foreach ($items as $key => $item) { ?>
          <li class="<?php echo $key == 0 ? 'active' : ''; ?>">
            <a class="heading--24 color--002D72" href="#tab<?php echo $key; ?>">
              <?php echo $item['pregunta']?>
              <?php 
                get_template_part('template-parts/content', 'icono');
                display_icon('icono-arrow-next-rojo'); 
              ?>
            </a>

            <div class="tab-content">
              <div id="tab<?php echo $key; ?>" class="tab <?php echo $key === 0 ? 'active' : ''; ?>">
                <p class="heading--18 color--263956">
                  <?php echo $item['respuesta']?>
                </p>
              </div>
            </div>
          </li>
        <?php } ?>
      </ul>

      
    </div>
  </div>
</section>
