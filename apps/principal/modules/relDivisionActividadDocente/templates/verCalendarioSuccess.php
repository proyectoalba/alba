<?php
//     include_component('icalVisualizador', $view, array('archivo' => $archivo, 'date_component' => $date_component));

	include_component('cal', $view, array(
						'archivo' => $archivo,
					 	'date' => $date_component,
						'verPorDia' => "view/verPorDia",
						'verPorSemana' => 'view/verPorSemana',
						'verPorMes' => 'view/verPorMes',
						'verPorAnio' => 'view/verPorAnio'
						));
?>