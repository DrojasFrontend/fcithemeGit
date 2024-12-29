<?php 
$sitename       = esc_html(get_bloginfo('name'));
$grupo_grupos   = get_field('grupo_grupos');
$items          = !empty($grupo_grupos['items']) ? $grupo_grupos['items'] : [];
?>

<section class="investigacionesGrupos">
  <?php foreach ($items as $key => $item) { ?>
    <div class="investigacionesGrupos__grupo" style="background-color: <?php echo $item['fondo'] ?>">
      <div class="container--large">
        <div class="investigacionesGrupos__titulo">
          <h2 class="heading--36 color--002D72 fw-500 text-transform-none"><?php echo $item['titulo'] ?></h2>
          <p class="heading--18 color--263956"><?php echo $item['descripcion'] ?></p>
        </div>
        <div class="investigacionesGrupos__items">
          <?php foreach ($item['categorias'] as $key => $categoria) { ?>
            <div class="investigacionesGrupos__item">
              <div class="investigacionesGrupos__item-titulo">
                <?php if($categoria['titulo']) { ?>
                  <span class="heading--64 color--002D72 fw-200"><?php echo $categoria['titulo'] ?></span>
                <?php } ?>
                  <p class="heading--14 color--002D72 fw-400 uppercase"><?php echo $categoria['categoria'] ?></p>
              </div>
              <div class="investigacionesGrupos__item-links">
                <?php foreach ($categoria['enlaces'] as $key => $enlace) { ?>
                  <a href="<?php echo $enlace['link']['url'] ?>" class="investigacionesGrupos__item-link" title="<?php echo $enlace['link']['title'] ?>" target="<?php echo $enlace['link']['target'] ?>">
                    <span><?php echo $enlace['link']['title'] ?></span>
                    <?php 
                      get_template_part('template-parts/content', 'icono');
                      display_icon('icono-arrow-next-rojo'); 
                    ?>
                  </a>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php } ?>
</section>


   


