<?php 
$pasos = [
  [
    "titulo" => "Decisión de hacer un testamento:",
    "descripcion" => "El Código Civil define el testamento como la declaración de voluntad escrita de una persona por la que dispone el destino de sus bienes y obligaciones, o parte de ellos, para después de su muerte. Hacer testamento es un procedimiento sencillo y económico, con el que se pueden evitar problemas a familiares y allegados. El testamento sirve además para ordenar tus deseos y tener la certeza que se perpetúan cuando no estés.",
  ],
  [
    "titulo" => "Elegir el tipo de testamento:",
    "descripcion" => "En Colombia, existen principalmente dos tipos de testamentos: el testamento abierto y el testamento cerrado. En el testamento abierto, el testador declara su última voluntad en presencia de un notario y testigos. En el testamento cerrado, el testador declara su última voluntad sin revelar a nadie, y simplemente entrega el documento cerrado y sellado al notario.",
  ],
  [
    "titulo" => "Consultar a un abogado:",
    "descripcion" => "Antes de redactar el testamento, es aconsejable que consultes con un abogado para que pueda guiarte sobre cómo hacerlo de acuerdo a la ley.",
  ],
  [
    "titulo" => "Redacción del testamento:",
    "descripcion" => "Dependiendo del tipo de testamento que elijas, deberás redactarlo de la manera correspondiente. Si eliges un testamento cerrado, puedes redactarlo personalmente, pero si eliges un testamento abierto, será necesario que un notario lo redacte.",
  ],
  [
    "titulo" => "Incluir los detalles necesarios:",
    "descripcion" => "Debes incluir todos los detalles necesarios en tu testamento. Esto incluye tu nombre completo, documento de identidad, detalles de los beneficiarios, cómo deseas que se distribuyan tus bienes, etc.",
  ],
  [
    "titulo" => "Firmar el testamento:",
    "descripcion" => "Una vez que se redacta el testamento, debes firmarlo en presencia de un notario y, dependiendo del tipo de testamento, también en presencia de testigos.",
  ],
  [
    "titulo" => "Registro del testamento:",
    "descripcion" => "En Colombia, los testamentos se registran en la Notaría. El notario hará una copia del testamento y la guardará en sus archivos. También informará al Registro Nacional de Testamentos para que se tenga un registro oficial de su existencia.",
  ],
  [
    "titulo" => "Pensar en futuras revisiones:",
    "descripcion" => "Un testamento no es definitivo y se puede cambiar tantas veces como desees. Es aconsejable revisarlo regularmente, especialmente si hay cambios significativos en tus circunstancias personales o financieras.",
  ],
]
?>
<section class="paginaLegadoPasos">
  <div class="container--large">
    <div class="paginaLegadoPasos__titulo">
      <p class="heading--18 coloe--263956">HAZ TU TESTAMENTO</p>
      <h2 class="heading--48 color--263956">Paso a paso</h2>
    </div>
    <div class="paginaLegadoPasos__pasos">
      <?php foreach ($pasos as $key => $paso) { 
        $key++
      ?>
        <div class="paginaLegadoPasos__paso">
          <span>0<?php echo $key; ?></span>
          <h3 class="heading--24 color--263956"><?php echo $paso['titulo']?></h3>
          <p class="heading--18 color--263956"><?php echo $paso['descripcion']?></p>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

