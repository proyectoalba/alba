<?php

require_once 'lib/model/om/BaseRelAnioActividad.php';


/**
 * Skeleton subclass for representing a row from the 'rel_anio_actividad' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class RelAnioActividad extends BaseRelAnioActividad {
    function __toString() {
        return $this->getAnio()->getDescripcion()." de ".$this->getActividad()->getDescripcion()." ".(($this->getOrientacion())?" de ".$this->getOrientacion()->getNombre():"");
    }
} // RelAnioActividad
