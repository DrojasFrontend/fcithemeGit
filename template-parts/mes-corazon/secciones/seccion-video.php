<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_multimedia = get_field('grupo_multimedia');
$titulo           = $grupo_multimedia['titulo'];
$targetas         = $grupo_multimedia['targetas'];
?>
<section class="paginaMesCorazonVideo">
  <div class="paginaMesCorazonVideo__fondo">
    <img class="emojis" src="/wp-content/uploads/2024/09/emojis.png" alt="">
    <div class="container--large">
      <?php if($titulo) : ?>
        <h2 class="heading--48 color--fff"><?php echo $titulo; ?></h2>
      <?php endif; ?>
      <div class="paginaMesCorazonVideo__grid">
        <?php foreach ($targetas as $key => $targeta): ?>
          <div class="paginaMesCorazonVideo__video" data-open-modal data-video-id="<?php echo esc_attr($key); ?>">
            <div class="paginaMesCorazonVideo__img">
              <?php echo generar_imagen_responsive($targeta["imagen"]['ID'], 'custom-size', $sitename, ''); ?>
            </div>
            <div class="paginaMesCorazonVideo__info">
              <h3 class="heading--24 color--fff"><?php echo esc_html($targeta['titulo']); ?></h3>
              <button class="link-hover" type="button" aria-label="Ver video" data-open-modal>
                <span>Ver video</span>
                <?php 
                  get_template_part('template-parts/content', 'icono');
                  display_icon('arrow-rojo'); 
                ?>
              </button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div id="videoModal" class="paginaMesCorazonModal" style="display: none;">
  <div class="paginaMesCorazonModal__contenido">
    <button class="close" type="button" aria-label="Cerrar">
      <?php 
        get_template_part('template-parts/content', 'icono');
        display_icon('ico-close'); 
      ?>
    </button>
    <div id="videoContent" class="paginaMesCorazonModal__video"></div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('videoModal');
  const modalContent = document.getElementById('videoContent');
  const closeModalBtn = modal.querySelector('.close');

  document.querySelectorAll('[data-open-modal]').forEach(button => {
    button.addEventListener('click', function () {
      const videoId = this.closest('[data-video-id]').getAttribute('data-video-id');

      fetchVideoContent(videoId);
      modal.style.display = 'block';
    });
  });

  function fetchVideoContent(videoId) {
    const videos = <?php echo json_encode($targetas); ?>;
    const video = videos[videoId]?.video;
    
    if (video) {
      modalContent.innerHTML = video;
    }
  }

  closeModalBtn.addEventListener('click', function () {
    modal.style.display = 'none';
    modalContent.innerHTML = '';
  });

  window.addEventListener('click', function (e) {
    if (e.target === modal) {
      modal.style.display = 'none';
      modalContent.innerHTML = '';
    }
  });
});

</script>