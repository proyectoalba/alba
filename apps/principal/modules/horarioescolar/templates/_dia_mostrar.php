<?php
use_helper('Misc');
$aDias = diasDeLaSemana(1); //  todos los dias de la semana + opcion semanal
echo $aDias[$horarioescolar->getDia()];
?>