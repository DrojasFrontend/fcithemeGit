<?php 
$faqs = [
  [
    "pregunta" => "¿Qué es un testamento?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Hacer mi testamento con la Fundación Cardioinfantil es gratuito?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Qué ocurre si no se hace testamento?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Puedo modificar mi testamento?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Por qué es importante hacer un testamento?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Quiénes son los herederos forzosos?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Qué es la legítima?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿En qué se transformará tu herencia con un testamento solidario?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Qué le podría dejar a la Fundación Cardioinfantil en mi testamento?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
  [
    "pregunta" => "¿Parte de mi donación a la Fundación Cardioinfantil se iría en impuestos?",
    "respuesta" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés."
  ],
]
?>
<section class="paginaLegadoPreguntas">
  <div class="container--large">
    <div class="paginaLegadoPreguntas__contenido">
      <div class="paginaLegadoPreguntas__titulo">
        <h2 class="heading--48 color--263956">Respondemos a tus preguntas</h2>
        <p class="heading--18 color--263956">
          En esta sección hemos recopilado las preguntas que más recibimos para ofrecerte respuestas claras y detalladas. Sabemos que cada duda cuenta, y queremos que te sientas seguro y bien informado. 
        </p>
      </div>

      <div class="paginaLegadoPreguntas__preguntas">
        <?php foreach ($faqs as $key => $pregunta) { $key++?>
          <div class="paginaLegadoPreguntas__item">
            <button type="button" aria-label="<?php echo $pregunta['pregunta']?>" class="paginaLegadoPreguntas__titulo <?php echo $key == 1 ? 'active' : '' ?>">
              <h3 class="heading--24 color--263956"><?php echo $pregunta['pregunta']?></h3>
              <?php 
                  get_template_part('template-parts/content', 'icono');
                  display_icon('ico-plus-circle'); 
              ?>
              <?php 
                  get_template_part('template-parts/content', 'icono');
                  display_icon('ico-minus-circle'); 
              ?>
            </button>
            <div class="paginaLegadoPreguntas__tab" <?php echo $key == 1 ? 'style="display:block;"' : '' ?>>
              <p class="heading--18 color--263956"><?php echo $pregunta['respuesta']?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>