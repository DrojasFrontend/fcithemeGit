<div class="visibleDesktop">
  <div class="customHeader__contactos">
    <a href="" class="heading--18 color--E40046">
      <?php 
        get_template_part('template-parts/content', 'icono');
        display_icon('ico-calendario-rojo'); 
      ?>
      Pedir cita
    </a>
    <button class="customHeader__contacto heading--18 color--E40046" type="button" onclick="abrirMenuContacto()">
      Contactanos
      <?php 
        get_template_part('template-parts/content', 'icono');
        display_icon('arrow-down'); 
      ?>
    </button>
    <div class="customHeader__contacto-info" style="display: none">
      <div class="triangulo-border">
        <div class="triangulo"></div>
      </div>
      <p class="info">Línea de Atención</p>
      <a class="numero" href="tel:6017563426">(+601) 756 3426</a>
      <div class="customHeader__contacto-bottom">
        <a href="#">
          <?php 
            get_template_part('template-parts/content', 'icono');
            display_icon('ico-whatsapp-rojo'); 
          ?>
          Chat en WhatsApp
        </a>
        <a href="#">
          <?php 
            get_template_part('template-parts/content', 'icono');
            display_icon('ico-mensaje-rojo'); 
          ?>
          Escríbenos
        </a>
      </div>
      <div class="customHeader__contacto-cta">
        <a  class="info" href="">Preguntas frecuentes</a>
        <a  class="info" href="">PQR Pacientes</a>
        <a  class="info" href="">Ubicaciones</a>
      </div>
    </div>
  </div>
</div>

<style>
  .customHeader__contactos {
    position: relative;
    display: flex;
    column-gap: 42px;
  }

  .customHeader__contactos a, 
  .customHeader__contactos button {
    background: transparent;
    border: 0;
    text-decoration: none;
    padding: 0;
  }

  .customHeader__contacto-info {
    position: absolute;
    top: 42px;
    right: -20px;
    width: max-content;
    padding: 12px 24px;
    text-align: center;
    border-radius: 6px;
    border: 1px solid #D5DBE7;
    box-shadow: 0px 6px 12px 0px rgba(108, 117, 125, 0.20);
    background: var(--fff);
    z-index: 10;
  }

  .triangulo-border {
    position: absolute;
    top: -12px;
    right: 24px;
    width: 0;
    height: 0;
    border-left: 12px solid transparent;
    border-right: 12px solid transparent;
    border-bottom: 12px solid #D5DBE7;
  }

  .triangulo {
    transform: translate(-11px, 1px);
    --size: 11px;
    width: 0;
    height: 0;
    border-left: var(--size) solid #ffffff00;
    border-right: var(--size) solid #ffffff00;
    border-bottom: calc(var(--size)* 1) solid var(--fff);
  }

  .customHeader__contacto-cta {
    display: flex;
    column-gap: 20px;
  }

  .info {
    display: inline-block;
    font-family: var(--ff-sans);
    padding: 12px 0;
    color: #677283;
    text-align: center;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 18px;
    letter-spacing: 0.06px;
    text-decoration: none;
  }

  .numero {
    display: block;
    margin-bottom: 12px;
    color: var(--263956);
    text-align: center;
    font-size: 24px;
    font-style: normal;
    font-weight: 500;
    line-height: 32px;
    letter-spacing: 0.12px;
    text-decoration: none;
  }

  .customHeader__contacto-bottom {
    display: flex;
    justify-content: space-between;
    column-gap: 24px;
    padding: 12px 0;
    border-top: 1px solid #D5DBE7;
    border-bottom: 1px solid #D5DBE7;
  }

  .customHeader__contacto-bottom a {
    display: flex;
    align-items: center;
    column-gap: 12px;
    font-family: var(--ff-sans);
    color: var(--E40046);
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 18px;
    text-decoration: none;
  }
</style>

<script>
  function abrirMenuContacto() {
    const menuContacto = document.querySelector('.customHeader__contacto-info');
    const boton = document.querySelector('.customHeader__contacto');
    if (menuContacto.style.display === 'none' || menuContacto.style.display === '') {
      menuContacto.style.display = 'block';
      boton.classList.add('active');
    } else {
      menuContacto.style.display = 'none';
      boton.classList.remove('active');
    }
}
</script>