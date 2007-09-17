<h1>Horario para la Divsión: <?php echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion()?></h1>
<?php
//     include_component('icalVisualizador', $view, array('archivo' => $archivo, 'date_component' => $date_component));
include_component('cal', $view, array(
						'archivo' => $archivo,
					 	'date' => $date_component,
						'verPorDia' => "",
						'verPorSemana' => '',
						'verPorMes' => '',
						'verPorAnio' => ''
						));
?>

