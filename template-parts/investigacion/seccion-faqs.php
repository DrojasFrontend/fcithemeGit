<?php 
$sitename    = esc_html(get_bloginfo('name'));
$grupo_faqs  = get_field('grupo_faqs');
$titulo      = !empty($grupo_faqs['titulo']) ? esc_html($grupo_faqs['titulo']) : '';
$descripcion = !empty($grupo_faqs['descripcion']) ? $grupo_faqs['descripcion'] : '';
$items       = !empty($grupo_faqs['items']) ? $grupo_faqs['items'] : [];
?>

<section class="investigacionesFaqs">
  <div class="container--large">
    <div class="investigacionesFaqs__titulo">
      <?php if($titulo) : ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
      <?php endif; ?>

      <?php if($descripcion) : ?>
        <div class="heading--18 color--263956"><?php echo $descripcion;?></div>
      <?php endif; ?>
    </div>

    <div class="investigacionesFaqs__faqs">
      <ul class="tab-links">
        <?php foreach ($items as $key => $item) { ?>
          <li class="<?php echo $key == 0 ? 'active' : ''; ?>">
            <a class="heading--24 color--002D72" href="#tab<?php echo $key; ?>">
              <?php echo $item['pregunta']?>
              <?php 
                get_template_part('template-parts/content', 'icono');
                display_icon('ico-circulo-mas'); 
              ?>
              <?php 
                get_template_part('template-parts/content', 'icono');
                display_icon('ico-circulo-menos'); 
              ?>
            </a>

            <div class="tab-content">
              <div id="tab<?php echo $key; ?>" class="tab <?php echo $key === 0 ? 'active' : ''; ?>">
                <div class="heading--18 color--263956">
                  <?php echo $item['respuesta']?>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</section>
