<h1>Horario para el Docente: <?php echo $docente->getApellido()." ".$docente->getNombre()?></h1>
<?php
    include_component('cal', $view, array(
                        'archivo' => $archivo,
                        'date' => $date_component,
                        'verPorDia' => 'view/verPorDia',
                        'verPorSemana' => 'view/verPorSemana',
                        'verPorMes' => 'view/verPorMes',
                        'verPorAnio' => 'view/verPorAnio'
                        ));
?>

