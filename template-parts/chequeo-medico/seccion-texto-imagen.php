<?php 
    $grupoTextoImagen = get_field('grupo_texto_imagen');
    $filaInvertida = $grupoTextoImagen['fila_invertida'];
    $subtitulo = $grupoTextoImagen['subtitulo'] ?? '';
    $titulo = $grupoTextoImagen['titulo'] ?? '';
    $descripcion = $grupoTextoImagen['descripcion'] ?? '';
    $imagen = $grupoTextoImagen['imagen'] ?? '';

    $hayContenido = $subtitulo || $titulo || $descripcion || $imagen;
?>

<?php if ($hayContenido): ?>
    <section class="py-5 px-12">
        <div class="container"> 
            <div class="row flex-column-reverse flex-md-row <?php if($filaInvertida) : ?>flex-md-row-reverse<?php endif; ?> align-items-center">
                <div class="col-md-6 mt-4 mt-md-0">
                    <?php if( $subtitulo ): ?>
                        <p class="subheading color--002D72"><?php echo esc_html($subtitulo); ?></p>
                    <?php endif; ?>
                    <?php if( $titulo ): ?>
                        <h2 class="heading--48 mt-2 text-start color--002D72"><?php echo esc_html($titulo); ?></h2>
                    <?php endif; ?>
                    <?php if( $descripcion ): ?>
                        <div class="color-delft-blue mt-4 heading--18"><?php echo $descripcion; ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 text-center">
                    <?php if ($imagen) : ?>
                        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr($imagen['alt']); ?>" class="img-fluid w-100">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>