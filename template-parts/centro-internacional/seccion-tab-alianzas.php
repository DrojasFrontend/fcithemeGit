<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_convenios  = get_field("grupo_convenios");
$subtitulo        = !empty($grupo_convenios["subtitulo"]) ? esc_html($grupo_convenios["subtitulo"]) : '';
$titulo           = !empty($grupo_convenios["titulo"]) ? esc_html($grupo_convenios["titulo"]) : '';
$paises           = !empty($grupo_convenios["paises"]) ? $grupo_convenios["paises"] : [];
?>

<section class="seccionTabsConvenios">
  <div class="container--large">
    <div class="seccionContacto__titulo">
      <?php if ($subtitulo): ?>
        <p class="heading--14 color--002D72"><?php echo $subtitulo; ?></p>
      <?php endif; ?>
      <?php if ($titulo): ?>
        <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
      <?php endif; ?>
    </div>
  </div>

  <div class="tab__wrapper">
    <div class="container--large">
      <!-- Tabs buttons -->
      <ul class="tabs">
        <?php if($paises): ?>
          <?php foreach ($paises as $index => $pais): 
            $pais_nombre = $pais['pais'];
            $pais_icono = $pais['icono'];
            $tab_id = sanitize_title($pais_nombre);
          ?>
            <li>
              <button class="tab-button <?php echo ($index === 0) ? 'active' : ''; ?>" data-tab="<?php echo $tab_id; ?>">
                <?php if($pais_icono): ?>
                  <img src="<?php echo esc_url($pais_icono); ?>" alt="<?php echo esc_attr($pais_nombre); ?>">
                <?php endif; ?>
                <?php echo esc_html($pais_nombre); ?>
              </button>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>

  <div class="container--large">
    <!-- Tabs content -->
    <?php if($paises): ?>
      <?php foreach ($paises as $index => $pais):
        $pais_nombre = $pais['pais'];
        $convenios = $pais['convenios'];
        $tab_id = sanitize_title($pais_nombre);
      ?>
        <div class="tab-content <?php echo ($index === 0) ? 'active' : ''; ?>" id="<?php echo $tab_id; ?>">
          <?php if($convenios): ?>
            <?php foreach($convenios as $convenio): ?>
              <div class="convenio-item">
                <img src="<?php echo esc_html($convenio['imagen']); ?>" alt="">
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif;?>
  </div>
</section>