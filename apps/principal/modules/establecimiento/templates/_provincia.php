<?php 
    if($establecimiento->getFkProvinciaId()) {
        echo link_to($establecimiento->getProvincia()->getNombreCorto(),'provincia/edit?id='.$establecimiento->getFkProvinciaId());
    }
?>
