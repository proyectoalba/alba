<h1>Horario para el Docente: <?=$docente->getApellido()." ".$docente->getNombre()?></h1>
<?php
    include_component('icalVisualizador', $view, array('archivo' => $archivo, 'date_component' => $date_component));
?>

