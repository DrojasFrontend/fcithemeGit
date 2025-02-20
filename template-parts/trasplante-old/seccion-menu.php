<section class="etapaTrasplanteMenu" style="order: 2">
  <div class="etapaTrasplanteMenu__wrapper">
    <div class="container--large">
      <?php if (isset($args['items']) && is_array($args['items'])): ?>
        <ul class="etapaTrasplanteMenu__menu">
          <?php foreach ($args['items'] as $item): ?>
            <li class="etapaTrasplanteMenu__menuitem <?php echo !empty($item['class']) ? esc_attr($item['class']) : ''; ?>">
              <a href="<?php echo esc_url($item['link']); ?>" class="heading--18 color--E40046" title=""><?php echo esc_html($item['name']); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>