<?php 
    if ($horarioescolar->getTurnos()) {
        echo $horarioescolar->getTurnos()->getDescripcion();
    }
?>
        