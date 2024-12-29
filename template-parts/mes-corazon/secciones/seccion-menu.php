<?php 
$sitename         = esc_html(get_bloginfo('name'));
$grupo_menu       = get_field('grupo_menu');
$menuItems        = $grupo_menu['menu'];
?>
<section class="paginaMesCorazonMenu">
  <div class="paginaMesCorazonMenu__fondo">
    <div class="paginaMesCorazonMenu__icons">
      <span class="left"></span>
      <span class="medium"></span>
      <span class="right"></span>
    </div>
    <div class="container--large">
      <div class="paginaMesCorazonMenu__width">
        <div class="paginaMesCorazonMenu__grid">
          <?php 
          foreach ($menuItems as $key => $menuItem) { ?>
          <a href="<?php echo esc_url($menuItem['menu_item']['url'])?>" title="mas sobre <?php echo esc_html($menuItem['menu_item']['title'])?>" class="heading--24 color--fff">
            <span><?php echo esc_html($menuItem['menu_item']['title'])?></span>
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>