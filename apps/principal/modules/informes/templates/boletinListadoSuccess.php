<?php
    foreach($checks as $alumno_id => $division_id) { 
        include_component('boletin','mostrar', array( 'alumno_id' => $alumno_id, 'division_id' => $division_id));
    }
?>
