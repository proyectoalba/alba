<?php
    include_component('cal', $view, array(
                        'archivo' => $archivo,
                        'date' => $date_component,
                        'verPorDia' => "view/verPorDia",
                        'verPorSemana' => 'view/verPorSemana',
                        'verPorMes' => 'view/verPorMes',
                        'verPorAnio' => 'view/verPorAnio'
                    ));
?>