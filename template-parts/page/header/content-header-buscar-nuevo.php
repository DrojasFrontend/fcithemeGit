<div class="customHeader__buscar visibleDesktop">
  <?php function custom_search_form() { ?>
    <form role="search" method="get" class="" action="<?php echo home_url('/'); ?>">
      <input type="search" class="" placeholder="Encuentra lo que necesites" value="<?php echo get_search_query(); ?>" name="s" />
      <button type="submit" class="search-submit">
        <i class="fa fa-search"></i>
      </button>
    </form>
  <?php } ?>
  <?php custom_search_form(); ?>
</div>


<style>
.customHeader__buscar {
    width: 100%;
    box-shadow: 0px 0px 24px 0px rgba(103, 114, 131, 0.15);
}

.customHeader__buscar form {
    display: flex;
}

.customHeader__buscar input[type="search"] {
    font-family: var(--ff-sans);
    font-size: 18px;
    width: 100%;
    color: #677283;
    border: 1px solid #D5DBE7;
    border-right: 0;
    border-top: 0;
    background: var(--fff);
    padding: 0 18px;
}

.customHeader__buscar button {
    background: var(--fff);
    border: 1px solid #D5DBE7;
    border-left: 0;
    border-top: 0;
    padding: 11px 18px;
}

.customHeader__buscar button i {
    font-size: 20px;
    color: var(--E40046);
    font-weight: 500;
}

@media only screen and (min-width: 1024px){
    .customHeader__buscar {
        max-width: 240px;
        box-shadow: 0px 0px 24px 0px rgba(103, 114, 131, 0);
    }

    .customHeader__buscar input[type="search"] {
        font-size: 18px;
        border-top: 1px solid #D5DBE7;
        border-radius: 6px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        padding: 0 18px;
    }

    .customHeader__buscar button {
        border-top: 1px solid #D5DBE7;
        border-radius: 0 6px 6px 0;
        padding: 11px 18px;
    }

    .customHeader__buscar button i {
        font-size: 16px;
        font-weight: 100;
    }
}

@media only screen and (min-width: 1200px){
    .customHeader__buscar {
        max-width: 380px;
    }
}

@media only screen and (min-width: 1280px){
    .customHeader__buscar {
        max-width: 480px;
    }
}

</style>