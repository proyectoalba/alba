<h1>Horario para la División: <?php echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion()?></h1>
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

