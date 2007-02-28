<?php

require_once 'lib/model/om/BaseAnio.php';


/**
 * Skeleton subclass for representing a row from the 'anio' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Anio extends BaseAnio {
    public function __toString() {
        return $this->getDescripcion();
    }
} // Anio
