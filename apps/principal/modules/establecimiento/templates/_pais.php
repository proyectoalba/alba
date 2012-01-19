<?php 
    if($establecimiento->getFkProvinciaId()) {
        echo link_to($establecimiento->getProvincia()->getPais()->getNombreCorto(),'pais/edit?id='.$establecimiento->getProvincia()->getFkPaisId());
    }
?>
