<?php 
// $sitename                 = esc_html(get_bloginfo('name'));
  $grupo_texto_descripcion_tab       = get_field('grupo_texto_descripcion_acordeon');
  $subtitulo                = !empty($grupo_texto_descripcion_tab['subtitulo']) ? esc_html($grupo_texto_descripcion_tab['subtitulo']) : '';
  $titulo                   = !empty($grupo_texto_descripcion_tab['titulo']) ? esc_html($grupo_texto_descripcion_tab['titulo']) : '';
  $descripcion              = !empty($grupo_texto_descripcion_tab['descripcion']) ? wp_kses_post($grupo_texto_descripcion_tab['descripcion']) : '';
  $cta                      = !empty($grupo_texto_descripcion_tab['cta']) ? $grupo_texto_descripcion_tab["cta"] : '';

?>

<section class="seccionTextoDescAcordion">
<div class="container--large">
    <?php if($subtitulo) : ?>
      <p class="subheading color--002D72 uppercase"><?php echo $subtitulo;?></p>
    <?php endif; ?>

    <?php if($titulo) : ?>
      <h2 class="heading--48 color--002D72"><?php echo $titulo;?></h2>
    <?php endif; ?>

    <?php if($descripcion) : ?>
      <div class="heading--18 color--263956 seccionTextoDescAcordionDescripcion">
        <?php echo $descripcion;?>
      </div>
    <?php endif; ?>

    <?php if ($grupo_texto_descripcion_tab) : ?>
        <div class="tabs">
            <?php 
            $first = true;
            foreach ($grupo_texto_descripcion_tab['items'] as $index => $item) : ?>
                <button class="tab <?php echo $first ? 'active' : ''; ?>" data-tab="tab-<?php echo $index; ?>">
                    <?php echo esc_html($item['titulo']); ?>
                </button>
            <?php 
            $first = false;
            endforeach; ?>
        </div>

        <?php 
        $first = true;
        foreach ($grupo_texto_descripcion_tab['items'] as $index => $item) : ?>
            <div class="specialties-list tab-content" id="tab-<?php echo $index; ?>" <?php echo $first ? '' : 'style="display:none;"'; ?>>
                <?php foreach ($item['items'] as $subitem) : ?>
                    <div class="item"><?php echo $subitem['texto']; ?></div>
                <?php endforeach; ?>
            </div>
        <?php 
        $first = false;
        endforeach; ?>
    <?php endif; ?>
	
<?php
              if (is_array($cta) && isset($cta['url'], $cta['title'], $cta['target'])) :
                  $url = $cta['url'];
                  $texto = $cta['title'];
                  $target = $cta['target'] ? $cta['target'] : '_self';
          ?>
    <div class="cta-button">
      <a class="boton-v2 boton-v2--blanco-rojo" href="<?php echo esc_url($url); ?>" 
              target="<?php echo esc_attr($target); ?>">
              <?php echo esc_html($texto); ?></a>
    </div>
	<?php endif; ?>
    </div>
  </section>