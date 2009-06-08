<?php
    $i = 0;
    foreach($checks as $alumno_id => $division_id) { 
        $h = ++$i%2;
        include_component('boletin','mostrar', array( 'alumno_id' => $alumno_id, 'division_id' => $division_id));
        if($h == 0) {
?>
        <div class="pageBreak" />
<?
        }
    }
?>
