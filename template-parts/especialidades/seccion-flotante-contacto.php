<?php 
$contacto                 = get_page_by_path('contenido-header-footer')->ID;
$grupo_contacto_flotante  = ($contacto) ? get_field('grupo_contacto_flotante', $contacto) : null;
$enlaces                  = !empty($grupo_contacto_flotante['enlaces']) ? $grupo_contacto_flotante['enlaces'] : [];
?>
<?php if($enlaces) : ?>
  <section class="flotanteContacto">
    <button type="button" aria-label="mas informacion" id="open-contact">
      <span class="sr-only">contacto</span>
      <?php 
        get_template_part('template-parts/content', 'icono');
        display_icon('arrow-rojo'); 
      ?>
    </button>

    <div class="flotanteContacto__wrapper">
      <?php foreach ($enlaces as $key => $enlace) { 
        $enlace_titulo = $enlace['enlace']['title'];
        $enlace_url    = $enlace['enlace']['url'];
        $enlace_target = $enlace['enlace']['target'];
      ?>
        <a href="<?php echo $enlace_url; ?>">
          <span class="flotanteContacto__img">
            <img src="<?php echo $enlace['imagen']?>" alt="">
          </span>
          <span class="flotanteContacto__texto">
            <?php if($enlace_titulo) : ?>
              <p class="heading--14 color--263956"><?php echo $enlace_titulo; ?></p>
            <?php endif; ?>

            <?php if($enlace['detalle']) : ?>
              <p class="small heading--12 color--263956"><?php echo $enlace['detalle']?></p>
            <?php endif; ?>
          </span>
        </a>
      <?php } ?>
    </div>
  </section>
<?php endif; ?>