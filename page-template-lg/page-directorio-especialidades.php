<?php
/* 
Template Name: Plantilla Directorio Especialidades
*/

get_header();
$contentGlobal = get_page_by_path('home-prueba')->ID;
$grupo_departamentos = ($contentGlobal) ? get_field('grupo_departamentos', $contentGlobal) : null;
$departamentos = !empty($grupo_departamentos['departamentos']) ? $grupo_departamentos['departamentos'] : [];

// Generar array de letras
$letras = range('A', 'Z');
array_splice($letras, 14, 0, 'Ñ');
?>

<style>
    .paginaDirectorioExpecialidades {
        padding: 100px 0 80px;
        background: url('<?php echo IMG_BASE ?>/hero-directorio-especialidades.webp');
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 0 0 60px 0;
    }

    .paginaDirectorioExpecialidades__grid {
        display: grid;
        grid-template-columns: 1fr 1fr
    }

    .paginaDirectorioExpecialidades__titulo {
        display: flex;
        flex-direction: column;
        row-gap: 12px;
        padding-top: 36px;
    }

    .paginaDirectorioExpecialidades__letras {
        display: flex;
        flex-wrap: wrap;
        column-gap: 23px;
        row-gap: 12px;
        padding: 0 0 0 76px;
    }

    .paginaDirectorioExpecialidades__letras a {
        display: grid;
        place-content: center;
        font-family: var(--ff-sans);
        width: 54px;
        height: 54px;
        color: var(--0C2448);
        text-align: center;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: -0.36px;
        border-radius: 6px;
        background-color: var(--fff);
        text-decoration: none;
    }

    .paginaDirectorioExpecialidades__letras .letra.activo {
    }

    .paginaDirectorioExpecialidades__wrapper {
        padding: 60px 0
    }

    .paginaDirectorioExpecialidades__resultados {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        column-gap: 36px;
        row-gap: 42px;
        padding: 42px 0 0;
    }

    .paginaDirectorioExpecialidades__tarjeta {
        display: block;
        border-radius: 6px;
        border: 1px solid #D5DBE7;
        background: var(--fff);
        
    }

    .paginaDirectorioExpecialidades__tarjeta img {
        display: flex;
        width: 100%;
    }
    
    .paginaDirectorioExpecialidades__info {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 18px;
    }

    .paginaDirectorioExpecialidades__info a {
        display: flex;
        column-gap: 12px;
        text-decoration: none;
    }

    .paginaDirectorioExpecialidades__info a img {
        width: 10px;
    }
</style>

<div class="paginaDirectorioExpecialidades">
   <div class="container--large">
        <div class="paginaDirectorioExpecialidades__grid">
            <div class="paginaDirectorioExpecialidades__titulo">
                <p class="subheading color--fff">BIENVENIDOS A NUESTRO</p>
                <h1 class="heading--64 fw-300 color--fff">Directorio de <br> especialidades</h1>
            </div>
            <!-- Buscador alfabético -->
            <div class="paginaDirectorioExpecialidades__letras" id="letras">
                <?php foreach ($letras as $letra): ?>
                    <a href="#" class="letra" data-letra="<?php echo $letra; ?>">
                        <?php echo $letra; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="paginaDirectorioExpecialidades__wrapper">
    <div class="container">
        <p class="subheading color--002D72">CONOCE NUESTRAS ESPECIALIDADES</p>
        <h2 class="heading--48 color--002D72">Explora por departamentos</h2>
        <div id="resultados"></div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {

   $('.letra').click(function(e) {
       e.preventDefault();
       let letra = $(this).data('letra');
       
       $('.letra').removeClass('activo');
       $(this).addClass('activo');
       
       $.ajax({
           url: lm_params.ajaxurl,
           type: 'POST',
           data: {
               action: 'buscar_departamentos',
               letra: letra
           },
           success: function(response) {
               $('#resultados').html(response);
           }
       });
   });

   // Delegación de eventos para departamentos
   $(document).on('click', '.ver-especialidades', function(e) {
       e.preventDefault();
       let depto = $(this).data('depto');
       
       $.ajax({
           url: lm_params.ajaxurl,
           type: 'POST', 
           data: {
               action: 'buscar_especialidades',
               departamento: depto
           },
           success: function(response) {
               $('#resultados').html(response);
           }
       });
   });
});
</script>

<?php get_footer(); ?>