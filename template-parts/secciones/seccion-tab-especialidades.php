<?php
$sitename               = get_bloginfo('name');
$grupo_departamentos    = get_field('grupo_departamentos'); 
$imagen_id              = !empty($grupo_departamentos["imagen"]['ID']) ? $grupo_departamentos["imagen"]['ID'] : '';
$titulo                 = !empty($grupo_departamentos['texto']) ? esc_html($grupo_departamentos['texto']) : '';
$cta                    = !empty($grupo_departamentos['cta']) ? $grupo_departamentos['cta'] : [];
$cta_url                = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo             = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target             = !empty($cta['target']) ? $cta['target'] : '';
?>

<div class="seccionDirectorio">
   <div class="container--large">
       <div class="seccionDirectorio__titulo">
           <p class="subheading color--002D72">NUESTRAS ESPECIALIDADES</p>
           <h2 class="heading--48 color--002D72">Todo lo que necesitas en LaCardio</h2>
       </div>
   
       <div class="seccionDirectorio__grid">
           <div class="seccionDirectorio__departamentos">
                <button class="visibleMobile seccionDirectorio__cerrar" onclick="cerrarMenuMobile()">
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('ico-close'); 
                    ?>
                </button>
               <h4 class="subheading color--677283">Departamentos</h4>
               <div class="">
                   <?php
                   $departamentos = get_terms(array(
                       'taxonomy' => 'grupos',
                       'hide_empty' => false
                   ));
   
                   foreach ($departamentos as $depto) {
                       ?>
                       <label class="seccionDirectorio__departamento">
                           <input type="radio" name="departamento" value="<?php echo $depto->slug; ?>" onchange="filtrarEspecialidades('<?php echo $depto->slug; ?>', '<?php echo $depto->name; ?>')">
                           <span class="radio-label heading--18 color--002D72 font-sans"><?php echo $depto->name; ?></span>
                       </label>
                       <?php
                   }
                   ?>
               </div>
               <?php if ($cta_url) : ?>
                    <div class="visibleMobile">
                        <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--rojo-rojo" target="<?php echo $cta_target;?>">
                        <?php echo $cta_titulo;?>
                        </a>
                    </div>
                <?php endif; ?>
           </div>
   
           <div class="seccionDirectorio__especialidades">
                <div class="visibleDesktop">
                    <div class="seccionDirectorio__especialidades-contenido" id="imagen-especialidades">
                        <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                        <div class="seccionDirectorio__especialidades-titulo">
                            <?php if($titulo) : ?>
                                <h3 class="heading--30 color--002D72"><?php echo $titulo;?></h3>
                            <?php endif; ?>
                            <?php if ($cta_url) : ?>
                                <div class="visibleDesktop">
                                    <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--rojo-rojo" target="<?php echo $cta_target;?>">
                                    <?php echo $cta_titulo;?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

               <div id="lista-especialidades" style="display: none;">
                    <button class="visibleMobile seccionDirectorio__cerrar" onclick="volverMenu()">
                        <?php 
                            get_template_part('template-parts/content', 'icono');
                            display_icon('ico-close'); 
                        ?>
                    </button>
                   <div class="mobile-header">
                       <button onclick="volverMenu()" class="boton-volver">
                            <?php 
                                get_template_part('template-parts/content', 'icono');
                                display_icon('arrow-rojo'); 
                            ?>
                            <span class="departamento-titulo font--sans heading--16 color--E40046"></span>
                       </button>
                   </div>
                   <h4 class="subheading color--677283 visibleDesktop">Especialidades</h4>
                   <?php
                   $args = array(
                       'post_type' => 'servicios',
                       'posts_per_page' => -1
                   );
                   $especialidades = new WP_Query($args);
   
                   if ($especialidades->have_posts()) : 
                       while ($especialidades->have_posts()) : $especialidades->the_post();
                           $grupos = get_the_terms(get_the_ID(), 'grupos');
                           $grupo_slugs = array();
                           if ($grupos) {
                               foreach ($grupos as $grupo) {
                                   $grupo_slugs[] = $grupo->slug;
                               }
                           }
                           ?>
                           <div class="seccionDirectorio__especialidad" data-grupos='<?php echo json_encode($grupo_slugs); ?>'>
                               <label class="radio-container">
                                   <span class="radio-label heading--18 color--002D72 font-sans"><?php echo get_the_title(); ?></span>
                               </label>
                               <a href="<?php echo get_permalink(); ?>" class="ver-link font-sans heading--14 color--E40046">
                                   Ver
                                   <?php 
                                       get_template_part('template-parts/content', 'icono');
                                       display_icon('arrow-rojo'); 
                                   ?>
                               </a>
                           </div>
                           <?php
                       endwhile;
                       wp_reset_postdata();
                   endif;
                   ?>

                    <?php if ($cta_url) : ?>
                        <div class="visibleMobile">
                            <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--rojo-rojo" target="<?php echo $cta_target;?>">
                            <?php echo $cta_titulo;?>
                            </a>
                        </div>
                    <?php endif; ?>
               </div>
           </div>
       </div>

       <div class="visibleMobile">
            <div class="seccionDirectorio__especialidades-contenido" id="imagen-especialidades">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
                <div class="seccionDirectorio__especialidades-titulo">
                    <?php if($titulo) : ?>
                        <h3 class="heading--30 color--002D72"><?php echo $titulo;?></h3>
                    <?php endif; ?>
                    <?php if ($cta_url) : ?>
                        <div class="visibleDesktop">
                            <a href="<?php echo $cta_url;?>" class="boton-v2 boton-v2--rojo-rojo" target="<?php echo $cta_target;?>">
                            <?php echo $cta_titulo;?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <button class="boton-v2 boton-v2--blanco-rojo" onclick="abrirMenuMobile()">
                        Conoce nuestros departamentos
                    </button>
                </div>
            </div>
        </div>
   </div>
</div>

<style>
.seccionDirectorio {
   padding: 42px 0;
   background-color: rgba(213, 219, 231, 0.20);
}

.seccionDirectorio__titulo {
    display: grid;
    row-gap: 12px;
   margin-bottom: 42px;
}

.seccionDirectorio__titulo h2 {
    text-align: left;
}

.seccionDirectorio__grid {
   display: grid;
   grid-template-columns: 1fr;
   gap: 40px;
}

.seccionDirectorio__departamentos {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100vh;
   background: var(--fff);
   padding: 70px 20px 20px 20px;
   z-index: 2;
   transition: transform 0.3s ease;
   overflow-y: auto;
   transform: translate3d(100%, 0, 0);
}

.seccionDirectorio__departamentos .subheading,
.seccionDirectorio__especialidades .subheading {
    font-family: var(--ff-sans);
    font-size: 18px;
    font-weight: 700;
    color: #0C2448;
    line-height: 24px;
    letter-spacing: -0.36px;
}

.seccionDirectorio__departamento {
   display: flex;
   align-items: center;
   padding: 12px 0;
   cursor: pointer;
}

.seccionDirectorio__departamento:first-child {
    border-top: 1px solid #D5DBE7;
    margin-top: 12px;
}

.seccionDirectorio__departamento input[type="radio"] {
   margin-right: 10px;
   appearance: none;
   -webkit-appearance: none;
   width: 24px;
   height: 24px;
   border: 1px solid #002D72;
   border-radius: 50%;
   position: relative;
}

.seccionDirectorio__departamento input[type="radio"]:checked {
   border: 2px solid #E40046;
}

.seccionDirectorio__departamento input[type="radio"]:checked::before {
   content: "";
   position: absolute;
   width: 10px;
   height: 10px;
   background-color: #E40046;
   border-radius: 50%;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
}

.seccionDirectorio__departamento .radio-label,
.seccionDirectorio__especialidad .radio-label {
    font-size: 16px;
    line-height: 24px;
}

.seccionDirectorio__departamento.selected {
   border-bottom: 2px solid #E40046;
}

.seccionDirectorio__especialidades {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100vh;
   background: white;
   padding: 70px 20px 20px 20px;
   z-index: 2;
   transform: translateX(100%);
   transition: transform 0.3s ease;
   overflow-y: auto;
}

.seccionDirectorio__especialidad {
   display: flex;
   align-items: center;
   padding: 12px 0;
   border-bottom: 1px solid #D5DBE7;
   cursor: pointer;
   column-gap: 20px;
   transition: all 0.3s ease;
}

.seccionDirectorio__especialidad.hidden {
   display: none;
}

.seccionDirectorio__especialidad .radio-container {
   display: grid;
   grid-template-columns: 1fr;
   flex: 1 1 auto;
}

.seccionDirectorio__especialidades-contenido {
   display: grid;
   row-gap: 24px;
}

.seccionDirectorio__especialidades-titulo {
   display: grid;
   row-gap: 36px;
}

.mobile-header {
   display: flex;
   align-items: center;
   color: var(--E40046);
   padding: 10px 0;
   border-bottom: 1px solid #D5DBE7;
}

.mobile-header svg {
    color: var(--E40046);
    transform: rotate(180deg);
}

.boton-volver {
   display: flex;
   align-items: center;
   gap: 5px;
   padding: 0;
   border: none;
   background: none;
   cursor: pointer;
}

.ver-link {
   display: flex;
   align-items: center;
   letter-spacing: normal;
   text-decoration: none;
}

.ver-link:hover {
   color: #E40046;
}

.menu-mobile {
   display: flex;
   align-items: center;
   justify-content: space-between;
   width: 100%;
   padding: 15px 20px;
   background: #fff;
   border: 1px solid #D5DBE7;
   border-radius: 4px;
   color: #002D72;
   font-size: 16px;
   margin-bottom: 20px;
}

.seccionDirectorio__cerrar {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 0;
    background-color: transparent;
    border: 0;
    width: 19px;
    height: 20px;
    cursor: pointer;
    z-index: 2;
}

.seccionDirectorio__cerrar svg {
    color: var(--E40046);
    width: 16px;
}

@media (min-width: 768px) {

    .seccionDirectorio {
        padding: 84px 0;
        margin-bottom: 84px;
    }

   .seccionDirectorio__grid {
       grid-template-columns: 1fr 2fr;
       column-gap: 36px;
    }

   .menu-mobile {
       display: none;
    }

   .seccionDirectorio__departamentos,
   .seccionDirectorio__especialidades {
       position: relative;
       top: inherit;
       left: inherit;
       width: auto;
       height: auto;
       padding: 20px 0 0;
       background: none;
       overflow-y: inherit;
       transform: none;
   }

    .seccionDirectorio__departamentos .subheading,
    .seccionDirectorio__especialidades .subheading {
        font-family: var(--ff-prompt);
        font-size: 14px;
        color: #677283;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 3.36px;
    }

   .seccionDirectorio__departamentos {
       display: block;
       padding: 18px 0 18px 24px;
   }

    .seccionDirectorio__departamento {
        padding: 18px 0;
        border-bottom: 1px solid #D5DBE7;
    }

    .seccionDirectorio__departamento:first-child {
        margin-top: 0;
        border-top: 0px solid #D5DBE7;
    }

   .seccionDirectorio__departamento .radio-label,
   .seccionDirectorio__especialidad .radio-label {
        font-size: 18px;
        line-height: 24px;
        letter-spacing: 0.27px;
    }

   .seccionDirectorio__especialidades {
       transform: inherit;
   }

   .seccionDirectorio__especialidad {
        padding: 18px 0 18px 24px;
        border-bottom: 1px solid #D5DBE7;
        column-gap: 20px;
    }

   .seccionDirectorio__especialidades-titulo {
        padding: 0 24px;
    }

   .mobile-header {
       display: none;
   }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
   const especialidades = document.querySelectorAll('.seccionDirectorio__especialidad');
   especialidades.forEach(especialidad => {
       especialidad.style.display = 'none';
   });
});

function filtrarEspecialidades(departamentoSlug, departamentoNombre) {
   const imagen = document.getElementById('imagen-especialidades');
   const listaEspecialidades = document.getElementById('lista-especialidades');
   const especialidades = document.querySelectorAll('.seccionDirectorio__especialidad');
   const menuPrincipal = document.querySelector('.seccionDirectorio__departamentos');
   const menuEspecialidades = document.querySelector('.seccionDirectorio__especialidades');
   const departamentoTitulo = document.querySelector('.departamento-titulo');

   if (window.innerWidth <= 768) {
       menuPrincipal.style.transform = 'translateX(-100%)';
       menuEspecialidades.style.transform = 'translateX(0)';
       departamentoTitulo.textContent = departamentoNombre;
   }

   imagen.style.display = 'none';
   listaEspecialidades.style.display = 'block';
   
   especialidades.forEach(especialidad => {
       const grupos = JSON.parse(especialidad.dataset.grupos || '[]');
       especialidad.style.display = grupos.includes(departamentoSlug) ? 'flex' : 'none';
   });

   document.querySelectorAll('.seccionDirectorio__departamento').forEach(item => {
       item.classList.toggle('selected', item.querySelector(`input[value="${departamentoSlug}"]`).checked);
   });
}

function volverMenu() {
   const menuPrincipal = document.querySelector('.seccionDirectorio__departamentos');
   const menuEspecialidades = document.querySelector('.seccionDirectorio__especialidades');
   
   menuPrincipal.style.transform = 'translateX(0)';
   menuEspecialidades.style.transform = 'translateX(100%)';
}

function abrirMenuMobile() {
    const menuPrincipal = document.querySelector('.seccionDirectorio__departamentos');
    menuPrincipal.style.transform = 'translateX(0)';
}

function cerrarMenuMobile() {
    const menuPrincipal = document.querySelector('.seccionDirectorio__departamentos');
    menuPrincipal.style.transform = 'translateX(100%)';
}
</script>