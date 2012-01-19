<?php 
    if ($horarioescolar->getTurno()) {
        echo $horarioescolar->getTurno()->getDescripcion();
    }
?>
        